<?php 
	include '../class/crud.php';
	$hapus = $proses->hapus("detail_pinjam","id_detail_pinjam='$_POST[id_detail_pinjam]'");
	echo "Berhasil";
 ?>