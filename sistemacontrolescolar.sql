-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2021 a las 02:17:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemacontrolescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

CREATE TABLE `ajustes` (
  `id` int(11) NOT NULL,
  `periodo` text COLLATE utf8_spanish2_ci NOT NULL,
  `1_fecha_inicio` text COLLATE utf8_spanish2_ci NOT NULL,
  `1_fecha_fin` text COLLATE utf8_spanish2_ci NOT NULL,
  `2_fecha_inicio` text COLLATE utf8_spanish2_ci NOT NULL,
  `2_fecha_fin` text COLLATE utf8_spanish2_ci NOT NULL,
  `evaluacion_i` text COLLATE utf8_spanish2_ci NOT NULL,
  `evaluacion_f` text COLLATE utf8_spanish2_ci NOT NULL,
  `inscripciones_i` text COLLATE utf8_spanish2_ci NOT NULL,
  `inscripciones_f` text COLLATE utf8_spanish2_ci NOT NULL,
  `h_reportes` int(11) NOT NULL,
  `h_evaluacion` int(11) NOT NULL,
  `h_inscripciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ajustes`
--

INSERT INTO `ajustes` (`id`, `periodo`, `1_fecha_inicio`, `1_fecha_fin`, `2_fecha_inicio`, `2_fecha_fin`, `evaluacion_i`, `evaluacion_f`, `inscripciones_i`, `inscripciones_f`, `h_reportes`, `h_evaluacion`, `h_inscripciones`) VALUES
(1, 'Enero - Mayo', ' 07-Enero-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', ' 01-03-2021    ', ' 04-03-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'Ing. Sistemas Computacionales'),
(2, 'Los de Tic´s'),
(3, 'Ing. Alimentarias'),
(4, 'Arquitectura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

CREATE TABLE `comisiones` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `c_maxima` int(11) NOT NULL,
  `horario` text COLLATE utf8_spanish2_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `horas` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comisiones`
--

INSERT INTO `comisiones` (`id`, `id_materia`, `c_maxima`, `horario`, `numero`, `horas`) VALUES
(1, 1, 10, 'Lunes - viernes de 7:00 a 13:00', 1, '500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id` int(11) NOT NULL,
  `PDF` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id`, `PDF`, `nombre`) VALUES
(3, '10-06-2021_Codigo_de_etica.docx', 'Código de ética');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `PDF` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES
(1, 'ReferenciaBBVA-ITSOEH.pdf', 'Doc__16011174__05-03-2021__ReferenciaBBVA-ITSOEH.pdf', '05-03-2021 19:10:58', 16011174, 1),
(2, 'constancia_de_curso.pdf', 'Doc__16011174__05-03-2021__constancia_de_curso.pdf', '05-03-2021 19:11:45', 16011174, 1),
(3, '923d1519-62f8-475c-811f-d98deedcccf8.pdf', 'Doc__16011174__05-03-2021__923d1519-62f8-475c-811f-d98deedcccf8.pdf', '05-03-2021 19:22:55', 16011174, 1),
(4, 'cv2-2021.pdf', 'Doc__16011174__05-03-2021__cv2-2021.pdf', '05-03-2021 21:03:11', 16011174, 1),
(5, 'cv2-2021.pdf', 'Doc__16011174__05-03-2021__cv2-2021.pdf', '05-03-2021 21:05:13', 16011174, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `carrera` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_academico` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_industrial` text COLLATE utf8_spanish2_ci NOT NULL,
  `hora` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `aula` text COLLATE utf8_spanish2_ci NOT NULL,
  `profesor` text COLLATE utf8_spanish2_ci NOT NULL,
  `hora` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inforesidencia`
--

CREATE TABLE `inforesidencia` (
  `id` int(11) NOT NULL,
  `objetivos` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `empresasPDF` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `calendarioPDF` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `inforesidencia`
--

INSERT INTO `inforesidencia` (`id`, `objetivos`, `empresasPDF`, `calendarioPDF`) VALUES
(1, 'Contribuir al desarrollo personal de nuestros alumnos próximos a egresar mediante la confrontación de sus ideas y opiniones surgidas en el ámbito laboral sobre problemas determinados. Propiciamos la participación de nuestros alumnos en la toma de decisiones en situaciones reales, acrecentando su confianza en la aplicación de conocimientos y desarrollo de habilidades para su integración a la actividad económica del país.', '09-06-2021_EmpresasVinculadas2016.pdf', '09-06-2021_Calendario_Residencias_Profesionales_enero_mayo_2021.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscribir_examenes`
--

CREATE TABLE `inscribir_examenes` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `matricula` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_comision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_materia`, `id_alumno`, `id_comision`) VALUES
(1, 1, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `grado` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL,
  `PDF` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `id_carrera`, `codigo`, `nombre`, `grado`, `tipo`, `PDF`) VALUES
(1, 1, '321', 'Acc mex', '', 'Servicio Social', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_academico` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_industrial` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` text COLLATE utf8_spanish2_ci NOT NULL,
  `nota_final` text COLLATE utf8_spanish2_ci NOT NULL,
  `nota_academico` text COLLATE utf8_spanish2_ci NOT NULL,
  `nota_industrial` text COLLATE utf8_spanish2_ci NOT NULL,
  `PDF` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado` text COLLATE utf8_spanish2_ci NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_aAcademico` int(11) NOT NULL,
  `id_aIndustrial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id`, `info`, `num`) VALUES
(1, 'Haber aprobado el 80% de los créditos correspondientes a la carrera que estés cursando.', 1),
(2, 'Ser alumno regular y estar inscrito oficialmente en el Instituto.', 2),
(3, 'Haber seleccionado un tema de proyecto debidamente avalado por la academia, y contar con al menos un docente asesor asignado por la Jefatura de División correspondiente.', 3),
(4, 'Disponer de constancia de situación académica emitida por el Departamento de Servicios Escolares.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `PDF` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `nota_industrial` int(11) NOT NULL,
  `nota_academico` int(11) NOT NULL,
  `promedioFinal` int(11) NOT NULL,
  `revisadoJefe` int(11) NOT NULL,
  `revisadoAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`, `nota_industrial`, `nota_academico`, `promedioFinal`, `revisadoJefe`, `revisadoAdmin`) VALUES
(1, 'reporteSemanasCotizadas.pdf', 'Rep__16011174__05-03-2021__reporteSemanasCotizadas.pdf', '05-03-2021 19:23:14', 16011174, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `clave` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `id_carrera` int(2) NOT NULL,
  `fechanac` text COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `correo` text COLLATE utf8_spanish2_ci NOT NULL,
  `rol` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish2_ci NOT NULL,
  `periodo` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_academico` text COLLATE utf8_spanish2_ci NOT NULL,
  `a_industrial` text COLLATE utf8_spanish2_ci NOT NULL,
  `institucion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`) VALUES
(1, 2932, 2932, 'Beatriz', 'Sánchez Cruz', 0, '', '', '', '', 'Admin', 'root', '', '', '', ''),
(2, 12, 12, 'Rolando', 'Muños  Porras', 1, '', '7721018990', 'Mixquiahula ', 'jefe@isic.com', 'Jefe', 'Jefe', 'Agosto - Diciembre', '', '', ''),
(3, 13, 13, 'José', 'Álvarez Aguilar', 4, '', '7721018990', 'Mixquiahula ', 'jefe@arqui.com', 'Jefe', 'Jefe', 'Agosto - Diciembre', '', '', ''),
(4, 122, 122, 'Serguio', 'Pérez Cruz ', 1, '', '7721018990', 'Mixquiahula ', 'serguio@isic.com', 'a_Academico', 'a_Academico', 'Agosto - Diciembre', '', '', ''),
(5, 124, 124, 'Juan', 'Pérez Lugo', 1, '', '7721018990', 'Mixquiahula ', 'mario@itsoeh.edu.com', 'a_Academico', 'a_Academico', 'Agosto - Diciembre', '', '', ''),
(6, 16011174, 16011174, 'Carlos Alberto', 'Barrera Lugo', 1, '', '7721018990', 'Mixquiahula ', 'alumno@itsoeh.edu.mx', 'Alumno', 'Servicio Social', 'Agosto - Diciembre', 'Serguio', 'Maria', ''),
(7, 123, 123, 'Maria', 'Barrera Pérez', 1, '', '7721018990', 'Mixquiahula ', 'industrial@gmail.com', 'a_Industrial', 'a_Industrial', 'Agosto - Diciembre', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inforesidencia`
--
ALTER TABLE `inforesidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscribir_examenes`
--
ALTER TABLE `inscribir_examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inforesidencia`
--
ALTER TABLE `inforesidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscribir_examenes`
--
ALTER TABLE `inscribir_examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
