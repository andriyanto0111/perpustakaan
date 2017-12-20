<?php 
	include "../class/crud.php";
	$edit = $proses->edit("anggota","id_anggota='$_POST[ida]',
									nama='$_POST[nama]',
									alamat='$_POST[alamat]',
									no_telephon='$_POST[telephon]',
									tgl_daftar='$_POST[tgl_daftar]',
									tgl_expired='$_POST[tgl_expired]'",
									"id_anggota = '$_POST[id_anggota]'");
	echo "Berhasil";
 ?>