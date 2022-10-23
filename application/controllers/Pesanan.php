<?php

class Pesanan extends CI_Controller{
    public function index(){
        $data['title'] = "Pesanan Masuk";
        $user = queryUser('id');
        $data['keranjang'] = $this->db->get_where('keranjang',['id_penjual' => $user] )->result_array();
        viewUser('Pesanan Masuk','index', $data);
    }
}