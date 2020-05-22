-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2020 a las 07:16:57
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ltgrill`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_plate`
--

CREATE TABLE `cat_plate` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_plate`
--

INSERT INTO `cat_plate` (`id_cat`, `cat_name`) VALUES
(1, 'soups'),
(2, 'salads'),
(3, 'antojitos'),
(4, 'quesadillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `direction` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`id`, `name`, `phone`, `direction`) VALUES
(1, 'Van Dorn, Alexandria', ' (703) 746-9054', '241 S. Van Dorn Street, Alexandria, VA 22304'),
(2, 'Crystal City', '(703) 647-9702', '513 23rd St South Arlington, VA 22202'),
(3, 'Del Ray, Alexandria', '(703) 299-9290', '2615 Mount Vernon Avenue Alexandria, VA 22301'),
(4, 'Leesburg', '(571) 291-3652', '201 Harrison Street SE Leesburg VA 20175');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `id_plate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `id_location`, `id_plate`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `name_menu_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `name_menu_type`) VALUES
(1, 'Brunch'),
(2, 'Dinner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plate`
--

CREATE TABLE `plate` (
  `id_plate` int(11) NOT NULL,
  `plate_name` varchar(80) NOT NULL,
  `price` float NOT NULL,
  `ingredients` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `special` int(1) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plate`
--

INSERT INTO `plate` (`id_plate`, `plate_name`, `price`, `ingredients`, `img`, `special`, `id_cat`, `id_menu_type`) VALUES
(1, 'Nacho Platter Cheese', 9.95, 'Crispy corn chips covered with refried beans,melted cheese,jalapeño peppers, guacamole, sour cream, and pico de gallo', 'plate-1.jpg', 1, 3, 2),
(2, 'Nacho Platter Chicken', 11.95, 'Crispy corn chips covered with refried beans,melted cheese,jalapeño peppers, guacamole, sour cream, and pico de gallo', 'plate-2.jpg', 1, 3, 2),
(3, 'Nacho Platter Beef', 12.95, 'Crispy corn chips covered with refried beans,melted cheese,jalapeño peppers, guacamole, sour cream, and pico de gallo', 'plate-3.jpg', 1, 3, 2),
(4, 'Carne Deshilada', 12.95, 'Schredded beef with scrambled eggs and side salad.', 'plate-4', 1, 3, 1),
(5, 'Chorizo con Huevos', 11.95, 'Grilled New York Steak, on bed of grilled red onions w/2 fried eggs on top.Served on a hot sizzling plate.', 'plate-5', 0, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_plate`
--
ALTER TABLE `cat_plate`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_location` (`id_location`),
  ADD KEY `id_plate` (`id_plate`);

--
-- Indices de la tabla `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indices de la tabla `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`id_plate`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_menu_type` (`id_menu_type`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_plate`
--
ALTER TABLE `cat_plate`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plate`
--
ALTER TABLE `plate`
  MODIFY `id_plate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_plate`) REFERENCES `plate` (`id_plate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plate`
--
ALTER TABLE `plate`
  ADD CONSTRAINT `plate_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `cat_plate` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plate_ibfk_2` FOREIGN KEY (`id_menu_type`) REFERENCES `menu_type` (`id_menu_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
