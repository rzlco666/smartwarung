<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('users');
        $this->load->model('invoices');
        $this->load->model('items');
        $this->load->model('templates');

        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));
        $data['active'] = 'index';

        if ($this->session->userdata('role')==0) {
            $data['user'] = $this->users->get_username($this->session->userdata('username'));
            $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));
            $data['active'] = 'index';

            $this->load->view('include/meta');
            $this->load->view('include/header');
            $this->load->view('include/topbar',$data);
            $this->load->view('include/responsive');
            $this->load->view('include/detail_chart');
            $this->load->view('profile/index',$data);
            $this->load->view('include/footer');
        }else{
            $data['warung'] = $this->users->get_user_warung($this->session->userdata('username'));
            $data['user'] = $this->users->get_username($this->session->userdata('username'));
            $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));
            $data['active'] = 'index';

            $this->load->view('template/header');
            $this->load->view('profile/index2',$data);
            $this->load->view('template/footer');
            $this->load->view('profile/scriptMap',$data); 
        }
    }
    
    public function show($username){
        if($this->session->userdata('username')==$username){
            redirect('profile/');
        }
        
        $data['items'] = $this->items->get_all_username($username);
        $data['user'] = $this->users->get_username($username);
        $data['active'] = 'index';
        $data['uswarung']=$username;
        
        //$this->load->view('template/header');
        //$this->load->view('profile/index2',$data);
        //$this->load->view('template/footer');

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('profile/index2',$data);

        if ($data['user']['role']==1) {
            $data['warung'] = $this->users->get_user_warung($data['user']['username']);
            $this->load->view('profile/scriptMap',$data);            
            $this->load->view('profile/comment',$data);            
        }

        $this->load->view('include/footer');
    }

    public function order(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));
        $data['active'] = 'order';

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('profile/order',$data);
        $this->load->view('include/footer');
        $this->load->view('profile/script',$data);
        // print_r($data);
    }

    public function etalase($username){
        // $data['items'] = $this->items->get_all_username($username);
        $data['user'] = $this->users->get_username($username);
        $data['active'] = 'etalase';
        $data['categories'] = $this->categories->get_all();
        $data['items'] = $this->categories->get_all_item_warung();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('template/header');
        $this->load->view('profile/etalase_warung',$data);
        $this->load->view('template/footer');
    }

    public function etalase_warung($id){
        $data['categories'] = $this->categories->get_all();
        $data['user'] = $this->users->get_username($this->session->username);
        $data['active'] = 'etalase';
        $data['id'] = $id;
        $data['items'] = $this->categories->get_by_categories_warung($id);

        $this->load->view('template/header');
        $this->load->view('profile/etalase_category',$data);
        $this->load->view('template/footer');
    }


    public function edit($username){
        $data['user'] = $this->users->get_username($username);

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('profile/edit',$data);
        $this->load->view('include/footer');
    }

    public function change_photo($username){
        $_FILES['photo']['name']    = $_FILES['file']['name'];
        $_FILES['photo']['type']    = $_FILES['file']['type'];
        $_FILES['photo']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['photo']['error']   = $_FILES['file']['error'];
        $_FILES['photo']['size']    = $_FILES['file']['size'];

        $config['upload_path']      = 'assets/uploads/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '5000';
        $config['encrypt_name'] 	= true;

        $this->load->library('upload',$config);

        if($this->upload->do_upload('photo')){
            $upload_data = $this->upload->data();
            $data = array(
                'photo' => $upload_data['file_name']
            );
            $this->db->where('username',$this->session->userdata('username'));
            $this->db->update('users',$data);

            $this->session->set_flashdata('success','Foto profile berhasil diperbarui');
            redirect('profile');
        }else{
            $this->session->set_flashdata('errors','Foto profile gagal diperbarui');
            redirect('profile');
        }
    }

    public function change_password($username){
        $oldpassword = $this->users->get_password($username);
        echo $oldpassword['password'];

        if ($oldpassword['password'] == md5($this->input->post('oldpassword'))){
            if($this->input->post('verif-newpassword')!=$this->input->post('newpassword')){
                $this->session->set_flashdata('errors','Ganti password gagal!a');
                redirect('profile');
            }else{
                $data = array(
                    'password' => md5($this->input->post('newpassword'))
                );
                $this->db->where('username',$username);
                $this->db->update('users',$data);

                $this->session->set_flashdata('success','Ganti password berhasil!');
                redirect('profile');
            }
        }else{
            $this->session->set_flashdata('errors','Ganti password gagal!b');
            redirect('profile');
        }
    }

    public function update($username){
        if($this->input->post('username')!=$username){
            $this->form_validation->set_rules('username','Username', 'required|alpha_dash|is_unique[users.username]');

        }
        $this->form_validation->set_rules('name','Full Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required|numeric');
        $this->form_validation->set_rules('email','E-mail', 'required|valid_email');
        
        if($this->form_validation->run() == false){
            $data['user'] = $this->users->get_username($username);
            $this->load->view('template/header');
            $this->load->view('profile/edit',$data);
            $this->load->view('template/footer');
        }else{
            $this->users->update($username);
            $this->session->set_flashdata('success','Akun berhasil diperbarui');
            redirect('profile/');
        }
    }

    public function invoice_details($id){
        $data = $this->invoices->get_invoice_details($this->session->userdata('username'),$id);
        $jsondata = json_encode($data);

        echo $jsondata;
    }
    public function upload_bukti($invoice_id){
        $_FILES['photo']['name']    = $_FILES['file']['name'];
        $_FILES['photo']['type']    = $_FILES['file']['type'];
        $_FILES['photo']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['photo']['error']   = $_FILES['file']['error'];
        $_FILES['photo']['size']    = $_FILES['file']['size'];

        $config['upload_path']      = 'assets/bukti_trf/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '5000';
        $config['encrypt_name'] 	= true;

        $this->load->library('upload',$config);

        if($this->upload->do_upload('file')){
            $upload_data = $this->upload->data();
            $data = array(
                'proof_of_payment' => $upload_data['file_name']
            );
            $this->db->where('id',$invoice_id);
            $this->db->update('invoices',$data);

            $this->session->set_flashdata('success','Bukti Transfer berhasil diupload');
            redirect('profile/order');
        }else{
            $this->session->set_flashdata('errors','Bukti Transfer gagal diupload');
            redirect('profile/order');
        }
    }
    public function ubah_dikirim($invoice_id)
    {
        $this->templates->update('invoices',['id'=>$invoice_id],['status'=>"Sedang dikirim"]);
        redirect('profile/order');
    }
    public function ubah_diterima($invoice_id)
    {
        $this->templates->update('invoices',['id'=>$invoice_id],['status'=>"Sudah diterima"]);
        redirect('profile/order');
    }
    public function ubah_dibatalkan($invoice_id)
    {
        $this->templates->update('invoices',['id'=>$invoice_id],['status'=>"Dibatalkan"]);
        redirect('profile/order');
    }
    public function comment(){
        $data['active'] = 'comment';
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['comment'] = $this->templates->view_where('comments',['to_whom'=>$this->session->username])->result_array();

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar', $data);
        $this->load->view('include/responsive');
        $this->load->view('warung/comment',$data);
        $this->load->view('admin/js',$data);
        $this->load->view('include/footer');
    }
}?>