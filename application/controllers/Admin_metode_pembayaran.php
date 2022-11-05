<?php

class Admin_metode_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Metode_pembayaran_model');
    }

    public function index()
    {
        $data['title'] = "Metode Pembayaran";
        $config['base_url'] = "http://localhost/lapaktani/Admin_metode_pembayaran/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('pembayaran', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('pembayaran');
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

        $this->db->like('metode_pembayaran', $data['keyword']);
        $this->db->from('pembayaran');

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pembayaran'] = $this->Metode_pembayaran_model->getPembayaran($config['per_page'], $data['start'], $data['keyword']);
        viewAdmin('Metode_Pembayaran', 'index', $data);
    }

    public function tambah(){
        $data['title'] = "Tambah Metode Pembayaran";
        $this->form_validation->set_rules('metode_pembayaran','Metode Pembayaran','required|trim|is_unique[pembayaran.metode_pembayaran]');
        $this->form_validation->set_rules('no_rekening','No Rekening','required|trim');
        if($this->form_validation->run() == false){
            viewAdmin('Metode_Pembayaran','tambah', $data);
        }else{
            $this->Metode_pembayaran_model->tambahPembayaran();
            $this->session->set_flashdata('pesan','Metode Pembayarn Berhasil Di Tambah');
            redirect('Admin_metode_pembayaran');
        }
    }

    public function edit($id){
        $data['title'] = "Tambah Metode Pembayaran";

        $data['pembayaran'] = $this->db->get_where('pembayaran',['id' => $id])->row_array();

        $this->form_validation->set_rules('metode_pembayaran','Metode Pembayaran','required|trim|is_unique[pembayaran.metode_pembayaran]');
        $this->form_validation->set_rules('no_rekening','No Rekening','required|trim');
        if($this->form_validation->run() == false){
            viewAdmin('Metode_Pembayaran','edit', $data);
        }else{
            $this->Metode_pembayaran_model->editPembayaran($id);
            $this->session->set_flashdata('pesan','Metode Pembayarn Berhasil Di Ubah');
            redirect('Admin_metode_pembayaran');
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('pembayaran');
        redirect('Admin_metode_pembayaran');
    }
}
