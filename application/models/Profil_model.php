<?php
class Profil_model extends CI_Model{

    public function ubahFotoProfil(){
        $gambar = $_FILES['gambar'];

        $config['upload_path'] = FCPATH . '/assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $gambar_lama = $this->input->post('gambar_lama');
          
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', ['profil'=> $gambar_lama]);
        } else {
            $gambar = $this->upload->data('file_name');
            $gambar_lama = $this->input->post('gambar_lama');

            if ($gambar_lama != 'default.png') {
                unlink(FCPATH . 'assets/upload/' . $gambar_lama);
            }

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', ['profil'=> $gambar]);
        }
    }

    public function ubahbiodata($id){
        $data = [
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no_hp', true),
            'alamat' =>  $this->input->post('alamat')
        ];


        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
    public function gantiPassword($id){
        $password_lama = $this->input->post('password_lama');
        if(password_verify($password_lama,queryUser('password'))){
            $data = ['password' => password_hash($this->input->post('password_baru1'),PASSWORD_DEFAULT)];

            $this->db->where('id',$id);
            $this->db->update('user',$data);
        }else{
            $this->session->set_flashdata('pesan_kesalahan','Password Anda Salah!');
            redirect('User_profil/ubahpassword/'.queryUser('id'));
        }
    }
}