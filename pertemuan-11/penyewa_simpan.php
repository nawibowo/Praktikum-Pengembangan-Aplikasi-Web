<?php

$nama = $_POST['nama'];

$dataValid = "YA";

if(strlen(trim($nama))==0){
	echo "Nama penyewa Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}

if($dataValid == "TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";

$sql = "INSERT INTO penyewa(idpenyewa,nama)
		VALUES (NULL,'$nama')";
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