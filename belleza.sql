-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 21:20:26
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
-- Estructura de tabla para la tabla `day_diary`
--

CREATE TABLE `day_diary` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Daily service diary';

--
-- Volcado de datos para la tabla `day_diary`
--

INSERT INTO `day_diary` (`id`, `day`, `month`, `year`) VALUES
(11, 15, 6, 2020),
(12, 16, 6, 2020),
(13, 17, 6, 2020),
(14, 18, 6, 2020),
(15, 15, 6, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hours_detail`
--

CREATE TABLE `hours_detail` (
  `id` int(11) NOT NULL,
  `id_hours_day` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `use_time` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hours_diary`
--

CREATE TABLE `hours_diary` (
  `id` int(11) NOT NULL,
  `id_day` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_hour` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hours_diary`
--

INSERT INTO `hours_diary` (`id`, `id_day`, `start_time`, `end_hour`, `enabled`) VALUES
(14, 14, 9, 10, 0),
(15, 14, 10, 11, 0),
(16, 14, 11, 12, 0),
(17, 15, 9, 10, 0),
(18, 15, 10, 11, 0),
(19, 15, 11, 12, 0),
(20, 15, 12, 13, 0),
(21, 15, 13, 14, 0),
(22, 15, 14, 15, 0),
(23, 15, 15, 16, 0),
(24, 15, 16, 17, 0);

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
(3, 'Rostro', 'Area Faciel de la Cabeza', 'c:/cabezaRostro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `total_time` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `id_body_parts` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(280) NOT NULL,
  `price` float NOT NULL,
  `time` int(11) NOT NULL COMMENT 'Tiempo en Minutos',
  `image` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Beauty Services';

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `id_body_parts`, `name`, `description`, `price`, `time`, `image`, `created`, `updated`) VALUES
(1, 2, 'Pedicure', 'Limpieza de Uñas y Pesuñas en Patas', 10000, 20, 'c:/Pdicure.jpg', '2020-06-13 22:41:06', '2020-06-13 22:41:06'),
(2, 3, 'Cejas Deliniadas', 'Retirar los Bellos con Cera u hojilla', 13000, 10, 'c:/cejas.jpg', '2020-06-13 23:14:58', '2020-06-13 23:14:58'),
(3, 1, 'Secado de Cabello Extra largo', 'Lavaso Secado Corte y mantenimiento del Cabello largo', 60000, 40, 'c:/secado.jpg', '2020-06-14 06:48:12', '2020-06-14 06:48:12'),
(4, 1, 'Tinte de Cabello', 'Secado Corte y mantenimiento del Cabello largo', 90000, 60, 'c:/secado3.jpg', '2020-06-14 06:56:51', '2020-06-14 06:56:51'),
(5, 1, 'Corte de Cabello', 'Secado Corte y mantenimiento del Cabello largo', 95000, 70, 'c:/corte3.jpg', '2020-06-14 06:57:57', '2020-06-14 06:57:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_name` varchar(30) NOT NULL,
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

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `phone_number`, `direction`, `email`, `password`, `image`, `created`, `updated`) VALUES
(1, 'Jose Rafael', 'Jimenez Serna', 'joserafa', '3136946736', 'Suba Bogota', 'jose.rafael.jimenez.6@gmail.com', '0000', 'c:/misdocumentos/foto_1', '2020-06-13 19:39:40', '2020-06-13 19:39:40'),
(2, 'Dalila', 'Ulloa', 'Dali08', '3000000', 'Suba bogota', 'ulloaserna@gmail.com', '', 'c:/MisDocumentos/dali_2', '2020-06-13 19:53:54', '2020-06-13 19:39:40'),
(3, 'Armando', 'Ulloa Serna', 'Arma01', '31020202020', 'Bogota suba', 'armand1@gmail.com', '000', 'C:/foto1', '2020-06-14 03:33:07', '2020-06-14 03:52:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `day_diary`
--
ALTER TABLE `day_diary`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hours_detail`
--
ALTER TABLE `hours_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_hora` (`id_order`),
  ADD KEY `fk_hours_detail` (`id_hours_day`) USING BTREE;

--
-- Indices de la tabla `hours_diary`
--
ALTER TABLE `hours_diary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Day_Hours` (`id_day`);

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
  ADD PRIMARY KEY (`id`,`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `day_diary`
--
ALTER TABLE `day_diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `hours_detail`
--
ALTER TABLE `hours_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hours_diary`
--
ALTER TABLE `hours_diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `human_dody_parts`
--
ALTER TABLE `human_dody_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hours_detail`
--
ALTER TABLE `hours_detail`
  ADD CONSTRAINT `hours_detail_ibfk_1` FOREIGN KEY (`id_hours_day`) REFERENCES `hours_diary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hours_detail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hours_diary`
--
ALTER TABLE `hours_diary`
  ADD CONSTRAINT `hours_diary_ibfk_1` FOREIGN KEY (`id_day`) REFERENCES `day_diary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
