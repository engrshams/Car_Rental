-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 06:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL DEFAULT 'Sedan',
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(11, 'Mitsubishi Mirage', 'Mitsubishi', 'Mitsubishi Mirage', 2024, 'Sedan', 3000.00, 1, 'http://localhost:8000/shared/images/17474434014406.jpg', '2025-05-16 07:23:02', '2025-05-16 18:56:42'),
(12, 'Mercedes-Benz E-Class', 'Mercedes-Benz', 'Mercedes-Benz E-Class', 2025, 'Sedan', 6000.00, 1, 'http://localhost:8000/shared/images/17474031464990.jpg', '2025-05-16 07:45:46', '2025-05-16 07:45:46'),
(13, 'Audi A5', 'Audi', 'Audi A5', 2025, 'Sedan', 5800.00, 0, 'http://localhost:8000/shared/images/17474483114346.jpg', '2025-05-16 07:46:27', '2025-05-16 20:34:35'),
(14, 'Tesla Model 3', 'Tesla', 'Tesla Model 3', 2025, 'Sedan', 3500.00, 1, 'http://localhost:8000/shared/images/17474034292826.jpg', '2025-05-16 07:50:29', '2025-05-16 07:50:29'),
(15, 'Acura Integra', 'Acura', 'Acura Integra', 2025, 'Sedan', 5000.00, 1, 'http://localhost:8000/shared/images/17474034652689.jpg', '2025-05-16 07:51:05', '2025-05-16 07:51:05'),
(16, 'Toyota Camry', 'Toyota', 'Toyota Camry', 2022, 'Sedan', 3000.00, 1, 'http://localhost:8000/shared/images/17474035049062.jpg', '2025-05-16 07:51:44', '2025-05-16 07:51:44'),
(17, 'Honda Civic', 'Honda', 'Honda Civic', 2024, 'Sedan', 3500.00, 1, 'http://localhost:8000/shared/images/17474035391962.jpg', '2025-05-16 07:52:19', '2025-05-16 07:52:19'),
(18, 'Nissan Versa', 'Nissan', 'Nissan Versa', 2025, 'Sedan', 3500.00, 1, 'http://localhost:8000/shared/images/17474035823675.jpg', '2025-05-16 07:53:02', '2025-05-16 07:53:02'),
(19, 'Chevrolet S-10 High Country', 'Chevrolet', 'Chevrolet S-10 High Country', 2025, 'Pickup', 4000.00, 1, 'http://localhost:8000/shared/images/17474039437053.jpg', '2025-05-16 07:59:03', '2025-05-16 07:59:03'),
(20, 'Mercedes exterior', 'Mercedes-Benz', 'Mercedes exterior', 2024, 'Hatchback', 6400.00, 1, 'http://localhost:8000/shared/images/17474039996463.jpg', '2025-05-16 07:59:59', '2025-05-16 07:59:59'),
(21, 'Toyota Corolla', 'Toyota', 'Toyota Corolla', 2022, 'Hatchback', 4000.00, 1, 'http://localhost:8000/shared/images/17474040344877.jpg', '2025-05-16 08:00:34', '2025-05-16 08:00:34'),
(22, 'Ford Focus', 'Ford', 'Ford Focus', 2022, 'Hatchback', 5500.00, 1, 'http://localhost:8000/shared/images/17474040707257.jpg', '2025-05-16 08:01:10', '2025-05-16 08:01:10'),
(23, 'Kia K4', 'Kia', 'Kia K4', 2025, 'Hatchback', 5500.00, 1, 'http://localhost:8000/shared/images/17474040994624.jpg', '2025-05-16 08:01:39', '2025-05-16 08:01:39'),
(24, 'BMW 1-series', 'BMW', 'BMW 1-series', 2025, 'Hatchback', 6200.00, 1, 'http://localhost:8000/shared/images/17474041291025.jpg', '2025-05-16 08:02:09', '2025-05-16 08:02:09'),
(25, 'Mercedes A-Class', 'Mercedes-Benz', 'Mercedes A-Class', 2024, 'Hatchback', 6200.00, 1, 'http://localhost:8000/shared/images/17474041581907.jpg', '2025-05-16 08:02:38', '2025-05-16 08:02:38'),
(26, 'Volkswagen Golf', 'Volkswagen', 'Volkswagen Golf', 2022, 'Hatchback', 5300.00, 1, 'http://localhost:8000/shared/images/17474041879542.jpg', '2025-05-16 08:03:07', '2025-05-16 08:03:07'),
(27, 'Hyundai Creta 1.5 turbo-petrol', 'Hyundai', 'Hyundai Creta 1.5 turbo-petrol', 2023, 'MPV', 5200.00, 1, 'http://localhost:8000/shared/images/17474042357755.jpg', '2025-05-16 08:03:55', '2025-05-16 08:03:55'),
(28, 'Maruti Suzuki Grand Vitara', 'Suzuki', 'Maruti Suzuki Grand Vitara', 2024, 'MPV', 3400.00, 1, 'http://localhost:8000/shared/images/17474042672128.jpg', '2025-05-16 08:04:27', '2025-05-16 08:04:27'),
(29, 'MG Gloster facelift', 'MG', 'MG Gloster facelift', 2024, 'MPV', 4500.00, 1, 'http://localhost:8000/shared/images/17474043093693.jpg', '2025-05-16 08:05:09', '2025-05-16 08:05:09'),
(30, 'Kia Carnival', 'Kia', 'Kia Carnival', 2024, 'MPV', 4700.00, 1, 'http://localhost:8000/shared/images/17474043403310.jpg', '2025-05-16 08:05:40', '2025-05-16 08:05:40'),
(31, 'Tata Safari 2.0 diesel', 'Tata', 'Tata Safari 2.0 diesel', 2025, 'MPV', 3800.00, 1, 'http://localhost:8000/shared/images/17474043708368.jpg', '2025-05-16 08:06:10', '2025-05-16 08:06:10'),
(32, 'Aston Martin Vantage', 'Aston', 'Aston Martin Vantage', 2025, 'SUV', 4200.00, 1, 'http://localhost:8000/shared/images/17474044322065.jpg', '2025-05-16 08:07:12', '2025-05-16 08:07:12'),
(33, 'Ford Bronco Sport', 'Ford', 'Ford Bronco Sport', 2025, 'SUV', 5500.00, 1, 'http://localhost:8000/shared/images/17474044724860.jpg', '2025-05-16 08:07:52', '2025-05-16 08:07:52'),
(34, 'Honda CR-V', 'Honda', 'Honda CR-V', 2025, 'SUV', 3800.00, 1, 'http://localhost:8000/shared/images/17474045036477.jpg', '2025-05-16 08:08:23', '2025-05-16 08:08:23'),
(35, 'Hyundai Tucson', 'Hyundai', 'Hyundai Tucson', 2025, 'SUV', 3200.00, 1, 'http://localhost:8000/shared/images/17474045294782.jpg', '2025-05-16 08:08:49', '2025-05-16 08:08:49'),
(36, 'Mazda CX-5', 'Mazda', 'Mazda CX-5', 2025, 'SUV', 5200.00, 1, 'http://localhost:8000/shared/images/17474045573694.jpg', '2025-05-16 08:09:17', '2025-05-16 08:09:17'),
(37, 'Volkswagen Tiguan', 'Volkswagen', 'Volkswagen Tiguan', 2024, 'SUV', 5400.00, 1, 'http://localhost:8000/shared/images/17474045939058.jpg', '2025-05-16 08:09:54', '2025-05-16 08:09:54'),
(38, 'Mercedes-AMG CLE53', 'Mercedes-Benz', 'Mercedes-AMG CLE53', 2024, 'Coupe', 5700.00, 1, 'http://localhost:8000/shared/images/17474046806602.jpg', '2025-05-16 08:11:20', '2025-05-16 08:11:20'),
(39, 'Porsche 718 Cayman', 'Porsche', 'Porsche 718 Cayman', 2024, 'Coupe', 5800.00, 1, 'http://localhost:8000/shared/images/17474047566563.jpg', '2025-05-16 08:12:36', '2025-05-16 08:12:36'),
(40, 'McLaren Artura', 'McLaren', 'McLaren Artura', 2022, 'Coupe', 4700.00, 1, 'http://localhost:8000/shared/images/17474048007641.jpg', '2025-05-16 08:13:20', '2025-05-16 08:13:20'),
(41, 'Aston Martin Vantage', 'Aston', 'Aston Martin Vantage', 2025, 'Coupe', 2025.00, 1, 'http://localhost:8000/shared/images/17474048359640.jpg', '2025-05-16 08:13:55', '2025-05-16 08:13:55'),
(42, 'BMW 2-Series', 'BMW', 'BMW 2-Series', 2024, 'Coupe', 5500.00, 1, 'http://localhost:8000/shared/images/17474054017736.jpg', '2025-05-16 08:23:21', '2025-05-16 08:23:21'),
(43, 'Subaru BRZ', 'Subaru', 'Subaru BRZ', 2025, 'Coupe', 4800.00, 1, 'http://localhost:8000/shared/images/17474054366814.jpg', '2025-05-16 08:23:56', '2025-05-16 08:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_add` varchar(255) DEFAULT NULL,
  `cus_state` varchar(255) DEFAULT NULL,
  `cus_city` varchar(255) DEFAULT NULL,
  `cus_postcode` varchar(255) DEFAULT NULL,
  `cus_country` varchar(255) DEFAULT NULL,
  `cus_phone` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_name`, `cus_add`, `cus_state`, `cus_city`, `cus_postcode`, `cus_country`, `cus_phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Engr. Shams', 'Shantinagar', 'Dhakas', 'Dhaka', '1100', 'Bangladesh', '01912528253', 1, NULL, '2025-05-09 07:44:37'),
(2, 'Engr. Suhaan', 'Shantinagar', 'Dhaka', 'Dhaka', '1100', 'Bangladesh', '01322830000', 2, NULL, '2025-05-03 01:10:31'),
(4, 'Dr. Rayaan', 'Shantinagar', 'Dhaka', 'Dhaka', '1100', 'Bangladesh', '01716666442', 3, NULL, '2025-05-16 20:25:16'),
(5, 'zoom b', 'dhaka', 'dhaks', 'ddinajpur', '1201', 'Bangladesh', '12345678901', 4, '2025-05-17 17:25:11', '2025-05-18 10:21:15'),
(6, 'zoom', '123', 'dhaka', 'dhaka', '1100', 'bangladesh', '1234', 5, '2025-05-18 10:26:26', '2025-05-18 10:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_01_164553_create_customers_table', 1),
(5, '2025_05_01_164557_create_cars_table', 1),
(6, '2025_05_01_164604_create_rentals_table', 1),
(7, '2025_05_02_144430_create_sliders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Booked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `customer_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(59, 2, 12, '2025-05-23', '2025-05-30', 48000.00, 'Cancelled', '2025-05-16 08:30:25', '2025-05-16 20:26:35'),
(92, 4, 11, '2025-05-18', '2025-05-20', 9000.00, 'Booked', '2025-05-17 19:04:30', '2025-05-17 19:04:30'),
(93, 2, 15, '2025-05-19', '2025-05-20', 10000.00, 'Completed', '2025-05-17 19:06:04', '2025-05-17 20:21:53'),
(94, 2, 15, '2025-05-27', '2025-05-31', 25000.00, 'Booked', '2025-05-17 19:06:23', '2025-05-17 19:06:23'),
(95, 2, 20, '2025-05-28', '2025-06-07', 70400.00, 'Completed', '2025-05-17 20:10:25', '2025-05-18 10:20:34'),
(96, 2, 25, '2025-05-20', '2025-05-23', 24800.00, 'Booked', '2025-05-17 20:25:20', '2025-05-17 20:25:20'),
(97, 2, 20, '2025-05-27', '2025-05-27', 6400.00, 'Booked', '2025-05-18 09:16:08', '2025-05-18 09:16:08'),
(98, 2, 30, '2025-05-20', '2025-05-29', 47000.00, 'Cancelled', '2025-05-18 09:54:12', '2025-05-18 10:24:26'),
(99, 2, 30, '2025-06-25', '2025-06-28', 18800.00, 'Cancelled', '2025-05-18 09:54:42', '2025-05-18 10:34:12'),
(100, 2, 24, '2025-05-27', '2025-05-29', 18600.00, 'Booked', '2025-05-18 10:21:55', '2025-05-18 10:21:55'),
(101, 2, 24, '2025-05-31', '2025-05-31', 6200.00, 'Booked', '2025-05-18 10:23:40', '2025-05-18 10:23:40'),
(102, 2, 29, '2025-05-29', '2025-06-07', 45000.00, 'Booked', '2025-05-18 10:25:17', '2025-05-18 10:25:17'),
(103, 2, 42, '2025-06-18', '2025-06-19', 11000.00, 'Booked', '2025-05-18 10:31:29', '2025-05-18 10:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cI53PVj0hWTUuZ7kK8QDotwpK3HeztQeZ4fN3FbM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnVXOTFUVkVTZVN1aDdpTnBkZE5aZFpQV1VQUlZ6UVh4WjRpUXZYNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZW50YWxzIjt9fQ==', 1747584943),
('Og9uqG8wbyIQlbCByzSn79pzfbrzJ1O10zmJa0Fs', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS09BclBXU0NEcmFzR1FFR3FaanBxeW1zS21MVzNNM1lialhKcDhhSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXIvNDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vY2Fycy9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1747586057);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `active`, `created_at`, `updated_at`) VALUES
(8, 'http://localhost:8000/shared/images/1747405577.jpg', 1, '2025-05-16 08:26:17', '2025-05-16 08:26:17'),
(9, 'http://localhost:8000/shared/images/1747405593.jpg', 1, '2025-05-16 08:26:33', '2025-05-16 08:26:33'),
(10, 'http://localhost:8000/shared/images/1747405607.jpg', 1, '2025-05-16 08:26:47', '2025-05-16 08:26:47'),
(11, 'http://localhost:8000/shared/images/1747405619.jpg', 1, '2025-05-16 08:26:59', '2025-05-16 08:26:59'),
(12, 'http://localhost:8000/shared/images/1747405630.jpg', 1, '2025-05-16 08:27:10', '2025-05-16 08:27:10'),
(13, 'http://localhost:8000/shared/images/1747405649.jpg', 1, '2025-05-16 08:27:29', '2025-05-16 08:27:29'),
(14, 'http://localhost:8000/shared/images/1747405662.jpg', 1, '2025-05-16 08:27:42', '2025-05-16 08:27:42'),
(15, 'http://localhost:8000/shared/images/1747405680.jpg', 0, '2025-05-16 08:28:00', '2025-05-18 10:20:53'),
(16, 'http://localhost:8000/shared/images/1747405693.jpg', 1, '2025-05-16 08:28:13', '2025-05-16 08:28:13'),
(17, 'http://localhost:8000/shared/images/1747405704.jpg', 0, '2025-05-16 08:28:24', '2025-05-16 20:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `otp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'zoom.a.bteb@gmail.com', '$2y$12$6F4/f9tnUX05VmwjLhdzTu9m6V/gLt2Rs92u4Z5XUQbyZPizHC3DO', NULL, 'admin', '2025-05-01 20:05:32', '2025-05-09 07:44:08'),
(2, 'engr.shams@yahoo.com', '$2y$12$6F4/f9tnUX05VmwjLhdzTu9m6V/gLt2Rs92u4Z5XUQbyZPizHC3DO', NULL, 'customer', NULL, '2025-05-10 12:09:42'),
(3, 'engr.sams@gmail.com', '$2y$12$Io7dK42MMboINp5ZQjjWOOpjROLs52gud9YCNuWHZpDVsoWTg3Nwu', NULL, 'customer', '2025-05-10 17:41:04', '2025-05-10 17:41:04'),
(4, 'zoom.b.bteb@gmail.com', '$2y$12$ypn7/TOdWuA082arBU2p9e3PcKXPic7APkgRh052ZsfUh1R3eSkxi', NULL, 'customer', '2025-05-17 17:25:11', '2025-05-17 20:24:53'),
(5, 'zoom.c.bteb@gmail.com', '$2y$12$Leeh8bABCmSGW9YQCBdw3.IfJdLRAgRKEtUCleisxaAQFdi3UsOxq', NULL, 'customer', '2025-05-18 10:26:26', '2025-05-18 10:26:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_customer_id_foreign` (`customer_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
