<?php
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];
	$cek 	= $mysqli->query("select * from users_anggota where username='$username' and password='$password'");
	$data	= $cek->fetch_array();
?>
<br><br>
<h4  class="capital sub-header">Hi, <?php echo $data['nama']; ?></h4>
<h6>Anda sebagai pengurus</h6>