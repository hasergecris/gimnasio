-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 17:38:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_clientes`
--

CREATE TABLE `ingreso_clientes` (
  `id` int(11) NOT NULL,
  `ing_idUsuario` int(15) NOT NULL,
  `ing_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso_clientes`
--

INSERT INTO `ingreso_clientes` (`id`, `ing_idUsuario`, `ing_fecha`) VALUES
(1, 22222222, '2023-05-30'),
(2, 22222222, '2023-05-30'),
(3, 22222222, '2023-05-30'),
(4, 22222222, '2023-05-30'),
(5, 22222222, '2023-05-31'),
(6, 22222222, '2023-05-31'),
(7, 22222222, '2023-05-31'),
(8, 1023877403, '2023-05-31'),
(9, 1212121212, '2023-05-31'),
(10, 22222222, '2023-05-31'),
(11, 22222222, '2023-05-31'),
(12, 22222222, '2023-05-31'),
(13, 22222222, '2023-05-31'),
(14, 22222222, '2023-05-31'),
(15, 22222222, '2023-05-31'),
(16, 22222222, '2023-05-31'),
(17, 1023877403, '2023-06-01'),
(18, 22222222, '2023-06-01'),
(19, 22222222, '2023-06-01'),
(20, 22222222, '2023-06-01'),
(21, 22222222, '2023-06-01'),
(22, 22222222, '2023-06-01'),
(23, 22222222, '2023-06-01'),
(24, 22222222, '2023-06-01'),
(25, 22222222, '2023-06-01'),
(26, 22222222, '2023-06-01'),
(27, 22222222, '2023-06-01'),
(28, 22222222, '2023-06-01'),
(29, 22222222, '2023-06-01'),
(30, 22222222, '2023-06-01'),
(31, 22222222, '2023-06-01'),
(32, 22222222, '2023-06-01'),
(33, 22222222, '2023-06-01'),
(34, 22222222, '2023-06-01'),
(35, 22222222, '2023-06-01'),
(36, 22222222, '2023-06-01'),
(37, 22222222, '2023-06-01'),
(38, 22222222, '2023-06-01'),
(39, 1016588978, '2023-06-01'),
(40, 1016588978, '2023-06-01'),
(41, 1016588978, '2023-06-01'),
(42, 1016588978, '2023-06-01'),
(43, 1016588978, '2023-06-01'),
(44, 1212121212, '2023-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `usu_nombre` varchar(100) DEFAULT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `duracion` varchar(10) DEFAULT NULL,
  `fecha_alerta_terminacion` date NOT NULL,
  `dias_restantes` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `documento`, `valor`, `usu_nombre`, `desde`, `hasta`, `duracion`, `fecha_alerta_terminacion`, `dias_restantes`) VALUES
(14, '121212121212	', '100', 'Guadalupe Vega', '2023-06-07', '2023-07-07', '30', '2023-07-05', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_rol` varchar(2) NOT NULL,
  `usu_pas` varchar(100) NOT NULL,
  `usu_documento` varchar(20) NOT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nombre`, `usu_rol`, `usu_pas`, `usu_documento`, `usu_correo`, `fecha`) VALUES
(7, 'Christian Camilo Vega ', '1', 'Qwerty123*', '1032410251', 'hasergecris9@gmail.com', '2023-05-29 20:10:58'),
(8, 'Guadalupe Vega', 'cl', '', '121212121212', 'pupe@yopmail.com', '2023-06-07 18:29:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingreso_clientes`
--
ALTER TABLE `ingreso_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingreso_clientes`
--
ALTER TABLE `ingreso_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
