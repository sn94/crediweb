-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-05-2020 a las 07:15:44
-- Versión del servidor: 5.7.30
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientez_creditos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientez`
--

CREATE TABLE `clientez` (
  `nroreg` int(10) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '',
  `cedula` int(10) NOT NULL DEFAULT '0',
  `apellidos` varchar(40) NOT NULL DEFAULT '',
  `nombres` varchar(40) DEFAULT NULL,
  `est_civil` char(1) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `salario` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `domicilio` varchar(80) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `trabajo` varchar(30) DEFAULT NULL,
  `teletrabajo` varchar(20) DEFAULT NULL,
  `monto` int(10) NOT NULL,
  `monto_a` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `observacion` text,
  `fecha_alta` date NOT NULL,
  `fecha_a_r` date NOT NULL,
  `vendedor` int(10) UNSIGNED NOT NULL,
  `foto1` text,
  `foto2` text,
  `retirado` char(1) NOT NULL DEFAULT 'N',
  `empresa` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientez`
--

INSERT INTO `clientez` (`nroreg`, `estado`, `cedula`, `apellidos`, `nombres`, `est_civil`, `telefono`, `celular`, `salario`, `domicilio`, `ciudad`, `trabajo`, `teletrabajo`, `monto`, `monto_a`, `observacion`, `fecha_alta`, `fecha_a_r`, `vendedor`, `foto1`, `foto2`, `retirado`, `empresa`) VALUES
(1, 'A', 847673, 'Urunaga', 'Carlos Delfin', 'S', '224470', '0991325378', 5019193, 'Isla Aranda c/ Calle I 290', 'ASUNCION', 'Municipalidad de Asuncion', '224-470', 6000000, 6000000, ' ', '2020-04-14', '2020-04-14', 49941691, '../cedulas-fotos/ced-anverso-847673.jpeg', '../cedulas-fotos/ced-reverso-847673.jpeg', 'S', 0),
(2, 'A', 890041, 'HERMOSA DE FLEITAS', 'ANTONIA', 'C', 'NO TIENE', '0994142609', 5499000, 'PADRE LANDAIRE Y SAN MARTIN', 'ASUNCION', '1-MSP Y BS 2-JUB. CAJA MUNIC.', '021509450', 5000000, 5000000, ' ', '2020-04-17', '2020-04-17', 5340173, NULL, NULL, 'S', 0),
(3, 'R', 3522974, 'BENITEZ TORRES', 'CARLOS SANTOS ', 'C', 'NO TIENE', '09862177925', 4579285, 'INDEPENDENCIA NACIONAL C/ BICENTENARIO ', 'Areguá', 'ACADEMIA MILITAR ', '0228362688', 6000000, 0, ' TIENE INHIBICIÓN EN TU FINANCIERA ', '2020-04-17', '2020-04-17', 6003421, NULL, NULL, 'N', 0),
(4, 'A', 2203416, 'CABRAL', 'VICTOR MANUEL', 'C', 'NO TIENE', '0994 355 391', 4116000, 'CENTENARIO Y PRIMERO DE MARZO 232', 'Lambaré', 'MINISTERIO DE HACIENDA', '021 451 928', 7000000, 7000000, ' ', '2020-04-17', '2020-04-17', 5535070, NULL, NULL, 'S', 0),
(5, 'A', 1202405, 'ARCE PERALTA', 'MARTIN ', 'C', 'NO TIENE', '0971686932', 4400000, 'JUAN SINFORIANO BOARIN Nº9999 Y EMILIO R. FERNANDEZ', 'ASUNCION', '1- UAA 2-MEC', '*495873 *503012/15', 2000000, 2000000, ' ', '2020-04-17', '2020-04-17', 5340173, NULL, NULL, 'S', 0),
(6, 'A', 653600, 'Ramirez', 'Jacinto ', 'C', 'No tiene', '0976362259', 4118819, 'Avda. De la Victoria y tajy Bo. Reducto', 'Asunción ', 'Municipalidad de Asunción ', '224 470 / 863563', 5000000, 5000000, ' ', '2020-04-17', '2020-04-17', 5389877, NULL, NULL, 'S', 0),
(7, 'A', 1219148, 'Aranda Blaires ', 'Maria Mercedes ', 'S', 'No tiene ', '0994753958', 7700500, 'Carlos Antonio Lopez 1687 C/ Gobernador Irala ', 'Sajonia', 'San Ignacio de Ayolas S.A ', '021295870', 5000000, 5000000, ' ', '2020-04-17', '2020-04-17', 6003421, NULL, NULL, 'S', 0),
(8, 'A', 1356392, 'Palacio Amarilla', 'Hugo Andres', 'S', 'NO TIENE', '0972 883 353', 2915000, 'Avda sn Miguel c/ Carlos Gatti nro 331', 'San Lorenzo', 'Pyroy S.A ( Luminotecnia )', '249 2000', 3000000, 3000000, ' ', '2020-04-17', '2020-04-17', 5535070, NULL, NULL, 'S', 2),
(9, 'A', 846773, 'Diaz Romero ', 'Olga', 'S', 'No tiene ', '0961451589', 2692800, 'Defensores del Chaco 9999 e/ Ypacarai ', 'Villa Elisa', 'Iglesia Bautista Villa Morra ', '600020', 3000000, 2000000, ' ', '2020-04-17', '2020-04-17', 6003421, NULL, NULL, 'S', 1),
(10, 'A', 2339921, 'CHAVEZ ARRIOLA', 'GLADYS MABEL', 'S', '964-439', '0981593803', 2000, 'FRATERNAL C/ AMAMBAY 940', 'Ñemby', 'MEC', '0972482119', 2500000, 2500000, ' ', '2020-04-17', '2020-04-17', 8331406, NULL, NULL, 'S', 2),
(11, 'A', 2515362, 'Notario', 'Zunilda Francisca', 'S', '943462', '0961994854', 7500, 'Chacore casi 18 de junio N° 313', 'Lambaré', 'DORAL S.A', '673181', 10000, 10000000, ' ', '2020-04-17', '2020-04-17', 4721327, NULL, NULL, 'S', 0),
(12, 'A', 2551347, 'Ruiz Diaz Suarez', 'Juan Carlos', 'S', 'No tiene', '0983497783', 7800000, 'Campo vía No. 958 Bo. Caaguazu', 'Asuncion', 'Patia S.A. de Seguro y Reasegu', '225 256 / 225 250', 3000000, 3000000, ' ', '2020-04-17', '2020-04-20', 5389877, NULL, NULL, 'S', 0),
(13, 'R', 910552, 'Ferreira', 'Inocencio', '0', '971946397', '971946397', 4000000, 'Capitán Martínez casi tte eladio escobar número de casa 2516', '', '', '', 2000000, 0, '   Esta persona ya es cliente en la firma tiene un credito activo de 3.000.000 que esta pagando 3/12. La Dra le pidio Garante. cliente no quiere', '2020-04-17', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(14, 'R', 1453059, 'AMARILLA', 'FLORENCIO ', '0', '0981267924', '0981267924', 0, 'DDD', '', 'MUNC DE SAN BERNANRDINO', '', 2000000, 0, '  tiene 2 operaciones morosas , 1 NEXO : 20.640.000, 1 SOLAR: 5.843.040', '2020-04-18', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(15, 'A', 853389, 'Jacobo Morel', 'Carlos Edgar', 'C', '930 762', '0981286066', 4481900, 'Hungia (ex Sta Rosa) c/ calle Ñemby No.2323', 'Asunción ', '1- Facultad CIencias Medicas ', '420982', 6000000, 6000000, ' ', '2020-04-18', '2020-04-20', 5389877, NULL, NULL, 'S', 0),
(16, 'R', 1238191, 'ZIRTAEB', 'OTTAM ', '0', '0992885401', '', 0, '1', '', 'ESCUELA PERPETUO SOC', '', 2000000, 0, '  tiene 2 demandas y 1 operacion morosa', '2020-04-18', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(17, 'A', 6044586, 'PALACIO', 'FERNANDO ', '0', '0985794938', '', 0, '1', '', 'PARAGUAY LANW TENNIS CLUB', '', 7000000, 1000000, 'aprobo DRA . Hasta 1.000.000 a sola firma, cliente quedo en avisar si retirara', '2020-04-18', '2020-04-23', 1574855, NULL, NULL, 'N', 0),
(18, 'A', 1298359, 'VEGA', 'LUCIA ', '0', '0992437410', '', 0, '1', '', 'JOB LOGISTICA', '', 2000000, 2000000, ' ', '2020-04-18', '2020-04-20', 1574855, NULL, NULL, 'S', 0),
(19, 'R', 8606268, 'Portillo', 'Herminia Magdalena', '0', '0994278601', '', 0, '1', '', '', 'INDEPENDIENTE', 5000000, 0, ' Paso Garante Aldo Silva , el mismo tiene 3 operaciones morosas, buscara otro garante.20/04  .  28/04 Desistio, su garante no respondia las llamadas ni los mensajes ', '2020-04-18', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(20, 'R', 4521119, 'SOSA', 'ALDO ', '0', '0994264299', '', 0, 'GARANTE DE PORTILLO HERMINIA', '', 'CAVALLARO', '', 1, 0, '  tiene 3 operaciones morosas', '2020-04-18', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(21, 'R', 4962952, 'BAEZ', 'NILSA ', '0', '0981302536', '', 0, '1', '', 'COPETIN COLMAN SRL', '', 2000000, 0, '  tiene 1 operacion morosa en Bco Familiar Gs. 9.000.000 ', '2020-04-18', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(22, 'R', 3504936, 'ROMAN', 'EDUARDO ', '0', '0981633153', '', 0, '1', '', 'REPARTIDOR DE AGUA', 'INDEPENDIENTE', 1000000, 0, 'rechazado por malas referencias comerciales por Dra - Scoring M ', '2020-04-18', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(23, 'P', 3550485, 'Estigarribia', 'Luis Maria', '0', '0984621411', '', 0, '1', '', 'Facultad unasur', '', 2000, 0, 'No tiene IPS, le pedi garante y dijo que buscara 22/04', '2020-04-20', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(24, 'R', 1293487, 'MERCADO', 'JORGE ', '0', '0971543630', '', 0, '1', '', 'JMC S.A', '', 10000000, 0, 'rechazado por Dra por no tener referencias comerciales y sin IPS, y por X de la Sra.  tiene SCORING K, no tiene IPS, Dra pidio que se procese.', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(25, 'A', 3838598, 'AQUINO', 'LUCIANO ', '0', '0983156925', '', 0, '1', '', 'CLUB SOL DE AMERICA', '', 2000000, 2000000, '  ok por Dra', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'S', 0),
(26, 'A', 854693, 'Bogado Aquino', 'Graciela Beatriz  ', '0', '0983214890', '', 0, '1', '', 'Peluqueria unicex', 'INDEPENDIENTE', 10000000, 3000000, 'ok con garante ', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'S', 0),
(27, 'P', 616534, 'ALLENDE SEGOVIA', 'JULIAN', 'C', 'NO TIENE ', '0994428590', 4544911, 'SARGENTP MARTINEZ Y TTE ERNESTO', 'TRINIDAD ', 'RETIRADO DE LA F.F. A.A', 'NO TIENE ', 6000000, 0, 'debe de Abonar la cuota Pendiente en la Cooperativa San Francisco    las 5 cuotas. Y Buscar un buen garante. ', '2020-04-20', '2020-04-24', 6003421, NULL, NULL, 'N', 2),
(28, 'R', 1311924, 'OJEDA', 'TERESA', '0', '0993343603', '', 0, '1', '', 'DESPENSA', 'INDEPENDIENTE C. RUC', 5000000, 0, ' Dra. pidio garante ,la cliente dice que no va a poder conseguir .', '2020-04-20', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(29, 'P', 3875926, 'LOBO', 'RAMON ', '0', '0981384445', '', 0, '1', '', 'FUNCIONARIO DE LA UNA', '', 1500000, 0, ' CI: 1.875.926, el cliente tiene una demanda con la Cooperativa San Lorenzo , le consulte sobre operacion y no responde aun.', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(30, 'P', 5102330, 'Dure villamayor', 'Arnaldo ', '0', '0972288500', '', 0, '1', '', 'Empresa de telefonia personal ', '', 2000000, 0, '  No tiene IPS, 7 meses de antiguedad', '2020-04-20', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(31, 'A', 2938141, 'DIAZ ZARACHO', 'ALFREDO ', '0', '0982969045', '0982 969045', 0, 'NN', 'ASUNCION', 'SIT PY', '', 2000000, 2000000, ' ', '2020-04-20', '2020-04-20', 1574855, NULL, NULL, 'S', 0),
(32, 'A', 1008181, 'SIOLIAN ARAUJO', 'EDUARDO', '0', '0983741111', '0981103828', 0, 'NNN', 'ASUNCION', 'IMPORTADORA AVENIDA S.A', '', 5000000, 5000000, ' ', '2020-04-20', '2020-04-20', 1574855, NULL, NULL, 'S', 0),
(33, 'R', 3647773, 'FERREIRA', 'JOSE ', '0', '0982714261', '', 0, '1', '', 'POLICIA NACIONAL', '', 2000000, 0, 'Rechazdo por malas referencias comerciales,  tiene Scoring M, 1 operacion morosa en Claro.', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(34, 'R', 2039088, 'Vega Dure', 'Alcides salvador ', '0', '0981400784', '', 0, '1', '', 'Todo brasileros S.A.', '', 5000000, 0, '  Tiene 10 operaciones morosas en informconf', '2020-04-20', '2020-04-21', 1574855, NULL, NULL, 'N', 0),
(35, 'R', 4079330, 'RODRIGUEZ', 'MIRIAN ', '0', '0972569670', '', 0, '1', '', 'MCDONALS', '', 1000000, 0, '   22/04 Dra le pidio garante , por antiguedad y liquidacion , 28/04, la cliente dice que no podra conseguir el garante ', '2020-04-21', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(36, 'P', 3019350, 'Flores Ríos ', 'Francisco ', '0', '0982439370', '', 0, '1', '', 'técnico eléctric', 'Independiente ', 6000000, 0, ' la Dra le pidio garante , cliente no quiere', '2020-04-21', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(37, 'R', 3677341, 'ACEVEDO', 'ISRAEL ', '0', '0994614674', '', 0, '1', '', 'MUNICIPALIDAD ASUNCION', '', 3000000, 0, ' tiene 4 operaciones morosas y una demanda', '2020-04-21', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(38, 'A', 1683154, 'Fernández', 'Mario', '0', '0982719018', '', 2192, 'Pedro J Carles/las residentas', 'San Lorenzo', '', '', 2000000, 2000000, ' ', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'S', 0),
(39, 'R', 7082666, 'Benitez Garcia ', 'Derlis Guadalupe', '0', '0981259877', '', 2192, 'Domingo sabio', 'San Lorenzo', '', '', 2000000, 0, '  Dra. pidio que se le procese, y un garante, cliente no quiere. 28/04 Desisitio , no quiere conseguir garante,  y tambien dice que no tiene documentos de su trabajo', '2020-04-21', '2020-04-28', 5360272, NULL, NULL, 'N', 0),
(40, 'R', 5589384, 'Dure ayala', 'Cristian david', '0', '972639346', '', 4500, 'Capinbado y san migel', 'Ñenby mbocayaty', '', '', 2000000, 0, ' tiene 2 aportes en IPS, Dra le pidio garante y no quiere, entonces se le rechazo', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(41, 'P', 5565458, 'Gonzalez gonzalez', 'Regina', '0', '991840563', '', 2392, 'Jardin de pariz', 'Luque', '', '', 1000000, 0, NULL, '2020-04-21', '0000-00-00', 5360272, NULL, NULL, 'N', 0),
(42, 'R', 4098532, 'Maldonado', 'Pedro', '0', '992980524', '', 2192, 'Paraguari y florencio villamayor', 'Asunción', '', '', 2000000, 0, ' tiene 1 operacion morosa en NEXO, no tiene comprobantes de pago, tiene 4 aportes en IPS', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(43, 'R', 6105790, 'Recalde Moraes', 'Alberto Ramon', '0', '981433079', '', 2150, 'Nuflo de chaves c/ cala,a', 'Asunción', '', '', 1500000, 0, ' trabajá en MKT S.R.L. , TIENE 3 operaciones morosas, dice que no esta pudiendo pagar sus operaciones morosas, tiene 11 aportes en IPS', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(44, 'R', 2359336, 'Arzamendia Soler', 'María Cristina', '0', '986793802', '', 2600, 'Caacupemí', 'Aregua', 'Hotel Sheraton', '', 3000000, 0, '  tiene Scoring M, Dra le pidio garante y titular no quiere. ', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(45, 'R', 5116619, 'Echeverria arce', 'Fabrizzio david', '0', '991930621', '', 2040, 'Gervasio leon', 'Mariano roque alonso', 'Grupo crisma', '', 2000000, 0, ' tiene 8 meses de antiguedad es playero en GeneraL Santos S.A. , TIENE 1 operacion morosa en Chacomer , que el cliente dice que no esta pagando', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(46, 'R', 6005923, 'Escurra', 'Fernando', '0', '985548229', '', 3240, 'Urcisino Velasco', 'Asunción', 'Desarrolladora GG', '', 2500000, 0, ' TIENE 3 operaciones morosas en informconf, se el no esta pudiendo pagar , porque solo cobra el 50% de su salario', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(47, 'R', 4533896, 'Acosta', 'virgilio', '0', '994896179', '', 2192, 'aregua', 'Aregua', 'jade park', '', 5000000, 0, ' Dra . solicito si o si garante, el cliente no quiere, tiene 8 aportes en IPS', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(48, 'R', 5516278, 'Rivas', 'Cesar', '0', '992751916', '', 2192, '40 proyectada y japon', 'Asuncion', 'ConsorcioPot?', '', 5000, 0, ' solo quiere 5.000.000, tiene 15 aportes , el cliente no quiere garante , gana sueldo minimo, la Dra dijo con garante o rechazado', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(49, 'P', 3785217, 'Ayala', 'Isidora', '0', '986553516', '', 1800, 'Carandayty c/ asuncion', 'Lambare', 'Recidencia Zermatt', '', 1000, 0, ' la Dra solicito garante cliente no contesta, los mensajes ni la llamada', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(50, 'R', 5149869, 'Penayo', 'Antonio', '0', '981811188', '', 2300000, 'Asunción', 'Villa Hayes (Remansito)', 'Envapar', '', 2000, 0, ' tiene 1 operacion morosa en informconf , no esta pagando , tiene 1 año 6 meses de antiguedad', '2020-04-21', '2020-04-22', 5360272, NULL, NULL, 'N', 0),
(51, 'R', 4849254, 'Martinez García', 'Cristhian  ', '0', '0991901524', '', 0, '1', '', 'Direcion de vialidad ', '', 10000000, 0, ' tiene 3 cuotas vencidas en varias entidades', '2020-04-21', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(52, 'R', 2896133, 'palma benitez', 'Julio cesar ', '0', '0971974358', '', 0, '1', '', 'G4S Wackenhut', '', 2000000, 0, ' tiene Scoring X, 2 demandas activas, que segun el cliente no esta pagando', '2020-04-21', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(53, 'R', 3496763, 'Vallejos', 'Lilian', '0', '0992506881', '', 0, '1', '', 'Plastimar icsa', '', 10000000, 0, ' cliente tiene un juicio activo en Triton el cual se le esta embargando recien el capital, tiene 2 demandas y 9 operaciones morosas', '2020-04-22', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(54, 'R', 5458013, 'Garozzo', 'Deyanira', '0', '0982791364', '', 0, 'Garante de Lilian Vallejos', '', 'CJX DISTRIBUIDORA DE JUGUETES', '', 0, 0, ' se rechazo a la titular', '2020-04-22', '2020-04-22', 1574855, NULL, NULL, 'N', 0),
(55, 'A', 2065201, 'Sosa Cardozo', 'Victor', 'S', '451-728', '0982220678', 6000000, 'Conavi', 'ASUNCION', 'Mercopar S.A.', '451-728', 8000000, 8000000, ' ', '2020-04-22', '2020-04-23', 49941691, NULL, NULL, 'N', 4),
(56, 'A', 522663, 'Campos Britez', 'Manuel', 'C', '584-336', '0984432228', 8800000, 'San Lorenzo', 'San Lorenzo', 'Jub Policial', '584-336', 4000000, 4000000, ' ', '2020-04-22', '2020-04-22', 49941691, NULL, NULL, 'S', 0),
(57, 'A', 1063392, 'Vila Cubilla ', 'Hector ', 'C', 'No tiene', '0981483019', 4000000, '20 Pydas y antequera ', '', 'Diario Ultima Hora', '496261', 7000000, 7000000, '   ', '2020-04-22', '2020-04-23', 4721327, NULL, NULL, 'S', 0),
(59, 'A', 1436811, 'Bobadilla Mendieta ', 'Fabio Ruben', 'S', 'No tiene ', '0981171630 ', 4788991, 'De los ríos esquina central', 'San Antonio ', 'Hospital Materno/ Ips', '582326/ 227612', 5000000, 5000000, ' ', '2020-04-22', '2020-04-22', 4721327, NULL, NULL, 'N', 0),
(60, 'A', 985378, 'Leon Ortiz', 'Nelson Raul', 'S', '0226 262 619', '0971 977 1965', 3000000, 'Mcal Estigarribia c/ curupayty 5468', 'Villa Hayes', 'Munic Villa Hayes', '0226 262 220', 1000000, 1000000, ' ', '2020-04-22', '2020-04-22', 5535070, NULL, NULL, 'S', 1),
(61, 'A', 993731, 'SERVIAN NUÑEZ', 'JULIO CESAR', 'S', 'NO TIENE', '972479794-982276413', 2275, 'ELIZARDO AQUINO 769 KM 17 ', 'Mariano Roque Alonso', 'IMPRENTA MODELO', '493-438/9', 1500000, 1500000, ' ', '2020-04-22', '2020-04-22', 8331406, NULL, NULL, 'S', 2),
(62, 'A', 1611601, 'ROMERO ORTIZ', 'GILBERTO ', 'S', 'NO TIENE ', '0985481005', 14138250, 'CALLE MARTIN LEDESMA E/ PADRE FIDEL MAIZ ', 'Capiatá', 'FUERZA ARMADA ', '021296242', 15000000, 15000000, ' ', '2020-04-22', '2020-04-24', 6003421, NULL, NULL, 'S', 2),
(63, 'P', 1160821, 'Ramírez', 'Enrique', '0', '0981229884', '', 4500000, '1', '', 'Sr cell electrodomésticos', '', 1000000, 0, ' 23/04  tiene 16 aportes, la Dra le pidio garante , 29/04 sigue buscando garante .', '2020-04-22', '2020-04-29', 1574855, NULL, NULL, 'N', 0),
(64, 'R', 3673653, 'Osorio', 'Aida', '0', '0991203256', '', 0, '1', '', 'Justicia electoral', '', 5000000, 0, '  Cliente desisitio, tiene Operacion morosa en Bristol, Scoring M, dice que no esta pagando, tampoco tiene liquidacion de salarios para presentar', '2020-04-23', '2020-04-24', 1574855, NULL, NULL, 'N', 0),
(65, 'P', 5350268, 'Verza Servin', 'María del Carmen ', '0', '0991898241', '', 0, '1', '', 'en cevima', '', 5000000, 0, ' tiene 2 aportes en IPS, scoring L 24/04', '2020-04-24', '2020-04-24', 1574855, NULL, NULL, 'N', 0),
(66, 'A', 3566657, 'Benitez Gaona', 'Nancy Concepcion', 'S', '752881', '0985891718', 6277554, 'Don Spell y Club 24 de Setiembre', 'Limpio', 'Hospital Materno Infantil', '752-881', 15000000, 10000000, ' debe pagar 2 cuotas en creditotal , presentar comprobante de pago, OK Con garante ', '2020-04-24', '2020-04-24', 49941691, NULL, NULL, 'S', 0),
(67, 'A', 846444, 'Alvarenga de Rojas', 'Ninfa Saturnina', 'C', 'No tiene', '0994 604 194', 8205042, 'Arellano y Trujillo 7066', 'Asunción', 'Hospital de Quemado', '227 554', 10000000, 10000000, ' ', '2020-04-24', '2020-04-24', 5535070, NULL, NULL, 'N', 2),
(68, 'R', 2091993, 'Lezcano Amarilla', 'Mauro Enrrique ', '0', '0992873930', '', 0, '1', '', 'Puerto Caacupemi. Jerovia S.A', '', 3000000, 0, '  27/04, se le pidio garante por malas referencias comerciales. 29/04 Desisitio no quiere garante y no esta pudiendo abonar las cuotas atrasadas', '2020-04-24', '2020-04-29', 1574855, NULL, NULL, 'N', 1),
(69, 'A', 739200, 'VERGARA GIMENEZ', 'ANDRES AVELINO', 'C', 'NO TIENE', '0974116604', 5044734, 'PAZ DEL CHACO N°353 C/ RAMOS ALFARO', 'ASUNCION', 'PRE-MEDIC S.A.', '5694000', 4000000, 4000000, ' ', '2020-04-24', '2020-04-24', 5340173, NULL, NULL, 'S', 2),
(70, 'P', 2967185, 'Rojas Urunaga', 'Adelaida  ', '0', '0992297769', '', 0, '1', '', 'CASA DE FAMILIA', '', 5000000, 0, '  25/04 Es empleada domestica , tiene  Scoring K, tiene 18 aportes en IPS, buscara garante, presento a la pareja, tiene scoring X, por 1 demanda y 5 operaciones morosas. ', '2020-04-24', '2020-04-27', 1574855, NULL, NULL, 'N', 0),
(71, 'R', 5701466, 'DUARTE', 'CRISTIAN ', '0', '0976682498', '', 0, '1', '', 'SANITARIA', '', 2000000, 0, ' 25/04 trabaja en Instalaciones Sanitarias de Miguel Ortega. Scoring X por 3 operaciones morosas en informconf , que no esta pagando segun el', '2020-04-24', '2020-04-25', 1574855, NULL, NULL, 'N', 0),
(72, 'P', 4660786, 'Ocampos Ayala', 'Lourdes Paola ', '0', '0986697397', '', 0, '1', '', 'Electrojet', '', 5000000, 0, ' 25/4 , tiene 19 aportes en IPS, scoring L, me dijo que la chica ya le pidio garante y que estara  avisando. ', '2020-04-24', '2020-04-25', 1574855, NULL, NULL, 'N', 0),
(73, 'P', 2128956, 'Maidana ', 'Cristian ', '0', '0983595392', '', 0, '1', '', 'VIDRIERÍA ', 'INDEPENDIENTE', 10000000, 0, ' 25/4 . tiene una operacion morosa en NEXO , por valor de Gs. 2.300.000,  dice que va a buscar garante , y que tambien tiene el comprobante de pago de la op morosa', '2020-04-24', '2020-04-25', 1574855, NULL, NULL, 'N', 0),
(74, 'P', 4470595, 'Riveros Battilana', 'Juan Mathias ', '0', '0986281652 ', '', 0, 'SU GTE. ES MIRNA BATTILANA', '', 'Taller mecanico particular ', '', 3000000, 0, '25/04 tiene Scoring J, buscara otro garante su mama tiene X con 2 operaciones morosas en Banco Familiar', '2020-04-24', '2020-04-25', 1574855, NULL, NULL, 'N', 0),
(75, 'R', 2378197, 'BATTILANA CANO', 'MIRNA MICELLY ', '0', '0984827304', '', 0, 'GTE. DE JUAN RIVEROS', '', 'AUTOSERVICE EL SOL', '', 0, 0, ' rechazado como garante, no tiene IPS, y tiene 2 operaciones morosas en informconf con Banco Familiar, el titular no aporta IPS, ni tiene referencias comerciales', '2020-04-24', '2020-04-25', 1574855, NULL, NULL, 'N', 0),
(76, 'R', 5884176, 'BARRETO PEREIRA', 'CINTIA CAROLINA ', '0', '0991854954', '', 0, 'GARANTE DE PORTILLO HERMINIA', '', 'EMPRESA DE LIMPIEZA EL MEJOR', '', 0, 0, ' 28/04, ella no respondia llamadas, luego la titular desistio porque dice que consiguio en otro lugar a sola firma ', '2020-04-25', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(77, 'A', 2369429, 'Pereira', 'Diego ', '0', '0994216794', '', 0, 'depende del monto de la cuota podria variar y solicitar 2000000', '', 'Senacsa', '', 1500000, 0, '   25/4 tiene scoring K , pasa a proceso', '2020-04-25', '2020-04-27', 1574855, NULL, NULL, 'S', 0),
(78, 'P', 5201651, 'Rotela Vargas', 'Nestor ', '0', '0985371987', '', 0, '1', '', 'TYC', '', 10000000, 0, '25/04 tiene 9 aportes en IPS, dijo que buscara garante , el 28/04 no esta pudiendo conseguir, pero sigue buscando', '2020-04-25', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(79, 'R', 816451, 'LOPEZ', 'LUIS ', '0', '0991373420', '', 0, 'SU GTE. ES JUAN LOPEZ', '', 'POLICIA INTERPOL', '', 10000000, 0, ' 29/04 . rechazado por Dra, tiene 3 demandas y 1 operacion morosa , su liquidacion es de 1.300.000', '2020-04-25', '2020-04-29', 1574855, NULL, NULL, 'N', 0),
(80, 'R', 4024644, 'LOPEZ AREVALO', 'JUAN LUIS ', '0', '0984768791', '', 0, 'GTE. DE LUIS LOPEZ', '', 'MUNICIPALIDAD DE ASUNCION', '', 0, 0, '  25/4 tiene Scoring L. rechazado al titular, el garante tiene de liquidacion 1.800.000', '2020-04-25', '2020-04-29', 1574855, NULL, NULL, 'N', 0),
(81, 'A', 5072062, 'Delgado', 'Ana Karina ', '0', '0984745952', '', 0, '1', '', 'Shantal s.a', '', 5000000, 1500000, '  25/04 tiene Scoring J , y tiene 17 aportes, cliente no esta contestando', '2020-04-25', '2020-04-28', 1574855, NULL, NULL, 'S', 0),
(82, 'R', 827091, 'Garcete de Cañete', 'Maria Graciela ', '0', '0982494409', '', 0, '1', '', 'Jubilada de copaco', '', 2500000, 0, '   25/04 tiene scoring K, es Jubilada de IPS, tiene 63 años, su liquidacion es de 1.600.000, no quiere garante , dice que el unico que le puede firmar es su marido , que tiene una despensa. Pide 15.000.000. Dra rechazo porque la cliente no quiere otro garante ', '2020-04-25', '2020-04-29', 1574855, NULL, NULL, 'N', 0),
(83, 'A', 3773289, 'Soria rodriguez', 'Carmen paola', '0', '0991903641', '', 2139, 'Villa elisa, San juan', '', 'Hospital distrital villa elisa', '', 6000000, 5000000, ' ', '2020-04-27', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(84, 'A', 637, 'Arevalos Molinas', 'Aristides', '0', '0991460533', '', 0, 'Trinidad	Mbocayaty', '', 'Ministerio del Interior', '', 3000000, 3000000, '   29/04 , tiene Scoring K , esta en proceso', '2020-04-27', '2020-04-29', 1574855, NULL, NULL, 'S', 0),
(85, 'P', 5025871, 'Jara Coronel', 'Juan Antonio', '0', '0984976641', '', 2300000, 'Chile y Bogota', 'Mariano Roque Alonso', '', '', 3000000, 0, NULL, '2020-04-27', '0000-00-00', 5360272, NULL, NULL, 'N', 0),
(86, 'R', 5586547, 'Alonzo Martinez', 'Ever Valentin', '0', '0982165681', '', 2192800, 'Calle sargento silva casi buenos aires', 'San Lorenzo', 'Corinto Sa', '', 2000000, 0, ' el cliente tiene 1 aporte en IPS, cuenta con 1 operacion morosa en NEXO', '2020-04-27', '2020-04-28', 5360272, NULL, NULL, 'N', 0),
(87, 'R', 4103961, 'Ramos estigarribia', 'Pablo ismael ', '0', '0983504572', '', 0, '1', '', 'Secretaria de emergencia nacio', '', 2000000, 0, ' 28/04, tiene 2 operaciones morosas en informconf y 1 demanda', '2020-04-27', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(88, 'R', 2317000, 'Cuevas ', 'Eugenio ', '0', '0992508934', '', 0, '1', '', 'Patriota sa', '', 3000, 0, '  28/04 , es Guardia de Seguridad, tiene 1operacion morosa y 1 demanda', '2020-04-28', '2020-04-28', 1574855, NULL, NULL, 'N', 0),
(89, 'A', 5209414, 'RUIZ DIAZ', 'PABLINA ', '0', '0986771771', '', 0, 'GTE ELIEZER GOMEZ ', '', 'MERCADO DE ABASTO', '', 10000000, 5000000, '  el garante debe ponerse al dia en Credisolucion y crediagil', '2020-04-28', '2020-04-30', 1574855, NULL, NULL, 'S', 4),
(90, 'A', 4861987, 'GOMEZ', 'ELIEZER ', '0', '0971262924', '', 0, 'ES GTE DE PABLINA', '', 'CEPACOOP LTDA', '', 0, 0, '  la dra le pidio que se ponga al dia con sus cuentas en Credi Agil y Credisolucion, despues para volver a presentar, ya pago  se le acepto como garante', '2020-04-28', '2020-04-30', 1574855, NULL, NULL, 'S', 0),
(91, 'P', 614261, 'OLAVARRIETA', 'JOSE', '0', '0981186636', '', 5458000, 'FDO LA MORA, SANTA MARIA', '', 'JUBILADO DE COPACO', '', 4000000, 0, ' 29/04 es Jub de IPS, no quiere garante. ', '2020-04-28', '2020-04-29', 1574855, NULL, NULL, 'N', 0),
(92, 'A', 2163466, 'Yahari', 'Ismael', 'C', '0533-33374', '0985-208270', 8000000, 'Ruta 1 km 56', 'yaguaron', 'Jub Policial', '0985208270', 5000000, 5000000, ' ', '2020-04-29', '2020-04-29', 49941691, NULL, NULL, 'S', 4),
(93, 'A', 1722850, 'Corrales', 'Manuel', 'C', '0981884771', '0981884771', 0, 'Via Ferrea 1421 c/ Cptan', '', 'Congreso Nacional', '414-4071', 3000000, 3000000, ' ', '2020-04-29', '2020-04-29', 49941691, NULL, NULL, 'S', 0),
(94, 'P', 2038118, 'DIAZ', 'RICHARD ABELARDO', 'C', 'NO TIENE', '0982778015', 17935705, 'GRAL. DIAZ N°2223 C/ LIMA', 'ASUNCION', 'ANCLA SRL', '021610090', 15000000, 0, NULL, '2020-04-29', '0000-00-00', 5340173, NULL, NULL, 'N', 0),
(95, 'A', 210390, 'Guillen Inchausti', 'Crispin ', '0', '0982243731', '', 0, '1', '', 'Empresa de transporte ttl', '', 5000000, 1000000, ' ', '2020-04-29', '2020-04-30', 1574855, NULL, NULL, 'N', 0),
(96, 'R', 3645465, 'Gonzalez', 'Christian', '0', '0984226185', '', 4200000, 'a', '', '', '', 3000000, 0, ' 30/04 rechazado por malas referencias comerciales , tiene 2 cuotas vencidas en crediagil.', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(97, 'P', 6796292, 'Moreno Ortiz', 'Richar Manuel', '0', '981213574', '', 0, 'san lorenzo', 'San Lorenzo', '', '', 2500000, 0, ' 30/04 llame al celular me dice que no le corresponde el numero', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(98, 'R', 4510240, 'Caceres', 'Noelia', '0', '984860226', '', 0, 'Cerca de antena claro', '', '', '', 1000000, 0, ' 30/04 es personal domestico , tiene 1 demanda que no esta pagando', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(99, 'R', 5115762, 'Galeano', 'Juan ramon', '0', '976599716', '', 0, 'Mariscal estigarribia c/primer presidente', '', '', '', 5000000, 0, ' 30/04 buscara garante. esta internado con problemas de salud', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(100, 'P', 3763050, 'Ayala Morales', 'Walter Santiago', '0', '972115109', '', 0, 'Saturnino Mereles 933 casi leonismo luqueño', 'Luque', '', '', 1000000, 0, ' 29/04 la Dra le pidio garante por alto endeudamiento. Gana Gs. 3.000.000 su deuda es de 3.500.000 (parcial) ademas tiene pedido de NEXO, pidio comprobante de pago. Le solicitamos esos datos al cliente y ya no esta respondiendo', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(101, 'P', 2649397, 'Gonzalez', 'Jose', '0', '985 272897', '', 0, 'a', '', '', '', 7000000, 0, ' 29/04, Dra dijo que el credito es para la hija, y el cliente dice que no podra pasar a retirar en caso que se le apruebe, vive en la ciudad de Santani', '2020-04-29', '2020-04-30', 5360272, NULL, NULL, 'N', 0),
(102, 'P', 1849571, 'bareiro alvarenga', 'Luis Alberto  ', '0', '0981760786', '', 0, '1', '', 'ips', '', 5000000, 0, NULL, '2020-04-30', '0000-00-00', 1574855, NULL, NULL, 'N', 0),
(103, 'A', 578963, 'Rivas Jara', 'Ricardo ', 'C', '426-243', '0983418190', 3000000, 'Diaz de Solis casi Guillermo Arias', 'Asuncion', 'Taxista', '420599', 1000000, 1000000, ' ', '2020-04-30', '2020-04-30', 49941691, NULL, NULL, 'S', 0),
(104, 'P', 2239035, 'Feltes vargas ', 'Porfirio ', '0', '0972883356', '', 0, '1', '', 'jubilado de la policia', '', 2000000, 0, NULL, '2020-05-02', '0000-00-00', 1574855, NULL, NULL, 'N', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioz`
--

CREATE TABLE `usuarioz` (
  `nroreg` int(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(60) DEFAULT NULL,
  `nombres` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipousuario` char(1) NOT NULL DEFAULT '',
  `observacion` text,
  `comision` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioz`
--

INSERT INTO `usuarioz` (`nroreg`, `cedula`, `usuario`, `pass`, `nombres`, `telefono`, `celular`, `email`, `tipousuario`, `observacion`, `comision`, `fecha_alta`) VALUES
(18, 5202694, 'carlos', '$2y$10$389S3vjEvjVIAoWXtW9FvuxTfUkhzjzO6b7ZCiocQrI85ivKhEYnK', 'Carlos Valente', '0981132188', '0981132188', 'valente.py@hotmail.com', 'S', 'usuario supervisor', 0, '2020-03-14'),
(32, 1684979, 'Vivi', '$2y$10$ZFonKkyQyyBSQcQbQBjlkufp5sr9xa6jV.u9ML8a4xnRYF8ZFfXta', 'Viviana Fuentes', '0981511869', '0981511869', '', 'S', '', 0, '2020-04-13'),
(33, 5360272, 'Rami', '$2y$10$3u6I1r0Fh7MqD2XBbf8xsebW66a7Wgygdw97gVHUjzmIOto4tisEu', 'Ramiro Lara', '0981712461', '0981712461', '', 'V', '', 0, '2020-04-13'),
(34, 1574855, 'Maga', '$2y$10$Gg1k03DoOaOIqLnSlQHmT.tFebsebc4sS8ACuPYNZ1pkGxFPKaliu', 'Magali Fuentes', '0981534567', '0981534567', '', 'V', '', 0, '2020-04-13'),
(35, 4994169, 'CEFM', '$2y$10$thQL3xx139r365PLjNZLu.bxZwMqo47Jq74/XoMo2LEXBLo/FMnIu', 'Christian Franco', '0991983696', '0991983696', '', 'A', '', 0, '2020-04-13'),
(36, 4774463, 'Naty', '$2y$10$HjiVlvKcXNcOJj5vf1Nze.DVMHyQ5Pe.zfVbC92e0fnPR7BCbTsJK', 'Natalia Aquino', '0985157617', '0985157617', '', 'V', '', 0, '2020-04-13'),
(37, 5389877, 'Nilda', '$2y$10$6tSLXD4o9GU4t8Eyt97q7ug1r4kIQNxuHwx67Vm.4EVIubNMYvnSi', 'Nilda Meza', '0986464245', '0986464245', '', 'V', '', 0, '2020-04-13'),
(38, 4721327, 'Gloria', '$2y$10$.1w7ulDd.BkWp1Pa5OKFW.zezCQYtRJQdJTVQcPspC9LXo7dDQWpm', 'Gloria Riveros', '0985996663', '0985996663', '', 'V', '', 0, '2020-04-13'),
(39, 49941691, 'Christian', '$2y$10$4llECR4V5w5KAc85K9UNzOzTkyaN8ZQVMGII2mrCRJr.8lNQSGHvi', 'Christian Franco', '0991983696', '0991983696', '', 'V', '', 0, '2020-04-13'),
(41, 5535070, 'Francis', '$2y$10$SQR.QCVEQ3P2zod2zT6Ox.QdfYs8vkjixl8xS1uY9pr9IjmI/byr6', 'Francisca Vazquez', '0986792540', '0986792540', '', 'V', '', 0, '2020-04-14'),
(42, 55350701, 'Francisca', '$2y$10$1rWvP265wfvKgCS7QP5zfuSrSNfYnIGLRm6OaGL5RxOddAH3VDRE.', 'Francisca Vazquez', '0986792540', '0986792540', '', 'A', '', 0, '2020-04-14'),
(43, 6003421, 'Yenni', '$2y$10$vvCcRrSw.Ms2JdMg1TdqS.2IbqwdKbqEaNF3eP8nKJr0n1dDy0ubS', 'Yennifer del Valle', '0986529995', '0986529995', '', 'V', '', 0, '2020-04-14'),
(44, 5340173, 'Mariela', '$2y$10$u2hlXoL9iOYk7/qy8dMxi.7kuwdsFFYqN8ipAI2oM.hNZqvUu6mOy', 'Mariela Ramos', '0976158515', '0976158515', '', 'V', '', 0, '2020-04-14'),
(45, 8331406, 'Kevin', '$2y$10$hpBwmLI1Tic5./H8TxY0IuYPkA9RBqH5V0rqQYcGkvPm83Admlwnq', 'Kevin Sanabria', '0972168437', '0972168437', '', 'V', '', 0, '2020-04-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientez`
--
ALTER TABLE `clientez`
  ADD PRIMARY KEY (`nroreg`);

--
-- Indices de la tabla `usuarioz`
--
ALTER TABLE `usuarioz`
  ADD PRIMARY KEY (`nroreg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientez`
--
ALTER TABLE `clientez`
  MODIFY `nroreg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuarioz`
--
ALTER TABLE `usuarioz`
  MODIFY `nroreg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
