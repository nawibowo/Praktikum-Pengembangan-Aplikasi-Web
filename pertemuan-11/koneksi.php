<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "toko_ol";

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

$sqlTabelHJual = "CREATE TABLE IF NOT EXISTS hjual(
					idhjual int auto_increment not null primary key,
					tanggal date not null,
					namacust varchar(40) not null,
					email varchar(50) not null default '',
					notelp varchar(20) not null default ''
					)";

mysqli_query ($kon, $sqlTabelHJual) or die("Gagal Buat Tabel Header Jual");

$sqlTabelDJual = "CREATE TABLE IF NOT EXISTS djual(
					iddjual int auto_increment not null primary key,
					idhjual int not null,
					idbarang int not null,
					qty int not null,
					harga int not null
					)";

mysqli_query ($kon, $sqlTabelDJual) or die("Gagal Buat Tabel Deatil Jual");

?>