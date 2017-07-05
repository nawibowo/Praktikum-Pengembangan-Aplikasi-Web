<?php include_once('template_atas_buku.php') ?>
<div>
	<?php
		// session_start();
		echo "SELAMAT DATANG <br />";
		echo "USER :".$_SESSION["user"]."<br />" ;
		echo "NAMA :".$_SESSION["nama_lengkap"]."<br />";
		echo "AKSES :".$_SESSION["akses"]."<br />";
	?>
	<hr /><br />
	<h1>TAMBAH PENGGUNA</h1>
	<form method="POST" action="buku_simpan_pengguna.php">
		<table>
			<tr>
				<td>Nama Pengguna</td>
				<td><input type="text" name="user"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" name="nama_lengkap"></td>
			</tr>
			<tr>
				<td>Akses</td>
				<td>
					<select name="akses">
						<option value="pinjam">Peminjam</option>
						<option value="toko">Admin toko</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password1"></td>
			</tr>
			<tr>
				<td>Ulangi Password</td>
				<td><input type="password" name="password2"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="tambah" value="TAMBAH"></td>
			</tr>
		</table>
	</form>
</div>
<?php include_once('template_bawah_buku.php') ?>