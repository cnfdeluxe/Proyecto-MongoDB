-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 19:31:27
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `critica`
--

CREATE TABLE `critica` (
  `id_critica` int(5) NOT NULL,
  `id_pelicula` int(4) NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `critica`
--

INSERT INTO `critica` (`id_critica`, `id_pelicula`, `autor`, `texto`, `nota`) VALUES
(1, 1, 'Cristian', 'Vaya mierda peli loco', 1),
(2, 8, 'Josema', 'Vaya peliculon joder', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(4) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `genero` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `director` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `year` int(4) NOT NULL,
  `sinopsis` tinytext COLLATE utf8mb4_spanish_ci NOT NULL,
  `portada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `genero`, `director`, `year`, `sinopsis`, `portada`) VALUES
(1, 'Fast and Furious 7', 'Accion', 'James Wan', 2017, 'James Wan', 'portadas/Fast and Furious 7.jpg'),
(2, 'Harry Potter y las Reliquias de la Muerte', 'Aventuras', 'David Yates', 2016, 'sdfasfasdas        \r\n                ', 'portadas/Harry Potter y las Reliquias de la Muerte.jpg'),
(8, 'Fast and Furious 8', 'Accion', 'James Wan', 2018, 'Toretto vuelve a las calles', 'portadas/Fast and Furious 8.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `critica`
--
ALTER TABLE `critica`
  ADD PRIMARY KEY (`id_critica`,`id_pelicula`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `critica`
--
ALTER TABLE `critica`
  MODIFY `id_critica` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `critica`
--
ALTER TABLE `critica`
  ADD CONSTRAINT `critica_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
