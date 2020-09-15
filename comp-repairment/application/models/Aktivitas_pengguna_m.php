<?php
/*
**@author Fadilah Nur Imani
*/

class Aktivitas_pengguna_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
}