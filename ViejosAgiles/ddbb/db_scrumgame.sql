-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 03:15:26
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_scrumgame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `fecha_nac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genero` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `es_admin` int(1) DEFAULT NULL,
  `jugador_aceptado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`nombre`, `apellido`, `dni`, `fecha_nac`, `genero`, `email`, `usuario`, `clave`, `es_admin`, `jugador_aceptado`) VALUES
('ADMINISTRADOR', 'ADMINISTRADOR', 12345678, '06/05/1979', 'F', 'viejosAgiles@gmail.com', 'viejosAgiles', '$2y$10$sR4MZ7VKP.bh3PCaLYUoKOe2FJrXdWZkkFJfd67MYWR60xg1fGbPC', 1, 0),
('Daiana Magali', 'Damelio', 27139564, '2020-10-01', 'FEMENINO', 'dameliodaiana5@gmail.com', NULL, NULL, 0, 0),
('Daiana Magali', 'Damelio', 29700674, '05/05/1979', 'F', 'analiamega@gmail.com', 'analiamega@gmail.com', '$2y$10$DG4kkBMZzKIABbj4TVliguGTeoIS.vYKVu55VKzMAk1SPUixAFN3y', 0, 1),
('Monica', 'Mega', 49481765, '05/05/1979', 'F', 'monica@gmail.com', 'monica@gmail.com', '$2y$10$XZEiEjNR75Z4IgKXhrXAEesJQn1S9LhHK0lYzaP/jdyP2A6sMaTyy', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
