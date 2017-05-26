<?php
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];
$total = 0;

for ($i=$awal; $i <= $akhir; $i++) {
  if ($i%3 == 0) {
    echo "Bilangan $i adalah kelipatan 3<br>";
    $total += $i;
  }
}

echo "Jumlah dari bilangan kelipatan 3 adalah: $total";
 ?>
