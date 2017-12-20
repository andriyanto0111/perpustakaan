<?php 
	class proses{
		function __construct(){
			$server = "localhost";
			$user	= "root";
			$pass	= "";
			$db		= "db_perpustakaan";
			$this->con = new PDO("mysql:host=$server;dbname=$db",$user,$pass);
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
	}
	class input{
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
			$url = "http://localhost:81/perpustakaan".$folder;
			echo $url;
		}
	}
	$proses = new proses;
	$form = new input;
 ?>