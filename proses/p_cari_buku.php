<?php 
	include "../class/crud.php";

	$tm = $proses->tampil("*","buku","WHERE id_buku='$_POST[id_buku]'") or die(mysql_error());
	$hsl = $tm->fetch();
	$ar = array("judul"=>$hsl['judul']);//nama yang depan dr database, belakang dr variabe di ajax variabel
	echo json_encode($ar);
?>