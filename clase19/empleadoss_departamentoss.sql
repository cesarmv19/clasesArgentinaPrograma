-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2021 a las 20:17:30
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empleadoss_departamentoss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `codDepto` varchar(4) COLLATE utf8_bin NOT NULL,
  `nombreDpto` varchar(20) COLLATE utf8_bin NOT NULL,
  `ciudad` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `codDirector` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`codDepto`),
  KEY `FK_EmpDir` (`codDirector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codDepto`, `nombreDpto`, `ciudad`, `codDirector`) VALUES
('1000', 'GERENCIA', 'CORDOBA', '31.840.269'),
('1500', 'PRODUCCIÓN', 'CORDOBA', '16.211.383'),
('2000', 'VENTAS', 'CORDOBA', '31.178.144'),
('2100', 'VENTAS', 'BUENOS AIRES', '16.211.383'),
('2200', 'VENTAS', 'ROSARIO', '16.211.383'),
('2300', 'VENTAS', 'FORMOSA', '16.759.060'),
('3000', 'INVESTIGACIÓN', 'CORDOBA', '16.759.060'),
('3500', 'MERCADEO', 'CORDOBA', '22.222.222'),
('3600', 'MERCADEO', 'Formosa', NULL),
('4000', 'MANTENIMIENTO', 'CORDOBA', '333.333.333'),
('4100', 'MANTENIMIENTO', 'BUENOS AIRES', '16.759.060'),
('4200', 'MANTENIMIENTO', 'ROSARIO', '16.759.060'),
('4300', 'MANTENIMIENTO', 'FORMOSA', '16.759.060'),
('6000', 'INVESTIGACION', 'FORMOSA', NULL),
('8000', 'INVESTIGACIÓN', 'Formosa', NULL),
('9000', 'Ventas', 'Buenos Aires', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `nDIEmp` varchar(12) COLLATE utf8_bin NOT NULL,
  `nomEmp` varchar(30) COLLATE utf8_bin NOT NULL,
  `sexEmp` char(1) COLLATE utf8_bin NOT NULL,
  `fecNac` date NOT NULL,
  `fecIncorporacion` date NOT NULL,
  `salEmp` float NOT NULL,
  `comisionE` float NOT NULL,
  `cargoE` varchar(15) COLLATE utf8_bin NOT NULL,
  `jefeID` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `codDepto` varchar(4) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`nDIEmp`),
  KEY `FK_Empl` (`jefeID`),
  KEY `FK_Dpto` (`codDepto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`nDIEmp`, `nomEmp`, `sexEmp`, `fecNac`, `fecIncorporacion`, `salEmp`, `comisionE`, `cargoE`, `jefeID`, `codDepto`) VALUES
('1.130.222', 'José Giraldo', 'M', '1985-01-20', '2000-11-01', 25000, 4000, 'Asesor', '22.222.222', '3500'),
('1.130.333', 'Pedro Blanco', 'M', '1987-10-28', '2000-10-01', 80000, 6000, 'Vendedor', '31.178.144', '2000'),
('1.130.444', 'Jesús Alfonso', 'M', '1988-03-14', '2000-10-01', 80000, 3500, 'Vendedor', '31.178.144', '2000'),
('1.130.555', 'Julián Mora', 'M', '1989-07-03', '2000-10-01', 80000, 3100, 'Vendedor', '31.178.144', '2200'),
('1.130.666', 'Manuel Millán', 'M', '1990-12-08', '2004-06-01', 80000, 3700, 'Vendedor', '31.178.144', '2300'),
('1.130.777', 'Marcos Cortez', 'M', '1986-06-23', '2000-04-16', 25000, 5000, 'Mecánico', '333.333.333', '4000'),
('1.130.782', 'Antonio Gil', 'M', '1980-01-23', '2010-04-16', 85000, 0, 'Técnico', '16.211.383', '1500'),
('1.751.219', 'Melissa Roa', 'F', '1960-06-19', '2001-03-16', 22600, 2500, 'Vendedor', '31.178.144', '2100'),
('11.111.111', 'Irene Díaz', 'F', '1979-09-28', '2004-06-01', 17000, 2000, 'Mecánico', '333.333.333', '4200'),
('123223', 'Cordoba German', 'M', '2000-11-03', '2010-10-02', 35000, 15000, 'Asesor', NULL, '3500'),
('16.211.383', 'Luis Pérez', 'M', '1956-02-25', '2000-01-01', 100000, 0, 'Director', '31.840.269', '1500'),
('16.759.060', 'Darío Casas', 'M', '1960-04-05', '1992-11-01', 45000, 5000, 'Investigador', '31.840.269', '3000'),
('19.709.802', 'William Daza', 'M', '1982-10-09', '1999-12-16', 60000, 12000, 'Investigador', '16.759.060', '3000'),
('22.222.222', 'Carla López', 'F', '1975-05-11', '2005-07-16', 45000, 5000, 'Jefe Mercadeo', '31.840.269', '3500'),
('22.222.333', 'Carlos Rozo', 'M', '1975-05-11', '2001-09-16', 75000, 5000, 'Vigilante', '31.840.269', '3500'),
('31.174.099', 'Diana Solarte', 'F', '1957-11-19', '1990-05-16', 26000, 5000, 'Secretaria', '31.840.269', '1000'),
('31.178.144', 'Rosa Angulo', 'F', '1957-03-15', '1998-08-16', 33500, 3500, 'Jefe Ventas', '31.840.269', '2000'),
('31.840.269', 'María Rojas', 'F', '1959-01-15', '1990-05-16', 62500, 15800, 'Gerente', NULL, '1000'),
('333.333.333', 'Elisa Rojas', 'F', '1979-09-28', '2004-06-01', 38000, 11780, 'Jefe Mecánicos', '31.840.269', '4000'),
('333.333.334', 'Marisol Pulido', 'F', '1979-10-01', '1990-05-16', 41700, 10400, 'Investigador', '16.759.060', '3000'),
('333.333.335', 'Ana Moreno', 'F', '1992-01-05', '2004-06-01', 29000, 4000, 'Secretaria', '16.759.060', '3000'),
('333.333.336', 'Carolina Ríos', 'F', '1992-02-15', '2000-10-01', 34900, 5000, 'Secretaria', '16.211.383', '1500'),
('333.333.337', 'Edith Muñoz', 'F', '1992-03-31', '2000-10-01', 8000, 8000, 'Vendedor', '31.178.144', '2100'),
('444.444', 'Abel Gómez', 'M', '1939-12-24', '2000-10-01', 16000, 6000, 'Mecánico', '333.333.333', '4300'),
('737.689', 'Mario Llano', 'M', '1945-08-30', '1990-05-16', 22800, 16900, 'Vendedor', '31.178.144', '2300'),
('768.782', 'Joaquín Rosas', 'M', '1947-07-07', '1990-05-16', 43600, 13200, 'Vendedor', '31.178.144', '2200'),
('888.888', 'Iván Duarte', 'M', '1955-08-12', '1998-05-16', 24400, 2000, 'Mecánico', '333.333.333', '4100');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `FK_EmpDir` FOREIGN KEY (`codDirector`) REFERENCES `empleadoss` (`jefeID`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `FK_Dpto` FOREIGN KEY (`codDepto`) REFERENCES `departamentos` (`codDepto`),
  ADD CONSTRAINT `FK_Empl` FOREIGN KEY (`jefeID`) REFERENCES `empleados` (`nDIEmp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
