<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->load->view('v_auth/login_user');
    }

    public function daftar()
    {
        $this->form_validation->set_rules(
            'name__user',
            'Nama',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'username__user',
            'Username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'nik__user',
            'NIK',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'email__user',
            'Email',
            'required|trim|valid_email|is_unique[users.email__user]',
            ['is_unique' => 'Email sudah pernah didaftarkan!']
        );
        $this->form_validation->set_rules(
            'password__user',
            'Password',
            'required|trim|min_length[4]|matches[rpassword__user]',
            ['matches' => 'Password dont match!', 'min_lenght' => 'Password too short!']
        );
        $this->form_validation->set_rules('rpassword__user', 'Password', 'required|trim|matches[password__user]');

        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $this->load->view('v_auth/daftar');
        } else {
            $data  = [
                'name__user' => $this->input->post('name__user'),
                'email__user' => $this->input->post('email__user'),
                'nik__user' => $this->input->post('nik__user'),
                'username__user' => $this->input->post('username__user'),
                'image' => 'default.jpg',
                'password__user' => password_hash($this->input->post('password__user'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! Akun kamu telah berhasil dibuat. Silahkan Login</div>');
            redirect('login');
        }
    }

    public function login_admin()
    {
        $this->load->view('v_auth/login_admin');
    }
}
