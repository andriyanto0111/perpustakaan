<?php
	include 'class/crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
	<div class="body">
		<h1>Aplication Melk Abbey Library</h1>
		<h2>Let's Reading</h2>
		<div class="kotak">
			<h1>Form Login</h1>
			<p>Silahkan Masukkan <span>Username</span> Dan <span>Password</span> Ada</p>
			<input type="text" id="user" placeholder="Username">
			<input type="password" id="pass" placeholder="Password">
			<button id="login" onclick="login()">Sign In</button>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<script type="text/javascript">

function login() {
	username = $("#user").val();
	password = $("#pass").val();

	$.ajax({
		url 	: "proses/p_login.php",
		type 	: "POST",
		data	:{
			users : username,
			passw : password
		},
		success:function(data){
			if (data == "berhasil") {
				swal("Berhasil !!","Anda Berhasil Login !!","success");
				document.location = 'index.php';
			}else if(data == "gagal"){
				$("#user").focus();
				swal("Login Gagal !!","Username Atau Pasword Yang Anda Masukkan Salah Atau Kososng, Username Dan Password Sangat Sensitif !!","error");
			}
		}
	})
}
</script>