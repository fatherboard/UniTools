-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2020 a las 16:24:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2
=======
-- Host: 127.0.0.1 
-- Generation Time: Apr 01, 2020 at 01:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitoolsdb`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forumposts`
=======
-- Table structure for table `forumposts`
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c
--

CREATE TABLE `forumposts` (
  `id_post` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
<<<<<<< HEAD
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forumposts`
--

INSERT INTO `forumposts` (`id_post`, `user`, `title`, `content`, `category`) VALUES
(2, 4, 'No sé hacer esto, ayuda', 'toi to perdio chavales, no sé sumar 1 a una variable xd', 0),
(3, 5, 'Holaaaaaaaaaa', 'Esto es un contenido to wapo nen', 0);
=======
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forumposts`
--

INSERT INTO `forumposts` (`id_post`, `user`, `title`, `content`) VALUES
(2, 4, 'No sé hacer esto, ayuda', 'toi to perdio chavales, no sé sumar 1 a una variable xd'),
(3, 5, 'Holaaaaaaaaaa', 'Esto es un contenido to wapo nen');
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id_rep` int(11) NOT NULL,
  `description` text NOT NULL,
  `creator` int(11) NOT NULL,
  `private` tinyint(1) NOT NULL,
  `repURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_User` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
<<<<<<< HEAD
-- Volcado de datos para la tabla `user`
=======
-- Dumping data for table `user`
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c
--

INSERT INTO `user` (`id_User`, `email`, `password`, `username`, `premium`) VALUES
(4, 'caca@caca.com', '1', 'hugo', 1),
(5, 'l@l.l', '1', 'l', 1);

--
<<<<<<< HEAD
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `forumposts`
=======
-- Indexes for dumped tables
--

--
-- Indexes for table `forumposts`
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c
--
ALTER TABLE `forumposts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user` (`user`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forumposts`
=======
-- AUTO_INCREMENT for table `forumposts`
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c
--
ALTER TABLE `forumposts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
<<<<<<< HEAD
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `forumposts` (`category`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `forumposts`
=======
-- Constraints for table `forumposts`
>>>>>>> 28591d938c16fd340ccb833f5c67f5679b867a0c
--
ALTER TABLE `forumposts`
  ADD CONSTRAINT `forumposts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_User`) ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_User`) ON UPDATE CASCADE;

--
-- Constraints for table `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `repository_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id_User`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
