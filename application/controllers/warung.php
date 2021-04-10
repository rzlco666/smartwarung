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
            'item_terlaku' => $this->templates->query("SELECT sum(quantity) as total, items.name FROM `invoice_details` join items on items.id = invoice_details.item WHERE items.username='".$this->session->username."' GROUP BY items.name,items.username ORDER BY `total` DESC LIMIT 3")->result(),
            'total_transaction'=>$this->templates->view_where('invoices',['warung'=>$this->session->username])->num_rows(),
            'total_item'=>$this->templates->view_where('items',['username'=>$this->session->username])->num_rows(),
            'active'=>'mywarung',
            'user'=>$this->users->get_username($this->session->userdata('username')),
            'total_user'=>$this->templates->query("SELECT count(*) as total, invoices.user as user FROM `invoices` WHERE invoices.warung='".$this->session->username."' group by invoices.user ORDER BY `total` DESC")->num_rows(),
    ];
        $this->load->view('template/header');
        $this->load->view('warung/mywarung', $data);
        $this->load->view('template/footer');
        
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
        $this->load->view('template/header');
        $this->load->view('bank/index',$data);
        $this->load->view('template/footer');
        if ($this->session->userdata('role')==1) {
            $data['warung'] = $this->users->get_user_warung($this->session->userdata('username'));
            $this->load->view('profile/scriptMap',$data);            
        }
    }
    public function laporan()
    {
        if ($this->session->userdata('role')==0) {
            redirect('home');          
        }
        $group = " GROUP BY warung,items.name";
        if ($this->input->post()) {
            // if(isset($this->input->post('date_range'))){
            $_date =explode(" - ",$this->input->post('date_range'));
            // echo $this->input->post('date_range');
            $where ="AND DATE_FORMAT(invoicesdate,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$_date[0]."','%Y-%m-%d') AND DATE_FORMAT('".$_date[1]."','%Y-%m-%d')";
            // }
            $_laporan = $this->templates->query("SELECT invoices.id,warung,billing,delivery_fee,total,method,quantity,invoices.date,items.name,items.stock FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$where)->result();
            $_laporan_item = $this->templates->query("SELECT warung,items.name,sum(quantity) as quantity,sum(billing) as billing,sum(delivery_fee) as delivery_fee,sum(total) as total FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$where.$group)->result();
        }else{
            $_laporan = $this->templates->query("SELECT invoices.id,warung,billing,delivery_fee,total,method,quantity,invoices.date,items.name,items.stock FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ")->result();
            $_laporan_item = $this->templates->query("SELECT warung,items.name,sum(quantity) as quantity,sum(billing) as billing,sum(delivery_fee) as delivery_fee,sum(total) as total FROM invoices JOIN invoice_details on invoices.id=invoice_details.id JOIN items ON items.id=invoice_details.item WHERE invoices.warung='".$this->session->userdata('username')."' ".$group)->result();
        }
        $data=[
            'laporan'=>$_laporan,
            'laporan_item'=>$_laporan_item,
            'user'=>$this->users->get_username($this->session->userdata('username')),
            'active'=>'laporan'
        ];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('template/header');
        $this->load->view('laporan/index',$data);
        $this->load->view('template/footer');
    }
    public function create_bank(){
        // nama,deskripsi,harga,stok,foto
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $this->load->view('template/header');
        $this->load->view('bank/create',$data);
        $this->load->view('template/footer');
    }
    public function save_bank(){
        $this->form_validation->set_rules('name','Nama Bank', 'required');
        $this->form_validation->set_rules('nama_rek','Nama Rekening', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');

        if($this->form_validation->run() == false){
            $data['categories'] = $this->categories->get_all();

            $this->load->view('template/header');
            $this->load->view('bank/create',$data);
            $this->load->view('template/footer');
        }else{
            $data=[
                'bank'=>$this->input->post('name'),
                'account_name'=>$this->input->post('nama_rek'),
                'account_number'=>$this->input->post('nomor'),
                'warung_username'=>$this->session->username,
            ];
            $this->templates->insert('bank_accounts',$data);
            redirect('warung/bank');
        }
    }
    public function edit_bank($id){
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $data['bank'] = $this->templates->view_where('bank_accounts',['id'=>$id])->result_array();
        // $data['categories'] = $this->categories->get_all();

        $this->load->view('template/header');
        $this->load->view('bank/edit',$data);
        $this->load->view('template/footer');
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
        $this->templates->update('bank_accounts',['id'=>$id],$data);
        redirect('warung/bank');
    }
    public function delete_bank($id){
        if($this->templates->delete('bank_accounts',['id'=>$id])){
            $this->session->set_flashdata('success', 'Bank Account telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('errors', 'Bank Account gagal dihapus');
        }
        redirect('warung/bank/');
    }
}
