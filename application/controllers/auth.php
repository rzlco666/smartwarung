<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('users');
		$this->load->library('form_validation');
    }
    
	public function login()
	{
		$this->load->view('include/meta');
		$this->load->view('include/header');
		$this->load->view('include/topbar');
		$this->load->view('include/responsive');
		$this->load->view('include/detail_chart');
		$this->load->view('auth/login');
		$this->load->view('include/footer');	
	}
    
    public function register()
	{
		
		$this->load->view('include/meta');
		$this->load->view('include/header');
		$this->load->view('include/topbar');
		$this->load->view('include/responsive');
		$this->load->view('include/detail_chart');
		$this->load->view('auth/register');
		$this->load->view('include/footer');
	}
    
    public function register_warung()
	{
		
		$this->load->view('template/header');
		$this->load->view('auth/register_warung');
		$this->load->view('template/footer');
		$this->load->view('auth/script'); //lokasi
	}
    
    public function store()
	{
		$this->form_validation->set_rules('name','Full Name', 'required');
		$this->form_validation->set_rules('username','Username', 'required|alpha_dash|is_unique[users.username]');
		$this->form_validation->set_rules('phone','Phone', 'required|numeric');
		$this->form_validation->set_rules('email','E-mail', 'required|valid_email');

		// function username_check_blank($str){
		// 	$pattern ='/ /';
		// 	$result = preg_match($pattern,$str);

		// 	if($result){
		// 		$this->form_validation->set_message('username', 'The field cannot have spaces');
		// 		return false;
		// 	}else{
		// 		return true;
		// 	}
		// }

		if($this->form_validation->run() == false){
			$this->load->view('template/header');
			$this->load->view('auth/register');
			$this->load->view('template/footer');
		}else{
			$this->users->store($this->input->post('username'));
			redirect('auth/login', 'refresh');
		}
	}

	public function store_warung(){
		$countfiles = count($_FILES['files']['name']);
		// echo $countfiles;
		$data_photos = array();

		$this->form_validation->set_rules('name','Full Name', 'required');
		$this->form_validation->set_rules('address','Alamat', 'required');
		$this->form_validation->set_rules('username','Username', 'required|alpha_dash|is_unique[users.username]');
		$this->form_validation->set_rules('phone','Phone', 'required|numeric');
		$this->form_validation->set_rules('email','E-mail', 'required|valid_email');

		if($this->form_validation->run() == true){
			for($i=0; $i < $countfiles;$i++){
				if(!empty($_FILES['files']['name'][$i])){
					$_FILES['photo']['name']    = $_FILES['files']['name'][$i];
					$_FILES['photo']['type']    = $_FILES['files']['type'][$i];
					$_FILES['photo']['tmp_name']= $_FILES['files']['tmp_name'][$i];
					$_FILES['photo']['error']   = $_FILES['files']['error'][$i];
					$_FILES['photo']['size']    = $_FILES['files']['size'][$i];
	
					$config['upload_path']      = 'assets/uploads/';
					$config['allowed_types']    = 'jpg|jpeg|png';
					$config['max_size']         = '5000';
					$config['encrypt_name'] 	= true;
					// $config['file_name']        = $_FILES['files']['name'][$i];
	
					$this->load->library('upload',$config);
	
					if($this->upload->do_upload('photo')){
						$upload_data = $this->upload->data();
						$data_photos[$i] = $upload_data['file_name'];
						// echo $countfiles;
					}
				}
			}
	
			if(!empty($data_photos)){
				$data_photo = implode(',',$data_photos);
				// echo $data_photo;
	
				$this->users->store_warung($this->input->post('username'),$data_photo);
				
				$this->session->set_flashdata('success', 'Akun Anda berhasil dibuat!');
				redirect('auth/login', 'refresh');
			}else{
				$this->session->set_flashdata('errors', 'Register gagal!');
				redirect('auth/register_warung', 'refresh');
			}
		}else{
			$this->session->set_flashdata('errors', 'Register gagal!');
			redirect('auth/register_warung');
		}		
	}

	public function verif(){
		$data['user'] = $this->users->get_username($this->input->post('username'));

		if(md5($this->input->post('password')) == $data['user']['password']){
			
			$this->session->set_userdata('login',TRUE);
			$this->session->set_userdata('email',$data['user']['email']);
			$this->session->set_userdata('name',$data['user']['name']);
			$this->session->set_userdata('username', $data['user']['username']);
			$this->session->set_userdata('role', $data['user']['role']);

			if($this->session->userdata('role') == 99){
				$this->session->set_userdata('isAdmin',TRUE);
				redirect('admin');
			}elseif ($this->session->userdata('role') == 1) {
				$this->session->set_userdata('isWarung',TRUE);
				redirect('profile');
			}
			elseif ($this->session->userdata('role') == 0) {
				$this->session->set_userdata('isBuyer',TRUE);
				redirect('home', 'refresh');
			}
		}else{
			$this->session->set_flashdata('errors','Invalid username or password');

			redirect('auth/login', 'refresh');
		}

	}

	public function edit($username){
		$data['user'] = $this->users->get_username($this->session->userdata('username'));

		$this->load->view('template/header');
		$this->load->view('auth/edit',$data);
		$this->load->view('template/footer');

	}

	public function tes(){

		$this->load->view('auth/tes');
		$this->load->view('auth/script');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
