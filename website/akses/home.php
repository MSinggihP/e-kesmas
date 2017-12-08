<?php 
session_start();
if (!$_SESSION['username'] == false and $_SESSION['password'] == false) {
// jika session user tidak ada maka akan dialihkan ke form login atau file index.php
     header('location:index.php');
}else{
// jika session user ada
  if (isset($_GET['keluar'])) {
  // jika variable $_GET['keluar'] ada maka akan logout dan di alihkan ke halaman login lagi
    session_destroy();
    // hancurkan atau hapus session user
    header('location:index.php');
  }

  include("lib/koneksi.php");
  
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  
  $cek  = $mysqli->query("select * from users where username='$username' and password='$password'");
  $data = $cek->fetch_array();
  if($data['level_id']=='3'){
    echo"<meta http-equiv='refresh' content='0; url=users/admin.php'>";
  }else if($data['akses']=='anggota'){
    echo"<meta http-equiv='refresh' content='0; url=anggota/admin.php'>";
  }
}
?>