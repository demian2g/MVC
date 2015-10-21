-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 22 2015 г., 01:48
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apts`
--

CREATE TABLE IF NOT EXISTS `apts` (
  `id` int(11) NOT NULL,
  `value` smallint(6) NOT NULL,
  `rate` float NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `apts`
--

INSERT INTO `apts` (`id`, `value`, `rate`, `address`, `note`) VALUES
(12, 99, 9.3, 'Pushkinskaya, 31v', 'Besarabs''ka area'),
(67, 67, 9.3, 'Triokhsviatytelska, 9', 'Maydan area'),
(71, 129, 9, 'Shota Rustaveli, 29B', 'Besarabs''ka area'),
(95, 84, 9.3, 'Lva Tolstogo Street, 5A', 'Besarabs''ka area'),
(161, 89, 9.3, 'Sofiivs''ka, 4', 'Maydan area'),
(181, 34, 9.1, 'Tarasa Shevchenko, 2/54', 'Besarabs''ka area'),
(194, 69, 10, 'Bogdana Khmelnitskogo, 10', 'Khreschatyk area'),
(204, 92, 9.3, 'L''va Tolstoho, 1', 'Besarabs''ka area'),
(207, 92, 9.4, 'Mykhailivs''ka, 24А', 'Maydan area'),
(238, 79, 10, 'Proreznaya, 4', 'Khreschatyk area'),
(296, 112, 9.6, 'Pushkinska, 20', 'Khreschatyk area'),
(300, 69, 9, 'Pushkinska, 24B', 'Besarabs''ka area'),
(316, 159, 9.9, 'Kruhlouniversytetska, 3/5', 'Besarabs''ka area'),
(322, 69, 9.3, 'Khreschatyk, 21', 'Khreschatyk area'),
(323, 79, 9.5, 'Sofiivs''ka, 16', 'Maydan area'),
(335, 54, 9, 'Pushkinskaya, 11', 'Besarabs''ka area'),
(345, 129, 9, 'Sofiivs''ka, 8', 'Maydan area'),
(346, 79, 9, 'Volodymyrska, 51/53', 'Golden Gates area'),
(426, 63, 9.3, 'Velyka Vasylkivska, 23V', 'Lva Tolstogo Square area'),
(438, 79, 9.3, 'Rognedinskaya Street, 1/13', 'Besarabs''ka area'),
(466, 52, 9.3, 'Baseina, 9', 'Besarabs''ka area'),
(493, 149, 9, 'Shota Rustaveli, 4', 'Besarabs''ka area'),
(716, 62, 9.1, 'Velyka Vasylkivska, 16', 'Besarabs''ka area'),
(721, 79, 9.4, 'Andriivs''kyi, 34', 'Central Podil'),
(737, 62, 9, 'Antonovycha, 72/74', 'Olimpiysky area'),
(788, 34, 9.3, 'Mykhailivs''ka, 24V', 'Maydan area'),
(826, 84, 9, 'Mikhalovskaya, 4', 'Besarabs''ka area'),
(921, 119, 9.7, 'Sofiivs''ka, 8', 'Maydan area'),
(926, 62, 10, 'Khreschatyk, 29', 'Besarabs''ka area'),
(988, 36, 9.3, 'Mykhailivs''ka, 24V', 'Maydan area'),
(989, 89, 9.3, 'Saksahanskoho Street, 9', 'Besarabs''ka area'),
(992, 44, 9.1, 'Pushkinska, 25', 'Khreschatyk area'),
(3002, 75, 10, 'Bogdana Khmelnitskogo, 10', 'Khreschatyk area'),
(3003, 99, 10, 'Bogdana Khmelnitskogo, 10', 'Khreschatyk area');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apartment` int(11) NOT NULL,
  `comment` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment` (`apartment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`apartment`) REFERENCES `apts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
