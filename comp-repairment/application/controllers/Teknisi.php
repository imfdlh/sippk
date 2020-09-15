<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Teknisi extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Formulir_permintaan_m');
		$this->load->model('Jabatan_m');
		$this->load->model('Jenis_perangkat_m');
		$this->load->model('Keterangan_sekarang_m');
		$this->load->model('Merk_m');
		$this->load->model('Pengguna_terdaftar_m');
		$this->load->model('Riwayat_aktivitas_m');
		$this->load->model('Role_m');
		$this->load->model('Status_perbaikan_m');
		$this->load->model('Unit_kerja_m');

		if (($this->session->userdata('role') != 1))
		{
			redirect('halaman/index');
		}
	}

	public function index()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Beranda | Teknisi',
		  'page' => 'beranda',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'hitung_formulir' => $this->Formulir_permintaan_m->hitungFormulir(),
		  'hitung_selesai' => $this->Status_perbaikan_m->hitungStatusSelesai(),
		  'hitung_diproses' => $this->Status_perbaikan_m->hitungStatusDiproses(),
		  'hitung_dihentikan' => $this->Status_perbaikan_m->hitungStatusDihentikan(),
		  'status_diproses' => $this->Status_perbaikan_m->bacaPerbaikanDiproses($nama_pengguna)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_beranda', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function permintaan()
	{
		
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Formulir Permintaan | Teknisi',
		  'page' => 'permintaan_perbaikan',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'permintaan_masuk' => $this->Formulir_permintaan_m->bacaDaftarTungguPermintaan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_permintaan_perbaikan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function tambah() {
		$nama_pengguna = $this->session->userdata('nama_pengguna');
		$data = array(
			'no_tiket' => $this->uri->segment(3),
			'id_keterangansekarang' => 2,
			'no_badgeteknisi' => $nama_pengguna
		);

		$baru = $this->Status_perbaikan_m->tambahStatus($data);
		if ($baru == false)
		{
			$this->session->set_flashdata('berhasilditambahkan', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil menambahkan nomor tiket.</div>');
			redirect('teknisi/update/'.$data['no_tiket']);
		}
		else
		{
			$this->session->set_flashdata('berhasilditambahkan', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal menambahkan nomor tiket.</div>');
			redirect('teknisi/permintaan');
		}
	}

	public function update()
	{
		$tiket = $this->uri->segment(3);
		$nama_pengguna = $this->session->userdata('nama_pengguna');
		$data =[
		  'title' => 'Perbarui Status Perbaikan | Teknisi',
		  'page' => 'update',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'keterangan_sekarang' => $this->Keterangan_sekarang_m->bacaSeluruhKeteranganSekarang(),
		  'update_status' => $this->Status_perbaikan_m->bacaStatusPerbaikan($tiket)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_update_status', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function updated()
	{
		$tiket = $this->input->post('no_tiket');
		$data = array(
			'waktu_barangmasuk' => $this->input->post('waktu_barangmasuk'),
			'diagnosa_awal' => $this->input->post('diagnosa_awal'),
			'waktu_diagnosaawal' => $this->input->post('waktu_diagnosaawal'),
			'tindakan_lanjut' => $this->input->post('tindakan_lanjut'),
			'waktu_tindakanlanjut' => $this->input->post('waktu_tindakanlanjut'),
			'solusi_akhir' => $this->input->post('solusi_akhir'),
			'waktu_solusiakhir' => $this->input->post('waktu_solusiakhir'),
			'id_keterangansekarang' => $this->input->post('keterangan_sekarang'),
			'waktu_perbaikanselesai' => $this->input->post('waktu_perbaikanselesai'),
			'no_badgeteknisi' => $this->input->post('no_badgeteknisi')
		);

		$ubah = $this->Status_perbaikan_m->simpanPembaruan($tiket, $data);
		if ($ubah == false)
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data status perbaikan berhasil diperbarui.</div>');
			redirect('teknisi/kelola');
		}
		else
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data status perbaikan gagal diperbarui.</div>');
			redirect('teknisi/kelola');
		}
		

	}

	public function kelola()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Kelola Status Perbaikan | Teknisi',
		  'page' => 'kelola_status',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'status_diproses' => $this->Status_perbaikan_m->bacaPerbaikanDiproses($nama_pengguna)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_kelola_status', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function riwayat()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Riwayat Perbaikan | Teknisi',
		  'page' => 'riwayat_perbaikan',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'riwayat' => $this->Status_perbaikan_m->bacaRiwayatPerbaikan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_riwayat_perbaikan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function perangkat()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Riwayat Kerusakan | Teknisi',
		  'page' => 'riwayat_kerusakan',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'riwayat' => $this->Status_perbaikan_m->bacaRiwayatPerbaikan()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_riwayat_kerusakan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function formulir()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');
		$data =[
		  'title' => 'Detail Formulir Permintaan | Teknisi',
		  'page' => 'detail',
		  'formulir' => $this->Formulir_permintaan_m->bacaDetailFormulir(),
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_detail_formulir', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function detail()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');
		$data =[
		  'title' => 'Detail Riwayat Perbaikan | Teknisi',
		  'page' => 'detail_perbaikan',
		  'detail_perbaikan' => $this->Status_perbaikan_m->bacaDetailPerbaikan(),
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/teknisi/v_detail_riwayat_perbaikan', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	
}