 <?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class UserM extends CI_Model  
{  
	public function insert_pengguna_jabatan($data){  
			return $this->db->insert('pengguna_jabatan', $data);  
	}  
	public function insert_pengguna($data){
		return $this->db->insert('pengguna', $data);
	}
	public function verifyemail($key){  
		   	$data = array(
		   		'status_email' => '1',
		   		);  
		    $this->db->where('email_encryption', $key);  
		    return $this->db->update('pengguna_jabatan', $data);  
	}  
	public function get_pilihan_jabatan(){
		// $this->db->select('*');
		// $this->db->from('jabatan');
		$query = $this->db->get('jabatan');	
	 	return $query;
	}
}  