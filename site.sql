-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 13 2018 г., 15:35
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `class`) VALUES
(1, 'ПИ I-1б'),
(2, 'ПИ II-1б'),
(3, 'ПИ III-1б'),
(4, 'ПИ IV-1б');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `login`, `password`) VALUES
(1, 'req@gmail.com', '$2y$10$tdYhAEx8NhgBX.QSiNiZAObwcq2VAMjSfZ2dLx.9oOb9qUk84JMCK'),
(2, 'lolik', '$2y$10$/5K4pH1GZWmJsViV5Z57UOkOZElo5DDqQ7rDHH7vCl/yuBe6dg4j2'),
(3, 'kto-to', '$2y$10$oNe3KAj02vFlRq9/JhqZPOY75da7qKFX49AsXiypu/c1/03CmkY66');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `title`, `quantity`) VALUES
(1, 'Интеллектуальные информационные системы', 35),
(2, 'Геоинформационные технологии сбора картографо-геодезической информации', 30),
(3, 'Базы данных', 40),
(4, 'Проектирование информационных систем', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `tests_classes`
--

CREATE TABLE `tests_classes` (
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tests_classes`
--

INSERT INTO `tests_classes` (`test_id`, `class_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(3, 3),
(4, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests_classes`
--
ALTER TABLE `tests_classes`
  ADD PRIMARY KEY (`test_id`,`class_id`),
  ADD KEY `class_id` (`class_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tests_classes`
--
ALTER TABLE `tests_classes`
  ADD CONSTRAINT `tests_classes_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tests_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
