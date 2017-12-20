<h1>Laporan Peminjaman Buku</h1>

<div class="isi">
	<table>
		<tr>
			<td colspan="2" class="info">Masukkan periode tanggal di bawah ini</td>
		</tr>
		<tr>
			<td>Dari Tanggal</td>
			<td><input type="text" id="tgl1" onchange="laporan()" placeholder="yyyy/mm/dd"></td>
		</tr>
		<tr>
			<td>Sampai Tanggal</td>
			<td><input type="text" id="tgl2" onchange="laporan()" placeholder="yyyy/mm/dd"></td>
		</tr>
	</table>

	<button class="print" onclick="cetak()">Cetak</button>

	<div class="table">
		
	</div>
</div>

<style type="text/css">
	.isi{
		margin: 20px 0px 0px 0px;
	}
	.info{
		color: #f24b4b;
		font-style: italic;
	}
	input[type="text"]{
		width: 200px;
		height: 25px;
		color:#777777;
		text-indent: 5px;
		margin:3px 5px;
		border: 1px solid #777777;
	}
	.print{
		width: 100px;
		padding: 8px 0px;
		color:#ffffff;
		float: right;
		border:1px;
		font-size:15px;
		cursor: pointer;
		margin:0px 0px 10px 0px;
		background-color: rgb(80,50,248);
	}
</style>
<script type="text/javascript">
	$(document).ready(function () {
		$("#tgl1").datepicker({
			dateFormat : 'yy/mm/dd',
			changeMonth : true,
			changeYear : true,
		});
		$("#tgl2").datepicker({
			dateFormat : 'yy/mm/dd',
			changeMonth : true,
			changeYear : true,
		});
	})
	function laporan() {
		tgl1 = $("#tgl1").val();
		tgl2 = $("#tgl2").val();
		$.ajax({
			url 	: "table/lap_pinjam_buku.php",
			type 	: "POST",
			data 	:{
				tgl1 : tgl1,
				tgl2 : tgl2
			},
			success:function(data) {
				$(".table").html(data);
			}
		})
	}
	function cetak() {
		tgl1 = $("#tgl1").val();
		tgl2 = $("#tgl2").val();
		if (tgl1 == "") {
			alert("Tanggal Kosong");
			$("#tgl1").focus();
		}else if (tgl2 == "") {
			alert("Tanggal Kosong");
			$("#tgl2").focus();
		}else{
			window.open('content/cetak_pinjam_buku.php?tgl1='+tgl1+"&tgl2="+tgl2);
		}
	}
</script>