<?php
	$namacust		= $_POST['namacust'];
	$email			= $_POST['email'];
	$notelp			= $_POST['notelp'];
	$tanggal		= date("Y-m-d");
	$barang_pilih	= '';
	$qty			= 1;

	$dataValid	= "YA";
	if (strlen(trim($namacust))==0){
		echo "Nama Harus Diisi.. <br />";
		$dataValid = "TIDAK";
	}

	if (strlen(trim($notelp))==0){
		echo "No. Telp Harus Diisi.. <br />";
		$dataValid = "TIDAK";		
	}

	if (isset($_COOKIE['keranjang'])){
		$barang_pilih = $_COOKIE['keranjang'];
	} else{
		echo "Keranjang Belanja Kosong <br />";
		$dataValid = "TIDAK";
	}

	if($dataValid=="TIDAK"){
		echo "Masih Ada Kesalahan, silahkan perbaiki <br />";
		echo "<input type='button' value='Kembali' onClick='self.history.back()' />";
		exit;
	}

	include 'koneksi.php';

	$sql = "INSERT INTO hjual
			(tanggal,namacust,email,notelp)
			values 
			('$tanggal','$namacust','$email','$notelp')";

	$hasil = mysqli_query($kon, $sql);

	if(!$hasil){
		echo "Gagal simpan, silahkan diulangi! <br/>";
		echo mysqli_error($kon);
		echo "<br/> <inpyt type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	} else {
		echo "Simpan Data Berhasil";
	}

	setcookie('keranjang',$barang_pilih,time()-3600);
?>
