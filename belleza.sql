-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2020 a las 23:00:40
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_orden`
--

CREATE TABLE `evento_orden` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(58, 'Naila Nora', 'Ulloa', 'naila', 'moderador', '3136946732', 'Suba Bogota', 'Ulloa.naila@gmail.com', '000000', 'avatar1', '2020-07-13 15:56:16', '2020-07-13 15:56:16'),
(59, 'Jose Rafael', 'Jimenez', 'joserafa', 'moderador', '3136946732', 'suba bogota', 'jose.rafael.jimenez.6@gmai.com', '000000', 'avatar1', '2020-07-13 15:58:34', '2020-07-13 15:58:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `evento_orden`
--
ALTER TABLE `evento_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `human_dody_parts`
--
ALTER TABLE `human_dody_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
