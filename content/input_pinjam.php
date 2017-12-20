<?php
	include '../class/crud.php';
	mysql_connect("localhost","root","");
	mysql_select_db("db_perpustakaan");

	$sql = mysql_query("SELECT MAX(id_pinjam) as kode FROM detail_pinjam")or die(mysql_error());
	$dt = mysql_fetch_array($sql);
	$kode = $dt['kode'];

	$nu = (int) substr($kode, 3,4);
	$nu++;

	$char = "PNJ";
	$newid = $char . sprintf("%04s",$nu);

	$date = date('Y-m-d');
	$selisih = date('Y-m-d',strtotime('+7 day'));

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$onclick = "tam_pinjam('$id')";
		$div = "in-thickbox-wide";
		$id_anggota = $_GET['id_anggota'];
		$x = "X";
		$read = "readonly";
		$onclick = "tam_pinjam('$id'),thickbox('','tutup')";
	}else{
		$id = "$newid";
		$onclick = "simpan_pinjam()";
		$div = "in_pil";
		$id_anggota = "";
		$x = "";
		$read = "";
		$onclick = "simpan_pinjam()";
	}
?>
<div class="<?php echo $div; ?>">
<h3 onclick="thickbox('','tutup')"><?=$x; ?></h3>
<h1>Input Data Peminjaman</h1>
<table>
 	<tr>
 		<td>ID Pinjam</td>
 		<td>
 			<input type="text" id="id_pinjam" value="<?php echo $id; ?>" readonly>
 		</td>
 	</tr>
 	<tr>
 		<td>ID Anggota</td>
 		<td>
 			<input type="text" id="id_anggota" value="<?php echo $id_anggota; ?>" <?php echo $read; ?> onclick="validation('id_anggota')" onchange="validation('id_anggota')" onkeyup="validation('id_anggota'),cari_id_anggota(),cari_pinjam_tp()" >
 			<input type="text" id="nama" readonly>
 		</td>
 	</tr>
 	<tr>
 		<td>ID Buku</td>
 		<td>
 			<input type="text" id="id_buku" value="" onclick="validation('id_buku')" onchange="validation('id_buku')" onkeyup="cari_id_buku(),validation('id_buku')">
 			<input type="text" id="judul" readonly>
 			<input type="text" id="jumlah" value="1" readonly style="width: 30px; text-align: center;">
 		</td>
 	</tr>
 	<tr>
 		<td>Tanggal Transaksi</td>
 		<td>
 			<input type="text" id="tgl_transaksi" value="<?php echo $date; ?>" readonly>
 			Tanggal Kembali <input type="text" id="tgl_kembali" value="<?php echo $selisih; ?>" readonly>
 			<button id="tmb" onclick="simpan_detail_pinjam()">+</button>
 		</td>
 	</tr>
 	</table>

 	<!-- Table Detail!-->
 	<div class="table_detail">
		 		
 	</div>
 	<!-- Table Detail!-->

 	<button class="btn-simpan" onclick="<?php echo $onclick; ?>" >Simpan</button>
 	<button class="btn-simpan" onclick="batal_pinjam('<?php echo $newid; ?>')">Batal</button>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		$.ajax({
			url : "table/table_pinjam.php",
			type : "GET",
			data : {
				id_pinjam : $("#id_pinjam").val()
			},
			success:function (data) {
				$(".table_detail").html(data);
			}
		})
	})
	$.ajax({
		url : "proses/p_cari_anggota.php",
		type : "POST",
		dataType :"json",
		data : {
			id_anggota : $("#id_anggota").val()
		},
		success:function(hasil){
			$("#nama").val(hasil.nama);//mengabil variabel dari proses
		}
	});
</script>
<style type="text/css">
	#tmb{
		width: 50px;
		height: 30px;
		font-size: 15px;
		font-weight: bold;
		background-color: #4c4c4c;
		color: #fff;
		border: 1px solid;
		cursor: pointer;
	}
</style>