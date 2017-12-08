<?php
	if(!defined("INDEX")) die("---");
  date_default_timezone_set("Asia/Jakarta");
  $dateTime = date('Ymdhis');
  $tanggal  = date('Ymd');
  $waktu  = date('His');
	function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.'); return $rupiah;}
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];
	$cek 	= $mysqli->query("select id,nama from admin_group where id='$_GET[id]'");
	$data_dummy	= $cek->fetch_array();
  $mysqli->query("UPDATE admin_group set
      tanggal = $dateTime
      where id='$_GET[id]'
    ") or die($mysqli->error);

  if(isset($_POST['undang'])){

    $sqli2=$mysqli->query("SELECT * FROM users_anggota WHERE username='$_POST[user]' AND akses='anggota'");
    $datai2=$sqli2->fetch_array();
    $sum = $sqli2->num_rows;

    if($sum>0){
    $sqli2=$mysqli->query("SELECT * FROM users_anggota WHERE username='$_POST[user]' AND akses='anggota'");
    $datai2=$sqli2->fetch_array();
    $sum = $sqli2->num_rows;

    $sql1=$mysqli->query("SELECT * FROM admin_group WHERE id='$_GET[id]'");
    $data1=$sql1->fetch_array();

    $sql2=$mysqli->query("SELECT * FROM tabungan WHERE id_akses='$_GET[id]' AND id_users='$datai2[id]'");
    $cek2=$sql2->num_rows;
    $data2=$sql2->fetch_array();

    $sqli=$mysqli->query("SELECT * FROM users_anggota WHERE id='$data1[id_nama]' AND akses='admin'");
    $datai=$sqli->fetch_array();

    $sql3=$mysqli->query("SELECT * FROM notif WHERE id_akses='$data1[id]' AND id_nama='$datai2[id]' AND id_dummy='$datai[id]'");
    $data3=$sql3->fetch_array();
    $cek3=$sql3->num_rows;

    $sql4=$mysqli->query("SELECT * FROM notif WHERE id_akses='$data1[id]' AND id_nama='$datai[id]' AND id_dummy='$datai2[id]'");
    $data4=$sql4->fetch_array();
    $cek4=$sql4->num_rows;


  if ($cek2 == 0 && $cek3 == 0 && $cek4 == 0 ){
  $mysqli->query("INSERT INTO notif set
      id_nama   = $datai2[id],
      id_akses =$data1[id],
      id_dummy = $datai[id]

    ") or die($mysqli->error);
    }
  }
}

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
        xmlhttp.open("GET", "getundang_group.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<style type="text/css">
	#judul3:hover{
	color:black; 
	background-color: transparent;
	text-decoration: none;
}
	#judul3{
	color:#777;
}
#judul4{
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
	<li><a href="?tampil=organisasi" id="judul3">Group </a></li>
	<li><a id="judul4" class="active upper"> / <?php echo $data_dummy['nama']; ?></a></li>
</ul>
<br>
<h4 class="sub-header">Data Anggota</h4>

 <div class="fixed-action-btn">
    <a href="#modal1" class="btn-floating btn-large  waves-light red">
      <i class="large material-icons">add</i>
    </a>
  </div>

<div class="table-responsice">
<table class="striped bordered">
<thead>
	<tr><th>No</th>
		<th>Nama</th>
    <th>Username</th>
		<th>Total Saldo</th>
		<th>Aksi</th>
		
	<tr>
  </thead>
	
	<?php
		$no=1;

		$cek 	= $mysqli->query("select id from admin_group where id='$_GET[id]'");
	$data_dummy	= $cek->fetch_array();

		$sql = $mysqli->query("SELECT UA.username,UA.id AS id_user,UA.nama AS nama, T.saldo AS saldo FROM tabungan AS T RIGHT JOIN users_anggota AS UA ON T.id_users=UA.id WHERE T.id_akses='$data_dummy[id]'")or die($mysqli->error);
		while($data=$sql->fetch_array()){
			$saldo=format_rupiah($data['saldo']);
		
	?>

	<tr>    
		<td> <?php echo $no; ?> </td>
		<td class="capital"> <?php echo $data['nama']; ?> </td>
    <td><b><?php echo $data['username']; ?></b></td>
		<td> Rp.<?php echo $saldo; ?> </td>

	
	
		<td> 
		<a href="?tampil=transaksi&id_user=<?php echo $data['id_user']; ?>&id=<?php echo $data_dummy['id']; ?>" class="btn waves-effect waves-light" name="action">
    <i style="margin:0px" class="material-icons right">input</i></a>
			<a style="background-color: #E57373"  href="?tampil=hapus_lihat_anggota&id_user=<?php echo $data['id_user']; ?>&id=<?php echo $data_dummy['id']; ?>" class="btn waves-effect waves-light"><i style="margin:0px" class="material-icons right">delete</i></a></a>
		</td>
	
	<?php 
			$no++;
		} 
	?>
	
</table>

  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content" style="padding: 0;margin: 0;">
      <div class="modal-header">
          <div class="col s12 m1"></div>
          <h3 class="modal-title" style="text-transform: uppercase;">Undang</h3>
      </div>
      <div class="modal-content">     
      
      <form method="POST" action=""> 
        <div class="row">
            <div class="col s2 m1"></div>
            <div class="row col s10 m4">
              <div class="input-field">
                <input  onkeyup="showHint(this.value)" name="user" id="user" style="border-bottom: 1px solid #26a69a;margin:0px" type="text" class="col s10 form-control validate" required>
                <label for="username">Username Anggota</label>
                 <div style="padding-top: 5px" class="col s12 m10"><p><span id="txtHint"></span></p></div>
              </div>
            </div>
            <div class="row col s12 m2" style="padding-left: 0px">
              <div class="input-field col s12 m6" style="padding-left: 0px">
                <button style="text-transform: uppercase; background-color: #26a69a" class="waves-effect waves-light btn" type="submit" name="undang" href="">Undang</button>
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