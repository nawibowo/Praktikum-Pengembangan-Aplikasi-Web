<?php
	session_start();
	if(!isset($_SESSION["user"])){
		echo "Sesi Sudah Habis! <br />
			<a href='buku_login_pengguna.php'>LOGIN GAGAL</a> ";
			exit;
	}
	echo "SELAMAT DATANG <br />";
	echo "USER :".$_SESSION["user"]."<br />" ;
	echo "NAMA :".$_SESSION["nama_lengkap"]."<br />";
?>
<hr />
<div id="menu">
	<h2>LINK</h2>
	<a href="buku_tambah_pengguna.php">Tambah Pengguna</a><br />
	<a href="logout.php">Logout</a><br />
</div>
<div>
	<h2>Daftar Pengguna</h2>
	<table border="1">
		<thead>
			<th>Pengguna</th><th>Nama Lengkap</th><th>Akses</th>
		</thead>
		<tbody>
	<?php
	include "koneksi-buku.php";
	$sql = "SELECT * FROM pengguna";
	$query = mysqli_query($kon,$sql) or die("Gagal Akses! <br />");
	while ($hasil = mysqli_fetch_assoc($query)) {
		echo "<tr>";
			echo "<td>".$hasil['user']."</td><td>".$hasil['nama_lengkap']."</td><td>".$hasil['akses']."</td>";
		echo "</tr>";
	}
	?>
		</tbody>
	</table>
</div>