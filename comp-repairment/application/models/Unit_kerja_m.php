<?php
/*
**@author Fadilah Nur Imani
*/

class Unit_kerja_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaUnitKerja()
	{
		$query = $this->db->get('unit_kerja');
        
        return $query->result();
	}

	public function bacaUnitKerjaPengguna($nama_pengguna)
	{
		$this->db->select('unit_kerja.nama_unitkerja');
		$this->db->from('unit_kerja, pengguna_terdaftar');
		$this->db->where('unit_kerja.id_unitkerja = pengguna_terdaftar.id_unitkerja');
		$this->db->where('pengguna_terdaftar.no_badgepengguna =', $nama_pengguna);
		$query = $this->db->get();

		return $query->row_array();
	}
}