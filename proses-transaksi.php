<h1>HITUNG TRANSAKSI</h1>
<table style="border-collapse: collapse;">
<?php 
	$barang_nama = $_POST['barang_nama'];
	$barang_jumlah = $_POST['barang_jumlah'];
	$barang_harga = $_POST['barang_harga'];
	$jml_total = 0;

	for ($no=1; $no <= 3; $no++) { 
		$total = $barang_jumlah[$no]*$barang_harga[$no];
		$jml_total = $jml_total + $total;
		echo "<tr style='border-top: 1px solid black;'>";
			echo "<td>Nomor</td><td>:</td><td>$no</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Nama Barang</td><td>:</td><td>$barang_nama[$no]</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Jumlah</td><td>:</td><td>$barang_jumlah[$no]</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Harga Barang</td><td>:</td><td>$barang_harga[$no]</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Total</td><td>:</td><td>$total</td>";
		echo "</tr>";
	}
	echo "<tr style='border-top: 1px solid black; border-bottom: 1px solid black; '>";
		echo "<td>Jumlah Total</td><td>:</td><td>$jml_total</td>";
	echo "</tr>";
?>	
</table>