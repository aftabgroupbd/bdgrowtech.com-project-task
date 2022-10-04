-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 07:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_information`
--

CREATE TABLE `currency_information` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `num_code` varchar(255) NOT NULL,
  `char_code` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_information`
--

INSERT INTO `currency_information` (`id`, `name`, `num_code`, `char_code`, `nominal`, `value`) VALUES
('R01010', 'Австралийский доллар', '036', 'AUD', '1', '17,4757'),
('R01035', 'Фунт стерлингов Соединенного королевства', '826', 'GBP', '1', '48,9230'),
('R01090', 'Белорусских рублей', '974', 'BYR', '1000', '17,0272'),
('R01215', 'Датских крон', '208', 'DKK', '10', '41,8614'),
('R01235', 'Доллар США', '840', 'USD', '1', '31,5673'),
('R01239', 'Евро', '978', 'EUR', '1', '31,0938'),
('R01310', 'Исландских крон', '352', 'ISK', '100', '35,6693'),
('R01335', 'Казахстанских тенге', '398', 'KZT', '100', '20,4288'),
('R01350', 'Канадский доллар', '124', 'CAD', '1', '20,2549'),
('R01535', 'Норвежских крон', '578', 'NOK', '10', '42,0914'),
('R01589', 'СДР (специальные права заимствования)', '960', 'XDR', '1', '41,8737'),
('R01625', 'Сингапурский доллар', '702', 'SGD', '1', '18,0529'),
('R01700', 'Турецких лир', '792', 'TRL', '1000000', '19,3072'),
('R01720', 'Украинских гривен', '980', 'UAH', '10', '58,7058'),
('R01770', 'Шведских крон', '752', 'SEK', '10', '33,9572'),
('R01775', 'Швейцарский франк', '756', 'CHF', '1', '21,1464'),
('R01820', 'Японских иен', '392', 'JPY', '100', '26,7429');

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_ip` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_table`
--

INSERT INTO `log_table` (`id`, `request_ip`, `created_at`, `status`, `comments`) VALUES
(1, '::1', '2022-10-04 17:26:34', 1, 'Successfully get single currency info'),
(2, '::1', '2022-10-04 17:27:11', 0, 'Trying to get single currency information but failed'),
(3, '::1', '2022-10-04 17:27:13', 0, 'Trying to get single currency information but failed'),
(4, '::1', '2022-10-04 17:27:24', 1, 'Successfully get single currency info'),
(5, '::1', '2022-10-04 17:37:43', 1, 'Successfully get single currency info');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_10_03_165347_create_currency_information_table', 1),
(4, '2022_10_03_165454_create_log_table_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `modified_at`, `last_login`, `last_ip`) VALUES
(1, 'Aftab Uddin Arif', 'aftab6222', '$2y$10$Zweh2GFOclvdvG4kf9MW..imMeib9dsWEya25MZ2oKZkdVFE69qqK', '2022-10-03 17:26:50', '2022-10-04 17:35:51', '2022-10-04 17:35:51', '127.0.0.1'),
(3, 'Arif Hossen', 'arif6222', '$2y$10$gi9RyJWUR7nubfekKA7i1up3vFpWGMNrBuDGNfIFMD2otfAlZRZxG', '2022-10-04 17:45:05', '2022-10-04 17:45:42', '2022-10-04 17:45:42', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_table`
--
ALTER TABLE `log_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
