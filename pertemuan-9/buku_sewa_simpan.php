<?php

$kodesew = $_POST['kodesew'];
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$tglsew_tgl = $_POST['tglsew_tgl'];
$tglsew_bln = $_POST['tglsew_bln'];
$tglsew_thn = $_POST['tglsew_thn'];
$tglsew = $tglsew_thn."-".$tglsew_bln."-".$tglsew_tgl;
$tglkem_tgl = $_POST['tglkem_tgl'];
$tglkem_bln = $_POST['tglkem_bln'];
$tglkem_thn = $_POST['tglkem_thn'];
$tglkem = $tglkem_thn."-".$tglkem_bln."-".$tglkem_tgl;

$dataValid = "YA";

if(strlen(trim($kodesew))==0){
	echo "Kode sewa Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($kode))==0){
	echo "Kode Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($judul))==0){
	echo "Judul Buku Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}

if($dataValid == "TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";

$sql = "INSERT INTO sewa(idsewa,kodesew,kode,judul,tglsew,tglkem)
		VALUES (NULL,'$kodesew','$kode','$judul','$tglsew','$tglkem')";
$hasil = mysqli_query($kon, $sql);

if(!$hasil){
	echo "Gagal simpan, silahkan diulangi! <br/>";
	echo mysqli_error($kon);
	echo "<br/> <inpyt type='button' value='Kembali' onClick='self.history.back()'>";
	exit;
} else {
	echo "Simpan Data Berhasil";
}
?>