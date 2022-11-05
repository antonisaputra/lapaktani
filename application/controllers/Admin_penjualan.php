<?php

class Admin_penjualan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('pagination');
        is_admin();
    }
    public function index(){
        $data['title'] = "Admin Lapak Tani | Penjualan Produk";
        $config['base_url'] = "http://localhost/lapaktani/Admin_penjualan/index";
        // $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['button'] = $this->input->post('submit');

        if (isset($data['button'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_flashdata('penjualan', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->flashdata('penjualan');
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
        $this->db->from('detail_penjualan');
        
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['penjualan'] = $this->Penjualan_model->getPenjualan($config['per_page'], $data['start'], $data['keyword']);
        // $data['penjualan'] = $this->db->get('detail_penjualan')->result_array();
        viewAdmin('Penjualan','index',$data);
    }
    
    public function detail($id){
        $data['title'] = "Admin Lapak Tani| Detail Penjualan";
        $data['penjualan'] = $this->db->get_where('detail_penjualan',['id'=> $id])->row_array();

        viewAdmin('Penjualan','detail',$data);
    }

    public function edit($id){
        $data['title'] = "Admin Lapak Tani| Edit Penjualan";
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['penjualan'] = $this->db->get_where('detail_penjualan',['id'=>$id])->row_array();

        

        $this->form_validation->set_rules('nama_produk','Nama Produk','required|trim',array(
            'required'=> "Nama Produk Wajib Diisi!"
        ));
        $this->form_validation->set_rules('nama_penjual','Nama Penjual','required|trim',array(
            'required'=> "Nama Penjual Wajib Diisi!"
        ));
        $this->form_validation->set_rules('alamat_penjual','Alamat Penjual','required|trim',array(
            'required'=> "Alamat Penjual Wajib Diisi!"
        ));
        $this->form_validation->set_rules('stok','Stok','required|trim',array(
            'required'=> "Stok Wajib Diisi!"
        ));
        $this->form_validation->set_rules('berat_satuan','Stok','required|trim',array(
            'required'=> "Berat Satuan Wajib Diisi!"
        ));
        $this->form_validation->set_rules('harga_satuan','Stok','required|trim',array(
            'required'=> "Harga Satuan Wajib Diisi!"
        ));

        if($this->form_validation->run() == false){
            viewAdmin('Penjualan','edit', $data);
        }else{
            $this->Penjualan_model->editPenjualan();
            $this->session->set_flashdata('pesan','Data Kategori Berhasil Diubah');
            redirect('Admin_penjualan');
        }
    }

    public function hapus($id){
        $penjualan = $this->db->get_where('penjualan',['id' => $id])->result_array();
        unlink(FCPATH.'assets/upload/'.$penjualan['gambar']);
        $this->db->where('id',$id);
        $this->db->delete('penjualan');
        redirect('Admin_penjualan');
    }
    // public function pdf(){
    //     $data['title'] = "Data Penjualan";
    //     $date = date('d M Y H:i:s');
    //     $mpdf = new \Mpdf\Mpdf();
    //     $data['penjualan']= $this->Penjualan_model->getAllPenjualan();
    //     $pdfView = $this->load->view('Admin/Penjualan/pdf',$data, TRUE);
    //     $mpdf->WriteHTML($pdfView);
    //     $mpdf->Output('Daftar Penjualan'.$date.'.pdf',\Mpdf\Output\Destination::INLINE);
    // }

    public function print(){
        $data['title'] = "Print Penjualan";
        $data['penjualan'] =$this->db->get('detail_penjualan')->result_array();
        $this->load->view('admin/Penjualan/print', $data);
    }
}