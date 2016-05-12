-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 12:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylover`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `totalPay` int(11) NOT NULL,
  `deadLine` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `type`, `name`, `icon`, `updated_at`, `created_at`) VALUES
(1220, 15, '1', 'Thưởng', '44.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1221, 15, '1', 'Tiền lãi', '22.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1222, 15, '1', 'Lương', '4.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1223, 15, '1', 'Đươc tặng', '48.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1224, 15, '1', 'Bán đồ', '56.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1225, 15, '1', 'Khoản thu khác', '16.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1226, 15, '2', 'Ăn uống', '27.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1227, 15, '2', 'Di chuyển', '30.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1228, 15, '2', 'Mua sắm', '6.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1229, 15, '2', 'Yêu & Bạn bè', '20.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1230, 15, '2', 'Giải trí', '10.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1231, 15, '2', 'Du lịch', '1.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1232, 15, '2', 'Sức khỏe', '33.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1233, 15, '2', 'Tặng quà', '73.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1234, 15, '2', 'Gia đình', '26.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1235, 15, '2', 'Giáo dục', '62.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1236, 15, '2', 'Đầu tư', '32.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1237, 15, '2', 'Bảo hiểm', '34.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(1238, 15, '2', 'Khoản chi khác', '74.png', '2016-05-12 12:28:26', '2016-05-12 12:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `default_categories`
--

CREATE TABLE `default_categories` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_categories`
--

INSERT INTO `default_categories` (`id`, `type`, `name`, `icon`) VALUES
(1, '1', 'Thưởng', '44.png'),
(2, '1', 'Tiền lãi', '22.png'),
(3, '1', 'Lương', '4.png'),
(4, '1', 'Đươc tặng', '48.png'),
(5, '1', 'Bán đồ', '56.png'),
(6, '1', 'Khoản thu khác', '16.png'),
(7, '2', 'Ăn uống', '27.png'),
(8, '2', 'Di chuyển', '30.png'),
(9, '2', 'Mua sắm', '6.png'),
(10, '2', 'Yêu & Bạn bè', '20.png'),
(11, '2', 'Giải trí', '10.png'),
(12, '2', 'Du lịch', '1.png'),
(13, '2', 'Sức khỏe', '33.png'),
(14, '2', 'Tặng quà', '73.png'),
(15, '2', 'Gia đình', '26.png'),
(16, '2', 'Giáo dục', '62.png'),
(17, '2', 'Đầu tư', '32.png'),
(18, '2', 'Bảo hiểm', '34.png'),
(19, '2', 'Khoản chi khác', '74.png');

-- --------------------------------------------------------

--
-- Table structure for table `default_wallets`
--

CREATE TABLE `default_wallets` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `default_wallets`
--

INSERT INTO `default_wallets` (`id`, `name`, `icon`) VALUES
(1, 'Tiền mặt', '44.png'),
(2, 'TK Ngân Hàng', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `iconName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `iconName`, `created_at`, `updated_at`) VALUES
(1, '1.png', NULL, NULL),
(2, '2.png', NULL, NULL),
(3, '3.png', NULL, NULL),
(4, '4.png', NULL, NULL),
(5, '5.png', NULL, NULL),
(6, '6.png', NULL, NULL),
(7, '7.png', NULL, NULL),
(8, '8.png', NULL, NULL),
(9, '9.png', NULL, NULL),
(10, '10.png', NULL, NULL),
(11, '11.png', NULL, NULL),
(12, '12.png', NULL, NULL),
(13, '13.png', NULL, NULL),
(14, '14.png', NULL, NULL),
(15, '15.png', NULL, NULL),
(16, '16.png', NULL, NULL),
(17, '17.png', NULL, NULL),
(18, '18.png', NULL, NULL),
(19, '19.png', NULL, NULL),
(20, '20.png', NULL, NULL),
(21, '21.png', NULL, NULL),
(22, '22.png', NULL, NULL),
(23, '23.png', NULL, NULL),
(24, '24.png', NULL, NULL),
(25, '25.png', NULL, NULL),
(26, '26.png', NULL, NULL),
(27, '27.png', NULL, NULL),
(28, '28.png', NULL, NULL),
(29, '29.png', NULL, NULL),
(30, '30.png', NULL, NULL),
(31, '31.png', NULL, NULL),
(32, '32.png', NULL, NULL),
(33, '33.png', NULL, NULL),
(34, '34.png', NULL, NULL),
(35, '35.png', NULL, NULL),
(36, '36.png', NULL, NULL),
(37, '37.png', NULL, NULL),
(38, '38.png', NULL, NULL),
(39, '39.png', NULL, NULL),
(40, '40.png', NULL, NULL),
(41, '41.png', NULL, NULL),
(42, '42.png', NULL, '0000-00-00 00:00:00'),
(43, '43.png', NULL, NULL),
(44, '44.png', NULL, NULL),
(45, '45.png', NULL, NULL),
(46, '46.png', NULL, NULL),
(47, '47.png', NULL, NULL),
(48, '48.png', NULL, NULL),
(49, '49.png', NULL, NULL),
(50, '50.png', NULL, NULL),
(51, '51.png', NULL, NULL),
(52, '52.png', NULL, NULL),
(53, '53.png', NULL, NULL),
(54, '54.png', NULL, NULL),
(55, '55.png', NULL, NULL),
(56, '56.png', NULL, NULL),
(57, '57.png', NULL, NULL),
(58, '58.png', NULL, NULL),
(59, '59.png', NULL, NULL),
(60, '60.png', NULL, NULL),
(61, '61.png', NULL, NULL),
(62, '62.png', NULL, NULL),
(63, '63.png', NULL, NULL),
(64, '64.png', NULL, NULL),
(65, '65.png', NULL, NULL),
(66, '66.png', NULL, NULL),
(67, '67.png', NULL, NULL),
(68, '68.png', NULL, NULL),
(69, '69.png', NULL, NULL),
(70, '70.png', NULL, NULL),
(71, '71.png', NULL, NULL),
(72, '72.png', NULL, NULL),
(73, '73.png', NULL, NULL),
(74, '74.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_02_015717_create_bills_table', 2),
('2016_05_09_054812_create_wallets_table', 3),
('2016_05_09_060527_create_wallet_table', 4),
('2016_05_09_100806_create_transaction_table', 5),
('2016_05_11_185818_create_icon', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalMoney` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `totalMoney`, `date`, `note`, `user_id`, `wallet_id`, `created_at`, `updated_at`) VALUES
(8, 'Sức khỏe', 20000, '2016-05-14', 'Không có gì', 15, 6, '2016-05-12 13:31:49', '2016-05-12 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(11) DEFAULT NULL,
  `currency` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `sex`, `currency`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'Anavel', 'donglq_58@vnu.edu.vn', '$2y$10$oDl.g9sVDbU1nvvNHBIDluyUOJgqB04kHW4Dxigme4mOeIJzXRvcG', '', 1, 'vnd', NULL, '2016-05-12 12:28:23', '2016-05-12 12:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `name`, `icon`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Tiền mặt', '44.png', 15, '2016-05-12 12:28:26', '2016-05-12 12:28:26'),
(6, 'TK Ngân Hàng', '3.png', 15, '2016-05-12 12:28:26', '2016-05-12 12:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_categories`
--
ALTER TABLE `default_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_wallets`
--
ALTER TABLE `default_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1239;
--
-- AUTO_INCREMENT for table `default_categories`
--
ALTER TABLE `default_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `default_wallets`
--
ALTER TABLE `default_wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
