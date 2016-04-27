<?php
// Короткий вариант
$w=4; $h=4; //Сюда размер матрицы
function s($w,$h,$x,$y){return $y ? $w + s($h - 1, $w, $y - 1, $w - $x - 1) : $x;}
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) printf("%4d",s($w, $h, $j, $i));
    echo "<br>"; }

echo "<br>";

// Отформатированный вариант
$w=4; $h=4;
function s_format($w,$h,$x,$y) {
	return $y ? $w + s_format($h - 1, $w, $y - 1, $w - $x - 1) : $x;
}

echo "<table border='1px' style='border-collapse:collapse'>";
for ($i = 0; $i < $h; $i++) {
	echo "<tr>";
  for ($j = 0; $j < $w; $j++) 
  	print_r("<td style='padding:10px'>") . printf("%4d", s_format($w, $h, $j, $i)) . print_r("</td>");
  echo "</tr>";
}
echo "</table>";