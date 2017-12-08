<?php
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password = ($_SESSION['password']);
	
	$cek 	= $mysqli->query("select id from users_anggota where username='$username' and password='$password' and akses='admin'");
	$data	= $cek->fetch_array();

	$cek2 	= $mysqli->query("select * from admin_group where kode_akses='$_POST[kode]'");
	$data2	= $cek2->fetch_array();
	$cek_kode = $cek2->num_rows;

	if($cek_kode ==0){

	$mysqli->query("INSERT INTO admin_group set
			nama 	= '$_POST[nama]',
			kode_akses='$_POST[kode]',
			id_nama=$data[id]

		") or die($mysql->error);
	
	echo"<meta http-equiv='refresh' content='1; url=?tampil=organisasi'>";
?>
<br>
<h4 class="sub-header">Group sudah ditambah</h4>
<?php
}else{
	echo"<meta http-equiv='refresh' content='1; url=?tampil=organisasi'>";
?>
<br>
<h4 class="sub-header">Kode Group Sudah Ada</h4>
<?php
}
?>