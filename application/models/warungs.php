<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warungs extends CI_Model {
    public function get_users_warung($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('warungs','users.username = warungs.username');
        $this->db->where('users.username',$username);
        return $this->db->get()->row_array();
    }
}
?>