-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 24, 2019 at 07:31 PM
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
  `ciudad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `notas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`id`, `id_usuario`, `nombre`, `apellido`, `correo`, `calle`, `colonia`, `zip`, `estado`, `ciudad`, `notas`) VALUES
(1, 32, 'Ismael', 'Villegas', 'jesismaelv@gmail.com', 'Hello', 'Coloniaa', 12345, 'Baja California', 'Hello x3', 'Notasas'),
(4, 19, 'Ismael', 'Villegas', 'jesismaelv@gmail.com', 'Hello', '', 12345, 'Baja California', 'Hello x3', 'Muchas NOTAS!'),
(6, 19, 'Ismael', 'Villegas', 'hola@entraencatarsis.com', 'asdf', '', 12378, 'Baja California', 'adsf', 'A'),
(7, 19, 'Ismael', 'Villegas', 'hola@entraencatarsis.com', 'asdf', '', 12378, 'Ciudad de MÃ©xico', 'adsf', ''),
(8, 19, 'Dummy', 'Dummy', 'Dummy@Dummy.com', 'Dummy', '', 21060, 'Alabama', 'Dummy', '');

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
(5, 'Otra novedad editada otra vez a berda', 'HOLA? ayayayay', 'uyuyiy editado', 'img/novedades/5/principal.png');

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `detalles` json DEFAULT NULL,
  `total` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `direccion` json DEFAULT NULL,
  `pago` json DEFAULT NULL,
  `estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`id`, `id_usuario`, `detalles`, `total`, `direccion`, `pago`, `estado`, `fecha`) VALUES
(1, 19, '[]', '0', '{\"id\": \"4\", \"zip\": \"12345\", \"calle\": \"Hello\", \"notas\": \"Muchas NOTAS!\", \"ciudad\": \"Hello x3\", \"correo\": \"jesismaelv@gmail.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', NULL, '2019-03-24 19:23:49'),
(2, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"4\", \"zip\": \"12345\", \"calle\": \"Hello\", \"notas\": \"Muchas NOTAS!\", \"ciudad\": \"Hello x3\", \"correo\": \"jesismaelv@gmail.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', NULL, '2019-03-24 19:23:49'),
(3, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"4\", \"zip\": \"12345\", \"calle\": \"Hello\", \"notas\": \"Muchas NOTAS!\", \"ciudad\": \"Hello x3\", \"correo\": \"jesismaelv@gmail.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', NULL, '2019-03-24 19:23:49'),
(4, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"7\", \"zip\": \"12378\", \"calle\": \"asdf\", \"notas\": \"\", \"ciudad\": \"adsf\", \"correo\": \"hola@entraencatarsis.com\", \"estado\": \"Ciudad de Mu00e9xico\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', NULL, '2019-03-24 19:23:49'),
(5, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"8\", \"zip\": \"21060\", \"calle\": \"Dummy\", \"notas\": \"\", \"ciudad\": \"Dummy\", \"correo\": \"Dummy@Dummy.com\", \"estado\": \"Alabama\", \"nombre\": \"Dummy\", \"colonia\": \"\", \"apellido\": \"Dummy\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Visa\", \"vence\": null, \"nombre\": null, \"numero\": null}', NULL, '2019-03-24 19:23:49'),
(6, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 4, \"subtotal\": 600, \"descripcion\": \"ahora con descripcion\"}}', '600', '{\"id\": \"8\", \"zip\": \"21060\", \"calle\": \"Dummy\", \"notas\": \"\", \"ciudad\": \"Dummy\", \"correo\": \"Dummy@Dummy.com\", \"estado\": \"Alabama\", \"nombre\": \"Dummy\", \"colonia\": \"\", \"apellido\": \"Dummy\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'pendiente', '2019-03-24 19:23:49');

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
(31, 'img/producto/31/principal.png', 'Un buen meme', 'ahora con descripcion', 150, 'memistico', '38', '2019-03-23 02:35:25', '[\"img/producto/31/galeria0.png\", \"img/producto/31/galeria1.png\"]'),
(36, 'img/producto/36/principal.png', 'Prueba', '', 123, 'img', '64', '2019-03-24 00:21:05', '[\"img/producto/36/galeria0.png\", \"img/producto/36/galeria1.png\", \"img/producto/36/galeria2.png\"]');

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
('img/slides_inicio/8/principal.png', 'Bienvenidos al sitio! editado', 'Que bonitos se ven hoy editoad', '###', 8),
(NULL, 'El oscar es buen compa', 'holi', '#35', 9);

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
(19, 'Ismael', 'Villegas', 'jesismaelv@gmail.com', 'fotos/ismael.jpg', '56437ee14d804bfa14762e0b1782827e', 'admin', '[]'),
(22, 'Ismael', 'Villegas', 'ismael@entraencatarsis.com', 'img/usuarios/22/perfil.jpg', '56437ee14d804bfa14762e0b1782827e', 'admin', NULL),
(30, 'elena', 'Dummy', 'elena@dummy.com', 'img/usuarios/30/perfil.png', 'fadf17141f3f9c3389d10d09db99f757', 'cliente', NULL),
(32, 'admin editado', 'hola editado', 'admin', 'img/usuarios/32/perfil.png', '21232f297a57a5a743894a0e4a801fc3', 'cliente', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `slides_inicio`
--
ALTER TABLE `slides_inicio`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
