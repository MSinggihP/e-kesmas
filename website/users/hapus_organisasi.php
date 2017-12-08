

<?php
	if(!defined("INDEX")) die("---");

	$cek2 	= $mysqli->query("select id from users_anggota where id='$_GET[id]'");
	$data_dummy	= $cek2->fetch_array();
	
	$mysqli->query("delete from admin_group where id='$_GET[id]'") or die($mysqli->error());

?>
<?php
	if(!defined("INDEX")) die("---");
	$mysqli->query("delete from tabungan where id_akses='$_GET[id]'") or die($mysqli->error());
	$mysqli->query("delete from transaksi where id_akses='$_GET[id]'") or die($mysqli->error());

	echo"<meta http-equiv='refresh' content='1; url=?tampil=organisasi'>";
?>
<br>
<h4 class="sub-header">Data telah dihapus</h4>