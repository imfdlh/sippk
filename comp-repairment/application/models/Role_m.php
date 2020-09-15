<?php
/*
**@author Fadilah Nur Imani
*/

class Role_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaRole()
	{
		$query = $this->db->get('role');
        
        return $query->result();
	}

	public function bacaRolePengguna($nama_pengguna)
	{
		$this->db->select('role.nama_role');
		$this->db->from('role, pengguna_terdaftar');
		$this->db->where('role.id_role = pengguna_terdaftar.id_role');
		$this->db->where('pengguna_terdaftar.no_badgepengguna =', $nama_pengguna);
		$query = $this->db->get();

		return $query->row_array();
	}
}