-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2021 a las 17:57:20
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
CREATE DATABASE IF NOT EXISTS `sistemacontrolescolar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `sistemacontrolescolar`;

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

INSERT INTO `ajustes` (`id`, `periodo`, `1_fecha_inicio`, `1_fecha_fin`, `2_fecha_inicio`, `2_fecha_fin`, `evaluacion_i`, `evaluacion_f`, `inscripciones_i`, `inscripciones_f`, `h_reportes`, `h_evaluacion`, `h_inscripciones`) VALUES(1, 'Enero - Mayo', ' 07-Enero-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', ' 01-03-2021    ', ' 04-03-2021    ', ' 28-Mayo-2021    ', ' 28-Mayo-2021    ', 0, 0, 1);

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

INSERT INTO `carrera` (`id`, `nombre`) VALUES(1, 'Ing. Sistemas Computacionales');
INSERT INTO `carrera` (`id`, `nombre`) VALUES(2, 'Los de Tic´s');
INSERT INTO `carrera` (`id`, `nombre`) VALUES(3, 'Ing. Alimentarias');
INSERT INTO `carrera` (`id`, `nombre`) VALUES(4, 'Arquitectura');

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

INSERT INTO `comisiones` (`id`, `id_materia`, `c_maxima`, `horario`, `numero`, `horas`) VALUES(1, 1, 10, 'Lunes - viernes de 7:00 a 13:00', 1, '500');

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

INSERT INTO `documentacion` (`id`, `PDF`, `nombre`) VALUES(3, '10-06-2021_Codigo_de_etica.docx', 'Código de ética');

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

INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES(1, 'ReferenciaBBVA-ITSOEH.pdf', 'Doc__16011174__05-03-2021__ReferenciaBBVA-ITSOEH.pdf', '05-03-2021 19:10:58', 16011174, 1);
INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES(2, 'constancia_de_curso.pdf', 'Doc__16011174__05-03-2021__constancia_de_curso.pdf', '05-03-2021 19:11:45', 16011174, 1);
INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES(3, '923d1519-62f8-475c-811f-d98deedcccf8.pdf', 'Doc__16011174__05-03-2021__923d1519-62f8-475c-811f-d98deedcccf8.pdf', '05-03-2021 19:22:55', 16011174, 1);
INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES(4, 'cv2-2021.pdf', 'Doc__16011174__05-03-2021__cv2-2021.pdf', '05-03-2021 21:03:11', 16011174, 1);
INSERT INTO `documentos` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`) VALUES(5, 'cv2-2021.pdf', 'Doc__16011174__05-03-2021__cv2-2021.pdf', '05-03-2021 21:05:13', 16011174, 1);

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

INSERT INTO `inforesidencia` (`id`, `objetivos`, `empresasPDF`, `calendarioPDF`) VALUES(1, 'Contribuir al desarrollo personal de nuestros alumnos próximos a egresar mediante la confrontación de sus ideas y opiniones surgidas en el ámbito laboral sobre problemas determinados. Propiciamos la participación de nuestros alumnos en la toma de decisiones en situaciones reales, acrecentando su confianza en la aplicación de conocimientos y desarrollo de habilidades para su integración a la actividad económica del país.', '09-06-2021_EmpresasVinculadas2016.pdf', '09-06-2021_Calendario_Residencias_Profesionales_enero_mayo_2021.pdf');

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

INSERT INTO `inscripciones` (`id`, `id_materia`, `id_alumno`, `id_comision`) VALUES(1, 1, 6, 1);

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

INSERT INTO `materias` (`id`, `id_carrera`, `codigo`, `nombre`, `grado`, `tipo`, `PDF`) VALUES(1, 1, '321', 'Acc mex', '', 'Servicio Social', '');

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

INSERT INTO `procesos` (`id`, `info`, `num`) VALUES(1, 'Haber aprobado el 80% de los créditos correspondientes a la carrera que estés cursando.', 1);
INSERT INTO `procesos` (`id`, `info`, `num`) VALUES(2, 'Ser alumno regular y estar inscrito oficialmente en el Instituto.', 2);
INSERT INTO `procesos` (`id`, `info`, `num`) VALUES(3, 'Haber seleccionado un tema de proyecto debidamente avalado por la academia, y contar con al menos un docente asesor asignado por la Jefatura de División correspondiente.', 3);
INSERT INTO `procesos` (`id`, `info`, `num`) VALUES(4, 'Disponer de constancia de situación académica emitida por el Departamento de Servicios Escolares.', 4);

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

INSERT INTO `reportes` (`id`, `nombre`, `PDF`, `fecha`, `matricula`, `id_materia`, `nota_industrial`, `nota_academico`, `promedioFinal`, `revisadoJefe`, `revisadoAdmin`) VALUES(1, 'reporteSemanasCotizadas.pdf', 'Rep__16011174__05-03-2021__reporteSemanasCotizadas.pdf', '05-03-2021 19:23:14', 16011174, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `fechaSolicitud` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `periodo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombreCarta` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombreEmpresa` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `domicilioEmpresa` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefonoEmpresa` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `emailEmpresa` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombreAlumno` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `carreraAlumno` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `especialidadAlumno` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `emailAlumno` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefonoAlumno` int(11) NOT NULL,
  `tipoProyecto` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `IMSS` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `polizaSeguroAlumno` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `fechaSolicitud`, `periodo`, `nombreCarta`, `nombreEmpresa`, `domicilioEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `nombreAlumno`, `carreraAlumno`, `especialidadAlumno`, `matricula`, `emailAlumno`, `telefonoAlumno`, `tipoProyecto`, `IMSS`, `polizaSeguroAlumno`, `estado`) VALUES(1, '10-06-21', 'y', 'fg', 'gfh', 'dfg', 'sdfgh', 'dfgh', 'dfgh', '4', 'dfh', 16011, 'adfh', 54, 'adfh', 'dfa', 'dafh', 2);
INSERT INTO `solicitudes` (`id`, `fechaSolicitud`, `periodo`, `nombreCarta`, `nombreEmpresa`, `domicilioEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `nombreAlumno`, `carreraAlumno`, `especialidadAlumno`, `matricula`, `emailAlumno`, `telefonoAlumno`, `tipoProyecto`, `IMSS`, `polizaSeguroAlumno`, `estado`) VALUES(2, '10-06-21', 'Julio - diciembre', 'Instrucción  Ágil', 'Instrucción  Ágil', 'Instrucción  Ágil', '7721049800', 'cbarreral@itsoeh.edu.mx', 'Fernández  Paola', '4', 'abc', 5, 'pinkrouse2015@hotmail.com', 1241706, 'Propuesta Propia', '464654', '456', 3);
INSERT INTO `solicitudes` (`id`, `fechaSolicitud`, `periodo`, `nombreCarta`, `nombreEmpresa`, `domicilioEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `nombreAlumno`, `carreraAlumno`, `especialidadAlumno`, `matricula`, `emailAlumno`, `telefonoAlumno`, `tipoProyecto`, `IMSS`, `polizaSeguroAlumno`, `estado`) VALUES(3, '10-06-21', 'Enero -junio', 'Instrucción  Ágil', 'Instrucción  Ágil', 'Instrucción  Ágil', '7721049800', 'cbarreral@itsoeh.edu.mx', 'betyu Franco', '4', 'abc', 6, 'cbarreral@itsoeh.edu.mx', 2147483647, 'Banco de Proyectos', '464654', '65465464', 2);
INSERT INTO `solicitudes` (`id`, `fechaSolicitud`, `periodo`, `nombreCarta`, `nombreEmpresa`, `domicilioEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `nombreAlumno`, `carreraAlumno`, `especialidadAlumno`, `matricula`, `emailAlumno`, `telefonoAlumno`, `tipoProyecto`, `IMSS`, `polizaSeguroAlumno`, `estado`) VALUES(4, '10-06-21', 'Julio - diciembre', 'yo', 'yo', 'yo', '+527721049800', 'nose.kponer1230@gmail.com', 'b Carlos Alberto', '4', 'Desarrollo de aplicaciones móviles', 16011174, 'cbarreral@itsoeh.edu.mx', 54654, 'Propuesta Propia', '456', '234', 2);
INSERT INTO `solicitudes` (`id`, `fechaSolicitud`, `periodo`, `nombreCarta`, `nombreEmpresa`, `domicilioEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `nombreAlumno`, `carreraAlumno`, `especialidadAlumno`, `matricula`, `emailAlumno`, `telefonoAlumno`, `tipoProyecto`, `IMSS`, `polizaSeguroAlumno`, `estado`) VALUES(5, '11-06-21', 'Julio - diciembre', 'Instrucción  Ágil', 'Instrucción  Ágil', 'Instrucción  Ágil', '7721049800', 'cbarreral@itsoeh.edu.mx', 'cbarreral@itsoeh.edu.mx Carlos Alberto', '0', 'Desarrollo de aplicaciones móviles', 2020, 'beatriz@itsoeh.edu.mx', 2147483647, 'Banco de Proyectos', '464654', '65465464', 1);

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
  `institucion` text COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(1, 2932, 2932, 'Beatriz', 'Sánchez Cruz', 0, '', '', '', '', 'Admin', 'root', '', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(2, 12, 12, 'Rolando', 'Muños  Porras', 1, '', '7721018990', 'Mixquiahula ', 'jefe@isic.com', 'Jefe', 'Jefe', 'Agosto - Diciembre', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(3, 13, 13, 'José', 'Álvarez Aguilar', 4, '', '7721018990', 'Mixquiahula ', 'jefe@arqui.com', 'Jefe', 'Jefe', 'Agosto - Diciembre', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(4, 122, 122, 'Serguio', 'Pérez Cruz ', 1, '', '7721018990', 'Mixquiahula ', 'serguio@isic.com', 'a_Academico', 'a_Academico', 'Agosto - Diciembre', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(5, 124, 124, 'Juan', 'Pérez Lugo', 1, '', '7721018990', 'Mixquiahula ', 'mario@itsoeh.edu.com', 'a_Academico', 'a_Academico', 'Agosto - Diciembre', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(7, 123, 123, 'Maria', 'Barrera Pérez', 1, '', '7721018990', 'Mixquiahula ', 'industrial@gmail.com', 'a_Industrial', 'a_Industrial', 'Agosto - Diciembre', '', '', '', '');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(9, 16011174, 16011174, 'Carlos Alberto', 'b', 1, '', '54654', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(11, 1212, 1212, 'Carlos Alberto', 'Barrera Lugo', 1, '', '7721049800', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(12, 16011170, 16011170, 'Carlos Alberto', 'cbarreral@itsoeh.edu.mx', 1, '', '7721049800', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(14, 2020, 2020, 'Carlos Alberto', 'cbarreral@itsoeh.edu.mx', 3, '', '7721049800', '', 'beatriz@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(16, 16011176, 16011176, 'Pepe el Toro', 'Lugo', 1, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(28, 1313, 1313, 'Jorge', 'Alvares', 4, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(29, 1111, 1111, 'Paco', 'Sanchez', 2, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(30, 5, 5, 'Paola', 'Fernández ', 2, '', '+17721045856', '', 'pinkrouse2015@hotmail.com', 'Alumno', '', '', '', '', '', 'abc');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(31, 6, 6, 'Franco', 'betyu', 2, '', '+527721049800', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'abc');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(32, 4, 4, 'sd', 'sd', 3, '', '1241706', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'Desarrollo de aplicaciones móviles');
INSERT INTO `usuarios` (`id`, `matricula`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `telefono`, `direccion`, `correo`, `rol`, `tipo`, `periodo`, `a_academico`, `a_industrial`, `institucion`, `especialidad`) VALUES(33, 7, 7, 'ssss', 'zd', 4, '', '+17721045856', '', 'cbarreral@itsoeh.edu.mx', 'Alumno', '', '', '', '', '', 'abc');

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
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
