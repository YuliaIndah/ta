<!DOCTYPE html>  
<html lang="en">  
<head>  
 <title>Registration</title>  
 <meta charset="utf-8">  
 <meta http-equiv="X-UA-Compatible" content="IE=edge">  
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <!-- Latest compiled and minified CSS -->  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >  
 <style type="text/css">  
 .form-box{  
   max-width: 500px;  
   position: relative;  
   margin: 2% auto;  
 }  
</style>  
</head>  
<body> 
<?php
  var_dump($jabatan);
?> 
 <div class="wrapper">  
  <div class="container">  
   <div class="row">  
    <div class="form-box">  
     <div class="panel panel-primary">  
      <!-- <div class="panel-heading text-center">  
       <h3>Register</h3>  
     </div>  --> 
     <div class="panel-body">  
       <div class="row">  
         <div class="col-sm-12">  
           <?php echo $this->session->flashdata('msg'); ?>  
         </div>  
       </div>  
       <form action="<?php echo base_url(); ?>UserC/daftar" method="post">
      <!--   <div class="panel-heading text-center">  
         <h4>Data Diri : </h4>  
       </div> -->
       <div class="row">  
         <div class="col-sm-12">  
          <div class="form-group">  
            <!-- <label class="control-label" for="no_identitas">Nomor Identitas : </label>   -->
            <div >  
              <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Nomor Identitas" required="">  
              <span class="text-danger"><?php echo form_error('no_identitas'); ?></span>  
            </div>  
          </div>  
        </div>  
      </div>  
      <div class="row">  
       <div class="col-sm-12">  
        <div class="form-group">  
          <!-- <label class="control-label" for="nama">Nama Lengkap : </label>   -->
          <div >  
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required="">  
            <span class="text-danger"><?php echo form_error('nama'); ?></span>  
          </div>  
        </div>  
      </div>  
    </div>
    <div class="form-group">
      <label>Jenis Kelamin  </label><span> <label> : </label></span>
      <label class="radio-inline">
       <input type="radio" name="jen_kel" id="Laki - laki" value="Laki - laki" checked>Laki - laki
     </label>
     <label class="radio-inline">
       <input type="radio" name="jen_kel" id="Perempuan" value="Perempuan">Perempuan
     </label>
   </div> 
   <div class="row">  
    <div class="col-sm-7">
     <div class="form-group">  
      <!-- <label class="control-label" for="tmp_lahir">Tempat Lahir</label>   -->
      <div>  
        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" required="">  
        <span class="text-danger"><?php echo form_error('tmp_lahir'); ?></span>  
      </div>  
    </div>  
  </div>
  <div class="col-sm-4">
   <div class="form-group">  
    <!-- <label class="control-label" for="tmp_lahir">Tanggal Lahir</label>   -->
    <div class="input-group date" id="tgl_lahir">
      <input type="date" class="form-control" name="tgl_lahir" value="<?php echo set_value('tgl_lahir');?>" placeholder="dd-mm-yyy" required>
    </div>           
  </div>  
</div>
</div>
<div class="form-group">
  <label for="bidang"> Bidang yang akan di lamar :</label>
  <select class="form-control" name="id_bidang" id="id_bidang">
       <!--  <option value="analis"> System Analyst</option>
        <option value="front_end"> Front-End Developer </option>
        <option value="back_end"> Back-End Developer </option> -->
        <?php 
            // $periode->result()->$periode_;
            // $tahun->result() as $tahun_;
        foreach ($jabatan->result() as $pilihan_jabatan) {
          ?>
          <option value="<?php echo $pilihan_jabatan->kode_jabatan ;?>"> <?php echo $pilihan_jabatan->nama_jabatan ;?> </option>
          <?php
        }
        ?>
  </select>
</div>
    <div class="form-group">
     <!-- <label for="kode_jabatan"> Jabatan :</label> -->
     <select class="form-control" name="kode_jabatan" id="kode_jabatan">
      <option value="0"> ----Pilih Jabatan----</option>
      <option value="1"> Kepala Departemen</option>
      <option value="2"> Sekertaris Departemen </option>
      <option value="4"> Manajer Keuangan </option>
      <option value="3"> Manajer Sarana dan Prasarana </option>
      <option value="8"> Pegawai </option>
      <option value="5"> Staf Sarana dan Prasarana </option>
      <option value="6"> Staf Keuangan </option>
      <option value="9"> Unit / Laboran </option>
      <option value="7"> Mahasiswa </option>
    </select>
  </div>
  <div class="form-group">
    <!-- <label>Alamat</label> -->
    <textarea name="alamat" value="<?php echo set_value('alamat');?>" class="form-control" placeholder="Alamat" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <!-- <label>Nomor Handphone</label> -->
    <input class="form-control" name="no_hp" value="<?php echo set_value('no_hp');?>" placeholder="Nomor Handphone" required>
  </div>
<!-- <div class="panel-heading text-center">  
 <h4>Data Akun : </h4>  
</div>   -->
<div class="form-group">  
  <!-- <label class="control-label" for="pswd">Email</label>   -->
  <div>  
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">  
    <span class="text-danger"><?php echo form_error('email'); ?></span>  
  </div>  
</div>  
<div class="form-group">  
  <!-- <label class="control-label" for="pswd">Password</label>   -->
  <div>  
    <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required="">  
    <span class="text-danger"><?php echo form_error('password'); ?></span>  
  </div>  
</div>  
<div class="form-group">  
  <!-- <label class="control-label" for="cn-pswd">Confirm Password</label>   -->
  <div>  
    <input type="password" class="form-control" id="cn-pswd" name="confirmpswd" placeholder="Confirm Password" required="">  
    <span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>  
  </div>  
</div>  
<div class="form-group">   
  <div class="row">  
    <div class="col-sm-offset-5 btn-submit">  
     <button type="submit" class="btn btn-success">Register</button>  
   </div>  
 </div>  
</div>  
</form>
</div>  
<!-- <div class="panel-footer text-center">  
  <h5>Copyright @ Komsi 2018</h5>  
</div>  
--></div>  
</div>  
</div>  
</div>  
</div>  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
</body>  
</html>  