<?php

class User_model extends CI_Model{
    public function getUser($limit,$start,$keyword = null){
        if ($keyword) {
            $this->db->like('username', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('user', $limit, $start)->result_array();
    }

    public function tambahKurir(){
        $data = [
            'username' => $this->input->post('nama_lengkap', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no_hp', true),
            'alamat' => $this->input->post('alamat_lengkap', true),
            'profil' => "default.png",
            'role' => "kurir",
        ];

        $this->db->insert('user', $data);
    }
}