<?php 
session_start();
$pengguna = isset($_SESSION["user"]) ? $_SESSION["user"] : "";
$nama_lengkap = isset($_SESSION["nama_lengkap"]) ? $_SESSION["nama_lengkap"] : "";
$akses = isset($_SESSION["akses"]) ? $_SESSION["akses"] : "beli";

if ($akses == "toko") {
	$nama_akses = "Operator Toko";
} else {
	$nama_akses = "Pembeli";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>APLIKASI PEMINJAMAN BUKU</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrap">
		<div id="header">
			<h1>RENTAL BUKU "JENDELA"</h1>
		</div>
		<div style="clear: both;"></div>
		<div id="tengah">
			<div id="info_pengguna">
			<?php 
			if (!empty($pengguna)) {
				echo "Sedang login sebagai: $pengguna, nama lengkap: $nama_lengkap <br>
				Akses sebagai: $nama_akses, ";
				$tampil_login = "display:none;";
				$tampil_logout = "";
			} else {
				$tampil_login = "";
				$tampil_logout = "display:none;";
			}
			?> tanggal: <?php echo date("d F Y"); ?>
			</div>
			<div id="menu">
				<div id="menu_header">Menu</div>
				<div id="menu_konten">
					<ul>
						<?php 
						$tampil = "";
						if ($akses == "beli") $tampil = "display:none;";
						?>
						<li><a style="<?php echo $tampil; ?>" href="buku_tampil.php">Kelola Buku</a></li>
						<li><a style="<?php echo $tampil; ?>" href="pengguna_isi.php">Input Pengguna</a></li>
						<li><a href="buku_tersedia.php">Buku Tersedia</a></li>
						<li><a href="buku_keranjang.php">Keranjang Peminjaman</a></li>
						<li><a href="buku_pinjam.php">Transaksi Peminjaman</a></li>
						<li><a style="<?php echo $tampil_login; ?>" href="buku_login_pengguna.php">Login</a></li>
						<li><a style="<?php echo $tampil_logout; ?>" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
			<div id="konten">