<?php
defined('BASEPATH') or exit('No direct script access allowed');

class warung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == FALSE) {
            redirect('auth/login');
        }

        $this->load->model('templates');
        $this->load->model('items');
        $this->load->model('users');
    }
    public function mywarung()
    {
        $data=[
            'pembeli_tersering' => $this->templates->query("SELECT count(*) as total, invoices.user as user FROM `invoices` WHERE invoices.warung='".$this->session->username."' group by invoices.user ORDER BY `total` DESC LIMIT 3")->result(),
            'item_terlaku' => $this->templates->query("SELECT sum(quantity) as total, items.name,items.photo FROM `invoice_details` join items on items.id = invoice_details.item JOIN invoices ON invoices.id=invoice_details.id WHERE items.username='".$this->session->username."' AND invoices.status = 'Sudah diterima' GROUP BY items.name,items.username,items.photo ORDER BY `total` DESC LIMIT 5")->result(),
            'item_terlaku_all' => $this->templates->query("SELECT SUM(quantity) total,items.name,items.photo FROM `invoice_details` JOIN items ON items.id=invoice_details.item JOIN invoices ON invoices.id=invoice_details.id WHERE invoices.status = 'Sudah diterima' GROUP BY items.name,items.photo ORDER BY total DESC LIMIT 5")->result(),
            'total_transaction'=>$this->templates->view_where('invoices',['warung'=>$this->session->username])->num_rows(),
            'total_item'=>$this->templates->view_where('items',['username'=>$this->session->username])->num_rows(),
            'active'=>'mywarung',
            'user'=>$this->users->get_username($this->session->userdata('username')),
            'total_user'=>$this->templates->query("SELECT count(*) as total, invoices.user as user FROM `invoices` WHERE invoices.warung='".$this->session->username."' group by invoices.user ORDER BY `total` DESC")->num_rows(),
    ];
        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('warung/mywarung', $data);
        $this->load->view('include/footer');
        
    }

    public function index()
    {
        $data['items'] = $this->items->get_all_username($this->session->userdata('username'));
        $data['user'] = $this->users->get_username($this->session->userdata('username'));

        $this->load->view('template/header');
        $this->load->view('warung/index', $data);
        $this->load->view('template/footer');
    }
    public function bank()
    {
        $data['active'] = 'bank';
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['bank'] = $this->templates->view_where(
            'bank_accounts',
            ['warung_username'=>$this->session->userdata('username')]
        )->result_array();
        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('bank/index',$data);
        $this->load->view('include/footer');
        if ($this->session->userdata('role')==1) {
            $data['warung'] = $this->users->get_user_warung($this->session->userdata('username'));
            $this->load->view('profile/scriptMap',$data);            
        }
    }
   public function laporan($date=null,$type= null)
    {
        if ($this->session->userdata('role')==0) {
            redirect('home');          
        }
        $group = " GROUP BY warung,items.name";
        if ($date != null) {
            if ($date == 'Minggu') {
                $type = $date.' ini';
                $from = date('Y-m-d');
                $to = date( 'Y-m-d', strtotime( '-7 days' ) );

                $where ="AND DATE_FORMAT(invoices.date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$from."','%Y-%m-%d') AND DATE_FORMAT('".$to."','%Y-%m-%d')";
            }else{
                $type = $type." ini";
                $where ="AND invoices.date LIKE '".$date."%'";
            }

            $_laporan = $this->templates->query("SELECT invoices.id,warung,billing,delivery_fee,total,method,quantity,invoices.date,items.name,items.stock FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$where)->result();
            // $_laporan_item = $this->templates->query("SELECT warung,items.name,sum(quantity) as quantity,sum(billing) as billing,sum(delivery_fee) as delivery_fee,sum(total) as total FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$where.$group)->result();
        }else{
            $type = "Semua";
            $_laporan = $this->templates->query("SELECT invoices.id,warung,billing,delivery_fee,total,method,quantity,invoices.date,items.name,items.stock FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."'")->result();
            // $_laporan_item = $this->templates->query("SELECT warung,items.name,sum(quantity) as quantity,sum(billing) as billing,sum(delivery_fee) as delivery_fee,sum(total) as total FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$group)->result();
        }
        $_laporan_item = $this->templates->query("SELECT items.id,items.name,categories.name AS category,items.stock FROM items JOIN categories ON categories.id=items.category WHERE items.username='".$this->session->userdata('username')."'")->result();
        $data=[
            'type'=>$type,
            'laporan'=>$_laporan,
            'laporan_item'=>$_laporan_item,
            'user'=>$this->users->get_username($this->session->userdata('username')),
            'active'=>'laporan'
        ];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('laporan/index',$data);
        $this->load->view('include/footer');
    }
    public function create_bank(){
        // nama,deskripsi,harga,stok,foto
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('bank/create',$data);
        $this->load->view('include/footer');
    }
    public function save_bank(){
        $this->form_validation->set_rules('name','Nama Bank', 'required');
        $this->form_validation->set_rules('nama_rek','Nama Rekening', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');

        if($this->form_validation->run() == false){
            redirect('warung/bank');
        }else{
            $data=[
                'bank'=>$this->input->post('name'),
                'account_name'=>$this->input->post('nama_rek'),
                'account_number'=>$this->input->post('nomor'),
                'warung_username'=>$this->session->username,
            ];
            $this->templates->insert('bank_accounts',$data);
            $this->session->set_flashdata('success', 'Bank berhasil ditambahkan.');
            redirect('warung/bank');
        }
    }
    public function edit_bank($id){
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $data['bank'] = $this->templates->view_where('bank_accounts',['id_bank_account'=>$id])->result_array();
        // $data['categories'] = $this->categories->get_all();

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('bank/edit',$data);
        $this->load->view('include/footer');
    }
    public function update_bank($id){
        $this->form_validation->set_rules('name','Nama Bank', 'required');
        $this->form_validation->set_rules('nama_rek','Nama Rekening', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');

        $data=[
            'bank'=>$this->input->post('name'),
            'account_name'=>$this->input->post('nama_rek'),
            'account_number'=>$this->input->post('nomor'),
        ];
        $this->templates->update('bank_accounts',['id_bank_account'=>$id],$data);
        $this->session->set_flashdata('success', 'Bank berhasil diubah.');
        redirect('warung/bank');
    }
    public function delete_bank($id){
        if($this->templates->delete('bank_accounts',['id_bank_account'=>$id])){
            $this->session->set_flashdata('success', 'Bank Account telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('errors', 'Bank Account gagal dihapus');
        }
        redirect('warung/bank/');
    }
}
