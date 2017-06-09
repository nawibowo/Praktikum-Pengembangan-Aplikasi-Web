<?php
date_default_timezone_set("asia/bangkok");

$namacust=$_POST['namacust'];
$email=$_POST['email'];
$notelp=$_POST['notelp'];
$tanggal=$_POST['tanggal'];
$buku_pilih='';
$qty=1;

$dataValid="YA";
if (strlen(trim($namacust))==0){
	echo "Nama Harus DIISI!<br/>";
	$dataValid="TIDAK";
}
if (strlen(trim($notelp))==0){
	echo "No Telpon Harus DIISI!<br/>";
	$dataValid="TIDAK";
}
if(isset($_COOKIE['keranjang'])){
	$buku_pilih=$_COOKIE['keranjang'];
}
else{
	echo "Keranjang belanja kosong<br/>";
	$dataValid="TIDAK";
}
if($dataValid=="TIDAK"){
	echo ("masih ada kesalahan, mohon diperbaiki...<br/>
	<input type='button' value='kembali' onClick='self.history.back()'>");
	exit;
}

include 'koneksi-buku.php';
	$simpan=true;
	$mulai_transaksi = mysqli_begin_transaction($kon);
	$sql = "INSERT INTO hpinjam
			(tanggal,namacust,email,notelp)
			values 
			('$tanggal','$namacust','$email','$notelp')";

	$hasil = mysqli_query($kon, $sql);
	if(!$hasil){
		echo "Data Customer Gagal Simpan <br/>";
		$simpan=false;
	}

	$idhpinjam = mysqli_insert_id($kon);
	if($idhpinjam==0){
		echo "Data Customer Tidak Ada<br/>";
		$simpan = false;
	}

	$buku_array = explode(",", $buku_pilih);
	$jumlah = count($buku_array);
	if($jumlah<=1){
		echo "Tidak Ada Buku yang Dipilih<br/>";
		$simpan = false;
	}else{
		foreach ($buku_array as $idbuku) {
			if($idbuku==0){
				continue;
			}
			$sql = "SELECT * FROM buku WHERE idbuku=$idbuku";
			$hasil = mysqli_query($kon, $sql);
			if(!$hasil){
				echo "Buku Tidak Ada<br/>";
				$simpan = false;
				break;
			}else{
				$row = mysqli_fetch_assoc($hasil);
				$stok = $row['stok'] - 1;
				if($stok<0){
					echo "Stok Buku".$row['nama']." Kosong<br/>";
					$simpan = false;
					break;
				}
			}
			$sql = "INSERT INTO dpinjam (idhpinjam, idbuku, qty)
					VALUES ('$idhpinjam', '$idbuku', '$qty')";
			$hasil = mysqli_query($kon,$sql);
			if(!$hasil){
				echo "Update Stok buku Gagal<br/>";
				$simpan = false;
				break;
			}
			$sql = "UPDATE buku SET stok = $stok
				WHERE idbuku = $idbuku";
			$hasil = mysqli_query($kon,$sql);
			if(!$hasil){
				echo "Update Stok buku Gagal<br/>";
				$simpan = false;
				break;
			}
		}
	}

	if($simpan){
		$komit = mysqli_commit($kon);
	} else {
		$rollback = mysqli_rollback($kon);
		echo "Pembelian Gagal<br/>
			<input type='button' value='Kembali'
			onClick='self.history.back()'>";
		exit;
	}
header("Location: bukti_pinjam.php?idhpinjam=$idhpinjam");
setcookie('keranjang',$buku_pilih,time()-3600);
?>
