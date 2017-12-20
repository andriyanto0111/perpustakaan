<?php 
	session_start();
	include "../class/crud.php";

	$sql = $proses->tampil("*","login","WHERE username = '$_POST[user]' ");
	$cek = $sql->rowCount();
	$data = $sql->fetch();

	if ($cek == 0 ) {
		echo "user";
	}else{
		if (md5($_POST['pass']) <> $data[2]) {
			echo "pass";
		}else{
			$_SESSION['user'] = $data['username'];
			$_SESSION['level'] = $data['level'];
			echo $data['level'];
		}
	}

 ?>