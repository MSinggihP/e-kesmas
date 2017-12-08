<?php
	if(!defined("INDEX")) die("---");
	function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.'); return $rupiah;}
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];

?>
<style type="text/css">
</style>
<br>
<h4 class="sub-header">Pemberitahuan
 </h4>

<div class="table-responsice">
<table class="striped bordered">
	
	<thead>
	<tr>

		<th>No</th>
		<th>Pengirim</th>
		<th>Nama Group</th>
    <th>Kode Akses</th>
		<th>Aksi</th>
		
		
	<tr>
	</thead>
	
	<?php
		$no=1;

		$sql = $mysqli->query("SELECT  AG.kode_akses,N.id_dummy AS id_orang,UA.nama AS nama_orang, AG.nama AS nama, N.id_akses AS id_akses, N.id_nama AS id_nama from (admin_group AS AG RIGHT JOIN notif AS N ON AG.id=N.id_akses) RIGHT JOIN  users_anggota AS UA ON UA.id=N.id_dummy where N.id_nama='$data3[id]' ORDER BY N.id DESC")or die($mysqli->error);
		while($data=$sql->fetch_array()){
		
	?>

	
	<tr>
	
	<a href="#"><td> <?php echo $no; ?></a> </td>
	<td class="capital"> <?php echo $data['nama_orang']; ?> </td>
		<td> Meminta Bergabung di <p class="upper"><?php echo $data['nama']; ?></p> </td>
		<td> <b><?php echo $data['kode_akses']; ?></b> </td>
		<td> <a href="?tampil=transaksi&id=<?php echo $data['id']; ?>&id_user=<?php echo $data['id_users']; ?>" class="btn waves-effect waves-light" name="action">
    Terima</a>
			<a style="background-color: #E57373" href="?tampil=hapus_organisasi&id=<?php echo $data['id']; ?>" class="btn waves-effect waves-light">Tolak</a>
		</td>
		</tr>
		
		
	
	<?php 
			$no++;
		} 
	?>
	
</table>
