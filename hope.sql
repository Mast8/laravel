-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2020 a las 03:25:42
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hope`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tarea_id` int(10) UNSIGNED DEFAULT NULL,
  `nombre_archivo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `mensaje` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pbi_id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `mensaje`, `user_id`, `pbi_id`, `fecha`, `created_at`, `updated_at`) VALUES
(4, 'les parece establecer un limite para los proyectos?', 1, 6, '2020-01-09 14:19:32', '2020-01-09 18:19:32', '2020-01-09 18:19:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_est` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre_est`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'En curso', NULL, NULL),
(3, 'Concluido', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pbis`
--

CREATE TABLE `historial_pbis` (
  `id` int(10) UNSIGNED NOT NULL,
  `accion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realizada_por` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada_el` datetime NOT NULL,
  `pbi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_pbis`
--

INSERT INTO `historial_pbis` (`id`, `accion`, `motivo`, `realizada_por`, `creada_el`, `pbi_id`, `created_at`, `updated_at`) VALUES
(10, 'Modificacion', 'Cambio de estimacion de 3 a 4', 'mast@gmail.com', '2020-01-09 14:18:47', 6, '2020-01-09 18:18:47', '2020-01-09 18:18:47'),
(11, 'Modificacion', 'de Sprint', 'mast@gmail.com', '2020-01-11 14:23:07', 6, '2020-01-11 18:23:07', '2020-01-11 18:23:07'),
(12, 'Eliminacion', 'prueba', 'mast@gmail.com', '2020-01-11 14:42:06', 7, '2020-01-11 18:42:06', '2020-01-11 18:42:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_tareas`
--

CREATE TABLE `historial_tareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `accion_tar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo_tar` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realizada_por_tar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creada_el_tar` datetime NOT NULL,
  `tarea_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_tareas`
--

INSERT INTO `historial_tareas` (`id`, `accion_tar`, `motivo_tar`, `realizada_por_tar`, `creada_el_tar`, `tarea_id`, `created_at`, `updated_at`) VALUES
(6, 'Modificacion', 'Cmabio de estado a concluido', 'mast@gmail.com', '2020-01-09 14:21:05', 5, '2020-01-09 18:21:05', '2020-01-09 18:21:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_08_000000_create_users_table', 1),
(2, '2019_08_09_070120_create_companies_table', 1),
(3, '2019_08_09_071240_create_projects_table', 1),
(4, '2019_08_09_071939_create_sprints_table', 1),
(5, '2019_08_09_071940_create_prioridades_table', 1),
(6, '2019_08_09_071946_create_pbis_table', 1),
(7, '2019_08_09_071947_create_estados_table', 1),
(8, '2019_08_09_071948_create_tareas_table', 1),
(9, '2019_08_09_082113_create_comentarios_table', 1),
(10, '2019_08_09_090252_create_roles_table', 1),
(11, '2019_08_09_092955_create_project_user_table', 1),
(12, '2019_08_12_100000_create_password_resets_table', 1),
(13, '2019_09_25_145026_create_archivos_table', 1),
(14, '2019_09_28_173733_Token', 1),
(15, '2019_12_30_022103_create_historial_pbis_table', 1),
(16, '2019_12_31_223318_create_historial_tareas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pbis`
--

CREATE TABLE `pbis` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT 0,
  `estimacion` int(11) DEFAULT NULL,
  `sprint_id` int(10) UNSIGNED NOT NULL,
  `prioridad_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pbis`
--

INSERT INTO `pbis` (`id`, `titulo`, `descripcion`, `creado_por`, `eliminado`, `estimacion`, `sprint_id`, `prioridad_id`, `created_at`, `updated_at`) VALUES
(6, 'Registro de proyectos', 'El usuario podra crear los proyectos que desee.', 'mast@gmail.com', 0, 4, 2, 1, '2020-01-09 18:18:24', '2020-01-11 18:23:07'),
(7, 'Registro de usuarios', NULL, 'mast@gmail.com', 1, 3, 1, 2, '2020-01-09 18:24:37', '2020-01-11 18:42:06'),
(8, 'Creacion de cuenta', 'crear cuenta en wow', 'mast@gmail.com', 0, 3, 1, 1, '2020-07-15 00:31:36', '2020-07-15 00:31:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridads`
--

CREATE TABLE `prioridads` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombrePrio` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prioridads`
--

INSERT INTO `prioridads` (`id`, `nombrePrio`, `created_at`, `updated_at`) VALUES
(1, 'Alta', NULL, NULL),
(2, 'Media', NULL, NULL),
(3, 'Baja', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sistema para gestion de proyectos de software.', NULL, 1, '2020-01-09 05:31:11', '2020-01-11 18:12:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invitado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `invitado`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 1, '2020-01-09 18:19:46', '2020-01-09 18:19:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprints`
--

CREATE TABLE `sprints` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sprints`
--

INSERT INTO `sprints` (`id`, `nombre`, `descripcion`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'Sprint 1', 'Creacion de varios proyectos', 1, '2020-01-09 05:31:26', '2020-01-09 05:31:26'),
(2, 'Sprint 2', 'Crear historias de usuario.', 1, '2020-01-09 05:56:22', '2020-01-09 05:56:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT 0,
  `concluido_por` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `responsable` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pbi_id` int(10) UNSIGNED DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `name`, `descripcion`, `creado_por`, `eliminado`, `concluido_por`, `user_id`, `responsable`, `pbi_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(5, 'modificacion de proyectos', 'EL usuriario pordra crear los proyectos', 'mast@gmail.com', 0, 'mast@gmail.com', 2, 'mirandarodriguezronald@gmail.com', 6, 3, '2020-01-09 18:20:35', '2020-01-09 18:21:05'),
(6, 'Enviar un correo del confirmacion de registro al sistema.', NULL, 'mast@gmail.com', 0, NULL, 2, 'mirandarodriguezronald@gmail.com', 7, 2, '2020-01-09 18:25:12', '2020-01-09 18:25:12'),
(7, 'Registro de cuentas de los usuarios', NULL, 'mast@gmail.com', 0, NULL, 2, 'mirandarodriguezronald@gmail.com', 7, 1, '2020-01-09 18:25:40', '2020-01-09 18:25:40'),
(8, 'Modificacion de cuenta del usuario', NULL, 'mast@gmail.com', 0, 'mast@gmail.com', 2, 'mirandarodriguezronald@gmail.com', 7, 3, '2020-01-09 18:26:18', '2020-01-09 18:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `id_user`, `token`, `created_at`) VALUES
(1, 3, 'I3nIiCQbae7K9c4gZpruaEse5D9vM3', '2020-01-15 23:25:58'),
(2, 4, 'kUGutrqzkvYaRmfKD6j1Vo7LOTHfiD', '2020-07-23 18:21:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_user` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 3,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `activado`, `password`, `descripcion_user`, `nombres`, `apellidos`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mast', 'mast@gmail.com', 1, '$2y$10$8Oq1pREXzC199wHsFN41meemvC0iOBUnRLqRk4LVSrMnu5.OQrbAi', NULL, 'Ronald', 'Miranda', 1, 'LSCzWJr0DGXOs6jnGxU5wHRLhIeeiImVf41BK5738LPau41r1s1oJMGgxXwN', NULL, '2020-07-24 19:14:27'),
(2, 'Rodrigo', 'mirandarodriguezronald@gmail.com', 1, '$2y$10$/8sqAIOagkUVZQr62zh8kOLsdnBhCHfGteWua7L7oe45AdkuxFSoq', NULL, 'Rodrigo', 'Cuellar', 3, 'bfHXha9D60cQc3nmgYXiYa5Y8vg3ic0my74Y9reTerA9AvYZrUzKTgYcohzT', NULL, NULL),
(3, 'adfasf', 'mastelon10@gmail.com', 0, '$2y$10$8uSBJYMCoXdZcy3eG4S3m.TiiPgifE9wtSDFSgPiqiEu0xqQIATqu', NULL, NULL, NULL, 3, NULL, '2020-01-16 03:25:57', '2020-01-16 03:25:57'),
(5, 'mast1', 'ronald.miranda.rodriguez@gmail.com', 1, '$2y$10$S/NVt4NJ4eh5wSRgSm.MyOYpu7X6kHh5/PAWjaAmByIkq5cQ449VG', NULL, NULL, NULL, 3, 'HPWGVYBIjUzvqOh5MKosaQiKD5sNrldcP3b36AXHVARssIZiR7e7VNV5Wnos', '2020-07-23 22:26:21', '2020-07-23 22:30:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_tarea_id_foreign` (`tarea_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_user_id_foreign` (`user_id`),
  ADD KEY `comentarios_pbi_id_foreign` (`pbi_id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_pbis`
--
ALTER TABLE `historial_pbis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_pbis_pbi_id_foreign` (`pbi_id`);

--
-- Indices de la tabla `historial_tareas`
--
ALTER TABLE `historial_tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_tareas_tarea_id_foreign` (`tarea_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pbis`
--
ALTER TABLE `pbis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pbis_sprint_id_foreign` (`sprint_id`),
  ADD KEY `pbis_prioridad_id_foreign` (`prioridad_id`);

--
-- Indices de la tabla `prioridads`
--
ALTER TABLE `prioridads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`),
  ADD KEY `project_user_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sprints_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tareas_user_id_foreign` (`user_id`),
  ADD KEY `tareas_pbi_id_foreign` (`pbi_id`),
  ADD KEY `tareas_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial_pbis`
--
ALTER TABLE `historial_pbis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historial_tareas`
--
ALTER TABLE `historial_tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pbis`
--
ALTER TABLE `pbis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prioridads`
--
ALTER TABLE `prioridads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sprints`
--
ALTER TABLE `sprints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_tarea_id_foreign` FOREIGN KEY (`tarea_id`) REFERENCES `tareas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_pbi_id_foreign` FOREIGN KEY (`pbi_id`) REFERENCES `pbis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_pbis`
--
ALTER TABLE `historial_pbis`
  ADD CONSTRAINT `historial_pbis_pbi_id_foreign` FOREIGN KEY (`pbi_id`) REFERENCES `pbis` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_tareas`
--
ALTER TABLE `historial_tareas`
  ADD CONSTRAINT `historial_tareas_tarea_id_foreign` FOREIGN KEY (`tarea_id`) REFERENCES `tareas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pbis`
--
ALTER TABLE `pbis`
  ADD CONSTRAINT `pbis_prioridad_id_foreign` FOREIGN KEY (`prioridad_id`) REFERENCES `prioridads` (`id`),
  ADD CONSTRAINT `pbis_sprint_id_foreign` FOREIGN KEY (`sprint_id`) REFERENCES `sprints` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD CONSTRAINT `sprints_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `tareas_pbi_id_foreign` FOREIGN KEY (`pbi_id`) REFERENCES `pbis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tareas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
