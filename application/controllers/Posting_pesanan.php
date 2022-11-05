<?php

class Posting_pesanan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posting_pesanan_model');
        is_user();
    }
    public function index(){
        $data['title'] = "Postingan Pesanan";
        $data['pesanan'] = $this->Posting_pesanan_model->getPesanan();
        viewUser('Posting Pesanan','index', $data);
    }

    public function tambah(){
        $data['title'] = "Postingan Pesanan";
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('nama_produk','Nama Produk','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('detail','Deskripsi Produk','required|trim');
        $this->form_validation->set_rules('harga','Harga Produk','required|trim');
        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Posting Pesanan','tambah', $data);
        }else{
            $this->Posting_pesanan_model->tambah_pesanan();
            $this->session->set_flashdata('pesan','Produk Pesanan Berhasil Di Tambah');
            redirect('Posting_pesanan');
        }
    }

    public function edit($id){
        $data['title'] = "Postingan Pesanan Edit";
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['pesanan'] = $this->db->get_where('pesanan',['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_produk','Nama Produk','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('detail','Deskripsi Produk','required|trim');
        $this->form_validation->set_rules('harga','Harga Produk','required|trim');
        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Posting Pesanan','edit', $data);
        }else{
            $this->Posting_pesanan_model->editPesanan($id);
            $this->session->set_flashdata('pesan','Produk Pesanan Berhasil Di Ubah');
            redirect('Posting_pesanan');
        }
    }

    public function delete($id){
        $pesanan = $this->db->get_where('pesanan',['id' => $id])->result_array();
        unlink(FCPATH.'assets/upload'.$pesanan['gambar']);
        $this->db->where('id', $id);
        $this->db->delete('pesanan');
        redirect('Posting_pesanan');
    }

}