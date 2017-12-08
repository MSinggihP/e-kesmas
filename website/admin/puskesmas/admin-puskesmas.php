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
                            <i class="fa fa-user"></i> Admin <small>Puskesmas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Pengguna
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-primary" name="cari" value="Cari" type="submit"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="col-lg-6">
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
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Data Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal & Waktu</th>
                                                <th>Admin</th>
                                                <th>Puskesmas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik
   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM users where level_id=2 AND(
                nama like '%$input_cari%' OR 
                tgl_waktu like '%$input_cari%')
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM users WHERE level_id=2  ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM users WHERE level_id=2 ORDER BY tgl_waktu DESC")or die($mysqli->error);
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
            $sql_admin =$mysqli->query("SELECT * FROM users_puskermas WHERE user_id='$data[id]' ")or die($mysqli->error);
            $data_admin   = $sql_admin->fetch_array();
            $sql_admin_kes =$mysqli->query("SELECT * FROM puskesmas WHERE   features_geometry_coordinates='$data_admin[puskesmas_id]' ")or die($mysqli->error);
            $data_admin_kes   = $sql_admin_kes->fetch_array();
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data['tgl_waktu']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><a href=""><?php echo $data_admin_kes['features_properties_nama_Puskesmas']; ?></a></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-artikel&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-pencil"></i> Lihat </a>
            <a style="background-color: #f84552 " href="?tampil=hapus-post&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-trash"></i> Hapus </a>
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