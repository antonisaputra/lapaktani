<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function index(){
        is_admin();
        $data['title'] = "Admin Lapak Tani | Dashboard";
        $num_penjualan = $this->db->get('penjualan')->num_rows();
        $num_pesanan = $this->db->get('pesanan')->num_rows();
        $data['num_user'] = $this->db->get('user')->num_rows();
        $data['num_produk'] = $num_pesanan+$num_penjualan;
        $data['num_transaksi'] = $this->db->get('transaksi')->num_rows();

        viewAdmin('Dashboard','index',$data);
    }
}