<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function kelola_pengaduan()
    {
        $data['title'] = 'Kelola Pengaduan';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/kelola');
        $this->load->view('components_admin/footer');
    }

    public function ekspor_data()
    {
        $data['title'] = 'Ekspor Data';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/ekspor');
        $this->load->view('components_admin/footer');
    }

    public function data_masyarakat()
    {
        $data['title'] = 'Data Masyarakat';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/masyarakat');
        $this->load->view('components_admin/footer');
    }

    public function data_petugas()
    {
        $data['title'] = 'Data Petugas';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/petugas');
        $this->load->view('components_admin/footer');
    }
}
