<?php

function getArray(Array $a, $out = false){
	if ($out == false) {
		echo "<pre>";
			print_r($a);
		echo "</pre>";
	} else {
		echo "<pre>";
			var_dump($a);
		echo "</pre>";
	}	
}

$arr = [1,3,5,7,9];
getArray($arr); // print_r()
// getArray($arr, true); // var_dump()