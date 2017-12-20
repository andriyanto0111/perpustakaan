<?php 
	include "../class/crud.php";

	$tm = $proses->tampil("*","anggota","WHERE id_anggota='$_POST[id_anggota]'") or die(mysql_error());
	$hsl = $tm->fetch();
	$ar = array("nama"=>$hsl['nama']);//nama yang depan dr database, belakang dr variabe di ajax variabel
	echo json_encode($ar);
?>