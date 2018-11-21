-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-11-2018 a las 12:16:55
-- Versión del servidor: 5.7.24-0ubuntu0.18.10.1
-- Versión de PHP: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciclos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoCiclo`
--

CREATE TABLE `alumnoCiclo` (
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `idCiclo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoModulo`
--

CREATE TABLE `alumnoModulo` (
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `idModulo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `id` int(10) UNSIGNED NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `abreviatura`, `nombre`, `descripcion`) VALUES
(1, 'ASIR', 'Administración de Sistemas Informáticos en Red', ''),
(2, 'DAW', 'Desarrollo de Aplicaciones Web', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_bin NOT NULL,
  `curso` int(11) NOT NULL,
  `id_ciclo` int(10) UNSIGNED NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `nombre`, `abreviatura`, `curso`, `id_ciclo`, `horas`) VALUES
(1, 'Sistemas informáticos', 'SI', 1, 2, 6),
(2, 'Bases de datos', 'BBDD', 1, 2, 6),
(3, 'Programación', 'PROG', 1, 2, 8),
(4, 'Lenguajes de marcas y sistemas de gestión de información', 'LMSIG', 1, 2, 4),
(5, 'Entornos de desarrollo', 'ED', 1, 2, 3),
(6, 'Formación y orientación laboral', 'FOL', 1, 2, 3),
(7, 'Desarrollo web en entorno cliente', 'DESEC', 2, 2, 6),
(8, 'Desarrollo web en entorno servidor', 'DESER', 2, 2, 8),
(9, 'Despliegue de aplicaciones web', 'DAW', 2, 2, 3),
(10, 'Diseño de interfaces web', 'DIW', 2, 2, 6),
(11, 'Empresa e iniciativa emprendedora', 'EIE', 2, 2, 4),
(12, 'Horas de libre configuración', 'HLC', 2, 2, 3),
(13, 'Fundamentos de Hardware', 'FHAR', 1, 1, 3),
(14, 'Gestión de bases de datos', 'GBD', 1, 1, 6),
(15, 'Implantación de sistemas operativos', 'IMSO', 1, 1, 8),
(16, 'Lenguajes de marcas y sistemas de gestión de información', 'LMSIG', 1, 1, 4),
(17, 'Planificación y administración de redes', 'PLAR', 1, 1, 6),
(18, 'Formación y orientación laboral', 'FOL', 1, 1, 3),
(19, 'Administración de sistemas gestores de bases de datos', 'ASGBD', 2, 1, 3),
(20, 'Administración de sistemas operativos', 'ASO', 2, 1, 6),
(21, 'Implantación de aplicaciones web', 'ISO', 2, 1, 4),
(22, 'Seguridad y alta disponibilidad', 'SAD', 2, 1, 4),
(23, 'Servicios de red e internet', 'SRI', 2, 1, 6),
(24, 'Empresa e iniciativa emprendedora', 'EIE', 2, 1, 4),
(25, 'Horas de libre configuración', 'HLC', 2, 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnoCiclo`
--
ALTER TABLE `alumnoCiclo`
  ADD PRIMARY KEY (`idAlumno`,`idCiclo`);

--
-- Indices de la tabla `alumnoModulo`
--
ALTER TABLE `alumnoModulo`
  ADD PRIMARY KEY (`idAlumno`,`idModulo`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
