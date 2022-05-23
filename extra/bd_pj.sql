-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2022 a las 22:51:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `admin_id` int(20) NOT NULL,
  `admin_usuario` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`admin_id`, `admin_usuario`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_facilitadores`
--

CREATE TABLE `categoria_facilitadores` (
  `facilitador_id` int(50) NOT NULL,
  `facilitador_nombre` varchar(250) NOT NULL,
  `facilitador_puesto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_facilitadores`
--

INSERT INTO `categoria_facilitadores` (`facilitador_id`, `facilitador_nombre`, `facilitador_puesto`) VALUES
(232, 'Medina Gonzalez Ines Guadalupe', 'Facilitador'),
(254, 'Arceo Escalante Elaine Vianey', 'Facilitador'),
(271, 'Briceño Lopez Elvia Rosa', 'Facilitador'),
(282, 'Carrillo Aguilar Rocio de Fatima', 'Facilitador'),
(330, 'Avila Miranda Elma Gabriela', 'Directora'),
(405, 'Marfil Turriza Ana Lilia', 'Facilitador'),
(420, 'Maiza Cruz Charlie Geraldine', 'Facilitador'),
(425, 'Briceño Alvarado Esmeralda Selene', 'Facilitador'),
(494, 'Gomez Martin Manuel Humberto', 'Facilitador'),
(544, 'Mena Arceo Guadalupe Evelin', 'Facilitador'),
(591, 'Gongora Bastarrachea Yenny', 'Facilitador'),
(669, 'Ku Anguas Oscar Manuel', 'Facilitador'),
(704, 'Casanova Medina Gener Cuauhtemoc', 'Facilitador'),
(755, 'May Garcia Fernando Martin', 'Facilitador'),
(778, 'May Vera Wilton Demetrio', 'Facilitador'),
(796, 'Lopez Gonzalez Monica Gabriela', 'Facilitador'),
(808, 'Ramirez Ramos Gustavo Enrique', 'Facilitador'),
(831, 'Alcocer Gamboa Pedro Santiago', 'Facilitador'),
(969, 'Leal Castillo Gabriela', 'Facilitador'),
(1002, 'Saide Poot Fatima Guadalupe', 'Facilitador'),
(1016, 'Aguilar Moreno Guadalupe Evangelina', 'Facilitador'),
(1029, 'Ake Puch Araceli del Carmen', 'Facilitador'),
(1082, 'Colonia Romero Lisset Margarita', 'Facilitador'),
(1108, 'Rolando Jesús Canul Franco', 'Facilitador'),
(1146, 'Gonzalez Rodriguez Gabriela Areli', 'COORD. ESTADISTICA'),
(1147, 'SGC: Sistema Gesti&oacute;n de Calidad', 'C&oacute;mite/Apoyo'),
(1239, 'Patricia Eugenia Sandoval Berzunza', 'Jefa de la Unidad de Planeaci&oacuten'),
(1254, 'Burgos Gamboa Cindy Marisol', 'Facilitador'),
(1324, 'Julissa Ivet Sanmiguel Manzano', 'Secretaria Ejecutiva'),
(1640, 'Cristina Guadalupe Perera Canul', 'Facilitador'),
(1750, 'Pilar Guadalupe Cetina Parra', 'Recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_oficinas`
--

CREATE TABLE `categoria_oficinas` (
  `oficina_id` int(50) NOT NULL,
  `oficina_nombre` varchar(250) NOT NULL,
  `oficina_ubicacion` varchar(500) NOT NULL,
  `oficina_direccion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_oficinas`
--

INSERT INTO `categoria_oficinas` (`oficina_id`, `oficina_nombre`, `oficina_ubicacion`, `oficina_direccion`) VALUES
(1, 'Adolescentes', 'Mérida', 'Centro Especializado en la Aplicación de Medidas para Adolescentes. Anillo Periférico Poniente Km.45, Mérida, Yucatán'),
(2, 'Central', 'Mérida', 'Calle 35 No. 501-A x 62 y 62-A Col. Centro C.P. 97000, Mérida, Yucatán'),
(3, 'Kanasin', 'Kanasín', 'Calle 23 No. 20 x 36 y 38, Kanasín, Yucatán'),
(4, 'Penal', 'Mérida', 'Calle 60, Ex. Hacienda San José Tecoh, por Anillo Periférico, Sección Sur. Mérida, Yucatán. Juzgados Penales del Primer Departamento'),
(5, 'Progreso', 'Progreso', 'Calle 37 No. 85 x 18 y 20, Puerto de Abrigo. Progreso, Yucatán'),
(6, 'Tekax', 'Tekax', 'Calle 41. Solar Número 2, Manzana 59. Tekax Yucatán'),
(7, 'Ticul', 'Ticul', 'Calle 26 S/N entre 21 y 23 Centro. Ticul, Yucatán'),
(8, 'Uman', 'Umán', 'Calle 25 No. 144, Carretera Umán-Celestún, Umán, Yuc. (Fte. Campo Siglo XXI)'),
(9, 'Valladolid', 'Valladolid', 'Calle 45 No. 228. Calzada de los Frailes. Barrio de Sisal. Valladolid, Yucatán'),
(10, 'CJOM', 'Mérida', 'Centro de Justicia Oral de Mérida. Calle 145, No. 299, Colonia San José Tecoh'),
(11, 'Centro de Justicia para las Mujeres', 'Mérida', 'Periférico Poniente km 46.5 tramo Susúla-Caucel detrás del edificio que ocupa la Fiscalía General del Estado de Yucatán en esta ciudad de Mérida, Yucatán'),
(12, 'Juzgado Primero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
(13, 'Juzgado Tercero de Oralidad Familiar (Turno Matutino)', 'Mérida', ''),
(14, 'Juzgado Séptimo de Oralidad Familiar', 'Mérida', ''),
(15, 'Juzgado Tercero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
(16, 'Centro de Convivencia Familiar (CECOFAY)', 'Mérida', ''),
(17, 'Motul', 'Motul', 'Juzgado Tercero Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, ubicado en la calle 29 número 379 por 46 y 48, Motul, Yucatán'),
(18, 'Izamal', 'Izamal', 'Juzgado Quinto Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, calle 37 número 295 entre 22 y 24 de la Colonia San Marcos de esta ciudad de Izamal, Yucatán'),
(19, 'Tizimin', 'Tizimín', 'Juzgado Segundo Mixto de lo Civil y Familiar del Tercer Departamento Judicial del Estado, ubicado en la calle 41 número 354 por 47 y 49, de esta ciudad de Tizimín, Yucatán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_status_anios`
--

CREATE TABLE `categoria_status_anios` (
  `anio_id` int(20) NOT NULL,
  `anio_nombre` varchar(25) NOT NULL,
  `anio_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_status_anios`
--

INSERT INTO `categoria_status_anios` (`anio_id`, `anio_nombre`, `anio_status`) VALUES
(1, '2016', 'desactivado'),
(2, '2017', 'desactivado'),
(3, '2018', 'desactivado'),
(4, '2019', 'activado'),
(5, '2020', 'activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_etapa`
--

CREATE TABLE `cat_etapa` (
  `etapa_id` int(20) NOT NULL,
  `etapa_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_etapa`
--

INSERT INTO `cat_etapa` (`etapa_id`, `etapa_nombre`) VALUES
(1, 'Inicial'),
(2, 'Complementaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `anio` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `oficina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `titulo`, `anio`, `descripcion`, `estatus`, `fecha_inicio`, `oficina`) VALUES
(1, '¿Cuentas con aire acondicionado?', '2020', 'Contabilizar cuantas personas en Mérida cuenta con aire acondicionado', 'Publicado', '2022-04-08 04:41:38', 'Adolescentes'),
(2, 'Prueba', '2022', 'asasdfasdf', 'activo', '2022-05-22 08:53:26', 'Adolecentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `encuesta_titulo` varchar(259) NOT NULL,
  `titulo` varchar(259) NOT NULL,
  `variable` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `encuesta_titulo`, `titulo`, `variable`) VALUES
(1, 'Calentamiento Global', '¿Tienes calor?', 'calor'),
(2, 'Prueba', 'Este pregunta es una prueba', 'prueba'),
(3, 'Prueba', '¿Qué tan bueno es el uso de aire acondicionado contra el calor?', 'bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_entrevista`
--

CREATE TABLE `respuestas_entrevista` (
  `id` int(10) NOT NULL,
  `entrevista_folio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta_id` int(10) NOT NULL,
  `respuesta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas_entrevista`
--

INSERT INTO `respuestas_entrevista` (`id`, `entrevista_folio`, `pregunta_id`, `respuesta`, `valor`) VALUES
(1, '11122022', 3, 'Satisfecho', '3'),
(4, '11122022', 2, 'Muy satisfecho', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `folio` varchar(159) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `facilitador` varchar(259) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(99) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `etapa` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `folio`, `facilitador`, `oficina`, `etapa`, `periodo`, `estatus`) VALUES
(2, '11122022', 'Aguilar Moreno Guadalupe Evangelina', 'Adolecentes', 'Inicial', '2022', 'publicado'),
(3, '12342020', 'Aguilar Moreno Guadalupe Evangelina', 'Adolescentes', 'Inicial', '2020', 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_respuestas`
--

CREATE TABLE `tipo_respuestas` (
  `id` int(11) NOT NULL,
  `encuesta_titulo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `pregunta_titulo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tipo` varchar(159) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_respuestas`
--

INSERT INTO `tipo_respuestas` (`id`, `encuesta_titulo`, `pregunta_titulo`, `tipo`) VALUES
(1, '', '', 'Opción múltiple'),
(2, '', '', 'Nivel de medición'),
(3, '', '', 'Abierta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `categoria_facilitadores`
--
ALTER TABLE `categoria_facilitadores`
  ADD PRIMARY KEY (`facilitador_id`);

--
-- Indices de la tabla `categoria_oficinas`
--
ALTER TABLE `categoria_oficinas`
  ADD PRIMARY KEY (`oficina_id`);

--
-- Indices de la tabla `categoria_status_anios`
--
ALTER TABLE `categoria_status_anios`
  ADD PRIMARY KEY (`anio_id`),
  ADD KEY `anio_nombre` (`anio_nombre`);

--
-- Indices de la tabla `cat_etapa`
--
ALTER TABLE `cat_etapa`
  ADD PRIMARY KEY (`etapa_id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anio_nombre` (`anio`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas_entrevista`
--
ALTER TABLE `respuestas_entrevista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria_oficinas`
--
ALTER TABLE `categoria_oficinas`
  MODIFY `oficina_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categoria_status_anios`
--
ALTER TABLE `categoria_status_anios`
  MODIFY `anio_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cat_etapa`
--
ALTER TABLE `cat_etapa`
  MODIFY `etapa_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuestas_entrevista`
--
ALTER TABLE `respuestas_entrevista`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
