<?php 
	include '../class/crud.php';
 ?>
 <table class="table1" cellspacing="0" >
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
 		$sql = $proses->tampil("*","detail_pinjam,anggota,buku,pengembalian,peminjaman","WHERE pengembalian.tgl_kembali BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' AND pengembalian.id_pinjam = detail_pinjam.id_pinjam AND peminjaman.id_anggota = pengembalian.id_anggota AND pengembalian.id_anggota = anggota.id_anggota AND buku.id_buku = detail_pinjam.id_buku AND detail_pinjam.status = 'kembali' ");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td><?php echo $data['judul']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data[4])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data[23])); ?></td>
 	 	<td><?php echo $data['lama_pinjam']; ?></td>
 	 	<td>Rp. <?php echo number_format($data['denda'],2,",",".");?></td>
 	</tr>
 <?php } ?>
 </table>
