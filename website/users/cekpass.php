<?php
$input = $_GET['input']; //menangkap password yang diinput oleh user
$cek = $_GET['password']; //menangkap nilai apakah untuk input password atau konfirmasi
$passs = $_GET['pass']; //menangkap nilai dari form password yang diisi
 if ( $cek == 2 ) //untuk melakukan pengecekan konfirmasi password
{
if ($passs == $input) echo "<font color=green>konfirmasi password sama..</font>";
else echo "<font color=red>konfirmasi password tidak sama!</font>";
}
?>