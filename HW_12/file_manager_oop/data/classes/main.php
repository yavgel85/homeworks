<?php

class main extends abase {

    // формируем массив файлов и папок, кот-е содержаться в той директории, которую мы просматриваем/открываем
    function get_body() {
        // проверяем пришел ли путь к вложенным подпапкам/файлам
        if($_GET['path']) {
            $path = $_GET['path'];
            $obj = dir_view::get_instance($path);
        }
        else {
            $obj = dir_view::get_instance();
        }
        // массив данных по запрашиваемой папке
        return $obj->dirs_to_array();
    }
}
