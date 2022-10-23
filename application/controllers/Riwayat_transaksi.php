<?php

class Riwayat_transaksi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Riwayat_model');
    }
    public function index(){
        $data['title'] = "Riwayat Transaksi";
        $idUser = queryUser('id');
        $data['riwayat'] = $this->Riwayat_model->getRiwayat($idUser);
        viewUser('Riwayat_transaksi','index',$data);
    }
    public function detailTransaksi($id){
        $data['title'] = "Detail Riwayat Transaksi";
        $data['riwayat'] = $this->db->get_where('transaksi',['id' => $id])->row_array();
        $data['keranjang'] = $this->db->get_where('keranjang',['id_transaksi' => $data['riwayat']['id']])->result_array();
        viewUser('Riwayat_transaksi','detailTransaksi', $data);
    }
}