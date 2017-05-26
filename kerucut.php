<form name="hitung" action="kerucut.php" method="POST">
	Jari-jari: <input type="text" name="kerucut_r">
	<br>
	Tinggi kerucut: <input type="text" name="kerucut_t">
	<br>
	Panjang sisi kerucut: <input type="text" name="kerucut_s">
	<br>
	<input type="submit" value="hitung" name="hitung">
	<br>
</form>

<?php
if(isset($_POST['hitung'])){
	$kerucut_r = $_POST['kerucut_r'];
	$kerucut_s = $_POST['kerucut_s'];
	$kerucut_t = $_POST['kerucut_t'];
	
	$phi = 3.14;
	$kerucut_luas_alas = $phi * $kerucut_r * $kerucut_r;
	$kerucut_luas_selimut = $phi * $kerucut_r * $kerucut_s;
	$kerucut_luas_permukaan = $kerucut_luas_alas + $kerucut_luas_selimut;
	$kerucut_volume = $kerucut_luas_alas * $kerucut_t / 3;
	
	echo "<p>Hasil:</p>";
	echo "<p>Luas alas = $kerucut_luas_alas</p>";
	echo "<p>Luas selimut = $kerucut_luas_selimut</p>";
	echo "<p>Luas permukaan = $kerucut_luas_permukaan</p>";
	echo "<p>Volume kerucut = $kerucut_volume</p>";
}
?>