<?php include_once('template_atas_buku.php') ?>
<?php
	$kode ="";
	if(isset($_GET["kode"]))
		$kode = $_GET["kode"];
	include "koneksi-buku.php";
	$sql = "SELECT * FROM buku WHERE kode = '".$kode."'";
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<a href="buku_isi.php">INPUT BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari.php">CARI BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari_suplier.php">CARI SUPLIER BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_tampil.php">DAFTAR BUKU</a>
<h1>INFORMASI BUKU</h1>
<table border="1">
	<?php
		$row = mysqli_fetch_assoc($hasil);
			echo "<tr>";
			echo "<td colspan='2' style='text-align:center;'> <a href='pict/{$row['foto']}'/>
					<img src='thumb/t_{$row['foto']}' width='100' />
					</a>
				  </td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Kode Buku</td><td>".$row['kode']."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Judul Buku</td><td>".$row['judul']."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Pengarang</td><td>".$row['pengarang']."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Penerbit</td><td>".$row['penerbit']."</td>";
			echo" </tr>";
			echo" <tr>";
			echo "<td>Suplier</td><td>".$row['suplier']."</td>";
			echo" </tr>";
	?>
</table>
<?php include_once('template_bawah_buku.php') ?>
<!-- tugas di bagian modul, tambah tombol cari supplier dan kolom supplier -->