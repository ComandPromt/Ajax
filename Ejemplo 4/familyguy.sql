-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2018 a las 00:37:47
-- Versión del servidor: 5.7.24-0ubuntu0.18.10.1
-- Versión de PHP: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familyguy`
--

CREATE TABLE `familyguy` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(255) COLLATE utf8_bin NOT NULL,
  `edad` int(11) NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_bin NOT NULL,
  `trabajo` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `familyguy`
--

INSERT INTO `familyguy` (`id`, `nombre`, `apellido`, `edad`, `ciudad`, `trabajo`) VALUES
(1, 'Peter', 'Griffin', 41, 'Quahog', 'Vendedor de cerveza'),
(2, 'Lois', 'Griffin', 40, 'Newport', 'Profesora de piano'),
(3, 'Joseph', 'Swanson', 39, 'Quahog', 'Policía'),
(4, 'Glenn', 'Quagmire', 41, 'Quahog', 'Piloto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `familyguy`
--
ALTER TABLE `familyguy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `familyguy`
--
ALTER TABLE `familyguy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
