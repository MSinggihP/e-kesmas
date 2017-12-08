<?php
session_start();
// manandakan session di mulai
include_once 'config_db.php';
// ambil configurasi database
$data['success'] = false;
// default success false atau salah
$koneksi = new PDO("mysql:host=".$db['host'].";dbname=".$db['db_name'].";",$db['user'],$db['password']);
// koneksi PDO mysql
if ($_POST['pass']==$_POST['password2']) {
// jika data user ada
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['password2'];
	$nama = $_POST['nama'];
	$akses = "admin";
	// ambil data user

	$b = $koneksi->prepare("SELECT * FROM `users_anggota` WHERE username=:user");
	// database exekusi
	$b->bindParam(":user",$user);
	$b->execute();

	if($b->rowCount() == 0){
		 $stmt = $koneksi->prepare("INSERT INTO users_anggota (username, password, nama,akses) 
	    VALUES (:username, :password, :nama, :akses)");
	    $stmt->bindParam(':username', $user);
	    $stmt->bindParam(':password', $pass);
	    $stmt->bindParam(':nama', $nama);
	    $stmt->bindParam(':akses', $akses);

	    $user = $_POST['username'];
		$pass = $_POST['pass'];
		$nama = $_POST['nama'];
		$akses = "anggota";
	    $stmt->execute();

	    $_SESSION['username']  = $_POST['username'];	
		$_SESSION['password'] = $_POST['pass'];
		// jika user benar
		$data['celah'] = false;
		$data['success'] = true;
		//berikan respon success true atau benar
	} 
}

echo json_encode($data);
// kembalikan data dengan bentuk json 
sleep(1);
// loading 1 detik/second 
	










?>

