<?php 
	include "../class/crud.php";
 ?>
<table class="table1" cellspacing="0">
		<tr>
			<th>ID Pinjam</th>
			<th>ID Buku</th>
			<th>Jumlah Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Denda</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php

		if (isset($_GET['id_anggota'])) {
			$id_anggota = $_GET['id_anggota'];
			$sql = $proses->tampil("detail_pinjam.id_detail_pinjam,
 									detail_pinjam.id_pinjam,
 									detail_pinjam.id_buku,
 									detail_pinjam.jumlah_buku,
 									detail_pinjam.tgl_pinjam,
 									detail_pinjam.tgl_kembali,
 									detail_pinjam.status,
 									detail_pinjam.lama_pinjam,
 									detail_pinjam.denda",
 									

 									"detail_pinjam,peminjaman",
 									
 									"WHERE id_anggota LIKE '%$id_anggota%' AND detail_pinjam.id_pinjam = peminjaman.id_pinjam AND detail_pinjam.status = 'pinjam'");
			
			
		}else{
			$sql = $proses->tampil("detail_pinjam.id_detail_pinjam,
 									detail_pinjam.id_pinjam,
 									detail_pinjam.id_buku,
 									detail_pinjam.jumlah_buku,
 									detail_pinjam.tgl_pinjam,
 									detail_pinjam.tgl_kembali,
 									detail_pinjam.status,
 									detail_pinjam.lama_pinjam,
 									detail_pinjam.denda",
 									

 									"detail_pinjam,peminjaman",
 									
 									"WHERE detail_pinjam.id_pinjam = peminjaman.id_pinjam AND detail_pinjam.status = 'pinjam' ");
		}
		foreach ($sql as $data) {
		
	 	?>
	 	<tr>
	 		<td><?php echo $data[1]; ?></td>
	 		<td><?php echo $data[2]; ?></td>
	 		<td><?php echo $data[3]; ?></td>
	 		<td><?php echo $data[4]; ?></td>
	 		<td><?php echo $data[5]; ?></td>
	 		<td><?php echo $data[8]; ?></td>
	 		<td><?php echo $data['status']; ?></td>
	 		<td width="100px">
	 			<button class="kembali" onclick="kembalikan(<?php echo $data[0]; ?>)">Detail</button>
	 		</td>
	 	</tr>
	 	<?php } ?>
	</table>
<?php 
	$query = $proses->tampil("SUM(detail_pinjam.denda)","detail_pinjam,peminjaman","WHERE peminjaman.id_anggota = '$_GET[id_anggota]' AND detail_pinjam.id_pinjam = peminjaman.id_pinjam");
	$dat = $query->fetch();
 ?>
	<p>Jumlah Denda</p>
	<input type="text" id="jumlah_denda" value="<?php echo $dat[0]; ?>" readonly>
	
	<style type="text/css">
		.kembali{
			width: 60px;
			height: 30px;
			border: 1px;
			color: #FFF;
			cursor: pointer;
			float: right;
			margin-right: 10px;
			background-color: #4baddd;
			-webkit-transition:all 0.3s;
		}
		.kembali:hover{
			background-color: #64c4f4;
			-webkit-transition:all 0.3s;
		}
	</style>