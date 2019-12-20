<?php
	class proses{
		function __construct(){
			date_default_timezone_set("Asia/Jakarta");
			$server = "localhost";
			$user	= "admin";
			$pass	= "admin";
			$db		= "db_perpustakaan";
			$this->con = new PDO("mysql:host=$server;dbname=$db",$user,$pass);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		function simpan($tabel,$val){
			$qw = "INSERT INTO $tabel VALUES ($val)";
			$ex	= $this->con->query($qw);
		}
		function edit($tabel,$val,$property){
			$qw	= "UPDATE $tabel SET $val WHERE $property";
			$ex	= $this->con->query($qw);
		}
		function hapus($tabel,$property){
			$qw	= "DELETE FROM $tabel WHERE $property";
			$ex	= $this->con->query($qw);
		}
		function tampil($select,$tabel,$property){
			$qw	= "SELECT $select FROM $tabel $property";
			$tam	= $this->con->query($qw);
			return $tam;
		}
		function getKodePinjam()
		{
			$sql = "SELECT MAX(id_pinjam) as kode FROM detail_pinjam";
			$ex	= $this->con->query($sql);
			$dt = $ex->fetch();
			$kode = $dt['kode'];

			$nu = (int) substr($kode, 3,4);
			$nu++;

			$char = "PNJ";
			$newid = $char . sprintf("%04s",$nu);
			return $newid;
		}
	}
	class inputClass{
		function input($type=null,$nama=null,$val=null,$property=null){
			$input = "<input type='$type' name='$nama' value='$val' $property>";
			return $input;
		}
		function textarea($nama=null,$val=null,$property){
			$input	= "<textarea name='$nama' $property>$val</textarea>";
			return $input;
		}
		function select($nama=null,$jml=null,$val=null,$property=null,$check=null){
			$op = "";
			for($x=1; $x <=$jml; $x++){
				$xxx="";
				if ($val[$x] == $check){
					$xxx = "selected";
				}else{
					$xxx = "";
				}
				$kl = "<option $xxx>$val[$x]</option>";
				$op=$op.$kl;
			}
			$input="<select name='$nama' $property>$op></select>";
			return $input;
		}
		function newselect($nama=null,$jml=null,$val=null,$serc=null,$property=null,$check=null){
			$op = "";
			for($x=1; $x <=$jml; $x++){
				$xxx="";
				if ($serc[$x] == $check){
					$xxx = "selected";
				}else{
					$xxx = "";
				}
				$kl = "<option $xxx value='$serc[$x]'>$val[$x]</option>";
				$op=$op.$kl;
			}
			$input="<select name='$nama' $property>$op></select>";
			return $input;
		}
		function form($sts=null,$action=null){
			if($sts == "open"){
				$form = "<form action='$action' method='POST' enctype='multipart/form-data'>";
				return $form;
			}elseif($sts == "close"){
				$form = "</form>";
				return $form;
			}
		}
		function base_url($folder){
			$url = "http://localhost:8080/perpustakaan".$folder;
			echo $url;
		}
	}
	$proses = new proses;
	$form = new inputClass;
