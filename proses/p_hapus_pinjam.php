<?php 
	include "../class/crud.php";

	$h_pinjam = $proses->hapus("peminjaman","id_pinjam='$_POST[id_pinjam]'");
	$_detail = $proses->hapus("detail_pinjam","id_pinjam='$_POST[id_pinjam]'");
	echo "Berhasil";
 ?>