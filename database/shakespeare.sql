-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 09:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `first_name`, `last_name`, `company`, `address`, `postal_code`, `city`, `country`, `district`, `ward`, `phone_number`, `user_id`) VALUES
(3, 'a', 'a', 'a', 'a', 21, 'a', 'a', '', '', '2', 6),
(4, 'b', 'a', 'a', 'a', 12, 'd', 'd', '', '', '321312312', 6),
(5, 'Tuan', 'Nguyen Phan Anh', 'Sun', 'Lô 34, đường số 10 KĐT Lê Hồng Phong 2 phường Phước Hải', NULL, 'Tỉnh Khánh Hòa', NULL, 'Thành phố Cam Ranh', 'Phường Ba Ngòi', '0941974452', 9);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `publication_date` timestamp NULL DEFAULT NULL,
  `page_quantity` int(11) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `image`, `price`, `publisher_id`, `quantity`, `publication_date`, `page_quantity`, `isbn`, `created_at`, `updated_at`) VALUES
(2, 'Girlcrush', 'Given, Florence', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_133/5941623_1.jpg', 21, 2, 120, '2022-10-08 17:00:00', 60, '9781914240546', '2022-10-08 04:59:01', '2022-10-09 09:27:26'),
(3, 'Reeling', 'Lafon, Lola', 'An impassioned meditation on the consequences of sexual exploitation and the dead ends of forgiveness', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_135/6071546_1.jpg', 18, 3, 100, '2022-02-09 17:00:00', 192, '9781787703582', '2022-10-09 01:10:53', '2022-10-09 09:27:12'),
(6, 'Yoga', 'Carrere, Emmanuel', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_134/5993525_1.jpg', 23, 1, 14, '2022-06-01 17:00:00', 320, '9781787333215', '2022-10-09 09:29:04', '2022-10-09 09:29:04'),
(7, 'Slack-Tide', 'Dymott, Elanor', 'When two people meet is it need, fantasy or love? She meets Robert - exuberant, generous, apparently care-free - and they fall in love with breath-taking speed. Slack-tide tracks the ebbs and flows of the affair: passionate, coercive, intensely sexual.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_116/5210684_1.jpg', 18, 4, 23, '2019-01-16 17:00:00', 208, '9781787331129', '2022-10-09 09:33:04', '2022-10-09 09:33:04'),
(8, 'Friday on My Mind', 'French, Nicci', 'When a bloated corpse is found floating in the River Thames the police can at least sure that identifying the victim will be straightforward. Around the dead man\'s wrist is a hospital band. On it are the words Dr F Klein... But psychotherapist Frieda Klein is very much alive.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_116/5199367.jpg', 13, 1, 51, '2016-02-24 17:00:00', 464, '9781405918596', '2022-10-09 09:35:46', '2022-10-30 09:08:48'),
(9, 'Ulysses', 'Joyce, James', 'Loosely based on the Odyssey, this landmark of modern literature follows ordinary Dubliners in 1904. Capturing a single day in the life of Dubliner Leopold Bloom, his friends Buck Mulligan and Stephen Dedalus, his wife Molly, and a scintillating cast of supporting characters, Joyce pushes Celtic lyricism and vulgarity to splendid extremes. Captivating experimental techniques range from interior monologues to exuberant wordplay and earthy humor. A major achievement in 20th century literature.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_140/6288789.jpg', 27, 1, 3354343, '2022-01-26 17:00:00', 1040, '9780241552636', '2022-10-09 17:24:31', '2022-10-30 09:42:35'),
(10, 'Notes of a Native Son', 'Baldwin, James', 'In an age of Black Lives Matter, James Baldwin\'s essays on life in Harlem, the protest novel, movies, and African Americans abroad are as powerful today as when they were first written. With films like I Am Not Your Negro and the forthcoming If Beale Street Could Talk bringing renewed interest to Baldwin\'s life and work, Notes of a Native Son serves as a valuable introduction.\r\n\r\nWritten during the 1940s and early 1950s, when Baldwin was only in his twenties, the essays collected in Notes of a Native Son capture a view of black life and black thought at the dawn of the civil rights movement and as the movement slowly gained strength through the words of one of the most captivating essayists and foremost intellectuals of that era. Writing as an artist, activist, and social critic, Baldwin probes the complex condition of being black in America. With a keen eye, he examines everything from the significance of the protest novel to the motives and circumstances of the many black expatriates of the time, from his home in “The Harlem Ghetto” to a sobering “Journey to Atlanta.”\r\n\r\nNotes of a Native Son inaugurated Baldwin as one of the leading interpreters of the dramatic social changes erupting in the United States in the twentieth century, and many of his observations have proven almost prophetic. His criticism on topics such as the paternalism of white progressives or on his own friend Richard Wright’s work is pointed and unabashed. He was also one of the few writing on race at the time who addressed the issue with a powerful mixture of outrage at the gross physical and political violence against black citizens and measured understanding of their oppressors, which helped awaken a white audience to the injustices under their noses. Naturally, this combination of brazen criticism and unconventional empathy for white readers won Baldwin as much condemnation as praise.\r\n\r\nNotes is the book that established Baldwin’s voice as a social critic, and it remains one of his most admired works. The essays collected here create a cohesive sketch of black America and reveal an intimate portrait of Baldwin’s own search for identity as an artist, as a black man, and as an American.', 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_157/7033700.jpg', 14, 1, 123, '2017-01-11 17:00:00', 208, '9780241334003', '2022-10-09 17:34:38', '2022-10-09 17:34:38'),
(11, 'A Portrait Of The Artist As Young Man', 'Joyce, James', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_130/5811895.jpg', 22, 1, 188, '2022-05-09 17:00:00', 1000, '9780143124313', '2022-10-26 11:53:57', '2022-10-26 11:53:57'),
(12, 'We are all weird', 'Godin, Seth', NULL, 'https://s3.eu-west-3.amazonaws.com/nova-shakespeare-production/product/images_117/5259029_1.jpg', 13, 1, 12, '2015-07-22 17:00:00', 1111, '9780241209011', '2022-10-30 09:22:32', '2022-10-30 09:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company`, `full_name`, `address`, `city`, `ward`, `district`, `phone_number`, `total`, `status`, `user_id`) VALUES
(2, 'Sun', 'Tuan Nguyen Phan Anh', 'Lô 34, đường số 10 KĐT Lê Hồng Phong 2 phường Phước Hải', 'Tỉnh Khánh Hòa', 'Phường Ba Ngòi', 'Thành phố Cam Ranh', '0941974452', 23, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1, 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reset_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
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
(4, 'Vintage Publishing', NULL, NULL),
(5, 'Faber & Faber', '2022-10-30 09:27:17', '2022-10-30 09:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `email_verification_code` varchar(10) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `level`, `email_verification_code`, `email_verified_at`, `created_at`) VALUES
(5, 'User', '$2y$10$95S9U.wdH.4kmM.uCm3ZeuYPvRLbSAiQD9UPv4oeuQl7U1MMsJppS', 'user@user.com', 1, '0', '2023-05-31 07:03:55', '2022-10-09 22:41:01'),
(6, 'Anh Tuan', '$2y$10$dfeaAk/bIBfG.D7YTLqBMep4RExrRboBYEeDwvXebJbGpqokD5Aom', 'tuan@gmail.com', 1, '0', '2023-05-31 07:03:55', '2022-11-15 14:39:20'),
(9, 'KiuPhox', '$2y$10$iqdhG91AE6xeKKPMWAaHw.q7ghsG4HlWwdvQurkSKuXExaV3psKFK', 'admin@admin.com', 0, 'DXAftTX6am', '2023-05-31 07:03:55', '2023-05-31 07:02:55'),
(10, 'NoTa', '$2y$10$M3FvEwKYlZebccgI8QizKejxuoB2aK8JK7Jvjb6LM/uzKoxpsGk.S', 'tuan.nguyenphananh@gmail.com', 1, '3i4hQl1XVA', '2023-05-31 07:31:41', '2023-05-31 07:31:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
