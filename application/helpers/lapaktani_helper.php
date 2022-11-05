<?php

use LDAP\Result;

function active_menu($dataActive)
{
    $ci = get_instance();
    $cekurl = $ci->uri->segment(1);

    if ($cekurl == $dataActive) {
        return "active";
    }
}

function viewAdmin($folder,$halaman, $data)
{
    $ci = get_instance();

    $ci->load->view('admin/tamplates/sidebar', $data);
    $ci->load->view('admin/tamplates/header', $data);
    $ci->load->view('admin/'.$folder.'/'.$halaman, $data);
    $ci->load->view('admin/tamplates/footer', $data);
}

function viewKurir($folder,$halaman, $data)
{
    $ci = get_instance();

    $ci->load->view('kurir/tamplates/sidebar', $data);
    $ci->load->view('kurir/tamplates/header', $data);
    $ci->load->view('kurir/'.$folder.'/'.$halaman, $data);
    $ci->load->view('kurir/tamplates/footer', $data);
}

function viewUser($folder,$halaman, $data)
{
    $ci = get_instance();
    $ci->load->view('user/Tamplates/header', $data);
    $ci->load->view('user/'.$folder.'/'.$halaman, $data);
    $ci->load->view('user/Tamplates/footer', $data);
}

function viewAuth($halaman, $data)
{
    $ci = get_instance();
    $ci->load->view('auth/'.$halaman, $data);
}

function queryUser($assoc){
    $ci = get_instance();
    
    $user = $ci->db->get_where('user',['email' => $ci->session->userdata('email')])->row_array();

    return $user[$assoc];
}

function queryTotalRiwayat($id, $ongkir){
    $ci = get_instance();

    $keranjang = $ci->db->get_where('keranjang',['id_transaksi' => $id])->result_array();
    $total = 0;
    foreach( $keranjang as $row){
        $total += $row['subtotal'];
    }

    $total = $total + $ongkir;

    return number_format($total, 2, ",", ".");
}

function is_admin(){
    $ci = get_instance();
    $adminRole = $ci->session->userdata('role'); 
    if($adminRole != "admin"){
        redirect('Auth');
    }
}

function is_kurir(){
    $ci = get_instance();
    $kurirRole = $ci->session->userdata('role'); 
    if($kurirRole != "kurir" && $kurirRole != "admin"){
        redirect('Auth');
    }
}

function is_user(){
    $ci = get_instance();
    $userRole = $ci->session->userdata('role'); 
    if($userRole != "user"){
        redirect('Auth');
    }
}