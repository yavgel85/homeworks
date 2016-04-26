<?php

// task 6.7.1 - "квадратный" многомерный массив
function quadratic_array($n = 4){
	$a = array();
	$k = 1;

	echo "<table border='1px' style='border-collapse:collapse'>";
	for ($i=1; $i<=$n; $i++) {	
		echo "<tr>";
	  for ($j=1; $j<=$n; $j++) {
	  	echo "<td style='padding:10px'>" . $a[$i][$j] = $k . "</td>";
	    $k++;
	  }
	  echo "</tr>";
	}
	echo "</table>";
}

 quadratic_array();
 echo "<br>";


// task 6.7.2 - "Спираль"
function spiral($n = 4) {
	$i = 1;
	$p = $n / 2;

	for ($k = 1; $k <= $p; $k++) { // Цикл по номеру витка
	  for ($j = $k - 1; $j < $n - $k + 1; $j++) {
	    $a[$k - 1][$j] = $i++; // Определение значений верхнего горизонтального столбца
	  }
	  for ($j = $k; $j < $n - $k + 1; $j++) {
	    $a[$j][$n - $k] = $i++; // По правому вертикальному столбцу
	  }
	  for ($j = $n - $k - 1; $j >= $k - 1; $j--) {
	    $a[$n - $k][$j] = $i++; // По нижнему горизонтальному столбцу
	  }
	  for ($j = $n - $k - 1; $j >= $k; $j--) {
	    $a[$j][$k - 1] = $i++; // По левому вертикальному столбцу
	  }
	}

	if ($n % 2 == 1) {
	  $a[$p][$p] = $n * $n;
	}

	echo "<table border='1px' style='border-collapse:collapse'>";
	for ($i = 0; $i < $n; $i++) {
		echo "<tr>";
	  for ($j = 0; $j < $n; $j++) {
	    echo "<td style='padding:10px'>" . $a[$i][$j];
	    if ($j == $n - 1) {
	    	echo '</td>';
	    }
	  }
	  echo "</tr>";
	}
	echo "</table>";
}

spiral();