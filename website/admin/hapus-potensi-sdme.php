<?php
	if(!defined("INDEX")) die("---");

	
	$mysqli->query("DELETE from potensi where id='$_GET[id]' AND type='sdm'") or die($mysqli->error());
	echo"<meta http-equiv='refresh' content='0; url=?tampil=potensi-sda-posts'>";

?>