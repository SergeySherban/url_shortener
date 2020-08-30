-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 30 2020 г., 16:13
-- Версия сервера: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_work`
--

-- --------------------------------------------------------

--
-- Структура таблицы `short_url`
--

CREATE TABLE `short_url` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `expiration` datetime DEFAULT NULL,
  `count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `short_url`
--

INSERT INTO `short_url` (`id`, `url`, `code`, `created`, `expiration`, `count`) VALUES
(12, 'https://www.php.net/', 'r5uafk', '2020-08-29 15:43:33', '2020-11-22 00:00:00', 17),
(13, 'https://www.youtube.com/', 'clscym', '2020-08-29 15:55:22', '2020-09-26 00:00:00', 8),
(16, 'https://mail.google.com/', '2n1o69', '2020-08-29 17:05:03', '0000-00-00 00:00:00', 5),
(26, 'https://coderoad.ru/', '2mfadn', '2020-08-30 15:27:20', '2020-09-20 00:00:00', 3),
(27, 'https://javascript.ru/', 'xyzy69', '2020-08-30 16:01:52', '2020-09-30 00:00:00', 1),
(28, 'https://translate.google.ru/', '52omab', '2020-08-30 16:02:55', '2020-08-29 00:00:00', 0),
(29, 'https://github.com/SergeySherban/', '5804l5', '2020-08-30 16:06:21', '0000-00-00 00:00:00', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `short_url`
--
ALTER TABLE `short_url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `short_url`
--
ALTER TABLE `short_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
