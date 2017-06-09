<?php 
	session_start();
	$pengguna	= $_POST['user'];
	$nama_lengkap	= $_POST['nama_lengkap'];
	$akses	= $_POST['akses'];
	$password1	= $_POST['password1'];
	$password2	= $_POST['password2'];

	$dataValid="YA";
	if(strlen(trim($pengguna))==0){
		echo "Nama Pengguna Harus Diisi! <br />";
		$dataValid="TIDAK";
	}
	if(strlen(trim($nama_lengkap))==0){
		echo "Nama Lengkap Harus Diisi! <br />";
		$dataValid="TIDAK";
	}
	if(strlen(trim($password1))==0){
		echo "Password Harus Diisi! <br />";
		$dataValid="TIDAK";
	}
	if($password1 != $password2){
		echo "Password Tidak Cocok! <br />";
		$dataValid="TIDAK";
	}

	include 'koneksi-buku.php';
	$sql = "SELECT idpengguna FROM pengguna WHERE user='".$pengguna."'";
	$hasil = mysqli_query($kon,$sql) or die('Gagal Akses! <br />');
	$jumlah = mysqli_num_rows($hasil);

	if($jumlah>0){
		echo "Nama Pengguna Sudah Dipakai! <br />";
		$dataValid="TIDAK";
	}
	if($dataValid=="TIDAK"){
		echo "Masih Ada Kesalahan, silahkan perbaiki! <br />";
		echo "<button onClick='self.history.back()'>Kembali</button> ";
		exit;
	}

	$query = "INSERT INTO pengguna (user, password, nama_lengkap, akses)
			VALUES ('$pengguna',md5('$password1'),'$nama_lengkap','$akses')";
	$hasil = mysqli_query($kon, $query);

	if(!$hasil){
		echo "Gagal simpan, silahkan diulangi! <br/>";
		echo mysqli_error($kon);
		echo "<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	} else {
		echo "Simpan Data Berhasil";
		echo "<br><a href=\"buku_tambah_pengguna.php\">Tambah Pengguna</a>";
	}
?>