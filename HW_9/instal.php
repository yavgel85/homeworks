<?php
// определение параметров соединение с БД
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gb');
?>

<p>Подключаемся к серверу БД ...</p>

<?php mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Нет соединения с сервером.'); ?>

<p>Подключение выполнено!</p>
<p>Создаем БД ...</p>

<?php 
// создаем БД и исключаем вариант повторного создания данной БД
$query = "CREATE DATABASE IF NOT EXISTS " .DB_NAME. " DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;"; 

if(!mysql_query($query)) die('Не удалось создать БД.');
mysql_select_db(DB_NAME) or die('Нет соединения с БД.');
?>

<p>БД создана!</p>
<p>Создаём необходимые таблицы ...</p>

<?php
$query = "CREATE TABLE IF NOT EXISTS `post` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

if(!mysql_query($query)) die('Не удалось создать таблицу post.');

$query2 = "CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `confirm` enum('0','1') NOT NULL DEFAULT '0',
  `sess` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

if(!mysql_query($query2)) die('Не удалось создать таблицу users.');
?>

	<p>Установка завершена. <u><b>Не забудьте удалить файл instal.php!!!</b></u></p>