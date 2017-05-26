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

/*$sqlTabelBarang = "	CREATE TABLE IF NOT EXISTS barang (
					idbarang int AUTO_INCREMENT NOT NULL PRIMARY KEY,
					nama varchar(40) NOT NULL,
					harga int NOT NULL DEFAULT 0,
					stok int NOT NULL DEFAULT 0,
					foto varchar(70) NOT NULL DEFAULT '',
					KEY(nama))";
mysqli_query($kon, $sqlTabelBarang) or die("Gagal buat tabel barang!");*/

?>