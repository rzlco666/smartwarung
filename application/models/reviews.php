<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reviews extends CI_Model {
    public function store($data){
        return $this->db->insert('reviews',$data);
    }

    public function get($id){
        $this->db->from('reviews');
        $this->db->join('users','users.username=reviews.username');
        $this->db->where('item',$id);
        return $this->db->get()->result_array();
    }

    public function is_exist($item){
        $this->db->where('item',$item);
        if($this->db->get('reviews')->result_array()!=null){
            return true;
        }else{
            return false;
        }
    }

    public function is_exist_user($user,$item){
        $this->db->where('reviews.username',$user);
        $this->db->where('reviews.item',$item);
        if($this->db->get()->result_array()){
            return true;
        }else{
            return false;
        }
    }
}
?>