<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KadepC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['UserM','KadepM']);
		Kadep_access(); //helper buat batasi akses login/session

	}

	// sebagai semua
	public function data_diri(){ //halaman data diri
		$data['title'] = "Data Diri | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('data_diri_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	// Sebagai kepala Departemen

	public function index(){ //halaman index kadep (dashboard)
		$data['title'] = "Beranda | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('kadep/index_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	public function pengajuan_kegiatan(){ //halaman pengajuan kegiatan (kadep)
		$data['title'] = "Kegiatan Diajukan | Kepala Departemen";
		$this->data['data_pengajuan_kegiatan'] = $this->KadepM->get_data_pengajuan()->result();
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('kadep/pengajuan_kegiatan_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['title'] = "Pengaturan Akun | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengaturan_akun_content', $this->data, true) ;
		$this->load->view('kadep/index_template', $data);
	}

 	// sebagai pegawai

	// public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan (pegawai)
	// 	$data['title'] = "Pengajuan Kegiatan | Kepala Departemen";
	// 	$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
	// 	$data['body'] = $this->load->view('kadep/pengajuan_kegiatan_pegawai_content', $this->data, true);
	// 	$this->load->view('kadep/index_template', $data);
	// }
	public function kegiatan_pegawai(){ //halaman kegiatan pegawai
		$data['title'] = "Daftar Kegiatan | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0]; 
		$this->data['data_kegiatan'] = $this->UserM->get_kegiatan_pegawai()->result();	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('kadep/kegiatan_pegawai_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}

	// sebagai admin

	public function pengguna(){//halaman pengguna (admin)
		$data['title'] = "Daftar Pengguna | Kepala Departemen";
		$this->data['data_pengguna'] = $this->KadepM->get_data_pengguna()->result();
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('kadep/pengguna_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}

	public function jabatan(){ //halaman jabatan
		$data['title'] = "Daftar Jabatan | Kepala Departemen";
		$this->data['data_diri'] = $this->UserM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('kadep/jabatan_content', $this->data, true);
		$this->load->view('kadep/index_template', $data);
	}


	public function post_pengajuan_kegiatan_pegawai(){ //fungsi post pengajuan kegiatan pegawai
		$this->form_validation->set_rules('id_pengguna_jabatan', 'ID Pengguna Jabatan','required');
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan','required');
		$this->form_validation->set_rules('dana_disetujui', 'Dana Disetujui');
		if($this->form_validation->run() == FALSE){
			redirect('KadepC/pengajuan_kegiatan_pegawai');
		}else{
			$id_pengguna_jabatan 	= $_POST['id_pengguna_jabatan'];
			$kode_jenis_kegiatan 	= $_POST['kode_jenis_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= $_POST['tgl_kegiatan'];
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$tgl_pengajuan 			= $_POST['tgl_pengajuan'];
			$dana_disetujui			= $_POST['dana_disetujui'];

			$data_pengajuan_kegiatan = array(
				'id_pengguna_jabatan' 	=> $id_pengguna_jabatan,
				'kode_jenis_kegiatan' 	=> $kode_jenis_kegiatan,
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan,
				'tgl_pengajuan'			=> $tgl_pengajuan,
				'dana_disetujui'		=> $dana_disetujui);

			$insert_id = $this->KadepM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
			if($insert_id){ //get last insert id
				$upload = $this->KadepM->upload(); // lakukan upload file dengan memanggil function upload yang ada di KadepM.php
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$this->KadepM->save($upload,$insert_id); // Panggil function save yang ada di KadepM.php untuk menyimpan data ke database
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
			$this->session->set_flashdata('sukses','Data Pengajuan Kegiatan anda berhasil ditambahkan');
			redirect('KadepC/kegiatan_pegawai');
		}else{
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
			redirect('KadepC/pengajuan_kegiatan_pegawai');
		}
	}
}
}