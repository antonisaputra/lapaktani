<?php

class Pesanan_model extends CI_Model{
    public function getAllpensanan(){
        return $this->db->get('detail_pesanan')->result_array();
    }
    public function getPesanan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('detail_pesanan', $limit, $start)->result_array();
    }
    public function editPesanan()
    {
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar_lama = $this->input->post('gambar_lama');
            $data_lama = array(
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori', true),
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'alamat_pemesan' => $this->input->post('alamat_pemesan', true),
                'stok' => $this->input->post('stok', true),
                'berat_satuan' => $this->input->post('berat_satuan', true),
                'harga_satuan' => $this->input->post('harga_satuan', true),
                'gambar' => $gambar_lama
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pesanan', $data_lama);
        } else {
            $gambar = $this->upload->data('file_name');
            $gambar_lama = $this->input->post('gambar_lama');

            if ($gambar_lama != 'default.jpg') {
                unlink(FCPATH . 'assets/upload/' . $gambar_lama);
            }

            $data = array(
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori', true),
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'alamat_pemesan' => $this->input->post('alamat_pemesan', true),
                'stok' => $this->input->post('stok', true),
                'berat_satuan' => $this->input->post('berat_satuan', true),
                'harga_satuan' => $this->input->post('harga_satuan', true),
                'gambar' => $gambar
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pesanan', $data);
        }
    }

    public function upload_pembayaran($idKeranjang){
        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            redirect('Pesanan/transaksi_pesanan');
        } else {
            $gambar = $this->upload->data('file_name');

            $data = [
                'id_keranjang' => $idKeranjang,
                'bukti_pembayaran' => $gambar,
                'bukti_barang_sampai' => ''
            ];

            $this->db->insert('bukti_pembayaran', $data);

            $this->db->where('id',$idKeranjang);
            $this->db->update('keranjang',['status_barang' => 'Pembayaran Berhasil']);
        }
    }

}