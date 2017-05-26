<?php

$kode = $_POST['kode'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$stok = $_POST['stok'];

$dataValid = "YA";

if(strlen(trim($kode))==0){
	echo "Kode Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($judul))==0){
	echo "Judul Buku Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($pengarang))==0){
	echo "Pengarang Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($penerbit))==0){
	echo "Penerbit Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($stok))==0){
	echo "Jumlah Stok Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}

if($dataValid == "TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";

$sql = "INSERT INTO buku(idbuku,kode,judul,pengarang,penerbit,stok)
		VALUES (NULL,'$kode','$judul','$pengarang','$penerbit','$stok')";
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