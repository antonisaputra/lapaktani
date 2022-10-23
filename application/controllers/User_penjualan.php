<?php 


class User_penjualan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
    }
    public function index(){
        $data['title'] = "Penjualan";
        $cari = $this->input->post('cari_penjualan');
        if(isset($cari)){
            $data['penjualan'] = $this->Penjualan_model->cariDataPenjualan();
        }else{
            $data['penjualan'] = $this->db->get('detail_penjualan')->result_array();
        }
        viewUser('Penjualan','index',$data);
    }
    public function detail($id){
        $data['title'] = "Detail Penjualan";
        $data['penjualan'] = $this->db->get_where('detail_penjualan',['id' => $id])->row_array();
        viewUser('Penjualan','detail', $data);
    }
    public function tambahKeranjang(){
        $idProduk = $this->input->post('id');
        $produk = $this->db->get_where('penjualan',['id' => $idProduk])->row_array();

        $btnKeranjang = $this->input->post('keranjang');

        if(isset($btnKeranjang)){
            $data = [
                'id_transaksi' => "Belum_Transaksi",
                'id_costumer' => queryUser('id'),
                'id_produk' => $idProduk,
                'id_penjual' => $produk['id_user'],
                'nama_produk' => $produk['nama_produk'],
                'jumlah' => $this->input->post('jumlah', true),
                'harga' => $produk['harga_satuan'],
                'subtotal' => $this->input->post('jumlah', true)*$produk['harga_satuan']
            ];

            $this->db->insert('keranjang',$data);
            redirect('User_keranjang');
        }

    }
}