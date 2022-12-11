-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 23:03:48
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`, `activo`, `imagen`) VALUES
(1, '<br>\r\nOso crochet', '\r\n<p>Figura de estambre medida 8 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: blanco<br>\r\nTamano: 8cm <br>\r\nTipo de estambre: Cashmilon<br>\r\n\r\n\r\n', '85', 1, 1, 'img/tortuga.jpg'),
(2, '<br>\r\nBatman crochet', '<p>Figura de estambre medida 10 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: Gris/negro <br>\r\nTamano: 10cm <br>\r\nTipo de estambre: Cashmilon12<br>\r\n', '100', 1, 1, ''),
(3, '<br>\r\nCerdito crochet', '<p>Cerdito rosa 10 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: Rosa <br>\r\nTamano: 10cm <br>\r\nTipo de estambre: Nylon.<br>\r\n', '76', 1, 1, ''),
(4, '<br>\r\nAbeja crochet', '<p>Abeja convencional 10 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: Amarilla <br>\r\nTamano: 5cm <br>\r\nTipo de estambre: Nylon.<br>\r\n', '65', 1, 1, ''),
(5, 'Bulbasaur crochet', 'Bulbasaur de estambre de 15 cm \r\n\r\n<p>Figura de estambre medida 8 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: blanco<br>\r\nTamano: 8cm <br>\r\nTipo de estambre: Cashmilon<br>\r\n\r\n\r\n', '120', 1, 1, ''),
(6, 'Glaceon crochet ', 'Glaceon pokemon de estambre de 10 cm \r\n\r\n<p>Figura de estambre medida 8 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: blanco<br>\r\nTamano: 8cm <br>\r\nTipo de estambre: Cashmilon<br>\r\n\r\n\r\n', '129', 1, 1, ''),
(7, 'Conejo marron crochet', 'Conejo de estambre de 6 cm \r\n\r\n<p>Figura de estambre medida 8 cm de alto.</p> \r\n<br>\r\n<b>Caracteristicas:</b><br>\r\nEstambre: blanco<br>\r\nTamano: 8cm <br>\r\nTipo de estambre: Cashmilon<br>\r\n\r\n\r\n', '50', 1, 1, ''),
(8, 'Conejo alicia crochet', 'Conejo de Alicia en el país de las maravillas de estambre de 10 cm ', '70', 1, 1, ''),
(9, 'Elefante crochet', 'Elefante de estambre de 6cm ', '75', 1, 1, ''),
(10, 'Jake el Perro crochet', 'Jake el perro de estambre de 10 cm ', '99', 1, 1, ''),
(11, 'Marciano toy story crochet', 'Marciano de estambre de 10 cm', '65', 1, 1, ''),
(12, 'Koala crochet', 'Koala de estambre de 6 cm', '50', 1, 1, ''),
(13, 'Oso polar crochet', 'Oso polar de estambre de 6 cm', '50', 1, 1, ''),
(14, 'Alien crochet', 'Alien de estambre de 6 cm', '50', 1, 1, ''),
(15, 'Medusa', 'Medusa de estambre de 10 cm', '99', 1, 1, ''),
(16, 'Ang crochet', 'Ang de estambre de 5 cm', '65', 1, 1, ''),
(17, 'Pluto', 'Pluto de estambre de 10 cm', '120', 1, 1, ''),
(18, 'Raton cocinero crochet', 'Raton de estambre de 5 cm', '50', 1, 1, ''),
(19, 'Pinguino crochet', 'Pinguino de estambre de 5 cm', '50', 1, 1, ''),
(20, 'Stich crochet', 'Stich pequeno de estambre de 5 cm', '50', 1, 1, ''),
(21, 'Sullivan crochet', 'Sullivan de estambre de 10 cm', '120', 1, 1, ''),
(22, 'Vaquita crochet', 'Vaquita de estambre de 5 cm', '50', 1, 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
