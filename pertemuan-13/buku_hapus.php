<?php
	$idbuku = $_GET['idbuku'];
	include "koneksi-buku.php";
	$sql = "select * from buku where idbuku = '$idbuku'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die('Gagal query....');

	$data = mysqli_fetch_array($hasil);
	$kode = $data['kode'];
	$judul = $data['judul'];
	$pengarang = $data['pengarang'];
	$penerbit = $data['penerbit'];
	$suplier = $data['suplier'];
	$stok = $data['stok'];
	$foto = $data['foto'];

	echo "<h2> Konfirmasi Hapus Buku</h2>";
	echo "<table border='1'>";
			echo "<tr>";
			echo "<td colspan='2' style='text-align:center;'> <a href='pict/{$data['foto']}'/>
					<img src='thumb/t_{$data['foto']}' width='100' />
					</a>
				  </td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Kode Buku</td><td>".$kode."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Judul Buku</td><td>".$judul."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Pengarang</td><td>".$pengarang."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Penerbit</td><td>".$penerbit."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td colspan='2' style='text-align:center;'>APAKAH DATA INI AKAN DI HAPUS? <br/>";
			echo "<a href = 'buku_hapus.php?idbuku=$idbuku&hapus=1'>YA </a>";
			echo "&nbsp; &nbsp;";
			echo "<a href='buku_tampil.php'>TIDAK </a></td>";
			echo" </tr>";
	echo "</table>";

	if (isset($_GET['hapus'])){
		$sql = "delete from buku where idbuku='$idbuku'";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil){
			echo "Gagal Hapus Buku : $nama..<br/>";
			echo "<a href='buku_tampil.php'>Kembali Ke Daftar Buku </a>";
		} else {
			$gbr = "pict/$foto";
			if (file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t_$foto";
			if (file_exists($gbr)) unlink($gbr);
			header('location:buku_tampil.php');
		}
	}
?>