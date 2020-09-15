<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Manager extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Formulir_permintaan_m');
        $this->load->model('Jabatan_m');
        $this->load->model('Jenis_perangkat_m');
        $this->load->model('Keterangan_sekarang_m');
        $this->load->model('Merk_m');
        $this->load->model('No_inventaris_m');
        $this->load->model('Pengguna_terdaftar_m');
        $this->load->model('Riwayat_aktivitas_m');
        $this->load->model('Role_m');
        $this->load->model('Status_perbaikan_m');
        $this->load->model('Unit_kerja_m');

		if (($this->session->userdata('role') != 3))
		{
			redirect('halaman/index');
		}
	}

	public function index()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Beranda | Manager',
		  'page' => 'beranda',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'hitung_riwayat' => $this->Status_perbaikan_m->hitungRiwayat(),
		  'hitung_selesai' => $this->Status_perbaikan_m->hitungStatusSelesai(),
		  'hitung_diproses' => $this->Status_perbaikan_m->hitungStatusDiproses(),
		  'hitung_dihentikan' => $this->Status_perbaikan_m->hitungStatusDihentikan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_beranda', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function riwayat()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Riwayat Perbaikan | Manager',
		  'page' => 'riwayat_perbaikan',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'riwayat' => $this->Status_perbaikan_m->bacaRiwayatPerbaikan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_riwayat_perbaikan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function perangkat()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Riwayat Kerusakan | Manager',
		  'page' => 'riwayat_kerusakan',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'riwayat' => $this->Status_perbaikan_m->bacaRiwayatPerbaikan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/manager/v_riwayat_kerusakan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}
}