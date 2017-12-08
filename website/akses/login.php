
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
  <body style="margin:0px;padding:0px;border:0px;background-color: #333333;">
    <div style="" class="container-fluid">
      <div class="col-xs-12 col-md-4 col-md-offset-4" id="form-login" style="margin-top:100px"">
          <form class="form-signin" style="padding: 30px; margin-top:0px" method="post" id="login-form">
          
          <!--<h1>Saya Pengurus <a style="margin-left:48px;color:#000;" href="index.php"><i class="material-icons">home</i>-->
          <a href="index.php"><img src="img/logo-kecil-login.png" style="padding-left: 150px"></a>
          <h1 style="font-family: 'Raleway', sans-serif; color:#9e9e9e;font-size: 30px;text-align: center;"> Masuk <a style="color:#000; " href="index.php">
          <!--<i class="material-icons">home</i>-->
          </a></h1><hr/>
          <div id="pesan">
          <!-- error will be shown here ! -->
          </div>
          <div class="form-group form-group-lg has-feedback">
             <span class="icons glyphicon glyphicon-user form-control-feedback"></span>
             <input style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Username" name="username" type="text">
          </div> 

          <div class="form-group form-group-lg has-feedback">
              <span  class="icons glyphicon glyphicon-lock form-control-feedback"></span>
              <input style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Password" name="password" type="password">            
          </div> 
          <hr />
          <div class="form-group">
              <button type="submit" name="btnLogin" class="btn btn-lg btn-block btn-default" style="background-color:#4db6ac;color:white;" >
                <span class="glyphicon glyphicon-log-in"></span> Login 
            </button> 
          </div> 
          <div><p style="color:#333333; font-family: 'Raleway', sans-serif;">Belum Punya Akun ? <a style="color:#26a69a" href="daftar.php">Daftar</a></p></div>
          <div><a style="color:#26a69a; font-family: 'Raleway', sans-serif;"" href="index.php#kontak">bantuan ?</a></div>  
        </form>
      </div>
    </div>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

