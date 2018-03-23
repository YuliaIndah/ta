 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class UserM extends CI_Model  
 {  
 	function __construct(){
 		parent:: __construct();
 		$this->load->database();
 	}
	public function insert_pengguna_jabatan($data){   //post pengguna_jabatan
		return $this->db->insert('pengguna_jabatan', $data);  
	}  
	public function insert_pengguna($data){ //post pengguna
		return $this->db->insert('pengguna', $data);
	}
	public function hapus($no_identitas){ //hapus data pengguna ketika tidak berhasil input data pengguna jabatan
		$this->db->where('no_identitas', $no_identitas);
		$this->db->delete('pengguna');
		return;
	}
	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
		$data = array(
			'status_email' => '1',
		);  
		$this->db->where('md5(email)', $key);
		return $this->db->update('pengguna_jabatan', $data);  
	}
	public function insert_data_resend($data){ //post resend data email
		$this->db->where('no_identitas',$data['no_identitas']); 
		return $this->db->update('pengguna_jabatan',$data);
	}  
	public function get_pilihan_jabatan(){ //mengambil jabatan dari db jabatan
		$query = $this->db->get('jabatan');	
		return $query;
	}

	function get_data_diri(){ //ambil data diri user berdasarkan session
		$no_identitas = $this->session->userdata('no_identitas');
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('pengguna.no_identitas', $no_identitas);
		$this->db->join('pengguna_jabatan', 'pengguna_jabatan.no_identitas = pengguna.no_identitas');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = pengguna_jabatan.kode_jabatan');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	function get_kegiatan_pegawai(){ //menampilkan kegiatan yang diajukan user sebagai pegwai
		$no_identitas = $this->session->userdata('no_identitas');
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna_jabatan', 'pengguna_jabatan.id_pengguna_jabatan = kegiatan.id_pengguna_jabatan');
		$this->db->where('pengguna_jabatan.no_identitas', $no_identitas);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 
}  