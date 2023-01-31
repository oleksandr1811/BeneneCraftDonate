-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2022 г., 18:28
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `donate`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `categ`
--

CREATE TABLE `categ` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categ`
--

INSERT INTO `categ` (`id`, `name`) VALUES
(6, 'Рубли');

-- --------------------------------------------------------

--
-- Структура таблицы `console`
--

CREATE TABLE `console` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `commands` varchar(255) NOT NULL,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `extradition`
--

CREATE TABLE `extradition` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `extradition`
--

INSERT INTO `extradition` (`id`, `ip`, `port`, `pass`, `name`, `server`) VALUES
(5, '65.21.35.175', '2232', 'iLwNo93hunvC36ZySWKEqA6Jx', 'MixPixel', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `cmd` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `surcharge` int(1) NOT NULL DEFAULT 0,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `price`, `cmd`, `category`, `surcharge`, `server`) VALUES
(26, '1 рубль', 1, 'tm add [nick] 1;bungeemessage [nick] 1 random', 'Рубли', 0, 6),
(27, '5 рублей', 5, 'tm add [nick] 5;bungeemessage [nick] 5 random', 'Рубли', 0, 6),
(30, '10 рублей', 10, 'tm add [nick] 10;bungeemessage [nick] 10 random', 'Рубли', 0, 6),
(31, '25 рублей', 25, 'tm add [nick] 25;bungeemessage [nick] 25 random', 'Рубли', 0, 6),
(32, '50 рублей (СКИДКА)', 47, 'tm add [nick] 50;bungeemessage [nick] 50 random', 'Рубли', 0, 6),
(33, '100 рублей (СКИДКА)', 87, 'tm add [nick] 100;bungeemessage [nick] 100 random', 'Рубли', 0, 6),
(34, '250 рублей (СКИДКА)', 220, 'tm add [nick] 250;bungeemessage [nick] 250 random', 'Рубли', 0, 6),
(36, '500 рублей (СКИДКА)', 425, 'tm add [nick] 500;bungeemessage [nick] 500 random', 'Рубли', 0, 6),
(37, '1000 рублей (ВЫБОР ИГРОКОВ) (СКИДКА)', 800, 'tm add [nick] 1000;bungeemessage [nick] 1000 random', 'Рубли', 0, 6),
(39, '2500 рублей (СКИДКА)', 1950, 'tm add [nick] 2500;bungeemessage [nick] 2500 random', 'Рубли', 0, 6),
(40, '5000 рублей (СКИДКА)', 3800, 'tm add [nick] 5000;bungeemessage [nick] 5000 random', 'Рубли', 0, 6),
(43, '10000 рублей (МЕГА ВЫГОДНО)', 7490, 'tm add [nick] 10000;bungeemessage [nick] 10000 random', 'Рубли', 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `group` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `nick` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `profit` int(11) NOT NULL DEFAULT 0,
  `month` int(11) NOT NULL,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `groupid`, `group`, `price`, `nick`, `status`, `date`, `time`, `profit`, `month`, `server`) VALUES
(60, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-24', '21:30:10', 1, 7, 6),
(61, 26, '1 рубль', 1, 'MixStudio', 1, '2021-07-24', '21:31:13', 1, 7, 6),
(62, 26, '1 рубль', 1, 'MixStudio', 0, '2021-07-24', '21:33:31', 0, 7, 6),
(63, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-24', '21:33:42', 0, 7, 6),
(64, 26, '1 рубль', 1, 'MixStudio', 0, '2021-07-24', '21:36:44', 0, 7, 6),
(65, 26, '1 рубль', 1, 'MixStudio', 1, '2021-07-24', '21:38:40', 1, 7, 6),
(66, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-24', '21:48:05', 1, 7, 6),
(67, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-24', '21:49:55', 1, 7, 6),
(68, 26, '1 рубль', 1, 'Semawqe', 0, '2021-07-24', '23:05:01', 0, 7, 6),
(69, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-24', '23:28:06', 0, 7, 6),
(70, 26, '1 рубль', 1, 'Turnel', 0, '2021-07-24', '23:54:18', 0, 7, 6),
(71, 26, '1 рубль', 1, '23', 0, '2021-07-24', '23:59:31', 0, 7, 6),
(72, 26, '1 рубль', 1, '123', 0, '2021-07-25', '11:18:10', 0, 7, 6),
(73, 26, '1 рубль', 1, '123', 0, '2021-07-25', '11:18:26', 0, 7, 6),
(74, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-25', '14:33:24', 0, 7, 6),
(75, 26, '1 рубль', 1, '44', 0, '2021-07-25', '15:53:16', 0, 7, 6),
(76, 26, '1 рубль', 1, '31231212', 0, '2021-07-25', '16:18:10', 0, 7, 6),
(77, 26, '1 рубль', 1, '312', 0, '2021-07-25', '16:18:23', 0, 7, 6),
(78, 26, '1 рубль', 1, 'Паапиис', 0, '2021-07-25', '16:20:50', 0, 7, 6),
(79, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-25', '21:09:10', 0, 7, 6),
(80, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-26', '03:02:52', 0, 7, 6),
(81, 26, '1 рубль', 1, 'Mimi_Auth', 1, '2021-07-26', '05:02:22', 1, 7, 6),
(82, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-26', '06:01:45', 1, 7, 6),
(83, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-26', '06:27:38', 1, 7, 6),
(84, 26, '1 рубль', 1, 'HidensPlay', 1, '2021-07-26', '06:30:40', 1, 7, 6),
(85, 26, '1 рубль', 1, 'ddd', 0, '2021-07-26', '09:55:28', 0, 7, 6),
(86, 26, '1 рубль', 1, 'ddd', 0, '2021-07-26', '09:55:58', 0, 7, 6),
(87, 26, '1 рубль', 1, 'Лллл', 0, '2021-07-26', '12:19:46', 0, 7, 6),
(88, 26, '1 рубль', 1, 'DanyaVolniy', 1, '2021-07-26', '14:37:24', 1, 7, 6),
(89, 26, '1 рубль', 1, 'Max_Wainer', 1, '2021-07-26', '16:48:24', 1, 7, 6),
(90, 26, '1 рубль', 1, 'н', 0, '2021-07-26', '16:52:43', 0, 7, 6),
(91, 26, '1 рубль', 1, 'Maizono_CRnk', 0, '2021-07-26', '20:26:26', 0, 7, 6),
(92, 43, '10000 рублей (МЕГА ВЫГОДНО)', 7490, 'kjkj', 0, '2021-07-27', '12:58:44', 0, 7, 6),
(93, 26, '1 рубль', 1, 'Vozak', 0, '2021-07-27', '15:16:00', 0, 7, 6),
(94, 26, '1 рубль', 1, 'Vozak', 0, '2021-07-27', '15:16:17', 0, 7, 6),
(95, 31, '25 рублей', 25, 'Ijji', 0, '2021-07-27', '17:22:40', 0, 7, 6),
(96, 27, '5 рублей', 5, 'HidensPlay', 0, '2021-07-27', '17:29:02', 0, 7, 6),
(97, 30, '10 рублей', 10, 'Orel31', 0, '2021-07-27', '18:22:57', 0, 7, 6),
(98, 30, '10 рублей', 10, '657567', 0, '2021-07-27', '18:25:04', 0, 7, 6),
(99, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-27', '18:26:00', 0, 7, 6),
(100, 31, '25 рублей', 25, 'HidensPlay', 0, '2021-07-27', '20:25:35', 0, 7, 6),
(101, 31, '25 рублей', 25, 'апрпапр', 0, '2021-07-27', '23:23:22', 0, 7, 6),
(102, 43, '10000 рублей (МЕГА ВЫГОДНО)', 7490, 'grandmemo', 0, '2021-07-28', '00:04:18', 0, 7, 6),
(103, 40, '5000 рублей (СКИДКА)', 3800, 'URA_DIMA_MAKC', 0, '2021-07-28', '07:16:04', 0, 7, 6),
(104, 26, '1 рубль', 1, 'ddsd', 0, '2021-07-28', '23:19:50', 0, 7, 6),
(105, 26, '1 рубль', 1, 'Joehawkk', 0, '2021-07-28', '23:58:57', 0, 7, 6),
(106, 30, '10 рублей', 10, 'Joehawkk', 0, '2021-07-29', '00:01:54', 0, 7, 6),
(107, 30, '10 рублей', 10, 'Joehawkk', 1, '2021-07-29', '00:02:20', 10, 7, 6),
(108, 26, '1 рубль', 1, 'sada', 0, '2021-07-29', '01:34:51', 0, 7, 6),
(109, 26, '1 рубль', 1, 'HidensPlay', 0, '2021-07-29', '01:35:33', 0, 7, 6),
(110, 26, '1 рубль', 1, 'XTRAMRX', 0, '2021-07-29', '02:19:34', 0, 7, 6),
(111, 26, '1 рубль', 1, 'XTRAMRX', 0, '2021-07-29', '02:20:18', 0, 7, 6),
(112, 27, '5 рублей', 5, 'ыфвфы', 0, '2021-07-29', '03:14:12', 0, 7, 6),
(113, 33, '100 рублей (СКИДКА)', 87, 'Joehawkk', 1, '2021-07-29', '14:44:22', 87, 7, 6),
(114, 30, '10 рублей', 10, 'Joehawkk', 1, '2021-07-29', '14:46:18', 10, 7, 6),
(115, 30, '10 рублей', 10, 'Joehawkk', 1, '2021-07-29', '14:50:05', 10, 7, 6),
(116, 30, '10 рублей', 10, 'Joehawkk', 0, '2021-07-29', '15:00:33', 0, 7, 6),
(117, 26, '1 рубль', 1, 'XTRAMRX', 0, '2021-07-29', '20:01:28', 0, 7, 6),
(118, 32, '50 рублей (СКИДКА)', 47, 'dsgsdg', 0, '2021-07-29', '22:48:12', 0, 7, 6),
(119, 26, '1 рубль', 1, 'XTRAMRX', 0, '2021-07-30', '01:38:54', 0, 7, 6),
(120, 31, '25 рублей', 25, 'HidensPlay', 0, '2021-07-31', '02:31:52', 0, 7, 6),
(121, 40, '5000 рублей (СКИДКА)', 3800, 'admin', 0, '2021-08-02', '10:53:36', 0, 8, 6),
(122, 26, '1 рубль', 1, 'ddd', 0, '2021-08-04', '00:45:40', 0, 8, 6),
(123, 26, '1 рубль', 1, 'ddd', 0, '2021-08-04', '00:45:51', 0, 8, 6),
(124, 43, '10000 рублей (МЕГА ВЫГОДНО)', 7490, 'KiponYT', 0, '2021-08-04', '01:13:21', 0, 8, 6),
(125, 43, '10000 рублей (МЕГА ВЫГОДНО)', 7490, 'KiponYT', 0, '2021-08-04', '01:13:39', 0, 8, 6),
(126, 26, '1 рубль', 1, 'Fox', 0, '2021-08-05', '07:49:05', 0, 8, 6),
(127, 27, '5 рублей', 5, 'sada', 0, '2021-08-05', '11:46:26', 0, 8, 6),
(128, 34, '250 рублей (СКИДКА)', 220, 'BonzoCraft', 0, '2021-08-05', '15:45:05', 0, 8, 6),
(129, 36, '500 рублей (СКИДКА)', 425, 'BonzoCraft', 0, '2021-08-05', '15:45:57', 0, 8, 6),
(130, 26, '1 рубль', 1, 'Жвхв', 0, '2021-08-05', '21:48:47', 0, 8, 6),
(131, 39, '2500 рублей (СКИДКА)', 1950, 'makksgam', 0, '2021-08-06', '16:42:52', 0, 8, 6),
(132, 31, '25 рублей', 25, 'gdfgdfgdg', 0, '2021-08-06', '20:07:36', 0, 8, 6),
(133, 34, '250 рублей (СКИДКА)', 220, 'Mail', 0, '2021-08-07', '00:42:22', 0, 8, 6),
(134, 40, '5000 рублей (СКИДКА)', 3800, 'vxcvxc', 0, '2021-08-07', '00:58:31', 0, 8, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `servers`
--

INSERT INTO `servers` (`id`, `name`, `status`) VALUES
(6, 'Общее', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `surcharge`
--

CREATE TABLE `surcharge` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `extradition`
--
ALTER TABLE `extradition`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `surcharge`
--
ALTER TABLE `surcharge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categ`
--
ALTER TABLE `categ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `console`
--
ALTER TABLE `console`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `extradition`
--
ALTER TABLE `extradition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT для таблицы `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `surcharge`
--
ALTER TABLE `surcharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
