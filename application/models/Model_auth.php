<?php

class Model_auth extends CI_Model{
    public function registrasi(){
        $data = [
            'username' => $this->input->post('nama_lengkap', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no_hp', true),
            'alamat' => $this->input->post('alamat_lengkap', true),
            'profil' => "default.png",
            'is_active' => 0,
            'role' => "user",
        ];

        $this->db->insert('user', $data);
    }

    public function token($token){

        $user_token = [
            'email' => $this->input->post('email',true),
            'token' =>  $token,
            'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
    }

    public function gantiPassword(){
        $password = $this->input->post('password1', true);
        $email = $this->session->userdata('reset_email');
        $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->where('email', $email);
        $this->db->update('user',$data);
    }
}