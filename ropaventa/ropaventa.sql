-- phpMyAdmin SQL Dump
-- version 4.3.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2015 a las 21:02:19
-- Versión del servidor: 5.6.22
-- Versión de PHP: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ropaventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `producto_idproducto` int(11) NOT NULL,
  `pedido_idpedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('b9a9528fde83b94f06d7a8d46a9b1c41', '127.0.0.1', 'Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:37.0) Gecko/20100101 Firefox/37.0', 1428931373, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:8:"username";s:8:"edfortis";s:6:"status";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre_cliente` varchar(45) COLLATE ucs2_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE ucs2_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idcolor` int(11) NOT NULL,
  `nombre_color` varchar(45) COLLATE ucs2_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `nombre_color`) VALUES
(1, 'rojo'),
(2, 'blanco'),
(3, 'negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '127.0.0.1', 'eduardo', '2015-04-13 13:17:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idpedido` int(11) NOT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `codigo_postal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_envio` tinyint(4) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre_producto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `color_idcolor` int(11) NOT NULL,
  `talla_idtalla` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre_producto`, `precio`, `cantidad`, `color_idcolor`, `talla_idtalla`) VALUES
(1, 'pantalon mezclilla', 200, 100, 1, 2),
(2, 'camisa hawaii', 100, 10, 1, 1),
(3, 'camisa hawaii', 100, 10, 1, 1),
(4, 'camisa hawaii', 100, 10, 1, 1),
(5, 'prueba 2', 100, 10, 1, 1),
(6, 'prueba 3', 20, 1, 1, 1),
(7, 'Eduardo', 10, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `producto_vista`
--
CREATE TABLE IF NOT EXISTS `producto_vista` (
`idproducto` int(11)
,`nombre_producto` varchar(45)
,`precio` double
,`cantidad` int(11)
,`color_idcolor` int(11)
,`talla_idtalla` int(11)
,`idtalla` int(11)
,`numero_talla` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE IF NOT EXISTS `talla` (
  `idtalla` int(11) NOT NULL,
  `numero_talla` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`idtalla`, `numero_talla`) VALUES
(1, 'pequeña'),
(2, 'mediana'),
(3, 'grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'eduardo', '123', 'edfortis@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '192', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-04-08 20:54:08'),
(2, 'edfortis', '$2a$08$56c9t2jTPpCmSZQBpkQUsudt9KQ4wNhw2XdgpEHVT04JTXNGAzqcW', 'edfortis@yahoo.com.mx', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2015-04-13 13:17:17', '2015-04-08 20:56:45', '2015-04-13 13:17:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `producto_vista`
--
DROP TABLE IF EXISTS `producto_vista`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `producto_vista` AS select `producto`.`idproducto` AS `idproducto`,`producto`.`nombre_producto` AS `nombre_producto`,`producto`.`precio` AS `precio`,`producto`.`cantidad` AS `cantidad`,`producto`.`color_idcolor` AS `color_idcolor`,`producto`.`talla_idtalla` AS `talla_idtalla`,`talla`.`idtalla` AS `idtalla`,`talla`.`numero_talla` AS `numero_talla` from (`producto` join `talla` on((`producto`.`talla_idtalla` = `talla`.`idtalla`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`producto_idproducto`,`pedido_idpedido`), ADD KEY `fk_producto_has_pedido_pedido1_idx` (`pedido_idpedido`), ADD KEY `fk_producto_has_pedido_producto1_idx` (`producto_idproducto`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`), ADD KEY `fk_pedido_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`), ADD KEY `fk_producto_color1_idx` (`color_idcolor`), ADD KEY `fk_producto_talla1_idx` (`talla_idtalla`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idtalla`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indices de la tabla `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `idtalla` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
ADD CONSTRAINT `fk_producto_has_pedido_pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_producto_has_pedido_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
ADD CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `fk_producto_color1` FOREIGN KEY (`color_idcolor`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_producto_talla1` FOREIGN KEY (`talla_idtalla`) REFERENCES `talla` (`idtalla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
