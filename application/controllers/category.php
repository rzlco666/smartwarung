<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['categories'] = $this->categories->get_all();
        $data['items'] = $this->categories->get_all_items();


        $this->load->view('template/header');
        $this->load->view('category/index',$data);
        $this->load->view('template/footer');
    }

    public function show($id){
        $data['categories'] = $this->categories->get_all();
        $data['id'] = $id;
        $data['items'] = $this->categories->get_by_categories($id);

        $this->load->view('template/header');
        $this->load->view('category/show',$data);
        $this->load->view('template/footer');
    }
}
?>