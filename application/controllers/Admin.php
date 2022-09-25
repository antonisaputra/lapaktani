<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function index(){
        $data['title'] = "Admin Lapak Tani | Dashboard";
        $num_penjualan = $this->db->get('penjualan')->num_rows();
        $num_pesanan = $this->db->get('pesanan')->num_rows();
        $data['num_produk'] = $num_pesanan+$num_penjualan;

        viewAdmin('Dashboard','index',$data);
    }
}