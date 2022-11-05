<?php

class Pengiriman_model extends CI_Model{
    public function getPengiriman($limit, $start, $keyword = null, $status=null){
        if($keyword){
            $this->db->like('username', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('pengiriman_barang',['status_barang' => $status], $limit, $start)->result_array();
    }

    public function upload_bukti($id){
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
           $this->session->set_flashdata('pesan','Bukti Barang Terkirim Gagal Di Upload');
           redirect('Barang_terkirim');
        } else {
            $gambar = $this->upload->data('file_name');

            $data = array(
                'bukti_barang_sampai' => $gambar
            );
            $this->db->where('id_keranjang', $id);
            $this->db->update('bukti_pembayaran', $data);
        }
    }

    public function ubah_status_terkirim($id){
        $data = [
            'status_barang' => 'Barang Sampai'
        ];

        $this->db->where('id', $id);
        $this->db->update('keranjang', $data);
    }
}