<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Error404 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = '404 | Comp. Repairment';

		$this->load->view('template/v_error_404', $data);
	}
}