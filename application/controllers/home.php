<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
		$data['items'] = $this->items->get_all_();
		$data['warungs'] = $this->users->get_warungs();
        $data['week_sale'] = $this->templates->view_where('items',['is_week_sale'=>1])->result_array();

		$this->load->view('template/header');
		$this->load->view('home/index', $data);
		$this->load->view('template/footer');
	}
	public function week_sale(){
        $data['categories'] = $this->categories->get_all();
        $data['week_sale'] = $this->templates->view_where('items',['is_week_sale'=>1])->result_array();
        $this->load->view('template/header');
        $this->load->view('home/week_sale',$data);
        $this->load->view('template/footer');
    }
}