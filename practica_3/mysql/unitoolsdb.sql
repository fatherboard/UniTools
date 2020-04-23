-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 07:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `user`, `title`, `content`, `id_cat`) VALUES
(2, 4, 'No sé hacer esto, ayuda', 'toi to perdio chavales, no sé sumar 1 a una variable xd', 0),
(3, 5, 'Holaaaaaaaaaa', 'Esto es un contenido to wapo nen', 0),
(5, 6, 'prueba asssssa', '3', 0),
(6, 6, 'prueba asssssa', '3', 0),
(7, 6, '[TEMA SERIO] Mi nobia ma dejao', 'soy programador de fp', 0),
(8, 8, 'sssssss', '123', 0),
(9, 9, 'xdeeee', 'xd', 0);

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
-- Table structure for table `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `username`, `premium`) VALUES
(4, 'caca@caca.com', '1', 'hugo', 1),
(5, 'l@l.l', '1', 'l', 1),
(6, '1@hola.com', '$2y$10$7gUTaS4clDnZgsUv2RuLeeei7/qFHFB9UBjYtvfQOcCnHV4MNJSPG', 'man', 0),
(8, '1@hola.com', '$2y$10$qaUhcW0ficbue3HzsihzfOHqKw1/aMCJhwcLNobu/GvCCRjak7eea', 'pt_esp', 0),
(9, '1@hola.com', '$2y$10$1/Zm3fnVyIh7jeBFBsN48uUXuMKptC3zT6pKlT.xg0vzzW98LKF7q', 'rapiteu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user` (`user`),
  ADD KEY `category` (`id_cat`) USING BTREE;

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `posts` (`id_cat`) ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `repository_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
