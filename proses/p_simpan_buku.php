<?php 
	include "../class/crud.php";
	$simpan = $proses->simpan("buku","
			'',
			'$_POST[judul_buku]',
			'$_POST[penerbit_buku]',
			'$_POST[thn_terbit_buku]',
			'$_POST[harga_buku]',
			'$_POST[jenis_buku]',
			'$_POST[stok_buku]'
		");
	echo "Berhasil";
 ?>