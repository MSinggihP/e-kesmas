<?php
	if(!defined("INDEX")) die("---");
	function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.'); return $rupiah;}
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];

  if(isset($_POST['buat'])){
  $cek  = $mysqli->query("select id from users_anggota where username='$username' and akses='admin'");
  $data = $cek->fetch_array();

  $cek2   = $mysqli->query("select * from admin_group where kode_akses='$_POST[user]'");
  $data2  = $cek2->fetch_array();
  $cek_kode = $cek2->num_rows;

  if($cek_kode ==0){

  $mysqli->query("INSERT INTO admin_group set
      nama  = '$_POST[nama]',
      kode_akses='$_POST[user]',
      id_nama=$data[id]

    ") or die($mysql->error);
}}

?>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getbuat_group.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<style type="text/css">
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
</style>
<br>
<h4 class="sub-header">Data Group 
 </h4>
 <div class="fixed-action-btn">
    <a href="#modal1" class="btn-floating btn-large  waves-light red">
      <i class="large material-icons">add</i>
    </a>
  </div>

<div class="table-responsice">
<table class="striped bordered">
	
	<thead>
	<tr>

		<th>No</th>
		 
		<th>Nama Group</th>
		<th>Anggota</th>
		<th>Kode Group</th>
		<th>Total Saldo</th>
		<th>Aksi</th>
		
		
	<tr>
	</thead>
	
	<?php
		$no=1;

		$cek 	= $mysqli->query("select id from users_anggota where username='$username' and password='$password' and akses='admin'");
	$data_dummy	= $cek->fetch_array();

		$sql = $mysqli->query("SELECT AG.kode_akses,AG.id,AG.nama,COUNT(T.id_users) AS jumlah_anggota,SUM(T.saldo) AS saldo FROM tabungan AS T RIGHT JOIN admin_group AS AG ON T.id_akses=AG.id WHERE AG.id_nama='$data_dummy[id]' GROUP BY AG.id")or die($mysqli->error);
		while($data=$sql->fetch_array()){
			$saldo=format_rupiah($data['saldo']);
		
	?>

	
	<tr>
	
	<a href="#"><td> <?php echo $no; ?></a> </td>
		<td class="upper"> <?php echo $data['nama']; ?> </td>
		<td> <?php echo $data['jumlah_anggota']; ?> </td>
		<td><b><?php echo $data['kode_akses']; ?></b></td>
		<td> Rp.<?php echo $saldo; ?> </td>
		<td> <a href="?tampil=lihat_anggota&id=<?php echo $data['id']; ?>" class="btn waves-effect waves-light" name="action">
    <i style="margin:0px" class="material-icons right">input</i></a>
			<a style="background-color: #E57373" href="?tampil=hapus_organisasi&id=<?php echo $data['id']; ?>" class="btn waves-effect waves-light"><i style="margin:0px" class="material-icons right">delete</i></a></a>
		</td>
		</tr>
		
		
	
	<?php 
			$no++;
		} 
	?>
	
</table>

   <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content" style="padding: 0;margin: 0;">
      <div class="modal-header">
          <div class="col s12 m1"></div>
          <h3 class="modal-title" style="text-transform: uppercase;">Buat Group</h3>
      </div>
      <div class="modal-content">     
      
      <form method="POST" action=""> 
        <div class="row" style="margin-bottom: 0px;">
          <div class="col s12 m1"></div> 
          <div class="row col s12 m4" style="margin-bottom: 0px;">
            <div class="input-field">
              <input  style="margin-bottom:0px;border-bottom: 1px solid #26a69a;" type="text" name="nama" id="nama" class="col s12 form-control validate" required>
              <label for="nama">Nama Group</label>
            </div>
          </div>
          <div class="row col s12 m4">
            <div class="input-field">
               <input onkeyup="showHint(this.value)" style="border-bottom: 1px solid #26a69a;" type="text" name="user" id="user" class="col s12 form-control validate" required> 
              <label for="kode">Kode Group</label>
              <p><span id="txtHint"></span></p>
            </div>
          </div> 
          <div class="row col s12 m2">
            <div class="input-field">
             <div class="input-field col s12 m6" style="margin: 0">                
              <button name="buat" style="text-transform: uppercase; background-color: #26a69a" class="waves-effect waves-light btn" type="submit" href="">Buat</button>
             </div>
            </div>
          </div>
        </div>
          
      </form> 
      </div>
    </div>
    </div>
  </div>


  <script type="text/javascript">
   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>