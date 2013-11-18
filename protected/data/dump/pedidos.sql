-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2013 a las 02:04:48
-- Versión del servidor: 5.5.34-0ubuntu0.13.04.1
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
-- Estructura de tabla para la tabla `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('AdminEmpresa', '2', NULL, 'N;'),
('Cliente', '3', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Admin.Categoria.*', 1, NULL, NULL, 'N;'),
('Admin.Categoria.Admin', 0, NULL, NULL, 'N;'),
('Admin.Categoria.Create', 0, NULL, NULL, 'N;'),
('Admin.Categoria.Delete', 0, NULL, NULL, 'N;'),
('Admin.Categoria.Index', 0, NULL, NULL, 'N;'),
('Admin.Categoria.Update', 0, NULL, NULL, 'N;'),
('Admin.Categoria.View', 0, NULL, NULL, 'N;'),
('Admin.Default.*', 1, NULL, NULL, 'N;'),
('Admin.Default.Index', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.*', 1, NULL, NULL, 'N;'),
('Admin.Descriptor.Admin', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.Create', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.Delete', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.Index', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.Update', 0, NULL, NULL, 'N;'),
('Admin.Descriptor.View', 0, NULL, NULL, 'N;'),
('Admin.Empresa.*', 1, NULL, NULL, 'N;'),
('Admin.Empresa.Admin', 0, NULL, NULL, 'N;'),
('Admin.Empresa.Create', 0, NULL, NULL, 'N;'),
('Admin.Empresa.Delete', 0, NULL, NULL, 'N;'),
('Admin.Empresa.Index', 0, NULL, NULL, 'N;'),
('Admin.Empresa.Update', 0, NULL, NULL, 'N;'),
('Admin.Empresa.View', 0, NULL, NULL, 'N;'),
('Admin.Pedido.*', 1, NULL, NULL, 'N;'),
('Admin.Pedido.Admin', 0, NULL, NULL, 'N;'),
('Admin.Pedido.Create', 0, NULL, NULL, 'N;'),
('Admin.Pedido.Delete', 0, NULL, NULL, 'N;'),
('Admin.Pedido.Index', 0, NULL, NULL, 'N;'),
('Admin.Pedido.Update', 0, NULL, NULL, 'N;'),
('Admin.Pedido.View', 0, NULL, NULL, 'N;'),
('Admin.Producto.*', 1, NULL, NULL, 'N;'),
('Admin.Producto.Admin', 0, NULL, NULL, 'N;'),
('Admin.Producto.Create', 0, NULL, NULL, 'N;'),
('Admin.Producto.Delete', 0, NULL, NULL, 'N;'),
('Admin.Producto.Index', 0, NULL, NULL, 'N;'),
('Admin.Producto.Update', 0, NULL, NULL, 'N;'),
('Admin.Producto.View', 0, NULL, NULL, 'N;'),
('AdminEmpresa', 2, 'Administrador de empresa', 'return Yii::app()->empresa->usuarioEsAdministrador();', 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Categoria.*', 1, NULL, NULL, 'N;'),
('Categoria.Admin', 0, NULL, NULL, 'N;'),
('Categoria.Create', 0, NULL, NULL, 'N;'),
('Categoria.Delete', 0, NULL, NULL, 'N;'),
('Categoria.Index', 0, NULL, NULL, 'N;'),
('Categoria.Update', 0, NULL, NULL, 'N;'),
('Categoria.View', 0, NULL, NULL, 'N;'),
('Cliente', 2, 'Cliente Final', 'return Yii::app()->empresa->usuarioEsCliente();', 'N;'),
('Descriptor.*', 1, NULL, NULL, 'N;'),
('Descriptor.Admin', 0, NULL, NULL, 'N;'),
('Descriptor.Create', 0, NULL, NULL, 'N;'),
('Descriptor.Delete', 0, NULL, NULL, 'N;'),
('Descriptor.Index', 0, NULL, NULL, 'N;'),
('Descriptor.Update', 0, NULL, NULL, 'N;'),
('Descriptor.View', 0, NULL, NULL, 'N;'),
('Empresa.*', 1, NULL, NULL, 'N;'),
('Empresa.Admin', 0, NULL, NULL, 'N;'),
('Empresa.Create', 0, NULL, NULL, 'N;'),
('Empresa.Delete', 0, NULL, NULL, 'N;'),
('Empresa.Index', 0, NULL, NULL, 'N;'),
('Empresa.Update', 0, NULL, NULL, 'N;'),
('Empresa.View', 0, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('LineaPedido.*', 1, NULL, NULL, 'N;'),
('LineaPedido.Admin', 0, NULL, NULL, 'N;'),
('LineaPedido.Create', 0, NULL, NULL, 'N;'),
('LineaPedido.Delete', 0, NULL, NULL, 'N;'),
('LineaPedido.Index', 0, NULL, NULL, 'N;'),
('LineaPedido.Update', 0, NULL, NULL, 'N;'),
('LineaPedido.View', 0, NULL, NULL, 'N;'),
('Pedido.*', 1, NULL, NULL, 'N;'),
('Pedido.AddProducto', 0, NULL, NULL, 'N;'),
('Pedido.Admin', 0, NULL, NULL, 'N;'),
('Pedido.Create', 0, NULL, NULL, 'N;'),
('Pedido.Delete', 0, NULL, NULL, 'N;'),
('Pedido.Index', 0, NULL, NULL, 'N;'),
('Pedido.Realizar', 0, NULL, NULL, 'N;'),
('Pedido.Update', 0, NULL, NULL, 'N;'),
('Pedido.VerPedidoActual', 0, NULL, NULL, 'N;'),
('Pedido.View', 0, NULL, NULL, 'N;'),
('Producto.*', 1, NULL, NULL, 'N;'),
('Producto.Admin', 0, NULL, NULL, 'N;'),
('Producto.Create', 0, NULL, NULL, 'N;'),
('Producto.Delete', 0, NULL, NULL, 'N;'),
('Producto.Index', 0, NULL, NULL, 'N;'),
('Producto.Update', 0, NULL, NULL, 'N;'),
('Producto.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.*', 1, NULL, NULL, 'N;'),
('TipoEstadoPedido.Admin', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.Create', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.Delete', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.Index', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.Update', 0, NULL, NULL, 'N;'),
('TipoEstadoPedido.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('AdminEmpresa', 'Categoria.Admin'),
('AdminEmpresa', 'Categoria.Create'),
('AdminEmpresa', 'Categoria.Delete'),
('AdminEmpresa', 'Categoria.Index'),
('AdminEmpresa', 'Categoria.Update'),
('AdminEmpresa', 'Categoria.View'),
('AdminEmpresa', 'Descriptor.Admin'),
('AdminEmpresa', 'Descriptor.Create'),
('AdminEmpresa', 'Descriptor.Delete'),
('AdminEmpresa', 'Descriptor.Index'),
('AdminEmpresa', 'Descriptor.Update'),
('AdminEmpresa', 'Descriptor.View'),
('AdminEmpresa', 'Empresa.Admin'),
('AdminEmpresa', 'Empresa.Create'),
('AdminEmpresa', 'Empresa.Delete'),
('AdminEmpresa', 'Empresa.Index'),
('AdminEmpresa', 'Empresa.Update'),
('AdminEmpresa', 'Empresa.View'),
('AdminEmpresa', 'Pedido.Admin'),
('AdminEmpresa', 'Pedido.Delete'),
('AdminEmpresa', 'Pedido.Index'),
('Cliente', 'Pedido.Realizar'),
('AdminEmpresa', 'Pedido.Update'),
('AdminEmpresa', 'Producto.Admin'),
('AdminEmpresa', 'Producto.Create'),
('AdminEmpresa', 'Producto.Delete'),
('Authenticated', 'Producto.Index'),
('AdminEmpresa', 'Producto.Update'),
('AdminEmpresa', 'Producto.View'),
('Authenticated', 'Producto.View'),
('AdminEmpresa', 'TipoEstadoPedido.Admin'),
('AdminEmpresa', 'TipoEstadoPedido.Create'),
('AdminEmpresa', 'TipoEstadoPedido.Delete'),
('AdminEmpresa', 'TipoEstadoPedido.Index'),
('AdminEmpresa', 'TipoEstadoPedido.Update'),
('AdminEmpresa', 'TipoEstadoPedido.View');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

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
(14, 'Discos duros externos 2,5"', 'discos-duros-externos-2,5"57', 8, 1),
(15, 'Monitores', 'monitores39', NULL, 1),
(16, 'TFT', 'tft87', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `describible`
--

CREATE TABLE IF NOT EXISTS `describible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('producto','pedido') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `describible`
--

INSERT INTO `describible` (`id`, `tipo`) VALUES
(1, 'pedido'),
(2, 'pedido'),
(3, 'producto'),
(4, 'producto'),
(5, 'producto'),
(6, 'producto'),
(7, 'producto'),
(8, 'producto'),
(9, 'producto'),
(10, 'producto'),
(11, 'producto'),
(12, 'producto'),
(13, 'producto'),
(14, 'producto'),
(15, 'producto'),
(16, 'producto'),
(17, 'producto'),
(18, 'pedido'),
(19, 'pedido'),
(20, 'pedido'),
(21, 'pedido'),
(22, 'pedido'),
(23, 'pedido'),
(24, 'pedido'),
(25, 'pedido'),
(26, 'pedido'),
(27, 'pedido'),
(28, 'pedido'),
(29, 'pedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descriptor`
--

CREATE TABLE IF NOT EXISTS `descriptor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_valor` enum('entero','cadena','fecha','decimal','formula') COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_descriptor_categoria` (`id_categoria`),
  KEY `fk_descriptor_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `descriptor`
--

INSERT INTO `descriptor` (`id`, `nombre`, `tipo`, `tipo_valor`, `id_categoria`, `id_empresa`) VALUES
(1, 'Consumo', 'producto', 'cadena', NULL, 1),
(3, 'Empleado', 'pedido', 'cadena', NULL, 1),
(4, 'Departamento', 'pedido', 'cadena', NULL, 1),
(6, 'Pulgadas', 'producto', 'cadena', 16, 1),
(7, 'Conexion', 'producto', 'cadena', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `slug` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Slug',
  `id_usuario_administrador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_empresa_usuario_admin` (`id_usuario_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `slug`, `id_usuario_administrador`) VALUES
(1, 'Computer Purchases', 'computer-purchases', 2),
(2, 'Empresa de prueba 2', 'empresa-de-prueba-2', NULL);

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
(1, 1, 34.12, 1, NULL),
(18, 1, 34.12, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `realizado` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Realizado',
  `fecha_realizado` datetime DEFAULT NULL COMMENT 'Fecha realizado',
  `fecha_finalizado` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'Persona',
  `iva` decimal(10,2) NOT NULL COMMENT 'IVA',
  `id_tipo_estado` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_persona` (`id_usuario`),
  KEY `fk_pedido_tipo_estado` (`id_tipo_estado`),
  KEY `fk_pedido_empresa` (`id_empresa`),
  KEY `fk_pedido_describible` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `realizado`, `fecha_realizado`, `fecha_finalizado`, `id_usuario`, `iva`, `id_tipo_estado`, `id_empresa`) VALUES
(1, 0, NULL, NULL, 1, 0.21, NULL, 1),
(2, 0, NULL, NULL, 1, 0.21, NULL, 1),
(18, 0, '2013-11-17 11:54:34', NULL, 1, 0.21, 5, 1),
(19, 0, NULL, NULL, 1, 0.21, NULL, 1),
(20, 0, NULL, NULL, 1, 0.21, NULL, 1),
(21, 0, NULL, NULL, 1, 0.21, NULL, 1),
(22, 0, NULL, NULL, 1, 0.21, NULL, 1),
(23, 0, NULL, NULL, 1, 0.21, NULL, 1),
(24, 0, NULL, NULL, 1, 0.21, NULL, 1),
(25, 0, NULL, NULL, 1, 0.21, NULL, 1),
(26, 0, NULL, NULL, 1, 0.21, NULL, 1),
(27, 0, NULL, NULL, 1, 0.21, NULL, 1),
(28, 0, NULL, NULL, 1, 0.21, NULL, 1),
(29, 0, NULL, NULL, 1, 0.21, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
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
  KEY `fk_producto_categoria` (`id_categoria`),
  KEY `fk_producto_describible` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `slug`, `descripcion_corta`, `descripcion_larga`, `precio`, `imagen`, `id_empresa`, `id_categoria`) VALUES
(1, 'Logitech Touch Mouse T620', 'logitech-touch-mouse-t62046', 'Vea cómo puede desplazarse por Windows® 8 con seis gestos táctiles para una navegación rápida.', 'Superficie táctil completa para un control uniforme y preciso\r\n\r\nDisfrute de una navegación rápida y fluida dondequiera que descanse los dedos en la superficie táctil precisa. Pases, desplazamientos, toques y clics sin esfuerzo, para una experiencia eficiente y productiva.\r\n\r\n\r\nComodidad para los dedos.\r\n\r\nCon unas curvas diseñadas para la comodidad, este elegante Touch Mouse permite un manejo y gestos cómodos, durante horas y horas.\r\n\r\n\r\n', 34.12, '', 1, 11),
(2, 'ASUS AN300 HD', 'asus-an300-hd51', 'Acabado en aluminio cepillado y con unos colores exquisitos, este disco duro externo con conectivida', '', 58.24, '', 1, 8),
(3, 'Teclado Logitech Inalambrico', 'teclado-logitech-inalambrico-5', 'Un teclado inalambrico para que puedas disfrutar sin cables', '', 30.12, '', 1, 1),
(4, 'Pastel de chocolate', 'pastel-de-chocolate49', 'Pastel de chocolate', '', 10.20, '', 2, NULL),
(15, 'sdafa', 'sdafa72', 'asdfa', '', 1.00, '', 1, 1),
(16, 'Producto de prueba 1', 'producto-de-prueba-12', 'Producto de prueba 1', '', 1.00, '', 1, NULL),
(17, 'Producto de prueba 2', 'producto-de-prueba-210', 'Producto de prueba 2', '', 2.00, '', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_estado_pedido`
--

INSERT INTO `tipo_estado_pedido` (`id`, `id_empresa`, `nombre`) VALUES
(5, 1, 'En progreso'),
(4, 1, 'Finalizado'),
(3, 1, 'Realizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Documento de identidad',
  `tipo_identidad` enum('dni','pasaporte') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'dni' COMMENT 'Tipo de documento',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellidos',
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Dirección postal\n',
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'E-mail',
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_IDENTIDAD_TIPO_IDENTIDAD` (`identidad`,`tipo_identidad`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_persona_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `identidad`, `tipo_identidad`, `nombre`, `apellidos`, `direccion`, `email`, `password`, `id_empresa`) VALUES
(1, '47804265F', 'dni', 'Jose Luis', 'Orta', '', 'infoluis85@gmail.com', '2aWk6wCDwx81s', NULL),
(2, '11111111A', 'dni', 'Pablo', 'Hernandez', '', 'adminempresa@mail.com', '2aWk6wCDwx81s', 1),
(3, '22222222A', 'dni', 'Marta', 'Pelaez', '', 'clienteempresa@mail.com', '2aWk6wCDwx81s', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_descriptor`
--

CREATE TABLE IF NOT EXISTS `valor_descriptor` (
  `id_descriptor` int(11) NOT NULL,
  `id_describible` int(11) NOT NULL,
  `valor` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` enum('entero','cadena','fecha','decimal','formula') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_descriptor`,`id_describible`),
  KEY `fk_valor_descriptor_descriptor` (`id_descriptor`),
  KEY `fk_valor_descriptor_describible` (`id_describible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valor_descriptor`
--

INSERT INTO `valor_descriptor` (`id_descriptor`, `id_describible`, `valor`, `tipo`) VALUES
(1, 15, '', 'cadena'),
(1, 16, '20', 'cadena'),
(1, 17, 'prueba2b', 'cadena'),
(3, 18, 'Pablo', 'cadena'),
(4, 18, 'Calidad', 'cadena'),
(6, 15, '', 'cadena'),
(7, 15, 'USB', 'cadena');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categoria_padre` FOREIGN KEY (`id_padre`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `descriptor`
--
ALTER TABLE `descriptor`
  ADD CONSTRAINT `fk_descriptor_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_descriptor_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_pedido_describible` FOREIGN KEY (`id`) REFERENCES `describible` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido_persona` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedido_tipo_estado` FOREIGN KEY (`id_tipo_estado`) REFERENCES `tipo_estado_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_describible` FOREIGN KEY (`id`) REFERENCES `describible` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_estado_pedido`
--
ALTER TABLE `tipo_estado_pedido`
  ADD CONSTRAINT `fk_tipo_estado_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_persona_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valor_descriptor`
--
ALTER TABLE `valor_descriptor`
  ADD CONSTRAINT `fk_valor_descriptor_describible` FOREIGN KEY (`id_describible`) REFERENCES `describible` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_valor_descriptor_descriptor` FOREIGN KEY (`id_descriptor`) REFERENCES `descriptor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
