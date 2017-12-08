$(document).ready(function(){
	var j = jQuery.noConflict();
	j("#login-form").on('submit',function(){
	// jika id login-form di submit

		var username = j("#username").val();
		// ambil data username
		var nama = j("#nama").val();
		// ambil data password
		var password2 = j("#password2").val();
		// ambil data password
		var pass = j("#pass").val();
		// ambil data password

		j.ajax({
		// ajax object 
			url : 'prosesdaftaradmin.php',
			// url ajax
			type : 'POST',
			// type atau method request
			data : {nama : nama,password2 : password2,username : username,pass : pass},
			//  data yang di kirim
			beforeSend : function(){
			// sebelum data di kirim
				j('#submit').html('<img src="img/btn-ajax-loader.gif"> Proses ');
				// ganti dengan gambar gif loader
			},
			success : function(response){
			// data success di kirim dan dapat response dari server
				res = JSON.parse(response);
				// kembalikan data ke bentuk object JSON
				if (res['success'] === true) {
				// jika success true atau benar Yang peroses.php "$data['success'] = true" 
					j('#submit').html('<span class="glyphicon glyphicon-ok"></span> &nbsp; Success');					
					// ganti button submit dengan tulisan "Success"
					j('#pesan').html('<div class="alert alert-success" role="alert"> Daftar Berhasil <b>Tunggu Sebentar.....</b></div>');					
					// munculkan pesan Login success di atas form login
					setTimeout(function(){
						window.location.href='users/admin.php';
						// redirect url ke home.php dalam waktu 1000 milisecond
					},1000);
				}else{
				// jika login gagal atau salah
					j('#submit').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Masuk');
					// kembalikan tulisan  "Masuk"
					j('#pesan').html('<div class="alert alert-danger" role="alert"><b> <span class="glyphicon glyphicon-info-sign"></span> Daftar Gagal... </b><br/>Silahkan cek kembali username dan password...</div>');
					// munculkan pesan "Login gagal" di atas form login 
				}
			},
			error : function(e){
			// jika request error
				alert(e.status);
				// munculkan status error
			}
		});
		return false;
		//return false berfungsi untuk mencegah reload
	});
	j('#form-login').fadeIn(4000);
	// hanya untuk  gaya fade atau memudar
});