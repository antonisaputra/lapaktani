<?php

class Riwayat_model extends CI_Model{
    public function getRiwayat($id){
        $this->db->order_by('id','DESC');

        return $this->db->get_where('transaksi',['id_costumer' => $id])->result_array();
    }
}