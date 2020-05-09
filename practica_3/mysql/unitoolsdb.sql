-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 09:03 PM
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
(12, 16, 'Duda, cómo puedo instalar xampp?', 'Ayer me descargué el programa pero no tengo ni idea de como instalarlo. Alguién me puede ayudar?', 0),
(13, 16, 'Prueba', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `candado` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `lenguaje` varchar(50) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `file` varbinary(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `titulo`, `candado`, `userId`, `estrellas`, `privado`, `lenguaje`, `contenido`, `file`) VALUES
(6, 'Hola Mundo', 0, 13, 3, 1, 'Java', 'system', ''),
(9, 'HELLO WORLD ', 0, 13, 3, 1, 'C', 'ESTO Y LO OTRP', 0x4552524f52);

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
  `id_post` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `answer_to` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_post`, `user`, `date`, `content`, `answer_to`) VALUES
(2, 12, 16, '2020-05-09', 'no', -1),
(3, 12, 16, '2020-05-09', 'no lo entiendo men', 2),
(4, 12, 16, '2020-05-09', 'hola', -1),
(5, 12, 16, '2020-05-09', 'dasdsaddsd', -1),
(6, 12, 16, '2020-05-09', 'sddddds', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `username`, `premium`, `admin`) VALUES
(15, 'bruno@bruno.bruno.org', '$2y$10$5A/Hhv2t4AMnTiPWPq3h9eEjhnu37eikqG21mS9IkPIpMNm3/OdCy', 'bruno', 0, 1),
(16, 'hugo@hugo.hugo', '$2y$10$5v9Vz/b6SBQIZXCTXCoVr.Co0U1X8/hLsDY112OkBBPtRr8OIQM06', 'hugo', 0, 0),
(17, 'paco@paco.paco', '$2y$10$W/YGZneL8V7SWLerP9r5HO6utcCJ.SUZDskRuDYau7QYUl7OVqUXK', 'Paco', 0, 0);

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
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

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
  ADD KEY `user` (`user`),
  ADD KEY `id_post` (`id_post`);

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
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `repository_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
