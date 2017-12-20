<?php 
	include "../class/crud.php";

	$edit = $proses->edit("jenis","nama_jenis='$_POST[nama_jenis_b]',
									no_rak_buku='$_POST[keterangan_b]'",
									"id_jenis = '$_POST[id_jenis]'");
	echo "Berhasil";
 ?>