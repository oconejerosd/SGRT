-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 05:47:28
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
-- Base de datos: `bd_sgrt`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dataDashboard` ()  BEGIN
		DECLARE usuarios int;
        DECLARE computadores int;
        DECLARE notebooks int;
        DECLARE impresoras int;
        DECLARE proyectores int;
        
        SELECT COUNT(*) INTO usuarios FROM funcionarios WHERE estatus_fun = 1;
        SELECT COUNT(*) INTO computadores FROM equipos WHERE id_tipe = 2 AND estatus_equ = 1;
        SELECT COUNT(*) INTO notebooks FROM equipos WHERE id_tipe = 1 AND estatus_equ = 1;
        SELECT COUNT(*) INTO impresoras FROM equipos WHERE id_tipe = 3 AND estatus_equ = 1;
        SELECT COUNT(*) INTO proyectores FROM equipos WHERE id_tipe = 4 AND estatus_equ = 1;
        
        SELECT usuarios,computadores,notebooks,impresoras,proyectores;


	END$$

DELIMITER ;

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
(1, 14, 1, '2021-11-21', '2021-11-21', 'lkjlkjlkj', 'listo', '/sistema/comodatos/asig-1637500495-COMODATO_NOTEBOOK.pdf', '/sistema/dev_comodato/asig-1637500588-ENTREGA_ABG.pdf', 0),
(2, 14, 3, '2021-11-09', '0000-00-00', ' con mochila', '', '/sistema/comodatos/asig-1637715526-CARTA A Oscar Conejeros.pdf', '', 1),
(3, 21, 1, '2021-11-23', '2021-11-24', '', 'en buen estado', '/sistema/comodatos/asig-1637715582-CARTA A Oscar Conejeros.pdf', '/sistema/dev_comodato/asig-1637715991-RECEPCION_COMODATO_OSCAR CONEJEROS DONOSO.pdf', 0);

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
(1, 'InformÃ¡tica', 1),
(2, 'RRHH', 1),
(3, 'Oficina de Partes', 1),
(4, 'Servicios Generales', 1),
(5, 'Finanzas', 1),
(6, 'Contabilidad', 1),
(7, 'Estudios y Proyectos', 1),
(8, 'EducaciÃ³n', 1),
(9, 'Abastecimiento', 1),
(10, 'Comunicaciones', 1),
(11, 'Secretaria General', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equ` int(11) NOT NULL,
  `ser_equ` varchar(20) NOT NULL COMMENT 'Serie Equipo',
  `licwin_equ` varchar(30) NOT NULL,
  `licoffice_equ` varchar(30) NOT NULL,
  `fadq_equ` date NOT NULL COMMENT 'Fecha Adquisición',
  `gtia_equ` int(11) NOT NULL COMMENT 'Garantía',
  `usuarioi_equ` varchar(50) NOT NULL,
  `passi_equ` varchar(50) NOT NULL,
  `ip_equ` varchar(15) NOT NULL,
  `obs_equ` varchar(50) NOT NULL COMMENT 'Observacion Equipo',
  `estatus_equ` int(11) NOT NULL DEFAULT 1,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tipe` int(11) NOT NULL,
  `id_mar` int(11) NOT NULL,
  `id_mod` int(11) NOT NULL,
  `id_fun` int(11) NOT NULL,
  `asig_equ` int(11) NOT NULL DEFAULT 0,
  `mant_equ` int(11) NOT NULL DEFAULT 0 COMMENT 'Mantencion Equipo',
  `id_depto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equ`, `ser_equ`, `licwin_equ`, `licoffice_equ`, `fadq_equ`, `gtia_equ`, `usuarioi_equ`, `passi_equ`, `ip_equ`, `obs_equ`, `estatus_equ`, `dateadd`, `id_tipe`, `id_mar`, `id_mod`, `id_fun`, `asig_equ`, `mant_equ`, `id_depto`) VALUES
(1, 'ASEWERK', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-04', 12, '', '', '192.168.10.230', '', 1, '2021-11-20 15:36:43', 2, 1, 2, 1, 0, 1, 3),
(5, 'AIO2021', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-02', 12, '', '', '192.168.10.236', '', 1, '2021-11-20 15:45:19', 2, 1, 2, 1, 0, 0, 9),
(6, 'kyo23rf', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-02', 12, '', '', '192.168.10.239', '', 1, '2021-11-20 16:02:52', 2, 1, 2, 1, 0, 0, 11),
(14, 'ASEWERKjjjj', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-03', 12, '', '', '192.168.10.12', '', 1, '2021-11-20 23:46:31', 1, 1, 1, 1, 1, 1, 1),
(15, 'ASEWERKkjlkkljkl', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-21', 36, '', '', '192.168.10.238', '', 1, '2021-11-21 01:05:02', 2, 1, 2, 1, 0, 0, 3),
(16, 'ASEWERKlkjlkjnnnnm', '', '', '2021-11-21', 12, 'Admin', 'Admin', '192.168.10.129', '', 1, '2021-11-21 01:31:07', 3, 3, 4, 1, 0, 0, 8),
(17, 'AIO2021hjkhk', '', '', '2021-11-20', 12, 'Admin', 'Admin', '192.168.10.237', '', 1, '2021-11-21 09:15:21', 4, 2, 3, 1, 0, 1, 5),
(21, 'PF-1SZDXQjklj', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-21', 12, '', '', '', '', 1, '2021-11-21 10:10:56', 1, 1, 1, 1, 0, 1, 1),
(22, 'lkjlkiu8687', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', '2021-11-11', 12, '', '', '192.168.10.235', '', 1, '2021-11-23 21:48:39', 2, 1, 2, 1, 0, 0, 5),
(23, 'ASEWERK2311', '', '', '2021-11-17', 24, '', '', '192.168.10.12', '', 1, '2021-11-23 21:50:47', 1, 1, 1, 1, 0, 0, 1);

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
(1, '13567959-3', 'OSCAR ANDRES CONEJEROS DONOSO', 'oscar.conejeros@cormun.cl', 'oscar.conejeros@cormun.cl', 'ocondo', 1, '2021-11-21 09:39:03', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, '5805304-K', 'HECTOR CONEJEROS PEÃ‘A', 'hector.conejeros@cormun.cl', 'hector.conejeros@cormun.cl', 'hc17', 1, '2021-11-22 15:39:31', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 2),
(3, '7232365-3', 'MARIA DONOSO PEREZ', 'maria.donoso@cormun.cl', 'maria.donoso@cormun.cl', 'md29', 1, '2021-11-22 15:40:21', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 6),
(4, '21640900-0', 'FLORENCIA IGNACIA CONEJEROS TOBAR', 'florencia.conejeros@cormun.cl', 'florencia.conejeros@cormun.cl', 'fc21', 1, '2021-11-22 15:41:56', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 8),
(5, '22680653-8', 'TOMAS ANDRES CONEJEROS TOBAR', 'tomas.conejeros@cormun.cl', 'tomas.conejeros@cormun.cl', 'TC28', 1, '2021-11-22 15:59:32', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 11),
(6, '12345678-9', 'JAIME', 'JAIME@CORMUN.CL', 'JAIME@CORMUN.CL', '1234', 1, '2021-11-22 16:03:06', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(7, '16650248-9', 'AMALIA ANTONIA MARILAF CASTRO', 'amalia.marilaf@cormun.cl', 'amalia.marilaf@cormun.cl', 'af01', 1, '2021-11-22 16:12:16', 1, 3, '81dc9bdb52d04dc20036dbd8313ed055', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion`
--

CREATE TABLE `mantencion` (
  `id_mantencion` int(11) NOT NULL,
  `fingreso_mantencion` date NOT NULL,
  `tipo_mantencion` varchar(11) NOT NULL COMMENT 'Preventiva/Correctiva',
  `ftermino_mantencion` date NOT NULL,
  `detalle_mantencion` varchar(500) NOT NULL,
  `canthojasa_mantencion` int(50) NOT NULL COMMENT 'Cant. hojas Actual',
  `canthojasp_mantencion` int(50) NOT NULL COMMENT 'Cant. hojas Próxima',
  `informe_mantencion` varchar(500) NOT NULL,
  `id_equ` int(11) NOT NULL,
  `estatus_mantencion` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mantencion`
--

INSERT INTO `mantencion` (`id_mantencion`, `fingreso_mantencion`, `tipo_mantencion`, `ftermino_mantencion`, `detalle_mantencion`, `canthojasa_mantencion`, `canthojasp_mantencion`, `informe_mantencion`, `id_equ`, `estatus_mantencion`) VALUES
(1, '2021-11-21', 'PREVENTIVA', '0000-00-00', 'Mantencion Preventiva Semestral', 0, 0, 'Preventiva', 1, 1),
(2, '2021-11-22', 'CORRECTIVA', '0000-00-00', 'PANTALLA ROTA', 0, 0, 'SOLICITUD DE CAMBIO PANTALLA', 14, 1),
(3, '2021-11-24', 'PREVENTIVA', '0000-00-00', 'Limpieza', 0, 0, 'Soplar, limpiar, etc...', 1, 1),
(4, '2021-11-09', 'CORRECTIVA', '0000-00-00', '', 0, 0, 'lklkjlkj', 17, 1),
(5, '2021-11-04', 'CORRECTIVA', '0000-00-00', 'VIRUS', 0, 0, 'lkjlkj', 1, 1),
(6, '2021-11-03', 'CORRECTIVA', '0000-00-00', 'lkjlkjlkj', 0, 0, 'lkjlkjlkjlj', 21, 1);

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
(3, 'RICOH', 1);

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
(1, 'THINKPAD P14S', 1, 1),
(2, 'V510Z', 1, 1),
(3, 'Powerlite E20', 1, 2),
(4, 'MP 2555', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

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
(5, 'Sergio Barahona Maturana', 'sergio.barahona@cormun.cl', '81dc9bdb52d04dc20036dbd8313ed055', 4, 1);

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
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `id_mod` (`id_mod`),
  ADD KEY `id_mar` (`id_mar`),
  ADD KEY `id_depto` (`id_depto`),
  ADD KEY `id_fun` (`id_fun`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_fun`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_depto` (`id_depto`);

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
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

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
  ADD KEY `id_rol` (`rol_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_depto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_fun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  MODIFY `id_mantencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_mar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_equipos`
--
ALTER TABLE `tipos_equipos`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_fun`) REFERENCES `funcionarios` (`id_fun`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
