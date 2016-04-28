<?php

function getArray(Array $a){
	echo "<pre>";
		print_r($a);
	echo "</pre>";
}

$arr = [1,3,5,7,9];
getArray($arr);