<?php

class Penjualan_model extends CI_Model
{
    public function getPenjualan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('detail_penjualan', $limit, $start)->result_array();
    }

    public function getAllPenjualan(){
        return $this->db->get('detail_penjualan')->result_array();
    }
    public function editPenjualan()
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
                'nama_penjual' => $this->input->post('nama_penjual', true),
                'alamat_penjual' => $this->input->post('alamat_penjual', true),
                'stok' => $this->input->post('stok', true),
                'berat_satuan' => $this->input->post('berat_satuan', true),
                'harga_satuan' => $this->input->post('harga_satuan', true),
                'gambar' => $gambar_lama
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('penjualan', $data_lama);
        } else {
            $gambar = $this->upload->data('file_name');
            $gambar_lama = $this->input->post('gambar_lama');

            if ($gambar_lama != 'default.jpg') {
                unlink(FCPATH . 'assets/upload/' . $gambar_lama);
            }

            $data = array(
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori', true),
                'nama_penjual' => $this->input->post('nama_penjual', true),
                'alamat_penjual' => $this->input->post('alamat_penjual', true),
                'stok' => $this->input->post('stok', true),
                'berat_satuan' => $this->input->post('berat_satuan', true),
                'harga_satuan' => $this->input->post('harga_satuan', true),
                'gambar' => $gambar
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('penjualan', $data);
        }
    }

    public function cariDataPenjualan(){
        $keyword = $this->input->post('keyword_penjualan');

        $this->db->like('nama_produk', $keyword);
        return $this->db->get('detail_penjualan')->result_array();
    }
}
