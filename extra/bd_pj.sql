CREATE DATABASE IF NOT EXISTS bd_pj;
USE bd_pj;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- SET default_time_zone='Mexico/Merida'

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

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
('1', 'Inicial'),
('2', 'Complementaria');

--
-- Indices de la tabla `cat_etapa`
--
ALTER TABLE `cat_etapa`
  ADD PRIMARY KEY (`etapa_id`);

--
-- AUTO_INCREMENT de la tabla `cat_etapa`
--
ALTER TABLE `cat_etapa`
  MODIFY `etapa_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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

--
-- Indices de la tabla `categoria_facilitadores`
--
ALTER TABLE `categoria_facilitadores`
  ADD PRIMARY KEY (`facilitador_id`);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_oficinas`
--

CREATE TABLE `categoria_oficinas` (
  `oficina_id` int(50) NOT NULL,
  `oficina_nombre` varchar(250) NOT NULL,
  `oficina_ubicacion` varchar(500) NOT NULL,
  `oficina_direccion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_oficinas`
--

INSERT INTO `categoria_oficinas` (`oficina_id`, `oficina_nombre`, `oficina_ubicacion`, `oficina_direccion`) VALUES
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

--
-- Indices de la tabla `categoria_oficinas`
--
ALTER TABLE `categoria_oficinas`
  ADD PRIMARY KEY (`oficina_id`);

--
-- AUTO_INCREMENT de la tabla `categoria_oficinas`
--
ALTER TABLE `categoria_oficinas`
  MODIFY `oficina_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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

INSERT INTO `categoria_status_anios` (`anio_id`,`anio_nombre`, `anio_status`) VALUES
(1,'2016', 'desactivado'),
(2,'2017', 'desactivado'),
(3,'2018', 'desactivado'),
(4,'2019', 'activado'),
(5,'2020', 'activado');

--
-- Indices de la tabla `categoria_status_anios`
--
ALTER TABLE `categoria_status_anios`
  ADD PRIMARY KEY (`anio_id`),
  ADD KEY (`anio_nombre`);

--
-- AUTO_INCREMENT de la tabla `categoria_status_anios`
--
ALTER TABLE `categoria_status_anios`
  MODIFY `anio_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `encuesta_id` int(11) NOT NULL,
  `encuesta_titulo` varchar(150) NOT NULL,
  `anio_nombre` varchar(25) NOT NULL,
  `encuesta_descripcion` text(259) NOT NULL,
  `encuesta_estado` tinyint(1) NOT NULL,
  `encuesta_fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `encuesta_fecha_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`encuesta_id`, `encuesta_titulo`, `anio_nombre`, `encuesta_descripcion`, `encuesta_estado`, `encuesta_fecha_inicio`, `encuesta_fecha_final`) VALUES
(1, '¿Cuentas con aire acondicionado?', '2020', 'Contabilizar cuantas personas en Mérida cuenta con aire acondicionado', 0, '2022-04-08 04:41:38', '2022-04-23 05:00:00');

-- --------------------------------------------------------
--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`encuesta_id`),
  ADD KEY `anio_nombre` (`anio_nombre`);

  --
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`

  MODIFY `encuesta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta_id` int(11) NOT NULL,
  `pregunta_titulo` varchar(259) NOT NULL,
  `pregunta_texto` varchar(259) NOT NULL,
  `pregunta_variable` varchar(59) NOT NULL,
  `pregunta_fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pregunta_fecha_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`pregunta_id`, `pregunta_titulo`, `pregunta_texto`, `pregunta_variable`, `pregunta_fecha_inicio`, `pregunta_fecha_final`) VALUES
(1, 'Calentamiento Global', '¿Tienes calor?', 'calor', '2022-04-08 04:30:27', '2022-04-15 05:00:00');

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`pregunta_id`);

  --
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `pregunta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `resultados` (
  `result_id` int(11) NOT NULL,
  `encuesta_titulo` varchar(159) NOT NULL,
  `pregunta_titulo` varchar(259) NOT NULL,
  `tipo_result` varchar(99) NOT NULL,
  `pregunta_fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pregunta_fecha_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`result_id`);

  --
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- --------------------------------------------------------
--
--
-- Estructura de tabla para la tabla `tipo_preguntas`
--

CREATE TABLE `tipo_preguntas` (
  `tipo_id` int(11) NOT NULL,
  `tipo_titulo` varchar(159) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_preguntas`
--

INSERT INTO `tipo_preguntas` (`tipo_id`, `tipo_titulo`) VALUES
(1, 'Opción múltiple'),
(2, 'Nivel de medición'),
(3, 'Abierta');
COMMIT;
