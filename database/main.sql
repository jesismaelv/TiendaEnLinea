-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 25, 2019 at 08:05 PM
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
(8, 'Â¡Aviso importante! Riesgo de salud con manzana auto-cortada', 'Espero hayas leÃ­do los <a class=link href=terminos.php> Terminos </a>', 'Si haz comprado nuestra manzana auto-cortada no la consumas. Se han reportado varios casos en el que ha provocado el auto-despedazamiento de quien la consume. ', 'img/novedades/8/principal.jpg');

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
(2, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"4\", \"zip\": \"12345\", \"calle\": \"Hello\", \"notas\": \"Muchas NOTAS!\", \"ciudad\": \"Hello x3\", \"correo\": \"jesismaelv@gmail.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'Pendiente', '2019-03-24 19:23:49'),
(3, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"4\", \"zip\": \"12345\", \"calle\": \"Hello\", \"notas\": \"Muchas NOTAS!\", \"ciudad\": \"Hello x3\", \"correo\": \"jesismaelv@gmail.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'Entregado', '2019-03-24 19:23:49'),
(4, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"7\", \"zip\": \"12378\", \"calle\": \"asdf\", \"notas\": \"\", \"ciudad\": \"adsf\", \"correo\": \"hola@entraencatarsis.com\", \"estado\": \"Ciudad de Mu00e9xico\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'Pendiente', '2019-03-24 19:23:49'),
(5, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 16, \"subtotal\": 2400, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '2523', '{\"id\": \"8\", \"zip\": \"21060\", \"calle\": \"Dummy\", \"notas\": \"\", \"ciudad\": \"Dummy\", \"correo\": \"Dummy@Dummy.com\", \"estado\": \"Alabama\", \"nombre\": \"Dummy\", \"colonia\": \"\", \"apellido\": \"Dummy\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Visa\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'Cancelado', '2019-03-24 19:23:49'),
(6, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": 4, \"subtotal\": 600, \"descripcion\": \"ahora con descripcion\"}}', '600', '{\"id\": \"8\", \"zip\": \"21060\", \"calle\": \"Dummy\", \"notas\": \"\", \"ciudad\": \"Dummy\", \"correo\": \"Dummy@Dummy.com\", \"estado\": \"Alabama\", \"nombre\": \"Dummy\", \"colonia\": \"\", \"apellido\": \"Dummy\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'Entregado', '2019-03-24 19:23:49'),
(7, 19, '{\"31\": {\"nombre\": \"Un buen meme\", \"precio\": \"150\", \"unidad\": \"memistico\", \"cantidad\": \"9\", \"subtotal\": 1350, \"descripcion\": \"ahora con descripcion\"}, \"36\": {\"nombre\": \"Prueba\", \"precio\": \"123\", \"unidad\": \"img\", \"cantidad\": \"1\", \"subtotal\": 123, \"descripcion\": \"\"}}', '1473', '{\"id\": \"6\", \"zip\": \"12378\", \"calle\": \"asdf\", \"notas\": \"A\", \"ciudad\": \"adsf\", \"correo\": \"hola@entraencatarsis.com\", \"estado\": \"Baja California\", \"nombre\": \"Ismael\", \"colonia\": \"\", \"apellido\": \"Villegas\", \"id_usuario\": \"19\"}', '{\"ccv\": null, \"tipo\": \"Mastercard\", \"vence\": null, \"nombre\": null, \"numero\": null}', 'pendiente', '2019-03-25 19:01:54');

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
(31, 'img/producto/31/principal.png', 'Un buen meme', 'ahora con descripcion', 150, 'memistico', '29', '2019-03-23 02:35:25', '[\"img/producto/31/galeria0.png\", \"img/producto/31/galeria1.png\"]'),
(36, 'img/producto/36/principal.png', 'Prueba', '', 123, 'img', '63', '2019-03-24 00:21:05', '[\"img/producto/36/galeria0.png\", \"img/producto/36/galeria1.png\", \"img/producto/36/galeria2.png\"]');

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
('img/slides_inicio/10/principal.jpg', 'Descubre el sabor del transgÃ©nico', 'No volverÃ¡s a querer una fruta de verdad otra vez.', '/tienda.php', 10),
('img/slides_inicio/11/principal.jpg', 'Â¡Nuevo! CÃ­tricos que saben a berries', 'Â¡Crecen hasta 4 metros!', '', 11);

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
(19, 'Ismael', 'Villegas', 'jesismaelv@gmail.com', 'img/usuarios/19/perfil.jpg', '56437ee14d804bfa14762e0b1782827e', 'admin', '{\"36\": \"1\"}'),
(22, 'Ismael', 'Villegas', 'ismael@entraencatarsis.com', 'img/usuarios/22/perfil.jpg', '56437ee14d804bfa14762e0b1782827e', 'admin', NULL),
(30, 'elena', 'Dummy', 'elena@dummy.com', 'img/usuarios/30/perfil.png', 'fadf17141f3f9c3389d10d09db99f757', 'cliente', NULL),
(32, 'admin editado', 'hola editado', 'admin', 'img/usuarios/32/perfil.png', '21232f297a57a5a743894a0e4a801fc3', 'cliente', NULL),
(33, 'Quiero ', 'mi carrito', 'quiero@micarrito.com', 'img/usuarios/33/perfil.png', '56437ee14d804bfa14762e0b1782827e', 'cliente', '{\"31\": \"1\", \"36\": \"1\"}');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `slides_inicio`
--
ALTER TABLE `slides_inicio`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
