<?php

class Barang_sampai extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengiriman_model');
        is_kurir();
    }

    public function index(){
        $data['title'] = "Barang Sampai";
        $config['base_url'] = "http://localhost/lapaktani/Barang_sampai/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('sampai', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('sampai');
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
        $this->db->from('pengiriman_barang');
        
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['proses_pengiriman'] = $this->Pengiriman_model->getPengiriman($config['per_page'], $data['start'], $data['keyword'], 'Barang Sampai');

        viewAdmin('Pengiriman_barang','terkirim', $data);
    }
}