<?php 
	include "../class/crud.php";
 ?>
 <!DOCTYPE html>
  <html>
  <head>
  	<title>Cetak Kartu Anggota</title>
  </head>
  <body>
  	<div class="kotak">
  		<div class="header">
  			<img src="../img/Logo_swiksara.png">
  			<h3>Kartu Anggota Perpustakaan</h3>
  			<h1>SMK Wikrama 1 Jepara</h1>
  		</div>
  		<div class="isi">
  			<div class="foto">
  				
  			</div>
  			<div class="identitas">
  			<?php 
  				$sql = $proses->tampil("*", "anggota","WHERE id_anggota='$_GET[id]'");
  				$data = $sql->fetch();
  			 ?>
  				<table>
  					<tr>
  						<td>ID.Anggota</td>
  						<td>:</td>
  						<td><?php echo $data[0]; ?></td>
  					</tr>
  					<tr>
  						<td>Nama</td>
  						<td>:</td>
  						<td><?php echo $data[1]; ?></td>
  					</tr>
  					<tr>
  						<td>Alamat</td>
  						<td>:</td>
  						<td><?php echo $data[2]; ?></td>
  					</tr>
  					<tr>
  						<td>No.Telephone</td>
  						<td>:</td>
  						<td><?php echo $data[3]; ?></td>
  					</tr>
  					<tr>
  						<td>Tanggal Daftar</td>
  						<td>:</td>
  						<td><?php echo $data[4]; ?></td>
  					</tr>
  					<tr>
  						<td>Masa Berlaku</td>
  						<td>:</td>
  						<td><?php echo $data[5]; ?></td>
  					</tr>
  					<tr>
  						<td colspan="3">
  							<div id="code">
  								<img width="300" height="50" alt="<?php echo $data[0]; ?>" src="../class/barcode.php?text=<?php echo $data[0]; ?>">
  							</div>
  						</td>
  					</tr>
  				</table>
  			</div>
  		</div>
  	</div>
  </body>
  </html> 
<script type="text/javascript">
	window.load=b_print();
	function b_print(){
		window.print();
	};

</script>
  <style type="text/css">
  *{
  	font-family: segoe ui;
  }
  	.kotak{
  		width: 500px;
  		height: 340px;
  		padding: 5px;
  		border: 1px solid #000;
  	}
  	.header{
  		width: 100%;
  		height: 100px;
  		border-bottom: 2px solid #092677;
  		background-color: rgba(32, 65, 163,0.8); 
  	}
  	.header img{
  		width: 100px;
  		height: 90px;
  		font-family: arial;
  		margin: 5px 0px 5px 5px;
  	}
  	.foto{
  		width: 130px;
  		height: 160px;
  		float: left;
  		border: 1px solid #000;
      z-index: 999999999999;
  		margin: 10px 0px 10px 10px;
  	}
  	.header h3{
  		text-align: center;
  		margin: -100px 0px 0px 80px;
  		font-weight: 100;
  		font-size: 20px;
  	}
  	.header h1{
  		text-align: center;
  		font-weight: 100;
  		font-size: 35px;
  		margin: -1px 0px 0px 100px;
  	}
  	.identitas table{
  		padding: 10px;
  	}
  </style>