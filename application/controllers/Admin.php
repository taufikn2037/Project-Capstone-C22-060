<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function index(){
        $data['title'] = 'Dashboard';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/dashboard');
        $this->load->view('components_admin/footer');
    }
    
    public function kelola_pengaduan(){
        $data['title'] = 'Kelola Pengaduan';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/kelola');
        $this->load->view('components_admin/footer');
    }

    public function ekspor_data(){
        $data['title'] = 'Ekspor Data';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/ekspor');
        $this->load->view('components_admin/footer');
    }

    public function data_masyarakat(){
        $data['title'] = 'Data Masyarakat';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/masyarakat');
        $this->load->view('components_admin/footer');
    }

    public function data_petugas(){
        $data['title'] = 'Data Petugas';

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/petugas');
        $this->load->view('components_admin/footer');
    }
}