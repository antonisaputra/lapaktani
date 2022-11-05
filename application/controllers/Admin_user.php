<?php

class Admin_user extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        is_admin();
    }
    public function index(){
        $data['title'] = "Admin Lapak Tani | User";
        $config['base_url'] = 'http://localhost/lapaktani/Admin_user/index';

        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('user', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('kategori');
        }

        $config['num_links'] = 6;


        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';


        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item"><div class="page-link">';
        $config['next_tag_close'] = '</div></li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
        $config['prev_tag_close'] = '</div></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><div class="page-link">';
        $config['cur_tag_close'] = '</div></li>';

        $config['num_tag_open'] = '<li class="page-item"><div class="page-link">';
        $config['num_tag_close'] = '</div></li>';

        $this->db->like('username', $data['keyword']);
        $this->db->from('user');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['user'] = $this->User_model->getUser($config['per_page'], $data['start'], $data['keyword']);

        viewAdmin('User','index',$data);
    }
    public function hapus($id){
        $this->db->where('id',$id);
        $this->db->delete('user');
        redirect('Admin_user');
    }

    public function tambah_kurir(){
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
            viewAdmin('User','tambah', $data);
        }else{
            $this->User_model->tambahKurir();
            $this->session->set_flashdata('pesan', 'Behasil Registrasi!');
            redirect('Admin_user');
        }
    }
}