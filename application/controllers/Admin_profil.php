<?php

class Admin_profil extends CI_Controller{
    public  function __construct()
    {
        parent::__construct();

        $this->load->model('Profil_model');
    }
    public function index(){
        $data['title'] = "Admin Profil";

        $submit = $this->input->post('profil');

        if(isset($submit)){
            $this->Profil_model->ubahFotoProfil();
            $this->session->set_flashdata('pesan','Profil Berhasil Di Ubah');
            redirect('Admin_profil');
        }else{
            viewAdmin('Profil','index',$data);
        }
    }

    public function ubah($id){
        $data['title'] = "Ubah Biodata";
        $data['user'] = $this->db->get_where('user',['id' => $id])->row_array();

        $this->form_validation->set_rules('username','Nama Lengkap','required|trim');
        $this->form_validation->set_rules('no_hp','Nomor Heandphone','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim');

        if($this->form_validation->run() == false){
            viewAdmin('Profil','ubah',$data);
        }else{
            $this->Profil_model->ubahbiodata($id);
            $this->session->set_flashdata('pesan','Biodata Berhasil Di Ubah');
            redirect('Admin_profil');
        }
    }

    public function gantiPassword($id){
        $data['title'] = 'Ubah Password';

        $this->form_validation->set_rules('password_lama','Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru','required|matches[password_baru2]|min_length[5]',[
            'matches' => "Password baru tidak cocok",
            'min_length' => "Panjang password harus lebih dari 5"
        ]);
        $this->form_validation->set_rules('password_baru1', 'Password Baru','required|matches[password_baru1]|min_length[5]');

        if($this->form_validation->run() == false){
            viewAdmin('Profil','ubahPassword', $data);
        }else{
            $this->Profil_model->gantiPassword($id);
            $this->session->set_flashdata('pesan','Password Berhasil Di Ubah!');
            redirect('Admin_profil');
        }
    }
}