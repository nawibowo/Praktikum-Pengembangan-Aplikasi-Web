<?php 

$nama = $_POST['nama'];
$pilihan = $_POST['pilihan'];
$seri = $_POST['seri'];
$merk = $_POST['merk'];
$negara = $_POST['negara'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$total = $harga*$stok;
$tampilharga = number_format($harga,2,",",".");
$tampiltotal = number_format($total,2,",",".");

$hari = $_POST["hari"];
$bulan = $_POST["bulan"];
$tahun = $_POST["tahun"];
$angka_tanggal = mktime(0,0,0,$bulan,$hari,$tahun);
$tanggal = date("l, j F Y",$angka_tanggal);

$kode = array();
if (isset($nama) and !empty($nama)) {
	$kode[] = substr($nama,0,3);
}
if (isset($_POST['seri']) and !empty($_POST['seri'])) {
	$kode[] = str_pad($_POST['seri'], 6, "0", STR_PAD_LEFT);
}
if (isset($merk) and !empty($merk)) {
	$kode[] = substr($merk,0,3);
}
if (isset($negara) and !empty($negara)) {
	$kode[] = substr($negara,0,3);
}

$banyak_array = count($kode);

if ($banyak_array == 4) {
	$set_kode=implode("/", $kode);
}
?>

<h1>Data Barang</h1>
<table>
	<tr>
		<td>Kode</td><td>:</td><td><?php echo $set_kode; ?></td>
	</tr>
	<tr>
		<td>Nama Barang</td><td>:</td><td><?php echo strtoupper($nama); ?></td>
	</tr>
	<tr>
		<td>Nomor Seri</td><td>:</td><td><?php echo $seri; ?></td>
	</tr>
	<tr>
		<td>Merk</td><td>:</td><td><?php echo $merk; ?></td>
	</tr>
	<tr>
		<td>Buatan Dari</td><td>:</td><td><?php echo $negara; ?></td>
	</tr>
	<tr>
		<td>Tanggal Buat</td><td>:</td><td><?php echo $tanggal; ?></td>
	</tr>
	<tr>
		<td>Harga</td><td>:</td><td>Rp.<?php echo $tampilharga; ?></td>
	</tr>
	<tr>
		<td>Jumlah Stok</td><td>:</td><td><?php echo $stok; ?></td>
	</tr>
	<tr>
		<td>Total Harga</td><td>:</td><td>Rp.<?php echo $tampiltotal; ?></td>
	</tr>
</table>