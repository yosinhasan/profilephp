-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 07 2015 г., 11:59
-- Версия сервера: 5.6.25-0ubuntu0.15.04.1
-- Версия PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yosinhasan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `city_name` varchar(60) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `id_country`) VALUES
(1, 'Berlin', 1),
(2, 'Munich', 1),
(3, 'Magdeburg', 1),
(4, 'Cologne', 1),
(5, 'Hamburg', 1),
(6, 'Dresden', 1),
(7, ' Bonn', 1),
(8, 'Dortmund', 1),
(9, 'Kiev', 2),
(10, 'Kharkiv', 2),
(11, 'Dnepr', 2),
(12, 'Lviv', 2),
(13, 'Odessa', 2),
(14, 'Donetsk', 2),
(15, 'Luhansk', 2),
(16, 'Moscow', 3),
(17, 'St. Peterburg', 3),
(18, 'Ekaterinburg', 3),
(19, 'Voronezh', 3),
(20, 'Sochi', 3),
(21, 'Kaliningrad', 3),
(22, 'Minsk', 4),
(23, 'Gomel', 4),
(24, 'Slutsk', 4),
(25, 'Vitebsk', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Germany'),
(2, 'Ukraine'),
(3, 'Russia'),
(4, 'Belarus');

-- --------------------------------------------------------

--
-- Структура таблицы `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `invite` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date_status` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `invites`
--

INSERT INTO `invites` (`invite`, `status`, `date_status`) VALUES
(100000, 0, NULL),
(111111, 0, NULL),
(111112, 0, NULL),
(111113, 0, NULL),
(111114, 0, NULL),
(111444, 1, '2015-09-06'),
(123456, 1, '2015-09-06'),
(333333, 0, NULL),
(333423, 1, '2015-09-06'),
(543623, 0, NULL),
(923456, 1, '2015-09-06');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `invite` int(11) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `id_city`, `invite`, `firstName`, `lastName`) VALUES
(3, 'yosinhasan@gmail.com', '577db8663c79f1b770169bc9e00f5ce2', '380938213009', 1, 123456, 'Yosin', 'Hasan'),
(8, 'yoser2@gmail.com', 'e11170b8cbd2d74102651cb967fa28e5', '380938213000', 1, 923456, 'hello', 'world'),
(11, 'ya@com.cc', '4168b45d97e5be3b9a5b2ea96f55c34c', '380938213001', 2, 333423, 'newUser', 'newUser'),
(12, 'muhsin_93@mail.ru', 'a37cc03e6c6ac6d776d036bde5805bc3', '380938213002', 3, 111444, 'helloD', 'Maksim');

-- --------------------------------------------------------

--
-- Структура таблицы `user_img`
--

CREATE TABLE IF NOT EXISTS `user_img` (
`id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cities_1_idx` (`id_country`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `invites`
--
ALTER TABLE `invites`
 ADD PRIMARY KEY (`invite`), ADD UNIQUE KEY `invite` (`invite`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login_UNIQUE` (`email`), ADD KEY `fk_users_1_idx` (`id_city`), ADD KEY `fk_users_2_idx` (`invite`);

--
-- Индексы таблицы `user_img`
--
ALTER TABLE `user_img`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_user_img_1_idx` (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user_img`
--
ALTER TABLE `user_img`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `fk_cities_1` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_1` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_2` FOREIGN KEY (`invite`) REFERENCES `invites` (`invite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_img`
--
ALTER TABLE `user_img`
ADD CONSTRAINT `fk_user_img_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
