-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2018 a las 16:51:03
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unisa_lavora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`id`, `user_id`, `name`, `last_name`) VALUES
(1, 1, 'Cristian Salazar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `user_id`, `name`, `phone`, `address`) VALUES
('42243', 4, 'test', 3141341341, 'adfafdafda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experience`
--

CREATE TABLE `experience` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_12_113308_create_notifications_table', 1),
(4, '2018_05_12_145014_company_table', 1),
(5, '2018_05_12_145952_student_table', 1),
(6, '2018_05_12_150905_administrator_table', 1),
(7, '2018_05_12_151214_experience_table', 1),
(8, '2018_05_13_144705_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('11ac1c7d-1d28-46a2-8acf-ae047f25c54e', 'App\\Notifications\\UserActivate', 1, 'App\\User', '{\"user_id\":1,\"type\":\"user_activate\",\"name\":\"Activate Users\",\"description\":\"There are candidates hto activate!\"}', '2018-05-17 09:09:52', '2018-05-17 07:47:30', '2018-05-17 09:09:52'),
('2a53bf3a-bd5f-4bcf-a734-6db9e823bb41', 'App\\Notifications\\UserActivate', 1, 'App\\User', '{\"user_id\":1,\"type\":\"user_activate\",\"name\":\"Activate Users\",\"description\":\"There are candidates has been activated!\"}', '2018-05-16 14:52:21', '2018-05-16 14:51:38', '2018-05-16 14:52:21'),
('4f74ba66-5676-488f-bd3f-28d96606988a', 'App\\Notifications\\UserActivate', 1, 'App\\User', '{\"user_id\":1,\"type\":\"user_activate\",\"name\":\"Activate Users\",\"description\":\"There are candidates has been activated!\"}', '2018-05-16 13:23:23', '2018-05-16 13:05:17', '2018-05-16 13:23:23'),
('82bb2e77-b79f-4bc5-8e74-6e3e2e7964bc', 'App\\Notifications\\ConfirmActivation', 5, 'App\\User', '{\"type\":\"confirm_activate\",\"name\":\"Activaci\\u00f3n confirmada\",\"description\":\"Tu ha sido activada\"}', NULL, '2018-05-17 09:22:12', '2018-05-17 09:22:12'),
('95e518ab-28d3-453d-8dab-8e7b66040b72', 'App\\Notifications\\ConfirmActivation', 2, 'App\\User', '{\"type\":\"confirm_activate\",\"name\":\"Activation Confirmated\",\"description\":\"Your account has been activated\"}', NULL, '2018-05-16 13:23:32', '2018-05-16 13:23:32'),
('d0e0723b-c112-4add-86a8-6c6abd24e3b4', 'App\\Notifications\\ConfirmActivation', 4, 'App\\User', '{\"type\":\"confirm_activate\",\"name\":\"Activaci\\u00f3n confirmada\",\"description\":\"Tu ha sido activada\"}', NULL, '2018-05-17 09:22:17', '2018-05-17 09:22:17'),
('d474e855-e5a4-4459-b509-394877764975', 'App\\Notifications\\ConfirmActivation', 3, 'App\\User', '{\"type\":\"confirm_activate\",\"name\":\"Activation Confirmated\",\"description\":\"Your account has been activated\"}', '2018-05-16 14:56:35', '2018-05-16 14:52:24', '2018-05-16 14:56:35');

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
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`user_id`, `name`, `last_name`, `id`, `phone`, `address`, `cv`) VALUES
(5, 'ff', NULL, 423, 44, 'ff', NULL),
(2, 'Alejo', NULL, 52432, 3162589032, 'Molivento mz 6 cs 5', NULL),
(3, 'ccss', NULL, 56356363, 3162589032, 'Molivento mz 6 cs 5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `roll`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ccss@utp.edu.co', '$2y$10$oHvJPm2zcj8fs7Uknh7f8utfZYrLrx1GpCahumQHle0UQofP6YW.O', 0, 1, 'fYQg0rVQINQ05mhA1MLiPHILUG6FCrojJ6IgxfoF1kwaTJIHM39pBppXMNn4', NULL, '2018-05-16 13:03:32'),
(2, 'alejomoreno@gmail.com', '$2y$10$rTpIseLAIU.KXr9P8UHemuSBdZAVhKxNI2YbDFtMm2vpyULER3CyW', 2, 1, NULL, '2018-05-16 13:05:14', '2018-05-16 13:23:29'),
(3, 'pipobital@hotmail.com', '$2y$10$ZFyeqjRJ1nkyBM7VyopZUu57pI91fuz4OT352hAcQVs6PgT/DhpMS', 2, 1, 'INWTKUSsAIlH8WA0W2eopcLGHaUMC1t9Y09cM75AtreCRsvXcl2QJdpIlXL8', '2018-05-16 14:51:36', '2018-05-16 14:52:22'),
(4, 'test@tes.t', '$2y$10$ph7vkaayxYlE7YdjtrVFeead532hamLro8LYTu/DFzcdIhI1laqMy', 1, 1, NULL, '2018-05-17 07:39:43', '2018-05-17 09:22:16'),
(5, 'ff@ff.ff', '$2y$10$mW.UBwhM6xAolO21nW/J7eJxx93uXT2ss7KH1fzgPKk5eiTTbhG76', 2, 1, 'e1X8uqyK5Ga2du7v2XG1hAA2G8wiewVKF5SpmF5E8ItGAjSA4QHGb68zZUrS', '2018-05-17 07:47:27', '2018-05-17 09:22:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrator_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `experience`
--
ALTER TABLE `experience`
  ADD KEY `experience_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
