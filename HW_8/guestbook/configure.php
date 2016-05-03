<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 30.04.2016
 * Time: 2:41
 */

// определение параметров соединение с БД
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gb');

// админчасть
define('ADMIN', 'admin');
define('PASS', '202cb962ac59075b964b07152d234b70'); // MD5() - 123

// определение ошибки при отсутствии комментариев
define('ERROR', 'Заполните поле комментариев.');

//незначительные ошибки не будут выводиться
error_reporting(0);

// соединение с БД
mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Нет соединения с сервером.');
mysql_select_db(DB_NAME) or die('Нет соединения с БД.');
mysql_query("SET NAMES 'utf8'");