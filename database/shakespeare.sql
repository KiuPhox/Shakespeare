-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 07:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shakespeare`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `publication_date` timestamp NULL DEFAULT NULL,
  `page_quantity` int(11) DEFAULT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `image`, `price`, `publisher_id`, `quantity`, `publication_date`, `page_quantity`, `isbn`, `created_at`, `updated_at`) VALUES
(1, 'The Last White Man', 'Hadmin, Moshin', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_135/6040497.jpg', 18, 1, 200, NULL, 191, '9780241566572', '2022-10-08 04:56:21', '2022-10-09 00:59:52'),
(2, 'Girlcrush', 'Given, Florence', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_133/5941623_1.jpg', 21, 2, 120, '2022-10-08 17:00:00', 60, '9781914240546', '2022-10-08 04:59:01', '2022-10-09 09:27:26'),
(3, 'Reeling', 'Lafon, Lola', 'An impassioned meditation on the consequences of sexual exploitation and the dead ends of forgiveness', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_135/6071546_1.jpg', 18, 3, 100, '2022-02-09 17:00:00', 192, '9781787703582', '2022-10-09 01:10:53', '2022-10-09 09:27:12'),
(6, 'Yoga', 'Carrere, Emmanuel', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_134/5993525_1.jpg', 23, 1, 14, '2022-06-01 17:00:00', 320, '9781787333215', '2022-10-09 09:29:04', '2022-10-09 09:29:04'),
(7, 'Slack-Tide', 'Dymott, Elanor', 'When two people meet is it need, fantasy or love? She meets Robert - exuberant, generous, apparently care-free - and they fall in love with breath-taking speed. Slack-tide tracks the ebbs and flows of the affair: passionate, coercive, intensely sexual.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_116/5210684_1.jpg', 18, 4, 23, '2019-01-16 17:00:00', 208, '9781787331129', '2022-10-09 09:33:04', '2022-10-09 09:33:04'),
(8, 'Friday on My Mind', 'French, Nicci', 'When a bloated corpse is found floating in the River Thames the police can at least sure that identifying the victim will be straightforward. Around the dead man\'s wrist is a hospital band. On it are the words Dr F Klein... But psychotherapist Frieda Klein is very much alive.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_116/5199367.jpg', 13, 1, 51, '2016-02-24 17:00:00', 464, '9781405918596', '2022-10-09 09:35:46', '2022-10-09 09:35:46');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_06_040356_create_publishers_table', 1),
(3, '2022_10_07_030545_create_books_table', 1),
(4, '2022_10_07_165524_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Penguin Books LTD', NULL, NULL),
(2, 'Octopus', NULL, NULL),
(3, 'Europa Editions (UK) LTD', NULL, NULL),
(4, 'Vintage Publishing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `level`, `created_at`) VALUES
(1, 'Admin', '$2y$10$sEN7.oCLpJ3s77ogynLKU.Uq9Zim673GLy/fomiX4EjPlMeYq/djS', 'admin@admin.com', 0, '2022-10-09 04:26:34'),
(2, 'Anh Tuan', '$2y$10$LYwe4HtnD5VOFUvUw9bEP.YcnnC6y.cwfFIjAE1Qn9.K9FaWyUdcy', 'tuan.nguyenphananh@gmail.com', 1, '2022-10-09 06:46:05'),
(3, 'Tot', '$2y$10$uO8xYfWXdpfpRDsy44RbkuGMFTtNrbhMjfDC5ynbC3pCLgw29up2W', 'tot@gmail.com', 1, '2022-10-09 15:06:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`);

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
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
