<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories extends CI_Model {
    public function get_all(){
        return $this->db->get('categories')->result_array();
    }

    public function get_all_items(){
        $this->db->select('items.name, items.price, items.photo, items.description, items.stock, items.id,items.discount');
        $this->db->from('items');
        $this->db->join('categories', 'items.category = categories.id');
        $this->db->where('hide',0);
        return $this->db->get()->result_array();        
    }

    public function get_by_categories($id){
        $this->db->select('items.name, items.price, items.photo, items.description, items.stock, items.id,items.discount');
        $this->db->from('items');
        $this->db->join('categories', 'items.category = categories.id');
        $this->db->where('categories.id',$id);
        $this->db->where('hide',0);
        return $this->db->get()->result_array();
    }
    
    // batas baru

    public function get_by_categories_warung($id){
        $this->db->select('*');
        $this->db->from('items');
        // $this->db->join('categories', 'items.category = categories.id');
        $this->db->where(['category'=>$id,'username'=>$this->session->username]);
        $this->db->where('hide',0);
        return $this->db->get()->result_array();
    }
    public function get_all_item_warung(){
        $this->db->select('*');
        $this->db->from('items');
        // $this->db->join('categories', 'items.category = categories.id');
        $this->db->where('items.username',$this->session->username);
        return $this->db->get()->result_array();        
    }
}?>