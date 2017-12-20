<?php 
	include "../class/crud.php";
 ?>
 <h1>Data Jenis Buku</h1>
 <table>
 	<tr>
 		<td>Pencarian</td>
 	</tr>
 	<tr>
 		<td>
 			<input type="text" id="key" onkeypress="cari_enter_jenis(event)">
 		</td>
 		<td><button id="btn_cari" onkeyup="cari_jenis()">Cari</button></td>
 	</tr>
 </table>

 <button class="btn-tambah" onclick="thickbox('thickbox/tambah_jenis.php','tampil')">+Tambah Data</button>

<table cellspacing="0" id="table">
	<tr>
		<th>No.</th>
		<th>Nama Jenis</th>
		<th>No Rak Buku</th>
		<th>Action</th>
	</tr>
	<?php
	if (isset($_GET['key'])) {
		$key = $_GET['key'];

		$tamp = $proses->tampil(
			"jenis.id_jenis,
			jenis.nama_jenis,
			jenis.no_rak_buku",

			"jenis",

			"WHERE id_jenis LIKE '%$key%' OR nama_jenis LIKE '%$key%' OR no_rak_buku LIKE '%$key%'"
			);
	}else{
		$tamp = $proses->tampil(
			"jenis.id_jenis,
			jenis.nama_jenis,
			jenis.no_rak_buku",

			"jenis",

			""
			);
	}
		$no=0;
		foreach ($tamp as $data) {
			$no++;
	 ?>
	 <tr>
	 	<td style="width: 50px;"><?php echo $no."."; ?></td>
	 	<td><?php echo $data[1]; ?></td>
	 	<td style="width: 150px;"><?php echo $data[2]; ?></td>
	 	<td width="120px">
	 		<div class="edit" onclick="edit_jenis(<?php echo $data[0]; ?>)"><p>Edit</p></div>
	 		<div class="hapus" onclick="hapus_jenis(<?php echo $data[0]; ?>)"><p>Hapus</p></div>
	 	</td>
	 </tr>
	 <?php } ?>
</table>