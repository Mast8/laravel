-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2019 a las 14:54:54
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dragg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tarea_id` int(10) UNSIGNED DEFAULT NULL,
  `nombre_archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `tarea_id`, `nombre_archivo`, `created_at`, `updated_at`) VALUES
(4, 3, '2017-Scrum-Guide-Spanish-SouthAmerican.pdf', '2019-10-14 03:31:51', '2019-10-14 03:31:51'),
(5, 6, 'FormatoProyectoGrado.docx', '2019-10-26 22:23:21', '2019-10-26 22:23:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `mensaje` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pbi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `mensaje`, `fecha`, `user_id`, `pbi_id`, `created_at`, `updated_at`) VALUES
(7, 'Tengo una duda, alguien disponible para conversar sobre esto en la tarde?', '2019-10-31 03:00:00', 2, 1, '2019-10-31 07:00:00', NULL),
(8, 'Bueno tendre tiempo libre desde las 12.', '2019-10-31 13:02:52', 1, 1, '2019-10-31 17:02:52', '2019-10-31 17:02:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
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
  `nombre_est` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(14, '2019_09_28_173733_Token', 1);

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
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `estimacion` int(11) DEFAULT NULL,
  `sprint_id` int(10) UNSIGNED DEFAULT NULL,
  `prioridad_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pbis`
--

INSERT INTO `pbis` (`id`, `titulo`, `descripcion`, `estimacion`, `sprint_id`, `prioridad_id`, `created_at`, `updated_at`) VALUES
(1, 'Crear base de datos', 'Comenzar con el diseño de la primera version de la base de datos.', 3, 1, 1, '2019-10-13 03:25:26', '2019-11-05 00:17:44'),
(2, 'Historia 2.3', 'Desc', 1, 1, 1, '2019-10-14 01:21:17', '2019-10-28 03:40:05'),
(3, 'Historia 3', 'Descripcion 3', 1, 1, 1, '2019-10-26 20:24:14', '2019-10-28 03:35:44'),
(4, 'Historia 4', 'Desc 4', 1, 1, 1, '2019-10-26 20:35:34', '2019-10-28 03:35:53'),
(5, 'Historia 5', 'desc 5', 3, NULL, 2, '2019-10-26 21:01:47', '2019-10-26 21:01:47'),
(6, 'Historia A', 'a', 55, 3, 1, '2019-10-27 06:04:47', '2019-10-28 03:40:34'),
(7, 'lol', NULL, 8, 1, 2, '2019-11-05 00:07:37', '2019-11-05 00:07:37'),
(8, 'loo', NULL, 100, 1, 1, '2019-11-05 00:31:23', '2019-11-05 00:35:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridads`
--

CREATE TABLE `prioridads` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombrePrio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `user_id`, `days`, `created_at`, `updated_at`) VALUES
(1, 'Sistema para cine', 'Un sistema para el control de las butacas y acceso a las salas del cine.', 1, NULL, '2019-10-13 03:18:30', '2019-10-14 02:27:34'),
(2, 'Sistema para ferreteria', 'La mejor ferreteria de la ciudad, por el momento solo control de ventas.', 1, NULL, '2019-10-13 18:45:32', '2019-10-14 02:28:27'),
(4, 'Sistema para farmacia', 'Sistema para una farmacia mediana, principalmente para el control de inventarios.', 2, NULL, '2019-10-14 02:26:16', '2019-10-14 02:26:16'),
(5, 'Proyecto 1', NULL, 1, NULL, '2019-10-15 00:28:57', '2019-10-15 00:28:57'),
(6, 'Proy 5', 'des', 1, NULL, '2019-10-27 05:54:50', '2019-10-27 05:54:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invitado` int(7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `invitado`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2019-10-13 18:38:18', '2019-10-13 18:38:18'),
(3, 4, 1, 1, '2019-10-14 02:26:32', '2019-10-14 02:26:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprints`
--

CREATE TABLE `sprints` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sprints`
--

INSERT INTO `sprints` (`id`, `nombre`, `descripcion`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'Sprint 1', 'Descripti', 1, '2019-10-13 03:23:15', '2019-10-14 01:04:22'),
(2, 'sprint 3', 'spr', 1, '2019-10-27 00:48:47', '2019-10-27 00:48:47'),
(3, 'Sprint A', 'des', 4, '2019-10-27 06:04:22', '2019-10-27 06:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `responsable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pbi_id` int(10) UNSIGNED DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `name`, `descripcion`, `user_id`, `responsable`, `pbi_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(2, 'Tarea 1', 'descripcion', 2, 'Rodrigo', 1, 1, '2019-10-13 23:41:01', '2019-11-21 00:40:17'),
(3, 'Tarea 1.1', NULL, 2, 'Rodrigo', 1, 1, '2019-10-14 00:43:58', '2019-10-14 00:53:36'),
(4, 'Tarea 3', NULL, 2, 'Rodrigo', 1, 3, '2019-10-14 00:50:24', '2019-10-14 00:50:24'),
(5, 'Tarea 4', NULL, 2, 'Rodrigo', 1, 1, '2019-10-14 00:52:19', '2019-10-14 00:52:19'),
(6, 'Tarea 22', '22', 1, 'Mast', 2, 1, '2019-10-26 22:22:53', '2019-10-26 22:22:53'),
(7, 'tar 222', 'de', 2, 'Rodrigo', 3, 3, '2019-10-27 06:29:25', '2019-10-27 06:29:25'),
(8, 'tar 222.3', 'de', 2, 'Rodrigo', 3, 2, '2019-10-27 06:33:19', '2019-10-27 06:33:19'),
(9, 'tar 222.1', 'det', 2, 'Rodrigo', 3, 1, '2019-10-27 06:33:44', '2019-10-27 06:33:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `id_user`, `token`, `created_at`) VALUES
(3, 6, 'NXjwiPJnkNWF7XTsziyqKQlFZK4Juv', '2019-11-04 15:28:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_user` longtext COLLATE utf8mb4_unicode_ci,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `activado`, `password`, `descripcion_user`, `nombres`, `apellidos`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mast', 'mast@gmail.com', 1, '$2y$10$Go8i1gnRLgtwhHsVSoDV9uqH1KEbPNTxYKnOh/kFGXXTrb1S0EgdS', 'Si empiezo a codificar', 'Ronald Rodrigo', 'Miranda Rodriguez', 1, '6G0GIdiKcsGzLA8IjDt9fBuuARGJoTOig5SIVEOebgZxNEL33P5WUricgiAH', NULL, '2019-11-04 18:59:10'),
(2, 'Rodrigo', 'mirandarodriguezronal@gmail.com', 1, '$2y$10$dxxshqL9LI5TlNMRKMJacO5YI02xaOdyrecN7Y0sXhriVtyhqjo5y', NULL, 'Rodrigo', 'Salazar', 3, 'JemND8kiRKoKjYwdsgBPTqRo3QKjBT1Fw4vrthq2RxdleL75vnumDrzxtJXt', NULL, '2019-10-14 03:37:49'),
(3, 'Mast', 'mirandarodriguezrona@gmail.com', 1, '$2y$10$GbbramAIYTYCk1nIPTnaaeEtW6NL9m0RSVSItUOomKWqMd./VraOi', NULL, NULL, NULL, 3, 'WWeQLhQh4iudvMYKE4jZEazlYTMobVB4hbVBgUJgg239yGl0Lrm0D2aNZJjE', '2019-10-14 02:03:11', '2019-10-14 02:10:48'),
(6, 'masst', 'mirandarodriguezronald@gmail.com', 0, '$2y$10$yFEzL9stV8unnI92jREk/uqnG7ZlEAxl76jekDDzPcfa9tfczLHjO', NULL, NULL, NULL, 3, NULL, '2019-11-04 19:28:56', '2019-11-04 19:28:56');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sprints`
--
ALTER TABLE `sprints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
