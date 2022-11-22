-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 15:53:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `price` int(12) NOT NULL,
  `weigth` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `stock` int(5) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ID`, `product_name`, `reference`, `price`, `weigth`, `category`, `stock`, `creation_date`) VALUES
(3, 'Salchipapas', 'SA02', 4, 250, 'Comidas', 6, '2022-11-21'),
(4, 'Agua', 'AG004', 4, 500, 'Bebidas', 16, '2022-11-21'),
(19, 'Coca Cola', 'C012', 1123, 110, 'Bebidas', 35, '2022-11-22'),
(20, 'Jardin del rio', 'JR33', 1112, 121, 'Ensadalas', 40, '2022-11-22'),
(24, 'Panes', 'PA12', 1250, 50, 'Panadería', 10, '2022-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell`
--

CREATE TABLE `sell` (
  `id_venta` int(11) NOT NULL,
  `id_producto_vendido` int(11) NOT NULL,
  `nombre_producto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sell`
--

INSERT INTO `sell` (`id_venta`, `id_producto_vendido`, `nombre_producto`) VALUES
(19, 4, 'Agua'),
(20, 3, 'Salchipapas'),
(21, 4, 'Agua'),
(22, 4, 'Agua'),
(23, 4, 'Agua'),
(24, 4, 'Agua'),
(25, 4, 'Agua'),
(26, 4, 'Agua'),
(27, 19, 'Coca Cola'),
(28, 20, 'Jardin del rio'),
(29, 20, 'Jardin del rio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sell`
--
ALTER TABLE `sell`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
