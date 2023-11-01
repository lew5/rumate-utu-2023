-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-11-2023 a las 22:41:41
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rumate_db_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Ganado de Carne'),
(2, 'Caballos de Competición'),
(3, 'Ovejas de Lana Fina'),
(4, 'Ganado de Leche'),
(5, 'Caballos de Trabajo'),
(6, 'Ovejas de Carne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

DROP TABLE IF EXISTS `fichas`;
CREATE TABLE IF NOT EXISTS `fichas` (
  `id_ficha` int NOT NULL AUTO_INCREMENT,
  `cantidad_ficha` int NOT NULL,
  `raza_ficha` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_ficha` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id_ficha`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `cantidad_ficha`, `raza_ficha`, `descripcion_ficha`) VALUES
(1, 10, 'Angus', 'Lote de 10 vacas Angus de alta calidad.'),
(2, 5, 'Pura Sangre', '5 caballos de pura sangre para subasta.'),
(3, 15, 'Merino', '15 ovejas Merino en excelente estado.'),
(4, 20, 'Hereford', '20 vacas Hereford listas para el remate.'),
(5, 8, 'Árabes', '8 caballos árabes de competición.'),
(6, 12, 'Dorper', '12 ovejas Dorper en estado óptimo.'),
(7, 25, 'Holstein', 'Manada de 25 vacas Holstein de gran producción.'),
(8, 7, 'Clydesdale', '7 caballos Clydesdale para trabajo pesado.'),
(9, 30, 'Suffolk', '30 ovejas Suffolk de calidad superior.'),
(10, 15, 'Charolais', '15 vacas Charolais en excelente estado.'),
(11, 6, 'Appaloosa', '6 caballos Appaloosa con hermoso pelaje.'),
(12, 18, 'Rambouillet', '18 ovejas Rambouillet de lana fina.'),
(13, 40, 'Limousin', 'Manada de 40 vacas Limousin listas para el remate.'),
(14, 4, 'Percherones', '4 caballos Percherones de tiro pesado.'),
(15, 10, 'Romanov', '10 ovejas Romanov de alta fertilidad.'),
(16, 15, 'Brahman', '15 vacas Brahman adaptadas al calor.'),
(17, 8, 'Lipizzaner', '8 caballos Lipizzaner ideales para la equitación.'),
(18, 14, 'Lincoln', '14 ovejas Lincoln con lana de calidad.'),
(19, 35, 'Simmental', 'Manada de 35 vacas Simmental en excelente estado.'),
(20, 6, 'Frisones', '6 caballos Frisones con elegante pelaje negro.'),
(21, 20, 'Corriedale', '20 ovejas Corriedale de gran producción de lana.'),
(22, 12, 'Galloway', '12 vacas Galloway resistentes al clima frío.'),
(23, 5, 'Ándaluces', '5 caballos Ándaluces de alta destreza.'),
(24, 22, 'Targhee', '22 ovejas Targhee de lana suave y cálida.'),
(25, 30, 'Angus', 'Manada de 30 vacas Angus de excelente genética.'),
(26, 3, 'Belgas', '3 caballos Belgas de tiro fuerte.'),
(27, 10, 'Tunis', '10 ovejas Tunis resistentes y fértiles.'),
(28, 8, 'Shorthorn', '8 vacas Shorthorn de carne de calidad.'),
(29, 9, 'Akhal-Teke', '9 caballos Akhal-Teke con elegancia única.'),
(30, 16, 'Cheviot', '16 ovejas Cheviot de lana rizada.'),
(31, 27, 'Jersey', 'Manada de 27 vacas Jersey para producción de leche.'),
(32, 4, 'Percherones', '4 caballos Percherones de tiro pesado.'),
(33, 12, 'Rambouillet', '12 ovejas Rambouillet de lana fina.'),
(34, 38, 'Simmental', '38 vacas Simmental de gran tamaño.'),
(35, 5, 'Clydesdale', '5 caballos Clydesdale de trabajo pesado.'),
(36, 18, 'Merino', '18 ovejas Merino de lana fina y suave.'),
(37, 33, 'Limousin', 'Manada de 33 vacas Limousin listas para el remate.'),
(38, 6, 'Appaloosa', '6 caballos Appaloosa con hermoso pelaje.'),
(39, 14, 'Corriedale', '14 ovejas Corriedale de alta producción de lana.'),
(40, 28, 'Charolais', '28 vacas Charolais de carne de calidad.'),
(41, 7, 'Lusitanos', '7 caballos Lusitanos con elegante porte.'),
(42, 11, 'Targhee', '11 ovejas Targhee de lana suave y cálida.'),
(43, 40, 'Hereford', 'Manada de 40 vacas Hereford listas para el remate.'),
(44, 4, 'Clydesdale', '4 caballos Clydesdale para trabajo pesado.'),
(45, 9, 'Suffolk', '9 ovejas Suffolk de calidad superior.'),
(46, 20, 'Brahman', '20 vacas Brahman adaptadas al calor.'),
(47, 6, 'Akhal-Teke', '6 caballos Akhal-Teke con elegancia única.'),
(48, 13, 'Lincoln', '13 ovejas Lincoln con lana de calidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `id_lote` int NOT NULL AUTO_INCREMENT,
  `imagen_lote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_base_lote` decimal(10,2) NOT NULL,
  `mejor_oferta_lote` decimal(10,2) NOT NULL,
  `id_usuario_lote` int NOT NULL,
  `id_ficha_lote` int NOT NULL,
  `id_categoria_lote` int NOT NULL,
  PRIMARY KEY (`id_lote`),
  UNIQUE KEY `id_ficha_lote` (`id_ficha_lote`),
  KEY `id_usuario_lote` (`id_usuario_lote`),
  KEY `id_categoria_lote` (`id_categoria_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id_lote`, `imagen_lote`, `precio_base_lote`, `mejor_oferta_lote`, `id_usuario_lote`, `id_ficha_lote`, `id_categoria_lote`) VALUES
(1, 'imagen_lote1.jpg', '550.00', '0.00', 4, 1, 1),
(2, 'imagen_lote2.jpg', '800.00', '0.00', 4, 2, 2),
(3, 'imagen_lote3.jpg', '620.00', '0.00', 4, 3, 3),
(4, 'imagen_lote4.jpg', '460.00', '0.00', 4, 4, 1),
(5, 'imagen_lote5.jpg', '700.00', '0.00', 4, 5, 2),
(6, 'imagen_lote6.jpg', '580.00', '0.00', 4, 6, 3),
(7, 'imagen_lote7.jpg', '420.00', '0.00', 4, 7, 1),
(8, 'imagen_lote8.jpg', '750.00', '0.00', 4, 8, 2),
(9, 'imagen_lote9.jpg', '670.00', '0.00', 4, 9, 3),
(10, 'imagen_lote10.jpg', '480.00', '0.00', 4, 10, 1),
(11, 'imagen_lote11.jpg', '620.00', '0.00', 4, 11, 2),
(12, 'imagen_lote12.jpg', '540.00', '0.00', 4, 12, 3),
(13, 'imagen_lote13.jpg', '410.00', '0.00', 4, 13, 1),
(14, 'imagen_lote14.jpg', '680.00', '0.00', 4, 14, 2),
(15, 'imagen_lote15.jpg', '590.00', '0.00', 4, 15, 3),
(16, 'imagen_lote16.jpg', '450.00', '0.00', 4, 16, 1),
(17, 'imagen_lote17.jpg', '720.00', '0.00', 4, 17, 2),
(18, 'imagen_lote18.jpg', '630.00', '0.00', 4, 18, 3),
(19, 'imagen_lote19.jpg', '430.00', '0.00', 4, 19, 1),
(20, 'imagen_lote20.jpg', '770.00', '0.00', 4, 20, 2),
(21, 'imagen_lote21.jpg', '690.00', '0.00', 4, 21, 3),
(22, 'imagen_lote22.jpg', '490.00', '0.00', 4, 22, 1),
(23, 'imagen_lote23.jpg', '610.00', '0.00', 4, 23, 2),
(24, 'imagen_lote24.jpg', '550.00', '0.00', 4, 24, 3),
(25, 'imagen_lote25.jpg', '420.00', '0.00', 4, 25, 1),
(26, 'imagen_lote26.jpg', '720.00', '0.00', 4, 26, 2),
(27, 'imagen_lote27.jpg', '620.00', '0.00', 4, 27, 3),
(28, 'imagen_lote28.jpg', '440.00', '0.00', 4, 28, 1),
(29, 'imagen_lote29.jpg', '780.00', '0.00', 4, 29, 2),
(30, 'imagen_lote30.jpg', '670.00', '0.00', 4, 30, 3),
(31, 'imagen_lote31.jpg', '470.00', '0.00', 4, 31, 1),
(32, 'imagen_lote32.jpg', '730.00', '0.00', 4, 32, 2),
(33, 'imagen_lote33.jpg', '610.00', '0.00', 4, 33, 3),
(34, 'imagen_lote34.jpg', '460.00', '0.00', 4, 34, 1),
(35, 'imagen_lote35.jpg', '700.00', '0.00', 4, 35, 2),
(36, 'imagen_lote36.jpg', '590.00', '0.00', 4, 36, 3),
(37, 'imagen_lote37.jpg', '430.00', '0.00', 4, 37, 1),
(38, 'imagen_lote38.jpg', '760.00', '0.00', 4, 38, 2),
(39, 'imagen_lote39.jpg', '680.00', '0.00', 4, 39, 3),
(40, 'imagen_lote40.jpg', '480.00', '0.00', 4, 40, 1),
(41, 'imagen_lote41.jpg', '620.00', '0.00', 4, 41, 2),
(42, 'imagen_lote42.jpg', '540.00', '0.00', 4, 42, 3),
(43, 'imagen_lote43.jpg', '410.00', '0.00', 4, 43, 1),
(44, 'imagen_lote44.jpg', '700.00', '0.00', 4, 44, 2),
(45, 'imagen_lote45.jpg', '610.00', '0.00', 4, 45, 3),
(46, 'imagen_lote46.jpg', '440.00', '0.00', 4, 46, 1),
(47, 'imagen_lote47.jpg', '760.00', '0.00', 4, 47, 2),
(48, 'imagen_lote48.jpg', '670.00', '0.00', 4, 48, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes_postulan_remates`
--

DROP TABLE IF EXISTS `lotes_postulan_remates`;
CREATE TABLE IF NOT EXISTS `lotes_postulan_remates` (
  `id_remate_lote_postula_remate` int NOT NULL,
  `id_lote_lote_postula_remate` int NOT NULL,
  PRIMARY KEY (`id_remate_lote_postula_remate`,`id_lote_lote_postula_remate`),
  KEY `id_lote_lote_postula_remate` (`id_lote_lote_postula_remate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lotes_postulan_remates`
--

INSERT INTO `lotes_postulan_remates` (`id_remate_lote_postula_remate`, `id_lote_lote_postula_remate`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(4, 31),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `nombre_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_persona` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_persona` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_persona` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `ci_persona` (`ci_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre_persona`, `apellido_persona`, `ci_persona`, `barrio_persona`, `calle_persona`, `numero_persona`, `telefono_persona`, `estado_persona`) VALUES
(1, 'Juan', 'Perez', '12345678', 'Barrio A', 'Calle 1', '123', '123-456-789', 'Activo'),
(2, 'María', 'López', '87654321', 'Barrio B', 'Calle 2', '456', '987-654-321', 'Inactivo'),
(3, 'Pedro', 'García', '55555555', 'Barrio C', 'Calle 3', '789', '555-555-555', 'Activo'),
(4, 'Laura', 'Gómez', '98765432', 'Barrio D', 'Calle 4', '567', '222-333-444', 'Activo'),
(5, 'Carlos', 'López', '12344321', 'Barrio E', 'Calle 5', '678', '999-888-777', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

DROP TABLE IF EXISTS `pujas`;
CREATE TABLE IF NOT EXISTS `pujas` (
  `id_puja` int NOT NULL AUTO_INCREMENT,
  `monto_puja` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_puja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas_de_remates`
--

DROP TABLE IF EXISTS `pujas_de_remates`;
CREATE TABLE IF NOT EXISTS `pujas_de_remates` (
  `id_puja_puja_de_remate` int NOT NULL,
  `id_remate_puja_de_remate` int NOT NULL,
  `id_lote_puja_de_remate` int NOT NULL,
  PRIMARY KEY (`id_puja_puja_de_remate`,`id_remate_puja_de_remate`,`id_lote_puja_de_remate`),
  KEY `id_remate_puja_de_remate` (`id_remate_puja_de_remate`),
  KEY `id_lote_puja_de_remate` (`id_lote_puja_de_remate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas_de_usuarios`
--

DROP TABLE IF EXISTS `pujas_de_usuarios`;
CREATE TABLE IF NOT EXISTS `pujas_de_usuarios` (
  `id_puja_puja_de_persona` int NOT NULL,
  `id_usuario_puja_de_usuario` int NOT NULL,
  PRIMARY KEY (`id_puja_puja_de_persona`,`id_usuario_puja_de_usuario`),
  KEY `id_usuario_puja_de_usuario` (`id_usuario_puja_de_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remates`
--

DROP TABLE IF EXISTS `remates`;
CREATE TABLE IF NOT EXISTS `remates` (
  `id_remate` int NOT NULL AUTO_INCREMENT,
  `titulo_remate` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_remate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio_remate` datetime NOT NULL,
  `fecha_final_remate` datetime NOT NULL,
  `estado_remate` enum('Pendiente','Rematando','Finalizado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id_remate`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `remates`
--

INSERT INTO `remates` (`id_remate`, `titulo_remate`, `imagen_remate`, `fecha_inicio_remate`, `fecha_final_remate`, `estado_remate`) VALUES
(1, 'Gran Subasta de Ganado', 'imagen_remate1.jpg', '2023-11-10 09:00:00', '2023-11-11 17:00:00', 'Pendiente'),
(2, 'Subasta de Caballos y Yeguas', 'imagen_remate2.jpg', '2023-11-12 10:00:00', '2023-11-13 18:00:00', 'Pendiente'),
(3, 'Remate de Ovejas Merino', 'imagen_remate3.jpg', '2023-11-15 08:00:00', '2023-11-16 16:00:00', 'Pendiente'),
(4, 'Gran Remate de Ganado Angus', 'imagen_remate4.jpg', '2023-11-20 09:30:00', '2023-11-21 17:30:00', 'Pendiente'),
(5, 'Subasta de Potros Pura Sangre', 'imagen_remate5.jpg', '2023-11-22 10:15:00', '2023-11-23 18:15:00', 'Pendiente'),
(6, 'Venta de Ovejas Dorper', 'imagen_remate6.jpg', '2023-11-25 07:45:00', '2023-11-26 15:45:00', 'Pendiente'),
(7, 'Gran Remate de Vacas Holstein', 'imagen_remate7.jpg', '2023-11-28 08:30:00', '2023-11-29 16:30:00', 'Pendiente'),
(8, 'Subasta de Caballos Frisones', 'imagen_remate8.jpg', '2023-12-02 10:45:00', '2023-12-03 18:45:00', 'Pendiente'),
(9, 'Venta de Ovejas Suffolk', 'imagen_remate9.jpg', '2023-12-05 07:30:00', '2023-12-06 15:30:00', 'Pendiente'),
(10, 'Gran Remate de Ganado Charolais', 'imagen_remate10.jpg', '2023-12-10 09:15:00', '2023-12-11 17:15:00', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `username_usuario` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_usuario` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_usuario` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usuario` enum('ROOT','ADMINISTRADOR','CLIENTE','PROVEEDOR','REMATADOR') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CLIENTE',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `username_usuario` (`username_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username_usuario`, `password_usuario`, `email_usuario`, `imagen_usuario`, `tipo_usuario`) VALUES
(1, 'root', '$2y$10$C0bPJ9Itstkm4eDlsd52QuVDkR4oH3gPVgdp0usmS81qho8YSxOTi', 'root@example.com', NULL, 'ROOT'),
(2, 'admin', '$2y$10$hbjEYjPcKVQ2.IIX4DWk5eJGEOIDAZx.vaf39ILQ1iEFwmBtMSCPi', 'admin@example.com', NULL, 'ADMINISTRADOR'),
(3, 'cliente', '$2y$10$xoTV71k203SRSjR/B1zkPurXezKwWExF8Vt4rXKF7vyzo1YjVj1d6', 'cliente@example.com', NULL, 'CLIENTE'),
(4, 'proveedor', '$2y$10$Bpjp/rLggmhvv1wwHv.7C.kyb2dT/Gf3qMR3.oUQskEjGP3xrxrhi', 'proveedor@example.com', NULL, 'PROVEEDOR'),
(5, 'rematador', '$2y$10$E/loDqHzCjJ1X13oR6FIuOxELntpmwGWmUrzsVbOYYnwG1t8ULxhG', 'rematador@example.com', NULL, 'REMATADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_de_personas`
--

DROP TABLE IF EXISTS `usuarios_de_personas`;
CREATE TABLE IF NOT EXISTS `usuarios_de_personas` (
  `id_usuario_usuarios_de_personas` int NOT NULL,
  `id_persona_usuarios_de_persona` int NOT NULL,
  PRIMARY KEY (`id_usuario_usuarios_de_personas`,`id_persona_usuarios_de_persona`),
  UNIQUE KEY `id_persona_usuarios_de_persona` (`id_persona_usuarios_de_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_de_personas`
--

INSERT INTO `usuarios_de_personas` (`id_usuario_usuarios_de_personas`, `id_persona_usuarios_de_persona`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`id_usuario_lote`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `lotes_ibfk_2` FOREIGN KEY (`id_ficha_lote`) REFERENCES `fichas` (`id_ficha`),
  ADD CONSTRAINT `lotes_ibfk_3` FOREIGN KEY (`id_categoria_lote`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `lotes_postulan_remates`
--
ALTER TABLE `lotes_postulan_remates`
  ADD CONSTRAINT `lotes_postulan_remates_ibfk_1` FOREIGN KEY (`id_remate_lote_postula_remate`) REFERENCES `remates` (`id_remate`),
  ADD CONSTRAINT `lotes_postulan_remates_ibfk_2` FOREIGN KEY (`id_lote_lote_postula_remate`) REFERENCES `lotes` (`id_lote`);

--
-- Filtros para la tabla `pujas_de_remates`
--
ALTER TABLE `pujas_de_remates`
  ADD CONSTRAINT `pujas_de_remates_ibfk_1` FOREIGN KEY (`id_puja_puja_de_remate`) REFERENCES `pujas` (`id_puja`),
  ADD CONSTRAINT `pujas_de_remates_ibfk_2` FOREIGN KEY (`id_remate_puja_de_remate`) REFERENCES `remates` (`id_remate`),
  ADD CONSTRAINT `pujas_de_remates_ibfk_3` FOREIGN KEY (`id_lote_puja_de_remate`) REFERENCES `lotes` (`id_lote`);

--
-- Filtros para la tabla `pujas_de_usuarios`
--
ALTER TABLE `pujas_de_usuarios`
  ADD CONSTRAINT `pujas_de_usuarios_ibfk_1` FOREIGN KEY (`id_puja_puja_de_persona`) REFERENCES `pujas` (`id_puja`),
  ADD CONSTRAINT `pujas_de_usuarios_ibfk_2` FOREIGN KEY (`id_usuario_puja_de_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios_de_personas`
--
ALTER TABLE `usuarios_de_personas`
  ADD CONSTRAINT `usuarios_de_personas_ibfk_1` FOREIGN KEY (`id_usuario_usuarios_de_personas`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_de_personas_ibfk_2` FOREIGN KEY (`id_persona_usuarios_de_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
