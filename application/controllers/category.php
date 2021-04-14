<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['categories'] = $this->categories->get_all();
        $data['items'] = $this->categories->get_all_items();


        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar');
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('category/index',$data);
        $this->load->view('include/footer');
    }

    public function show($id){
        $data['categories'] = $this->categories->get_all();
        $data['id'] = $id;
        $data['items'] = $this->categories->get_by_categories($id);

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar');
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('category/show',$data);
        $this->load->view('include/footer');
    }
}
?>