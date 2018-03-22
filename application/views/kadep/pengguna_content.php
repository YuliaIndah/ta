<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i> Daftar Pengguna </h3>
        <!-- <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
          <li><i class="fa fa-user"></i>Pengguna</li>                
        </ol> -->
      </div>
    </div>
    <!-- isi content disini -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="card-body">
              <div class="table-responsive">
               <!--  <?php
                  var_dump($data_pengguna);
                  ?> -->
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>No. Identitas</th> -->
                        <th>Nama</th>
                        <th>No. Identitas</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Status Email</th>
                        <th>Status Akun</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>No. Identitas</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Status Email</th>
                        <th>Status Akun</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      <?php
                      foreach ($data_pengguna as $pengguna) {
                        ?>
                        <tr>
                          <td><?php echo $pengguna->nama; ?></td>
                          <td><?php echo $pengguna->no_identitas; ?></td>
                          <td><?php echo $pengguna->nama_jabatan; ?></td>
                          <td><?php echo $pengguna->jen_kel; ?></td>
                          <td><?php echo $pengguna->no_hp; ?></td>
                          <td><?php if($pengguna->status_email == 0){
                            echo "Belum Dikonfirmasi";
                          }else{
                            echo "Sudah Dikonfirmasi";
                          }; ?></td>
                          <td><?php echo $pengguna->status; ?></td>
                          <td>hapus edit</td>
                        </tr>

                        <?php
                        # code...
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- batas content -->

      </section>
      <div class="text-center">
        <div class="credits">
          <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>