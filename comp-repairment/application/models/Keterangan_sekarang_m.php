<?php
/*
**@author Fadilah Nur Imani
*/

class Keterangan_sekarang_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaKeteranganSekarang($tiket)
	{
		$this->db->select('keterangan_sekarang.keterangan_sekarang');
		$this->db->from('keterangan_sekarang, status_perbaikan');
		$this->db->where('keterangan_sekarang.id_keterangansekarang = status_perbaikan.id_keterangansekarang and status_perbaikan.no_tiket=', $tiket);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function bacaSeluruhKeteranganSekarang()
	{
		$query = $this->db->get('keterangan_sekarang');
        
        return $query->result();
	}
}
?>