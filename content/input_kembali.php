<?php 
	$d_now = date('Y-m-d')
 ?>
<div class="in_pil">
	<h1>Input Pengembalian Buku</h1>
	<table>
		<tr>
			<td>Tanggal (Now)</td>
			<td><input type="text" id="tgl_kem" value="<?php echo $d_now; ?>" readonly></td>
		</tr>
		<tr>
			<td>ID Anggota</td>
			<td>
				<input type="text" id="id_anggota" onkeyup="cari_id_anggota(), cari_pinjam_tk()" >
				<input type="text" id="nama" readonly>
			</td>
		</tr>
	</table>

	<!-- Table Detail !-->
	<div class="table_detail">
		
	</div>
	<!-- Table Detail !-->

</div>