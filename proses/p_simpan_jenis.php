<?php
	include '../class/crud.php';
	$simpan = $proses->simpan("jenis","
								NULL,
								'$_POST[nama_jenis_b]',
								'$_POST[keterangan_b]'");
	echo "Berhasil";
 ?>
