-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 23:14:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `codigo_curso` varchar(5) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `codigo_curso`, `descripcion`, `horario`, `estado`) VALUES
(1, 'A011', 'Matematicas', '10:00', 1),
(2, 'A002', 'Idioma', '9:00', 1),
(3, 'A003', 'Ciencias Sociales', '10:00', 0),
(4, 'A004', 'Diseño', '11:00', 0),
(5, 'A005', 'computacion', '14:00', 1),
(6, 'A006', 'Ciencias Naturales', '13:00', 0),
(16, 'A012', 'Cultura', '13:00', 1),
(17, 'A013', 'Sociales', '14:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `descripcion`, `estado`) VALUES
(1, 'Guatemala', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inscripcion`
--

CREATE TABLE `detalle_inscripcion` (
  `id_detalle_inscripcion` int(5) NOT NULL,
  `id_enca_inscripcion` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_inscripcion`
--

INSERT INTO `detalle_inscripcion` (`id_detalle_inscripcion`, `id_enca_inscripcion`, `id_curso`) VALUES
(25, 31, 1),
(26, 31, 2),
(27, 31, 5),
(28, 31, 16),
(29, 32, 2),
(30, 32, 5),
(31, 32, 16),
(32, 33, 17),
(33, 33, 1),
(34, 33, 5),
(35, 33, 2),
(36, 33, 16),
(37, 34, 1),
(38, 34, 2),
(39, 35, 1),
(40, 35, 2),
(41, 35, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `cui` int(13) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `cui`, `nombre`, `apellido`, `fec_nac`, `telefono`, `id_puesto`, `id_escuela`, `estado`) VALUES
(1, 123456, 'Jose Elias', 'Cruz Perez', '1994-01-02', '30730799', 2, 1, 1),
(2, 654321, 'Edgar Leonel', 'Ruiz Cerna', '1994-01-02', '54151444', 2, 1, 0),
(4, 2147483647, 'Jose Elias', 'Cruz Perez', '2019-01-03', '54151439', 2, 1, 1),
(6, 987654, 'Edgar Leonel', 'Ruiz Ã±ince', '2017-01-01', '54144423', 1, 1, 1),
(7, 78263869, 'Edgar Junaj', 'Puj Lopez', '2019-05-01', '76523617', 3, 1, 0),
(8, 2147483647, 'Noel Mario', 'Martinez Lopez', '2019-05-19', '54234322', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enca_inscripcion`
--

CREATE TABLE `enca_inscripcion` (
  `id_enca_inscripcion` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_salon` int(11) DEFAULT NULL,
  `periodo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enca_inscripcion`
--

INSERT INTO `enca_inscripcion` (`id_enca_inscripcion`, `id_estudiante`, `id_grado`, `id_escuela`, `fecha`, `id_salon`, `periodo`) VALUES
(31, 1, 1, 1, '2019-05-19', 1, '2015'),
(32, 2, 2, 1, '2019-05-19', 2, '2016'),
(33, 3, 5, 1, '2019-05-19', 6, '2019'),
(34, 8, 5, 1, '2019-05-21', 6, '2019'),
(35, 5, 4, 1, '2019-05-21', 5, '2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `descripcion`, `id_municipio`, `estado`) VALUES
(1, 'Escuela UMG', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `cui` int(14) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `carne` int(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `cui`, `nombre`, `apellido`, `fec_nac`, `direccion`, `telefono`, `carne`, `estado`) VALUES
(1, 123456, 'MANUEL EDUARDO', 'AGUILAR LOJA', '1992-03-12', '8VA AVENIDA', '12113', 103937, 1),
(2, 654321, 'MARIA EULALIA', 'AGUIRRE MORA', '1992-03-12', '8VA AVENIDA', '132131', 104069, 1),
(3, 987654, 'JOSE OVIDIO', 'AGUIRRE MOSQUERA', '1992-03-12', '8VA AVENIDA', '123123', 2309796, 1),
(4, 456789, 'LEONCIO DAMIAN', 'AGUIRRE OCHOA', '1992-03-12', '8VA AVENIDA', '12312312', 101736, 1),
(5, 975310, 'ANGELICA VIVIANA', 'ALBARRACIN MURILLO', '1992-03-12', '8VA AVENIDA', '123123', 104848, 1),
(6, 135790, 'SANDRA ELIZABETH', 'ALTAFULLA MACIAS', '1992-03-12', '8VA AVENIDA', '1321312', 101363, 1),
(7, 125689, 'MAYRA CECILIA', 'ALVARADO NEIRA', '1992-03-12', '8VA AVENIDA', '132321312', 1736905, 1),
(8, 397643, 'BORIS PAUL', 'ALVARADO ORELLANA', '1992-03-12', '8VA AVENIDA', '1312312', 102962, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `descripcion`, `estado`) VALUES
(1, 'Primero', 1),
(2, 'Segundo', 1),
(3, 'Tercero', 1),
(4, 'Cuarto', 1),
(5, 'Quinto', 1),
(6, 'Sexto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `descripcion`, `id_departamento`, `estado`) VALUES
(1, 'Ciudad de Guatemala', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_notas` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_notas`, `id_estudiante`, `id_curso`, `nota`) VALUES
(1, 1, 1, 61),
(2, 1, 2, 75),
(3, 1, 3, 80),
(4, 1, 4, 88),
(5, 1, 5, 94),
(6, 1, 6, 68),
(7, 2, 1, 34),
(8, 2, 2, 65),
(9, 2, 3, 67),
(10, 2, 4, 77),
(11, 2, 5, 84),
(12, 2, 6, 63),
(13, 3, 1, 77),
(14, 3, 2, 70),
(15, 3, 3, 69),
(16, 3, 4, 80),
(17, 3, 5, 90),
(18, 3, 6, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `Descripcion`, `estado`) VALUES
(1, 'maesto', 1),
(2, 'Director', 1),
(3, 'Concerje', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id_salon` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id_salon`, `descripcion`, `cantidad`, `estado`) VALUES
(1, 'Salon 1', 35, 1),
(2, 'Salon 2', 35, 1),
(3, 'Salon 3', 35, 1),
(4, 'Salon 4', 35, 1),
(5, 'Salon 5', 35, 1),
(6, 'Salon 6', 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Tipo_usuario` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Usuario`, `Password`, `Tipo_usuario`, `id_empleado`, `estado`) VALUES
(1, 'jcruzp', '123456', 1, 1, 1),
(2, 'jestrada', 'a123', 2, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `detalle_inscripcion`
--
ALTER TABLE `detalle_inscripcion`
  ADD PRIMARY KEY (`id_detalle_inscripcion`),
  ADD KEY `asignacion de Cursos_idx` (`id_curso`),
  ADD KEY `encabezado de inscripcion_idx` (`id_enca_inscripcion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `Asignaicon de puestos_idx` (`id_puesto`),
  ADD KEY `asignacion de escuela_idx` (`id_escuela`);

--
-- Indices de la tabla `enca_inscripcion`
--
ALTER TABLE `enca_inscripcion`
  ADD PRIMARY KEY (`id_enca_inscripcion`),
  ADD KEY `ingreso de grado_idx` (`id_grado`),
  ADD KEY `ingreso de escuela_idx` (`id_estudiante`),
  ADD KEY `ingreso de escuela_idx1` (`id_escuela`),
  ADD KEY `Ingreso de salon_idx` (`id_salon`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD KEY `id_municipio_idx` (`id_municipio`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento_idx` (`id_departamento`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_notas`),
  ADD KEY `id_estudiante_idx` (`id_estudiante`),
  ADD KEY `id_curso_idx` (`id_curso`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id_salon`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Referencia a empleado_idx` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_inscripcion`
--
ALTER TABLE `detalle_inscripcion`
  MODIFY `id_detalle_inscripcion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `enca_inscripcion`
--
ALTER TABLE `enca_inscripcion`
  MODIFY `id_enca_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_inscripcion`
--
ALTER TABLE `detalle_inscripcion`
  ADD CONSTRAINT `asignacion de Cursos` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `encabezado de inscripcion` FOREIGN KEY (`id_enca_inscripcion`) REFERENCES `enca_inscripcion` (`id_enca_inscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `Asignaicon de puestos` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `asignacion de escuela` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `enca_inscripcion`
--
ALTER TABLE `enca_inscripcion`
  ADD CONSTRAINT `Ingreso de salon` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso de Estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso de escuela` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingreso de grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `id_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Referencia a empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
