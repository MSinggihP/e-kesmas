<?php
	session_start();
	
	include("lib/koneksi.php");
	
	$username = $_POST['username'];
	$password = ($_POST['password']);
	
	$cek 	= $mysqli->query("select * from users_anggota where username='$username' and password='$password'");
	$data	= $cek->fetch_array();
	$jumlah = $cek->num_rows;
	
	if($jumlah>0 && $data['akses']=='admin'){
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		
		echo"<meta http-equiv='refresh' content='0; url=users/admin.php'>";
	}
	else if($jumlah>0 && $data['akses']=='anggota'){
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		
		echo"<meta http-equiv='refresh' content='0; url=anggota/admin.php'>";
	}
	else{
		echo"<meta http-equiv='refresh' content='0; url=index.html'>";
	}
?>