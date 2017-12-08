<?php
	if(!defined("INDEX")) die("---");
	$user=$_SESSION['username'];
		$tanggal	= date('Ymd');
	$tampil2 = $mysqli->query("SELECT * FROM users_anggota WHERE id='$_GET[id_user]' AND akses='anggota'") or die($mysqli->error);
	$data2  	= $tampil2->fetch_array();
	$tampil3 = $mysqli->query("SELECT * FROM admin_group WHERE id='$_GET[id]'") or die($mysqli->error);
	$data3  	= $tampil3->fetch_array();
	
	if(isset($_POST['debet'])){

        $mysqli->query("UPDATE tabungan SET saldo=saldo+'$_POST[saldo]'
				WHERE id_users='$_GET[id_user]' AND id_akses='$_GET[id]'") or die($mysqli->error);
        $mysqli->query("UPDATE users_anggota SET saldo=saldo+'$_POST[saldo]'
				WHERE username='$user'") or die($mysqli->error);
        $mysqli->query("UPDATE users_anggota SET saldo=saldo+'$_POST[saldo]'
				WHERE id='$_GET[id_user]'") or die($mysqli->error);
	
	$mysqli->query("INSERT INTO transaksi set
			id_akses = '$_GET[id]',
			id_users 	= '$_GET[id_user]',
			tanggal=$tanggal,
			saldo_debet='$_POST[saldo]'
		") or die($mysqli->error);
	echo"<meta http-equiv='refresh' content='1; url=?tampil=transaksi&id_user= $data2[id]&id= $data3[id]'>";
?>
<br>
<h4 class="sub-header">Tabungan telah ditambah <b>Rp.<?php echo $_POST['saldo']; ?></b></h4>
<?php
}

        if(isset($_POST['kredit'])){
	
	$mysqli->query("UPDATE tabungan SET saldo=saldo-'$_POST[saldo]'
				WHERE id_users='$_GET[id_user]' AND id_akses='$_GET[id]'") or die($mysqli->error);
	$mysqli->query("UPDATE users_anggota SET saldo=saldo-'$_POST[saldo]'
				WHERE username='$user'") or die($mysqli->error);
	$mysqli->query("UPDATE users_anggota SET saldo=saldo-'$_POST[saldo]'
				WHERE id='$_GET[id_user]'") or die($mysqli->error);
	
	$mysqli->query("INSERT INTO transaksi set
			id_akses = '$_GET[id]',
			id_users 	= '$_GET[id_user]',
			tanggal=$tanggal,
			saldo_kredit='$_POST[saldo]'
		") or die($mysqli->error);

	echo"<meta http-equiv='refresh' content='1; url=?tampil=transaksi&id_user= $data2[id]&id= $data3[id]'>";
?>
<br>
<h4 class="sub-header">Tabungan telah diambil <b>Rp.<?php echo $_POST['saldo']; ?></b></h4>
<?php
}
?>