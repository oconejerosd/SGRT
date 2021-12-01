-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 05:59:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wsgrt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_equ` int(11) NOT NULL,
  `id_fun` int(11) NOT NULL,
  `fa_asignacion` date NOT NULL,
  `fd_asignacion` date NOT NULL,
  `obs_asignacion` varchar(500) NOT NULL,
  `obsd_asignacion` varchar(500) NOT NULL,
  `carta_asignacion` varchar(500) NOT NULL,
  `cartad_asignacion` varchar(500) NOT NULL,
  `estatus_asignacion` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `id_equ`, `id_fun`, `fa_asignacion`, `fd_asignacion`, `obs_asignacion`, `obsd_asignacion`, `carta_asignacion`, `cartad_asignacion`, `estatus_asignacion`) VALUES
(1, 7, 19, '2020-10-08', '0000-00-00', '', '', '/sistema/comodatos/asig-1638239407-ALEJANDRA_CANALES.pdf', '', 1),
(2, 8, 8, '2019-09-16', '0000-00-00', '', '', '/sistema/comodatos/asig-1638239543-ALEXANDRA_GUTIERREZ.pdf', '', 1),
(3, 9, 20, '2019-09-16', '0000-00-00', '', '', '/sistema/comodatos/asig-1638239633-ALICIA_CAÃ‘ETE.pdf', '', 1),
(4, 10, 10, '2021-10-26', '0000-00-00', '', '', '/sistema/comodatos/asig-1638239768-ARIEL_HORMAZABAL.pdf', '', 1),
(5, 11, 27, '2020-03-20', '0000-00-00', '', '', '/sistema/comodatos/asig-1638239975-CHRISTOPHER_GALLEGOS.pdf', '', 1),
(6, 12, 17, '2021-09-10', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240105-CLAUDIA_CACERES.pdf', '', 1),
(7, 13, 11, '2021-08-31', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240305-CLAUDIA_HUENCHULLAN.pdf', '', 1),
(8, 14, 13, '2021-11-23', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240461-FELIPE_PAVEZ.pdf', '', 1),
(9, 15, 3, '2017-08-16', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240561-FRANCISCA_GONZALEZ.pdf', '', 1),
(10, 16, 6, '2021-08-03', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240668-GERARDO_GONZALEZ.pdf', '', 1),
(11, 17, 5, '2019-09-16', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240759-ISOLINA_GONZALEZ.pdf', '', 1),
(12, 18, 26, '2021-07-05', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240848-IVAN_FUENTES.pdf', '', 1),
(13, 19, 22, '2019-09-16', '0000-00-00', '', '', '/sistema/comodatos/asig-1638240936-JOSE_DIAZ.pdf', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL,
  `nom_depto` varchar(40) NOT NULL,
  `estatus_depto` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depto`, `nom_depto`, `estatus_depto`) VALUES
(1, 'INFORMATICA', 1),
(2, 'RRHH', 1),
(3, 'OFICINA DE PARTES', 1),
(4, 'SERVICIOS GENERALES', 1),
(5, 'FINANZAS', 1),
(6, 'CONTABILIDAD', 1),
(7, 'ESTUDIOS Y PROYECTOS', 1),
(8, 'EDUCACION', 1),
(9, 'ABASTECIMIENTO', 1),
(10, 'COMUNICACIONES', 1),
(11, 'SECRETARIA GENERAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equ` int(11) NOT NULL,
  `ser_equ` varchar(20) NOT NULL,
  `licwin_equ` varchar(30) NOT NULL,
  `licoffice_equ` varchar(30) NOT NULL,
  `fadq_equ` date NOT NULL,
  `gtia_equ` int(11) NOT NULL,
  `usuarioi_equ` varchar(50) NOT NULL,
  `passi_equ` varchar(50) NOT NULL,
  `ip_equ` varchar(15) NOT NULL,
  `obs_equ` varchar(50) NOT NULL,
  `estatus_equ` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tipe` int(11) NOT NULL,
  `id_mar` int(11) NOT NULL,
  `id_mod` int(11) NOT NULL,
  `id_fun` int(11) NOT NULL,
  `asig_equ` int(11) NOT NULL,
  `mant_equ` int(11) NOT NULL,
  `id_depto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equ`, `ser_equ`, `licwin_equ`, `licoffice_equ`, `fadq_equ`, `gtia_equ`, `usuarioi_equ`, `passi_equ`, `ip_equ`, `obs_equ`, `estatus_equ`, `dateadd`, `id_tipe`, `id_mar`, `id_mod`, `id_fun`, `asig_equ`, `mant_equ`, `id_depto`) VALUES
(1, 'AIO2021', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2020-02-22', 12, '', '', '192.168.10.12', '', 1, '2021-11-28 22:23:44', 2, 1, 1, 1, 0, 1, 2),
(2, 'PF-1SZDXQ', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-03', 36, '', '', '192.168.10.12', '', 1, '2021-11-29 13:20:03', 2, 1, 2, 1, 0, 1, 1),
(3, 'kyo23rf', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-17', 24, '', '', '192.168.10.230', '', 1, '2021-11-29 13:21:14', 1, 1, 2, 1, 0, 1, 5),
(4, 'ASEWERK', '', '', '2021-11-02', 36, 'Admin', 'Admin', '192.168.10.239', '', 1, '2021-11-29 13:21:54', 3, 3, 1, 1, 0, 0, 9),
(5, 'ASEWERK2021', '', '', '2021-11-02', 12, 'Admin', 'Admin', '192.168.10.230', '', 1, '2021-11-29 13:22:25', 4, 2, 1, 1, 0, 1, 3),
(6, '-', '-', '-', '2021-11-04', 12, '', '', '-', '', 1, '2021-11-29 16:41:31', 2, 4, 1, 1, 0, 0, 11),
(7, '5CD938D1T', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:29:18', 1, 4, 4, 1, 1, 0, 11),
(8, '8CG84723LB', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:31:39', 1, 4, 5, 1, 1, 0, 8),
(9, '8CG84833YL', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:33:12', 1, 4, 5, 1, 1, 0, 8),
(10, 'SPF2RMB6J', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:35:34', 1, 1, 6, 1, 1, 0, 9),
(11, '5CD9353S5T', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:37:46', 1, 4, 4, 1, 1, 0, 2),
(12, 'PF2N1PB', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:41:15', 1, 1, 7, 1, 1, 0, 8),
(13, '5CD01040CR', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:44:04', 1, 4, 8, 1, 1, 0, 10),
(14, '4Z7HRF3', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:47:15', 1, 5, 9, 1, 1, 0, 7),
(15, 'MP1410AA', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:48:48', 1, 1, 10, 1, 1, 0, 8),
(16, 'CND1133NNS', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:50:46', 1, 4, 11, 1, 1, 0, 5),
(17, '8CG84833YN', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:52:14', 1, 4, 5, 1, 1, 0, 8),
(18, 'SPF2RN0KE', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:53:42', 1, 1, 6, 1, 1, 0, 9),
(19, '8CG84721WD', '', '', '2021-11-01', 12, '', '', '-', '', 1, '2021-11-29 23:55:10', 1, 4, 5, 1, 1, 0, 8),
(20, 'RNP58387938D342', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.175', '', 1, '2021-11-30 21:47:10', 3, 3, 12, 1, 0, 0, 7),
(21, 'RNP002673B096C9', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.209', '', 1, '2021-11-30 21:47:51', 3, 3, 13, 1, 0, 1, 8),
(22, 'RH-IMPRESORA-1', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.220', '', 1, '2021-11-30 21:48:36', 3, 3, 14, 1, 0, 0, 2),
(23, 'RH-IMPRESORA-2', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.222', '', 1, '2021-11-30 21:49:12', 3, 3, 16, 1, 0, 0, 2),
(24, 'RNP5838791AD6CF', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.230', '', 1, '2021-11-30 21:49:54', 3, 3, 15, 1, 0, 0, 8),
(25, 'RNP58387912E44F', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.231', '', 1, '2021-11-30 21:51:09', 3, 3, 16, 1, 0, 1, 5),
(26, 'RNP58387921E36B', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.233', '', 1, '2021-11-30 21:53:32', 3, 3, 17, 1, 0, 0, 11),
(27, 'RNP5838791319FD', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.235', '', 1, '2021-11-30 21:54:09', 3, 3, 18, 1, 0, 0, 11),
(28, 'EPS20112', '', '', '2021-11-01', 12, 'guest', 'EPSONWEB', '192.168.10.225', '', 1, '2021-11-30 22:04:18', 4, 2, 19, 1, 0, 0, 8),
(29, 'LJEPSON2021', '', '', '2021-11-01', 12, 'Admin', 'Admin', '192.168.10.174', '', 1, '2021-11-30 22:06:29', 3, 2, 20, 1, 0, 0, 8),
(30, 'CF-IP022', '', 'PNW3G-9VGBM-79FVB-X8R2R-BY6BK', '2021-11-01', 36, '', '', '192.168.10.22', '', 1, '2021-11-30 22:09:59', 2, 1, 1, 1, 0, 1, 6),
(31, 'CC-IP023', '', 'N8F9K-6FBV4-B6676-DPMRG-722MK', '2021-11-01', 36, '', '', '192.168.10.23', '', 1, '2021-11-30 22:11:06', 2, 1, 1, 1, 0, 0, 4),
(32, 'CC-IP024', '', '6FNX2-GXC7D-TX9KH-QGVDR-FC2MK', '2021-11-01', 36, '', '', '192.168.10.24', '', 1, '2021-11-30 22:11:55', 2, 1, 1, 1, 0, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_fun` int(11) NOT NULL,
  `rut_fun` varchar(10) NOT NULL,
  `nom_fun` varchar(50) NOT NULL,
  `ema_Fun` varchar(50) NOT NULL,
  `usuad_Fun` varchar(50) NOT NULL,
  `passad_Fun` varchar(100) NOT NULL,
  `estatus_fun` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `passgrt_Fun` varchar(100) NOT NULL,
  `id_depto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`id_fun`, `rut_fun`, `nom_fun`, `ema_Fun`, `usuad_Fun`, `passad_Fun`, `estatus_fun`, `dateadd`, `id_usu`, `id_rol`, `passgrt_Fun`, `id_depto`) VALUES
(1, '13567959-3', 'OSCAR ANDRES CONEJEROS DONOSO', 'oscar.conejeros@cormun.cl', 'oscar.conejeros@cormun.cl', 'ocondo', 1, '2021-11-28 21:50:37', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, '13503459-2', 'PATRICIO FERRADA RAMIREZ', 'patricio.ferrada@cormun.cl', 'patricio.ferrada@cormun.cl', '-', 1, '2021-11-28 22:07:52', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 9),
(3, '14519278-1', 'FRANCISCA GONZALEZ GAJARDO', 'francisca.gonzalez@cormun.cl', 'francisca.gonzalez@cormun.cl', 'fg29', 1, '2021-11-29 22:40:58', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(4, '11473545-0', 'ROBERTO GONZALEZ LOPEZ', 'roberto.gonzalez@cormun.cl', 'roberto.gonzalez@cormun.cl', 'rg25', 1, '2021-11-29 22:42:49', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 6),
(5, '12366021-8', 'ISOLINA GONZALEZ MENDOZA', 'isolina.gonzalez@cormun.cl', 'isolina.gonzalez@cormun.cl', 'ig01', 1, '2021-11-29 22:44:26', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(6, '16495654-7', 'GERARDO GONZALEZ SALAMANCA', 'gerardo.gonzalez@cormun.cl', 'gerardo.gonzalez@cormun.cl', 'gg27', 1, '2021-11-29 22:45:54', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 5),
(7, '16884438-7', 'MARIANA GOMEZ MADRID', 'mariana.gomez@cormun.cl', 'mariana.gomez@cormun.cl', '-', 1, '2021-11-29 22:47:28', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 2),
(8, '16661919-K', 'ALEXANDRA GUTIERREZ ALBORNOZ', 'alexandra.gutierrez@cormun.cl', 'alexandra.gutierrez@cormun.cl', 'ag02', 1, '2021-11-29 22:48:49', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(9, '13302669-K', 'SALOME HADDAD ORTIZ', 'salome.haddad@cormun.cl', 'salome.haddad@cormun.cl', 'sh10', 1, '2021-11-29 22:50:04', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(10, '12961628-8', 'ARIEL HORMAZABAL MORENO', 'ariel.hormazabal@cormun.cl', 'ariel.hormazabal@cormun.cl', '-', 1, '2021-11-29 22:51:27', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 9),
(11, '10340551-3', 'CLAUDIA HUENCHULLAN', 'claudia.huenchullan@cormun.cl', 'claudia.huenchullan@cormun.cl', '-', 1, '2021-11-29 22:52:44', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 10),
(12, '8449798-3', 'MARIO GONZALEZ ACUÃ‘A', 'mario.gonzalez@cormun.cl', 'mario.gonzalez@cormun.cl', '-', 1, '2021-11-29 22:53:36', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 11),
(13, '13301288-5', 'FELIPE PAVEZ VON MARTENS', 'felipe.pavez@cormun.cl', 'felipe.pavez@cormun.cl', '-', 1, '2021-11-29 22:54:50', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 7),
(14, '20005277-3', 'CATALINA CACERES SANDOVAL', 'catalina.caceres@cormun.cl', 'catalina.caceres@cormun.cl', 'cc04', 1, '2021-11-29 22:56:01', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 2),
(15, '15559460-8', 'EVELYN AMPUERO VARO', 'evelyn.ampuero@cormun.cl', 'evelyn.ampuero@cormun.cl', 'ea12', 1, '2021-11-29 22:57:16', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 9),
(16, '7762653-0', 'MARIO AVILES VARGAS', 'mario.aviles@cormun.cl', 'mario.aviles@cormun.cl', '-', 1, '2021-11-29 22:58:08', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 11),
(17, '10333006-8', 'CLAUDIA CACERES SANDOVAL', 'claudia.caceres@cormun.cl', 'claudia.caceres@cormun.cl', 'cc27', 1, '2021-11-29 22:59:23', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(18, '19589497-3', 'MARTIN CAMPOS BARRIA', 'martin.campos@cormun.cl', 'martin.campos@cormun.cl', 'mc05', 1, '2021-11-29 23:00:28', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 5),
(19, '12515962-1', 'ALEJANDRA CANALES CONTRERAS', 'alejandra.canales@cormun.cl', 'secretaria.general@cormun.cl', 'sg02', 1, '2021-11-29 23:01:37', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 11),
(20, '15803995-8', 'ALICIA CAÃ‘ETE BUSTAMANTE', 'alicia.canete@cormun.cl', 'alicia.canete@cormun.cl', 'ac02', 1, '2021-11-29 23:13:52', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(21, '8381511-6', 'RENE DE LA FUENTE HUIRIQUEO', 'rene.delafuente@cormun.cl', 'rene.delafuente@cormun.cl', 'rf19', 1, '2021-11-29 23:15:08', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 2),
(22, '13766187-K', 'JOSE DIAZ LOPEZ', 'jose.diaz@cormun.cl', 'jose.diaz@cormun.cl', 'jd23', 1, '2021-11-29 23:16:17', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(23, '7831337-4', 'LUIS ESCANILLA GAETE', 'luis.escanilla@cormun.cl', 'luis.escanilla@cormun.cl', 'le30', 1, '2021-11-29 23:17:44', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 4),
(24, '18044479-3', 'RODOLFO FARIAS', 'rodolfo.farias@cormun.cl', 'rodolfo.farias@cormun.cl', 'rf19', 1, '2021-11-29 23:18:47', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 9),
(25, '17505428-1', 'PAULINA FIGUEROA RUBIO', 'paulina.figueroa@cormun.cl', 'paulina.figueroa@cormun.cl', 'pf29', 1, '2021-11-29 23:19:57', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(26, '6948196-5', 'IVAN FUENTES CANALES', 'ivan.fuentes@cormun.cl', 'adquisiciones@cormun.cl', 'ad96', 1, '2021-11-29 23:21:10', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 9),
(27, '15107388-3', 'CHRISTOPHER GALLEGOS ARCE', 'christopher.gallegos@cormun.cl', 'christopher.gallegos@cormun.cl', 'cg24', 1, '2021-11-29 23:22:21', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 2),
(28, '10254698-9', 'MIROSLAVA GARRIDO CACERES', 'miroslava.garrido@cormun.cl', 'miroslava.garrido@cormun.cl', '-', 1, '2021-11-29 23:23:32', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8);

--
-- Disparadores `funcionarios`
--
DELIMITER $$
CREATE TRIGGER `TRIGGER_I_FUNCIONARIO` AFTER INSERT ON `funcionarios` FOR EACH ROW INSERT INTO log_funcionarios (accion_logf) VALUES (CURRENT_USER())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRIGGER_U_FUNCIONARIOS` AFTER UPDATE ON `funcionarios` FOR EACH ROW INSERT INTO log_funcionarios (accion_logf) VALUES (concat('id ant:',old.id_fun,' nombre ant:',old.nom_fun,'id nuevo:',new.id_fun,'nombre nuevo:',new.nom_fun))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_funcionarios`
--

CREATE TABLE `log_funcionarios` (
  `id_logf` int(11) NOT NULL,
  `accion_logf` varchar(255) NOT NULL,
  `fecha_logf` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log_funcionarios`
--

INSERT INTO `log_funcionarios` (`id_logf`, `accion_logf`, `fecha_logf`) VALUES
(1, 'Se actualizo el registro del funcionario id viejo:1 nombre viejo:OSCAR CONEJEROS DONOSOid nuevo:1nombre nuevo:OSCAR ANDRES CONEJEROS DONOSO', '2021-11-30 02:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion`
--

CREATE TABLE `mantencion` (
  `id_mantencion` int(11) NOT NULL,
  `fingreso_mantencion` date NOT NULL,
  `tipo_mantencion` varchar(11) NOT NULL,
  `ftermino_mantencion` date NOT NULL,
  `detalle_mantencion` varchar(500) NOT NULL,
  `canthojasa_mantencion` int(50) NOT NULL,
  `canthojasp_mantencion` int(50) NOT NULL,
  `informe_mantencion` varchar(500) NOT NULL,
  `id_equ` int(11) NOT NULL,
  `estatus_mantencion` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantencion`
--

INSERT INTO `mantencion` (`id_mantencion`, `fingreso_mantencion`, `tipo_mantencion`, `ftermino_mantencion`, `detalle_mantencion`, `canthojasa_mantencion`, `canthojasp_mantencion`, `informe_mantencion`, `id_equ`, `estatus_mantencion`) VALUES
(1, '2021-11-23', 'PREVENTIVA', '0000-00-00', 'LIMPIEZA', 0, 0, 'Mantencion semestral', 1, 1),
(2, '2021-11-23', 'CORRECTIVA', '0000-00-00', 'Reemplazo de pantalla', 0, 0, 'Pantalla quebrada.', 2, 1),
(3, '2021-11-09', 'PREVENTIVA', '0000-00-00', 'VIRUS', 0, 0, 'equipo lento', 30, 1),
(4, '2021-11-18', 'PREVENTIVA', '0000-00-00', 'VIRUS', 0, 0, 'equipo lento', 3, 1),
(5, '2021-11-26', 'PREVENTIVA', '0000-00-00', '', 20000, 30000, 'cambio de kit de mantencion', 21, 1),
(6, '2021-11-10', 'PREVENTIVA', '0000-00-00', 'VIRUS', 0, 0, 'equipo lento', 32, 1),
(7, '2021-11-09', 'PREVENTIVA', '0000-00-00', '', 15000, 20000, 'reemplazo kit de mantencion', 25, 1),
(8, '2021-11-19', 'PREVENTIVA', '0000-00-00', '', 0, 0, 'Filtro sucio', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_mar` int(11) NOT NULL,
  `nom_mar` varchar(20) NOT NULL,
  `estatus_mar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_mar`, `nom_mar`, `estatus_mar`) VALUES
(1, 'LENOVO', 1),
(2, 'EPSON', 1),
(3, 'RICOH', 1),
(4, 'HP', 1),
(5, 'DELL', 1),
(6, 'APPLE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_mod` int(11) NOT NULL,
  `nom_mod` varchar(40) NOT NULL,
  `estatus_mod` int(11) NOT NULL DEFAULT 1,
  `id_mar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_mod`, `nom_mod`, `estatus_mod`, `id_mar`) VALUES
(1, 'V510Z', 1, 1),
(2, 'THINKPAD P14S', 1, 1),
(3, 'THINKPAD X270', 1, 1),
(4, '14-DQ1001LA', 1, 4),
(5, 'ENVY', 1, 4),
(6, 'THINKPAD P15', 1, 1),
(7, 'IDEAPAD S540-13IML', 1, 1),
(8, '14-DQ1003LA', 1, 4),
(9, 'G5 15', 1, 5),
(10, 'YG 510-14ISK', 1, 1),
(11, 'ENVY 13-BA1124LA', 1, 4),
(12, 'C407', 1, 3),
(13, 'MP2554', 1, 3),
(14, 'MP2501SP', 1, 3),
(15, 'MPC2004ex', 1, 3),
(16, 'MP2555', 1, 3),
(17, 'MP6055', 1, 3),
(18, 'MPC307', 1, 3),
(19, 'POWERLITE W39', 1, 2),
(20, 'L575', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_Id` int(11) NOT NULL,
  `rol_Nom` varchar(20) NOT NULL,
  `estatus_rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_Id`, `rol_Nom`, `estatus_rol`) VALUES
(1, 'Administrador', 1),
(2, 'Tecnico', 1),
(3, 'Funcionario', 1),
(4, 'Consultor RRHH', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_equipos`
--

CREATE TABLE `tipos_equipos` (
  `id_tipe` int(11) NOT NULL,
  `nom_tipe` varchar(20) NOT NULL,
  `estatus_tipe` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_equipos`
--

INSERT INTO `tipos_equipos` (`id_tipe`, `nom_tipe`, `estatus_tipe`) VALUES
(1, 'NOTEBOOK', 1),
(2, 'AIO', 1),
(3, 'IMPRESORA', 1),
(4, 'PROYECTOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nom_usu` varchar(50) NOT NULL,
  `cor_usu` varchar(50) NOT NULL,
  `pass_usu` varchar(100) NOT NULL,
  `rol_Id` int(11) NOT NULL,
  `estatus_usu` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nom_usu`, `cor_usu`, `pass_usu`, `rol_Id`, `estatus_usu`) VALUES
(1, 'Oscar Conejeros Donoso', 'oscar.conejeros@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(2, 'Cristian Zuñiga Ortega', 'cristian.zuniga@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(3, 'Felipe Orostica Olivares', 'felipe.orostica@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(4, 'Vanessa Urzua', 'vanessa.urzua@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 4, 1),
(5, 'Sergio Barahona Maturana', 'sergio.barahona@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1),
(6, 'Jaime Vergara Dauvergne', 'jaime.vergara@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_equ` (`id_equ`),
  ADD KEY `id_fun` (`id_fun`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_depto`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equ`),
  ADD KEY `id_tipe` (`id_tipe`,`id_mar`,`id_mod`,`id_fun`,`id_depto`),
  ADD KEY `id_mar` (`id_mar`),
  ADD KEY `id_mod` (`id_mod`),
  ADD KEY `id_depto` (`id_depto`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_fun`),
  ADD KEY `id_usu` (`id_usu`,`id_rol`,`id_depto`),
  ADD KEY `id_depto` (`id_depto`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `log_funcionarios`
--
ALTER TABLE `log_funcionarios`
  ADD PRIMARY KEY (`id_logf`);

--
-- Indices de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  ADD PRIMARY KEY (`id_mantencion`),
  ADD KEY `id_equ` (`id_equ`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_mod`),
  ADD KEY `id_mar` (`id_mar`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_Id`);

--
-- Indices de la tabla `tipos_equipos`
--
ALTER TABLE `tipos_equipos`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `rol_Id` (`rol_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_depto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_fun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `log_funcionarios`
--
ALTER TABLE `log_funcionarios`
  MODIFY `id_logf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  MODIFY `id_mantencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_mar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_equipos`
--
ALTER TABLE `tipos_equipos`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_fun`) REFERENCES `funcionarios` (`id_fun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipos_equipos` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`id_mod`) REFERENCES `modelo` (`id_mod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_4` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantencion`
--
ALTER TABLE `mantencion`
  ADD CONSTRAINT `mantencion_ibfk_1` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_Id`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
