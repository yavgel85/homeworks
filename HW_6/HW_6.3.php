<?php

$arr = array('auto' => 'Audi r8', 'moto' => 'BMW', 'airplain' => 'Airbus a350', 'train' => 'Hyundai Rotem');

echo "<pre>";
    print_r($arr);
echo "</pre>";
echo "<br>";

// Передаем изменяемый элемент массива через ключ
function changeArrayValueByKey($changeValue, &$array){
    foreach ($array as $key => $value) {
       if ($changeValue == $value) {
           return $key;
       }
    }
}

$airplain = changeArrayValueByKey('Airbus a350', $arr);
$arr[$airplain] = 'Ruslan AN-124';

echo "<pre>";
    print_r($arr);
echo "</pre>";
echo "<br>";


// Передаем изменяемый элемент массива через ссылку
function &changeArrayValueByLink($changeValue, &$array){
    foreach ($array as $key => $value) {
       if ($changeValue == $value) {
           return $key;
       }
    }
}

$auto =& changeArrayValueByLink('Audi r8', $arr);
$arr[$auto] = 'Aston Martin one-77';

echo "<pre>";
    print_r($arr);
echo "</pre>";