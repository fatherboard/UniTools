-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 06:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
  `cat_name` varchar(25) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_name`, `desc`) VALUES
('Apuntes', 'Para recibir apuntes si has faltado a clase'),
('Estudio', 'Preguntas y consejo sobre técnicas de estudio'),
('General', 'Categoría comodín para cuando no sabes que poner'),
('Programación', 'Dudas o explicaciones sobre programación independientemente del lenguaje');

-- --------------------------------------------------------

--
-- Table structure for table `estrellas`
--

CREATE TABLE `estrellas` (
  `id` int(255) NOT NULL,
  `project` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estrellas`
--

INSERT INTO `estrellas` (`id`, `project`, `user`, `rating`) VALUES
(6, 42, 24, 4),
(7, 43, 24, 5),
(8, 45, 26, 4),
(9, 44, 23, 4),
(10, 43, 24, 4),
(11, 43, 24, 4),
(12, 43, 26, 4),
(13, 42, 26, 2),
(14, 45, 25, 5),
(15, 42, 25, 1),
(16, 46, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(255) NOT NULL,
  `project` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `project`, `user`, `type`) VALUES
(17, 42, 24, 0),
(18, 42, 23, 2),
(19, 42, 26, 1),
(20, 42, 27, 1),
(21, 43, 24, 0),
(22, 44, 23, 0),
(23, 44, 26, 2),
(24, 44, 24, 1),
(25, 44, 25, 2),
(26, 44, 27, 2),
(27, 43, 26, 1),
(28, 45, 26, 0),
(29, 45, 27, 2),
(30, 45, 25, 2),
(31, 46, 25, 0),
(32, 46, 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_cat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `user`, `title`, `content`, `id_cat`) VALUES
(18, 23, 'Bienvenidos al foro', 'Os doy la bienvenida al foro de unitools!', '0'),
(19, 25, 'Duda sobre css', 'Como puedo organizar de forma correcta el css para que la pagina quede ordenada?', '0'),
(20, 27, 'Como hacer una memoria en condiciones', 'Usa LaTeX', '0');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `candado` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `lenguaje` varchar(50) NOT NULL,
  `contenido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `titulo`, `candado`, `userId`, `privado`, `lenguaje`, `contenido`) VALUES
(42, 'Calculadora ', 0, 24, 0, 'C++', 'Una calculadora que he hecho en c++, espero que os guste!'),
(43, 'Un hola mundo muy peculiar.', 0, 24, 1, 'C', 'Me he encontrado con este hola mundo muy peculiar, a ver qué os parece.'),
(44, 'Un css para vuestra página.', 0, 23, 0, 'css', 'Elaboré esta lista muy chula de tags ya hechos en css.'),
(45, 'aaa', 1, 26, 0, 'c', 'aaaa'),
(46, 'Top contraseñas más usadas.', 0, 25, 0, 'txt', 'He encontrado este top contraseñas más usadas. Mirad a ver si la vuestra está ahí :P');

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
(17, 18, 24, '2020-05-11', 'Hola!!', -1),
(18, 19, 26, '2020-05-11', 'Como experto en css recomiendo que lo dividas por id y que tengas una hoja para los css generales y varias para las vistas que quieras que sean diferentes', -1),
(19, 20, 28, '2020-05-11', 'Ok boomer', -1),
(20, 20, 24, '2020-05-11', 'khé LoKo', 19),
(21, 20, 23, '2020-05-11', 'Thnx m8', -1),
(22, 20, 29, '2020-05-11', 'EsTo No Es FoRoCoChEs??', -1),
(23, 19, 29, '2020-05-11', 'Ni yo lo podria haber respondido mejor!', 18),
(24, 18, 29, '2020-05-11', 'Hola! parece que esta de 10', -1);

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
  `admin` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `aboutMe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `username`, `premium`, `admin`, `name`, `aboutMe`) VALUES
(23, 'bruno@gmail.com', '$2y$10$oL8bmRuRwk2q5NJ2dx67tetNvbGO1Bs1jSSyjmlJ4xP3Y1Ys/WyK2', 'bruno', 0, 0, 'Bruno Mayo', 'Soy un niño grande'),
(24, 'hugo@hugo.com', '$2y$10$7JebyLIHjunBiI5o51ZB9O3cNRYfDEhBEq1NMEFAEk.0Z4BgcC6iu', 'hugo', 1, 1, 'Hugo Ribeiro', 'Soy el mayor fan de la albahaca'),
(25, 'fer@fer.fer', '$2y$10$mD.jpKGUWz6TpqmDVRaN5eDZtnz47bBZ1F4S7ELyUDdQ2K.CPazti', 'fer', 0, 0, 'Fernando Ruiz', 'Me encanta apple'),
(26, 'luis@luis.com', '$2y$10$e8v8INqnukWLmF73pOH.eOmjFs53.dcKKQr9YMTW2YjL/MlTASse.', 'luis', 0, 0, 'Luis Cepeda', 'No hay nada mejor que windows XP'),
(27, 'carlos@carlos.com', '$2y$10$MnzNA8PqcmPNXzK13qrZ8Oytc1.aLCcQZbLwBSnDs4DobqAQ4HTWS', 'carlos', 0, 0, 'Carlos Bilbao', 'Aunque lo parezca no soy de bilbao'),
(28, 'dani@dani.dani', '$2y$10$SYkoa.N2ibyeKv/l9Jxaz.PTTyn0gpDly6ucfC43LSTKQuOXygSf2', 'cansek', 0, 0, 'Daniel Canseco', 'Me gustan los trenes'),
(29, 'carlosCervigon@ucm.es', '$2y$10$dxjd1HQUvpWuBGtlXnhmoO8vRrqI0nfVpW8VUtwvfjDI/9/4kgL.q', 'Profesor', 0, 0, 'Carlos Cervigon', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_name`);

--
-- Indexes for table `estrellas`
--
ALTER TABLE `estrellas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `estrellas`
--
ALTER TABLE `estrellas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
