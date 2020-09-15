<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Halaman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Pengguna_terdaftar_m');
		$this->load->model('Riwayat_aktivitas_m');
		$this->load->model('Role_m');
	}

	public function index()
	{
		$data['title'] = 'Masuk | Comp. Repairment';

		$this->load->view('template/v_masuk', $data);
	}

	public function masuk()
	{
		$data['title'] = 'Masuk | Comp. Repairment';

		$nama_pengguna = $this->input->post('no_badgepengguna');
		$kata_sandi = md5($this->input->post('sandi'));

		$masuk = $this->Pengguna_terdaftar_m->bacaPenggunaTerdaftar($nama_pengguna, $kata_sandi);


		if ($masuk)
		{
			foreach($masuk as $row);
			$this->session->set_userdata('nama_pengguna', $row->no_badgepengguna);
			$this->session->set_userdata('role', $row->id_role);
			date_default_timezone_set('Asia/Jakarta');
      		$waktu_masuk = date("Y-m-d H:i:s");

      		$data = array(
      			'no_badgepengguna' => $this->session->userdata('nama_pengguna'),
      			'id_role' => $this->session->userdata('role'),
      			'id_aktivitaspengguna' => 1,
      			'waktu_aktivitas' => $waktu_masuk
      		);
      		$this->Riwayat_aktivitas_m->tambahAktivitas($data);

			if ($this->session->userdata('role') == 1)
			{
				redirect('teknisi');
			}
			else if ($this->session->userdata('role') == 2)
			{
				redirect('admin');
			}
			else if ($this->session->userdata('role') == 3)
			{
				redirect('manager');
			}
			else
			{
				redirect('halaman');
			}
		}
		else
		{
			$data['pesan'] = '<div class="alert rounded-0 text-center" role="alert" style="background-color: #ff4444; color: #fff; font-size: 0.9em;"><i class="fa fa-warning prefix" aria-hidden="true"></i><span style="padding: 0 0.4rem 0 0.4rem;"></span>Nama pengguna atau kata sandi tidak sesuai</div>';
			$this->load->view('template/v_masuk', $data);
		}
	}

	public function keluar()
	{
		date_default_timezone_set('Asia/Jakarta');
      	$waktu_keluar = date("Y-m-d H:i:s");
		$data = array(
			'no_badgepengguna' => $this->session->userdata('nama_pengguna'),
			'id_role' => $this->session->userdata('role'),
			'id_aktivitaspengguna' => 0,
			'waktu_aktivitas' => $waktu_keluar
      	);
      	$this->Riwayat_aktivitas_m->tambahAktivitas($data);
		$this->session->sess_destroy();
		redirect('halaman/index');
	}
}