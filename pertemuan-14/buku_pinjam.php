<h2>DATA PEMINJAMAN BUKU</h2>
<form action='simpan_pinjam.php' method="POST">
<table border="0">
	<tr>
		<td>Tanggal</td>
		<td>: <input type="text" name="tanggal" value="<?php echo date("d-m-Y"); ?>"/></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>: <input type="text" name="namacust" /></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <input type="text" name="email" /></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>: <input type="text" name="notelp" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right">
<input type="submit" value="Simpan"></td>
	</tr>
</table>
</form>
<?php
include_once("buku_keranjang.php")
?>
