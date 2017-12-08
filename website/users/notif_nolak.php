<?php
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password = ($_SESSION['password']);
	
	$cek 	= $mysqli->query("select * from notif where id_akses='$_GET[id]' AND id_nama='$_GET[id2]'");
	$data	= $cek->fetch_array();
	$cek_username = $cek->num_rows;
	$mysqli->query("delete from notif where id='$data[id]' AND id_nama='$_GET[id2]' AND id_dummy='$_GET[id3]'") or die($mysqli->error());
	echo"<meta http-equiv='refresh' content='0; url=?tampil=organisasi'>";
?>