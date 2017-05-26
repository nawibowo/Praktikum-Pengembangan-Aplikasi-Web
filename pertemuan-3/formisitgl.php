<form action="hasil.php" method="post" >
Hari ke -
<select name="hari">
	<?php
		for($h=1;$h<=31;$h++){
			echo "<option value='$h'> $h </option>";
		}
	?>
</select>:
Bulan
<select name="bulan">
	<?php
		for($b=1;$b<=12;$b++){
			echo "<option value='$b'> $b </option>";
		}
	?>
</select>:
Tahun
<select name="tahun">
	<?php
		for($t=2019;$t>=1980;$t--){
			echo "<option value='$t'> $t </option>";
		}
	?>
</select> <br/>
<input type="submit" value="TAMPILKAN"/>
</form>
