<?php
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password=$_SESSION['password'];
	$cek 	= $mysqli->query("SELECT * from users_anggota where username='$username' and password='$pass'") or die($mysqli->error);
	$sum = $cek->num_rows;
	if(isset($_POST['ganti'])){
		if($_POST['pass']==$_POST['password2']){
			$cek=true;
			$mysqli->query("UPDATE users_anggota SET password='$_POST[pass]' WHERE username='$username'") or die($mysqli->error);
			$_SESSION['password'] = $_POST['pass'];
			echo"<meta http-equiv='refresh' content='0; url=?tampil=beranda'>";
		}
}

?>
<script language='JavaScript'>

var ajaxRequest;

function getAjax() //mengecek apakah web browser support AJAX atau tidak
{
try
{
// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
}
catch (e)
{
// Internet Explorer Browsers
try
{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
}

function validasi (keyEvent,pilihan) //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
{
keyEvent = (keyEvent) ? keyEvent: window.event;
input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
if (input.value) //jika input dimasukkan, masuk ke fungsi cekEmail
{
if (pilihan == 1)
{
cekPass("cekpass.php?password=1&input=" + input.value,1); //mengirim inputan ke file cekpass.php
}
else if (pilihan == 2)
{
pass = document.getElementById('pass').value; //mengambil nilai dari form password yang telah dicek
cekPass("cekpass.php?password=2&pass=" + pass + "&input=" + input.value,2); //mengirim inputan konfirmasi password
}
}
}

function cekPass(fileCek,keterangan) //fungsi untuk menampilkan hasil pengecekan
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
if (keterangan == 1)
{
document.getElementById("hasil").innerHTML = ajaxRequest.responseText; //hasil cek kekuatan password
}
else if (keterangan == 2)
{

document.getElementById("cocok").innerHTML = ajaxRequest.responseText; //hasil cek konfirmasi password
}
}
ajaxRequest.send(null);
}
</script> 
 <form method="POST">
<?php 
	if($cek!=true){
 ?>
 	<div class="container">
			 <div style="color:red; " class="alert alert-danger">
    			<strong>Danger !</strong> Username dan password anda salah.
  			</div>
  		</div>
 	<?php } ?>
<div class="row">
    <div class="input-field col s6">
      <input onkeyup="validasi(event,1)" id='pass' name="pass" type="password" class="validate">
      <label  for="pass">Password Baru</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
      <input onkeyup="validasi(event,2)" name="password2" id="password2" type="password" class="validate">
      <label  for="password2">Konfirmasi Password</label>
      <p><span id="cocok"></span></p>
    </div>
</div>

<button name="ganti" class="waves-effect waves-light btn">Ganti Password</button>
</form>