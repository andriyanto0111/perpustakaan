<?php 
	include "../class/crud.php";
	$status = "pinjam";
	$lama_pinjam = "0";
	$denda = "0";

	$sql = $proses->tampil("detail_pinjam.id_buku","detail_pinjam","WHERE detail_pinjam.id_pinjam = '$_POST[id_pinjam]' AND detail_pinjam.id_buku = '$_POST[id_buku]' AND detail_pinjam.status = 'pinjam'");
	$data = $sql->fetch();
	$id_buku = $_POST['id_buku'];

	if ($id_buku == $data['id_buku']) {
		echo "Gagal";
	}else{
		$s_detail = $proses->simpan("detail_pinjam","
				'',
				'$_POST[id_pinjam]',
				'$_POST[id_buku]',
				'$_POST[jumlah]',
				'$_POST[tgl_transaksi]',
				'$_POST[tgl_kembali]',
				'$status',
				'$lama_pinjam',
				'$denda'");
		echo "Berhasil";
	}
 ?>