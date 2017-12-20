<?php 
	include '../class/crud.php';
 ?>
 <title>Laporan Peminja</title>

<div class="header">
	<h1>Laporan Peminjam</h1>
	<h2>Perpustakaan SMK Wikrama 1 Jepara</h2> 	
</div>

 <table class="tb_isi" cellspacing="0" border="1"">
 	<tr>
 		<th>No.</th>
 		<th>ID Pinjam</th>
 		<th>Tanggal Pinjam</th>
 		<th>Tanggal Kembali</th>
 		<th>Total pinjam</th>
 		<th>Nama</th>
 		<th>Denda</th>
 	</tr>
 	<?php
 		$sql = $proses->tampil("*","pengembalian,peminjaman,anggota","WHERE peminjaman.tgl_transaksi_pinjam BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' AND peminjaman.id_pinjam = pengembalian.id_pinjam AND anggota.id_anggota = peminjaman.id_anggota");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['id_pinjam']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_transaksi_pinjam'])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_kembali'])); ?></td>
 	 	<td><?php echo $data['total_pinjam']; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td>Rp. <?php echo number_format($data['jumlah_denda'],2,",","."); ?></td>
 	</tr>
 <?php } ?>
 </table>
 <table class="tb_isi" cellspacing="0" border="1" style="border-top: 0px;">
<?php 
	$query = $proses->tampil("SUM(pengembalian.jumlah_denda)","pengembalian,peminjaman","WHERE peminjaman.tgl_transaksi_pinjam BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' AND peminjaman.id_pinjam = pengembalian.id_pinjam AND peminjaman.id_anggota = pengembalian.id_anggota");
	$dat = $query->fetch();
?>
 	<tr>
 		<td width="69.1%">Total Denda</td>
 		<td>Rp. <?php echo number_format($dat[0],2,",","."); ?></td>
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