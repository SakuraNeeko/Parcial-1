-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2024 a las 05:25:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `ID_pedido` int(11) DEFAULT NULL,
  `ID_producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`ID_pedido`, `ID_producto`, `Cantidad`) VALUES
(2, 1, 12),
(2, 2, 10),
(2, 3, 10),
(2, 4, 5),
(2, 5, 10),
(2, 6, 10),
(2, 7, 10),
(2, 8, 10),
(2, 9, 50),
(2, 10, 10),
(2, 11, 50),
(2, 12, 10),
(2, 13, 10),
(2, 14, 10),
(2, 15, 5),
(2, 16, 100),
(2, 17, 4),
(2, 18, 10),
(2, 19, 50),
(2, 20, 1),
(3, 1, 10),
(3, 2, 10),
(3, 3, 10),
(3, 4, 10),
(3, 5, 10),
(3, 6, 10),
(3, 7, 10),
(3, 8, 10),
(3, 9, 10),
(3, 10, 10),
(3, 11, 10),
(3, 12, 10),
(3, 13, 10),
(3, 14, 10),
(3, 15, 10),
(3, 16, 10),
(3, 17, 10),
(3, 18, 10),
(3, 19, 10),
(3, 20, 10),
(4, 1, 10),
(4, 2, 10),
(4, 3, 10),
(4, 4, 10),
(4, 5, 10),
(4, 6, 10),
(4, 7, 10),
(4, 8, 10),
(4, 9, 10),
(4, 10, 10),
(4, 11, 10),
(4, 12, 10),
(4, 13, 10),
(4, 14, 10),
(4, 15, 10),
(4, 16, 10),
(4, 17, 10),
(4, 18, 10),
(4, 19, 10),
(4, 20, 10),
(5, 1, 50),
(5, 2, 50),
(5, 3, 20),
(5, 4, 30),
(5, 5, 10),
(5, 6, 15),
(5, 7, 45),
(5, 8, 20),
(5, 9, 35),
(5, 10, 10),
(5, 11, 40),
(5, 12, 10),
(5, 13, 5),
(5, 14, 5),
(5, 15, 10),
(5, 16, 10),
(5, 17, 50),
(5, 18, 10),
(5, 19, 25),
(5, 20, 30),
(5, 22, 15),
(5, 23, 10),
(6, 1, 5),
(6, 2, 5),
(6, 3, 5),
(6, 4, 5),
(6, 5, 5),
(6, 6, 5),
(6, 7, 5),
(6, 8, 5),
(6, 9, 5),
(6, 10, 5),
(6, 11, 5),
(6, 12, 5),
(6, 13, 5),
(6, 14, 5),
(6, 15, 5),
(6, 16, 5),
(6, 17, 5),
(6, 18, 5),
(6, 19, 5),
(6, 20, 5),
(6, 22, 5),
(6, 23, 5),
(6, 24, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_pedido` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Metodo_pago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_pedido`, `Fecha`, `Total`, `Estado`, `Metodo_pago`) VALUES
(2, '2024-02-28', 50.00, 'Entregado', 'Tarjeta de crédito'),
(3, '2024-02-25', 501.00, 'Entregado', 'Transferencia bancaria'),
(4, '2024-02-24', 501.00, 'Entregado', 'Transferencia bancaria'),
(5, '2024-03-01', 1436.00, 'En proceso', 'Efectivo'),
(6, '2024-04-05', 635.50, 'Pendiente', 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_producto` int(11) NOT NULL,
  `Nombre_producto` varchar(255) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Proveedor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_producto`, `Nombre_producto`, `Precio`, `Stock`, `Proveedor`) VALUES
(1, 'Arroz', 3.00, 100, 'Proveedor A'),
(2, 'Frijoles', 1.80, 120, 'Proveedor B'),
(3, 'Aceite de cocina', 3.00, 80, 'Proveedor C'),
(4, 'Sal', 0.50, 200, 'Proveedor D'),
(5, 'Azúcar', 1.20, 150, 'Proveedor A'),
(6, 'Harina de trigo', 2.00, 100, 'Proveedor B'),
(7, 'Fideos', 1.50, 90, 'Proveedor C'),
(8, 'Leche', 1.80, 110, 'Proveedor D'),
(9, 'Huevos', 2.50, 80, 'Proveedor A'),
(10, 'Carne de res', 5.00, 60, 'Proveedor B'),
(11, 'Pollo', 4.50, 70, 'Proveedor C'),
(12, 'Pescado', 6.00, 50, 'Proveedor D'),
(13, 'Pan', 1.00, 200, 'Proveedor A'),
(14, 'Cereal', 3.50, 100, 'Proveedor B'),
(15, 'Frutas', 2.00, 120, 'Proveedor C'),
(16, 'Verduras', 1.80, 150, 'Proveedor D'),
(17, 'Café', 4.00, 80, 'Proveedor A'),
(18, 'Té', 3.00, 100, 'Proveedor B'),
(19, 'Refresco', 1.50, 150, 'Proveedor C'),
(20, 'Agua embotellada', 1.00, 200, 'Proveedor D'),
(22, 'Lámpara de escritorio LED', 15.00, 50, 'Proovedor A'),
(23, 'Soda', 1.50, 100, 'Proovedor E'),
(24, 'Auriculares inalámbricos', 60.00, 40, 'Proovedor E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD KEY `ID_pedido` (`ID_pedido`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`ID_pedido`) REFERENCES `pedidos` (`ID_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ID_producto`) REFERENCES `productos` (`ID_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
