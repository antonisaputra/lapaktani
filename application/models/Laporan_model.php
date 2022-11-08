<?php

class Laporan_model extends CI_Model{
    public function getLaporan($mulai, $selesai){
        // $this->db->where('status_barang','Barang Sampai');
        return $this->db->query("SELECT * FROM keranjang_transaksi WHERE  waktu BETWEEN '$mulai' AND '$selesai'")->result_array();
    }
}