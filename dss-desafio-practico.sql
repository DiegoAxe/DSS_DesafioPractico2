-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 00:11:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dss-desafio-practico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCategoria`, `Descripcion`) VALUES
(1, 'Camisa', 'Camisas elaboradas de diferentes materiales, desde algodón hasta poliestireno, en diferentes tallas, estilos y diseños.'),
(2, 'Pantalones', 'Pantalones elaborados en diferentes materiales, con variados diseños, colores, estilos y tallas variados'),
(3, 'Chaquetas', 'Chaquetas tanto para hombre como mujer, elaboradas de cuero o cuerina, de diferentes tallas y estilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` varchar(9) NOT NULL,
  `NombreProducto` varchar(100) NOT NULL,
  `DescProducto` text NOT NULL,
  `ImgProducto` varchar(50) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Precio` double(100,2) NOT NULL,
  `Existencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `NombreProducto`, `DescProducto`, `ImgProducto`, `IdCategoria`, `Precio`, `Existencias`) VALUES
('PROD00001', 'Camiseta de algodón cuello redondo', 'Camiseta Mod. 1, elaborada en algodón de 200 grs. cuello redondo decorado, manga corta, costuras en cierres laterales.', 'PROD00001.jpg', 1, 2.50, 350),
('PROD00002', 'Chaleco', 'Chaleco en resistente combinación de materiales algodón y poliéster de vivos colores. Cierre de zipper principal, multitud de bolsillos frontales y laterales de gran capacidad con cierre de velcro y anilla metálica en el pecho.', 'PROD00002.jpg', 3, 20.00, 12),
('PROD00004', 'aadadsa33', 'asdads33', 'PROD00004.png', 2, 33.00, 33),
('PROD00777', 'vegeta777', 'vegeta777', 'PROD00777.png', 1, 777.00, 77),
('PROD12346', 'adds330', 'adasdsa330', 'PROD12346.png', 3, 330.00, 330),
('PROD77777', 'aaa102', 'dfgdf788 a102', 'PROD77777.png', 2, 102.54, 102),
('PROD77877', 'sdg34', 'sdfsdef34', 'PROD77877.png', 2, 34.00, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Contrasena` varchar(500) NOT NULL,
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `TipoUsuario` varchar(100) NOT NULL DEFAULT 'Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `Correo`, `Contrasena`, `Habilitado`, `TipoUsuario`) VALUES
(1, 'Administrador', 'Admin_dss@gmail.com', '09aa5980041b496ddd3519a5dfa1c4a3d3af9a903c75cce175377e6ffe16810c92e6a0195e149ca0e6712c141e77ec621e0ed6be2266f9bb22a6e1a813d27b8d', 1, 'Administrador'),
(2, 'xXDestroyer200Xx', 'destroyer200@gmail.com', '1E0FE6E208B6BE55E3ABCBEB137BB4024FF0F0409BEAAEDA926AEED7340A7FB997ED506114EE8529E1215B7BE621368F10720FBE5AC4F1B8822A9B2EDB3C4E80', 0, 'Cliente'),
(3, 'Yagami_2004', 'yagamy_2004@gmail.com', '50F85A2051C767477C2133D65070D42A3D0EBC6EB2B1181F39D9E207E4B0E68FC9B4D0F1B7588B24C098BDA3B5F00ADB96A5BAE8140F4103CDDC6875453B89A4', 1, 'Cliente'),
(4, 'Jose Rodriguez3', 'empleado3_rodriguez@gmail.com', 'c06b90f53875295737a57a81a2fe988db041b831c0cca45013d7c8be1dd98d5990af82ae21f2d347a44c1c4d31b58cde7ac5efdab75a8023f6e59091ec21726f', 1, 'Empleado'),
(5, 'Rigoberto Torres', 'empleado_torres@gmail.com', 'CB6C8DF24072E2D7890E996F2980A9EE1273FF72B297ADD99C266620CD9DEF973455C5D8636F8DF89851AE269AC743284A6DE4B6DB52163F45BABE43A81D75F5', 1, 'Empleado'),
(9, 'Yagami_2005', 'yagamy_2005@gmail.com', '24dbe144d49e0f95d42e57ad1f1747e498dfea0443e47366e4aea53da7ec2ea196fd4b865c34ba09b8143542913bb2d7140f8fe3b59e496649e07eb9e96fea8f', 1, 'Cliente'),
(12, 'asdads', 'asdadas@asda.com', '3ff0824e2408854e730948e960a10b3e1ba961821880ea91191410a1cf730f17abab90082b3bb8bc82486376ba296287ea9ad8d9648532fde600f6a4968e2157', 1, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaVenta` datetime NOT NULL DEFAULT current_timestamp(),
  `IdProducto` varchar(9) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `Cantidad`, `FechaVenta`, `IdProducto`, `IdUsuario`) VALUES
(1, 50, '2023-05-03 05:48:12', 'PROD00001', 5),
(2, 700, '2023-05-03 08:32:28', 'PROD00777', 5),
(4, 33, '2023-05-03 00:36:59', 'PROD12346', 5),
(5, 3, '2023-05-03 00:38:02', 'PROD00002', 5),
(6, 100, '2023-05-03 00:40:06', 'PROD00001', 5),
(7, 23, '2023-05-03 00:46:18', 'PROD77877', 5),
(8, 50, '2023-05-03 16:09:25', 'PROD00001', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `Ventas-Usuarios` (`IdUsuario`),
  ADD KEY `Ventas-Productos` (`IdProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `Productos-Categorias` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `Ventas-Productos` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`),
  ADD CONSTRAINT `Ventas-Usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
