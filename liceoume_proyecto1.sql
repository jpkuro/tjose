-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 06:19:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liceoume_proyecto1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `lectivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `cedula`, `name`, `email`, `password`, `estado`, `celular`, `lectivo`) VALUES
(1, '0950625111', 'karla', 'karla@gmail.com', '123456', '1', '0923562347', '2012'),
(2, '0945126587', 'pablo', 'pablo@gmail.com', '123456', '1', '0997654345', '2012'),
(3, '0987451236', 'mario', 'waltercastrogarcia@hotmail.com', '123456', '1', '0974123587', '2012'),
(6, '0950625111', 'palma', 'vrjossse@hotmail.com', '123456', '1', '0987776890', '2012'),
(7, '0955587456', 'Jose ', 'andrade@gmail.com', '123456', '1', '0997654345', '2012'),
(8, '0968547125', 'jose', 'node@hotmail.com', '123456', '1', '0974123587', '2015');

--
-- Disparadores `admin`
--
DELIMITER $$
CREATE TRIGGER `actualizaradmin` BEFORE UPDATE ON `admin` FOR EACH ROW insert into historialadministra (cedula, name,  email, celular, lectivo) value (old.cedula, old.name, old.email, old.celular, old.lectivo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historialadmin` AFTER INSERT ON `admin` FOR EACH ROW insert into historialadministra (cedula, name,  email, celular, lectivo) value (new.cedula, new.name, new.email, new.celular, new.lectivo)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `qid` varchar(100) NOT NULL,
  `ansid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`id`, `qid`, `ansid`) VALUES
(1, '616ce5d24afcb', '616ce5d24b591'),
(2, '616ce5d24d46c', '616ce5d24d85c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `id_curso` varchar(50) NOT NULL,
  `curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `id_curso`, `curso`) VALUES
(1, 'ter003', 'tercero'),
(2, 'cu004', 'cuarto'),
(3, 'qu005', 'quinto'),
(4, 'sex006', 'sexto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`, `estado`) VALUES
(1, 'jose palma', 'joseluispalmapiguave@gmail.com', 'información de matricula', 'quisiera información sobre la matricula de 4 año', '2021-10-18', '04:57:30am', 1),
(2, 'pablo', 'pablo@gmail.com', 'información de matricula personal', 'quisiera saber si hay matriculas disponibles', '2021-12-15', '02:17:45am', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialadministra`
--

CREATE TABLE `historialadministra` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `lectivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialadministra`
--

INSERT INTO `historialadministra` (`id`, `cedula`, `name`, `email`, `celular`, `lectivo`) VALUES
(1, '0968547125', 'jose', 'vrjossse@hotmail.com', '0974123587', '2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialmaestro`
--

CREATE TABLE `historialmaestro` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `lectivo` varchar(50) NOT NULL,
  `id_semestre` varchar(50) NOT NULL,
  `id_parcial` varchar(50) NOT NULL,
  `id_materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialmaestro`
--

INSERT INTO `historialmaestro` (`id`, `cedula`, `nombre`, `apellido`, `curso`, `email`, `celular`, `lectivo`, `id_semestre`, `id_parcial`, `id_materia`) VALUES
(1, '0965874589', 'jose', 'vikjh', 'sex006', 'jio@hotmail.com', '456345678', '2015', 's001', 'p001', 'm001'),
(2, '0987456258', 'jose', 'Andrade', 'qu005', 'jhhhhh@gmail.com', '0875412589', '2012', 's001', 'p001', 's001'),
(3, '0987456258', 'jose', 'Andrade', 'quinto', 'cambio@gmail.com', '0875412589', '2014 ', 's001', 'p001', 'm001 '),
(4, '0987456258', 'jose', 'Andrade', 'quinto', 'jhhhh@gmail.com', '0875412589', '2014 ', 's001', 'p001', 'm001 '),
(5, '0987456258', 'jose', 'Andrade', '	\ncu00	\ncu004', 'jhhhh@gmail.com', '0875412589', '2014 ', 's001', 'p001', 'm001 '),
(6, '0987456258', 'jose', 'Andrade', '	\ncu004', 'jhhhh@gmail.com', '0875412589', '2014 ', 's001', 'p001', 'm001 '),
(7, '0987456258', 'jose', 'Andrade', 'cu004', 'jhhhh@gmail.com', '0875412589', '2014 ', 's001', 'p001', 'm001 '),
(8, '0950625111', 'jose', 'palma', 'cu004', 'joseluispalmapiguave@gmail.com', '042115064', '2015', 's001', 'p001', 'm001'),
(9, '0950625111', 'jose', 'palma', 'cu004', 'joseluispalmapiguave@gmail.com', '042115064', '2015', 's001', 'p001', 'm001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialuser`
--

CREATE TABLE `historialuser` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `id_curso` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `lectivo` varchar(50) NOT NULL,
  `id_semestre` varchar(50) NOT NULL,
  `id_parcial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialuser`
--

INSERT INTO `historialuser` (`id`, `cedula`, `name`, `gender`, `id_curso`, `email`, `mob`, `lectivo`, `id_semestre`, `id_parcial`) VALUES
(1, '0947584789', 'Jose', 'carlis', 'sex006', 'carkllis@gmail.com', '042116316', '2015', 's001', 'p001'),
(2, '0789898879', 'julio', 'palma', 'cu004', 'julio@gmail.com', '099778451', '2012', 's001', 'p001'),
(3, '0789898879', 'julio', 'palma', 'cu004', 'julio@gmail.com', '099778451', '2015 ', 's001', 'p001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `history`
--

INSERT INTO `history` (`id`, `email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
(1, 'vrjossse@hotmail.com', '616ce5c2e8ce0', 2, 2, 2, 0, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `puntaje` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `semestre` varchar(100) NOT NULL,
  `parcial` varchar(100) NOT NULL,
  `materia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `cedula`, `nombre`, `apellido`, `puntaje`, `curso`, `semestre`, `parcial`, `materia`) VALUES
(1, '0913951430', 'pablo', 'palma', '4', 'cu004', 's001', 'p001', 'matematica'),
(2, '0913951430', 'pablo', 'palma', '3', 'cu004', 's001', 'p001', 'lenguaje'),
(3, '0913951430', 'pablo', 'palma', '2', 'cu004', 's001', 'p001', 'sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectivo`
--

CREATE TABLE `lectivo` (
  `id_lectivo` int(11) NOT NULL,
  `lectivo` varchar(20) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lectivo`
--

INSERT INTO `lectivo` (`id_lectivo`, `lectivo`, `estado`) VALUES
(1, '2012', 'inactivo'),
(2, '2013', 'inactivo'),
(3, '2013', 'inactivo'),
(4, '2014', 'activo'),
(8, '2015', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `lectivo` varchar(25) NOT NULL,
  `id_semestre` varchar(100) NOT NULL,
  `id_parcial` varchar(100) NOT NULL,
  `id_materia` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `cedula`, `nombre`, `apellido`, `curso`, `email`, `celular`, `password`, `rol`, `lectivo`, `id_semestre`, `id_parcial`, `id_materia`, `estado`) VALUES
(2, '0987456258', 'jose', 'Andrade', 'qu005 ', 'jhhhh@gmail.com', '0875412589', 'L1ce0221', 'maestro', '2014 ', 's001', 'p001', 'm001 ', '1'),
(3, '0965874589', 'jose', 'vikjh', 'sex006', 'jio@hotmail.com', '456345678', 'L1ce0221', 'maestro', '2015', 's001', 'p001', 'm001', '1'),
(4, '0950625111', 'jose', 'palma', 'cu004', 'joseluispalmapiguave@gmail.com', '042115064', '123456', 'maestro', '2015', 's001', 'p001', 'm001', '1');

--
-- Disparadores `maestro`
--
DELIMITER $$
CREATE TRIGGER `actualizarmaestro` BEFORE UPDATE ON `maestro` FOR EACH ROW insert into historialmaestro (cedula, nombre, apellido, curso, email, celular, lectivo, id_semestre, id_parcial, id_materia) value (old.cedula, old.nombre, old.apellido,old.curso, old.email, old.celular, old.lectivo, old.id_semestre, old.id_parcial, old.id_materia)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historialmaestro` AFTER INSERT ON `maestro` FOR EACH ROW insert into historialmaestro (cedula, nombre, apellido,curso, email, celular, lectivo, id_semestre, id_parcial, id_materia) value (new.cedula, new.nombre, new.apellido,new.curso, new.email, new.celular, new.lectivo, new.id_semestre, new.id_parcial, new.id_materia)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `id_materia` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `id_materia`, `materia`) VALUES
(1, 'm001', 'matematica'),
(2, 'l001', 'lenguaje'),
(3, 's001', 'sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `qid` varchar(100) NOT NULL,
  `option` varchar(100) NOT NULL,
  `optionid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`id`, `qid`, `option`, `optionid`) VALUES
(1, '616ce5d24afcb', '1', '616ce5d24b591'),
(2, '616ce5d24afcb', '1', '616ce5d24b597'),
(3, '616ce5d24afcb', '1', '616ce5d24b598'),
(4, '616ce5d24afcb', '1', '616ce5d24b599'),
(5, '616ce5d24d46c', '2', '616ce5d24d85c'),
(6, '616ce5d24d46c', '2', '616ce5d24d85f'),
(7, '616ce5d24d46c', '2', '616ce5d24d860'),
(8, '616ce5d24d46c', '2', '616ce5d24d861');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `id` int(11) NOT NULL,
  `id_parcial` varchar(100) NOT NULL,
  `parcial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parcial`
--

INSERT INTO `parcial` (`id`, `id_parcial`, `parcial`) VALUES
(1, 'p001', 'primer_parcial'),
(2, 'p002', 'segundo_parcial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `qid` varchar(100) NOT NULL,
  `qns` varchar(100) NOT NULL,
  `choise` int(11) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `eid`, `qid`, `qns`, `choise`, `sn`) VALUES
(1, '616ce5c2e8ce0', '616ce5d24afcb', '1', 4, 1),
(2, '616ce5c2e8ce0', '616ce5d24d46c', '2', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`id`, `eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
(1, '616ce5c2e8ce0', 'Matematica', 1, 0, 2, 5, 'Actividad de matemática', 'cu004', '2021-10-18 03:10:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `id_semestre` varchar(100) NOT NULL,
  `semestre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id`, `id_semestre`, `semestre`) VALUES
(1, 's001', 'primer_semestre'),
(2, 's002', 'segundo_semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `id_curso` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `lectivo` varchar(25) NOT NULL,
  `id_semestre` varchar(100) NOT NULL,
  `id_parcial` varchar(100) NOT NULL,
  `id_materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `cedula`, `name`, `gender`, `id_curso`, `email`, `mob`, `password`, `rol`, `estado`, `lectivo`, `id_semestre`, `id_parcial`, `id_materia`) VALUES
(1, '0913951430', 'pablo', 'palma', 'cu004', 'vrjossse@hotmail.com', '0965434567', '123456', 'estudiante', '1', '2012', 's001', 'p001', '--'),
(2, '0789898879', 'julio', 'palma', 'ter003 ', 'julio@gmail.com', '099778451', '123456', 'estudiante', '1', '2015 ', 's001', 'p001', '--'),
(9, '0913951430', 'pablo', 'palma', 'ter003', '15Ade@hotmail.com', '099778451', 'L1ce0221', 'estudiante', '1', '2012', 's001', 'p001', '--'),
(13, '5554655555', 'carlos', 'juan', 'ter003', 'juanc@gmail.com', '099778451', 'L1ce0221', 'estudiante', '1', '2012', 's001', 'p001', '--'),
(15, '0954137741', 'JOSEPH ', 'ALVARADO ', 'qu005', 'evelynsolor@hotmail.com', '00000000', 'L1ce0221', 'estudiante', '1', '2014 ', 's001', 'p001', '--'),
(16, '0913951430', 'pablo', 'Andrade', 'qu005', 'pablog@gmail.com', '042116316', 'L1ce0221', 'estudiante', '1', '2012', 's001', 'p001', '--'),
(17, '0947584789', 'Jose', 'carlis', 'sex006', 'carkllis@gmail.com', '042116316', 'L1ce0221', 'estudiante', '1', '2015', 's001', 'p001', '--');

--
-- Disparadores `user`
--
DELIMITER $$
CREATE TRIGGER `actualizarusuario` BEFORE UPDATE ON `user` FOR EACH ROW insert into historialuser (cedula, name, gender,id_curso, email, mob, lectivo, id_semestre, id_parcial) value (old.cedula, old.name, old.gender,old.id_curso, old.email, old.mob, old.lectivo, old.id_semestre, old.id_parcial)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historialusuario` AFTER INSERT ON `user` FOR EACH ROW insert into historialuser (cedula, name, gender,id_curso, email, mob, lectivo, id_semestre, id_parcial) value (new.cedula, new.name, new.gender,new.id_curso, new.email, new.mob, new.lectivo, new.id_semestre, new.id_parcial)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialadministra`
--
ALTER TABLE `historialadministra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialmaestro`
--
ALTER TABLE `historialmaestro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialuser`
--
ALTER TABLE `historialuser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lectivo`
--
ALTER TABLE `lectivo`
  ADD PRIMARY KEY (`id_lectivo`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historialadministra`
--
ALTER TABLE `historialadministra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historialmaestro`
--
ALTER TABLE `historialmaestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historialuser`
--
ALTER TABLE `historialuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lectivo`
--
ALTER TABLE `lectivo`
  MODIFY `id_lectivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
