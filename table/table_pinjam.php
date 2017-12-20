<?php 
	include "../class/crud.php";

	mysql_connect("localhost","root","");
	mysql_select_db("db_perpustakaan");

	$sql = mysql_query("SELECT MAX(id_pinjam) as kode FROM detail_pinjam")or die(mysql_error());
	$dt = mysql_fetch_array($sql);
	$kode = $dt['kode'];

	$nu = (int) substr($kode, 3,4);
	$nu++;

	$char = "PNJ";
	$newid = $char . sprintf("%04s",$nu);

	if (isset($_GET['id_pinjam'])) {
		$id = $_GET['id_pinjam'];
		$onclick = "tam_pinjam('$id'),thickbox('','tutup')";
	}else{
		$id = "$newid";
		$onclick = "simpan_pinjam()";
	}
 ?>
<table class="table1" cellspacing="0px" >
	<tr>
 		<th>ID Pinjam</th>
		<th>ID Buku</th>
 		<th>Jumlah Pinjam</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php
		$sql = $proses->tampil("detail_pinjam.id_detail_pinjam,
 								detail_pinjam.id_pinjam,
 								detail_pinjam.id_buku,
 								detail_pinjam.jumlah_buku,
 								detail_pinjam.tgl_pinjam,
 								detail_pinjam.tgl_kembali,
 								detail_pinjam.status",

 								"buku,detail_pinjam",

 								"WHERE detail_pinjam.id_pinjam = '$id' AND buku.id_buku = detail_pinjam.id_buku AND detail_pinjam.status = 'pinjam'");
		$row = $sql->rowCount(); 
		foreach ($sql as $data) {
	?>
	<tr>
		 	<td><?php echo $data[1]; ?></td>
		 	<td><?php echo $data[2]; ?></td>
		 	<td><?php echo $data[3]; ?></td>
		 	<td><?php echo $data[4]; ?></td>
		 	<td><?php echo $data[5]; ?></td>
		 	<td><?php echo $data[6]; ?></td>
		 	<td>
		 		<button class="btn-hapus" onclick="hapus_dtl_pinjam(<?php echo $data[0]; ?>)">Hapus</button>
		 	</td>
	</tr>
	<?php } ?>
</table>
	
 	<p>Total Pinjam</p>
 	<input type="text" id="total_pinjam" value="<?php echo $row; ?>" readonly><br>

<script type="text/javascript">
	function batal_pinjam(id) {
		$.ajax({
			url : "proses/p_batal_pinjam.php",
			type : "POST",
			data : {
				id_pinjam : id
			},
			success:function(data) {
				if (data == "berhasil") {
					$(".content").load('content/tampil_pinjam.php');
				}
			}
		})
	}
	function tam_pinjam(id) {
		total_pinjam = $("#total_pinjam").val();
		$.ajax({
			url		:"proses/p_tam_pinjam.php",
			type	:"POST",
			data 	:{
				id_pinjam : id,
				total_pinjam : total_pinjam
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menambah Data !!", "success");
					$(".content").load('content/tampil_pinjam.php');
				}else{
					swal("Error !!", "Gagal Menghapus Data !!", "error");
				}
			}
		})
	}
</script>