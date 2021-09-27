-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.123.0.88:3306
-- Tiempo de generación: 17-02-2021 a las 16:42:14
-- Versión del servidor: 5.7.27
-- Versión de PHP: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itiud_icai-s`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Edition`
--

CREATE TABLE `Edition` (
  `idEdition` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `internationalCollaboration` int(11) NOT NULL,
  `numberOfKeynotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `itiud_icai-s`;

--
-- Volcado de datos para la tabla `Edition`
--

INSERT INTO `Edition` (`idEdition`, `name`, `year`, `startDate`, `endDate`, `internationalCollaboration`, `numberOfKeynotes`) VALUES
(1, 'ICAI 2018', 2018, '2018-11-01', '2018-11-03', 11, 5),
(2, 'ICAI 2019', 2019, '2019-11-06', '2019-11-09', 20, 6),
(3, 'ICAI 2020', 2020, '2020-10-29', '2020-10-31', 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EditionTopic`
--

CREATE TABLE `EditionTopic` (
  `idEditionTopic` int(11) NOT NULL,
  `accepted` int(11) NOT NULL,
  `rejected` int(11) NOT NULL,
  `edition_idEdition` int(11) NOT NULL,
  `topic_idTopic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `itiud_icai-s`;

--
-- Volcado de datos para la tabla `EditionTopic`
--

INSERT INTO `EditionTopic` (`idEditionTopic`, `accepted`, `rejected`, `edition_idEdition`, `topic_idTopic`) VALUES
(1, 4, 13, 1, 1),
(2, 3, 14, 1, 2),
(3, 4, 6, 1, 3),
(4, 4, 5, 1, 4),
(5, 3, 2, 1, 5),
(6, 3, 3, 1, 6),
(7, 3, 3, 1, 7),
(8, 3, 8, 1, 8),
(9, 1, 3, 2, 9),
(10, 9, 12, 2, 1),
(11, 5, 10, 2, 2),
(12, 2, 4, 2, 3),
(13, 5, 6, 2, 4),
(14, 3, 4, 2, 5),
(15, 1, 3, 2, 7),
(16, 2, 3, 2, 10),
(17, 6, 8, 2, 11),
(18, 4, 7, 2, 8),
(19, 9, 13, 3, 12),
(20, 1, 3, 3, 13),
(21, 2, 4, 3, 14),
(22, 8, 11, 3, 1),
(23, 3, 6, 3, 2),
(24, 2, 5, 3, 3),
(25, 1, 4, 3, 15),
(26, 3, 5, 3, 16),
(27, 1, 4, 3, 5),
(28, 2, 5, 3, 17),
(29, 3, 6, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Topic`
--

CREATE TABLE `Topic` (
  `idTopic` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `itiud_icai-s`;

--
-- Volcado de datos para la tabla `Topic`
--

INSERT INTO `Topic` (`idTopic`, `name`) VALUES
(1, 'Data Analysis'),
(2, 'Decision Systems'),
(3, 'Health Care Information Systems'),
(4, 'IT Architectures'),
(5, 'Learning Management Systems'),
(6, 'Mobile Information Processing Systems'),
(7, 'Robotic Autonomy'),
(8, 'Software Design Engineering'),
(9, 'Bioinformatics'),
(10, 'Security Services'),
(11, 'Socio-technical Systems'),
(12, 'Artificial Intelligence'),
(13, 'Business Process Management'),
(14, 'Cloud Computing'),
(15, 'Human-Computer Interaction'),
(16, 'Image Processing'),
(17, 'Simulation and Emulation');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Edition`
--
ALTER TABLE `Edition`
  ADD PRIMARY KEY (`idEdition`);

--
-- Indices de la tabla `EditionTopic`
--
ALTER TABLE `EditionTopic`
  ADD PRIMARY KEY (`idEditionTopic`),
  ADD KEY `edition_idEdition` (`edition_idEdition`),
  ADD KEY `topic_idTopic` (`topic_idTopic`);

--
-- Indices de la tabla `Topic`
--
ALTER TABLE `Topic`
  ADD PRIMARY KEY (`idTopic`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Edition`
--
ALTER TABLE `Edition`
  MODIFY `idEdition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `EditionTopic`
--
ALTER TABLE `EditionTopic`
  MODIFY `idEditionTopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `Topic`
--
ALTER TABLE `Topic`
  MODIFY `idTopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `EditionTopic`
--
ALTER TABLE `EditionTopic`
  ADD CONSTRAINT `EditionTopic_ibfk_1` FOREIGN KEY (`edition_idEdition`) REFERENCES `Edition` (`idEdition`),
  ADD CONSTRAINT `EditionTopic_ibfk_2` FOREIGN KEY (`topic_idTopic`) REFERENCES `Topic` (`idTopic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
