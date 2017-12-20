<?php 
	include "../class/crud.php";

	$edit = $proses->edit("peminjaman","total_pinjam='$_POST[total_pinjam]'","id_pinjam= '$_POST[id_pinjam]'");
	echo "Berhasil";
 ?>