-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) NOT NULL,
  `work_hours` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` enum('Cuti Tahunan','Cuti Sakit','Cuti Melahirkan','Cuti Darurat','Cuti Pribadi','Cuti Haji','Cuti Pernikahan') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `bring_laptop` tinyint(1) DEFAULT 0,
  `contactable` tinyint(1) DEFAULT 1,
  `proof_photo` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verified_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `type`, `start_date`, `end_date`, `description`, `bring_laptop`, `contactable`, `proof_photo`, `verified`, `verified_description`, `created_at`, `updated_at`) VALUES
(18, 11, 'Cuti Melahirkan', '2025-10-03', '2025-10-07', 'zzzzzzzzzz', 0, 1, '/storage/proofs/BLb8w5ZDyXkuxYJCSf1V3SVAYNNrFIXk9vyi79vx.jpg', 0, NULL, '2025-10-14 23:09:37', '2025-10-14 23:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `director_id` bigint(20) DEFAULT NULL,
  `level` enum('low','medium','high') DEFAULT 'medium',
  `status` enum('Ready','Running','Testing','Maintenance','Complete','') DEFAULT 'Ready',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `start_date`, `deadline`, `director_id`, `level`, `status`, `description`, `created_at`, `updated_at`) VALUES
(5, 'sdgsdfg', '2025-10-01', '2025-10-09', NULL, 'medium', 'Maintenance', 'fddafdafd', '2025-10-02 05:52:06', '2025-10-08 19:42:54'),
(6, 'Curran Jennings', '2025-10-01', '2025-10-03', NULL, 'medium', 'Ready', 'aDFdafdfdf', '2025-10-05 18:21:04', '2025-10-08 00:39:40'),
(7, 'Trafel Selfi', '2025-10-01', '2025-10-17', NULL, 'high', 'Ready', 'ssssssssssssss', '2025-10-10 20:56:04', '2025-10-10 20:56:04'),
(8, 'xx', '2025-10-10', '2025-10-22', NULL, 'high', 'Ready', NULL, '2025-10-10 20:56:30', '2025-10-10 20:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `level` enum('low','medium','high') DEFAULT 'medium',
  `estimated_hours` int(11) DEFAULT 0,
  `status` enum('todo','in_progress','review','completed') DEFAULT 'todo',
  `assigned_to` bigint(20) DEFAULT NULL,
  `created_by_user_id` bigint(20) DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `transfer_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `description`, `level`, `estimated_hours`, `status`, `assigned_to`, `created_by_user_id`, `completed_at`, `transfer_at`, `created_at`, `updated_at`) VALUES
(12, 5, 'Creat Database', NULL, 'medium', 6, 'todo', NULL, 1, NULL, NULL, '2025-10-09 01:37:41', '2025-10-09 01:37:41'),
(13, 6, 'sasa', NULL, 'high', 6, 'in_progress', NULL, 1, NULL, '2025-10-10 20:44:12', '2025-10-10 20:41:26', '2025-10-10 20:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `division` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `telegram_link` varchar(255) DEFAULT NULL,
  `employment_status` enum('active','inactive','contract','probation') DEFAULT 'active',
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `last_education` varchar(100) DEFAULT NULL,
  `role` enum('karyawan','director') DEFAULT 'karyawan',
  `image` varchar(255) DEFAULT NULL,
  `dashboard_status` enum('ready','stand_by','not_ready','complete','absent') DEFAULT 'ready',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `division`, `email`, `password`, `nik`, `telegram_link`, `employment_status`, `address`, `phone`, `birth_date`, `join_date`, `last_education`, `role`, `image`, `dashboard_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$12$.4GcP0TLWX1clKpa1DU5MOEpYoUkpQj6H3FL80gw8HPsWbo7wv7SG', '1', '1', 'active', '1', '1', '2025-09-12', '2025-09-04', '1', 'director', '1', 'ready', '2025-09-25 14:57:10', '2025-10-07 13:51:11'),
(11, 'selfi', 'Analis', 'pel@gmail.com', '$2y$12$0qqo3/l0KiaYeCMq0K62q.fOYtTFrte9g3LQht.FquVi9G11.srA2', 'sssssssssssss', '111111111111111', 'contract', 'Ds. Sumbermulyo Kec. Tlogowungu Kab. Pati', '085643903451', '2025-10-29', '2025-10-27', '1111111111111111', 'director', 'storage/users/2NXeTvfea1fuN6tYYllY8IoOPIzNJ7Tw7M8Ds9Xa.png', 'ready', '2025-10-14 22:44:20', '2025-10-14 22:44:20'),
(14, 'nik', 'Engineer Mobile', 'nik@gmail.com', '$2y$12$p3pyqnkUadsS2vTSKkQV0eTymM9rOm8yVdKo17ty92qRL9BDqlbqi', '111111111', '111111111111111', 'probation', 'Ds. Sumbermulyo Kec. Tlogowungu Kab. Pati', '085643903451', NULL, '2025-10-07', '1111111111111111', 'karyawan', 'storage/users/gNJKj4D4Gw9awpY5D1r4tw6cIZxTE8Ep8P5poSDr.jpg', 'ready', '2025-10-14 22:45:49', '2025-10-14 22:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `work_hours`
--

CREATE TABLE `work_hours` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `hours` decimal(5,2) NOT NULL,
  `source_task_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_activities_user` (`user_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_leaves_user` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_projects_director` (`director_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD UNIQUE KEY `uk_project_user` (`project_id`,`user_id`),
  ADD KEY `fk_pu_user` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_created_user` (`created_by_user_id`),
  ADD KEY `idx_tasks_status` (`status`),
  ADD KEY `idx_tasks_assigned` (`assigned_to`),
  ADD KEY `idx_tasks_project` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `idx_users_dashboard_status` (`dashboard_status`);

--
-- Indexes for table `work_hours`
--
ALTER TABLE `work_hours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_user_date` (`user_id`,`date`),
  ADD KEY `fk_wh_task` (`source_task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `work_hours`
--
ALTER TABLE `work_hours`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `fk_leaves_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_projects_director` FOREIGN KEY (`director_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `fk_pu_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pu_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_assigned` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tasks_created_user` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tasks_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_hours`
--
ALTER TABLE `work_hours`
  ADD CONSTRAINT `fk_wh_task` FOREIGN KEY (`source_task_id`) REFERENCES `tasks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_wh_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
