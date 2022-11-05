<?php

class User_profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('User_penjualan');
        }
        $this->load->model('Profil_model');
        is_user();
    }
    public function index()
    {
        $data['title'] = "Profil";

        $submit = $this->input->post('gantipp');
        if(isset($submit)){
            $this->Profil_model->ubahFotoProfil();
            $this->session->set_flashdata('pesan', 'Profil Berhasil Diubah!');
            redirect('User_profil');
        }else{
            viewUser('Profil', 'index', $data);
        }
    }

    public function ubahbiodata($id){
        $data['title'] = "Ubah Biodata";
        $data['user'] = $this->db->get_where('user',['id' => $id])->row_array();

        $this->form_validation->set_rules('username','Nama Lengkap','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',[
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('no_hp','Nomor Heandphone','required|trim');

        $this->form_validation->set_rules('alamat','Alamat','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Profil','ubahbiodata', $data);
        }else{
            $this->Profil_model->ubahbiodata($id);
            $this->session->set_flashdata('pesan','Biodata Berhasil Di Ubah');
            redirect('User_profil');
        }
    }

    public function ubahpassword($id){
        $data['title'] = 'Ubah Password';

        $this->form_validation->set_rules('password_lama','Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru','required|matches[password_baru2]|min_length[5]',[
            'matches' => "Password baru tidak cocok",
            'min_length' => "Panjang password harus lebih dari 5"
        ]);
        $this->form_validation->set_rules('password_baru1', 'Password Baru','required|matches[password_baru1]|min_length[5]');

        if($this->form_validation->run() == false){
            viewUser('Profil','ubahpassword', $data);
        }else{
            $this->Profil_model->gantiPassword($id);
            $this->session->set_flashdata('pesan','Password Berhasil Di Ubah!');
            redirect('User_profil');
        }

    }
}
