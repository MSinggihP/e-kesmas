<?php
	if(!defined("INDEX")) die("---");
?>
<style type="text/css">
    ul li a{
        color: #fff;
    }
</style>
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a style="color: #fff;" class="navbar-brand" href="#">Halaman Administrator</a>
</div>

<div id="navbar" class="navbar-collapse collapse">
	
    <ul class="nav navbar-nav navbar-right">
        <li><a style="color: #fff;" href="admin.php">    Beranda </a></li>
        <li><a style="color: #fff;" href="?tampil=organisasi">   Organisasi</a></li>
		<li><a style="color: #fff;" href="?tampil=user_edit">		Profil	</a></li>
		<li><a style="color: #fff;" href="?tampil=keluar">			Keluar	</a></li>
     </ul>
</div>
