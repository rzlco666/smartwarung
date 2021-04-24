<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('users');
        $this->load->model('templates');
        $this->load->helper('date');
        if ($this->session->userdata('role') == 1) {
            redirect('profile');
        }
        elseif ($this->session->userdata('role') == 0) {
            redirect('home', 'refresh');
        }
    }

    public function index(){
        $data['warungs'] = $this->users->get_warungs();
        $data['users'] = $this->users->get_users();
        $data['pembeli_tersering'] = $this->templates->query("SELECT count(*) as total, invoices.user FROM `invoices` group by invoices.user ORDER BY `total` DESC LIMIT 3")->result();
        $data['warung_terlaku'] = $this->templates->query("SELECT count(*) as total, invoices.warung FROM `invoices` group by invoices.warung ORDER BY `total` DESC LIMIT 3")->result();
        $data['item_terlaku'] = $this->templates->query("SELECT SUM(quantity) total,items.name FROM `invoice_details` JOIN items ON items.id=invoice_details.item JOIN invoices ON invoices.id=invoice_details.id WHERE invoices.status = 'Sudah diterima' GROUP BY items.name ORDER BY total DESC LIMIT 5")->result();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_warung']=  $this->users->get_billing_warung()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();
        $data['active'] = 'index';
        $data['total_user']=$this->templates->view_where('users',['role'=>0])->num_rows();
        $data['total_warung']=$this->templates->view_where('users',['role'=>1])->num_rows();
        $data['total_transaction']=$this->templates->view('invoices')->num_rows();
        $data['total_item']=$this->templates->view('items')->num_rows();

        $this->load->view('include_admin/meta');
        $this->load->view('include_admin/header');
        $this->load->view('include_admin/sidebar');
        $this->load->view('admin/index',$data);
        $this->load->view('include_admin/footer');
    }
    public function orders(){
        $data['warungs'] = $this->users->get_warungs();
        $data['orders'] = $this->templates->view_where('invoices',['method'=>'Transfer'])->result();
        $data['users'] = $this->users->get_users();
        $data['active'] = 'orders';
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('include_admin/meta');
        $this->load->view('include_admin/header');
        $this->load->view('include_admin/sidebar');
        $this->load->view('admin/orders',$data);
        $this->load->view('include_admin/footer');
    }

    public function test(){

        $data['warungs'] = $this->users->get_warungs();
        $data['users'] = $this->users->get_users();
        $data['pembeli_tersering'] = $this->templates->query("SELECT count(*) as total, invoices.user FROM `invoices` group by invoices.user ORDER BY `total` DESC LIMIT 3")->result();
        $data['warung_terlaku'] = $this->templates->query("SELECT count(*) as total, invoices.warung FROM `invoices` group by invoices.warung ORDER BY `total` DESC LIMIT 3")->result();
        $data['item_terlaku'] = $this->templates->query("SELECT SUM(quantity) total,items.name FROM `invoice_details` JOIN items ON items.id=invoice_details.item JOIN invoices ON invoices.id=invoice_details.id WHERE invoices.status = 'Sudah diterima' GROUP BY items.name ORDER BY total DESC LIMIT 5")->result();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_warung']=  $this->users->get_billing_warung()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();
        $data['active'] = 'index';
        $data['total_user']=$this->templates->view_where('users',['role'=>0])->num_rows();
        $data['total_warung']=$this->templates->view_where('users',['role'=>1])->num_rows();
        $data['total_transaction']=$this->templates->view('invoices')->num_rows();
        $data['total_item']=$this->templates->view('items')->num_rows();

        $this->load->view('template/header');
        $this->load->view('admin/test',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('template/footer');
    }

    public function warung(){
        $data['warungs'] = $this->users->get_warungs_all();
        $data['active'] = 'warung';
        $data['users'] = $this->users->get_users();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('template/header');
        $this->load->view('admin/warung',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('template/footer');
    }
    public function billing($date=null,$type= null){
        $data['warungs'] = $this->users->get_warungs();
        $data['billings'] = $this->users->get_billing()->result_array();
        $data['billings_cash'] = $this->users->get_billing_cash()->result_array();
        $data['active'] = 'billing';
        $data['users'] = $this->users->get_users();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('template/header');
        $this->load->view('admin/billing',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('template/footer');
    }
    public function comment(){
        $data['warungs'] = $this->users->get_warungs();
        $data['active'] = 'comment';
        $data['users'] = $this->users->get_users();
        $data['comment'] = $this->templates->view('comments')->result_array();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('template/header');
        $this->load->view('admin/comment',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('template/footer');
    }

    public function user(){
        $data['warungs'] = $this->users->get_warungs();
        $data['users'] = $this->users->get_users();
        $data['active'] = 'user';
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('template/header');
        $this->load->view('admin/user',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('template/footer');
    }

    public function approve($username){
        $data = array(
            'status' => 'Sudah diverifikasi',
            'is_aktif' => 1,
            'updated_at' => date("Y-m-d")
        );

        $this->db->where('username',$username);
        if($this->db->update('warungs',$data)){
            $this->session->set_flashdata('success','Warung berhasil diverifikasi!');
            redirect('admin');
        }else {
            $this->session->set_flashdata('errors','Warung gagal diverifikasi');
            redirect('admin');
        }
    }
    
    public function unapprove($username){
        $data = array(
            'status' => 'Verifikasi tidak disetujui',
            'alasan' => $this->input->post('alasan'),
            'updated_at' => date("Y-m-d")
        );
        
        $this->db->where('username',$username);
        if($this->db->update('warungs',$data)){
            $this->session->set_flashdata('success','Status warung berhasil diperbarui!');
            redirect('admin');
        }else {
            $this->session->set_flashdata('errors','Status warung gagal diperbarui');
            redirect('admin');
        }
    }
    
    public function delete($username){
        $this->db->where('username',$username);
        
        if($this->db->delete('users')){
            $this->session->set_flashdata('success','Warung berhasil dihapus!');
            redirect('admin');
        }else {
            $this->session->set_flashdata('errors','Warung gagal dihapus!');
            redirect('admin');
        }
    }
    public function verif_payment($invoices,$status){
        if($status == 1){
            $data = array(
                'status' => 'Menunggu proses penjual',
            );
        }elseif ($status == 2) {
            $data = array(
                'proof_of_payment' => '',
            );
        }
        
        $this->db->where('id',$invoices);
        if($this->db->update('invoices',$data)){
            if($status == 1){
                $this->session->set_flashdata('success','Bukti Transfer Valid!');
            }else{
                $this->session->set_flashdata('errors','Bukti Transfer Tidak Valid!');
            }
            redirect('admin/orders');
        }else {
            $this->session->set_flashdata('errors','Ada yang error!');
            redirect('admin/orders');
        }
    }
    public function week_sale()
    {
        $data['items'] = $this->templates->view_where('items',['is_week_sale'=>1])->result_array();
        $data['active'] = 'week_sale';
        $data['users'] = $this->users->get_users();
        $data['warungs'] = $this->users->get_warungs();
        $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
        $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
        $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

        $this->load->view('include_admin/meta');
        $this->load->view('include_admin/header');
        $this->load->view('include_admin/sidebar');
        $this->load->view('admin/week_sale',$data);
        $this->load->view('include_admin/footer');
    }
    public function generate_week_sale()
    {
        $item_data_reset=$this->templates->query("SELECT * FROM items WHERE is_week_sale=1")->result();
        $item_week_sale=[];
        foreach ($item_data_reset as $key) {
            $this->templates->update('items',['id'=>$key->id],['discount'=>0,'is_week_sale'=>0,'date_week_sale'=>""]);
        }
        $item_data=$this->templates->query("SELECT * FROM items WHERE hide=0 AND discount=0 ORDER BY RAND() LIMIT 5")->result();
        foreach ($item_data as $key) {
            $item_week_sale[]=[
                'id'=>$key->id,
                'discount'=> (rand(1,30)),
                'date_week_sale'=> date("Y-m-d")
            ];
        }
        foreach ($item_week_sale as $key) {
            // echo $key['id'];
            $this->templates->update('items',['id'=>$key['id']],['discount'=>$key['discount'],'date_week_sale'=> date("Y-m-d"),'is_week_sale'=>1]);
        }
        // echo "<pre>";
        // print_r($item_week_sale);
        // echo "</pre>";
        $this->session->set_flashdata('success_ubah', 'Sukses Generate Obral Mingguan');
        redirect('admin/week_sale');

    }
    public function delete_week_sale($id)
    {
       $this->templates->update('items',['id'=>$id],['discount'=>0,'is_week_sale'=>0]);
       redirect('admin/week_sale');
    }
    public function add_week_sale()
    {
       $data_item=$this->templates->view_where('items',['is_week_sale'=>0,'discount'=>0])->result();
       $data['item']=$data_item;
       $data['users'] = $this->users->get_users();
       $data['warungs'] = $this->users->get_warungs();
       $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
       $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
       $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

       $this->load->view('include_admin/meta');
       $this->load->view('include_admin/header');
       $this->load->view('include_admin/sidebar');
       $this->load->view('admin/add_week_sale',$data);
       $this->load->view('include_admin/footer');
    }
    public function save_week_sale()
    {
        $this->form_validation->set_rules('name','Nama Barang', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required|is_natural_no_zero');
        if($this->form_validation->run() == false){
            $data_item=$this->templates->view_where('items',['is_week_sale'=>0,'discount'=>0])->result();
            $data['item']=$data_item;
            $data['users'] = $this->users->get_users();
            $data['warungs'] = $this->users->get_warungs();
            $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
            $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
            $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();
            $this->load->view('template/header');
            $this->load->view('admin/add_week_sale',$data);
            $this->load->view('template/footer');
        }else{
            $this->templates->update('items',['id'=>$this->input->post('name')],[
                'discount'=>$this->input->post('discount'),
                'date_week_sale'=> date("Y-m-d"),
                'is_week_sale'=>1]);
            // print_r($this->input->post());
            $this->session->set_flashdata('success_ubah', 'Sukses Tambah Obral Mingguan');
            redirect('admin/week_sale');
        }
    }
    public function edit_week_sale($id)
    {
       $data_item=$this->templates->view_where('items',['id'=>$id])->row_array();
       $data['item']=$data_item;
       $data['users'] = $this->users->get_users();
       $data['warungs'] = $this->users->get_warungs();
       $data['graph_invoice']= $this->users->invoice_warung_graph()->result();
       $data['graph_invoice_buyer']= $this->users->invoice_buyer_graph()->result();
       $data['graph_invoice_status']= $this->users->invoice_status_graph()->result();

       $this->load->view('include_admin/meta');
       $this->load->view('include_admin/header');
       $this->load->view('include_admin/sidebar');
       $this->load->view('admin/edit_week_sale',$data);
       $this->load->view('include_admin/footer');
    }
    public function update_week_sale($id)
    {
       $this->templates->update('items',['id'=>$id],['discount'=>$this->input->post('discount')]);
       $this->session->set_flashdata('success_ubah', 'Sukses Ubah Obral Mingguan');
       redirect('admin/week_sale');
    }
    public function aktifasi_warung($id,$status)
    {
        if ($status == 0) {
            $alasan = $this->input->post('alasan');
        }else{
            $alasan = '';
        }
        echo $alasan;
        $this->templates->update('warungs',['id'=>$id],['is_aktif'=>$status,'alasan'=>$alasan]);
        redirect('admin/warung');
    }
}
?>