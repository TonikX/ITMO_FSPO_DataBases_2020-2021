-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 14 2021 г., 02:43
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `second_name` varchar(45) NOT NULL,
  `third_name` varchar(45) DEFAULT NULL,
  `passport_data` varchar(45) NOT NULL,
  `contract_data` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `agent`
--

INSERT INTO `agent` (`id`, `first_name`, `second_name`, `third_name`, `passport_data`, `contract_data`) VALUES
(1, 'Сергей', 'Соловьев', 'Андреевич', '8765777463', '78423332'),
(2, 'Дмитрий', 'Кузнецов', 'Александрович', '7685368564', '65843575'),
(3, 'Даниил', 'Земский', NULL, '5647385746', '96758434');

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `cooperator` int(11) NOT NULL,
  `agent` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `cooperator_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`id`, `payment`, `cooperator`, `agent`, `created_at`, `start_date`, `finish_date`, `cooperator_id`, `agent_id`) VALUES
(1, 100, 11007, 988811, '2021-06-01 03:37:49', '2021-06-03 03:37:49', '2021-06-05 03:37:49', 1, 1),
(2, 9001, 88917, 121, '2021-06-10 03:37:49', '2021-06-12 03:37:49', '2021-06-23 03:37:49', 2, 2),
(3, 7990, 77656, 9322, '2021-05-03 03:37:49', '2021-06-17 03:37:49', '2021-06-30 03:37:49', 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contracts` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `contract_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contracts`
--

INSERT INTO `contracts` (`id`, `contracts`, `created_at`, `start_date`, `finish_date`, `contract_id`) VALUES
(1, 97668, '2021-06-01 03:37:49', '2021-06-12 03:37:49', '2021-06-30 03:37:49', 1),
(2, 65777, '2021-06-24 19:07:11', '2021-06-25 19:07:11', '2021-06-26 19:07:11', 2),
(3, 23422, '2021-06-01 19:07:11', '2021-06-02 19:07:11', '2021-06-03 19:07:11', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `cooperator`
--

CREATE TABLE `cooperator` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `second_name` varchar(45) NOT NULL,
  `third_name` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `risk` varchar(45) NOT NULL,
  `payments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cooperator`
--

INSERT INTO `cooperator` (`id`, `first_name`, `second_name`, `third_name`, `age`, `risk`, `payments_id`) VALUES
(1, 'Сергей', 'Дмитриев', 'Александрович', 25, 'one', 1),
(2, 'Святослав', 'Арториасович', NULL, 34, 'two', 2),
(3, 'Даня', 'Савельев', 'Таркович', NULL, 'three', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `contract` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `short_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `bank_sum` int(11) DEFAULT NULL,
  `specialization` varchar(45) NOT NULL,
  `contracts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organization`
--

INSERT INTO `organization` (`id`, `contract`, `code`, `full_name`, `short_name`, `address`, `bank_sum`, `specialization`, `contracts_id`) VALUES
(1, 75764, 6574, 'Никита Власов Витальевич', 'Никита В.В.', 'Среднерогатская улица', 8905, 'Ракетостроение', 1),
(2, 351312, 1121, 'Максим Коротонов Евгеньевич', 'Коротонов К.Е.', 'Кожемятинская улица', 12939, 'Менеджмент', 2),
(3, 99982, 8778, 'Виталий Солнцев Антонович', 'Солнцев В.А.', 'Ленинский проспект', 19230, 'Ракетостроение', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `insurnance_case` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `insurnance_case`, `value`) VALUES
(1, 11, 1000),
(2, 12, 95777),
(3, 13, 656547);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contract_cooperator1_idx` (`cooperator_id`),
  ADD KEY `fk_contract_agent1_idx` (`agent_id`);

--
-- Индексы таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_contracts_contract_idx` (`contract_id`);

--
-- Индексы таблицы `cooperator`
--
ALTER TABLE `cooperator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_cooperator_payments1_idx` (`payments_id`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `fk_organization_contracts1_idx` (`contracts_id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `fk_contract_agent1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contract_cooperator1` FOREIGN KEY (`cooperator_id`) REFERENCES `cooperator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_contracts_contract` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `cooperator`
--
ALTER TABLE `cooperator`
  ADD CONSTRAINT `fk_cooperator_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `fk_organization_contracts1` FOREIGN KEY (`contracts_id`) REFERENCES `contracts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
