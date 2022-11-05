<?php

class Keranjang_model extends CI_Model{
    public function tambahTransaksi(){
        $idkurir = $this->input->post('kurir');
        $kurir = $this->db->get_where('kurir',['id' => $idkurir])->row_array();
        $data = [
            'id_costumer' => queryUser('id'),
            'no_hp' => queryUser('no_hp'),
            'catatan_pembelian' => $this->input->post('catatan_pembelian', true),
            'alamat' => queryUser('alamat'),
            'ongkir' => $kurir['ongkir'],
            'id_pembayaran' => $this->input->post('bank', true),
            'no_rek' => $this->input->post('no_rek', true),
            'kurir' => $kurir['kurir'],
            'status' => "Belum Melakukan Pembayaran"
        ];

        $this->db->insert('transaksi', $data);
    }

    public function set_keranjang($id){
        $keranjang = $this->db->get_where('keranjang',['id_costumer' => $id,'id_transaksi' => "Belum_Transaksi"])->result_array();
        $transaksi = $this->db->query('SELECT * FROM transaksi ORDER BY id DESC LIMIT 1')->row_array();
        $noUrut = $transaksi['id'];

        foreach($keranjang as $k){
            $data = ['id_transaksi' => $noUrut,'status_barang' => 'Menunggu Pembayaran'];

            $this->db->where('id', $k['id']);
            $this->db->update('keranjang',$data);
        }
    }

    public function editKeranjang($id){
        $keranjang = $this->db->get_where('keranjang',['id' => $id])->row_array();

        $data = [
            'jumlah' => $this->input->post('jumlah', true),
            'subtotal' => $keranjang['harga'] * $this->input->post('jumlah', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('keranjang',$data);
    }

    public function getKeranjang($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        // $this->db->where('id_transaksi', 0);
        return $this->db->get_where('keranjang',['id_transaksi' => 0], $limit, $start)->result_array();
    }
    
}