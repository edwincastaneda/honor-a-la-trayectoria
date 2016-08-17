# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Base de datos: asistencia
# Tiempo de Generación: 2016-08-16 23:03:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla asignacionmesa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `asignacionmesa`;

CREATE TABLE `asignacionmesa` (
  `mesa` varchar(45) NOT NULL,
  `silla` varchar(45) NOT NULL,
  `codigoBarras` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla asistencia
# ------------------------------------------------------------

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombresApellidos` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `codigoBarras` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `empresa` varchar(150) CHARACTER SET latin1 DEFAULT '',
  `departamento` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `puesto` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `asistencia` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fechaIngreso` varchar(45) CHARACTER SET latin1 DEFAULT '',
  `anios` int(10) unsigned NOT NULL,
  `numPersonas` int(10) unsigned NOT NULL,
  `confirmacion` int(10) unsigned NOT NULL DEFAULT '1',
  `entregaPin` int(10) unsigned NOT NULL,
  `entregadorPin` varchar(45) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`codigoBarras`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;



# Volcado de tabla columnista
# ------------------------------------------------------------

DROP TABLE IF EXISTS `columnista`;

CREATE TABLE `columnista` (
  `idcolumnista` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `entregadorPin` int(10) unsigned NOT NULL,
  `texto` longtext NOT NULL,
  PRIMARY KEY (`idcolumnista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla localidades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `localidades`;

CREATE TABLE `localidades` (
  `descripcion` varchar(100) DEFAULT NULL,
  `columnas` int(11) DEFAULT NULL,
  `filas` int(11) DEFAULT NULL,
  `padre_descripcion` varchar(100) DEFAULT NULL,
  `padre_columna` int(11) DEFAULT NULL,
  `padre_fila` int(11) DEFAULT NULL,
  `mesas` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla mesas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mesas`;

CREATE TABLE `mesas` (
  `no_mesa` int(11) NOT NULL,
  `no_sillas` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `contenedor` varchar(11) DEFAULT NULL,
  `columna` int(11) DEFAULT NULL,
  `fila` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla opciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `opciones`;

CREATE TABLE `opciones` (
  `nombre` varchar(50) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla opcionescategorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `opcionescategorias`;

CREATE TABLE `opcionescategorias` (
  `categoria` varchar(20) DEFAULT NULL,
  `color` varchar(11) DEFAULT NULL,
  `color2` varchar(11) DEFAULT NULL,
  `texto` varchar(11) DEFAULT '',
  `nombrePiedra` varchar(20) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla perfilentregador
# ------------------------------------------------------------

DROP TABLE IF EXISTS `perfilentregador`;

CREATE TABLE `perfilentregador` (
  `idperfilEntregador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  PRIMARY KEY (`idperfilEntregador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
