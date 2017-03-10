-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2013 a las 06:18:38
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cat` varchar(45) UNIQUE DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_cat`, `descripcion`) VALUES
(1, 'Alimentacion', 'Elige el alimento adecuado que tu perrito requiera.'),
(2, 'Higiene', 'Los mejores antiparásitos, siempre a la vanguardia.'),
(3, 'Collares', 'Fabricados en nylon, cuero, lona y con toda clase de accesorios.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` text,
  `correo` varchar(45) UNIQUE DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `password` varchar(32) UNIQUE DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `correo`, `usuario`, `password`, `tipo`) VALUES
(1, 'Juan', 'Román', 'Camino a la Joya # 10', 'juan@hotmail.com', 'juan', md5('1234'), 1),
(2, 'Sonia', 'Pérez', 'Calle Pino # 85', 'sonia@hotmal.com', 'sonia', md5('5678'), 1),
(3, 'Pepe', 'Ramos', 'Calle Jabugo', 'pepe@hotmail.com', 'pepe', md5('9101'), 1),
(4, 'Admin', 'Admin', 'Admin', 'admin@hotmail.com', 'admin', md5('123'), 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE IF NOT EXISTS `detalle_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `Pedidos_id` int(11) NOT NULL,
  `Productos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_pedidos_Pedidos1` (`Pedidos_id`),
  KEY `fk_detalle_pedidos_Productos1` (`Productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `cantidad`, `precio`, `Pedidos_id`, `Productos_id`) VALUES
(1, 2, 12, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `comentario` text,
  `Clientes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pedidos_Clientes1` (`Clientes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `total`, `comentario`, `Clientes_id`) VALUES
(1, '2013-06-10', 12, '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) UNIQUE DEFAULT NULL,
  `descripcion` text,
  `precio` double DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `Categorias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Productos_Categorias` (`Categorias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `Categorias_id`) VALUES
(1, 'Collar Rojo', 'Kruuse Collar Reflectante Estrangulador Rojo 20x400.', 12, 'img/collar1.jpg', 3),
(2, 'Collar Verde', 'Kruuse Collar Reflectante Estrangulador Verde 20x400.', 8, 'img/collar2.jpg', 3),
(3, 'Collar Azul', 'Kruuse Collar Reflectante Estrangulador Azul 20x400.', 9, 'img/collar3.jpg', 3),
(4, 'Collar Amarillo', 'Kruuse Collar Reflectante Estrangulador Amarillo 20x400.', 11, 'img/collar4.jpg', 3),
(5, 'Pienso Royal Canin', 'Royal Canin Digestive Care para perros adultos 5 Kg.', 35, 'img/pienso1.jpg', 1),
(6, 'Pienso Bon Menu', 'BON MENÚ alimento para perros receta tradicional bolsa 4 kg.', 75, 'img/pienso2.jpg', 1),
(7, 'Pienso Affinity', 'Affinity Ultima Adult pienso para perros con pollo.', 85, 'img/pienso3.jpg', 1),
(8, 'Pienso Platinum', 'Platinum Adult Ibérico Pienso natural seco jugoso.', 78, 'img/pienso4.jpg', 1),
(9, 'Antiparasitos Scaliboor', 'Collar antiparasitario SCALIBOR 48 cm.', 21, 'img/anti1.jpg', 2),
(10, 'Antiparásitos Zipyran Plus', 'Zipyran plus antiparasitario interno para perros.', 20, 'img/anti2.jpg', 2),
(11, 'Antiparásitos Telmin', 'Antiparasitario Interno Telmin Unidia Suspensión Oral 50ml.', 12, 'img/anti3.jpg', 2),
(12, 'Antiparásitos Bayer', 'Bayer Advantix 6 Pipetas para perros 4-10kg.', 13, 'img/anti4.jpg', 2);

-- --------------------------------------------------------

--
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_detalle_pedidos_Pedidos1` FOREIGN KEY (`Pedidos_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_pedidos_Productos1` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Clientes1` FOREIGN KEY (`Clientes_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Categorias` FOREIGN KEY (`Categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
