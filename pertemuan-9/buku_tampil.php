<?php
	include "koneksi-buku.php";
	$judul_buku ="";
	$suplier ="";
	if(isset($_POST["judul_buku"])){
		$judul_buku = $_POST["judul_buku"];
		$sql = "SELECT * FROM buku WHERE judul like '%".$judul_buku."%' ORDER BY idbuku DESC";
	} elseif (isset($_POST["suplier"])) {
		$suplier = $_POST["suplier"];
		$sql = "SELECT * FROM buku WHERE suplier like '%".$suplier."%' ORDER BY idbuku DESC";
	} else {
		$sql = "SELECT * FROM buku ORDER BY idbuku DESC";
	}
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<a href="buku_isi.php">INPUT BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari.php">CARI BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari_suplier.php">CARI SUPLIER BUKU</a>
<table border="1">
	<tr>
		<th>Foto</th>
		<th>Judul Buku</th>
		<th>Pengarang</th>
		<th>Suplier</th>
		<th>Aksi</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)) {
			echo "<tr>";
			echo "<td> <a href='pict/{$row['foto']}'/>
					<img src='thumb/t_{$row['foto']}' width='100' />
					</a>
				  </td>";
			echo "<td>".$row['judul']."</td>";
			echo "<td>".$row['pengarang']."</td>";
			echo "<td>".$row['suplier']."</td>";
			echo "<td><a href=\"buku_info.php?kode=".$row['kode']."\">Lihat Buku</a></td>";
			echo" </tr>";
		}
	?>
</table>

<!-- tugas di bagian modul, tambah tombol cari supplier dan kolom supplier -->