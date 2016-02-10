-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-02-2016 a las 05:52:56
-- Versión del servidor: 10.1.10-MariaDB-log
-- Versión de PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecloservicios`
--
CREATE DATABASE IF NOT EXISTS `ecloservicios` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `ecloservicios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_servicio`
--

CREATE TABLE `componente_servicio` (
  `id` int(10) UNSIGNED NOT NULL,
  `servicio_id` int(10) UNSIGNED NOT NULL,
  `componente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componente_servicio`
--

INSERT INTO `componente_servicio` (`id`, `servicio_id`, `componente_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 2, '2016-02-03 23:23:18', '2016-02-03 23:23:18'),
(3, 3, 3, '2016-02-03 23:26:23', '2016-02-03 23:26:23'),
(4, 6, 4, '2016-02-03 23:28:02', '2016-02-03 23:28:02'),
(5, 4, 5, '2016-02-03 23:43:17', '2016-02-03 23:43:17'),
(6, 3, 6, '2016-02-04 00:14:06', '2016-02-04 00:14:06'),
(7, 4, 7, '2016-02-04 00:16:31', '2016-02-04 00:16:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre`, `descripcion`, `serial`, `created_at`, `updated_at`) VALUES
(1, 'memoria ram', 'ddr2 1GB', '123456', '2016-02-03 23:21:40', '2016-02-03 23:21:40'),
(2, 'disco duro', 'ide 80gb', '123456', '2016-02-03 23:23:18', '2016-02-03 23:23:18'),
(3, 'tarjeta madre', 'intel xyz', '0', '2016-02-03 23:26:23', '2016-02-03 23:26:23'),
(4, 'memoria ram', 'ddr2 1GB', '123456', '2016-02-03 23:28:02', '2016-02-03 23:28:02'),
(5, 'memoria ram', '1gb dd3', '0', '2016-02-03 23:43:16', '2016-02-03 23:43:16'),
(6, 'video', 'nvidia', '123', '2016-02-04 00:14:05', '2016-02-04 00:14:05'),
(7, 'disco duro', 'sata 150GB', 'wd160qweas', '2016-02-04 00:16:30', '2016-02-04 00:16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `servicio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `servicio_id`, `created_at`, `updated_at`) VALUES
(1, 'servicio_01_img1.png', 1, '2015-11-28 00:37:19', '2015-11-28 00:37:19'),
(2, 'servicio_01_img1.jpg', 1, '2015-11-28 01:20:08', '2015-11-28 01:20:08'),
(3, 'servicio_01_img2.jpg', 1, '2015-11-28 01:35:47', '2015-11-28 01:35:47'),
(4, 'servicio_01_img2.jpg', 1, '2015-11-28 01:36:57', '2015-11-28 01:36:57'),
(5, 'servicio_01_img3.jpg', 1, '2015-11-28 01:36:57', '2015-11-28 01:36:57'),
(6, 'servicio_01_img1.jpg', 1, '2015-11-28 01:37:14', '2015-11-28 01:37:14'),
(8, 'servicio_03_img1.jpg', 3, '2015-12-03 01:37:23', '2015-12-03 01:37:23'),
(9, 'servicio_06_img1.jpg', 6, '2015-12-29 23:14:11', '2015-12-29 23:14:11'),
(10, 'servicio_03_img2.jpg', 3, '2016-01-18 07:26:55', '2016-01-18 07:26:55'),
(11, 'servicio_08_img1.jpg', 8, '2016-02-10 10:09:56', '2016-02-10 10:09:56'),
(12, 'servicio_08_img2.jpg', 8, '2016-02-10 10:09:56', '2016-02-10 10:09:56'),
(13, 'servicio_08_img3.jpg', 8, '2016-02-10 10:09:56', '2016-02-10 10:09:56');

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_19_161427_create_tipo_servicios_table', 1),
('2015_11_19_161537_create_sevicios_table', 1),
('2015_11_26_235749_create_imagenes_table', 1),
('2015_01_15_105324_create_roles_table', 2),
('2015_01_15_114412_create_role_user_table', 2),
('2015_01_26_115212_create_permissions_table', 2),
('2015_01_26_115523_create_permission_role_table', 2),
('2015_02_09_132439_create_permission_user_table', 2),
('2016_02_03_170914_create_componentes_table', 3),
('2016_02_03_170933_create_componente_servicio_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `tecnico_id` int(10) UNSIGNED NOT NULL,
  `razon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `tipo_id`, `cliente_id`, `tecnico_id`, `razon`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 5, 'Se queda colgado', 1, '2015-11-27 22:05:54', '2015-11-28 01:47:00'),
(3, 2, 2, 7, 'cambio de sistema operativo', 2, '2015-12-03 01:22:05', '2016-01-18 07:26:55'),
(4, 3, 2, 7, 'mas de 6 meses sin mantenimiento preventivo', 1, '2015-12-03 01:55:09', '2015-12-03 01:55:09'),
(5, 1, 6, 7, 'sistema operativo dañado', 1, '2015-12-03 01:55:39', '2015-12-03 01:55:39'),
(6, 1, 9, 7, 'formateo', 2, '2015-12-03 08:43:35', '2015-12-29 23:14:12'),
(7, 1, 9, 3, '', 1, '2016-01-18 08:59:00', '2016-01-18 08:59:00'),
(8, 1, 9, 3, 'razonable', 3, '2016-01-18 08:59:29', '2016-02-10 10:09:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_servicios`
--

CREATE TABLE `tipos_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_servicios`
--

INSERT INTO `tipos_servicios` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Formateo', '2015-11-27 21:59:25', '2015-11-27 21:59:25'),
(2, 'Cambio de Sistema Operativo', '2015-11-27 22:02:58', '2015-11-27 22:02:58'),
(3, 'Limpieza', '2015-11-27 22:03:55', '2015-11-27 22:03:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` enum('cliente','tecnico','administrador') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cliente',
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `email`, `password`, `nivel`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'administrador', 19123123, '2147483647', 'admin@admin.com', '$2y$10$B8qq4WDxi9KmmEXk.feYqOupnsIW7m9BnxOm3ZpSinWHrHxVpwicm', 'administrador', 1, 'CQSCSGq3pjKKsSxuFk1ajzrXpHujRRJvFbdicw1cVCLhZwQ3Bol5CoJycHMj', '2015-11-25 01:27:48', '2016-02-09 23:08:32'),
(2, 'evelyn', 'piña', 20056910, '2147483647', 'evy@evy.com', 'evelyn', 'cliente', 1, NULL, '2015-11-26 10:23:17', '2015-11-26 10:23:17'),
(3, 'Raúl', 'garcia', 19132932, '2147483647', 'raul@raul.com', 'raulraul', 'tecnico', 1, NULL, '2015-11-26 10:24:07', '2015-11-26 10:24:07'),
(4, 'luis', 'garcia', 18884557, '2147483647', 'luis@luis.com', 'luisluis', 'cliente', 1, NULL, '2015-11-26 12:43:49', '2015-11-26 12:43:49'),
(5, 'otro', 'usuario', 20056912, '2147483647', 'otro@otro.com', 'otrootro', 'tecnico', 1, NULL, '2015-11-27 06:11:54', '2015-11-27 06:11:54'),
(6, 'sr qwe', 'qweewq', 20056913, '04262414176', 'otro@otromas.com', 'otrotro', 'cliente', 1, NULL, '2015-11-27 06:15:09', '2016-02-09 22:42:39'),
(7, 'nuevo', 'nuevo', 19123933, '2147483647', 'nuevo@nuevo.com', '$2y$10$2uj7XWWHDbMpFZEW7uhfw.l6x.LvXPkP1eOJjX7c84pQrD0BMnkti', 'tecnico', 1, 'pXL0TLCdJsVPp01NLDokHV7caucnR1u3Z8TGQCponyaBlYbUjhtPRR0SCjB7', '2015-11-28 07:51:08', '2016-02-06 08:54:51'),
(9, 'cliente', 'cliente', 20011222, '0452178234', 'cliente@cliente.com', '$2y$10$VdxG9AiOZYCMhAyJly9r5e0YtDoFchDZikJxo8uAC2.Qu7cGUvcey', 'cliente', 1, 'FgPaflIqAGXa7kPArgwPO7KSKOcU8TZ8tMygRb8o0eqsFUziJFbwNqN8kvbF', '2015-11-28 11:00:36', '2016-02-06 08:30:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componente_servicio`
--
ALTER TABLE `componente_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componente_servicio_servicio_id_foreign` (`servicio_id`),
  ADD KEY `componente_servicio_componente_id_foreign` (`componente_id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicios_tipo_id_foreign` (`tipo_id`),
  ADD KEY `servicios_cliente_id_foreign` (`cliente_id`),
  ADD KEY `servicios_tecnico_id_foreign` (`tecnico_id`);

--
-- Indices de la tabla `tipos_servicios`
--
ALTER TABLE `tipos_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componente_servicio`
--
ALTER TABLE `componente_servicio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipos_servicios`
--
ALTER TABLE `tipos_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componente_servicio`
--
ALTER TABLE `componente_servicio`
  ADD CONSTRAINT `componente_servicio_componente_id_foreign` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`id`),
  ADD CONSTRAINT `componente_servicio_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicios_tecnico_id_foreign` FOREIGN KEY (`tecnico_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicios_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_servicios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
