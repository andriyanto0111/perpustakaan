<?php 
	include "../class/crud.php";

	$sql = $proses->tampil("*","peminjaman,detail_pinjam","WHERE peminjaman.id_anggota = '$_POST[id_anggota]' AND detail_pinjam.id_pinjam = peminjaman.id_pinjam AND detail_pinjam.status = 'pinjam'");
	$data = $sql->fetch();

	$id_anggota = $_POST['id_anggota'];

	if ($id_anggota == $data['id_anggota']) {
		echo "Gagal";
	}else{
		$simpan = $proses->simpan("peminjaman","
								'$_POST[id_pinjam]',
								'$_POST[tgl_transaksi]',
								'$_POST[total_pinjam]',
								'$_POST[id_anggota]'");
		echo "Berhasil";
	}
 ?>