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
 		$sql = $proses->tampil("anggota.nama,pengembalian.*,buku.judul,detail_pinjam.tgl_pinjam,detail_pinjam.lama_pinjam,detail_pinjam.denda","pengembalian","INNER JOIN detail_pinjam ON pengembalian.id_pinjam=detail_pinjam.id_pinjam INNER JOIN buku ON detail_pinjam.id_buku = buku.id_buku INNER JOIN anggota ON pengembalian.id_anggota=anggota.id_anggota WHERE pengembalian.tgl_kembali BETWEEN '$_POST[tgl1]' AND '$_POST[tgl2]' AND detail_pinjam.status = 'kembali' ");
 		$no = 1;
		foreach ($sql as $data) {
 	 ?>
 	<tr>
 		<td><?php echo $no++."."; ?></td>
 	 	<td><?php echo $data['nama']; ?></td>
 	 	<td><?php echo $data['judul']; ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_pinjam'])); ?></td>
 	 	<td><?php echo date('d F Y', strtotime($data['tgl_kembali'])); ?></td>
 	 	<td><?php echo $data['lama_pinjam']; ?> Hari</td>
 	 	<td>Rp. <?php echo number_format($data['denda'],2,",",".");?></td>
 	</tr>
 <?php } ?>
 </table>
