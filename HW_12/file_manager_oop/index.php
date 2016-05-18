<?php
// кодировка
header("Content-Type: text/html; charset='utf-8'");
// подключаем конфигурационный файл
require_once ("data/config.php");

// проверяем, какой класс подключать
if($_GET['do']) {
    // очищаем пришедший к нам из адресной строки путь в переменной $_GET['do']
    $name = strip_tags($_GET['do']);

    // проверяем существует ли такой класс для загрузки пути
    if(file_exists(CLASSES.$name.".php")) {
        $class_name = $name;
    } else {
        // загрузка класса/пути по умолчанию
        $class_name = "main";
    }
} else {
    // загрузка класса/пути по умолчанию
    $class_name = "main";
}

// автозагрузка классов/путей
function __autoload($class_name) {
    require_once(CLASSES.$class_name.".php");
}

// вызываем объект класса
$obj = new $class_name;
$res_arr = $obj->get_body();
// подключаем вид/шаблон
require THEME . $class_name .'.tpl.php';
