<?php 
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
                             <i class="fa fa-ticket"></i> Antrian Pasien Puskesmas <small>DKI Jakarta</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-ticket"></i> Puskesmas
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                            <form method="post" action="">
                                <div class="form-group input-group">
                                <input name="input_cari" placeholder="Cari disini .." type="text" class="form-control">
                                <span class="input-group-btn"><button class="btn btn-default" name="cari" value="Cari" type="submit"><i class="fa fa-search"></i></button></span>
                            </div>
                            </form>
                            
                    </div>
                </div>
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
                                <h3 class="panel-title"><i class="fa fa-ticket fa-fw"></i> Data Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Puskesmas</th>
                                                <th>Alamat</th>
                                                <th>Jumlah Antrian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik
   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM antrian
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM antrian  ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM antrian")or die($mysqli->error);
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
            $sql_antrian =$mysqli->query("SELECT * FROM puskesmas where     features_geometry_coordinates='$data[puskesmas_id]'")or die($mysqli->error);
            $data_antrian   = $sql_antrian->fetch_array();
            $sql_antrian_jum =$mysqli->query("SELECT count(*) as jumlah  FROM antrian where puskesmas_id='$data[puskesmas_id]'")or die($mysqli->error);
            $data_antrian_jum   = $sql_antrian_jum->fetch_array();
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data_antrian['features_properties_nama_Puskesmas']; ?></td>
                                                <td><?php echo $data_antrian['features_properties_location_alamat']; ?></td>
                                                <td><?php echo $data_antrian_jum['jumlah']; ?></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-artikel&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-pencil"></i> Lihat </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }} ?>
                                    </table>
                                    <div style="padding-bottom: 200px"></div>
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