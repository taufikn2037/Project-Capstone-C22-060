<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_petugas();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/dashboard');
        $this->load->view('components_admin/footer');
    }
}
