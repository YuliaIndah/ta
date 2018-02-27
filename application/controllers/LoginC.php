<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('LoginM');
		$this->load->helper('url');
	 // $this->load->helper('system_helper');
	 // in_acces();

	}
	var $data = array();

	public function index()
	{
		$data['cap_img'] = $this->LoginM->make_captcha();
		$this->load->view('LoginV', $data);
	}
	public function daftar()
	{
		$this->load->view('RegisterV');
	}

	public function signin(){
		if($this->input->post('submit')){
			if($this->CaptchaM->check_captcha() == TRUE)
				echo "<span style=\"color:blue\">Captcha cocok</span>";
			else echo "<span style=\"color:red\">Captcha salah</span>";
			}
			$email		=$this->input->post('email');
			$password	=$this->input->post('password');
			$ceknum		=$this->LoginM->ceknum($email,$password)->num_rows();
			$query		=$this->LoginM->ceknum($email,$password)->row();
			if($ceknum>0){
				if($this->LoginM->check_captcha() == TRUE){
					$userData 	= array(
						'email' 		=> $query->email,
						'password' 		=> $query->password,
						'kode_jabatan' 	=> $query->kode_jabatan,
						'status_email'	=> $query->status_email,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($userData);
					if ($this->session->userdata('status_email') == 1) {

						if($this->session->userdata('kode_jabatan') == 1){
							redirect('KadepC');
						}else if ($this->session->userdata('kode_jabatan') == 2) {
							redirect('SekdepC');
						}else if ($this->session->userdata('kode_jabatan') == 3) {
							redirect('Man_sarprasC');
						}elseif ($this->session->userdata('kode_jabatan') == 4) {
							redirect('Man_keuanganC');
						}else if ($this->session->userdata('kode_jabatan') == 5) {
							redirect('Staf_sarprasC');
						}else if ($this->session->userdata('kode_jabatan') == 6) {
							redirect('Staf_keuanganC');
						}else if ($this->session->userdata('kode_jabatan') == 7) {
							redirect('MahasiswaC');
						}else if ($this->session->userdata('kode_jabatan') == 8) {
							redirect('PegawaiC');
						}else if ($this->session->userdata('kode_jabatan') == 9) {
							redirect('UnitC');
						}else {
							redirect('AdminC');
						}
					}else{
						redirect('email_non_aktif');
					}

				}else{
					$this->session->set_flashdata('error','Captcha salah');
					redirect('LoginC');
				}
			}else{
				if($this->LoginM->check_captcha() == TRUE){
					$this->session->set_flashdata('error','email atau password salah');
					redirect('LoginC');
				}else{
					$this->session->set_flashdata('error','email atau password dan captcha salah');
					redirect('LoginC');
				}
			}
			
		}	
	}