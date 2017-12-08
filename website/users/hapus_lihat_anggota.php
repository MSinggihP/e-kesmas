<?php
	if(!defined("INDEX")) die("---");

	$cek2 	= $mysqli->query("select id from admin_group where id='$_GET[id]'");
	$data_dummy	= $cek2->fetch_array();
	
	
	$mysqli->query("delete from tabungan where id_users='$_GET[id_user]' AND id_akses='$_GET[id]'") or die($mysqli->error());

?>
<?php
	if(!defined("INDEX")) die("---");
	$mysqli->query("delete from transaksi where id_users='$_GET[id_user]' AND id_akses='$_GET[id]'") or die($mysqli->error());

	echo"<meta http-equiv='refresh' content='1; url=?tampil=lihat_anggota&id= $data_dummy[id]'>";
?>
<h4 class="sub-header">Data telah dihapus</h4>