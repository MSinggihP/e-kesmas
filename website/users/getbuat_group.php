<?php
// Array with names
    include("../lib/koneksi.php");

    $user = $_REQUEST["q"];

    $sql=$mysqli->query("SELECT id FROM admin_group WHERE kode_akses='$user'") or die($mysqli->error);
    $data = $sql->fetch_array();
    $jumlah = $sql->num_rows;

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

if($jumlah == 0){
    echo $hint === "" ? "<font color=green>Kode Group tersedia!</font>" : $hint;
}else{
    echo $hint === "" ? "<font color=red>Kode Group tidak tersedia!</font>" : $hint;
}
// lookup all hints from array if $q is different from "" 

?>