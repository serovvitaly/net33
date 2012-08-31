-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 5.0.97.1
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 31.08.2012 11:45:43
-- Версия сервера: 5.1.63-community-log
-- Версия клиента: 4.1

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE net33;

--
-- Описание для таблицы cats
--
DROP TABLE IF EXISTS cats;
CREATE TABLE cats (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 1638
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы goods
--
DROP TABLE IF EXISTS goods;
CREATE TABLE goods (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  articul VARCHAR(255) NOT NULL,
  descript VARCHAR(255) DEFAULT NULL,
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  cat_id INT(11) NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  `show` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE INDEX articul (articul)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы prices
--
DROP TABLE IF EXISTS prices;
CREATE TABLE prices (
  id INT(11) NOT NULL AUTO_INCREMENT,
  good_id INT(11) NOT NULL,
  rule_id INT(11) NOT NULL,
  price DOUBLE NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX UK_prices (good_id, rule_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 49
AVG_ROW_LENGTH = 341
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы rules
--
DROP TABLE IF EXISTS rules;
CREATE TABLE rules (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы cats
--
INSERT INTO cats VALUES 
  (1, 'АРТ ПОСТЕЛЬ'),
  (2, 'АРТ ПОСТЕЛЬКА'),
  (3, 'Сатин'),
  (4, 'Сатин купон'),
  (5, 'Сатин подарок'),
  (6, 'Сатин подарок 2 наволочки'),
  (7, 'Детский сатин'),
  (8, 'Арт постель Премиум'),
  (9, 'Deluxe'),
  (10, 'Зима-Лето');

-- 
-- Вывод данных для таблицы goods
--
INSERT INTO goods VALUES 
  (1, 'КПБ 1,5-спальный', '100', 'Пододеяльник – 215*143; простыня – 214*150; наволочка / 2 шт. - 70*70', '2012-08-31 04:25:50', 1, NULL, 1),
  (2, 'КПБ 1,5-спальный', '102', 'Пододеяльник – 217*143; простыня – 214*150; наволочка / 2 шт. - 70*70', '2012-08-31 04:26:30', 1, NULL, 1),
  (3, 'КПБ 2х-спальный', '104', 'Пододеяльник – 217*180; простыня – 220*185; наволочка / 2 шт. - 70*70', '2012-08-31 04:27:19', 1, NULL, 1),
  (4, 'КПБ 2х-сп. «Евро»', '109', 'Пододеяльник – 217*180; простыня – 220*240; наволочка / 2 шт. - 70*70', '2012-08-31 04:27:57', 1, NULL, 0),
  (5, 'КПБ «Евро»', '114', 'Пододеяльник – 217*200; простыня – 220*240; наволочка / 2 шт. - 70*70', '2012-08-31 04:28:31', 1, NULL, 0),
  (6, 'КПБ «Евро Макси»', '116', 'Пододеяльник – 217*240; простыня – 220*240; наволочка / 2 шт. - 70*70', '2012-08-31 04:29:08', 1, NULL, 0),
  (7, 'КПБ «Семейный»', '120', 'Пододеяльник / 2 шт. – 217*143; простыня – 220*240; наволочка / 2 шт. - 70*70', '2012-08-31 04:29:43', 1, NULL, 0),
  (8, 'КПБ 1,5-спальный', '140', 'Пододеяльник – 215*143; простыня – 214*150; наволочка / 2 шт. - 70*70', '2012-08-31 04:30:12', 1, NULL, 0);

-- 
-- Вывод данных для таблицы prices
--
INSERT INTO prices VALUES 
  (1, 1, 1, 900),
  (2, 1, 2, 830),
  (3, 1, 3, 760),
  (4, 1, 4, 690),
  (5, 1, 5, 620),
  (6, 1, 6, 561),
  (7, 2, 1, 910),
  (8, 2, 2, 840),
  (9, 2, 3, 770),
  (10, 2, 4, 700),
  (11, 2, 5, 630),
  (12, 2, 6, 563),
  (13, 3, 1, 0),
  (14, 3, 2, 0),
  (15, 3, 3, 0),
  (16, 3, 4, 0),
  (17, 3, 5, 0),
  (18, 3, 6, 0),
  (19, 4, 1, 0),
  (20, 4, 2, 0),
  (21, 4, 3, 0),
  (22, 4, 4, 0),
  (23, 4, 5, 0),
  (24, 4, 6, 0),
  (25, 5, 1, 0),
  (26, 5, 2, 0),
  (27, 5, 3, 0),
  (28, 5, 4, 0),
  (29, 5, 5, 0),
  (30, 5, 6, 0),
  (31, 6, 1, 0),
  (32, 6, 2, 0),
  (33, 6, 3, 0),
  (34, 6, 4, 0),
  (35, 6, 5, 0),
  (36, 6, 6, 0),
  (37, 7, 1, 0),
  (38, 7, 2, 0),
  (39, 7, 3, 0),
  (40, 7, 4, 0),
  (41, 7, 5, 0),
  (42, 7, 6, 0),
  (43, 8, 1, 0),
  (44, 8, 2, 0),
  (45, 8, 3, 0),
  (46, 8, 4, 0),
  (47, 8, 5, 0),
  (48, 8, 6, 0);

-- 
-- Вывод данных для таблицы rules
--
INSERT INTO rules VALUES 
  (1, 'до 10 тыс. руб.'),
  (2, 'от 10 тыс. до 20 тыс. руб.'),
  (3, 'от 20 тыс. до 30 тыс. руб.'),
  (4, 'от 30 тыс. до 40 тыс. руб.'),
  (5, 'от 40 тыс. до 50 тыс. руб.'),
  (6, 'от 50 тыс. руб.');

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;