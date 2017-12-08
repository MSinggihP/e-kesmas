<?php
	session_start();
	
	if(!empty($_SESSION['username'])and !empty($_SESSION['password'])){
		  date_default_timezone_set("Asia/Jakarta");
		  $dateTime = date('Ymdhis');
		  $tanggal  = date('Ymd');
		  $waktu  = date('His');
		include("../lib/koneksi.php");
		define("INDEX",true);
	$username = $_SESSION['username'];
	$cek = $mysqli->query("select id from users_anggota where username='$username'");
		$data3	= $cek->fetch_array();
		$sql1 = $mysqli->query("select AG.id AS nama from admin_group AS AG LEFT JOIN notif AS N ON AG.id=N.id_akses where N.id_nama='$data3[id]' ORDER BY N.id DESC");
		$data2	= $sql1->fetch_array();
	$mysqli->query("UPDATE users_anggota set
      tanggal = $dateTime
      where username='$username'
    ") or die($mysqli->error);
?>

<html !DOCTYPE>
	<head>
		<title>Halaman Administrator</title>
		<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		

		<link rel="stylesheet" href="../css/admin.css"> 	
		<script type="text/javascript" src="../js/jquery-2.0.2.min.js"></script>
		<script src="../js/jquery.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		 <style type="text/css">
		 	.upper{
				text-transform: uppercase;
			}
			.capital{
				text-transform: capitalize;
			}
		    .modal-header{
		      background-color:  #218ACB;
		    }
		        .modal-header h3{
		      padding :0px;
		      margin: 0px;
		      position: relative;
		    }
		    .modal-title{
		      color:white;
		      font-size:30px;
		    }
		    .modal-body{
		      background-color: white;
		    }
		    .btn{
		      
		      color:white;
		    }
		    #menu{
		    	background-color:#44d5c6;
		    	border-color: #44d5c6;
		    	color: #fff;
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
		 </style>
	</head>

	<body>
		<!--Import jQuery before materialize.js-->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	     <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
		<nav style="background-color: #26a69a" class=" lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img height="100%" src="../images/cetar_logo.png" style="padding-left: 0px;padding-top:2px;padding-bottom:2px"></a>
      <ul class="right hide-on-med-and-down">

       <li><a style="color: #fff;" href="admin.php"><i class="material-icons">home</i></a></li>
        <li><a style="color: #fff;" href="?tampil=organisasi"><i class="material-icons">people</i></a></li>
		<li><a style="color: #fff;" href="?tampil=user_edit"><i class="material-icons">person</i></a></li>
		<li>
		<a style="color: #fff;" data-beloworigin="true"  class='dropdown-button' data-activates='dropdown1'><i class="material-icons">notifications</i></a>

				<!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content' style="margin-top:0px;padding: 20px;padding-top:5px;padding-bottom: 0px;margin-bottom: 0px">
  		<?php
  		$notif = $mysqli->query("SELECT N.id_dummy AS id_orang,UA.nama AS nama_orang, AG.nama AS nama, N.id_akses AS id_akses, N.id_nama AS id_nama from (admin_group AS AG RIGHT JOIN notif AS N ON AG.id=N.id_akses) RIGHT JOIN  users_anggota AS UA ON UA.id=N.id_dummy where N.id_nama='$data3[id]' ORDER BY N.id DESC");
  		$data_notif=$notif->fetch_array();
  		$cek =  $notif->num_rows;

  		if($cek!=0){
  		$id=0;
		$sql = $mysqli->query("SELECT N.id_dummy AS id_orang,UA.nama AS nama_orang, AG.nama AS nama, N.id_akses AS id_akses, N.id_nama AS id_nama from (admin_group AS AG RIGHT JOIN notif AS N ON AG.id=N.id_akses) RIGHT JOIN  users_anggota AS UA ON UA.id=N.id_dummy where N.id_nama='$data3[id]' ORDER BY N.id DESC");
  		while($data=$sql->fetch_array()){
  			$ambil_nama = $mysqli->query("SELECT * FROM users_anggota WHERE id='$data[id_nama]' AND akses='anggota'");
  			$data_ambil = $ambil_nama->fetch_array();
  		$id++;
  		if($id<=3){
  			?>
  		<p style="color:black"><b class="capital"><?php echo $data['nama_orang']; ?></b> Meminta bergabung ke group <b class="upper"><?php echo $data['nama']; ?></b></p> 	
  		<div class="row" style="margin-left: 80px"> 
    	<a style="font-size: 20px" class="waves-effect waves-light btn col s3" name="btnterima" href="?tampil=notif&id=<?php echo $data['id_akses'];?>&id2=<?php echo $data['id_nama'];?>&id3=<?php echo $data['id_orang'];?>">+</a>
    	<a href="?tampil=notif_nolak&id=<?php echo $data['id_akses'];?>&id2=<?php echo $data['id_nama'];?>&id3=<?php echo $data['id_orang'];?>" style="background-color:#F44336;font-size: 35px" class="waves-effect waves-light btn col s3" name="btntolak">-</a>
    	</div>
    	<hr>	
    <?php 	
		}?>
		
	<?php
	} if($cek>=3){?>
		<p id="seleng"><a style="margin:0px;padding: 0px;color:black" href="?tampil=notif_lihat&id=<?php echo $data['id_nama']; ?>"><u>Lihat Selengkapnya</u></a></p>
<?php
}}else{
		?>
		<p style="color:black"><?php  echo "Tidak ada Pemberitahuan";?></p>
	<?php
		}
    ?>

    	
      </ul>
		</li>
		<li><a style="color: #fff;" href="?tampil=keluar"><i class="material-icons">exit_to_app</i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a style="color: #26a69a" href="admin.php">    Beranda </a></li>
        <li><a style="color: #26a69a;" href="?tampil=organisasi">   Group</a></li>
        <li><a style="color: #26a69a;" href="?tampil=notif_lihat&id=<?php echo $data_notif['id_nama']; ?>">		Pemberitahuan	</a></li>
		<li><a style="color: #26a69a;" href="?tampil=user_edit">		Profil	</a></li>
		<li><a style="color: #26a69a;" href="?tampil=keluar">			Keluar	</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>	
		<div class="container">	
			<div class="section">		
			<div class="row">
				<div class="col s12 m12">
					<?php include("konten.php"); ?> 
				</div>
				<div class="col s12 m4"></div>
			</div>
			</div>
		</div>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../materialize/js/materialize.js"></script>
  <script src="../materialize/css/init.js"></script>
	</body>
</html>
<script type="">$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );</script>
<?php
	}else{
		echo"<meta http-equiv='refresh' content='0; url=../index.php'>";
	}
?>