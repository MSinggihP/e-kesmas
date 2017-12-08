<?php
session_start();
// manandakan session di mulai
include_once 'config_db.php';
// ambil configurasi database
$data['success'] = false;
// default success false atau salah
$koneksi = new PDO("mysql:host=".$db['host'].";dbname=".$db['db_name'].";",$db['user'],$db['password']);
// koneksi PDO mysql
if (isset($_POST['username']) and isset($_POST['password'])) {
// jika data user ada
	$user = $_POST['username'];
	$pass = $_POST['password'];
	// ambil data user

	$b = $koneksi->prepare("SELECT * FROM `users_anggota` WHERE username=:user and password=:pass");
	// database exekusi
	$b->bindParam(":user",$user);
	$b->bindParam(":pass",$pass);
	$b->execute();

	if($b->rowCount() > 0){
		// jika user benar
		$result = $b->fetch(PDO::FETCH_BOTH);
		//ambil data user dari database
		$_SESSION['username']  = $result['username'];	
		$_SESSION['password'] = $result['password'];	
		//buat session user
		$data['success'] = true;
		if($result['akses']=='admin'){
			$data['celah'] = true;
		}elseif($result['akses']=='anggota'){
			$data['celah'] = false;
		}
		//berikan respon success true atau benar
	} 
}else{

	exit("Acccess danied ...!!");
	// jika data user tidak ada
}

echo json_encode($data);
// kembalikan data dengan bentuk json 
sleep(1);
// loading 1 detik/second 
	










?>

