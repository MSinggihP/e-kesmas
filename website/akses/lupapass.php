<?php 
session_start();
// jika session user ada maka akan di alihkan ke file home.php

if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
     header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetar | Masuk</title>x
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
   	<style type="text/css">
    	#form-login {
    		margin-top: 90px;
    		background-color: #fff;
    		font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
    		border-top: 10px solid #26a69a;
        display: none;
    	}
    	.icons {
    		padding-top: 6px;
    	}

      .raleway{
        font-family: 'Raleway', sans-serif;
      }

    </style>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body style="background-color: #333333;">
    <div class="container-fluid">
      <div class="col-xs-12 col-md-4 col-md-offset-4" id="form-login">
          <form class="form-signin" style="padding: 30px;" method="post" id="login-form">

          <a href="index.php"><img src="img/logo-kecil-login.png" style="padding-left: 150px"></a>
          <h2 style="font-family: 'Raleway', sans-serif; color:#9e9e9e; padding-left: 70px"> Lupa Password <a style="color:#000; " href="index.php">
          <!--<i class="material-icons">home</i>-->
          </a></h2><hr/>
            
          <!--<a style="background-image: url(img/logo-kecil-login.PNG);">-->
          <div id="pesan">
          <!-- error will be shown here ! -->
          </div>
          <div class="form-group form-group-lg has-feedback">
             <span class="icons glyphicon glyphicon-user form-control-feedback"></span>
             <input style="border-radius: 0px;font-family: 'Raleway', sans-serif;" class="form-control" placeholder="Username" name="username" id="username" type="text">
          </div> 
          <hr />
          <div class="form-group">
              <button type="submit" id="submit" class="btn btn-lg btn-block btn-default" style="background-color:#4db6ac;color:white;">
      			<span  class="glyphicon glyphicon-log-in"></span> Bantuan 
  			</button> 
          </div> 
          <div class="row">
            <p class="col-md-6" style="margin-bottom:0px;color:#333333;font-family: 'Raleway', sans-serif;">Belum punya akun ?</p>
            <a class="col-md-6 text-right" style="color:#26a69a;font-family: 'Raleway', sans-serif;" href="">Lupa password ?</a>
          </div>
          <a style="color:#26a69a;font-family: 'Raleway', sans-serif;" href="daftaradmin.php">Daftar sebagai pengurus</a><br>
          <a style="color:#26a69a;font-family: 'Raleway', sans-serif;" href="daftaranggota.php">Daftar sebagai anggota</a>
          <br><br>
          <div></div>



        </form>
      </div>
    </div>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/proses.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

