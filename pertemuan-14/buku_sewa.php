<?php include_once('template_atas_buku.php') ?>
<h2>SEWA BUKU</h2>
<hr>
<form action="buku_sewa_simpan.php" method="POST">
	<table>
		<tr>
			<td>Kode Sewa</td>
			<td><input type="text" name="kodesew"></td>
		</tr>
		<tr>
			<td>Kode</td>
			<td><input type="text" name="kode"></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><input type="text" name="judul"></td>
		</tr>
		<tr>
			<td>Tanggal Sewa</td>
			<td>
				<select name="tglsew_tgl">
					<?php
						for($hari=1;$hari<=31;$hari++){
							$tgl = str_pad($hari,2,"0",STR_PAD_LEFT);
							echo "<option value='$tgl'>$tgl</option>";	
						}
					?>
				</select>
				<select name="tglsew_bln">
					<?php
						for($bulan=1;$bulan<=12;$bulan++){
							$bln = str_pad($bulan,2,"0",STR_PAD_LEFT);
							echo "<option value='$bln'>$bln</option>";	
						}
					?>
				</select>
				<select name="tglsew_thn">
					<?php
						$tahun_sekarang = date("Y");
						$tahun_awal = $tahun_sekarang-10;
						$tahun_akhir = $tahun_sekarang+10;
						for($tahun=$tahun_akhir;$tahun>=$tahun_awal;$tahun--){
							echo "<option value='$tahun'>$tahun</option>";	
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td>
				<select name="tglkem_tgl">
					<?php
						for($hari=1;$hari<=31;$hari++){
							$tgl = str_pad($hari,2,"0",STR_PAD_LEFT);
							echo "<option value='$tgl'>$tgl</option>";	
						}
					?>
				</select>
				<select name="tglkem_bln">
					<?php
						for($bulan=1;$bulan<=12;$bulan++){
							$bln = str_pad($bulan,2,"0",STR_PAD_LEFT);
							echo "<option value='$bln'>$bln</option>";	
						}
					?>
				</select>
				<select name="tglkem_thn">
					<?php
						$tahun_sekarang = date("Y");
						$tahun_awal = $tahun_sekarang-10;
						$tahun_akhir = $tahun_sekarang+10;
						for($tahun=$tahun_akhir;$tahun>=$tahun_awal;$tahun--){
							echo "<option value='$tahun'>$tahun</option>";	
						}
					?>
				</select>
			</td>
		</tr>
	</table>
<hr>
<input type="submit" value="Simpan" name="proses">
<input type="reset" value="Reset" name="reset">
</form>
<?php include_once('template_bawah_buku.php') ?>