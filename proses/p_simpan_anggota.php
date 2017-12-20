<?php 
	include '../class/crud.php';
	$simpan = $proses->simpan("anggota","
								'$_POST[id]',
								'$_POST[nama]',
								'$_POST[alamat]',
								'$_POST[telephon]',
								'$_POST[tgl_daftar]',
								'$_POST[tgl_expired]'");
	echo "Berhasil";
 ?>