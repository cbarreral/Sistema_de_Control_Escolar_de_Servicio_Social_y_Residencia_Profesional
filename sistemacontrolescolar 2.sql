-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 21:23:36
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoscarta`
--

CREATE TABLE `datoscarta` (
  `id_datoscarta` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `municipio` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `persona` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cargo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `datoscarta`
--

INSERT INTO `datoscarta` (`id_datoscarta`, `nombre`, `direccion`, `municipio`, `estado`, `telefono`, `persona`, `cargo`, `correo`, `matricula`) VALUES
(83, 'ACCMEX', 'calle reforma #32', 'Joyas', 'Querétaro', 2147483647, 'Ingeniero Roberto', 'Director general', 'cbarreral@itsoeh.edu.mx', 1212),
(84, 'Constructora Álvaro ', 'Calle Durango', 'Gustavo A. Madero', 'CDMX', 2147483647, 'Ing. German', 'Director general', 'geman@constructora.com', 1313),
(85, 'Abarrotes don Pepe', 'El Bondo #67', 'Mixquiahuala de Juarez ', 'Hidalgo', 2147483647, 'Ingeniero Francisco Torres López ', 'Ventas', 'ventas@ventas.com', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosestudiante`
--

CREATE TABLE `datosestudiante` (
  `id_datosestudiante` int(11) NOT NULL,
  `fechaRegistro` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `periodo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `especialidad` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `100Mate` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cursandoMate` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cuantasMateCursando` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `platicaInfo` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `datosestudiante`
--

INSERT INTO `datosestudiante` (`id_datosestudiante`, `fechaRegistro`, `periodo`, `nombre`, `sexo`, `matricula`, `id_carrera`, `especialidad`, `telefono`, `semestre`, `100Mate`, `cursandoMate`, `cuantasMateCursando`, `platicaInfo`) VALUES
(57, '17-06-21', 'Julio - diciembre', 'Barrera Lugo Carlos Alberto', 'Hombre', 1212, 1, 'Desarrollo de aplicaciones móviles', 2147483647, 10, 'Si', 'No', '0', 'Si'),
(58, '17-06-21', 'Julio - diciembre', 'Barrera Lugo Helen Sofia', 'Mujer', 1313, 4, 'Diseño de planos', 1241706, 10, 'Si', 'No', '0', 'Si'),
(59, '18-06-21', 'Julio - diciembre', 'Sanchez Ledesma Kevin', 'Hombre', 1111, 4, 'Desarrollo de aplicaciones móviles', 1241706, 10, 'Si', 'No', '0', 'No');

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
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `plantillas`
--

INSERT INTO `plantillas` (`id_plantilla`, `nombre`, `texto`) VALUES
(1, 'Falta de créditos', 'No puedes continuar con el proceso, ya que no cuentas con los créditos mínimos solicitados, revisa la convocatoria y platícalo con tu Jefe de Carrera.');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitoscarta`
--

CREATE TABLE `requisitoscarta` (
  `id_files` int(11) NOT NULL,
  `kardex` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `servicioSocial` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `IMSS` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numIMSS` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `requisitoscarta`
--

INSERT INTO `requisitoscarta` (`id_files`, `kardex`, `servicioSocial`, `IMSS`, `numIMSS`, `matricula`) VALUES
(81, '1212_Kardex.pdf', '1212_CartaLiberacion.pdf', '1212_IMSS.pdf', '4563213', 1212),
(82, '1313_Kardex.pdf', '1313_CartaLiberacion.pdf', '1313_IMSS.pdf', '4563213', 1313),
(83, '1111_Kardex.pdf', '1111_CartaLiberacion.pdf', '1111_IMSS.pdf', '634', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_datosEstudiante` int(11) NOT NULL,
  `id_datosCarta` int(11) NOT NULL,
  `id_requisitosCarta` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `obcervaciones` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_datosEstudiante`, `id_datosCarta`, `id_requisitosCarta`, `estado`, `matricula`, `obcervaciones`) VALUES
(38, 58, 84, 82, 1, 1313, '\r\n                                                        '),
(39, 59, 85, 83, 2, 1111, 'No puedes continuar con el proceso, ya que no cuentas con los créditos mínimos solicitados, revisa la convocatoria y platícalo con tu Jefe de Carrera.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `clave` text COLLATE utf8_spanish2_ci NOT NULL,
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
  `institucion` text COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES
(1, 2932, '2932', 'Beatriz', 'Sánchez Cruz', 0, '', '', '', '', 'Admin', 'root', '', '', '', '', ''),
(36, 1212, '1212', 'Carlos Alberto', 'Barrera Lugo', 1, '', '7721049800', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles'),
(37, 1313, '1313', 'Helen Sofia', 'Barrera Lugo', 4, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Diseño de planos'),
(38, 1111, '1111', 'Kevin', 'Sanchez Ledesma', 1, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');

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
-- Indices de la tabla `datoscarta`
--
ALTER TABLE `datoscarta`
  ADD PRIMARY KEY (`id_datoscarta`);

--
-- Indices de la tabla `datosestudiante`
--
ALTER TABLE `datosestudiante`
  ADD PRIMARY KEY (`id_datosestudiante`);

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
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id_plantilla`);

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
-- Indices de la tabla `requisitoscarta`
--
ALTER TABLE `requisitoscarta`
  ADD PRIMARY KEY (`id_files`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
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
-- AUTO_INCREMENT de la tabla `datoscarta`
--
ALTER TABLE `datoscarta`
  MODIFY `id_datoscarta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `datosestudiante`
--
ALTER TABLE `datosestudiante`
  MODIFY `id_datosestudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `requisitoscarta`
--
ALTER TABLE `requisitoscarta`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
