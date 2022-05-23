-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2022 a las 04:21:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

CREATE DATABASE IF NOT EXISTS bd_pj;
USE bd_pj;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usuario`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_etapa`
--

CREATE TABLE `cat_etapa` (
  `id_etapa` varchar(11) NOT NULL,
  `etapa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_etapa`
--

INSERT INTO `cat_etapa` (`id_etapa`, `etapa`) VALUES
('1', 'Inicial'),
('2', 'Complementaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_facilitadores`
--

CREATE TABLE `cat_facilitadores` (
  `id_facilitador` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(250) CHARACTER SET latin1 NOT NULL,
  `puesto` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cat_facilitadores`
--

INSERT INTO `cat_facilitadores` (`id_facilitador`, `nombre`, `puesto`) VALUES
('0232', 'Medina Gonzalez Ines Guadalupe', 'Facilitador'),
('0254', 'Arceo Escalante Elaine Vianey', 'Facilitador'),
('0271', 'Briceño Lopez Elvia Rosa', 'Facilitador'),
('0282', 'Carrillo Aguilar Rocio de Fatima', 'Facilitador'),
('0330', 'Avila Miranda Elma Gabriela', 'Directora'),
('0405', 'Marfil Turriza Ana Lilia', 'Facilitador'),
('0420', 'Maiza Cruz Charlie Geraldine', 'Facilitador'),
('0425', 'Briceño Alvarado Esmeralda Selene', 'Facilitador'),
('0494', 'Gomez Martin Manuel Humberto', 'Facilitador'),
('0544', 'Mena Arceo Guadalupe Evelin', 'Facilitador'),
('0591', 'Gongora Bastarrachea Yenny', 'Facilitador'),
('0669', 'Ku Anguas Oscar Manuel', 'Facilitador'),
('0704', 'Casanova Medina Gener Cuauhtemoc', 'Facilitador'),
('0755', 'May Garcia Fernando Martin', 'Facilitador'),
('0778', 'May Vera Wilton Demetrio', 'Facilitador'),
('0796', 'Lopez Gonzalez Monica Gabriela', 'Facilitador'),
('0808', 'Ramirez Ramos Gustavo Enrique', 'Facilitador'),
('0831', 'Alcocer Gamboa Pedro Santiago', 'Facilitador'),
('0969', 'Leal Castillo Gabriela', 'Facilitador'),
('1002', 'Saide Poot Fatima Guadalupe', 'Facilitador'),
('1016', 'Aguilar Moreno Guadalupe Evangelina', 'Facilitador'),
('1029', 'Ake Puch Araceli del Carmen', 'Facilitador'),
('1082', 'Colonia Romero Lisset Margarita', 'Facilitador'),
('1108', 'Rolando Jesús Canul Franco', 'Facilitador'),
('1146', 'Gonzalez Rodriguez Gabriela Areli', 'COORD. ESTADISTICA'),
('1147', 'SGC: Sistema Gesti&oacute;n de Calidad', 'C&oacute;mite/Apoyo'),
('1239', 'Patricia Eugenia Sandoval Berzunza', 'Jefa de la Unidad de Planeaci&oacuten'),
('1254', 'Burgos Gamboa Cindy Marisol', 'Facilitador'),
('1324', 'Julissa Ivet Sanmiguel Manzano', 'Secretaria Ejecutiva'),
('1640', 'Cristina Guadalupe Perera Canul', 'Facilitador'),
('1750', 'Pilar Guadalupe Cetina Parra', 'Recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_oficinas`
--

CREATE TABLE `cat_oficinas` (
  `num_oficina` varchar(50) NOT NULL,
  `oficina` varchar(250) NOT NULL,
  `ubicacion` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_oficinas`
--

INSERT INTO `cat_oficinas` (`num_oficina`, `oficina`, `ubicacion`, `direccion`) VALUES
('01', 'Adolescentes', 'Mérida', 'Centro Especializado en la Aplicación de Medidas para Adolescentes. Anillo Periférico Poniente Km.45, Mérida, Yucatán'),
('02', 'Central', 'Mérida', 'Calle 35 No. 501-A x 62 y 62-A Col. Centro C.P. 97000, Mérida, Yucatán'),
('03', 'Kanasin', 'Kanasín', 'Calle 23 No. 20 x 36 y 38, Kanasín, Yucatán'),
('04', 'Penal', 'Mérida', 'Calle 60, Ex. Hacienda San José Tecoh, por Anillo Periférico, Sección Sur. Mérida, Yucatán. Juzgados Penales del Primer Departamento'),
('05', 'Progreso', 'Progreso', 'Calle 37 No. 85 x 18 y 20, Puerto de Abrigo. Progreso, Yucatán'),
('06', 'Tekax', 'Tekax', 'Calle 41. Solar Número 2, Manzana 59. Tekax Yucatán'),
('07', 'Ticul', 'Ticul', 'Calle 26 S/N entre 21 y 23 Centro. Ticul, Yucatán'),
('08', 'Uman', 'Umán', 'Calle 25 No. 144, Carretera Umán-Celestún, Umán, Yuc. (Fte. Campo Siglo XXI)'),
('09', 'Valladolid', 'Valladolid', 'Calle 45 No. 228. Calzada de los Frailes. Barrio de Sisal. Valladolid, Yucatán'),
('10', 'CJOM', 'Mérida', 'Centro de Justicia Oral de Mérida. Calle 145, No. 299, Colonia San José Tecoh'),
('11', 'Centro de Justicia para las Mujeres', 'Mérida', 'Periférico Poniente km 46.5 tramo Susúla-Caucel detrás del edificio que ocupa la Fiscalía General del Estado de Yucatán en esta ciudad de Mérida, Yucatán'),
('12', 'Juzgado Primero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
('13', 'Juzgado Tercero de Oralidad Familiar (Turno Matutino)', 'Mérida', ''),
('14', 'Juzgado Séptimo de Oralidad Familiar', 'Mérida', ''),
('15', 'Juzgado Tercero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
('16', 'Centro de Convivencia Familiar (CECOFAY)', 'Mérida', ''),
('17', 'Motul', 'Motul', 'Juzgado Tercero Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, ubicado en la calle 29 número 379 por 46 y 48, Motul, Yucatán'),
('18', 'Izamal', 'Izamal', 'Juzgado Quinto Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, calle 37 número 295 entre 22 y 24 de la Colonia San Marcos de esta ciudad de Izamal, Yucatán'),
('19', 'Tizimin', 'Tizimín', 'Juzgado Segundo Mixto de lo Civil y Familiar del Tercer Departamento Judicial del Estado, ubicado en la calle 41 número 354 por 47 y 49, de esta ciudad de Tizimín, Yucatán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_status_anios`
--

CREATE TABLE `cat_status_anios` (
  `anio` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_status_anios`
--

INSERT INTO `cat_status_anios` (`anio`, `status`) VALUES
('2016', 'desactivado'),
('2017', 'desactivado'),
('2018', 'desactivado'),
('2019', 'activado'),
('2020', 'activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_facilitador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`) VALUES
(1, 'Su problema fue resuelto de manera profesional'),
(2, 'Está satisfecho con la forma en que nuestro facilitador atendió su consulta'),
(3, 'Nuestro facilitador le ofreció una respuesta de manera oportuna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responde_encuesta`
--

CREATE TABLE `responde_encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cat_etapa`
--
ALTER TABLE `cat_etapa`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `cat_facilitadores`
--
ALTER TABLE `cat_facilitadores`
  ADD PRIMARY KEY (`id_facilitador`);

--
-- Indices de la tabla `cat_oficinas`
--
ALTER TABLE `cat_oficinas`
  ADD PRIMARY KEY (`num_oficina`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responde_encuesta`
--
ALTER TABLE `responde_encuesta`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `responde_encuesta`
--
ALTER TABLE `responde_encuesta`
  ADD CONSTRAINT `fkencuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `encuesta` (`id`),
  ADD CONSTRAINT `responde_encuesta_ibfk_1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
