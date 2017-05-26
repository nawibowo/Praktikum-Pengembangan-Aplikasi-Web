<h1>TRANSAKSI</h1>
<form method="POST" action="proses-transaksi.php">
<table style="border-collapse: collapse;">
	<?php 
	for ($no=1; $no <= 3; $no++) { 
		echo "<tr>";
			echo "<td>Nomor</td><td>:</td><td>$no</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Nama Barang</td><td>:</td><td><input type='text' name='barang_nama[$no]'></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Jumlah</td><td>:</td><td><input type='text' name='barang_jumlah[$no]'></td>";
		echo "</tr>";
		echo "<tr style='border-bottom: 1px solid black; '>";
			echo "<td>Harga Barang</td><td>:</td><td><input type='text' name='barang_harga[$no]'></td>";
		echo "</tr>";
	}
	?>
	<tr>
		<td colspan="3"><input type="submit" value="HITUNG"><input type="reset" value="BATAL"></td>
	</tr>
</table>
</form>