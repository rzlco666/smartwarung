<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('items');
        $this->load->model('categories');
        $this->load->model('users');
        $this->load->model('ratings');
        $this->load->model('reviews');
        $this->load->model('templates');
    }

    // create untuk page form bikin baru
    // store fungsi setelah tombol submit ditekan -> masukin ke database
    // edit untuk page form update
    // update untuk database setelah tombol submit
    // delete 

    public function create(){
        // nama,deskripsi,harga,stok,foto
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $data['categories'] = $this->categories->get_all();

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('item/create',$data);
        $this->load->view('include/footer');
    }

    public function store(){
        $this->form_validation->set_rules('name','Nama Barang', 'required');
        $this->form_validation->set_rules('stock', 'Stok', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('price', 'Harga', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if($this->form_validation->run() == false){
            $data['categories'] = $this->categories->get_all();

            $this->load->view('template/header');
            $this->load->view('item/create',$data);
            $this->load->view('template/footer');
        }else{
            $countfiles = count($_FILES['files']['name']);
            $data_photos = array();

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

                $this->items->store($this->session->userdata('username'),$data_photo);
                
                $this->session->set_flashdata('success', 'Barang telah berhasil ditambahkan');
                redirect('profile/etalase/'.$this->session->userdata('username'));
            }else{
                $data['categories'] = $this->categories->get_all();

                $this->load->view('template/header');
                $this->load->view('item/create',$data);
                $this->load->view('template/footer');
            }
        }
    }

    public function show($id){
        $_item = $this->items->get_one_id($id);
        $data['item'] = $_item;
        $data['warung'] = $this->users->get_username($data['item']['username']);
        $data['rating'] = $this->ratings->get($id);
        $data['list_like'] = $this->items->search_item_like($_item['username'],$_item['name'])->result();
        $data['list_warung'] = $this->items->search_item_warung($id,$_item['username'])->result();
        if($data['rating'] == null){
            $data['rating']['rating'] = 0;
        }
        $data['reviews'] = $this->reviews->get($id);
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('include/detail_chart');
        $this->load->view('item/show',$data);
        //$this->load->view('include/add_chart');
        $this->load->view('include/footer');
    }

    public function edit($id){
        $data['user'] = $this->users->get_user_warung($this->session->userdata('username'));
        if($data['user']['status']!='Sudah diverifikasi'){
            $this->session->set_flashdata('errors','Akun Anda belum diverifikasi');
            redirect('profile');
        };

        $data['item'] = $this->items->get_one_id($id);
        $data['categories'] = $this->categories->get_all();

        $this->load->view('include/meta');
        $this->load->view('include/header');
        $this->load->view('include/topbar',$data);
        $this->load->view('include/responsive');
        $this->load->view('item/edit',$data);
        $this->load->view('include/footer');
    }

    public function update($id){

        if($this->items->update($id)){
            $this->session->set_flashdata('success', 'Barang telah berhasil diperbarui');

            // print_r($this->session->userdata('url'));
            // header('Location: ' . $_SERVER['REQUEST_URI']);
            
            if ($_FILES['files']['name'] != "") {
            $countfiles = count($_FILES['files']['name']);
            $data_photos = array();

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
                $this->templates->update('items',['id',$id],['photo'=>$data_photo]);

                $this->session->set_flashdata('success', 'Photo barang telah berhasil ditambahkan');
                redirect('profile/etalase/'.$this->session->userdata('username'));
            }
            }
            redirect('profile/etalase/'.$this->session->userdata('username'));
        }else{
            $this->session->set_flashdata('errors', 'Barang tidak berhasil diperbarui!');
            redirect('warung', 'refresh');
        }

    }

    public function change_photo($id){
        $countfiles = count($_FILES['files']['name']);
        $data_photos = array();

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
            $data = array(
                'photo' => $data_photo
            );

            $this->db->where('id',$id);
            $this->db->update('items',$data);
            
            $this->session->set_flashdata('success', 'Barang telah berhasil diperbaruhi');
            redirect('item/show/'.$id);
        }else{
            $this->session->set_flashdata('errors', 'Barang gagal diperbaruhi');
            redirect('item/show/'.$id);
        }
    }

    public function delete($id){
        if($this->items->delete($id)){
            $this->session->set_flashdata('success', 'Barang telah berhasil dihapus');
            redirect('profile/etalase/'.$this->session->userdata('username'));
        }else{
            $this->session->set_flashdata('errors', 'Barang gagal dihapus');
            redirect('profile/etalase/'.$this->session->userdata('username'));
        }

    }
    public function hide($stat,$id)
    {
        $this->templates->update('items',['id'=>$id],['hide'=>$stat]);
        $this->session->set_flashdata('success', 'Show/Hide berhasil diubah');
        redirect('profile/etalase/'.$this->session->username);
    }
}
?>