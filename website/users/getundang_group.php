<?php
// Array with names
    include("../lib/koneksi.php");

    $user = $_REQUEST["q"];

    $sql=$mysqli->query("SELECT id FROM users_anggota WHERE username='$user' AND akses='anggota'") or die($mysqli->error);
    $data = $sql->fetch_array();
    $jumlah = $sql->num_rows;

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

if($jumlah == 0){
    echo $hint === "" ? "<font color=red>Username tidak ada!</font>" : $hint;
}else{
    echo $hint === "" ? "<font color=green>Username ada ..</font>" : $hint;
}
// lookup all hints from array if $q is different from "" 

?>