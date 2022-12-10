<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_user();
        $this->load->model('Pengaduan_m');
        $this->load->model('m_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $users = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();
        $data['pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_id_user($users['id_user'])->num_rows();
        $data['pengaduan_selesai'] = $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows();
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_users/sidebar', $data);
        $this->load->view('v_user/profile');
        $this->load->view('components_admin/footer');
    }

    public function edit_profile($id)
    {
        $cek_data = $this->db->get_where('users', ['id_user' => htmlspecialchars($id)])->row_array();
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        if (!empty($cek_data)) {

            $data['title'] = 'Profile';
            $data['users'] = $cek_data;

            $this->form_validation->set_rules('isi_laporan', 'Isi Laporan Pengaduan', 'trim|required');
            $this->form_validation->set_rules('foto', 'Foto Pengaduan', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('components_admin/header', $data);
                $this->load->view('components_users/sidebar', $data);
                $this->load->view('v_user/profile');
                $this->load->view('components_admin/footer');
            } else {

                $upload_profile = $this->upload_profile('image');

                if ($upload_profile == FALSE) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
							Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('user/profile');
                } else {


                    $path = './assets/upload_foto/' . $cek_data['image'];
                    unlink($path);

                    $params = [
                        'image'                => $upload_profile,
                    ];

                    $resp = $this->db->update('users', $params, ['id_user' => $id]);;

                    if ($resp) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
								Foto berhasil diganti!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('user/profile');
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
								Foto gagal diganti!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('user/profile');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data Tidak Ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/profile');
        }
    }

    public function data_pengaduan()
    {
        $data['title'] = 'Data Pengaduan';
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();
        $users = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_id_user($users['id_user'])->result_array();

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
        $users = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_id_user($users['id_user'])->result_array();
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'trim|required');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components_admin/header', $data);
            $this->load->view('components_users/sidebar', $data);
            $this->load->view('v_user/tambah_pengaduan');
            $this->load->view('components_admin/footer');
        } else {
            $upload_foto = $this->upload_foto('foto');
            if ($upload_foto == FALSE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
					</div>');

                redirect('user/tambah_pengaduan');
            } else {

                $params = [
                    'tgl_pengaduan'      => date('Y-m-d'),
                    'id_user'            => $users['id_user'],
                    'isi_laporan'        => htmlspecialchars($this->input->post('isi_laporan', true)),
                    'foto'                => $upload_foto,
                    'status'            => '0',
                ];

                $resp = $this->Pengaduan_m->create($params);

                if ($resp) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Laporan Berhasil Dibuat
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('user/data_pengaduan');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Laporan Gagal Dibuat
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('user/tambah_pengaduan');
                }
            }
        }
    }

    public function pengaduan_detail($id)
    {

        $cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        if (!empty($cek_data)) {

            $data['title'] = 'Detail Pengaduan';

            $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_tanggapan(htmlspecialchars($id))->row_array();
            if ($data['data_pengaduan']) {
                $this->load->view('components_admin/header', $data);
                $this->load->view('components_users/sidebar', $data);
                $this->load->view('v_user/p_detail');
                $this->load->view('components_admin/footer');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Pengaduan Sedang Diverifikasi!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('user/data_pengaduan');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data Tidak Ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/data_pengaduan');
        }
    }

    public function pengaduan_batal($id)
    {
        $data = $this->db->get_where('pengaduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();

        if (!empty($data)) {

            $resp = $this->db->delete('pengaduan', ['id_pengaduan' => $id]);

            $path = './assets/uploads/' . $data['foto'];
            unlink($path);

            if ($resp) {
                $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Hapus pengaduan berhasil
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('user/data_pengaduan');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Hapus pengaduan gagal!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('user/data_pengaduan');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data Tidak Ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/data_pengaduan');
        }
    }

    public function edit($id)
    {
        $cek_data = $this->db->get_where('pengaduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();
        $data['users'] = $this->db->get_where('users', ['username__user' =>
        $this->session->userdata('username__user')])->row_array();

        if (!empty($cek_data)) {

            $data['title'] = 'Edit Pengaduan';
            $data['pengaduan'] = $cek_data;

            $this->form_validation->set_rules('isi_laporan', 'Isi Laporan Pengaduan', 'trim|required');
            $this->form_validation->set_rules('foto', 'Foto Pengaduan', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('components_admin/header', $data);
                $this->load->view('components_users/sidebar', $data);
                $this->load->view('v_user/edit_pengaduan');
                $this->load->view('components_admin/footer');
            } else {

                $upload_foto = $this->upload_foto('foto');

                if ($upload_foto == FALSE) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
							Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('user/edit/' . $cek_data['id_pengaduan']);
                } else {


                    $path = './assets/uploads/' . $cek_data['foto'];
                    unlink($path);

                    $params = [
                        'isi_laporan'        => htmlspecialchars($this->input->post('isi_laporan', true)),
                        'foto'                => $upload_foto,
                    ];

                    $resp = $this->db->update('pengaduan', $params, ['id_pengaduan' => $id]);;

                    if ($resp) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
								Laporan berhasil dibuat
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('user/data_pengaduan');
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
								Laporan gagal dibuat!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('user/data_pengaduan');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data Tidak Ada
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/data_pengaduan');
        }
    }

    private function upload_foto($foto)
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']            = TRUE;
        $config['mod_mime_fix']            = TRUE;
        $config['encrypt_name']            = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($foto)) {
            return FALSE;
        } else {
            return $this->upload->data('file_name');
        }
    }

    private function upload_profile($image)
    {
        $config['upload_path']          = './assets/upload_foto/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']            = TRUE;
        $config['mod_mime_fix']            = TRUE;
        $config['encrypt_name']            = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($image)) {
            return FALSE;
        } else {
            return $this->upload->data('file_name');
        }
    }
}
