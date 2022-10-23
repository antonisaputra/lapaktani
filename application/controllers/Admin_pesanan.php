<?php

class Admin_pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->library('Pagination');
    }

    public function index()
    {
        $data['title'] = "Admin Lapak Tani | Pesanan";
        $config['base_url'] = 'http://localhost/lapaktani/admin_pesanan/index';


        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('kategori', $data['keyword']);
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

        $this->db->like('nama_produk', $data['keyword']);
        $this->db->from('detail_pesanan');

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pesanan'] = $this->Pesanan_model->getPesanan($config['per_page'], $data['start'], $data['keyword']);
        viewAdmin('Pesanan', 'index', $data);
    }


    public function edit($id)
    {
        $data['title'] = "Admin Lapak Tani| Edit Penjualan";
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['Pesanan'] = $this->db->get_where('detail_pesanan', ['id' => $id])->row_array();



        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim', array(
            'required' => "Nama Produk Wajib Diisi!"
        ));
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required|trim', array(
            'required' => "Nama Penjual Wajib Diisi!"
        ));
        $this->form_validation->set_rules('alamat_pemesan', 'Alamat Pemesan', 'required|trim', array(
            'required' => "Alamat Penjual Wajib Diisi!"
        ));
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', array(
            'required' => "Stok Wajib Diisi!"
        ));
        $this->form_validation->set_rules('berat_satuan', 'Stok', 'required|trim', array(
            'required' => "Berat Satuan Wajib Diisi!"
        ));
        $this->form_validation->set_rules('harga_satuan', 'Stok', 'required|trim', array(
            'required' => "Harga Satuan Wajib Diisi!"
        ));

        if ($this->form_validation->run() == false) {
            viewAdmin('Pesanan', 'edit', $data);
        } else {
            $this->Pesanan_model->editPesanan();
            $this->session->set_flashdata('pesan', 'Data Pesanan Berhasil Diubah');
            redirect('Admin_pesanan');
        }
    }


    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pesanan');
        redirect('Admin_pesanan');
    }

    public function detail($id)
    {
        $data['title'] = "Admin Lapak Tani | Detail Penjualan";
        $data['pesanan'] = $this->db->get_where('detail_pesanan', ['id' => $id])->row_array();
        viewAdmin('Pesanan', 'detail', $data);
    }

    public function print(){
        $data['title'] = "Print Data Pesanan";
        $data['pesanan'] = $this->db->get('detail_pesanan')->result_array();
        $this->load->view('admin/Pesanan/print', $data);
    }
}
