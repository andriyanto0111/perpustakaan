<?php 
	include "../class/crud.php";
	$date_kembali = date("Y-m-d");
	$qrs = $proses->tampil("detail_pinjam.id_detail_pinjam,
 							detail_pinjam.id_pinjam,
 							detail_pinjam.id_buku,
 							detail_pinjam.jumlah_buku,
 							detail_pinjam.tgl_pinjam,
 							detail_pinjam.tgl_kembali,
 							detail_pinjam.status,
 							buku.judul",

 							"buku,detail_pinjam,peminjaman",

 							"WHERE detail_pinjam.id_pinjam = peminjaman.id_pinjam AND detail_pinjam.id_buku = buku.id_buku AND detail_pinjam.id_detail_pinjam = '$_GET[id]' ");
	$dat = $qrs->fetch();
 ?>
 <div class="in-thickbox">
 	<h1>Detail Kembali</h1>
 	<h3 onclick="thickbox('','tutup')">X</h3>

 	<input type="hidden" value="<?php echo $dat[0]; ?>">

 	<p>ID Buku</p>
 	<input type="text" id="id_buku" value="<?php echo $dat['id_buku']; ?>" readonly>

 	<p>Judul</p>
 	<input type="text" id="judul" value="<?php echo $dat['judul']; ?>" readonly>

 	<p>Tanggal Pinjam</p>
 	<input type="text" id="tgl_pinjam" value="<?php echo $dat['tgl_pinjam']; ?>" readonly>

 	<p>Tanggal Kembali (Now)</p>
 	<input type="text" id="tgl_kembali" value="<?php echo $date_kembali; ?>" readonly>

 	<p>Lama Pinjam</p>
 	<input type="text" id="lama_denda" readonly>
 	<p style="color: #f24b4b;font-style: italic;font-size: 13px;margin: 0px 0px 5px 5px;">Lama pinjam maksimal 7 hari</p>

 	<p>Terlambat</p>
 	<input type="text" id="terlambat" readonly>

 	<p>Denda</p>
 	<input type="text" id="denda" readonly>

 	<p><button class="btn-kembali" onclick="p_kembali('<?php echo $dat[0]; ?>','<?php echo $dat[1]; ?>')">Kembalikan</button></p>
 </div>

<script type="text/javascript">
	$(document).ready(function(){
		var miliday = 24 * 60 * 60 * 1000;
		var tgl1 = $('#tgl_pinjam').val();
		var tgl2 = $('#tgl_kembali').val();

		var tg1 = Date.parse(tgl1);
		var tg2 = Date.parse(tgl2);

		selisih = (tg2 - tg1) / miliday;
		$('#lama_denda').val(selisih);

		if (selisih > 7) {
			terlambat = selisih - 7; 
			denda = terlambat * 1000;
			$('#terlambat').val(terlambat);
			$('#denda').val(denda);
		}else if (selisih < 7 || selisih == 7){
			denda = selisih * 0;
			$('#terlambat').val(0);
			$('#denda').val(denda);
		}
	})
</script>

 <style type="text/css">
 	.btn-kembali{
 		width: 100px;
 		padding: 8px 0px;
 		border: 1px;
 		color: #fff;
 		cursor: pointer;
 		margin:10px 0px 0px 0px;
 		background-color: #008cba;
 		-webkit-transition:all 0.5s;
 	}
 	.btn-kembali:hover{
 		background-color: #13a6d3;
 		-webkit-transition:all 0.3s;
 	}
 </style>