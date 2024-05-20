-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 20-05-2024 a las 06:26:41
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel56`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$XYz9/rHcSatWkJIieuFxl.7ujo1uiZglwJ6TN3I4i6s0mZ1znWMfW', NULL, '2018-06-07 18:44:36', '2018-06-07 18:44:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `direccion`, `telefono`, `email`, `ciudad`, `municipio`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'Default empresa', 'Aspernatur asperiore', 'Eos eos culpa et qu', 'ximavijama@mailinator.com', 'Facilis eos quia nu', 'Dicta voluptatem Nu', NULL, '2024-05-17 01:56:33', '2024-05-17 02:25:10'),
(15, 'Empresa 2', 'Elit voluptas accus', 'Anim vel sed laudant', 'zabany@mailinator.com', 'Sed ea rerum praesen', 'Expedita cillum recu', NULL, '2024-05-17 01:56:38', '2024-05-17 02:12:09'),
(16, 'empresa 3', 'Aut atque et exercit', 'Enim ad quidem ducim', 'havo@mailinator.com', 'Ullam quis rerum ven', 'Porro ad illo omnis', NULL, '2024-05-17 02:24:43', '2024-05-17 02:25:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_07_135646_crete_admin_table', 2),
(4, '2018_06_08_001421_create_admins_table', 3),
(5, '2024_03_08_191640_create_posts_table', 4),
(6, '2024_03_23_210115_create_usuarios_table', 4),
(7, '2024_04_18_214522_create_empresas_table', 5),
(10, '2024_04_18_214904_create_modulos_table', 5),
(12, '2024_04_18_214617_create_tikets_imgs_table', 7),
(15, '2024_04_18_214543_create_tickets_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `modulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `modulo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Modulo 1', NULL, '2024-04-28 02:14:07', '2024-05-15 08:21:44'),
(5, 'Modulo 2', NULL, '2024-04-28 02:14:19', '2024-05-15 08:21:50'),
(6, 'Modulo 3', NULL, '2024-04-30 03:39:01', '2024-05-15 08:21:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hugo.iman@yahoo.co.id', '$2y$10$05TXhUZj3CyKCSM10r64duXzWrV9qNC1bgirFmfMk4ny/stv66HN2', '2018-06-07 04:44:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `modulo_id` bigint(20) DEFAULT NULL,
  `admins_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `solucion` text COLLATE utf8_unicode_ci,
  `prioridad` enum('ALTA','MEDIA','BAJA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BAJA',
  `comentarios` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('NUEVO','AESPERA','ENPROG','PENDIENTE','CANCELADO','CERRADO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NUEVO',
  `deleted_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `modulo_id`, `admins_id`, `titulo`, `descripcion`, `solucion`, `prioridad`, `comentarios`, `ip_address`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(46, NULL, 4, 3, 'Enim aut sint aperia', 'Id ipsa anim anim', NULL, 'BAJA', 'Voluptas molestias s', NULL, 'NUEVO', NULL, '2024-05-20 12:08:08', '2024-05-20 12:08:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tikets_imgs`
--

CREATE TABLE `tikets_imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tiket_id` int(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tikets_imgs`
--

INSERT INTO `tikets_imgs` (`id`, `tiket_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 46, 'Captura de pantalla 2024-02-07 a la(s) 1.24.25 p.m..png', '2024-05-20 12:08:08', '2024-05-20 12:08:08'),
(2, 46, 'Captura de pantalla 2024-02-13 a la(s) 1.01.31 p.m..png', '2024-05-20 12:08:08', '2024-05-20 12:08:08'),
(3, 46, 'Captura de pantalla 2024-02-18 a la(s) 12.09.53 p.m..png', '2024-05-20 12:08:08', '2024-05-20 12:08:08'),
(4, 47, 'Captura de pantalla 2024-02-07 a la(s) 1.24.25 p.m..png', '2024-05-20 12:08:53', '2024-05-20 12:08:53'),
(5, 47, 'Captura de pantalla 2024-02-13 a la(s) 1.01.31 p.m..png', '2024-05-20 12:08:53', '2024-05-20 12:08:53'),
(6, 47, 'Captura de pantalla 2024-02-18 a la(s) 12.09.53 p.m..png', '2024-05-20 12:08:53', '2024-05-20 12:08:53'),
(7, 48, 'Captura de pantalla 2024-02-07 a la(s) 1.24.25 p.m..png', '2024-05-20 12:09:42', '2024-05-20 12:09:42'),
(8, 48, 'Captura de pantalla 2024-02-13 a la(s) 1.01.31 p.m..png', '2024-05-20 12:09:42', '2024-05-20 12:09:42'),
(9, 48, 'Captura de pantalla 2024-02-18 a la(s) 12.09.53 p.m..png', '2024-05-20 12:09:42', '2024-05-20 12:09:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Cliente','Admin','Agente') COLLATE utf8_unicode_ci NOT NULL,
  `empresa_id` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido_paterno`, `apellido_materno`, `telefono`, `email`, `password`, `tipo`, `empresa_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'arturo', 'osorio', 'barriga', '3322591264', 'admin@admin.com', '$2y$10$kk2XPQYzv4hlZLBrbcepL.48GA.fS3Ik2SH36UJwe6fvb2oFJ5Dsq', 'Admin', 14, 'w7dI4u6lL7CwVfbzg7GyMEu5ROFkrDQ6hl9vfJp27vzq1939SP8wTDXIQfxc', '2024-03-09 00:55:56', '2024-05-17 23:16:54'),
(4, 'arthurlinux', 'j', 'j', '87687', 'arthurlinux@marmacore.com', '$2y$10$y/TTXq60P7o9cu3Km.fGTuNA4Mi/WxvIf2bVy4I0e2NPu5/J1tThi', 'Agente', 14, 'F4NHNwKeaMIUL4KLfnbP0F3irw0jvx5CnfkxBzd19RcJ1d4go9tE88Q2mHuP', '2024-04-18 02:18:30', '2024-05-17 23:01:31'),
(5, 'test', '', '', '', 'test@test.com', '$2y$10$41T3yULP5o6FRnHiIXVx6ulNcAPwYLsPsgtzw5PklUQcfSg0skk7S', 'Agente', 14, '3bZIK3CMbLKRM5VGDA76WGtKDkeWVaNLxI5JIJy1sv2srKtmOY0DGAirxTvM', '2024-05-14 10:24:00', '2024-05-17 04:58:38'),
(6, 'mario', '', '', '', 'mario@mario.com', '$2y$10$sa3nMn2kyggez8Zg4kUPJu/dmWm2T2575.ARbKxwcS9fzUdDKwOT.', 'Cliente', 15, 'W3CYfTQ9jnBOHijwQ3WmzmLlct2QAe7U4ktfTVjFcMfZZn6fnuzU8f7CFZnj', '2024-05-15 07:58:29', '2024-05-17 06:06:41'),
(9, 'test 2', 'apellido pa', 'apellido mat', '8484848484', 'test@test2.com', '$2y$10$FOt91Fpd8OfBPfb7XK4XBeyb0OpYBFwdKnSE.vD0GrE.YwJueE1/O', 'Cliente', 15, 'c7Hh9rN20zuAwfmSo6S1WI75J5FzFo8iAeUDHUj2C601WYy5c4HRWwolRyi9', '2024-05-17 02:25:36', '2024-05-18 00:53:58'),
(11, 'Consectetur autem re', 'Distinctio Ab conse', 'Ipsam nesciunt dolo', '1234567890', 'qezojifuc@mailinator.com', '$2y$10$f.Pkk9dzuL3uaAG3IFEscuphUUyIp96hDGEFywkfP8reRlDzAUDRq', 'Admin', 16, NULL, '2024-05-17 22:57:23', '2024-05-17 22:57:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `sexo`, `created_at`, `updated_at`) VALUES
(13, 'Dolorum nulla vel om', 'Ut Nam magnam eum oc', 'Facere voluptas amet', 'vykifecep@mailinator.com', 'Et excepturi aut qui', '2024-04-27 06:19:02', '2024-04-27 06:19:02'),
(14, 'Repudiandae laborum', 'Quis in id non dolo', 'Soluta sapiente minu', 'bopog@mailinator.com', 'Repudiandae ut ut ex', '2024-04-27 06:19:08', '2024-04-27 06:19:08'),
(15, 'Dolor veniam sunt', 'Eligendi tempor dese', 'Ut odio dolore moles', 'vuhyzaf@mailinator.com', 'Qui laboriosam sequ', '2024-04-27 22:31:51', '2024-04-27 22:31:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tikets_imgs`
--
ALTER TABLE `tikets_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`),
  ADD UNIQUE KEY `usuarios_nombre_unique` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tikets_imgs`
--
ALTER TABLE `tikets_imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
