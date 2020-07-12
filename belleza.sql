-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2020 a las 05:20:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `belleza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `description`, `color`, `textColor`, `start`, `end`) VALUES
(1, 'Servicio Domicilio(1023)', 'Mantenimiento de uñas, Depilación, Secado de Cabello', 'grey', 'blue ', '2020-07-08 09:00:00', '2020-07-08 11:00:00'),
(2, 'Servicio Prueba 1', 'Solo es una Prueba', 'grey', 'red', '2010-07-12 09:00:00', '2010-07-12 10:00:00'),
(3, 'Servicio (10232)', 'Solo es una Prueba', 'grey', 'red', '2010-07-13 13:00:00', '2010-07-13 14:00:00'),
(4, 'Servicio', '0', 'grey', 'blue', '2020-07-10 10:00:00', '2020-07-10 10:00:00'),
(5, 'Servicio', 'Secado de Cabello largo, Pedicure y Limpieza, Cejas Deliniadas, ', 'grey', 'blue', '2020-07-11 10:00:00', '2020-07-11 10:00:00'),
(6, 'Servicio', 'Secado de Cabello largo, Pedicure y Limpieza, Cejas Deliniadas, Pestañas Pelo a Pelo, ', 'grey', 'blue', '2020-07-10 14:00:00', '2020-07-10 14:00:00'),
(7, 'Servicio', 'Secado de Cabello largo, Pedicure y Limpieza, Cejas Deliniadas, Pestañas Pelo a Pelo, Uñas Acrilicas, ', 'grey', 'blue', '2020-07-15 16:00:00', '2020-07-15 16:00:00'),
(8, 'Domicilo (24)', 'Secado de Cabello largo, Pedicure y Limpieza, Cejas Deliniadas, Pestañas Pelo a Pelo, Uñas Acrilicas, ', 'grey', 'blue', '2020-07-13 09:00:00', '2020-07-13 09:00:00'),
(9, 'Servicio', 'Tinte de Cabello, Cejas Deliniadas, ', 'grey', 'blue', '2020-07-12 14:30:00', '2020-07-12 14:30:00'),
(10, 'Servicio', 'Tinte de Cabello, Cejas Deliniadas, ', 'grey', 'blue', '2020-07-12 14:50:00', '2020-07-12 14:50:00'),
(11, 'Servicio', 'Tinte de Cabello, Cejas Deliniadas, ', 'grey', 'blue', '2020-07-12 14:00:00', '2020-07-12 14:00:00'),
(12, 'Servicio', 'Tinte de Cabello, Cejas Deliniadas, ', '#4d4c4c', '#312b2e', '2020-07-14 15:20:00', '2020-07-14 15:20:00'),
(13, 'Servicio', 'Tinte de Cabello, Cejas Deliniadas, ', 'grey', 'blue', '2020-07-14 15:20:00', '2020-07-14 15:20:00'),
(14, 'Domicilio (29)-', 'Tinte de Cabello, Cejas Deliniadas, ', '#767972', '#5a585a', '2020-07-06 18:00:00', '2020-07-06 18:00:00'),
(15, 'Domicilio (30)', 'Corte de Cabello, ', '#56d5e6', '#000000', '2020-07-11 14:00:00', '2020-07-11 14:00:00'),
(16, 'Domicilio (31)', 'Corte de Cabello, Pedicure y Limpieza, Semi Permanente, ', 'grey', 'blue', '2020-07-09 11:00:00', '2020-07-09 11:00:00'),
(17, 'Domicilio (32)', 'Secado de Cabello largo, ', '#65bfe6', '#000000', '2020-07-12 15:00:00', '2020-07-12 15:00:00'),
(18, 'Domicilio (33)', 'Semi Permanente, ', 'grey', 'blue', '2020-07-10 08:00:00', '2020-07-10 08:00:00'),
(19, 'Domicilio (34)', 'Tinte de Cabello, Cejas Deliniadas, Uñas Asiaticas, ', '#60d3f0', '#000000', '2020-07-12 10:00:00', '2020-07-12 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_orden`
--

CREATE TABLE `evento_orden` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento_orden`
--

INSERT INTO `evento_orden` (`id`, `id_evento`, `id_order`) VALUES
(6, 12, 24),
(7, 14, 29),
(8, 15, 30),
(9, 16, 31),
(10, 17, 32),
(11, 18, 33),
(12, 19, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `human_dody_parts`
--

CREATE TABLE `human_dody_parts` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `human_dody_parts`
--

INSERT INTO `human_dody_parts` (`id`, `name`, `description`, `image`) VALUES
(1, 'Cabello', 'Area Cabelluda  de la Cabeza', 'c:/Cabello.jpg'),
(2, 'Pies', 'Pies Piernas y demas', 'c:/pies_1.jpg'),
(3, 'Rostro', 'Area Faciel de la Cabeza', 'c:/cabezaRostro.jpg'),
(5, 'Manos', 'Extremidad Superior donde se aplican los Servicios en Dedos, Brazos y Antebrazos..', 'manos1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `key_transaction` varchar(250) NOT NULL,
  `paypal_data` text NOT NULL,
  `status` varchar(128) NOT NULL,
  `total_price` float NOT NULL,
  `total_time` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `id_client`, `key_transaction`, `paypal_data`, `status`, `total_price`, `total_time`, `created`, `updated`) VALUES
(10, 19, 'r8kthetr0668jbpl72iujspn2k', '', 'pendiente', 165000, 130, '2020-06-29 06:04:28', '2020-06-29 06:04:28'),
(11, 20, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:12:29', '2020-07-02 03:12:29'),
(12, 21, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:26:13', '2020-07-02 03:26:13'),
(13, 22, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:31:18', '2020-07-02 03:31:18'),
(14, 23, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:31:47', '2020-07-02 03:31:47'),
(15, 24, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:38:51', '2020-07-02 03:38:51'),
(16, 25, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 03:45:49', '2020-07-02 03:45:49'),
(17, 26, '10he5rq0t9md2lviqbk92g6r2a', '', 'pendiente', 95000, 35, '2020-07-02 04:15:52', '2020-07-02 04:15:52'),
(18, 27, '3g9jhcjblt7tkjvt13mg98ufr3', '', 'pendiente', 95000, 45, '2020-07-02 04:19:13', '2020-07-02 04:19:13'),
(19, 28, '3g9jhcjblt7tkjvt13mg98ufr3', '', 'pendiente', 95000, 45, '2020-07-02 04:23:06', '2020-07-02 04:23:06'),
(20, 29, '3g9jhcjblt7tkjvt13mg98ufr3', '', 'pendiente', 95000, 45, '2020-07-02 04:24:40', '2020-07-02 04:24:40'),
(21, 30, 'ms08kq23kn84n2lpu9m1uc5mnt', '', 'pendiente', 62950, 45, '2020-07-03 23:33:51', '2020-07-03 23:33:51'),
(22, 31, 'f26tva5657pq0oei7i9osmt2k9', '', 'pendiente', 140950, 198, '2020-07-04 05:44:46', '2020-07-04 05:44:46'),
(24, 36, 'sjhnc60b8d5eesqtc4rioj8bbj', '', 'pendiente', 248950, 253, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(29, 42, 'v490cf8er78phq2vf4qgnmb871', '', 'pendiente', 103000, 70, '2020-07-08 23:24:34', '2020-07-08 23:24:34'),
(30, 43, 'jobj49t2hb20bo9o7v5ni8pi26', '', 'pendiente', 95000, 70, '2020-07-08 23:40:12', '2020-07-08 23:40:12'),
(31, 44, 'rbrd9qnij8i8qh2oi9c6qp1if0', '', 'pendiente', 178000, 148, '2020-07-08 23:53:08', '2020-07-08 23:53:08'),
(32, 45, 'kumr2cscrn44s5isr8kp18rs1d', '', 'pendiente', 62950, 45, '2020-07-09 00:22:48', '2020-07-09 00:22:48'),
(33, 46, '6mp7r9s1lqglkb794qi39m4e2b', '', 'pendiente', 65000, 45, '2020-07-09 20:20:44', '2020-07-09 20:20:44'),
(34, 47, 'h3ovkgr1ar37s0cq4lshrnsqs7', '', 'pendiente', 178000, 105, '2020-07-11 01:47:02', '2020-07-11 01:47:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_price` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `total_time` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_services`, `quantity`, `price`, `total_price`, `time`, `total_time`, `created`, `updated`) VALUES
(1, 10, 3, 1, 60000, 60000, 40, 40, '2020-06-29 06:04:28', '2020-06-29 06:04:28'),
(2, 10, 5, 1, 95000, 95000, 70, 70, '2020-06-29 06:04:28', '2020-06-29 06:04:28'),
(3, 10, 1, 1, 10000, 10000, 20, 20, '2020-06-29 06:04:28', '2020-06-29 06:04:28'),
(11, 18, 18, 1, 95000, 95000, 45, 45, '2020-07-02 04:19:13', '2020-07-02 04:19:13'),
(12, 19, 18, 1, 95000, 95000, 45, 45, '2020-07-02 04:23:07', '2020-07-02 04:23:07'),
(13, 20, 18, 1, 95000, 95000, 45, 45, '2020-07-02 04:24:40', '2020-07-02 04:24:40'),
(14, 21, 3, 1, 62950, 62950, 45, 45, '2020-07-03 23:33:51', '2020-07-03 23:33:51'),
(15, 22, 3, 1, 62950, 62950, 45, 45, '2020-07-04 05:44:46', '2020-07-04 05:44:46'),
(16, 22, 1, 1, 18000, 18000, 33, 33, '2020-07-04 05:44:46', '2020-07-04 05:44:46'),
(17, 22, 20, 1, 60000, 60000, 120, 120, '2020-07-04 05:44:46', '2020-07-04 05:44:46'),
(18, 24, 3, 1, 62950, 62950, 45, 45, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(19, 24, 1, 1, 18000, 18000, 33, 33, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(20, 24, 2, 1, 13000, 13000, 10, 10, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(21, 24, 18, 1, 95000, 95000, 45, 45, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(22, 24, 20, 1, 60000, 60000, 120, 120, '2020-07-08 21:25:19', '2020-07-08 21:25:19'),
(23, 29, 4, 1, 90000, 90000, 60, 60, '2020-07-08 23:24:34', '2020-07-08 23:24:34'),
(24, 29, 2, 1, 13000, 13000, 10, 10, '2020-07-08 23:24:34', '2020-07-08 23:24:34'),
(25, 30, 5, 1, 95000, 95000, 70, 70, '2020-07-08 23:40:12', '2020-07-08 23:40:12'),
(26, 31, 5, 1, 95000, 95000, 70, 70, '2020-07-08 23:53:08', '2020-07-08 23:53:08'),
(27, 31, 1, 1, 18000, 18000, 33, 33, '2020-07-08 23:53:08', '2020-07-08 23:53:08'),
(28, 31, 19, 1, 65000, 65000, 45, 45, '2020-07-08 23:53:08', '2020-07-08 23:53:08'),
(29, 32, 3, 1, 62950, 62950, 45, 45, '2020-07-09 00:22:49', '2020-07-09 00:22:49'),
(30, 33, 19, 1, 65000, 65000, 45, 45, '2020-07-09 20:20:45', '2020-07-09 20:20:45'),
(31, 34, 4, 1, 90000, 90000, 60, 60, '2020-07-11 01:47:03', '2020-07-11 01:47:03'),
(32, 34, 2, 1, 13000, 13000, 10, 10, '2020-07-11 01:47:03', '2020-07-11 01:47:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `id_body_parts` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `promotion` varchar(5) NOT NULL,
  `description` varchar(280) NOT NULL,
  `price` float NOT NULL,
  `time` int(11) NOT NULL COMMENT 'Tiempo en Minutos',
  `image` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Beauty Services';

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `id_body_parts`, `name`, `promotion`, `description`, `price`, `time`, `image`, `image_two`, `created`, `updated`) VALUES
(1, 2, 'Pedicure y Limpieza', 'No', 'Limpieza de Uñas y Pesuñas en Patas', 18000, 33, 'pedicure1.jpg', 'pedicure2.jpg', '2020-06-13 22:41:06', '2020-07-03 06:31:26'),
(2, 3, 'Cejas Deliniadas', 'No', 'Retirar los Bellos con Cera u hojilla', 13000, 10, 'cejasDelineadas1.jpg', 'cejasDelineadas2.jpg', '2020-06-13 23:14:58', '2020-06-13 23:14:58'),
(3, 1, 'Secado de Cabello largo', 'No', 'Lavaso Secado Corte y mantenimiento del Cabello largo', 62950, 45, 'secadoDeCabello.jpg', 'Salon1.jpg', '2020-06-14 06:48:12', '2020-07-04 05:38:21'),
(4, 1, 'Tinte de Cabello', 'No', 'Secado Corte y mantenimiento del Cabello largo', 90000, 60, 'TinteDeCabello.jpg', 'Salon1.jpg', '2020-06-14 06:56:51', '2020-06-14 06:56:51'),
(5, 1, 'Corte de Cabello', 'No', 'Secado Corte y mantenimiento del Cabello largo', 95000, 70, 'CorteDeCabello.jpg', 'Salon1.jpg', '2020-06-14 06:57:57', '2020-06-14 06:57:57'),
(18, 3, 'Pestañas Pelo a Pelo', 'No', 'Postura de Pestañas Pelo a pelo uno a uno..de forma profesional.', 95000, 45, 'A01225723.jpg', 'B01225723.jpg', '2020-07-01 22:57:23', '2020-07-03 05:14:26'),
(19, 5, 'Semi Permanente', 'Si', 'Limpieza de Manos y uñas. instalacion de acrilicos y decoracion', 65000, 45, 'A03035557.jpg', 'B03035557.jpg', '2020-07-03 03:55:57', '2020-07-11 06:10:47'),
(20, 5, 'Uñas Acrilicas', 'Si', 'Uñas esculpidas en Acrilico en Organimei, incluye dos Uñas Decoradas,(3d,Piedreria,Pincelada, efectos y espejos)', 60000, 120, 'A04053327.jpg', 'B04053327.jpg', '2020-07-04 05:33:27', '2020-07-04 05:33:27'),
(22, 2, 'Electronica', 'No', 'Soldadura', 87000, 33, 'A11060143.JPG', 'B11060143.jpg', '2020-07-11 06:01:43', '2020-07-11 06:01:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `rol` varchar(64) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `direction` varchar(200) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='User Data';

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `rol`, `phone_number`, `direction`, `email`, `password`, `image`, `created`, `updated`) VALUES
(19, 'Dalila', 'Ulloa', '', 'cliente', '313243200', 'KR 102 #123 AP 301 SUBA BOGOTA', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-06-29 06:04:28', '2020-06-29 06:04:28'),
(20, 'Dalila', 'Ulloa', '', 'cliente', '313243200', '', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-07-02 03:12:29', '2020-07-02 03:12:29'),
(21, '', 'Ulloa', '', 'cliente', '313243200', 'KR 102 #123 AP 301 SUBA BOGOTA', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-07-02 03:26:13', '2020-07-02 03:26:13'),
(22, '', 'Ulloa', '', 'cliente', '313243200', 'KR 102 #123 AP 301 SUBA BOGOTA', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-07-02 03:31:17', '2020-07-02 03:31:17'),
(23, 'Dalila', 'Ulloa', '', 'cliente', '', '', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-07-02 03:31:46', '2020-07-02 03:31:46'),
(24, 'naila', 'Ulloa', '', 'cliente', '313243200', '', 'Dalilau@gmail.com', '000000', 'avatar_1', '2020-07-02 03:38:51', '2020-07-02 03:38:51'),
(25, 'naila', 'Nora', 'naila', 'moderador', '', '', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-02 03:45:49', '2020-07-02 03:45:49'),
(26, 'dasd', 'sdf', '', 'cliente', '', '', '', '000000', 'avatar_1', '2020-07-02 04:15:52', '2020-07-02 04:15:52'),
(27, '', 'jimenez', '', 'cliente', '', '', '', '000000', 'avatar_1', '2020-07-02 04:19:13', '2020-07-02 04:19:13'),
(28, '', 'asdfasdfasd', '', 'cliente', '', '', '', '000000', 'avatar_1', '2020-07-02 04:23:06', '2020-07-02 04:23:06'),
(29, '', '', '', 'cliente', '', '', '', '000000', 'avatar_1', '2020-07-02 04:24:40', '2020-07-02 04:24:40'),
(30, 'Jose', 'Jimenezz', '', 'moderador', '3136946736', 'KR 102 #123 AP 301 SUBA BOGOTA', 'jose.rafael.jimenez.6@gmail.com', '000000', 'avatar_1', '2020-07-03 23:33:50', '2020-07-03 23:33:50'),
(31, 'Naila', 'Ulloa', '', 'cliente', '3132433', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-04 05:44:46', '2020-07-04 05:44:46'),
(32, 'Graciela', 'jimenez', '', 'cliente', '3333333', 'KR 102 #123 AP 301 SUBA BOGOTA', 'Gra@gmail.com', '000000', 'avatar_1', '2020-07-08 21:04:36', '2020-07-08 21:04:36'),
(33, 'naila', 'Ulloa', '', 'cliente', '222222', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 21:11:41', '2020-07-08 21:11:41'),
(34, 'jose', 'jimenez', '', 'cliente', '5555555', 'KR 102 #123 AP 301 SUBA BOGOTA', 'jose.rafael.jimenez.@gmail.com', '000000', 'avatar_1', '2020-07-08 21:15:07', '2020-07-08 21:15:07'),
(35, 'jose', 'Ulloa', '', 'cliente', '6666666', 'KR 102 #123 AP 301 SUBA BOGOTA', 'Gra@gmail.com', '000000', 'avatar_1', '2020-07-08 21:21:45', '2020-07-08 21:21:45'),
(36, 'naila Nora', 'Ulloa', '', 'cliente', '40004000', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 21:25:18', '2020-07-11 05:38:05'),
(37, 'jose', 'Ulloa', '', 'cliente', '777777', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 22:54:22', '2020-07-08 22:54:22'),
(38, 'jose', 'Ulloa', '', 'cliente', '0009878', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 23:00:57', '2020-07-08 23:00:57'),
(39, 'naila', 'Arco', '', 'cliente', '55454545', 'KR 102 #123 AP 301 SUBA BOGOTA', 'botelhogarcia@gmail.com', '000000', 'avatar_1', '2020-07-08 23:03:28', '2020-07-08 23:03:28'),
(40, 'jose', 'Ulloa', '', 'cliente', '6756756', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 23:11:02', '2020-07-08 23:11:02'),
(41, 'jose', 'Ulloa', '', 'cliente', '6756756', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 23:17:44', '2020-07-08 23:17:44'),
(42, 'Jorge Eliecer', 'Ulloa', '', 'cliente', '999999', 'Venezuela', 'Gra@gmail.com', '000000', 'avatar_1', '2020-07-08 23:24:33', '2020-07-11 05:37:47'),
(43, 'Dalila', 'Serna', '', 'cliente', '3316946736', 'KR 102 #123 AP 301 SUBA BOGOTA', 'nail@gmail.com', '000000', 'avatar_1', '2020-07-08 23:40:11', '2020-07-11 05:38:25'),
(44, 'Josefina', 'jimenez', '', 'cliente', '3203245362', 'KR 102 #123 AP 301 SUBA BOGOTA', 'jose.rafael.jimenez.6@gmail.com', '000000', 'avatar_1', '2020-07-08 23:53:07', '2020-07-08 23:53:07'),
(45, 'Graciela', 'jimenez', '', 'cliente', '33333', 'KR 102 #123 AP 301 SUBA BOGOTA', 'joserafa78@yopmail.com', '000000', 'avatar_1', '2020-07-09 00:22:47', '2020-07-11 05:38:58'),
(46, 'naila ulloa', 'ulloa serna', '', 'cliente', '3212541234', 'metropolis', 'ulloa.naila@gmail.com', '000000', 'avatar_1', '2020-07-09 20:20:43', '2020-07-09 20:20:43'),
(47, 'Gisel', 'Contreras', '', 'cliente', '300123456', 'KR 102 #123 AP 301 SUBA DESPERTAR BOGOTA', 'gisel1@gmail.com', '000000', 'avatar_1', '2020-07-11 01:47:02', '2020-07-11 05:38:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento_orden`
--
ALTER TABLE `evento_orden`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_orden_2` (`id_order`),
  ADD UNIQUE KEY `id_evento` (`id_evento`) USING BTREE,
  ADD KEY `FK_id_evento` (`id_evento`) USING BTREE,
  ADD KEY `FK_id_order` (`id_order`) USING BTREE;

--
-- Indices de la tabla `human_dody_parts`
--
ALTER TABLE `human_dody_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_User_Order` (`id_client`);

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Services_Order_Detail` (`id_services`) USING BTREE,
  ADD KEY `fk_Order_Detail` (`id_order`) USING BTREE;

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_body_parts` (`id_body_parts`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `evento_orden`
--
ALTER TABLE `evento_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `human_dody_parts`
--
ALTER TABLE `human_dody_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento_orden`
--
ALTER TABLE `evento_orden`
  ADD CONSTRAINT `Una Orden tien 1 Evneto` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `de 1 a 1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_body_parts`) REFERENCES `human_dody_parts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
