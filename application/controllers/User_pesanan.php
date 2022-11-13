<?php

class User_pesanan extends CI_Controller{
    public function index(){
        $data['title'] = "Pesanan";
        $data['pesanan'] = $this->db->get('detail_pesanan')->result_array();
        viewUser('Pesanan','index',$data);
    }
    public function detail($id){
        $data['title'] = "Detail Pesanan";

        $data['pesanan'] = $this->db->get_where('pesanan',['id' => $id])->row_array();
        $data['user'] = $this->db->get_where('user',['id' => $data['pesanan']['id_user']])->row_array();
        viewUser('Pesanan','detail', $data);
    }
}