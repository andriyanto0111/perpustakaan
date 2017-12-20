<?php 
	include "../class/crud.php";
	$no = 1;
	$qr = $proses->tampil("*","detail_pinjam","WHERE id_pinjam = '$_GET[id]'");
	$dt = $qr->fetch();
 ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Detail Pinjam</title>
</head>
<body>
 	<div class="content">
 		<h1>daftar buku yang di pinjam </h1>
	 	<p style="margin: 20px 0px -15px 0px;">ID Pinjam <?php echo $dt['id_pinjam']; ?></p> 
	 	<table class="table-detail" cellspacing="0px" >
		 	<tr>
		 		<th>No.</th>
		 		<th>Judul Buku</th>
		 		<th>ID Buku</th>
		 		<th>Jumlah Pinjam</th>
		 		<th>Tanggal Pinjam</th>
		 		<th>Tanggal Kembali</th>
		 		<th>Status</th>
		 		<th>Lama Pinjam</th>
		 		<th>Denda</th>
		 	</tr>
		 	<tr>
		 	<?php
		 		$sql = $proses->tampil("detail_pinjam.id_detail_pinjam,
									detail_pinjam.id_pinjam,
									detail_pinjam.id_buku,
									detail_pinjam.jumlah_buku,
									detail_pinjam.tgl_pinjam,
									detail_pinjam.tgl_kembali,
									detail_pinjam.status,
									detail_pinjam.lama_pinjam,
									detail_pinjam.denda,
									buku.id_buku,
									buku.judul",

		 							"detail_pinjam,buku",

		 							"WHERE detail_pinjam.id_pinjam = '$_GET[id]' AND detail_pinjam.id_buku = buku.id_buku");

		 		foreach ($sql as $data) {
		 	 ?>
		 		<td><?php echo $no++; ?></td>
		 		<td><?php echo $data['judul']; ?></td>
		 		<td><?php echo $data[2]; ?></td>
		 		<td><?php echo $data[3]; ?></td>
		 		<td><?php echo $data[4]; ?></td>
		 		<td><?php echo $data[5]; ?></td>
		 		<td><?php echo $data[6]; ?></td>
		 		<td><?php echo $data[7]; ?></td>
		 		<td><?php echo $data[8]; ?></td>
		 	</tr>
		 	<?php } ?>
		 </table>
 	</div>
</body>
</html>
<style type="text/css">
	*{
		font-family: segoe ui;
		color: #555;
	}
	body{
		width: 1350px;
		height: 645px;
		margin: 0px;
		background-color: #f5f5f5;
	}
	.content{
		width: 95%;
		height: 100%;
		margin: 0px auto;
		padding: 10px;
		background-color: #ffffff;
	}
	.content h1{
		margin: 0px auto;
		text-transform: capitalize;
		text-align: center;
		width: 98%;
		height: 70px;
		font-weight: 100;
		font-size:50px;
		border-bottom: 1px solid #888;
	}
	.content .table-detail{
		width: 100%;
		margin: 20px 0px 0px 0px;
		text-align: center;
	}
	.content .table-detail th{
		background-color: #302c2c;
		color:#fff;
		height:40px;
	}
	.content .table-detail td{
		border-bottom: 1px solid #888;
		height: 30px;	
	}
	.content .table-detail tr:hover{
		background-color: #eeeeee;
		cursor: default;
	}
</style>