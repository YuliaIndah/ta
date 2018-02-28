 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class UserC extends CI_Controller {  
   function __Construct(){  
    parent::__Construct();  
    $this->load->database();  
    $this->load->model('UserM');  
  }    
  public function halaman_daftar() //get option jabatan
  {
    $data['jabatan'] = $this->UserM->get_pilihan_jabatan();
    $this->load->view('RegisterV',$data);
  } 
  public function daftar()  //post pendaftaran
  {  
    $this->form_validation->set_rules('no_identitas', 'Nomor Identitas', 'required');  
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');  
    $this->form_validation->set_rules('jen_kel', 'Jenis Kelamin', 'required');  
    $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required');  
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');  
    $this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan', 'required');  
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');  
    $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna_jabatan.email]');  
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');  
    $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');  
    $this->form_validation->set_message('is_unique', 'This %s is already exits'); 
    if ($this->form_validation->run() == FALSE)  
    {  
      $this->load->view('RegisterV');  
    }else{  
      $no_identitas = $_POST['no_identitas'];  
      $nama         = $_POST['nama'];  
      $jen_kel      = $_POST['jen_kel'];  
      $tmp_lahir    = $_POST['tmp_lahir'];  
      $tgl_lahir    = $_POST['tgl_lahir'];  
      $kode_jabatan = $_POST['kode_jabatan'];  
      $alamat       = $_POST['alamat'];  
      $no_hp        = $_POST['no_hp'];  
      $email        = $_POST['email'];  
      $password     = $_POST['password'];  
      $passhash     = hash('md5', $password);  
      $saltid       = md5($email);  
      $status_email = "0";
      $status       = "tidak aktif"; 
      $data_pengguna          = array('no_identitas'  => $no_identitas,
        'nama'          => $nama,  
        'jen_kel'       => $jen_kel,  
        'tmp_lahir'     => $tmp_lahir,  
        'tgl_lahir'     => $tgl_lahir,  
        'alamat'        => $alamat,  
        'no_hp'         => $no_hp);

      $data_pengguna_jabatan  = array('no_identitas'      => $no_identitas,
        'kode_jabatan'      => $kode_jabatan,  
        'email'             => $email,  
        'password'          => $passhash,  
        'status'            => $status,  
        'email_encryption'  => $saltid,  
        'status_email'      => $status_email);  


      if($this->UserM->insert_pengguna($data_pengguna))  
      {  
        if($this->UserM->insert_pengguna_jabatan($data_pengguna_jabatan)){
          if($this->sendemail($email, $saltid))  
          {  
            // successfully sent mail to user email  
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the RegisterV.</div>');  
            redirect(base_url());  
          }
        }else{  
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');  
          redirect(base_url());  
        }  
      }else{  
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');  
        redirect(base_url());  
      }  
    }  
  }  

  function sendemail($email,$saltid){   //kirim email koonfirmasi
    $url = base_url()."UserC/confirmation/".$saltid;  
    $from_mail = 'dtedi.svugm@gmail.com';
    $to = $email;

    $subject = 'Verifikasi Pedaftaran Akun';
    $message = '<h1>'.$url.'</h1><span style="color: red;"> Departemen Teknik Elektro dan Informatika </span>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To:  <'.$to.'>' . "\r\n";
    $headers .= 'From: Departemen Teknik Elektro dan Informatika <'.$from_mail.'>' . "\r\n";

    $sendtomail = mail($to, $subject, $message, $headers);
    if( $sendtomail ) echo 'Sukses';
    else echo 'Failed';

  }  

  public function confirmation($key){  //post link konfirmasi
    if($this->UserM->verifyemail($key)){  
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');  
      redirect(base_url()."LoginC");  
    }else{  
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');  
      redirect(base_url()."LoginC");  
    }  
  }  
}  