<?php 
	if(!defined("INDEX")) die("---");
	$username = $_SESSION['username'];
	$password = ($_SESSION['password']);
	$sqli=$mysqli->query("SELECT * FROM users_anggota WHERE username='$username' AND password ='$password'");
    $datai=$sqli->fetch_array();
    if(isset($_POST['ubah'])){
    	$mysqli->query("UPDATE users_anggota SET nama='$_POST[nama]', email='$_POST[email]' WHERE username='$username' AND password='$password'
    		")or die($mysqli->error);
    	echo"<meta http-equiv='refresh' content='0; url=?tampil=user_edit'>";
    }
 ?>
 <form method="POST"> 
<div class="row">
    <div class="input-field col s6">
      <input name="nama" value="<?php echo "$datai[nama]"; ?>" id="first_name2" type="text" class="capital validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
      <input name="email" value="<?php  echo "$datai[email]";?>" id="first_name2" type="email" class="validate">
      <label class="active" for="first_name2">Email</label>
    </div>
</div>
<div class="row">
	<div class="col s12 m2"><button name="ubah" class="waves-effect waves-light btn">Ubah</button></div>
	<div class="col s12 m6">
		<a href="?tampil=form" class="waves-effect waves-light btn">Ganti Password</a>
	</div>
</div>
</form>