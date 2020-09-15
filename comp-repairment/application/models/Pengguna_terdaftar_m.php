<?php
/*
**@author Fadilah Nur Imani
*/

class Pengguna_terdaftar_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function bacaPenggunaTerdaftar($nama_pengguna, $kata_sandi)
	{
		$this->db->select('no_badgepengguna, sandi, id_role');
		$this->db->from('pengguna_terdaftar');
		$this->db->where('no_badgepengguna = ', $nama_pengguna);
		$this->db->where('sandi = ', $kata_sandi);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function bacaSemuaPengguna()
	{
		$this->db->select('pengguna_terdaftar.no_badgepengguna, pengguna_terdaftar.nama_lengkap, role.nama_role, unit_kerja.nama_unitkerja');
		$this->db->from('pengguna_terdaftar, role, unit_kerja');
		$this->db->where('pengguna_terdaftar.id_role = role.id_role');
		$this->db->where('pengguna_terdaftar.id_unitkerja = unit_kerja.id_unitkerja');
        $query = $this->db->get();
        
        return $query->result();
	}

	public function tampilDataPengguna()
	{
		$this->db->select('pengguna_terdaftar.no_badgepengguna, pengguna_terdaftar.nama_lengkap, pengguna_terdaftar.sandi, pengguna_terdaftar.id_role, role.nama_role, pengguna_terdaftar.id_unitkerja, unit_kerja.nama_unitkerja, pengguna_terdaftar.email, pengguna_terdaftar.alamat');
		$this->db->from('pengguna_terdaftar, role, unit_kerja');
		$this->db->where('pengguna_terdaftar.id_role = role.id_role');
		$this->db->where('pengguna_terdaftar.id_unitkerja = unit_kerja.id_unitkerja');
		$this->db->where('no_badgepengguna', $this->uri->segment(3));

        $query = $this->db->get();
        
        return $query->result();
	}

	public function simpanPembaruan($no_badgepengguna, $data)
	{
		$this->db->update('pengguna_terdaftar', $data, array('no_badgepengguna' => $no_badgepengguna));
	}

	public function hapusData()
	{
		$this->db->where('no_badgepengguna', $this->uri->segment(3));
		$this->db->delete('pengguna_terdaftar');
	}

	public function tambahPengguna($data)
	{
		$this->db->insert('pengguna_terdaftar', $data);
		return;
	}

	public function bacaPenggunaTeknisi($tiket)
	{
		$this->db->select('pengguna_terdaftar.nama_lengkap');
		$this->db->from('pengguna_terdaftar, status_perbaikan');
		$this->db->where('pengguna_terdaftar.no_badgepengguna = status_perbaikan.no_badgeteknisi');
		$this->db->where('status_perbaikan.no_tiket =', $tiket);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function bacaPenggunaMasuk($nama_pengguna)
	{
		$query = $this->db->get_where('pengguna_terdaftar', array('no_badgepengguna' => $nama_pengguna));

		return $query->row_array();
	}

	public function hitungTeknisi()
	{
		$this->db->select('COUNT(id_role) as count');
		$this->db->from('pengguna_terdaftar');
		$this->db->where(array('id_role =' => 1));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}
	public function hitungAdmin()
	{
		$this->db->select('COUNT(id_role) as count');
		$this->db->from('pengguna_terdaftar');
		$this->db->where(array('id_role =' => 2));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}
	public function hitungManager()
	{
		$this->db->select('COUNT(id_role) as count');
		$this->db->from('pengguna_terdaftar');
		$this->db->where(array('id_role =' => 3));
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
			{
				$row = $query->row();
				return $row->count;
			}
		return 0;
	}
}
?>