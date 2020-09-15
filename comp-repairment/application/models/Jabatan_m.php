<?php
/*
**@author Fadilah Nur Imani
*/

class Jabatan_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaJabatan()
	{
		$query = $this->db->get('jabatan');
        
        return $query->result();
	}
}