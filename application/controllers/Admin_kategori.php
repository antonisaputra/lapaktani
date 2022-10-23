<?php

class Admin_kategori extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Kategori_model');
        $this->load->library('pagination');
    }
    
    public function index(){
        $data['title'] = "Admin Lapak Tani | Kategori";
        $config['base_url'] = "http://localhost/lapaktani/Admin_kategori/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
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

        $this->db->like('kategori', $data['keyword']);
        $this->db->from('kategori');
        
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['kategori'] = $this->Kategori_model->getKategori($config['per_page'], $data['start'], $data['keyword']);
        viewAdmin('Kategori','index',$data);
    }

    public function tambahKategori(){

        $data['title'] = "Admin Lapak Tani | Tambah Kategori";

        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim',array(
            'required' => 'Kategori wajib di isi !'
        ));

        if($this->form_validation->run() == FALSE){
            viewAdmin('Kategori','tambah',$data);
        }else{
            $this->Kategori_model->tambahKategori();
            $this->session->set_flashdata('pesan','Data Kategori Berhasil Ditambahkan');
            redirect('Admin_kategori');
        }
    }

    public function editKategori($id){
        $data['title'] = "Admin Lapak Tani | Tambah Kategori";
        $data['kategori'] = $this->Kategori_model->getKategoriById($id);

        $this->form_validation->set_rules('kategori','Kategori Produk','required|trim',array(
            'required' => 'Kategori wajib di isi !'
        ));

        if($this->form_validation->run() == FALSE){
            viewAdmin('Kategori','edit',$data);
        }else{
            $this->Kategori_model->edit($id);
            $this->session->set_flashdata('pesan','Data Kategori Berhasil Diedit');
            redirect('Admin_kategori');
        }
    }

    public function hapus($id){
        $this->Kategori_model->hapusDataKategori($id);
        // $this->session->set_flashdata('pesan','Data Kategori Berhasil Diedit');
        redirect('Admin_kategori');
    }

    // public function pdf(){
    //     $data['title'] = "Data Kategori";
    //     $date = date('d M Y H:i:s');
    //     $mpdf = new \Mpdf\Mpdf();
    //     $data['kategori']= $this->Kategori_model->getAllKategori();
    //     $pdfView = $this->load->view('Admin/Kategori/pdf',$data, TRUE);
    //     $mpdf->WriteHTML($pdfView);
    //     $mpdf->Output('Daftar Kategori'.$date.'.pdf',\Mpdf\Output\Destination::INLINE);
    // }
}