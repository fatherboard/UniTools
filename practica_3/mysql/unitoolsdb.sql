-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2020 a las 18:34:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unitoolsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `user`, `title`, `content`, `id_cat`) VALUES
(18, 23, 'Bienvenidos al foro', 'Os doy la bienvenida al foro de unitools!', 0),
(19, 25, 'Duda sobre css', 'Como puedo organizar de forma correcta el css para que la pagina quede ordenada?', 0),
(20, 27, 'Como hacer una memoria en condiciones', 'Usa LaTeX', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `candado` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `lenguaje` varchar(50) NOT NULL,
  `contenido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `titulo`, `candado`, `userId`, `estrellas`, `privado`, `lenguaje`, `contenido`) VALUES
(13, 'Hola mundo', 0, 25, 3, 0, 'c', 'El hola mundo mas raro que has visto en tu vida'),
(14, 'calculadora en c++', 0, 23, 3, 0, 'c++', 'es una calculadora para la asignatura de fp'),
(15, 'Programmer simulator', 0, 24, 3, 0, 'java', 'simulador de ser un programador ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repository`
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
-- Estructura de tabla para la tabla `respuesta`
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
-- Volcado de datos para la tabla `respuesta`
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
-- Estructura de tabla para la tabla `user`
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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `username`, `premium`, `admin`, `name`, `aboutMe`) VALUES
(23, 'bruno@gmail.com', '$2y$10$oL8bmRuRwk2q5NJ2dx67tetNvbGO1Bs1jSSyjmlJ4xP3Y1Ys/WyK2', 'bruno', 0, 0, 'Bruno Mayo', 'Soy un niño grande'),
(24, 'hugo@hugo.hugo', '$2y$10$7JebyLIHjunBiI5o51ZB9O3cNRYfDEhBEq1NMEFAEk.0Z4BgcC6iu', 'hugo', 0, 0, 'Hugo Ribeiro', 'Albahaca fan nº1'),
(25, 'fer@fer.fer', '$2y$10$mD.jpKGUWz6TpqmDVRaN5eDZtnz47bBZ1F4S7ELyUDdQ2K.CPazti', 'fer', 0, 0, 'Fernando Ruiz', 'Me encanta apple'),
(26, 'luis@luis.com', '$2y$10$e8v8INqnukWLmF73pOH.eOmjFs53.dcKKQr9YMTW2YjL/MlTASse.', 'luis', 0, 0, 'Luis Cepeda', 'No hay nada mejor que windows XP'),
(27, 'carlos@carlos.com', '$2y$10$MnzNA8PqcmPNXzK13qrZ8Oytc1.aLCcQZbLwBSnDs4DobqAQ4HTWS', 'carlos', 0, 0, 'Carlos Bilbao', 'Aunque lo parezca no soy de bilbao'),
(28, 'dani@dani.dani', '$2y$10$SYkoa.N2ibyeKv/l9Jxaz.PTTyn0gpDly6ucfC43LSTKQuOXygSf2', 'cansek', 0, 0, 'Daniel Canseco', 'Me gustan los trenes'),
(29, 'carlosCervigon@ucm.es', '$2y$10$dxjd1HQUvpWuBGtlXnhmoO8vRrqI0nfVpW8VUtwvfjDI/9/4kgL.q', 'Profesor', 0, 0, 'Carlos Cervigon', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user` (`user`),
  ADD KEY `category` (`id_cat`) USING BTREE;

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indices de la tabla `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id_rep`),
  ADD KEY `creator` (`creator`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `user` (`user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `repository`
--
ALTER TABLE `repository`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `posts` (`id_cat`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
