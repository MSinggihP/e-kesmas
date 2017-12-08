<?php
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password = ($_SESSION['password']);
	
	$cek 	= $mysqli->query("select id,nama from users_anggota where username='$_POST[username]' AND akses='anggota'");
	$data	= $cek->fetch_array();
	$cek_username = $cek->num_rows;

	$cek2 	= $mysqli->query("select id from admin_group where id='$_GET[id]'");
	$data_dummy	= $cek2->fetch_array();

	$cek3 	= $mysqli->query("select id_users from tabungan where id_akses='$_GET[id]' AND id_users='$data[id]'");
	$data_dummy2	= $cek3->fetch_array();
	$cek_username2 = $cek3 ->num_rows;

	$cek4 	= $mysqli->query("select * from notif where id_akses='$_GET[id]' AND id_nama='$data[id]'");
	$data_dummy4	= $cek4->fetch_array();
	$cek_username4 = $cek4 ->num_rows;

	if ($cek_username == 1 && $cek_username2==0 && $cek_username4==0 ){
	$mysqli->query("INSERT INTO notif set
			id_nama 	= $data[id],
			id_akses =$data_dummy[id]

		") or die($mysql->error);
	echo"<meta http-equiv='refresh' content='1; url=?tampil=lihat_anggota&id= $data_dummy[id]'>";
?>
<br><br>
<h4 class="sub-header"><b><?php echo $data['nama']; ?></b> telah diundang</h4>
<?php
} 

else if($cek_username == 0 ){
	echo"<meta http-equiv='refresh' content='1; url=?tampil=lihat_anggota&id= $data_dummy[id]'>";
?>
<br><br>
<h4 class="sub-header">Username belum terdaftar</h4>
<?php
}else{
	echo"<meta http-equiv='refresh' content='1; url=?tampil=lihat_anggota&id= $data_dummy[id]'>";
?>
<br><br>
<h4 class="sub-header"><b><?php echo $data['nama']; ?></b> sudah ada</h4>
<?php
}
?>