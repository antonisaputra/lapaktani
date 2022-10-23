<?php

class Admin_keranjang extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keranjang_model');
    }
    public function index(){
        $data['title'] = "Admin Lapak Tani | Penjualan Produk";
        $config['base_url'] = "http://localhost/lapaktani/Admin_keranjang/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('keranjang', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('keranjang');
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

        $this->db->like('nama_produk', $data['keyword']);
        $this->db->from('keranjang');
        
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['keranjang'] = $this->Keranjang_model->getKeranjang($config['per_page'], $data['start'], $data['keyword']);
        // $data['penjualan'] = $this->db->get('detail_penjualan')->result_array();
        viewAdmin('Keranjang','index',$data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('keranjang');
        redirect('Admin_keranjang');
    }
}