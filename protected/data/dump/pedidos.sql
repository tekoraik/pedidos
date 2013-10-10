-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2013 a las 23:41:16
-- Versión del servidor: 5.5.32-0ubuntu0.13.04.1
-- Versión de PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_categoria_padre` (`id_padre`),
  KEY `fk_categoria_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `slug`, `id_padre`, `id_empresa`) VALUES
(1, 'Perifericos', 'perifericos', NULL, 1),
(2, 'Ratones', 'ratones', 1, 1),
(3, 'Portatiles', 'portatiles', NULL, 1),
(5, 'Almacenamiento', 'almacenamiento', NULL, 1),
(6, 'Componentes', 'componentes', NULL, 1),
(7, 'Discos duros internos', 'discos-duros-internos', 5, 1),
(8, 'Discos duros externos', 'discos-duros-externos', 5, 1),
(9, 'Discos duros 3.5"', 'discos-duros-35', 7, 1),
(10, 'Discos duros 2.5"', 'discos-duros-25', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `slug` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Slug',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `slug`) VALUES
(1, 'Computer Purchases', 'computer-purchases'),
(2, 'Empresa de prueba 2', 'empresa-de-prueba-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE IF NOT EXISTS `linea_pedido` (
  `id_pedido` int(11) NOT NULL COMMENT 'Pedido',
  `id_producto` int(11) NOT NULL COMMENT 'Producto',
  `orden` int(11) NOT NULL COMMENT 'Numero de orden',
  `precio` decimal(10,0) NOT NULL COMMENT 'Precio',
  `cantidad` int(11) NOT NULL DEFAULT '1' COMMENT 'Cantidad',
  PRIMARY KEY (`id_pedido`,`id_producto`),
  KEY `fk_lpedido_pedido` (`id_pedido`),
  KEY `fk_lpedido_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realizado` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Realizado',
  `fecha_realizado` datetime DEFAULT NULL COMMENT 'Fecha realizado',
  `id_persona` int(11) NOT NULL COMMENT 'Persona',
  `iva` decimal(10,0) NOT NULL COMMENT 'IVA',
  PRIMARY KEY (`id`),
  KEY `fk_pedido_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Documento de identidad',
  `tipo_identidad` enum('dni','pasaporte') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'dni' COMMENT 'Tipo de documento',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellidos',
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Dirección postal\n',
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'E-mail',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_IDENTIDAD_TIPO_IDENTIDAD` (`identidad`,`tipo_identidad`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `slug` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Slug',
  `descripcion_corta` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción corta',
  `descripcion_larga` text COLLATE utf8_spanish_ci COMMENT 'Descripción larga',
  `precio` decimal(10,0) NOT NULL COMMENT 'Precio',
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) NOT NULL COMMENT 'Empresa',
  `id_categoria` int(11) DEFAULT NULL COMMENT 'Categoria',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_producto_empresa` (`id_empresa`),
  KEY `fk_producto_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `slug`, `descripcion_corta`, `descripcion_larga`, `precio`, `imagen`, `id_empresa`, `id_categoria`) VALUES
(2, 'Logitech Touch Mouse T620', 'logitech-touch-mouse-t620', 'Vea cómo puede desplazarse por Windows® 8 con seis gestos táctiles para una navegación rápida.', 'Superficie táctil completa para un control uniforme y preciso\r\n\r\nDisfrute de una navegación rápida y fluida dondequiera que descanse los dedos en la superficie táctil precisa. Pases, desplazamientos, toques y clics sin esfuerzo, para una experiencia eficiente y productiva.\r\n\r\n\r\nComodidad para los dedos.\r\n\r\nCon unas curvas diseñadas para la comodidad, este elegante Touch Mouse permite un manejo y gestos cómodos, durante horas y horas.\r\n\r\n\r\n', 34, NULL, 1, 1),
(8, 'ASUS AN300', 'asus-an300', 'Acabado en aluminio cepillado y con unos colores exquisitos, este disco duro externo con conectivida', '', 58, '1659651160-asus-an300.jpg', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categoria_padre` FOREIGN KEY (`id_padre`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD CONSTRAINT `fk_lpedido_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
