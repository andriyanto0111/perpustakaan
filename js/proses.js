function simpan_data() {
	judul = $("#judul").val();
	penerbit = $("#penerbit").val();
	thn_terbit = $("#thn_terbit").val();
	harga = $("#harga").val();
	jenis = $("#jenis_buku").val();
	stok = $("#stok").val();
	if (judul == "") {
		alert("Isi Judul Buku");
		$("#judul").focus();
	}else if (penerbit == "") {
		alert("Isi Penerbit Buku");
		$("#penerbit").focus();
	}else if (thn_terbit == "") {
		alert("Pilih Tahun Terbit Buku");
		$("#thn_terbit").focus();
	}else if (harga == "") {
		alert("Isi Harga Buku");
		$("#harga").focus();
	}else if (jenis == "") {
		alert("Pilih Jenis Buku");
		$("#jenis_buku").focus();
	}else if (stok == "") {
		alert("Isi Stok Buku");
		$("#stok").focus();
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_simpan_buku.php",
			type	:"POST",
			data 	:{
				judul_buku : judul,
				penerbit_buku : penerbit,
				thn_terbit_buku : thn_terbit,
				harga_buku : harga,
				jenis_buku : jenis,
				stok_buku : stok
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menyimpan Data !!", "success");
					$(".content").load('content/tampil_buku.php');
					$(".bg-thick").fadeOut(500);
				}
			}
		})
	}
}
function edit(id) {
	//$(".bg-thick").load(thickbox/tambah_buku.php?id="+id); //Load Thickbox
	//$(".bg-thick").fadeIn(500); //Tampil Thickbox "FadeIn kecepatan tampil"

	//Atau 

	var url = "thickbox/tambah_buku.php?id="+id; //Load Thickbox
	thickbox(url,"tampil"); //Tampil Thickbox
}
function edit_buku(id) {
	judul = $("#judul").val();
	penerbit = $("#penerbit").val();
	thn_terbit = $("#thn_terbit").val();
	harga = $("#harga").val();
	jenis = $("#jenis_buku").val();
	stok = $("#stok").val();
	if (judul == "") {
		alert("Isi Judul Buku");
		$("#judul").focus();
	}else if (penerbit == "") {
		alert("Isi Penerbit Buku");
		$("#penerbit").focus();
	}else if (thn_terbit == "") {
		alert("Pilih Tahun Terbit Buku");
		$("#thn_terbit").focus();
	}else if (harga == "") {
		alert("Isi Harga Buku");
		$("#harga").focus();
	}else if (jenis == "") {
		alert("Pilih Jenis Buku");
		$("#jenis_buku").focus();
	}else if (stok == "") {
		alert("Isi Stok Buku");
		$("#stok").focus();
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_edit_buku.php",
			type	:"POST",
			data 	:{
				id_buku	: id,
				judul_buku : judul,
				penerbit_buku : penerbit,
				thn_terbit_buku : thn_terbit,
				harga_buku : harga,
				jenis_buku : jenis,
				stok_buku : stok
			},
				success:function(data){
					if (data == "Berhasil") {
						swal("Berhasil !!", "Berhasil Mengedit Data !!", "success");
						$(".content").load('content/tampil_buku.php');
						$(".bg-thick").fadeOut(500);

					}else{
						swal("Error !!", "Gagal Mengedit Data !!", "error");
					}
				}
		})
	}
}
function hapus(id) {
	$.ajax({
			url		:"proses/p_hapus_buku.php",
			type	:"POST",
			data 	:{
				id_buku : id 
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menghapus Data !!", "success");
					$(".content").load('content/tampil_buku.php');
				}else{
					swal("Error !!", "Berhasil Menghapus Data !!", "error");
				}
			}
		})
}
function validation(c){
	isi = $("#"+c).val();
	if (isi == "") {
		$("#"+c).css({"border":"1px solid #ea2727"});
	}else{
		$("#"+c).css({"border":"1px solid #777"});
	}
}
function cari(){
	var field = $("#field").val();
	var key = $("#key").val();
	$(".content").load("content/tampil_buku.php?field="+field+"&key="+key);
}
function cari_enter(e){
	if (e.keyCode == 13) {
		cari();
	}
}

//Bagian Jenis

function simpan_jenis() {
	nama_jenis = $("#nama_jenis").val();
	keterangan = $("#keterangan").val();
	
	if (nama_jenis == "") {
		alert("Isi Nama Jenis Terlebih Dahulu");
		$("#nama_jenis").focus();
	}else if (keterangan == "") {
		alert("Keterangan Kosong");
		$("#keterangan").focus();
	}else{
		//Script Simpan Jenis
		$.ajax({
			url		:"proses/p_simpan_jenis.php",
			type	:"POST",
			data 	:{
				nama_jenis_b : nama_jenis,
				keterangan_b : keterangan
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menyimpan Data !!", "success");
					$(".content").load('content/tampil_jenis_b.php');
					$(".bg-thick").fadeOut(500);
				}
			}
		})
	}
}

function edit_jenis(id){
	var url = "thickbox/tambah_jenis.php?id="+id; //Load Thickbox
	thickbox(url,"tampil"); //Tampil Thickbox
}
function edit_jenis_b(id) {
	nama_jenis = $("#nama_jenis").val();
	keterangan = $("#keterangan").val();
	
	if (nama_jenis == "") {
		alert("Isi Nama Jenis Terlebih Dahulu");
		$("#nama_jenis").focus();
	}else if (keterangan == "") {
		alert("Keterangan Kosong");
		$("#keterangan").focus();
	}else{
		//Script Simpan Jenis
		$.ajax({
			url		:"proses/p_edit_jenis.php",
			type	:"POST",
			data 	:{
				id_jenis : id,
				nama_jenis_b : nama_jenis,
				keterangan_b : keterangan
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menyimpan Data !!", "success");
					$(".content").load('content/tampil_jenis_b.php');
					$(".bg-thick").fadeOut(500);
				}
			}
		})
	}
}

function hapus_jenis(id){
	$.ajax({
			url		:"proses/p_hapus_jenis.php",
			type	:"POST",
			data 	:{
				id_jenis : id 
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menghapus Data !!", "success");
					$(".content").load('content/tampil_jenis_b.php');
				}else{
					swal("Error !!", "Gagal Menghapus Data !!", "error");
				}
			}
		})
}
function cari_jenis(){
	var key = $("#key").val();
	$(".content").load("content/tampil_jenis_b.php?key="+key);
}
function cari_enter_jenis(e){
	if (e.keyCode == 13) {
		cari_jenis();
	}
}
//Anggota 
function simpan_anggota() {
	id = $("#id_anggota").val();
	nama = $("#nama_anggota").val();
	alamat = $("#alamat").val();
	telephon = $("#no_telephon").val();
	tgl_daftar = $("#tgl_daftar").val();
	tgl_expired = $("#tgl_expired").val();

	if (id == "" || id.match('/^[0-9]+$/')) {
		alert("Isi ID Anggota ");
		$("#id_anggota").focus();
	}else if (nama == "") {
		alert("Isi nama ");
		$("#nama_anggota").focus();
	}else if (alamat == "") {
		alert("Isi alamat ");
		$("#alamat").focus();
	}else if (telephon == "" || telephon.length!= 12 || telephon.match('/^[0-9]+$/') ) {
		alert("NO Telephone Salah ");
		$("#no_telephon").focus();
		$("#no_telephon").val("");
	}else if (tgl_daftar == "") {
		alert("Isi tanggal daftar ");
		$("#tgl_daftar").focus();
	}else if (tgl_expired == "") {
		alert("Isi tanggal expired ");
		$("#tgl_expired").focus();
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_simpan_anggota.php",
			type	:"POST",
			data 	:{
				id : id,
				nama : nama,
				alamat : alamat,
				telephon : telephon,
				tgl_daftar : tgl_daftar,
				tgl_expired : tgl_expired
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menyimpan Data !!", "success");
					$(".content").load('content/tampil_anggota.php');
					$(".bg-thick").fadeOut(500);
				}
			}
		})
	}
}
function p_edit_anggota(id) {
	ida = $("#id_anggota").val();
	nama = $("#nama_anggota").val();
	alamat = $("#alamat").val();
	telephon = $("#no_telephon").val();
	tgl_daftar = $("#tgl_daftar").val();
	tgl_expired = $("#tgl_expired").val();

	if (id == "") {
		alert("Isi ID Anggota ");
		$("#id_anggota").focus;
	}else if (nama == "") {
		alert("Isi nama ");
		$("#nama_anggota").focus();
	}else if (alamat == "") {
		alert("Isi alamat ");
		$("#alamat").focus();
	}else if (telephon == "") {
		alert("Isis no telephone ");
		$("#no_telephon").focus();
	}else if (tgl_daftar == "") {
		alert("Isi tanggal daftar ");
		$("#tgl_daftar").focus();
	}else if (tgl_expired == "") {
		alert("Isi tanggal expired ");
		$("#tgl_expired").focus();
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_edit_anggota.php",
			type	:"POST",
			data 	:{
				ida : ida,
				id_anggota : id,
				nama : nama,
				alamat : alamat,
				telephon : telephon,
				tgl_daftar : tgl_daftar,
				tgl_expired : tgl_expired
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Mengedit Data !!", "success");
					$(".content").load('content/tampil_anggota.php');
					$(".bg-thick").fadeOut(500);
				}
			}
		})
	}
}
function edit_anggota(id){
	var url = "thickbox/input_anggota.php?id="+id; //Load Thickbox
	thickbox(url,"tampil"); //Tampil Thickbox
}
function hapus_anggota(id){
	$.ajax({
			url		:"proses/p_hapus_anggota.php",
			type	:"POST",
			data 	:{
				id_anggota : id 
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menghapus Data !!", "success");
					$(".content").load('content/tampil_anggota.php');
				}else{
					swal("Error !!", "Gagal Menghapus Data !!", "error");
				}
			}
		})
}
//peminjaman
function cari_id_anggota() {
	$.ajax({
		url : "proses/p_cari_anggota.php",
		type : "POST",
		dataType :"json",
		data : {
			id_anggota : $("#id_anggota").val()
		},
		success:function(hasil){
			$("#nama").val(hasil.nama);//mengabil variabel dari proses
		}
	});
}
function cari_id_buku() {
	$.ajax({
		url : "proses/p_cari_buku.php",
		type : "POST",
		dataType :"json",
		data : {
			id_buku : $("#id_buku").val()
		},
		success:function(hasil){
			$("#judul").val(hasil.judul);//mengabil variabel dari proses
		}
	});
}
function simpan_detail_pinjam() {
	id_anggota = $("#id_anggota").val();
	nama = $("#nama").val();
	id_pinjam = $("#id_pinjam").val();
	id_buku = $("#id_buku").val();
	judul = $("#judul").val();
	jumlah = $("#jumlah").val();
	tgl_transaksi = $("#tgl_transaksi").val();
	tgl_kembali = $("#tgl_kembali").val();
	total_pinjam = $("#total_pinjam").val();

	if (id_anggota == "") {
		alert("ID Anggota Tidak Di Temukan, Pastikan ID Anggota Sudah Benar");
		$("#id_anggota").focus();
	}else if(nama == ""){
		alert("Nama Anggota Kosong, Pastikan ID Anggota Sudah Benar");
		$("#id_anggota").focus();
	}else if (id_buku == "") {
		alert("Isi ID Buku");
		$("#id_buku").focus();
	}else if (judul == "") {
		alert("Judul Buku Kosong, Priksa ID Buku Apakah Sudah Benar");
		$("#id_buku").focus();
	}else if (total_pinjam == "3") {
		swal("Error !!","Jumlah buku yang dipinjam tidak boleh lebih dari 3","error");
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_simpan_dtl_pinjam.php",
			type	:"POST",
			data 	:{
				id_pinjam : id_pinjam,
				id_buku : id_buku,
				id_anggota : id_anggota,
				jumlah : jumlah,
				tgl_transaksi : tgl_transaksi,
				tgl_kembali : tgl_kembali
			},
			success:function(data){
				if (data == "Berhasil") {
					$("#id_buku").val("");
					$("#judul").val("");
					$(".table_detail").load('table/table_pinjam.php?id_pinjam='+id_pinjam);
					$(".btn-simpan").load();
				}else if(data == "Gagal"){
					swal("Error","Gagal Menginput Data !!, Buku Yang Ingin Anda Pinjam Sudah Ada !!","error");
				}
			}
		})
	}
}
function hapus_dtl_pinjam(id) {
	id_pinjam = $("#id_pinjam").val();
	$.ajax({
		url		:"proses/p_hapus_dtl_pinjam.php",
		type	:"POST",
		data 	:{
			id_detail_pinjam : id 
		},
		success:function(data){
			if (data == "Berhasil") {
				swal("Berhasil !!", "Berhasil Menghapus Data !!", "success");
				$(".table_detail").load('table/table_pinjam.php?id_pinjam='+id_pinjam);
			}else{
				swal("Error !!", "Gagal Menghapus Data !!", "error");
			}
		}
	})
}
function simpan_pinjam() {
	id_pinjam = $("#id_pinjam").val();
	id_anggota = $("#id_anggota").val();
	tgl_transaksi = $("#tgl_transaksi").val();
	total_pinjam = $("#total_pinjam").val();

	if (id_anggota == "") {
		alert("Isi ID Anggota");
		$("#id_anggota").focus();
	}else{
		//Script Simpan
		$.ajax({
			url		:"proses/p_simpan_pinjam.php",
			type	:"POST",
			data 	:{
				id_pinjam : id_pinjam,
				id_anggota : id_anggota,
				total_pinjam : total_pinjam,
				tgl_transaksi : tgl_transaksi
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menyimpan Data !!", "success");
					$(".content").load('content/tampil_pinjam.php');

				}else if(data == "Gagal"){
					swal("Error","Gagal Menyimpan Data !!, Anda sudah pernah meminjam buku !!","error");
				}
			}
		})
	}	
}

function tmb_pinjam(id,id_ang){
	var url = "content/input_pinjam.php?id="+id+"&id_anggota="+id_ang; //Load Thickbox
	thickbox(url,"tampil"); //Tampil Thickbox
}
function hapus_pinjam(id){
	$.ajax({
			url		:"proses/p_hapus_pinjam.php",
			type	:"POST",
			data 	:{
				id_pinjam : id 
			},
			success:function(data){
				if (data == "Berhasil") {
					swal("Berhasil !!", "Berhasil Menghapus Data !!", "success");
					$(".content").load('content/tampil_pinjam.php');
				}else{
					swal("Error !!", "Gagal Menghapus Data !!", "error");
				}
			}
		})
}
function cari_pinjam_tp(){
	id_anggota = $("#id_anggota").val();
	$.ajax({
		url		:"table/table_pinjam.php",
		type	:"GET",
		data 	:{
			id_anggota : id_anggota
		},
		success:function(data){
			$(".table_detail").html(data);
		}
	})
}
//Pengembalian
function cari_pinjam_tk(){
	id_anggota = $("#id_anggota").val();
	$.ajax({
		url		:"table/table_kembali.php",
		type	:"GET",
		data 	:{
			id_anggota : id_anggota
		},
		success:function(data){
			$(".table_detail").html(data);
		}
	})
}
function kembalikan(id) {
	id_anggota = $("#id_anggota").val();
	nama = $("#nama").val();
	if (id_anggota == "") {
		alert("ID Anggota Tidak Di Temukan");
		$("#id_anggota").focus();
	}else if(nama == ""){
		alert("Nama Kosong, Pastikan ID Anggotan yang anda masukkan sudah benar");
		$("#id_anggota").focus();
	}else{
		var url = "thickbox/detail_kembali.php?id="+id; //Load Thickbox
		thickbox(url,"tampil");
	}
}
function p_kembali(id_detail,id_pinjam) {
	id_anggota = $("#id_anggota").val();
	tgl_kembali = $("#tgl_kembali").val();
	lama_pinjam = $("#lama_denda").val();
	denda = $("#denda").val();
	jumlah_denda = $("#jumlah_denda").val();

	$.ajax({
		url : "proses/p_s_kembali.php",
		type : "POST",
		data:{
			id_detail_pinjam : id_detail,
			id_pinjam : id_pinjam,
			id_anggota : id_anggota,
			tgl_kembali : tgl_kembali,
			lama_pinjam : lama_pinjam,
			denda : denda,
			jumlah_denda : jumlah_denda
		},
		success:function(data) {
			if (data  == "berhasil" ) {
				var x = id_anggota;
				$(".table_detail").load("table/table_kembali.php?id_anggota="+x);
				thickbox('','tutup');
			}else if (data == "true") {
				var x = id_anggota;
				$(".table_detail").load("table/table_kembali.php?id_anggota="+x);
				thickbox('','tutup');
			}else if (data  == "selesai" ) {
				swal("Berhasil !!","Anda telah mengembalikan semua buku yang telah anda pinjam !!","success");
				$(".content").load("content/input_kembali.php");
				thickbox('','tutup');
			}
		}
	})
}