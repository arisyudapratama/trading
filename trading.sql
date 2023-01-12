-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 02:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_flows`
--

CREATE TABLE `cash_flows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashflow` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_flows`
--

INSERT INTO `cash_flows` (`id`, `user_id`, `tanggal`, `cashflow`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-07-23', 1000000, 'Deposit', '2022-07-23 02:52:34', '2022-07-23 02:52:34'),
(2, 4, '2022-07-23', 1000000, 'Deposit', '2022-07-23 02:56:58', '2022-07-23 02:56:58'),
(3, 4, '2022-07-23', 1000000, 'Deposit', '2022-07-23 02:57:31', '2022-07-23 02:57:31'),
(4, 4, '2022-07-23', 100000, 'Deposit', '2022-07-23 02:57:52', '2022-07-23 02:57:52'),
(5, 4, '2022-07-23', 500000, 'Withdrawal', '2022-07-23 03:08:38', '2022-07-23 03:08:38'),
(6, 4, '2022-07-23', 700000, 'Withdrawal', '2022-07-23 04:48:04', '2022-07-23 04:48:04'),
(7, 4, '2022-07-23', 1000000, 'Deposit', '2022-07-23 04:48:48', '2022-07-23 04:48:48'),
(8, 4, '2022-07-23', 100000, 'Withdrawal', '2022-07-23 04:59:00', '2022-07-23 04:59:00'),
(9, 4, '2022-07-23', 100000, 'Withdrawal', '2022-07-23 05:03:49', '2022-07-23 05:03:49'),
(10, 4, '2022-07-23', 700000, 'Withdrawal', '2022-07-23 05:06:37', '2022-07-23 05:06:37'),
(11, 4, '2022-07-23', 1000000, 'Deposit', '2022-07-23 05:07:54', '2022-07-23 05:07:54'),
(12, 4, '2022-07-23', 100000, 'Withdrawal', '2022-07-23 05:08:25', '2022-07-23 05:08:25'),
(13, 4, '2022-07-23', 900000, 'Withdrawal', '2022-07-23 05:08:41', '2022-07-23 05:08:41'),
(14, 4, '2022-07-25', 1000000, 'Deposit', '2022-07-25 03:39:31', '2022-07-25 03:39:31'),
(15, 4, '2022-07-25', 1000000, 'Withdrawal', '2022-07-25 03:40:04', '2022-07-25 03:40:04'),
(16, 4, '2022-08-31', 10000000, 'Deposit', '2022-08-31 02:45:30', '2022-08-31 02:45:30'),
(17, 4, '2022-08-31', 10000000, 'Withdrawal', '2022-08-31 02:45:55', '2022-08-31 02:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materais`
--

CREATE TABLE `materais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot` int(11) NOT NULL,
  `transaksi` bigint(20) NOT NULL,
  `gain_loss_persen` double(8,2) DEFAULT NULL,
  `gain_loss_nominal` bigint(20) DEFAULT NULL,
  `net_profit` bigint(20) DEFAULT NULL,
  `materai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materais`
--

INSERT INTO `materais` (`id`, `user_id`, `tanggal`, `lot`, `transaksi`, `gain_loss_persen`, `gain_loss_nominal`, `net_profit`, `materai`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-18', 866, 13108400, 10.00, 0, NULL, 10000, '2022-07-15 21:28:42', '2022-07-18 18:33:21'),
(2, 1, '2022-07-19', 488, 275744000, 10.00, 0, NULL, 10000, '2022-07-15 21:28:42', '2022-07-19 13:39:59'),
(3, 1, '2022-07-16', 160, 10080000, 10.00, 0, NULL, 10000, '2022-07-15 21:28:42', '2022-07-15 21:28:42'),
(4, 1, '2022-07-19', 80, 7120000, NULL, NULL, NULL, 0, '2022-07-18 17:21:39', '2022-07-18 17:21:39'),
(5, 1, '2022-07-19', 90, 810000, NULL, NULL, NULL, 0, '2022-07-18 17:22:54', '2022-07-18 17:22:54'),
(6, 1, '2022-08-01', 1365, 4716191000, NULL, NULL, NULL, 10000, '2022-07-18 18:34:01', '2022-07-18 18:49:36'),
(7, 1, '2022-08-02', 144, 970510000, NULL, NULL, NULL, 10000, '2022-07-18 18:37:03', '2022-07-18 18:50:03'),
(8, 1, '2022-07-20', 300, 26000000, NULL, NULL, NULL, 10000, '2022-07-19 13:54:35', '2022-07-19 13:56:05'),
(9, 1, '2022-07-21', 800, 720000000, NULL, NULL, NULL, 10000, '2022-07-19 14:00:33', '2022-07-19 14:00:33'),
(10, 1, '2022-07-22', 2000, 878000000, 71.11, 98000000, NULL, 10000, '2022-07-19 14:00:51', '2022-07-19 14:02:39'),
(11, 4, '2022-07-25', 179, 15210000, NULL, NULL, NULL, 10000, '2022-07-25 05:48:50', '2022-07-25 05:53:32'),
(12, 4, '2022-07-26', 179, 17810000, 34.86, 2600000, 1711190, 10000, '2022-07-25 05:49:20', '2022-07-25 05:53:45'),
(13, 4, '2022-08-23', 100, 30000000, NULL, NULL, NULL, 10000, '2022-08-23 08:14:53', '2022-08-23 08:14:53'),
(14, 4, '2022-08-24', 100, 31000000, 3.33, 1000000, 877500, 10000, '2022-08-23 08:15:02', '2022-08-23 08:15:02'),
(15, 4, '2022-08-31', 20, 1999000, -100.05, -2001000, -2003998, 0, '2022-08-31 02:43:11', '2022-08-31 02:43:48'),
(16, 4, '2022-12-17', 392, 49496200, -93.85, 2656200, 2620199, 10000, '2022-12-17 03:33:51', '2022-12-17 04:57:32');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_06_14_034357_trading_styles_table', 1),
(13, '2022_06_21_041943_create_trades_table', 1),
(14, '2022_07_15_130143_create_materais_table', 1),
(15, '2022_07_22_143525_create_cash_flows_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ituliveacademy@gmail.com', '$2y$10$nPmc8zcEKVK/U8vuEILnO.pTl25q2FvPm37FjT8Q1y2vXvYmE5iZW', '2022-07-21 07:20:02'),
('aris@gmail.com', '$2y$10$bKAuHo1m74qwtnqjNeTrc.6yyhu1KESrlmCVtetPKVU1tyFqxw7tq', '2022-07-21 07:38:08'),
('yuda@gmail.com', '$2y$10$9.85gR2Tj0M72wEWu6.44uJ3zFzooSCrFbNtA/NcUyyXDz74lcEby', '2022-07-21 07:39:02');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trade_id` bigint(20) UNSIGNED NOT NULL,
  `kode_saham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_beli` bigint(20) NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `tanggal_jual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_jual` bigint(20) DEFAULT NULL,
  `gain_loss_persen` double(8,2) DEFAULT NULL,
  `gain_loss_nominal` bigint(20) DEFAULT NULL,
  `jangka_waktu` int(11) DEFAULT NULL,
  `fee_beli` bigint(20) NOT NULL,
  `fee_jual` bigint(20) DEFAULT NULL,
  `net_beli` bigint(20) NOT NULL,
  `net_jual` bigint(20) DEFAULT NULL,
  `net_profit` bigint(20) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`id`, `user_id`, `trade_id`, `kode_saham`, `lot`, `harga_beli`, `tanggal_beli`, `nominal_beli`, `harga_jual`, `tanggal_jual`, `nominal_jual`, `gain_loss_persen`, `gain_loss_nominal`, `jangka_waktu`, `fee_beli`, `fee_jual`, `net_beli`, `net_jual`, `net_profit`, `fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ANTM', 80, 600, '2022-07-16', 4800000, 660, '2022-07-16', 5280000, 10.00, 480000, 0, 7200, 13200, 4807200, 5266800, 459600, 20400, 'selesai', '2022-07-15 21:19:20', '2022-07-15 21:19:39'),
(2, 1, 1, 'TLKM', 88, 800, '2022-07-18', 7040000, 880, '2022-07-19', 7744000, 10.00, 704000, 1, 10560, 19360, 7050560, 7724640, 674080, 29920, 'selesai', '2022-07-15 21:20:17', '2022-07-15 21:20:33'),
(3, 1, 1, 'ADMR', 300, 2000, '2022-07-18', 60000000, 2200, '2022-07-19', 66000000, 10.00, 6000000, 1, 90000, 165000, 60090000, 65835000, 5745000, 255000, 'selesai', '2022-07-15 21:29:43', '2022-07-15 21:30:02'),
(4, 1, 1, 'HRUM', 10, 6000, '2022-07-20', 6000000, 6600, '2022-07-22', 6600000, 10.00, 600000, 2, 9000, 16500, 6009000, 6583500, 574500, 25500, 'selesai', '2022-07-15 21:50:10', '2022-07-15 21:52:42'),
(5, 1, 1, 'PUCUK', 4, 900, '2022-07-18', 360000, 1000, '2022-07-18', 400000, 11.11, 40000, 0, 540, 1000, 360540, 399000, 38460, 1540, 'selesai', '2022-07-18 09:24:55', '2022-07-18 16:28:29'),
(6, 1, 1, 'HR', 10, 100, '2022-07-18', 100000, 90, '2022-07-19', 90000, -10.00, -10000, 1, 150, 225, 100150, 89775, -10375, 375, 'selesai', '2022-07-18 16:48:16', '2022-07-18 17:17:43'),
(7, 1, 1, 'HH', 123, 90, '2022-07-18', 1107000, 90, '2022-07-19', 1107000, 0.00, 0, 1, 1661, 2768, 1108661, 1104233, -4429, 4429, 'selesai', '2022-07-18 16:54:26', '2022-07-18 17:18:14'),
(8, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-19', 720000, -85.00, -4080000, 1, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 16:59:16', '2022-07-18 17:17:58'),
(9, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-19', 720000, -85.00, -4080000, 1, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 16:59:44', '2022-07-18 17:18:34'),
(10, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-19', 720000, -85.00, -4080000, 1, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 17:13:20', '2022-07-18 17:18:49'),
(11, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-07', 720000, -85.00, -4080000, 11, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 17:14:30', '2022-07-18 17:19:02'),
(12, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-23', 720000, -85.00, -4080000, 5, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 17:15:13', '2022-07-18 17:19:16'),
(13, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-08-02', 720000, -85.00, -4080000, 15, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 17:15:18', '2022-07-18 17:19:33'),
(14, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 90, '2022-07-14', 720000, -85.00, -4080000, 4, 7200, 1800, 4807200, 718200, -4089000, 9000, 'selesai', '2022-07-18 17:15:57', '2022-07-18 17:19:47'),
(15, 1, 1, 'YY', 80, 600, '2022-07-18', 4800000, 890, '2022-07-22', 7120000, 48.33, 2320000, 4, 7200, 17800, 4807200, 7102200, 2295000, 25000, 'selesai', '2022-07-18 17:16:35', '2022-07-18 17:20:00'),
(16, 1, 1, 'JI', 80, 890, '2022-07-19', 7120000, 90, '2022-07-19', 720000, -89.89, -6400000, 0, 10680, 1800, 7130680, 718200, -6412480, 12480, 'selesai', '2022-07-18 17:20:18', '2022-07-18 17:22:37'),
(17, 1, 1, 'JI', 80, 890, '2022-07-19', 7120000, 90, '2022-07-21', 720000, -89.89, -6400000, 2, 10680, 1800, 7130680, 718200, -6412480, 12480, 'selesai', '2022-07-18 17:21:39', '2022-07-18 17:21:53'),
(18, 1, 1, 'II', 90, 90, '2022-07-19', 810000, 89, '2022-07-19', 801000, -1.11, -9000, 0, 1215, 2003, 811215, 798998, -12218, 3218, 'selesai', '2022-07-18 17:22:54', '2022-07-18 17:26:06'),
(19, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 34, '0003-03-31', 6800, 0.00, 0, 737535, 10, 17, 6810, 6783, -27, 27, 'selesai', '2022-07-18 17:26:17', '2022-07-18 17:32:33'),
(20, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 3, '3243-03-04', 600, -91.18, -6200, 445824, 10, 2, 6810, 599, -6212, 12, 'selesai', '2022-07-18 17:27:43', '2022-07-18 17:32:48'),
(21, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 324, '3234-03-04', 64800, 852.94, 58000, 442537, 10, 162, 6810, 64638, 57828, 172, 'selesai', '2022-07-18 17:28:05', '2022-07-18 17:33:04'),
(22, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 7, '0098-09-09', 1400, -79.41, -5400, 702674, 10, 4, 6810, 1397, -5414, 14, 'selesai', '2022-07-18 17:29:14', '2022-07-18 17:33:16'),
(23, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 7, '0008-08-09', 1400, -79.41, -5400, 735577, 10, 4, 6810, 1397, -5414, 14, 'selesai', '2022-07-18 17:30:14', '2022-07-18 17:33:27'),
(24, 1, 1, 'YU', 2, 34, '2022-07-19', 6800, 76, '0789-09-08', 15200, 123.53, 8400, 450293, 10, 38, 6810, 15162, 8352, 48, 'selesai', '2022-07-18 17:30:39', '2022-07-18 17:33:37'),
(25, 1, 1, 'ATI', 80, 80, '2022-08-01', 640000, 786, '0778-09-08', 6288000, 882.50, 5648000, 454324, 960, 15720, 640960, 6272280, 5631320, 16680, 'selesai', '2022-07-18 17:31:32', '2022-07-18 17:33:46'),
(26, 1, 1, 'ATI', 80, 80, '2022-08-01', 640000, 75, '275760-07-06', 600000, -6.25, -40000, 13854, 960, 1500, 640960, 598500, -42460, 2460, 'selesai', '2022-07-18 17:31:48', '2022-07-18 17:33:57'),
(27, 1, 1, 'TMAX', 100, 8000, '2022-07-19', 80000000, 9000, '2022-07-19', 90000000, 12.50, 10000000, 0, 120000, 225000, 80120000, 89775000, 9655000, 345000, 'selesai', '2022-07-19 13:28:38', '2022-07-19 13:30:10'),
(28, 1, 1, 'XMAX', 100, 9000, '2022-07-19', 90000000, 10000, '2022-07-19', 100000000, 11.11, 10000000, 0, 135000, 250000, 90135000, 99750000, 9615000, 385000, 'selesai', '2022-07-19 13:30:58', '2022-07-19 13:31:17'),
(29, 1, 1, 'GZCO', 100, 800, '2022-07-19', 8000000, 900, '2022-07-20', 9000000, 12.50, 1000000, 1, 12000, 22500, 8012000, 8977500, 965500, 34500, 'selesai', '2022-07-19 13:39:59', '2022-07-19 13:52:27'),
(30, 1, 1, 'XSIS', 100, 800, '2022-07-20', 8000000, 900, '2022-07-20', 9000000, 12.50, 1000000, 0, 12000, 22500, 8012000, 8977500, 965500, 34500, 'selesai', '2022-07-19 13:55:42', '2022-07-19 13:56:04'),
(31, 1, 1, 'TIKI', 800, 9000, '2022-07-21', 720000000, 10000, '2022-07-22', 800000000, 11.11, 80000000, 1, 1080000, 2000000, 721080000, 798000000, 76920000, 3080000, 'selesai', '2022-07-19 14:00:33', '2022-07-19 14:00:51'),
(32, 1, 1, 'AGAR', 600, 500, '2022-07-22', 30000000, 800, '2022-07-22', 48000000, 60.00, 18000000, 0, 45000, 120000, 30045000, 47880000, 17835000, 165000, 'selesai', '2022-07-19 14:02:25', '2022-07-19 14:02:39'),
(33, 4, 4, 'ATAM', 89, 900, '2022-07-25', 8010000, 1000, '2022-07-26', 8900000, 11.11, 890000, 1, 12015, 22250, 8022015, 8877750, 855735, 34265, 'selesai', '2022-07-25 05:48:50', '2022-07-25 05:49:20'),
(34, 4, 4, 'ADA', 90, 800, '2022-07-25', 7200000, 990, '2022-07-26', 8910000, 23.75, 1710000, 1, 10800, 22275, 7210800, 8887725, 1676925, 33075, 'selesai', '2022-07-25 05:53:32', '2022-07-25 05:53:45'),
(35, 4, 4, 'ITMG', 100, 3000, '2022-08-23', 30000000, 3100, '2022-08-24', 31000000, 3.33, 1000000, 1, 45000, 77500, 30045000, 30922500, 877500, 122500, 'selesai', '2022-08-23 08:14:53', '2022-08-23 08:15:02'),
(36, 4, 4, 'BRIS', 10, 2000, '2022-08-31', 2000000, -1, '2022-08-31', -1000, -100.05, -2001000, 0, 3000, -3, 2003000, -998, -2003998, 2998, 'selesai', '2022-08-31 02:43:10', '2022-08-31 02:43:48'),
(37, 4, 4, 'ANTM', 10, 200, '2022-12-17', 200000, 123, '2022-12-17', 123000, -38.50, -77000, 0, 300, 308, 200300, 122693, -77608, 608, 'selesai', '2022-12-17 03:33:51', '2022-12-17 03:41:30'),
(39, 4, 4, 'ADNTOM', 80, 890, '2022-12-17', 7120000, 1234, '2022-12-17', 9872000, 38.65, 2752000, 0, 10680, 24680, 7130680, 9847320, 2716640, 35360, 'selesai', '2022-12-17 04:16:03', '2022-12-17 04:39:04'),
(40, 4, 4, 'BBRI', 1, 200, '2022-12-17', 20000, 12, '2022-12-17', 1200, -94.00, -18800, 0, 30, 3, 20030, 1197, -18833, 33, 'selesai', '2022-12-17 04:41:34', '2022-12-17 04:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `trading_styles`
--

CREATE TABLE `trading_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `modal` bigint(20) DEFAULT NULL,
  `resiko_per_transaksi` bigint(20) DEFAULT NULL,
  `resiko_per_transaksi_persentase` double(8,2) DEFAULT NULL,
  `risk_reward_ratio` bigint(20) DEFAULT NULL,
  `cut_los` double(8,2) DEFAULT NULL,
  `target_profit` bigint(20) DEFAULT NULL,
  `maksimal_pembelian` bigint(20) DEFAULT NULL,
  `fee_broker_beli` double(8,2) NOT NULL,
  `fee_broker_jual` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trading_styles`
--

INSERT INTO `trading_styles` (`id`, `user_id`, `modal`, `resiko_per_transaksi`, `resiko_per_transaksi_persentase`, `risk_reward_ratio`, `cut_los`, `target_profit`, `maksimal_pembelian`, `fee_broker_beli`, `fee_broker_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 160811132, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-15 21:18:50', '2022-07-19 14:02:39'),
(2, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-20 07:15:54', '2022-07-20 07:15:54'),
(3, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-21 05:44:38', '2022-07-21 05:44:38'),
(4, 4, 3976363, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-21 06:14:24', '2022-12-17 04:41:46'),
(5, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-22 04:23:09', '2022-07-22 04:23:09'),
(6, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 0.25, '2022-07-22 04:25:26', '2022-07-22 04:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aris', 'aris@gmail.com', NULL, '$2y$10$X8r6vrJUCvzFegWHmBhi.eh9EzXceZKvOsmCqe7M5A4vtPGvJ5.JO', NULL, '2022-07-15 21:18:49', '2022-07-15 21:18:49'),
(2, 'yuda', 'yuda@gmail.com', NULL, '$2y$10$b9iPSrXDuwAXC/9547kV5.hwgkIeVFxUXUKLU4VIpod4H0LpijI.G', NULL, '2022-07-20 07:15:54', '2022-07-20 07:15:54'),
(3, 'tes@gmail.com', 'tes@gmail.com', NULL, '$2y$10$qTJDpm9ZhDjBNJNeOKVUte9A1FHv3deJYGql4RLQh0OGlXzXRFskO', NULL, '2022-07-21 05:44:38', '2022-07-21 05:44:38'),
(4, 'ulive', 'ituliveacademy@gmail.com', '2022-07-22 07:30:07', '$2y$10$hND7.xOOWnwu9ApfpIdFu.Pi90NjJvCqbLyRAxmgXglOrW7kdgEdm', NULL, '2022-07-21 06:14:24', '2022-07-22 07:30:07'),
(5, 'ari@gmail.com', 'ari@gmail.com', NULL, '$2y$10$6CBRQjnbSLDFoYfQgLl2F.QtYYyOrYNsapE2zj8eRWIwRmL.R3j6a', NULL, '2022-07-22 04:23:04', '2022-07-22 04:23:04'),
(6, 'arisyp269@gmail.com', 'arisyp269@gmail.com', '2022-07-22 04:26:17', '$2y$10$DwOsgHUSSi6FnWsaUjZ2lewl2WaoJPf8Hatp8I4W3ZDzOFx6gbGLy', NULL, '2022-07-22 04:25:22', '2022-07-22 04:26:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_flows`
--
ALTER TABLE `cash_flows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_flows_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materais`
--
ALTER TABLE `materais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materais_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trades_user_id_foreign` (`user_id`),
  ADD KEY `trades_trade_id_foreign` (`trade_id`);

--
-- Indexes for table `trading_styles`
--
ALTER TABLE `trading_styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trading_styles_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `cash_flows`
--
ALTER TABLE `cash_flows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materais`
--
ALTER TABLE `materais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trading_styles`
--
ALTER TABLE `trading_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_flows`
--
ALTER TABLE `cash_flows`
  ADD CONSTRAINT `cash_flows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `materais`
--
ALTER TABLE `materais`
  ADD CONSTRAINT `materais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `trades_trade_id_foreign` FOREIGN KEY (`trade_id`) REFERENCES `trading_styles` (`id`),
  ADD CONSTRAINT `trades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trading_styles`
--
ALTER TABLE `trading_styles`
  ADD CONSTRAINT `trading_styles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
