<?php
	if(!defined("INDEX")) die("---");
	
	if( isset($_GET['tampil']) ) $tampil = $_GET['tampil'];
	else $tampil = "beranda";
	
	if($_SESSION['level']==1){
		if( $tampil == "beranda" )		include("beranda-admin.php");
	}else if($_SESSION['level']==2){
		if( $tampil == "beranda" )		include("beranda-puskesmas.php");
	}
	if( $tampil == "keluar" )	include("keluar.php");

	elseif( $tampil == "pengguna" )	include("pengguna/pengguna.php");
	elseif( $tampil == "pengguna-hapus" )	include("pengguna/pengguna-hapus.php");

	elseif( $tampil == "puskesmas" )	include("puskesmas/puskesmas.php");
	elseif( $tampil == "admin-puskesmas" )	include("puskesmas/admin-puskesmas.php");

	elseif( $tampil == "antrian" )	include("antrian/antrian.php");
	elseif( $tampil == "antrian-admin" )	include("antrian/antrian-admin.php");
	elseif( $tampil == "form-antrian" )	include("antrian/form-antrian.php");

	elseif( $tampil == "berita" )	include("berita/berita.php");

	elseif( $tampil == "pasien" )	include("pasien/pasien.php");








	
	elseif( $tampil == "posts" )	include("posts.php");
	elseif( $tampil == "slider" )	include("slider.php");

	elseif( $tampil == "comment" )	include("comment.php");
	elseif( $tampil == "lihat-komentar" )	include("lihat-komentar.php");

	elseif( $tampil == "pesan" )	include("pesan.php");
	elseif( $tampil == "lihat-pesan" )	include("lihat-pesan.php");

	elseif( $tampil == "edit-post" )	include("edit-post.php");
	elseif( $tampil == "tambah-post" )	include("tambah-post.php");
	elseif( $tampil == "lihat-artikel" )	include("lihat_artikel.php");
	elseif( $tampil == "lihat-artikel-post" )	include("lihat-artikel-post.php");
	elseif( $tampil == "hapus-post" )	include("hapus-post.php");

	elseif( $tampil == "edit-slider" )	include("edit-slider.php");
	elseif( $tampil == "tambah-slider" )	include("tambah-slider.php");
	elseif( $tampil == "lihat-slider" )	include("lihat_slider.php");
	elseif( $tampil == "lihat-slider-post" )	include("lihat-slider-post.php");
	elseif( $tampil == "hapus-slider" )	include("hapus-slider.php");

	elseif( $tampil == "profil" )	include("profil.php");
	elseif( $tampil == "ganti-pass" )	include("ganti-pass.php");

	elseif( $tampil == "potensi-sda" )	include("potensi-sda.php");
	elseif( $tampil == "hapus-potensi-sda" )	include("hapus-potensi-sda.php");
	elseif( $tampil == "tambah-potensi-sda" )	include("tambah-potensi-sda.php");
	elseif( $tampil == "potensi-sda-posts" )	include("potensi-sda-posts.php");
	elseif( $tampil == "edit-potensi-sda" )	include("edit-potensi-sda.php");
	elseif( $tampil == "potensi-sda-update" )	include("potensi-sda-update.php");

	elseif( $tampil == "hapus-potensi-desa" )	include("hapus-potensi-desa.php");
	elseif( $tampil == "potensi-desa" )	include("potensi-desa.php");
	elseif( $tampil == "tambah-potensi-desa" )	include("tambah-potensi-desa.php");
	elseif( $tampil == "potensi-desa-posts" )	include("potensi-desa-posts.php");
	elseif( $tampil == "edit-potensi-desa" )	include("edit-potensi-desa.php");
	elseif( $tampil == "potensi-desa-update" )	include("potensi-desa-update.php");
	
	elseif( $tampil == "potensi-sdme" )	include("potensi-sdme.php");
	elseif( $tampil == "hapus-potensi-sdme" )	include("hapus-potensi-sdme.php");
	elseif( $tampil == "tambah-potensi-sdme" )	include("tambah-potensi-sdme.php");
	elseif( $tampil == "potensi-sdme-posts" )	include("potensi-sdm-posts.php");
	elseif( $tampil == "edit-potensi-sdme" )	include("edit-potensi-sdme.php");
	elseif( $tampil == "potensi-sdme-update" )	include("potensi-sdme-update.php");
	
	elseif( $tampil == "hapus-apbd" )	include("hapus-apbd.php");
	elseif( $tampil == "lihat-apbd" )	include("lihat-apbd.php");
	elseif( $tampil == "tambah-apbd" )	include("tambah-apbd.php");
	elseif( $tampil == "apbd-posts" )	include("apbd-posts.php");
	elseif( $tampil == "edit-apbd" )	include("edit-apbd.php");
	elseif( $tampil == "apbd-update" )	include("apbd-update.php");
	
	

	else if($_SESSION['akses']=='admin'){
		if( $tampil == "tambah-user" )	include("tambah-user.php");
		elseif( $tampil == "hapus-user" )	include("hapus-user.php");

		elseif( $tampil == "hapus-struktur" )	include("hapus-struktur.php");
		elseif( $tampil == "lihat-struktur" )	include("lihat-struktur.php");
		elseif( $tampil == "tambah-struktur" )	include("tambah-struktur.php");
		elseif( $tampil == "struktur-posts" )	include("struktur-posts.php");
		elseif( $tampil == "edit-struktur" )	include("edit-struktur.php");
		elseif( $tampil == "struktur-update" )	include("struktur-update.php");

		elseif( $tampil == "tentang" )	include("tentang.php");
		elseif( $tampil == "lihat-tentang" )	include("lihat-tentang.php");
		elseif( $tampil == "lihat-tentang-new" )	include("lihat-tentang-new.php");
		elseif( $tampil == "edit-tentang" )	include("edit-tentang.php");

		elseif( $tampil == "viewers" )	include("viewers.php");
	}
	
	else echo"Konten tidak ada";
?>		