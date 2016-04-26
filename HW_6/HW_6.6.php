<?php
header('Content-Type: text/html; charset=UTF-8'); 

function dividedIntoFive($var) { return ($var % 5 == 0); }

$array2 = array (16, 75, 100, 1, 53, 505, 54);

echo "Разделенные без остатка на 5: <br>";
echo "<pre>";
  print_r (array_filter ($array2, "dividedIntoFive"));
echo "</pre>";