<?php 
  include("lib/koneksi.php");
  if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
     header('location:home.php');
}
  if(isset($_POST['btnpesan'])){
    date_default_timezone_set("Asia/Jakarta");
    $dateTime = date('Ymdhis');
    $mysqli->query("INSERT INTO pesan SET 
      nama='$_POST[nama]',
      email='$_POST[email]',
      pesan='$_POST[pesan]',
      tanggal='$dateTime'
      ") or die ($mysqli->error);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="alan inc Jakarta" content="width=device-width, initial-scale=1">
	<title>Cetar | Celengan Pintar</title>
    <link rel="shortcut icon" type="image/icon" href="img/logo.PNG"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/cetar.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Muli|Quicksand" rel="stylesheet">


    <style type="text/css">
   .quicksand{
       font-family: 'Quicksand', sans-serif;
         }
    .muli{
      font-family: 'Muli', sans-serif;
    }

    </style>
    <script src="bootsrap/js/bootsrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/animated.css">
    <style type="text/css">
    .modal-header{
      background-color:  #1976d2;
      min-height:16.45px;
      border:0px;
      margin: 0px;
      position: relative;
    }
    .modal-header h3{
      padding :20px;
      margin: 0px;
      position: relative;
    }
    .modal-header .close{
      margin-top:-2px
    }
    .modal-title{
      color:white;
      font-size:30px;
    }
    .modal-body{
      background-color: white;
    }
    .modal-body{
      position:relative;
      padding-right: 13px;
      padding-top: 15px
    }
    .btn{
      background-color: #1976d2;
      color:white;
    }
    @media only screen and (max-width: 1500px){
    .modal{
      width :50%;
    }
    @media only screen and (max-width: 700px){
    .modal{
      width :80%;
    }
    }
    .bawah{
      color :#e0e0e0;
      font-size: 18px;
    } 

  </style>
</head>
<body style="margin:0px;padding: 0px">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<div class="navbar">
  	<header class="header" style="height: 680px;background-image: url(img/cetar-headerfix.PNG);">
          <nav style="background-color: transparent;box-shadow: none">
             <div class="" style="background-color: transparent;">
        <div class="row" style="">
            <a href="index.html"><img style="margin-left: 30px; margin-top: 10px;" src="img/cetar-logofix.PNG"></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!--<li><a href="#modal1" style="margin-top:10px;padding:15px;background-color: red;color: white; margin-right: 30px">Masuk</a></li>-->
            <li><a href="login.php" class="waves-effect waves-light btn" style="margin: 50px;margin-top: 30px;color:white;background-color: #ffa000  margin-left: 0px;font-family: 'Muli', sans-serif;">Join Grup</a></li>
          </ul>   
        </div>
      </div>
          </nav>
         
  		<div class="container">
  			<div class="row animated fadeInDown">
  				<h2 style="margin-bottom:0px;color:white; margin-left:90px" class="title col s10 offset-s3, muli"> 
  					Selamat Datang di Cetar
  				</h2>
          <p style="margin-top:10px;color:white; margin-left:175px; font-size: 20px;" class="title col s10 offset-s3, muli">
          Cara paling aman dan termudah bagi pengguna tabungan digital.
          </p>
          <hr style="color:white;width: 640px; margin-left: 170px">
          <h5 style="margin-bottom:0px;color:white; margin-left:390px" class="title col s6 offset-s3, muli"> 
            Buat Akun Gratis
          </h5>
  			</div>
  			<div class="row animated fadeInUp">
          <div class="col s1"></div>
  				<!--<a href="#" class="waves-effect light-blue btn col s3 offset-s3">Admin</a>-->
  				<a href="daftaradmin.php" class="waves-effect waves-light btn col s2 offset-s3" style="background-color: #1976d2; margin-right:10px; font-family: 'Muli', sans-serif;">Saya Pengurus</a>
  				<a href="daftaranggota.php" class="waves-effect waves-light btn col s2" style="background-color: #ff9800 ; font-family: 'Muli', sans-serif;">Saya Anggota</a>

  				<!--<a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>button</a>-->
  			</div>
  			</div>
  		</div>
  	</header>

<!--<div class="navbar">
    <header class="header" style="height: 680px;background-image: url(img/cetar-headerfix.PNG);">
          <nav style="background-color: transparent;box-shadow: none">
             <div class="" style="background-color: transparent;">-->

  	<!--About-->
  	<section class="about">
  		<div class="container">
  			<div class="row">
  				<div class="col s6 animated fadeInLeft">
  					<div class="about-left">
  						<h3 class="title, muli"><b>Cetar?</b></h3>

                		<p class="muli" style="font-size: 18px">Celengan Pintar adalah aplikasi keuangan sederhana yang berfungsi
                		untuk mencatat pemasukan, pengeluaran dan utang piutang.</p> 

                		<p class="muli" style="font-size: 18px">Prosesnya mirip Kas Kecil (debet-kredit-saldo) yang biasa Anda gunakan 
                		untuk keperluan pribadi, bisnis, dan organisasi.</p>

  					</div>
  				</div>
  				<div id="tentang" class="col s6 animated fadeInRight">
  					<div class="about-right center-align">
  						<img src="img/about.png">
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
      <div class="footer-section" style="margin-bottom: -10px;">
        <img class="img-responsive" src="img/cetar-section.png">
      </div>

  	<!--Out About-->

  	<!-- Cara Menggunakan -->
  	<section class="cara animated bounce">
      <div class="container">
  			<div class="row">
  				<div class="col s12">
  					<h3 class="title center-align" style="font-size: 40px;font-family: 'Muli', sans-serif;">
  						CARA MENGGUNAKAN
  					</h3>
            <!--Contoh awal
  				</div>
  				<div class="col s4 offset-s4">
  					<div class="col s6">
  						<a href="#caraaggota" class="teal lighten-1 btn col s12">Anggota</a>
  					</div>
  					<div class="col s6">
  						<a href="#caraadmin" class="teal lighten-1 btn col s12">Admin</a>
  					</div>
  				</div>
          End contoh akhir-->

          <!--Awal-->
         <div class="row" style="background-color: transparent; color: #47b095;">
            <div class="col s7" style="background-color: transparent;color: #47b095;">
              <ul class="tabs" style="margin-left:350px;background-color: transparent;color: #47b095;">
                <li class="tab col s3"><a class style="color: #fff; font-family: 'Muli', sans-serif;" ="active" href="#test1">Anggota</a></li>
                <li class="tab col s3"><a  style="color: #fff; font-family: 'Muli', sans-serif;" href="#test2">Pengurus</a></li>
              </ul>
            </div>
            <div id="test1" class="col s12">
              <div class="col s6 cara-left">
                <div class="cara-right center-align">
                  <img src="img/about-small.png">
                </div>
              </div>
              <div class="col s6 cara-right">
                <div class="row cara-1">
                  <div class="col s2">
                    <img src="img/satu.png">
                  </div>
                  <div class="col s10">
                   <p class="cara-text, muli" style="color: white"> Login atau Daftar </p>
                  </div>
                </div>            
              <div class="row cara-2">
                <div class="col s2">
                  <img src="img/dua.png">
                </div>
                <div class="col s10">
                  <p class="cara-text, muli" style="color: white"> Gabung Group </p>
                </div>
              </div>
              <div class="row cara-3">
                <div class="col s2">
                  <img src="img/tiga.png">
                </div>
                <div class="col s10">
                  <p class="cara-text, muli" style="color: white"> Lihat Transaksi</p>
                </div>
              </div>
              <div class="row cara-4">
                <div class="col s2">
                  <img src="">
                </div>
                <div class="col s10">
                  <p class="cara-text">  </p>
                </div>
              </div>
            </div>
            </div>

            <div id="test2" class="col s12">
              <div class="col s6 cara-left">
                <div class="cara-right center-align">
                  <img src="img/about-small.png">
                </div>
              </div>
              <div class="col s6 cara-right">
                <div class="row cara-1">
                  <div class="col s2">
                    <img src="img/satu.png">
                  </div>
                  <div class="col s10">
                   <p class="cara-text, muli" style="color: white"> Login atau Daftar </p>
                  </div>
                </div>            
              <div class="row cara-2">
                <div class="col s2">
                  <img src="img/dua.png">
                </div>
                <div class="col s10">
                  <p class="cara-text, muli" style="color: white"> Tambah Anggota </p>
                </div>
              </div>
              <div class="row cara-3">
                <div class="col s2">
                  <img src="img/tiga.png">
                </div>
                <div class="col s10">
                  <p class="cara-text, muli" style="color: white"> Pilih Transaksi Pada Nama Anggota </p>
                </div>
              </div>
              <div class="row cara-4">
                <div class="col s2">
                  <img src="img/empat.png">
                </div>
                <div class="col s10">
                  <p class="cara-text, muli" style="color: white"> Pilih Tambah Atau Ambil Untuk Transaksi </p>
                </div>
              </div>
            </div>
            </div>
          

          <!--End of Navbar-->

				</div>
			</div>
  		</div>
  	</section>
      <div class="footer-section" style="margin-bottom: -6px; width: 100%">
        <img class="img-responsive" src="img/footer-green.png">
      </div>

    <!--NILAI YANG KAMI PEGANG-->
    <section class="nilai">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h3 class="title center-align" style="font-size: 40px;font-family: 'Muli', sans-serif; margin-bottom:  80px">
              NILAI YANG KAMI PEGANG
            </h3>
          </div>
          <div class="col s12 center-align">
          <div class="col s4">
            <img src="img/amanfix.png">
            <h4 class="muli">Aman</h4>
            <p class="muli">
              Cetar menggunakan layanan secara optimal.
            </p>
          </div>
          <div class="col s4">
            <img src="img/mudahfix.png">
            <h4 class="muli">Mudah</h4>
            <p class="muli">
              Cetar membantu pengguna untuk mengelola tabungan secara otomatis dan berkala.
            </p>
          </div>
          <div class="col s4">
            <img src="img/menyenangkanfix.png">
            <h4 class="muli">Menyenangkan</h4>
            <p class="muli">
              Cetar berusaha mempermudah admin tabungan sehingga lebih efektif dan menyenangkan.
            </p>
          </div>
        </div>
      </div>    
    </section>

    <!--Contact-->  

    <section id="kontak" class="contact" style="background-color: #00695c; color: #fff">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h3 class="title center-align" style="font-size: 40px; font-family: 'Muli', sans-serif; margin-bottom: 0px; margin-top: 100px;">
              KONTAK KAMI
            </h3>
             <hr style="color:white;width: 250px; margin-left: 350px; margin-bottom: 50px">
          </div>
        <div class="row">
          <div class="col s12 m6">
          <form method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input name="nama" id="last_name" type="text" class="validate" required>
                <label for="last_name">Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="email" id="email" type="email" class="required validate">
                <label for="email" required>Enter Email</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <textarea type="text" name="pesan" id="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1" required>Message</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <button name="btnpesan" class="waves-effect waves-light btn">Kirim</button>
                </div>
            </div>
          </div>
          </form>
          <div class="col s12 m6">
            <p class="bawah" style="font-family: 'Muli', sans-serif;" ><b>Head Office:</b><br>
              Jl. Gatot Subroto Kav. 97 - Jakarta Selatan 
            </p>  <!-- edit disini-->

            <p class="bawah" style="font-family: 'Muli', sans-serif;"><b>Phone</b><br>
              089821391765 (M. Singgih)
            <br>083743839409 (Ilafi Firsta Putri)</br>
            </p>
            

            <p class="bawah" style="font-family: 'Muli', sans-serif;"><b>E-mail</b>
            <br>support: cs@cetar.com
            <br>info: info@cetar.com</br>
            </p>
         </div>
         </div>
         </div>
         </div>
      <div  style="background-color: #004d40 ; font-color: #fafafa; font:#fafafa; margin-bottom: 0px; padding-top: 5px; padding-bottom: 5px;">
          <div class="col s12">
            <p class="text-center, muli"><a style="padding-left:530px;color:#fff; margin-bottom: 0px; margin-top: 10px;">Copyright@ 2016 Cetar by Singgih & Ilafi</a></p>
                  </div>
      </div>
         </section>

<script type="text/javascript">
   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

 animationHover('#tentang', 'fadeInLeft');

 function animationHover(element, animation){
  element = $(element);
  element.hover(
    function() {
      element.addClass('animated ' + animation);
    },
    function(){
      //wait for animation to finish before removing classes
      window.setTimeout( function(){
        element.removeClass('animated ' + animation);
      }, 20000);
    }
  );
};
</script>
</body>
</html>