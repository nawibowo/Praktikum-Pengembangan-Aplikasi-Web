<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "sewabuku";

$kon = mysqli_connect($host, $user, $pass);
if(!$kon)
	die("Gagal Koneksi");

$hasil = mysqli_select_db($kon, $dbName);
if(!$hasil){
	$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if(!$hasil)
		die("Gagal buat database!");
	else
		$hasil = mysqli_select_db($kon, $dbName);
		if(!$hasil) die("Gagal Konek Database");
}

$sqlTabelUser = "CREATE TABLE IF NOT EXISTS pengguna(
					idpengguna int auto_increment not null primary key,
					user varchar(25) not null,
					password varchar(50) not null,
					nama_lengkap varchar(50) not null,
					akses varchar(10) not null
					)";
mysqli_query ($kon, $sqlTabelUser) or die("Gagal buat Tabel Pengguna");

$sql = "SELECT * FROM pengguna";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0){
	$sql = "INSERT INTO pengguna (user, password, nama_lengkap, akses)
			VALUES ('admin',md5('admin'),'administrator','toko'),
					('cust',md5('cust'),'pelanggan','pinjam') ";
mysqli_query($kon,$sql);
};

?>