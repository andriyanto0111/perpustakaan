<?php 
	include "../class/crud.php";
	$status = "kembali";
	$sqlp = $proses->tampil("*","pengembalian","WHERE id_pinjam = '$_POST[id_pinjam]' ");
	$d = $sqlp->fetch();
	$jml_denda = $d['jumlah_denda']+$_POST['jumlah_denda'];
	$rowp = $sqlp->rowCount();

	$qr = $proses->tampil("*","detail_pinjam","WHERE id_pinjam = '$_POST[id_pinjam]' AND status = 'pinjam'");
	$cek = $qr->rowCount();
	if ($rowp == 1) {
		if ($cek == 1) {
			$dtl_pinjam = $proses->edit("detail_pinjam","
									status = '$status',
									lama_pinjam = '$_POST[lama_pinjam]',
									denda = '$_POST[denda]'","
									id_detail_pinjam = '$_POST[id_detail_pinjam]'");
			$kembalikan = $proses->edit("pengembalian","
										jumlah_denda = $jml_denda ","
										id_pinjam = '$_POST[id_pinjam]'");
			$hapus = $proses->hapus("peminjaman","id_pinjam = '$_POST[id_pinjam]'");
			echo "selesai";
		}else{
			$dtl_pinjam = $proses->edit("detail_pinjam","
										status = '$status',
										lama_pinjam = '$_POST[lama_pinjam]',
										denda = '$_POST[denda]'","
										id_detail_pinjam = '$_POST[id_detail_pinjam]'");
			$kembalikan = $proses->edit("pengembalian","
										jumlah_denda = $jml_denda ","
										id_pinjam = '$_POST[id_pinjam]'");
			echo "true";
		}
	}else{
		if ($cek == 1) {
			$dtl_pinjam = $proses->edit("detail_pinjam","
									status = '$status',
									lama_pinjam = '$_POST[lama_pinjam]',
									denda = '$_POST[denda]'","
									id_detail_pinjam = '$_POST[id_detail_pinjam]'");
			$kembalikan = $proses->simpan("pengembalian","
									'',
									'$_POST[tgl_kembali]',
									'$_POST[denda]',
									'$_POST[id_anggota]',
									'$_POST[id_pinjam]' ");
			echo "selesai";
		}else{
			$dtl_pinjam = $proses->edit("detail_pinjam","
										status = '$status',
										lama_pinjam = '$_POST[lama_pinjam]',
										denda = '$_POST[denda]'","
										id_detail_pinjam = '$_POST[id_detail_pinjam]'");
			$kembalikan = $proses->simpan("pengembalian","
										'',
										'$_POST[tgl_kembali]',
										'$_POST[denda]',
										'$_POST[id_anggota]',
										'$_POST[id_pinjam]' ");
			echo "berhasil";
		}
	}
 ?>