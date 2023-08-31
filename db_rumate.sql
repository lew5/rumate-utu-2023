-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-08-2023 a las 21:55:28
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
-- Base de datos: `db_rumate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

DROP TABLE IF EXISTS `animales`;
CREATE TABLE IF NOT EXISTS `animales` (
  `idAnimal` int NOT NULL AUTO_INCREMENT,
  `idClienteProveedor_animal` int DEFAULT NULL,
  `idLote_animal` int DEFAULT NULL,
  `sexo_animal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raza_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad_animal_animal` int DEFAULT NULL,
  `peso_animal` decimal(10,2) DEFAULT NULL,
  `especie_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idAnimal`),
  KEY `idClienteProveedor_animal` (`idClienteProveedor_animal`),
  KEY `idLote_animal` (`idLote_animal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales_ingresados`
--

DROP TABLE IF EXISTS `animales_ingresados`;
CREATE TABLE IF NOT EXISTS `animales_ingresados` (
  `idAnimal_animalIngresado` int NOT NULL,
  `idEmpleado_animalIngresado` int DEFAULT NULL,
  PRIMARY KEY (`idAnimal_animalIngresado`),
  KEY `idEmpleado_animalIngresado` (`idEmpleado_animalIngresado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_proveedores`
--

DROP TABLE IF EXISTS `clientes_proveedores`;
CREATE TABLE IF NOT EXISTS `clientes_proveedores` (
  `idPersona_clienteProvevedor` int NOT NULL,
  `estado_cliente_proveedor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPersona_clienteProvevedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `idPersona_empleado` int NOT NULL,
  `idPermiso_empleado` int DEFAULT NULL,
  PRIMARY KEY (`idPersona_empleado`),
  KEY `idPermiso_empleado` (`idPermiso_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `idLote` int NOT NULL AUTO_INCREMENT,
  `idEmpleado_lote` int DEFAULT NULL,
  `precio_base_lote` decimal(10,2) DEFAULT NULL,
  `precio_final_lote` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idLote`),
  KEY `idEmpleado_lote` (`idEmpleado_lote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes_postulan_remates`
--

DROP TABLE IF EXISTS `lotes_postulan_remates`;
CREATE TABLE IF NOT EXISTS `lotes_postulan_remates` (
  `idRemate_lotePostulaRemate` int NOT NULL,
  `idLote_lotePostulaRemate` int NOT NULL,
  `idEmpleado_lotePostulaRemate` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idRemate_lotePostulaRemate`,`idLote_lotePostulaRemate`),
  KEY `idLote_lotePostulaRemate` (`idLote_lotePostulaRemate`),
  KEY `idEmpleado_lotePostulaRemate` (`idEmpleado_lotePostulaRemate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `idPermiso` int NOT NULL AUTO_INCREMENT,
  `nombre_permiso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `idPersona` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `número` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teléfono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

DROP TABLE IF EXISTS `pujas`;
CREATE TABLE IF NOT EXISTS `pujas` (
  `idPuja` int NOT NULL AUTO_INCREMENT,
  `monto_puja` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idPuja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas_de_clientes_proveedores`
--

DROP TABLE IF EXISTS `pujas_de_clientes_proveedores`;
CREATE TABLE IF NOT EXISTS `pujas_de_clientes_proveedores` (
  `idPujaDeRemate_pujaDeClienteProveedor` int NOT NULL,
  `idClienteProveedor_pujaDeclienteProveedor` int DEFAULT NULL,
  PRIMARY KEY (`idPujaDeRemate_pujaDeClienteProveedor`),
  KEY `idClienteProveedor_pujaDeclienteProveedor` (`idClienteProveedor_pujaDeclienteProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas_de_remates`
--

DROP TABLE IF EXISTS `pujas_de_remates`;
CREATE TABLE IF NOT EXISTS `pujas_de_remates` (
  `idPujaDeRemate_puja` int NOT NULL,
  `idRemate_pujasDeRemate` int DEFAULT NULL,
  `idLote_pujasDeRemate` int DEFAULT NULL,
  `idEmpleado` int DEFAULT NULL,
  `fecha_puja_de_remate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPujaDeRemate_puja`),
  KEY `idRemate_pujasDeRemate` (`idRemate_pujasDeRemate`),
  KEY `idLote_pujasDeRemate` (`idLote_pujasDeRemate`),
  KEY `idEmpleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remates`
--

DROP TABLE IF EXISTS `remates`;
CREATE TABLE IF NOT EXISTS `remates` (
  `idRemate` int NOT NULL AUTO_INCREMENT,
  `idEmpleado_remate` int DEFAULT NULL,
  `estado_remate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idRemate`),
  KEY `idEmpleado_remate` (`idEmpleado_remate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idPersona_usuario` int DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `idPersona_usuario` (`idPersona_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animales`
--
ALTER TABLE `animales`
  ADD CONSTRAINT `animales_ibfk_1` FOREIGN KEY (`idClienteProveedor_animal`) REFERENCES `clientes_proveedores` (`idPersona_clienteProvevedor`),
  ADD CONSTRAINT `animales_ibfk_2` FOREIGN KEY (`idLote_animal`) REFERENCES `lotes` (`idLote`);

--
-- Filtros para la tabla `animales_ingresados`
--
ALTER TABLE `animales_ingresados`
  ADD CONSTRAINT `animales_ingresados_ibfk_1` FOREIGN KEY (`idAnimal_animalIngresado`) REFERENCES `animales` (`idAnimal`),
  ADD CONSTRAINT `animales_ingresados_ibfk_2` FOREIGN KEY (`idEmpleado_animalIngresado`) REFERENCES `empleados` (`idPersona_empleado`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idPersona_empleado`) REFERENCES `personas` (`idPersona`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`idPermiso_empleado`) REFERENCES `permisos` (`idPermiso`);

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`idEmpleado_lote`) REFERENCES `empleados` (`idPersona_empleado`);

--
-- Filtros para la tabla `lotes_postulan_remates`
--
ALTER TABLE `lotes_postulan_remates`
  ADD CONSTRAINT `lotes_postulan_remates_ibfk_1` FOREIGN KEY (`idRemate_lotePostulaRemate`) REFERENCES `remates` (`idRemate`),
  ADD CONSTRAINT `lotes_postulan_remates_ibfk_2` FOREIGN KEY (`idLote_lotePostulaRemate`) REFERENCES `lotes` (`idLote`),
  ADD CONSTRAINT `lotes_postulan_remates_ibfk_3` FOREIGN KEY (`idEmpleado_lotePostulaRemate`) REFERENCES `empleados` (`idPersona_empleado`);

--
-- Filtros para la tabla `pujas_de_clientes_proveedores`
--
ALTER TABLE `pujas_de_clientes_proveedores`
  ADD CONSTRAINT `pujas_de_clientes_proveedores_ibfk_1` FOREIGN KEY (`idClienteProveedor_pujaDeclienteProveedor`) REFERENCES `clientes_proveedores` (`idPersona_clienteProvevedor`);

--
-- Filtros para la tabla `pujas_de_remates`
--
ALTER TABLE `pujas_de_remates`
  ADD CONSTRAINT `pujas_de_remates_ibfk_1` FOREIGN KEY (`idRemate_pujasDeRemate`) REFERENCES `remates` (`idRemate`),
  ADD CONSTRAINT `pujas_de_remates_ibfk_2` FOREIGN KEY (`idLote_pujasDeRemate`) REFERENCES `lotes` (`idLote`),
  ADD CONSTRAINT `pujas_de_remates_ibfk_3` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idPersona_empleado`);

--
-- Filtros para la tabla `remates`
--
ALTER TABLE `remates`
  ADD CONSTRAINT `remates_ibfk_1` FOREIGN KEY (`idEmpleado_remate`) REFERENCES `empleados` (`idPersona_empleado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPersona_usuario`) REFERENCES `personas` (`idPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
