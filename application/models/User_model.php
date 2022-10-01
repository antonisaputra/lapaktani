<?php

class User_model extends CI_Model{
    public function getUser($limit,$start,$keyword = null){
        if ($keyword) {
            $this->db->like('username', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('user', $limit, $start)->result_array();
    }
}