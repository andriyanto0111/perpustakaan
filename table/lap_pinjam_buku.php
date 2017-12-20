<?php 
	include '../class/crud.php';
 ?>
 <table class="table1" cellspacing="0" >
 	<tr>
 		<th>No.</th>
 		<th>Peminjam</th>
 		<th>Judul</th>
 		<th>Tanggal Pinjam</th>
 		<th>Tanggal Kembali/Deadline</th>
 	</tr>
 	<?php
 		$sql = $proses->tampil("*","detail_pinjam,peminjaman,anggota,buku","WHERE detail_pinjam.tgl_pinjam BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]'AND peminjaman.id_pinjam = detail_pinjam.id_pinjam AND anggota.id_anggota = peminjaman.id_anggota AND buku.id_buku = detail_pinjam.id_buku AND detail_pinjam.status = 'pinjam'");
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
