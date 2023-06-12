-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 19:59:11
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros_sistemas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `are_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `are_nombre`) VALUES
(1, 'CAJA'),
(2, 'COMERCIAL'),
(3, 'CARTERA'),
(4, 'CONTABILIADAD'),
(5, 'COMPRAS'),
(6, 'INVENTARIOS'),
(7, 'TESORERIA'),
(8, 'PROCESOS'),
(9, 'RRHH'),
(10, 'SISTEMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias`
--

CREATE TABLE `auditorias` (
  `id_auditoria` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_tipequ` int(11) NOT NULL,
  `equ_marca` varchar(45) NOT NULL,
  `equ_modelo` varchar(45) NOT NULL,
  `equ_tipram` varchar(45) NOT NULL,
  `equ_ram` varchar(45) NOT NULL,
  `equ_proce` varchar(45) NOT NULL,
  `equ_tipdis` varchar(45) NOT NULL,
  `equ_capdis` varchar(45) NOT NULL,
  `equ_grafica` varchar(45) NOT NULL,
  `equ_codact` varchar(45) NOT NULL,
  `equ_serial` varchar(45) NOT NULL,
  `equ_fecope` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `id_operador`, `id_sede`, `id_area`, `id_tipequ`, `equ_marca`, `equ_modelo`, `equ_tipram`, `equ_ram`, `equ_proce`, `equ_tipdis`, `equ_capdis`, `equ_grafica`, `equ_codact`, `equ_serial`, `equ_fecope`) VALUES
(1, 1, 4, 2, 1, 'LENOVO', '14ITL6', '2', '8GB', 'I3 1115G4', '3', '256GB', 'NO TIENE', '000384', 'PF3LY21H', '2023-06-10'),
(2, 1, 1, 1, 2, 'power group', 'POWER 11GEH', '2', '4gb', 'PETIUM G4560', '1', '1TB', 'no tiene', '', '11GEHMP0218C39', '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mat_detalle` varchar(45) NOT NULL,
  `mat_fecope` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id_mantenimiento`, `id_operador`, `id_area`, `id_equipo`, `id_usuario`, `mat_detalle`, `mat_fecope`) VALUES
(1, 2, 9, 1, 2, 'MANTENIMIENTO PREVENTIVO', '2023-06-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `per_cladoc` varchar(45) NOT NULL,
  `per_docume` varchar(45) NOT NULL,
  `per_nombre` varchar(45) NOT NULL,
  `per_telefono` varchar(45) NOT NULL,
  `per_corper` varchar(45) NOT NULL,
  `per_corcop` varchar(45) NOT NULL,
  `per_estado` varchar(45) NOT NULL DEFAULT '1',
  `per_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `per_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `id_operador`, `per_cladoc`, `per_docume`, `per_nombre`, `per_telefono`, `per_corper`, `per_corcop`, `per_estado`, `per_fecope`, `per_fecupd`) VALUES
(1, 1, 'CEDULA', '1082882409', 'ACEVEDO GOMEZ ELIZABETH', '3117721662', 'ELIZABETHACEVEDOGOMEZ0@GMAIL.COM', 'eacevedo@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'CEDULA', '1007900088', 'ADARRAGA BERDUGO LAURA VANESSA', '3002950778', 'lauraadarraga5@gmail.com', 'rrhha@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'NIT MIXTO', '1128194021', 'ALBOR CORONADO JULIETH PAOLA', '3004801667', 'juliethalbor17@gmail.com', 'cartera@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'CEDULA', '1082918441', 'ALTAMIRANDA ATENCIO JUSETH DAVID', '3024078342', 'jusethaltamiranda@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'CEDULA', '1193046592', 'APARICIO SUAREZ MAYRA ALEJANDRA', '', '', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'CEDULA', '12636992', 'ARENAS CABALLERO EDWIN ENRIQUE', '3012222093 -  3046065421', ' edwinarenas432@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'CEDULA', '1083040752', 'ARIAS DAVILA IVAN EDUARDO', '3205786310', 'ivaneduarias@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'CEDULA', '1083458463', 'ARIZA HERRERA JHONATAN SEGUNDO', '3043897980', 'jhonatanariza831@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'CEDULA', '1082891362', 'ARRIETA ALENDRALES LILIANA PAOLA', '3104485096', 'lili_240189@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'CEDULA', '1045689957', 'ARRIETA BLANCO FABIAN ANDRES', '3013996994', 'f.arrieta@outlook.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'CEDULA', '63484295', 'BAUTISTA SANCHEZ CONSUELO', '3013866172', 'consuelobs2010@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'CEDULA DE EXTRANJERIA', '5293593', 'BRACHO MELENDEZ FRANCISCO JAVIER', '', 'fjbm31122002@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'CEDULA', '1080420940', 'BENAVIDES JIMENEZ KATIANA MARCELA', '3023596694', 'kattyb727@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'CEDULA', '7630377', 'BLANCO VACCA EFRAIN', '3106611098', 'efrainblancovaca@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'CEDULA', '12629264', 'CABRERA GARCIA NELSON DE JESUS', '3103649392', 'nelsoncabrera2612@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'CEDULA', '1082933322', 'CABRERA JIMENEZ VALENTINA BEATRIZ', '3022667395', 'valentinabcj@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'CEDULA', '1193534792', 'CABRERA MERI?O GLADYS MARIA', '3042259671', 'cabreragladys347@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'CEDULA', '8645287', 'CANTILLO POLO CARLOS', '3042983540', 'cantillopolocarlos2022@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'CEDULA', '1004378842', 'CAMELO MARTINEZ IVAN RENE', '3012907761', 'ivanrenecamelo10@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'CEDULA', '63489474', 'CARRE?O ARDILA SONIA PATRICIA', '3004857482', 'soniapa.mauro@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'CEDULA', '85477152', 'CARRILLO BARBOSA EVER', '3006153905', 'evercarrillo360@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'CEDULA', '12635706', 'CASAS CASAS FAIBER ARNOL', '3202353075', 'FAIBERCASAS@GMAIL.COM', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'CEDULA', '84456361', 'CASAS CRUZ JUAN CARLOS', '4205640 - 3108297983', 'jcc_va@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 'CEDULA', '7629951', 'CASTRO CASTRO OSVALDIR', '3166402332/4229130', 'familicastro2014@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'CEDULA', '1124048121', 'CRUZATE GONZALEZ JAN CARLOS', '3008081677', 'jeankrlos1994@outlook.es', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 'CEDULA', '1082855203', 'CHIQUILLO ACU?A DAYANIS LILIBETH ', '3022868255', 'dayanisjin@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 'CEDULA', '19597263', 'DE AVILA VEGA YERALDO DE JESUS', '3106229835', 'yeraldodeavilavega73@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 'CEDULA', '1129575575', 'DE LA CRUZ ALCALA PAUL', '3004646807', 'mansivo@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 'CEDULA', '1221975835', 'DURAN BUELVAS BRANDON JOSE', '3125624611', 'bjdbbrandon@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 'CEDULA DE EXTRANJERIA', '1495618', 'ELLES MONTES RODOLFO ANDRES ', '3017332140', 'rodolfo.re59@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 1, 'CEDULA', '12622059', 'FERNANDEZ MARTINEZ ROYCER', '3014718410', 'roycer813@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 'CEDULA', '84454033', 'FLOREZ VELASQUEZ IVAN DARIO', '3043324260 - 4393705', 'dariflorez89@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 1, 'CEDULA', '1082917860', 'GONZALEZ CANTILLO LIZETH TATIANA', '3233521000', 'lisethgonzalez383@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 'CEDULA', '1083020172', 'GONZALEZ NU?ES JOSE ANTONIO', '3057583218', 'JOSEANGONU2212@GMAIL.COM', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, 'CEDULA', '1080422496', 'GUALDRON GRANADOS ALEXA PAOLA', '3045407266', 'alexagualdron99@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 1, 'CEDULA', '1004382427', 'HERNANDEZ  ALGARIN DIOMEDES DE JESUS', '3042178177-3147262848', 'diomedesh30@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 'CEDULA', '1083435173', 'HERNANDEZ LOPEZ JHON ESNEIDER', '3148643719-3127898778', 'jhonhernandez0630@gmail.com', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 1, 'CEDULA', '26670424', 'JIMENEZ CAMARGO LORENA', '3022141116', 'lopajica1314@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 1, 'CEDULA', '1221967870', 'LATTA LOPEZ AYLEN ARMANDO', '3234483834', 'aylenlatta@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 1, 'CEDULA', '1081923441', 'LOPEZ MENDEZ EDGAR MANUEL', '3205062137', 'elopezm94@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 1, 'CEDULA', '1082832313', 'LOPEZ NAVARRO JHONY ANDRES', '3205100017', 'jhonyln2003@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 1, 'CEDULA', '7630596', 'MACHADO NOGOA MELQUICEDET', '3015917518', 'melkis_1234@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 1, 'CEDULA', '1004361167', 'MADRID GARCIA JANNY LUCIA', '3022630709', 'jannyluciam@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 1, 'CEDULA', '1221980277', 'MARTINEZ FLORAISON VALENTINA ', '3004353225', 'valentinafloraison@gmail.com', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 1, 'CEDULA', '8734749', 'MEJIA MACHADO CLAUDIO ANTONIO', '3052364804', 'darlisdazam1985@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 1, 'CEDULA', '1082868875', 'MENA BARRIOS ALBERTO NICOLAS', '3234566808', 'almeba20@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 1, 'CEDULA', '1083035700', 'MENDIVIL GUTIERREZ JESUS ALBERTO', '3016824528', 'mendi698@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 1, 'CEDULA', '1083005667', 'MENDOZA OSPINO ANGY MARCELA', '3007492353', 'angie_marce13@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 'CEDULA', '6511586', 'MENDOZA TORRES BRAYAN ENRIQUE', '3206312143', 'brayanenriquemendoza18@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 1, 'CEDULA', '1083555789', 'NORIEGA MONTERO JOHANNA PAOLA', '3023336799 - 3017531876', 'johannanoriega37@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1, 'CEDULA', '1082890636', 'NU?EZ POMBO MILAGRO ISABEL', '3028563580', 'nmilagros227@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 1, 'CEDULA', '1083017889', 'OROZCO ARZA JESUS ENRIQUE', '3043638145', 'jesusarza25@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 1, 'CEDULA', '1221974129', 'OROZCO RUIZ ANGIE VANESSA', '3005176947 - 3012986852', 'angiemaju2908@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 1, 'CEDULA', '1004122671', 'ORTIZ LOBATO IVAN DAVID', '3022364212', 'sincorreo@sincorreo.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 1, 'CEDULA DE EXTRANJERIA', '5777753', 'PADILLA PALOMARES JESUS OSWALDO', '3042271200', 'yaneliscarolinag@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 1, 'CEDULA', '57461664', 'PALLARES MONTA?O JANELLYS ESTHER', '', 'janellys-pallares@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 1, 'CEDULA', '1083013446', 'PAREJO SANCHEZ JINETH', '3013535370', 'jineth.12@hotmail.com', 'jparejo@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 1, 'CEDULA', '19590737', 'PERTUZ OROZCO JULIO CESAR', '3023977749', 'juliopertuz70@outlook.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 1, 'CEDULA', '1042445199', 'PRADA RUEDA PEDRO JAVIER', '3157299351', 'jp_20@hotmail.es', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 1, 'CEDULA', '1221976754', 'QUINTO CORONADO ANGELICA', '3108475774', 'angelicaquintoc@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 1, 'CEDULA', '1004163505', 'RACEDO CASTILLO JHOINER SMITH', '3244131677', 'jpenalver201@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 1, 'CEDULA', '1043873947', 'RICARDO CHARRIS LUIS EDUARDO', '322883117', 'luiseduardorixardo@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 1, 'NIT MIXTO', '1066062659', 'RINCON ANGARITA YEIDER ALONSO', '3202132752', 'yrinconangarita@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 1, 'CEDULA', '1116665981', 'RINCON GUTIERREZ JEISSON ANDREY', '3106542935 - 3183106778', 'j.93rincon@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 1, 'CEDULA', '12635912', 'ROCA LLANOS ALFAR DE JESUS', '3003853673', 'alfarroca2312@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 1, 'CEDULA', '1082913329', 'RODRIGUEZ VESGA SILVIA', '3004140824', 'silvisjuli@hotmail.es', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 1, 'CEDULA', '84451938', 'ROMERO URIBE HILDEBRANDO', '3013573931', 'brandoromero0426@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 1, 'CEDULA', '1221968085', 'SARMIENTO MENDOZA MARLON JOSE', '3043667528', ' marlonsarmen068@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 1, 'CEDULA', '1097162576', 'SIERRA PEREZ YOJAN ANDRES', '3188151736', 'yoansierra11@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 1, 'CEDULA', '1082931929', 'SIERRA WHITE DIANYS MILETH', '3125019365', 'diannys0929@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 1, 'CEDULA', '56089467', 'TORRES BOJATO ALVIS MARIA', '3042837355', 'alvis.torres2022@gmail.com', 'ventasferrecasas@@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 2, 'CEDULA', '1083035672', 'TORRES FONTALVO JONATHAN JOSE', '3007140390', 'torresfontalvo1218@gmail.com', '', '1', '0000-00-00 00:00:00', '2023-06-07 15:06:23'),
(73, 1, 'CEDULA', '1083024146', 'TORRES REYES JUNNINNO ALDAIR', '3016574962', 'esteven465@gmail.com', 'auxcompras@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 1, 'CEDULA', '1235539168', 'TRIGOS TORRES MIGUEL ANDRES', '3014407399', 'miguelyangely06@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 2, 'CEDULA', '1083032223', 'VENGAL MULFORD YIRLEY CAROLINA', '4349297', 'yirleyvengal10@gmail.com', 'yvengal@metropolisdelacosta.com', '1', '0000-00-00 00:00:00', '2023-06-07 14:57:16'),
(76, 1, 'CEDULA', '1082910762', 'VILLA CA?AS JULIO JOSE', '3166363248', 'julio-0128@hotmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 1, 'CEDULA', '85489755', 'VILLALOBOS ARIZA GUSTAVO SEGUNDO', '3194414794', 'tavovillalobos79@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 1, 'CEDULA', '1084729655', 'YANCY MIRANDA FREDY RAFAEL', '3014509474', 'fredyyancy28@gmail.com', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol_nombre`) VALUES
(1, 'ASESOR'),
(2, 'COORDINADOR'),
(3, 'SUPERVISOR'),
(4, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `sed_nombre` varchar(45) DEFAULT NULL,
  `sed_direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `sed_nombre`, `sed_direccion`) VALUES
(1, 'CERAMICASAS', NULL),
(2, 'FERRECASAS', NULL),
(3, 'METROPOLIS', NULL),
(4, 'MAYORISTA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `user_nombre` varchar(45) NOT NULL,
  `user_password` varchar(245) NOT NULL,
  `user_estado` varchar(45) NOT NULL DEFAULT '1',
  `user_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fecupt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_operador`, `id_persona`, `id_rol`, `id_area`, `user_nombre`, `user_password`, `user_estado`, `user_fecope`, `user_fecupt`) VALUES
(1, 1, 10, 4, 10, 'ADMIN', '202cb962ac59075b964b07152d234b70', '1', '2023-05-24 22:41:39', '2023-06-10 12:23:45'),
(2, 1, 10, 4, 10, 'FARRIETA', '202cb962ac59075b964b07152d234b70', '1', '2023-05-24 22:41:39', '2023-06-10 20:04:50'),
(3, 1, 11, 3, 10, 'CBAUTISTA', '202cb962ac59075b964b07152d234b70', '1', '2023-05-24 22:41:39', '2023-05-24 22:41:39'),
(4, 1, 75, 2, 4, 'YVENGAL', '202cb962ac59075b964b07152d234b70', '1', '2023-05-24 22:41:39', '2023-05-24 22:41:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
