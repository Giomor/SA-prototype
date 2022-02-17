-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 17, 2022 alle 16:09
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa_prototype`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iot_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `analytics`
--

INSERT INTO `analytics` (`id`, `date`, `time`, `user_id`, `iot_id`, `artwork_id`, `created_at`, `updated_at`) VALUES
(1, '2022-02-17', 500, 'giorgio@email.com', 1, 1, NULL, NULL),
(2, '2022-02-15', 600, 'giorgio@email.com', 2, 3, NULL, NULL),
(3, '2022-02-01', 500, 'giorgio@email.com', 2, 3, NULL, NULL),
(4, '2022-02-01', 100, 'pio@email.com', 1, 1, NULL, NULL),
(5, '2022-02-15', 200, 'gino@email.it', 10, 9, NULL, NULL),
(6, '2022-01-18', 540, 'pio@email.it', 1, 1, NULL, NULL),
(9, '2022-02-13', 150, 'pio@email.it', 1, 1, NULL, NULL),
(10, '2022-02-13', 500, 'giorgio@email.com', 7, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `artwork`
--

CREATE TABLE `artwork` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob DEFAULT NULL,
  `heritage_site_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `artwork`
--

INSERT INTO `artwork` (`id`, `name`, `description`, `image`, `heritage_site_id`, `created_at`, `updated_at`) VALUES
(1, 'artwork', 'artwork description', NULL, 4, NULL, NULL),
(3, 'scritta neon', 'scritta neon', NULL, 2, NULL, NULL),
(6, 'Artwork', 'Picasso painting', NULL, 3, NULL, NULL),
(7, 'The painting', 'van gogh', NULL, 2, NULL, NULL),
(9, 'La pietà', 'Michelangelo', NULL, 3, NULL, NULL),
(12, 'David', 'Michelangelo sculpture', NULL, 4, '2022-02-17 14:01:08', '2022-02-17 14:01:08'),
(13, 'Painting', 'painting', NULL, 4, '2022-02-17 14:01:19', '2022-02-17 14:01:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `association_artwork_tag`
--

CREATE TABLE `association_artwork_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `association_artwork_tag`
--

INSERT INTO `association_artwork_tag` (`id`, `artwork_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(8, 6, 2, NULL, NULL),
(9, 7, 2, NULL, NULL),
(11, 9, 1, NULL, NULL),
(12, 9, 5, NULL, NULL),
(17, 12, 5, '2022-02-17 14:01:08', '2022-02-17 14:01:08'),
(18, 12, 9, '2022-02-17 14:01:08', '2022-02-17 14:01:08'),
(19, 12, 10, '2022-02-17 14:01:08', '2022-02-17 14:01:08'),
(20, 13, 7, '2022-02-17 14:01:19', '2022-02-17 14:01:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `check_enter` tinyint(1) NOT NULL DEFAULT 0,
  `check_exit` tinyint(1) NOT NULL DEFAULT 0,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `bookings`
--

INSERT INTO `bookings` (`id`, `code`, `check_enter`, `check_exit`, `user_email`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'Nf1ndo', 1, 0, 'giorgio@gmail.com', 1, '2022-02-15 18:34:00', '2022-02-15 18:34:00'),
(2, 'aaaaaa', 1, 0, 'pippo@email.com', 5, NULL, NULL),
(3, 'bbbbbb', 1, 0, 'pino@email.com', 16, NULL, NULL),
(4, 'cccccc', 1, 0, 'pio@email.com', 9, NULL, NULL),
(5, 'vvvvvv', 1, 0, 'giorgio@email.com', 8, NULL, NULL),
(6, 'qqqqqq', 1, 0, 'pio@email.it', 8, NULL, NULL),
(7, '0MgSNt', 0, 0, 'pioros@email.com', 13, '2022-02-17 12:28:05', '2022-02-17 12:28:05'),
(8, 'UMK9KV', 0, 0, 'giorgio@gmail.com', 6, '2022-02-17 12:29:41', '2022-02-17 12:29:41'),
(9, 'ldjHZY', 0, 0, 'giorgio@gmail.com', 7, '2022-02-17 12:29:44', '2022-02-17 12:29:44'),
(10, 'yTylXG', 0, 0, 'giorgio@gmail.com', 14, '2022-02-17 12:29:46', '2022-02-17 12:29:46'),
(11, 'ihADw8', 0, 0, 'giorgio@gmail.com', 11, '2022-02-17 12:50:25', '2022-02-17 12:50:25'),
(12, '6JC4E8', 0, 0, 'mrossi@email.it', 7, '2022-02-17 13:00:59', '2022-02-17 13:00:59');

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `favorite`
--

CREATE TABLE `favorite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `favorite`
--

INSERT INTO `favorite` (`id`, `date`, `user_email`, `artwork_id`, `created_at`, `updated_at`) VALUES
(8, '2022-02-17', 'giorgio@gmail.com', 7, '2022-02-17 12:31:24', '2022-02-17 12:31:24'),
(9, '2022-02-17', 'giorgio@gmail.com', 6, '2022-02-17 12:31:28', '2022-02-17 12:31:28'),
(10, '2022-02-17', 'giorgio@gmail.com', 3, '2022-02-17 12:50:35', '2022-02-17 12:50:35'),
(11, '2022-02-17', 'admin@email.it', 3, '2022-02-17 13:57:55', '2022-02-17 13:57:55'),
(12, '2022-02-17', 'admin@email.it', 7, '2022-02-17 13:57:56', '2022-02-17 13:57:56'),
(13, '2022-02-17', 'admin@email.it', 6, '2022-02-17 13:58:02', '2022-02-17 13:58:02');

-- --------------------------------------------------------

--
-- Struttura della tabella `heritage_site`
--

CREATE TABLE `heritage_site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `crowd_limit` int(11) NOT NULL,
  `maximum_tickets` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `heritage_site`
--

INSERT INTO `heritage_site` (`id`, `name`, `description`, `crowd_limit`, `maximum_tickets`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(2, 'munda', 'Museum in L\'Aquila', 100, 100, 11.255337620149135, 43.76893278753495, NULL, NULL),
(3, 'Musei Vaticani', 'Museum near Rome', 500, 1500, 12.452664856, 41.903829718, NULL, NULL),
(4, 'Uffizi', 'Museum in Florence', 150, 500, 11.255337620149135, 43.76793278753495, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heritage_site_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `iot`
--

CREATE TABLE `iot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `heritage_site_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `iot`
--

INSERT INTO `iot` (`id`, `name`, `type`, `area`, `heritage_site_id`, `created_at`, `updated_at`) VALUES
(1, 'wifi', 'wifi', '1', 1, '2022-02-15 18:30:57', '2022-02-15 18:30:57'),
(3, 'Proximity Sensor 1', 'Proximity sensor', '1', 2, NULL, NULL),
(4, 'proximity sensor', 'sensor', '2', 1, '2022-02-17 12:57:12', '2022-02-17 12:57:18');

-- --------------------------------------------------------

--
-- Struttura della tabella `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artwork_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_02_154313_create_analytics_table', 1),
(6, '2022_02_02_154406_create_artwork_table', 1),
(7, '2022_02_02_154416_create_favorite_table', 1),
(8, '2022_02_02_154515_create_heritage_site_table', 1),
(9, '2022_02_02_154526_create_iot_table', 1),
(10, '2022_02_02_154533_create_media_table', 1),
(11, '2022_02_02_154541_create_association_artwork_tag_table', 1),
(12, '2022_02_02_154541_create_ticket_table', 1),
(13, '2022_02_06_173621_create_history_table', 1),
(14, '2022_02_06_173621_create_tag_table', 1),
(15, '2022_02_07_133718_create_bookings_table', 1),
(16, '2022_02_08_143407_update_artwork_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tag`
--

INSERT INTO `tag` (`id`, `keyword`, `created_at`, `updated_at`) VALUES
(1, 'michelangelo', '2022-02-15 18:30:24', '2022-02-15 18:30:24'),
(2, ' painting', '2022-02-15 18:30:24', '2022-02-15 18:30:24'),
(3, 'leonardo', '2022-02-17 10:29:48', '2022-02-17 10:29:48'),
(4, ' woman', '2022-02-17 10:29:48', '2022-02-17 10:29:48'),
(5, 'sculpture', NULL, NULL),
(6, 'artwork', '2022-02-17 12:52:02', '2022-02-17 12:52:02'),
(7, 'painting', '2022-02-17 12:56:43', '2022-02-17 12:56:43'),
(8, ' artwork', '2022-02-17 12:56:43', '2022-02-17 12:56:43'),
(9, ' michelangelo', '2022-02-17 14:01:08', '2022-02-17 14:01:08'),
(10, ' david', '2022-02-17 14:01:08', '2022-02-17 14:01:08');

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `heritage_site_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `ticket`
--

INSERT INTO `ticket` (`id`, `datetime`, `booked`, `heritage_site_id`, `created_at`, `updated_at`) VALUES
(1, '2022-02-09 20:31:40', 1, 4, NULL, '2022-02-15 18:34:00'),
(5, '2022-02-08 13:12:36', 1, 2, NULL, NULL),
(6, '2022-02-19 13:36:57', 1, 3, NULL, '2022-02-17 13:00:30'),
(7, '2022-02-23 13:36:57', 1, 3, NULL, '2022-02-17 13:00:59'),
(8, '2022-02-24 13:36:57', 1, 2, NULL, NULL),
(9, '2022-02-13 13:36:57', 1, 2, NULL, NULL),
(10, '2022-02-15 13:36:57', 1, 2, NULL, NULL),
(11, '2022-02-24 13:36:57', 1, 2, NULL, '2022-02-17 12:50:25'),
(12, '2022-03-15 13:36:57', 0, 2, NULL, NULL),
(13, '2022-02-25 13:36:57', 1, 3, NULL, '2022-02-17 12:28:05'),
(14, '2022-02-21 13:36:57', 1, 3, NULL, '2022-02-17 12:29:46'),
(15, '2022-02-21 13:36:57', 0, 2, NULL, NULL),
(16, '2022-02-18 14:20:05', 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.it', NULL, '$2y$10$0Hot2o7I27ilDisC3glIUejZFXOaaaq6AS8OpNdeE175qY./VRtCa', 1, NULL, '2022-02-15 18:27:12', '2022-02-15 18:27:12'),
(2, 'giorgio', 'giorgio@gmail.com', NULL, '$2y$10$6wwy5F3v701oKVUBDHc6iuQTariT5eE19pjgzVRtGOeQ7AAYp6cbe', 0, NULL, '2022-02-15 18:32:07', '2022-02-15 18:32:07'),
(3, 'Pio Rossi', 'pioros@email.com', NULL, ' ', 0, NULL, '2022-02-17 12:28:05', '2022-02-17 12:28:05'),
(5, 'Mario Rossi', 'mrossi@email.it', NULL, ' ', 0, NULL, '2022-02-17 13:00:59', '2022-02-17 13:00:59');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_heritage_site_id_foreign` (`heritage_site_id`);

--
-- Indici per le tabelle `association_artwork_tag`
--
ALTER TABLE `association_artwork_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indici per le tabelle `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `heritage_site`
--
ALTER TABLE `heritage_site`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `iot`
--
ALTER TABLE `iot`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_keyword_unique` (`keyword`);

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `artwork`
--
ALTER TABLE `artwork`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `association_artwork_tag`
--
ALTER TABLE `association_artwork_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `heritage_site`
--
ALTER TABLE `heritage_site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `iot`
--
ALTER TABLE `iot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `artwork_heritage_site_id_foreign` FOREIGN KEY (`heritage_site_id`) REFERENCES `heritage_site` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
