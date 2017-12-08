
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetar | Masuk</title>x
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
    <script language='JavaScript'>

var ajaxRequest;

function getAjax() //mengecek apakah web browser support AJAX atau tidak
{
try
{
// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer Browsers
try
{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
}

function validasi (keyEvent,pilihan) //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
{
keyEvent = (keyEvent) ? keyEvent: window.event;
input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
if (input.value) //jika input dimasukkan, masuk ke fungsi cekEmail
{
if (pilihan == 1)
{
cekPass("cekpass.php?password=1&input=" + input.value,1); //mengirim inputan ke file cekpass.php
}
else if (pilihan == 2)
{
pass = document.getElementById('pass').value; //mengambil nilai dari form password yang telah dicek
cekPass("cekpass.php?password=2&pass=" + pass + "&input=" + input.value,2); //mengirim inputan konfirmasi password
}
}
}

function cekPass(fileCek,keterangan) //fungsi untuk menampilkan hasil pengecekan
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
if (keterangan == 1)
{
document.getElementById("hasil").innerHTML = ajaxRequest.responseText; //hasil cek kekuatan password
}
else if (keterangan == 2)
{

document.getElementById("cocok").innerHTML = ajaxRequest.responseText; //hasil cek konfirmasi password
}
}
ajaxRequest.send(null);
}
</script> 
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
      <div class="col-xs-12 col-md-4 col-md-offset-4" id="form-login">
          <form class="form-signin" style="padding: 30px;" method="post" id="login-form">
          <!--<h1>Saya Anggota <a style="margin-left:68px;color:#000;" href="index.php"><i class="material-icons">home</i>-->
          <a href="index.php"><img src="img/logo-kecil-login.png" style="padding-left: 150px"></a>
          <h1 style="font-family: 'Raleway', sans-serif; color:#9e9e9e; padding-left: 80px; font-size: 30px;"> Saya Anggota <a style="color:#000; " href="index.php">
          </a></h1><hr/>
          <div id="pesan">
          <!-- error will be shown here ! -->
          </div>
          <div class="form-group form-group-lg has-feedback">
             <span class="icons glyphicon glyphicon-user form-control-feedback"></span>
             <input style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" type="text">
          </div> 
          <p><span id="txtHint"></span></p>
          <div class="form-group form-group-lg has-feedback">
             <span class="icons glyphicon glyphicon-user form-control-feedback"></span>
             <input onkeyup="showHint(this.value)" style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Username" name="username" id="username" type="text">
          </div> 

          <div class="form-group form-group-lg has-feedback">
              <span  class="icons glyphicon glyphicon-lock form-control-feedback"></span>
              <input onkeyup="validasi(event,1)" id='pass' style="border-radius: 0px;font-family: 'Raleway', sans-serif;"" class="form-control" placeholder="Password" name="pass" type="password">            
          </div> 
           <p><span id="cocok"></span></p>
          <div class="form-group form-group-lg has-feedback">
              <span  class="icons glyphicon glyphicon-lock form-control-feedback"></span>
              <input style="border-radius: 0px;font-family: 'Raleway', sans-serif;""  onkeyup="validasi(event,2)" class="form-control" placeholder="Konfirmasi Password" name="password2" id="password2" type="password">            
          </div> 
          <hr />
          <div class="form-group">
              <button type="submit" id="submit" class="btn btn-lg btn-block btn-default"  style="background-color:#4db6ac;color:white;" >
                <span class="glyphicon glyphicon-log-in"></span> Daftar 
            </button> 
          </div> 
          <div><p style="color:#333333;font-family: 'Raleway', sans-serif;">Sudah punya akun ? <a style="color:#26a69a;font-family: 'Raleway', sans-serif;" href="login.php">Masuk</a></p></div>
          <div><a style="color:#26a69a;font-family: 'Raleway', sans-serif;" href="index.php#kontak">bantuan ?</a></div>  
        </form>
      </div>
    </div>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/anggota.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

