<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rating extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('items');
        $this->load->model('ratings');
        $this->load->model('reviews');
    }

    public function create($item){
        $data['item'] = $this->items->get_one_id($item);
        $data['user'] = $this->users->get_username($this->session->userdata('username'));

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('rating/create',$data);
        $this->load->view('include/footer');
    }

    public function store($item){
        $rating = array(
            'username' => $this->session->userdata('username'),
            'item' => $item,
            'rating' => $this->input->post('rating')
        );
        $review = array(
            'username' => $this->session->userdata('username'),
            'item' => $item,
            'review' => $this->input->post('review')
        );

        $this->ratings->store($rating);
        $this->reviews->store($review);

        $this->session->set_flashdata('success','Rating dan review telah ditambahkan');
        redirect('profile/order/');
    }
}?>