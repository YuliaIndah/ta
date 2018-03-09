<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KadepC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();

	}

	// sebagai semua
	public function data_diri(){
		$data['title'] = "Data Diri";
		$data['body'] = $this->load->view('data_diri_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	// Sebagai kepala Departemen

	public function index(){ //halaman index kadep (dashboard)
		$data['title'] = "Dashboard | Kepala Departemen";
		$data['body'] = $this->load->view('kadep/index_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	public function pengajuan_kegiatan(){ //halaman pengajuan kegiatan (kadep)
		$data['title'] = "Pengajuan Kegiatan | Kepala Departemen";
		$data['body'] = $this->load->view('kadep/pengajuan_kegiatan_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	public function pengaturan_akun(){
		$data['title'] = "Pengaturan Akun | Kepala Departemen";
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}
 
 	// sebagai pegawai

	public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan (pegawai)
		$data['title'] = "Pengajuan Kegiatan Pegawai | Pegawai";
		$data['body'] = $this->load->view('kadep/pengajuan_kegiatan_pegawai_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}
	public function kegiatan_pegawai(){ //halaman kegiatan pegawai
		$data['title'] = "Kegiatan Pegawai | Pegawai";
		$data['body'] = $this->load->view('kadep/kegiatan_pegawai_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}

	// sebagai admin

	public function pengguna(){//halaman pengguna (admin)
		$data['title'] = "Pengguna | Admin";
		$data['body'] = $this->load->view('kadep/pengguna_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}

	public function jabatan(){ //halaman jabatan
		$data['title'] = "Jabatan | Admin";
		$data['body'] = $this->load->view('kadep/jabatan_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}
}