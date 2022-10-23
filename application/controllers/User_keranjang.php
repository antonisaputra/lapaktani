<?php 

class User_keranjang extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keranjang_model');
    }
    public function index(){
        $data['title'] = "Keranjang";
        $data['keranjang'] = $this->db->get('join_keranjang_produk')->result_array();
        viewUser('Keranjang','index',$data);   
    }
    
    public function checkout(){
        $data['title'] = "Checkout";
        $data['kurir'] = $this->db->get('kurir')->result_array();
        // $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('bank','Bank','required');
        $this->form_validation->set_rules('kurir','Kurir','required');

        if($this->form_validation->run() == false){
            viewUser('Keranjang','checkout',$data);
        }else{
            $iduser = queryUser('id'); 
            $this->Keranjang_model->tambahTransaksi();
            $this->Keranjang_model->set_keranjang($iduser);
            redirect('Riwayat_transaksi');
        }

    }

    public function edit($id){
        $data['title'] = "Edit Keranjang";
        $data['keranjang'] = $this->db->get_where('join_keranjang_produk',['id' => $id])->row_array();

        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');

        if($this->form_validation->run() == false){
            viewUser('Keranjang','edit', $data);
        }else{
            $this->Keranjang_model->editKeranjang($id);
            redirect('User_keranjang');
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('keranjang');
        redirect('User_keranjang');
    }
    
}