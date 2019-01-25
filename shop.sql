-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 25 2019 г., 19:17
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `disc` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `disc`, `img`) VALUES
(1, 'Монитор', '1200', 5, 10, 'assets/images/monitor.jpeg'),
(2, 'Компьютер', '4200', 7, 10, 'assets/images/computer.jpg'),
(3, 'Ноутбук', '7700', 2, 10, 'assets/images/notebook.jpg'),
(4, 'Принтер', '1800', 1, 10, 'assets/images/printer.jpg'),
(5, 'Стол', '1100', 0, 20, ''),
(6, 'Стул', '2200', 0, 20, ''),
(7, 'Шкаф', '1260', 8, 20, 'assets/images/wardrobe.jpg'),
(8, 'Кресло', '4250', 9, 20, 'assets/images/armchair.jpg'),
(9, 'Диван', '9800', 1, 30, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `avatar`) VALUES
(9, 'sergey', 'sergey@gmail.com', '202cb962ac59075b964b07152d234b70', 0, ''),
(16, 'qwerty', 'qwerty@mail.ru', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, ''),
(17, 'admin', 'admin@ukr.net', '21232f297a57a5a743894a0e4a801fc3', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
