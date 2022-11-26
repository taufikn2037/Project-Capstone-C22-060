<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
    
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/dashboard');
        $this->load->view('components_admin/footer');
    }
    
    public function kelola_pengaduan(){
        $data['title'] = 'Kelola Pengaduan';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/kelola');
        $this->load->view('components_admin/footer');
    }
}