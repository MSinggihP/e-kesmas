<?php
	session_start();
	
	$username = $_POST['username'];
	include("lib/koneksi.php");
		$cek_user 	= $mysqli->query("SELECT username FROM users_anggota 
               WHERE username='$username'");
	$data_user	= $cek_user->fetch_array();
	$cek_username = $cek_user->num_rows;

	if ($cek_username > 0){
  echo "<p style='color:red'>Username sudah ada yang pakai. Ulangi lagi</p>";
  echo"<meta http-equiv='refresh' content='1; url=index.html'>";
}else{
			$password = ($_POST['password']);
			$mysqli->query("INSERT INTO users_anggota set
			username 	= '$_POST[username]',
			password ='$password',
			nama = '$_POST[nama]',
			akses='admin'

		") or die($mysql->error);
			
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$cek 	= $mysqli->query("select * from users_anggota where username='$username' and password='$password' and akses='admin'");
	$data	= $cek->fetch_array();
	$jumlah = $cek->num_rows;
	
	if($jumlah>0){
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		
		echo"<meta http-equiv='refresh' content='0; url=users/admin.php'>";
	}
  }
?>


