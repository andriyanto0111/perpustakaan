<?php 
	include '../class/crud.php';
	$hapus = $proses->hapus("detail_pinjam","id_pinjam = '$_POST[id_pinjam]'");
	echo "berhasil";
 ?>