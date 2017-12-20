<?php 
	include "../class/crud.php";
	$edit = $proses->edit("buku","judul='$_POST[judul_buku]',
								penerbit='$_POST[penerbit_buku]',
								tahun_terbit='$_POST[thn_terbit_buku]',
								harga='$_POST[harga_buku]',
								id_jenis='$_POST[jenis_buku]',
								stok='$_POST[stok_buku]'",
								"id_buku='$_POST[id_buku]'");
	echo "Berhasil";
 ?>