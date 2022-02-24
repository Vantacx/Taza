-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2022 a las 23:51:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_pub` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(255) NOT NULL,
  `id_usuario_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'a', 'a@a', '$2y$10$4fxb0BkcJsja.3v3Lv1zYOXh37M/cbzITG0WyA8HgLpIL0hu3I0Iu'),
(2, 'Juan', 'juan@juan2.com', '$2y$10$VdlBxi3/6nBKEEM925DYPO3mFDEXVJ.xePzX6jHTmpFkbOpsXyOBq'),
(3, 'Michael', 'mi@mi', '$2y$10$8899wMOpR.QWXTDy1e.fkOJkCwBwgqnKmclFfhE9wuZ.Cw4lNUbPK'),
(4, 'julian', 'dw@d', '$2y$10$C5fr11Thf/rlmFly1FbFke0XDwQZq8E3awkayPa0Pia45JVFx0OMS'),
(5, 'w', 'w@w', '$2y$10$LAMs./5MafHXN.mULZ.XmOeJtnHq6vpgDaFBR2IstoY8wotqR5Sfa'),
(6, 'w', 'w@w', '$2y$10$rTUDlkbiKsihr7dcgsccEeXM689xP.sRq7qXCej95sxhXEnXVOBpy'),
(7, 'e', 'eee@ee', '$2y$10$3cqNwe4v6Vv1ixQzygtDnOpUyeTttsyNtKA4Bzip1hlCTXPgd.XZ.'),
(8, 'e', 'eee@ee', '$2y$10$9TeuRXxv/B3E7JDnLwlLm.j05TQ8fVL90SlYU.dv4yYo8Gp1qGs5a'),
(9, 'y', 'y@y', '$2y$10$Mj000fStkXH.HSuqtzcw8.tnkBVFj9sAhEjLg5qVTUX28CkBG7TSS'),
(10, 'y', 'y@y', '$2y$10$QyspIjapZew31EdMRDeZ2u5qFfV8P7bNoiWKtCPbwxAmFsocqL.IC'),
(11, 'p', 'p@p', '$2y$10$Dexdri14p0QgddBcNZqvG.DXNz2kuEmJmo67rcuUUdKl9cJlNUh5q'),
(12, 'p', 'p@p', '$2y$10$3HiEt.QffEclq0AKUCW08.2EVtje34sfaCsVdIfD6Dk9sygoOTrKO'),
(13, 'p', 'p@p', '$2y$10$oR1InIzsKS3/fE0tNP1yZeWD.8RmPGPB0ZIMDlFp88Mqi7/xr6B0O'),
(14, 'p', 'p@p', '$2y$10$3W3Gr/DGMl7IoEnwZsNBledyys9/sxGmW5nTg/Zfda.i/vkJEIm16'),
(15, 'd', 'd@d', '$2y$10$FLg0QFQsU8jRS/BObWzv6u4yBjPJrOJYzI9pZnHufg0z/pesLdQEu'),
(16, 'd', 'd@d', '$2y$10$iA1yEqfzqDhWNSwH6nZHuuC2ZWlD0xRkiyt/N42OHDccaXzfeM1qK'),
(17, 'q', 'q@q', '$2y$10$t37Mdg/Yp6pSIdYfcT2QKu11s1fJ.FinUBmHKEdRpyEaZtC0XQwXO'),
(18, 'q', 'q@q', '$2y$10$lCf9vQKHOr3xgYQFNpAYS..GRwNHzST3h68De9wWLC90v/1ngCN3y'),
(19, 'hj', 'hj@hj', '$2y$10$OyEG5Pk5IKv7yiMdeqFjS.e6f766MAeKJwubRIA58OflxxevlCADa'),
(20, 'Vanta', 'v@a', '$2y$10$sSis6zdYfx/aO5mN2kMNuOP6itjx6XqAnzsPKV2ipMWIvDQ.giZ7y'),
(21, 'lotero', 'l@ldeir3wj', '$2y$10$o3ctnLz9co9Oja3DOY6FG.99ZlA6cNJN/oBHMdnHs9VGERFoTt9Cq'),
(22, 'alberto', 'd@wrt5y5', '$2y$10$tRXENc0Fu9KZTK9mBndHMeiVuNWe0e6BkcjKaGWjzIotm9cByTHtC'),
(23, 'Isa', 'isa@gmail.com', '$2y$10$nBQk9qksXbd43b02DdAzpu0Yfs7K5iyEj98kSDLMSKlUvf1BB0ILe'),
(24, 'Laura', 'laura@correo.es', '$2y$10$EJVZvXUbFuDjmYPGEFYCb.M5Y6VlYiYfQuIVtsi0YfpmHsJXefbR2'),
(25, 'Ciro', 'ciro@ciro.es', '$2y$10$3ancTjtmsFrd387uF8NHmuow55xEtIyNOZa09jM4QKPXOiUidEU5i'),
(26, 'David', 'david@correo.com', '$2y$10$1vT1GxDElcxWtETwr/185eopCO2huif49QHgsHndQXkIdfvuEXkgS'),
(27, 'David Santiago Duarte', 'dasaduni2006@gmail.com', '$2y$10$UFlFaOsf4ayaWQcn1LOAf.VYuJUZDL.8Png6HD5gOq7uNszcUS3YG'),
(28, 'daniel', 'ee@ddd', '$2y$10$sp1ZvJ.ZdjRC.Yx30fC2WepJ.Y2McXjFVoWzAuPaLvnKvr8P2utfS'),
(29, 'Argemiro', 'arge@gmail.com', '$2y$10$JIv8oRuIL4yKYfydr3Bf4.igODGP065KjIbJKGnHR.EcQQy5/pajS'),
(30, 'Epico', 'epico@epico', '$2y$10$/lIV4m.B8mKUJZuBoI0VBu1oKW9G1WRxiyGhUGHP.pzulel9loTR.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `id_usuario_pub` (`id_usuario_pub`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario_pub`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
