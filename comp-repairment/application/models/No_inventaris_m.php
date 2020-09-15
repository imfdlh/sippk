<?php
/*
**@author Fadilah Nur Imani
*/

class No_inventaris_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaNoInventaris()
	{
		$query = $this->db->get('no_inventaris');
        
        return $query->result();
	}

	public function bacaIdPerangkat($no_inventaris)
	{
		$this->db->select('id_jenisperangkat');
		$this->db->from('no_inventaris');
		$this->db->where('no_inventaris = ', $no_inventaris);

        $query = $this->db->get();
  		
  		return $query->row_array();
	}

	public function bacaIdMerk($no_inventaris)
	{
		$this->db->select('id_merk');
		$this->db->from('no_inventaris');
		$this->db->where('no_inventaris = ', $no_inventaris);

        $query = $this->db->get();
  		
  		return $query->row_array();
	}
}