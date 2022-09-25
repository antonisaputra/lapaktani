<?php

class Kategori_model extends CI_model{

    public function tambahKategori(){
        $data = array(
            'kategori' => $this->input->post('kategori', true)
        );

        $this->db->insert('kategori',$data);
    }
    public function getKategoriById($id){
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function getKategori($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('kategori', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('kategori', $limit, $start)->result_array();
    }
    public function edit($id){
        $data = array(
            'kategori' => $this->input->post('kategori', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }
    public function hapusDataKategori($id){
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }

    public function getAllKategori(){
        return $this->db->get('kategori')->result_array();
    }
}