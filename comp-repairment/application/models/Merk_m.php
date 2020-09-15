<?php
/*
**@author Fadilah Nur Imani
*/

class Merk_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaMerk()
	{
		$query = $this->db->get('merk');
        
        return $query->result();
	}
}