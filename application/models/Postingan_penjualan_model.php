<?php

class Postingan_penjualan_model extends CI_Model
{
    public function get_Postingan()
    {
        $userId = queryUser('id');
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('penjualan', ['id_user' => $userId])->result_array();
    }

    public function tambah_penjualan()
    {
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesan', 'Gambar gagal di upload!');
            redirect('Posting_penjualan/tambah');
        } else {
            $gambar = $this->upload->data('file_name');
            $data = [
                'id_user' => queryUser('id'),
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori'),
                'nama_penjual' => queryUser('username'),
                'alamat_penjual' => queryUser('alamat'),
                'stok' => $this->input->post('stok'),
                'berat_satuan' => 1,
                'harga_satuan' => $this->input->post('harga'),
                'gambar' => $gambar,
                'detail' => $this->input->post('detail')
            ];

            $this->db->insert('penjualan', $data);
        }
    }


    public function editPenjualan($id)
    {
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar_lama = $this->input->post('gambar_lama');
            $data = [
                'id_user' => queryUser('id'),
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori'),
                'nama_penjual' => queryUser('username'),
                'alamat_penjual' => queryUser('alamat'),
                'stok' => $this->input->post('stok'),
                'berat_satuan' => 1,
                'harga_satuan' => $this->input->post('harga'),
                'gambar' => $gambar_lama,
                'detail' => $this->input->post('detail')
            ];

            $this->db->where('id', $id);
            $this->db->update('penjualan', $data);
        } else {
            $gambar = $this->upload->data('file_name');
            $gambar_lama = $this->input->post('gambar_lama');

            if ($gambar_lama != 'default.jpg') {
                unlink(FCPATH . 'assets/upload/' . $gambar_lama);
            }

            $data = [
                'id_user' => queryUser('id'),
                'nama_produk' => $this->input->post('nama_produk', true),
                'id_kategori' => $this->input->post('kategori'),
                'nama_penjual' => queryUser('username'),
                'alamat_penjual' => queryUser('alamat'),
                'stok' => $this->input->post('stok'),
                'berat_satuan' => 1,
                'harga_satuan' => $this->input->post('harga'),
                'gambar' => $gambar,
                'detail' => $this->input->post('detail')
            ];

            
            $this->db->where('id', $id);
            $this->db->update('penjualan', $data);
        }
    }
}
