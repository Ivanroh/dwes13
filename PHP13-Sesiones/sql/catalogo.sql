-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2017 a las 14:18:07
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo`
--
CREATE DATABASE IF NOT EXISTS `catalogo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `catalogo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nacionalidad` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`, `apellido`, `nacionalidad`) VALUES
(1, 'Ivan', 'Hidalgo', 'Ecuatoriana'),
(2, 'Karlos', 'Rosé', 'República Dominicana'),
(3, 'Gilberto', 'Santa Rosa', 'Puerto Rico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `idObra` int(4) NOT NULL,
  `artista` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `duracion` decimal(10,0) NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`idObra`, `artista`, `titulo`, `categoria`, `duracion`, `imagen`, `idAutor`) VALUES
(1, 'Ivan', 'Prueba', 'Alternativo', '3', 'disco_vinilo.jpg', 1),
(2, 'Karlos Rosé', 'Infiel', 'Bachata', '3', 'Karlos_Rose-Infiel.jpg', 2),
(3, 'Karlos Rosé', 'Niña de mi corazon', 'Bachata', '4', 'Karlos-Rose-Corazon.jpg', 2),
(4, 'Gilberto Santa Rosa', 'Conteo Regresivo', 'Salsa', '5', 'gilberto.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` text COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nombre`, `admin`, `descripcion`) VALUES
('ivan', 'ivan', 'Ivan Hidalgo', 1, 'Administrador'),
('ivanr', 'ivanr', 'ivanr', 0, ''),
('ivanro', 'ivanro', 'ivanro', 1, 'ivanro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`idObra`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `idObra` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra-autor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
