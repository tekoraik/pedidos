-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2014 a las 19:34:19
-- Versión del servidor: 5.5.34-0ubuntu0.13.10.2
-- Versión de PHP: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('AdminEmpresa', '13', NULL, 'N;'),
('AdminEmpresa', '2', NULL, 'N;'),
('AdminEmpresa', '5', NULL, 'N;'),
('Cliente', '12', NULL, 'N;'),
('Cliente', '14', NULL, 'N;'),
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
('Admin.TipoIva.*', 1, NULL, NULL, 'N;'),
('Admin.TipoIva.Admin', 0, NULL, NULL, 'N;'),
('Admin.TipoIva.Create', 0, NULL, NULL, 'N;'),
('Admin.TipoIva.Delete', 0, NULL, NULL, 'N;'),
('Admin.TipoIva.Index', 0, NULL, NULL, 'N;'),
('Admin.TipoIva.Update', 0, NULL, NULL, 'N;'),
('Admin.TipoIva.View', 0, NULL, NULL, 'N;'),
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
('ReglaValidacion.Admin', 0, NULL, NULL, 'N;'),
('ReglaValidacion.Create', 0, NULL, NULL, 'N;'),
('ReglaValidacion.Delete', 0, NULL, NULL, 'N;'),
('ReglaValidacion.Index', 0, NULL, NULL, 'N;'),
('ReglaValidacion.Update', 0, NULL, NULL, 'N;'),
('ReglaValidacion.View', 0, NULL, NULL, 'N;'),
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
('TipoEstadoPedido.View', 0, NULL, NULL, 'N;'),
('TipoIva.*', 1, NULL, NULL, 'N;'),
('TipoIva.Admin', 0, NULL, NULL, 'N;'),
('TipoIva.Create', 0, NULL, NULL, 'N;'),
('TipoIva.Delete', 0, NULL, NULL, 'N;'),
('TipoIva.Index', 0, NULL, NULL, 'N;'),
('TipoIva.Update', 0, NULL, NULL, 'N;'),
('TipoIva.View', 0, NULL, NULL, 'N;');

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
('AdminEmpresa', 'Pedido.AddProducto'),
('Authenticated', 'Pedido.AddProducto'),
('Cliente', 'Pedido.AddProducto'),
('Guest', 'Pedido.AddProducto'),
('AdminEmpresa', 'Pedido.Admin'),
('AdminEmpresa', 'Pedido.Delete'),
('AdminEmpresa', 'Pedido.Index'),
('Cliente', 'Pedido.Index'),
('AdminEmpresa', 'Pedido.Realizar'),
('Authenticated', 'Pedido.Realizar'),
('Cliente', 'Pedido.Realizar'),
('Guest', 'Pedido.Realizar'),
('AdminEmpresa', 'Pedido.Update'),
('AdminEmpresa', 'Producto.Admin'),
('AdminEmpresa', 'Producto.Create'),
('AdminEmpresa', 'Producto.Delete'),
('Authenticated', 'Producto.Index'),
('AdminEmpresa', 'Producto.Update'),
('AdminEmpresa', 'Producto.View'),
('Authenticated', 'Producto.View'),
('AdminEmpresa', 'ReglaValidacion.Admin'),
('AdminEmpresa', 'ReglaValidacion.Create'),
('AdminEmpresa', 'ReglaValidacion.Delete'),
('AdminEmpresa', 'ReglaValidacion.Index'),
('AdminEmpresa', 'ReglaValidacion.Update'),
('AdminEmpresa', 'ReglaValidacion.View'),
('AdminEmpresa', 'TipoEstadoPedido.Admin'),
('AdminEmpresa', 'TipoEstadoPedido.Create'),
('AdminEmpresa', 'TipoEstadoPedido.Delete'),
('AdminEmpresa', 'TipoEstadoPedido.Index'),
('AdminEmpresa', 'TipoEstadoPedido.Update'),
('AdminEmpresa', 'TipoEstadoPedido.View'),
('AdminEmpresa', 'TipoIva.Admin'),
('AdminEmpresa', 'TipoIva.Create'),
('AdminEmpresa', 'TipoIva.Delete'),
('AdminEmpresa', 'TipoIva.Index'),
('AdminEmpresa', 'TipoIva.Update'),
('AdminEmpresa', 'TipoIva.View');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `slug`, `id_padre`, `id_empresa`) VALUES
(1, 'Perifericos', 'perifericos31', NULL, 1),
(2, 'Ratones', 'ratones', 1, 1),
(3, 'Portatiles', 'portatiles', NULL, 1),
(5, 'Almacenamiento', 'almacenamiento', NULL, 1),
(7, 'Discos duros internos', 'discos-duros-internos', 5, 1),
(8, 'Discos duros externos', 'discos-duros-externos', 5, 1),
(9, 'Discos duros 3.5"', 'discos-duros-35', 7, 1),
(10, 'Discos duros 2.5"', 'discos-duros-25', 7, 1),
(11, 'Teclados', 'teclados', 1, 1),
(12, 'Altavoces', 'altavoces68', 1, 1),
(13, 'Webcams', 'webcams67', 1, 1),
(14, 'Discos duros externos 2,5"', 'discos-duros-externos-2,5"57', 8, 1),
(15, 'Monitores', 'monitores39', NULL, 1),
(16, 'TFT', 'tft87', 15, 1),
(18, 'Pasteles', 'pasteles88', NULL, 2),
(19, 'Bolleria', 'bolleria15', NULL, 2),
(20, 'Pan', 'pan6', NULL, 2),
(21, 'Pasteles con fondant', 'pasteles-con-fondant99', 18, 2),
(22, 'Pasteles sin fondant', 'pasteles-sin-fondant61', 18, 2),
(23, 'Donuts', 'donuts7', 19, 2),
(24, 'Croissants', 'croissants92', 19, 2),
(25, 'Calzado', 'calzado16', NULL, 3),
(26, 'Pantalones', 'pantalones71', NULL, 3),
(27, 'Parte superior', 'parte-superior13', NULL, 3),
(28, 'Calzado deportivo', 'calzado-deportivo54', 25, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `describible`
--

CREATE TABLE IF NOT EXISTS `describible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('producto','pedido') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=432 ;

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
(29, 'pedido'),
(30, 'pedido'),
(31, 'pedido'),
(32, 'pedido'),
(33, 'producto'),
(34, 'pedido'),
(35, 'pedido'),
(36, 'pedido'),
(37, 'pedido'),
(38, 'producto'),
(39, 'pedido'),
(40, 'pedido'),
(41, 'pedido'),
(42, 'pedido'),
(43, 'pedido'),
(44, 'pedido'),
(45, 'pedido'),
(46, 'pedido'),
(47, 'pedido'),
(48, 'pedido'),
(49, 'pedido'),
(50, 'pedido'),
(51, 'pedido'),
(52, 'pedido'),
(53, 'pedido'),
(54, 'pedido'),
(55, 'pedido'),
(56, 'pedido'),
(57, 'pedido'),
(58, 'pedido'),
(59, 'pedido'),
(60, 'producto'),
(61, 'pedido'),
(62, 'pedido'),
(63, 'pedido'),
(64, 'pedido'),
(65, 'pedido'),
(66, 'pedido'),
(67, 'pedido'),
(68, 'pedido'),
(69, 'pedido'),
(70, 'pedido'),
(71, 'pedido'),
(72, 'pedido'),
(73, 'pedido'),
(74, 'pedido'),
(75, 'pedido'),
(76, 'pedido'),
(77, 'pedido'),
(78, 'pedido'),
(79, 'pedido'),
(80, 'pedido'),
(81, 'pedido'),
(82, 'pedido'),
(83, 'pedido'),
(84, 'pedido'),
(85, 'pedido'),
(86, 'pedido'),
(87, 'pedido'),
(88, 'pedido'),
(89, 'pedido'),
(90, 'pedido'),
(91, 'pedido'),
(92, 'pedido'),
(93, 'pedido'),
(94, 'pedido'),
(95, 'pedido'),
(96, 'pedido'),
(97, 'pedido'),
(98, 'pedido'),
(99, 'pedido'),
(100, 'pedido'),
(101, 'pedido'),
(102, 'pedido'),
(103, 'pedido'),
(104, 'pedido'),
(105, 'pedido'),
(106, 'pedido'),
(107, 'pedido'),
(108, 'pedido'),
(109, 'pedido'),
(110, 'pedido'),
(111, 'pedido'),
(112, 'pedido'),
(113, 'pedido'),
(114, 'pedido'),
(115, 'pedido'),
(116, 'pedido'),
(117, 'pedido'),
(118, 'pedido'),
(119, 'pedido'),
(120, 'pedido'),
(121, 'pedido'),
(122, 'pedido'),
(123, 'pedido'),
(124, 'pedido'),
(125, 'pedido'),
(126, 'pedido'),
(127, 'pedido'),
(128, 'pedido'),
(129, 'pedido'),
(130, 'pedido'),
(131, 'pedido'),
(132, 'pedido'),
(133, 'pedido'),
(134, 'pedido'),
(135, 'pedido'),
(136, 'pedido'),
(137, 'pedido'),
(138, 'pedido'),
(139, 'pedido'),
(140, 'pedido'),
(141, 'pedido'),
(142, 'pedido'),
(143, 'pedido'),
(144, 'pedido'),
(145, 'pedido'),
(146, 'pedido'),
(147, 'pedido'),
(148, 'pedido'),
(149, 'pedido'),
(150, 'pedido'),
(151, 'pedido'),
(152, 'pedido'),
(153, 'pedido'),
(154, 'pedido'),
(155, 'pedido'),
(156, 'pedido'),
(157, 'pedido'),
(158, 'pedido'),
(159, 'pedido'),
(160, 'pedido'),
(161, 'pedido'),
(162, 'pedido'),
(163, 'pedido'),
(164, 'pedido'),
(165, 'pedido'),
(166, 'pedido'),
(167, 'pedido'),
(168, 'pedido'),
(169, 'pedido'),
(170, 'pedido'),
(171, 'pedido'),
(172, 'pedido'),
(173, 'pedido'),
(174, 'pedido'),
(175, 'pedido'),
(176, 'pedido'),
(177, 'pedido'),
(178, 'pedido'),
(179, 'pedido'),
(180, 'pedido'),
(181, 'pedido'),
(182, 'pedido'),
(183, 'pedido'),
(184, 'pedido'),
(185, 'pedido'),
(186, 'pedido'),
(187, 'pedido'),
(188, 'pedido'),
(189, 'pedido'),
(190, 'pedido'),
(191, 'pedido'),
(192, 'pedido'),
(193, 'pedido'),
(194, 'pedido'),
(195, 'pedido'),
(196, 'pedido'),
(197, 'pedido'),
(198, 'pedido'),
(199, 'pedido'),
(200, 'pedido'),
(201, 'pedido'),
(202, 'pedido'),
(203, 'pedido'),
(204, 'pedido'),
(205, 'pedido'),
(206, 'pedido'),
(207, 'pedido'),
(208, 'pedido'),
(209, 'pedido'),
(210, 'pedido'),
(211, 'pedido'),
(212, 'pedido'),
(213, 'pedido'),
(214, 'pedido'),
(215, 'pedido'),
(216, 'pedido'),
(217, 'pedido'),
(218, 'pedido'),
(219, 'pedido'),
(220, 'pedido'),
(221, 'pedido'),
(222, 'pedido'),
(223, 'pedido'),
(224, 'pedido'),
(225, 'pedido'),
(226, 'pedido'),
(227, 'pedido'),
(228, 'pedido'),
(229, 'pedido'),
(230, 'pedido'),
(231, 'pedido'),
(232, 'pedido'),
(233, 'pedido'),
(234, 'pedido'),
(235, 'pedido'),
(236, 'pedido'),
(237, 'pedido'),
(238, 'pedido'),
(239, 'pedido'),
(240, 'pedido'),
(241, 'pedido'),
(242, 'pedido'),
(243, 'pedido'),
(244, 'pedido'),
(245, 'pedido'),
(246, 'pedido'),
(247, 'pedido'),
(248, 'pedido'),
(249, 'pedido'),
(250, 'pedido'),
(251, 'pedido'),
(252, 'pedido'),
(253, 'pedido'),
(254, 'pedido'),
(255, 'pedido'),
(256, 'pedido'),
(257, 'pedido'),
(258, 'pedido'),
(259, 'pedido'),
(260, 'pedido'),
(261, 'pedido'),
(262, 'pedido'),
(263, 'pedido'),
(264, 'pedido'),
(265, 'pedido'),
(266, 'pedido'),
(267, 'pedido'),
(268, 'pedido'),
(269, 'pedido'),
(270, 'pedido'),
(271, 'pedido'),
(272, 'pedido'),
(273, 'pedido'),
(274, 'pedido'),
(275, 'pedido'),
(276, 'pedido'),
(277, 'pedido'),
(278, 'pedido'),
(279, 'pedido'),
(280, 'pedido'),
(281, 'pedido'),
(282, 'pedido'),
(283, 'pedido'),
(284, 'pedido'),
(285, 'pedido'),
(286, 'pedido'),
(287, 'pedido'),
(288, 'pedido'),
(289, 'pedido'),
(290, 'pedido'),
(291, 'pedido'),
(292, 'pedido'),
(293, 'pedido'),
(294, 'pedido'),
(295, 'pedido'),
(296, 'pedido'),
(297, 'pedido'),
(298, 'pedido'),
(299, 'pedido'),
(300, 'pedido'),
(301, 'pedido'),
(302, 'pedido'),
(303, 'pedido'),
(304, 'pedido'),
(305, 'pedido'),
(306, 'pedido'),
(307, 'pedido'),
(308, 'pedido'),
(309, 'pedido'),
(310, 'pedido'),
(311, 'pedido'),
(312, 'pedido'),
(313, 'pedido'),
(314, 'pedido'),
(315, 'pedido'),
(316, 'pedido'),
(317, 'pedido'),
(318, 'pedido'),
(319, 'pedido'),
(320, 'pedido'),
(321, 'pedido'),
(322, 'pedido'),
(323, 'pedido'),
(324, 'pedido'),
(325, 'pedido'),
(326, 'pedido'),
(327, 'pedido'),
(328, 'pedido'),
(329, 'pedido'),
(330, 'pedido'),
(331, 'producto'),
(332, 'producto'),
(333, 'producto'),
(334, 'producto'),
(335, 'producto'),
(336, 'producto'),
(337, 'pedido'),
(338, 'pedido'),
(339, 'pedido'),
(340, 'pedido'),
(341, 'pedido'),
(342, 'pedido'),
(343, 'pedido'),
(344, 'pedido'),
(345, 'pedido'),
(346, 'pedido'),
(347, 'pedido'),
(348, 'pedido'),
(349, 'pedido'),
(350, 'pedido'),
(351, 'pedido'),
(352, 'pedido'),
(353, 'pedido'),
(354, 'pedido'),
(355, 'pedido'),
(356, 'pedido'),
(357, 'pedido'),
(358, 'pedido'),
(359, 'pedido'),
(360, 'pedido'),
(361, 'pedido'),
(362, 'pedido'),
(363, 'pedido'),
(364, 'pedido'),
(365, 'pedido'),
(366, 'pedido'),
(367, 'pedido'),
(368, 'pedido'),
(369, 'pedido'),
(370, 'pedido'),
(371, 'pedido'),
(372, 'pedido'),
(373, 'pedido'),
(374, 'pedido'),
(375, 'pedido'),
(376, 'pedido'),
(377, 'pedido'),
(378, 'pedido'),
(379, 'pedido'),
(380, 'pedido'),
(381, 'pedido'),
(382, 'pedido'),
(383, 'pedido'),
(384, 'pedido'),
(385, 'pedido'),
(386, 'pedido'),
(387, 'pedido'),
(388, 'pedido'),
(389, 'pedido'),
(390, 'pedido'),
(391, 'pedido'),
(392, 'pedido'),
(393, 'pedido'),
(394, 'pedido'),
(395, 'pedido'),
(396, 'pedido'),
(397, 'pedido'),
(398, 'pedido'),
(399, 'pedido'),
(400, 'pedido'),
(401, 'pedido'),
(402, 'pedido'),
(403, 'pedido'),
(404, 'pedido'),
(405, 'pedido'),
(406, 'pedido'),
(407, 'pedido'),
(408, 'pedido'),
(409, 'pedido'),
(410, 'pedido'),
(411, 'pedido'),
(412, 'pedido'),
(413, 'pedido'),
(414, 'producto'),
(415, 'pedido'),
(416, 'pedido'),
(417, 'producto'),
(418, 'producto'),
(419, 'producto'),
(420, 'producto'),
(421, 'producto'),
(422, 'pedido'),
(423, 'pedido'),
(424, 'pedido'),
(425, 'pedido'),
(426, 'pedido'),
(427, 'pedido'),
(428, 'pedido'),
(429, 'pedido'),
(430, 'pedido'),
(431, 'pedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descriptor`
--

CREATE TABLE IF NOT EXISTS `descriptor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_valor` enum('entero','cadena','fecha','decimal','formula') COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `formula` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_regla_validacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_descriptor_categoria` (`id_categoria`),
  KEY `fk_descriptor_empresa` (`id_empresa`),
  KEY `fk_descriptor_regla` (`id_regla_validacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `descriptor`
--

INSERT INTO `descriptor` (`id`, `nombre`, `visible`, `tipo`, `tipo_valor`, `id_categoria`, `id_empresa`, `formula`, `id_regla_validacion`) VALUES
(13, 'formula1', 1, 'producto', 'formula', 1, 1, 'precio * 3', NULL),
(14, 'Descriptor de prueba', 1, 'producto', 'entero', NULL, 1, NULL, 4),
(15, 'Fijación', 1, 'producto', 'cadena', 25, 3, NULL, NULL),
(16, 'Amortiguación', 1, 'producto', 'cadena', 25, 3, NULL, NULL),
(17, 'Impermeabilidad', 1, 'producto', 'cadena', 25, 3, NULL, NULL),
(18, 'Garantía', 1, 'producto', 'entero', 27, 3, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `slug` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Slug',
  `host` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_administrador` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color1` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#D6D5D5',
  `color2` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#232431',
  `color3` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#0088CC',
  `color4` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#FFFFFF',
  `color5` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#3D5870',
  `color6` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#505050',
  `color7` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#cccccc',
  `color8` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#a5cc52',
  `color9` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#b8e356',
  `color10` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#83c41a',
  `color11` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#d9fbbe',
  `color12` varchar(45) COLLATE utf8_spanish_ci DEFAULT '#ffffff',
  `color13` varchar(45) COLLATE utf8_spanish_ci DEFAULT '#ffffff',
  `color14` varchar(45) COLLATE utf8_spanish_ci DEFAULT '#000000',
  `color15` varchar(45) COLLATE utf8_spanish_ci DEFAULT '#ffffff',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_empresa_usuario_admin` (`id_usuario_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `slug`, `host`, `id_usuario_administrador`, `logo`, `color1`, `color2`, `color3`, `color4`, `color5`, `color6`, `color7`, `color8`, `color9`, `color10`, `color11`, `color12`, `color13`, `color14`, `color15`) VALUES
(1, 'Computer Purchases', 'computer-purchases', 'home.livetin.com', 2, '', '#cccccc', '#292929', '#5662b3', '#ffffff', '#465b8f', '#333333', '#5c5c5c', '#50ad03', '#6ef22c', '#1cd400', '#e0ffe4', '#ffffff', '#ffffff', '#000000', '#ffffff'),
(2, 'El forn de Paula', 'empresa-de-prueba-2', 'www.elforndepaula.com', 5, NULL, '#D6D5D5', '#232431', '#0088CC', '#FFFFFF', '#3D5870', '#505050', '#cccccc', '#a5cc52', '#b8e356', '#83c41a', '#d9fbbe', '#ffffff', '#ffffff', '#000000', '#ffffff'),
(3, 'Maxdeporte', 'maxdeporte', 'emp3.livetin.com', 13, '594580528-maxdeporte.png', '#fafafa', '#232431', '#3b5cff', '#e8eaff', '#3d5870', '#2146ff', '#dbe0ff', '#000dff', '#7598ff', '#949dff', '#d9e8ff', '#ffffff', '#182182', '#5c5c5c', '#ffffff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE IF NOT EXISTS `linea_pedido` (
  `id_pedido` int(11) NOT NULL COMMENT 'Pedido',
  `id_producto` int(11) NOT NULL COMMENT 'Producto',
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio',
  `cantidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Cantidad',
  `iva` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_producto`),
  KEY `fk_lpedido_pedido` (`id_pedido`),
  KEY `fk_lpedido_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id_pedido`, `id_producto`, `precio`, `cantidad`, `iva`) VALUES
(1, 1, 34.12, 1, 0.00),
(18, 1, 34.12, 1, 0.00),
(48, 1, 34.12, 1, 0.00),
(160, 1, 202.00, 1, 0.00),
(164, 1, 202.00, 1, 0.00),
(172, 1, 202.00, 1, 0.00),
(172, 3, 30.12, 1, 0.00),
(174, 3, 30.12, 1, 0.00),
(176, 1, 202.00, 2, 0.00),
(176, 3, 30.12, 1, 0.00),
(177, 2, 58.24, 1, 0.00),
(178, 1, 202.00, 1, 0.00),
(180, 1, 202.00, 1, 0.00),
(181, 1, 202.00, 1, 0.00),
(182, 1, 202.00, 2, 0.00),
(183, 1, 202.00, 1, 0.00),
(184, 1, 202.00, 1, 0.00),
(185, 1, 202.00, 2, 0.00),
(185, 2, 58.24, 1, 0.00),
(185, 3, 30.12, 2, 0.00),
(185, 16, 1.00, 1, 0.00),
(186, 2, 58.24, 1, 0.00),
(187, 2, 58.24, 1, 0.00),
(188, 2, 58.24, 1, 0.00),
(188, 3, 30.12, 2, 0.00),
(189, 1, 202.00, 1, 0.00),
(190, 1, 202.00, 3, 0.00),
(191, 1, 202.00, 1, 0.00),
(193, 2, 58.24, 1, 0.00),
(194, 2, 58.24, 2, 0.00),
(194, 3, 30.12, 1, 0.00),
(195, 1, 202.00, 1, 0.00),
(195, 3, 30.12, 1, 0.00),
(195, 16, 1.00, 1, 0.00),
(196, 2, 58.24, 5, 0.00),
(197, 1, 202.00, 1, 0.00),
(197, 2, 58.24, 1, 0.00),
(198, 1, 202.00, 1, 0.00),
(198, 2, 58.24, 1, 0.00),
(199, 2, 58.24, 1, 0.00),
(199, 3, 30.12, 1, 0.00),
(200, 3, 30.12, 2, 0.00),
(201, 2, 58.24, 2, 0.00),
(201, 3, 30.12, 1, 0.00),
(201, 17, 2.00, 1, 0.00),
(202, 2, 58.24, 1, 0.00),
(205, 2, 58.24, 1, 0.00),
(206, 2, 58.24, 1, 0.00),
(208, 2, 58.24, 1, 0.00),
(211, 1, 202.00, 1, 0.00),
(211, 2, 58.24, 1, 0.00),
(212, 1, 202.00, 1, 0.00),
(212, 2, 58.24, 1, 0.00),
(213, 1, 202.00, 1, 0.00),
(214, 2, 58.24, 1, 0.00),
(215, 1, 202.00, 1, 0.00),
(216, 2, 58.24, 1, 0.00),
(217, 2, 58.24, 1, 0.00),
(218, 2, 58.24, 2, 0.00),
(219, 1, 202.00, 1, 0.00),
(220, 2, 58.24, 1, 0.00),
(221, 2, 58.24, 1, 0.00),
(222, 1, 202.00, 1, 0.00),
(223, 1, 202.00, 1, 0.00),
(224, 1, 202.00, 1, 0.00),
(225, 1, 202.00, 1, 0.00),
(226, 1, 202.00, 1, 0.00),
(226, 3, 30.12, 1, 0.00),
(228, 2, 58.24, 1, 0.00),
(230, 3, 30.12, 1, 0.00),
(233, 2, 58.24, 1, 0.00),
(233, 3, 30.12, 1, 0.00),
(234, 1, 202.00, 1, 0.00),
(236, 1, 202.00, 1, 0.00),
(238, 1, 202.00, 1, 0.00),
(240, 2, 58.24, 1, 0.00),
(240, 3, 30.12, 1, 0.00),
(242, 1, 202.00, 1, 0.00),
(244, 1, 202.00, 1, 0.00),
(246, 1, 202.00, 1, 0.00),
(299, 1, 202.00, 1, 0.00),
(301, 1, 202.00, 2, 0.00),
(302, 1, 202.00, 1, 0.00),
(303, 1, 202.00, 1, 0.00),
(304, 1, 202.00, 1, 0.00),
(305, 1, 202.00, 1, 0.00),
(307, 1, 202.00, 1, 0.00),
(312, 1, 202.00, 1, 0.21),
(317, 1, 202.00, 1, 0.21),
(326, 1, 202.00, 2, 0.21),
(326, 3, 30.12, 1, 0.21),
(327, 2, 58.24, 1, 0.21),
(330, 1, 202.00, 1, 0.22),
(330, 2, 58.24, 1, 0.21),
(337, 1, 202.00, 2, 0.22),
(349, 1, 202.00, 1, 0.22),
(350, 1, 202.00, 1, 0.22),
(351, 1, 202.00, 1, 0.22),
(352, 1, 202.00, 1, 0.22),
(353, 1, 202.00, 1, 0.22),
(353, 2, 58.24, 1, 0.22),
(354, 1, 202.00, 2, 0.22),
(354, 2, 58.24, 1, 0.22),
(354, 3, 30.12, 1, 0.22),
(355, 3, 30.12, 1, 0.22),
(356, 1, 202.00, 1, 0.22),
(356, 3, 30.12, 1, 0.22),
(357, 1, 202.00, 1, 0.22),
(358, 3, 30.12, 1, 0.22),
(359, 2, 58.24, 1, 0.22),
(360, 2, 58.24, 1, 0.22),
(361, 1, 202.00, 1, 0.22),
(362, 1, 202.00, 1, 0.22),
(362, 16, 1.00, 1, 0.22),
(366, 1, 202.00, 1, 0.22),
(367, 1, 202.00, 3, 0.22),
(367, 2, 58.24, 1, 0.22),
(369, 1, 202.00, 1, 0.22),
(373, 1, 202.00, 1, 0.22),
(375, 1, 202.00, 1, 0.22),
(387, 1, 202.00, 1, 0.22),
(393, 1, 202.00, 1, 0.22),
(393, 3, 30.12, 1, 0.22),
(395, 1, 202.00, 1, 0.22),
(395, 2, 58.24, 1, 0.22),
(415, 1, 202.00, 2, 0.22),
(416, 1, 202.00, 1, 0.22),
(423, 1, 202.00, 1, 0.22),
(423, 2, 58.24, 1, 0.22),
(426, 1, 202.00, 1, 0.22),
(428, 1, 202.00, 1, 0.22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `fecha_realizado` datetime DEFAULT NULL COMMENT 'Fecha realizado',
  `fecha_finalizado` datetime DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL COMMENT 'Persona',
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

INSERT INTO `pedido` (`id`, `fecha_realizado`, `fecha_finalizado`, `fecha_inicio`, `id_usuario`, `id_tipo_estado`, `id_empresa`) VALUES
(1, NULL, NULL, NULL, 1, NULL, 1),
(2, NULL, NULL, NULL, 1, NULL, 1),
(18, '2013-11-17 11:54:34', '2014-01-19 12:08:29', NULL, 1, 4, 1),
(19, NULL, NULL, NULL, 1, NULL, 1),
(20, NULL, NULL, NULL, 1, NULL, 1),
(21, NULL, NULL, NULL, 1, NULL, 1),
(22, NULL, NULL, NULL, 1, NULL, 1),
(23, NULL, NULL, NULL, 1, NULL, 1),
(24, NULL, NULL, NULL, 1, NULL, 1),
(25, NULL, NULL, NULL, 1, NULL, 1),
(26, NULL, NULL, NULL, 1, NULL, 1),
(27, NULL, NULL, NULL, 1, NULL, 1),
(28, NULL, NULL, NULL, 1, NULL, 1),
(29, NULL, NULL, NULL, 1, NULL, 1),
(30, NULL, NULL, NULL, 1, NULL, 1),
(31, NULL, NULL, NULL, 1, NULL, 1),
(32, NULL, NULL, NULL, 1, NULL, 1),
(34, NULL, NULL, NULL, 1, NULL, 1),
(35, NULL, NULL, NULL, 1, NULL, 1),
(36, NULL, NULL, NULL, 1, NULL, 1),
(37, NULL, NULL, NULL, 1, NULL, 1),
(39, NULL, NULL, NULL, 1, NULL, 1),
(40, NULL, NULL, NULL, 1, NULL, 1),
(41, NULL, NULL, NULL, 1, NULL, 1),
(42, NULL, NULL, NULL, 1, NULL, 1),
(43, NULL, NULL, NULL, 1, NULL, 1),
(44, NULL, NULL, NULL, 1, NULL, 1),
(45, NULL, NULL, NULL, 1, NULL, 1),
(46, NULL, NULL, NULL, 1, NULL, 1),
(47, NULL, NULL, NULL, 1, NULL, 1),
(48, NULL, NULL, NULL, 1, NULL, 1),
(49, NULL, NULL, NULL, 1, NULL, 1),
(53, NULL, NULL, NULL, 1, NULL, 1),
(54, NULL, NULL, NULL, 1, NULL, 1),
(55, NULL, NULL, NULL, 1, NULL, 1),
(57, NULL, NULL, NULL, 1, NULL, 1),
(58, NULL, NULL, NULL, 1, NULL, 1),
(59, NULL, NULL, NULL, 1, NULL, 2),
(62, NULL, NULL, NULL, 1, NULL, 1),
(64, NULL, NULL, NULL, 1, NULL, 1),
(65, NULL, NULL, NULL, 1, NULL, 1),
(66, NULL, NULL, NULL, 1, NULL, 1),
(68, NULL, NULL, NULL, 1, NULL, 1),
(69, NULL, NULL, NULL, 1, NULL, 1),
(70, NULL, NULL, NULL, 1, NULL, 1),
(71, NULL, NULL, NULL, 1, NULL, 1),
(72, NULL, NULL, NULL, 1, NULL, 1),
(73, NULL, NULL, NULL, 1, NULL, 1),
(74, NULL, NULL, NULL, 1, NULL, 1),
(75, NULL, NULL, NULL, 1, NULL, 1),
(76, NULL, NULL, NULL, 1, NULL, 1),
(77, NULL, NULL, NULL, 1, NULL, 1),
(78, NULL, NULL, NULL, 1, NULL, 1),
(79, NULL, NULL, NULL, 1, NULL, 1),
(80, NULL, NULL, NULL, 1, NULL, 1),
(81, NULL, NULL, NULL, 1, NULL, 1),
(82, NULL, NULL, NULL, 1, NULL, 1),
(83, NULL, NULL, NULL, 1, NULL, 1),
(84, NULL, NULL, NULL, 1, NULL, 1),
(85, NULL, NULL, NULL, 1, NULL, 1),
(86, NULL, NULL, NULL, 1, NULL, 1),
(87, NULL, NULL, NULL, 1, NULL, 1),
(88, NULL, NULL, NULL, 1, NULL, 1),
(89, NULL, NULL, NULL, 1, NULL, 1),
(90, NULL, NULL, NULL, 1, NULL, 1),
(91, NULL, NULL, NULL, 1, NULL, 1),
(92, NULL, NULL, NULL, 1, NULL, 1),
(93, NULL, NULL, NULL, 1, NULL, 1),
(94, NULL, NULL, NULL, 1, NULL, 1),
(95, NULL, NULL, NULL, 1, NULL, 1),
(96, NULL, NULL, NULL, 1, NULL, 1),
(97, NULL, NULL, NULL, 1, NULL, 1),
(98, NULL, NULL, NULL, 1, NULL, 1),
(99, NULL, NULL, NULL, 1, NULL, 1),
(100, NULL, NULL, NULL, 1, NULL, 1),
(101, NULL, NULL, NULL, 1, NULL, 1),
(102, NULL, NULL, NULL, 1, NULL, 1),
(103, NULL, NULL, NULL, 1, NULL, 1),
(104, NULL, NULL, NULL, 1, NULL, 1),
(105, NULL, NULL, NULL, 1, NULL, 1),
(106, NULL, NULL, NULL, 1, NULL, 1),
(107, NULL, NULL, NULL, 1, NULL, 1),
(108, NULL, NULL, NULL, 1, NULL, 1),
(109, NULL, NULL, NULL, 1, NULL, 1),
(110, NULL, NULL, NULL, 1, NULL, 1),
(111, NULL, NULL, NULL, 1, NULL, 1),
(112, NULL, NULL, NULL, 1, NULL, 1),
(113, NULL, NULL, NULL, 1, NULL, 1),
(114, NULL, NULL, NULL, 1, NULL, 1),
(115, NULL, NULL, NULL, 1, NULL, 1),
(116, NULL, NULL, NULL, 1, NULL, 1),
(117, NULL, NULL, NULL, 1, NULL, 1),
(118, NULL, NULL, NULL, 1, NULL, 1),
(119, NULL, NULL, NULL, 1, NULL, 1),
(120, NULL, NULL, NULL, 1, NULL, 1),
(121, NULL, NULL, NULL, 1, NULL, 1),
(122, NULL, NULL, NULL, 1, NULL, 1),
(123, NULL, NULL, NULL, 1, NULL, 1),
(124, NULL, NULL, NULL, 1, NULL, 1),
(125, NULL, NULL, NULL, 1, NULL, 1),
(126, NULL, NULL, NULL, 1, NULL, 1),
(127, NULL, NULL, NULL, 1, NULL, 1),
(128, NULL, NULL, NULL, 1, NULL, 1),
(129, NULL, NULL, NULL, 1, NULL, 1),
(130, NULL, NULL, NULL, 1, NULL, 1),
(131, NULL, NULL, NULL, 1, NULL, 1),
(132, NULL, NULL, NULL, 1, NULL, 1),
(133, NULL, NULL, NULL, 1, NULL, 1),
(134, NULL, NULL, NULL, 1, NULL, 1),
(135, NULL, NULL, NULL, 1, NULL, 1),
(137, NULL, NULL, NULL, 1, NULL, 1),
(138, NULL, NULL, NULL, 1, NULL, 1),
(139, NULL, NULL, NULL, 1, NULL, 1),
(140, NULL, NULL, NULL, 1, NULL, 1),
(141, NULL, NULL, NULL, 1, NULL, 1),
(142, NULL, NULL, NULL, 1, NULL, 1),
(143, NULL, NULL, NULL, 1, NULL, 1),
(144, NULL, NULL, NULL, 1, NULL, 1),
(145, NULL, NULL, NULL, 1, NULL, 1),
(146, NULL, NULL, NULL, 1, NULL, 1),
(147, NULL, NULL, NULL, 1, NULL, 1),
(148, NULL, NULL, NULL, 1, NULL, 1),
(149, NULL, NULL, NULL, 1, NULL, 1),
(150, NULL, NULL, NULL, 1, NULL, 1),
(151, NULL, NULL, NULL, 1, NULL, 1),
(152, NULL, NULL, NULL, 1, NULL, 1),
(153, NULL, NULL, NULL, 1, NULL, 1),
(154, NULL, NULL, NULL, 1, NULL, 1),
(155, NULL, NULL, NULL, 1, NULL, 1),
(156, NULL, NULL, NULL, 1, NULL, 1),
(157, NULL, NULL, NULL, 1, NULL, 1),
(158, NULL, NULL, NULL, 1, NULL, 1),
(159, NULL, NULL, NULL, 1, NULL, 1),
(160, NULL, NULL, NULL, 1, NULL, 1),
(161, NULL, NULL, NULL, 1, NULL, 1),
(162, NULL, NULL, NULL, 1, NULL, 1),
(163, NULL, NULL, NULL, 1, NULL, 1),
(164, '2014-01-07 10:22:39', NULL, NULL, 1, 5, 1),
(165, NULL, NULL, NULL, 1, NULL, 1),
(166, NULL, NULL, NULL, 1, NULL, 1),
(167, NULL, NULL, NULL, 1, NULL, 1),
(168, NULL, NULL, NULL, 1, NULL, 1),
(169, NULL, NULL, NULL, 1, NULL, 1),
(170, NULL, NULL, NULL, 1, NULL, 1),
(171, NULL, NULL, NULL, 1, NULL, 1),
(172, NULL, NULL, NULL, 1, NULL, 1),
(173, NULL, NULL, NULL, 1, NULL, 1),
(174, NULL, NULL, NULL, 1, NULL, 1),
(175, NULL, NULL, NULL, 1, NULL, 1),
(176, NULL, NULL, NULL, 1, NULL, 1),
(177, NULL, NULL, NULL, 1, NULL, 1),
(178, NULL, NULL, NULL, 1, NULL, 1),
(179, NULL, NULL, NULL, 1, NULL, 1),
(180, NULL, NULL, NULL, 1, NULL, 1),
(181, NULL, NULL, NULL, 1, NULL, 1),
(182, NULL, NULL, NULL, 1, NULL, 1),
(183, NULL, NULL, NULL, 1, NULL, 1),
(184, NULL, NULL, NULL, 1, NULL, 1),
(185, NULL, NULL, NULL, 1, NULL, 1),
(186, NULL, NULL, NULL, 1, NULL, 1),
(187, NULL, NULL, NULL, 1, NULL, 1),
(188, NULL, NULL, NULL, 1, NULL, 1),
(189, NULL, NULL, NULL, 1, NULL, 1),
(190, NULL, NULL, NULL, 1, NULL, 1),
(191, NULL, NULL, NULL, 1, NULL, 1),
(192, NULL, NULL, NULL, 1, NULL, 1),
(193, NULL, NULL, NULL, 1, NULL, 1),
(194, NULL, NULL, NULL, 1, NULL, 1),
(195, NULL, NULL, NULL, 1, NULL, 1),
(196, NULL, NULL, NULL, 1, NULL, 1),
(197, NULL, NULL, NULL, 1, NULL, 1),
(198, NULL, NULL, NULL, 1, NULL, 1),
(199, NULL, NULL, NULL, 1, NULL, 1),
(200, NULL, NULL, NULL, 1, NULL, 1),
(201, NULL, NULL, NULL, 1, NULL, 1),
(202, NULL, NULL, NULL, 1, NULL, 1),
(203, NULL, NULL, NULL, 1, NULL, 1),
(204, NULL, NULL, NULL, 1, NULL, 1),
(205, NULL, NULL, NULL, 1, NULL, 1),
(206, NULL, NULL, NULL, 1, NULL, 1),
(207, NULL, NULL, NULL, 1, NULL, 1),
(208, '2014-01-09 09:56:04', NULL, NULL, 1, 5, 1),
(209, NULL, NULL, NULL, 1, NULL, 1),
(210, NULL, NULL, NULL, 1, NULL, 1),
(211, '2014-01-09 09:57:57', NULL, NULL, 1, 5, 1),
(212, '2014-01-09 09:58:46', '2014-01-16 10:53:54', '2014-01-16 10:53:43', 1, 4, 1),
(213, NULL, NULL, NULL, 1, NULL, 1),
(214, NULL, NULL, NULL, 1, NULL, 1),
(215, NULL, NULL, NULL, 1, NULL, 1),
(216, NULL, NULL, NULL, 1, NULL, 1),
(217, NULL, NULL, NULL, 1, NULL, 1),
(218, NULL, NULL, NULL, 1, NULL, 1),
(219, NULL, NULL, NULL, 1, NULL, 1),
(220, '2014-01-09 10:56:40', NULL, NULL, 1, 3, 1),
(221, NULL, NULL, NULL, 1, NULL, 1),
(222, NULL, NULL, NULL, 1, NULL, 1),
(223, NULL, NULL, NULL, 1, NULL, 1),
(224, NULL, NULL, NULL, 1, NULL, 1),
(225, NULL, NULL, NULL, 1, NULL, 1),
(226, NULL, NULL, NULL, 1, NULL, 1),
(227, NULL, NULL, NULL, 1, NULL, 1),
(228, NULL, NULL, NULL, 1, NULL, 1),
(229, NULL, NULL, NULL, 1, NULL, 1),
(230, NULL, NULL, NULL, 1, NULL, 1),
(231, NULL, NULL, NULL, 1, NULL, 1),
(232, NULL, NULL, NULL, 1, NULL, 1),
(233, '2014-01-09 12:34:07', NULL, NULL, 1, 3, 1),
(234, '2014-01-09 12:34:21', NULL, NULL, 1, 5, 1),
(235, NULL, NULL, NULL, 1, NULL, 1),
(236, '2014-01-09 12:42:27', NULL, NULL, 1, 3, 1),
(237, NULL, NULL, NULL, 1, NULL, 1),
(238, '2014-01-09 12:44:38', NULL, NULL, 1, 3, 1),
(239, NULL, NULL, NULL, 1, NULL, 1),
(240, '2014-01-09 03:17:09', NULL, NULL, 1, 3, 1),
(241, NULL, NULL, NULL, 1, NULL, 1),
(242, '2014-01-09 04:06:50', NULL, NULL, 1, 3, 1),
(243, NULL, NULL, NULL, 1, NULL, 1),
(244, '2014-01-09 04:08:33', NULL, NULL, 1, 4, 1),
(245, NULL, NULL, NULL, 1, NULL, 1),
(246, NULL, NULL, NULL, 1, NULL, 1),
(247, NULL, NULL, NULL, 1, NULL, 1),
(248, NULL, NULL, NULL, 1, NULL, 1),
(249, NULL, NULL, NULL, 1, NULL, 1),
(250, NULL, NULL, NULL, 1, NULL, 1),
(251, NULL, NULL, NULL, 1, NULL, 1),
(252, NULL, NULL, NULL, 1, NULL, 1),
(253, NULL, NULL, NULL, 1, NULL, 1),
(254, NULL, NULL, NULL, 1, NULL, 1),
(255, NULL, NULL, NULL, 1, NULL, 1),
(256, NULL, NULL, NULL, 1, NULL, 1),
(257, NULL, NULL, NULL, 1, NULL, 1),
(258, NULL, NULL, NULL, 1, NULL, 1),
(259, NULL, NULL, NULL, 1, NULL, 1),
(260, NULL, NULL, NULL, 1, NULL, 1),
(261, NULL, NULL, NULL, 1, NULL, 1),
(262, NULL, NULL, NULL, 1, NULL, 1),
(263, NULL, NULL, NULL, 1, NULL, 1),
(264, NULL, NULL, NULL, 1, NULL, 1),
(265, NULL, NULL, NULL, 1, NULL, 1),
(266, NULL, NULL, NULL, 1, NULL, 1),
(267, NULL, NULL, NULL, 1, NULL, 1),
(268, NULL, NULL, NULL, 1, NULL, 1),
(269, NULL, NULL, NULL, 1, NULL, 1),
(270, NULL, NULL, NULL, 1, NULL, 1),
(271, NULL, NULL, NULL, 1, NULL, 1),
(272, NULL, NULL, NULL, 1, NULL, 1),
(273, NULL, NULL, NULL, 1, NULL, 1),
(274, NULL, NULL, NULL, 1, NULL, 1),
(275, NULL, NULL, NULL, 1, NULL, 1),
(276, NULL, NULL, NULL, 1, NULL, 1),
(277, NULL, NULL, NULL, 1, NULL, 1),
(278, NULL, NULL, NULL, 1, NULL, 1),
(279, NULL, NULL, NULL, 1, NULL, 1),
(280, NULL, NULL, NULL, 1, NULL, 1),
(281, NULL, NULL, NULL, 1, NULL, 1),
(282, NULL, NULL, NULL, 1, NULL, 1),
(283, NULL, NULL, NULL, 1, NULL, 1),
(284, NULL, NULL, NULL, 1, NULL, 1),
(285, NULL, NULL, NULL, 1, NULL, 1),
(286, NULL, NULL, NULL, 1, NULL, 1),
(287, NULL, NULL, NULL, 1, NULL, 1),
(288, NULL, NULL, NULL, 1, NULL, 1),
(289, NULL, NULL, NULL, 1, NULL, 1),
(290, NULL, NULL, NULL, 1, NULL, 1),
(291, NULL, NULL, NULL, 1, NULL, 1),
(292, NULL, NULL, NULL, 1, NULL, 1),
(293, NULL, NULL, NULL, 1, NULL, 1),
(294, NULL, NULL, NULL, 1, NULL, 1),
(295, NULL, NULL, NULL, 1, NULL, 1),
(296, NULL, NULL, NULL, 1, NULL, 1),
(297, NULL, NULL, NULL, 1, NULL, 1),
(298, NULL, NULL, NULL, 1, NULL, 1),
(299, NULL, NULL, NULL, 1, NULL, 1),
(300, NULL, NULL, NULL, 1, NULL, 1),
(301, '2014-01-12 07:21:21', NULL, NULL, 1, 3, 1),
(302, NULL, NULL, NULL, 1, NULL, 1),
(303, NULL, NULL, NULL, 1, NULL, 1),
(304, NULL, NULL, NULL, 1, NULL, 1),
(305, NULL, NULL, NULL, 1, NULL, 1),
(306, NULL, NULL, NULL, 1, NULL, 1),
(307, NULL, NULL, NULL, 1, NULL, 1),
(308, NULL, NULL, NULL, 1, NULL, 1),
(309, NULL, NULL, NULL, 1, NULL, 1),
(310, NULL, NULL, NULL, 1, NULL, 1),
(311, NULL, NULL, NULL, 1, NULL, 1),
(312, '2014-01-16 12:53:14', NULL, NULL, 1, 3, 1),
(313, NULL, NULL, NULL, 1, NULL, 1),
(314, NULL, NULL, NULL, 1, NULL, 1),
(315, NULL, NULL, NULL, 1, NULL, 1),
(316, NULL, NULL, NULL, 1, NULL, 1),
(317, '2014-01-16 08:07:14', NULL, NULL, 1, 5, 1),
(318, NULL, NULL, NULL, 1, NULL, 1),
(319, NULL, NULL, NULL, 1, NULL, 1),
(320, NULL, NULL, NULL, 1, NULL, 1),
(321, NULL, NULL, NULL, 1, NULL, 1),
(322, NULL, NULL, NULL, 1, NULL, 1),
(323, NULL, NULL, NULL, 1, NULL, 1),
(324, NULL, NULL, NULL, 1, NULL, 1),
(325, NULL, NULL, NULL, 1, NULL, 1),
(326, '2014-01-16 09:26:51', NULL, NULL, 1, 3, 1),
(327, '2014-01-16 09:12:02', NULL, NULL, 1, 3, 1),
(328, NULL, NULL, NULL, 1, NULL, 1),
(329, NULL, NULL, NULL, 1, NULL, 1),
(330, NULL, NULL, NULL, 1, NULL, 1),
(337, NULL, NULL, NULL, 1, NULL, 1),
(338, NULL, NULL, NULL, 1, NULL, 1),
(339, NULL, NULL, NULL, 1, NULL, 1),
(340, NULL, NULL, NULL, 1, NULL, 1),
(341, NULL, NULL, NULL, 1, NULL, 1),
(342, NULL, NULL, NULL, 1, NULL, 1),
(343, NULL, NULL, NULL, 1, NULL, 1),
(344, NULL, NULL, NULL, 1, NULL, 1),
(345, NULL, NULL, NULL, 1, NULL, 1),
(346, NULL, NULL, NULL, 1, NULL, 1),
(347, NULL, NULL, NULL, 1, NULL, 1),
(348, NULL, NULL, NULL, 1, NULL, 1),
(349, NULL, NULL, NULL, 1, 3, 1),
(350, NULL, NULL, NULL, 1, 3, 1),
(351, '2014-01-21 12:29:40', NULL, NULL, 1, 3, 1),
(352, '2014-01-21 12:37:26', '2014-01-21 01:17:38', '2014-01-21 01:10:06', 2, 4, 1),
(353, '2014-01-21 12:53:08', NULL, NULL, 2, 3, 1),
(354, '2014-01-21 01:02:35', '2014-01-21 01:10:25', NULL, 2, 4, 1),
(355, '2014-01-21 01:15:17', NULL, NULL, 2, 3, 1),
(356, '2014-01-21 01:15:28', NULL, NULL, 2, 3, 1),
(357, '2014-01-21 01:15:32', NULL, NULL, 2, 3, 1),
(358, '2014-01-21 01:15:36', NULL, NULL, 2, 3, 1),
(359, '2014-01-21 01:15:40', NULL, NULL, 2, 3, 1),
(360, '2014-01-21 01:16:05', NULL, NULL, 2, 3, 1),
(361, '2014-01-21 01:16:10', NULL, NULL, 2, 3, 1),
(362, '2014-01-21 01:16:18', NULL, NULL, 2, 3, 1),
(363, NULL, NULL, NULL, 2, NULL, 1),
(364, NULL, NULL, NULL, 2, NULL, 1),
(365, NULL, NULL, NULL, 2, NULL, 1),
(366, NULL, NULL, NULL, 2, NULL, 1),
(367, '2014-01-21 10:06:46', '2014-01-26 08:07:52', NULL, 2, 4, 1),
(368, NULL, NULL, NULL, 2, NULL, 1),
(369, NULL, NULL, NULL, 2, NULL, 1),
(370, NULL, NULL, NULL, 2, NULL, 1),
(371, NULL, NULL, NULL, 2, NULL, 1),
(372, NULL, NULL, NULL, 1, NULL, 1),
(373, NULL, NULL, NULL, 8, NULL, 1),
(374, NULL, NULL, NULL, 1, NULL, 1),
(375, '2014-01-23 05:32:57', '2014-01-28 07:11:04', NULL, 12, 4, 1),
(376, NULL, NULL, NULL, 12, NULL, 1),
(377, NULL, NULL, NULL, 1, NULL, 1),
(378, NULL, NULL, NULL, 12, NULL, 1),
(379, NULL, NULL, NULL, 2, NULL, 1),
(380, NULL, NULL, NULL, 1, NULL, 1),
(382, NULL, NULL, NULL, 2, NULL, 1),
(383, NULL, NULL, NULL, 2, NULL, 1),
(384, NULL, NULL, NULL, 2, NULL, 1),
(385, NULL, NULL, NULL, 2, NULL, 1),
(386, NULL, NULL, NULL, 2, NULL, 1),
(387, NULL, NULL, NULL, 2, NULL, 1),
(388, NULL, NULL, NULL, 2, NULL, 1),
(389, NULL, NULL, NULL, 2, NULL, 1),
(390, NULL, NULL, NULL, 2, NULL, 1),
(391, NULL, NULL, NULL, 2, NULL, 1),
(392, NULL, NULL, NULL, 2, NULL, 1),
(393, '2014-01-28 07:03:14', NULL, NULL, 2, 3, 1),
(394, NULL, NULL, NULL, 2, NULL, 1),
(395, NULL, NULL, NULL, 2, NULL, 1),
(396, NULL, NULL, NULL, 2, NULL, 1),
(397, NULL, NULL, NULL, 2, NULL, 1),
(398, NULL, NULL, NULL, 1, NULL, 1),
(399, NULL, NULL, NULL, 1, NULL, 1),
(400, NULL, NULL, NULL, 13, NULL, 3),
(401, NULL, NULL, NULL, 1, NULL, 3),
(402, NULL, NULL, NULL, 13, NULL, 3),
(403, NULL, NULL, NULL, 13, NULL, 3),
(404, NULL, NULL, NULL, 2, NULL, 1),
(405, NULL, NULL, NULL, 1, NULL, 3),
(406, NULL, NULL, NULL, 13, NULL, 3),
(407, NULL, NULL, NULL, 13, NULL, 3),
(408, NULL, NULL, NULL, 14, NULL, 3),
(409, NULL, NULL, NULL, 2, NULL, 1),
(410, NULL, NULL, NULL, 2, NULL, 1),
(411, NULL, NULL, NULL, 1, NULL, 1),
(412, NULL, NULL, NULL, 2, NULL, 1),
(413, NULL, NULL, NULL, 13, NULL, 3),
(415, NULL, NULL, NULL, 2, NULL, 1),
(416, NULL, NULL, NULL, 2, NULL, 1),
(422, NULL, NULL, NULL, 2, NULL, 1),
(423, '2014-02-03 09:07:18', NULL, NULL, 2, 3, 1),
(424, NULL, NULL, NULL, 2, NULL, 1),
(425, NULL, NULL, NULL, NULL, NULL, 3),
(426, '2014-02-03 11:11:45', NULL, NULL, 2, 3, 1),
(427, NULL, NULL, NULL, NULL, NULL, 3),
(428, NULL, NULL, NULL, 2, NULL, 1),
(429, NULL, NULL, NULL, NULL, NULL, 1),
(430, NULL, NULL, NULL, NULL, NULL, 1),
(431, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `slug` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Slug',
  `descripcion_corta` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción corta',
  `descripcion_larga` text COLLATE utf8_spanish_ci COMMENT 'Descripción larga',
  `precio` decimal(10,2) NOT NULL COMMENT 'Precio',
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) NOT NULL COMMENT 'Empresa',
  `id_categoria` int(11) DEFAULT NULL COMMENT 'Categoria',
  `id_tipo_iva` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_producto_empresa` (`id_empresa`),
  KEY `fk_producto_categoria` (`id_categoria`),
  KEY `fk_producto_describible` (`id`),
  KEY `fk_producto_tipo_iva_idx` (`id_tipo_iva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `slug`, `descripcion_corta`, `descripcion_larga`, `precio`, `imagen`, `id_empresa`, `id_categoria`, `id_tipo_iva`) VALUES
(1, 'Logitech Touch Mouse T620', 'logitech-touch-mouse-t62052', 'Vea cómo puede desplazarse por Windows® ', 'Superficie táctil completa para un control uniforme y preciso\r\n\r\nDisfrute de una navegación rápida y fluida dondequiera que descanse los dedos en la superficie táctil precisa. Pases, desplazamientos, toques y clics sin esfuerzo, para una experiencia eficiente y productiva.\r\n\r\n\r\nComodidad para los dedos.\r\n\r\nCon unas curvas diseñadas para la comodidad, este elegante Touch Mouse permite un manejo y gestos cómodos, durante horas y horas.\r\n\r\n\r\n', 202.00, '1937194003-logitech-touch-mouse-t62022.jpg', 1, 2, 3),
(2, 'ASUS AN300 HD', 'asus-an300-hd57', 'Acabado en aluminio cepillado y con unos', '', 58.24, '338049698-asus-an300-hd51.jpg', 1, 8, 3),
(3, 'Teclado Logitech Inalambrico', 'teclado-logitech-inalambrico22', 'Un teclado inalambrico para que puedas d', '', 30.12, '968474386-teclado-logitech-inalambrico37.jpg', 1, 11, 3),
(4, 'Pastel de chocolate', 'pastel-de-chocolate80', 'Pastel de chocolate', '', 10.20, '', 2, 18, 4),
(16, 'Producto de prueba 1', 'producto-de-prueba-12', 'Producto de prueba 1', '', 1.00, '', 1, NULL, 3),
(17, 'Producto de prueba 2', 'producto-de-prueba-210', 'Producto de prueba 2', '', 2.00, '', 1, NULL, 3),
(60, 'Donut azucar', 'donut-azucar76', 'Donut de azucar. DELICIOSO!', '', 0.50, '517414448-.jpg', 2, 23, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regla_validacion`
--

CREATE TABLE IF NOT EXISTS `regla_validacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tipo` enum('rango','formula','cadena') COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desde` double DEFAULT NULL,
  `hasta` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_empresa` (`nombre`,`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `regla_validacion`
--

INSERT INTO `regla_validacion` (`id`, `nombre`, `id_empresa`, `tipo`, `valor`, `desde`, `hasta`) VALUES
(4, 'Menor que 200', 1, 'formula', 'valor < 200', 0, 200),
(5, 'Entre 20 y 30', 1, 'rango', '', 20, 30),
(7, 'cadena menor que 4', 1, 'cadena', '4', NULL, NULL),
(8, 'menor que precio', 1, 'formula', 'valor < precio', NULL, NULL),
(9, 'cadena menor que 3', 3, 'cadena', '3', NULL, NULL),
(10, 'Menor que 3 años', 3, 'rango', NULL, 0, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo_estado_pedido`
--

INSERT INTO `tipo_estado_pedido` (`id`, `id_empresa`, `nombre`) VALUES
(5, 1, 'En progreso'),
(4, 1, 'Finalizado'),
(3, 1, 'Realizado'),
(7, 3, 'En progreso'),
(8, 3, 'Finalizado'),
(6, 3, 'Realizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_iva`
--

CREATE TABLE IF NOT EXISTS `tipo_iva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_iva_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_iva`
--

INSERT INTO `tipo_iva` (`id`, `nombre`, `valor`, `id_empresa`) VALUES
(3, 'Normal', 0.22, 1),
(4, 'Normal', 0.22, 2),
(5, 'Normal_Deportes', 0.21, 3);

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
  UNIQUE KEY `UNIQUE_IDENTIDAD_TIPO_IDENTIDAD` (`identidad`,`tipo_identidad`,`id_empresa`),
  UNIQUE KEY `email_UNIQUE` (`email`,`id_empresa`),
  KEY `fk_persona_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `identidad`, `tipo_identidad`, `nombre`, `apellidos`, `direccion`, `email`, `password`, `id_empresa`) VALUES
(1, '47804265F', 'dni', 'Jose Luis', 'Orta', '', 'infoluis85@gmail.com', '2aWk6wCDwx81s', NULL),
(2, '11111111A', 'dni', 'Pablo', 'Hernandez', '', 'adminempresa@mail.com', '2aWk6wCDwx81s', 1),
(3, '22222222A', 'dni', 'Marta', 'Pelaez', '', 'clienteempresa@mail.com', '2aWk6wCDwx81s', 1),
(4, '1234', 'dni', 'Pablo', 'Perez', '', 'pablo@mail.com', '2a0Po3CkBm6ZA', 1),
(5, '321', 'dni', 'Paula', 'Florante', '', 'paula@mail.com', '2a0Po3CkBm6ZA', 2),
(7, '123434224', 'dni', 'Usuario', 'de prueba', '', 'prueba@mail.com', '2aeZfB3dvfUgU', 1),
(8, '2342342', 'dni', 'Prueba', 'Prueba 2', '', 'prueba2@mail.com', '2aWk6wCDwx81s', 1),
(12, '55432134', 'dni', 'prueba3', 'prueba3 apellido', '', 'prueba3@mail.com', '2aWk6wCDwx81s', 1),
(13, '33333333A', '', 'Susana', 'Marquez', '', 'infoluis85@gmail.com', '2a0Po3CkBm6ZA', 3),
(14, '000999111', 'dni', 'usuario', 'emp3', '', 'usuarioemp3@mail.com', '2a0Po3CkBm6ZA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_descriptor`
--

CREATE TABLE IF NOT EXISTS `valor_descriptor` (
  `id_descriptor` int(11) NOT NULL,
  `id_describible` int(11) NOT NULL,
  `valor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('entero','cadena','fecha','decimal','formula') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_descriptor`,`id_describible`),
  KEY `fk_valor_descriptor_descriptor` (`id_descriptor`),
  KEY `fk_valor_descriptor_describible` (`id_describible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valor_descriptor`
--

INSERT INTO `valor_descriptor` (`id_descriptor`, `id_describible`, `valor`, `tipo`) VALUES
(15, 414, '', 'cadena'),
(15, 417, 'asdfa', 'cadena'),
(15, 418, 'dfasdfa sd fa as', 'cadena'),
(15, 419, 'sdfsd dsf s', 'cadena'),
(15, 420, 'sdfa a', 'cadena'),
(15, 421, 'sdfa a', 'cadena'),
(16, 414, '', 'cadena'),
(16, 417, 'asdfa', 'cadena'),
(16, 418, 'as da a sda ', 'cadena'),
(16, 419, 'sdfs sdf s', 'cadena'),
(16, 420, 'as da ', 'cadena'),
(16, 421, 'as da ', 'cadena'),
(17, 414, 'No impermeables.', 'cadena'),
(17, 417, 'asdfa', 'cadena'),
(17, 418, 'as da asd ', 'cadena'),
(17, 419, 'sd fs sd fs ', 'cadena'),
(17, 420, 'asd a ', 'cadena'),
(17, 421, 'asd a ', 'cadena'),
(18, 414, '', 'entero'),
(18, 417, '', 'entero'),
(18, 418, '', 'entero'),
(18, 419, '', 'entero'),
(18, 420, '', 'entero'),
(18, 421, '', 'entero');

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
  ADD CONSTRAINT `fk_descriptor_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_descriptor_regla` FOREIGN KEY (`id_regla_validacion`) REFERENCES `regla_validacion` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_usuario` FOREIGN KEY (`id_usuario_administrador`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_pedido_tipo_estado` FOREIGN KEY (`id_tipo_estado`) REFERENCES `tipo_estado_pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_describible` FOREIGN KEY (`id`) REFERENCES `describible` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_tipo_iva` FOREIGN KEY (`id_tipo_iva`) REFERENCES `tipo_iva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `tipo_iva`
--
ALTER TABLE `tipo_iva`
  ADD CONSTRAINT `fk_tipo_iva_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_valor_descriptor_descriptor` FOREIGN KEY (`id_descriptor`) REFERENCES `descriptor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
