<?php 
	include "../class/crud.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$judul ="Edit";
		$onclick = "edit_jenis_b($id)";
		$button = "Edit";
	}else{
		$id = "";
		$judul = "Tambah";
		$onclick = "simpan_jenis()";
		$button = "Simpan";
	}
	$query = $proses->tampil("*","jenis","WHERE id_jenis = '$id'");
	$data = $query->fetch();
 ?>
 <div class="in-thickbox">
 	<h1><?php echo $judul; ?> Data Jenis</h1>
 	<h3 onclick="thickbox('','tutup')">X</h3>

 	<p>Nama Jenis Buku</p>
 	<input type="text" id="nama_jenis" value="<?php echo $data[1]; ?>" onclick="validation('nama_jenis')" onchange="validation('nama_jenis')" onkeyup="validation('nama_jenis')">

 	<p>No Rak Buku</p>
 	<input type="text" id="keterangan" value="<?php echo $data[2]; ?>" onclick="validation('keterangan')" onchange="validation('keterangan')" onkeyup="validation('keterangan')">

 	<button class="btn-simpan" onclick="<?php echo $onclick; ?>" > <?php echo $button; ?>  </button>
 </div>