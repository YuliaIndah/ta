<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-user"></i> Data Diri</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Data Diri</a></li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="container">
       <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
            <img src="https://scontent-sit4-1.xx.fbcdn.net/v/t1.0-9/14713754_1299932453374328_2078707598612152427_n.jpg?oh=9d0b1568abe4454dd39499ae6931978e&oe=5B32A923" class="img-thumbnail img-responsive" style="height: 150px;" alt="Cinque Terre">
          </div>
          <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
            <ul>
              <li><h2><?php echo $data_diri->nama;?></h2></li>
              <li><h4><?php echo $data_diri->no_identitas;?></h4></li>
              <li><h4><?php echo $data_diri->nama_jabatan;?></h4></li>
              <br>
            </ul>
          </div>  
        </div>
        <table class="table table-striped  table-hover table-condensed">
          <tr>
            <td class="info" width="23%" style="padding-left: 30px;">Jenis Kelamin</td>
            <td>: &nbsp;<?php echo $data_diri->jen_kel;?></td>
          </tr>
          <tr>
            <td class="active" width="23%" style="padding-left: 30px;">Tempat Lahir</td>
            <td>: &nbsp;<?php echo $data_diri->tmp_lahir;?></td>
          </tr>
          <tr>
            <td class="info" width="23%" style="padding-left: 30px;">Tanggal Lahir</td>
            <td>: &nbsp;<?php echo $data_diri->tgl_lahir;?></td>
          </tr>
          <tr>
            <td class="active" width="23%" style="padding-left: 30px;">Alamat</td>
            <td>: &nbsp;<?php echo $data_diri->alamat;?></td>
          </tr>
          <tr>
            <td class="info" width="23%" style="padding-left: 30px;">No. Handphone</td>
            <td>: &nbsp;<?php echo $data_diri->no_hp;?></td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 30px;"><button class="btn btn-info active" style="width: 75px;">Ubah</button></td>
          </tr>
        </table>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</section>
<div class="text-center">
 <div class="credits">
   <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
 </div>
</div>
</section>