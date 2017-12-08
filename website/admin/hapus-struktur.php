<?php
	if(!defined("INDEX")) die("---");

	
	$mysqli->query("DELETE from struktur where id='$_GET[id]'") or die($mysqli->error());
	echo"<meta http-equiv='refresh' content='0; url=?tampil=tentang'>";

?>