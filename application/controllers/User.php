<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_user();
        
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function data_pengaduan()
    {
        $data['title'] = 'Data Pengaduan';
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/data_pengaduan');
        $this->load->view('components_admin/footer');
    }

    public function tambah_pengaduan()
    {
        $data['title'] = 'Tambah Pengaduan';
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/tambah_pengaduan');
        $this->load->view('components_admin/footer');
    }
}
