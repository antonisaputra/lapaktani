<?php

class Metode_pembayaran_model extends CI_Model{
    public function getPembayaran($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('metode_pembayaran', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pembayaran', $limit, $start)->result_array();
    }

    public function tambahPembayaran(){
        $data = [
            'metode_pembayaran' => $this->input->post('metode_pembayaran', true),
            'no_rekening' => $this->input->post('no_rekening', true),
        ];

        $this->db->insert('pembayaran', $data);
    }

    public function editPembayaran($id){
        $data = [
            'metode_pembayaran' => $this->input->post('metode_pembayaran', true),
            'no_rekening' => $this->input->post('no_rekening', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('pembayaran', $data);
    }
}