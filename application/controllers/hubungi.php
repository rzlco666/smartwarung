<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hubungi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

		$this->load->model('items');
		$this->load->model('templates');
		$this->load->model('users');
		if($this->session->role == 99){
			redirect('admin');
		}
	}
	
	 public function index()
	{
		$data['user'] = $this->users->get_username($this->session->userdata('username'));

		$this->load->view('include/meta');
		$this->load->view('include/header');
		$this->load->view('include/topbar',$data);
		$this->load->view('include/responsive');
		$this->load->view('include/detail_chart');
		$this->load->view('home/hubungi');
		$this->load->view('include/add_chart');
		$this->load->view('include/footer');
	}
}
