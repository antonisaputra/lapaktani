<?php

class Pesanan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        is_user();
    }
    public function index(){
        $data['title'] = "Pesanan Masuk";
        $user = queryUser('id');
        $data['keranjang'] = $this->db->get_where('keranjang',['id_penjual' => $user] )->result_array();
        viewUser('Pesanan Masuk','index', $data);
    }

    public function transaksi_pesanan(){
        $data['title'] = "Pesanan Masuk";
        $user = queryUser('id');
        $data['keranjang'] = $this->db->get_where('keranjang',['id_costumer' => $user] )->result_array();
        viewUser('Transaksi_pesanan','index', $data);
    }

    public function upload_pembayaran($idKeranjang){
        $data['title'] = "Upload Pembayaran";
        $upload = $this->input->post('upload_pembayaran');
        if(isset($upload)){
            $this->Pesanan_model->upload_pembayaran($idKeranjang);

        $this->db->where('id', $idKeranjang);
        $this->db->update('keranjang',['status_barang' => 'Pembayaran']);
            redirect('Pesanan/transaksi_pesanan');
        }else{
            viewUser('Transaksi_pesanan','upload_pembayaran', $data);
        }

    }

    public function lanjut_proses($id){
        $this->db->where('id', $id);
        $this->db->update('keranjang',['status_barang' => 'Proses']);
        redirect('Pesanan');
    }
}