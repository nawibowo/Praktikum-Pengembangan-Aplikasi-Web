<?php

$a = 1;
$b = 1;

echo "<p>";
while ($a < 5 ) {
  echo "STMIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $a++;
}
echo "</p>";

echo "<p>";
do {
  echo "Akakom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $b++;
} while ($b <= 5);
echo "</p>";

echo "<p>";
for ($c=1; $c <= 5; $c++) {
  echo "$c. Kelas $c<br>";
}
echo "</p>";
 ?>
