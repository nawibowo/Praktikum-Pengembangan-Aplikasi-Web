<h2>INPUT BUKU</h2>
<hr>
<form action="buku_simpan.php" method="POST">
	<table>
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><input type="text" name="kode"></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td>:</td>
			<td><input type="text" name="judul"></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td>:</td>
			<td><input type="text" name="pengarang"></td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td>:</td>
			<td><input type="text" name="penerbit"></td>
		</tr>
		<tr>
			<td>Jumlah Stok</td>
			<td>:</td>
			<td><input type="text" name="stok"></td>
		</tr>
	</table>
<hr>
<input type="submit" value="Simpan" name="proses">
<input type="reset" value="Reset" name="reset">
</form>