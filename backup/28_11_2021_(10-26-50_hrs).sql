SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_sgrt;

USE bd_sgrt;

DROP TABLE IF EXISTS asignacion;

CREATE TABLE `asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_equ` int(11) NOT NULL,
  `id_fun` int(11) NOT NULL,
  `fa_asignacion` date NOT NULL,
  `fd_asignacion` date NOT NULL,
  `obs_asignacion` varchar(500) NOT NULL,
  `obsd_asignacion` varchar(500) NOT NULL,
  `carta_asignacion` varchar(500) NOT NULL,
  `cartad_asignacion` varchar(500) NOT NULL,
  `estatus_asignacion` int(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_asignacion`),
  KEY `id_equ` (`id_equ`),
  KEY `id_fun` (`id_fun`),
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_fun`) REFERENCES `funcionarios` (`id_fun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO asignacion VALUES("1","14","1","2021-11-21","2021-11-21","lkjlkjlkj","listo","/sistema/comodatos/asig-1637500495-COMODATO_NOTEBOOK.pdf","/sistema/dev_comodato/asig-1637500588-ENTREGA_ABG.pdf","0");
INSERT INTO asignacion VALUES("2","14","3","2021-11-09","0000-00-00"," con mochila","","/sistema/comodatos/asig-1637715526-CARTA A Oscar Conejeros.pdf","","1");
INSERT INTO asignacion VALUES("3","21","1","2021-11-23","2021-11-24","","en buen estado","/sistema/comodatos/asig-1637715582-CARTA A Oscar Conejeros.pdf","/sistema/dev_comodato/asig-1637715991-RECEPCION_COMODATO_OSCAR CONEJEROS DONOSO.pdf","0");



DROP TABLE IF EXISTS departamentos;

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_depto` varchar(40) NOT NULL,
  `estatus_depto` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_depto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO departamentos VALUES("1","InformÃ¡tica","1");
INSERT INTO departamentos VALUES("2","RRHH","1");
INSERT INTO departamentos VALUES("3","Oficina de Partes","1");
INSERT INTO departamentos VALUES("4","Servicios Generales","1");
INSERT INTO departamentos VALUES("5","Finanzas","1");
INSERT INTO departamentos VALUES("6","Contabilidad","1");
INSERT INTO departamentos VALUES("7","Estudios y Proyectos","1");
INSERT INTO departamentos VALUES("8","EducaciÃ³n","1");
INSERT INTO departamentos VALUES("9","Abastecimiento","1");
INSERT INTO departamentos VALUES("10","Comunicaciones","1");
INSERT INTO departamentos VALUES("11","Secretaria General","1");



DROP TABLE IF EXISTS equipos;

CREATE TABLE `equipos` (
  `id_equ` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_depto` int(11) NOT NULL,
  PRIMARY KEY (`id_equ`),
  KEY `id_tipe` (`id_tipe`),
  KEY `id_mod` (`id_mod`),
  KEY `id_mar` (`id_mar`),
  KEY `id_depto` (`id_depto`),
  KEY `id_fun` (`id_fun`),
  CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipos_equipos` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`id_mod`) REFERENCES `modelo` (`id_mod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_4` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO equipos VALUES("1","ASEWERK","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-04","12","","","192.168.10.230","","1","2021-11-20 15:36:43","2","1","2","1","0","1","3");
INSERT INTO equipos VALUES("5","AIO2021","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-02","12","","","192.168.10.236","","1","2021-11-20 15:45:19","2","1","2","1","0","0","9");
INSERT INTO equipos VALUES("6","kyo23rf","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-02","12","","","192.168.10.239","","1","2021-11-20 16:02:52","2","1","2","1","0","0","11");
INSERT INTO equipos VALUES("14","ASEWERKjjjj","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-03","12","","","192.168.10.12","","1","2021-11-20 23:46:31","1","1","1","1","1","1","1");
INSERT INTO equipos VALUES("15","ASEWERKkjlkkljkl","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-21","36","","","192.168.10.238","","1","2021-11-21 01:05:02","2","1","2","1","0","0","3");
INSERT INTO equipos VALUES("16","ASEWERKlkjlkjnnnnm","","","2021-11-21","12","Admin","Admin","192.168.10.129","","1","2021-11-21 01:31:07","3","3","4","1","0","0","8");
INSERT INTO equipos VALUES("17","AIO2021hjkhk","","","2021-11-20","12","Admin","Admin","192.168.10.237","","1","2021-11-21 09:15:21","4","2","3","1","0","1","5");
INSERT INTO equipos VALUES("21","PF-1SZDXQjklj","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-21","12","","","","","1","2021-11-21 10:10:56","1","1","1","1","0","1","1");
INSERT INTO equipos VALUES("22","lkjlkiu8687","TX9XD-98N7V-6WMQ6-BX7FG-H8Q99","NPPR9-FWDCX-D2C8J-H872K-2YT43","2021-11-11","12","","","192.168.10.235","","1","2021-11-23 21:48:39","2","1","2","1","0","0","5");
INSERT INTO equipos VALUES("23","ASEWERK2311","","","2021-11-17","24","","","192.168.10.12","","1","2021-11-23 21:50:47","1","1","1","1","0","0","1");



DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id_fun` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_depto` int(11) NOT NULL,
  PRIMARY KEY (`id_fun`),
  KEY `id_usu` (`id_usu`),
  KEY `id_rol` (`id_rol`),
  KEY `id_depto` (`id_depto`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("1","13567959-3","OSCAR ANDRES CONEJEROS DONOSO","oscar.conejeros@cormun.cl","oscar.conejeros@cormun.cl","ocondo","1","2021-11-21 09:39:03","1","3","81dc9bdb52d04dc20036dbd8313ed055","1");
INSERT INTO funcionarios VALUES("2","5805304-K","HECTOR CONEJEROS PEÃ‘A","hector.conejeros@cormun.cl","hector.conejeros@cormun.cl","hc17","1","2021-11-22 15:39:31","1","3","81dc9bdb52d04dc20036dbd8313ed055","2");
INSERT INTO funcionarios VALUES("3","7232365-3","MARIA DONOSO PEREZ","maria.donoso@cormun.cl","maria.donoso@cormun.cl","md29","1","2021-11-22 15:40:21","1","3","81dc9bdb52d04dc20036dbd8313ed055","6");
INSERT INTO funcionarios VALUES("4","21640900-0","FLORENCIA IGNACIA CONEJEROS TOBAR","florencia.conejeros@cormun.cl","florencia.conejeros@cormun.cl","fc21","1","2021-11-22 15:41:56","1","3","81dc9bdb52d04dc20036dbd8313ed055","8");
INSERT INTO funcionarios VALUES("5","22680653-8","TOMAS ANDRES CONEJEROS TOBAR","tomas.conejeros@cormun.cl","tomas.conejeros@cormun.cl","TC28","1","2021-11-22 15:59:32","1","3","81dc9bdb52d04dc20036dbd8313ed055","11");
INSERT INTO funcionarios VALUES("6","12345678-9","JAIME","JAIME@CORMUN.CL","JAIME@CORMUN.CL","1234","1","2021-11-22 16:03:06","1","3","81dc9bdb52d04dc20036dbd8313ed055","1");
INSERT INTO funcionarios VALUES("7","16650248-9","AMALIA ANTONIA MARILAF CASTRO","amalia.marilaf@cormun.cl","amalia.marilaf@cormun.cl","af01","1","2021-11-22 16:12:16","1","3","81dc9bdb52d04dc20036dbd8313ed055","6");



DROP TABLE IF EXISTS mantencion;

CREATE TABLE `mantencion` (
  `id_mantencion` int(11) NOT NULL AUTO_INCREMENT,
  `fingreso_mantencion` date NOT NULL,
  `tipo_mantencion` varchar(11) NOT NULL COMMENT 'Preventiva/Correctiva',
  `ftermino_mantencion` date NOT NULL,
  `detalle_mantencion` varchar(500) NOT NULL,
  `canthojasa_mantencion` int(50) NOT NULL COMMENT 'Cant. hojas Actual',
  `canthojasp_mantencion` int(50) NOT NULL COMMENT 'Cant. hojas Próxima',
  `informe_mantencion` varchar(500) NOT NULL,
  `id_equ` int(11) NOT NULL,
  `estatus_mantencion` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mantencion`),
  KEY `id_equ` (`id_equ`),
  CONSTRAINT `mantencion_ibfk_1` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO mantencion VALUES("1","2021-11-21","PREVENTIVA","0000-00-00","Mantencion Preventiva Semestral","0","0","Preventiva","1","1");
INSERT INTO mantencion VALUES("2","2021-11-22","CORRECTIVA","0000-00-00","PANTALLA ROTA","0","0","SOLICITUD DE CAMBIO PANTALLA","14","1");
INSERT INTO mantencion VALUES("3","2021-11-24","PREVENTIVA","0000-00-00","Limpieza","0","0","Soplar, limpiar, etc...","1","1");
INSERT INTO mantencion VALUES("4","2021-11-09","CORRECTIVA","0000-00-00","","0","0","lklkjlkj","17","1");
INSERT INTO mantencion VALUES("5","2021-11-04","CORRECTIVA","0000-00-00","VIRUS","0","0","lkjlkj","1","1");
INSERT INTO mantencion VALUES("6","2021-11-03","CORRECTIVA","0000-00-00","lkjlkjlkj","0","0","lkjlkjlkjlj","21","1");



DROP TABLE IF EXISTS marcas;

CREATE TABLE `marcas` (
  `id_mar` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(20) NOT NULL,
  `estatus_mar` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO marcas VALUES("1","LENOVO","1");
INSERT INTO marcas VALUES("2","EPSON","1");
INSERT INTO marcas VALUES("3","RICOH","1");



DROP TABLE IF EXISTS modelo;

CREATE TABLE `modelo` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(40) NOT NULL,
  `estatus_mod` int(11) NOT NULL DEFAULT 1,
  `id_mar` int(11) NOT NULL,
  PRIMARY KEY (`id_mod`),
  KEY `id_mar` (`id_mar`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO modelo VALUES("1","THINKPAD P14S","1","1");
INSERT INTO modelo VALUES("2","V510Z","1","1");
INSERT INTO modelo VALUES("3","Powerlite E20","1","2");
INSERT INTO modelo VALUES("4","MP 2555","1","2");



DROP TABLE IF EXISTS pma__bookmark;

CREATE TABLE `pma__bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';




DROP TABLE IF EXISTS pma__central_columns;

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`db_name`,`col_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';




DROP TABLE IF EXISTS pma__column_info;

CREATE TABLE `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';




DROP TABLE IF EXISTS pma__designer_settings;

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';




DROP TABLE IF EXISTS pma__export_templates;

CREATE TABLE `pma__export_templates` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';




DROP TABLE IF EXISTS pma__favorite;

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';




DROP TABLE IF EXISTS pma__history;

CREATE TABLE `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';




DROP TABLE IF EXISTS pma__navigationhiding;

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';




DROP TABLE IF EXISTS pma__pdf_pages;

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';




DROP TABLE IF EXISTS pma__recent;

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';




DROP TABLE IF EXISTS pma__relation;

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';




DROP TABLE IF EXISTS pma__savedsearches;

CREATE TABLE `pma__savedsearches` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';




DROP TABLE IF EXISTS pma__table_coords;

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float unsigned NOT NULL DEFAULT 0,
  `y` float unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';




DROP TABLE IF EXISTS pma__table_info;

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';




DROP TABLE IF EXISTS pma__table_uiprefs;

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';




DROP TABLE IF EXISTS pma__tracking;

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';




DROP TABLE IF EXISTS pma__userconfig;

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';




DROP TABLE IF EXISTS pma__usergroups;

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`,`tab`,`allowed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';




DROP TABLE IF EXISTS pma__users;

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`,`usergroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';




DROP TABLE IF EXISTS rol;

CREATE TABLE `rol` (
  `rol_Id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_Nom` varchar(20) NOT NULL,
  `estatus_rol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`rol_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO rol VALUES("1","Administrador","1");
INSERT INTO rol VALUES("2","Tecnico","1");
INSERT INTO rol VALUES("3","Funcionario","1");
INSERT INTO rol VALUES("4","Consultor RRHH","1");



DROP TABLE IF EXISTS tipos_equipos;

CREATE TABLE `tipos_equipos` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipe` varchar(20) NOT NULL,
  `estatus_tipe` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO tipos_equipos VALUES("1","NOTEBOOK","1");
INSERT INTO tipos_equipos VALUES("2","AIO","1");
INSERT INTO tipos_equipos VALUES("3","IMPRESORA","1");
INSERT INTO tipos_equipos VALUES("4","PROYECTOR","1");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(50) NOT NULL,
  `cor_usu` varchar(50) NOT NULL,
  `pass_usu` varchar(100) NOT NULL,
  `rol_Id` int(11) NOT NULL,
  `estatus_usu` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usu`),
  KEY `id_rol` (`rol_Id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_Id`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("1","Oscar Conejeros Donoso","oscar.conejeros@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","1","1");
INSERT INTO usuarios VALUES("2","Cristian Zuñiga Ortega","cristian.zuniga@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","2","1");
INSERT INTO usuarios VALUES("3","Felipe Orostica Olivares","felipe.orostica@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","2","1");
INSERT INTO usuarios VALUES("4","Vanessa Urzua","vanessa.urzua@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","4","1");
INSERT INTO usuarios VALUES("5","Sergio Barahona Maturana","sergio.barahona@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","4","1");



SET FOREIGN_KEY_CHECKS=1;