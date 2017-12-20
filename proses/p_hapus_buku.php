<?php 
	include '../class/crud.php';
	$hapus = $proses->hapus("buku","id_buku='$_POST[id_buku]'");
	echo "Berhasil";
 ?>