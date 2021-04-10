<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('templates');
    }

    public function index()
    {
        $data['categories'] = $this->categories->get_all();
        $data['items'] = $this->categories->get_all_items();

        $this->load->view('template/header');
        $this->load->view('category/index', $data);
        $this->load->view('template/footer');
    }
    public function send()
    {
        $config['upload_path']      = 'assets/kritik/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = '5000';
        $config['encrypt_name'] 	= true;

        $this->load->library('upload',$config);

        if($this->upload->do_upload('file')){
            $upload_data = $this->upload->data();
            $data = array(
                'photo' => $upload_data['file_name']
            );

            // $this->session->set_flashdata('success','Foto profile berhasil diperbarui');
            // redirect('profile');
            $data = [
                'sender_name'=> $this->input->post('name'),
                'username'=> $this->input->post('usname'),
                'to_whom'=> $this->input->post('to_whom'),
                'message'=> $this->input->post('comment'),
                'foto' => $upload_data['file_name']
            ];
            $check_id = $this->templates->insert_id('comments',$data);
            if ($check_id == null) {
                echo json_encode(['status'=>'success']);
            }else{
                echo json_encode(['status'=>'error']);
            }
        }else{
            // $this->session->set_flashdata('errors','Foto profile gagal diperbarui');
                echo json_encode(['status'=>'error']);
                // redirect('profile');
        }
    }
}