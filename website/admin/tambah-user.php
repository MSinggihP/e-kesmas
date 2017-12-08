<?php   
    if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = false;
    if(isset($_POST['btnsave']))
    {   
        $nama =  $_POST['nama'];
        $usename = $_POST['usename'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $user    = $mysqli->query("SELECT * from admin where username='$usename'");
        $dataUser   = $user->fetch_array();
        $jumlah = $user->num_rows;

        if(empty($nama)){
            $errMSG = "Nama Kosong";
        }else if(empty($usename)){
            $errMSG = "Username Kosong";
        }else if($jumlah != 0){
            $errMSG = "Username Sudah ada";
        }else if(empty($password)){
            $errMSG = "Password Kosong";
        }else if($password != $password2){
            $errMSG = "Password Tidak Sama";
        }

        if(!isset($errMSG))
        {
         $password = MD5($_POST['password']);   
        $mysqli->query("INSERT INTO admin set
                nama = '$_POST[nama]',
                username = '$_POST[usename]',
                password = '$password',
                hak_akses = 'user'
            ") or die($mysqli->error);
        $tambah = true;
        echo"<meta http-equiv='refresh' content='1; url=?tampil=profil'>";
    }
    }
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Buat User <small>Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=index">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i>  <a href="?tampil=profil">Profil</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Tambah
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
                            <i class="fa fa-info-circle"></i>  <strong>Berhasil! </strong> User admin sudah ditambah. Silakan tunggu...
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
        <td><label class="control-label">Nama</label></td>
        <td><input class="form-control" type="text" name="nama" placeholder="Nama" /></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Username</label></td>
        <td><input class="form-control" type="text" name="usename" placeholder="Username" /></td>
    </tr>
    <tr>
        <td><label class="control-label">Password</label></td>
        <td><input class="form-control" type="password" name="password" placeholder="Password" /></td>
    </tr>
        <tr>
        <td><label class="control-label">Ulang Password</label></td>
        <td><input class="form-control" type="password" name="password2" placeholder="Ulang Password" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        <a href="?tampil=tambah-user" class="btn btn-default">Reset</a>
        </td>
    </tr>
    
    </table>
    <br>    
                            <br>    
                            <br> 
                            <br>    
                            <br>    
                            <br>
                            <br>    
                            <br>    
                            <br> 
    
</form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->