<?php
	include '../class/crud.php';
 ?>
 <title>Laporan Peminjaman Buku </title>

<div class="header">
	<h1>Laporan Pengembalian Buku</h1>
	<h2>Perpustakaan SMK Wikrama 1 Jepara</h2>
</div>

 <table class="tb_isi" cellspacing="0" border="1">
 	<tr>
 		<th>No.</th>
 		<th>Peminjam</th>
 		<th>Judul</th>
 		<th>Tanggal Pinjam</th>
 		<th>Tanggal Kembali</th>
 		<th>Lama Pinjam</th>
 		<th>Denda</th>
 	</tr>
 	<?php
 		$sql = $proses->tampil("anggota.nama,pengembalian.*,buku.judul,detail_pinjam.tgl_pinjam,detail_pinjam.lama_pinjam,detail_pinjam.denda","pengembalian","INNER JOIN detail_pinjam ON pengembalian.id_pinjam=detail_pinjam.id_pinjam INNER JOIN buku ON detail_pinjam.id_buku = buku.id_buku INNER JOIN anggota ON pengembalian.id_anggota=anggota.id_anggota WHERE pengembalian.tgl_kembali BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' AND detail_pinjam.status = 'kembali' ");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td><?php echo $data['judul']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_pinjam'])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_kembali'])); ?></td>
 	 	<td><?php echo $data['lama_pinjam']; ?></td>
 	 	<td>Rp. <?php echo number_format($data['denda'],2,",",".");?></td>
 	</tr>
 <?php } ?>
 </table>
 <table class="tb_isi" border="1" cellspacing="0" style="border-top: 0px;">
 <?php
 	$qr = $proses->tampil("SUM(detail_pinjam.denda)","pengembalian","INNER JOIN detail_pinjam ON pengembalian.id_pinjam=detail_pinjam.id_pinjam INNER JOIN buku ON detail_pinjam.id_buku = buku.id_buku INNER JOIN anggota ON pengembalian.id_anggota=anggota.id_anggota WHERE pengembalian.tgl_kembali BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' AND detail_pinjam.status = 'kembali' ");
 	$jml = $qr->fetch();
  ?>
 	<tr>
 		<td width="76%">Total Denda</td>
 		<td>Rp. <?php echo number_format($jml[0],2,",","."); ?></td>
 	</tr>
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
