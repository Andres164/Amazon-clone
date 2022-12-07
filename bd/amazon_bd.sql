-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 11:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazon_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `nombre_articulo` varchar(70) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `tiempo_envio` time NOT NULL,
  `proveeodr_id` int(11) DEFAULT NULL,
  `ASIN` char(12) NOT NULL,
  `precio_envio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`nombre_articulo`, `precio`, `stock`, `tiempo_envio`, `proveeodr_id`, `ASIN`, `precio_envio`) VALUES
('Figura Goku ssj3', 620, 8, '48:00:00', NULL, 'amazongokuss', 0),
('Nintendo Switch', 2000, 5, '24:00:00', NULL, 'amazonnintsw', 130),
('Tarjeta Grafica 2080', 6317, 10, '24:00:00', NULL, 'amazonnv2080', 0),
('Playera Color Gris', 230, 10, '48:00:00', NULL, 'amazonplcogr', 115);

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `nombre_usuario` varchar(50) NOT NULL,
  `carrito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`nombre_usuario`, `carrito_id`) VALUES
('abel', 11),
('Abel2', 12);

-- --------------------------------------------------------

--
-- Table structure for table `detalles_carrito`
--

CREATE TABLE `detalles_carrito` (
  `carrito_id` int(11) NOT NULL,
  `articulo_ASIN` char(12) NOT NULL,
  `detalles_carrito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `articulo_ASIN` char(12) NOT NULL,
  `fecha_compra` datetime NOT NULL DEFAULT current_timestamp(),
  `entregado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_entrega` datetime NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `articulo_ASIN`, `fecha_compra`, `entregado`, `fecha_entrega`, `nombre_usuario`) VALUES
(3, 'amazongokuss', '2022-12-04 13:20:16', 1, '2022-12-06 09:20:16', 'Abel2'),
(4, 'amazonnintsw', '2022-12-04 13:20:16', 1, '2022-12-05 09:20:16', 'Abel2'),
(5, 'amazonnv2080', '2022-12-07 11:28:01', 0, '2022-12-08 07:28:01', 'abel'),
(6, 'amazonplcogr', '2022-12-07 11:28:01', 0, '2022-12-09 07:28:01', 'abel'),
(7, 'amazonplcogr', '2022-12-07 12:02:27', 0, '2022-12-09 08:02:27', 'Abel2');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `nombre` varchar(70) NOT NULL,
  `proveedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `carrito_id` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_electonico` varchar(100) NOT NULL,
  `contra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`carrito_id`, `nombre_usuario`, `correo_electonico`, `contra`) VALUES
(11, 'abel', 'abel@gmail.com', 'Abel12'),
(12, 'Abel2', 'abel2@gmail.com', 'Abel2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ASIN`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indexes for table `detalles_carrito`
--
ALTER TABLE `detalles_carrito`
  ADD PRIMARY KEY (`detalles_carrito_id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detalles_carrito`
--
ALTER TABLE `detalles_carrito`
  MODIFY `detalles_carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
