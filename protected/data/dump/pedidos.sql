-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2013 a las 10:08:06
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `slug`, `id_padre`, `id_empresa`) VALUES
(1, 'Perifericos', 'perifericos31', NULL, 1),
(2, 'Ratones', 'ratones', 1, 1),
(3, 'Portatiles', 'portatiles', NULL, 1),
(5, 'Almacenamiento', 'almacenamiento', NULL, 1),
(6, 'Componentes', 'componentes', NULL, 1),
(7, 'Discos duros internos', 'discos-duros-internos', 5, 1),
(8, 'Discos duros externos', 'discos-duros-externos', 5, 1),
(9, 'Discos duros 3.5"', 'discos-duros-35', 7, 1),
(10, 'Discos duros 2.5"', 'discos-duros-25', 7, 1),
(11, 'Teclados', 'teclados', 1, 1),
(12, 'Altavoces', 'altavoces68', 1, 1),
(13, 'Webcams', 'webcams67', 1, 1),
(14, 'Discos duros externos 2,5"', 'discos-duros-externos-2,5"57', 8, 1);

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
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio',
  `cantidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Cantidad',
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`,`id_producto`),
  KEY `fk_lpedido_pedido` (`id_pedido`),
  KEY `fk_lpedido_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id_pedido`, `id_producto`, `precio`, `cantidad`, `orden`) VALUES
(31, 2, 34.12, 1, NULL),
(31, 8, 58.24, 1, NULL),
(32, 2, 34.12, 1, NULL),
(33, 2, 34.12, 1, NULL),
(34, 2, 34.12, 2, NULL),
(36, 2, 34.12, 1, NULL),
(36, 8, 58.24, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realizado` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Realizado',
  `fecha_realizado` datetime DEFAULT NULL COMMENT 'Fecha realizado',
  `fecha_finalizado` datetime DEFAULT NULL,
  `id_persona` int(11) NOT NULL COMMENT 'Persona',
  `iva` decimal(10,2) NOT NULL COMMENT 'IVA',
  `id_tipo_estado` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_persona` (`id_persona`),
  KEY `fk_pedido_tipo_estado` (`id_tipo_estado`),
  KEY `fk_pedido_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `realizado`, `fecha_realizado`, `fecha_finalizado`, `id_persona`, `iva`, `id_tipo_estado`, `id_empresa`) VALUES
(31, 0, '2013-10-14 12:24:44', NULL, 1, 0.21, NULL, 1),
(32, 0, '2013-10-14 12:27:33', NULL, 1, 0.21, 3, 1),
(33, 0, '2013-10-14 01:09:16', NULL, 1, 0.21, 3, 1),
(34, 0, '2013-10-14 01:10:39', NULL, 1, 0.21, 4, 1),
(35, 0, NULL, NULL, 1, 0.21, NULL, 1),
(36, 0, '2013-10-14 02:35:11', NULL, 1, 0.21, 4, 1),
(37, 0, NULL, NULL, 1, 0.21, NULL, 1),
(38, 0, NULL, NULL, 1, 0.21, NULL, 1),
(39, 0, NULL, NULL, 1, 0.21, NULL, 1),
(40, 0, NULL, NULL, 1, 0.21, NULL, 1),
(41, 0, NULL, NULL, 1, 0.21, NULL, 1),
(42, 0, NULL, NULL, 1, 0.21, NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `identidad`, `tipo_identidad`, `nombre`, `apellidos`, `direccion`, `email`) VALUES
(1, '47804265F', 'dni', 'Jose Luis', 'Orta', '', 'infoluis85@gmail.com');

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
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio',
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) NOT NULL COMMENT 'Empresa',
  `id_categoria` int(11) DEFAULT NULL COMMENT 'Categoria',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_producto_empresa` (`id_empresa`),
  KEY `fk_producto_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `slug`, `descripcion_corta`, `descripcion_larga`, `precio`, `imagen`, `id_empresa`, `id_categoria`) VALUES
(2, 'Logitech Touch Mouse T620', 'logitech-touch-mouse-t62046', 'Vea cómo puede desplazarse por Windows® 8 con seis gestos táctiles para una navegación rápida.', 'Superficie táctil completa para un control uniforme y preciso\r\n\r\nDisfrute de una navegación rápida y fluida dondequiera que descanse los dedos en la superficie táctil precisa. Pases, desplazamientos, toques y clics sin esfuerzo, para una experiencia eficiente y productiva.\r\n\r\n\r\nComodidad para los dedos.\r\n\r\nCon unas curvas diseñadas para la comodidad, este elegante Touch Mouse permite un manejo y gestos cómodos, durante horas y horas.\r\n\r\n\r\n', 34.12, '', 1, 11),
(8, 'ASUS AN300', 'asus-an300', 'Acabado en aluminio cepillado y con unos colores exquisitos, este disco duro externo con conectivida', '', 58.24, '902047055-asus-an300.jpg', 1, 8),
(9, 'Teclado Logitech Inalambrico', 'teclado-logitech-inalambrico-5', 'Un teclado inalambrico para que puedas disfrutar sin cables', '', 30.12, '', 1, 1),
(10, 'Pastel de chocolate', 'pastel-de-chocolate49', 'Pastel de chocolate', '', 10.20, '', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estado_pedido`
--

CREATE TABLE IF NOT EXISTS `tipo_estado_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_nombre_id_empresa` (`id_empresa`,`nombre`),
  KEY `fk_tipo_estado_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_estado_pedido`
--

INSERT INTO `tipo_estado_pedido` (`id`, `id_empresa`, `nombre`) VALUES
(4, 1, 'Finalizado'),
(3, 1, 'Realizado');

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
  ADD CONSTRAINT `fk_lpedido_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lpedido_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido_tipo_estado` FOREIGN KEY (`id_tipo_estado`) REFERENCES `tipo_estado_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_estado_pedido`
--
ALTER TABLE `tipo_estado_pedido`
  ADD CONSTRAINT `fk_tipo_estado_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
