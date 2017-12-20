<?php 
	include "../class/crud.php";
 ?>
 <h1>Data Anggota</h1>
 <table>
 	<tr>
 		<td>Pencarian</td>
 	</tr>
 	<tr>
 		<td>
 			<input type="text" id="key" onkeypress="cari_enter_anggota()">
 		</td>
 	</tr>
 </table>

 <button class="btn-tambah" onclick="thickbox('thickbox/input_anggota.php','tampil')">+Tambah Data</button>

<table cellspacing="0" id="table">
		<tr>
			<th>No.</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Telephone</th>
			<th>Tanggal Mendaftar</th>
			<th>Tanggal Kadaluarsa</th>
			<th>Action</th>
		</tr>
	<?php
	if (isset($_GET['key'])) {
		$key = $_GET['key'];

		$tamp = $proses->tampil(
			"anggota.id_anggota,
			anggota.nama,
			anggota.alamat,
			anggota.no_telephon,
			anggota.tgl_daftar,
			anggota.tgl_expired",

			"anggota",

			"WHERE id_anggota LIKE '%$key%' OR nama LIKE '%$key%' OR alamat LIKE '%$key%'"
			);
	}else{
		$tamp = $proses->tampil(
			"anggota.id_anggota,
			anggota.nama,
			anggota.alamat,
			anggota.no_telephon,
			anggota.tgl_daftar,
			anggota.tgl_expired",

			"anggota",

			""
			);
	}
		$no=0;
		foreach ($tamp as $data) {
			$no++;
	 ?>
		 <tr>
		 	<td><?php echo $no."."; ?></td>
		 	<td><?php echo $data[0]; ?></td>
		 	<td><?php echo $data[1]; ?></td>
		 	<td><?php echo $data[2]; ?></td>
		 	<td><?php echo $data[3]; ?></td>
		 	<td><?php echo $data[4]; ?></td>
		 	<td><?php echo $data[5]; ?></td>
		 	<td width="180px">
		 		<div class="cetak"><a href="content/krt_anggota.php?id=<?php echo $data[0]; ?>" target="_blank">Cetak</a></div>
		 		<div class="edit" onclick="edit_anggota(<?php echo $data[0]; ?>)"><p>Edit</p></div>
		 		<div class="hapus" onclick="hapus_anggota(<?php echo $data[0]; ?>)"><p>Hapus</p></div>
		 	</td>
		 </tr>
		 <?php } ?>
</table>