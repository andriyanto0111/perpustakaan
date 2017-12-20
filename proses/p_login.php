<?php 
	include "../class/crud.php";
	session_start();

	$user = $_POST['users'];
	$pass = md5($_POST['passw']);

	$qr = $proses->tampil("*","login","WHERE BINARY username = '$user' AND password = '$pass'");
	$data = $qr->fetch();
	$cek = $qr->rowCount();
	if ($cek == 0) {
		echo "gagal";
	}else{
		$_SESSION['id'] = $data[0];
		echo "berhasil";
	}
 ?>