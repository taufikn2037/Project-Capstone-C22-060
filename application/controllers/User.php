<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/dashboard');
        $this->load->view('components_admin/footer');
    }
    
    public function data_pengaduan(){
        $data['title'] = 'Data Pengaduan';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/data_pengaduan');
        $this->load->view('components_admin/footer');
    }

    public function tambah_pengaduan(){
        $data['title'] = 'Tambah Pengaduan';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/tambah_pengaduan');
        $this->load->view('components_admin/footer');
    }
}