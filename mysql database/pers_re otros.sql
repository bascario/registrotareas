-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2021 a las 19:29:05
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pers_re`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capas`
--

CREATE TABLE `capas` (
  `id` int(11) NOT NULL,
  `ubicacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ttl_lynd` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `url_archivo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dep` int(11) DEFAULT NULL,
  `rec` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `capas`
--

INSERT INTO `capas` (`id`, `ubicacion`, `titulo`, `ttl_lynd`, `url_archivo`, `dep`, `rec`) VALUES
(2, 'PERS:oferta_arauca_arroz', 'Oferta de arroz', 'Area sembrada (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Arroz.pdf', 1, 1),
(3, 'PERS:oferta_arauca_cacao', 'Oferta de cacao', 'Area sembrada (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Cacao.pdf', 1, 1),
(4, 'PERS:oferta_arauca_citricos', 'Oferta de cítricos', 'Area sembrada (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Cítricos.pdf', 1, 1),
(5, 'PERS:oferta_arauca_avicola_engorde', 'Oferta Sector Avícol', 'Cabezas avícolas de engordes', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Sector Avícola de Engorde.pdf', 1, 1),
(7, 'PERS:oferta_arauca_maiz_tradicional', 'Oferta de maíz tradi', 'Area sembrada (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Maíz Tradicional.pdf', 1, 1),
(8, 'PERS:oferta_arauca_platano', 'Oferta de plátano', 'Area sembrada plátano (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Plátano.pdf', 1, 1),
(9, 'PERS:oferta_arauca_yuca', 'Oferta de yucas', 'Area sembrada (Has)', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Oferta Yuca.pdf', 1, 1),
(10, 'PERS:oferta_arauca_predios_bovinos', 'Predios bovinos', 'Numero de predios bovinos', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Predios Bovinos.pdf', 1, 1),
(12, 'PERS:oferta_arauca_avicola_ponedoras', 'Sector Avícola Poned', 'Cabezas Avícolas Ponedoras', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Sector Avícola Ponedoras.pdf', 1, 1),
(13, 'PERS:arauca_sector_bovinos', 'Sector Bovino', 'Numero de Cabezas Bovinos', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Sector Bovino.pdf', 1, 1),
(14, 'PERS:arauca_porcino_tecnif', 'Sector Porcino Tecni', 'Cabezas Porcinas Tecnificado', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Sector Porcino Tecnificado.pdf', 1, 1),
(15, 'PERS:arauca_porcino_trasp', 'Sector Porcino trasp', 'Cabezas Porcinas de Traspatio', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Predios Sector Porcino Traspatio.pdf', 1, 1),
(16, 'PERS:arauca_ttal_predios_tecnif', 'Total Predios Tecnif', 'Numero de predios', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta biomasa/Total Predios Tecnificados.pdf', 1, 1),
(17, 'PERS:arauca_ghi_inpe_Arauca', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Arauca.pdf', 1, 4),
(18, 'PERS:arauca_ghi_inpe_Arauquita', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Arauquita.pdf', 1, 4),
(19, 'PERS:arauca_ghi_inpe_CravoNorte', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Cravo Norte.pdf', 1, 4),
(21, 'PERS:arauca_ghi_inpe_Fortul', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Fortul.pdf', 1, 4),
(22, 'PERS:arauca_ghi_inpe_ptoRondon', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Puerto Rondón.pdf', 1, 4),
(23, 'PERS:arauca_ghi_inpe_Saravena', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Saravena.pdf', 1, 4),
(24, 'PERS:arauca_ghi_inpe_Tame', 'Radiación global hor', 'GHI INPE KWh/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal Mpio Tame.pdf', 1, 4),
(25, 'PERS:Estaciones_arauca_hidricas', 'Estaciones de medici', 'Estaciones de mediciones hídricas', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Estaciones de Mediciones del Recurso Hídrico-Dto Arauca.pdf', 1, 2),
(26, 'PERS:Estaciones_arauca_solar', 'Estaciones de medici', 'Estaciones de mediciones solares', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Estaciones de Mediciones del Recurso Hídrico-Dto Arauca.pdf', 1, 4),
(27, 'PERS:arauca_proyectos_energeticos', 'Proyectos energético', 'Proyectos energéticos', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Proyectos Energeticos.pdf', 1, 2),
(28, 'PERS:potencial_hidro_arauca_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauca Lc 1km.pdf', 1, 2),
(29, 'PERS:potencial_hidro_arauquita_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauquita Lc 1km.pdf', 1, 2),
(30, 'PERS:potencial_hidro_cravoNorte_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Cravo Norte Lc 1km.pdf', 1, 2),
(31, 'PERS:potencial_hidro_dptoArauca_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Dto Arauca Lc 1km.pdf', 1, 2),
(32, 'PERS:potencial_hidro_fortul_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Fortul Lc 1km.pdf', 1, 2),
(33, 'PERS:potencial_hidro_ptoRondon_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Puerto Rondón Lc 1km.pdf', 1, 2),
(34, 'PERS:potencial_hidro_saravena_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Saravena Lc 1km.pdf', 1, 2),
(35, 'PERS:potencial_hidro_tame_1km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Tame Lc 1km.pdf', 1, 2),
(36, 'PERS:pp_multianual_1981_2010_arauca', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Arauca.pdf', 1, 2),
(37, 'PERS:pp_multianual_1981_2010_arauquita', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Arauquita.pdf', 1, 2),
(38, 'PERS:pp_multianual_1981_2010_cravoNorte', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Cravo Norte.pdf', 1, 2),
(39, 'PERS:pp_multianual_1981_2010_dpto_arauca', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Dto Arauca.pdf', 1, 2),
(40, 'PERS:pp_multianual_1981_2010_fortul', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Fortul.pdf', 1, 2),
(41, 'PERS:pp_multianual_1981_2010_ptoRondon', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Pto Rondón.pdf', 1, 2),
(42, 'PERS:pp_multianual_1981_2010_saravena', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Saravena.pdf', 1, 2),
(43, 'PERS:pp_multianual_1981_2010_tame', 'Precipitación multia', 'Precipitación mm', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Precipitación Multianual 1981-2010 Mpio Tame.pdf', 1, 2),
(44, 'PERS:potencial_hidro_arauca_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauca Lc 5km.pdf', 1, 2),
(45, 'PERS:potencial_hidro_arauquita_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauquita Lc 5km.pdf', 1, 2),
(46, 'PERS:potencial_hidro_dptoArauca_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Dto Arauca Lc 5km.pdf', 1, 2),
(47, 'PERS:potencial_hidro_fortul_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Fortul Lc 5km.pdf', 1, 2),
(48, 'PERS:potencial_hidro_ptoRondon_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Pto Rondón Lc 5km.pdf', 1, 2),
(49, 'PERS:potencial_hidro_saravena_5km', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Saravena Lc 5km.pdf', 1, 2),
(50, 'PERS:potencial_hidro_arauca_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauca Lc 200m.pdf', 1, 2),
(51, 'PERS:potencial_hidro_arauquita_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Arauquita LC 200m.pdf', 1, 2),
(52, 'PERS:potencial_hidro_dptoArauca_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Dto Arauca Lc 200m.pdf', 1, 2),
(53, 'PERS:potencial_hidro_fortul_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Fortul Lc 200m.pdf', 1, 2),
(54, 'PERS:potencial_hidro_ptoRondon_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Puerto Rondón LC 200m.pdf', 1, 2),
(55, 'PERS:potencial_hidro_saravena_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Saravena LC 200m.pdf', 1, 2),
(57, 'PERS:potencial_hidro_cravoNorte_200m', 'Potencial hidroenerg', 'Potencial hidroenergético MW', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta de hidroenergia/Potencial Hidroenergético Cravo Norte LC 200m.pdf', 1, 2),
(58, 'PERS:arauca_ghi_tier_Arauca', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Arauca.pdf', 1, 4),
(59, 'PERS:arauca_ghi_tier_Arauquita', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Arauquita.pdf', 1, 4),
(60, 'PERS:arauca_ghi_tier_cravo_norte', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Cravo Norte.pdf', 1, 4),
(61, 'PERS:arauca_ghi_tier_fortul', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Fortul.pdf', 1, 4),
(62, 'PERS:arauca_ghi_tier_pto_rondon', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Puert Rondon.pdf', 1, 4),
(63, 'PERS:arauca_ghi_tier_saravena', 'Radiación global hor', 'GHI TIER W/m2/día', 'http://observatorio.unillanos.edu.co/pers/archivos/pers_arauca/oferta solar/Mapa de radicación global horizontal TIER Mpio Saravena.pdf', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `asignatura` (`id`, `nombre`) VALUES
(1, 'Base de datos I'),
(2, 'Programación I'),
(3, 'Redes I'),
(4, 'Redes II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `accion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `valor` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hora` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `usuario`, `tipo`, `accion`, `valor`, `fecha`, `hora`) VALUES
(1, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-09', '04:34 PM'),
(2, 'admin', NULL, 'Agregó un departamento', 'x1', '2021-03-09', '04:34 PM'),
(3, 'admin', 1, 'Modificó un departamento', 'x1;;x12;;', '2021-03-09', '04:34 PM'),
(4, 'admin', NULL, 'Eliminó un departamento:', 'x12', '2021-03-09', '04:34 PM'),
(5, 'admin', NULL, 'Agregó un recurso', 'r1', '2021-03-09', '04:35 PM'),
(6, 'admin', NULL, 'Agregó un departamento', 'a1', '2021-03-09', '04:36 PM'),
(7, 'admin', 1, 'Modificó un departamento', 'a1;;a12;;', '2021-03-09', '04:36 PM'),
(8, 'admin', NULL, 'Eliminó un departamento:', 'a12', '2021-03-09', '04:36 PM'),
(9, 'admin', NULL, 'Agregó un recurso', 'b1', '2021-03-09', '04:36 PM'),
(10, 'admin', NULL, 'Agregó un recurso', 'r1', '2021-03-09', '04:37 PM'),
(11, 'admin', 1, 'Modificó un recurso', 'r1;;r122;;', '2021-03-09', '04:37 PM'),
(12, 'admin', NULL, 'Eliminó un recurso:', 'r122', '2021-03-09', '04:37 PM'),
(13, 'admin', NULL, 'Eliminó un recurso:', 'b1', '2021-03-09', '04:37 PM'),
(14, 'admin', NULL, 'Eliminó un recurso:', 'r1', '2021-03-09', '04:37 PM'),
(15, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- 1<br>- 1', '2021-03-09', '04:37 PM'),
(16, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', '1;;2;;1;;2;;1;;2;;Arauca;;Meta;;Oferta biomasa;;Oferta hidroenergética;;', '2021-03-09', '04:37 PM'),
(17, 'admin', NULL, 'Eliminó una capa del recurso Oferta hidroenergética del departamento Meta', '- 2<br>- 2', '2021-03-09', '04:37 PM'),
(18, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-10', '01:07 PM'),
(19, '', NULL, 'Iniciar sesión', NULL, '2021-03-10', '03:57 PM'),
(20, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-10', '03:57 PM'),
(21, '', NULL, 'Iniciar sesión', NULL, '2021-03-10', '03:59 PM'),
(22, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-10', '03:59 PM'),
(23, '', NULL, 'Iniciar sesión', NULL, '2021-03-10', '04:03 PM'),
(24, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-10', '04:03 PM'),
(25, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-12', '07:19 PM'),
(26, 'admin', NULL, 'Agregó un departamento', 'd1', '2021-03-12', '07:19 PM'),
(27, 'admin', 1, 'Modificó un departamento', 'd1;;d12;;', '2021-03-12', '07:19 PM'),
(28, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-12', '09:59 PM'),
(29, 'admin', 1, 'Modificó un departamento', 'd12;;d123;;', '2021-03-12', '10:01 PM'),
(30, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-12', '10:10 PM'),
(31, 'observatorio observa', NULL, 'Restauró su contraseña', NULL, '2021-03-12', '10:41 PM'),
(32, '', NULL, 'Iniciar sesión', NULL, '2021-03-12', '10:42 PM'),
(33, 'observatorio observa', 1, 'Modificó su perfil', 'Cambió su contraseña', '2021-03-12', '10:42 PM'),
(34, 'observatorio', NULL, 'Cerrar sesión', NULL, '2021-03-12', '10:42 PM'),
(35, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-12', '12:35 PM'),
(36, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:12 PM'),
(37, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'c1;;j1;;c1;;j1;;c1;;j1;;', '2021-03-13', '02:12 PM'),
(38, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:35 PM'),
(39, 'admin', NULL, 'Eliminó un usuario', 'xxxxx', '2021-03-13', '02:35 PM'),
(40, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:35 PM'),
(41, 'observatorio observa', NULL, 'Restauró su contraseña', NULL, '2021-03-13', '02:35 PM'),
(42, '', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:35 PM'),
(43, 'observatorio observa', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:35 PM'),
(44, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:36 PM'),
(45, 'admin', 1, 'Modificó su perfil', '', '2021-03-13', '02:38 PM'),
(46, 'ADMINISTRADOR', 1, 'Modificó su perfil', 'Cambió su contraseña', '2021-03-13', '02:39 PM'),
(47, 'ADMINISTRADOR', NULL, 'Agregó un departamento', 'd2', '2021-03-13', '02:39 PM'),
(48, 'ADMINISTRADOR', 1, 'Modificó un departamento', 'd2;;d21;;', '2021-03-13', '02:39 PM'),
(49, 'ADMINISTRADOR', NULL, 'Eliminó un departamento:', 'd21', '2021-03-13', '02:39 PM'),
(50, 'ADMINISTRADOR', NULL, 'Eliminó un departamento:', 'd123', '2021-03-13', '02:40 PM'),
(51, 'ADMINISTRADOR', NULL, 'Agregó un recurso', 'r1', '2021-03-13', '02:40 PM'),
(52, 'ADMINISTRADOR', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-13', '02:40 PM'),
(53, 'ADMINISTRADOR', NULL, 'Eliminó un recurso:', 'r12', '2021-03-13', '02:40 PM'),
(54, 'ADMINISTRADOR', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- 4<br>- 4', '2021-03-13', '02:40 PM'),
(55, 'ADMINISTRADOR', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', '4;;5;;4;;5;;4;;5;;Arauca;;Meta;;Oferta biomasa;;Oferta hidroenergética;;', '2021-03-13', '02:40 PM'),
(56, 'ADMINISTRADOR', NULL, 'Eliminó una capa del recurso Oferta hidroenergética del departamento Meta', '- 5<br>- 5', '2021-03-13', '02:41 PM'),
(57, 'admin', NULL, 'Creó un usuario', 'Nombre: xxxxx<br>Usuario: xxxxx', '2021-03-13', '02:46 PM'),
(58, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:46 PM'),
(59, '', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:47 PM'),
(60, 'xxxxx xxxxx', 1, 'Modificó su perfil', 'xxxxx1;;xxxxx;;xxxxx1;;xxxxx;;xxxxx1;;xxxxx;;Cambió su contraseña', '2021-03-13', '02:47 PM'),
(61, 'xxxxx1', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:47 PM'),
(62, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:47 PM'),
(63, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:51 PM'),
(64, 'xxxxx1 xxxxx1', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:51 PM'),
(65, 'xxxxx1 xxxxx1', 1, 'Modificó su perfil', 'xxxxx;;xxxxx1;;xxxxx;;xxxxx1;;xxxxx;;xxxxx1;;', '2021-03-13', '02:52 PM'),
(66, 'xxxxx', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:52 PM'),
(67, 'xxxxx xxxxx', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:52 PM'),
(68, 'xxxxx xxxxx', NULL, 'Cerrar sesión', NULL, '2021-03-13', '02:52 PM'),
(69, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-13', '02:52 PM'),
(70, 'admin', NULL, 'Inició sesión', NULL, '2021-03-13', '03:04 PM'),
(71, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- asd<br>- j', '2021-03-13', '08:04 PM'),
(72, 'admin', NULL, 'Eliminó un usuario', 'xxxxx', '2021-03-13', '03:05 PM'),
(73, 'admin', NULL, 'Creó un usuario', 'Nombre: jjjjjjjjjj jjjjjjjjjjj<br>Usuario: jjjjjjjjjjj', '2021-03-13', '03:05 PM'),
(74, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-13', '03:11 PM'),
(75, 'jjjjjjjjjj jjjjjjjjj', NULL, 'Inició sesión', NULL, '2021-03-13', '03:11 PM'),
(76, 'jjjjjjjjjj jjjjjjjjj', NULL, 'Cerró sesión', NULL, '2021-03-13', '03:11 PM'),
(77, 'jjjjjjjjjj jjjjjjjjj', NULL, 'Inició sesión', NULL, '2021-03-13', '03:12 PM'),
(78, 'jjjjjjjjjj jjjjjjjjj', NULL, 'Cerró sesión', NULL, '2021-03-13', '03:12 PM'),
(79, 'admin', NULL, 'Inició sesión', NULL, '2021-03-13', '03:12 PM'),
(80, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-13', '03:12 PM'),
(81, 'admin', NULL, 'Inició sesión', NULL, '2021-03-13', '03:12 PM'),
(82, 'admin', 1, 'Modificó su perfil', 'Cambió su contraseña', '2021-03-13', '03:12 PM'),
(83, 'admin', NULL, 'Eliminó un usuario', 'jjjjjjjjjjj', '2021-03-13', '03:17 PM'),
(84, 'ADMINISTRADOR', NULL, 'Cerró sesión', NULL, '2021-03-13', '03:18 PM'),
(85, 'admin', NULL, 'Inició sesión', NULL, '2021-03-15', '06:35 PM'),
(86, 'admin', 1, 'Modificó su perfil', 'admin2;;admin;;Cambió su contraseña', '2021-03-15', '06:35 PM'),
(87, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjj jjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-15', '06:39 PM'),
(88, 'ADMINISTRADOR', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:39 PM'),
(89, 'jjjjjj jjjjjjjjjjj', NULL, 'Inició sesión', NULL, '2021-03-15', '06:39 PM'),
(90, 'jjjjjj jjjjjjjjjjj', 1, 'Modificó su perfil', 'xxxxx;;jjjjjj;;x ;;jjjjjjjjjjj;;', '2021-03-15', '06:39 PM'),
(91, 'xxxxx', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:39 PM'),
(92, 'admin', NULL, 'Inició sesión', NULL, '2021-03-15', '06:39 PM'),
(93, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:43 PM'),
(94, 'xxxxx x ', NULL, 'Inició sesión', NULL, '2021-03-15', '06:43 PM'),
(95, 'xxxxx x ', 1, 'Modificó su perfil', 'juan23;;xxxxx;;lopez;;x ;;', '2021-03-15', '06:43 PM'),
(96, 'juan23', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:43 PM'),
(97, '', NULL, 'Inició sesión', NULL, '2021-03-15', '06:49 PM'),
(98, '', NULL, 'Agregó un departamento', 'xxxxxx', '2021-03-15', '06:49 PM'),
(99, 'admin', NULL, 'Inició sesión', NULL, '2021-03-15', '06:50 PM'),
(100, '', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:51 PM'),
(101, '', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:53 PM'),
(102, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-15', '06:54 PM'),
(103, 'ejemplo', NULL, 'Cerró sesión', NULL, '2021-03-15', '06:54 PM'),
(104, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '07:01 PM'),
(105, 'ejemplo', NULL, 'Agregó un departamento', 'd1', '2021-03-16', '07:01 PM'),
(106, 'ejemplo', 1, 'Modificó un departamento', 'd1;;d2;;', '2021-03-16', '07:01 PM'),
(107, 'ejemplo', NULL, 'Eliminó un departamento:', 'd2', '2021-03-16', '07:01 PM'),
(108, 'ejemplo', NULL, 'Eliminó un departamento:', 'xxxxxx', '2021-03-16', '07:01 PM'),
(109, 'ejemplo', NULL, 'Agregó un recurso', 'r1', '2021-03-16', '07:01 PM'),
(110, 'ejemplo', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-16', '07:02 PM'),
(111, 'ejemplo', NULL, 'Eliminó un recurso:', 'r12', '2021-03-16', '07:02 PM'),
(112, 'ejemplo', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '07:03 PM'),
(113, 'ejemplo', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- x<br>- x', '2021-03-16', '07:04 PM'),
(114, 'ejemplo', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- 1<br>- 1', '2021-03-16', '07:07 PM'),
(115, 'ejemplo', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', '1;;2;;1;;2;;1;;2;;', '2021-03-16', '07:07 PM'),
(116, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- 2<br>- 2', '2021-03-16', '07:07 PM'),
(117, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- x<br>- x', '2021-03-16', '07:07 PM'),
(118, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '07:07 PM'),
(119, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- asd<br>- j', '2021-03-16', '07:07 PM'),
(120, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- j1<br>- j1', '2021-03-16', '07:07 PM'),
(121, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- i<br>- i', '2021-03-16', '07:08 PM'),
(122, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- u<br>- u', '2021-03-16', '07:08 PM'),
(123, 'ejemplo', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- 5<br>- 5', '2021-03-16', '07:08 PM'),
(124, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '07:08 PM'),
(125, 'ejemplo', 1, 'Modificó su perfil', 'juan232;;juan23;;2;;lopez;;ejemplox;;ejemplo;;', '2021-03-16', '07:09 PM'),
(126, 'ejemplox', NULL, 'Cerró sesión', NULL, '2021-03-16', '07:09 PM'),
(127, 'admin', NULL, 'Eliminó un usuario', 'ejemplox', '2021-03-16', '07:09 PM'),
(128, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '07:13 PM'),
(129, '', NULL, 'Cerró sesión', NULL, '2021-03-16', '07:13 PM'),
(130, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '07:13 PM'),
(131, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjjjjjj jjjjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '07:13 PM'),
(132, 'jjjjjjjjjjjj jjjjjjj', NULL, 'Restauró su contraseña', NULL, '2021-03-16', '07:13 PM'),
(133, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '07:13 PM'),
(134, 'ejemplo', NULL, 'Cerró sesión', NULL, '2021-03-16', '07:13 PM'),
(135, 'ejemplo', NULL, 'Restauró su contraseña', NULL, '2021-03-16', '07:15 PM'),
(136, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '08:31 PM'),
(137, 'ejemplo', NULL, 'Restauró su contraseña', NULL, '2021-03-16', '08:33 PM'),
(138, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '08:33 PM'),
(139, 'ejemplo', NULL, 'Cerró sesión', NULL, '2021-03-16', '08:33 PM'),
(140, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '08:43 PM'),
(141, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '08:43 PM'),
(142, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '09:43 PM'),
(143, 'admin', NULL, 'Agregó un departamento', 'z1', '2021-03-16', '09:43 PM'),
(144, 'admin', 1, 'Modificó un departamento', 'z1;;z2;;', '2021-03-16', '09:43 PM'),
(145, 'admin', NULL, 'Eliminó un departamento:', 'z2', '2021-03-16', '09:43 PM'),
(146, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- ', '2021-03-16', '09:44 PM'),
(147, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w<br>- ', '2021-03-16', '09:44 PM'),
(148, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- ', '2021-03-16', '09:44 PM'),
(149, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w<br>- ', '2021-03-16', '09:51 PM'),
(150, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '09:52 PM'),
(151, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'w;;w2;;w;;w2;;', '2021-03-16', '09:55 PM'),
(152, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w2<br>- w2', '2021-03-16', '09:57 PM'),
(153, 'admin', NULL, 'Eliminó un usuario', 'ejemplo', '2021-03-16', '10:10 PM'),
(154, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjjjj jjjjjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '10:10 PM'),
(155, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:13 PM'),
(156, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '10:13 PM'),
(157, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjjjjjjx;;jjjjjjjjjj;;jjjjjjjjjjjjjjx;;jjjjjjjjjjjjjj;;', '2021-03-16', '10:14 PM'),
(158, 'ejemplo', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:14 PM'),
(159, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:14 PM'),
(160, 'admin', NULL, 'Eliminó un usuario', 'ejemplo', '2021-03-16', '10:16 PM'),
(161, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjj jjjjjj<br>Usuario: ejemplo', '2021-03-16', '10:16 PM'),
(162, '', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:16 PM'),
(163, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '10:16 PM'),
(164, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjj;;jjjjjjx;;jjjjjj;;jjjjjjx;;ejemplo;;ejemplox;;', '2021-03-16', '10:17 PM'),
(165, 'admin', NULL, 'Eliminó un usuario', 'ejemplox', '2021-03-16', '10:17 PM'),
(166, 'admin', 1, 'Modificó su perfil', 'ADMINISTRADOR;;ADMINISTRADOR1;;', '2021-03-16', '10:18 PM'),
(167, 'admin', 1, 'Modificó su perfil', 'ADMINISTRADOR1;;admin;;', '2021-03-16', '10:18 PM'),
(168, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:18 PM'),
(169, 'ejemplox', NULL, 'Agregó un departamento', 'x1', '2021-03-16', '10:20 PM'),
(170, 'ejemplox', 1, 'Modificó un departamento', 'x1;;x12;;', '2021-03-16', '10:20 PM'),
(171, 'ejemplox', NULL, 'Eliminó un departamento:', 'x12', '2021-03-16', '10:20 PM'),
(172, 'ejemplox', NULL, 'Agregó un recurso', 'r1', '2021-03-16', '10:21 PM'),
(173, 'ejemplox', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-16', '10:21 PM'),
(174, 'ejemplox', NULL, 'Eliminó un recurso:', 'r12', '2021-03-16', '10:21 PM'),
(175, 'ejemplox', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- ww<br>- ww', '2021-03-16', '10:21 PM'),
(176, 'ejemplox', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'ww;;ww2;;ww;;ww2;;', '2021-03-16', '10:21 PM'),
(177, 'ejemplox', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- ww2<br>- ww2', '2021-03-16', '10:21 PM'),
(178, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:23 PM'),
(179, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:23 PM'),
(180, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:24 PM'),
(181, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjj jjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '10:24 PM'),
(182, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '10:24 PM'),
(183, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjjjj;;jjjjjjjjx;;jjjjjjjjjjj;;jjjjjjjjjjjx;;ejemplo;;ejemplox;;', '2021-03-16', '10:24 PM'),
(184, 'ejemplox', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:24 PM'),
(185, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:37 PM'),
(186, 'admin', NULL, 'Eliminó un usuario', 'ejemplox', '2021-03-16', '10:37 PM'),
(187, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:49 PM'),
(188, 'admin', NULL, 'Agregó un departamento', 'x1', '2021-03-16', '10:56 PM'),
(189, 'admin', 1, 'Modificó un departamento', 'x1;;x12;;', '2021-03-16', '10:56 PM'),
(190, 'admin', NULL, 'Eliminó un departamento:', 'x12', '2021-03-16', '10:56 PM'),
(191, 'admin', NULL, 'Agregó un recurso', 'r1', '2021-03-16', '10:56 PM'),
(192, 'admin', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-16', '10:56 PM'),
(193, 'admin', NULL, 'Eliminó un recurso:', 'r12', '2021-03-16', '10:56 PM'),
(194, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '10:57 PM'),
(195, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'w;;w2;;w;;w2;;', '2021-03-16', '10:57 PM'),
(196, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w2<br>- w2', '2021-03-16', '10:57 PM'),
(197, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjjj jjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '10:57 PM'),
(198, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:57 PM'),
(199, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '10:57 PM'),
(200, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjjjjj;;jjjjjjjjj1;;jjjjjjjjj;;jjjjjjjjj1;;ejemplo;;ejemplo1;;Cambió su contraseña', '2021-03-16', '10:57 PM'),
(201, 'ejemplo1', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:57 PM'),
(202, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:58 PM'),
(203, 'admin', NULL, 'Eliminó un usuario', 'ejemplo1', '2021-03-16', '10:59 PM'),
(204, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:59 PM'),
(205, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '09:03 AM'),
(206, 'admin', NULL, 'Agregó un departamento', 'd1', '2021-03-16', '09:03 AM'),
(207, 'admin', 1, 'Modificó un departamento', 'd1;;d12;;', '2021-03-16', '09:03 AM'),
(208, 'admin', NULL, 'Eliminó un departamento:', 'd12', '2021-03-16', '09:03 AM'),
(209, 'admin', NULL, 'Agregó un recurso', 'r1', '2021-03-16', '09:03 AM'),
(210, 'admin', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-16', '09:03 AM'),
(211, 'admin', NULL, 'Eliminó un recurso:', 'r12', '2021-03-16', '09:04 AM'),
(212, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- j<br>- j', '2021-03-16', '09:04 AM'),
(213, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- i<br>- i', '2021-03-16', '09:04 AM'),
(214, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '09:04 AM'),
(215, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'w;;w2;;w;;w2;;w;;w2;;', '2021-03-16', '09:04 AM'),
(216, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w2<br>- w2', '2021-03-16', '09:04 AM'),
(217, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjjjj jjjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '09:05 AM'),
(218, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '09:05 AM'),
(219, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '09:05 AM'),
(220, 'ejemplo', NULL, 'Agregó un departamento', 'x1', '2021-03-16', '09:05 AM'),
(221, 'ejemplo', NULL, 'Eliminó un departamento:', 'x1', '2021-03-16', '09:05 AM'),
(222, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjjjjjj;;jjjjjjjjjj1;;jjjjjjjjjjjj;;12345;;ejemplo;;ejemplo1;;', '2021-03-16', '09:05 AM'),
(223, 'ejemplo1', NULL, 'Cerró sesión', NULL, '2021-03-16', '09:05 AM'),
(224, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '09:05 AM'),
(225, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '09:42 AM'),
(226, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '09:42 AM'),
(227, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:19 AM'),
(228, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:52 AM'),
(229, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '10:54 AM'),
(230, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '10:54 AM'),
(231, 'admin', NULL, 'Agregó un departamento', 'asdasd', '2021-03-16', '11:02 AM'),
(232, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '11:12 AM'),
(233, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '11:12 AM'),
(234, 'admin', NULL, 'Agregó un departamento', 'd1', '2021-03-16', '11:13 AM'),
(235, 'admin', 1, 'Modificó un departamento', 'asdasd;;d22;;', '2021-03-16', '11:14 AM'),
(236, 'admin', NULL, 'Eliminó un departamento:', 'd22', '2021-03-16', '11:15 AM'),
(237, 'admin', NULL, 'Eliminó un departamento:', 'd1', '2021-03-16', '11:15 AM'),
(238, 'admin', NULL, 'Agregó un recurso', 'r1', '2021-03-16', '11:15 AM'),
(239, 'admin', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-16', '11:15 AM'),
(240, 'admin', NULL, 'Eliminó un recurso:', 'r12', '2021-03-16', '11:15 AM'),
(241, 'admin', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- w<br>- w', '2021-03-16', '11:16 AM'),
(242, 'admin', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'w;;w2;;w;;w2;;Arauca;;Oferta biomasa;;Oferta biomasa;;Arauca;;', '2021-03-16', '11:16 AM'),
(243, 'admin', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- w2<br>- w2', '2021-03-16', '11:16 AM'),
(244, 'admin', NULL, 'Eliminó un usuario', 'ejemplo1', '2021-03-16', '11:16 AM'),
(245, 'admin', NULL, 'Creó un usuario', 'Nombres: jjjjjjjjjj jjjjjjjjjjj<br>Usuario: ejemplo', '2021-03-16', '11:17 AM'),
(246, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-16', '11:17 AM'),
(247, 'ejemplo', NULL, 'Inició sesión', NULL, '2021-03-16', '11:17 AM'),
(248, 'ejemplo', 1, 'Modificó su perfil', 'jjjjjjjjjj;;jjjjjjjjjj1;;jjjjjjjjjjj;;jjjjjjjjjjj1;;ejemplo;;ejemplo1;;', '2021-03-16', '11:17 AM'),
(249, 'ejemplo1', NULL, 'Cerró sesión', NULL, '2021-03-16', '11:17 AM'),
(250, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '11:17 AM'),
(251, 'admin', NULL, 'Eliminó un usuario', 'ejemplo1', '2021-03-16', '11:19 AM'),
(252, 'admin', NULL, 'Inició sesión', NULL, '2021-03-16', '11:33 AM'),
(253, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '09:47 AM'),
(254, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:40 AM'),
(255, 'admin', NULL, 'Agregó un departamento', 's1', '2021-03-18', '11:40 AM'),
(256, 'admin', 1, 'Modificó un departamento s1', 's1;;s12;;', '2021-03-18', '11:41 AM'),
(257, 'admin', NULL, 'Eliminó un departamento:', 's12', '2021-03-18', '11:45 AM'),
(258, 'admin', NULL, 'Agregó un departamento', 's2', '2021-03-18', '11:45 AM'),
(259, 'admin', 1, 'Modificó un departamento s2', 's2;;s23;;', '2021-03-18', '11:45 AM'),
(260, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:46 AM'),
(261, '', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:46 AM'),
(262, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:46 AM'),
(263, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:46 AM'),
(264, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:47 AM'),
(265, 'admin', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:47 AM'),
(266, 'observatorio observa', NULL, 'Restauró su contraseña', NULL, '2021-03-18', '11:47 AM'),
(267, '', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:47 AM'),
(268, '', 1, 'Modificó su perfil', 'Cambió su contraseña', '2021-03-18', '11:47 AM'),
(269, '0bs3rv4t0r10', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:47 AM'),
(270, '', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:48 AM'),
(271, '', NULL, 'Agregó un departamento', '123', '2021-03-18', '11:48 AM'),
(272, '', 1, 'Modificó un departamento s23', 's23;;s234;;', '2021-03-18', '11:48 AM'),
(273, '', NULL, 'Eliminó un departamento:', 's234', '2021-03-18', '11:48 AM'),
(274, '', NULL, 'Eliminó un departamento:', '123', '2021-03-18', '11:48 AM'),
(275, 'admin', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:48 AM'),
(276, '', NULL, 'Agregó un departamento', 'm1', '2021-03-18', '11:49 AM'),
(277, '', 1, 'Modificó un departamento m1', 'm1;;m12;;', '2021-03-18', '11:49 AM'),
(278, '', NULL, 'Eliminó un departamento:', 'm12', '2021-03-18', '11:49 AM'),
(279, '', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:53 AM'),
(280, '0bs3rv4t0r10', NULL, 'Cerrar sesión', NULL, '2021-03-18', '11:54 AM'),
(281, '0bs3rv4t0r10', NULL, 'Iniciar sesión', NULL, '2021-03-18', '11:54 AM'),
(282, '0bs3rv4t0r10', NULL, 'Agregó un departamento', 'x1', '2021-03-18', '11:56 AM'),
(283, '0bs3rv4t0r10', 1, 'Modificó un departamento x1', 'x1;;x12;;', '2021-03-18', '11:57 AM'),
(284, '0bs3rv4t0r10', NULL, 'Eliminó un departamento:', 'x12', '2021-03-18', '11:57 AM'),
(285, '0bs3rv4t0r10', 1, 'Modificó su perfil', 'observatorio;;observatorio1;;', '2021-03-18', '11:57 AM'),
(286, '0bs3rv4t0r10', NULL, 'Agregó un recurso', 'r1', '2021-03-18', '11:57 AM'),
(287, '0bs3rv4t0r10', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-18', '11:57 AM'),
(288, '0bs3rv4t0r10', NULL, 'Eliminó un recurso:', 'r12', '2021-03-18', '11:57 AM'),
(289, '0bs3rv4t0r10', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- u1<br>- t1', '2021-03-18', '12:05 PM'),
(290, '0bs3rv4t0r10', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'u1;;u12;;t1;;t12;;t2;;t23;;', '2021-03-18', '12:08 PM'),
(291, '0bs3rv4t0r10', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- u12<br>- t12', '2021-03-18', '12:08 PM'),
(292, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '12:10 PM'),
(293, '0bs3rv4t0r10', NULL, 'Agregó un departamento', 'x1', '2021-03-18', '12:10 PM'),
(294, '0bs3rv4t0r10', 1, 'Modificó un departamento x1', 'x1;;x12;;', '2021-03-18', '12:10 PM'),
(295, '0bs3rv4t0r10', NULL, 'Eliminó un departamento:', 'x12', '2021-03-18', '12:10 PM'),
(296, '0bs3rv4t0r10', NULL, 'Agregó un recurso', 'r1', '2021-03-18', '12:11 PM'),
(297, '0bs3rv4t0r10', 1, 'Modificó un recurso', 'r1;;r12;;', '2021-03-18', '12:11 PM'),
(298, '0bs3rv4t0r10', NULL, 'Eliminó un recurso:', 'r12', '2021-03-18', '12:11 PM'),
(299, '0bs3rv4t0r10', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- c1<br>- c1', '2021-03-18', '12:11 PM'),
(300, '0bs3rv4t0r10', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'c1;;c12;;c1;;c12;;c1;;c12;;', '2021-03-18', '12:11 PM'),
(301, '0bs3rv4t0r10', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- c12<br>- c12', '2021-03-18', '12:11 PM'),
(302, '0bs3rv4t0r10', NULL, 'Cerró sesión', NULL, '2021-03-18', '12:12 PM'),
(303, '0bs3rv4t0r10', NULL, 'Inició sesión', NULL, '2021-03-18', '12:12 PM'),
(304, '0bs3rv4t0r10', NULL, 'Agregó un departamento', 'd1', '2021-03-18', '12:13 PM'),
(305, '0bs3rv4t0r10', 1, 'Modificó un departamento', 'd1;;d12;;', '2021-03-18', '12:13 PM'),
(306, '0bs3rv4t0r10', NULL, 'Eliminó un departamento:', 'd12', '2021-03-18', '12:13 PM'),
(307, '0bs3rv4t0r10', NULL, 'Agregó un recurso', 'rx', '2021-03-18', '12:13 PM'),
(308, '0bs3rv4t0r10', 1, 'Modificó un recurso', 'rx;;rx2;;', '2021-03-18', '12:13 PM'),
(309, '0bs3rv4t0r10', NULL, 'Eliminó un recurso:', 'rx2', '2021-03-18', '12:14 PM'),
(310, '0bs3rv4t0r10', NULL, 'Agregó una capa al recurso Oferta biomasa del departamento Arauca', '- p1<br>- p1', '2021-03-18', '12:15 PM'),
(311, '0bs3rv4t0r10', 1, 'Modificó una capa del recurso Oferta biomasa del departamento Arauca', 'p1;;p12;;p1;;p12;;p1;;p12;;Arauca;;Oferta biomasa;;Oferta biomasa;;Arauca;;', '2021-03-18', '12:15 PM'),
(312, '0bs3rv4t0r10', NULL, 'Eliminó una capa del recurso Oferta biomasa del departamento Arauca', '- p12<br>- p12', '2021-03-18', '12:16 PM'),
(313, '0bs3rv4t0r10', 1, 'Modificó su perfil', 'observatorio1;;observatorio;;', '2021-03-18', '12:18 PM'),
(314, '0bs3rv4t0r10', NULL, 'Cerró sesión', NULL, '2021-03-18', '12:19 PM'),
(315, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-18', '12:22 PM'),
(316, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '12:38 PM'),
(317, 'admin', NULL, 'Creó un usuario', 'Nombres: xxxxxxxxxxx xxxxxxxxxxx<br>Usuario: xxxxxx', '2021-03-18', '12:40 PM'),
(318, 'admin', NULL, 'Eliminó un usuario', 'xxxxxx', '2021-03-18', '12:40 PM'),
(319, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '12:45 PM'),
(320, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-18', '12:45 PM'),
(321, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '12:46 PM'),
(322, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '05:31 PM'),
(323, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-18', '05:37 PM'),
(324, 'admin', NULL, 'Inició sesión', NULL, '2021-03-18', '06:16 PM'),
(325, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-18', '06:16 PM'),
(326, 'admin', NULL, 'Inició sesión', NULL, '2021-03-20', '02:25 PM'),
(327, 'admin', NULL, 'Cerró sesión', NULL, '2021-03-20', '02:25 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`) VALUES
(1, 'Oferta biomasa'),
(2, 'Oferta hidroenergética'),
(4, 'Oferta radiación solar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `usuario`, `contrasena`, `fecha`) VALUES
(1, 'ADMINISTRADOR', 'admin', 'admin', '/9AoTY8bdBtB4Gb34NxVxg==', '2020-10-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capas`
--
ALTER TABLE `capas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `munic` (`dep`),
  ADD KEY `id_rec` (`rec`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
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
-- AUTO_INCREMENT de la tabla `capas`
--
ALTER TABLE `capas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capas`
--
ALTER TABLE `capas`
  ADD CONSTRAINT `id_rec` FOREIGN KEY (`rec`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `munic` FOREIGN KEY (`dep`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
