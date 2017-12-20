<?php 
	include '../class/crud.php';
	$hapus = $proses->hapus("jenis","id_jenis = '$_POST[id_jenis]'");
	echo "Berhasil";
 ?>