<!DOCTYPE html>  
<html lang="en">  
<head>  
 <title>Masuk</title>  
 <meta charset="utf-8">  
 <meta http-equiv="X-UA-Compatible" content="IE=edge">  
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <!-- Latest compiled and minified CSS -->  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >  
 <style type="text/css">  
 .form-box{  
   max-width: 500px;  
   position: relative;  
   margin: 5% auto;  
 }  
</style>  
</head>  
<body>  
 <div class="wrapper">  
  <div class="container">  
   <div class="row"> 
    <div class="col-6 col-md-4"></div>
    <div class="col-6 col-md-4"> 
      <div class="form-box">  
       <div class="panel panel-primary"> 
        <div class="panel panel-header">
          <center>
            <img src="<?php echo base_url();?>assets/image/logo/logo-ugm.png" style="height: 40%; width: 40%;">
            <!-- <h3>Silahkan Masuk : </h3> -->
            <br>
            <br>
          </center>
        </div>
        <div class="panel-body">  
         <div class="row">  
           <div class="col-sm-12">  
             <?php echo $this->session->flashdata('msg'); ?>  
           </div>  
         </div>  
         <form action="<?php echo base_url(); ?>user/registration" method="post">  

           <?php 
           $data=$this->session->flashdata('sukses');
           if($data!=""){ ?>
           <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
           <?php } ?>
           <?php 
           $data2=$this->session->flashdata('error');
           if($data2!=""){ ?>
           <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
           <?php } ?>
          
           <div class="form-group">  
            <label class="control-label" for="pswd">Email</label>  
            <div>  
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">  
              <span class="text-danger"><?php echo form_error('email'); ?></span>  
            </div>  
          </div>  
          <div class="form-group">  
            <label class="control-label" for="sandi">Sandi</label>  
            <div>  
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">  
              <span class="text-danger"><?php echo form_error('password'); ?></span>  
            </div>  
          </div>   
          <div class="form-group">   
            <div class="row">  
              <div class="col-sm-offset col-sm-3 btn-submit">  
               <button type="submit" class="btn btn-success">Masuk</button>  
             </div>  
           </div>  
         </div>  
       </form>
     </div>  
     <div class="panel-footer text-center">  
      <a href="#"> Lupa Sandi ? </a>
      <a> | </a>
      <a href="#"> Daftar </a>
    </div>  
  </div>  
</div> 
</div> 
<div class="col-6 col-md-4"></div>
</div>  
</div>  
</div>  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
</body>  
</html>  