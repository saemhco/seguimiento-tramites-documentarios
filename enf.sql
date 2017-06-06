-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2016 a las 17:14:21
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargos`
--

CREATE TABLE `descargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cardex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receptor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registros_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `users_ed` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultads`
--

CREATE TABLE `facultads` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `facultads`
--

INSERT INTO `facultads` (`id`, `nombre`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enfermeria', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ing. Industrial y Sistemas', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Medicina', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Ciencias Agrarias', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Ing. Civil y Arquitectura', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Obstetricia', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ciencias de la Educación', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Psicología', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Med. Veterinaria y Zootecnía', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'CS. Administrativas Y Turismo', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Derecho y Cs. Políticas', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Cs. Económicas', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Cs. Contables y Financieras', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Ciencias Sociales', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Super Administrador', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_11_03_151554_create_facultads_table', 1),
('2016_11_03_151611_create_oficinas_table', 1),
('2016_11_03_151628_create_users_table', 1),
('2016_11_03_151645_create_registros_table', 1),
('2016_11_03_151658_create_descargos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE `oficinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `facultads_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`id`, `nombre`, `facultads_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Decanato', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Decanato', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Decanato', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Decanato', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Decanato', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Decanato', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Decanato', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Decanato', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Decanato', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Decanato', 10, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Decanato', 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Decanato', 12, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Decanato', 13, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Decanato', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(10) UNSIGNED NOT NULL,
  `n` int(11) NOT NULL,
  `documento` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `emisor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asunto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `adjunto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `oficinas_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `users_ed` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user.png',
  `funcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oficinas_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `dni`, `email`, `password`, `foto`, `funcion`, `oficinas_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Usuario', '48315690', 'aescandonmunguia@hotmail.com', '$2y$10$dZUqm5C5y/EQrI/MW1VOwOnnf9pIE5qjRsaguEqlIuAURrFdlRAFu', 'admin.png', 'Super Admin', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Sra. Decana', '0000002', 'decano2@hotmail.com', '$2y$10$idEkf4VzfM5BqHcQ5TCqiuoTYPJs02VoAmLiNv.6csVxbtooOoY6y', 'decano.png', 'Decano(a)', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Sra. Decana', '0000003', 'decano3@hotmail.com', '$2y$10$hTD6xhkRYfPY9hi6COr1AevHUpoEdxbcNYQAD/DUvy/nxrCmoot1G', 'decano.png', 'Decano(a)', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Sra. Decana', '0000004', 'decano4@hotmail.com', '$2y$10$ofDOjriVHqH5WJtaBD60tOc2yiYZrPpRRpN7pPxenIa32Vsdwq6XO', 'decano.png', 'Decano(a)', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Sra. Decana', '0000005', 'decano5@hotmail.com', '$2y$10$vyY67jen0pYRRjimgBOQuueL./8feIcX.60gk7nj1aSj1AY.mxeZe', 'decano.png', 'Decano(a)', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Sra. Decana', '0000006', 'decano6@hotmail.com', '$2y$10$6XOztv8gPjEX5TL.3D9hUuiaEBKf9jm/pVFn9rhFkj1uCPwGqcH8.', 'decano.png', 'Decano(a)', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Sra. Decana', '0000007', 'decano7@hotmail.com', '$2y$10$8YUW12pva2/cygjlJlyS7OyACEN7TvH4wUKjhXe5q3ovyeGIU5Pxq', 'decano.png', 'Decano(a)', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Sra. Decana', '0000008', 'decano8@hotmail.com', '$2y$10$/1L2faQP0sx6wY1P1qjRaOQIPLZRC/y.EZ..rCNL5F0PVZrEE5ZHu', 'decano.png', 'Decano(a)', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Sra. Decana', '0000009', 'decano9@hotmail.com', '$2y$10$h1cg0m2n6bdxplnxxe.Rk.IxCvaTfuowGPJPlZBuLkTpRvIx.9tV6', 'decano.png', 'Decano(a)', 9, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Sra. Decana', '00000010', 'decano10@hotmail.com', '$2y$10$Xfjo214OYewetjJkGUVUcuRqeXNvXXwXXUeIEEBD.CwFWjB71Sx3S', 'decano.png', 'Decano(a)', 10, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Sra. Decana', '00000011', 'decano11@hotmail.com', '$2y$10$qM6FThAUPBmBUVzz9g7wSeg8tLatrcp8GdihQyu00tTVVHERom5US', 'decano.png', 'Decano(a)', 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Sra. Decana', '00000012', 'decano12@hotmail.com', '$2y$10$wYfbRjcdSgxPpvkgthtBYOADOOTXtWiQAXKfZuHJcbWbG6W9Nfr42', 'decano.png', 'Decano(a)', 12, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Sra. Decana', '00000013', 'decano13@hotmail.com', '$2y$10$9xzqr3Xa5/ndECFYNU5nC.UdUaPr7rUHWYDdACJ9LqTZoJolDXyTi', 'decano.png', 'Decano(a)', 13, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Sra. Decana', '00000014', 'decano14@hotmail.com', '$2y$10$WBSJYErUUvL2nNp0k1BG7eREPaNdooGhCOPVdmnGiED1WVNjR1/hy', 'decano.png', 'Decano(a)', 14, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Sra. Decana', '00000015', 'decano15@hotmail.com', '$2y$10$MeGcRX35fsm.QpfrWHQwLe7J/IkFBzvL6WdOBpbVTU/Cx4XVeWOXC', 'decano.png', 'Decano(a)', 15, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descargos_registros_id_foreign` (`registros_id`),
  ADD KEY `descargos_users_id_foreign` (`users_id`),
  ADD KEY `descargos_users_ed_foreign` (`users_ed`);

--
-- Indices de la tabla `facultads`
--
ALTER TABLE `facultads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oficinas_facultads_id_foreign` (`facultads_id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_oficinas_id_foreign` (`oficinas_id`),
  ADD KEY `registros_users_id_foreign` (`users_id`),
  ADD KEY `registros_users_ed_foreign` (`users_ed`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_dni_unique` (`dni`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_oficinas_id_foreign` (`oficinas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descargos`
--
ALTER TABLE `descargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facultads`
--
ALTER TABLE `facultads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD CONSTRAINT `descargos_registros_id_foreign` FOREIGN KEY (`registros_id`) REFERENCES `registros` (`id`),
  ADD CONSTRAINT `descargos_users_ed_foreign` FOREIGN KEY (`users_ed`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `descargos_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD CONSTRAINT `oficinas_facultads_id_foreign` FOREIGN KEY (`facultads_id`) REFERENCES `facultads` (`id`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_oficinas_id_foreign` FOREIGN KEY (`oficinas_id`) REFERENCES `oficinas` (`id`),
  ADD CONSTRAINT `registros_users_ed_foreign` FOREIGN KEY (`users_ed`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registros_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_oficinas_id_foreign` FOREIGN KEY (`oficinas_id`) REFERENCES `oficinas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
