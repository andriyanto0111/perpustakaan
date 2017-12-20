function panggil(c) {
	$(".content").load(c);
}
function thickbox(url, method){
	if (method == "tampil") {
		$(".bg-thick").load(url); //Load Thickbox
		$(".bg-thick").fadeIn(500); //Tampil Thickbox
	}else{
		$(".bg-thick").fadeOut(500); //Tutup Thickbox
	}
}
function table_detail(c) {
	$(".table_detail").load(c);
}