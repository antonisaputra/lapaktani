<?php
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