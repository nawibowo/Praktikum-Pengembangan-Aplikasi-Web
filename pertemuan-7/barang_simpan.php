<?php
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$dataValid = "YA";

if(strlen(trim($nama))==0){
	echo "Nama Barang Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($harga))==0){
	echo "Hargas Barang Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if(strlen(trim($stok))==0){
	echo "Stok Barang Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if($dataValid == "TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";

$sql = "insert into barang(nama, harga, stok)
		values
		('$nama','$harga','$stok')";
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