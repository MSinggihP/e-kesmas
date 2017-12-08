<?php
// Array with names
    include("lib/koneksi.php");

    $user = $_REQUEST["q"];

    $sql=$mysqli->query("SELECT * FROM users WHERE username='$user'") or die($mysqli->error);
    $jumlah = $sql->num_rows;

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

if($jumlah == 0){
    echo $hint === "" ? "<font color=green>Username berhasil..</font>" : $hint;
}else{
    echo $hint === "" ? "<font color=red>Username Sudah digunakan!</font>" : $hint;
}
// lookup all hints from array if $q is different from "" 

?>