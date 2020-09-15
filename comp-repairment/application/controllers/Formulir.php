<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Formulir extends CI_Controller {

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
	}

	public function index()
	{
		$data['title'] = 'Formulir Permintaan Perbaikan';

		$this->load->view('template_pelapor/v_header_pelapor', $data);

    	// tampil unit kerja
    	$data['unit_kerja'] = $this->Unit_kerja_m->bacaUnitKerja();
    	// tampil jabatan
    	$data['jabatan'] = $this->Jabatan_m->bacaJabatan();
    	// tampil no.inventaris
    	$data['no_inventaris'] = $this->No_inventaris_m->bacaNoInventaris();
		
		$this->load->view('pelapor/v_formulir_permintaan', $data);
		$this->load->view('template_pelapor/v_footer_pelapor');
	}

	function validate_captcha() 
    {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?6LcF-GQUAAAAAJd1tyGfVVjjfdu2NNQ_SYMTW_0G&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function buatTiket()
    {
    	$result = substr($this->input->post('no_badge'), 2, -1);
    	$strip = "-";
	    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $tgl = date("His");
	    $charArray = str_split($chars);
	    for($i = 0; $i < 3; $i++){
		    $randItem = array_rand($charArray);
		    
	    }
	    $result .= "".$strip.$tgl.$charArray[$randItem];
	    return $result;
	    exit();
    }

	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
      	$my_date = date("Y-m-d H:i:s");

      	$no_inventaris = $this->input->post('no_inventaris');
      	$jenis_perangkat = $this->No_inventaris_m->bacaIdPerangkat($no_inventaris);
		$merk = $this->No_inventaris_m->bacaIdMerk($no_inventaris);
		$data = array(

			'no_tiket' => $this->buatTiket(),
			'no_badgepelapor' => $this->input->post('no_badge'),
			'nama_pelapor' => $this->input->post('nama_pelapor'),
			'id_unitkerja' => $this->input->post('unit_kerja'),
			'id_jabatan' => $this->input->post('jabatan'),
			'lokasi' => $this->input->post('lokasi'),
			'no_inventaris' => $this->input->post('no_inventaris'),
			'keterangan_seri' => $this->input->post('keterangan_seri'),
			'id_jenisperangkat' => $jenis_perangkat['id_jenisperangkat'],
			'id_merk' => $merk['id_merk'],
			'keluhan' => $this->input->post('keluhan'),
			'email' => $this->input->post('email'),
			'waktu_permintaanmasuk' => $my_date
		);

		$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required',
    		array('required' => '<div class="alert alert-danger" role="alert">Silahkan isi kolom captcha</div>')
    	);

		if ($this->form_validation->run() == FALSE)
		{
			redirect('formulir');
		}
		else
		{
			$this->Formulir_permintaan_m->tambahPermintaan($data);
			redirect('formulir/tiket/'.$data['no_tiket']);
		}
    	
    	exit();
	}

	public function tiket()
	{
		$data['title'] = 'Formulir Permintaan Perbaikan';

		$this->load->view('template_pelapor/v_header_pelapor', $data);
    	
    	$tiket = $this->uri->segment(3);

    	$data['formulir'] = $this->Formulir_permintaan_m->bacaFormulirPermintaan($tiket);

    	$this->load->view('pelapor/v_tampil_tiket', $data);
    	$this->load->view('template_pelapor/v_footer_pelapor');
	}

	public function unduh()
	{
		$this->load->library('Pdf');

		$tiket = $this->uri->segment(3);

		$data['formulir'] = $this->Formulir_permintaan_m->bacaFormulirPermintaan($tiket);

		$data['title'] = 'Tiket: '.$tiket;
		$this->load->view('pelapor/v_unduh_tiket', $data);		
	}
}