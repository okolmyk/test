-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 08 2017 г., 11:27
-- Версия сервера: 5.7.19-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my`
--

-- --------------------------------------------------------

--
-- Структура таблицы `my_artists`
--

CREATE TABLE `my_artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_artists`
--

INSERT INTO `my_artists` (`id`, `name`, `last_name`) VALUES
(1, 'Ivan', 'Ivanov'),
(2, 'Petr', 'Petrov'),
(3, 'Nikolai', 'Sidorov'),
(4, 'Viktor', 'Mixailov');

-- --------------------------------------------------------

--
-- Структура таблицы `my_concert_place`
--

CREATE TABLE `my_concert_place` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_concert_place`
--

INSERT INTO `my_concert_place` (`id`, `city`) VALUES
(1, 'kharkov'),
(2, 'kiev'),
(3, 'moscow'),
(4, 'paris');

-- --------------------------------------------------------

--
-- Структура таблицы `my_date`
--

CREATE TABLE `my_date` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `artist_id` int(11) NOT NULL,
  `concert_place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_date`
--

INSERT INTO `my_date` (`id`, `date`, `artist_id`, `concert_place_id`) VALUES
(1, '2017-10-19 00:00:00', 2, 2),
(2, '2017-09-12 00:00:00', 4, 3),
(3, '2017-09-20 00:00:00', 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `my_migration`
--

CREATE TABLE `my_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_migration`
--

INSERT INTO `my_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1489509057),
('m170314_163640_my_artists', 1489514580),
('m170314_163715_my_concert_place', 1489514597),
('m170314_163810_my_date', 1489514618),
('m170314_181053_my_admin', 1489515603),
('m170315_075149_my_users', 1489564634),
('m170315_092202_my_users', 1489569799),
('m170315_101810_my_users', 1489573269),
('m170315_124129_my_users_insert_superadmin', 1489581901);

-- --------------------------------------------------------

--
-- Структура таблицы `my_users`
--

CREATE TABLE `my_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` int(11) DEFAULT NULL,
  `access_token` int(11) DEFAULT NULL,
  `adminGroup` enum('superadmin','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `my_users`
--

INSERT INTO `my_users` (`id`, `username`, `last_name`, `password`, `auth_key`, `access_token`, `adminGroup`) VALUES
(4, 'superadmin', 'superadmin', '123456', 123456, 123456, 'superadmin'),
(5, 'admin', 'admin', '654321', 654321, 654321, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `my_artists`
--
ALTER TABLE `my_artists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `my_concert_place`
--
ALTER TABLE `my_concert_place`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `my_date`
--
ALTER TABLE `my_date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-date-artists` (`artist_id`),
  ADD KEY `fk-date-concert_place` (`concert_place_id`);

--
-- Индексы таблицы `my_migration`
--
ALTER TABLE `my_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `my_artists`
--
ALTER TABLE `my_artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `my_concert_place`
--
ALTER TABLE `my_concert_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `my_date`
--
ALTER TABLE `my_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `my_users`
--
ALTER TABLE `my_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `my_date`
--
ALTER TABLE `my_date`
  ADD CONSTRAINT `fk-date-artists` FOREIGN KEY (`artist_id`) REFERENCES `my_artists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-date-concert_place` FOREIGN KEY (`concert_place_id`) REFERENCES `my_concert_place` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
