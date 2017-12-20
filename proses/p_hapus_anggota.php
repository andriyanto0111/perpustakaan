<?php 
	include "../class/crud.php";
	$hapus = $proses->hapus("anggota","id_anggota = '$_POST[id_anggota]'");

	echo "Berhasil";
 ?>