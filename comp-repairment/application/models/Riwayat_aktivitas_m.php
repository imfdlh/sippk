<?php
/*
**@author Fadilah Nur Imani
*/

class Riwayat_aktivitas_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function tambahAktivitas($data)
	{
		$this->db->insert('riwayat_aktivitas', $data);
		return;
	}

	public function bacaRiwayat()
	{
		$this->db->select('riwayat_aktivitas.id_riwayat, riwayat_aktivitas.no_badgepengguna, role.nama_role, aktivitas_pengguna.nama_aktivitas, riwayat_aktivitas.waktu_aktivitas');
		$this->db->from('riwayat_aktivitas, role, aktivitas_pengguna');
		$this->db->where('riwayat_aktivitas.id_role = role.id_role');
		$this->db->where('riwayat_aktivitas.id_aktivitaspengguna = aktivitas_pengguna.id_aktivitaspengguna');
		$this->db->order_by('waktu_aktivitas', 'desc');
		
        $query = $this->db->get();
        
        return $query->result();
	}

	public function bacaLima()
	{
		$this->db->select('riwayat_aktivitas.no_badgepengguna, role.nama_role, riwayat_aktivitas.waktu_aktivitas');
		$this->db->from('riwayat_aktivitas, role');
		$this->db->where('riwayat_aktivitas.id_role = role.id_role');
		$this->db->order_by('waktu_aktivitas', 'desc');
		$this->db->limit('5');

        $query = $this->db->get();
  		
  		return $query->result();
	}

	public function bacaRiwayatDetail()
	{
		$this->db->select('riwayat_aktivitas.id_riwayat, riwayat_aktivitas.no_badgepengguna, role.nama_role, aktivitas_pengguna.nama_aktivitas, riwayat_aktivitas.waktu_aktivitas');
		$this->db->from('riwayat_aktivitas, role, aktivitas_pengguna');
		$this->db->where('riwayat_aktivitas.id_role = role.id_role');
		$this->db->where('riwayat_aktivitas.id_aktivitaspengguna = aktivitas_pengguna.id_aktivitaspengguna');
		$this->db->where('no_badgepengguna', $this->uri->segment(3));
		$this->db->order_by('waktu_aktivitas', 'desc');
        $query = $this->db->get();
        
        return $query->result();
	}
}