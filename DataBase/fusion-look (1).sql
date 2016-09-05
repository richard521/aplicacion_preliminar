-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2016 a las 03:45:57
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fusion-look`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id_administrador` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_servicio`
--

CREATE TABLE `centro_servicio` (
  `Id_centro` int(11) NOT NULL,
  `Id_administrador` int(11) NOT NULL,
  `Id_ciudad` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `ubicacion_1` longtext NOT NULL,
  `ubicacion_2` longtext NOT NULL,
  `atencion` varchar(100) NOT NULL,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `fotos` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `Id_cita` int(11) NOT NULL,
  `Id_centro` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_empleado` int(11) NOT NULL,
  `Fecha_cita` varchar(50) NOT NULL,
  `hora` time NOT NULL,
  `jornada` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Id_ciudad` int(11) NOT NULL,
  `Id_departamento` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id_departamento` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_empleado` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_centro` int(11) NOT NULL,
  `Id_servicio` int(11) NOT NULL,
  `Inicio` time NOT NULL,
  `Fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Id_servicio` int(11) NOT NULL,
  `Id_centro` int(11) NOT NULL,
  `Id_tipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `Id_tipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Tipo_usuario` varchar(50) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Clave` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id_administrador`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `centro_servicio`
--
ALTER TABLE `centro_servicio`
  ADD PRIMARY KEY (`Id_centro`),
  ADD KEY `Id_ciudad` (`Id_ciudad`),
  ADD KEY `Id_administrador` (`Id_administrador`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`Id_cita`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_empleado` (`Id_empleado`),
  ADD KEY `Id_centro` (`Id_centro`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`Id_ciudad`),
  ADD KEY `Id_departamento` (`Id_departamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_empleado`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_centro` (`Id_centro`),
  ADD KEY `Id_servicio` (`Id_servicio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Id_servicio`),
  ADD KEY `Id_centro` (`Id_centro`),
  ADD KEY `Id_tipo` (`Id_tipo`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`Id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `centro_servicio`
--
ALTER TABLE `centro_servicio`
  MODIFY `Id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `Id_cita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `Id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `Id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `centro_servicio`
--
ALTER TABLE `centro_servicio`
  ADD CONSTRAINT `centro_servicio_ibfk_3` FOREIGN KEY (`Id_ciudad`) REFERENCES `ciudad` (`Id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `centro_servicio_ibfk_4` FOREIGN KEY (`Id_administrador`) REFERENCES `administrador` (`Id_administrador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`Id_empleado`) REFERENCES `empleado` (`Id_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_5` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`Id_departamento`) REFERENCES `departamento` (`Id_departamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`Id_servicio`) REFERENCES `servicio` (`Id_servicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_4` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_5` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_3` FOREIGN KEY (`Id_tipo`) REFERENCES `tipo_servicio` (`Id_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicio_ibfk_4` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
