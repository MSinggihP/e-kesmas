<?php
	if(!defined("INDEX")) die("---");

	
	$mysqli->query("DELETE from apbd where id='$_GET[id]' AND type='$_GET[type]'") or die($mysqli->error());
	echo"<meta http-equiv='refresh' content='0; url=?tampil=apbd-posts&type=$_GET[type]''>";

?>