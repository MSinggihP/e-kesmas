<?php   
if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = false;
    if(isset($_POST['btnsave']))
    {   
          $nama =  $_POST['nama'];
          $username =  $_POST['username'];

          if(empty($nama)){
            $errMSG = "Nama kosong";
        }else if(empty($username)){
            $errMSG = "Username tidak boleh kosong";
        }
        if(!isset($errMSG))
        {
        $mysqli->query("UPDATE admin set
                nama = '$_POST[nama]',
                username = '$username'
                where username='$_SESSION[username]' and password='$_SESSION[password]'
            ") or die($mysqli->error);
        if($data['username'] != $username){
            $_SESSION['username'] = $_POST['username'];
        }
        
        $tambah = true;
        
        echo"<meta http-equiv='refresh' content='1; url=?tampil=beranda'>";   
    }
    }
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profil
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=index">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Profil
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if($tambah){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Berhasil!</strong> Profil sudah diedit. Silakan Tunggu...
                        </div>
                    </div>
                </div>
                <?php } ?>
                    <?php
    if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>  
                <div class="row">
                    <div class="col-lg-7">
     <form method="post" enctype="multipart/form-data" class="form-horizontal">
        
    <table class="table table-bordered table-responsive">
    
    <tr>
        <td><label class="control-label">Nama Admin</label></td>
        <td><input class="form-control" value="<?php echo $data['nama']; ?>" type="text" name="nama" placeholder="Nama" /></td>
    </tr>
    <tr>
        <td><label class="control-label">Username</label></td>
        <td><input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="username" placeholder="username" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-edit"></span> &nbsp; Edit
        </button>
        <a href="?tampil=ganti-pass" class="btn btn-default">Ganti Password</a>
        </td>
    </tr>
    
    </table>

                            <br> 
    
    
</form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  if($_SESSION['akses']=='user'){ ?>
        <br><br><br><br><br><br><br><br><br><br> <br><br>
        <?php } ?>
        <?php  if($_SESSION['akses']=='admin'){ ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users <small>Admin</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                         <p><a href="?tampil=tambah-user" class="btn btn-primary btn-md" role="button">Tambah</a>
                         </p>
                    </div>
                    <div class="col-lg-6">
                            <form method="post" action="">
                                <div class="form-group input-group">
                                <input name="input_cari" placeholder="Cari disini .." type="text" class="form-control">
                                <span class="input-group-btn"><input class="btn btn-default" name="cari" value="Cari" type="submit"><i class="fa fa-search"></i></span>
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
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Users Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
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
                $sql =$mysqli->query("SELECT * FROM admin where hak_akses='user' AND
                nama like '%$input_cari%'
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM admin where hak_akses='user' ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM admin where hak_akses='user' ORDER BY nama DESC")or die($mysqli->error);
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
                                                <td><?php echo $data['username']; ?></td>
                                                <td>
            <a style="background-color: #f84552 " href="?tampil=hapus-user&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
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
        <!-- /#page-wrapper --><s></s>
        <?php } ?>
            <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>