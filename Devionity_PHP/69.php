<?php

function getCountArrayElement(Array $a){
	$all = count($a);
	$a[] = $all;
	echo "<pre>";
		print_r($a);
	echo "</pre>";
}

$arr = [1,3,5,7,9];
getCountArrayElement($arr);