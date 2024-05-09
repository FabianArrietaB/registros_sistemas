/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - sistemas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistemas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sistemas`;

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `are_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `areas` */

insert  into `areas`(`id_area`,`are_nombre`) values 
(1,'CAJA'),
(2,'COMERCIAL'),
(3,'CARTERA'),
(4,'CONTABILIDAD'),
(5,'COMPRAS'),
(6,'INVENTARIOS'),
(7,'TESORERIA'),
(8,'PROCESOS'),
(9,'RRHH'),
(10,'SISTEMAS');

/*Table structure for table `bitacora` */

DROP TABLE IF EXISTS `bitacora`;

CREATE TABLE `bitacora` (
  `id_bitacora` int(20) NOT NULL AUTO_INCREMENT,
  `bit_idsede` int(11) DEFAULT 3,
  `bit_tipeve` varchar(50) DEFAULT NULL,
  `bit_fecope` date DEFAULT NULL,
  `bit_operador` int(11) DEFAULT NULL,
  `bit_modulo` varchar(50) DEFAULT NULL,
  `bit_detall` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `bitacora` */

insert  into `bitacora`(`id_bitacora`,`bit_idsede`,`bit_tipeve`,`bit_fecope`,`bit_operador`,`bit_modulo`,`bit_detall`) values 
(1,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1217'),
(2,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO  CONECTOR ELECTRICO MACHO/HEMBRA CON SERIAL  DE LA FACTURA FESM1217'),
(3,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO VIDEO BALUM  CON SERIAL  DE LA FACTURA FESM1217'),
(4,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ADAPTADOR 12V 5AMP CON SERIAL  DE LA FACTURA FESM1217'),
(5,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CABLE DIVISOR 1 HEMBRA 8 MACHOS CON SERIAL  DE LA FACTURA FESM1217'),
(6,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CABLE UTP CAT 5 INT CON SERIAL  DE LA FACTURA FESM1217'),
(7,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO SWITCH CON SERIAL  DE LA FACTURA FESM1228'),
(8,3,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM 1242'),
(9,1,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM1362'),
(10,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO TECLADO PORTATIL  CON SERIAL  DE LA FACTURA FESM1362'),
(11,3,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL 3220211215CCWRJ24172744WCVU DE LA FACTURA FESM1435'),
(12,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1460'),
(13,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1460'),
(14,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO VIDEO BALUM CON SERIAL  DE LA FACTURA FESM1460'),
(15,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO  CONECTOR ELECTRICO MACHO/HEMBRA CON SERIAL  DE LA FACTURA FESM1460'),
(16,3,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM1460'),
(17,3,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM1495'),
(18,3,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM1495'),
(19,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ROUTER  CON SERIAL  DE LA FACTURA FESM1560'),
(20,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ANTENA CON SERIAL  DE LA FACTURA FESM1560'),
(21,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1696'),
(22,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1696'),
(23,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CAMARA CON SERIAL  DE LA FACTURA FESM1696'),
(24,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CABLE UTP CAT 5 INT CON SERIAL  DE LA FACTURA FESM1696'),
(25,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM1696'),
(26,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM1696'),
(27,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO VIDEO BALUM CON SERIAL  DE LA FACTURA FESM1696'),
(28,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CONECTOR ELECTRICO MACHO/HEMBRA CON SERIAL  DE LA FACTURA FESM1696'),
(29,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ADAPTADOR 12V 5AMP CON SERIAL  DE LA FACTURA FESM1696'),
(30,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO PANTALLA CON SERIAL  DE LA FACTURA FESM1759'),
(31,2,'REGISTRO','2023-07-06',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM1775'),
(32,2,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ARJETA VIDEO CON SERIAL  DE LA FACTURA FESM1775'),
(33,2,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ANTIVIRUS CON SERIAL  DE LA FACTURA FESM1775'),
(34,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CARGADOR  CON SERIAL  DE LA FACTURA FESM1858'),
(35,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO CONECTOR  CON SERIAL  DE LA FACTURA FESM1858'),
(36,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO TARJETA RED CON SERIAL  DE LA FACTURA FESM1858'),
(37,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO ACCESPOINT  CON SERIAL  DE LA FACTURA FESM1918'),
(38,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO MEMORIA RAM CON SERIAL  DE LA FACTURA FESM1918'),
(39,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO TONER LASER CON SERIAL  DE LA FACTURA FESM1922'),
(40,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM1979'),
(41,3,'REGISTRO','2023-07-06',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM1979'),
(42,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO amena@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CONTABILIDAD'),
(43,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO analistafacturacion@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CARTERA'),
(44,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO aroca@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA COMERCIAL'),
(45,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO asierra@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMPRAS'),
(46,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auditoriainv@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA INVENTARIOS'),
(47,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxauditoria@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA INVENTARIOS'),
(48,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxcompras@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMPRAS'),
(49,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxcontabilidad@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CONTABILIDAD'),
(50,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxcontabilidadcienaga@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA CONTABILIDAD'),
(51,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxinventarioscienaga@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA INVENTARIOS'),
(52,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxsistema@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA SISTEMAS'),
(53,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO auxtesoreria@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA TESORERIA'),
(54,1,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO cajaceramicasas@metropolisdelacosta.com EN LA SEDE CERAMICASAS EN EL AREA CAJA'),
(55,2,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO cajaferrecasas@metropolisdelacosta.com EN LA SEDE FERRECASAS EN EL AREA CAJA'),
(56,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO cajametropolis@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CAJA'),
(57,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO cartera@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CARTERA'),
(58,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO cbautista@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA PROCESOS'),
(59,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO comercial@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(60,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO coorinventarios@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA INVENTARIOS'),
(61,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO coorinventarioscng@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA INVENTARIOS'),
(62,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO dsierra@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CARTERA'),
(63,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO eacevedo@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(64,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO eorozco@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA SISTEMAS'),
(65,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO farrieta@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA SISTEMAS'),
(66,2,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO ferrecasas@metropolisdelacosta.com EN LA SEDE FERRECASAS EN EL AREA CONTABILIDAD'),
(67,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO hromero@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(68,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO iflorez@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(69,1,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO invceramicasas@metropolisdelacosta.com EN LA SEDE CERAMICASAS EN EL AREA INVENTARIOS'),
(70,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO invmayorista@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA INVENTARIOS'),
(71,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO inventarios@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA INVENTARIOS'),
(72,2,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO invferrecasas@metropolisdelacosta.com EN LA SEDE FERRECASAS EN EL AREA INVENTARIOS'),
(73,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO jcruzate@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(74,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO jhernandez@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(75,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO jparejo@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(76,4,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO jrincon@metropolisdelacosta.com EN LA SEDE MAYORISTA EN EL AREA COMERCIAL'),
(77,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO jvilla@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMPRAS'),
(78,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO larrieta@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA TESORERIA'),
(79,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO lgonzalez@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(80,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO ljimenez@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(81,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO logistica@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA INVENTARIOS'),
(82,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO marketing@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(83,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO notificaciones@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA SISTEMAS'),
(84,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO pintura@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(85,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO practicantecartera@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CARTERA'),
(86,2,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO rfernandez@metropolisdelacosta.com EN LA SEDE FERRECASAS EN EL AREA COMERCIAL'),
(87,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO rrhh@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA RRHH'),
(88,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO sgsst@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA RRHH'),
(89,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO soniac@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA COMERCIAL'),
(90,1,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO ventasceramicasas@metropolisdelacosta.com EN LA SEDE CERAMICASAS EN EL AREA COMERCIAL'),
(91,2,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO ventasferrecasas@metropolisdelacosta.com EN LA SEDE FERRECASAS EN EL AREA COMERCIAL'),
(92,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','EL CORREO yvengal@metropolisdelacosta.com EN LA SEDE METROPOLIS EN EL AREA CONTABILIDAD'),
(93,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA BRILLA'),
(94,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA CAJA'),
(95,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA CAPACITACIONES'),
(96,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA CARTERA'),
(97,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA COMERCIAL'),
(98,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA COMPRAS'),
(99,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA CONTABILIDAD'),
(100,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA GRUPO METROPOLIS'),
(101,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA INVENTARIO'),
(102,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA LOGISTICA'),
(103,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA MARKETING'),
(104,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA PROCESOS'),
(105,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA RRHH'),
(106,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LA CARPETA SISTEMAS'),
(107,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO SERVIDOR CON SERIAL 27M1FW2'),
(108,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO SERVIDOR2 CON SERIAL '),
(109,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO SERVIDORIP CON SERIAL '),
(110,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO RED GM CON SERIAL '),
(111,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO RED GM ADMIN CON SERIAL '),
(112,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO EMISOR GM CON SERIAL '),
(113,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO RECEPTOR FERRESUMINISTROS CON SERIAL '),
(114,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO RECEPTOR BLOQUERA CON SERIAL '),
(115,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO HOGAR CON SERIAL '),
(116,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO FERRECASAS CON SERIAL '),
(117,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO RED MBM CON SERIAL '),
(118,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO METROPOLIS ADMIN CON SERIAL 3220211215CCWRJ24172744WCVU'),
(119,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO BODEGA METROPOLIS CON SERIAL '),
(120,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO BLOQUERA CON SERIAL '),
(121,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO FERRECASAS CON SERIAL '),
(122,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO BODEGA MAYORISTA CON SERIAL '),
(123,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO FERRESUMINISTRO RIOFRIO CON SERIAL '),
(124,3,'REGISTRO','2023-07-06',1,'CONTRASEÑAS','LOS DETALLES DEL EQUIPO FERRESUMINISTRO CIENAGA CON SERIAL '),
(125,3,'REGISTRO','2023-07-06',1,'USUARIOS','EL USUARIO JESUSO EN LA SEDE METROPOLIS EN EL AREA SISTEMAS'),
(126,3,'REGISTRO','2023-07-06',1,'USUARIOS','EL USUARIO CONSUELOB EN LA SEDE METROPOLIS EN EL AREA PROCESOS'),
(127,3,'REGISTRO','2023-07-06',1,'USUARIOS','EL USUARIO YIRLEYV EN LA SEDE METROPOLIS EN EL AREA CONTABILIDAD'),
(128,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM2720'),
(129,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MEMORIA CON SERIAL  DE LA FACTURA FESM2720'),
(130,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO TECLADO CON SERIAL  DE LA FACTURA FESM2720'),
(131,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO TECLADO CON SERIAL  DE LA FACTURA FESM2720'),
(132,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MOUSE  CON SERIAL  DE LA FACTURA FESM2720'),
(133,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MEMORIA CON SERIAL  DE LA FACTURA FESM2601'),
(134,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO TECLADO CON SERIAL  DE LA FACTURA FESM2601'),
(135,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MOUSE CON SERIAL  DE LA FACTURA FESM2601'),
(136,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO BATERIA CON SERIAL  DE LA FACTURA FESM2576'),
(137,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MEMORIA CON SERIAL  DE LA FACTURA FESM2576'),
(138,3,'REGISTRO','2023-07-10',1,'EQUIPOS','EL PORTATIL CON SERIAL G10380HSDIMP0723Q15 DE LA FACTURA FESM2514'),
(139,4,'REGISTRO','2023-07-10',1,'EQUIPOS','EL PORTATIL CON SERIAL PF3LY21H DE LA FACTURA FESM2514'),
(140,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO SWITCH  CON SERIAL  DE LA FACTURA FESM2467'),
(141,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO ROUTER CON SERIAL  DE LA FACTURA FESM2434'),
(142,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO DISCO DURO CON SERIAL  DE LA FACTURA FESM2408'),
(143,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO BATERIA CON SERIAL  DE LA FACTURA FESM2408'),
(144,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO BATERIA CON SERIAL  DE LA FACTURA FESM2408'),
(145,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO SWITCH CON SERIAL  DE LA FACTURA FESM2308'),
(146,4,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO FUENTE CON SERIAL  DE LA FACTURA FESM2243'),
(147,3,'REGISTRO','2023-07-10',1,'EQUIPOS','EL PORTATIL CON SERIAL  DE LA FACTURA FESM2230'),
(148,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO TECLADO  CON SERIAL  DE LA FACTURA FESM2230'),
(149,3,'REGISTRO','2023-07-10',1,'COMPRAS','EL PRODUCTO MOUSE CON SERIAL  DE LA FACTURA FESM2230'),
(150,3,'REGISTRO','2023-07-25',3,'TAREAS','LA TAREA PARA TODOS DE NIVEL URGENTE'),
(151,3,'CAMBIO','2023-07-26',1,'TAREAS','EL ESTADO DE LA TAREA ACTUALIZACION LINEAS CORPORATIVAS Y EQUIPOS PERSONAL DE ABIERTO A EN OPERACION'),
(152,3,'CAMBIO','2023-07-26',1,'TAREAS','EL ESTADO DE LA TAREA ACTUALIZACION LINEAS CORPORATIVAS Y EQUIPOS PERSONAL DE EN OPERACION A FINALIZADO'),
(156,3,'REGISTRO','2023-07-27',3,'TAREAS','LA TAREA PARA FABIAN DE NIVEL URGENTE'),
(157,3,'CAMBIO','2023-08-08',1,'TAREAS','EL ESTADO DE LA TAREA INSTALACION OFICINA FERRESUMINISTROS DE ABIERTO A EN OPERACION'),
(158,3,'CAMBIO','2023-08-08',1,'TAREAS','EL ESTADO DE LA TAREA INSTALACION OFICINA FERRESUMINISTROS DE EN OPERACION A FINALIZADO');

/*Table structure for table `claves` */

DROP TABLE IF EXISTS `claves`;

CREATE TABLE `claves` (
  `id_clave` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `cla_equip` varchar(45) DEFAULT NULL,
  `cla_user` varchar(45) DEFAULT NULL,
  `cla_password` varchar(45) DEFAULT NULL,
  `cla_nomwif` varchar(45) DEFAULT 'NO APLICA',
  `cla_clawif` varchar(45) DEFAULT 'NO APLICA',
  `cla_ip` varchar(45) DEFAULT NULL,
  `cla_marca` varchar(45) DEFAULT NULL,
  `cla_modelo` varchar(45) DEFAULT NULL,
  `cla_patron` varchar(45) DEFAULT 'NO APLICA',
  `cla_serial` varchar(45) DEFAULT NULL,
  `cla_fecope` date DEFAULT NULL,
  PRIMARY KEY (`id_clave`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `claves` */

insert  into `claves`(`id_clave`,`id_operador`,`id_tipo`,`cla_equip`,`cla_user`,`cla_password`,`cla_nomwif`,`cla_clawif`,`cla_ip`,`cla_marca`,`cla_modelo`,`cla_patron`,`cla_serial`,`cla_fecope`) values 
(1,1,1,'SERVIDOR','Administrador','Metro_Casas2020..','','','192.168.1.254','DELL','POWEREDGE R640','','27M1FW2','2023-07-06'),
(2,1,1,'SERVIDOR2','Administrador','Metro_Casas2022..','','','192.168.1.253','DELL','POWEREDGE T110 II','','','2023-07-06'),
(3,1,1,'SERVIDORIP','root','Metro_2022','','','192.168.1.252:444','DELL','POWEREDGE T110 II','','','2023-07-06'),
(4,1,2,'RED GM','admin','.Metropolis2022','RED GM','.GrupoMetropolis2023..','192.168.1.4','TP LINK','Archer C80','','','2023-07-06'),
(5,1,2,'RED GM ADMIN','admin','.Metropolis2022','RED GM ADMIN','.GrupoMetropolis2023..','192.168.1.5','TP LINK','EAP225','','','2023-07-06'),
(6,1,2,'EMISOR GM','admin','admin','EMISOR GM','Metropolis2022','192.168.1.6','UBIQUITI','NANOSTATION M5','','','2023-07-06'),
(7,1,2,'RECEPTOR FERRESUMINISTROS','admin','admin','','','192.168.1.7','UBIQUITI','NANOSTATION M5','','','2023-07-06'),
(8,1,2,'RECEPTOR BLOQUERA','admin','admin','','','192.168.1.8','UBIQUITI','NANOSTATION M5','','','2023-07-06'),
(9,1,2,'HOGAR','admin','admin','HOGAR','Ever2020','192.168.1.10','NEXT','ARNEL304U1','','','2023-07-06'),
(10,1,2,'FERRECASAS','admin','.Metropolis2022','FERRECASAS','.GrupoMetropolis2022..','192.168.2.249','TP LINK','TLW450','','','2023-07-06'),
(11,1,2,'RED MBM','admin','.Metropolis2022','RED MBM','.GrupoMetropolis2022..','192.168.3.249','TP LINK','TLW450','','','2023-07-06'),
(12,1,3,'METROPOLIS ADMIN','admin','Metropolis2022','','','192.168.1.246','HIKLOOK','DS7232HGHIK2','M','3220211215CCWRJ24172744WCVU','2023-07-06'),
(13,1,3,'BODEGA METROPOLIS','admin','Metro2022','','','192.168.1.243','DAHUA','','M','','2023-07-06'),
(14,1,3,'BLOQUERA','admin','Metro2022','','','192.168.1.244','DAHUA','','M','','2023-07-06'),
(15,1,2,'FERRECASAS','admin','Metropolis2020','','','192.168.2.246','HIKVISION','','M','','2023-07-06'),
(16,1,3,'BODEGA MAYORISTA','admin','Metropolis2020','','','192.168.3.246','HIKVISION','','M','','2023-07-06'),
(17,1,3,'FERRESUMINISTRO RIOFRIO','admin','Ferre_2022','','','','HIKVISION','','M','','2023-07-06'),
(18,1,3,'FERRESUMINISTRO CIENAGA','admin','Ferre2022','','','','DAHUA','','M','','2023-07-06');

/*Table structure for table `correos` */

DROP TABLE IF EXISTS `correos`;

CREATE TABLE `correos` (
  `id_correo` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `cor_correo` varchar(255) NOT NULL,
  `cor_password` varchar(45) NOT NULL,
  `cor_estado` varchar(45) NOT NULL DEFAULT '1',
  `cor_fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_correo`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `correos` */

insert  into `correos`(`id_correo`,`id_operador`,`id_sede`,`id_area`,`cor_correo`,`cor_password`,`cor_estado`,`cor_fecha`) values 
(1,1,3,4,'amena@metropolisdelacosta.com','amMetropolis2020..','1','2023-07-06'),
(2,1,3,3,'analistafacturacion@metropolisdelacosta.com','afMetropolis2020..','1','2023-07-06'),
(3,1,4,2,'aroca@metropolisdelacosta.com','arMetropolis2020..','1','2023-07-06'),
(4,1,3,5,'asierra@metropolisdelacosta.com','asMetropolis2020..','1','2023-07-06'),
(5,1,3,6,'auditoriainv@metropolisdelacosta.com','aiMetropolis2020..','1','2023-07-06'),
(6,1,3,6,'auxauditoria@metropolisdelacosta.com','aaMetropolis2020..','1','2023-07-06'),
(7,1,3,5,'auxcompras@metropolisdelacosta.com','acMetropolis2020..','1','2023-07-06'),
(8,1,3,4,'auxcontabilidad@metropolisdelacosta.com','acMetropolis2020..','1','2023-07-06'),
(9,1,4,4,'auxcontabilidadcienaga@metropolisdelacosta.com','acMetropolis2023..','1','2023-07-06'),
(10,1,4,6,'auxinventarioscienaga@metropolisdelacosta.com','aiMetropolis2020..','1','2023-07-06'),
(11,1,3,10,'auxsistema@metropolisdelacosta.com','asMetropolis2020..','1','2023-07-06'),
(12,1,3,7,'auxtesoreria@metropolisdelacosta.com','atMetropolis2020..','1','2023-07-06'),
(13,1,1,1,'cajaceramicasas@metropolisdelacosta.com','ccMetropolis2022..','1','2023-07-06'),
(14,1,2,1,'cajaferrecasas@metropolisdelacosta.com','cfMetropolis2023..','1','2023-07-06'),
(15,1,3,1,'cajametropolis@metropolisdelacosta.com','cmMetropolis2023..','1','2023-07-06'),
(16,1,3,3,'cartera@metropolisdelacosta.com','caMetropolis2020..','1','2023-07-06'),
(17,1,3,8,'cbautista@metropolisdelacosta.com','cbMetropolis2020..','1','2023-07-06'),
(18,1,3,2,'comercial@metropolisdelacosta.com','coMetropolis2020..','1','2023-07-06'),
(19,1,3,6,'coorinventarios@metropolisdelacosta.com','inMetropolis2020..','1','2023-07-06'),
(20,1,4,6,'coorinventarioscng@metropolisdelacosta.com','ccMetropolis2020..','1','2023-07-06'),
(21,1,3,3,'dsierra@metropolisdelacosta.com','dsMetropolis2020..','1','2023-07-06'),
(22,1,3,2,'eacevedo@metropolisdelacosta.com','eaMetropolis2020..','1','2023-07-06'),
(23,1,3,10,'eorozco@metropolisdelacosta.com','eoMetropolis2020..','1','2023-07-06'),
(24,1,3,10,'farrieta@metropolisdelacosta.com','faMetropolis2020..','1','2023-07-06'),
(25,1,2,4,'ferrecasas@metropolisdelacosta.com','feMetropolis2020..','1','2023-07-06'),
(26,1,3,2,'hromero@metropolisdelacosta.com','hrMetropolis2020..','1','2023-07-06'),
(27,1,3,2,'iflorez@metropolisdelacosta.com','ifMetropolis2020..','1','2023-07-06'),
(28,1,1,6,'invceramicasas@metropolisdelacosta.com','icMetropolis2020..','1','2023-07-06'),
(29,1,4,6,'invmayorista@metropolisdelacosta.com','imMetropolis2020..','1','2023-07-06'),
(30,1,3,6,'inventarios@metropolisdelacosta.com','inMetropolis2020..','1','2023-07-06'),
(31,1,2,6,'invferrecasas@metropolisdelacosta.com','ifMetropolis2020..','1','2023-07-06'),
(32,1,3,2,'jcruzate@metropolisdelacosta.com','jcMetropolis2022..','1','2023-07-06'),
(33,1,3,2,'jhernandez@metropolisdelacosta.com','jhMetropolis2020..','0','2023-07-06'),
(34,1,3,2,'jparejo@metropolisdelacosta.com','jpMetropolis2022..','1','2023-07-06'),
(35,1,4,2,'jrincon@metropolisdelacosta.com','jrMetropolis2020..','1','2023-07-06'),
(36,1,3,5,'jvilla@metropolisdelacosta.com','jvMetropolis2020..','1','2023-07-06'),
(37,1,3,7,'larrieta@metropolisdelacosta.com','laMetropolis2020..','1','2023-07-06'),
(38,1,3,2,'lgonzalez@metropolisdelacosta.com','lgMetropolis2020..','1','2023-07-06'),
(39,1,3,2,'ljimenez@metropolisdelacosta.com','ljMetropolis2020..','1','2023-07-06'),
(40,1,3,6,'logistica@metropolisdelacosta.com','lgMetropolis2020..','1','2023-07-06'),
(41,1,3,2,'marketing@metropolisdelacosta.com','mkMetropolis2020..','1','2023-07-06'),
(42,1,3,10,'notificaciones@metropolisdelacosta.com','ntMetropolis2023..','1','2023-07-06'),
(43,1,3,2,'pintura@metropolisdelacosta.com','ptMetropolis2023..','0','2023-07-06'),
(44,1,3,3,'practicantecartera@metropolisdelacosta.com','pcMetropolis2023..','1','2023-07-06'),
(45,1,2,2,'rfernandez@metropolisdelacosta.com','rfMetropolis2020..','1','2023-07-06'),
(46,1,3,9,'rrhh@metropolisdelacosta.com','rhMetropolis2020..','1','2023-07-06'),
(47,1,3,9,'sgsst@metropolisdelacosta.com','sgMetropolis2020..','1','2023-07-06'),
(48,1,3,2,'soniac@metropolisdelacosta.com','scMetropolis2020..','1','2023-07-06'),
(49,1,1,2,'ventasceramicasas@metropolisdelacosta.com','vcMetropolis2020..','1','2023-07-06'),
(50,1,2,2,'ventasferrecasas@metropolisdelacosta.com','vfMetropolis2022..','1','2023-07-06'),
(51,1,3,4,'yvengal@metropolisdelacosta.com','yvMetropolis2022..','1','2023-07-06');

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_tipequ` int(11) NOT NULL,
  `equ_marca` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_modelo` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_tipram` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_ram` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_proce` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_tipdis` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_capdis` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_grafica` varchar(45) NOT NULL DEFAULT 'NO TIENE',
  `equ_serial` varchar(45) NOT NULL DEFAULT 'NO APLICA',
  `equ_codact` varchar(45) DEFAULT 'NO ASIGNADO',
  `equ_nomequ` varchar(45) NOT NULL DEFAULT 'NO ASIGNADO',
  `equ_mac` varchar(45) NOT NULL DEFAULT 'NO ASIGNADO',
  `equ_fecope` date NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `equipos` */

insert  into `equipos`(`id_equipo`,`id_operador`,`id_sede`,`id_area`,`id_tipequ`,`equ_marca`,`equ_modelo`,`equ_tipram`,`equ_ram`,`equ_proce`,`equ_tipdis`,`equ_capdis`,`equ_grafica`,`equ_serial`,`equ_codact`,`equ_nomequ`,`equ_mac`,`equ_fecope`) values 
(0,0,0,0,0,'NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','NO APLICA','','NO ADIGNADO','NO ADIGNADO','0000-00-00'),
(1,1,3,10,2,'POWER GROUP','POWER GP1520','3','8GB','PENTIUM G6405','3','250 GB','NO TIENE','','NO ASIGNADO','','','2023-03-25'),
(2,1,1,1,3,'HP','135W','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','','NO ASIGNADO','','','2023-05-09'),
(3,1,3,10,4,'HIKVISION ','DS7232HGHIK2','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','3220211215CCWRJ24172744WCVU','NO ASIGNADO','DVR METROPOLIS ADMIN','24:0F:9B:09:18:B3','2023-06-06'),
(4,1,3,1,3,'SAT','22TUE','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','','NO ASIGNADO','IMPRESORA SAT METROPOLIS','00-98-40-EF-17-20 ','2023-06-11'),
(5,1,3,10,5,'LG','20MK400H-B','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','','NO ASIGNADO','','','2023-06-24'),
(6,1,3,10,5,'SAMSUNG ','LF24T350FHLXZL','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO APLICA','NO TIENE','','NO ASIGNADO','','','2023-06-24'),
(7,1,2,4,2,'POWER GROUP','POWER GP1520','3','8GB',' I3 10105','3','250 GB','NO TIENE','','NO ASIGNADO','FC CONTABILIDAD','','2022-09-05'),
(10,1,3,2,2,'POWER  GROUP','G1011','3','8GB','CORE I3 10105','3','256GB','NO TIENE','G10380HSDIMP0723Q15','NO ASIGNADO','MT PINTURAS','','2023-03-03'),
(11,1,4,2,1,'LENOVO','V14 ITL','3','4GB','CORE I3 1115G1','3','256GB','NO TIENE','PF3LY21H','NO ASIGNADO','BM EXTERNO02','10-51-07-90-CD-CE','2023-04-03'),
(12,1,3,3,5,'ACER','21,5','Selecione','','','Selecione','','','','NO ASIGNADO','','','2023-01-16');

/*Table structure for table `folder` */

DROP TABLE IF EXISTS `folder`;

CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `fol_nombre` varchar(45) NOT NULL,
  `fol_password` varchar(45) NOT NULL,
  `fol_fecope` date DEFAULT NULL,
  PRIMARY KEY (`id_folder`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `folder` */

insert  into `folder`(`id_folder`,`id_operador`,`fol_nombre`,`fol_password`,`fol_fecope`) values 
(1,1,'BRILLA','Brilla2022','2023-07-06'),
(2,1,'CAJA','Caja2022','2023-07-06'),
(3,1,'CAPACITACIONES','LIBRE','2023-07-06'),
(4,1,'CARTERA','Cartera2022','2023-07-06'),
(5,1,'COMERCIAL','Comercial2022','2023-07-06'),
(6,1,'COMPRAS','Compras2022','2023-07-06'),
(7,1,'CONTABILIDAD','Contabilidad2022','2023-07-06'),
(8,1,'GRUPO METROPOLIS','LIBRE','2023-07-06'),
(9,1,'INVENTARIO','Inventario2022','2023-07-06'),
(10,1,'LOGISTICA','Logistica2022','2023-07-06'),
(11,1,'MARKETING','Marketing2022','2023-07-06'),
(12,1,'PROCESOS','Procesos2022','2023-07-06'),
(13,1,'RRHH','Rrhh2022','2023-07-06'),
(14,1,'SISTEMAS','Sistemas_2020','2023-07-06');

/*Table structure for table `hisequipos` */

DROP TABLE IF EXISTS `hisequipos`;

CREATE TABLE `hisequipos` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `his_añocierre` varchar(45) DEFAULT NULL,
  `his_escceramicasas` varchar(45) DEFAULT NULL,
  `his_porceramicasas` varchar(45) DEFAULT NULL,
  `his_impceramicasas` varchar(45) DEFAULT NULL,
  `his_celceramicasas` varchar(45) DEFAULT NULL,
  `his_escferrecasas` varchar(45) DEFAULT NULL,
  `his_porferrecasas` varchar(45) DEFAULT NULL,
  `his_impferrecasas` varchar(45) DEFAULT NULL,
  `his_celferrecasas` varchar(45) DEFAULT NULL,
  `his_escmetropolis` varchar(45) DEFAULT NULL,
  `his_pormetropolis` varchar(45) DEFAULT NULL,
  `his_impmetropolis` varchar(45) DEFAULT NULL,
  `his_celmetropolis` varchar(45) DEFAULT NULL,
  `his_escmayorista` varchar(45) DEFAULT NULL,
  `his_pormayorista` varchar(45) DEFAULT NULL,
  `his_impmayorista` varchar(45) DEFAULT NULL,
  `his_celmayorista` varchar(45) DEFAULT NULL,
  `his_fecope` date DEFAULT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `hisequipos` */

insert  into `hisequipos`(`id_historial`,`his_añocierre`,`his_escceramicasas`,`his_porceramicasas`,`his_impceramicasas`,`his_celceramicasas`,`his_escferrecasas`,`his_porferrecasas`,`his_impferrecasas`,`his_celferrecasas`,`his_escmetropolis`,`his_pormetropolis`,`his_impmetropolis`,`his_celmetropolis`,`his_escmayorista`,`his_pormayorista`,`his_impmayorista`,`his_celmayorista`,`his_fecope`) values 
(1,'2022','3','0','2','2','5','0','2','2','25','7','7','20','2','2','2','9','2022-12-31');

/*Table structure for table `mantenimientos` */

DROP TABLE IF EXISTS `mantenimientos`;

CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mat_detalle` varchar(45) NOT NULL,
  `mat_fecope` date NOT NULL,
  PRIMARY KEY (`id_mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mantenimientos` */

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `per_cladoc` varchar(45) NOT NULL,
  `per_docume` varchar(45) NOT NULL,
  `per_nombre` varchar(45) NOT NULL,
  `per_telefono` varchar(45) NOT NULL,
  `per_corper` varchar(45) NOT NULL,
  `per_corcop` varchar(45) NOT NULL,
  `per_estado` varchar(45) NOT NULL DEFAULT '1',
  `per_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `per_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `personas` */

insert  into `personas`(`id_persona`,`id_operador`,`per_cladoc`,`per_docume`,`per_nombre`,`per_telefono`,`per_corper`,`per_corcop`,`per_estado`,`per_fecope`,`per_fecupd`) values 
(1,1,'CEDULA','1082882409','ACEVEDO GOMEZ ELIZABETH','3117721662','ELIZABETHACEVEDOGOMEZ0@GMAIL.COM','eacevedo@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,1,'CEDULA','1007900088','ADARRAGA BERDUGO LAURA VANESSA','3002950778','lauraadarraga5@gmail.com','rrhha@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,1,'NIT MIXTO','1128194021','ALBOR CORONADO JULIETH PAOLA','3004801667','juliethalbor17@gmail.com','cartera@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,1,'CEDULA','1082918441','ALTAMIRANDA ATENCIO JUSETH DAVID','3024078342','jusethaltamiranda@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,1,'CEDULA','1193046592','APARICIO SUAREZ MAYRA ALEJANDRA','','','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,1,'CEDULA','12636992','ARENAS CABALLERO EDWIN ENRIQUE','3012222093 -  3046065421',' edwinarenas432@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,1,'CEDULA','1083040752','ARIAS DAVILA IVAN EDUARDO','3205786310','ivaneduarias@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,1,'CEDULA','1083458463','ARIZA HERRERA JHONATAN SEGUNDO','3043897980','jhonatanariza831@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,1,'CEDULA','1082891362','ARRIETA ALENDRALES LILIANA PAOLA','3104485096','lili_240189@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,1,'CEDULA','1045689957','ARRIETA BLANCO FABIAN ANDRES','3013996994','f.arrieta@outlook.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(11,1,'CEDULA','63484295','BAUTISTA SANCHEZ CONSUELO','3013866172','consuelobs2010@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(12,1,'CEDULA DE EXTRANJERIA','5293593','BRACHO MELENDEZ FRANCISCO JAVIER','','fjbm31122002@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(13,1,'CEDULA','1080420940','BENAVIDES JIMENEZ KATIANA MARCELA','3023596694','kattyb727@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(14,1,'CEDULA','7630377','BLANCO VACCA EFRAIN','3106611098','efrainblancovaca@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(15,1,'CEDULA','12629264','CABRERA GARCIA NELSON DE JESUS','3103649392','nelsoncabrera2612@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(16,1,'CEDULA','1082933322','CABRERA JIMENEZ VALENTINA BEATRIZ','3022667395','valentinabcj@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(17,1,'CEDULA','1193534792','CABRERA MERI?O GLADYS MARIA','3042259671','cabreragladys347@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(18,1,'CEDULA','8645287','CANTILLO POLO CARLOS','3042983540','cantillopolocarlos2022@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(19,1,'CEDULA','1004378842','CAMELO MARTINEZ IVAN RENE','3012907761','ivanrenecamelo10@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(20,1,'CEDULA','63489474','CARRE?O ARDILA SONIA PATRICIA','3004857482','soniapa.mauro@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(21,1,'CEDULA','85477152','CARRILLO BARBOSA EVER','3006153905','evercarrillo360@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(22,1,'CEDULA','12635706','CASAS CASAS FAIBER ARNOL','3202353075','FAIBERCASAS@GMAIL.COM','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(23,1,'CEDULA','84456361','CASAS CRUZ JUAN CARLOS','4205640 - 3108297983','jcc_va@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(24,1,'CEDULA','7629951','CASTRO CASTRO OSVALDIR','3166402332/4229130','familicastro2014@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(25,1,'CEDULA','1124048121','CRUZATE GONZALEZ JAN CARLOS','3008081677','jeankrlos1994@outlook.es','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(26,1,'CEDULA','1082855203','CHIQUILLO ACU?A DAYANIS LILIBETH ','3022868255','dayanisjin@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(27,1,'CEDULA','19597263','DE AVILA VEGA YERALDO DE JESUS','3106229835','yeraldodeavilavega73@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(28,1,'CEDULA','1129575575','DE LA CRUZ ALCALA PAUL','3004646807','mansivo@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(29,1,'CEDULA','1221975835','DURAN BUELVAS BRANDON JOSE','3125624611','bjdbbrandon@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(30,1,'CEDULA DE EXTRANJERIA','1495618','ELLES MONTES RODOLFO ANDRES ','3017332140','rodolfo.re59@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(31,1,'CEDULA','12622059','FERNANDEZ MARTINEZ ROYCER','3014718410','roycer813@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(32,1,'CEDULA','84454033','FLOREZ VELASQUEZ IVAN DARIO','3043324260 - 4393705','dariflorez89@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(33,1,'CEDULA','1082917860','GONZALEZ CANTILLO LIZETH TATIANA','3233521000','lisethgonzalez383@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(34,1,'CEDULA','1083020172','GONZALEZ NU?ES JOSE ANTONIO','3057583218','JOSEANGONU2212@GMAIL.COM','','0','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(35,1,'CEDULA','1080422496','GUALDRON GRANADOS ALEXA PAOLA','3045407266','alexagualdron99@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(36,1,'CEDULA','1004382427','HERNANDEZ  ALGARIN DIOMEDES DE JESUS','3042178177-3147262848','diomedesh30@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(37,1,'CEDULA','1083435173','HERNANDEZ LOPEZ JHON ESNEIDER','3148643719-3127898778','jhonhernandez0630@gmail.com','','0','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(38,1,'CEDULA','26670424','JIMENEZ CAMARGO LORENA','3022141116','lopajica1314@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(39,1,'CEDULA','1221967870','LATTA LOPEZ AYLEN ARMANDO','3234483834','aylenlatta@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(40,1,'CEDULA','1081923441','LOPEZ MENDEZ EDGAR MANUEL','3205062137','elopezm94@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(41,1,'CEDULA','1082832313','LOPEZ NAVARRO JHONY ANDRES','3205100017','jhonyln2003@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(42,1,'CEDULA','7630596','MACHADO NOGOA MELQUICEDET','3015917518','melkis_1234@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(43,1,'CEDULA','1004361167','MADRID GARCIA JANNY LUCIA','3022630709','jannyluciam@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(44,1,'CEDULA','1221980277','MARTINEZ FLORAISON VALENTINA ','3004353225','valentinafloraison@gmail.com','','0','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(45,1,'CEDULA','8734749','MEJIA MACHADO CLAUDIO ANTONIO','3052364804','darlisdazam1985@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(46,1,'CEDULA','1082868875','MENA BARRIOS ALBERTO NICOLAS','3234566808','almeba20@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(47,1,'CEDULA','1083035700','MENDIVIL GUTIERREZ JESUS ALBERTO','3016824528','mendi698@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(48,1,'CEDULA','1083005667','MENDOZA OSPINO ANGY MARCELA','3007492353','angie_marce13@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(49,1,'CEDULA','6511586','MENDOZA TORRES BRAYAN ENRIQUE','3206312143','brayanenriquemendoza18@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(50,1,'CEDULA','1083555789','NORIEGA MONTERO JOHANNA PAOLA','3023336799 - 3017531876','johannanoriega37@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(51,1,'CEDULA','1082890636','NU?EZ POMBO MILAGRO ISABEL','3028563580','nmilagros227@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(52,1,'CEDULA','1083017889','OROZCO ARZA JESUS ENRIQUE','3043638145','jesusarza25@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(53,1,'CEDULA','1221974129','OROZCO RUIZ ANGIE VANESSA','3005176947 - 3012986852','angiemaju2908@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(54,1,'CEDULA','1004122671','ORTIZ LOBATO IVAN DAVID','3022364212','sincorreo@sincorreo.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(55,1,'CEDULA DE EXTRANJERIA','5777753','PADILLA PALOMARES JESUS OSWALDO','3042271200','yaneliscarolinag@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(56,1,'CEDULA','57461664','PALLARES MONTA?O JANELLYS ESTHER','','janellys-pallares@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(57,1,'CEDULA','1083013446','PAREJO SANCHEZ JINETH','3013535370','jineth.12@hotmail.com','jparejo@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(58,1,'CEDULA','19590737','PERTUZ OROZCO JULIO CESAR','3023977749','juliopertuz70@outlook.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(59,1,'CEDULA','1042445199','PRADA RUEDA PEDRO JAVIER','3157299351','jp_20@hotmail.es','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(60,1,'CEDULA','1221976754','QUINTO CORONADO ANGELICA','3108475774','angelicaquintoc@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(61,1,'CEDULA','1004163505','RACEDO CASTILLO JHOINER SMITH','3244131677','jpenalver201@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(62,1,'CEDULA','1043873947','RICARDO CHARRIS LUIS EDUARDO','322883117','luiseduardorixardo@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(63,1,'NIT MIXTO','1066062659','RINCON ANGARITA YEIDER ALONSO','3202132752','yrinconangarita@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(64,1,'CEDULA','1116665981','RINCON GUTIERREZ JEISSON ANDREY','3106542935 - 3183106778','j.93rincon@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(65,1,'CEDULA','12635912','ROCA LLANOS ALFAR DE JESUS','3003853673','alfarroca2312@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(66,1,'CEDULA','1082913329','RODRIGUEZ VESGA SILVIA','3004140824','silvisjuli@hotmail.es','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(67,1,'CEDULA','84451938','ROMERO URIBE HILDEBRANDO','3013573931','brandoromero0426@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(68,1,'CEDULA','1221968085','SARMIENTO MENDOZA MARLON JOSE','3043667528',' marlonsarmen068@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(69,1,'CEDULA','1097162576','SIERRA PEREZ YOJAN ANDRES','3188151736','yoansierra11@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(70,1,'CEDULA','1082931929','SIERRA WHITE DIANYS MILETH','3125019365','diannys0929@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(71,1,'CEDULA','56089467','TORRES BOJATO ALVIS MARIA','3042837355','alvis.torres2022@gmail.com','ventasferrecasas@@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(72,2,'CEDULA','1083035672','TORRES FONTALVO JONATHAN JOSE','3007140390','torresfontalvo1218@gmail.com','','1','0000-00-00 00:00:00','2023-06-07 10:06:23'),
(73,1,'CEDULA','1083024146','TORRES REYES JUNNINNO ALDAIR','3016574962','esteven465@gmail.com','auxcompras@metropolisdelacosta.com','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(74,1,'CEDULA','1235539168','TRIGOS TORRES MIGUEL ANDRES','3014407399','miguelyangely06@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(75,2,'CEDULA','1083032223','VENGAL MULFORD YIRLEY CAROLINA','4349297','yirleyvengal10@gmail.com','yvengal@metropolisdelacosta.com','1','0000-00-00 00:00:00','2023-06-07 09:57:16'),
(76,1,'CEDULA','1082910762','VILLA CA?AS JULIO JOSE','3166363248','julio-0128@hotmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(77,1,'CEDULA','85489755','VILLALOBOS ARIZA GUSTAVO SEGUNDO','3194414794','tavovillalobos79@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(78,1,'CEDULA','1084729655','YANCY MIRANDA FREDY RAFAEL','3014509474','fredyyancy28@gmail.com','','1','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `presupuesto` */

DROP TABLE IF EXISTS `presupuesto`;

CREATE TABLE `presupuesto` (
  `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `pre_valor` varchar(45) DEFAULT NULL,
  `pre_fecope` date DEFAULT NULL,
  `id_operador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_presupuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `presupuesto` */

insert  into `presupuesto`(`id_presupuesto`,`pre_valor`,`pre_fecope`,`id_operador`) values 
(1,'4000000','2022-01-01',1),
(2,'4000000','2022-02-01',1),
(3,'4000000','2022-03-01',1),
(4,'4000000','2022-04-01',1),
(5,'4000000','2022-05-01',1),
(6,'4000000','2022-06-01',1),
(7,'4000000','2022-07-01',1),
(8,'4000000','2022-08-01',1),
(9,'4000000','2022-09-01',1),
(10,'4000000','2022-10-01',1),
(11,'4000000','2022-11-01',1),
(12,'4000000','2022-12-01',1),
(14,'4000000','2023-01-01',1),
(15,'4000000','2023-02-01',1),
(16,'4000000','2023-03-01',1),
(17,'4000000','2023-04-01',1),
(18,'4000000','2023-05-05',1),
(19,'4000000','2023-06-01',1),
(20,'4000000','2023-07-07',1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`rol_nombre`) values 
(1,'ASESOR'),
(2,'COORDINADOR'),
(3,'SUPERVISOR'),
(4,'ADMINISTRADOR');

/*Table structure for table `sedes` */

DROP TABLE IF EXISTS `sedes`;

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL AUTO_INCREMENT,
  `sed_nombre` varchar(45) DEFAULT NULL,
  `sed_direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sedes` */

insert  into `sedes`(`id_sede`,`sed_nombre`,`sed_direccion`) values 
(1,'CERAMICASAS','Calle 17 No. 18 - 61'),
(2,'FERRECASAS','Calle 17 No. 18 - 105'),
(3,'METROPOLIS','Carrera 19 No. 29S - 12 C5'),
(4,'MAYORISTA','Calle 20 No. 30 - 05');

/*Table structure for table `tareas` */

DROP TABLE IF EXISTS `tareas`;

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_asignado` int(11) DEFAULT NULL,
  `tar_detalle` varchar(255) NOT NULL,
  `tar_fecupt` date NOT NULL,
  `tar_fecrea` date NOT NULL,
  `tar_fecope` date NOT NULL,
  `tar_estado` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id_tarea`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tareas` */

insert  into `tareas`(`id_tarea`,`id_usuario`,`id_nivel`,`id_asignado`,`tar_detalle`,`tar_fecupt`,`tar_fecrea`,`tar_fecope`,`tar_estado`) values 
(1,3,3,3,'ACTUALIZACION LINEAS CORPORATIVAS Y EQUIPOS PERSONAL','2023-07-27','2023-07-26','2023-07-25','2'),
(2,3,3,1,'INSTALACION OFICINA FERRESUMINISTROS','2023-08-08','2023-07-31','2023-07-27','2');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_sede` int(11) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `user_nombre` varchar(45) NOT NULL,
  `user_password` varchar(245) NOT NULL,
  `user_estado` varchar(45) NOT NULL DEFAULT '1',
  `user_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fecupt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_operador`,`id_persona`,`id_sede`,`id_area`,`id_rol`,`user_nombre`,`user_password`,`user_estado`,`user_fecope`,`user_fecupt`) values 
(1,1,10,3,10,4,'FARRIETA','766d856ef1a6b02f93d894415e6bfa0e','1','2023-07-05 17:16:54','2024-05-09 16:14:03'),
(2,1,52,3,10,4,'JOROZCO','81dc9bdb52d04dc20036dbd8313ed055','1','2023-07-07 20:19:06','2023-07-17 15:49:23'),
(3,1,11,3,8,3,'CBAUTISTA','81dc9bdb52d04dc20036dbd8313ed055','1','2023-07-07 20:19:49','2023-07-17 15:49:34'),
(4,1,75,3,4,2,'YVENGAL','81dc9bdb52d04dc20036dbd8313ed055','1','2023-07-07 20:20:13','2023-07-17 15:49:43');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `ven_cantid` varchar(45) NOT NULL DEFAULT '1',
  `ven_nompro` varchar(45) NOT NULL,
  `ven_marca` varchar(45) NOT NULL,
  `ven_modelo` varchar(45) NOT NULL,
  `ven_serial` varchar(45) DEFAULT NULL,
  `ven_numfac` varchar(45) NOT NULL,
  `ven_valor` decimal(45,2) DEFAULT NULL,
  `ven_proove` varchar(45) NOT NULL,
  `ven_detall` varchar(45) NOT NULL,
  `ven_feccom` date NOT NULL,
  `ven_fecope` date NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`id_venta`,`id_operador`,`id_sede`,`id_area`,`ven_cantid`,`ven_nompro`,`ven_marca`,`ven_modelo`,`ven_serial`,`ven_numfac`,`ven_valor`,`ven_proove`,`ven_detall`,`ven_feccom`,`ven_fecope`) values 
(1,1,3,10,'20','CAMARA','HILOOK','THC-T120-P','','FESM1217',940000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(2,1,3,10,'60','CONECTOR ELECTRICO MACHO/HEMBRA','GENERICO','GENERICO','','FESM1217',60000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(3,1,3,10,'30','VIDEO BALUM ','GENERICO','GENERICO','','FESM1217',240000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(4,1,3,10,'3','ADAPTADOR 12V 5AMP','GENERICO','GENERICO','','FESM1217',81000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(5,1,3,10,'3','CABLE DIVISOR 1 HEMBRA 8 MACHOS','GENERICO','GENERICO','','FESM1217',30000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(6,1,3,10,'610','CABLE UTP CAT 5 INT','HIKVISION ','GENERICO','','FESM1217',879994.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-03-16','2023-07-06'),
(7,1,3,10,'1','SWITCH','MERCUSYS ','MS-108G','','FESM1228',84999.00,'JA COMPUTADORES','IMPLEMENTO PARA EL AREA COMERCIAL','2022-03-18','2023-07-06'),
(8,1,3,10,'1','EL EQUIPO ESCRITORIO','POWER GROUP','POWER GP1520','','FESM1242',1595000.00,'JA COMPUTADORES','EQUIPO COMPRADO PARA FERRESUMINISTROS SANTA M','2022-03-25','2023-07-06'),
(9,1,1,1,'1','LA IMPRESORA','HP','135W','','FESM1362',840000.00,'JA COMPUTADORES','IMPRESORA PARA EL AREA DE CERAMICASAS','2022-05-09','2023-07-06'),
(10,1,3,2,'1','TECLADO PORTATIL ','ACER ','E5-473G','','FESM1362',125000.00,'JA COMPUTADORES','PARA REPARECION EQUIPO ASESOR','2022-05-09','2023-07-06'),
(11,1,3,10,'1','EL DVR','HIKVISION ','DS7232HGHIK2','3220211215CCWRJ24172744WCVU','FESM1435',810000.00,'JA COMPUTADORES','REMPLAZO ANTERIOR DISPOSITIVO DE CCTV, DAÑO P','2022-06-06','2023-07-06'),
(12,1,3,10,'2','CAMARA','HILOOK','THC-B220M (BALA)','','FESM1460',180000.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-06-11','2023-07-06'),
(13,1,3,10,'2','CAMARA','HILOOK','THC-T120-P','','FESM1460',96000.00,'JA COMPUTADORES','INSTLACION SISTEMA CCTV','2022-06-11','2023-07-06'),
(14,1,3,10,'4','VIDEO BALUM','GENERICO','GENERICO','','FESM1460',31997.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-06-11','2023-07-06'),
(15,1,3,10,'8','CONECTOR ELECTRICO MACHO/HEMBRA','GENERICO','GENERICO','','FESM1460',7997.00,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-06-11','2023-07-06'),
(16,1,3,1,'1','LA IMPRESORA','SAT','22TUE','','FESM1460',370000.00,'JA COMPUTADORES','REMPLAZO IMPRESORA AREA DE CAJA','2022-06-11','2023-07-06'),
(17,1,3,10,'1','LA PANTALLA','LG','20MK400H-B','','FESM1495',1080000.00,'JA COMPUTADORES','MONITOR PARA EL AREA DE SISTEMAS','2022-06-24','2023-07-06'),
(18,1,3,10,'1','LA PANTALLA','SAMSUNG ','LF24T350FHLXZL','','FESM1495',760000.00,'JA COMPUTADORES','MONITOR PARA EL AREA DE SISTEMAS','2022-06-24','2023-07-06'),
(19,1,3,10,'3','ROUTER ','TP- LINK','WR-941HP','','FESM1560',824998.00,'JA COMPUTADORES','ROUTER PARA LAS SEDES DE CIENAGA Y GERENCIA','2022-07-13','2023-07-06'),
(20,1,3,10,'2','ANTENA','UBIQUITI ','NBE-M5-16 5GHZ','','FESM1560',617998.00,'JA COMPUTADORES','INSTALACION RED ENTRE MAYORISTA Y FERRECASAS','2022-07-07','2023-07-06'),
(21,1,3,10,'15','CAMARA','HILOOK','THC-T120-P','','FESM1696',779991.45,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(22,1,3,10,'6','CAMARA','HIKVISION ','DS256D0TIRMF (DOMO','','FESM1696',473996.04,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(23,1,3,10,'2','CAMARA','HILOOK','THC- B120M (BALA)','','FESM1696',137999.54,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(24,1,3,10,'610','CABLE UTP CAT 5 INT','HIKVISION ','GENERICO','','FESM1696',859995.51,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(25,1,3,10,'1','DISCO DURO','WESTER DIGITA','2TB PURPLE','','FESM1696',319999.33,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(26,1,3,10,'2','DISCO DURO','WESTER DIGITAL','4TB PURPLE','','FESM1696',911999.34,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(27,1,3,10,'23','VIDEO BALUM','GENERICO','GENERICO','','FESM1696',195476.54,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(28,1,3,10,'46','CONECTOR ELECTRICO MACHO/HEMBRA','GENERICO','GENERICO','','FESM1696',45981.60,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(29,1,3,10,'3','ADAPTADOR 12V 5AMP','GENERICO','GENERICO','','FESM1696',83998.53,'JA COMPUTADORES','INSTALACION SISTEMA CCTV','2022-08-17','2023-07-06'),
(30,1,3,10,'1','PANTALLA','HP','ALL IN ONE 19.5','','FESM1759',1099999.99,'JA COMPUTADORES','PARA EQUIPO EN SEDE CIENAGA','2022-09-01','2023-07-06'),
(31,1,2,4,'1','EL EQUIPO ESCRITORIO','POWER GROUP','POWER GP1520','','FESM1775',1899000.00,'JA COMPUTADORES','REMPLAZO EQUIPO EN FERRECASAS','2022-09-05','2023-07-06'),
(32,1,2,4,'1','TARJETA VIDEO','GEFORCE ',' 730','','FESM1775',390999.49,'JA COMPUTADORES','INSTALACION EQUIPO NUEVO FC CONTABILIDAD','2022-09-05','2023-07-06'),
(33,1,2,4,'1','ANTIVIRUS','KASPERSKY','LISENCIA 1 USUARIO','','FESM1775',100000.00,'JA COMPUTADORES','INSTALACION EQUIPO FC CONTABILIDAD','2022-09-05','2023-07-06'),
(34,1,3,2,'1','CARGADOR ','ASUS ','19V 2,37 AMP','','FESM1858',51999.43,'JA COMPUTADORES','CARGADOR PARA EQUIPO ASESOR EXTERNO','2022-09-26','2023-07-06'),
(35,1,3,10,'100','CONECTOR ','PLUG RJ45','CAT 6E PASTA','','FESM1858',34999.09,'JA COMPUTADORES','','2022-09-26','2023-07-06'),
(36,1,3,10,'1','TARJETA RED','TP- LINK','TF-3468','','FESM1858',52999.03,'JA COMPUTADORES','TARJETA PARA EQUIPO SERVIDOR2','2022-09-26','2023-07-06'),
(37,1,3,10,'1','ACCESPOINT ','TP- LINK','EAP225','','FESM1918',460000.00,'JA COMPUTADORES','WIFI PARA EL AREA DE PATIO','2022-10-13','2023-07-06'),
(38,1,3,10,'2','MEMORIA RAM','KINGSTON ','DDR4 8GB','','FESM1918',329999.99,'JA COMPUTADORES','ACTUALIZACION EQUIPO MT AUXCONTABILIDAD - MT ','2022-10-13','2023-07-06'),
(39,1,3,9,'1','TONER LASER','RICOH ','SP 3710','','FESM1922',195998.95,'JA COMPUTADORES','TONNER PARA IMPRESORA RRHH','2022-10-13','2023-07-06'),
(40,1,3,10,'1','DISCO DURO','ADATA LEGEND','M.2 512GB','','FESM1979',274999.48,'JA COMPUTADORES','ACTUALIZACION DISCO EQUIPO MT JCOMERCIAL','2022-10-29','2023-07-06'),
(41,1,3,10,'2','DISCO DURO','ADATA','SSD 120GB','','FESM1979',199998.54,'JA COMPUTADORES','INSTALACION DE DISCOS EN EQUIPOS COMERCIALES','2022-10-29','2023-07-06'),
(44,1,3,10,'2','DISCO DURO','ADATA','240 GB','','FESM2720',209999.30,'JA COMPUTADORES','ACTUALIZACIÓN EQUIPOS CAJA','2023-06-06','2023-07-10'),
(45,1,3,10,'2','MEMORIA','ADATA','8GB DDR4','','FESM2720',439998.93,'JA COMPUTADORES','ACTUALIZACIÓN EQUIPO CAJA','2023-06-06','2023-07-10'),
(46,1,3,10,'9','TECLADO','GENIUS','KB-118','','FESM2720',332995.32,'JA COMPUTADORES','DOTACIÓN MES METROPOLIS','2023-06-06','2023-07-10'),
(47,1,3,10,'1','TECLADO','GENIUS','KB-116','','FESM2720',36999.48,'JA COMPUTADORES','DOTACIÓN MES METRÓPOLIS','2023-06-06','2023-07-10'),
(48,1,3,10,'10','MOUSE ','GENIUS',' DX-120','','FESM2720',209999.30,'JA COMPUTADORES','DOTACIÓN MES METRÓPOLIS','2023-06-06','2023-07-10'),
(49,1,3,4,'2','MEMORIA','ADATA','8GB DDR4','','FESM2601',429999.36,'JA COMPUTADORES','ACTUALIZACIÓN EQUIPO CONTABILIDAD','2023-05-04','2023-07-10'),
(50,1,3,10,'3','TECLADO','GENIUS','KB-116','','FESM2601',104999.63,'JA COMPUTADORES','REMPLAZO EQUIPOS MAYORISTA Y FERRECASAS','2023-05-04','2023-07-10'),
(51,1,3,10,'2','MOUSE','GENIUS','DX-120','','FESM2601',68997.39,'JA COMPUTADORES','DOTACIÓN METRÓPOLIS','2023-05-04','2023-07-10'),
(52,1,3,4,'1','BATERIA','NICOMAR','9 AMP 12V','','FESM2576',81999.33,'JA COMPUTADORES','UPS EQUIPO MT-CONTADOR','2023-04-24','2023-07-10'),
(53,1,3,4,'1','MEMORIA','ADATA','D10 DDR4 8GB 3200','','FESM2576',147999.11,'JA COMPUTADORES','ACTUALIZACION EQUIPO MT-AUXCONTABILIDAD','2023-04-24','2023-07-10'),
(54,1,3,2,'1','EL EQUIPO ESCRITORIO','POWER  GROUP','G1011','G10380HSDIMP0723Q15','FESM2514',1876000.00,'JA COMPUTADORES','IMPLEMENTADO AREA COMERCIAL PINTURAS','2023-03-03','2023-07-10'),
(55,1,4,2,'1','EL PORTATIL','LENOVO','V14 ITL','PF3LY21H','FESM2514',1540000.00,'JA COMPUTADORES','ASIGNACIÓN ASESOR JEISON RINCÓN','2023-04-03','2023-07-10'),
(56,1,3,10,'1','SWITCH ','TP-LINK','TL-SG1048','','FESM2467',1669999.59,'JA COMPUTADORES','ACTUALIZACIÓN RACK ÁREA SISTEMAS','2023-03-21','2023-07-10'),
(57,1,3,10,'1','ROUTER','TP-LINK','ARCHER C80 AC1900','','FESM2434',329998.90,'JA COMPUTADORES','REMPLAZO WIFI COMERCIAL','2023-03-08','2023-07-10'),
(58,1,3,10,'1','DISCO DURO','ADATA','1TB','','FESM2408',389999.89,'JA COMPUTADORES','ACTUALIZACIÓN EQUIPO COMERCIAL','2023-02-28','2023-07-10'),
(59,1,3,2,'1','BATERIA','HP','HP 15','','FESM2408',229999.63,'JA COMPUTADORES','BATERÍA EQUIPO MT EXTERNO03 - JHON HERNANDEZ','2023-02-28','2023-07-10'),
(60,1,3,2,'1','BATERIA','HP','HS04','','FESM2408',129999.17,'JA COMPUTADORES','REMPLAZO EQUIPO MT-EXTERNO02 - JINETH PAREJO','2023-02-28','2023-07-10'),
(61,1,3,2,'1','SWITCH','TP-LINK','LS1008G','','FESM2308',116999.61,'JA COMPUTADORES','INSTALACIÓN AREA COMERCIAL','2023-02-08','2023-07-10'),
(62,1,4,2,'1','FUENTE','ATX','750W','','FESM2243',149997.12,'JA COMPUTADORES','INSTALACION EN EQUIPO FC-CONTABILIDAD','2023-01-19','2023-07-10'),
(63,1,3,3,'1','LA PANTALLA','ACER','21,5','','FESM2230',598999.99,'JA COMPUTADORES','ASIGNACIÓN EQUIPO FACTURE','2023-01-16','2023-07-10'),
(64,1,3,10,'5','TECLADO ','GENIUS','KB-116','','FESM2230',179999.40,'JA COMPUTADORES','DOTACIÓN SEDE METROPOLIS','2023-01-16','2023-07-10'),
(65,1,3,10,'5','MOUSE','GENIUS','DX-120','','FESM2230',114999.99,'JA COMPUTADORES','DOTACIÓN SEDE METROPOLIS','2023-01-16','2023-07-10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
