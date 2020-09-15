<?php
/*
**@author Fadilah Nur Imani
*/

class Jenis_perangkat_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaJenisPerangkat()
	{
		$query = $this->db->get('jenis_perangkat');
        
        return $query->result();
	}
}