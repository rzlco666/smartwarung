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

        $this->load->view('template/header');
        $this->load->view('rating/create',$data);
        $this->load->view('template/footer');
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