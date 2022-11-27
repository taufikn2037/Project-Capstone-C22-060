<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('v_auth/login_user');
    }

    public function daftar()
    {
        $this->load->view('v_auth/daftar');
    }
}
