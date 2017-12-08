
<?php   
    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = false;
    if(isset($_POST['btnsave']))
    {   
          $pass1 =  $_POST['pass'];
          $pass2 =  $_POST['password2'];

        if($pass1 != $pass2){
            $errMSG = "Konfirmasi Password tidak sama";
        }else{
            $password = md5($pass1);
        }
        if(!isset($errMSG))
        {
        $mysqli->query("UPDATE admin set
                password = '$password'
                where username='$_SESSION[username]' and password='$_SESSION[password]'
            ") or die($mysqli->error);
        $_SESSION[password] = $password;
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
                            <i class="fa fa-info-circle"></i>  <strong>Berhasil!</strong> Password sudah diubah. Silakan Tunggu...
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
        <td><label class="control-label">Password</label></td>
        <td><input style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Password" name="pass" type="password"> </td>
    </tr>
    <p><span id="cocok"></span></p>
        <tr>
        <td><label class="control-label">Ulang Password</label></td>
        <td><input style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Konfirmasi Password" name="password2"  type="password"> </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
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
            <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>