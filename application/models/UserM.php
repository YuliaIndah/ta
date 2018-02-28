 <?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class UserM extends CI_Model  
{  
	public function insert_pengguna_jabatan($data){   //post pengguna_jabatan
			return $this->db->insert('pengguna_jabatan', $data);  
	}  
	public function insert_pengguna($data){ //post pengguna
		return $this->db->insert('pengguna', $data);
	}
	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
 		   	$data = array(
		   		'status_email' => '1',
		   		);  
		    $this->db->where('email_encryption', $key);  
		    return $this->db->update('pengguna_jabatan', $data);  
	}  
	public function get_pilihan_jabatan(){ //mengambil jabatan dari db jabatan
		$query = $this->db->get('jabatan');	
	 	return $query;
	}
}  