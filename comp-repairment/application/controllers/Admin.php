<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Admin extends CI_Controller {

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

		if (($this->session->userdata('role') != 2))
		{
			redirect('halaman/index');
		}
	}

	public function index()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Beranda | Admin',
		  'page' => 'beranda',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'role' => $this->Role_m->bacaRolePengguna($nama_pengguna),
		  'unit_kerja' => $this->Unit_kerja_m->bacaUnitKerjaPengguna($nama_pengguna),
		  'hitung_teknisi' => $this->Pengguna_terdaftar_m->hitungTeknisi(),
		  'hitung_admin' => $this->Pengguna_terdaftar_m->hitungAdmin(),
		  'hitung_manager' => $this->Pengguna_terdaftar_m->hitungManager(),
		  'lima_terbaru' => $this->Riwayat_aktivitas_m->bacaLima()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_beranda', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function kelola()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Kelola Pengguna | Admin',
		  'page' => 'kelola',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'semua_data' => $this->Pengguna_terdaftar_m->bacaSemuaPengguna()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_kelola_data_pengguna', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function update()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');
		$data =[
		  'title' => 'Perbarui Data Pengguna | Admin',
		  'page' => 'perbarui',
		  'role' => $this->Role_m->bacaRole(),
		  'unit_kerja' => $this->Unit_kerja_m->bacaUnitKerja(),
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'perbarui' => $this->Pengguna_terdaftar_m->tampilDataPengguna()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_perbarui_data_pengguna', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function updated()
	{
		$no_badgepengguna = $this->input->post('no_badgepengguna');
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'sandi' => md5($this->input->post('sandi')),
			'id_role' => $this->input->post('role'),
			'id_unitkerja' => $this->input->post('unit_kerja'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat')
		);

		$ubah = $this->Pengguna_terdaftar_m->simpanPembaruan($no_badgepengguna, $data);
		if ($ubah == false)
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data pengguna berhasil diperbarui.</div>');
			redirect('admin/kelola');
		}
		else
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data pengguna gagal diperbarui.</div>');
			redirect('admin/kelola');
		}
		

	}

	public function hapus()
	{
		$hapus = $this->Pengguna_terdaftar_m->hapusData();
		if ($hapus ==  false)
		{
			$this->session->set_flashdata('hapus', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data pengguna berhasil dihapus.</div>');
			redirect('admin/kelola');
		}
		else
		{
			$this->session->set_flashdata('hapus', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data pengguna batal dihapus.</div>');
			redirect('admin/kelola');
		}
	}

	public function tambah()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Tambah Pengguna | Admin',
		  'page' => 'tambah',
		  'role' => $this->Role_m->bacaRole(),
		  'unit_kerja' => $this->Unit_kerja_m->bacaUnitKerja(),
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna)
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_form_tambah', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function tambahkan()
	{
		$data = array(
			'no_badgepengguna' => $this->input->post('no_badgepengguna'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'sandi' => md5($this->input->post('sandi')),
			'id_role' => $this->input->post('role'),
			'id_unitkerja' => $this->input->post('unit_kerja'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat')
		);

		$baru = $this->Pengguna_terdaftar_m->tambahPengguna($data);
		if ($baru == false)
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil menambahkan data pengguna.</div>');
			redirect('admin/kelola');
		}
		else
		{
			$this->session->set_flashdata('berhasildiperbarui', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal menambahkan data pengguna.</div>');
			redirect('admin/kelola');
		}
	}

	public function detail()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Detail Data Pengguna | Admin',
		  'page' => 'detail',
		  'role' => $this->Role_m->bacaRole(),
		  'unit_kerja' => $this->Unit_kerja_m->bacaUnitKerja(),
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'detail' => $this->Pengguna_terdaftar_m->tampilDataPengguna(),
		  'riwayat' => $this->Riwayat_aktivitas_m->bacaRiwayatDetail()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_detail_data', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}

	public function riwayat()
	{
		$nama_pengguna = $this->session->userdata('nama_pengguna');

		$data =[
		  'title' => 'Riwayat Masuk | Admin',
		  'page' => 'riwayat_masuk',
		  'pengguna' => $this->Pengguna_terdaftar_m->bacaPenggunaMasuk($nama_pengguna),
		  'data_riwayat' => $this->Riwayat_aktivitas_m->bacaRiwayat()
		];

		$this->load->view('pengguna_terdaftar/template/v_header', $data);
		$this->load->view('pengguna_terdaftar/template/v_navbar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_sidebar', $data);
		$this->load->view('pengguna_terdaftar/admin/v_riwayat_masuk', $data);
		$this->load->view('pengguna_terdaftar/template/v_footer');
	}
}