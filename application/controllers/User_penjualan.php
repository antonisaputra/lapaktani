<?php 


class User_penjualan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        
        $data['penjualan'] = $this->db->get('detail_penjualan')->result_array();
        $this->load->view('user/Tamplates/header', $data);
        $this->load->view('user/Penjualan/index', $data);
        $this->load->view('user/Tamplates/footer', $data);
    }
}