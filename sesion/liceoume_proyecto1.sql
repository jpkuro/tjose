-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-11-2021 a las 22:11:06
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `celular` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `cedula`, `name`, `email`, `password`, `estado`, `celular`) VALUES
(1, '0950625111', 'karla', 'karla@gmail.com', '123456', '1', '0923562347'),
(2, '0945126587', 'pablo', 'pablo@gmail.com', '123456', '1', '0997654345'),
(3, '0987451236', 'mario', 'waltercastrogarcia@hotmail.com', '123456', '1', '0974123587'),
(6, '0950625111', 'palma', 'vrjossse@hotmail.com', '123456', '1', '0987776890');

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
(2, '616ce5d24d46c', '616ce5d24d85c'),
(3, '61717d5204c37', '61717d520555a'),
(4, '61717d520675a', '61717d5206802');

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
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
(1, 'jose palma', 'joseluispalmapiguave@gmail.com', 'información de matricula', 'quisiera información sobre la matricula de 4 año', '2021-10-18', '04:57:30am');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `history`
--

INSERT INTO `history` (`id`, `email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
(1, 'vrjossse@hotmail.com', '616ce5c2e8ce0', 2, 2, 2, 0, '2021-10-03 23:50:17'),
(2, 'vrjossse@hotmail.com', '61717d10ef508', 4, 2, 2, 0, '2021-10-21 14:47:41');

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
(1, '0913951430', 'pablo', 'palma', '9', 'cu004', 's001', 'p001', 'matematica'),
(2, '0913951430', 'pablo', 'palma', '3', 'cu004', 's001', 'p001', 'lenguaje'),
(3, '0913951430', 'pablo', 'palma', '2', 'cu004', 's001', 'p001', 'sociales');

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
  `id_semestre` varchar(100) NOT NULL,
  `id_parcial` varchar(100) NOT NULL,
  `id_materia` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `cedula`, `nombre`, `apellido`, `curso`, `email`, `celular`, `password`, `rol`, `id_semestre`, `id_parcial`, `id_materia`, `estado`) VALUES
(1, '0968547125', 'jose', 'palma', 'cu004', 'joseluispalmapiguave@gmail.com', '042115064', '123456', 'maestro', 'soo1', 'p001', 'm001', '1');

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
(8, '616ce5d24d46c', '2', '616ce5d24d861'),
(9, '61717d5204c37', '3', '61717d520555a'),
(10, '61717d5204c37', '2', '61717d520555e'),
(11, '61717d5204c37', '0', '61717d520555f'),
(12, '61717d5204c37', '1', '61717d5205560'),
(13, '61717d520675a', 'sumandos', '61717d5206802'),
(14, '61717d520675a', 'operador', '61717d5206803'),
(15, '61717d520675a', 'total', '61717d5206804'),
(16, '61717d520675a', 'suma', '61717d5206805');

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
(2, '616ce5c2e8ce0', '616ce5d24d46c', '2', 4, 2),
(3, '61717d10ef508', '61717d5204c37', '1+ 2=', 4, 1),
(4, '61717d10ef508', '61717d520675a', 'Los términos de la suma se llaman', 4, 2);

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`id`, `eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
(1, '616ce5c2e8ce0', 'Matematica', 1, 0, 2, 5, 'Actividad de matemática', 'cu004', '2021-10-03 23:50:17'),
(2, '61717d10ef508', 'Actividad Unidad 3', 2, 0, 2, 2, 'Sumas', 'cu004', '2021-10-21 14:45:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `id_semestre` varchar(100) NOT NULL,
  `id_parcial` varchar(100) NOT NULL,
  `id_materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `cedula`, `name`, `gender`, `id_curso`, `email`, `mob`, `password`, `rol`, `estado`, `id_semestre`, `id_parcial`, `id_materia`) VALUES
(1, '0913951430', 'pablo', 'palma', 'cu004', 'vrjossse@hotmail.com', '0965434567', '123456', 'estudiante', '1', 's001', 'p001', '--'),
(2, '0789898879', 'julio', 'palma', 'cu004', 'julio@gmail.com', '099778451', '123456', 'estudiante', '1', 's001', 'p001', '--'),
(13, '5554655555', 'carlos', 'juan', 'ter003', 'juanc@gmail.com', '099778451', 'L1ce0221', 'estudiante', '1', 's001', 'p001', '--');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
