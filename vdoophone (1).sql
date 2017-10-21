-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2017 at 07:14 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vdoophone`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(222) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `manager_id` bigint(20) NOT NULL DEFAULT '0',
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(120) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tax_no` varchar(20) DEFAULT NULL,
  `logo` varchar(80) NOT NULL DEFAULT 'default.png',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`, `address`, `email`, `phone`, `description`, `tax_no`, `logo`, `active`, `create_at`) VALUES
(1, 'COM001', 'Vdoo Solutions Co., Ltd', 'Phnom Penh, Cambodia', 'info@vdoo.biz', '086 397 627', 'An IT Solution Company!', NULL, 'default.png', 1, '2017-10-19 19:10:11'),
(2, 'COM002', 'HR Angkor Co., Ltd', 'Phnom Penh, Cambodia', 'info@hrangkor.com', '999999999999', 'Job Agency', NULL, '2-cube.png', 1, '2017-10-20 09:54:40'),
(3, 'COM003', 'Kruta', 'Phnom Penh, Cambodia', 'info@kruta.org', '8888888888888', 'E-Learning System', NULL, '3-header-log-last.png', 1, '2017-10-20 09:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `list` tinyint(4) NOT NULL DEFAULT '0',
  `insert` tinyint(4) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `list`, `insert`, `update`, `delete`) VALUES
(1, 'Branch', 0, 0, 0, 0),
(2, 'Class', 0, 0, 0, 0),
(3, 'School Year', 0, 0, 0, 0),
(4, 'Room', 0, 0, 0, 0),
(5, 'Subject', 0, 0, 0, 0),
(6, 'Student', 0, 0, 0, 0),
(7, 'Permission', 0, 0, 0, 0),
(8, 'Role', 0, 0, 0, 0),
(9, 'User', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(4, 'អ្នកបញ្ចូលទិន្នន័យ'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `list` int(11) NOT NULL DEFAULT '0',
  `insert` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `list`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 6, 1, 1, 1, 1),
(3, 1, 5, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 3, 1, 1, 1, 1),
(6, 1, 2, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 4, 2, 1, 1, 1, 1),
(10, 4, 3, 1, 1, 1, 1),
(11, 4, 6, 1, 1, 1, 1),
(12, 4, 9, 0, 0, 0, 0),
(13, 1, 9, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `role_id` int(11) NOT NULL DEFAULT '1',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `language`, `role_id`, `branch_id`, `employee_id`, `company_id`) VALUES
(1, 'vongkol', 'admin@gmail.com', '$2y$10$Jf08TjOtbNJnSBWYSRqh0.wk2cCH75iaiidMewUq/EG2UwRVcPupS', 'ww9ByXeHnurwOamEIUXlHChEe090xDOVLrF3IE7WHYBCGXBfwe8VrXyAmpe3', '2017-05-27 22:35:52', '2017-05-27 22:35:52', 'vongkol-photo.jpg', 'en', 1, 0, 0, 0),
(3, 'user1', 'user1@gmail.com', '$2y$10$cNFeuOf2YVEm.6SOPbvZO.qDjxEt5U3awD2gWB/zDbssNmi.oRxA2', 'YLXnQlpFjPDpmPMDdGE39DP1ed5qO7Fjjn0N8iOPwFDG6njQF2I0mnLuIYs5', NULL, NULL, 'default.png', 'kh', 4, 0, 0, 0),
(4, 'សៀង បូផាន់', 'bophann@vdoo.biz', '$2y$10$p96lBjOkRDbWBvvxrlJBiuHBQ5odEFl8fCSMbdHj6QKFev2ojvi8m', 'A8c7vx3co3OOG9SSlt5SDT5hup78Dt27DYLUCGUTU7Wu6I7XSwiCaCOTpzuD', NULL, NULL, 'default.png', 'kh', 4, 0, 0, 0),
(5, 'Uch Serey', 'serey@vdoo.biz', '$2y$10$IEKJypRzM.xhUphBRXAPeeSkzf/m5oNMAZwviDm/Em6EhQ.k1mZvu', 'uL8nYc4cvpsmddKqKX5zcH90LRPoXekiOKx2T38opSS8jkqLYL3QsKc2bmY5', NULL, NULL, 'DSC_0002.JPG', 'kh', 4, 0, 0, 0),
(6, 'Ong Pov', 'pov@vdoo.biz', '$2y$10$2pXtUPOky/FgApa7yJX73.zUtd6N5.QJOhMcDASgENzH.RY64K8ZS', 'RmS2Nz0OKAcyMQPeoc0Jrmm8kY6VvOTZmdr9CjU6vz9kBNhLfsMDlZocdC7M', NULL, NULL, 'default.png', 'kh', 4, 0, 0, 0),
(7, 'user2', 'user2@gmail.com', '$2y$10$LlAnsBT219AJjG0ia7UzzOlsTwBzdug1yuBvawST8FpNANT7DovF2', NULL, NULL, NULL, 'default.png', 'en', 5, 0, 0, 0),
(8, 'user3', 'user3@gmail.com', '$2y$10$YH25uGW9W44XbxpLVh78nuH0JOEAlaLwM4f.jivfMfeuUOMPFAunG', NULL, NULL, NULL, 'default.png', 'en', 1, 0, 0, 0),
(9, 'user4', 'user4@gmail.com', '$2y$10$jKLi/2vNxN87tPZheifRjub5d548pcnAK1LpiRXUUwIGCZQZC/s1y', NULL, NULL, NULL, 'default.png', 'kh', 1, 0, 0, 0),
(10, 'user5', 'user5@gmail.com', '$2y$10$kx6PMnK7Pl/eRRk2rS7uGul0TM.XAFB1q0GltugQu8SV0zcG.R4tS', NULL, NULL, NULL, 'default.png', 'kh', 1, 0, 0, 0),
(11, 'user6', 'user6@gmail.com', '$2y$10$TmNsUd2RAvoLcQQhVWXk5uCwaWdvfveN7dr2hFLXCY5WBpzNfMH.S', NULL, NULL, NULL, 'default.png', 'en', 1, 0, 0, 0),
(12, 'user7', 'user7@gmail.com', '$2y$10$j9kb3PVXALhd.QrkxGXne.xrmO1kmZiIXElxieajGx82zZt48e2z2', NULL, NULL, NULL, 'default.png', 'kh', 1, 0, 0, 0),
(13, 'user8', 'user8@gmail.com', '$2y$10$dKV5h1SA4idJ5cbuQZypJOABklJ3iaAfXlcaE02en3YOrE6SWzLAO', NULL, NULL, NULL, 'default.png', 'kh', 4, 0, 0, 0),
(19, 'user13', 'user13@gmail.com', '$2y$10$kLiLh7Z4pshwbyuKRH4zf.MWuYg9g8AKDvG0/beGwNAWtnr0tabgi', NULL, NULL, NULL, 'default.png', 'kh', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_branches`
--

CREATE TABLE `user_branches` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `branch_id` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_branches`
--

INSERT INTO `user_branches` (`id`, `user_id`, `branch_id`) VALUES
(1, 1, 1),
(2, 6, 1),
(3, 6, 2),
(4, 6, 3),
(5, 6, 4),
(6, 6, 5),
(7, 6, 6),
(8, 6, 7),
(9, 6, 8),
(10, 6, 9),
(11, 6, 10),
(12, 6, 11),
(13, 6, 12),
(14, 5, 13),
(15, 5, 14),
(16, 5, 15),
(17, 5, 16),
(18, 5, 17),
(19, 5, 18),
(20, 5, 19),
(21, 4, 20),
(22, 4, 21),
(23, 4, 22),
(24, 4, 23),
(25, 4, 24),
(26, 4, 25),
(27, 4, 26),
(28, 1, 2),
(29, 1, 3),
(30, 1, 4),
(31, 1, 5),
(32, 1, 6),
(33, 1, 7),
(34, 1, 8),
(35, 1, 9),
(36, 1, 10),
(37, 1, 11),
(38, 1, 12),
(39, 1, 13),
(40, 1, 14),
(41, 1, 15),
(42, 1, 16),
(43, 1, 17),
(44, 1, 18),
(45, 1, 19),
(46, 1, 20),
(47, 1, 21),
(48, 1, 22),
(49, 1, 23),
(50, 1, 24),
(51, 1, 25),
(52, 1, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_branches`
--
ALTER TABLE `user_branches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_branches`
--
ALTER TABLE `user_branches`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
