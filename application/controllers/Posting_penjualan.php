<?php

class Posting_penjualan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Postingan_penjualan_model');
        is_user();
    }
    public function index(){
        $data['title'] = "Posting Penjualan";
        $data['postinganPenjualan'] = $this->Postingan_penjualan_model->get_Postingan();
        viewUser('Posting Penjualan','index', $data);
    }

    public function tambah(){
        $data['title'] = "Postingan Penjualan";
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('nama_produk','Nama Produk','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('detail','Deskripsi Produk','required|trim');
        $this->form_validation->set_rules('harga','Harga Produk','required|trim');
        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Posting Penjualan','tambah', $data);
        }else{
            $this->Postingan_penjualan_model->tambah_penjualan();
            $this->session->set_flashdata('pesan','Produk Penjualan Berhasil Di Tambah');
            redirect('Posting_penjualan');
        }
    }

    public function edit($id){
        $data['title'] = "Postingan Penjualan Edit";
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['penjualan'] = $this->db->get_where('penjualan',['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_produk','Nama Produk','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('detail','Deskripsi Produk','required|trim');
        $this->form_validation->set_rules('harga','Harga Produk','required|trim');
        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Posting Penjualan','edit', $data);
        }else{
            $this->Postingan_penjualan_model->editPenjualan($id);
            $this->session->set_flashdata('pesan','Produk Penjualan Berhasil Di Ubah');
            redirect('Posting_penjualan');
        }
    }

    public function delete($id){
        $penjualan = $this->db->get_where('penjualan',['id' => $id])->result_array();
        unlink(FCPATH.'assets/upload/'.$penjualan['gambar']);
        $this->db->where('id', $id);
        $this->db->delete('penjualan');
        redirect('Posting_penjualan');
    }
}