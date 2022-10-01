<?php

class Auth extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }
    public function index(){
        $data['title'] = "Login Lapak Tani";

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run() == false){
            viewAuth('login',$data);
        }else{
            $this->_login();
        }

    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
        if($user){
            if(password_verify($password,$user['password'])){
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                if($user['role'] == "admin"){
                    redirect('Admin');
                }else{
                    redirect('User_penjualan');
                }
            }else{
                $this->session->set_flashdata('pesan_kesalahan', 'Password Anda Salah!');
                redirect('Auth');    
            }
        }else{
            $this->session->set_flashdata('pesan_kesalahan', 'Email Belum Terdaftar!');
            redirect('Auth');
        }
    }

    public function registrasi(){
        $data['title'] = "Registrasi Lapak Tani";

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','required|trim');
        $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique'=> 'Email Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir','required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jeni_Kelamin','required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Headphone','required|trim');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap','required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai',
            'min_length' => 'Password Terlalu Pendek Minimal 5 Karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            viewAuth('registrasi', $data);
        }else{
            $this->Model_auth->registrasi();
            $this->session->set_flashdata('pesan', 'Behasil Registrasi!');
            redirect('Auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', 'Anda Berhasil Keluar!');
        redirect('Auth');
    }
}