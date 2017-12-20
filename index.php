<?php 
	session_start();
	if (isset($_SESSION['user'])) {	
		if ($_SESSION['level'] == "Admin") {
			$lev = "";
		}else{
			$lev = "hidden";
		}
	$hd = "top : -100%";
	}else{
		$lev = "hidden";
		$hd = "";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/thickbox.css">
	<link rel="stylesheet" type="text/css" href="css/login2.css">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<link rel="canonical shortcut icon" type="text/css" href="http://imagespng.com/Data/DownloadLogo/book_PNG2118%20(1).png">
</head>
<body>
	<div class="menu">
		<div class="avatar">
			<img src="img/user.svg">
			<p class="user"><?php echo $_SESSION['user']; ?></p>
		</div>
		<ul>
			<div class="level" <?php echo $lev; ?>>
				<li id="beranda" onclick="panggil('content/beranda.php')" >Beranda</li>
				<li id="buku" onclick="panggil('content/tampil_buku.php')" >Buku</li>
				<li id="jenis" onclick="panggil('content/tampil_jenis_b.php')" >Jenis Buku</li>
				<li id="anggota" onclick="panggil('content/tampil_anggota.php')" >Anggota</li>
				<li id="peminjam" onclick="panggil('content/tampil_pinjam.php')" >Peminjaman</li>
				<li id="pengembali" onclick="panggil('content/input_kembali.php')" >Pengembalian</li>
			</div>
			<li id="laporan">Laporan <span style="float: right;">&gt;</span></li>
			<div class="main" hidden style="margin-left:20px;">
				<li onclick="panggil('content/lap_pinjam_buku.php')">Buku Pinjam</li>
				<li onclick="panggil('content/lap_kembali_buku.php')">Buku Kembali</li>
				<li onclick="panggil('content/lap_pinjam.php')">Peminjam</li>
			</div>
			<li onclick="logout()">Logout</li>
		</ul>
	</div>
	<div class="content">
		
	</div>

	<!-- Thick Box !-->
	<div class="bg-thick" hidden>
		
	</div>
	<!-- End Thick Box!-->

	<div class="bg-all" style="<?php echo $hd; ?>">
		<div class="dlm-bg">
			<h1 class="title">Sign In</h1>

			<p>Username</p>
			<input type="text" name="user" id="username" class="icon-user" placeholder="Enter Your Username...">

			<p>Password</p>
			<input type="password" name="pass" id="password" class="icon-pass" placeholder="Enter Your Password...">

			<p><button onclick="login()">Masuk</button></p>
		</div>
	</div>

	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".content").load('content/beranda.php');
		});
	</script>
	<script type="text/javascript" src="js/proses.js"></script>
	<script type="text/javascript">
		function login() {
			$.ajax({
				url :"proses/p_login2.php",
				type :"POST",
				data :{
					user : $("#username").val(),
					pass : $("#password").val()
				},
				success:function(data){
					if (data == "user") {
						alert("Username salah");
						$("#username").focus();
						$("#username").val("");
					}else if(data == "pass"){
						alert("Password salah");
						$("#password").focus();
						$("#password").val("");
					}else{
						if (data == "Admin") {
							alert("Anda Login Sebagai Admin");
							$(".level").show();
						}else{
							alert("Anda Login Sebagai Manajer");
							$(".level").hide();
						}
					$(".user").html(data);
					$(".bg-all").css({"top":"-100%"});
					}
				}
			})
		}
		function logout() {
			$.ajax({
				url:"proses/p_logout.php",
				type : "POST",
				data:{

				},
				success:function (data) {
					$(".bg-all").css({"top":"0px"});
				}
			})
		}
		$("#laporan").click(function() {
			$(".main").toggle(400);
		})
	</script>
</body>
</html>