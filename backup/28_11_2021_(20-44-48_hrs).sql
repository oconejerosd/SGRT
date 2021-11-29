SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS wsgrt;

USE wsgrt;

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
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_fun`) REFERENCES `funcionarios` (`id_fun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS departamentos;

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_depto` varchar(40) NOT NULL,
  `estatus_depto` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_depto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS equipos;

CREATE TABLE `equipos` (
  `id_equ` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_depto` int(11) NOT NULL,
  PRIMARY KEY (`id_equ`),
  KEY `id_tipe` (`id_tipe`,`id_mar`,`id_mod`,`id_fun`,`id_depto`),
  KEY `id_mar` (`id_mar`),
  KEY `id_mod` (`id_mod`),
  KEY `id_depto` (`id_depto`),
  CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipos_equipos` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`id_mod`) REFERENCES `modelo` (`id_mod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `equipos_ibfk_4` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id_fun` int(11) NOT NULL AUTO_INCREMENT,
  `rut_fun` varchar(10) NOT NULL,
  `nom_fun` varchar(50) NOT NULL,
  `ema_Fun` varchar(50) NOT NULL,
  `usuad_Fun` varchar(50) NOT NULL,
  `passad_Fun` varchar(100) NOT NULL,
  `estatus_fun` int(11) NOT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `passgrt_Fun` varchar(100) NOT NULL,
  `id_depto` int(11) NOT NULL,
  PRIMARY KEY (`id_fun`),
  KEY `id_usu` (`id_usu`,`id_rol`,`id_depto`),
  KEY `id_depto` (`id_depto`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_depto`) REFERENCES `departamentos` (`id_depto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS mantencion;

CREATE TABLE `mantencion` (
  `id_mantencion` int(11) NOT NULL AUTO_INCREMENT,
  `fingreso_mantencion` date NOT NULL,
  `tipo_mantencion` varchar(11) NOT NULL,
  `ftermino_mantencion` date NOT NULL,
  `detalle_mantencion` varchar(500) NOT NULL,
  `canthojasa_mantencion` int(50) NOT NULL,
  `canthojasp_mantencion` int(50) NOT NULL,
  `informe_mantencion` varchar(500) NOT NULL,
  `id_equ` int(11) NOT NULL,
  `estatus_mantencion` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mantencion`),
  KEY `id_equ` (`id_equ`),
  CONSTRAINT `mantencion_ibfk_1` FOREIGN KEY (`id_equ`) REFERENCES `equipos` (`id_equ`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS marcas;

CREATE TABLE `marcas` (
  `id_mar` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(20) NOT NULL,
  `estatus_mar` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS modelo;

CREATE TABLE `modelo` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(40) NOT NULL,
  `estatus_mod` int(11) NOT NULL DEFAULT 1,
  `id_mar` int(11) NOT NULL,
  PRIMARY KEY (`id_mod`),
  KEY `id_mar` (`id_mar`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_mar`) REFERENCES `marcas` (`id_mar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(50) NOT NULL,
  `cor_usu` varchar(50) NOT NULL,
  `pass_usu` varchar(100) NOT NULL,
  `rol_Id` int(11) NOT NULL,
  `estatus_usu` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usu`),
  KEY `rol_Id` (`rol_Id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_Id`) REFERENCES `rol` (`rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("1","Oscar Conejeros Donoso","oscar.conejeros@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","1","1");
INSERT INTO usuarios VALUES("2","Cristian Zuñiga Ortega","cristian.zuniga@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","2","1");
INSERT INTO usuarios VALUES("3","Felipe Orostica Olivares","felipe.orostica@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","2","1");
INSERT INTO usuarios VALUES("4","Vanessa Urzua","vanessa.urzua@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","4","1");
INSERT INTO usuarios VALUES("5","Sergio Barahona Maturana","sergio.barahona@cormun.cl","81dc9bdb52d04dc20036dbd8313ed055","2","1");



SET FOREIGN_KEY_CHECKS=1;