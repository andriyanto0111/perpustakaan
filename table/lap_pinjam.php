<?php 
	include '../class/crud.php';
 ?>
 <table class="table1" cellspacing="0" >
 	<tr>
 		<th>No.</th>
 		<th>ID Pinjam</th>
 		<th>Tanggal Pinjam</th>
 		<th>Tanggal Kembali</th>
 		<th>Total pinjam</th>
 		<th>ID Anggota</th>
 		<th>Nama</th>
 		<th>Denda</th>
 	</tr>
 	<?php
 		$sql = $proses->tampil("*","pengembalian,peminjaman,anggota","WHERE peminjaman.tgl_transaksi_pinjam BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' AND peminjaman.id_pinjam = pengembalian.id_pinjam AND anggota.id_anggota = peminjaman.id_anggota");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['id_pinjam']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_transaksi_pinjam'])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_kembali'])); ?></td>
 	 	<td><?php echo $data['total_pinjam']; ?></td>
 	 	<td><?php echo $data['id_anggota']; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td>Rp. <?php echo number_format($data['jumlah_denda'],2,",","."); ?></td>
 	</tr>
 <?php } ?>
 </table>
