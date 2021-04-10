<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('carts');
        $this->load->model('items');
        $this->load->library('cart');
    }

    public function index(){
        $data['carts'] = $this->carts->get_all($this->session->userdata('username'));

         $this->load->view('template/header');
         $this->load->view('cart/index',$data);
         $this->load->view('template/footer');
    }

    public function store($id_item){
        $data['item'] = $this->items->get_one_id($id_item);
        $data['cart'] = $this->carts->get_cart($this->session->userdata('username'));
        
        if($data['cart'] == null){
            // if cart not exist
            $id = uniqid('cart');

            // echo $id;

            $this->carts->store($id);
            $this->carts->store_details($id,$data);

            $this->session->set_flashdata('success', 'Barang telah ditambahkan dalam keranjang.');
            redirect('cart');
        }else{
            // if cart exist

            $data['cart_details'] = $this->carts->get_one_cart_details($data['cart']['id'],$data['item']['id']);
            // if cart-details doesn't exist
            if($data['cart_details']==null){
                $this->carts->store_details($data['cart']['id'],$data);
            }else{
                $quantity = $data['cart_details']['quantity'] + $this->input->post('quantity');
                $this->carts->update($data['cart_details']['id'],$data['cart_details']['item'],$quantity);
            }
            
            $this->session->set_flashdata('success', 'Barang telah ditambahkan dalam keranjang.');
            redirect('cart');
        }
    }

    public function update(){
        $data['cart'] = $this->carts->get_all($this->session->userdata('username'));

        $count = count($data['cart']);
        // echo($count.'</br>');

        for($i=0;$i<$count;$i++){
            $quantity   = $_POST['quantity'][$i];
            $id         = $data['cart'][$i]['id'];
            $item       = $data['cart'][$i]['item'];
            $this->carts->update($id,$item,$quantity);
        };


        $this->session->set_flashdata('success','Keranjang berhasil diperbarui');
        redirect('cart','refresh');
    }

    public function delete($item){
        $data['cart'] = $this->carts->get_cart($this->session->userdata('username'));

        $this->db->where('id',$data['cart']['id']);
        $this->db->where('item',$item);
        $this->db->delete('cart_details');

        $this->session->set_flashdata('success','Barang berhasil dihapus dari keranjang');
        redirect('cart','refresh');
    }
}
?>