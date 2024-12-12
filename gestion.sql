-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2013 a las 01:31:15
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `idActividad` int(11) NOT NULL AUTO_INCREMENT,
  `Actividad` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `interna` smallint(6) DEFAULT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idActividad`),
  KEY `fechainicio` (`fechainicio`),
  KEY `fechafin` (`fechafin`),
  KEY `Actividad` (`Actividad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `Actividad`, `interna`, `fechainicio`, `fechafin`, `estado`) VALUES
(1, 'Evento Linux en UES', 0, '2012-05-29', '2012-05-29', 0),
(2, 'Evento Linux en UPES', 1, '2012-05-29', '2012-05-29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

CREATE TABLE IF NOT EXISTS `afp` (
  `idAfp` int(11) NOT NULL AUTO_INCREMENT,
  `Afp` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAfp`),
  KEY `Afp` (`Afp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `afp`
--

INSERT INTO `afp` (`idAfp`, `Afp`, `estado`) VALUES
(1, 'AFP CONFIA', 1),
(2, 'AFP CRECER', 1),
(3, '000No Aplica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `idBanco` int(11) NOT NULL AUTO_INCREMENT,
  `Banco` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idBanco`),
  KEY `Banco` (`Banco`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`idBanco`, `Banco`, `orden`, `estado`) VALUES
(1, 'SCOTIABANK', 1, 1),
(2, 'BANCO AGRICOLA', 2, 1),
(3, 'CITI BANK', 3, 1),
(4, 'AMERICA CENTRAL CREDOMATIC', 4, 1),
(5, 'BANCO DE FOMENTO AGROPECUARIO', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE IF NOT EXISTS `biblioteca` (
  `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT,
  `Biblioteca` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `archivoDocumento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idBiblioteca`),
  KEY `Biblioteca` (`Biblioteca`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`idBiblioteca`, `Biblioteca`, `archivoDocumento`, `descripcion`, `link`, `fecha`) VALUES
(1, 'La Biblia de MySQL', 'docs/Hello World DOC.pdf', 'La Biblia de MySQL para aprender desde lo básico hasta los complejo de esta base de datos', '#', '2012-05-30'),
(2, 'La Biblia de PHP', 'docs/Hello World DOC.doc', 'La Biblia de PHP para aprender desde lo básico hasta los complejo de este lenguaje informático', '#', '2012-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `usuario` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `fechahora` datetime DEFAULT NULL,
  `tabla` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `registro` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `accion` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL,
  KEY `usuario` (`usuario`),
  KEY `accion` (`accion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`usuario`, `ip`, `fechahora`, `tabla`, `registro`, `accion`, `estado`) VALUES
('MFUENTES', '::1', '2013-08-12 10:56:05', 'bitacora', '0', 'borrar', 0),
('MFUENTES', '::1', '2013-10-31 09:05:43', 'Estadocivil', '5', 'editar', 0),
('MFUENTES', '::1', '2013-10-31 09:05:54', 'Estadocivil', '4', 'editar', 0),
('MFUENTES', '::1', '2013-10-31 09:06:05', 'Estadocivil', '3', 'editar', 0),
('MFUENTES', '::1', '2013-10-31 09:06:14', 'Estadocivil', '3', 'editar', 0),
('MFUENTES', '::1', '2013-10-31 09:08:38', 'Estadocivil', '2', 'editar', 0),
('MFUENTES', '::1', '2013-10-31 09:08:46', 'Estadocivil', '1', 'editar', 0),
('MFUENTES', '::1', '2013-11-05 08:47:46', 'Opcion', '51', 'editar', 0),
('MFUENTES', '::1', '2013-11-05 08:48:29', 'Opcion', '51', 'editar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda`
--

CREATE TABLE IF NOT EXISTS `boda` (
  `idBoda` int(11) NOT NULL AUTO_INCREMENT,
  `Boda` varchar(65) COLLATE latin1_general_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Seguimientobodadetalle` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBoda`),
  KEY `Boda` (`Boda`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `boda`
--

INSERT INTO `boda` (`idBoda`, `Boda`, `fecha`, `descripcion`, `Seguimientobodadetalle`, `estado`) VALUES
(1, 'Mauricio Fuentes e Ileana Hernández', '2011-01-29', NULL, NULL, 1),
(2, 'juan y juanita perez', '2012-10-12', NULL, NULL, 1),
(3, 'jose luis y amanda miguel', '2012-10-12', NULL, NULL, 1),
(4, 'juan carlos y anita bonilla', '2012-10-12', NULL, NULL, 1),
(5, 'margartia y carmen ponce', '2012-10-12', NULL, NULL, 1),
(6, 'carlos y maria campos', '2012-10-12', NULL, NULL, 1),
(7, 'salomon mesquita y maria campos', '2012-10-12', NULL, NULL, 1),
(8, 'jose luis y carlita gomez', '2012-10-12', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogocuentas`
--

CREATE TABLE IF NOT EXISTS `catalogocuentas` (
  `idCatalogocuentas` int(11) NOT NULL AUTO_INCREMENT,
  `Catalogocuentas` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `codCatalogocuentas` varchar(24) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `esdetalle` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCatalogocuentas`),
  KEY `Catalogocuentas` (`idCatalogocuentas`),
  KEY `codCatalogocuentas` (`codCatalogocuentas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `catalogocuentas`
--

INSERT INTO `catalogocuentas` (`idCatalogocuentas`, `Catalogocuentas`, `codCatalogocuentas`, `esdetalle`, `estado`) VALUES
(1, 'ACTIVO', '1', 0, 1),
(2, 'ACTIVO CORRIENTE', '11', 0, 1),
(3, 'EFECTIVO Y EQUIVALENTES', '1101', 0, 1),
(4, 'CAJA GENERAL', '1101001', 0, 1),
(5, 'Caja general', '110100101', 0, 1),
(6, 'FONDOS DEPOSITADOS EN BANCOS', '1101002', 0, 1),
(7, 'Cuentas Corrientes', '110100201', 0, 1),
(8, 'Banco Citi Bank', '110100201001', 1, 1),
(9, 'Banco Agrícola', '110100201002', 1, 1),
(10, 'Banco HSBC', '110100201003', 1, 1),
(11, 'Cuentas de Ahorro', '110100202', 0, 1),
(12, 'Banco Citi Bank', '110100202001', 1, 1),
(13, 'Banco Agrícola', '110100202002', 1, 1),
(14, 'Banco HSBC', '110100202003', 1, 1),
(15, 'Depósitos a Plazos', '110100203', 0, 1),
(16, 'Banco Citi Bank', '110100303001', 1, 1),
(17, 'Banco Agrícola', '110100203002', 1, 1),
(18, 'Banco HSBC', '110100203003', 1, 1),
(19, 'INVERSIONES A CORTO PLAZO', '1101003', 0, 0),
(20, 'En acciones ', '110100301', 1, 1),
(21, 'En bonos', '110100302', 1, 1),
(22, 'En reportos', '110100303', 1, 1),
(23, 'INVENTARIOS', '1102', 0, 1),
(24, 'APLICACIONES', '1102001', 0, 1),
(25, 'CUENTAS Y DOCUMENTOS POR COBRAR A CORTO PLAZO', '1103', 0, 1),
(26, 'CUENTAS POR COBRAR', '1103001', 0, 1),
(27, 'Clientes', '110300101', 1, 1),
(28, 'Anticipo a proveedores', '110300102', 1, 1),
(29, 'Anticipo a empleados', '110300103', 1, 1),
(30, 'Intereses por cobrar', '110300104', 1, 1),
(31, 'Préstamos', '110300105', 1, 1),
(32, 'CUENTAS DE RESULTADO ACREEDORAS', '5', 0, 1),
(33, 'INGRESOS POR SERVICIOS', '51', 0, 1),
(34, 'INGRESOS POR SERVICIOS', '5101', 0, 1),
(35, 'VENTAS DE HARDWARE y SOFTWARE', '5101001', 0, 1),
(36, 'Consultorias y soporte técnico por horas', '510100101', 1, 1),
(37, 'Ventas de software de computadoras', '510100102', 1, 1),
(38, 'Venta de computadoras, partes y accesorios', '510100103', 1, 1),
(39, 'OTROS INGRESOS', '5102', 0, 1),
(40, 'INGRESOS NO RELACIONADOS', '5102001', 0, 1),
(41, 'Intereses ganados', '510100201', 1, 1),
(42, 'Ganancias por venta de activos', '510100202', 1, 1),
(43, 'Otros', '510200203', 1, 1),
(44, 'CUENTAS LIQUIDADORAS DE RESULTADOS', '6', 0, 1),
(45, 'PÉRDIDAS Y GANANCIAS', '61', 0, 1),
(46, 'PÉRDIDAS Y GANANCIAS', '6101', 0, 1),
(47, 'CUENTAS DE ORDEN DEUDORAS', '7', 0, 1),
(48, 'CUENTAS DE ORDEN DEUDORAS', '71', 0, 1),
(49, 'CUENTAS DE ORDEN DEUDORAS', '7101', 0, 1),
(50, 'CUENTAS DE ORDEN ACREEDORAS', '8', 0, 1),
(51, 'CUENTAS DE ORDEN ACREEDORAS', '81', 0, 1),
(52, 'CUENTAS DE ORDEN POR CONTRA', '8101', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriamedio`
--

CREATE TABLE IF NOT EXISTS `categoriamedio` (
  `idCategoriamedio` int(11) NOT NULL AUTO_INCREMENT,
  `Categoriamedio` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idCategoriamedio`),
  KEY `Categoriamedio` (`Categoriamedio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categoriamedio`
--

INSERT INTO `categoriamedio` (`idCategoriamedio`, `Categoriamedio`, `orden`, `estado`) VALUES
(1, 'Finanzas', 1, 1),
(2, 'Informática de Plataformas', 2, 1),
(3, 'Informática de Base de Datos', 3, 1),
(4, 'Biología', 4, 1),
(5, 'Botánica', 5, 1),
(6, 'Publicidad de Tecnología', 6, 1),
(7, 'Geología', 7, 1),
(8, 'Lenguajes de Programación', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `Ciudad` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `idPais` int(11) NOT NULL DEFAULT '0',
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idCiudad`),
  KEY `Ciudad` (`Ciudad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=537 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `Ciudad`, `idPais`, `orden`, `estado`) VALUES
(1, 'BUENOS AIRES', 10, 1, 1),
(2, 'CORDOBA', 10, 2, 1),
(3, 'CORDOVA', 10, 3, 1),
(4, 'FORMOSA', 10, 4, 1),
(5, 'PARANA', 10, 5, 1),
(6, 'SANTA FE', 10, 6, 1),
(7, 'TUCUMAN', 10, 7, 1),
(8, 'NUEVA GALES DEL SUR', 13, 8, 1),
(9, 'QUEENSLAND', 13, 9, 1),
(10, 'SYDNEY', 13, 10, 1),
(11, 'VICTORIA', 13, 11, 1),
(12, 'LA PAZ', 26, 12, 1),
(13, 'SANTA CRUZ', 26, 13, 1),
(14, 'AMAZONAS', 29, 14, 1),
(15, 'BAHIA', 29, 15, 1),
(16, 'BRASILIA', 29, 16, 1),
(17, 'CEARA', 29, 17, 1),
(18, 'GOIAS', 29, 18, 1),
(19, 'MANAO', 29, 19, 1),
(20, 'PARÁ', 29, 20, 1),
(21, 'PARAIBA', 29, 21, 1),
(22, 'PARANA', 29, 22, 1),
(23, 'PERNAMBUCO', 29, 23, 1),
(24, 'PORTO ALEGRE', 29, 24, 1),
(25, 'RIO DE JANEIRO', 29, 25, 1),
(26, 'RIO GRANDE DEL NORTE', 29, 26, 1),
(27, 'RIO GRANDE DEL SUR', 29, 27, 1),
(28, 'SAO PAULO', 29, 28, 1),
(29, 'SOFIA', 32, 29, 1),
(30, 'ALBERTA', 37, 30, 1),
(31, 'BRITISH COLUMBIA', 37, 31, 1),
(32, 'NEW BRUNSWICK', 37, 32, 1),
(33, 'ONTARIO', 37, 33, 1),
(34, 'QUEBEC', 37, 34, 1),
(35, 'SURREY', 37, 35, 1),
(36, 'TORONTO', 37, 36, 1),
(37, 'ARAUCO', 42, 37, 1),
(38, 'DECIMA REGION', 42, 38, 1),
(39, 'LINARES', 42, 39, 1),
(40, 'NOVENA REGION', 42, 40, 1),
(41, 'OCTAVA REGION', 42, 41, 1),
(42, 'PRIMERA REGION', 42, 42, 1),
(43, 'QUINTA REGION', 42, 43, 1),
(44, 'SANTIAGO', 42, 44, 1),
(45, 'SZOLNOK', 42, 45, 1),
(46, 'VALPARAISO', 42, 46, 1),
(47, 'BEIJING', 43, 47, 1),
(48, 'CANTON', 43, 48, 1),
(49, 'GUANGDONG', 43, 49, 1),
(50, 'GUANGDONG', 43, 50, 1),
(51, 'GUANGXI', 43, 51, 1),
(52, 'HONG KONG', 43, 52, 1),
(53, 'MACAU', 43, 53, 1),
(54, 'NANHAI', 43, 54, 1),
(55, 'SHANGHAI', 43, 55, 1),
(56, 'TAIWAN', 43, 56, 1),
(57, 'ANTIOQUIA', 44, 57, 1),
(58, 'ATLANTICO', 44, 58, 1),
(59, 'BOGOTA', 44, 59, 1),
(60, 'BOLIVAR', 44, 60, 1),
(61, 'CALI', 44, 61, 1),
(62, 'CUNDINAMARCA', 44, 62, 1),
(63, 'MEDELLIN', 44, 63, 1),
(64, 'META', 44, 64, 1),
(65, 'PALMIRA', 44, 65, 1),
(66, 'RISARALDA', 44, 66, 1),
(67, 'SANTANDER', 44, 67, 1),
(68, 'SUCRE', 44, 68, 1),
(69, 'TOLIMA', 44, 69, 1),
(70, 'VALLE DEL CAUCA', 44, 70, 1),
(71, 'ALAJUELA', 48, 71, 1),
(72, 'CARTAGO', 48, 72, 1),
(73, 'GUANACASTE', 48, 73, 1),
(74, 'HEREDIA', 48, 74, 1),
(75, 'LIBERIA', 48, 75, 1),
(76, 'LIMON', 48, 76, 1),
(77, 'LIMON', 48, 77, 1),
(78, 'SAN CARLOS', 48, 78, 1),
(79, 'SAN JOSE', 48, 79, 1),
(80, 'TEJAR GUARCO', 48, 80, 1),
(81, 'BAYEROS', 51, 81, 1),
(82, 'CAMAGUEY', 51, 82, 1),
(83, 'GRANMA', 51, 83, 1),
(84, 'HOLGUIN', 51, 84, 1),
(85, 'LA HABANA', 51, 85, 1),
(86, 'LA HABANA', 51, 86, 1),
(87, 'LAS VIAS', 51, 87, 1),
(88, 'MATANZAS', 51, 88, 1),
(89, 'ORIENTE', 51, 89, 1),
(90, 'SANTA CLARA', 51, 90, 1),
(91, 'SANTA CLARA', 51, 91, 1),
(92, 'SANTA CLARA', 51, 92, 1),
(93, 'VILLA CLARA', 51, 93, 1),
(94, 'LIMASOL', 52, 94, 1),
(95, 'PYONGYANG', 54, 95, 1),
(96, 'CIUDAD CAPITAL', 59, 96, 1),
(97, 'LA ALTAGRACIA', 59, 97, 1),
(98, 'LA ROMANA', 59, 98, 1),
(99, 'REPUBLICA DOMINICANA', 59, 99, 1),
(100, 'SAN JUAN', 59, 100, 1),
(101, 'SANTO DOMINGO', 59, 101, 1),
(102, 'AZUAY', 60, 102, 1),
(103, 'GUAYAQUIL', 60, 103, 1),
(104, 'PICHINCHA', 60, 104, 1),
(105, 'PROVINCIA DE EL ORO', 60, 105, 1),
(106, 'PROVINCIA DE LOS RIOS', 60, 106, 1),
(107, 'PROVINCIA DEL GUAYAS', 60, 107, 1),
(108, 'QUITO', 60, 108, 1),
(109, 'EL CAIRO', 61, 109, 1),
(110, 'EL FARNAWANY', 61, 110, 1),
(111, 'GIZA', 61, 111, 1),
(112, 'AHUACHAPAN', 1, 112, 1),
(113, 'CABAÑAS', 1, 113, 1),
(114, 'CHALATENANGO', 1, 114, 1),
(115, 'CUSCATLAN', 1, 115, 1),
(116, 'LA LIBERTAD', 1, 116, 1),
(117, 'LA PAZ', 1, 117, 1),
(118, 'LA UNION', 1, 118, 1),
(119, 'MORAZAN', 1, 119, 1),
(120, 'SAN MIGUEL', 1, 120, 1),
(121, 'SAN SALVADOR', 1, 121, 1),
(122, 'SAN VICENTE', 1, 122, 1),
(123, 'SANTA ANA', 1, 123, 1),
(124, 'SONSONATE', 1, 124, 1),
(125, 'USULUTAN', 1, 125, 1),
(126, 'TBILISI', 74, 126, 1),
(127, 'ALEMANIA', 75, 127, 1),
(128, 'BAVIERA', 75, 128, 1),
(129, 'BERLIN', 75, 129, 1),
(130, 'BONN', 75, 130, 1),
(131, 'BRAUNSCHWEIG', 75, 131, 1),
(132, 'BREMEN', 75, 132, 1),
(133, 'COLOGNE', 75, 133, 1),
(134, 'ERLANGEN', 75, 134, 1),
(135, 'ESSEN', 75, 135, 1),
(136, 'FRANCFORT DEL MENO', 75, 136, 1),
(137, 'HEIDELBERG', 75, 137, 1),
(138, 'HESSEN', 75, 138, 1),
(139, 'KASSEL', 75, 139, 1),
(140, 'LEVERKUSEN', 75, 140, 1),
(141, 'NIEDERSACHSEN', 75, 141, 1),
(142, 'NIODERFCHACEN', 75, 142, 1),
(143, 'NORTE WESTFALIA', 75, 143, 1),
(144, 'NURNBERG', 75, 144, 1),
(145, 'REUTLINGEN', 75, 145, 1),
(146, 'RHEINLAND-PFALZ', 75, 146, 1),
(147, 'SCHLESWIG-HOLSTEIN', 75, 147, 1),
(148, 'STUTTGART', 75, 148, 1),
(149, 'WESTFALEN', 75, 149, 1),
(150, 'WESTPREUSSEN', 75, 150, 1),
(151, 'WOLFENBUTTEL', 75, 151, 1),
(152, 'ALTA VERAPAZ', 83, 152, 1),
(153, 'BAJA VERAPAZ', 83, 153, 1),
(154, 'CHIMALTENANGO', 83, 154, 1),
(155, 'CHIQUIMULA', 83, 155, 1),
(156, 'CHUCHAPA', 83, 156, 1),
(157, 'DOLORES', 83, 157, 1),
(158, 'EL PROGRESO', 83, 158, 1),
(159, 'EL QUICHE', 83, 159, 1),
(160, 'ESCUINTLA', 83, 160, 1),
(161, 'GUATEMALA', 83, 161, 1),
(162, 'GUEGUETENANGO', 83, 162, 1),
(163, 'HUEHUETENANGO', 83, 163, 1),
(164, 'IZABAL', 83, 164, 1),
(165, 'JALAPA', 83, 165, 1),
(166, 'JALPATAGUA', 83, 166, 1),
(167, 'JUTIAPA', 83, 167, 1),
(168, 'NUEVA ANGUIATU', 83, 168, 1),
(169, 'PETEN', 83, 169, 1),
(170, 'PUERTO BARRIOS', 83, 170, 1),
(171, 'QUEZALTENANGO', 83, 171, 1),
(172, 'RETALHULEU', 83, 172, 1),
(173, 'SACATEPEQUEZ', 83, 173, 1),
(174, 'SAN MARCOS', 83, 174, 1),
(175, 'SANTA ROSA', 83, 175, 1),
(176, 'SANTA ROSA DE LIMA', 83, 176, 1),
(177, 'SOLOLA', 83, 177, 1),
(178, 'SUCHITEPEQUEZ', 83, 178, 1),
(179, 'TIQUISATE', 83, 179, 1),
(180, 'TOTONICAPAN', 83, 180, 1),
(181, 'ZACAPA', 83, 181, 1),
(182, 'ZACATEPEQUES', 83, 182, 1),
(183, 'ARAMECINA', 89, 183, 1),
(184, 'ATLANTIDA', 89, 184, 1),
(185, 'CHOLUTECA', 89, 185, 1),
(186, 'COLON', 89, 186, 1),
(187, 'COMAYAGUA', 89, 187, 1),
(188, 'COMAYAGUELA', 89, 188, 1),
(189, 'COPAN', 89, 189, 1),
(190, 'CORTES', 89, 190, 1),
(191, 'DISTRITO CENTRAL', 89, 191, 1),
(192, 'EL PARAISO', 89, 192, 1),
(193, 'FCO. MORAZAN', 89, 193, 1),
(194, 'GRACIAS A DIOS', 89, 194, 1),
(195, 'HONDURAS', 89, 195, 1),
(196, 'INTIBUCA', 89, 196, 1),
(197, 'LA CEIBA', 89, 197, 1),
(198, 'LA PAZ', 89, 198, 1),
(199, 'LEMPIRA', 89, 199, 1),
(200, 'NACAOME', 89, 200, 1),
(201, 'OCOTEPEQUE', 89, 201, 1),
(202, 'OLANCHO', 89, 202, 1),
(203, 'PROGRESO', 89, 203, 1),
(204, 'PUERTO CORTEZ', 89, 204, 1),
(205, 'SAN MARCOS', 89, 205, 1),
(206, 'SAN PEDRO SULA', 89, 206, 1),
(207, 'SANTA BARBARA', 89, 207, 1),
(208, 'TEGUCIGALPA', 89, 208, 1),
(209, 'VALLE', 89, 209, 1),
(210, 'VERACRUZ', 89, 210, 1),
(211, 'YORO', 89, 211, 1),
(212, 'AJMER', 93, 212, 1),
(213, 'BABOLSAR', 95, 213, 1),
(214, 'ESFAHAN', 95, 214, 1),
(215, 'FARS', 95, 215, 1),
(216, 'KHORASAN', 95, 216, 1),
(217, 'KHUZESTAN', 95, 217, 1),
(218, 'KUWAIT', 95, 218, 1),
(219, 'RASHT', 95, 219, 1),
(220, 'TEHERAN', 95, 220, 1),
(221, 'YAZD', 95, 221, 1),
(222, 'DUBLIN', 97, 222, 1),
(223, 'JERUSALEN', 98, 223, 1),
(224, 'JORDANIA', 98, 224, 1),
(225, 'TEL AVIV', 98, 225, 1),
(226, 'ALESANDRIA', 99, 226, 1),
(227, 'ASTI', 99, 227, 1),
(228, 'BERGAMO', 99, 228, 1),
(229, 'BOLOGNA', 99, 229, 1),
(230, 'BRESCIA', 99, 230, 1),
(231, 'CAMPANIA', 99, 231, 1),
(232, 'COMO', 99, 232, 1),
(233, 'CREMONA', 99, 233, 1),
(234, 'DI SALERNO', 99, 234, 1),
(235, 'EMILIA-ROMAÑA', 99, 235, 1),
(236, 'FLORENCIA', 99, 236, 1),
(237, 'FOGGIA', 99, 237, 1),
(238, 'GENOVA', 99, 238, 1),
(239, 'LECCO', 99, 239, 1),
(240, 'LOMBARDIA', 99, 240, 1),
(241, 'LUCCA', 99, 241, 1),
(242, 'MILAN', 99, 242, 1),
(243, 'MILANO', 99, 243, 1),
(244, 'NAPOLES', 99, 244, 1),
(245, 'NOVARA', 99, 245, 1),
(246, 'P. TORINO', 99, 246, 1),
(247, 'PADOVA', 99, 247, 1),
(248, 'PARMA', 99, 248, 1),
(249, 'PAVIA', 99, 249, 1),
(250, 'PRATO', 99, 250, 1),
(251, 'PROVINCIA DE PADUA', 99, 251, 1),
(252, 'REGGIO EMILIA', 99, 252, 1),
(253, 'ROMA', 99, 253, 1),
(254, 'TORTONA', 99, 254, 1),
(255, 'turin', 99, 255, 1),
(256, 'TURIN', 99, 256, 1),
(257, 'VARESE', 99, 257, 1),
(258, 'VENECIA', 99, 258, 1),
(259, 'VENETO', 99, 259, 1),
(260, 'KINGSTON', 100, 260, 1),
(261, 'FUKUOKA', 101, 261, 1),
(262, 'HOKKAIDO', 101, 262, 1),
(263, 'KANAGAWA', 101, 263, 1),
(264, 'TAGATA', 101, 264, 1),
(265, 'TOKIO', 101, 265, 1),
(266, 'YOKOHAMA', 101, 266, 1),
(267, 'AKABA', 102, 267, 1),
(268, 'AMMAN', 102, 268, 1),
(269, 'BELEN', 102, 269, 1),
(270, 'BETHLEHEN', 102, 270, 1),
(271, 'CISJORDANIA', 102, 271, 1),
(272, 'JAFFA', 102, 272, 1),
(273, 'JERUSALEN', 102, 273, 1),
(274, 'ALMATI', 103, 274, 1),
(275, 'ALAHMADI', 106, 275, 1),
(276, 'KUWAIT', 106, 276, 1),
(277, 'BEIRUT', 111, 277, 1),
(278, 'BSHARRI', 111, 278, 1),
(279, 'SAN PEDRO SULA', 120, 279, 1),
(280, 'JOHORE', 121, 280, 1),
(281, 'AGUASCALIENTES', 130, 281, 1),
(282, 'ATIZAPAN DE ZARAGOZA', 130, 282, 1),
(283, 'BAJA CALIFORNIA', 130, 283, 1),
(284, 'CHIAPAS', 130, 284, 1),
(285, 'CHIHUAHUA', 130, 285, 1),
(286, 'COAHUILA', 130, 286, 1),
(287, 'DISTRITO FEDERAL', 130, 287, 1),
(288, 'ECATEPEC', 130, 288, 1),
(289, 'ESTADO DE MEXICO', 130, 289, 1),
(290, 'GUADALAJARA', 130, 290, 1),
(291, 'GUANAJUATO', 130, 291, 1),
(292, 'HIDALGO', 130, 292, 1),
(293, 'JALISCO', 130, 293, 1),
(294, 'MEXICO', 130, 294, 1),
(295, 'MICHOACAN', 130, 295, 1),
(296, 'MONTERREY', 130, 296, 1),
(297, 'MORELOS', 130, 297, 1),
(298, 'NUEVO LEON', 130, 298, 1),
(299, 'OAXACA', 130, 299, 1),
(300, 'PUEBLA', 130, 300, 1),
(301, 'QUERETARO', 130, 301, 1),
(302, 'QUINTANA ROO', 130, 302, 1),
(303, 'SAN LUIS POTOSI', 130, 303, 1),
(304, 'SINALOA', 130, 304, 1),
(305, 'SONORA', 130, 305, 1),
(306, 'TABASCO', 130, 306, 1),
(307, 'TAMAULIPAS', 130, 307, 1),
(308, 'TLAXCALA', 130, 308, 1),
(309, 'VERACRUZ', 130, 309, 1),
(310, 'YUCATAN', 130, 310, 1),
(311, 'ZACATECAS', 130, 311, 1),
(312, 'AMSTERDAM', 142, 312, 1),
(313, 'AMSTERDAM', 142, 313, 1),
(314, 'GÜELDRES', 142, 314, 1),
(315, 'UTRECHT', 142, 315, 1),
(316, 'BONAIRE', 143, 316, 1),
(317, 'AUCKLAND', 145, 317, 1),
(318, 'NEW PLYMOUTH', 145, 318, 1),
(319, 'BLUEFIELDS', 146, 319, 1),
(320, 'CARAZO', 146, 320, 1),
(321, 'CHINANDEGA', 146, 321, 1),
(322, 'CHONTALES', 146, 322, 1),
(323, 'ESTELI', 146, 323, 1),
(324, 'GRANADA', 146, 324, 1),
(325, 'ISLA DE OMETEPE', 146, 325, 1),
(326, 'JALAPA', 146, 326, 1),
(327, 'JINOTEGA', 146, 327, 1),
(328, 'LEON', 146, 328, 1),
(329, 'MANAGUA', 146, 329, 1),
(330, 'MASAYA', 146, 330, 1),
(331, 'MATAGALPA', 146, 331, 1),
(332, 'NUEVA GUINEA', 146, 332, 1),
(333, 'NUEVA SEGOVIA', 146, 333, 1),
(334, 'RIVAS', 146, 334, 1),
(335, 'SOMOTO', 146, 335, 1),
(336, 'ZELAYA', 146, 336, 1),
(337, 'BELEN', 153, 337, 1),
(338, 'CISJORDANIA', 153, 338, 1),
(339, 'PALESTINA', 153, 339, 1),
(340, 'BOCAS DEL TORO', 157, 340, 1),
(341, 'CHILIBRE', 157, 341, 1),
(342, 'CHIRIQUI', 157, 342, 1),
(343, 'COCLE', 157, 343, 1),
(344, 'COCLE DEL NORTE', 157, 344, 1),
(345, 'COLON', 157, 345, 1),
(346, 'DISTRITO DE SAN MIGUELITO', 157, 346, 1),
(347, 'HERRERA', 157, 347, 1),
(348, 'PANAMA', 157, 348, 1),
(349, 'VERAGUAS', 157, 349, 1),
(350, 'ZONA CANAL DE PANAMA', 157, 350, 1),
(351, 'ASUNCION', 159, 351, 1),
(352, 'AREQUIPA', 160, 352, 1),
(353, 'BELLAVISTA', 160, 353, 1),
(354, 'CUSCO', 160, 354, 1),
(355, 'ICA', 160, 355, 1),
(356, 'LIMA', 160, 356, 1),
(357, 'PIURA', 160, 357, 1),
(358, 'MANILA', 161, 358, 1),
(359, 'BAYAMON', 165, 359, 1),
(360, 'FAJARDO', 165, 360, 1),
(361, 'PONCE', 165, 361, 1),
(362, 'SAN JUAN', 165, 362, 1),
(363, 'QATAR', 166, 363, 1),
(364, 'SEUL', 167, 364, 1),
(365, 'CERNANTI', 169, 365, 1),
(366, 'DOBROGEA', 169, 366, 1),
(367, 'TRANSILVANIA', 169, 367, 1),
(368, 'LENINGRADO', 171, 368, 1),
(369, 'MOSCU', 171, 369, 1),
(370, 'HEDAH', 181, 370, 1),
(371, 'PORTOLO', 183, 371, 1),
(372, 'DURBAN', 191, 372, 1),
(373, 'GALLE', 193, 373, 1),
(374, 'ESTOCOLMO', 198, 374, 1),
(375, 'GOTEMBURGO', 198, 375, 1),
(376, 'KOPING', 198, 376, 1),
(377, 'LUND', 198, 377, 1),
(378, 'REINO DE SUECIA', 198, 378, 1),
(379, 'UPPSALA', 198, 379, 1),
(380, NULL, 199, 380, 1),
(381, 'AARGAU', 199, 381, 1),
(382, 'GINEBRA', 199, 382, 1),
(383, 'LAUSANNE', 199, 383, 1),
(384, 'VALAIS', 199, 384, 1),
(385, 'VAUD', 199, 385, 1),
(386, 'ZURICH', 199, 386, 1),
(387, 'BANGKOK', 202, 387, 1),
(388, 'BERKSHIRE', 217, 388, 1),
(389, 'COVENTRY', 217, 389, 1),
(390, 'EASTBOURNE', 217, 390, 1),
(391, 'EDIMBURGO', 217, 391, 1),
(392, 'ESCOCIA', 217, 392, 1),
(393, 'GALES', 217, 393, 1),
(394, 'INGLATERRA', 217, 394, 1),
(395, 'LEICESTERSHIRE', 217, 395, 1),
(396, 'LONDRES', 217, 396, 1),
(397, 'MARSTON GREEN', 217, 397, 1),
(398, 'OXFORD', 217, 398, 1),
(399, 'OXFORDSHIRE', 217, 399, 1),
(400, 'POOLE', 217, 400, 1),
(401, 'TORBAY', 217, 401, 1),
(402, 'WIRRAL', 217, 402, 1),
(403, 'ALABAMA', 219, 403, 1),
(404, 'ARIZONA', 219, 404, 1),
(405, 'ARKANSAS', 219, 405, 1),
(406, 'BAJA CALIFORNIA SUR', 219, 406, 1),
(407, 'CALIFORNIA', 219, 407, 1),
(408, 'CAROLINA DEL NORTE', 219, 408, 1),
(409, 'CHICAGO', 219, 409, 1),
(410, 'COLORADO', 219, 410, 1),
(411, 'CONNECTICUT', 219, 411, 1),
(412, 'FLORIDA', 219, 412, 1),
(413, 'GEORGIA', 219, 413, 1),
(414, 'HAWAII', 219, 414, 1),
(415, 'HOUSTON', 219, 415, 1),
(416, 'ILLINOIS', 219, 416, 1),
(417, 'INDIANA', 219, 417, 1),
(418, 'IOWA', 219, 418, 1),
(419, 'KANSAS', 219, 419, 1),
(420, 'KENTUCKY', 219, 420, 1),
(421, 'LOUISIANA', 219, 421, 1),
(422, 'MARYLAND', 219, 422, 1),
(423, 'MASSACHUSETTS', 219, 423, 1),
(424, 'MICHIGAN', 219, 424, 1),
(425, 'MINNESOTA', 219, 425, 1),
(426, 'MISSISSIPI', 219, 426, 1),
(427, 'MISSOURI', 219, 427, 1),
(428, 'MONTEREY DARK', 219, 428, 1),
(429, 'NEVADA', 219, 429, 1),
(430, 'NEW JERSEY', 219, 430, 1),
(431, 'NEW YORK', 219, 431, 1),
(432, 'Newark', 219, 432, 1),
(433, 'NUEVO MEXICO', 219, 433, 1),
(434, 'OAKLAND', 219, 434, 1),
(435, 'OHIO', 219, 435, 1),
(436, 'OKLAHOMA', 219, 436, 1),
(437, 'OREGON', 219, 437, 1),
(438, 'PENNSYLVANIA', 219, 438, 1),
(439, 'PUERTO RICO', 219, 439, 1),
(440, 'RHODE ISLAND', 219, 440, 1),
(441, 'ROCKVILLE', 219, 441, 1),
(442, 'SALEN CAROLINA DEL NORTE', 219, 442, 1),
(443, 'TENNESSEE', 219, 443, 1),
(444, 'TEXAS', 219, 444, 1),
(445, 'UTAH', 219, 445, 1),
(446, 'VIRGINIA', 219, 446, 1),
(447, 'WASHINGTON', 219, 447, 1),
(448, 'WASHINGTON D.C.', 219, 448, 1),
(449, 'WISCONSIN', 219, 449, 1),
(450, 'MONTEVIDEO', 221, 450, 1),
(451, 'ANZOATEGUI', 224, 451, 1),
(452, 'ARAGUA', 224, 452, 1),
(453, 'BOLIVAR', 224, 453, 1),
(454, 'CABIMAS', 224, 454, 1),
(455, 'CARABOBO', 224, 455, 1),
(456, 'CARACAS', 224, 456, 1),
(457, 'DF.', 224, 457, 1),
(458, 'ECO ARENA', 224, 458, 1),
(459, 'ESTADO DE LARA', 224, 459, 1),
(460, 'ESTADO DE MIRANDA', 224, 460, 1),
(461, 'FALCON', 224, 461, 1),
(462, 'FALCON', 224, 462, 1),
(463, 'GUARENAS MIRANDA', 224, 463, 1),
(464, 'LA GUAIRA', 224, 464, 1),
(465, 'MERIDA', 224, 465, 1),
(466, 'MONAGAS', 224, 466, 1),
(467, 'PORTUGUESA', 224, 467, 1),
(468, 'SUCRE', 224, 468, 1),
(469, 'TRUJILLO', 224, 469, 1),
(470, 'VALENCIA', 224, 470, 1),
(471, 'YARACUY', 224, 471, 1),
(472, 'ZULIA', 224, 472, 1),
(473, 'ALPES MARITIMOS', 231, 473, 1),
(474, 'ALTOS PIRINEOS', 231, 474, 1),
(475, 'BOULOGNE', 231, 475, 1),
(476, 'CRETEIL', 231, 476, 1),
(477, 'DE SEINE MARITIME', 231, 477, 1),
(478, 'ESSONNE', 231, 478, 1),
(479, 'HAUTE SAVOIE', 231, 479, 1),
(480, 'HAUTS DE SEINE', 231, 480, 1),
(481, 'HERAULT', 231, 481, 1),
(482, 'INDRE', 231, 482, 1),
(483, 'ISERE', 231, 483, 1),
(484, 'LYON', 231, 484, 1),
(485, 'NEUILLY', 231, 485, 1),
(486, 'PARIS', 231, 486, 1),
(487, 'PIRINEOS ORIENTALES', 231, 487, 1),
(488, 'PYRENEES ATLANTIQUES', 231, 488, 1),
(489, 'SEINE', 231, 489, 1),
(490, 'SENA', 231, 490, 1),
(491, 'TUNEZ', 231, 491, 1),
(492, 'VAL DE MARNE', 231, 492, 1),
(493, 'VAL-D'' OISE', 231, 493, 1),
(494, 'YVELINES', 231, 494, 1),
(495, 'ÁLAVA', 233, 495, 1),
(496, 'ALBACETE', 233, 496, 1),
(497, 'ALICANTE', 233, 497, 1),
(498, 'BARCELONA', 233, 498, 1),
(499, 'BIZKAIA', 233, 499, 1),
(500, 'CACERES', 233, 500, 1),
(501, 'CANTABRIA', 233, 501, 1),
(502, 'CASTELLON', 233, 502, 1),
(503, 'CORDOBA', 233, 503, 1),
(504, 'GALICIA', 233, 504, 1),
(505, 'GRANADA', 233, 505, 1),
(506, 'GUIPUZCOA', 233, 506, 1),
(507, 'LA CORUÑA', 233, 507, 1),
(508, 'LAS PALMAS DE GRAN CANARI', 233, 508, 1),
(509, 'LOGROÑO', 233, 509, 1),
(510, 'MADRID', 233, 510, 1),
(511, 'MALAGA', 233, 511, 1),
(512, 'NAVARRA', 233, 512, 1),
(513, 'REUS', 233, 513, 1),
(514, 'SALAMANCA', 233, 514, 1),
(515, 'SAN SABASTIAN', 233, 515, 1),
(516, 'SARREAL', 233, 516, 1),
(517, 'SEVILLA', 233, 517, 1),
(518, 'TARRAGONA', 233, 518, 1),
(519, 'VALENCIA', 233, 519, 1),
(520, 'VITORIA', 233, 520, 1),
(521, 'VIZCAYA', 233, 521, 1),
(522, 'ZAMORA', 233, 522, 1),
(523, 'ZARAGOZA', 233, 523, 1),
(524, 'AMBERES', 235, 524, 1),
(525, 'BORGERHOUT', 235, 525, 1),
(526, 'BRABANT', 235, 526, 1),
(527, 'BRABANTE', 235, 527, 1),
(528, 'BRUSELAS', 235, 528, 1),
(529, 'LOUVAIN', 235, 529, 1),
(530, 'OOST VLAANDEREN', 235, 530, 1),
(531, 'HOVEDSTADEN', 237, 531, 1),
(532, 'BELICE', 239, 532, 1),
(533, 'CAYO', 239, 533, 1),
(534, 'DISTRITO DEL CAYO', 239, 534, 1),
(535, 'LYON', 239, 535, 1),
(536, 'ORANGE WALK TOWN', 239, 536, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion`
--

CREATE TABLE IF NOT EXISTS `coleccion` (
  `idColeccion` int(11) NOT NULL AUTO_INCREMENT,
  `Coleccion` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idColeccion`),
  KEY `Coleccion` (`Coleccion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `coleccion`
--

INSERT INTO `coleccion` (`idColeccion`, `Coleccion`, `anio`, `estado`) VALUES
(1, 'Crepusculo', 2011, 1),
(2, '25 Years Global Finance', 2012, 1),
(3, 'July/August 2012', 2012, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionmedio`
--

CREATE TABLE IF NOT EXISTS `condicionmedio` (
  `idCondicionmedio` int(11) NOT NULL AUTO_INCREMENT,
  `Condicionmedio` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idCondicionmedio`),
  KEY `Condicionmedio` (`Condicionmedio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `condicionmedio`
--

INSERT INTO `condicionmedio` (`idCondicionmedio`, `Condicionmedio`, `orden`, `estado`) VALUES
(1, 'Excelente', NULL, 1),
(2, 'Muy Bueno', NULL, 1),
(3, 'Bueno', NULL, 1),
(4, 'Deteriorado', NULL, 1),
(5, 'Muy Deteriorado', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE IF NOT EXISTS `contabilidad` (
  `idContabilidad` int(11) NOT NULL AUTO_INCREMENT,
  `Contabilidad` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idOrigencuenta` tinyint(4) DEFAULT NULL,
  `codCatalogocuentasXAcreedor` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `montoAcreedor` decimal(10,2) DEFAULT NULL,
  `codCatalogocuentasXDeudor` varchar(24) COLLATE latin1_general_ci DEFAULT NULL,
  `montoDeudor` decimal(10,2) DEFAULT NULL,
  `detalle` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContabilidad`),
  KEY `idOrigencuenta` (`idOrigencuenta`),
  KEY `codCatalogocuentasXAcreedor` (`codCatalogocuentasXAcreedor`),
  KEY `codCatalogocuentasXDeudor` (`codCatalogocuentasXDeudor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contabilidad`
--

INSERT INTO `contabilidad` (`idContabilidad`, `Contabilidad`, `fecha`, `idOrigencuenta`, `codCatalogocuentasXAcreedor`, `montoAcreedor`, `codCatalogocuentasXDeudor`, `montoDeudor`, `detalle`, `estado`) VALUES
(1, 'Venta de Sitio Web', '2012-11-22', 1, '510100102', 150.00, '110100201002', 150.00, '<p>Venta de Desarrollo de Sitio Web Astro a Carlos Cordero.</p>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidadpersonal`
--

CREATE TABLE IF NOT EXISTS `contabilidadpersonal` (
  `idContabilidadpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `Contabilidadpersonal` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idHorario` tinyint(4) DEFAULT NULL,
  `idCuenta` int(11) NOT NULL DEFAULT '0',
  `monto` decimal(10,2) DEFAULT NULL,
  `detalle` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContabilidadpersonal`),
  KEY `Contabilidadpersonal` (`Contabilidadpersonal`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `contabilidadpersonal`
--

INSERT INTO `contabilidadpersonal` (`idContabilidadpersonal`, `Contabilidadpersonal`, `fecha`, `idHorario`, `idCuenta`, `monto`, `detalle`, `estado`) VALUES
(1, 'PASAJE DEL BUS', '2009-12-09', 1, 1, 0.25, 'VIAJE POR LA MANANA EN MICROBUS DESDE MI CASA AL TRABAJO.', 0),
(2, 'PASAJE DEL BUS', '2009-12-09', 4, 1, 0.25, 'Pasaje del microbus del palacio de los deportes a la casa del bambu.', 0),
(3, 'PASAJE DEL BUS', '2009-12-10', 1, 1, 0.25, 'Pasaje del microbus de la casa al trabajo.', 0),
(4, 'COMPRA DE GUINEOS MANZANO', '2009-12-09', 4, 2, 0.25, 'Compra de Guineos Manzanos a la salida del trabajo en migracion.', 0),
(5, 'PASAJE DEL BUS', '2009-12-10', 5, 1, 0.25, 'Pasaje del Microbus del Trabajo a la casa.', 0),
(6, 'PASAJE DEL BUS', '2009-12-11', 1, 1, 0.25, 'Pasaje del Microbus de la Casa al Trabajo en Migracion', 0),
(7, 'DESAYUNO EN EL TRABAJO', '2009-12-10', 1, 3, 1.10, 'Desayuno en el Trabajo, tres panes con huevo y un jugo de lata.', 0),
(8, 'PRESTAMO PARA IR AL TRABAJO', '2009-12-10', 1, 4, 1.00, 'Tania me presto para venir al trabajo.', 0),
(9, 'PRESTAMO PARA IR AL TRABAJO', '2009-12-10', 1, 5, 5.00, 'Ileana me presto para venir al trabajo.', 0),
(10, 'SODA Y CHURROS', '2009-12-10', 2, 2, 0.96, 'Una Coca-cola portatil y tres tortrix', 0),
(11, 'SODA Y CHURROS', '2009-12-10', 2, 2, 0.96, 'Una Coca-cola portatil y tres tortrix', 0),
(12, 'CUMPLEANOS COMPANERO DE TRABAJO', '2009-12-10', 4, 6, 1.00, 'Cumpleanos companero de trabajo.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `Contacto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUnidad` smallint(6) DEFAULT NULL,
  `telefono` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `celular` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `fax` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `emailparticular` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `emailempresa` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idContacto`),
  KEY `Directorio` (`Contacto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `Contacto`, `idEmpresa`, `idUnidad`, `telefono`, `celular`, `fax`, `emailparticular`, `emailempresa`, `orden`, `estado`) VALUES
(6, 'Juan Antonio Gómez', 1, 26, '2254 2254', '7788 8899', '2254 2254', 'gomez@sscom.com', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoweb`
--

CREATE TABLE IF NOT EXISTS `contactoweb` (
  `idContactoweb` int(11) NOT NULL AUTO_INCREMENT,
  `Contactoweb` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `asunto` varchar(125) COLLATE latin1_general_ci DEFAULT NULL,
  `mensaje` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContactoweb`),
  KEY `email` (`email`),
  KEY `Contactoweb` (`Contactoweb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `contactoweb`
--

INSERT INTO `contactoweb` (`idContactoweb`, `Contactoweb`, `asunto`, `mensaje`, `email`, `estado`) VALUES
(1, 'Gomez, Juan Jose', 'hola quiero saber donde queda Kuwait', 'en el Cielo??', 'jgomez@yy.com', 1),
(2, 'Gomez Diaz, Jose Luis', 'cuando va a nevar en Zivar?', 'Quiza Nunca', 'jjgomez@hot.com', 1),
(3, 'Fuentes, Mauricio', 'Hola que tal', 'Que tal Folks!                        ', 'mauriciovladimir@yahoo.es', 1),
(4, 'Fuentes, Mauricio', 'Que tal Folks!', 'Ya está que bien!', 'mauriciovladimir@yahoo.es', 1),
(5, 'Fuentes, Mauricio', 'Que tal Folks!', 'Ya está que bien!', 'mauriciovladimir@yahoo.es', 1),
(6, 'Fuentes, Mauricio', 'Que tal Folks!', 'Ya está que bien!', 'mauriciovladimir@yahoo.es', 1),
(7, 'Fuentes, Mauricio', 'Que tal Folks! Como van?', 'Ojala que bien!                        ', 'mauriciovladimir@yahoo.es', 1),
(8, 'Fuentes Salguero, Mauricio Vlaidmir', 'Hola como va en Azul?', 'probando contactos en azul                        ', 'mvfuentes@gmail.com', 1),
(9, 'Fuentes Salguero, Mauricio Vlaidmir', 'Hola como va en Azul?', 'probando contactos en azul                        ', 'mvfuentes@gmail.com', 1),
(10, 'Fuentes Salguero, Mauricio Vlaidmir', 'Hola como va en Azul?', 'bien gracias..', 'mvfuentes@gmail.com', 1),
(11, 'Fuentes Salguero, Mauricio', 'Hola Como va?', 'Hola pasaba nomas por aqui..                        ', 'mvfuentes@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidomultimedia`
--

CREATE TABLE IF NOT EXISTS `contenidomultimedia` (
  `idContenidomultimedia` int(11) NOT NULL AUTO_INCREMENT,
  `Contenidomultimedia` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idSeccionmultimedia` smallint(6) DEFAULT NULL,
  `contenidohtml` text COLLATE latin1_general_ci NOT NULL,
  `Contenidomultimediadetalle` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContenidomultimedia`),
  KEY `Contenidomultimedia` (`Contenidomultimedia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `contenidomultimedia`
--

INSERT INTO `contenidomultimedia` (`idContenidomultimedia`, `Contenidomultimedia`, `idSeccionmultimedia`, `contenidohtml`, `Contenidomultimediadetalle`, `estado`) VALUES
(1, 'Sistema de Gestion Empresa de Servicios', 2, '<p><img style="float: left; margin-left: 5px; margin-right: 5px;" src="media/featured_product_01.jpg" alt="" width="142" height="85" />Desarrollo de un Sistema de Gestion Integrado para el manejo trabajo eficiente de una empresa de servicios, incluye administraci&oacute;n, ventas de productos y servicios, recursos humanos, facturaci&oacute;n y cobros, coberturas de personal, todo en ambiente intranet. Desarrollado en PHP/MySql sobre LINUX/UBUNTU SERVER. <br /><br /></p>\r\n<h2><a href="http://gestion001.codeplex.com/" target="_blank">Ver Proceso de Desarrollo<br />(Prototipos)</a></h2>', NULL, 1),
(2, 'Software desde la Perspectiva del Ingeniero', 1, '<p>La Ingeniera de software es la rama de la ingenier&iacute;a que crea y mantiene las aplicaciones de software aplicando tecnolog&iacute;as y pr&aacute;cticas de las ciencias computacionales, manejo de proyectos, ingenier&iacute;a, el &aacute;mbito de la aplicaci&oacute;n, y otros campos.</p>\r\n<p>El software es el conjunto de instrucciones que permite al hardware de la computadora desempear trabajo &uacute;til.</p>\r\n<p>La ingenier&iacute;a de software, como las disciplinas tradicionales de ingeniera, tiene que ver con el costo y la confiabilidad. Algunas aplicaciones de software contienen millones de l&iacute;neas de c&oacute;digo que se espera que se desempe&ntilde;en bien en condiciones siempre cambiantes.</p>\r\n<p>La Ingeniera del Software puede definirse como "la aplicaci&oacute;n inteligente de principios probados, t&eacute;cnicas, lenguajes y herramientas para la creaci&oacute;n y mantenimiento, dentro de un coste razonable, de software que satisfaga las necesidades de los usuarios"..</p>\r\n<p>Algunas personas cree que el t&eacute;rmino IS implica niveles de rigor y prueba de procesos que no son apropiados para todo tipo de desarrollo de software. Otras personas creen que el campo de la IS es suficientemente maduro para garantizar el t&iacute;tulo de "ingeniera". El criterio m&aacute;s com&uacute;n para distinguir al ingeniero de software es el conocimiento y aplicaci&oacute;n de las t&eacute;cnicas y herramientas de las metodolog&iacute;as de la Ingeniera del Software (t&iacute;picamente estudiadas en las ingenieras inform&aacute;ticas y, en algunos casos, en otras carreras t&eacute;cnicas).</p>\r\n<p>La ingenier&iacute;a de software afecta a la econom&iacute;a y las sociedades de muchas maneras.</p>\r\n<p>Econ&oacute;micamente</p>\r\n<p>En los EEUU, el software contribuye a 1/4 de todo el incremento del PIB durante los 90''s (alrededor de 90,000 millones de d&oacute;lares por a&ntilde;o), y 1/6 de todo el crecimiento de productividad durante los &uacute;ltimos a&ntilde;os de la d&eacute;cada (alrededor de 33,000 millones de d&oacute;lares por a&ntilde;o). La ingenier&iacute;a de software contribuye a $1 bill&oacute;n de crecimiento econ&oacute;mico y productividad en esa d&eacute;cada. Alrededor del globo, el software contribuye al crecimiento econ&oacute;mico en formas similares, aunque es dif&iacute;cil de encontrar estad&iacute;sticas fiables.</p>\r\n<p>Socialmente</p>\r\n<p>La ingenier&iacute;a de software cambia la cultura del mundo debido al extendido uso de la computadora. El correo electrnico (E-mail), la WWW y la mensajer&iacute;a instant&aacute;nea permiten a la gente interactuar en nuevas formas. El software baja el costo y mejora la calidad de los servicios de salud, los departamentos de bomberos, las dependencias gubernamentales y otros servicios sociales. Los proyectos exitosos donde se han usado m&eacute;todos de ingenier&iacute;a de software incluyen a Linux, el software del transbordador espacial, los cajeros autom&aacute;ticos y muchos otros.</p>\r\n<p>La ingeniera de software se puede considerar como la ingeniera aplicada al software, esto es en base a herramientas preestablecidas, la aplicaci&oacute;n de las mismas de la forma ms eficiente y &oacute;ptima; objetivos que siempre busca la ingenier&iacute;a.</p>\r\n<p>No es solo de la resoluci&oacute;n de problemas, sino m&aacute;s bien teniendo en cuenta las diferentes soluciones, elegir la m&aacute;s apropiada.</p>\r\n<p>La ingenier&iacute;a de software requiere llevar a cabo muchas tareas, sobre todo las siguientes:</p>\r\n<ul>\r\n<li>An&aacute;lisis de requisitos</li>\r\n<li>Programaci&oacute;n</li>\r\n<li>Prueba</li>\r\n<li>Documentaci&oacute;n</li>\r\n<li>Mantenimiento</li>\r\n</ul>\r\n<p>La ingenier&iacute;a de software tiene varios modelos o paradigmas de desarrollo en los cuales se puede apoyar para la realizacin de software, de los cuales podemos destacar a &eacute;stos por ser los m&aacute;s utilizados y los m&aacute;s completos:</p>\r\n<ul>\r\n<li>Modelo en cascada (ciclo de vida cl&aacute;sico)</li>\r\n<li>Modelo en espiral</li>\r\n<li>Modelo de prototipos</li>\r\n<li>M&eacute;todo en V</li>\r\n<li>Desarrollo por etapas</li>\r\n</ul>\r\n<p>La Ingeniera de Software tiene que ver con muchos campos en diferentes formas:</p>\r\n<p>Matem&aacute;ticas</p>\r\n<p>Los programas tienen muchas propiedades matem&aacute;ticas. Por ejemplo la correcci&oacute;n y la complejidad de muchos algoritmos son conceptos matem&aacute;ticos que pueden ser rigurosamente probados. El uso de matem&aacute;ticas en la IS es llamado m&eacute;todos formales. Edsger Dijkstra ha dicho que la IS es una rama de las matem&aacute;ticas.</p>\r\n<p>Ciencia</p>\r\n<p>Los programas tienen muchas propiedades cientficas que se pueden medir. Por ejemplo, el desempeo y la escalabilidad de programas bajo diferentes cargas de trabajo puede ser medida. La efectividad de los cach&eacute;s, procesadores m&aacute;s grandes, redes m&aacute;s r&aacute;pidas, nuevas tecnolog&iacute;as de base de datos tienen que ver con la ciencia. Se pueden deducir ecuaciones matem&aacute;ticas de las medidas.</p>\r\n<p>Ingenier&iacute;a</p>\r\n<p>La Ingeniera de Software es considerada por muchos como una disciplina ingenieril porque tiene los puntos de vistas pragm&aacute;ticos y las caractersticas esperadas de los ingenieros. An&aacute;lisis, documentaci&oacute;n, y c&oacute;digo comentado son signos de un ingeniero. David Parnas ha argumentado que es una ingenier&iacute;a.</p>\r\n<p>Manufactura</p>\r\n<p>Los programas son construidos en una secuencia de pasos. El hecho de definir propiamente y llevar a cabo estos pasos, como en una l&iacute;nea de ensamblaje, es necesario para mejorar la productividad de los desarrolladores y la calidad final de los programas. Este punto de vista inspira los diferentes procesos y metodolog&iacute;as que encontramos en la IS.</p>\r\n<p>Manejo de Proyectos</p>\r\n<p>El software comercial (y mucho no comercial) requiere manejo de proyectos. Hay presupuestos y calendarizaciones establecidas. Gente para liderar. Recursos (espacio de oficina, computadoras) por adquirir. Todo esto encaja apropiadamente con la visi&oacute;n del Manejo de Proyectos.</p>\r\n<p>Arte</p>\r\n<p>Los programas contienen muchos elementos art&iacute;sticos. Las interfaces de usuario, la codificaci&oacute;n, etc. Incluso la decisi&oacute;n para un nombre de una variable o una clase. Donald Knuth es famoso porque ha argumentado que la programaci&oacute;n es un arte.</p>', NULL, 1),
(3, 'Sitio Web de Autos', 2, '<p><img style="float: left; margin-left: 5px; margin-right: 5px;" src="media/featured_product_02.jpg" alt="" width="141" height="85" />Desarrollo de un cat&aacute;logo de autos, con su respectiva categorizaci&oacute;n para poder vender autos en linea, existen dos tipos de clientes en la p&aacute;gina, quien publica el anuncio y paga por el mismo y quien compra el auto. Desarrollado en PHP/MySql sobre Windows 2000.</p>', NULL, 1),
(4, 'Sitio Web de Bienes y Raices', 2, '<p><img style="float: left; margin-left: 5px; margin-right: 5px;" src="media/featured_product_03.jpg" alt="" />Desarrollo de un cat&aacute;logo de inmuebles, con su respectiva categorizaci&oacute;n para poder vender en l&iacute;nea casas, ranchos, lotes en la playa, etc., existen dos tipos de clientes en la pagina, quien publica el anuncio y paga por el mismo y quien compra el inmueble. Desarrollado en PHP/MySql sobre Windows 2000.</p>', NULL, 1),
(5, 'Sitio Web de Empleos', 2, '<p><img style="float: left; margin-left: 5px; margin-right: 5px;" src="media/featured_product_04.jpg" alt="" />Desarrollo de un portal para recibir curriculums y ofertas de empleo, paga el empresario que necesita tener un banco de datos de usuarios de Internet que busquen empleo, tambien se puede extender como herramienta a un departamento de Recursos Humanos en el &aacute;rea de selecci&oacute;n de personal. Desarrollado en PHP/MySql sobre Windows 2000.</p>', NULL, 1),
(6, 'Sistema de Gestión de El Salvador', 3, '<p><strong><img style="float: left; margin-left: 5px; margin-right: 5px;" src="media/logofd.gif" alt="" />Sistema de Gesti&oacute;n de El Salvador, Es un Sistema Inform&aacute;tico en PHP/MySQL que permite desarrollar r&aacute;pidamente sistemas peque&ntilde;os para oficinas.<br /><br />Desarrollado por:<br />Ing. Mauricio Vladimir Fuentes Salguero.<br />Fuentes Digital<br />fuentes_mauricio@hotmail.com<br />http://mvf.brinkster.net/</strong><br /><br />La lista de Proyectos de ejemplo desarrollados con Gesti&oacute;n es la siguiente:<br /><br />1. Sistema de Gesti&oacute;n Familiar.<br /><br /><a href="http://mvf.netau.net/gestion001/index.php">http://mvf.netau.net/gestion001/index.php</a><br /><br />usuario: a_jolie<br />clave: 12345678<br />&oacute;<br />usuario: b_pitt<br />clave: 123456789<br /><br />2. Manejador de Contenidos CMS<br /><a href="http://mvf.netau.net/cms001/index.php">http://mvf.netau.net/cms001/index.php</a><br />usuario: a_jolie<br />clave: 12345678<br />&oacute;<br />usuario: b_pitt<br />clave: 123456789</p>\r\n<p>Projecto y C&oacute;digo Fuente: <a href="http://gestion001.codeplex.com/">http://gestion001.codeplex.com/</a></p>', NULL, 1),
(7, 'Sitios Web Customizados', 4, '<p>Sitio Web Basico con Plantilla $150</p>\r\n<p>Sitio Web con Plantilla, Buscador y Editor de Contenido</p>\r\n<p>Sitio Web con Plantilla, Buscador y Carretilla de Compras</p>\r\n<p>Sitio Web con Plantilla, Buscador, Editor de Contenido y Carretilla de Compras</p>\r\n<p>Funcion Adicional no contemplada</p>\r\n<h4>Sistemas</h4>\r\n<p>Sistema de Administracion Digital</p>\r\n<p>Adaptacion de Sistema</p>\r\n<p>* Los precios solo sirven de base para cotizar, al final la cotizacion es la que tiene el precio final del Sistema o P&aacute;gina Web. Cont&aacute;ctenos para solicitar su cotizaci&oacute;on</p>\r\n<p>* Los precios no contemplan las licencias de Servidor de Aplicaciones y Base de Datos, ni ningun tipo de equipo, pero si las respectivas configuraciones y capacitaciones.</p>', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidomultimediadetallegrid`
--

CREATE TABLE IF NOT EXISTS `contenidomultimediadetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` char(11) COLLATE latin1_general_ci NOT NULL,
  `Contenidomultimedia` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descripcionContenidomultimedia` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fechaContenidomultimedia` date DEFAULT NULL,
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `Contenidomultimedia` (`Contenidomultimedia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `contenidomultimediadetallegrid`
--

INSERT INTO `contenidomultimediadetallegrid` (`padre`, `correlativo`, `Contenidomultimedia`, `descripcionContenidomultimedia`, `link`, `fechaContenidomultimedia`) VALUES
(2, '00000000001', 'Hello World DOC.doc', 'Hello Word me mata de la risa..', NULL, '2012-05-24'),
(2, '00000000002', 'Hello World TXT.txt', 'Matado de la Risa!!!', NULL, '2012-05-24'),
(2, '00000000003', 'add.png', 'Ejemplo', NULL, '2012-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidosimple`
--

CREATE TABLE IF NOT EXISTS `contenidosimple` (
  `idContenidosimple` int(11) NOT NULL AUTO_INCREMENT,
  `Contenidosimple` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idSeccionsimple` smallint(6) DEFAULT NULL,
  `contenidohtml` text COLLATE latin1_general_ci NOT NULL,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Contenidosimpledetalle` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContenidosimple`),
  KEY `Contenidosimple` (`Contenidosimple`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contenidosimple`
--

INSERT INTO `contenidosimple` (`idContenidosimple`, `Contenidosimple`, `idSeccionsimple`, `contenidohtml`, `link`, `Contenidosimpledetalle`, `estado`) VALUES
(1, 'Prototipos', 2, 'Documento para entender las ventajas y desventajas del desarrollo de software en prototipos y sus estrategias y alcances...', 'http://www.monografias.com/trabajos12/proto/proto.shtml', NULL, 1),
(2, 'Qué es un Data Center?', 1, 'Qué es un Data Center? - Y porque es tan importante la Eficiencia Energetica?', 'http://en.wikipedia.org/wiki/Data_center', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidosimpledetallegrid`
--

CREATE TABLE IF NOT EXISTS `contenidosimpledetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` char(11) COLLATE latin1_general_ci NOT NULL,
  `Contenidosimple` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descripcionContenidosimple` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fechaContenidosimple` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `Contenidosimple` (`Contenidosimple`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `contenidosimpledetallegrid`
--

INSERT INTO `contenidosimpledetallegrid` (`padre`, `correlativo`, `Contenidosimple`, `descripcionContenidosimple`, `link`, `fechaContenidosimple`, `estado`) VALUES
(1, '00000000001', 'docs/Hello World DOC.doc', 'Hola Mundo Dos Veces', '#', '2012-09-18', 1),
(2, '00000000001', 'Hello World DOC.doc', 'Hello Word me mata de la risa..', NULL, '2012-05-24', 1),
(2, '00000000002', 'Hello World TXT.txt', 'Matado de la Risa!!!', NULL, '2012-05-24', 1),
(2, '00000000003', 'add.png', 'Ejemplo', NULL, '2012-05-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlmedico`
--

CREATE TABLE IF NOT EXISTS `controlmedico` (
  `idControlmedico` int(11) NOT NULL AUTO_INCREMENT,
  `Controlmedico` varchar(65) COLLATE latin1_general_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL,
  PRIMARY KEY (`idControlmedico`),
  KEY `Controlmedico` (`Controlmedico`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idTipodemovimiento` int(11) NOT NULL DEFAULT '0',
  `Cuenta` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCuenta`),
  KEY `Tipodemovimiento` (`idTipodemovimiento`),
  KEY `Cuenta` (`Cuenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `idTipodemovimiento`, `Cuenta`, `orden`, `estado`) VALUES
(1, 2, 'PASAJE DEL BUS', 1, 1),
(2, 2, 'MERIENDA', 2, 1),
(3, 2, 'DESAYUNO', 3, 1),
(4, 4, 'PEDI PRESTADO A TANIA', 4, 1),
(5, 4, 'PEDI PRESTADO A ILEANA', 5, 1),
(6, 2, 'CELEBRACIONES', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Departamento` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idDepartamento`),
  KEY `Departamento` (`Departamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `Departamento`, `orden`, `estado`) VALUES
(1, 'AHUACHAPAN', 1, 1),
(2, 'CABAÑAS', 2, 1),
(3, 'CHALATENANGO', 3, 1),
(4, 'CUSCATLAN', 4, 1),
(5, 'LA LIBERTAD', 5, 1),
(6, 'LA PAZ', 6, 1),
(7, 'LA UNION', 7, 1),
(8, 'MORAZAN', 8, 1),
(9, 'SAN MIGUEL', 9, 1),
(10, 'SAN SALVADOR', 10, 1),
(11, 'SAN VICENTE', 11, 1),
(12, 'SANTA ANA', 12, 1),
(13, 'SONSONATE', 13, 1),
(14, 'USULUTAN', 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE IF NOT EXISTS `edicion` (
  `idEdicion` int(11) NOT NULL AUTO_INCREMENT,
  `Edicion` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idEdicion`),
  KEY `Edicion` (`Edicion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idEdicion`, `Edicion`, `anio`, `estado`) VALUES
(1, '1a. Edición', 2015, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `idEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `Editorial` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `telefonos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `emails` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `paginasweb` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `otraCiudad` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `contactos` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEditorial`),
  KEY `Editorial` (`Editorial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `Editorial`, `telefonos`, `emails`, `paginasweb`, `direccion`, `idPais`, `idCiudad`, `otraCiudad`, `contactos`, `orden`, `estado`) VALUES
(1, 'Oracle Magazine', '60076-8263', 'oracle@halldata.com', 'oraclepressbooks.com', '500 Oracle Parkway, MS OPL-3C Redwood City, CA', 219, 407, NULL, 'test', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Empresa` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `telefonos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `emails` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `paginasweb` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `otraCiudad` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmpresa`),
  KEY `Empresa` (`Empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Empresa`, `telefonos`, `emails`, `paginasweb`, `direccion`, `idPais`, `idCiudad`, `otraCiudad`, `orden`, `estado`) VALUES
(1, 'INSTITUTO SALVADOREÑO DEL SEGURO SOCIAL', '2524 5555', NULL, NULL, 'Ave Palacios Campos, no 325, Santa Ana', 1, 121, NULL, 1, 1),
(2, 'Campos Gomez S.A. de C.V.', '2524 5555', NULL, NULL, 'Ave Palacios Campos, no 325, Santa Ana', 1, 120, NULL, 2, 1),
(3, 'Fuentes Digital', '2272 3948, 2232 3355. 7653 9030, 7058 8754', NULL, NULL, 'Avenida Plan del Pito, Res. El Bambú No. 6 Bis, Mejicanos', 10, 1, NULL, 3, 1),
(4, 'Diaz Supply', '2254 2542', NULL, NULL, 'Ave. los proceres no. 425', 1, 123, NULL, 4, 1),
(5, 'Campos Gomez', '2254 2542', NULL, NULL, 'Ave. los proceres no. 422', 1, 120, NULL, 5, 1),
(6, 'Campos Gomez', '2254 2542', NULL, NULL, 'Ave. los proceres no. 422', 1, 113, NULL, 6, 1),
(7, 'Global Finance INC', '1-212-447-7900', 'gfmail@gfmag.com', 'GFmag.com', '7E  20th street , 2nd floor ', 219, 431, NULL, 7, 1),
(8, 'Oracle Advertising', ' 1-874-763-9635', 'oracle@halldata.com', 'oraclepressbooks.com', '500 Oracle Parkway, Redwood City', 219, 407, NULL, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaceexterno`
--

CREATE TABLE IF NOT EXISTS `enlaceexterno` (
  `idEnlaceexterno` int(11) NOT NULL AUTO_INCREMENT,
  `Enlaceexterno` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descripcionEnlace` text COLLATE latin1_general_ci NOT NULL,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEnlaceexterno`),
  KEY `Enlaceexterno` (`Enlaceexterno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `enlaceexterno`
--

INSERT INTO `enlaceexterno` (`idEnlaceexterno`, `Enlaceexterno`, `descripcionEnlace`, `link`, `estado`) VALUES
(1, 'SlashDot', 'Foro y Noticias sobre Tecnología y Ciencias', 'http://www.slashdot.org/', 1),
(2, 'Diario TI', 'Actualidad sobre tecnología, seguridad, software, cibercultura, telefonía e informática en tu idioma.', 'http://www.diarioti.com/', 1),
(3, 'Wired', 'Actualidades sobre Tecnología', 'http://www.wired.com/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `er`
--

CREATE TABLE IF NOT EXISTS `er` (
  `idEr` int(11) NOT NULL AUTO_INCREMENT,
  `Er` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `diagramaEr` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `vistaprevia` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEr`),
  KEY `Er` (`Er`),
  KEY `diagramaEr` (`diagramaEr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `er`
--

INSERT INTO `er` (`idEr`, `Er`, `diagramaEr`, `vistaprevia`, `estado`) VALUES
(1, 'Usuarios y Control de Acceso', 'er/usuarios_y_control_de_acceso.gif', '<p><img src="er/usuarios_y_control_de_acceso.gif" alt="" width="583" height="505" /></p>', 1),
(2, 'Manejo de Eventos de Peligro', 'er/Manejo_de_eventos_de_peligro.gif', '<p><img src="er/Manejo_de_eventos_de_peligro.gif" alt="" width="781" height="561" /></p>', 1),
(3, 'Alojamientos', 'er/Alojamientos.gif', '<p><img src="er/Alojamientos.gif" alt="" width="680" height="534" /></p>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil`
--

CREATE TABLE IF NOT EXISTS `estadocivil` (
  `idEstadocivil` int(11) NOT NULL AUTO_INCREMENT,
  `Estadocivil` varchar(75) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEstadocivil`),
  KEY `Estadocivil` (`Estadocivil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estadocivil`
--

INSERT INTO `estadocivil` (`idEstadocivil`, `Estadocivil`, `estado`) VALUES
(1, 'SOLTERO(A)', 1),
(2, 'CASADO(A)', 1),
(3, 'ACOMPAÑADO(A)', 1),
(4, 'DIVORCIADO(A)', 1),
(5, 'VIUDO(A)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion`
--

CREATE TABLE IF NOT EXISTS `exposicion` (
  `idExposicion` int(11) NOT NULL AUTO_INCREMENT,
  `Exposicion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `expositor` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idExposicion`),
  KEY `Exposicion` (`Exposicion`),
  KEY `fechainicio` (`fechainicio`),
  KEY `fechafin` (`fechafin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `exposicion`
--

INSERT INTO `exposicion` (`idExposicion`, `Exposicion`, `expositor`, `fechainicio`, `fechafin`, `estado`) VALUES
(1, 'Como implementar Ruby on Rails', 'Mauricio Fuentes', '2012-02-27', '2012-02-27', 1),
(2, 'Como publicar un Web Site con Joomla', 'Mauricio Fuentes', '2012-02-13', '2012-02-13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechahistorial`
--

CREATE TABLE IF NOT EXISTS `fechahistorial` (
  `Codigo` int(11) NOT NULL DEFAULT '0',
  `FechaHistorico` date DEFAULT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `idFirma` int(11) NOT NULL AUTO_INCREMENT,
  `Firma` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `idSexo` tinyint(4) DEFAULT NULL,
  `firmafile` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `idProfesion` smallint(6) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFirma`),
  KEY `Firma` (`Firma`),
  KEY `firmafile` (`firmafile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `firma`
--

INSERT INTO `firma` (`idFirma`, `Firma`, `idSexo`, `firmafile`, `idProfesion`, `orden`, `estado`) VALUES
(1, 'LIC. JUANA HERNANDEZ DE RODRIGUEZ', 2, NULL, 23, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotodiaria`
--

CREATE TABLE IF NOT EXISTS `fotodiaria` (
  `idFotodiaria` int(11) NOT NULL AUTO_INCREMENT,
  `Fotodiaria` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `archivoDocumento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  `fuente` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idFotodiaria`),
  KEY `Fotodiaria` (`Fotodiaria`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `fotodiaria`
--

INSERT INTO `fotodiaria` (`idFotodiaria`, `Fotodiaria`, `archivoDocumento`, `descripcion`, `link`, `fecha`, `idContacto`, `fuente`) VALUES
(1, 'Mapa Conceptual de un Wiki', 'media/mapa_de_wiki.jpg', 'Wiki es una tecnología en línea que permite crear un sitio web de información colectiva en Internet. El método para crear un sitio wiki es muy rápido y extraordinariamente simple. El contenido se puede escribir y corregir por una o varias personas a la vez. Cada usuario tiene la capacidad para corregir y realzar el contenido existente.', 'http://tice.wikispaces.com/wiki', '2012-03-03', 6, 'Contenido Colaborativo Wiki'),
(2, 'Linux Cumple 20 años!', 'media/lf_linux20_webbadge.png', 'La fundación Linux esta celebrando con la comunidad su 20 Años de Fundación', 'http://content.linuxfoundation.org/20th/', '2012-03-02', 6, 'Encontrado en Diario TI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `idGaleria` int(11) NOT NULL AUTO_INCREMENT,
  `Galeria` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `archivoDocumento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  `fuente` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idGaleria`),
  KEY `Galeria` (`Galeria`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`idGaleria`, `Galeria`, `archivoDocumento`, `descripcion`, `link`, `fecha`, `idContacto`, `fuente`) VALUES
(1, 'Diplomas Ing. Fuentes', 'media/MauricioIngeniero.jpg', 'Diplomas Ing. Fuentes en su pequeño cuarto de estudios', '#', '2012-02-14', 6, 'Foto Casera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hipoteca`
--

CREATE TABLE IF NOT EXISTS `hipoteca` (
  `idHipoteca` int(11) NOT NULL AUTO_INCREMENT,
  `Hipoteca` varchar(65) COLLATE latin1_general_ci NOT NULL,
  `idBanco` tinyint(4) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `intereses` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `Historicodetalle` int(11) DEFAULT '0',
  `estado` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idHipoteca`),
  KEY `Hipoteca` (`Hipoteca`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `hipoteca`
--

INSERT INTO `hipoteca` (`idHipoteca`, `Hipoteca`, `idBanco`, `fechainicio`, `intereses`, `monto`, `Historicodetalle`, `estado`) VALUES
(1, 'Scotiabank Apartamento Residencial San Ramón', 1, '2006-03-28', '<p>Al 28 de Marzo de 2006 la tasa fue de 7.10 Al 28 de Octubre de 2006 la tasa fue de 7.60 al 28 de Noviembre de 2008 la tasa fue de 8.10</p>', 14400.00, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histoproyectodetallegrid`
--

CREATE TABLE IF NOT EXISTS `histoproyectodetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` char(11) COLLATE latin1_general_ci NOT NULL,
  `FechaPago` date NOT NULL,
  `ValorPagado` decimal(10,2) NOT NULL DEFAULT '0.00',
  `SaldoAnterior` decimal(10,2) NOT NULL DEFAULT '0.00',
  `SaldoActual` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `FechaPago` (`FechaPago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `histoproyectodetallegrid`
--

INSERT INTO `histoproyectodetallegrid` (`padre`, `correlativo`, `FechaPago`, `ValorPagado`, `SaldoAnterior`, `SaldoActual`) VALUES
(1, '00000000001', '2010-09-23', 80.00, 150.00, 70.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicodetallegrid`
--

CREATE TABLE IF NOT EXISTS `historicodetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` char(11) COLLATE latin1_general_ci NOT NULL,
  `FechaPago` date NOT NULL,
  `FechaAplicacion` date NOT NULL,
  `ValorPagado` decimal(10,2) NOT NULL DEFAULT '0.00',
  `SaldoAnterior` decimal(10,2) NOT NULL DEFAULT '0.00',
  `AbonoCapital` decimal(10,2) NOT NULL DEFAULT '0.00',
  `AbonoIntereses` decimal(10,2) NOT NULL DEFAULT '0.00',
  `AbonoIntMora` decimal(10,2) NOT NULL DEFAULT '0.00',
  `SegurosyOtros` decimal(10,2) NOT NULL DEFAULT '0.00',
  `SaldoActual` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TasaInteres` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `FechaPago` (`FechaPago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `historicodetallegrid`
--

INSERT INTO `historicodetallegrid` (`padre`, `correlativo`, `FechaPago`, `FechaAplicacion`, `ValorPagado`, `SaldoAnterior`, `AbonoCapital`, `AbonoIntereses`, `AbonoIntMora`, `SegurosyOtros`, `SaldoActual`, `TasaInteres`) VALUES
(1, '00000000001', '2006-03-28', '2006-03-28', 146.00, 14400.00, 42.67, 70.38, 0.00, 32.95, 14357.33, 7.10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `Horario` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idHorario`),
  KEY `Horario` (`Horario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `Horario`, `orden`, `estado`) VALUES
(1, 'MANANA', 1, 1),
(2, 'MEDIA MANANA', 2, 1),
(3, 'MEDIO DIA', 3, 1),
(4, 'TARDE', 4, 1),
(5, 'MEDIA TARDE', 5, 1),
(6, 'NOCHE', 6, 1),
(7, 'MEDIA NOCHE', 7, 1),
(8, 'MADRUGADA', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
  `idIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `Idioma` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idIdioma`),
  KEY `Idioma` (`Idioma`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`idIdioma`, `Idioma`, `orden`, `estado`) VALUES
(1, 'Inglés', 1, 1),
(2, 'Español', 2, 1),
(3, 'Portugués', 3, 1),
(4, 'Chino', 4, 1),
(5, 'Ruso', 5, 1),
(6, 'Árabe', 6, 1),
(7, 'Japonés', 7, 1),
(8, 'Francés', 8, 1),
(9, 'Alemán', 9, 1),
(10, 'Ucraniano', 10, 1),
(11, 'Coreano', 11, 1),
(12, 'Italiano', 12, 1),
(13, 'Marathi', 13, 1),
(14, 'Telugu', 14, 1),
(15, 'Tamil', 15, 1),
(16, 'Cantonés', 16, 1),
(17, 'Hindi-Urdu', 17, 1),
(18, 'Javanés', 18, 1),
(19, 'Bengalí', 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medioimpreso`
--

CREATE TABLE IF NOT EXISTS `medioimpreso` (
  `idMedioimpreso` int(11) NOT NULL AUTO_INCREMENT,
  `Medioimpreso` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `archivoPortada` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idTipodemedio` smallint(6) DEFAULT NULL,
  `idIdioma` smallint(6) DEFAULT NULL,
  `idEditorial` smallint(6) DEFAULT NULL,
  `idCategoriamedio` smallint(6) DEFAULT NULL,
  `idTipoidentificador` smallint(6) DEFAULT NULL,
  `numeroidentificador` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `coleccion` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `edicion` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `idTamanomedio` smallint(6) DEFAULT NULL,
  `idCondicionmedio` smallint(6) DEFAULT NULL,
  `idTipoaudiencia` smallint(6) DEFAULT NULL,
  `idUbicacionmedio` smallint(6) DEFAULT NULL,
  `palabrasclave` varchar(2048) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idMedioimpreso`),
  KEY `Medioimpreso` (`Medioimpreso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `medioimpreso`
--

INSERT INTO `medioimpreso` (`idMedioimpreso`, `Medioimpreso`, `archivoPortada`, `idTipodemedio`, `idIdioma`, `idEditorial`, `idCategoriamedio`, `idTipoidentificador`, `numeroidentificador`, `coleccion`, `edicion`, `idTamanomedio`, `idCondicionmedio`, `idTipoaudiencia`, `idUbicacionmedio`, `palabrasclave`, `estado`) VALUES
(1, 'Oracle July August 2012', 'portadas/ORACLE1.jpg', 2, 1, 1, 3, 2, '1065-3171', 'Vol XXVI', 'Number 4', 1, 1, 3, 2, '<p>LOCKDOWN Oracle Database Security solutions deliver layers of enterprise information protection, FUTURE-PROOF&nbsp; Choose the best of todays tools to build next-generation Oracle Database applications, ENGINEERED&nbsp; FOR BACKUP Sun ZFS Backup Applia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(5) NOT NULL AUTO_INCREMENT,
  `Menu` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` smallint(1) DEFAULT NULL,
  `orden` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `Menu` (`Menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `Menu`, `estado`, `orden`) VALUES
(1, 'Mantenimiento', 1, 10),
(2, 'Administración', 1, 20),
(3, 'Salud', 1, 30),
(4, 'Agendas y Directorios', 1, 40),
(5, 'Publicaciones', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) NOT NULL DEFAULT '0',
  `Municipio` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `orden` int(3) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMunicipio`),
  KEY `Municipio` (`Municipio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=263 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `idDepartamento`, `Municipio`, `orden`, `estado`) VALUES
(1, 2, 'CINQUERA', 1, 1),
(2, 2, 'VILLA DOLORES', 1, 1),
(3, 2, 'GUACOTECTI', 1, 1),
(4, 2, 'ILOBASCO', 1, 1),
(5, 2, 'JUTIAPA', 1, 1),
(6, 2, 'SAN ISIDRO', 1, 1),
(7, 2, 'SENSUNTEPEQUE', 1, 1),
(8, 2, 'CIUDAD DE TEJUTEPEQUE', 1, 1),
(9, 2, 'VICTORIA', 1, 1),
(10, 3, 'AGUA CALIENTE', 1, 1),
(11, 3, 'ARCATAO', 1, 1),
(12, 3, 'AZACUALPA', 1, 1),
(13, 3, 'CHALATENANGO', 1, 1),
(14, 3, 'CITALA', 1, 1),
(15, 3, 'COMALAPA', 1, 1),
(16, 3, 'CONCEPCION QUEZALTEPEQUE', 1, 1),
(17, 3, 'DULCE NOMBRE DE MARÍA', 1, 1),
(18, 3, 'EL CARRIZAL', 1, 1),
(19, 3, 'EL PARAISO', 1, 1),
(20, 3, 'LA LAGUNA', 1, 1),
(21, 3, 'LA PALMA', 1, 1),
(22, 3, 'LA REINA', 1, 1),
(23, 3, 'LAS VUELTAS', 1, 1),
(24, 3, 'NOMBRE DE JESUS', 1, 1),
(25, 3, 'NUEVA CONCEPCION', 1, 1),
(26, 3, 'NUEVA TRINIDAD', 1, 1),
(27, 3, 'OJOS DE AGUA', 1, 1),
(28, 3, 'POTONICO', 1, 1),
(29, 3, 'SAN ANTONIO DE LA CRUZ', 1, 1),
(30, 3, 'SAN ANTONIO LOS RANCHOS', 1, 1),
(31, 3, 'SAN FERNANDO', 1, 1),
(32, 3, 'SAN FRANCISCO LEMPA', 1, 1),
(33, 3, 'SAN FRANCISCO MORAZAN', 1, 1),
(34, 3, 'SAN IGNACIO', 1, 1),
(35, 3, 'SAN ISIDRO LABRADOR', 1, 1),
(36, 3, 'SAN JOSE CANCASQUE', 1, 1),
(37, 3, 'SAN JOSE LAS FLORES', 1, 1),
(38, 3, 'SAN LUIS DEL CARMEN', 1, 1),
(39, 3, 'SAN MIGUEL DE MERCEDES', 1, 1),
(40, 3, 'SAN RAFAEL', 1, 1),
(41, 3, 'SANTA RITA', 1, 1),
(42, 3, 'TEJUTLA', 1, 1),
(43, 4, 'CANDELARIA', 1, 1),
(44, 4, 'COJUTEPEQUE', 1, 1),
(45, 4, 'EL CARMEN', 1, 1),
(46, 4, 'EL ROSARIO', 1, 1),
(47, 4, 'MONTE SAN JUAN', 1, 1),
(48, 4, 'ORATORIO DE CONCEPCIÓN', 1, 1),
(49, 4, 'SAN BARTOLOME PERULAPÍA', 1, 1),
(50, 4, 'SAN CRISTOBAL', 1, 1),
(51, 4, 'SAN JOSE GUAYABAL', 1, 1),
(52, 4, 'SAN PEDRO PERULAPAN', 1, 1),
(53, 4, 'SAN RAFAEL CEDROS', 1, 1),
(54, 4, 'SAN RAMON', 1, 1),
(55, 4, 'SANTA CRUZ ANALQUITO', 1, 1),
(56, 4, 'SANTA CRUZ MICHAPA', 1, 1),
(57, 4, 'SUCHITOTO', 1, 1),
(58, 4, 'TENANCINGO', 1, 1),
(59, 5, 'ANTIGUO CUSCATLÁN', 1, 1),
(60, 5, 'CHILTIUPAN', 1, 1),
(61, 5, 'CIUDAD ARCE', 1, 1),
(62, 5, 'COLON', 1, 1),
(63, 5, 'COMASAGUA', 1, 1),
(64, 5, 'HUIZUCAR', 1, 1),
(65, 5, 'JAYAQUE', 1, 1),
(66, 5, 'JICALAPA', 1, 1),
(67, 5, 'LA LIBERTAD', 1, 1),
(68, 5, 'NUEVA SAN SALVADOR', 1, 1),
(69, 5, 'NUEVO CUSCATLÁN', 1, 1),
(70, 5, 'OPICO', 1, 1),
(71, 5, 'QUEZALTEPEQUE', 1, 1),
(72, 5, 'SACACOYO', 1, 1),
(73, 5, 'SAN JOSE VILLANUEVA', 1, 1),
(74, 5, 'SAN MATIAS', 1, 1),
(75, 5, 'SAN PABLO TACACHICO', 1, 1),
(76, 5, 'TALNIQUE', 1, 1),
(77, 5, 'TAMANIQUE', 1, 1),
(78, 5, 'TEOTEPEQUE', 1, 1),
(79, 5, 'TEPECOYO', 1, 1),
(80, 5, 'ZARAGOZA', 1, 1),
(81, 6, 'CUYULTITAN', 1, 1),
(82, 6, 'EL ROSARIO', 1, 1),
(83, 6, 'JERUSALEN', 1, 1),
(84, 6, 'MERCEDES LA CEIBA', 1, 1),
(85, 6, 'OLOCUILTA', 1, 1),
(86, 6, 'PARAISO DE OSORIO', 1, 1),
(87, 6, 'SAN ANTONIO MASAHUAT', 1, 1),
(88, 6, 'SAN EMIGDIO', 1, 1),
(89, 6, 'SAN FRANCISCO CHINAMECA', 1, 1),
(90, 6, 'SAN JUAN NONUALCO', 1, 1),
(91, 6, 'SAN JUAN TALPA', 1, 1),
(92, 6, 'SAN JUAN TEPEZONTES', 1, 1),
(93, 6, 'SAN LUIS LA HERRADURA', 1, 1),
(94, 6, 'SAN LUIS TALPA', 1, 1),
(95, 6, 'SAN MIGUEL TEPEZONTES', 1, 1),
(96, 6, 'SAN PEDRO MASAHUAT', 1, 1),
(97, 6, 'SAN PEDRO NONUALCO', 1, 1),
(98, 6, 'SAN RAFAEL OBRAJUELO', 1, 1),
(99, 6, 'SANTA MARIA OSTUMA', 1, 1),
(100, 6, 'SANTIAGO NONUALCO', 1, 1),
(101, 6, 'TAPALHUACA', 1, 1),
(102, 6, 'ZACATECOLUCA', 1, 1),
(103, 7, 'ANAMOROS', 1, 1),
(104, 7, 'BOLIVAR', 1, 1),
(105, 7, 'CONCEPCION DE ORIENTE', 1, 1),
(106, 7, 'CONCHAGUA', 1, 1),
(107, 7, 'EL CARMEN', 1, 1),
(108, 7, 'EL SAUCE', 1, 1),
(109, 7, 'INTIPUCA', 1, 1),
(110, 7, 'LA UNION', 1, 1),
(111, 7, 'LISLIQUE', 1, 1),
(112, 7, 'MEANGUERA DEL GOLFO', 1, 1),
(113, 7, 'NUEVA ESPARTA', 1, 1),
(114, 7, 'PASAQUINA', 1, 1),
(115, 7, 'POLOROS', 1, 1),
(116, 7, 'SAN ALEJO', 1, 1),
(117, 7, 'SAN JOSE', 1, 1),
(118, 7, 'SANTA ROSA DE LIMA', 1, 1),
(119, 7, 'YAYANTIQUE', 1, 1),
(120, 7, 'YUCUAYQUIN', 1, 1),
(121, 8, 'ARAMBALA', 1, 1),
(122, 8, 'CACAOPERA', 1, 1),
(123, 8, 'CHILANGA', 1, 1),
(124, 8, 'CORINTO', 1, 1),
(125, 8, 'DELICIAS DE CONCEPCION', 1, 1),
(126, 8, 'EL DIVISADERO', 1, 1),
(127, 8, 'EL ROSARIO', 1, 1),
(128, 8, 'GUALOCOCTI', 1, 1),
(129, 8, 'GUATAJIAGUA', 1, 1),
(130, 8, 'JOATECA', 1, 1),
(131, 8, 'JOCOAITIQUE', 1, 1),
(132, 8, 'JOCORO', 1, 1),
(133, 8, 'LOLOTIQUILLO', 1, 1),
(134, 8, 'MEANGUERA', 1, 1),
(135, 8, 'OSICALA', 1, 1),
(136, 8, 'PERQUIN', 1, 1),
(137, 8, 'SAN CARLOS', 1, 1),
(138, 8, 'SAN FERNANDO', 1, 1),
(139, 8, 'SAN FRANCISCO GOTERA', 1, 1),
(140, 8, 'SAN ISIDRO', 1, 1),
(141, 8, 'SAN SIMON', 1, 1),
(142, 8, 'SENSEMBRA', 1, 1),
(143, 8, 'SOCIEDAD', 1, 1),
(144, 8, 'TOROLA', 1, 1),
(145, 8, 'YAMABAL', 1, 1),
(146, 8, 'YOLOAIQUIN', 1, 1),
(147, 9, 'CAROLINA', 1, 1),
(148, 9, 'CHAPELTIQUE', 1, 1),
(149, 9, 'CHINAMECA', 1, 1),
(150, 9, 'CHIRILAGUA', 1, 1),
(151, 9, 'CIUDAD BARRIOS', 1, 1),
(152, 9, 'COMACARAN', 1, 1),
(153, 9, 'EL TRANSITO', 1, 1),
(154, 9, 'LOLOTIQUE', 1, 1),
(155, 9, 'MONCAGUA', 1, 1),
(156, 9, 'NUEVA GUADALUPE', 1, 1),
(157, 9, 'NUEVO EDEN DE SAN JUAN', 1, 1),
(158, 9, 'QUELEPA', 1, 1),
(159, 9, 'SAN ANTONIO', 1, 1),
(160, 9, 'SAN GERARDO', 1, 1),
(161, 9, 'SAN JORGE', 1, 1),
(162, 9, 'SAN LUIS DE LA REINA', 1, 1),
(163, 9, 'SAN MIGUEL', 1, 1),
(164, 9, 'SAN RAFAEL', 1, 1),
(165, 9, 'SESORI', 1, 1),
(166, 9, 'ULUAZAPA', 1, 1),
(167, 10, 'AGUILARES', 1, 1),
(168, 10, 'APOPA', 1, 1),
(169, 10, 'AYUTUXTEPEQUE', 1, 1),
(170, 10, 'CUSCATANCINGO', 1, 1),
(171, 10, 'DELGADO', 1, 1),
(172, 10, 'EL PAISNAL', 1, 1),
(173, 10, 'GUAZAPA', 1, 1),
(174, 10, 'ILOPANGO', 1, 1),
(175, 10, 'MEJICANOS', 1, 1),
(176, 10, 'NEJAPA', 1, 1),
(177, 10, 'PANCHIMALCO', 1, 1),
(178, 10, 'ROSARIO DE MORA', 1, 1),
(179, 10, 'SAN MARCOS', 1, 1),
(180, 10, 'SAN MARTIN', 1, 1),
(181, 10, 'SAN SALVADOR', 0, 1),
(182, 10, 'SANTIAGO TEXACUANGOS', 1, 1),
(183, 10, 'SANTO TOMAS', 1, 1),
(184, 10, 'SOYAPANGO', 1, 1),
(185, 10, 'TONACATEPEQUE', 1, 1),
(186, 11, 'APASTEPEQUE', 1, 1),
(187, 11, 'GUADALUPE', 1, 1),
(188, 11, 'SAN CAYETANO ISTEPEQUE', 1, 1),
(189, 11, 'SAN ESTEBAN CATARINA', 1, 1),
(190, 11, 'SAN ILDEFONSO', 1, 1),
(191, 11, 'SAN LORENZO', 1, 1),
(192, 11, 'SAN SEBASTIAN', 1, 1),
(193, 11, 'SANTA CLARA', 1, 1),
(194, 11, 'SANTO DOMINGO', 1, 1),
(195, 11, 'SAN VICENTE', 1, 1),
(196, 11, 'TECOLUCA', 1, 1),
(197, 11, 'TEPETITAN', 1, 1),
(198, 11, 'VERAPAZ', 1, 1),
(199, 12, 'CANDELARIA DE LA FRONTERA', 1, 1),
(200, 12, 'CHALCHUAPA', 1, 1),
(201, 12, 'COATEPEQUE', 1, 1),
(202, 12, 'EL CONGO', 1, 1),
(203, 12, 'EL PORVENIR', 1, 1),
(204, 12, 'MASAHUAT', 1, 1),
(205, 12, 'METAPAN', 1, 1),
(206, 12, 'SAN ANTONIO PAJONAL', 1, 1),
(207, 12, 'SAN SEBASTIAN SALITRILLO', 1, 1),
(208, 12, 'SANTA ANA', 1, 1),
(209, 12, 'SANTA ROSA GUACHIPILIN', 1, 1),
(210, 12, 'SANTIAGO DE LA FRONTERA', 1, 1),
(211, 12, 'TEXISTEPEQUE', 1, 1),
(212, 13, 'ACAJUTLA', 1, 1),
(213, 13, 'ARMENIA', 1, 1),
(214, 13, 'CALUCO', 1, 1),
(215, 13, 'CUISNAHUAT', 1, 1),
(216, 13, 'IZALCO', 1, 1),
(217, 13, 'JUAYUA', 1, 1),
(218, 13, 'NAHUIZALCO', 1, 1),
(219, 13, 'NAHULINGO', 1, 1),
(220, 13, 'SALCOATITAN', 1, 1),
(221, 13, 'SAN ANTONIO DEL MONTE', 1, 1),
(222, 13, 'SAN JULIAN', 1, 1),
(223, 13, 'SANTA CATARINA MASAHUAT', 1, 1),
(224, 13, 'SANTA ISABEL ISHUATAN', 1, 1),
(225, 13, 'SANTO DOMINGO', 1, 1),
(226, 13, 'SONSONATE', 1, 1),
(227, 13, 'SONZACATE', 1, 1),
(228, 14, 'ALEGRIA', 1, 1),
(229, 14, 'BERLIN', 1, 1),
(230, 14, 'CALIFORNIA', 1, 1),
(231, 14, 'CONCEPCION BATRES', 1, 1),
(232, 14, 'EL TRIUNFO', 1, 1),
(233, 14, 'EREGUAYQUIN', 1, 1),
(234, 14, 'ESTANZUELAS', 1, 1),
(235, 14, 'JIQUILISCO', 1, 1),
(236, 14, 'JUCUAPA', 1, 1),
(237, 14, 'JUCUARAN', 1, 1),
(238, 14, 'MERCEDES UMAÑA', 1, 1),
(239, 14, 'NUEVA GRANADA', 1, 1),
(240, 14, 'OZATLAN', 1, 1),
(241, 14, 'PUERTO EL TRIUNFO', 1, 1),
(242, 14, 'SAN AGUSTIN', 1, 1),
(243, 14, 'SAN BUENAVENTURA', 1, 1),
(244, 14, 'SAN DIONISIO', 1, 1),
(245, 14, 'SAN FRANCISCO JAVIER', 1, 1),
(246, 14, 'SANTA ELENA', 1, 1),
(247, 14, 'SANTA MARIA', 1, 1),
(248, 14, 'SANTIAGO DE MARIA', 1, 1),
(249, 14, 'TECAPAN', 1, 1),
(250, 14, 'USULUTAN', 1, 1),
(251, 1, 'AHUACHAPAN', 1, 1),
(252, 1, 'JUJUTLA', 1, 1),
(253, 1, 'ATIQUIZAYA', 1, 1),
(254, 1, 'CONCEPCION DE ATACO', 1, 1),
(255, 1, 'EL REFUGIO', 1, 1),
(256, 1, 'GUAYMANGO', 1, 1),
(257, 1, 'APANECA', 1, 1),
(258, 1, 'SAN FRANCISCO MENENDEZ', 1, 1),
(259, 1, 'SAN LORENZO', 1, 1),
(260, 1, 'SAN PEDRO PUXTLA', 1, 1),
(261, 1, 'TACUBA', 1, 1),
(262, 1, 'TURIN', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `Nivel` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Niveldetalle` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idNivel`),
  KEY `Nivel` (`Nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='InnoDB free: 10240 kB' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `Nivel`, `Descripcion`, `Niveldetalle`, `estado`) VALUES
(1, 'Administrador de sistemas', 'mantenimientos, consultas, claves', 0, 1),
(2, 'ingreso de datos', 'ingreso de datos', 0, 1),
(3, 'consulta de datos', 'consulta de datos', 0, 1),
(4, 'supervisor y administrador de datos', 'supervisor y administrador de datos', 0, 1),
(5, 'super usuario informatica', 'todos los niveles', 0, 1),
(6, 'na', 'na', 0, 0),
(7, 'na na', 'na na', 0, 0),
(8, 'na na na', 'na na na', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveldetallegrid`
--

CREATE TABLE IF NOT EXISTS `niveldetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `idOpcion` int(11) DEFAULT NULL,
  `consultar` tinyint(4) DEFAULT '0',
  `insertar` tinyint(4) DEFAULT '0',
  `modificar` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `idOpcion` (`idOpcion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `niveldetallegrid`
--

INSERT INTO `niveldetallegrid` (`padre`, `correlativo`, `idOpcion`, `consultar`, `insertar`, `modificar`) VALUES
(4, '00000000001', 3, 1, 1, 1),
(4, '00000000002', 4, 1, 1, 1),
(4, '00000000003', 5, 1, 1, 1),
(4, '00000000004', 6, 1, 1, 1),
(4, '00000000005', 7, 1, 1, 1),
(4, '00000000006', 8, 1, 1, 1),
(4, '00000000007', 9, 1, 1, 1),
(4, '00000000008', 10, 1, 1, 1),
(4, '00000000009', 11, 1, 1, 1),
(4, '00000000010', 12, 1, 1, 1),
(4, '00000000011', 13, 1, 1, 1),
(4, '00000000012', 14, 1, 1, 1),
(4, '00000000013', 15, 1, 1, 1),
(4, '00000000014', 16, 1, 1, 1),
(4, '00000000015', 17, 1, 1, 1),
(4, '00000000016', 18, 1, 1, 1),
(4, '00000000017', 19, 1, 1, 1),
(4, '00000000018', 20, 1, 1, 1),
(4, '00000000019', 21, 1, 1, 1),
(4, '00000000020', 22, 1, 1, 1),
(4, '00000000021', 23, 1, 1, 1),
(4, '00000000022', 24, 1, 1, 1),
(4, '00000000023', 25, 1, 1, 1),
(4, '00000000024', 26, 1, 1, 1),
(4, '00000000025', 27, 1, 1, 1),
(4, '00000000026', 28, 1, 1, 1),
(4, '00000000027', 29, 1, 1, 1),
(4, '00000000028', 30, 1, 1, 1),
(4, '00000000029', 31, 1, 1, 1),
(4, '00000000030', 32, 1, 1, 1),
(4, '00000000031', 33, 1, 1, 1),
(4, '00000000032', 34, 1, 1, 1),
(4, '00000000033', 35, 1, 1, 1),
(4, '00000000034', 36, 1, 1, 1),
(4, '00000000035', 37, 1, 1, 1),
(4, '00000000036', 38, 1, 1, 1),
(4, '00000000037', 39, 1, 1, 1),
(4, '00000000038', 40, 1, 1, 1),
(4, '00000000039', 41, 1, 1, 1),
(4, '00000000040', 41, 1, 1, 1),
(5, '000000000000000000000000000059', 59, 1, 1, 1),
(5, '00000000001', 1, 1, 1, 1),
(5, '00000000002', 2, 1, 1, 1),
(5, '00000000003', 3, 1, 1, 1),
(5, '00000000004', 4, 1, 1, 1),
(5, '00000000005', 5, 1, 1, 1),
(5, '00000000006', 6, 1, 1, 1),
(5, '00000000007', 7, 1, 1, 1),
(5, '00000000008', 8, 1, 1, 1),
(5, '00000000009', 9, 1, 1, 1),
(5, '00000000010', 10, 1, 1, 1),
(5, '00000000011', 11, 1, 1, 1),
(5, '00000000012', 12, 1, 1, 1),
(5, '00000000013', 13, 1, 1, 1),
(5, '00000000014', 14, 1, 1, 1),
(5, '00000000015', 15, 1, 1, 1),
(5, '00000000016', 16, 1, 1, 1),
(5, '00000000017', 17, 1, 1, 1),
(5, '00000000018', 18, 1, 1, 1),
(5, '00000000019', 19, 1, 1, 1),
(5, '00000000020', 20, 1, 1, 1),
(5, '00000000021', 21, 1, 1, 1),
(5, '00000000022', 22, 1, 1, 1),
(5, '00000000023', 23, 1, 1, 1),
(5, '00000000024', 24, 1, 1, 1),
(5, '00000000025', 25, 1, 1, 1),
(5, '00000000026', 26, 1, 1, 1),
(5, '00000000027', 27, 1, 1, 1),
(5, '00000000028', 28, 1, 1, 1),
(5, '00000000029', 29, 1, 1, 1),
(5, '00000000030', 30, 1, 1, 1),
(5, '00000000031', 31, 1, 1, 1),
(5, '00000000032', 32, 1, 1, 1),
(5, '00000000033', 33, 1, 1, 1),
(5, '00000000034', 34, 1, 1, 1),
(5, '00000000035', 35, 1, 1, 1),
(5, '00000000036', 36, 1, 1, 1),
(5, '00000000037', 37, 1, 1, 1),
(5, '00000000038', 38, 1, 1, 1),
(5, '00000000039', 39, 1, 1, 1),
(5, '00000000040', 40, 1, 1, 1),
(5, '00000000041', 41, 1, 1, 1),
(5, '00000000042', 43, 1, 1, 1),
(5, '00000000043', 44, 1, 1, 1),
(5, '00000000044', 45, 1, 1, 1),
(5, '00000000045', 46, 1, 1, 1),
(5, '00000000046', 47, 1, 1, 1),
(5, '00000000047', 42, 1, 1, 1),
(5, '00000000048', 49, 1, 1, 1),
(5, '00000000049', 48, 1, 1, 1),
(5, '00000000050', 50, 1, 1, 1),
(5, '00000000051', 51, 1, 1, 1),
(5, '00000000052', 52, 1, 1, 1),
(5, '00000000053', 53, 1, 1, 1),
(5, '00000000054', 54, 1, 1, 1),
(5, '00000000055', 55, 1, 1, 1),
(5, '00000000056', 56, 1, 1, 1),
(5, '00000000057', 57, 1, 1, 1),
(5, '00000000058', 58, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE IF NOT EXISTS `opcion` (
  `idOpcion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Opcion` char(50) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `idMenu` int(5) DEFAULT NULL,
  `idSubmenu` int(11) DEFAULT NULL,
  `url` char(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idOpcion`),
  KEY `Opcion` (`Opcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`idOpcion`, `Opcion`, `orden`, `activo`, `idMenu`, `idSubmenu`, `url`) VALUES
(1, 'Usuarios', 10, 1, 1, 1, 'usuarios.php'),
(2, 'Niveles', 20, 1, 1, 1, 'browser.php?tabla=Nivel&nombre_seccion=Niveles'),
(3, 'Paises', 10, 1, 1, 2, 'browser.php?tabla=Pais&nombre_seccion=Paises'),
(4, 'Departamentos de El Salvador', 30, 1, 1, 2, 'browser.php?tabla=Departamento&nombre_seccion=Departamentos%20de%20El%20Salvador'),
(5, 'Municipios de El Salvador', 40, 1, 1, 2, 'browser.php?tabla=Municipio&nombre_seccion=Municipios%20de%20El%20Salvador'),
(6, 'Profesiones u Oficios', 10, 1, 1, 3, 'browser.php?tabla=Profesion&nombre_seccion=Profesiones%20u%20Oficios'),
(7, 'Estado Civil', 60, 1, 1, 2, 'browser.php?tabla=Estadocivil&nombre_seccion=Estado%20Civil'),
(8, 'Firmas', 20, 1, 1, 3, 'browser.php?tabla=Firma&nombre_seccion=Firmas'),
(9, 'Mantenimiento Semanal', 20, 1, 1, 5, 'mantenimiento.php'),
(10, 'Bitácora', 30, 1, 1, 10, 'bitacora.php'),
(11, 'Contabilidad Personal', 40, 1, 2, 8, 'browser.php?tabla=Contabilidadpersonal&nombre_seccion=Contabilidad%20Personal'),
(12, 'Reportes Contabilidad', 20, 1, 1, 10, 'lista_de_reportes.php'),
(13, 'Tipos de Movimientos', 30, 1, 1, 4, 'browser.php?tabla=Tipodemovimiento&nombre_seccion=Tipos%20de%20Movimientos'),
(14, 'Tipos de Cuentas', 40, 1, 1, 4, 'browser.php?tabla=Cuenta&nombre_seccion=Tipos%20de%20Cuentas'),
(15, 'Horario', 10, 1, 1, 3, 'browser.php?tabla=Horario&nombre_seccion=Horario'),
(16, 'Control de Calidad', 20, 1, 1, 10, 'control_de_calidad.php'),
(17, 'Proyectos', 11, 1, 2, 8, 'browser.php?tabla=Proyecto&nombre_seccion=Proyectos'),
(18, 'Hipotecas', 30, 1, 2, 8, 'browser.php?tabla=Hipoteca&nombre_seccion=Hipotecas'),
(19, 'Bancos', 40, 1, 1, 3, 'browser.php?tabla=Banco&nombre_seccion=Bancos'),
(20, 'Formulario de Suscripciones', 20, 1, 5, 19, 'browser.php?tabla=Suscripcion&nombre_seccion=Suscripciones'),
(21, 'Tratamientos Médicos', 10, 1, 3, 11, 'browser.php?tabla=Tratamiento&nombre_seccion=Tratamientos%20Médicos'),
(22, 'Ciudades del Mundo', 20, 1, 1, 2, 'browser.php?tabla=Ciudad&nombre_seccion=Ciudades%20del%20Mundo'),
(23, 'Empresas', 60, 1, 1, 3, 'browser.php?tabla=Empresa&nombre_seccion=Empresas'),
(24, 'AFPs', 70, 1, 1, 3, 'browser.php?tabla=Afp&nombre_seccion=AFPs'),
(25, 'Agenda de Bodas', 10, 1, 4, 13, 'browser.php?tabla=Boda&nombre_seccion=Agenda%20Bodas'),
(26, 'Prestamo Medios', 10, 1, 2, 20, 'pendiente.php'),
(27, 'Contenido Multimedia', 10, 1, 5, 14, 'browser.php?tabla=Contenidomultimedia&nombre_seccion=Contenido%20Multimedia'),
(28, 'Biblioteca', 20, 1, 5, 14, 'browser.php?tabla=Biblioteca&nombre_seccion=Biblioteca'),
(29, 'Medios Impresos', 10, 1, 2, 15, 'browser.php?tabla=Medioimpreso&nombre_seccion=Medios%20Impresos'),
(30, 'Condición del Medio', 70, 1, 1, 6, 'browser.php?tabla=Condicionmedio&nombre_seccion=Condición%20del%20Medio'),
(31, 'Tipo de Audiencia', 80, 1, 1, 6, 'browser.php?tabla=Tipoaudiencia&nombre_seccion=Tipo%20de%20Audiencia'),
(32, 'Secciones Multimedia', 10, 1, 1, 16, 'browser.php?tabla=Seccionmultimedia&nombre_seccion=Secciones%20Multimedia'),
(33, 'Contenido Simple', 20, 1, 5, 14, 'browser.php?tabla=Contenidosimple&nombre_seccion=Contenido%20Simple'),
(34, 'Secciones Simples', 20, 1, 1, 16, 'browser.php?tabla=Seccionsimple&nombre_seccion=Secciones%20Simples'),
(35, 'Enlaces Externos', 10, 1, 5, 17, 'browser.php?tabla=Enlaceexterno&nombre_seccion=Enlaces%20Externos'),
(36, 'Galería de Imágenes', 10, 1, 5, 18, 'browser.php?tabla=Galeria&nombre_seccion=Galería%20de%20Imágenes'),
(37, 'Idiomas', 80, 1, 1, 6, 'browser.php?tabla=Idioma&nombre_seccion=Idiomas'),
(38, 'Formulario de Contáctos WEB', 10, 1, 5, 19, 'browser.php?tabla=Contactoweb&nombre_seccion=Contáctos%20WEB'),
(39, 'Actividades', 20, 1, 5, 17, 'browser.php?tabla=Actividad&nombre_seccion=Actividades'),
(40, 'Proyectos', 30, 1, 5, 17, 'browser.php?tabla=Proyecto&nombre_seccion=Proyectos'),
(41, 'Exposiciones', 40, 1, 5, 17, 'browser.php?tabla=Exposicion&nombre_seccion=Exposiciones'),
(42, 'Editorial', 20, 1, 1, 6, 'browser.php?tabla=Editorial&nombre_seccion=Editoriales'),
(43, 'Contabilidad', 10, 1, 2, 8, 'browser.php?tabla=Contabilidad&nombre_seccion=Contabilidad'),
(44, 'Catálogo de Cuentas', 10, 1, 1, 4, 'browser.php?tabla=Catalogocuentas&nombre_seccion=Catálogo%20de%20Cuentas'),
(45, 'Origen de las Cuentas', 20, 1, 1, 4, 'browser.php?tabla=Origencuenta&nombre_seccion=Origen%20de%20las%20Cuentas'),
(46, 'Foto Diaria', 20, 1, 5, 18, 'browser.php?tabla=Fotodiaria&nombre_seccion=Foto%20Diaria'),
(47, 'Diagramas ER', 40, 1, 2, 15, 'browser.php?tabla=Er&nombre_seccion=Diagramas%20ER'),
(48, 'Edicion', 40, 1, 1, 6, 'browser.php?tabla=Edicion&nombre_seccion=Ediciones'),
(49, 'Coleccion', 30, 1, 1, 6, 'browser.php?tabla=Coleccion&nombre_seccion=Colecciones'),
(50, 'Tipo de Identificador', 90, 1, 1, 6, 'browser.php?tabla=Tipoidentificador&nombre_seccion=Tipo%20de%20Identificador'),
(51, 'Tamaño del Medio', 50, 1, 1, 6, 'browser.php?tabla=Tamanomedio&nombre_seccion=Tamaño%20del%20Medio'),
(52, 'Unidades o Departamentos', 80, 1, 1, 3, 'browser.php?tabla=Unidad&nombre_seccion=Unidades%20o%20Departamentos'),
(53, 'Tipos de Medios', 10, 1, 1, 6, 'browser.php?tabla=Tipodemedio&nombre_seccion=Tipos%20de%20Medios'),
(54, 'Categoría del Medio', 20, 1, 1, 6, 'browser.php?tabla=Categoriamedio&nombre_seccion=Categoría%20del%20Medio'),
(55, 'Ubicación del Medio', 100, 1, 1, 6, 'browser.php?tabla=Ubicacionmedio&nombre_seccion=Ubicación%20del%20Medio'),
(56, 'Opciones', 30, 1, 1, 1, 'browser.php?tabla=Opcion&nombre_seccion=Opciones'),
(57, 'Menú', 40, 1, 1, 1, 'browser.php?tabla=Menu&nombre_seccion=Menú'),
(58, 'Sub Menú', 50, 1, 1, 1, 'browser.php?tabla=Submenu&nombre_seccion=Sub%20Menú'),
(59, 'Contáctos', 10, 1, 4, 22, 'browser.php?tabla=Contacto&nombre_seccion=Contáctos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origencuenta`
--

CREATE TABLE IF NOT EXISTS `origencuenta` (
  `idOrigencuenta` int(11) NOT NULL AUTO_INCREMENT,
  `Origencuenta` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idOrigencuenta`),
  KEY `Origencuenta` (`Origencuenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `origencuenta`
--

INSERT INTO `origencuenta` (`idOrigencuenta`, `Origencuenta`, `orden`, `estado`) VALUES
(1, 'CONTABILIDAD', 1, 1),
(2, 'INVENTARIO', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `Pais` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idPais`),
  KEY `Pais` (`Pais`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=247 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `Pais`, `orden`, `estado`) VALUES
(1, 'EL SALVADOR', 1, 1),
(2, 'AFGANISTÁN', 2, 1),
(3, 'ALBANIA', 4, 1),
(4, 'ARGELIA', 14, 1),
(5, 'AMERICAN SAMOA', 6, 1),
(6, 'ANDORRA', 7, 1),
(7, 'ANGOLA', 8, 1),
(8, 'ANGUILLA', 9, 1),
(9, 'ANTIGUA Y BARBUDA', 11, 1),
(10, 'ARGENTINA', 15, 1),
(11, 'ARMENIA', 16, 1),
(12, 'ARUBA', 17, 1),
(13, 'AUSTRALIA', 18, 1),
(14, 'AUSTRIA', 19, 1),
(15, 'AZERBAIYÁN', 20, 1),
(16, 'BAHAMAS', 21, 1),
(17, 'BAHRÉIN', 22, 1),
(18, 'BANGLADESH', 23, 1),
(19, 'BARBADOS', 24, 1),
(20, 'BIELORRUSIA', 29, 1),
(21, 'ANTÁRTIDA', 10, 1),
(22, 'TERRITORIOS AUSTRALES FRANCESES', 224, 1),
(23, 'BENÍN', 26, 1),
(24, 'BERMUDAS', 27, 1),
(25, 'BUTÁN', 39, 1),
(26, 'BOLIVIA', 31, 1),
(27, 'BOSNIA Y HERZEGOVINA', 32, 1),
(28, 'BOTSUANA', 33, 1),
(29, 'BRASIL', 34, 1),
(30, 'ISLAS VÍRGENES BRITÁNICAS', 116, 1),
(31, 'BRUNÉI', 35, 1),
(32, 'BULGARIA', 36, 1),
(33, 'BURKINA FASO', 37, 1),
(34, 'BURUNDI', 38, 1),
(35, 'CAMBOYA', 41, 1),
(36, 'CAMERÚN', 42, 1),
(37, 'CANADÁ', 43, 1),
(38, 'CABO VERDE', 40, 1),
(39, 'ISLAS CAIMÁN', 103, 1),
(40, 'REPÚBLICA CENTROAFRICANA', 183, 1),
(41, 'CHAD', 44, 1),
(42, 'CHILE', 45, 1),
(43, 'REPÚBLICA POPULAR CHINA', 189, 1),
(44, 'COLOMBIA', 48, 1),
(45, 'COMORAS', 49, 1),
(46, 'REPÚBLICA DEL CONGO', 186, 1),
(47, 'ISLAS COOK', 105, 1),
(48, 'COSTA RICA', 53, 1),
(49, 'CROACIA', 54, 1),
(50, 'COSTA DE MARFIL', 52, 1),
(51, 'CUBA', 55, 1),
(52, 'CHIPRE', 46, 1),
(53, 'REPÚBLICA CHECA', 184, 1),
(54, 'COREA DEL NORTE', 50, 1),
(55, 'REPÚBLICA DEMOCRATICA DEL CONGO', 187, 1),
(56, 'SAN BARTOLOMÉ', 195, 1),
(57, 'YIBUTI', 244, 1),
(58, 'DOMINICA', 57, 1),
(59, 'REPÚBLICA DOMINICANA', 188, 1),
(60, 'ECUADOR', 58, 1),
(61, 'EGIPTO', 59, 1),
(62, 'GUINEA ECUATORIAL', 86, 1),
(63, 'ERITREA', 61, 1),
(64, 'ESTONIA', 66, 1),
(65, 'ETIOPÍA', 67, 1),
(66, 'ISLAS FEROE', 106, 1),
(67, 'ISLAS MALVINAS', 109, 1),
(68, 'FIJI', 68, 1),
(69, 'FINLANDIA', 70, 1),
(70, 'GUYANA FRANCESA', 89, 1),
(71, 'POLINESIA FRANCESA', 177, 1),
(72, 'GABÓN', 72, 1),
(73, 'GAMBIA', 73, 1),
(74, 'GEORGIA', 74, 1),
(75, 'ALEMANIA', 5, 1),
(76, 'GHANA', 75, 1),
(77, 'GIBRALTAR', 76, 1),
(78, 'GRECIA', 79, 1),
(79, 'GROENLANDIA', 80, 1),
(80, 'GRANADA', 78, 1),
(81, 'GUADALUPE', 81, 1),
(82, 'GUAM', 82, 1),
(83, 'GUATEMALA', 83, 1),
(84, 'GUINEA', 85, 1),
(85, 'GUINEA-BISSAU', 87, 1),
(86, 'GUYANA', 88, 1),
(87, 'HAITÍ', 90, 1),
(88, 'CIUDAD DEL VATICANO', 47, 1),
(89, 'HONDURAS', 91, 1),
(90, 'HONG KONG', 92, 1),
(91, 'HUNGRÍA', 93, 1),
(92, 'ISLANDIA', 102, 1),
(93, 'INDIA', 94, 1),
(94, 'INDONESIA', 95, 1),
(95, 'IRÁN', 97, 1),
(96, 'IRAQ', 96, 1),
(97, 'IRLANDA', 98, 1),
(98, 'ISRAEL', 118, 1),
(99, 'ITALIA', 119, 1),
(100, 'JAMAICA', 120, 1),
(101, 'JAPÓN', 121, 1),
(102, 'JORDANIA', 123, 1),
(103, 'KAZAJISTÁN', 124, 1),
(104, 'KENIA', 125, 1),
(105, 'KIRIBATI', 127, 1),
(106, 'KUWAIT', 128, 1),
(107, 'KIRGUISTÁN', 126, 1),
(108, 'ALAND ISLANDS', 3, 1),
(109, 'LAOS', 129, 1),
(110, 'LETONIA', 131, 1),
(111, 'LÍBANO', 136, 1),
(112, 'LESOTO', 130, 1),
(113, 'LIBERIA', 132, 1),
(114, 'LIBIA', 133, 1),
(115, 'LIECHTENSTEIN', 134, 1),
(116, 'LITUANIA', 135, 1),
(117, 'LUXEMBURGO', 137, 1),
(118, 'MACAO', 138, 1),
(119, 'MADAGASCAR', 139, 1),
(120, 'MALAUI', 141, 1),
(121, 'MALASIA', 140, 1),
(122, 'MALDIVAS', 143, 1),
(123, 'MALÁ', 142, 1),
(124, 'MALTA', 144, 1),
(125, 'ISLAS MARSHALL', 111, 1),
(126, 'MARTINICA', 146, 1),
(127, 'MAURITANIA', 148, 1),
(128, 'MAURICIO', 147, 1),
(129, 'MAYOTTE', 149, 1),
(130, 'MÉXICO', 150, 1),
(131, 'MICRONESIA', 151, 1),
(132, 'MÓNACO', 157, 1),
(133, 'MONGOLIA', 153, 1),
(134, 'MONTSERRAT', 155, 1),
(135, 'MARRUECOS', 145, 1),
(136, 'MOZAMBIQUE', 156, 1),
(137, 'BIRMANIA', 30, 1),
(138, 'ISLA BOUVET', 99, 1),
(139, 'NAMIBIA', 158, 1),
(140, 'NAURU', 159, 1),
(141, 'NEPAL', 160, 1),
(142, 'PAÍSES BAJOS', 170, 1),
(143, 'ANTILLAS HOLANDESAS', 12, 1),
(144, 'NUEVA CALEDONIA', 167, 1),
(145, 'NUEVA ZELANDA', 168, 1),
(146, 'NICARAGUA', 161, 1),
(147, 'NÍGER', 164, 1),
(148, 'NIGERIA', 162, 1),
(149, 'NIUE', 163, 1),
(150, 'NORFOLK', 165, 1),
(151, 'ISLAS MARIANAS DEL NORTE', 110, 1),
(152, 'NORUEGA', 166, 1),
(153, 'TERRITORIOS PALESTINOS', 225, 1),
(154, 'OMÁN', 169, 1),
(155, 'PAKISTÁN', 171, 1),
(156, 'PALAOS', 172, 1),
(157, 'PANAMÁ', 173, 1),
(158, 'PAPÚA NUEVA GUINEA', 174, 1),
(159, 'PARAGUAY', 175, 1),
(160, 'PERÚ', 176, 1),
(161, 'FILIPINAS', 69, 1),
(162, 'ISLAS PITCAIRN', 112, 1),
(163, 'POLONIA', 178, 1),
(164, 'PORTUGAL', 179, 1),
(165, 'PUERTO RICO', 180, 1),
(166, 'QATAR', 181, 1),
(167, 'COREA DEL SUR', 51, 1),
(168, 'MOLDAVIA', 152, 1),
(169, 'RUMANIA', 192, 1),
(170, 'REUNIÓN', 190, 1),
(171, 'RUSIA', 193, 1),
(172, 'RUANDA', 191, 1),
(173, 'SANTA HELENA', 201, 1),
(174, 'SAN CRISTÓBAL Y NIEVES', 196, 1),
(175, 'SANTA LUCÍA', 202, 1),
(176, 'SAN PEDRO Y MEQUELÓN', 199, 1),
(177, 'SAN VICENTE Y LAS GRANADINAS', 200, 1),
(178, 'SAMOA', 194, 1),
(179, 'SAN MARINO', 197, 1),
(180, 'SAO TOME Y PRÍNCIPE', 203, 1),
(181, 'ARABIA SAUDITA', 13, 1),
(182, 'SENEGAL', 204, 1),
(183, 'SERBIA', 205, 1),
(184, 'SEYCHELLES', 206, 1),
(185, 'SIERRA LEONA', 207, 1),
(186, 'SINGAPUR', 208, 1),
(187, 'ESLOVAQUIA', 62, 1),
(188, 'ESLOVENIA', 63, 1),
(189, 'ISLAS SALOMÓN', 113, 1),
(190, 'SOMALIA', 210, 1),
(191, 'SUDÁFRICA', 213, 1),
(192, 'ISLAS COCOS', 104, 1),
(193, 'SRI LANKA', 211, 1),
(194, 'SUDÁN', 214, 1),
(195, 'SURINAM', 217, 1),
(196, 'SVALBARD Y JAN MAYEN', 218, 1),
(197, 'SUAZILANDIA', 212, 1),
(198, 'SUECIA', 215, 1),
(199, 'SUIZA', 216, 1),
(200, 'SIRIA', 209, 1),
(201, 'TAYIKISTÁN', 222, 1),
(202, 'TAILANDIA', 219, 1),
(203, 'REPÚBLICA DE MACEDONIA', 185, 1),
(204, 'TIMOR ORIENTAL', 226, 1),
(205, 'TOGO', 227, 1),
(206, 'TOKELAU', 228, 1),
(207, 'TONGA', 229, 1),
(208, 'TRINIDAD Y TOBAGO', 230, 1),
(209, 'TÚNEZ', 234, 1),
(210, 'TURQUÍA', 232, 1),
(211, 'TURKMANISTAN', 231, 1),
(212, 'ISLAS TURCAS Y CAICOS', 114, 1),
(213, 'TUVALU', 233, 1),
(214, 'UGANDA', 236, 1),
(215, 'UCRANIA', 235, 1),
(216, 'EMIRATOS ÁRABES UNIDOS', 60, 1),
(217, 'GRAN BRETAÑA (Inglaterra, Gales, Escocia, Irlanda del Norte)', 77, 1),
(218, 'TANZANIA', 221, 1),
(219, 'ESTADOS UNIDOS', 65, 1),
(220, 'ISLAS VÍRGENES DE LOS ESTADOS UNIDOS', 117, 1),
(221, 'URUGUAY', 237, 1),
(222, 'UZBEKISTAN', 238, 1),
(223, 'VANUATU', 239, 1),
(224, 'VENEZUELA', 240, 1),
(225, 'VIETNAM', 241, 1),
(226, 'WALLIS Y FUTUNA', 242, 1),
(227, 'REPÚBLICA ÁRABE SAHARAUI DEMOCRÁTICA', 182, 1),
(228, 'YEMEN', 243, 1),
(229, 'ZAMBIA', 245, 1),
(230, 'ZIMBABUE', 246, 1),
(231, 'FRANCIA', 71, 1),
(232, 'ISLA DE NAVIDAD', 101, 1),
(233, 'ESPAÑA', 64, 1),
(234, 'GUERNSEY', 84, 1),
(235, 'BÉLGICA', 28, 1),
(236, 'TAIWÁN', 220, 1),
(237, 'DINAMARCA', 56, 1),
(238, 'ISLAS HEARD Y MCDONALD', 108, 1),
(239, 'BELICE', 25, 1),
(240, 'ISLA DE MAN', 100, 1),
(241, 'TERRITORIO BRITÁNICO DEL OCÉANO INDICO', 223, 1),
(242, 'JERSEY', 122, 1),
(243, 'SAN MARTÍN', 198, 1),
(244, 'MONTENEGRO', 154, 1),
(245, 'ISLAS GEORGIAS DEL SUR Y SANDWICH DEL SUR', 107, 1),
(246, 'ISLAS ULTRAMARINAS DE ESTADOS UNIDOS', 115, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE IF NOT EXISTS `profesion` (
  `idProfesion` int(11) NOT NULL AUTO_INCREMENT,
  `Profesion` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `idTipoocupacion` smallint(6) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idProfesion`),
  KEY `Profesion` (`Profesion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1320 ;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`idProfesion`, `Profesion`, `idTipoocupacion`, `orden`, `estado`) VALUES
(1, 'SIN PROFESION U OFICIO', 1, 1, 1),
(2, 'ARTE Y ARQUITECTURA', 1, 2, 1),
(3, 'TEC. EN ARQUITECTURA', 2, 3, 1),
(4, 'TEC. EN DISEÑO GRAFICO', 2, 4, 1),
(5, 'LIC.(A) EN ARTES PLASTICAS', 3, 5, 1),
(6, 'LIC.(A) EN DISEÑO AMBIENTAL', 3, 6, 1),
(7, 'LIC.(A) EN DISEÑO ARTESANAL', 3, 7, 1),
(8, 'LIC.(A) EN DISEÑO GRAFICO', 3, 8, 1),
(9, 'ARQUITECTO(A)', 1, 9, 1),
(10, 'ECONOMIA, ADMON Y COMERCIO', 1, 10, 1),
(11, 'TEC. EN ADMON DE EMPRESAS', 2, 11, 1),
(12, 'TEC. EN FINANZAS', 2, 12, 1),
(13, 'TEC. EN CONTADURIA PUBLICA', 2, 13, 1),
(14, 'TEC. EN COMERCIO INTER.', 2, 14, 1),
(15, 'TEC. EN MERCADEO', 2, 15, 1),
(16, 'CONTADOR PUBLICO CERTIFICADO', 1, 16, 1),
(17, 'LIC.(A) EN ADMON BANCARIA', 3, 17, 1),
(18, 'LIC.(A) EN ADMON DE EMPRESAS', 3, 18, 1),
(19, 'LIC.(A) EN ADMON DE VENTAS', 3, 19, 1),
(20, 'LIC.(A) EN ADMON FINANCIERA', 3, 20, 1),
(21, 'LIC.(A) EN CONTADURIA PUBLICA', 3, 21, 1),
(22, 'LIC.(A) EN ECONOMIA', 3, 22, 1),
(23, 'LIC.(A) EN MERCADOTECNIA', 3, 23, 1),
(24, 'MS. EN MERCADEO', 1, 24, 1),
(25, 'MS. EN ADMON DE EMPRESAS', 1, 25, 1),
(26, 'MS. EN ADMON FINANCIERA', 1, 26, 1),
(27, 'MS. EN ADMON PUBLICA', 1, 27, 1),
(28, 'SALUD', 1, 28, 1),
(29, 'TEC. EN ENFERMERIA', 2, 29, 1),
(30, 'TEC. EN LABORATORIO CLINICO', 2, 30, 1),
(31, 'TEC. EN OPTOMETRIA', 2, 31, 1),
(32, 'TEC. EN TRABAJO SOCIAL', 2, 32, 1),
(33, 'TEC. EN ANESTESIOLOGIA', 2, 33, 1),
(34, 'TECNOLOGO(A) EN ENFERMERIA', 2, 34, 1),
(35, 'TECNOLOGO(A) EN FISIOTERAPIA', 2, 35, 1),
(36, 'LIC.(A) EN ANESTESIOLOGIA', 3, 36, 1),
(37, 'LIC.(A) EN ECOTECNOLOGIA', 3, 37, 1),
(38, 'LIC.(A) EN ENFERMERIA', 3, 38, 1),
(39, 'LIC.(A) EN FISIOTERAPIA', 3, 39, 1),
(40, 'LIC.(A) EN LABORATORIO CLINICO', 3, 40, 1),
(41, 'LIC.(A) EN NUTRICION', 3, 41, 1),
(42, 'LIC.(A) EN PSICOLOGIA', 3, 42, 1),
(43, 'LIC.(A) EN RADIOLOGIA', 3, 43, 1),
(44, 'LIC.(A) EN SALUD', 3, 44, 1),
(45, 'LIC.(A) EN TRABAJO SOCIAL', 3, 45, 1),
(46, 'LIC.(A) EN EDUC. ESPECIAL', 3, 46, 1),
(47, 'MS. EN SALUD PUBLICA', 1, 47, 1),
(48, 'DR.(A) EN CIRUGIA DENTAL', 3, 48, 1),
(49, 'DR.(A) EN MEDICINA', 3, 49, 1),
(50, 'CIENCIAS', 1, 50, 1),
(51, 'LIC.(A) EN BIOLOGIA', 3, 51, 1),
(52, 'LIC.(A) EN BIOLOGIA MARINA', 3, 52, 1),
(53, 'LIC.(A) EN ESTADISTICA', 3, 53, 1),
(54, 'LIC.(A) EN FISICA', 3, 54, 1),
(55, 'LIC.(A) EN MATEMATICAS', 3, 55, 1),
(56, 'LIC.(A) EN QUIMICA', 3, 56, 1),
(57, 'LIC.(A) EN QUIMICA Y FARMACIA', 3, 57, 1),
(58, 'LIC.(A) EN GEOQUIMICA', 3, 58, 1),
(59, 'ING(A) QUIMICO(A)', 3, 59, 1),
(60, 'MS. EN QUIMICA', 1, 60, 1),
(61, 'AGRICULT GANAD PISCICULT MEDIO AMB', 1, 61, 1),
(62, 'TEC. EN AGRONOMIA', 2, 62, 1),
(63, 'TEC. EN CONSERV DEL MEDIO AMBIENTE', 2, 63, 1),
(64, 'TEC. EN VETERINARIA', 2, 64, 1),
(65, 'TEC. EN INGENIERIA AGRICOLA', 2, 65, 1),
(66, 'TEC. EN ZOOLOGIA', 2, 66, 1),
(67, 'LIC.(A) EN VETERINARIA', 3, 67, 1),
(68, 'ING(A) AGRONOMO', 3, 68, 1),
(69, 'ING(A) EN AGROECOLOGIA', 3, 69, 1),
(70, 'ING(A) EN ENTOMOLOGIA', 3, 70, 1),
(71, 'ING(A) AGROINDUSTRIAL', 3, 71, 1),
(72, 'MS. MEDIO AMB. Y REC. NATURALES', 1, 72, 1),
(73, 'DERECHO', 1, 73, 1),
(74, 'LIC.(A) EN CIENCIAS JURIDICAS', 3, 74, 1),
(75, 'LIC.(A) EN RELACIONES INTERNACIONALES', 3, 75, 1),
(76, 'DR. EN JURISP. Y CIENCIAS SOCIALES', 3, 76, 1),
(77, 'HUMANIDADES', 1, 77, 1),
(78, 'TEC. EN ARTES LIBERALES', 2, 78, 1),
(79, 'TEC. EN BIBLIOTECOLOGIA', 2, 79, 1),
(80, 'TEC. EN DEMOGRAFIA', 2, 80, 1),
(81, 'LIC.(A) EN ARQUEOLOGIA', 3, 81, 1),
(82, 'LIC.(A) EN FILOSOFIA', 3, 82, 1),
(83, 'LIC.(A) EN IDIOMAS', 3, 83, 1),
(84, 'LIC.(A) EN LETRAS', 3, 84, 1),
(85, 'LIC.(A) EN TEOLOGIA', 3, 85, 1),
(86, 'MS. EN TEOLOGIA', 1, 86, 1),
(87, 'DR.(A) EN FILOSOFIA', 3, 87, 1),
(88, 'TECNOLOGIA', 2, 88, 1),
(89, 'TEC. AGROINDUSTRIAL', 2, 89, 1),
(90, 'TEC. AUTOMOTRIZ', 2, 90, 1),
(91, 'TEC. EN BIOMEDICA', 2, 91, 1),
(92, 'TEC. EN COMPUTACION', 2, 92, 1),
(93, 'TEC. EN CONFECCION INDUSTRIAL', 2, 93, 1),
(94, 'TEC. EN ELECTRICIDAD', 2, 94, 1),
(95, 'TEC. EN ELECTRONICA', 2, 95, 1),
(96, 'TEC. EN INGENIERIA CIVIL', 2, 96, 1),
(97, 'TEC. EN MECANICA', 2, 97, 1),
(98, 'TEC. EN ORTESIS Y PROTESIS', 2, 98, 1),
(99, 'TEC. EN PROC DE ALIMENTOS', 2, 99, 1),
(100, 'TEC. EN PROD DE RADIO Y TELEVISION', 2, 100, 1),
(101, 'TEC. INDUSTRIAL', 2, 101, 1),
(102, 'TEC. EN TOPOGRAFIA', 2, 102, 1),
(103, 'TEC. EN ARQUITECTURA', 2, 103, 1),
(104, 'TEC. EN CONSTRUCCION', 2, 104, 1),
(105, 'TEC. EN DISEÑO', 2, 105, 1),
(106, 'TEC. EN INGENIERIA', 2, 106, 1),
(107, 'TEC. EN RADIO Y TELEVISION', 2, 107, 1),
(108, 'TEC. ANALISTA PROG DE SISTEMAS', 2, 108, 1),
(109, 'LIC.(A) EN COMPUTACION', 3, 109, 1),
(110, 'LIC.(A) EN REL INDUSTRIALES', 3, 110, 1),
(111, 'ING.(A) BIOMEDICO (A)', 3, 111, 1),
(112, 'ING.(A) CIVIL', 3, 112, 1),
(113, 'ING(A) EN ALIMENTOS', 3, 113, 1),
(114, 'ING(A) ELECTRICO', 3, 114, 1),
(115, 'ING(A) EN ELECTRONICA', 3, 115, 1),
(116, 'ING(A) EN COMPUTACION', 3, 116, 1),
(117, 'ING(A) INDUSTRIAL', 3, 117, 1),
(118, 'ING(A) MECANICO', 3, 118, 1),
(119, 'ING(A) CONSTRUCTOR NAVAL', 3, 119, 1),
(120, 'ING(A) HIDROGRAFICO', 3, 120, 1),
(121, 'ING(A) TEXTIL', 3, 121, 1),
(122, 'EDUC.', 1, 122, 1),
(123, 'PROF.(A) EN ADMON DE LA EDUC.', 1, 123, 1),
(124, 'PROF.(A) EN BIOLOGIA Y QUIMICA', 1, 124, 1),
(125, 'PROF.(A) EN CIENCIAS COMERCIALES', 1, 125, 1),
(126, 'PROF.(A) EN CIENCIAS NATURALES', 1, 126, 1),
(127, 'PROF.(A) EN CIENCIAS SOCIALES', 1, 127, 1),
(128, 'PROF.(A) EN COMPUTACION', 1, 128, 1),
(129, 'PROF. EN EDUC. BASICA 1o,2o CICLO', 1, 129, 1),
(130, 'PROF.(A) EN EDUC. ESPECIAL', 1, 130, 1),
(131, 'PROF.(A) EN EDUC. FISICA', 1, 131, 1),
(132, 'PROF.(A) EN EDUC. MEDIA', 1, 132, 1),
(133, 'PROF.(A) EN FISICA Y MATEMATICA', 1, 133, 1),
(134, 'PROF.(A) EN INGLES', 1, 134, 1),
(135, 'PROF. EN LENGUAJE Y LITERATURA', 1, 135, 1),
(136, 'PROF.(A) EN LETRAS Y ESTETICA', 1, 136, 1),
(137, 'PROF.(A) EN EDUCACION PARVULARIA', 1, 137, 1),
(138, 'PROF.(A) EN TEOLOGIA', 1, 138, 1),
(139, 'LIC.(A) EN CIENCIAS DE LA EDUC.', 3, 139, 1),
(140, 'LIC.(A) EN EDUC. FISICA Y DEP', 3, 140, 1),
(141, 'LIC.(A) EN INGLES', 3, 141, 1),
(142, 'LIC.(A) EN EDUC. ESPECIAL', 3, 142, 1),
(143, 'LIC.(A) EN EDUC. PARVULARIA', 3, 143, 1),
(144, 'MS. EN ADMON. DE CURRICULO', 1, 144, 1),
(145, 'MS. EN EDUC. UNIVERSITARIA', 1, 145, 1),
(146, 'CIENCIAS SOCIALES', 1, 146, 1),
(147, 'TEC. EN COMUNICACIONES', 2, 147, 1),
(148, 'TEC. EN PERIODISMO', 2, 148, 1),
(149, 'TEC. EN RELACIONES PUBLICAS', 2, 149, 1),
(150, 'TEC. EN PUBLICIDAD', 2, 150, 1),
(151, 'LIC.(A) EN CIENCIAS DE LA COMUNICACIËN', 3, 151, 1),
(152, 'LIC.(A) EN CIENCIAS POLITICAS', 3, 152, 1),
(153, 'LIC.(A) EN COMUNICACIONES', 3, 153, 1),
(154, 'LIC.(A) EN PUBLICIDAD', 3, 154, 1),
(155, 'LIC.(A) EN RELACIONES PUBLICAS', 3, 155, 1),
(156, 'LIC.(A) EN SOCIOLOGIA', 3, 156, 1),
(157, 'LIC.(A) EN PERIODISMO', 3, 157, 1),
(158, 'MS. EN CIENCIAS POLITICAS', 1, 158, 1),
(159, 'MILITAR Y SEGURIDAD', 1, 159, 1),
(160, 'OFICIAL MILITAR', 1, 160, 1),
(161, 'RELIGIOSO', 1, 161, 1),
(162, 'SACERDOTE', 1, 162, 1),
(163, 'PASTOR RELIGIOSO', 1, 163, 1),
(164, 'OTRO PROFESIONAL', 1, 164, 1),
(165, 'ING(A) EN AERONAUTICA', 3, 165, 1),
(166, 'PILOTO AVIADOR', 1, 166, 1),
(167, 'BACHILLER', 1, 167, 1),
(168, 'BACHILLER COMERCIAL CONTADOR', 1, 168, 1),
(169, 'BACHILLER COMERCIAL - SECRETARIA', 1, 169, 1),
(170, 'BACHILLER ACADEMICO', 1, 170, 1),
(171, 'BACHILLER AGRONOMO', 1, 171, 1),
(172, 'BACHILLER INDUSTRIAL', 1, 172, 1),
(173, 'BACHILLER EN MECANICA', 1, 173, 1),
(174, 'BACHILLER EN ELECTRICIDAD', 1, 174, 1),
(175, 'BACHILLER AUTOMOTRIZ', 1, 175, 1),
(176, 'BACHILLER EN HOSTELERIA Y TURISMO', 1, 176, 1),
(177, 'BACHILLER EN SALUD', 1, 177, 1),
(178, 'BACHILLER EN COMPUTACION', 1, 178, 1),
(179, 'OFICIOS RELAT. AL ARTE Y ARQUITECTURA', 1, 179, 1),
(180, 'ARREGLISTA', 1, 180, 1),
(181, 'MUSICO', 1, 181, 1),
(182, 'FILARMONICO', 1, 182, 1),
(183, 'TROBADOR', 1, 183, 1),
(184, 'CANTANTE', 1, 184, 1),
(185, 'CARTOGRAFICO', 1, 185, 1),
(186, 'COREOGRAFO', 1, 186, 1),
(187, 'DECORADOR', 1, 187, 1),
(188, 'DIBUJANTE', 1, 188, 1),
(189, 'DISEÑADOR DE GRAFICOS', 1, 189, 1),
(190, 'ESCRITOR(A)', 1, 190, 1),
(191, 'ESCULTOR', 1, 191, 1),
(192, 'ARTISTA PINTOR', 1, 192, 1),
(193, 'POETA', 1, 193, 1),
(194, 'ACROBATA', 1, 194, 1),
(195, 'ARTISTA', 1, 195, 1),
(196, 'ARTISTA DE RADIO Y TELEVISION', 1, 196, 1),
(197, 'CIRCENSE', 1, 197, 1),
(198, 'PAYASO', 1, 198, 1),
(199, 'SERIGRAFO', 1, 199, 1),
(200, 'CRISTALOGRAFO(A)', 1, 200, 1),
(201, 'ALFARERO(A)', 1, 201, 1),
(202, 'ALISTADOR', 1, 202, 1),
(203, 'APRENDIZ', 1, 203, 1),
(204, 'ARTESANO(A)', 1, 204, 1),
(205, 'AYUDANTE', 1, 205, 1),
(206, 'BALDOCERO', 1, 206, 1),
(207, 'BORDADORA', 1, 207, 1),
(208, 'CARROCERO', 1, 208, 1),
(209, 'CERAMISTA', 1, 209, 1),
(210, 'CURTIDOR DE PIELES', 1, 210, 1),
(211, 'EBANISTA', 1, 211, 1),
(212, 'ENZUELADOR', 1, 212, 1),
(213, 'ZAPATERO', 1, 213, 1),
(214, 'TENERO', 1, 214, 1),
(215, 'FABRICANTE DE SOMBREROS', 1, 215, 1),
(216, 'FLORISTA', 1, 216, 1),
(217, 'HERRERO', 1, 217, 1),
(218, 'HOJALATERO', 1, 218, 1),
(219, 'MARMOLISTA', 1, 219, 1),
(220, 'MARROQUINERO(A)', 1, 220, 1),
(221, 'OBRA DE BANCO', 1, 221, 1),
(222, 'ORFEBRE', 1, 222, 1),
(223, 'PIÑATERO', 1, 223, 1),
(224, 'PINTOR(A)', 1, 224, 1),
(225, 'PIROTECNICO', 1, 225, 1),
(226, 'PLATERO', 1, 226, 1),
(227, 'TALABARTERO', 1, 227, 1),
(228, 'TALLADOR', 1, 228, 1),
(229, 'TAPICERO', 1, 229, 1),
(230, 'TEJEDOR', 1, 230, 1),
(231, 'TELERISTA', 1, 231, 1),
(232, 'OFICIOS ECONOMIA/ADMON/COMERCIO', 1, 232, 1),
(233, 'ADMINISTRADOR', 1, 233, 1),
(234, 'AUXILIAR DE CONTADOR', 1, 234, 1),
(235, 'CARDISTA', 1, 235, 1),
(236, 'VENDEDOR(A)', 1, 236, 1),
(237, 'VENDEDOR AMBULANTE', 1, 237, 1),
(238, 'AYUDANTE DE VENDEDOR', 1, 238, 1),
(239, 'PROMOTOR DE VENTAS', 1, 239, 1),
(240, 'AGENTE DE SEGUROS', 1, 240, 1),
(241, 'EJECUTIVO(A) DE VENTAS', 1, 241, 1),
(242, 'GESTOR DE VENTAS', 1, 242, 1),
(243, 'ASESOR DE VENTAS', 1, 243, 1),
(244, 'VENDEDOR PROFESIONAL', 1, 244, 1),
(245, 'AGENTE VENDEDOR', 1, 245, 1),
(246, 'AGENTE VIAJERO', 1, 246, 1),
(247, 'REPRESENTANTE DE VENTAS', 1, 247, 1),
(248, 'EJECUTIVO EMPRESARIAL', 1, 248, 1),
(249, 'EJECUTIVO HOTELERO', 1, 249, 1),
(250, 'EMPRESARIO(A)', 1, 250, 1),
(251, 'ESPECIALISTA EN COMERC. INTER.', 1, 251, 1),
(252, 'PLANILLERO(A)', 1, 252, 1),
(253, 'REPRE DE CASAS EXTRANJERAS', 1, 253, 1),
(254, 'SECRETARIA(O)', 1, 254, 1),
(255, 'SECRETARIA EJECUTIVA', 1, 255, 1),
(256, 'SECRETARIA EJECUTIVA BILING\\_E', 1, 256, 1),
(257, 'GESTOR DE SERVICIOS', 1, 257, 1),
(258, 'PLANIFICADOR', 1, 258, 1),
(259, 'TEC. BANCARIO', 2, 259, 1),
(260, 'TEC. EN HOSTELERIA Y TURISMO', 2, 260, 1),
(261, 'OFICINISTA', 1, 261, 1),
(262, 'TEC. OFICINISTA', 2, 262, 1),
(263, 'TENEDOR DE LIBROS', 1, 263, 1),
(264, 'AUXILIAR DE OFICINA', 1, 264, 1),
(265, 'PELUQUERO(A)', 1, 265, 1),
(266, 'BARBERO', 1, 266, 1),
(267, 'COSMETOLOGA(O)', 1, 267, 1),
(268, 'ESTILISTA', 1, 268, 1),
(269, 'MANICURISTA', 1, 269, 1),
(270, 'MASAJISTA', 1, 270, 1),
(271, 'COMERCIANTE', 1, 271, 1),
(272, 'COMERCIANTE EN PEQUEÑO', 1, 272, 1),
(273, 'NEGOCIANTE', 1, 273, 1),
(274, 'MERCERO(A)', 1, 274, 1),
(275, 'PRESTAMISTA', 1, 275, 1),
(276, 'RECEPCIONISTA', 1, 276, 1),
(277, 'MECANOGRAF(O)A', 1, 277, 1),
(278, 'TAQUIMECANOGRAFO(A)', 1, 278, 1),
(279, 'CAJERO(A)', 1, 279, 1),
(280, 'EMPLEADO(A) BANCARIO(A)', 1, 280, 1),
(281, 'TALLADOR OPTICO', 1, 281, 1),
(282, 'TIPOGRAFO', 1, 282, 1),
(283, 'IMPRESOR', 1, 283, 1),
(284, 'LINOTIPISTA', 1, 284, 1),
(285, 'AUXILIAR DE ALMACEN', 1, 285, 1),
(286, 'DEPENDIENTE', 1, 286, 1),
(287, 'DEPENDIENTE DE ALMACEN', 1, 287, 1),
(288, 'DEPENDIENTE DE FARMACIA', 1, 288, 1),
(289, 'IMPULSADOR(A)', 1, 289, 1),
(290, 'BODEGUERO', 1, 290, 1),
(291, 'AYUDANTE DE BODEGA', 1, 291, 1),
(292, 'BARRETERO', 1, 292, 1),
(293, 'BARRENDERO', 1, 293, 1),
(294, 'BUHONERO', 1, 294, 1),
(295, 'CARGADOR DE BATERIAS', 1, 295, 1),
(296, 'CARNICERO', 1, 296, 1),
(297, 'MATARIFE', 1, 297, 1),
(298, 'CERRAJERO', 1, 298, 1),
(299, 'COLCHONERO', 1, 299, 1),
(300, 'CORTE Y CONFECCION', 1, 300, 1),
(301, 'COSTURERO(A)', 1, 301, 1),
(302, 'COSTERO', 1, 302, 1),
(303, 'SASTRE', 1, 303, 1),
(304, 'MODISTA', 1, 304, 1),
(305, 'DULCERO(A)', 1, 305, 1),
(306, 'EMPACADOR(A)', 1, 306, 1),
(307, 'ENCERADOR', 1, 307, 1),
(308, 'ENCUADERNADOR', 1, 308, 1),
(309, 'ESTAMPADOR', 1, 309, 1),
(310, 'GUARDALUZ', 1, 310, 1),
(311, 'HARINERO', 1, 311, 1),
(312, 'HORNERO', 1, 312, 1),
(313, 'HOTELERO', 1, 313, 1),
(314, 'BOTONES', 1, 314, 1),
(315, 'MESERO(A)', 1, 315, 1),
(316, 'RECAMARERA', 1, 316, 1),
(317, 'INSTALADOR', 1, 317, 1),
(318, 'JARDINERO', 1, 318, 1),
(319, 'LAMINADOR', 1, 319, 1),
(320, 'LUSTRADOR', 1, 320, 1),
(321, 'MENSAJERO', 1, 321, 1),
(322, 'MINERO', 1, 322, 1),
(323, 'MOLINERO', 1, 323, 1),
(324, 'MONTAJISTA', 1, 324, 1),
(325, 'OFICIOS VARIOS', 1, 325, 1),
(326, 'ORDENANZA', 1, 326, 1),
(327, 'PANADERO(A)', 1, 327, 1),
(328, 'PANIFICADOR(A)', 1, 328, 1),
(329, 'REPOSTERO(A)', 1, 329, 1),
(330, 'PARRILLERO(A)', 1, 330, 1),
(331, 'PELETERO', 1, 331, 1),
(332, 'PLOMERO', 1, 332, 1),
(333, 'PRENSISTA', 1, 333, 1),
(334, 'RECORTADOR', 1, 334, 1),
(335, 'RELOJERO (A)', 1, 335, 1),
(336, 'JOYERO', 1, 336, 1),
(337, 'SEPULTURERO', 1, 337, 1),
(338, 'SORBETERO', 1, 338, 1),
(339, 'PALETERO', 1, 339, 1),
(340, 'MINUTERO', 1, 340, 1),
(341, 'SUPERNUMERARIO(A)', 1, 341, 1),
(342, 'TENDERO(A)', 1, 342, 1),
(343, 'TINTORERO(A)', 1, 343, 1),
(344, 'TRAMITADOR(A)', 1, 344, 1),
(345, 'TRAMOYISTA', 1, 345, 1),
(346, 'TROQUELERO', 1, 346, 1),
(347, 'TUBERO', 1, 347, 1),
(348, 'ADUANERO', 1, 348, 1),
(349, 'OFICIOS RELAT. A SALUD', 1, 349, 1),
(350, 'QUINESIOLOGO', 1, 350, 1),
(351, 'ACUPUNTURISTA', 1, 351, 1),
(352, 'ENFERMERO(A)', 2, 352, 1),
(353, 'ENFERMERO(A) AUXILIAR', 2, 353, 1),
(354, 'AYUDANTE DE ENFERMERIA', 1, 354, 1),
(355, 'ESPECIALISTA EN RADIOLOGIA', 1, 355, 1),
(356, 'TEC. DENTAL', 2, 356, 1),
(357, 'MECANICO DENTAL', 1, 357, 1),
(358, 'HIGIENISTA DENTAL', 1, 358, 1),
(359, 'ASISTENTE DENTAL', 1, 359, 1),
(360, 'QUIROPRACTICO', 1, 360, 1),
(361, 'MASAJISTA', 1, 361, 1),
(362, 'APRENDIZ DE MECANICA DENTAL', 1, 362, 1),
(363, 'TEC. EN OPTICA', 2, 363, 1),
(364, 'TECNOLOGO ORTOPEDA', 2, 364, 1),
(365, 'TERAPISTA DE LENGUA', 1, 365, 1),
(366, 'TERAPISTA OCUPACIONAL', 1, 366, 1),
(367, 'DELEGADO DE SALUD', 1, 367, 1),
(368, 'INSPECTOR SANITARIO', 1, 368, 1),
(369, 'PARTERA AUTORIZADA', 1, 369, 1),
(370, 'VACUNADOR', 1, 370, 1),
(371, 'VISITADOR MEDICO', 1, 371, 1),
(372, 'NATUROPATA', 1, 372, 1),
(373, 'FARMACEUTICO', 1, 373, 1),
(374, 'IDONEO EN FARMACIA', 1, 374, 1),
(375, 'TEC. EN LABORATORIO', 2, 375, 1),
(376, 'AUXILIAR DE LABORATORIO', 1, 376, 1),
(377, 'PROMOTOR(A) SOCIAL', 1, 377, 1),
(378, 'PROMOTOR(A) DE SALUD', 1, 378, 1),
(379, 'TRABAJADOR(A) SOCIAL', 1, 379, 1),
(380, 'OFICIOS AGRIC/GANAD/PISCICULT/MEDIO AMB.', 1, 380, 1),
(381, 'AGRICULTOR (A)', 1, 381, 1),
(382, 'AGRICULTOR EN PEQUEÑO', 1, 382, 1),
(383, 'EMPLEADO(A) AGRICOLA', 1, 383, 1),
(384, 'SEMBRADOR', 1, 384, 1),
(385, 'APICULTOR', 1, 385, 1),
(386, 'AVICULTOR(A)', 1, 386, 1),
(387, 'CAFICULTOR(A)', 1, 387, 1),
(388, 'COOPERATIVISTA', 1, 388, 1),
(389, 'CUNICULICULTOR(A)', 1, 389, 1),
(390, 'GANADERO', 1, 390, 1),
(391, 'GRANJERO', 1, 391, 1),
(392, 'PERICULTOR', 1, 392, 1),
(393, 'PERITO CAFICULTOR', 1, 393, 1),
(394, 'PISCICULTOR', 1, 394, 1),
(395, 'TEC. EN CONTROL DE PLAGAS', 2, 395, 1),
(396, 'CABALLERANGO', 1, 396, 1),
(397, 'CAMPISTA', 1, 397, 1),
(398, 'CAPORAL', 1, 398, 1),
(399, 'MANDADOR', 1, 399, 1),
(400, 'PEON AGRICOLA', 1, 400, 1),
(401, 'CORRALERO', 1, 401, 1),
(402, 'CORTADOR', 1, 402, 1),
(403, 'ESCRIBIENTE', 1, 403, 1),
(404, 'HENERO', 1, 404, 1),
(405, 'INSEMINADOR', 1, 405, 1),
(406, 'JORNALERO', 1, 406, 1),
(407, 'LABRADOR', 1, 407, 1),
(408, 'MAQUINARIO AGRICOLA', 1, 408, 1),
(409, 'MONTANERO', 1, 409, 1),
(410, 'TRACTORISTA', 1, 410, 1),
(411, 'PATRON DE BARCO PESQUERO', 1, 411, 1),
(412, 'TEC. PESQUERO', 2, 412, 1),
(413, 'MARINO MERCANTE', 1, 413, 1),
(414, 'MARINERO', 1, 414, 1),
(415, 'PESCADOR(A)', 1, 415, 1),
(416, 'OFICIOS RELAT. A DERECHO', 1, 416, 1),
(417, 'OFICIAL PUBLICO DE JUEZ EJECUTOR', 1, 417, 1),
(418, 'NOTIFICADOR', 1, 418, 1),
(419, 'COLABORADOR JURIDICO', 1, 419, 1),
(420, 'OFICIOS RELAT. A TECNOLOGIA', 1, 420, 1),
(421, 'DISEÑADOR(A) DE TRAZOS', 1, 421, 1),
(422, 'TOPOGRAFO EMPIRICO', 1, 422, 1),
(423, 'CADENERO', 1, 423, 1),
(424, 'CONSTRUCTOR EMPIRICO', 1, 424, 1),
(425, 'CONTRATISTA', 1, 425, 1),
(426, 'DIBUJANTE ARQUITECTONICO', 1, 426, 1),
(427, 'DIBUJANTE DE INGENIERIA', 1, 427, 1),
(428, 'DISEÑADOR(A)', 1, 428, 1),
(429, 'IMPRESOR LITOGRAFICO', 1, 429, 1),
(430, 'LITOGRAFO(A)', 1, 430, 1),
(431, 'MAESTRO DE OBRA', 1, 431, 1),
(432, 'OBRERO(A)', 1, 432, 1),
(433, 'ALBAÑIL', 1, 433, 1),
(434, 'AYUDANTE DE ALBAÑIL', 1, 434, 1),
(435, 'PERFORISTA', 1, 435, 1),
(436, 'PEON DE CONSTRUCCION', 1, 436, 1),
(437, 'MOTONIVELADOR', 1, 437, 1),
(438, 'OPERADOR DE EQUIPO PESADO', 1, 438, 1),
(439, 'LADRILLERO', 1, 439, 1),
(440, 'ENCIELADOR', 1, 440, 1),
(441, 'FONTANERO', 1, 441, 1),
(442, 'PLOMERO', 1, 442, 1),
(443, 'APRENDIZ DE OFICIO', 1, 443, 1),
(444, 'AYUDANTE DE OFICIO', 1, 444, 1),
(445, 'ASERRADOR', 1, 445, 1),
(446, 'BARNIZADOR', 1, 446, 1),
(447, 'CARPINTERO', 1, 447, 1),
(448, 'AYUDANTE DE MAQUINARIA PESADA', 1, 448, 1),
(449, 'ENDEREZADOR Y PINTOR', 1, 449, 1),
(450, 'ENGRASADOR', 1, 450, 1),
(451, 'ENSAMBLADOR', 1, 451, 1),
(452, 'MECANICO DE BANCO', 1, 452, 1),
(453, 'MECANICA FINA', 1, 453, 1),
(454, 'MECANICO', 1, 454, 1),
(455, 'MECANICO AUTOMOTRIZ', 1, 455, 1),
(456, 'MECANICO INDUSTRIAL', 1, 456, 1),
(457, 'MECANICO DE AVIACION', 1, 457, 1),
(458, 'MECANICO DE MOLINOS', 1, 458, 1),
(459, 'MECANICO TEXTIL', 1, 459, 1),
(460, 'MECANICO ENDEREZADOR', 1, 460, 1),
(461, 'MECANICO SOLDADOR', 1, 461, 1),
(462, 'MECANICO TORNERO', 1, 462, 1),
(463, 'PINTOR AUTOMOTRIZ', 1, 463, 1),
(464, 'SOLDADOR', 1, 464, 1),
(465, 'SOLDADOR AUTOMOTRIZ', 1, 465, 1),
(466, 'APRENDIZ DE MECANICA', 1, 466, 1),
(467, 'AYUDANTE ENDEREZADO PINTURA', 1, 467, 1),
(468, 'AYUDANTE DE MECANICO', 1, 468, 1),
(469, 'ENDEREZADOR', 1, 469, 1),
(470, 'REPARADOR DE BATERIAS', 1, 470, 1),
(471, 'REPARADOR DE LLANTAS', 1, 471, 1),
(472, 'ELECTRICISTA', 1, 472, 1),
(473, 'ELECTROMECANICO', 1, 473, 1),
(474, 'ELECTRONICO AUTOMOTRIZ', 1, 474, 1),
(475, 'EMBOBINADOR', 1, 475, 1),
(476, 'LINIERO MONTADOR', 1, 476, 1),
(477, 'MECANICO EN ELECTRICIDAD', 1, 477, 1),
(478, 'MECANICO EN ELECTRONICA', 1, 478, 1),
(479, 'RADIOTECNICO', 1, 479, 1),
(480, 'SOLDADOR ELECTRONICO', 1, 480, 1),
(481, 'TEC. EN AIRE ACONDICIONADO', 2, 481, 1),
(482, 'TEC. EN REFRIGERACION', 2, 482, 1),
(483, 'APRENDIZ ELECTRICISTA', 1, 483, 1),
(484, 'AYUDANTE DE ELECTRICISTA', 1, 484, 1),
(485, 'PROG DE COMPUTADORAS', 1, 485, 1),
(486, 'OPERADOR COMPUTADORAS', 1, 486, 1),
(487, 'INSTRUCTOR COMPUTACION', 1, 487, 1),
(488, 'CONSULTOR DE INFORMATICA', 1, 488, 1),
(489, 'ASESOR EN INFORMATICA', 1, 489, 1),
(490, 'DIGITADOR(A)', 1, 490, 1),
(491, 'EMPRESARIO INDUSTRIAL', 1, 491, 1),
(492, 'ARMERO', 1, 492, 1),
(493, 'CALDERERO', 1, 493, 1),
(494, 'FUNDIDOR', 1, 494, 1),
(495, 'OBRERO INDUSTRIAL', 1, 495, 1),
(496, 'OPERARIO(A)', 1, 496, 1),
(497, 'OPERARIO INDUSTRIAL', 1, 497, 1),
(498, 'PINTOR INDUSTRIAL', 1, 498, 1),
(499, 'OFICIOS RELAT. A EDUC.', 1, 499, 1),
(500, 'BIBLIOTECARIO', 1, 500, 1),
(501, 'PROF.(A)', 1, 501, 1),
(502, 'INSTRUCTOR(A)', 1, 502, 1),
(503, 'ESTUDIANTE', 1, 503, 1),
(504, 'INSTRUCTOR DE OFICIOS', 1, 504, 1),
(505, 'OFICIOS RELAT. A CIENCIAS SOCIALES', 1, 505, 1),
(506, 'DIPLOMATICO (A)', 1, 506, 1),
(507, 'POLITICO', 1, 507, 1),
(508, 'EMBAJADOR', 1, 508, 1),
(509, 'OFICIOS RELAT. A LA RELIGION', 1, 509, 1),
(510, 'CLERIGO LITERARIO', 1, 510, 1),
(511, 'MINISTRO EVANGELICO', 1, 511, 1),
(512, 'MISIONERO(A)', 1, 512, 1),
(513, 'MONJA', 1, 513, 1),
(514, 'SACRISTAN', 1, 514, 1),
(515, 'PRECURSOR RELIGIOSO', 1, 515, 1),
(516, 'RELIGIOSO(A)', 1, 516, 1),
(517, 'PREDICADOR', 1, 517, 1),
(518, 'EVANGELIZADOR', 1, 518, 1),
(519, 'OFICIOS MILITARES O SEGURIDAD', 1, 519, 1),
(520, 'POLICIA MILITAR', 1, 520, 1),
(521, 'POLICIA NACIONAL CIVIL', 1, 521, 1),
(522, 'SOLDADO', 1, 522, 1),
(523, 'POLICIA DE ADUANA', 1, 523, 1),
(524, 'AGENTE DE SEGURIDAD PRIVADA', 1, 524, 1),
(525, 'BOMBERO', 1, 525, 1),
(526, 'GUARDAESPALDA', 1, 526, 1),
(527, 'POLICIA MUNICIPAL', 1, 527, 1),
(528, 'SALVAVIDAS', 1, 528, 1),
(529, 'SERENO', 1, 529, 1),
(530, 'VIGILANTE', 1, 530, 1),
(531, 'MILITAR RETIRADO', 1, 531, 1),
(532, 'OTROS OFICIOS', 1, 532, 1),
(533, 'CHEF', 1, 533, 1),
(534, 'COCINERO(A)', 1, 534, 1),
(535, 'AMA DE CASA', 1, 535, 1),
(536, 'LAVANDERO(A)', 1, 536, 1),
(537, 'NIÑERA', 1, 537, 1),
(538, 'DOMESTICA', 1, 538, 1),
(539, 'AEROMOZA', 1, 539, 1),
(540, 'SOBRECARGO', 1, 540, 1),
(541, 'DELEGADO DE TRANSPORTE', 1, 541, 1),
(542, 'TRANSPORTISTA', 1, 542, 1),
(543, 'COBRADOR', 1, 543, 1),
(544, 'CAMIONERO', 1, 544, 1),
(545, 'CARRETONERO', 1, 545, 1),
(546, 'ESTIVADOR', 1, 546, 1),
(547, 'FERROCARRILERO', 1, 547, 1),
(548, 'FOGONERO', 1, 548, 1),
(549, 'MAQUINISTA', 1, 549, 1),
(550, 'MOTOCICLISTA', 1, 550, 1),
(551, 'MOTORISTA', 1, 551, 1),
(552, 'TAXISTA', 1, 552, 1),
(553, 'ENTRENADOR', 1, 553, 1),
(554, 'ARBITRO', 1, 554, 1),
(555, 'ATLETA', 1, 555, 1),
(556, 'BASQUETBOLISTA', 1, 556, 1),
(557, 'FUTBOLISTA', 1, 557, 1),
(558, 'BEISBOLISTA', 1, 558, 1),
(559, 'SOFTBOLISTA', 1, 559, 1),
(560, 'MOTOCICLISTA DEPORTIVO', 1, 560, 1),
(561, 'DEPORTISTA', 1, 561, 1),
(562, 'ANIMADOR', 1, 562, 1),
(563, 'PRESENTADOR DE NOTICIAS', 1, 563, 1),
(564, 'LOCUTOR(A)', 1, 564, 1),
(565, 'OPERADOR DE RADIO', 1, 565, 1),
(566, 'CRONISTA DEPORTIVO', 1, 566, 1),
(567, 'REPORTERO(A)', 1, 567, 1),
(568, 'CAMAROGRAFO', 1, 568, 1),
(569, 'AYUDANTE DE CAMAROGRAFO', 1, 569, 1),
(570, 'ESCENOGRAFO', 1, 570, 1),
(571, 'OPERADOR DE CAMARA', 1, 571, 1),
(572, 'OPERADOR MAQUINA DE CINE', 1, 572, 1),
(573, 'REALIZADOR DE PROGRAMAS', 1, 573, 1),
(574, 'CARICATURISTA', 1, 574, 1),
(575, 'DIBUJANTE COMERCIAL', 1, 575, 1),
(576, 'ROTULISTA', 1, 576, 1),
(577, 'PINTOR ROTULISTA', 1, 577, 1),
(578, 'EDITOR(A)', 1, 578, 1),
(579, 'PERIODISTA', 1, 579, 1),
(580, 'PUBLICISTA', 1, 580, 1),
(581, 'FOTOGRAFO(A)', 1, 581, 1),
(582, 'TEC. FOTOCOMPOSICION', 2, 582, 1),
(583, 'TEC. FOTOMECANICO', 2, 583, 1),
(584, 'TEC. EN MICROFILM', 2, 584, 1),
(585, 'TEC. EN SONIDO', 2, 585, 1),
(586, 'VOCERO', 1, 586, 1),
(587, 'RADIOTELEGRAFISTA', 1, 587, 1),
(588, 'PENSIONADO O JUBILADO', 1, 588, 1),
(589, 'TELEGRAFISTA', 1, 589, 1),
(590, 'DIGITADOR', 1, 590, 1),
(591, 'EMPLEADO(A)', 1, 591, 1),
(592, 'EMPLEADO PUBLICO', 1, 592, 1),
(593, 'DESEMPLEADO', 1, 593, 1),
(594, 'ABOGADO(A)', 1, 594, 1),
(595, 'ABOGADO(A) Y NOTARIO(A)', 1, 595, 1),
(596, 'LIC.(A) EN ADMON AGRICOLA', 3, 596, 1),
(597, 'DISEÑADOR(A) DE INTERIORES', 1, 597, 1),
(598, 'TEC EN EQUIPO DE RAYOS X', 2, 598, 1),
(599, 'LIC.(A) EN GEOGRAFIA', 3, 599, 1),
(600, 'TEC. EN METEREOLOGIA', 2, 600, 1),
(601, 'INGENIERO(A) EN PESCA', 3, 601, 1),
(602, 'LIC.(A) EN GEOLOGIA Y FISICA', 3, 602, 1),
(603, 'ANTROPOLOGO', 1, 603, 1),
(604, 'TEC. EN INGENIERIA MECANICA', 2, 604, 1),
(605, 'TEC. EN DESARROLLO RURAL', 2, 605, 1),
(606, 'TEC. EN INGENIERIA ELECTRICA', 2, 606, 1),
(607, 'TEC. EN INGENIERIA ELECTRONICA', 2, 607, 1),
(608, 'INGENIERO(A) METALURGICO', 3, 608, 1),
(609, 'PROFESOR EN QUIMICA', 1, 609, 1),
(610, 'PROFESOR EN LETRAS', 1, 610, 1),
(611, 'PROFESOR DE MUSICA', 1, 611, 1),
(612, 'PROFESOR DE RELIGION', 1, 612, 1),
(613, 'CATEDRATICO', 1, 613, 1),
(614, 'AEROTECNICO', 1, 614, 1),
(615, 'BACHILLER EN ARTE', 1, 615, 1),
(616, 'BACHILLER PEDAGOGICO', 1, 616, 1),
(617, 'BACHILLER EN ARQUITECTURA', 1, 617, 1),
(618, 'BACHILLER EN CIENCIAS Y ARTES', 1, 618, 1),
(619, 'BACHILLER AGRICOLA', 1, 619, 1),
(620, 'DECORADOR DE AUTOS', 1, 620, 1),
(621, 'MODELO', 1, 621, 1),
(622, 'AUTOR', 1, 622, 1),
(623, 'COMPOSITOR', 1, 623, 1),
(624, 'CONTORCIONISTA', 1, 624, 1),
(625, 'BAILARIN', 1, 625, 1),
(626, 'CORISTA', 1, 626, 1),
(627, 'TITIRITERO', 1, 627, 1),
(628, 'GALVANIZADOR', 1, 628, 1),
(629, 'ARCHIVISTA', 1, 629, 1),
(630, 'AYUDANTE DE COBRADOR', 1, 630, 1),
(631, 'SUPERVISOR DE VENTAS', 1, 631, 1),
(632, 'BARTENDER', 1, 632, 1),
(633, 'VIDRIERO', 1, 633, 1),
(634, 'COSTURERA INDUSTRIAL', 1, 634, 1),
(635, 'SASTRE INDUSTRIAL', 1, 635, 1),
(636, 'ESCULTOR INDUSTRIAL', 1, 636, 1),
(637, 'OBRERO TEXTIL', 1, 637, 1),
(638, 'INSTALADOR DE TECHO', 1, 638, 1),
(639, 'INSTALADOR DE AZULEJOS', 1, 639, 1),
(640, 'OSTRERO', 1, 640, 1),
(641, 'SALONERO', 1, 641, 1),
(642, 'DESPACHADOR', 1, 642, 1),
(643, 'CASEADOR', 1, 643, 1),
(644, 'CARTERO', 1, 644, 1),
(645, 'PRENSISTA DE TIPOGRAFIA', 1, 645, 1),
(646, 'CHALAN', 1, 646, 1),
(647, 'CASETERO', 1, 647, 1),
(648, 'ECONOMISTA AGRICOLA', 1, 648, 1),
(649, 'BRUCERO', 1, 649, 1),
(650, 'EDUCADORA SOCIAL', 1, 650, 1),
(651, 'TRAMITADOR(A) SOCIAL', 1, 651, 1),
(652, 'EDUCADOR EN SALUD', 1, 652, 1),
(653, 'PARAMEDICO', 1, 653, 1),
(654, 'INSPECTOR VETERINARIO', 1, 654, 1),
(655, 'ENFERMERA(O) GRADUADA(O)', 2, 655, 1),
(656, 'FLORICULTOR', 1, 656, 1),
(657, 'CAÑICULTOR', 1, 657, 1),
(658, 'COLOIADOR', 1, 658, 1),
(659, 'FUMIGADOR', 1, 659, 1),
(660, 'MECANICO AGRICOLA', 1, 660, 1),
(661, 'RASTRILLADOR', 1, 661, 1),
(662, 'TRAPICHERO', 1, 662, 1),
(663, 'EJECUTOR DE EMBARGO', 1, 663, 1),
(664, 'ASESOR JURIDICO', 1, 664, 1),
(665, 'CONTRATISTA NOTARIAL', 1, 665, 1),
(666, 'TEC. EN ALUMINIO', 2, 666, 1),
(667, 'TEC. EN ARMAS', 2, 667, 1),
(668, 'TEC. EN POLARIZADOS', 2, 668, 1),
(669, 'TEC. EN SISTEMA DE CABLE', 2, 669, 1),
(670, 'AUXILIAR DE DIGITADOR', 1, 670, 1),
(671, 'AUXILIAR DE OPERADOR', 1, 671, 1),
(672, 'AYUDANTE DE OBRA DE BANCO', 1, 672, 1),
(673, 'QUIMICO INDUSTRIAL', 1, 673, 1),
(674, 'APRENDIZ DE CONSTRUCTOR', 1, 674, 1),
(675, 'LABORATORISTA EN DIESEL', 1, 675, 1),
(676, 'PULIDOR DE PISO', 1, 676, 1),
(677, 'ARMADOR', 1, 677, 1),
(678, 'TEJERO', 1, 678, 1),
(679, 'TORNERO DE MADERA', 1, 679, 1),
(680, 'MECANICO NAVAL', 1, 680, 1),
(681, 'TRAILERO', 1, 681, 1),
(682, 'TORNERO', 1, 682, 1),
(683, 'MECANICO MONTADOR', 1, 683, 1),
(684, 'ELECTRICISTA INDUSTRIAL', 1, 684, 1),
(685, 'VULCANIZADOR', 1, 685, 1),
(686, 'FREZADOR', 1, 686, 1),
(687, 'ASESOR TECNICO', 1, 687, 1),
(688, 'TEC. EN MANTTO. DE COMPUTADORAS', 2, 688, 1),
(689, 'PROFESOR(A) DE ARTES MARCIALES', 1, 689, 1),
(690, 'PROFESOR(A) DE AEROBICOS', 1, 690, 1),
(691, 'SEMINARISTA', 1, 691, 1),
(692, 'HERMANA RELIGIOSA', 1, 692, 1),
(693, 'CATEQUISTA', 1, 693, 1),
(694, 'AGENTE DE SEGURIDAD PUBLICA', 1, 694, 1),
(695, 'DETECTIVE', 1, 695, 1),
(696, 'AGENTE PENITENCIARIO', 1, 696, 1),
(697, 'MECAPALERO(A)', 1, 697, 1),
(698, 'EMPLEADO DE ASEO', 1, 698, 1),
(699, 'COMUNICADOR SOCIAL', 1, 699, 1),
(700, 'AUXILIAR DE SERVICIO', 1, 700, 1),
(701, 'GASOLINERO', 1, 701, 1),
(702, 'DISEÑADOR COMERCIAL', 1, 702, 1),
(703, 'COBRADOR DE BUSES', 1, 703, 1),
(704, 'SOCORRISTA', 1, 704, 1),
(705, 'DIRECTOR DE CAMARA', 1, 705, 1),
(706, 'MICROSCOPISTA', 1, 706, 1),
(707, 'VOCEADOR', 1, 707, 1),
(708, 'FOTOLITOGRAFO', 1, 708, 1),
(709, 'EMPLEADO COMERCIAL', 1, 709, 1),
(710, 'EMPLEADO INDUSTRIAL', 1, 710, 1),
(711, 'PERITO', 1, 711, 1),
(712, 'PRODUCTOR DE TEATRO', 1, 712, 1),
(713, 'PRODUCTOR DE TV', 1, 713, 1),
(714, 'REDACTOR', 1, 714, 1),
(715, 'TALADOR', 1, 715, 1),
(716, 'CONSERJE', 1, 716, 1),
(717, 'LUCHADOR', 1, 717, 1),
(718, 'MOZO', 1, 718, 1),
(719, 'DISEÑADOR DE TATUAJES', 1, 719, 1),
(720, 'CATADOR', 1, 720, 1),
(721, 'ACTUARIO', 1, 721, 1),
(722, 'FUNCIONARIO PUBLICO', 1, 722, 1),
(723, 'DOCTOR EN INGENIERIA INDUSTRIAL', 3, 723, 1),
(724, 'LIC. EN TECNOLOGIA DE ALIMENTOS', 3, 724, 1),
(725, 'CONTADOR', 1, 725, 1),
(726, 'AGRONOMO', 1, 726, 1),
(727, 'MEDICO VETERINARIO', 1, 727, 1),
(728, 'TEC. EN PRODUCCION AGROPECUARIA', 2, 728, 1),
(729, 'DOCTOR(A) EN QUIMICA Y FARMACIA', 3, 729, 1),
(730, 'TECNICO EN INGENIERIA INDUSTRIAL', 2, 730, 1),
(731, 'INSTRUCTOR DE MANEJO', 1, 731, 1),
(732, 'NUTRICIONISTA', 1, 732, 1),
(733, 'LICENCIADO(A) EN MERCADEO', 3, 733, 1),
(734, 'ECONOMISTA', 1, 734, 1),
(735, 'CONSULTOR EN ECONOMIA', 1, 735, 1),
(736, 'PROFESOR(A)', 1, 736, 1),
(737, 'TRABAJADOR(A) AGRICOLA', 1, 737, 1),
(738, 'MILITAR', 1, 738, 1),
(739, 'PEDIATRA', 1, 739, 1),
(740, 'AGENTE DE VIAJES', 1, 740, 1),
(741, 'EDUCADOR AMBIENTAL', 1, 741, 1),
(742, 'JEFE DE PERSONAL', 1, 742, 1),
(743, 'JUEZ (A)', 1, 743, 1),
(744, 'LIC(A) EN COMUNICACIËN Y PERIODISMO', 3, 744, 1),
(745, 'TEC. AGRICOLA', 2, 745, 1),
(746, 'TEC. OPTICO', 2, 746, 1),
(747, 'ANALISTA FINANCIERO', 1, 747, 1),
(748, 'CONSULTOR(A)', 1, 748, 1),
(749, 'TEC. EN LABORATORIO QUIMICO', 2, 749, 1),
(750, 'TECNICO EN SEGUROS', 2, 750, 1),
(751, 'PROFESIONAL DE TRABAJO SOCIAL', 1, 751, 1),
(752, 'MAYORDOMO', 1, 752, 1),
(753, 'TEC. GEOGRAFO', 2, 753, 1),
(754, 'SECRETARIO(A) MUNICIPAL', 1, 754, 1),
(755, 'LIC. EN EDUCACION EN POBLACION', 3, 755, 1),
(756, 'MS EN ADMON. Y DOCENCIA UNIVERSITARIA', 1, 756, 1),
(757, 'TECNOLOGO(A) EN RADIOTECNOLOGIA', 2, 757, 1),
(758, 'LIC. EN EDUCACION', 3, 758, 1),
(759, 'LIC. EN REL. PUBLICAS Y COMUNICACIONES', 3, 759, 1),
(760, 'GUARDABOSQUES', 1, 760, 1),
(761, 'POLIGRAFISTA', 1, 761, 1),
(762, 'LIC. EN EDUCACION PARA LA SALUD', 3, 762, 1),
(763, 'TECNOLOGO(A) MATERNO INFANTIL', 2, 763, 1),
(764, 'ELECTRICISTA AUTOMOTRIZ', 1, 764, 1),
(765, 'TOPOGRAFO', 1, 765, 1),
(766, 'INGENIERO(A) ZOOTECNISTA', 3, 766, 1),
(767, 'TEC. EN TELECOMUNICACIONES', 2, 767, 1),
(768, 'TEC. INSTRUMENTAL MEDICO QUIRURJICO', 2, 768, 1),
(769, 'SUPERVISOR', 1, 769, 1),
(770, 'OPERARIA', 1, 770, 1),
(771, 'DOMESTICOS', 1, 771, 1),
(772, 'TORTILLERA', 1, 772, 1),
(773, 'ANALISTA', 1, 773, 1),
(774, 'PROF. EN BIOLOGIA', 1, 774, 1),
(775, 'MICROEMPRESARIO', 1, 775, 1),
(776, 'AUDITOR', 1, 776, 1),
(777, 'INGENIERO(A) ELECTRICISTA', 3, 777, 1),
(778, 'LIC. EN EDUCACION DE ADULTOS', 3, 778, 1),
(779, 'TEC. EN ING. EN SISTEMAS COMPUTACIONALES', 2, 779, 1),
(780, 'KINESIOLOGO', 1, 780, 1),
(781, 'OPTOMETRISTA', 1, 781, 1),
(782, 'ING. EN SISTEMAS', 3, 782, 1),
(783, 'OFTALMOLOGO', 1, 783, 1),
(784, 'ING. EN TELECOMUNICACIONES', 3, 784, 1),
(785, 'LICENCIADO(A) EN QUIMICA AGRICOLA', 3, 785, 1),
(786, 'TEC. EN ELECTRONICA Y BIOMEDICA', 2, 786, 1),
(787, 'AGENTE METROPOLITANO', 1, 787, 1),
(788, 'TEC. EN ARQUITECTURA Y CONSTRUCCION', 2, 788, 1),
(789, 'INGENIERO', 3, 789, 1),
(790, 'LIC. EN RADIOLOGIA E IMAGENES', 3, 790, 1),
(791, 'PROF. EN CIENCIAS DE LA EDUCACION', 1, 791, 1),
(792, 'MEDICO VETERINARIO Y ZOOTECNISTA', 1, 792, 1),
(793, 'ODONTOLOGO', 1, 793, 1),
(794, 'PRODUCTOR CINEMATOGRAFICO', 1, 794, 1),
(795, 'ING. MECANICO ELECTRICISTA', 3, 795, 1),
(796, 'LIC. EN COMERCIO INTERNACIONAL', 3, 796, 1),
(797, 'TEC. EN TELEFONIA', 2, 797, 1),
(798, 'INTERPRETE/TRADUCTOR', 1, 798, 1),
(799, 'LIC. EN MERCADOTECNIA Y PUBLICIDAD', 3, 799, 1),
(800, 'MARINO ELECTRICISTA', 1, 800, 1),
(801, 'INSPECTOR DE CALIDAD', 1, 801, 1),
(802, 'ENFIBRADOR', 2, 802, 1),
(803, 'AUXILIAR DE INGENIERIA', 1, 803, 1),
(804, 'TERAPISTA RESPIRATORIO', 1, 804, 1),
(805, 'AGENTE PREVISIONAL', 1, 805, 1),
(806, 'INSTALADOR DE ALARMAS', 1, 806, 1),
(807, 'ASESOR EDUCATIVO', 1, 807, 1),
(808, 'TECNICO TEXTIL', 2, 808, 1),
(809, 'TECNICO EN ADMON MUNICIPAL', 2, 809, 1),
(810, 'TEC. EN AUDIOLOGIA', 2, 810, 1),
(811, 'MASTER EN RECURSOS HUMANOS', 1, 811, 1),
(812, 'INSPECTOR EN OBRAS CIVILES', 1, 812, 1),
(813, 'CITOTECNOLOGO', 1, 813, 1),
(814, 'TEC. EN PREP. Y SERVIC. DE ALIMENTOS', 2, 814, 1),
(815, 'DIRECTOR DE CENTRO DE DESARROLLO', 1, 815, 1),
(816, 'TEC. HISIOTERAPISTA', 2, 816, 1),
(817, 'ASISTENTE ADMINISTRATIVO', 1, 817, 1),
(818, 'COORDINADOR DE TALLERES', 1, 818, 1),
(819, 'FISCAL', 1, 819, 1),
(820, 'FISCAL AUXILIAR', 1, 820, 1),
(821, 'PULIDOR DE MUEBLES', 1, 821, 1),
(822, 'TECNICO EN IDIOMAS', 2, 822, 1),
(823, 'TEC. EN ING. DE REF. Y AIRE ACOND.', 2, 823, 1),
(824, 'PEDICURISTA', 1, 824, 1),
(825, 'TEC. EN ING. AUTOMOTRIZ', 2, 825, 1),
(826, 'FOTOPERIODISTA', 1, 826, 1),
(827, 'DIPLOMATICO DE CARRERA', 1, 827, 1),
(828, 'SECRETARIA COMERCIAL', 1, 828, 1),
(829, 'ING. EN CIENCIAS DE LA COMPUTACION', 3, 829, 1),
(830, 'TEC. SUPERIOR EN ADMON. PUBLICA', 2, 830, 1),
(831, 'TEC. METEREOLOGO', 2, 831, 1),
(832, 'TECNOLOGO(A) INDUSTRIAL', 2, 832, 1),
(833, 'LICENCIADO(A) EN CRIMINOLOGIA', 3, 833, 1),
(834, 'DIRECTOR(A)', 1, 834, 1),
(835, 'LIC. EN RELACIONES PUBLICAS Y PUBLICIDAD', 3, 835, 1),
(836, 'ING. DE SISTEMAS INFORMATICOS', 3, 836, 1),
(837, 'TEC. EN ING. DE LA CONFECCION INDUSTRIAL', 2, 837, 1),
(838, 'LIC. EN FISIOTERAPIA Y TERAPIA OCUPACION', 3, 838, 1),
(839, 'POLICIA BANCARIO', 1, 839, 1),
(840, 'CONTROL DE CALIDAD', 1, 840, 1),
(841, 'PASTELERO', 1, 841, 1),
(842, 'GERENTE', 1, 842, 1),
(843, 'LAB. DE SUELOS', 1, 843, 1),
(844, 'ING. EN SISTEMAS Y COMPUTACION', 3, 844, 1),
(845, 'LIC. EN COMUNICACION SOCIAL', 3, 845, 1),
(846, 'TEC. EN COMERCIALIZACION', 2, 846, 1),
(847, 'CUSTODIO', 1, 847, 1),
(848, 'TENOR', 1, 848, 1),
(849, 'TECNICO', 2, 849, 1),
(850, 'PILOTO COMERCIAL', 1, 850, 1),
(851, 'TEC. EN PRODUCTIVIDAD INDUSTRIAL', 2, 851, 1),
(852, 'LIC. EN COMERCIALIZACION', 3, 852, 1),
(853, 'ESTADISTICO', 1, 853, 1),
(854, 'INSPECTOR TEC. EN SANEAMIENTO AMBIENTAL', 1, 854, 1),
(855, 'LICENCIATURA EN SALUD MATERNO INFANTIL', 3, 855, 1),
(856, 'CARPINTERO SIN TALLER', 1, 856, 1),
(857, 'PIANISTA', 1, 857, 1),
(858, 'TEC. EN RADIOLOGIA', 2, 858, 1),
(859, 'TECNOLOGO(A) EN  TERAPIA OCUPACIONAL', 2, 859, 1),
(860, 'TEC. EN DISEÑO Y CONSTRUCCION', 2, 860, 1),
(861, 'DOCTOR(A) EN CIENCIAS DE LA EDUCACION', 3, 861, 1),
(862, 'LIC. EN COMPUTACION ADMTIVA EMPRESARIAL', 3, 862, 1),
(863, 'DEFENSOR PUBLICO', 1, 863, 1),
(864, 'PROFESOR(A) EN EDUCACION  BASICA', 1, 864, 1),
(865, 'TEC. EN INGENIERIA ELECTROMECANICA', 2, 865, 1),
(866, 'ING. ELECTROMEC-NICO', 3, 866, 1),
(867, 'LIC. EN HOTELERIA Y TURISMO', 3, 867, 1),
(868, 'OBISPO ANGLICANO', 1, 868, 1),
(869, 'DOCTOR EN INFORMATICA', 3, 869, 1),
(870, 'LIC. EN  CIENCIAS SOCIALES', 3, 870, 1),
(871, 'PSICOLOGO(A)', 1, 871, 1),
(872, 'IMPORTADOR', 1, 872, 1),
(873, 'LIC. EN DIETOLOGIA Y NUTRICION', 3, 873, 1),
(874, 'LIC. EN QUIMICA BIOLOGICA', 3, 874, 1),
(875, 'MEDICO CIRUJANO', 1, 875, 1),
(876, 'TECNICO EN AVIACION', 2, 876, 1),
(877, 'CONSTRUCTOR', 1, 877, 1),
(878, 'PILOTO NAVAL', 1, 878, 1),
(879, 'LIC. EN DERECHO CANONICO', 3, 879, 1),
(880, 'DOCTOR(A) EN PSICOLOGIA', 3, 880, 1),
(881, 'INGENIERO FORESTAL', 3, 881, 1),
(882, 'PERITO AGRICOLA', 1, 882, 1),
(883, 'CONTADOR PUBLICO', 1, 883, 1),
(884, 'MAESTRIA EN  CIENCIAS AGROPECUARIAS', 1, 884, 1),
(885, 'CONTROL DE TRANSITO AEREO', 1, 885, 1),
(886, 'DISEÑADOR GRAFICO', 1, 886, 1),
(887, 'LIC. EN AGROINDUSTRIA', 3, 887, 1),
(888, 'TEC. EN SISTEMAS DE COMPUTACION', 2, 888, 1),
(889, 'TECNOLOGO EN TERAPIA DE LENGUAJE', 2, 889, 1),
(890, 'LIC. EN CIENCIAS DE LA EDUCACION', 3, 890, 1),
(891, 'DINAMITERO', 1, 891, 1),
(892, 'FISIOTERAPISTA', 1, 892, 1),
(893, 'ASESOR DE MERCADEO', 1, 893, 1),
(894, 'TEC. ADMINISTRADOR AGROPECUARIO', 2, 894, 1),
(895, 'JOYERO Y RELOJERO', 1, 895, 1),
(896, 'INGENIERO AGRICOLA', 3, 896, 1),
(897, 'TEC. EN ADMINISTRACION DE PERSONAL', 2, 897, 1),
(898, 'TEC. EN ING. AGROINDUSTRIAL', 2, 898, 1),
(899, 'TECNOLOGO MEDICO ANESTESISTA', 2, 899, 1),
(900, 'TEC. EN ING. CIVIL Y CONSTRUCCION', 2, 900, 1),
(901, 'ECOLOGO', 1, 901, 1),
(902, 'OPERARIO DE MAQUINAS TERMOFORMADORAS', 1, 902, 1),
(903, 'LIC.(A) EN ECONOMIA ADUANERA', 3, 903, 1),
(904, 'ESPECIALISTA FORESTAL', 1, 904, 1),
(905, 'LIC. EN ECONOMIA Y NEGOCIOS', 3, 905, 1),
(906, 'GUILLOTINISTA', 1, 906, 1),
(907, 'TECNICO EMBALSAMADOR', 2, 907, 1),
(908, 'PEDAGOGO', 1, 908, 1),
(909, 'TEC. EN ING. TOPOGRAFICA', 2, 909, 1),
(910, 'ZOOTECNISTA', 1, 910, 1),
(911, 'LIC. EN INFORMATICA', 3, 911, 1),
(912, 'LIC.(A EN ANESTESIOLOGIA E INHALOTERAPIA', 3, 912, 1),
(913, 'TEC. EN ESTRUCTURAS METALICA', 2, 913, 1),
(914, 'OBISPO CATOLICO', 1, 914, 1),
(915, 'TEC. EN INGENIERIA AGRONOMICA', 2, 915, 1),
(916, 'DOCTORADO EN QUIMICA BIOLOGICA', 3, 916, 1),
(917, 'TECNICO EN ESTERILIZACION', 2, 917, 1),
(918, 'DOCTOR EN QUIMICA BIOLOGICA', 3, 918, 1),
(919, 'BIBLIOTECOLOGO', 1, 919, 1),
(920, 'MASTER EN ADMON. Y DIRECCION DE EMPRESAS', 1, 920, 1),
(921, 'MASTER EN CIENCIAS DE LA MATE. APLICADA', 1, 921, 1),
(922, 'ACTOR', 1, 922, 1),
(923, 'TEC. PRACTICO EN AUDIOMETRIA', 2, 923, 1),
(924, 'BIOLOGO', 1, 924, 1),
(925, 'ASESOR', 1, 925, 1),
(926, 'ASESOR', 1, 926, 1),
(927, 'LIC. RR.PP Y COMUNICACIONES', 3, 927, 1),
(928, 'MEDICO NATURISTA', 1, 928, 1),
(929, 'MEDICO ANESTESIOLOGO', 1, 929, 1),
(930, 'REGENTE DE FARMACIA', 1, 930, 1),
(931, 'ING. MECANICO INDUSTRIAL', 3, 931, 1),
(932, 'CONSUL GENERAL', 1, 932, 1),
(933, 'LIC(A) EN TECNOLOGIA AGROINDUSTRIAL', 3, 933, 1),
(934, 'TEC. EN SOLAIRES', 2, 934, 1),
(935, 'PROCUDAROR GRAL. DE LA REPUBLICA', 1, 935, 1),
(936, 'TEC. EN ELECTROCARDIOGRAMA', 2, 936, 1),
(937, 'PRODUCTOR(A) DE TELEVISION', 1, 937, 1),
(938, 'ALFABETIZADOR(A)', 1, 938, 1),
(939, 'TEC. UNIVER. AVANZADO EN MERCADOTECNIA', 2, 939, 1),
(940, 'SOCIOLOGO(A) SANITARISTA', 1, 940, 1),
(941, 'ESTOMATOLOGO', 1, 941, 1),
(942, 'TECNOLOGO MEDICO', 2, 942, 1),
(943, 'TEC. EN MAQUINA INDUSTRIAL', 2, 943, 1),
(944, 'DIRECTOR EN ARTE DRAMATICO', 1, 944, 1),
(945, 'ING. BIOQUIMICO', 3, 945, 1),
(946, 'SACERDOTE CATOLICO', 1, 946, 1),
(947, 'PARROCO', 1, 947, 1),
(948, 'QUIMICO COLORISTA', 1, 948, 1),
(949, 'ORTOPEDA Y TRAUMATOLOGIA', 1, 949, 1),
(950, 'MEDICO ESPECIALISTA', 1, 950, 1),
(951, 'TEC. EN ING. EN COMPUTACION', 2, 951, 1),
(952, 'LIC. (A) EN TRADUCCION E INTERPRETACION', 3, 952, 1),
(953, 'BACHILLER EN COMERCIO Y ADMON.', 1, 953, 1),
(954, 'INDUSTRIAL SALINERO', 1, 954, 1),
(955, 'COLABORADOR JUDICIAL', 1, 955, 1),
(956, 'LIC.(A) EN ADMINISTRACION DE EDUCACION', 3, 956, 1),
(957, 'PROFESOR TECNICO', 1, 957, 1),
(958, 'TEC. EN CONSTRUCCION CIVIL', 2, 958, 1),
(959, 'PASTOR(A) EVANGELICO(A)', 1, 959, 1),
(960, 'TECNICO AUDIOLOGO', 2, 960, 1),
(961, 'OPERADOR PROYECCIONISTA', 1, 961, 1),
(962, 'CORREDOR(A) DE SEGUROS', 1, 962, 1),
(963, 'TEC. SUPERIOR EN ING. CIVIL', 2, 963, 1),
(964, 'GERENCIA INDUSTRIAL', 1, 964, 1),
(965, 'QUIMICO', 1, 965, 1),
(966, 'LIC. EN ARTES VISUALES', 3, 966, 1),
(967, 'AUXILIAR DE BODEGA', 1, 967, 1),
(968, 'TERAPISTA', 1, 968, 1),
(969, 'LIC. EN CIENCIAS Y ARTES MILITARES', 3, 969, 1),
(970, 'TECNICO AERONAUTICO', 2, 970, 1),
(971, 'M.SC EN RELACIONES INTERNACIONALES', 1, 971, 1),
(972, 'ANESTESISTA', 1, 972, 1),
(973, 'ESPECIALISTA EN DERECHOS HUMANOS', 1, 973, 1),
(974, 'LIC.(A) EN CIENCIAS DE LA COMPUTACION', 3, 974, 1),
(975, 'ING. ELECTRICO INDUSTRIAL', 3, 975, 1),
(976, 'LIC. EN NUTRICION Y DIETETICA', 3, 976, 1),
(977, 'ING. AEROESPACIAL', 3, 977, 1),
(978, 'LIC. (A) ADMON. DE EMPRESAS CON ESPECIAL', 3, 978, 1),
(979, 'ING. QUIMICO INDUSTRIAL', 3, 979, 1),
(980, 'TECNICO EN ENFERMERIA E HIGIENE DENTAL', 2, 980, 1),
(981, 'DOCTOR EN NATUROPATIA', 3, 981, 1),
(982, 'MAESTRIA EN DOCENCIA DE LA EDUCACION SUP', 1, 982, 1),
(983, 'MS ADMON. Y COMERC. AGROPECUARIA', 1, 983, 1),
(984, 'VETERINARIO', 1, 984, 1),
(985, 'ECONOMISTA AMBIENTAL', 1, 985, 1),
(986, 'INGENIERO AGROECOLOGO(A)', 3, 986, 1),
(987, 'TEC. SISTEMAS DE CONTROL', 2, 987, 1),
(988, 'INSPECTOR DE OPERACIONES MEDICAS', 1, 988, 1),
(989, 'LIC. EN CIENCIAS QUIMICAS', 3, 989, 1),
(990, 'ING. GEOLOGO', 3, 990, 1),
(991, 'LIC(A) ZOOTECNISTA', 3, 991, 1),
(992, 'LIC. EN QUIMICA INDUSTRIAL', 3, 992, 1),
(993, 'GUARDAVIDAS', 1, 993, 1),
(994, 'ING.(A) AVICOLA', 3, 994, 1),
(995, 'TEC.PROGRAMADOR ANALISTA', 2, 995, 1),
(996, 'LABORATORISTA CLINICO', 1, 996, 1),
(997, 'CANTAUTOR', 1, 997, 1),
(998, 'TEC. EN ELECTROCARDIOGRAFIA', 2, 998, 1),
(999, 'TEC. EN HOSTELERIA', 2, 999, 1),
(1000, 'ARMADOR', 1, 1000, 1),
(1001, 'STENOGRAFA', 1, 1001, 1),
(1002, 'MECANICO EN REFRIGERACION', 1, 1002, 1),
(1003, 'TECNICO DE CINE', 2, 1003, 1),
(1004, 'LIC. EN HUMANIDADES', 3, 1004, 1),
(1005, 'ADMINISTRADOR TEC. DE EMPRESAS INDUSTRIA', 1, 1005, 1),
(1006, 'AUXILIAR DE ENFERMERIA', 1, 1006, 1),
(1007, 'LIC. EN CC. DE LA EDUC. ESP.  INGLES', 3, 1007, 1),
(1008, 'MAESTRIA EN PSICOLOGIA CLINICA', 1, 1008, 1),
(1009, 'ING. FISICO', 3, 1009, 1),
(1010, 'LIC.(A) EN CIENCIAS', 3, 1010, 1),
(1011, 'TEC. AGROPECUARIO', 2, 1011, 1),
(1012, 'LIC. EN OPTOMETRIA', 3, 1012, 1),
(1013, 'MASTER EN CIENCIAS AGRICOLAS', 1, 1013, 1),
(1014, 'MEDICO GINECO-OBSTETRICIA', 1, 1014, 1),
(1015, 'ACTRIZ', 1, 1015, 1),
(1016, 'DESPACHADOR DE AERONAVES', 1, 1016, 1),
(1017, 'TEC. EN ADMON. FINANCIERA', 2, 1017, 1),
(1018, 'TEC. EN INGENIERIA EN COMPUTACION', 2, 1018, 1),
(1019, 'TEC. EN FARMACIA', 2, 1019, 1),
(1020, 'AUXILIAR DE VETERINARIO', 1, 1020, 1),
(1021, 'DR(A) EN QUIMICA Y FARMACIA', 3, 1021, 1),
(1022, 'DOCTOR EN INGENIERIA', 3, 1022, 1),
(1023, 'TECNICO EN QUIMICOS', 2, 1023, 1),
(1024, 'ING. AUTOMOTRIZ', 3, 1024, 1),
(1025, 'OPERARIO DE OPTICA', 1, 1025, 1),
(1026, 'PARASITOLOGO MEDICO', 1, 1026, 1),
(1027, 'TEC. EN ADMON. PUBLICA', 2, 1027, 1),
(1028, 'LIC. EN CIENCIAS ACTUARIALES', 3, 1028, 1),
(1029, 'TEC.EN SALUD Y SANEAMIENTO AMBIENTAL', 2, 1029, 1),
(1030, 'PROFESORADO EN IDIOMAS', 1, 1030, 1),
(1031, 'TECNICO EN RECURSOS HUMANOS', 2, 1031, 1),
(1032, 'SECRETARIA EN COMPUTACION', 1, 1032, 1),
(1033, 'RECTOR (A)', 1, 1033, 1),
(1034, 'LIC.(A)EN EDUC.PARA LA ENS.DE LA QUIMICA', 3, 1034, 1),
(1035, 'TEC. EN TECNOLGIA  Y MEDIO AMBIENTE', 2, 1035, 1),
(1036, 'MEDICO IRIDOLOGO', 1, 1036, 1),
(1037, 'LIC. EN BIOLOGIA Y QUIMICA', 3, 1037, 1),
(1038, 'LIC. EN ADMINISTRACION DE SALUD', 3, 1038, 1),
(1039, 'TELEOPERADOR(A)', 1, 1039, 1),
(1040, 'DISPLAY', 1, 1040, 1),
(1041, 'GEOQUIMICO', 1, 1041, 1),
(1042, 'TEC. AUDIOMETRISTA', 2, 1042, 1),
(1043, 'DOCTOR EN ARTES', 3, 1043, 1),
(1044, 'LIC(A) EN CIENCIAS ECONOMICAS', 3, 1044, 1),
(1045, 'TECNICO EN INFORMATICA', 2, 1045, 1),
(1046, 'MS EN ADMON DE RECURSOS HUMANOS', 1, 1046, 1),
(1047, 'TEC. EN BOBINADO', 2, 1047, 1),
(1048, 'TECNOLOGO(A) EN PUERICULTURA', 2, 1048, 1),
(1049, 'ENTOMOLOGO', 1, 1049, 1),
(1050, 'DR. EN ECONOMIA Y COMERCIO', 3, 1050, 1),
(1051, 'TEC EN MECANIZACION AGRICOLA INDUSTRIAL', 2, 1051, 1),
(1052, 'PASTOR EXHORTADOR', 1, 1052, 1),
(1053, 'DASONOMO', 1, 1053, 1),
(1054, 'TEC EN SECRETARIADO SUPERIOR ADTIVO.', 2, 1054, 1),
(1055, 'TEC. EN ACUACULTURA', 2, 1055, 1),
(1056, 'TEC. ELECTROMECANICO', 2, 1056, 1),
(1057, 'INGENIERIA GENETICA', 3, 1057, 1),
(1058, 'TEC. EN ANATOMIA PATOLOGICA', 2, 1058, 1),
(1059, 'TEC. EN CARDIOLOGIA', 2, 1059, 1),
(1060, 'LIC. EN ASISTENCIA CIRCULATORIA', 3, 1060, 1),
(1061, 'PARAPSICOLOGIA', 1, 1061, 1),
(1062, 'REVERENDO', 1, 1062, 1),
(1063, 'TEC. VALUADOR', 2, 1063, 1),
(1064, 'CHEF INTERNACIONAL', 1, 1064, 1),
(1065, 'ADMINISTRACION DE PERSONAL', 1, 1065, 1),
(1066, 'DIBUJANTE COMERCIAL PUBLICITARIO', 1, 1066, 1),
(1067, 'ING. EN COMUNICACIONES Y ELECTRONICA', 3, 1067, 1),
(1068, 'DOCUMENTOLOGO', 3, 1068, 1),
(1069, 'OFICIOS DOMESTICOS', 1, 1069, 1),
(1070, 'TECNICO EN CONTADURIA', 2, 1070, 1),
(1071, 'METEOROLOGO', 1, 1071, 1),
(1072, 'SUB-DIRECTOR', 1, 1072, 1),
(1073, 'INSEMINADOR ARTIFICIAL', 1, 1073, 1),
(1074, 'LIC. EN SISTEMAS DE COMP. ADMINISTRATIVA', 3, 1074, 1),
(1075, 'PROMOTOR CULTURAL', 1, 1075, 1),
(1076, 'TEC. ARCHIVISTA Y MICROFILM', 2, 1076, 1),
(1077, 'SECRETARIA MERCANTIL', 1, 1077, 1),
(1078, 'PROFESOR DE DANZA', 1, 1078, 1),
(1079, 'TEC. EN SOLDURA ELECTRICO', 2, 1079, 1),
(1080, 'TEC. EJECUTIVO EN OPER. INTERNACIONALES', 2, 1080, 1),
(1081, 'TEC. EN SALUD - HIGIENE DENTAL', 2, 1081, 1),
(1082, 'ING. AGRONOMO FITOTECNISTA', 3, 1082, 1),
(1083, 'FOTOGRABADOR', 1, 1083, 1),
(1084, 'LIC. EN ORIENTACION PROFESIONAL', 3, 1084, 1),
(1085, 'FOTOMECANICO', 1, 1085, 1),
(1086, 'ESTETISISTA', 1, 1086, 1),
(1087, 'ALTA COSTURA Y DISEÑO', 1, 1087, 1),
(1088, 'TECNICO MECANICO', 2, 1088, 1),
(1089, 'AGENTE ADUANAL', 1, 1089, 1),
(1090, 'TEC. EN MANTENIMIENTO INDUSTRIAL', 2, 1090, 1),
(1091, 'TEC. EN PROCESAMIENTO DE DATOS', 2, 1091, 1),
(1092, 'PROFESOR EN MATEMATICA', 1, 1092, 1),
(1093, 'LIC(A) EN MERCADOTECNIA Y PUBLICIDAD', 3, 1093, 1),
(1094, 'LIC. EN BACTERIOLOGIA Y C.C. NATURALES', 3, 1094, 1),
(1095, 'INSPECTOR DE CAMPO', 1, 1095, 1),
(1096, 'TEC. EN PSICOLOGIA', 2, 1096, 1),
(1097, 'INGENIERO(A) COMERCIAL', 3, 1097, 1),
(1098, 'TECNOLOGO MEDICO EN FISIOTERAPIA', 2, 1098, 1),
(1099, 'SOCIOLOGO (A)', 1, 1099, 1),
(1100, 'MASTER EN ECONOMIA EMPRESARIAL', 1, 1100, 1),
(1101, 'TEC. EN ANALISIS FINANCIERO', 2, 1101, 1),
(1102, 'MEDICO RADIOLOGO', 1, 1102, 1),
(1103, 'PERITO VALUADOR', 1, 1103, 1),
(1104, 'OPERADOR(A) EN SISTEMAS', 1, 1104, 1),
(1105, 'INGENIERO DE PRODUCCION', 3, 1105, 1),
(1106, 'INGENIERO(A) AGRONOMO ZOOTECNISTA', 3, 1106, 1),
(1107, 'SOLDADOR ELECTRICO', 1, 1107, 1),
(1108, 'TEC. EN ELECTRONICA DIGITAL', 2, 1108, 1),
(1109, 'BACH. INDUS ESP. EN MECANICA DE AVIACION', 1, 1109, 1),
(1110, 'UROLOGO', 1, 1110, 1),
(1111, 'MECANICO EN ESTRUCTURAS METALICAS', 1, 1111, 1),
(1112, 'AGROPECUAIO(A)', 1, 1112, 1),
(1113, 'TEC. EN TURISMO', 2, 1113, 1),
(1114, 'TECNICO FINANCIERO', 2, 1114, 1),
(1115, 'CORREDOR DE BOLSA', 1, 1115, 1),
(1116, 'TECNICO EN CIENCIAS COMERCIALES', 2, 1116, 1),
(1117, 'TEC. EN COMP. ADMINISTRATIVA EMPRESARIAL', 2, 1117, 1),
(1118, 'TEC. EN PROGRAMACION DE COMPUTADORAS', 2, 1118, 1),
(1119, 'LIC. EN EDUCACION FISICA Y DEPORTE', 3, 1119, 1),
(1120, 'HORTICULTOR', 1, 1120, 1),
(1121, 'INGENIERO(A) ELECTRICISTA', 3, 1121, 1),
(1122, 'TECNICO EN RAYOS X', 2, 1122, 1),
(1123, 'ING.(A) AGRONOMO EN DESARROLLO RURAL', 3, 1123, 1),
(1124, 'JARDINERO INJERTADOR', 1, 1124, 1),
(1125, 'DESTAZADOR(A)', 1, 1125, 1),
(1126, 'LIC. EN DIPLOMACIA', 3, 1126, 1),
(1127, 'PERITO EN DACTILOSCOPIA', 1, 1127, 1),
(1128, 'LICENCIADO(A) EN ADMON. EDUCATIVA', 3, 1128, 1),
(1129, 'TEC. EN OBRA DE BANCO', 2, 1129, 1),
(1130, 'MAESTRE EN DERECHO INT. PUBLICO', 1, 1130, 1),
(1131, 'DISEÑADOR(A) DE MODA', 1, 1131, 1),
(1132, 'LIC. EN ORIENTACION EDUCATIVA', 3, 1132, 1),
(1133, 'MAESTRO(A) EN ADMON. DE TEC. EN INF.', 1, 1133, 1),
(1134, 'TEC. AVICOLA', 2, 1134, 1),
(1135, 'ELECTROMECANICO INDUSTRIAL', 1, 1135, 1),
(1136, 'ASESOR PEDAGOGICO', 1, 1136, 1),
(1137, 'QUIMICO FARMACEUTICO', 1, 1137, 1),
(1138, 'TEC. EN ARTES GRAFICAS', 2, 1138, 1),
(1139, 'MAESTRA EN SALUD PUBLICA', 1, 1139, 1),
(1140, 'INTERMEDIARIO DE SEGUROS', 1, 1140, 1),
(1141, 'TEC. EN ALIMENTOS', 2, 1141, 1),
(1142, 'DIRECTOR(A) DE CINE Y TV.', 1, 1142, 1),
(1143, 'TEC. EN TELEFONIA', 2, 1143, 1),
(1144, 'TEC. EN INGENIERIA TEXTIL', 2, 1144, 1),
(1145, 'SECRETARIA BILING\\_E', 1, 1145, 1),
(1146, 'TEC. EN SIST. INFORMATICOS ADMINIS.', 2, 1146, 1),
(1147, 'TEC. HISTOPATOLOGICO', 2, 1147, 1),
(1148, 'TEC. EN SISTEMAS HIDRAULICOS', 2, 1148, 1),
(1149, 'TEC. ELECTRICISTA', 2, 1149, 1),
(1150, 'SACERDOTE ANGLICANO', 1, 1150, 1),
(1151, 'TEC. OPERADOR DE COMPUTADORAS', 2, 1151, 1),
(1152, 'PASTOR ADVENTISTA', 1, 1152, 1),
(1153, 'DOCTOR EN HISTORIA', 3, 1153, 1),
(1154, 'DR(A). EN MEDICINA Y CIRUGIA', 3, 1154, 1),
(1155, 'LIC. EN CIENCIAS NATURALES', 3, 1155, 1),
(1156, 'TEC. EN EDUCACION', 2, 1156, 1),
(1157, 'PSIQUIATRA', 1, 1157, 1),
(1158, 'TEC. EN ING. MECANICA Y ELECTRICA', 2, 1158, 1),
(1159, 'QUIMICO MINERO', 1, 1159, 1),
(1160, 'TECNICO FORESTAL', 2, 1160, 1),
(1161, 'LIC.(A) EN FINANZAS', 3, 1161, 1),
(1162, 'LIC.(A) EN NEGOCIOS INTERNACIONALES', 3, 1162, 1),
(1163, 'DIPLO. EN HIGIENE Y SEGURIDAD INDUSTRIAL', 1, 1163, 1),
(1164, 'ING. EN RADIO-COMUNICACIONES', 3, 1164, 1),
(1165, 'DEMOLEDOR DE ROCAS', 1, 1165, 1),
(1166, 'LIC. EN ARTES', 3, 1166, 1),
(1167, 'CARPINTERO TALLADOR', 1, 1167, 1),
(1168, 'MS. EN CIENCIAS', 1, 1168, 1),
(1169, 'DISEÑADOR ARTESANAL', 1, 1169, 1),
(1170, 'TEC, EN ADMON. DE EMPRESAS', 2, 1170, 1),
(1171, 'TEC. EN TECNOLOGIA ARQUITECTONICA', 2, 1171, 1),
(1172, 'PERFUSIONISTA PRACTICO', 1, 1172, 1),
(1173, 'DIETISTA', 1, 1173, 1),
(1174, 'INSTRUCTOR(A) EN KARATE', 1, 1174, 1),
(1175, 'SACERDOTE LUTERANO', 1, 1175, 1),
(1176, 'PESCADOR(A) ARTESANAL', 1, 1176, 1),
(1177, 'CORRESPONSAL', 1, 1177, 1),
(1178, 'INSTRUCTOR DE NATACION', 1, 1178, 1),
(1179, 'TEC. EN ARSENAL QUIRURGICO', 2, 1179, 1),
(1180, 'DOCTORADO EN DEMOGRAFIA', 3, 1180, 1),
(1181, 'DR.(A) EN QUIMICA INDUSTRIAL', 3, 1181, 1),
(1182, 'LIC. EN DISEÑO DE TEXTILES', 3, 1182, 1),
(1183, 'PROFESOR(A) DE ARTES', 1, 1183, 1),
(1184, 'ACUICULTOR', 1, 1184, 1),
(1185, 'TEC. AVANZADA EN ING. DE CONFECCION IND.', 2, 1185, 1),
(1186, 'DR. EN ADMINISTRACION DE EMPRESAS', 3, 1186, 1),
(1187, 'MASTER EN EDUCACION', 1, 1187, 1),
(1188, 'BUZO SOLDADOR', 1, 1188, 1),
(1189, 'LABORATORISTA', 1, 1189, 1),
(1190, 'BUZO COMERCIAL', 1, 1190, 1),
(1191, 'DR. EN DERECHO INTERNACIONAL', 3, 1191, 1),
(1192, 'TECNOLOGO(A) MEDICO EN LAB. CLINICO', 2, 1192, 1),
(1193, 'TEC. EN INGENIERIA DE CONTROL', 2, 1193, 1),
(1194, 'DR.(A) EN SALUD PUBLICA', 3, 1194, 1),
(1195, 'IRIDOLOGA', 1, 1195, 1),
(1196, 'INSPECTOR AERONAUTICO', 1, 1196, 1),
(1197, 'LIC. INGENIERIA NAUTICA', 3, 1197, 1),
(1198, 'ENTRENADOR DE FOOTBALL', 1, 1198, 1),
(1199, 'LIC. EN LING\\_ISTICA', 3, 1199, 1),
(1200, 'TEC. EN HOTELERIA Y TURISMO', 2, 1200, 1),
(1201, 'LICENCIADO EN METEREOLOGIA', 3, 1201, 1),
(1202, 'TEC. EN MANTTO. Y REP. DE EQ. BIOMEDICO', 2, 1202, 1),
(1203, 'DR. EN QUIMICA INDUSTRIAL Y FARMACIA', 3, 1203, 1),
(1204, 'METEOROLOGO', 1, 1204, 1),
(1205, 'MASTER EN EDUCACION SUPERIOR', 1, 1205, 1),
(1206, 'MAESTRIA EN EDUCACION SUPERIOR', 1, 1206, 1),
(1207, 'BACH.EN ELECTRONICA', 1, 1207, 1),
(1208, 'TECNICO EN REFINERIA', 2, 1208, 1),
(1209, 'MISIONERO EVANGELICO', 1, 1209, 1),
(1210, 'CONTADOR PUBLICO Y AUDITOR', 1, 1210, 1),
(1211, 'LIC. EN DEMOGRAFIA', 3, 1211, 1),
(1212, 'INGENIERO EN CONFECCION', 3, 1212, 1),
(1213, 'DR.(A) EN PSICOLOGIA CLINICA', 3, 1213, 1),
(1214, 'DISK JOCKEY', 1, 1214, 1),
(1215, 'LIC.(A) EN ESTUDIOS ECLESIASTICOS', 3, 1215, 1),
(1216, 'DESTILADOR', 1, 1216, 1),
(1217, 'LIC.(A) EN HUMANIDADES CLASICAS', 3, 1217, 1),
(1218, 'LIC.(A) CONTADOR PUBLICA Y AUDITORIA', 3, 1218, 1),
(1219, 'OFICIAL DE POLICIA', 1, 1219, 1),
(1220, 'TEC. AVANZADO EN ING. TOPOGRAFICA', 2, 1220, 1),
(1221, 'MEDICO', 1, 1221, 1),
(1222, 'DR.(A) EN LETRAS Y HUMANIDADES', 3, 1222, 1),
(1223, 'PRESENTADOR DE TV', 1, 1223, 1),
(1224, 'DR. EN TEOLOGIA', 3, 1224, 1),
(1225, 'TEC. EN NEGOCIOS', 2, 1225, 1),
(1226, 'ING.(A) AGRONOMO FITOTECNISTA', 3, 1226, 1),
(1227, 'TEC. EN REFRIGERACION INDUSTRIAL', 2, 1227, 1),
(1228, 'LINIERO ELECTRICISTA', 1, 1228, 1),
(1229, 'LIC(A). EN LENGUAJE Y LITERATURA', 3, 1229, 1),
(1230, 'COMISIONADO', 1, 1230, 1),
(1231, 'ING.(A) INDUSTRIAL Y SISTEMAS', 3, 1231, 1),
(1232, 'PROF. EN EDUC. MEDIA P/EL IDIOMA INGLES', 1, 1232, 1),
(1233, 'TEC. EN RADIO-COMUNICACIONES', 2, 1233, 1),
(1234, 'DIBUJANTE DE INGENIERIA Y ARQUITECTURA', 1, 1234, 1),
(1235, 'SECRETARIA EJECUTIVA EN LEYES', 1, 1235, 1),
(1236, 'TEC. EN RELACIONES PUB. Y COMUNICACIONES', 2, 1236, 1),
(1237, 'MAESTRIA EN DIRECCION DE EMPRESAS', 1, 1237, 1),
(1238, 'PERITO AGRONOMO', 1, 1238, 1),
(1239, 'MARINERO DE BARCO PESQUERO', 1, 1239, 1),
(1240, 'MAESTRO EN ARTES VISUALES', 1, 1240, 1),
(1241, 'TEC. EN ARSENAL Y CENTRAL DE EQUIPOS', 2, 1241, 1),
(1242, 'INVESTIGADOR ARQUEOLOGICO', 1, 1242, 1),
(1243, 'TELEFONISTA', 1, 1243, 1),
(1244, 'ING.(A) COMERCIAL', 3, 1244, 1),
(1245, 'TEC. EN CONTROL DE CALIDAD', 2, 1245, 1),
(1246, 'TEC. MEDIO AGROPECUARIO', 2, 1246, 1),
(1247, 'BANQUERO', 1, 1247, 1),
(1248, 'MASTER EN DERECHOS HUMANOS', 1, 1248, 1),
(1249, 'TEC. EN MANTENIMIENTO', 2, 1249, 1),
(1250, 'MARINO DE BARCO', 1, 1250, 1),
(1251, 'LIC(A) DE CIENCIAS DEL LENGUAJE', 3, 1251, 1),
(1252, 'DOCTORADO EN AUDIOLOGIA', 3, 1252, 1),
(1253, 'MATEMATICO', 1, 1253, 1),
(1254, 'ING.(A) AGRICOLA', 3, 1254, 1),
(1255, 'LIC.(A) EN ECOLOGIA', 3, 1255, 1),
(1256, 'AUXILIAR EN ODONTOLOGIA', 1, 1256, 1),
(1257, 'LIC.(A) EN DERECHO', 3, 1257, 1),
(1258, 'OCEANOLOGO', 1, 1258, 1),
(1259, 'FISICO', 1, 1259, 1),
(1260, 'ING.(A) ELECTRO-MECANICO', 3, 1260, 1),
(1261, 'TEC. EN COMERCIO Y ADMINISTRACION', 2, 1261, 1),
(1262, 'OPERADOR DE MAQUINAS', 1, 1262, 1),
(1263, 'ANALISTA DE SISTEMAS', 1, 1263, 1),
(1264, 'HOMEOPATA', 1, 1264, 1),
(1265, 'RADIODIFUSOR', 1, 1265, 1),
(1266, 'OFICIAL DE MARINA', 1, 1266, 1),
(1267, 'LIC.(A) EN DESARROLLO INTERNACIONAL', 3, 1267, 1),
(1268, 'ING.(A) EN AGRONEGOCIOS', 3, 1268, 1),
(1269, 'LIC(A). EN CIENCIAS Y ARTES', 3, 1269, 1),
(1270, 'TEC. SUB-MARINISTA', 2, 1270, 1),
(1271, 'FINANCISTA', 1, 1271, 1),
(1272, 'ARTES PLASTICAS', 1, 1272, 1),
(1273, 'LIC.(A) EN MERCADEO Y PUBLICIDAD', 3, 1273, 1),
(1274, 'LIC. RELACIONES PUBLIC. Y COMUNICACIONES', 3, 1274, 1),
(1275, 'TEC. ADMINISTRATIVO', 2, 1275, 1),
(1276, 'DOCTOR (A) EN MICROBIOLOGIA', 3, 1276, 1);
INSERT INTO `profesion` (`idProfesion`, `Profesion`, `idTipoocupacion`, `orden`, `estado`) VALUES
(1277, 'ING. QUIMICO AGRICOLA', 3, 1277, 1),
(1278, 'TEC. INGENIERIA DE CONTROL DE CALIDAD', 2, 1278, 1),
(1279, 'AUXILIAR DE TOPOGRAFIA', 1, 1279, 1),
(1280, 'TEC. EN EQUIPO DE OFICINA', 2, 1280, 1),
(1281, 'DOCTOR(A) EN AGRICULTURA', 3, 1281, 1),
(1282, 'TECNOLOGO(A) EN SALUD MATERNO INFANTIL', 2, 1282, 1),
(1283, 'LIC. IDIOMA INGLES', 3, 1283, 1),
(1284, 'LIC. EN EDUC. C/FUND. EN MAT. Y FISICA', 3, 1284, 1),
(1285, 'QUIMICO TEXTIL', 1, 1285, 1),
(1286, 'TEC. EN PANIFICACION', 2, 1286, 1),
(1287, 'CAMARERO (A)', 1, 1287, 1),
(1288, 'MEDICO PEDIATRA', 1, 1288, 1),
(1289, 'EDUCADOR (A)', 1, 1289, 1),
(1290, 'CORRESPONSAL DE DEPORTE', 1, 1290, 1),
(1291, 'VOCALISTA', 1, 1291, 1),
(1292, 'TEC. SISMOLOGO', 2, 1292, 1),
(1293, 'AGRONOMO VETERINARIO', 1, 1293, 1),
(1294, 'SALINERO', 1, 1294, 1),
(1295, 'HIDROGEOLOGO', 1, 1295, 1),
(1296, 'DIACONO', 1, 1296, 1),
(1297, 'OTORRINOLARINGOLOGO', 1, 1297, 1),
(1298, 'LIC. EN AERONAUTICA PROFESIONAL', 3, 1298, 1),
(1299, 'MAESTRO(A) EN EDUCACION PRIMARIA', 1, 1299, 1),
(1300, 'ASESOR DE EMPRESAS', 1, 1300, 1),
(1301, 'ING. OCEANICO', 3, 1301, 1),
(1302, 'CAPITAN', 1, 1302, 1),
(1303, 'TEC. EN COMPUTACION ADMINISTRATIVA', 2, 1303, 1),
(1304, 'DR. EN METALURGIA Y CC. DE LOS MAT.', 3, 1304, 1),
(1305, 'ING. TEC. MECANICO', 3, 1305, 1),
(1306, 'ING. EN MAQUINARIA AGRICOLA', 3, 1306, 1),
(1307, 'PRESBITERO(A)', 1, 1307, 1),
(1308, 'LOCUTOR DEPORTIVO', 1, 1308, 1),
(1309, 'PILOTO AVIADOR COMERCIAL', 1, 1309, 1),
(1310, 'VITRALISTA', 1, 1310, 1),
(1311, 'TEC. AGRONOMO', 2, 1311, 1),
(1312, 'ENFERMERA DENTAL', 2, 1312, 1),
(1313, 'DERMATOLOGO', 1, 1313, 1),
(1314, 'DR.(A) EN QUIMICA', 3, 1314, 1),
(1315, 'TEC. CONSTRUCTOR', 2, 1315, 1),
(1316, 'PALEONTOLOGO(A)', 1, 1316, 1),
(1317, 'METEOROLOGO(A)', 1, 1317, 1),
(1318, 'TRIPULANTE DE CABINA', 1, 1318, 1),
(1319, 'ING. EN CONSTRUCCION', 3, 1319, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Proyecto` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `proyectista` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fechaficha` date DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `materiales` smallint(6) DEFAULT NULL,
  `transporte` smallint(6) DEFAULT NULL,
  `detalle` varchar(512) COLLATE latin1_general_ci DEFAULT NULL,
  `Histoproyectodetalle` int(11) DEFAULT '0',
  `estado` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProyecto`),
  KEY `Proyecto` (`Proyecto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `Proyecto`, `proyectista`, `fechaficha`, `fechainicio`, `fechafin`, `monto`, `materiales`, `transporte`, `detalle`, `Histoproyectodetalle`, `estado`) VALUES
(1, 'Patrocinio de Linux Lan Party', 'Fuentes Digital', '2012-06-03', '2012-06-03', '2012-06-03', 100.00, 1, 1, '<p>Patrocinio de Linux Lan Party con 100 Metros de Cable de Red.</p>', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionmultimedia`
--

CREATE TABLE IF NOT EXISTS `seccionmultimedia` (
  `idSeccionmultimedia` int(11) NOT NULL AUTO_INCREMENT,
  `Seccionmultimedia` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idSeccionmultimedia`),
  KEY `Seccionmultimedia` (`Seccionmultimedia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `seccionmultimedia`
--

INSERT INTO `seccionmultimedia` (`idSeccionmultimedia`, `Seccionmultimedia`, `orden`, `estado`) VALUES
(1, 'Software', 1, 1),
(2, 'Ejemplos', 2, 1),
(3, 'Prototipos', 3, 1),
(4, 'Oferta', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionsimple`
--

CREATE TABLE IF NOT EXISTS `seccionsimple` (
  `idSeccionsimple` int(11) NOT NULL AUTO_INCREMENT,
  `Seccionsimple` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idSeccionsimple`),
  KEY `Seccionsimple` (`Seccionsimple`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `seccionsimple`
--

INSERT INTO `seccionsimple` (`idSeccionsimple`, `Seccionsimple`, `orden`, `estado`) VALUES
(1, 'Hardware', 1, 1),
(2, 'Software', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int(11) NOT NULL AUTO_INCREMENT,
  `Sexo` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL,
  PRIMARY KEY (`idSexo`),
  KEY `Sexo` (`Sexo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `Sexo`, `orden`, `estado`) VALUES
(1, 'MASCULINO', 1, 1),
(2, 'FEMENINO', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `idSubmenu` smallint(6) NOT NULL,
  `idMenu` smallint(6) DEFAULT NULL,
  `Submenu` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idSubmenu`),
  KEY `Submenu` (`Submenu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`idSubmenu`, `idMenu`, `Submenu`, `orden`, `estado`) VALUES
(1, 1, 'Catálogos de Informática', 10, 1),
(2, 1, 'Catálogos Generales', 20, 1),
(3, 1, 'Catálogos de Oficina', 30, 1),
(4, 1, 'Catálogos de Contabilidad', 40, 1),
(5, 1, 'Procesos de Informática', 70, 1),
(6, 1, 'Catálogos de Inventarios', 60, 1),
(8, 2, 'Control Administrativo', 10, 1),
(9, 2, 'Reportes de Entrevista', 20, 1),
(10, 1, 'Lista de Reportes', 30, 1),
(11, 3, 'Medicinas', 10, 1),
(12, 3, 'Dietas', 20, 1),
(13, 4, 'Agendas', 10, 1),
(14, 5, 'Gestor de Contenido', 10, 1),
(15, 2, 'Inventarios', 10, 1),
(16, 1, 'Catálogos de Internet', 60, 1),
(17, 5, 'Listados', 20, 1),
(18, 5, 'Galería de Imágenes', 30, 1),
(19, 5, 'Formularios', 40, 1),
(20, 2, 'Operaciones', 30, 1),
(21, 1, 'Opciones', 30, 1),
(22, 4, 'Directorios', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE IF NOT EXISTS `suscripcion` (
  `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `Suscripcion` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `fechaSuscripcion` date DEFAULT NULL,
  `documento` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `profesion` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `empresa` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `telefonos` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idSuscripcion`),
  KEY `Suscripcion` (`Suscripcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`idSuscripcion`, `Suscripcion`, `fechaSuscripcion`, `documento`, `profesion`, `empresa`, `telefonos`, `email`, `idPais`, `estado`) VALUES
(1, 'Contreras, Roberto Carlos', '2012-05-30', '12345678', 'Albanil', 'Tururu Tarara', '2541 2555', 'jjgmz@bing.com', 72, 1),
(2, 'Contreras, Jose Manuel', '2012-05-30', '123456789', 'Auxiliar de Servicio', 'Jarquin Constructores', '2541 2254', 'jperez@yyyg.com', 168, 1),
(3, 'Fuentes Salguero, Mauricio Vladimir', '2012-05-30', '02215084-7', 'Ing. en Sistemas', 'Diaz Gomez S.A. de C.V.', '2272 3948', 'jgomz@yygg.com', 65, 1),
(4, 'Pérez Bennet, Jose Roberto', '2012-05-30', '02215084-7', 'Cirujano Medico', 'Consultorio Personal', '2411 2542', 'jjpp@hht.com', 65, 1),
(5, 'Gomez Perez, Juan Jose', '2012-05-30', '221541', 'Jardinero', '-', '2254 2222', 'jgomez@yy.com', 65, 1),
(6, 'Fuentes, Mauricio', '2012-09-10', '12345678', 'Jardinero', 'FD Mantenimiento', '2255 4542', 'mauriciovladimir@yahoo.es', 65, 1),
(7, 'Fuentes Salguero, Mauricio', '2013-02-13', '253540', 'Ing. en Sistemas', 'Mi Empresa punto Com', '2272 3966', 'mvfuentes@gmail.com', 65, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanomedio`
--

CREATE TABLE IF NOT EXISTS `tamanomedio` (
  `idTamanomedio` int(11) NOT NULL AUTO_INCREMENT,
  `Tamanomedio` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idTamanomedio`),
  KEY `Tamanomedio` (`Tamanomedio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tamanomedio`
--

INSERT INTO `tamanomedio` (`idTamanomedio`, `Tamanomedio`, `orden`, `estado`) VALUES
(1, 'Carta', 1, 1),
(2, 'Oficio', 2, 1),
(3, 'A4', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoaudiencia`
--

CREATE TABLE IF NOT EXISTS `tipoaudiencia` (
  `idTipoaudiencia` int(11) NOT NULL AUTO_INCREMENT,
  `Tipoaudiencia` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idTipoaudiencia`),
  KEY `Tipoaudiencia` (`Tipoaudiencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipoaudiencia`
--

INSERT INTO `tipoaudiencia` (`idTipoaudiencia`, `Tipoaudiencia`, `orden`, `estado`) VALUES
(1, 'Informáticos', 1, 1),
(2, 'Administradores, Contadores, Financieros, Auditores, etc.', 2, 1),
(3, 'Informáticos, Administradores de Sistemas, Desarrolladores', 3, 1),
(4, 'Biólogos', 4, 1),
(5, 'Geólogos', 5, 1),
(6, 'Programadores', 6, 1),
(7, 'Científicos', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodemedio`
--

CREATE TABLE IF NOT EXISTS `tipodemedio` (
  `idTipodemedio` int(11) NOT NULL AUTO_INCREMENT,
  `Tipodemedio` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idTipodemedio`),
  KEY `Tipodemedio` (`Tipodemedio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipodemedio`
--

INSERT INTO `tipodemedio` (`idTipodemedio`, `Tipodemedio`, `orden`, `estado`) VALUES
(1, 'Libro', 1, 1),
(2, 'Revista', 2, 1),
(3, 'Almanaque', 3, 1),
(4, 'Directorio', 4, 1),
(5, 'Enciclopedia', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodemovimiento`
--

CREATE TABLE IF NOT EXISTS `tipodemovimiento` (
  `idTipodemovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Tipodemovimiento` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `operacion` tinyint(4) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipodemovimiento`),
  KEY `Tipodemovimiento` (`Tipodemovimiento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipodemovimiento`
--

INSERT INTO `tipodemovimiento` (`idTipodemovimiento`, `Tipodemovimiento`, `operacion`, `orden`, `estado`) VALUES
(1, 'INGRESO', 1, 1, 1),
(2, 'GASTO', 0, 2, 1),
(3, 'DI PRESTADO', 0, 3, 1),
(4, 'PEDI PRESTADO', 1, 4, 1),
(5, 'PAGUE LO PRESTADO', 0, 5, 1),
(6, 'ME PAGARON LO PRESTADO', 1, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificador`
--

CREATE TABLE IF NOT EXISTS `tipoidentificador` (
  `idTipoidentificador` int(11) NOT NULL AUTO_INCREMENT,
  `Tipoidentificador` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idTipoidentificador`),
  KEY `Tipoidentificador` (`Tipoidentificador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipoidentificador`
--

INSERT INTO `tipoidentificador` (`idTipoidentificador`, `Tipoidentificador`, `orden`, `estado`) VALUES
(1, 'ISBN', 1, 1),
(2, 'ISSN', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoocupacion`
--

CREATE TABLE IF NOT EXISTS `tipoocupacion` (
  `idTipoocupacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `Tipoocupacion` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idTipoocupacion`),
  KEY `Tipoocupacion` (`Tipoocupacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipoocupacion`
--

INSERT INTO `tipoocupacion` (`idTipoocupacion`, `Tipoocupacion`, `orden`, `estado`) VALUES
(1, 'OFICIO', 1, 1),
(2, 'TECNICO', 2, 1),
(3, 'PROFESIONAL', 3, 1),
(4, 'NO DISPONIBLE', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE IF NOT EXISTS `tratamiento` (
  `idTratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `Tratamiento` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `idContacto` smallint(6) NOT NULL,
  `idContacto1` smallint(6) NOT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `Tratamientodetalle` int(11) DEFAULT '0',
  `estado` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTratamiento`),
  KEY `Tratamiento` (`Tratamiento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`idTratamiento`, `Tratamiento`, `idContacto`, `idContacto1`, `fechainicio`, `fechafin`, `Tratamientodetalle`, `estado`) VALUES
(1, 'Terapia Clozapina', 3, 4, '2009-01-01', '0000-00-00', 0, 1),
(2, 'Colesterol y Trigliceridos, Dislipemia', 3, 1, '2010-08-24', '2010-09-24', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientodetallegrid`
--

CREATE TABLE IF NOT EXISTS `tratamientodetallegrid` (
  `padre` int(11) NOT NULL,
  `correlativo` char(11) COLLATE latin1_general_ci NOT NULL,
  `Tratamiento` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `dosis` double(4,2) NOT NULL,
  `frecuencia` smallint(6) NOT NULL,
  PRIMARY KEY (`padre`,`correlativo`),
  KEY `Tratamiento` (`Tratamiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `tratamientodetallegrid`
--

INSERT INTO `tratamientodetallegrid` (`padre`, `correlativo`, `Tratamiento`, `dosis`, `frecuencia`) VALUES
(1, '00000000001', 'Clozapina, Leponex', 2.00, 24),
(1, '00000000002', 'Valpakine, Acido Valproico', 2.00, 12),
(2, '00000000001', 'Atorvastatina', 1.00, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionmedio`
--

CREATE TABLE IF NOT EXISTS `ubicacionmedio` (
  `idUbicacionmedio` int(11) NOT NULL AUTO_INCREMENT,
  `Ubicacionmedio` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `estante` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nivel` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idUbicacionmedio`),
  KEY `Ubicacionmedio` (`Ubicacionmedio`),
  KEY `estante` (`estante`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ubicacionmedio`
--

INSERT INTO `ubicacionmedio` (`idUbicacionmedio`, `Ubicacionmedio`, `estante`, `nivel`, `orden`, `estado`) VALUES
(1, 'Librera 1, Estante 1, Nivel 1', '1', '1', 1, 1),
(2, 'Revistero de Escritorio Negro', '1', '1', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `idUnidad` int(11) NOT NULL AUTO_INCREMENT,
  `Unidad` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `idUnidad1` int(11) DEFAULT NULL,
  `asesor` smallint(6) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT '1',
  PRIMARY KEY (`idUnidad`),
  KEY `Unidad` (`Unidad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `Unidad`, `idUnidad1`, `asesor`, `orden`, `estado`) VALUES
(1, 'No Tiene', NULL, NULL, 1, 1),
(2, 'Socios', 1, 0, 2, 1),
(3, 'Presidencia', 2, 0, 4, 1),
(4, 'Vice Presidencia', 3, 0, 5, 1),
(5, 'Asesoría Financiera', 4, 1, 12, 1),
(6, 'Asesoría Técnica', 4, 1, 11, 1),
(7, 'Contabilidad', 4, 0, 13, 1),
(8, 'Finanzas', 4, 0, 14, 1),
(9, 'Planilla', 1, 0, 3, 1),
(10, 'Recursos Humanos', 4, 0, 10, 1),
(11, 'Contratación de Personal', 10, 0, 15, 1),
(12, 'Prestaciones', 10, 0, 18, 1),
(13, 'Uniformes', 10, 0, 17, 1),
(14, 'Permisos, Marcación, Puentes y Feriados', 10, 0, 16, 1),
(15, 'Comunicaciones', 4, 0, 9, 1),
(16, 'Ventas', 4, 0, 8, 1),
(17, 'Importación y Exportación', 16, 0, 19, 1),
(18, 'Ventas Nacionales', 16, 0, 20, 1),
(19, 'Ventas Internacionales', 16, 0, 21, 1),
(20, 'Administración General', 4, 0, 7, 1),
(21, 'Logística', 20, 0, 25, 1),
(22, 'Archivo', 20, 0, 24, 1),
(23, 'Mantenimiento', 20, 0, 23, 1),
(24, 'Bodega', 20, 0, 22, 1),
(25, 'Informática', 4, 0, 6, 1),
(26, 'Gerencia de Producción', 25, 0, 26, 1),
(27, 'Gerencia de Desarrollo', 25, 0, 27, 1),
(28, 'Gerencia de Soporte Técnico', 25, 0, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nombre1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nombre2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `apellido1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `apellido2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `contrasena` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `idSexo` smallint(6) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `Usuario` (`Usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Usuario`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `contrasena`, `email`, `idSexo`, `idNivel`, `orden`, `estado`) VALUES
(1, 'MFUENTES', 'MAURICIO', 'VLADIMIR', 'FUENTES', 'SALGUERO', '4711c5cd8be28255021bad0bdf153491', 'mvfuentes@gmail.com', 1, 5, 1, 1),
(3, 'LILI_HERNANDEZ_29', 'ILEANA', 'PATRICIA', 'HERNáNDEZ', 'HERNáNDEZ', '5a829ed37952d34491c5d7dad77dee58', 'lili_hernandez_29@yahoo.com', 2, 3, 2, 1),
(4, 'A_JOLIE', 'ANGELINA', NULL, 'JOLIE', NULL, '4711c5cd8be28255021bad0bdf153491', 'mvfuentes@gmail.com', 2, 4, 3, 1),
(5, 'B_PITT', 'BRAD', NULL, 'PITT', NULL, '3ae9df0f4e18f9fef3633c66defd7d49', 'mvfuentes@gmail.com', 1, 4, 4, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
