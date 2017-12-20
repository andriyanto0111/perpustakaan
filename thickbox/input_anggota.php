<?php 
	include "../class/crud.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$judul ="Edit";
		$sls = "";
		$date = "";
		$onclick = "p_edit_anggota($id)";
		$button = "Edit";
	}else{
		$id = "";
		$judul = "Tambah";
		$date = date('Y-m-d');
		$sls = date('Y-m-d',strtotime('+3 year'));
		$onclick = "simpan_anggota()";
		$button = "Simpan";
	}
	$query = $proses->tampil("*","anggota","WHERE id_anggota = '$id'");
	$data = $query->fetch();


 ?>
<div class="in-thickbox">
	<h1><?php echo $judul; ?> Anggota</h1>
 	<h3 onclick="thickbox('','tutup')">X</h3>

 	<p>ID Anggota</p>
 	<input type="text" id="id_anggota" value="<?php echo $data[0]; ?>" onclick="validation('id_anggota')" onchange="validation('id_anggota')" onkeyup="validation('id_anggota')">

 	<p>Nama Anggota</p>
 	<input type="text" id="nama_anggota" value="<?php echo $data[1]; ?>" onclick="validation('nama_anggota')" onchange="validation('nama_anggota')" onkeyup="validation('nama_anggota')">

 	<p>Alamat</p>
 	<textarea id="alamat" onclick="validation('alamat')" onchange="validation('alamat')" onkeyup="validation('alamat')" class="ta-alamat"><?php echo $data[2]; ?></textarea>

 	<p>No Telephone</p>
 	<input type="text" id="no_telephon" value="<?php echo $data[3]; ?>" onclick="validation('no_telephon')" onchange="validation('no_telephon')" onkeyup="validation('no_telephon')">

 	<p>Tanggal Mendaftar</p>
 	<input type="text" name="tgl_daftar" id="tgl_daftar" value="<?php echo $data[4], $date; ?>" onclick="validation('tgl_daftar')" onchange="validation('tgl_daftar')" onkeyup="validation('tgl_daftar')" readonly>

 	<p>Tanggal Kadaluarsa</p>
 	<input type="text" name="tgl_expired" id="tgl_expired" value="<?php echo $data[5], $sls; ?>" onclick="validation('tgl_expired')" onchange="validation('tgl_expired')" onkeyup="validation('tgl_expired')">

 	<button class="btn-simpan" onclick="<?php echo $onclick; ?>" > <?php echo $button; ?>  </button>
</div>