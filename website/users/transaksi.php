<?php
	if(!defined("INDEX")) die("---");
	function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.'); return $rupiah;}
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];

	function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$nama_bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", 
                "Jun", "Jul", "Aug", "Sep", 
                "Okt", "Nov", "Des");
		$bulan = $nama_bulan[substr($tgl,5,2) - 1];
		$tahun = substr($tgl,0,4);
		return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}
	$cek2 	= $mysqli->query("select id from admin_group where id='$_GET[id]'");
	$data_dummy	= $cek2->fetch_array();

	$tampil = $mysqli->query("SELECT * FROM tabungan WHERE id_users='$_GET[id_user]' AND id_akses='$_GET[id]'") or die($mysqli->error);
	$data  	= $tampil->fetch_array();
	$tampil2 = $mysqli->query("SELECT * FROM users_anggota WHERE id='$_GET[id_user]' AND akses='anggota'") or die($mysqli->error);
	$data2  	= $tampil2->fetch_array();
	$tampil3 = $mysqli->query("SELECT * FROM admin_group WHERE id='$_GET[id]'") or die($mysqli->error);
	$data3  	= $tampil3->fetch_array();
 $saldo=format_rupiah($data['saldo']);

?>
<style type="text/css">
	#judul3:hover{
	color:black; 
	background-color: transparent;
	text-decoration: none;
}
#judul4:hover{
	color:black; 
	background-color: transparent;
	text-decoration: none;
}
	#judul3{
	color:#777;
}
#judul4{
	color:#777;
}
#judul5{
	color:#000;
}
#apa {
    list-style-type: none;
    margin: 0px;
    padding: 5px;
    overflow: hidden;
    background-color:  #eafaf9;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.10);
    border-radius: 12px;
}
.modal-header{
      background-color:  #26a69a;
      min-height:16.45px;
      padding: 20px;
    }
    .modal-header .close{
      margin-top:-2px
    }
    .modal-title{
      color:white;
      font-size:30px;
    }
    .modal-body{
      background-color: white;
    }
    .modal-body{
      position:relative;
      padding-right: 13px;
      padding-top: 15px
    }
    .btn{
      color:white;
    }

li {
    float: left;
}

li a {
	padding: 10px;
    display: block;
    color: white;
    text-align: center;
    padding-bottom: 16px;
    padding-right: 0px;
    text-decoration: none;
}
li a:hover {
    background-color: transparent;
}
</style>
<ul id="apa">
	<li><a href="?tampil=organisasi" id="judul3">Group</a></li>
	<li><a  class="upper" id="judul4" href="?tampil=lihat_anggota&id=<?php echo $data_dummy['id']; ?>">/ <?php echo $data3['nama']; ?> / </a></li>
	<li><a id="judul5" class="capital active"><?php echo $data2['nama']; ?></a></li>
</ul>
<br>
<h4 class="sub-header">Transaksi Tabungan</h4>
<form name="Debet" method="post" action="?tampil=transaksiproses&id_user=<?php echo $data2['id']; ?>&id=<?php echo $data3['id']; ?>" enctype="multipart/form-data" class="form-horizontal">
<input type="hidden" name="id" value="<?php echo $data['id_nama']; ?>">
	
		<div class="form-group" style="padding-bottom: 45px"> 
			<label class="label-control col s12 m2">Nama</label>	
			<div class="capital col s12 m10"><?php echo $data2['nama']; ?></div> 
		</div>
		<div class="form-group" style="padding-bottom: 45px"> 
			<label class="label-control col s12 m2">Group</label>	
			<div class="upper col s12 m10"><?php echo $data3['nama']; ?></div> 
		</div>
                
		<div class="form-group" style="padding-bottom: 45px"> 
			<label style="" class="label-control col s12 m2">Sisa Saldo</label>	
			<div class="col s12 m10">Rp.<?php echo $saldo; ?></div> 
		</div>

		<div class="form-group"> 
			<label style="margin-top: 30px" class="label-control col s12 m2">Transaksi</label>
         </div>
        <div class="row  col s12 m10">
            <div class="input-field">
              <input  style="border-bottom: 1px solid #26a69a;" type="text" name="saldo" class="col s10 m4 form-control validate" required>
              <label for="saldo">Nominal</label>
            </div>
            </div>
		<div class="form-group"> 
			<label class="label-control col s12 m2"></label>				
			<div class="col-md-4"> <input type="submit" name="debet" value="Tambah" class="btn btn-primary">
	<input style="background-color:#E57373" type="submit" name="kredit" value="Ambil" class="btn btn-danger ">

</div>	
</div>		
		
</form>
<br><br>
<h4 class="sub-header">Data Tabungan</h4>
<div class="table-responsice">
<table class="striped bordered">
<tr>
	<thead>
		<th>Tanggal</th>
		<th>Debet</th>
		<th>Kredit</th>
	<tr>
	</thead>
	<?php
		$no=1;
		$sql = $mysqli->query("SELECT * FROM transaksi WHERE id_users='$_GET[id_user]' AND id_akses='$_GET[id]' order by id DESC") or die($mysqli->error);
		while($data=$sql->fetch_array()){
$saldo_debet=format_rupiah($data['saldo_debet']);
 $saldo_kredit=format_rupiah($data['saldo_kredit']);
$tanggal=tgl_indo($data['tanggal']);
	?>
	<tr>
		<td> <?php echo $tanggal; ?> </td>
		<td>Rp.<?php echo $saldo_debet; ?> </td>
		<td>Rp.<?php echo $saldo_kredit; ?> </td>
	</tr>
	<?php 
			$no++;
		} 
	?>
</table>