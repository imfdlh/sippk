<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
**@author Fadilah Nur Imani
*/

class Status extends CI_Controller {

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
		$data['title'] = 'SI-PPK';
		$this->load->view('template_pelapor/v_header_pelapor', $data);

    	$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required',
    		array('required' => '<div class="alert rounded-0 text-center" role="alert" style="background-color: #ff4444; color: #fff; font-size: 0.9em;"><i class="fa fa-warning prefix" aria-hidden="true"></i><span style="padding: 0 0.6rem 0 0.6rem;"></span>Silahkan isi kolom captcha</div>')
    	);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('pelapor/v_periksa_status');
		}
		else
		{
			$this->tampilStatus();
		}
		
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

    public function tampilStatus()
    {
        $data['title'] = 'Status Permintaan Perbaikan';
        
    	$tiket = $this->input->post('no_tiket');

    	$data['status'] = $this->Status_perbaikan_m->bacaStatusPerbaikan($tiket);

    	// tampil nama teknisi
    	$data['nama_teknisi'] = $this->Pengguna_terdaftar_m->bacaPenggunaTeknisi($tiket);
    	// tampil waktu permintaan masuk
    	$data['waktu_permintaanmasuk'] = $this->Formulir_permintaan_m->bacaWaktuPermintaanMasuk($tiket);
        // tampil waktu permintaan masuk
        $data['keterangan_sekarang'] = $this->Keterangan_sekarang_m->bacaKeteranganSekarang($tiket);

    	if (empty($data['status']))
    	{
    		$this->load->view('pelapor/v_periksa_status');
    	}

    	$data['no_tiket'] = $data['status']['no_tiket'];

    	$this->load->view('pelapor/v_tampil_status', $data);
    }
}