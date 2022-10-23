<?php

class Transaksi_model extends CI_Model{
    public function getTransaksi($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('username', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('transaksi_user', $limit, $start)->result_array();
    }
}