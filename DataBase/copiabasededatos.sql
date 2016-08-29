-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 13:46:28
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

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id_administrador`, `Id_usuario`) VALUES
(1, 6),
(3, 6),
(5, 6),
(4, 36),
(2, 37);

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

--
-- Volcado de datos para la tabla `centro_servicio`
--

INSERT INTO `centro_servicio` (`Id_centro`, `Id_administrador`, `Id_ciudad`, `Nombre`, `Direccion`, `Email`, `Telefono`, `ubicacion_1`, `ubicacion_2`, `atencion`, `inicio`, `fin`, `fotos`) VALUES
(4, 1, 6, 'prueba centro', 'prueba', 'prueba@prueba.com', '123', '', '', '', '00:00:00', '00:00:00', ''),
(6, 2, 19, 'adssadadad', 'adsadasdsadasd', 'asdasdasd@adsda.com', '12312123123123', '', '', '', '00:00:00', '00:00:00', ''),
(7, 1, 17, 'adsadasd', 'asdasdasd', 'asdasdasd@adsda.com', '1231242342131', '', '', '', '00:00:00', '00:00:00', ''),
(8, 1, 17, 'esfdgagvetshsgfgdgf', 'gfsdasdsddsdfdfd', 'sadsdfasdfdsdffdfsd@qwrfgsdsda.com', '2132423214253412', '', '', '', '00:00:00', '00:00:00', ''),
(9, 1, 17, 'prueba centro', 'centro calle centro', 'centro@enyro.com', '1231212312', '', '', '', '00:00:00', '00:00:00', ''),
(10, 1, 17, 'asd', 'asd', 'asdasd@sadasd.com', '1231', '', '', '', '00:00:00', '00:00:00', ''),
(11, 1, 17, 'asdfgh', 'weasfdh', 'sdafs@sad.com', '2134567', '', '', '', '00:00:00', '00:00:00', ''),
(12, 1, 17, 'asfdgh', 'asfdsgfdhf', 'asfdad@asdaa.q', '235463456', '', '', '', '00:00:00', '00:00:00', ''),
(13, 1, 17, 'SDAFSDGH', 'ASFDGH', 'sdff@asfdsgh.com', '21345678', '', '', '', '00:00:00', '00:00:00', '');

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
  `hora` date NOT NULL
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

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`Id_ciudad`, `Id_departamento`, `Nombre`) VALUES
(6, 9, 'El Encanto'),
(7, 9, 'La Chorrera'),
(8, 9, 'La Pedrera'),
(9, 9, 'La Victoria'),
(10, 9, 'Leticia'),
(11, 9, 'Mirití-Paraná'),
(12, 9, 'Puerto Alegría'),
(13, 9, 'Puerto Arica'),
(14, 9, 'Puerto Nariño'),
(15, 9, 'Puerto Santander'),
(16, 9, 'Tarapacá'),
(17, 10, 'Abejorral'),
(18, 10, 'Abriaquí'),
(19, 10, 'Alejandría'),
(20, 10, 'Amagá'),
(21, 10, 'Amalfi'),
(22, 10, 'Andes'),
(23, 10, 'Angelópolis'),
(24, 10, 'Angostura'),
(25, 10, 'Anorí'),
(26, 10, 'Santa fe de Antioquia'),
(27, 10, 'Anzá'),
(28, 10, 'Apartadó'),
(29, 10, 'Arboletes'),
(30, 10, 'Argelia'),
(31, 10, 'Armenia'),
(32, 10, 'Barbosa'),
(33, 10, 'Bello'),
(34, 10, 'Belmira'),
(35, 10, 'Betania'),
(36, 10, 'Betulia'),
(37, 10, 'Ciudad Bolívar'),
(38, 10, 'Briceño'),
(39, 10, 'Buriticá'),
(40, 10, 'Cáceres'),
(41, 10, 'Caicedo'),
(42, 10, 'Caldas'),
(43, 10, 'Campamento'),
(44, 10, 'Cañasgordas'),
(45, 10, 'Caracolí'),
(46, 10, 'Caramanta'),
(47, 10, 'Carepa'),
(48, 10, 'Carmen de Viboral'),
(49, 10, 'Carolina del Príncipe'),
(50, 10, 'Caucasia'),
(51, 10, 'Chigorodó'),
(52, 10, 'Cisneros'),
(53, 10, 'Cocorná'),
(54, 10, 'Concepción'),
(55, 10, 'Concordia'),
(56, 10, 'Copacabana'),
(57, 10, 'Dabeiba'),
(58, 10, 'Donmatías'),
(59, 10, 'Ebéjico'),
(60, 10, 'El Bagre'),
(61, 10, 'El Peñol'),
(62, 10, 'El Retiro'),
(63, 10, 'El Santuario'),
(64, 10, 'Entrerríos'),
(65, 10, 'Envigado'),
(66, 10, 'Fredonia'),
(67, 10, 'Frontino'),
(68, 10, 'Giraldo'),
(69, 10, 'Girardota'),
(70, 10, 'Gómez Plata'),
(71, 10, 'Granada'),
(72, 10, 'Guadalupe'),
(73, 10, 'Guarne'),
(74, 10, 'Guatapé'),
(75, 10, 'Heliconia'),
(76, 10, 'Hispania'),
(77, 10, 'Itagüí'),
(78, 10, 'Ituango'),
(79, 10, 'Jardín'),
(80, 10, 'Jericó'),
(81, 10, 'La Ceja'),
(82, 10, 'La Estrella'),
(83, 10, 'La Pintada'),
(84, 10, 'La Unión'),
(85, 10, 'Liborina'),
(86, 10, 'Maceo'),
(87, 10, 'Marinilla'),
(88, 10, 'Medellín'),
(89, 10, 'Montebello'),
(90, 10, 'Murindó'),
(91, 10, 'Mutatá'),
(92, 10, 'Nariño'),
(93, 10, 'Nechí'),
(94, 10, 'Necoclí'),
(95, 10, 'Olaya'),
(96, 10, 'Peque'),
(97, 10, 'Pueblorrico'),
(98, 10, 'Puerto Berrío'),
(99, 10, 'Puerto Nare'),
(100, 10, 'Puerto Triunfo'),
(101, 10, 'Remedios'),
(102, 10, 'Rionegro'),
(103, 10, 'Sabanalarga'),
(104, 10, 'Sabaneta'),
(105, 10, 'Salgar'),
(106, 10, 'San Andrés de Cuerquia'),
(107, 10, 'San Carlos'),
(108, 10, 'San Francisco'),
(109, 10, 'San Jerónimo'),
(110, 10, 'San José de la Montaña'),
(111, 10, 'San Juan de Urabá'),
(112, 10, 'San Luis'),
(113, 10, 'San Pedro de los Milagros'),
(114, 10, 'San Pedro de Urabá'),
(115, 10, 'San Rafael'),
(116, 10, 'San Roque'),
(117, 10, 'San Vicente'),
(118, 10, 'Santa Bárbara'),
(119, 10, 'Santa Rosa de Osos'),
(120, 10, 'Santo Domingo'),
(121, 10, 'Segovia'),
(122, 10, 'Sonsón'),
(123, 10, 'Sopetrán'),
(124, 10, 'Támesis'),
(125, 10, 'Tarazá'),
(126, 10, 'Tarso'),
(127, 10, 'Titiribí'),
(128, 10, 'Toledo'),
(129, 10, 'Turbo'),
(130, 10, 'Uramita'),
(131, 10, 'Urrao'),
(132, 10, 'Valdivia'),
(133, 10, 'Valparaíso'),
(134, 10, 'Vegachí'),
(135, 10, 'Venecia'),
(136, 10, 'Vigía del Fuerte'),
(137, 10, 'Yalí'),
(138, 10, 'Yarumal'),
(139, 10, 'Yolombó'),
(140, 10, 'Yondó'),
(141, 10, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id_departamento` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Id_departamento`, `Nombre`) VALUES
(9, 'Amazonas'),
(10, 'Antioquia'),
(11, 'Arauca'),
(12, 'Atlántico'),
(13, 'Bogotá'),
(14, 'Bolívar'),
(15, 'Boyacá'),
(16, 'Caldas'),
(17, 'Caquetá'),
(18, 'Casanare'),
(19, 'Cauca'),
(20, 'Cesar'),
(21, 'Chocó'),
(22, 'Córdoba'),
(23, 'Cundinamarca'),
(24, 'Guainía'),
(25, 'Guaviare'),
(26, 'Huila'),
(27, 'La Guajira'),
(28, 'Magdalena'),
(29, 'Meta'),
(30, 'Nariño'),
(31, 'Norte de Santander'),
(32, 'Putumayo'),
(33, 'Quindío'),
(34, 'Risaralda'),
(35, 'San Andrés y Providencia'),
(36, 'Santander'),
(37, 'Sucre'),
(38, 'Tolima'),
(39, 'Valle del Cauca'),
(40, 'Vaupés'),
(41, 'Vichada'),
(42, 'Arauca');

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

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Id_empleado`, `Id_usuario`, `Id_centro`, `Id_servicio`, `Inicio`, `Fin`) VALUES
(2, 1, 4, 4, '00:00:00', '00:00:00'),
(3, 9, 4, 4, '00:00:00', '00:00:00');

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

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Id_servicio`, `Id_centro`, `Id_tipo`, `Nombre`) VALUES
(4, 4, 2, 'prueba asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `Id_tipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`Id_tipo`, `Nombre`) VALUES
(2, 'prueba tipo servicio'),
(3, 'prueba tipo');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Tipo_usuario`, `Nombre`, `Apellido`, `Clave`, `Email`, `Telefono`, `Sexo`, `Estado`) VALUES
(1, 'Desarrollador', 'prueba 2', 'ochoa', '123123123', 'admin@admin.com', '123', 'Masculino', 'Activo'),
(6, 'Administrador', 'prueba admin', 'prueba admin ape', '123456789', '123@123.com', '123', 'Masculino', 'Activo'),
(9, 'Usuario', '12345', '123456', '123', '12345@w.co', '1122222', 'Sin especificar', 'Activo'),
(12, 'Usuario', 'Michael', 'Gonzalez', '12345678', 'maicol_0117@hotmail.es', '2811731', 'Masculino', 'Activo'),
(18, 'Usuario', '123', '123', '123456789', '123@qwe.vo', '1234567', 'Femenino', 'Activo'),
(19, 'Usuario', '123', '123', 'qqqwertyuio1', '123@qwe.vo', '1234567', 'Femenino', 'Activo'),
(20, 'Usuario', '111', '111', '11134567876655', 'qwe@ss.co', '1234567876', 'Femenino', 'Activo'),
(21, 'Usuario', '123', '123', '1321ed234df3q2fr54', '3fr2q@wedcqwr.cosa', '123435676543', 'Femenino', 'Activo'),
(22, 'Usuario', 'aas', 'asd', 'asasasas', 'asdasd@asdf.co', '12345678', 'Femenino', 'Activo'),
(23, 'Desarrollador', 'prueba desarrollo', 'prueba desa', '123456789', '123@123.com', '123333333', 'Masculino', 'Activo'),
(24, 'Desarrollador', 'ppppp', 'pppppppppppp', '123123123123', '123@123.com', '123123123', 'Masculino', 'Activo'),
(25, 'Usuario', 'michael', 'gonzalez', '12345678', 'rlochoa1@misena.edu.co', '2811731', 'Masculino', 'Activo'),
(26, 'Usuario', 'sdasda', 'adsada', 'dasadsadsda', 'asda@asdda.co', '1231323', 'Femenino', 'Activo'),
(27, 'Usuario', 'asdasdad', 'asdasdada', 'sdadssdafdfa', 'asdas@asdasdsad.com', '1231231', 'Femenino', 'Activo'),
(28, 'Usuario', 'asdasdad', 'dsadasdasd', 'asdasdsadasd', 'asdasdasd@adsda.com', '1231232', 'Sin especificar', 'Activo'),
(29, 'Usuario', 'asdasdad', 'asdasdada', 'sdaaasdas', 'asda@asdda.co', '1231232231', 'Masculino', 'Activo'),
(30, 'Usuario', 'asdasdad', 'asdasdada', 'asdadsdasdas', 'dsad@asdasd.com', '1231231231', 'Femenino', 'Activo'),
(31, 'Usuario', 'qqweqw', 'sdas', 'asdadsasda', 'sdasd@asdasda.com', '213321342', 'Femenino', 'Activo'),
(32, 'Usuario', 'wsqedasd', 'asdasdasd', 'adsadsas', 'admin@admin.com', '1231341', 'Masculino', 'Activo'),
(33, 'Desarrollador', 'saasdsaa', 'asdasdada', 'asdasadsd', 'asdas@asdasdsad.com', '1231231213', 'Femenino', 'Activo'),
(34, 'Usuario', 'sdadasd', 'asdadsa', 'adssasdads', 'asdas@asdasdsad.com', '1231113213', 'Masculino', 'Activo'),
(35, 'Desarrollador', 'prueba desarrollo', 'prueba desarrollo', 'pruebadesarrollo', 'pruebadesarrollo@desarrollo.com', '123123123', 'Masculino', 'Activo'),
(36, 'Administrador', 'prueba administrador', 'administrador prueba', '123123123', '123@123.com', '123123123', 'Femenino', 'Activo'),
(37, 'Administrador', 'prueba admins q', 'admins q', 'qweqweqwe', 'qwe@qwe.com', '123123123', 'Femenino', 'Activo'),
(38, 'Desarrollador', 'asdasad', 'adsasdasd', 'adsadsadsadsa', 'adssd@sddasaqwd.qweq', '2123112312', 'Masculino', 'Activo'),
(39, 'Usuario', 'ddafadfas', 'asdasdasd', 'asdasdasdasd', 'asdasd@sadasd.com', '123213123', 'Masculino', 'Activo'),
(40, 'Usuario', 'adfasdas', 'dasdasdasd', 'sadasdasdasd', 'asdasd@sadasd.com', '32123132123', 'Femenino', 'Activo'),
(41, 'Usuario', 'sadasda', 'sadsdas', 'dsaasdasdasd', 'asdasd@sadasd.com', '2312312312', 'Femenino', 'Activo'),
(42, 'Usuario', 'asdadsa', 'adasdaasda', 'asdasdasd', 'asdasd@sadasd.com', '12312412412', 'Masculino', 'Activo'),
(43, 'Usuario', 'sadasda', 'asdasdasd', 'adasdasasd', 'asdasd@sadasd.com', '12343253', 'Femenino', 'Activo'),
(44, 'Usuario', 'sddsadasd', 'asdasdfa', 'adasdasda', 'asdasd@sadasd.com', '12341321', 'Masculino', 'Activo'),
(45, 'Usuario', 'asdasdasd', 'asdasd', 'asdasdasd', 'asdasd@sadasd.com', '123141234', 'Masculino', 'Activo'),
(46, 'Usuario', 'asdasdasd', 'asdasd', 'adasdasdasdasd', 'asdasd@sadasd.com', '123123123', 'Masculino', 'Activo'),
(47, 'Usuario', 'sdfaddas', 'asadafdsf', 'asdasdaf', 'asdasd@sadasd.com', '124413241232', 'Masculino', 'Activo'),
(48, 'Usuario', 'asdasdasd', 'asdas', 'sadasdaSDASD', 'asdasd@sadasd.com', '12312312', 'Masculino', 'Activo'),
(49, 'Usuario', 'pruebas super asdasd', 'pruebas super asdasd', 'pruebas super asdasd', 'pruebas@sdasd.com', '245234241254', 'Femenino', 'Activo'),
(50, 'Desarrollador', 'hola admin', 'apellido', 'contraseña', 'correo@electro.nico', '31212332', 'Masculino', 'Activo'),
(51, 'Usuario', 'sda', 'asd', 'asdasdasd', 'asdasd@sadasd.com', '1231231', 'Femenino', 'Activo'),
(52, 'Empleado', 'prueba empleado', 'prueba empleado', 'empleado', 'empleado@empleado.com', '123123123', 'Femenino', 'Activo'),
(53, 'Empleado', 'asd', 'asdasdasd', 'asd', 'asdasd@sadasd.com', 'asda', 'Femenino', 'Activo'),
(54, 'Empleado', 'asdas', 'asdad', 'asdasd', 'asdasd', 'asdsada', 'Femenino', 'Activo'),
(55, 'Empleado', 'asfd', 'afsd', 'asf', 'asfdad@asdaa.q', 'asf', 'Femenino', 'Activo'),
(56, 'Empleado', 'sad', 'ad', 'asd', 'asdasd', 'as', 'Femenino', 'Activo'),
(57, 'Empleado', 'sad', 'ad', '', 'asdasd', 'as', 'Femenino', 'Activo'),
(58, 'Empleado', 'sad', 'ad', '', 'asdasd', 'as', 'Femenino', 'Activo'),
(59, 'Usuario', 'asdas', 'asdas', 'asdasdqsa', 'asdasd@sadasd.com', '123124124', 'Femenino', 'Activo'),
(60, 'Administrador', 'asdasdasd', 'ads', 'asdasdfafsd', 'asdasd@sadasd.com', '124143223', 'Femenino', 'Activo'),
(61, 'Empleado', 'asdas', 'asdasdas', 'asdasdsdad', 'asdasd@sadasd.com', 'asdasdasd', 'Femenino', 'Activo'),
(62, 'Empleado', 'asdas', 'asdasdas', '1235413143', 'asdasd@sadasd.com', 'asdasdasd', 'Femenino', 'Activo'),
(63, 'Empleado', '142354', '12345', '134253', '134253', '12345', 'Femenino', 'Activo'),
(64, 'Empleado', '142354', '12345', 'awsdas', '134253', '12345', 'Femenino', 'Activo'),
(65, 'Empleado', '142354', '12345', '', '134253', '12345', 'Femenino', 'Activo'),
(66, 'Desarrollador', 'asdasd', 'asdasd', 'asdasdasd', 'asdasd@sadasd.com', '123123123', 'Masculino', 'Activo'),
(67, 'Desarrollador', 'asdfd', 'asdfsfd', 'a2qwret2343', 'asdasd@sadasd.com', '12432543674', 'Masculino', 'Activo'),
(68, 'Desarrollador', 'asdfgdf', 'adsfgs', 'sadfgadsfgh', 'asdfghas@asfdgdb.com', '1234567', 'Femenino', 'Activo'),
(69, 'Administrador', 'asdfdg', 'asdfgh', '12345675432', 'asdasd@sadasd.com', '12345678', 'Masculino', 'Activo'),
(70, 'Administrador', 'asdfdg', 'asdfgh', '123456789', 'asdasd@sadasd.com', '12345678', 'Masculino', 'Activo'),
(71, 'Empleado', 'wearsfdg', 'adsfhj', 'dfsghj', 'asdsfg@asfdgh.com', '123456567', 'Femenino', 'Activo');

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
  MODIFY `Id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `centro_servicio`
--
ALTER TABLE `centro_servicio`
  ADD CONSTRAINT `centro_servicio_ibfk_2` FOREIGN KEY (`Id_administrador`) REFERENCES `administrador` (`Id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `centro_servicio_ibfk_3` FOREIGN KEY (`Id_ciudad`) REFERENCES `ciudad` (`Id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`Id_empleado`) REFERENCES `empleado` (`Id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`Id_departamento`) REFERENCES `departamento` (`Id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`Id_servicio`) REFERENCES `servicio` (`Id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`Id_tipo`) REFERENCES `tipo_servicio` (`Id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`Id_centro`) REFERENCES `centro_servicio` (`Id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
