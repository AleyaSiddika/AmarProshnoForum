-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 05:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amarprosno_lara`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `que_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `showUp` int(11) NOT NULL DEFAULT '0',
  `showDown` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `que_id`, `description`, `rate`, `showUp`, `showDown`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'kichu akkta ans', '6', 0, 0, '2017-08-18 08:24:03', '2017-08-18 08:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_04_143706_create_questions_table', 2),
(4, '2017_08_04_144302_create_answers_table', 2),
(5, '2017_08_04_144343_create_profiles_table', 2),
(6, '2017_08_04_144421_create_rattings_table', 2),
(7, '2017_08_04_144514_create_rattingans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `dob`, `hobby`, `interest`, `image`, `created_at`, `updated_at`) VALUES
(2, 6, 'Aleya Nur Mohol', 'Siddika', 'Female', '25-11-1995', 'Photography', 'New technology', '/profile_pic/1502817146.jpg', '2017-08-15 08:52:07', '2017-08-15 21:08:54'),
(3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-18 08:23:45', '2017-08-18 08:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `top` int(11) NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `html` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `css` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `php` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `oop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mysql` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `javascript` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ajax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jquery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `top`, `title`, `description`, `html`, `css`, `php`, `oop`, `mysql`, `javascript`, `ajax`, `jquery`, `rate`, `created_at`, `updated_at`) VALUES
(1, 6, -1, 'New topic', 'About technology.', '0', '0', '0', '0', '0', '0', '0', '0', '2', '2017-08-15 23:38:08', '2017-08-18 08:40:49'),
(2, NULL, 0, 'akta topic', 'akta topic er description', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2017-08-15 23:39:17', '2017-08-15 23:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `rattingans`
--

CREATE TABLE `rattingans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `que_id` int(11) DEFAULT NULL,
  `showUp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rattings`
--

CREATE TABLE `rattings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `que_id` int(11) DEFAULT NULL,
  `showUp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rattings`
--

INSERT INTO `rattings` (`id`, `user_id`, `que_id`, `showUp`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '0', NULL, NULL),
(2, 6, 1, '0', NULL, NULL),
(3, 6, 1, '1', NULL, NULL),
(4, 6, 1, '1', NULL, NULL),
(5, 6, 1, '1', NULL, NULL),
(6, 6, 1, '0', NULL, NULL),
(7, 6, 1, '0', NULL, NULL),
(8, 6, 1, '0', NULL, NULL),
(9, 6, 1, '0', NULL, NULL),
(10, 6, 1, '0', NULL, NULL),
(11, 6, 1, '0', NULL, NULL),
(12, 6, 1, '0', NULL, NULL),
(13, 6, 1, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Aleya Nur Mohol Siddika', 'aleyasiddika01@gmail.com', '$2y$10$KjBUqYVpsoydIdz4jhFRTOyKKAr4qFIAYO9cLvfc0qbujprTUNduq', 'y4riXdk9P7PT8OKujzwIRQ1fLKUsLyJxbfNBeZgtXLrNE4wu4aAMHXVAC3yQ', '2017-08-15 08:52:07', '2017-08-15 08:52:07'),
(7, 'alo', 'alo@gmail.com', '$2y$10$21RxYu0ekMT3NskfRIUl/OFIU5EKN5ETysdoL42O9OLEWZk1lrkPK', 'F6NLFFCbCiwAJw8FXejPhOSB5NdBmmX9T4fHHoP23UbjLMJGeH788LLGc25U', '2017-08-18 08:23:45', '2017-08-18 08:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rattingans`
--
ALTER TABLE `rattingans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rattings`
--
ALTER TABLE `rattings`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rattingans`
--
ALTER TABLE `rattingans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rattings`
--
ALTER TABLE `rattings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
