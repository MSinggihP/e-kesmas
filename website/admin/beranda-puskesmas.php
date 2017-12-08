<?php 
    if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from users where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();

    //$jumlah = $cek->num_rows;
 ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin Puskesmas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Hi! <?php echo $data['nama'] ?> </strong> Selamat Datang, di Website Puskesmas
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ticket fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Antrian</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?tampil=viewers">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                                   $input_cari = @$_POST['input_cari']; 
                                   $cari = @$_POST['cari']; 
                                    if($cari){
                                        if($input_cari!=""){
                                            echo "Pencarian : "."$input_cari";
                                        }else{
                                            echo "Pencarian : All";
                                        }
                                         
                                    }
                                ?>
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Data Pengguna Terbaru</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal & Waktu</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik

   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM users where level_id=3 AND(
                nama like '%$input_cari%' OR 
                tgl_waktu like '%$input_cari%')
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM users WHERE level_id=3  ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM users WHERE level_id=3 ORDER BY tgl_waktu DESC")or die($mysqli->error);
        }
    $cek = $sql->num_rows;
     // jika data kurang dari 1
   if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="12" align="center" style="padding:12px;"> Data Tidak Ditemukan</td>
     </tr>
    <?php
   } else {
        
        while($data=$sql->fetch_array()){
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data['tgl_waktu']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-artikel&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-pencil"></i> Lihat </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }} ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
               <?php
                                   $input_cari = @$_POST['input_cari']; 
                                   $cari = @$_POST['cari']; 
                                    if($cari){
                                        if($input_cari!=""){
                                            echo "Pencarian : "."$input_cari";
                                        }else{
                                            echo "Pencarian : All";
                                        }
                                         
                                    }
                                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Puskesmas Dengan Jumlah Pasien Tertinggi</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kelurahan</th>
                                                <th>Kecamatan</th>
                                                <th>Kota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik
   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM puskesmas WHERE
                nama like '%$input_cari%' OR 
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM puskesmas  ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM puskesmas")or die($mysqli->error);
        }
    $cek = $sql->num_rows;
     // jika data kurang dari 1
   if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="12" align="center" style="padding:12px;"> Data Tidak Ditemukan</td>
     </tr>
    <?php
   } else {
        
        while($data=$sql->fetch_array()){
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['Kelurahan']; ?></td>
                                                <td><?php echo $data['kecamatan']; ?></td>
                                                <td><?php echo $data['kota']; ?></t
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-artikel&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-pencil"></i> Lihat </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }} ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->



                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->