<?php 
	include "../class/crud.php";
 ?>
<h1>Data Buku</h1>
<table>
	<tr>
		<td>Pencarian</td>
	</tr>
	<tr>
		<td>
			<select id="field">
				<option value="judul">Judul</option>
				<option value="penerbit">Penerbit</option>
				<option value="tahun_terbit">Tahun Terbit</option>
			</select>
		</td>
		<td><input type="text" id="key" onkeypress="cari_enter(event)"></td>
		<td><button id="btn_cari" onclick="cari()">Cari</button></td>
	</tr>
</table>

<button class="btn-tambah" onclick="thickbox('thickbox/tambah_buku.php','tampil')">+Tambah Data</button>

<table cellspacing="0" id="table">
	<tr>
		<th>No.</th>
		<th>ID Buku</th>
		<th>Judul Buku</th>
		<th>Penerbit</th>
		<th>Tahun Terbit</th>
		<th>Harga</th>
		<th>Jenis Buku</th>
		<th>Stok</th>
		<th>Action</th>
	</tr>
	<?php
	if (isset($_GET['field'])) {
		$field = $_GET['field'];
		$key = $_GET['key'];

		$tamp = $proses->tampil(
			"buku.id_buku,
			buku.judul,
			buku.penerbit,
			buku.tahun_terbit,
			buku.harga,
			buku.stok,
			jenis.nama_jenis",

			"buku,jenis",

			"WHERE buku.id_jenis = jenis.id_jenis AND $field LIKE '%$key%'"
			);
	}else{
		$tamp = $proses->tampil(
			"buku.id_buku,
			buku.judul,
			buku.penerbit,
			buku.tahun_terbit,
			buku.harga,
			buku.stok,
			jenis.nama_jenis",

			"buku,jenis",

			"WHERE buku.id_jenis = jenis.id_jenis"
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
	 	<td>Rp.
	 		<?php 
	 			echo str_replace(",", ".", number_format($data[4]));
	 		 ?>
	 	</td>
	 	<td><?php echo $data[6]; ?></td>
	 	<td><?php echo $data[5]; ?></td>
	 	<td width="120px">
	 		<div class="edit" onclick="edit(<?php echo $data[0]; ?>)"><p>Edit</p></div>
	 		<div class="hapus" onclick="hapus(<?php echo $data[0]; ?>)"><p>Hapus</p></div>
	 	</td>
	 </tr>
	 <?php } ?>
</table>