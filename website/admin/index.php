<?php 
	include("../lib/koneksi.php");
	if(isset($_POST['btnlogin']))
	{
		session_start();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$cek 	= $mysqli->query("select * from users where username='$username' and password='$password'");
	$data	= $cek->fetch_array();
	$akses = $data['level_id'];
	$jumlah = $cek->num_rows;
	
	if($jumlah>0){
		if($data['level_id']==1){
			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['level'] = $data['level_id'];
			echo"<meta http-equiv='refresh' content='0; url=admin.php'>";
		}else if($data['level_id']==2){
			$cek_puskesmas 	= $mysqli->query("select * from users_puskermas WHERE user_id='$data[id]'");
			$data_puskesmas	= $cek_puskesmas->fetch_array();
			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['level'] = $data['level_id'];
			$_SESSION['puskesmas'] = $data_puskesmas['puskesmas_id'];
			echo"<meta http-equiv='refresh' content='0; url=admin-puskesmas.php'>";
		}
		else{
			$ceklogin = false;
		}
	}else{
		$ceklogin = false;
		}
	}
 ?>
<html !DOCTYPE>
	<head>
	  <title>Login Administrator</title>
	  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
  		<script src="../js/jquery.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
  		<!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<link rel="stylesheet" href="../css/login.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<!--Import jQuery before materialize.js-->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	     <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
	     <div class="container" style="margin-top: 50px">
			<div class="row">
				     <?php 
	      if(isset($ceklogin)){
	      ?>
		 <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Peringatan!</strong> username atau password yang anda masukan salah!
                        </div>
                    </div>
                </div>
  		<?php } ?>
				<div class="col s12 m2">	</div>
				<div class="col s12 m4">
					<img src="img/puskesmas.jpg" width="350px" style="padding-top: 45px">
				</div>
				<div class="col s12 m4" style="padding-top: 65px">
							
				<form method="POST">	
					<div class="row" ><h3><b>LOGIN ADMINISTRATOR</b></h3>	</div>
					<div class="row">
						<div class="input-field">
								<input style="font-size: 15px" type="text" name="username" class="form-control validate" required>
								<label style="font-size: 15px" for="username">Username</label>
						</div>
					 </div>
					<div class="row">
						<div class="input-field">
								<input style="font-size: 15px" type="password" name="password" class="form-control validate" required>
								<label style="font-size: 15px" for="password">Password</label>
						</div>
					</div>

								<button class="col s12 m4 waves-effect waves-light btn" type="submit" name="btnlogin">Login</button>	
								<br><br>
								<p>&copy; 2017. Designed by <a target="_blank" href="http://himti.paramadina.ac.id" title="">Himti Paramadina</a></p>

					</div>
						</div>
					</div>
					</div>
						
				</form>	
				</div>		
			</div>
		</div>
		<script type="">
			$(document).ready(function() {
			Materialize.fadeInImage();
		   	Materialize.updateTextFields();
			});
			$(document).ready(function() {
			Materialize.fadeInImage(#cek);
			});
		</script>
	</body>
</html>
