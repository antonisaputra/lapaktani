<?php

class Admin_laporan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }
    public function index(){
        $data['title'] = "Laporan";
        $config['base_url'] = "http://localhost/lapaktani/Admin_Laporan/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['button'] = $this->input->post('cari_laporan');

        if (isset($data['button'])) {
            $mulai = $this->input->post('mulai');
            $selesai = $this->input->post('selesai');
            $data['mulai'] = $this->input->post('mulai');
            $data['selesai'] = $this->input->post('selesai');
            // $mulai1 =  date("d M Y h:i:s", strtotime($mulai));
            // $selesai1 =  date("d M Y h:i:s", strtotime($selesai));
            $data['transaksi'] = $this->Laporan_model->getLaporan($mulai, $selesai);
            // $data['transaksi'] = $this->db->get('keranjang_transaksi')->result_array();
        } else {
            $data['keyword'] = $this->session->flashdata('laporan');
        }

        // $config['num_links'] = 6;
        

        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';


        // $config['next_link'] = 'Next';
        // $config['next_tag_open'] = '<li class="page-item"><div class="page-link">';
        // $config['next_tag_close'] = '</div></li>';

        // $config['prev_link'] = 'Previous';
        // $config['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
        // $config['prev_tag_close'] = '</div></li>';

        // $config['cur_tag_open'] = '<li class="page-item active"><div class="page-link">';
        // $config['cur_tag_close'] = '</div></li>';

        // $config['num_tag_open'] = '<li class="page-item"><div class="page-link">';
        // $config['num_tag_close'] = '</div></li>';

        // $this->db->like('nama_produk', $data['keyword']);
        // $this->db->from('keranjang_transaksi');
        
        // $config['total_rows'] = $this->db->count_all_results();
        // $config['per_page'] = 20;

        // $this->pagination->initialize($config);
        // $data['start'] = $this->uri->segment(3);
        // $data['transaksi'] = $this->Laporan_model->getLaporan($config['per_page'], $data['start'], $data['keyword']);
        viewAdmin('Laporan','index',$data);
    }

    public function print($mulai, $selesai){
        $data['title'] = "Laporan Penjualan";
        $date = date('d F Y h:i:s A');
        $mpdf = new \Mpdf\Mpdf();
        $data['transaksi'] = $this->Laporan_model->getLaporan($mulai, $selesai);
        $pdfView = $this->load->view('Admin/Laporan/print',$data, TRUE);
        $mpdf->WriteHTML($pdfView);
        $mpdf->Output('Laporan'.$date.'.pdf',\Mpdf\Output\Destination::INLINE);
    }

}