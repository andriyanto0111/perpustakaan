<?php 
	include '../class/crud.php';
 ?>
 <title>Laporan Peminjaman Buku </title>

<div class="header">
	<h1>Laporan Peminjaman Buku</h1>
	<h2>Perpustakaan SMK Wikrama 1 Jepara</h2> 	
</div>

 <table class="tb_isi" cellspacing="0" border="1">
 	<tr>
 		<th>No.</th>
 		<th>Peminjam</th>
 		<th>Judul</th>
 		<th>Tanggal Pinjam</th>
 		<th>Tanggal Kembali/Deadline</th>
 	</tr>
 	<?php
 		$sql = $proses->tampil("*","detail_pinjam,peminjaman,anggota,buku","WHERE detail_pinjam.tgl_pinjam BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'AND peminjaman.id_pinjam = detail_pinjam.id_pinjam AND anggota.id_anggota = peminjaman.id_anggota AND buku.id_buku = detail_pinjam.id_buku AND detail_pinjam.status = 'pinjam'");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td><?php echo $data['judul']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data[4])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data[5])); ?></td>
 	</tr>
 <?php } ?>
 </table>
 <p class="info">Periode <?php echo date('d F Y', strtotime($_GET['tgl1'])); ?> - <?php echo date('d F Y', strtotime($_GET['tgl2'])); ?></p>

 <style type="text/css">
	*{
 		font-family: segoe UI;
	}
 	.tb_isi{
 		width: 98%;
 		text-align: center;
 		margin: 0px auto;
 	}
 	.tb_isi th{
 		height: 45px;
 	}
 	.tb_isi td{
 		height: 35px;
 	}
 	.header h1{
 		text-align: center;
 		font-weight: 100;
 		font-size: 40px;
 		margin: 0px;

 	}
 	.header h2{
 		text-align: center;
 		margin:0px;
 		font-weight: 100;
 		margin: 0px 0px 20px 0px;
 	}
 	.info{
 		color:#d64242;
 		font-size: 13px;
 		margin: 10px 0px 0px 10px;
 		font-style:italic;
 	}
 </style>
 <script type="text/javascript">
 	window.load=cetak();
 	function cetak() {
 		window.print();
 	}
 </script>