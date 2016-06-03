-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 03 2016 г., 15:48
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `practice_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `continent`
--

INSERT INTO `continent` (`id`, `name`) VALUES
(1, 'Asia'),
(2, 'Europe');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `short_name` varchar(2) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `president` varchar(30) DEFAULT NULL,
  `prime_minister` varchar(30) NOT NULL,
  `continent_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `continent_id` (`continent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`, `short_name`, `area`, `population`, `president`, `prime_minister`, `continent_id`) VALUES
(1, 'Austria', 'AT', 83879, 8032926, 'Heinz Fischer', 'Christian Kern', 2),
(2, 'Belarus', 'BY', 207596, 9498700, 'Alexander Lukashenko', 'Andrei Kobyakov', 2),
(3, 'Belgium', 'BE', 30529, 11250585, 'Philippe', 'Charles Michel', 2),
(4, 'Bulgaria', 'BG', 110994, 7202198, 'Rosen Plevneliev', 'Boyko Borisov', 2),
(5, 'Hungary', 'HU', 93030, 9855571, 'Janos Ader', 'Viktor Orbán', 2),
(6, 'Germany', 'DE', 357168, 81459000, 'Joachim Gauck', 'Angela Merkel', 2),
(7, 'Greece', 'GR', 131957, 10955000, 'Prokopis Pavlopoulos', 'Alexis Tsipras', 2),
(8, 'Denmark', 'DK', 42925, 5707251, 'Margrethe II', 'Lars Løkke Rasmussen', 2),
(9, 'Iceland', 'IS', 102775, 332529, 'Olafur Ragnar Grimsson', 'Sigurður Ingi Jóhannsson', 2),
(10, 'Norway', 'NO', 385178, 5214900, 'Harald V', 'Erna Solberg', 2),
(11, ' Azerbaijan', 'AZ', 86600, 9574000, 'Ilham Aliyev', 'Artur Rasizade', 1),
(12, 'Georgia', 'GE', 69700, 3729500, 'Giorgi Margvelashvili', 'Giorgi Kvirikashvili', 1),
(13, 'Turkey', 'TR', 780580, 77695904, 'Recep Tayyip Erdogan', 'Binali Yıldırım', 1),
(14, 'Qatar', 'QA', 11437, 1904934, 'Tamim bin Hamad Al Thani', 'Abdullah bin Khalifa Al Thani', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country_language`
--

CREATE TABLE IF NOT EXISTS `country_language` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `country_id` tinyint(4) NOT NULL,
  `language_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `country_language`
--

INSERT INTO `country_language` (`id`, `country_id`, `language_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 5),
(8, 8, 3),
(9, 9, 9),
(10, 10, 8),
(11, 11, 2),
(12, 12, 2),
(13, 13, 4),
(14, 14, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'English'),
(2, 'Russian'),
(3, 'Deutsch '),
(4, 'Turkish'),
(5, 'Greek'),
(6, 'French'),
(7, 'Arabic'),
(8, 'Norwegian'),
(9, 'Icelandic');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `c_continent_id` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `country_language`
--
ALTER TABLE `country_language`
  ADD CONSTRAINT `lng_language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cntr_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
