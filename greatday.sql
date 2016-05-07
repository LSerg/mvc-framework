-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 07 2016 г., 14:44
-- Версия сервера: 5.6.26
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `greatday`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `image`, `sort`) VALUES
(1, 0, 'Ноутбуки', 'laptops.gif', 1),
(2, 0, 'Книги', 'books.jpg', 6),
(3, 0, 'Мобильные телефоны', 'mobile-phones.jpg', 2),
(4, 2, 'PHP', 'php.png', 5),
(5, 2, 'Java', 'java.png', 5),
(6, 2, 'Python', 'python.png', 5),
(7, 0, 'Планшеты', 'tabletpc.jpg', 3),
(8, 0, 'Электронные книги', 'ebook.jpg', 5),
(9, 0, 'Оргтехника', 'orgtech.jpg', 4),
(10, 0, 'Смарт-часы', 'smartwatch.jpg', 6),
(11, 0, 'Программное обеспечение', 'software.png', 7),
(12, 0, 'Сетевое оборудование', 'network.jpg', 8),
(13, 4, 'OOP', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(1, 'koala.jpg'),
(2, 'desert.jpg'),
(3, 'hydrangeas.jpg'),
(4, 'jellyfish.jpg'),
(5, 'penguins.jpg'),
(6, 'tulips.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(1, 'about', 'About us', 'About us content goes here', 1),
(2, 'products', 'Our products', 'Products content goes here', 1),
(3, 'services', 'Our services', 'Here goes our services content', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `alias`, `name`, `description`, `image`, `price`) VALUES
(1, 'sony-vaio-fit-multi-flip', 'Sony VAIO Fit Multi-Flip', 'Ультрабук • 2-в-1 трансформер • 13,3" • IPS • 1920x1080 • Intel Core i5-4200U • 1,6 ГГц • ОЗУ: 8 ГБ • Intel HD graphics 4400 • SSD: 128 ГБ • 1,31 кг • ОС: Windows 8.1 64-bit ', 'sony-vaio-fit-multi-flip.jpg', 999),
(2, 'phpbook', 'PHP: объекты, шаблоны и методики программирования', 'Четвертое издание книги было пересмотрено и дополнено новым материалом. Книга начинается с обзора объектно-ориентированных возможностей PHP, в который включены важные темы, такие как определение классов, наследование, инкапсуляция, рефлексия и многое другое. Этот материал закладывает основы объектно-ориентированного проектирования и программирования на PHP. Вы изучите также некоторые основополагающие принципы проектирования. В этом издании книги также описаны возможности, появившиеся в PHP версии 5.4, такие как трейты, дополнительные расширения на основе рефлексии, уточнения типов параметров методов, улучшенная обработка исключений и много других мелких расширений языка.', 'phpbook.jpg', 49),
(3, 'jellyfish', 'Product 3', 'This is product 3 Description', 'jellyfish.jpg', 179),
(4, 'dell-vostro-3558', 'Dell Vostro 3558', 'Ноутбук • Классический • 15,6" • TN+film • 1366x768 • Intel Core i5-5250U • 1.6-2.7 ГГц • ОЗУ: 4 ГБ • Intel HD Graphics 6000 • HDD: 500 ГБ • 2,24 кг • ОС: Linux ', 'dell-vostro.jpg', 599),
(5, 'apple-macbook-pro-13', 'Apple MacBook Pro 13"', 'Apple MacBook Pro 13" with Retina display 2015 разработан для тех, кому важны внешняя привлекательность рабочего инструмента и по совместительству развлекательного устройства, высокая производительность и автономность, наличие всевозможных приятных дополнений в виде подсветки клавиатуры, портов HDMI и Thunderbolt, кардридера и прочего. Полуторакилограммовый ноутбук облачен в алюминиевый корпус с габаритами 314x219x18 мм. Он несет на своем борту процессор семейства Intel Core, имеет более чем приемлемый объем оперативной и постоянной памяти. Его беспроводные возможности реализованы благодаря модулям Wi-Fi и Bluetooth. IPS-дисплей Apple MacBook Pro 13" with Retina display 2015 при диагонали 13,3 дюйма обладает разрешающей способностью 2560x1600 пикселей. Воспроизводимая картинка под любым углом просмотра всегда будет радовать своей реалистичностью, четкостью и насыщенностью.', 'apple-macbook-pro-13.jpg', 999);

-- --------------------------------------------------------

--
-- Структура таблицы `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 13),
(3, 3, 3),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `text`, `date`) VALUES
(1, 'Test Comment', 'Test message', '2016-04-27 16:11:23'),
(2, 'Тест на русском', '\r\n\r\n', '2016-04-27 16:17:32'),
(3, '123', '123', '2016-05-03 18:15:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
