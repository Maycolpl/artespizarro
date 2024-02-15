-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-12-2023 a las 22:05:52
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artespizarro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `categoryID` int NOT NULL,
  `categoryProducts` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`categoryID`, `categoryProducts`) VALUES
(1, 'Comercial'),
(2, 'Souvenirs'),
(3, 'Esculturas'),
(4, 'Tallados'),
(5, 'Madera'),
(9, 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `productID` int NOT NULL,
  `keyWords` varchar(255) DEFAULT NULL,
  `titleHTML` varchar(100) DEFAULT NULL,
  `titleMeta` varchar(100) DEFAULT NULL,
  `descriptionMeta` varchar(255) DEFAULT NULL,
  `imageMeta` varchar(50) DEFAULT NULL,
  `nameFolder` varchar(50) DEFAULT NULL,
  `imageItem` varchar(50) DEFAULT NULL,
  `imagesProduct` varchar(255) DEFAULT NULL,
  `nameProduct` varchar(100) DEFAULT NULL,
  `descriptionItem` varchar(100) DEFAULT NULL,
  `descriptionProduct` varchar(5000) DEFAULT NULL,
  `outstand` tinyint(1) NOT NULL,
  `category` char(255) DEFAULT NULL,
  `workshop` varchar(50) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `dimensions` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`productID`, `keyWords`, `titleHTML`, `titleMeta`, `descriptionMeta`, `imageMeta`, `nameFolder`, `imageItem`, `imagesProduct`, `nameProduct`, `descriptionItem`, `descriptionProduct`, `outstand`, `category`, `workshop`, `material`, `dimensions`) VALUES
(13, 'Pesebre con Nacimiento ', 'Pesebre con Nacimiento ', 'Pesebre con Nacimiento ', 'Pesebre con Nacimiento ', 'img-meta.png', 'PesebreconNacimiento123', 'img-item.png', 'img-product-0.png,img-product-1.png', 'Pesebre con Nacimiento ', 'Pesebre con Nacimiento ', 'Pesebre con Nacimiento  del 25 de diciembre 2023', 0, 'Esculturas', 'artes pizarro', 'Piedra de Huamanga', '24mm X 24mm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `projectID` int NOT NULL,
  `keyWords` varchar(255) DEFAULT NULL,
  `titleHTML` varchar(100) DEFAULT NULL,
  `titleMeta` varchar(100) DEFAULT NULL,
  `descriptionMeta` varchar(255) DEFAULT NULL,
  `imageMeta` varchar(50) DEFAULT NULL,
  `nameFolder` varchar(50) DEFAULT NULL,
  `imageItem` varchar(50) DEFAULT NULL,
  `imagesProject` varchar(255) DEFAULT NULL,
  `nameProject` varchar(100) DEFAULT NULL,
  `descriptionItem` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descriptionProject` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`projectID`, `keyWords`, `titleHTML`, `titleMeta`, `descriptionMeta`, `imageMeta`, `nameFolder`, `imageItem`, `imagesProject`, `nameProject`, `descriptionItem`, `descriptionProject`) VALUES
(6, 'Tallado y Pintado del escudo de la PNP', 'Tallado y Pintado del escudo de la PNP', 'Tallado y Pintado del escudo de la PNP', 'Tallado y Pintado del escudo de la PNP', 'img-meta.png', 'TalladoyPintadodelescudodelaPNP', 'img-item.png', 'img-project-0.png,img-project-1.png,img-project-2.png,img-project-3.png', 'Tallado y Pintado del escudo de la PNP', 'Tallado y Pintado del escudo de la PNP', 'Tallado y Pintado del escudo de la PNP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `nameUser` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userID`, `nameUser`, `userPassword`) VALUES
(1, 'artespizarro@wecoud-app.com', '#AC/t0wvSh'),
(2, 'maycol@wecoud-app.com', 'maycol123'),
(3, 'ramos', 'ramos123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
