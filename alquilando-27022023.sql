-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-02-2023 a las 03:02:44
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id_inmueble` int(100) NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_520_ci,
  `foto` varchar(40) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `estado` varchar(40) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `precio` varchar(40) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nombre_inmueble` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `distrito` varchar(40) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `condicion` int(11) NOT NULL DEFAULT '1',
  `idusuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id_inmueble`, `direccion`, `detalles`, `foto`, `estado`, `precio`, `nombre_inmueble`, `distrito`, `condicion`, `idusuario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1671684866_20e06447f6ef7dd88aea.jpg', 'Alquilado', '1500', 'Mellando', 'Jesus Maria', 1, 1, '2022-12-22 03:54:26', '2022-12-22 03:54:26', NULL),
(15, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1671767032_5f4e354159d50fa93d1c.png', 'Sin Alquilar', '1500', 'Mellando', 'Lima', 1, 1, '2022-12-23 02:43:52', '2022-12-27 23:30:20', NULL),
(18, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1671767320_2248e98bc0e82a20a00f.jpg', 'Alquilado', '1500', 'Mellando', 'Lima', 1, 1, '2022-12-23 02:48:40', '2022-12-27 23:26:36', NULL),
(23, 'Av. Mello Franco 463', 'Espectacular departamento', '1671768851_8d32c4e2409e789c3038.jpg', 'Alquilado', '2500', 'Mellando', 'Lurigancho', 1, 2, '2022-12-23 03:14:11', '2023-02-07 18:13:32', NULL),
(25, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista hjjk hg jgjgj hgjhgj hg jhg gf', '1671769068_ce5391892cafbf16ac32.jpg', 'Alquilado', '150078', 'Cangallo', 'Jesus Maria', 1, 2, '2022-12-23 03:17:48', '2022-12-28 03:55:43', NULL),
(30, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1671769622_cd4df23bb7c5118f2082.jpg', 'Sin Alquilar', '1800', 'Mellando', 'Jesus Maria', 1, 0, '2022-12-23 03:27:02', '2022-12-31 00:27:20', NULL),
(32, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 7777777', '1671769860_ed8b4876d1212fcf8309.png', 'Alquilado', '1500', 'Mellando', 'Jesus Maria', 1, 0, '2022-12-23 03:31:00', '2022-12-23 03:31:00', NULL),
(33, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 9999999', '1671856370_20955526674f4a29b400.jpg', 'Alquilado', '1500', 'Mellando', 'Jesus Maria', 1, 0, '2022-12-24 03:32:50', '2022-12-24 03:32:50', NULL),
(34, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 2222222', 'default.png', 'Alquilado', '1500', 'Mellando', 'Cercado', 0, 0, '2022-12-24 03:37:52', '2023-02-03 20:50:37', NULL),
(35, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 223333333', 'default.png', 'Alquilado', '1500', 'Mellando', 'La Molina', 1, 0, '2022-12-25 00:13:18', '2022-12-25 00:13:18', NULL),
(36, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 6666666666666', '1672014672_6a765ee5ba67c415b396.jpeg', 'Alquilado', '2500', 'Mellando', 'Jesús María', 1, 0, '2022-12-25 23:31:12', '2022-12-25 23:31:12', NULL),
(37, 'Jr. Cangallo 236', 'En la cuadra 2 de la av. cangallo en Barrios Altos', '1672014887_808e2bad07689d536fd8.jpg', 'Alquilado', '300', 'Cangallo', 'Lima', 1, 0, '2022-12-25 23:34:47', '2022-12-25 23:34:47', NULL),
(38, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 4444444444444', '1672014961_7f18aa53445b432a479f.png', 'Alquilado', '1500', 'Mellando', 'El Agustino', 0, 1, '2022-12-25 23:36:01', '2022-12-27 23:30:45', NULL),
(39, 'Av. Mello Franco 7854', 'Es un depa que estamos agregando a la lista 555555555555555555555555555', '1672015323_a64cb55dfd3eec1db602.jpg', 'Alquilado', '5000', 'Cangallo', 'Lurigancho', 1, 0, '2022-12-25 23:42:03', '2022-12-25 23:42:03', NULL),
(40, 'Av. Mello Franco 4687', 'Es un depa que estamos agregando a la lista xcvcvcxvxcvxcvcxvcxvxc', '1672015623_3d4051ad7c0bf825bc2b.jpg', 'Alquilado', '1500', 'Cangallo', 'Los Olivos', 1, 0, '2022-12-25 23:47:03', '2022-12-25 23:47:03', NULL),
(41, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1672016392_6f94d4e4ae6367848070.jpg', 'Alquilado', '1500', 'Mellando', 'La Victoria', 1, 0, '2022-12-25 23:59:52', '2022-12-27 23:31:08', NULL),
(42, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista 000000000', '1672022129_8514c7b38096275ce45e.png', 'Alquilado', '1500', 'Mellando', 'Comas', 1, 0, '2022-12-26 01:35:29', '2022-12-26 01:35:29', NULL),
(43, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista dffffffffffffffffffff', '1672022811_31c85a7607242c58cfd3.jpg', 'Alquilado', '1500', 'Mellando', 'La Victoria', 1, 0, '2022-12-26 01:46:51', '2022-12-26 01:46:51', NULL),
(44, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', 'default.png', 'Sin Alquilar', '1500', 'Mellando', 'El Agustino', 1, 0, '2022-12-26 01:47:19', '2022-12-26 01:47:19', NULL),
(45, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1672023306_36e030fe51f4df4eafd1.jpeg', 'Sin Alquilar', '1500', 'Mellando', 'El Agustino', 1, 0, '2022-12-26 01:55:06', '2022-12-26 01:55:06', NULL),
(46, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1672023498_0f3fd29cdd7a33720488.jpeg', 'Alquilado', '5000', 'Mellando', 'Cieneguilla', 1, 0, '2022-12-26 01:58:18', '2022-12-26 01:58:18', NULL),
(47, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', 'default.png', 'Alquilado', '1500', 'Mellando', 'Rimac', 1, 0, '2022-12-26 02:00:53', '2022-12-26 02:00:53', NULL),
(48, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', 'default.png', 'Alquilado', '5000', 'Mellando', 'La Victoria', 1, 0, '2022-12-26 02:02:54', '2022-12-26 02:02:54', NULL),
(50, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', 'default.png', 'Alquilado', '5000', 'Mellando', 'La Victoria', 1, 0, '2022-12-26 02:04:27', '2022-12-26 02:04:27', NULL),
(51, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', 'default.png', 'Alquilado', '900', 'Mellando', 'La Victoria', 1, 0, '2022-12-26 02:05:46', '2022-12-26 02:05:46', NULL),
(52, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1672024231_5baf0da4f5b8032a0007.png', 'Alquilado', '258', 'Cangallo', 'Punta Hermosa', 1, 0, '2022-12-26 02:10:31', '2022-12-26 02:10:31', NULL),
(56, 'Av. Mello Franco 463', 'Es un depa que estamos agregando a la lista', '1677384658_57ae667eafd815ac7bb5.jpeg', 'Alquilado', '1500', 'Londres', 'La Molina', 0, 0, '2023-02-26 03:10:58', '2023-02-27 01:05:07', NULL),
(57, 'Av. Mariategui 345', 'Predio muy bonito con jardin en la puerta grande.', '1677386640_67d7b68cff62800c8f4f.jpg', 'Sin Alquilar', '8900', 'Mariategui', 'Jesús María', 1, 2, '2023-02-26 03:44:00', '2023-02-26 03:44:00', NULL),
(58, 'Jr. Gran Marañon', 'Linda casa de campo en los jazmines de Comas', '1677463811_456ef4e04f8c0c3282ef.jpg', 'Alquilado', '150000', 'Comas City', 'Comas', 1, 2, '2023-02-27 01:10:11', '2023-02-27 01:10:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(8, '2022-11-14-225526', 'App\\Database\\Migrations\\Usuarios', 'default', 'App', 1668485096, 1),
(9, '2022-12-26-001925', 'App\\Database\\Migrations\\Inmuebles', 'default', 'App', 1672014110, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(20) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Administrador', NULL, NULL),
(3, 'Usuario', NULL, NULL),
(4, 'Visitante', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `condicion` int(11) NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `foto`, `condicion`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Alberto Chávez', 'albetho@hotmail.com', 'betcom', '$2y$10$OS9A4wKEu8YaauzrmJUlnusr3gBDgBCsqO.ev/bxWUTtJKsl/v00i', 1, '1672888970_100c5382a81c184126ac.jpg', 1, '2023-02-25 17:28:51', '2022-02-20 13:35:13'),
(2, 'Camila Perez', 'camilafont@hotmail.com', 'camilas', '$2y$10$9fg17GInvDMhTK16RzpBAeSCBIrgxauFc1Vb5ot5UaDXawdKmN7X6', 3, '1675460796_c02c7dea62a16662f4a2.jpg', 1, '2023-02-25 17:48:45', '2022-06-13 02:55:44'),
(4, 'Juan Castro', 'juanjo@gmail.com', 'camilo', '$2y$10$B6dvRtSew5qQaMIUwnQUtuGzegGb5nGv2YmhL0y6ctKhaIBmo2Hsy', 3, '1645367635_64da875a1c121d41b537.jpg', 0, '2023-02-23 16:26:06', '2022-04-04 03:34:34'),
(5, 'Luisa Alosilla Y', 'luisasss@gmail.com', 'luafood', '$2y$10$KlarhfHbJ0m/Q/gB934QyORr5lhv7MlEFrYqx9ZDH3PHJUrbAfRtq', 3, '1645241037_a45f1e4800454f579287.png', 1, '2022-03-30 18:41:25', '2022-03-30 18:41:25'),
(6, 'Juan Gomez Alva', 'juangome@gmail.com', 'juanjo', '$2y$10$LU8pWJFKtxNSbTlz5A3QAek/TaGieSDutWaAwRWjWtWDplIYhIc9m', 3, '1647386030_f9acb99e6b3b51a25522.jpg', 0, '2023-02-23 16:26:18', '2022-03-15 23:20:03'),
(7, 'Pedro Perez Panto', 'camilafont1@hotmail.com', 'pedrito2022', '$2y$10$MPPJMyuiXgsX0u24AltKx.un1UJfFdhpnCfwipW9t81yA3MOeksT6', 4, 'default.png', 1, '2022-03-30 18:43:08', '2022-03-30 18:43:08'),
(8, 'Juan Pumacahua', 'camilafont3@hotmail.com', 'juanpez', '$2y$10$K.R3HGfIiloriJWFq5wmruK7iiBRYGqoq.TNhFvasm4eWtAukGTYe', 4, '1649477827_bba36d18f083e3fbb42f.jpg', 0, '2023-02-23 16:26:15', '2022-05-12 18:18:06'),
(9, 'Almendra Gonzales Proata', 'almendrass@gmail.com', 'almendrasss', '$2y$10$.3EIO3GNwv4dXmLDU53NFOjNWlAs5RdtiR/vqjjvCwDcd3ZkvpeX2', 3, '1669347482_570cf480c71c8a035078.jpg', 0, '2023-02-03 21:48:41', '2022-11-25 02:38:02'),
(10, 'Elizabeth Pareja', 'elimegia@gmail.com', 'epareja', '$2y$10$QUBifHWe41dFBUevBYDLQ.8M18TeKUAwsYWTCBAq7BDWHdDBUbX/2', 3, '1670795724_80c96e8d97ea2cbea681.png', 0, '2023-02-03 21:48:39', '2022-12-11 20:55:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id_inmueble` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
