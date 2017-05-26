<h1>Hasil Biaya</h1>
<?php 
$jumlah = $_POST['jml'];

if ($jumlah > 200) {
	$tarif = 80;
} elseif ($jumlah >= 100) {
	$tarif = 100;
} else {
	$tarif = 150;
}

$bayar = $jumlah*$tarif;

echo "Jumlah lembar fotocopy: $jumlah<br>";
echo "Tarif harga: $tarif<br>";
echo "Biaya harus bayar: $bayar";
?>