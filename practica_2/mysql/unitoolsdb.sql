-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 03:56 PM
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
(3, 4, 'Holaaaaaaaaaa', 'Esto es un contenido to wapo nen', 0),
(5, 4, 'jeje', 'caca', 0),
(6, 5, 'cacaca', 'cacasds', 0),
(7, 8, 'VIVA EL BETIS', 'Aquí estamos todos pa cantarte tu canción\r\nestamos apiñados como balas de cañón\r\ny es que no hay quien pueda con esta afición\r\ny aunque último estuvieras siempre te ven campeón.\r\n\r\n\r\nBeeeeeetis, Beeeeeetis, Beeeeeetis.\r\nAhora Betis, ahora, no dejes de atacar\r\nahora Betis, ahora porque el gol ya va a llegar.\r\nBeeeeeetis, Beeeeeetis, Beeeeeetis\r\n\r\n\r\nHay una leyenda que recorre el mundo entero,\r\nverde y blanco sus colores,\r\nblanco y verde es el sendero,\r\nluz en la mañana y en la noche quejío y quiebro.\r\n\r\n\r\nBetis musho Betis, en el mundo lo que más quiero.\r\nLuz en la mañana y en la noche quejío y quiebro.\r\nBetis musho Betis, en este mundo lo que más quiero.\r\n\r\n\r\nBeeeeeetis, Beeeeeetis, Beeeeeetis\r\nAhora Betis, ahora, no dejes de atacar,\r\nahora Betis ahora porque el gol ya va a llegar.\r\nBeeeeeetis, Beeeeeetis, Beeeeeetis, Beeeeeetis, Beeeeeetis', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user` (`user`),
  ADD KEY `id_cat` (`id_cat`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_User`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
