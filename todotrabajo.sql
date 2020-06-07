-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2020 a las 05:58:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todotrabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacado`
--

CREATE TABLE `destacado` (
  `idDestacado` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `idetiqueta` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `idpublicacion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `idexperiencia` int(11) NOT NULL,
  `trabajoRealizado` int(10) NOT NULL,
  `postulados` int(10) NOT NULL,
  `puntos` varchar(45) NOT NULL,
  `trabajoSubido` int(10) NOT NULL,
  `idusuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `edad` varchar(10) NOT NULL,
  `tarjeta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellidoM`, `apellidoP`, `rut`, `edad`, `tarjeta`) VALUES
(66, 'Diego', 'Munoz', 'Lundstedt', '20.068.271.8', '20', 'Banco scotiabank');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `FK_idpostulante` int(11) NOT NULL,
  `FK_idpublicacion` int(11) NOT NULL,
  `FK_idusuario` int(20) NOT NULL,
  `FK_idpersona` int(11) NOT NULL,
  `idpostulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `idpostulante` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `experincia` int(11) NOT NULL,
  `idusuario` int(20) NOT NULL,
  `idpersona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `pregunta` varchar(150) NOT NULL,
  `idpublicacion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `idpublicacion` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `aPagar` varchar(6) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `idusuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `respuesta` varchar(150) NOT NULL,
  `idpregunta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccionado`
--

CREATE TABLE `seleccionado` (
  `idseleccionado` int(11) NOT NULL,
  `idpublicacion` int(11) NOT NULL,
  `idpostulante` int(11) NOT NULL,
  `esEnviado` varchar(10) NOT NULL,
  `numEnviado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tipousuario` varchar(15) NOT NULL,
  `idpersona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `tipousuario`, `idpersona`) VALUES
(55, 'diegolundstedt99@gmail.com', '1111', 'usuario', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destacado`
--
ALTER TABLE `destacado`
  ADD PRIMARY KEY (`idDestacado`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`idetiqueta`),
  ADD KEY `idpublicacion` (`idpublicacion`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`idexperiencia`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`idpostulacion`),
  ADD KEY `FK_idpublicacion` (`FK_idpublicacion`),
  ADD KEY `FK_idpostulante` (`FK_idpostulante`),
  ADD KEY `FK_idusuario` (`FK_idusuario`),
  ADD KEY `FK_idpersona` (`FK_idpersona`),
  ADD KEY `FK_idpostulante_2` (`FK_idpostulante`),
  ADD KEY `idpostulacion` (`idpostulacion`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`idpostulante`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `idpublicacion` (`idpublicacion`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`idpublicacion`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `idpregunta` (`idpregunta`);

--
-- Indices de la tabla `seleccionado`
--
ALTER TABLE `seleccionado`
  ADD PRIMARY KEY (`idseleccionado`),
  ADD KEY `idpostulante` (`idpostulante`),
  ADD KEY `idpublicacion` (`idpublicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `idpostulante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `idpublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
