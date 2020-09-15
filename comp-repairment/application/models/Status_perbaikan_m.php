<?php
/*
**@author Fadilah Nur Imani
*/

class Status_perbaikan_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaStatusPerbaikan($tiket)
	{
		$this->db->select('status_perbaikan.no_tiket, status_perbaikan.waktu_barangmasuk, status_perbaikan.diagnosa_awal, status_perbaikan.waktu_diagnosaawal, status_perbaikan.tindakan_lanjut, status_perbaikan.waktu_tindakanlanjut, status_perbaikan.solusi_akhir, status_perbaikan.waktu_solusiakhir, status_perbaikan.id_keterangansekarang, keterangan_sekarang.keterangan_sekarang, status_perbaikan.waktu_perbaikanselesai, status_perbaikan.no_badgeteknisi');
		$this->db->from('status_perbaikan, keterangan_sekarang');
		$this->db->where('status_perbaikan.id_keterangansekarang = keterangan_sekarang.id_keterangansekarang');
		$this->db->where('no_tiket', $tiket);

        $query = $this->db->get();

		return $query->row_array();
	}

	public function hitungStatusSelesai()
	{
		$this->db->select('COUNT(id_keterangansekarang) as count');
		$this->db->from('status_perbaikan');
		$this->db->where(array('id_keterangansekarang =' => 1));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}

	public function hitungStatusDiproses()
	{
		$this->db->select('COUNT(id_keterangansekarang) as count');
		$this->db->from('status_perbaikan');
		$this->db->where(array('id_keterangansekarang =' => 2));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}

	public function hitungStatusDihentikan()
	{
		$this->db->select('COUNT(id_keterangansekarang) as count');
		$this->db->from('status_perbaikan');
		$this->db->where(array('id_keterangansekarang =' => 3));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}

	public function bacaPerbaikanDiproses($nama_pengguna)
	{
		$this->db->select('*');
		$this->db->select('DATEDIFF(CURDATE(), waktu_barangmasuk) AS hitunghari');
		$this->db->select('pengguna_terdaftar.nama_lengkap');
		$this->db->select('formulir_permintaan.keluhan, formulir_permintaan.no_inventaris');
		$this->db->from('status_perbaikan, pengguna_terdaftar, formulir_permintaan');
		$this->db->where('status_perbaikan.no_tiket = formulir_permintaan.no_tiket');
		$this->db->where('status_perbaikan.no_badgeteknisi = pengguna_terdaftar.no_badgepengguna');
		$this->db->where('status_perbaikan.id_keterangansekarang = ', 2);
		$this->db->where('status_perbaikan.no_badgeteknisi = ', $nama_pengguna);
        $query = $this->db->get();
        
        return $query->result();
	}

	public function bacaRiwayatPerbaikan()
	{
		$this->db->select('*');
		$this->db->select('DATEDIFF(waktu_perbaikanselesai, waktu_barangmasuk) AS hitunghari');
		$this->db->select('pengguna_terdaftar.nama_lengkap');
		$this->db->select('formulir_permintaan.no_badgepelapor, formulir_permintaan.keluhan, formulir_permintaan.no_inventaris');
		$this->db->select('unit_kerja.nama_unitkerja, jabatan.nama_jabatan, jenis_perangkat.nama_jenisperangkat, merk.nama_merk, keterangan_sekarang.keterangan_sekarang');
		$this->db->from('status_perbaikan, pengguna_terdaftar, formulir_permintaan, unit_kerja, jabatan, jenis_perangkat, merk, keterangan_sekarang');
		$this->db->where('status_perbaikan.no_tiket = formulir_permintaan.no_tiket');
		$this->db->where('formulir_permintaan.id_unitkerja = unit_kerja.id_unitkerja');
		$this->db->where('formulir_permintaan.id_jabatan = jabatan.id_jabatan');
		$this->db->where('formulir_permintaan.id_jenisperangkat = jenis_perangkat.id_jenisperangkat');
		$this->db->where('formulir_permintaan.id_merk = merk.id_merk');
		$this->db->where('status_perbaikan.id_keterangansekarang = keterangan_sekarang.id_keterangansekarang');
		$this->db->where('status_perbaikan.no_badgeteknisi = pengguna_terdaftar.no_badgepengguna');
		$this->db->where('status_perbaikan.id_keterangansekarang NOT LIKE ', 2);
        $query = $this->db->get();
        
        return $query->result();
	}

	public function hitungRiwayat()
	{
		$this->db->select('no_tiket');
		$this->db->select('COUNT(no_tiket) as count');
		$this->db->from('status_perbaikan');
		$this->db->where('id_keterangansekarang NOT LIKE ', 2);        
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

	public function bacaDetailPerbaikan()
	{
		$this->db->select('*');
		$this->db->select('DATEDIFF(waktu_perbaikanselesai, waktu_barangmasuk) AS hitunghari');
		$this->db->select('pengguna_terdaftar.nama_lengkap');
		$this->db->select('formulir_permintaan.no_badgepelapor, formulir_permintaan.keluhan, formulir_permintaan.no_inventaris');
		$this->db->select('unit_kerja.nama_unitkerja, jabatan.nama_jabatan, jenis_perangkat.nama_jenisperangkat, merk.nama_merk, keterangan_sekarang.keterangan_sekarang');
		$this->db->from('status_perbaikan, pengguna_terdaftar, formulir_permintaan, unit_kerja, jabatan, jenis_perangkat, merk, keterangan_sekarang');
		$this->db->where('status_perbaikan.no_tiket = formulir_permintaan.no_tiket');
		$this->db->where('formulir_permintaan.id_unitkerja = unit_kerja.id_unitkerja');
		$this->db->where('formulir_permintaan.id_jabatan = jabatan.id_jabatan');
		$this->db->where('formulir_permintaan.id_jenisperangkat = jenis_perangkat.id_jenisperangkat');
		$this->db->where('formulir_permintaan.id_merk = merk.id_merk');
		$this->db->where('status_perbaikan.id_keterangansekarang = keterangan_sekarang.id_keterangansekarang');
		$this->db->where('status_perbaikan.no_badgeteknisi = pengguna_terdaftar.no_badgepengguna');
		$this->db->where('status_perbaikan.no_tiket ', $this->uri->segment(3));
        $query = $this->db->get();
        
        return $query->result();
	}

	public function tambahStatus($data)
	{
		$this->db->insert('status_perbaikan', $data);
		return;
	}

	public function simpanPembaruan($tiket, $data)
	{
		$this->db->update('status_perbaikan', $data, array('no_tiket' => $tiket));
	}
}
?>