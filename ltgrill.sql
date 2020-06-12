-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2020 a las 21:38:26
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
-- Estructura de tabla para la tabla `cat_detail`
--

CREATE TABLE `cat_detail` (
  `id_cat_detail` int(11) NOT NULL,
  `id_plate` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_detail`
--

INSERT INTO `cat_detail` (`id_cat_detail`, `id_plate`, `id_cat`) VALUES
(1, 1, 2),
(2, 25, 5),
(3, 12, 1),
(4, 12, 15),
(5, 12, 2),
(6, 129, 1),
(7, 130, 1),
(8, 131, 1),
(9, 132, 1),
(10, 133, 1),
(11, 134, 1),
(12, 12, 2),
(13, 2, 2),
(14, 3, 2),
(15, 4, 2),
(16, 5, 2),
(17, 6, 2),
(18, 7, 2),
(19, 8, 2),
(20, 9, 2),
(21, 10, 2),
(22, 11, 2),
(23, 13, 3),
(24, 14, 3),
(25, 15, 3),
(26, 16, 4),
(27, 17, 4),
(28, 18, 4),
(29, 19, 5),
(30, 20, 5),
(31, 21, 5),
(32, 22, 5),
(33, 23, 5),
(34, 24, 5),
(35, 25, 5),
(36, 26, 5),
(37, 27, 5),
(38, 28, 6),
(39, 29, 6),
(40, 30, 6),
(41, 31, 6),
(42, 32, 7),
(43, 33, 7),
(44, 34, 7),
(45, 35, 7),
(46, 36, 7),
(47, 37, 8),
(48, 38, 8),
(49, 39, 8),
(50, 40, 8),
(51, 41, 8),
(52, 42, 8),
(53, 43, 9),
(54, 44, 9),
(55, 45, 9),
(56, 46, 9),
(57, 47, 9),
(58, 48, 9),
(59, 49, 10),
(60, 50, 10),
(61, 51, 10),
(62, 52, 10),
(63, 53, 10),
(64, 54, 11),
(65, 55, 11),
(66, 56, 11),
(67, 57, 11),
(68, 58, 11),
(69, 59, 11),
(70, 60, 11),
(71, 61, 11),
(72, 62, 12),
(73, 63, 12),
(74, 64, 12),
(75, 65, 12),
(76, 66, 12),
(77, 67, 12);

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
(1, 'Del Ray', '(703) 299-9290', '2615 Mount Vernon Avenue Alexandria, VA 22301'),
(2, 'Crystal City', '(703) 647-9702', '513 23rd St South Arlington, VA 22202'),
(3, 'Van Dorn', '(703) 746-9054', '241 S. Van Dorn Street, Alexandria, VA 22304'),
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
(6, 1, 1),
(7, 1, 12),
(9, 1, 129),
(10, 1, 130),
(11, 1, 131),
(12, 1, 132),
(13, 1, 133),
(14, 1, 134),
(15, 1, 2),
(16, 1, 3),
(17, 1, 4),
(18, 1, 5),
(19, 1, 6),
(20, 1, 7),
(21, 1, 8),
(22, 1, 9),
(23, 1, 10),
(24, 1, 11),
(25, 1, 12),
(26, 1, 25),
(27, 1, 13),
(28, 1, 14),
(29, 1, 15),
(30, 1, 16),
(31, 1, 17),
(32, 1, 18),
(33, 1, 19),
(34, 1, 20),
(35, 1, 21),
(36, 1, 22),
(37, 1, 23),
(38, 1, 24),
(39, 1, 25),
(40, 1, 26),
(41, 1, 27),
(42, 1, 28),
(43, 1, 29),
(44, 1, 30),
(45, 1, 31),
(46, 1, 32),
(47, 1, 33),
(48, 1, 34),
(49, 1, 35),
(50, 1, 36),
(51, 1, 37),
(52, 1, 38),
(53, 1, 39),
(54, 1, 40),
(55, 1, 41),
(56, 1, 42),
(57, 1, 43),
(58, 1, 44),
(59, 1, 45),
(60, 1, 46),
(61, 1, 47),
(62, 1, 48),
(63, 1, 49),
(64, 1, 50),
(65, 1, 51),
(66, 1, 52),
(67, 1, 53),
(68, 1, 54),
(69, 1, 55),
(70, 1, 56),
(71, 1, 57),
(72, 1, 58),
(73, 1, 59),
(74, 1, 60),
(75, 1, 61),
(76, 1, 62),
(77, 1, 63),
(78, 1, 64),
(79, 1, 65),
(80, 1, 66),
(81, 1, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plate`
--

CREATE TABLE `plate` (
  `id_plate` int(11) NOT NULL,
  `plate_name` varchar(80) NOT NULL,
  `price` varchar(50) NOT NULL,
  `ingredients` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `special` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plate`
--

INSERT INTO `plate` (`id_plate`, `plate_name`, `price`, `ingredients`, `img`, `special`) VALUES
(1, 'Nacho Platter', '9.95', '', '', 0),
(2, 'Platanos Fritos', '4.95', '', '', 0),
(3, 'Tamal de Elote', '4.95', '', '', 0),
(4, 'Chile con Queso', '6.95', '', '', 0),
(5, 'Taquitos', '7.95', '', '', 0),
(6, 'Camarones al Ajillo', '10.95', '', '', 0),
(7, 'Yuca con Chicharron', '13.95', '', '', 0),
(8, 'Yuca Frita', '3.95', '', '', 0),
(9, 'Pupusas', '3.95', '', '', 0),
(10, 'Salvadorean Chicken Tamal', '3.95', '', '', 0),
(11, 'Fresh Guacamole', '13.95', '', '', 0),
(12, 'Ceviche Mixto', '16.95', '', 'plate-6.jpg', 0),
(13, 'Seafood Soup', '10.95', '', '', 0),
(14, 'Sopa de Tortilla', '6.95', '', '', 0),
(15, 'Lentil Soup', '6.95', '', '', 0),
(16, 'Green Salad', '7.95', '', '', 0),
(17, 'Los Tios Salad', '14.95', '', '', 0),
(18, 'Tostada Salad', '16.95', '', '', 0),
(19, 'Cheese Quesadilla (Queso)', '7.95', '', '', 0),
(20, 'Chicken Quesadilla (Pollo)', '10.95', '', '', 0),
(21, 'Beef Quesadilla (Carne)', '11.95', '', '', 0),
(22, 'Spinach & Chicken Quesadilla', '10.95', '', '', 0),
(23, 'Spinach Quesadilla', '9.95', '', '', 0),
(24, 'Shrimp Quesadilla', '13.95', '', '', 0),
(25, 'Platano Quesadilla (Plantain)', '9.95', '', '', 0),
(26, 'Beef & Chicken Quesadilla', '11.95', '', '', 0),
(27, 'Quesadilla w/Rice & Beans', '11.95', '', '', 0),
(28, 'Chicken Chimichangas', '11.95', '', '', 0),
(29, 'Beef Chimichangas', '11.95', '', '', 0),
(30, 'Seafood Chimichangas', '14.95', '', '', 0),
(31, 'Vegetables Chimichangas', '11.95', '', '', 0),
(32, 'Chicken Burritos', '11.95', '', '', 0),
(33, 'Beef Burritos', '11.95', '', '', 0),
(34, 'Seafood Burritos', '14.95', '', '', 0),
(35, 'Beans Burritos', '11.95', '', '', 0),
(36, 'Vegetables Burritos', '11.95', '', '', 0),
(37, 'Tacos Los Tios', '12.95', '', '', 0),
(38, 'Mexican Flautas', '12.95', '', '', 0),
(39, 'Chiles Rellenos Poblanos', '14.95', '', '', 0),
(40, 'Los Tios Omelette', '11.95', '', '', 0),
(41, 'Huevos Rancheros', '11.95', '', '', 0),
(42, 'Salvadorean Tamales', '11.95', '', '', 0),
(43, 'Shrimp Tacos', '16.95', '', '', 0),
(44, 'Tacos al Carbon', '15.95', '', '', 0),
(45, 'Burritos al Carbon', '14.95', '', '', 0),
(46, 'Chimichangas al Carbon', '14.95', '', '', 0),
(47, 'Enchiladas al Carbon', '14.95', '', '', 0),
(48, 'Chicken Enchiladas', '11.95', '', '', 0),
(49, 'Beef Enchiladas', '11.95', '', '', 0),
(50, 'Seafood Enchiladas', '14.95', '', '', 0),
(51, 'Cheese Enchiladas', '11.95', '', '', 0),
(52, 'Spinach Enchiladas', '11.95', '', '', 0),
(53, 'Beans Enchiladas', '10.95', '', '', 0),
(54, 'Tamal & Chile Relleno', '12.95', '', '', 0),
(55, 'Tamal & Taco', '12.95', '', '', 0),
(56, 'Enchiladas (Cheese & Chicken)', '12.95', '', '', 0),
(57, 'Enchiladas (Beef & Chicken)', '12.95', '', '', 0),
(58, 'Enchiladas (Beef & Cheese)', '12.95', '', '', 0),
(59, 'Enchiladas (Chicken,Beef & Cheese)', '13.95', '', '', 0),
(60, 'Enchiladas (Spinach & Cheese)', '12.95', '', '', 0),
(61, 'Cheese Enchiladas & Chile Relleno', '12.95', '', '', 0),
(62, 'Carne Deshilada', '14.95', '', '', 0),
(63, 'Carne Guisada', '16.95', '', '', 0),
(64, 'Pollo Guisado', '14.95', '', '', 0),
(65, 'Plato Tipico', '15.95', '', '', 0),
(66, 'Mojarra Frita', '20.95', '', '', 0),
(67, 'Carne Asada Salvadorena', '19.95', '', '', 0),
(68, 'Los Tios Carne Asada', '22.95', '', '', 0),
(69, 'Lechoncito al Horno', '18.95', '', '', 0),
(70, 'Lomo Saltado', '22.95', '', '', 0),
(71, 'Bistec Encebollado', '18.95', '', '', 0),
(72, 'Costillas Barbacoa', '18.95', '', '', 0),
(73, 'Los Tios Steak & Eggs', '22.95', '', '', 0),
(74, 'BBQ Bistec con Chorizo', '17.95', '', '', 0),
(75, 'Bistec con Camarones', '19.95', '', '', 0),
(76, 'Bistec Mexicano', '22.95', '', '', 0),
(77, 'Pollo Mexicano', '17.95', '', '', 0),
(78, 'Pollo Acapulco', '16.95', '', '', 0),
(79, 'Pollo Los Tios', '17.95', '', '', 0),
(80, 'Pollo Veracruz', '15.95', '', '', 0),
(81, 'Camarones El Poblano', '21.95', '', '', 0),
(82, 'Camarones a La Plancha', '21.95', '', '', 0),
(83, 'Camarones El Cantinero', '22.95', '', '', 0),
(84, 'Grilled Red Snapper Fillet', '21.95', '', '', 0),
(85, 'Pescado Los Tios', '22.95', '', '', 0),
(86, 'Mariscos Saltados', '22.95', '', '', 0),
(87, 'Mariscada', '24.95', '', '', 0),
(88, 'Beef Fajitas', '18.95', '', '', 0),
(89, 'Chicken Fajitas', '17.95', '', '', 0),
(90, 'Shrimp Fajitas', '21.95', '', '', 0),
(91, 'Chorizo Fajitas', '15.95', '', '', 0),
(92, 'Vegetables Fajitas', '15.95', '', '', 0),
(93, 'Chicken, Beef & Shrimp Fajitas', '22.95', '', '', 0),
(94, 'Chicken & Beef Fajitas', '18.95', '', '', 0),
(95, 'Shrimp & Chicken Fajitas', '20.95', '', '', 0),
(96, 'Beef & Shrimp Fajitas', '20.95', '', '', 0),
(97, 'BBQ Ribs & Beef Fajitas', '18.95', '', '', 0),
(98, 'BBQ & Chicken Fajitas', '17.95', '', '', 0),
(99, 'Chicken & Chorizo Fajitas', '16.95', '', '', 0),
(100, 'Beef & Chorizo Fajitas', '17.95', '', '', 0),
(101, 'Beef, Chicken & Chorizo Fajitas', '18.95', '', '', 0),
(102, 'Shrimp & Chorizo Fajitas', '20.95', '', '', 0),
(103, 'Parrillada', '59.95', '', '', 0),
(104, 'Super Parrillada', '69.95', '', '', 0),
(105, 'Carne Deshilada Brunch', '12.95', '', '', 0),
(106, 'Chorizo con Huevos', '11.95', '', '', 0),
(107, 'Steak & Eggs Brunch', '16.95', '', '', 0),
(108, 'Tipico Ranchero', '12.95', '', '', 0),
(109, 'Tipico Salvadoreno', '10.95', '', '', 0),
(110, 'Tipico Mexicano', '14.95', '', '', 0),
(111, 'Frijolada', '11.95', '', '', 0),
(112, 'Huevos Rancheros', '10.95', '', '', 0),
(113, 'Machaca Enchilada', '10.95', '', '', 0),
(114, 'Machaca Burrito', '10.95', '', '', 0),
(115, 'Omelette', '10.95', '', '', 0),
(116, 'Beef Chilaquiles', '11.95', '', '', 0),
(117, 'Chicken Chilaquiles', '10.95', '', '', 0),
(118, 'Brunch Family Special', '34.95', '', '', 0),
(119, 'Tres Leches', '6.50', '', '', 0),
(120, 'Flan', '5.95', '', '', 0),
(121, 'Fried Ice Cream', '6.75', '', '', 0),
(122, 'Ice Cream and Sopapillas', '6.75', '', '', 0),
(123, 'Churros and Ice Cream', '6.95', '', '', 0),
(124, 'House Margarita 16oz', '13.95', '', '', 0),
(125, 'Red Sangria 16oz', '13.95', '', '', 0),
(126, 'White Sangria 16oz', '13.95', '', '', 0),
(127, 'Sangria Margarita 16oz', '13.95', '', '', 0),
(128, 'Matrimonio (Lime + Strawberry)', '13.95', '', '', 0),
(129, 'Lamb Fajitas', '18.95', '', 'plate-7.jpg', 0),
(130, 'Mahi Mahi Fajitas', '21.95', '', 'plate-8.jpg', 0),
(131, 'Mar & Tierra Fajitas', '59.95', '', 'plate-9.jpg', 0),
(132, 'Diablo Shrimp', '24.95', '', 'plate-10.jpg', 0),
(133, 'Margaritas & Fajitas for Two', '49.95', '', 'plate-11.jpg', 0),
(134, 'Margaritas & Fresh Guacamole', '35.95', '', 'plate-12.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plate_categories`
--

CREATE TABLE `plate_categories` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plate_categories`
--

INSERT INTO `plate_categories` (`id_cat`, `cat_name`) VALUES
(1, 'Daily Specials'),
(2, 'Antojitos'),
(3, 'Soup'),
(4, 'Salads'),
(5, 'Quesadillas'),
(6, 'Chimichangas'),
(7, 'Burritos'),
(8, 'Platos Tipicos'),
(9, 'Al Carbon'),
(10, 'Enchiladas'),
(11, 'Mexican Combinations'),
(12, 'Salvadorean Platters'),
(13, 'Meat'),
(14, 'Chicken'),
(15, 'Seafood'),
(16, 'Fajitas'),
(17, 'Parrillada'),
(18, 'Margaritas'),
(19, 'Sangrias'),
(20, 'Side Order'),
(21, 'Desserts'),
(22, 'Drinks'),
(23, 'Chilaquiles'),
(24, 'Brunch');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `guests` tinyint(10) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `contact_name` varchar(140) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `special_instructions` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `id_location`, `guests`, `reservation_date`, `reservation_time`, `contact_name`, `phone`, `special_instructions`) VALUES
(1, 1, 2, '2020-06-09', '18:08:12', 'Juan perez', '221122112211', 'none'),
(2, 1, 2, '2020-06-05', '16:36:00', 'zxczxc', '(703) 746-9054', 'asdasdasdasasdasd'),
(3, 1, 2, '2020-06-05', '19:52:00', 'asdasd', '(703) 746-9054', 'asdasdasdas'),
(4, 1, 2, '2020-06-05', '19:54:00', 'sadasdasd', '(703) 746-9054', 'asdsadsadsa'),
(5, 1, 0, '2020-06-05', '01:00:00', '', '(703) 746-9054', ''),
(6, 1, 11, '2020-06-05', '16:36:00', 'asdsad', '(703) 746-9054', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_detail`
--
ALTER TABLE `cat_detail`
  ADD PRIMARY KEY (`id_cat_detail`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_plate` (`id_plate`);

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
-- Indices de la tabla `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`id_plate`);

--
-- Indices de la tabla `plate_categories`
--
ALTER TABLE `plate_categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_location` (`id_location`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_detail`
--
ALTER TABLE `cat_detail`
  MODIFY `id_cat_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `plate`
--
ALTER TABLE `plate`
  MODIFY `id_plate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `plate_categories`
--
ALTER TABLE `plate_categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_detail`
--
ALTER TABLE `cat_detail`
  ADD CONSTRAINT `cat_detail_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `plate_categories` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_detail_ibfk_2` FOREIGN KEY (`id_plate`) REFERENCES `plate` (`id_plate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_plate`) REFERENCES `plate` (`id_plate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
