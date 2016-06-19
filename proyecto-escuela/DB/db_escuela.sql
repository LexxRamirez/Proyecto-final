-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2016 a las 20:07:59
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_escuela`
--
CREATE DATABASE IF NOT EXISTS `db_escuela` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `db_escuela`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
`id_alumno` int(11) NOT NULL,
  `anho` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nie` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `anho_ultimo_grado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `minicipio_ultimo_grado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `discapacidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estudio_especial` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `recidencia` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_datos` int(11) DEFAULT NULL,
  `id_eco` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `anho`, `matricula`, `nombre`, `nie`, `anho_ultimo_grado`, `minicipio_ultimo_grado`, `codigo`, `discapacidad`, `estudio_especial`, `recidencia`, `fecha_nacimiento`, `edad`, `id_grado`, `id_datos`, `id_eco`) VALUES
(2, '2016', '1234-34', 'Marcela Perez', '5678', '2015', 'San Michel', '1217', 'nell', 'lol', 'urbana', '23/12/2015', '45', 6, 2, 2),
(3, '', '', 'Jose Jose Romero', '', '', '', '', '', '', '', '', '', 1, 3, 3),
(4, '', '', 'Juan Prez Rodriges', '', '', '', '', '', '', '', '', '', 1, 4, 4),
(5, '', '', 'Jose Miguel Martinez', '', '', '', '', '', '', '', '', '', 1, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
`id_docente` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nombre`, `usuario`, `direccion`, `telefono`, `dui`, `clave`, `id_grado`) VALUES
(1, 'Marlon Garcias', 'Gusz', 'Kame House', '77454545', '1234567890', '123456', 1),
(2, 'Romes Gomes', 'Romero', 'Wuano', '73246798', '277438380', '1234567', 2),
(3, 'Mario Lopez', 'Mario', 'Rook Bat', '73475898', '747392834', '2121', 3),
(7, 'Marcos Garcias', 'Marcos', 'Rook Bat', '74753285', '94758693', '12345678', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
`id_grado` int(11) NOT NULL,
  `nombre_grado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `nombre_grado`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuato'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
`id_materia` int(11) NOT NULL,
  `materia` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `materia`) VALUES
(1, 'Matematicas'),
(2, 'Lenguaje'),
(3, 'Sociales'),
(4, 'Ciencias'),
(5, 'Ingles'),
(6, 'Informatica'),
(7, 'Educacion fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `periodo1` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `periodo2` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `periodo3` varchar(24) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_materia`, `id_grado`, `id_docente`, `id_alumno`, `periodo1`, `periodo2`, `periodo3`) VALUES
(2, 2, 1, 1, 4, '5.66-6.34-7.12-2.4', '9.0-10-9.82-1.2', '5.66-6.34-7.12-5.5'),
(3, 2, 1, 1, 2, '5.66-6.34-7.12-4.4', '1.4-3.4-3.4-3.4', '5.66-6.34-7.12-4.6'),
(24, 5, 1, 1, 5, '9-9-9-9', '9-9-9-9', '9-9-9-9'),
(26, 3, 1, 1, 2, '7-7-8-2.60', '4-4-3-1.25', '8-8-8-2.40'),
(27, 3, 1, 1, 3, '8-8-7-2.65', '8-7-5-2.25', '10-10-10-3.00'),
(28, 3, 1, 1, 4, '7-5-4-1.80', '5-8-5-2.05', '8-8-8-2.40'),
(29, 3, 1, 1, 5, '4-4-5-1.55', '8-6-8-2.60', '9-9-9-2.70'),
(34, 1, 1, 1, 2, '9-9-9-3.15', '', ''),
(35, 1, 1, 1, 3, '8-8-8-2.80', '', ''),
(36, 1, 1, 1, 4, '7-7-7-2.45', '', ''),
(37, 1, 1, 1, 5, '6-6-6-2.10', '', ''),
(41, 1, 6, 1, 2, '10-7-8-2.90', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_datos`
--

CREATE TABLE IF NOT EXISTS `otros_datos` (
`id_datos` int(11) NOT NULL,
  `repite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `parbularia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `sobredad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `trabajo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vive` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vacunas` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `encargado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tel_casa` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tel_cel` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `otros_datos`
--

INSERT INTO `otros_datos` (`id_datos`, `repite`, `parbularia`, `sobredad`, `trabajo`, `vive`, `enfermedad`, `vacunas`, `encargado`, `dui`, `tel_casa`, `tel_cel`) VALUES
(1, 'si', 'no', ' si', 'limpia botas', 'mama', 'ninguna', 'no', 'Jose Marvin', '09098987', '2345345', '345356'),
(2, 'si', 'no', ' si', 'limpia botas', 'mama', 'ninguna', 'no', 'Jose Marvin', '09098987', '2345345', '345356'),
(3, 'si', 'no', ' si', 'limpia botas', 'mama', 'ninguna', 'no', 'Jose Marvin', '09098987', '2345345', '345356'),
(4, 'si', 'no', ' si', 'limpia botas', 'mama', 'ninguna', 'no', 'Jose Marvin', '09098987', '2345345', '345356'),
(5, 'si', 'no', ' si', 'limpia botas', 'mama', 'ninguna', 'no', 'Jose Marvin', '09098987', '2345345', '345356');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion_economica`
--

CREATE TABLE IF NOT EXISTS `situacion_economica` (
`id_eco` int(11) NOT NULL,
  `ingreso` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `vivienda` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `embarazo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `parto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Nmadre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edadM` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `sabeM` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Npadre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edadP` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Psabe` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nhermanos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nhermanas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `comportamiento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `documentos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `situacion_economica`
--

INSERT INTO `situacion_economica` (`id_eco`, `ingreso`, `vivienda`, `embarazo`, `parto`, `Nmadre`, `edadM`, `sabeM`, `Npadre`, `edadP`, `Psabe`, `Nhermanos`, `Nhermanas`, `comportamiento`, `documentos`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`id_alumno`), ADD KEY `id_grado` (`id_grado`), ADD KEY `id_datos` (`id_datos`), ADD KEY `id_eco` (`id_eco`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
 ADD PRIMARY KEY (`id_docente`), ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
 ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_matera` (`id_materia`), ADD KEY `id_grado` (`id_grado`), ADD KEY `id_docente` (`id_docente`), ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `otros_datos`
--
ALTER TABLE `otros_datos`
 ADD PRIMARY KEY (`id_datos`);

--
-- Indices de la tabla `situacion_economica`
--
ALTER TABLE `situacion_economica`
 ADD PRIMARY KEY (`id_eco`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `otros_datos`
--
ALTER TABLE `otros_datos`
MODIFY `id_datos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `situacion_economica`
--
ALTER TABLE `situacion_economica`
MODIFY `id_eco` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
ADD CONSTRAINT `id_datos` FOREIGN KEY (`id_datos`) REFERENCES `otros_datos` (`id_datos`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_eco` FOREIGN KEY (`id_eco`) REFERENCES `situacion_economica` (`id_eco`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_grado_fk` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
ADD CONSTRAINT `id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_docente` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
