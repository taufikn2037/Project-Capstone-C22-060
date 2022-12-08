<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->model('Tanggapan_m');
		$this->load->model('Pengaduan_m');
        is_logged_in_admin();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['users'] = $this->db->get('users')->num_rows();
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
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
        $data['data_masyarakat'] = $this->m_model->get_data('users')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/masyarakat', $data);
        $this->load->view('components_admin/footer');
    }

    public function data_petugas()
    {
        $data['title'] = 'Data Petugas';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_petugas'] = $this->m_model->get_data('admins')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/petugas', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_petugas()
    {
        $data['title'] = 'Tambah Data Petugas';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/tambah_petugas', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_petugas_aksi()
    {
        $data = array(
            'name__admin' => $this->input->post('name__admin'),
            'username__admin' => $this->input->post('username__admin'),
            'password__admin' => $this->input->post('password__admin'),
            'id_role' => 3,
            'is_active' => 1
        );
        $this->m_model->insert_data($data, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function delete_masyarakat($id)
    {
        $where = array('id_user' => $id);

        $this->m_model->delete($where, 'users');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_masyarakat');
    }

    public function delete_petugas($id)
    {
        $where = array('id_admin' => $id);

        $this->m_model->delete($where, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function edit_petugas($id)
    {
        $data = array(
            'id_admin' => $id,
            'name__admin' => $this->input->post('name__admin'),
            'username__admin' => $this->input->post('username__admin'),
            'password__admin' => $this->input->post('password__admin'),
            'id_role' => 3,
            'is_active' => 1
        );
        $this->m_model->update_data($data, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function pengaduan_masuk()
    {
        $data['title'] = 'Pengaduan Masuk';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/p_masuk', $data);
        $this->load->view('components_admin/footer');
    }
}
