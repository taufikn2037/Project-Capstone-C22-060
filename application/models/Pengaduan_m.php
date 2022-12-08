<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_m extends CI_Model
{

	private $table = 'pengaduan';
	private $primary_key = 'id_pengaduan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_pengaduan()
	{
		$this->db->select('pengaduan.*,users.name__user, users.no_telepon');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', '0');
		return $this->db->get();
	}

	public function data_pengaduan_users_id_user($id_user)
	{
		$this->db->select('pengaduan.*,users.name__user	');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('pengaduan.id_user', $id_user);
		return $this->db->get();
	}

	public function data_pengaduan_users_proses()
	{
		$this->db->select('pengaduan.*,users.name__user');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'proses');
		return $this->db->get();
	}

	public function data_pengaduan_users_selesai()
	{
		$this->db->select('pengaduan.*,users.name__user');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'selesai');
		return $this->db->get();
	}

	public function data_pengaduan_users_tolak()
	{
		$this->db->select('pengaduan.*,users.name__user');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'tolak');
		return $this->db->get();
	}

	public function data_pengaduan_users_id($id_user)
	{
		return $this->db->get_where($this->table, ['id_pengaduan' => $id_user]);
	}

	public function data_pengaduan_tanggapan($id)
	{
		$this->db->select('pengaduan.*,tanggapan.tgl_tanggapan,tanggapan.tanggapan');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'inner');
		$this->db->where('pengaduan.id_pengaduan', $id);
		return $this->db->get();
	}

	public function laporan_pengaduan()
	{
		$this->db->select('pengaduan.*, users.name__user, tanggapan.tgl_tanggapan, tanggapan.tanggapan, admins.name_admin');
		$this->db->from('pengaduan');
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'left');
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'left');
		$this->db->join('admins', 'admins.id_admin = tanggapan.id_admin', 'left');
		return $this->db->get();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */