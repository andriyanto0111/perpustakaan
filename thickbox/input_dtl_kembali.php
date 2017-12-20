<?php 
	include "../class/crud.php";

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$onclick = "p_input_dtl_kembali($id)";
		$button = "Kembalikan";
	}
	$sql = $proses->tampil("detail_pinjam.id_detail_pinjam,
							detail_pinjam.id_pinjam,
							detail_pinjam.id_buku,
							detail_pinjam.jumlah_buku,
							detail_pinjam.tgl_pinjam,
							detail_pinjam.tgl_kembali,
							detail_pinjam.status,
							detail_pinjam.lama_pinjam,
							detail_pinjam.denda,
							buku.id_buku,
							buku.judul",

		 					"detail_pinjam,buku",

		 					"WHERE detail_pinjam.id_pinjam = '$_GET[id]' AND detail_pinjam.id_buku = buku.id_buku");
	$data = $sql->fetch();
 ?>
 <div class="in-thickbox">
 	<h1>Data Pinjam</h1>
 	<h3 onclick="thickbox('','tutup')">X</h3>

 	<p>ID Buku</p>
 	<input type="text" id="id_buku" value="<?php echo $data['id_buku']; ?>" onclick="validation('id_buku')" onchange="validation('id_buku')" onkeyup="validation('id_buku')">

	<p>Judul</p>
	<input type="text" id="judul" value="<?php echo $data['judul']; ?>" onclick="validation('judul')" onchange="validation('judul')" onkeyup="validation('judul')">

	<p>Tanggal Pinjam</p>
	<input type="text" id="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" onclick="validation('tgl_pinjam')" onchange="validation('tgl_pinjam')" onkeyup="validation('tgl_pinjam')">

	<p>Tanggal Kembali</p>
	<input type="text" id="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>" onclick="validation('tgl_kembali')" onchange="validation('tgl_kembali')" onkeyup="validation('tgl_kembali')">

	<p>Lama Denda</p>
	<input type="text" id="lama_denda" value="<?php echo $data['lama_denda']; ?>" onclick="validation('lama_denda')" onchange="validation('lama_denda')" onkeyup="validation('lama_denda')">

	<p><button class="btn-simpan"><?php echo $button; ?></button></p>
</div>