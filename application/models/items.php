<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class items extends CI_Model {

    public function store($username, $photo){
        $data = array(
            'username'  => $username,
            'name'      => $this->input->post('name'),
            'category'  => $this->input->post('category'),
            'stock'     => $this->input->post('stock'),
            'price'     => $this->input->post('price'),
            'description'=> $this->input->post('description'),
            'photo'     => $photo
        );

        $this->db->insert('items', $data);
    }

    public function get_one_id($id){
        $this->db->where('id',$id);
        return $this->db->get('items')->row_array();
    }


    public function get_all(){
        return $this->db->get('items')->result_array();
    }
    public function get_all_(){
        $this->db->where('hide',0);
        $this->db->order_by('id', 'RANDOM');
        return $this->db->get('items')->result_array();
    }

    public function get_all_username($username){
        $this->db->where('username',$username);
        return $this->db->get('items')->result_array();
    }

    public function update($id){
        $data = array(
            'name'      => $this->input->post('name'),
            'stock'     => $this->input->post('stock'),
            'price'     => $this->input->post('price'),
            'description'=> $this->input->post('description'),
            'category'  => $this->input->post('category'),
            'discount'  => $this->input->post('discount')
        );
        
        $this->db->where('id', $id);
        if($this->db->update('items', $data)){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        if($this->db->delete('items')){
            return true;
        }else{
            return false;
        }
    }
    public function search_item_like($id,$item)
    {
        return $this->db->query('SELECT MATCH (name) AGAINST("'.$item.'") AS relevance,id,username,name,category,stock,price,description,photo,username as warung FROM `items` WHERE MATCH (name) AGAINST("'.$item.'") AND username != "'.$id.'"
        ORDER BY `relevance` DESC LIMIT 5');
    }
    public function search_item_warung($id,$warung)
    {
        return $this->db->query('SELECT items.id,items.username,items.name,items.category,items.stock,items.price,items.description,items.photo FROM `items` LEFT JOIN ratings ON ratings.item=items.id WHERE items.username = "'.$warung.'" AND items.id != '.$id.' ORDER BY ratings.rating DESC LIMIT 4');
    }

}
?>