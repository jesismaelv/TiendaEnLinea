-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 23, 2019 at 06:26 PM
-- Server version: 5.7.11
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `apellido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `correo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `calle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `colonia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `zip` int(11) DEFAULT NULL,
  `estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `pais` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `notas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `novedades`
--

CREATE TABLE `novedades` (
  `id` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `subtitulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novedades`
--

INSERT INTO `novedades` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(4, 'Novedaza', 'Con subtitlo!', 'Y DescripciÃ³n :0 ', 'img/novedades/4/principal.jpg'),
(5, 'Otra novedad', 'uy', 'uyuyiy', 'img/novedades/5/principal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `detalles` json DEFAULT NULL,
  `total` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `precio` int(11) DEFAULT NULL,
  `unidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `existencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagenes` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `imagen`, `nombre`, `descripcion`, `precio`, `unidad`, `existencia`, `fecha_creacion`, `imagenes`) VALUES
(31, 'img/producto/31/principal.jpg', 'Un buen meme', '', 123, 'memistico', '89', '2019-03-23 02:35:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides_inicio`
--

CREATE TABLE `slides_inicio` (
  `imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `frase` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `subtitulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `boton` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides_inicio`
--

INSERT INTO `slides_inicio` (`imagen`, `frase`, `subtitulo`, `boton`, `id`) VALUES
('img/slides_inicio/1/principal.png', 'Titulo de galerÃ­a', '', '', 1),
('img/slides_inicio/3/principal.png', '', '', '', 3),
('img/slides_inicio/5/principal.png', 'Titulo de galerÃ­a', 'Con subtitlo!', '', 5),
(NULL, 'Bienvenidos al sitio!', 'Que bonitos se ven hoy', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text,
  `apellido` text,
  `correo` text,
  `foto` text,
  `contrasena` text,
  `tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `carrito` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `foto`, `contrasena`, `tipo`, `carrito`) VALUES
(19, 'Ismael', 'Villegas', 'jesismaelv@gmail.com', 'fotos/ismael.jpg', '56437ee14d804bfa14762e0b1782827e', 'cliente', NULL),
(22, 'Ismael', 'Villegas', 'ismael@entraencatarsis.com', 'img/usuarios/22/perfil.jpg', '56437ee14d804bfa14762e0b1782827e', 'admin', NULL),
(30, 'elena', 'Dummy', 'elena@dummy.com', 'img/usuarios/30/perfil.png', 'fadf17141f3f9c3389d10d09db99f757', 'cliente', NULL),
(32, 'admin', '', 'admin', 'img/usuarios/32/perfil.png', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides_inicio`
--
ALTER TABLE `slides_inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `slides_inicio`
--
ALTER TABLE `slides_inicio`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
