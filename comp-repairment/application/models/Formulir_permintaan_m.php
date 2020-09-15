<?php
/*
**@author Fadilah Nur Imani
*/

class Formulir_permintaan_m extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function tambahPermintaan($data)
	{
		$this->db->insert('formulir_permintaan', $data);
		return;
	}

	public function bacaWaktuPermintaanMasuk($tiket)
	{
		$this->db->select('formulir_permintaan.waktu_permintaanmasuk');
		$this->db->from('formulir_permintaan, status_perbaikan');
		$this->db->where('formulir_permintaan.no_tiket = status_perbaikan.no_tiket and status_perbaikan.no_tiket=', $tiket);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function bacaFormulirPermintaan($tiket)
	{
		$this->db->select('*');
		$this->db->select('jenis_perangkat.nama_jenisperangkat, merk.nama_merk');
		$this->db->from('formulir_permintaan, jenis_perangkat, merk');
		$this->db->where('no_tiket', $this->uri->segment(3));
		$this->db->where('formulir_permintaan.id_jenisperangkat = jenis_perangkat.id_jenisperangkat');
		$this->db->where('formulir_permintaan.id_merk = merk.id_merk');

		$query = $this->db->get();
		return $query->result();
	}

	public function hitungFormulir()
	{
		$this->db->select('a.no_tiket');
		$this->db->select('COUNT(a.no_tiket) as count');
		$this->db->from('formulir_permintaan a');
		$this->db->join('status_perbaikan f', 'f.no_tiket = a.no_tiket', 'left');
		$this->db->where('f.no_tiket IS NULL');        
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0)
	    {
	        $row = $query->row();
			return $row->count;
	    }
	    else
	    {
	        return false;
	    }
	}

	public function bacaDaftarTungguPermintaan()
	{
		$this->db->select('a.no_tiket, a.no_badgepelapor, a.nama_pelapor, b.nama_unitkerja, c.nama_jabatan, a.lokasi, a.no_inventaris, a.keterangan_seri, d.nama_jenisperangkat, e.nama_merk, a.keluhan, a.email, a.waktu_permintaanmasuk');
		$this->db->from('formulir_permintaan a');
		$this->db->join('unit_kerja b', 'b.id_unitkerja = a.id_unitkerja', 'left');
		$this->db->join('jabatan c', 'c.id_jabatan = a.id_jabatan', 'left');
		$this->db->join('jenis_perangkat d', 'd.id_jenisperangkat = a.id_jenisperangkat', 'left');
		$this->db->join('merk e', 'e.id_merk = a.id_merk', 'left');
		$this->db->join('status_perbaikan f', 'f.no_tiket = a.no_tiket', 'left');
		$this->db->where('f.no_tiket IS NULL');
	    $this->db->order_by('a.waktu_permintaanmasuk', 'asc');         
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0)
	    {
	        return $query->result_array();
	    }
	    else
	    {
	        return false;
	    }
    }

    public function bacaDetailFormulir() {
    	$this->db->select('formulir_permintaan.no_tiket, formulir_permintaan.no_badgepelapor, formulir_permintaan.nama_pelapor, unit_kerja.nama_unitkerja, jabatan.nama_jabatan, formulir_permintaan.lokasi, formulir_permintaan.no_inventaris, formulir_permintaan.keterangan_seri, jenis_perangkat.nama_jenisperangkat, merk.nama_merk, formulir_permintaan.keluhan, formulir_permintaan.email, formulir_permintaan.waktu_permintaanmasuk');
    	$this->db->from('formulir_permintaan, unit_kerja, jabatan, jenis_perangkat, merk');
    	$this->db->where('formulir_permintaan.id_unitkerja = unit_kerja.id_unitkerja');
    	$this->db->where('formulir_permintaan.id_jabatan = jabatan.id_jabatan');
    	$this->db->where('formulir_permintaan.id_jenisperangkat = jenis_perangkat.id_jenisperangkat');
    	$this->db->where('formulir_permintaan.id_merk = merk.id_merk');
    	$this->db->where('no_tiket = ', $this->uri->segment(3));
    	$query = $this->db->get();
        
        return $query->result();
    }
}