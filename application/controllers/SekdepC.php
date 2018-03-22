<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SekdepC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		// Sekdep_access();
	}

	// sebagai semua

	public function data_diri(){
		$data['title'] = "Data Diri";
		$data['body'] = $this->load->view('data_diri_content', $this->data, true) ;
		$this->load->view('sekdep/index_template', $data);
	}

	// sebagai sekdep

	public function index(){ //halaman index sekdep (dashboard)
		$data['title'] = "Dashboard | Sekretaris Departemen";
		$data['body'] = $this->load->view('sekdep/index_content', $this->data, true) ;
		$this->load->view('sekdep/index_template', $data);
	}

	public function pengajuan_kegiatan(){ //halaman pengajuan kegiatan (sekdep)
		$data['title'] = "Pengajuan Kegiatan | Sekretaris Departemen";
		$data['body'] = $this->load->view('sekdep/pengajuan_kegiatan_content', $this->data, true) ;
		$this->load->view('sekdep/index_template', $data);
	}

	public function pengaturan_akun(){
		$data['title'] = "Pengaturan Akun | Sekretaris Departemen";
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('sekdep/index_template', $data);
	}
	

	// sebagai pegawai

	public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan (pegawai)
		$data['title'] = "Pengajuan Kegiatan Pegawai | Pegawai";
		$data['body'] = $this->load->view('sekdep/pengajuan_kegiatan_pegawai_content', $this->data, true);
		$this->load->view('sekdep/index_template', $data);
	}
	public function kegiatan_pegawai(){ //halaman kegiatan pegawai
		$data['title'] = "Kegiatan Pegawai | Pegawai";
		$data['body'] = $this->load->view('sekdep/kegiatan_pegawai_content', $this->data, true);
		$this->load->view('sekdep/index_template', $data);
	}
}