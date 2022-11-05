<?php

class Kurir extends CI_Controller{
    public function index(){
        is_kurir();
        $data['title'] = "Kurir Dashboard";
        
        viewAdmin('Dashboard_kurir','index', $data);
    }
}