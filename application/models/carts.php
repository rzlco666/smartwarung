<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Model {
    public function store($id){
        $data = array(
            'id'    => $id,
            'username' => $this->session->userdata('username')
        );

        $this->db->insert('carts',$data);
    }

    public function get_all($username){
        $this->db->select(
            'carts.id,carts.username, 
            cart_details.item,cart_details.quantity, 
            items.id item_id,items.price,items.description,items.photo,items.name,items.username username_warung, items.stock,items.discount,
            users.username warung_username, users.name warung_name'
        );
        $this->db->from('carts');
        $this->db->join('cart_details', 'carts.id = cart_details.id');
        $this->db->join('items', 'items.id = cart_details.item');
        $this->db->join('users', 'items.username = users.username');
        $this->db->where('carts.username', $username);
        return $this->db->get()->result_array();
    }

    public function get_cart($username){
        $this->db->where('username', $username);
        return $this->db->get('carts')->row_array();
    }

    public function get_one_cart_details($id,$item){
        $this->db->where('id',$id);
        $this->db->where('item',$item);
        return $this->db->get('cart_details')->row_array();
    }

    public function store_details($id,$data){
        $data = array(
            'id'        => $id,
            'item'      => $data['item']['id'],
            'quantity'  => $this->input->post('quantity')
        );

        $this->db->insert('cart_details',$data);
    }

    public function update($id, $item, $quantity){
        $data = array(
            'quantity' => $quantity,
        );
   
        $this->db->where('id', $id);
        $this->db->where('item',$item);
        $this->db->update('cart_details',$data);
    }

    public function update_details($id,$item,$quantity){
        $data = array(
            'quantity' => $quantity
        );
        $this->db->where('id',$id);
        $this->db->where('item');
    }
}?>