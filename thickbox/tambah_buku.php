<?php 
	include "../class/crud.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$judul ="Edit";
		$onclick = "edit_buku($id)";
		$button = "Edit Buku";
	}else{
		$id = "";
		$judul = "Tambah";
		$onclick = "simpan_data()";
		$button = "Simpan Buku";
	}
	$query = $proses->tampil("*","buku","WHERE id_buku = '$id'");
	$data = $query->fetch();

 ?>

<div class="in-thickbox">
	<h1><?php echo $judul; ?> Data Buku</h1>
	<h3 onclick="thickbox('','tutup')"> X </h3>

	<p>Judul Buku</p>
	<input type="text" id="judul" value="<?php echo $data[1]; ?>" onclick="validation('judul')" onchange="validation('judul')" onkeyup="validation('judul')">

	<p>Penerbit</p>
	<input type="text" id="penerbit" value="<?php echo $data[2]; ?>" onclick="validation('penerbit')" onchange="validation('penerbit')" onkeyup="validation('penerbit')">

	<p>Tahun Terbit</p>
	<select id="thn_terbit">
	<option value="">Pilih</option>
	<?php 
		$thn = date("Y");
		$th1 = $thn-10;
		$th2 = $thn+5;
		for ($i=$th1; $i<=$th2;$i++) {
			if ($i == $data[3]) {
				$selected = "selected";
			}else{
				$selected = "";
			}
	 ?>
		<option <?php echo $selected; ?>> <?php echo $i; ?></option>
		<?php } ?>
	</select>

	<p>Harga</p>
	<input type="text" id="harga" value="<?php echo $data[4]; ?>" onclick="validation('harga')" onchange="validation('harga')" onkeyup="validation('harga')">

	<p>Jenis Buku</p>
	<select id="jenis_buku">
		<option value="">Pilih</option>
	<?php 
		$tampil = $proses->tampil("id_jenis,nama_jenis","jenis","ORDER BY id_jenis ASC");
		foreach ($tampil as $dataj){
			if ($dataj[0] == $data[5]) {
				$selected = "selected";
			}else{
				$selected = "";
			}
	 ?>
		<option <?php echo $selected; ?> value="<?php echo $dataj[0]; ?>" > <?php echo $dataj[1]; ?></option>
		<?php } ?>
	</select>

	<p>Stok Buku</p>
	<input type="text" id="stok" value="<?php echo $data[6]; ?>" onclick="validation('stok')" onchange="validation('stok')" onkeyup="validation('stok')">

	<p><button class="btn-simpan" onclick="<?php echo $onclick; ?>"><?php echo $button; ?></button></p>

</div>