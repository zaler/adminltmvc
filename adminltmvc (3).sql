-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-10-2023 a las 21:52:10
-- Versión del servidor: 8.0.31
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminltmvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctl_estado`
--

DROP TABLE IF EXISTS `ctl_estado`;
CREATE TABLE IF NOT EXISTS `ctl_estado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `color` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ctl_estado`
--

INSERT INTO `ctl_estado` (`id`, `nombre`, `color`) VALUES
(1, 'pendiente', NULL),
(2, 'completado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctl_grado`
--

DROP TABLE IF EXISTS `ctl_grado`;
CREATE TABLE IF NOT EXISTS `ctl_grado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ctl_grado`
--

INSERT INTO `ctl_grado` (`id`, `nombre`) VALUES
(1, 'kinder 4'),
(2, 'kinder 5'),
(3, 'primer grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctl_secciones`
--

DROP TABLE IF EXISTS `ctl_secciones`;
CREATE TABLE IF NOT EXISTS `ctl_secciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ctl_secciones`
--

INSERT INTO `ctl_secciones` (`id`, `nombre`) VALUES
(1, '\"A\"'),
(2, '\"B\"'),
(3, '\"C\"'),
(4, '\"D\"'),
(5, '\"E\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mnt_partidas`
--

DROP TABLE IF EXISTS `mnt_partidas`;
CREATE TABLE IF NOT EXISTS `mnt_partidas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fech_nac` date NOT NULL,
  `grado_id` int NOT NULL,
  `secciones_id` int NOT NULL,
  `nombre_madre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_padre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_partidas_ctl_secciones1_idx` (`secciones_id`),
  KEY `fk_partidas_ctl_grado1_idx` (`grado_id`),
  KEY `fk_partidas_ctl_estado1_idx` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mnt_partidas`
--

INSERT INTO `mnt_partidas` (`id`, `nombre`, `fech_nac`, `grado_id`, `secciones_id`, `nombre_madre`, `nombre_padre`, `estado_id`) VALUES
(1, 'Dylan Andres Zaldaña López', '2023-09-22', 1, 1, 'Kriscia Abigail Hernandez', 'Joel Ernesto Zaldaña López', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int NOT NULL AUTO_INCREMENT,
  `nom_rol` text NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nom_rol`) VALUES
(1, 'administrador'),
(2, 'Colaborador'),
(3, 'Suscriptor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `nombre` text NOT NULL,
  `foto` text NOT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_roles_idx` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `foto`, `rol`) VALUES
(1, 'orlando', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'orlando', 'vistas/imagenes/usuarios/710.png', 1),
(2, 'Colaborador', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Colaborador', 'vistas/imagenes/usuarios/645.jpg', 2),
(3, 'Suscriptor', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Suscriptor', 'vistas/imagenes/usuarios/205.png', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mnt_partidas`
--
ALTER TABLE `mnt_partidas`
  ADD CONSTRAINT `fk_partidas_ctl_estado1` FOREIGN KEY (`estado_id`) REFERENCES `ctl_estado` (`id`),
  ADD CONSTRAINT `fk_partidas_ctl_grado1` FOREIGN KEY (`grado_id`) REFERENCES `ctl_grado` (`id`),
  ADD CONSTRAINT `fk_partidas_ctl_secciones1` FOREIGN KEY (`secciones_id`) REFERENCES `ctl_secciones` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
