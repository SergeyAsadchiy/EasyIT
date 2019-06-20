-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 12 2019 г., 23:57
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.2.12

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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `price`, `count`) VALUES
(23, 45, 2, 4950, 1),
(25, 45, 4, 1800, 1),
(26, 38, 1, 2340, 1),
(27, 38, 2, 4950, 1),
(29, 38, 16, 17631, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'без категории'),
(2, 'мониторы'),
(3, 'кофеварки'),
(5, 'мебель'),
(6, 'бензопилы'),
(9, 'фотоаппараты'),
(11, 'телевизоры'),
(18, 'смартфоны');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `disc` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `description` text COMMENT 'екуекуеку',
  `category_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `disc`, `img`, `description`, `category_id`) VALUES
(1, 'Монитор', '2600', 10, 10, 'monitor.jpg', 'Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор Монитор  ', 2),
(2, 'Компьютер', '5500', 5, 10, 'computer.jpg', 'Компьютер Компьютер Компьютер Компьютер Компьютер Компьютер Компьютер Компьютер Компьютер ', 1),
(3, 'Ноутбук', '7700', 2, 10, 'notebook.jpg', 'Ноутбук Ноутбук Ноутбук Ноутбук Ноутбук Ноутбук Ноутбук Ноутбук ', 1),
(4, 'Принтер', '1800', 1, 10, 'printer.jpg', 'Принтер Принтер Принтер Принтер Принтер Принтер Принтер Принтер ', 1),
(5, 'Стол', '1100', 0, 20, 'Noimage.png', 'Стол Стол Стол Стол Стол Стол Стол Стол Стол Стол Стол ', 5),
(6, 'Стул', '2200', 0, 20, 'Noimage.png', 'Стул Стул Стул Стул Стул Стул Стул Стул Стул Стул Стул ', 5),
(7, 'Шкаф', '1260', 8, 20, 'wardrobe.jpg', 'Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф Шкаф ', 5),
(8, 'Кресло', '4250', 9, 20, 'armchair.jpg', 'Кресло Кресло Кресло Кресло Кресло Кресло Кресло Кресло Кресло ', 5),
(9, 'Диван', '9800', 1, 30, 'Noimage.png', 'Диван Диван Диван Диван Диван Диван Диван Диван Диван Диван Диван Диван ', 5),
(11, 'Телевизор Sony KDL43WF805BR Black', '17500', 65, 5, '11.jpg', 'Телевизор      Диагональ экрана: 43', 11),
(12, 'Телевизор Sony KD43WF665BR', '13000', 25, 10, 'sony_kd43wf665br_images_10318492587.jpg', '     Диагональ экрана: 43', 11),
(13, 'Телевизор Toshiba 40L2863DG SMART FHD', '7800', 15, 5, 'toshiba_40l2863dg_images_8518719039.jpg', '     Диагональ экрана: 40', 11),
(14, 'Телевизор Sony KD65AF8BR2 Black', '134999', 24, 5, '14.jpg', 'Диагональ экрана: 65', 11),
(15, 'Телевизор Samsung UE43N5000AUXUA', '9000', 15, 5, 'samsung_ue43n5000auxua_images_10317062013.jpg', 'Диагональ экрана: 43', 11),
(16, 'Canon EOS 77D Body Black', '19590', 55, 10, 'canon_1892c020aa_images_2350438097.jpg', 'Матрица CMOS 22.3 x 14.9 мм, 24.2 Мп / поддержка карт памяти SD/SDHC/SDXC / LCD-дисплей 3', 9),
(17, 'Цепная пила Makita EA3203S40B', '6500', 5, 10, 'makita_ea3203s40b_images_6152382056.jpg', 'Тип: Бензиновые     Мощность: 1.9 л.с.     Особенности: Блокировка кнопки включения, Автоматическая смазка цепи, Тормоз цепи     Автоматическая смазка цепи: Есть     Мощность: 1.4 кВт', 6),
(18, 'Кофемашина SAECO Lirika 10004476', '8200', 34, 5, 'saeco_lirika_10004476_images_10438129784.jpg', 'Тип: Кофемашина эспрессо     Тип используемого кофе: Зерновой     Тип управления: Кнопочное     Резервуар для воды: 2.5 л     Цвет: Черный     Дисплей: Есть     Габариты (ВхШхГ): 21.5 х 37 х 42.9 см     Страна регистрации бренда: Италия', 3),
(19, 'Кофемашина SIEMENS TI30A209RW', '13999', 55, 10, 'siemens_ti30a209rw_images_8192880261.jpg', 'Тип: Кофемашина эспрессо     Тип используемого кофе: Зерновой     Тип управления: Сенсорный     Резервуар для воды: 1.4 л     Цвет: Черный     Дисплей: Нет     Габариты (ВхШхГ): 37.8 х 24.7 х 42 см     Страна регистрации бренда: Германия', 3),
(20, ' Кофемашина Philips Series 5000 EP5363/10', '16499', 32, 10, 'philips_ep5363_10_images_5009871328.jpg', '     Тип: Кофемашина эспрессо     Тип используемого кофе: Зерновой, Молотый     Тип управления: Сенсорный     Резервуар для воды: 1.8 л     Цвет: Серебристый     Дисплей: Есть     Габариты (ВхШхГ): 34 x 22.1 x 43 см     Страна регистрации бренда: Нидерланды', 3),
(21, 'Кофемашина Philips 3100 series EP3363/10', '12589', 21, 10, 'saeco_xelsis_ep3363_10_images_2247435696.jpg', 'Тип: Кофемашина эспрессо     Тип используемого кофе: Зерновой, Молотый     Тип управления: Кнопочное     Резервуар для воды: 1.8 л     Цвет: Красный     Дисплей: Есть     Габариты (ВхШхГ): 33х21х43 см     Страна регистрации бренда: Нидерланды', 3),
(22, 'Кофемашина Philips LatteGo Series 5000 EP5330/10', '17300', 22, 10, 'philips_ep5330_10_images_10782297867.jpg', 'Тип: Кофемашина эспрессо     Тип используемого кофе: Зерновой, Молотый     Тип управления: Кнопочное     Резервуар для воды: 1.8 л     Цвет: Черный / Хром     Дисплей: Есть     Габариты (ВхШхГ): 34 х 22.1 х 43 см     Страна регистрации бренда: Нидерланды', 3),
(23, 'Кофеварка эспрессо POLARIS PCM 1516E Adore Crema', '3599', 22, 2, '9962117_images_10199987133.jpg', '     Тип: Эспрессо рожковая     Тип используемого кофе: Молотый     Тип управления: Кнопочное     Резервуар для воды: 1.2 л     Цвет: Красный     Дисплей: Нет     Габариты (ВхШхГ): 34 х 21 х 32 см     Страна регистрации бренда: США', 3),
(24, ' Смартфон Samsung Galaxy A7', '5555', 22, 2, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(25, ' Смартфон Samsung Galaxy A8', '5556', 22, 1, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(26, ' Смартфон Samsung Galaxy A9', '5557', 23, 1, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(27, ' Смартфон Samsung Galaxy A10', '5558', 234, 2, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(28, ' Смартфон Samsung Galaxy A11', '5559', 22, 1, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(29, ' Смартфон Samsung Galaxy A12', '5510', 25, 1, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18),
(30, ' Смартфон Samsung Galaxy A15', '5555', 222, 2, 'phone.jpg', ' Смартфон Samsung Galaxy A7 2018 Pink (SM-A750FZIUSEK)', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` varchar(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'noavatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `avatar`) VALUES
(1, 'qwerty', 'qwerty@mail.ru', '7694f4a66316e53c8cdd9d9954bd611d', '', '1.jpg'),
(38, 'sergey', 'sergey@gmail.com', '202cb962ac59075b964b07152d234b70', 'yes', '38.jpg'),
(40, 'qq', 'qq', '099b3b060154898840f0ebdfb46ec78f', '', 'noavatar.jpg'),
(41, 'user', 'user@user.us', '15de21c670ae7c3f6f3f1f37029303c9', '', '41.jpg'),
(42, '1', '11', 'c4ca4238a0b923820dcc509a6f75849b', '', '42.jpg'),
(43, 'qwertyuiop', 'q', '7694f4a66316e53c8cdd9d9954bd611d', '', 'noavatar.jpg'),
(44, 'sergey', 'sergey@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'noavatar.jpg'),
(45, '111', '111', '698d51a19d8a121ce581499d7b701668', '', '45.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
