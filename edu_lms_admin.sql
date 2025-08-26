-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2025 at 12:28 PM
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
-- Database: `edu_lms_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_actions_audit`
--

CREATE TABLE `admin_actions_audit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `target_type` varchar(255) DEFAULT NULL,
  `target_id` bigint(20) UNSIGNED DEFAULT NULL,
  `before_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`before_json`)),
  `after_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`after_json`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_actions_audit`
--

INSERT INTO `admin_actions_audit` (`id`, `admin_id`, `action`, `target_type`, `target_id`, `before_json`, `after_json`, `created_at`) VALUES
(1, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":null,\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755785094_1.jpg\\\",\\\"updated_at\\\":\\\"2025-08-21 14:04:55\\\"}\"', '2025-08-21 14:04:55'),
(2, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755785094_1.jpg\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-21T14:04:55.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755785451_1.png\\\",\\\"updated_at\\\":\\\"2025-08-21 14:10:51\\\"}\"', '2025-08-21 14:10:51'),
(3, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755785451_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-21T14:10:51.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755786105_1.jpg\\\",\\\"updated_at\\\":\\\"2025-08-21 14:21:45\\\"}\"', '2025-08-21 14:21:45'),
(4, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755786105_1.jpg\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-21T14:21:45.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755786116_1.png\\\",\\\"updated_at\\\":\\\"2025-08-21 14:21:56\\\"}\"', '2025-08-21 14:21:56'),
(5, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755786116_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-21T14:21:56.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755839612_1.png\\\",\\\"updated_at\\\":\\\"2025-08-22 05:13:33\\\"}\"', '2025-08-22 05:13:33'),
(6, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755839612_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T05:13:33.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755839833_1.png\\\",\\\"updated_at\\\":\\\"2025-08-22 05:17:13\\\"}\"', '2025-08-22 05:17:13'),
(7, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755839833_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T05:17:13.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755839921_1.png\\\",\\\"updated_at\\\":\\\"2025-08-22 05:18:41\\\"}\"', '2025-08-22 05:18:41'),
(8, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755839921_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T05:18:41.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1755844168_1.png\\\",\\\"updated_at\\\":\\\"2025-08-22 06:29:28\\\"}\"', '2025-08-22 06:29:28'),
(9, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755844168_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":null,\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T06:29:28.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"remember_token\\\":\\\"UtlwzrFKPEDvIolbMCUl7qXWOYnJJzRgFHZgkUKLuau2xcno1r0N1tnELksr\\\"}\"', '2025-08-25 04:33:58'),
(10, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755844168_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":\\\"UtlwzrFKPEDvIolbMCUl7qXWOYnJJzRgFHZgkUKLuau2xcno1r0N1tnELksr\\\",\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T06:29:28.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"remember_token\\\":\\\"zlU3A0dpLRrKbPFZcQiABncYRu5DKpTgdClHTUea3xAYgzmZRpkfrYLfRshe\\\"}\"', '2025-08-25 06:08:16'),
(11, 1, 'updated_user', 'App\\Models\\User', 1, '\"{\\\"id\\\":1,\\\"uuid\\\":\\\"a7c231fd-1838-4dc4-b7f9-f51fbd524c0b\\\",\\\"name\\\":\\\"Super Admin\\\",\\\"email\\\":\\\"dashboard@edulearn.local\\\",\\\"profile\\\":\\\"1755844168_1.png\\\",\\\"google_id\\\":null,\\\"email_verified_at\\\":null,\\\"phone_e164\\\":null,\\\"phone_verified_at\\\":null,\\\"password\\\":\\\"$2y$12$NjZ\\\\\\/nwbfH22g9L1\\\\\\/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W\\\",\\\"remember_token\\\":\\\"zlU3A0dpLRrKbPFZcQiABncYRu5DKpTgdClHTUea3xAYgzmZRpkfrYLfRshe\\\",\\\"locale\\\":\\\"de_DE\\\",\\\"timezone\\\":\\\"Europe\\\\\\/Berlin\\\",\\\"country_code\\\":\\\"DE\\\",\\\"date_of_birth\\\":null,\\\"marketing_opt_in\\\":false,\\\"legal_acceptance_version\\\":null,\\\"last_login_at\\\":null,\\\"last_login_ip\\\":null,\\\"created_by\\\":null,\\\"updated_by\\\":null,\\\"created_at\\\":\\\"2025-08-20T05:38:51.000000Z\\\",\\\"updated_at\\\":\\\"2025-08-22T06:29:28.000000Z\\\",\\\"deleted_at\\\":null}\"', '\"{\\\"profile\\\":\\\"1756102153_1.png\\\",\\\"updated_at\\\":\\\"2025-08-25 06:09:13\\\"}\"', '2025-08-25 06:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_targets`
--

CREATE TABLE `announcement_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` char(36) NOT NULL,
  `role` enum('student','dashboard','instructor') DEFAULT NULL,
  `segment_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`segment_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_clients`
--

CREATE TABLE `api_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `scopes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`scopes`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `timings_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`timings_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_no` varchar(255) NOT NULL,
  `issued_at` timestamp NULL DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) NOT NULL,
  `revoked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `communication_preferences`
--

CREATE TABLE `communication_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email_course_updates` tinyint(1) NOT NULL DEFAULT 1,
  `email_promotions` tinyint(1) NOT NULL DEFAULT 0,
  `sms_otp` tinyint(1) NOT NULL DEFAULT 1,
  `sms_marketing` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL DEFAULT '18c62f5e-7b8a-43d6-8116-e5976d87c07c',
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `language` varchar(8) NOT NULL DEFAULT 'de',
  `level` enum('beginner','intermediate','advanced') NOT NULL DEFAULT 'beginner',
  `price_cents` int(11) NOT NULL DEFAULT 0,
  `currency` char(3) NOT NULL DEFAULT 'EUR',
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `uuid`, `slug`, `title`, `subtitle`, `description`, `language`, `level`, `price_cents`, `currency`, `is_published`, `published_at`, `thumbnail_path`, `trailer_url`, `meta`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bf93d88e-41f1-4113-89ee-bc6f8f7f7a20', 'java', 'Java Full Stack', NULL, 'Mauris ante tellus, feugiat nec metus non, bibendum semper velit. Praesent laoreet urna id tristique fermentum. Morbi venenatis dui quis diam mollis pellentesque.', 'en', 'beginner', 200, 'EUR', 1, '2025-08-22 21:22:36', 'thumbnails/XqtMjKz6GHTP6dRvl09jZDI3ObLIP10wZCK4LIa7.png', NULL, NULL, 1, 1, '2025-08-22 02:04:31', '2025-08-22 21:22:36', NULL),
(5, '45eb58de-093b-4d3d-995f-a8e81a457ec6', 'Mern', 'Mern Stack Development', 'it is a stack of this', 'Nunc convallis facilisis congue. Curabitur gravida rutrum justo sed pulvinar. Pellentesque ac ante in erat bibendum dignissim.', 'en', 'beginner', 200, 'EUR', 1, '2025-08-22 20:04:12', 'thumbnails/FlOPNKhmgRIYvJ6lzbXlqZgMUVLSZGDhfNfB9UOj.png', NULL, NULL, 1, 1, '2025-08-22 05:25:15', '2025-08-22 20:04:12', NULL),
(6, '68d33e01-b008-4215-85e1-60343464fb21', 'complete-laravel-course', 'Complete Laravel Course for Beginners', 'Learn Laravel from scratch to advanced', 'Master Laravel framework with this comprehensive course', 'en', 'beginner', 9900, 'EUR', 1, '2025-08-22 20:01:46', NULL, NULL, NULL, 1, NULL, '2025-08-22 20:01:46', '2025-08-22 20:01:46', NULL),
(7, 'e939d00a-5d6f-49cc-8d2e-007bb6021b09', 'advanced-react-development', 'Advanced React Development', 'Build modern web applications with React', 'Learn advanced React patterns and best practices', 'en', 'advanced', 14900, 'EUR', 1, '2025-08-22 23:10:32', NULL, NULL, NULL, 1, 1, '2025-08-22 20:02:16', '2025-08-22 23:10:32', NULL),
(8, 'b4ea4ae5-3aea-4326-b09a-ee0cbcf83e5f', 'digital-marketing-masterclass', 'Digital Marketing Masterclass', 'Complete guide to digital marketing', 'Learn SEO, social media marketing, and more', 'en', 'intermediate', 7900, 'EUR', 1, '2025-08-22 20:42:50', NULL, NULL, NULL, 1, 1, '2025-08-22 20:02:16', '2025-08-22 20:42:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `parent_id`, `slug`, `name`, `description`, `sort_order`, `created_at`, `updated_at`) VALUES
(5, NULL, 'Technology', 'Technology', 'web development', 4, '2025-08-22 03:44:24', '2025-08-22 07:38:16'),
(6, NULL, 'development', 'Development', 'Software development courses', 2, '2025-08-22 05:21:58', '2025-08-22 07:37:39'),
(7, NULL, 'design', 'Design', 'Design courses', 1, '2025-08-22 05:21:58', '2025-08-22 07:38:05'),
(8, NULL, 'business', 'Business', 'Business courses', 3, '2025-08-22 05:21:58', '2025-08-22 07:37:52'),
(9, NULL, 'programming', 'Programming', 'Learn programming languages and frameworks', 0, '2025-08-22 20:01:08', '2025-08-22 20:01:08'),
(11, NULL, 'marketing', 'Marketing', 'Digital marketing and SEO courses', 0, '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(12, NULL, 'data-science', 'Data Science', 'Data analysis and machine learning', 0, '2025-08-22 20:01:46', '2025-08-22 20:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `course_category_pivot`
--

CREATE TABLE `course_category_pivot` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_category_pivot`
--

INSERT INTO `course_category_pivot` (`course_id`, `category_id`) VALUES
(6, 12),
(7, 5),
(7, 7),
(8, 5),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `course_id`, `title`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Introduction', 1, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(2, 1, 'Getting Started', 2, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(3, 1, 'Core Concepts', 3, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(4, 1, 'Advanced Topics', 4, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(5, 1, 'Project Work', 5, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(6, 5, 'Introduction', 1, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(7, 5, 'Getting Started', 2, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(8, 5, 'Core Concepts', 3, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(9, 5, 'Advanced Topics', 4, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(10, 5, 'Project Work', 5, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(11, 6, 'Introduction', 1, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(12, 6, 'Getting Started', 2, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(13, 6, 'Core Concepts', 3, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(14, 6, 'Advanced Topics', 4, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(15, 6, 'Project Work', 5, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(16, 7, 'Introduction', 1, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(17, 7, 'Getting Started', 2, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(18, 7, 'Core Concepts', 3, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(19, 7, 'Advanced Topics', 4, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(20, 7, 'Project Work', 5, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(21, 8, 'Introduction', 1, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(22, 8, 'Getting Started', 2, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(23, 8, 'Core Concepts', 3, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(24, 8, 'Advanced Topics', 4, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(25, 8, 'Project Work', 5, '2025-08-22 20:32:23', '2025-08-22 20:32:23', NULL),
(26, 7, 'Certificate', 6, '2025-08-23 02:39:32', '2025-08-23 02:39:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_tags`
--

CREATE TABLE `course_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_tags`
--

INSERT INTO `course_tags` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'beginner', 'Beginner', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(2, 'advanced', 'Advanced', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(3, 'javascript', 'JavaScript', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(4, 'python', 'Python', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(5, 'react', 'React', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(6, 'laravel', 'Laravel', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(7, 'ui-ux', 'UI/UX', '2025-08-22 20:01:46', '2025-08-22 20:01:46'),
(8, 'seo', 'SEO', '2025-08-22 20:01:46', '2025-08-22 20:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `course_tag_pivot`
--

CREATE TABLE `course_tag_pivot` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_tag_pivot`
--

INSERT INTO `course_tag_pivot` (`course_id`, `tag_id`) VALUES
(6, 1),
(6, 4),
(6, 6),
(7, 1),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 3),
(8, 5),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `template_key` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `error_message` varchar(255) DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `response_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `source` enum('purchase','admin_grant','coupon','bundle') NOT NULL DEFAULT 'purchase',
  `status` enum('active','revoked','refunded','expired') NOT NULL DEFAULT 'active',
  `activated_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `revoked_at` timestamp NULL DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `source`, `status`, `activated_at`, `expires_at`, `revoked_at`, `payment_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'admin_grant', 'active', '2025-08-25 07:28:30', NULL, NULL, NULL, NULL, '2025-08-25 07:28:30', '2025-08-25 07:28:30');

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
-- Table structure for table `gdpr_requests`
--

CREATE TABLE `gdpr_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('export','erasure') NOT NULL,
  `status` enum('requested','in_progress','completed','rejected') NOT NULL DEFAULT 'requested',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `processed_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `issued_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(255) NOT NULL,
  `address_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`address_json`)),
  `line_items_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`line_items_json`)),
  `totals_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`totals_json`)),
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration_seconds` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_preview` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `content_type` varchar(100) NOT NULL,
  `video_provider` enum('youtube','s3','bunny') DEFAULT NULL,
  `video_ref` varchar(255) DEFAULT NULL,
  `transcript_text` longtext DEFAULT NULL,
  `attachment_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attachment_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `section_id`, `title`, `slug`, `description`, `duration_seconds`, `sort_order`, `is_preview`, `is_published`, `published_at`, `content_type`, `video_provider`, `video_ref`, `transcript_text`, `attachment_json`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 16, 'Installing laravel', 'installing-laravel', NULL, 0, 0, 0, 0, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=qPYTzzeP5o0', NULL, NULL, '2025-08-23 04:27:48', '2025-08-23 04:30:21', '2025-08-23 04:30:21'),
(2, 7, 16, 'Installing laravel', 'installing-laravel', NULL, 0, 1, 0, 1, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=vc-b94fVKWQ', NULL, NULL, '2025-08-23 04:56:18', '2025-08-23 06:21:51', NULL),
(3, 7, 16, 'Installing laravel', 'installing-laravel', NULL, 0, 1, 0, 1, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=vc-b94fVKWQ', NULL, NULL, '2025-08-23 04:56:40', '2025-08-23 05:29:40', '2025-08-23 05:29:40'),
(4, 7, 16, 'Installing laravel', 'installing-laravel', NULL, 0, 1, 0, 0, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=vc-b94fVKWQ', NULL, NULL, '2025-08-23 04:58:19', '2025-08-23 05:24:54', '2025-08-23 05:24:54'),
(5, 7, 16, 'Installing laravel', 'installing-laravel', NULL, 0, 1, 0, 0, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=vc-b94fVKWQ', NULL, NULL, '2025-08-23 05:05:37', '2025-08-23 05:24:49', '2025-08-23 05:24:49'),
(6, 7, 16, 'java', 'java', NULL, 0, 0, 0, 1, NULL, 'text', NULL, NULL, NULL, NULL, '2025-08-23 05:20:23', '2025-08-23 05:25:00', '2025-08-23 05:25:00'),
(7, 7, 16, 'Artisan CLI ( command-line interface )', 'artisan-cli-command-line-interface', NULL, 0, 2, 0, 1, NULL, 'video', 'youtube', 'https://www.youtube.com/watch?v=vc-b94fVKWQ', NULL, NULL, '2025-08-23 05:26:09', '2025-08-23 06:22:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_views`
--

CREATE TABLE `lesson_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `seconds_watched` int(11) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `last_position_seconds` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_views`
--

INSERT INTO `lesson_views` (`id`, `user_id`, `lesson_id`, `seconds_watched`, `completed_at`, `last_position_seconds`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, '2025-08-22 07:31:29', 0, '2025-07-02 07:31:29', '2025-08-16 07:31:29'),
(2, 1, 7, 0, NULL, 0, '2025-08-19 07:31:29', '2025-08-22 07:31:29'),
(3, 4, 2, 0, '2025-07-24 07:31:29', 0, '2025-07-28 07:31:29', '2025-08-20 07:31:29'),
(4, 4, 7, 0, '2025-07-26 07:31:29', 0, '2025-06-29 07:31:29', '2025-08-22 07:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disk` varchar(255) NOT NULL DEFAULT 'public',
  `path` varchar(255) NOT NULL,
  `mime` varchar(100) NOT NULL,
  `size_bytes` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `disk`, `path`, `mime`, `size_bytes`, `original_name`, `meta`, `created_at`, `updated_at`) VALUES
(1, 1, 'public', 'media/1756089900_Gm5XlIgRO6.jpg', 'image/jpeg', 319786, 'Nakshatra .jpg', '{\"extension\":\"jpg\",\"uploaded_at\":\"2025-08-25T02:45:04.822313Z\"}', '2025-08-24 21:15:04', '2025-08-24 21:15:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_19_012121_create_permission_tables', 1),
(6, '2025_08_19_012818_create_courses_table', 1),
(7, '2025_08_19_014100_create_payments_orders_tables', 1),
(8, '2025_08_19_014107_create_enrollments_certificates_ratings_tables', 1),
(9, '2025_08_19_022158_create_notifications_table', 1),
(10, '2025_08_19_030312_create_admin_cms_tables', 1),
(11, '2025_08_19_031803_create_api_platform_services_tables', 1),
(12, '2025_08_20_060924_add_google_id_to_users_table', 2),
(13, '2025_08_21_053345_add_profile_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `channel` enum('email','sms','in_app') NOT NULL DEFAULT 'in_app',
  `category` enum('system','marketing','enrollment','payment') NOT NULL DEFAULT 'system',
  `subject` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `scheduled_for` timestamp NULL DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NULL DEFAULT NULL,
  `error_message` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'EUR',
  `amount_cents` int(11) NOT NULL DEFAULT 0,
  `discount_cents` int(11) NOT NULL DEFAULT 0,
  `tax_cents` int(11) NOT NULL DEFAULT 0,
  `total_cents` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','paid','failed','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `gateway` enum('razorpay') NOT NULL DEFAULT 'razorpay',
  `gateway_order_id` varchar(255) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notes`)),
  `placed_at` timestamp NULL DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price_cents` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `line_total_cents` int(11) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_e164` varchar(20) NOT NULL,
  `code_hash` varchar(255) NOT NULL,
  `purpose` enum('login','register','2fa') NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verified_at` timestamp NULL DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'de_DE',
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount_cents` int(11) NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'EUR',
  `gateway` enum('razorpay') NOT NULL DEFAULT 'razorpay',
  `gateway_payment_id` varchar(255) NOT NULL,
  `gateway_signature` varchar(255) DEFAULT NULL,
  `method` enum('card','upi','netbanking') DEFAULT NULL,
  `status` enum('created','authorized','captured','failed','refunded') NOT NULL DEFAULT 'created',
  `error_code` varchar(255) DEFAULT NULL,
  `error_description` text DEFAULT NULL,
  `captured_at` timestamp NULL DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `raw_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user.view', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(2, 'user.create', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(3, 'user.update', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(4, 'user.delete', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(5, 'course.view', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(6, 'course.create', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(7, 'course.update', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(8, 'course.delete', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(9, 'lesson.manage', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(10, 'enrollment.view', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(11, 'enrollment.manage', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(12, 'order.view', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(13, 'order.manage', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(14, 'payment.refund', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(15, 'announcement.send', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(16, 'settings.manage', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(17, 'gdpr.export', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(18, 'gdpr.erase', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44');

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
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`settings`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `lesson_id`, `title`, `settings`, `created_at`, `updated_at`) VALUES
(2, 2, 'Introduction Quiz', '{\"time_limit\":30,\"passing_score\":70,\"max_attempts\":3,\"is_active\":true,\"shuffle_questions\":false,\"show_results\":true,\"allow_review\":true}', '2025-08-24 20:49:51', '2025-08-24 20:49:51'),
(3, 7, 'Advanced Concepts Assessment', '{\"time_limit\":45,\"passing_score\":80,\"max_attempts\":2,\"is_active\":true,\"shuffle_questions\":true,\"show_results\":true,\"allow_review\":false}', '2025-08-24 20:49:51', '2025-08-24 23:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `rate_limits`
--

CREATE TABLE `rate_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `max_requests` int(11) NOT NULL DEFAULT 60,
  `window_started_at` timestamp NULL DEFAULT NULL,
  `request_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `moderated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `amount_cents` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `gateway_refund_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `raw_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(2, 'Instructor', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44'),
(3, 'Student', 'web', '2025-08-20 00:08:44', '2025-08-20 00:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_e164` varchar(20) DEFAULT NULL,
  `template_key` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `provider_message_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `error_message` varchar(255) DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `response_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider_email` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `raw_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_json`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL DEFAULT uuid(),
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_e164` varchar(20) DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `locale` varchar(10) NOT NULL DEFAULT 'de_DE',
  `timezone` varchar(64) NOT NULL DEFAULT 'Europe/Berlin',
  `country_code` char(2) NOT NULL DEFAULT 'DE',
  `date_of_birth` date DEFAULT NULL,
  `marketing_opt_in` tinyint(1) NOT NULL DEFAULT 0,
  `legal_acceptance_version` varchar(255) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `profile`, `google_id`, `email_verified_at`, `phone_e164`, `phone_verified_at`, `password`, `remember_token`, `locale`, `timezone`, `country_code`, `date_of_birth`, `marketing_opt_in`, `legal_acceptance_version`, `last_login_at`, `last_login_ip`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a7c231fd-1838-4dc4-b7f9-f51fbd524c0b', 'Super Admin', 'dashboard@edulearn.local', '1756102153_1.png', NULL, NULL, NULL, NULL, '$2y$12$NjZ/nwbfH22g9L1/iilGbueXfu2TGZHQoKWZZyLlIxt7c7lcWvM2W', 'zlU3A0dpLRrKbPFZcQiABncYRu5DKpTgdClHTUea3xAYgzmZRpkfrYLfRshe', 'de_DE', 'Europe/Berlin', 'DE', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2025-08-20 00:08:51', '2025-08-25 00:39:13', NULL),
(4, '99bc3a4f-7e54-11f0-8340-8c164592fce8', 'Niteesh Vaddi', 'niteeshvaddi154@gmail.com', NULL, '115038007307678607087', NULL, NULL, NULL, '$2y$12$NXrOvlX42TTYJyjHgQVv3eNbwpM5Lzs9Pi2iwz5A/t9vKusob7Ulu', NULL, 'de_DE', 'Europe/Berlin', 'DE', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2025-08-21 00:33:47', '2025-08-21 00:33:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('billing','shipping') NOT NULL,
  `name` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `country_code` char(2) NOT NULL DEFAULT 'DE',
  `vat_id` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_events`
--

CREATE TABLE `webhook_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` enum('razorpay') NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`payload`)),
  `processed_at` timestamp NULL DEFAULT NULL,
  `processing_status` enum('pending','processed','failed') NOT NULL DEFAULT 'pending',
  `error_message` text DEFAULT NULL,
  `received_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_actions_audit`
--
ALTER TABLE `admin_actions_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_actions_audit_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `announcement_targets`
--
ALTER TABLE `announcement_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_targets_announcement_id_foreign` (`announcement_id`);

--
-- Indexes for table `api_clients`
--
ALTER TABLE `api_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_clients_key_unique` (`key`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_certificate_no_unique` (`certificate_no`),
  ADD UNIQUE KEY `certificates_verification_code_unique` (`verification_code`),
  ADD KEY `certificates_enrollment_id_foreign` (`enrollment_id`);

--
-- Indexes for table `communication_preferences`
--
ALTER TABLE `communication_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communication_preferences_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_created_by_foreign` (`created_by`),
  ADD KEY `courses_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_categories_slug_unique` (`slug`),
  ADD KEY `course_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `course_category_pivot`
--
ALTER TABLE `course_category_pivot`
  ADD PRIMARY KEY (`course_id`,`category_id`),
  ADD KEY `course_category_pivot_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_sections_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_tags`
--
ALTER TABLE `course_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_tags_slug_unique` (`slug`);

--
-- Indexes for table `course_tag_pivot`
--
ALTER TABLE `course_tag_pivot`
  ADD PRIMARY KEY (`course_id`,`tag_id`),
  ADD KEY `course_tag_pivot_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollments_user_id_course_id_unique` (`user_id`,`course_id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`),
  ADD KEY `enrollments_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gdpr_requests`
--
ALTER TABLE `gdpr_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gdpr_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_order_id_unique` (`order_id`),
  ADD UNIQUE KEY `invoices_invoice_no_unique` (`invoice_no`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`),
  ADD KEY `lessons_section_id_foreign` (`section_id`);

--
-- Indexes for table `lesson_views`
--
ALTER TABLE `lesson_views`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lesson_views_user_id_lesson_id_unique` (`user_id`,`lesson_id`),
  ADD KEY `lesson_views_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  ADD KEY `notifications_created_by_foreign` (`created_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_gateway_order_id_unique` (`gateway_order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_course_id_foreign` (`course_id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_gateway_payment_id_unique` (`gateway_payment_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `rate_limits`
--
ALTER TABLE `rate_limits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_limits_key_period_index` (`key`,`period`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_user_id_course_id_unique` (`user_id`,`course_id`),
  ADD KEY `ratings_course_id_foreign` (`course_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `refunds_gateway_refund_id_unique` (`gateway_refund_id`),
  ADD KEY `refunds_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_e164_unique` (`phone_e164`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `webhook_events`
--
ALTER TABLE `webhook_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `webhook_events_event_id_unique` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_actions_audit`
--
ALTER TABLE `admin_actions_audit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `announcement_targets`
--
ALTER TABLE `announcement_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_clients`
--
ALTER TABLE `api_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `communication_preferences`
--
ALTER TABLE `communication_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_sections`
--
ALTER TABLE `course_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `course_tags`
--
ALTER TABLE `course_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gdpr_requests`
--
ALTER TABLE `gdpr_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lesson_views`
--
ALTER TABLE `lesson_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate_limits`
--
ALTER TABLE `rate_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhook_events`
--
ALTER TABLE `webhook_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_actions_audit`
--
ALTER TABLE `admin_actions_audit`
  ADD CONSTRAINT `admin_actions_audit_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `announcement_targets`
--
ALTER TABLE `announcement_targets`
  ADD CONSTRAINT `announcement_targets_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `communication_preferences`
--
ALTER TABLE `communication_preferences`
  ADD CONSTRAINT `communication_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `courses_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD CONSTRAINT `course_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `course_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `course_category_pivot`
--
ALTER TABLE `course_category_pivot`
  ADD CONSTRAINT `course_category_pivot_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_category_pivot_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD CONSTRAINT `course_sections_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_tag_pivot`
--
ALTER TABLE `course_tag_pivot`
  ADD CONSTRAINT `course_tag_pivot_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_tag_pivot_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `course_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD CONSTRAINT `email_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gdpr_requests`
--
ALTER TABLE `gdpr_requests`
  ADD CONSTRAINT `gdpr_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `course_sections` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lesson_views`
--
ALTER TABLE `lesson_views`
  ADD CONSTRAINT `lesson_views_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD CONSTRAINT `sms_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
