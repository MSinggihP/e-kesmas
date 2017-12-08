<?php
	if(!defined("INDEX")) die("---");
	
	if( isset($_GET['tampil']) ) $tampil = $_GET['tampil'];
	else $tampil = "beranda";
	
	if( $tampil == "beranda" )		include("beranda.php");	
	elseif( $tampil == "organisasi" )	include("organisasi.php");
	elseif( $tampil == "organisasi_tambah" )	include("organisasi_tambah.php");
	elseif( $tampil == "organisasi_tambahproses" )	include("organisasi_tambahproses.php");
	elseif( $tampil == "lihat_anggota" )	include("lihat_anggota.php");
	elseif( $tampil == "undangproses" )	include("undangproses.php");
	elseif( $tampil == "transaksi" )	include("transaksi.php");
	elseif( $tampil == "transaksiproses" )	include("transaksiproses.php");
	elseif( $tampil == "hapus_lihat_anggota" )	include("hapus_lihat_anggota.php");
	elseif( $tampil == "hapus_organisasi" )	include("hapus_organisasi.php");
	elseif( $tampil == "notif" )	include("notif.php");
	elseif( $tampil == "notif_lihat" )	include("notif_lihat.php");
	elseif( $tampil == "notif_nolak" )	include("notif_nolak.php");
	elseif( $tampil == "user_edit" )	include("user_edit.php");
	elseif( $tampil == "form" )	include("form.php");
	elseif( $tampil == "keluar" )	include("keluar.php");
	
	
	else echo"Konten tidak ada";
?>		