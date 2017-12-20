<?php 
	include '../class/crud.php';
	$simpan = $proses->simpan("jenis","
								'',
								'$_POST[nama_jenis_b]',
								'$_POST[keterangan_b]'");
	echo "Berhasil";
 ?>