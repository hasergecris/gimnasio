-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 22:18:31
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
(4, 22222222, '2023-05-30');

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
  `fecha_alerta_terminacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `documento`, `valor`, `usu_nombre`, `desde`, `hasta`, `duracion`, `fecha_alerta_terminacion`) VALUES
(10, '22222222', '50000', 'Geronimo Vega', '2023-05-30', '2023-06-13', '15', '2023-05-30'),
(11, '1212121212', '100', 'Guadalupe Vega', '2023-05-30', '2023-06-30', '30', '2023-06-28');

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
(3, 'Hasbleidy Poveda', '2', '', '1023877403', 'hasbleidy03@gmail.comk', '2023-05-24 21:57:45'),
(4, 'Guadalupe Vega Poveda', '2', '', '1212121212', 'pupe@yopmail.com', '2023-05-29 20:09:39'),
(5, 'Geronimo Vega', '2', '', '22222222', 'gerochillon@yopmail.com', '2023-05-29 19:48:42'),
(7, 'Christian Camilo Vega ', '1', 'Qwerty123*', '1032410251', 'hasergecris9@gmail.com', '2023-05-29 20:10:58'),
(8, 'Jose Ramirez', '2', '', '1073711329', 'jose@yopmail.com', '2023-05-30 20:09:01'),
(9, 'Kevin Andrade', '2', '', '0000000000', 'kevin@yopmail.com', '2023-05-30 20:15:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
