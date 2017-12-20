<?php 
	include "../class/crud.php";
 ?>
 <h1>Data Peminjaman Buku</h1>
 <table>
 	<tr>
 		<td>Pencarian</td>
 	</tr>
 	<tr>
 		<td>
 			<input type="text" id="key" onkeypress="cari_enter_buku()">
 		</td>
 	</tr>
 </table>

 <button class="btn-tambah" onclick="panggil('content/input_pinjam.php')">+Tambah Data</button>

<table cellspacing="0" id="table">
	<tr>
			<th>No</th>
			<th>ID Pinjam</th>
 			<th>Tanggal Transaksi</th>
 			<th>Total Pinjam</th>
 			<th>ID Anggota</th>
 			<th>Action</th>
	</tr>
	<?php
		$tamp = $proses->tampil("*",

 								"peminjaman",

								"");
	
		$no=1;
		foreach ($tamp as $data) {
			
	 ?>
	 <tr>
	 	<td><?php echo $no++."."; ?></td>
	 	<td><?php echo $data[0]; ?></td>
	 	<td><?php echo $data[1]; ?></td>
	 	<td><?php echo $data[2]; ?></td>
	 	<td><?php echo $data[3]; ?></td>
	 	<td width="180px">

	 		<div class="hapus" onclick="hapus_pinjam('<?php echo $data['id_pinjam']; ?>')"><p>Hapus</p></div>

	 		<a href="content/detail_pinjam.php?id=<?php echo $data['id_pinjam']; ?>" target="_blank">
	 			<button class="detail">
	 				Detail
	 			</button>
	 		</a>
	 		
	 		<div class="tmb_pinjam" onclick="tmb_pinjam('<?php echo $data['id_pinjam']; ?>','<?php echo $data['id_anggota']; ?>')"><p>+</p></div>
	 	</td>
	 </tr>
	 <?php } ?>
</table>