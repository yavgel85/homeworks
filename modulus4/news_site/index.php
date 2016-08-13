<?php

session_start();

// настройка кодировки
header("Content-Type:text/html;charset=utf-8");

// подключение конфигурационного файла
require_once('config.php');

function __autoload($cls){
    if (file_exists('controller/' . $cls . '.php')) require_once('controller/' . $cls . '.php');
    elseif (file_exists('model/' . $cls . '.php')) require_once('model/' . $cls . '.php');
}

// механизм принятия GET-параметров из адресной строки
if (isset($_GET['option'])){
    $class = trim(strip_tags($_GET['option']));
} else {
    // перенаправление на главную страницу
    $class = 'main';
}

// проверка существования класса в данном файле, с именем, кот-е хранится $class
if (class_exists($class)) {
    // создание объекта используемого класса
    $obj = new $class;
    // вывод данных
    $obj->getBody($class);
}
else exit('<p>Неправильные данные для входа</p>');
