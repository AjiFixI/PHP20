-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3305
-- Время создания: Мар 17 2022 г., 11:29
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `primer_user_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adress` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `adress`, `discription`) VALUES
(1, 'Ведьмина Метла', 'image\\img1.jpg', 'NGC 6960 (Ведьмина Метла)\r\nВ Новом общем каталоге туманностей и звездных скоплений эта туманность получила код NGC 6960, но ее неофициальное название — Ведьмина Метла. Она входит в туманность Вуаль и является одним из осколков звезды в 20 раз больше Солнца, которая взорвалась примерно 8000 лет назад и стала сверхновой.'),
(2, 'Галактика Андромеды', 'image\\img2.jpg', 'Галактика Андромеды\r\nБлижайшая к Млечному Пути крупная галактика — самое далекое из всего, что большинство людей может увидеть невооруженным взглядом. Несмотря на то что Андромеда находится на расстоянии 2,5 млн световых лет от Земли, триллионы ее звезд светят так ярко, что их видно даже нам. '),
(3, 'Млечный Путь', 'image\\img3.jpg', 'Млечный Путь\r\nДо того как итальянский астроном Галилео Галилей 400 лет назад обнаружил, что Млечный Путь состоит из множества звезд, наблюдатели считали, что галактика — это огромное туманно-облачное образование. Еще примерно 300 лет ушло на то, чтобы оспорить утверждение о том, что все звезды Вселенной находятся на Млечном Пути. Сейчас ученые уверены, что наша галактика — одна из 2 триллионов галактик в доступной для наблюдения человеку Вселенной.'),
(4, 'Сатурн', 'image\\img4.jpg', 'Сатурн\r\nНа изображении, сделанном космическим аппаратом Кассини 30 июня 2004 года, видны кольца Сатурна, размер которых варьируется от микрометров до нескольких метров. Они почти полностью состоят из водяного льда с вкраплениями скальных пород.'),
(5, 'Солнце', 'image\\img5.jpg', 'Солнце\r\nПотрясающий ультрафиолетовый снимок Солнца, сделанный Обсерваторией солнечной динамики НАСА 30 марта 2010 года. Ложным цветом на этом снимке показан газ разной температуры. Красный — относительно холодный (около 60 000 К или 107 540 по Фаренгейту); синие и зеленые участки «горячее», их температура превышает 1 млн по Кельвину или 1 799 540 по Фаренгейту. '),
(6, 'Туманность Лисий Мех', 'image\\img6.jpg', 'Туманность Лисий Мех\r\nОфициально это скопление газа и пыли указано под номером 273 в списке туманностей H II, известном под названием «каталог Шарплесса». Ультрафиолетовое излучение от массивных звезд, рождающихся в этой туманности, окрашивает водород в яркие цвета. '),
(7, 'Туманность Орел', 'image\\img7.jpg', 'Туманность Орел\r\nИзображение Столпов творения в туманности Орел, сделанное космическим телескопом Хаббл. Синим цветом на изображении показан кислород, красным —сера, а зеленым — азот и водород. Столпы окружены палящим ультрафиолетовым светом молодых звезд, которые не вошли в кадр. Ветра, дующие с этих звезд, медленно разрушают состоящие из газа и пыли башни.'),
(8, 'Туманность Ориона', 'image\\img8.jpg', 'Туманность Ориона\r\nТуманность Ориона — ближайший к нашей планете регион, где рождаются звезды. В абсолютной темноте она еле заметна у пояса Ориона. На самом деле это чрезвычайно яркая туманность, состоящая из звезд О-образной формы с очень горячим и ярким ядром. '),
(9, 'Туманность Розетка', 'image\\img9.jpg', 'Туманность Розетка\r\nДиаметр этой туманности, представляющей собой газовое облако с недавно родившимися звездами, составляет около 130 световых лет. Ионизированный водород составляет большую часть рассыпанных по небосклону красных перьев, дающих туманности определенные цвет и форму. '),
(10, 'Туманность Тарантул', 'image\\img10.jpg', 'Туманность Тарантул\r\nЭта туманность находится на расстоянии 160 000 световых лет от Земли. Она настолько велика и в ней столько звезд, что если бы она находилась от нашей планеты на том же расстоянии, что и туманность Ориона, то, по мнению астрономов, ее сияние отбрасывало бы тени на Землю.');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(5) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `password`, `rol`) VALUES
(1, 'olga', 'olga@mail.ru', '$2y$10$pVZxvZd2M.7lxvXDAnknC.X2s87jLMG.AUzgFuKStTMfMbukTAN2S', 'user'),
(2, 'admin', 'admin@mail.ru', '$2y$10$k5BBUhfmGHSKl2DoCxGuJOnglU6moz030BsaHgIIlG8P3mBtarXwq', 'admin'),
(3, 'Irina', 'Irina@mail.ru', '$2y$10$UVcD.0vmn7BIZGiGl4pZ8.ScFmfSodqfIr4uLQb0witfl42RB/QfG', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
