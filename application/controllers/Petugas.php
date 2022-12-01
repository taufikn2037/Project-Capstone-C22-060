<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function kelola_pengaduan()
    {
        $data['title'] = 'Kelola Pengaduan';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/kelola');
        $this->load->view('components_admin/footer');
    }
}
