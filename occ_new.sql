-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 11:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `occ_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`id`, `name`) VALUES
(1, '1.1 TOP_10_VIP_SHORTCODEE'),
(2, '1.3 Telco Dashboard'),
(3, '1.7 Digipos Bulk Payment');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_history_job`
--

CREATE TABLE `dummy_history_job` (
  `id` int(11) NOT NULL,
  `user_log` int(11) NOT NULL,
  `job_id` varchar(127) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task` varchar(20) NOT NULL,
  `shift` int(11) NOT NULL,
  `value` text NOT NULL,
  `noted` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_history_job`
--

INSERT INTO `dummy_history_job` (`id`, `user_log`, `job_id`, `id_user`, `task`, `shift`, `value`, `noted`, `date_created`) VALUES
(42, 1623185363, '19, 20', 7, 'Thor', 1, 'a:4:{i:0;s:4:\"sc01\";i:1;s:4:\"sc08\";i:2;s:4:\"sc12\";i:3;s:4:\"sc18\";}', '1', '2021-06-08 21:09:30'),
(43, 1623185363, '19, 20', 7, 'Thor', 1, 'a:8:{i:0;s:4:\"sc01\";i:1;s:4:\"sc02\";i:2;s:4:\"sc07\";i:3;s:4:\"sc08\";i:4;s:4:\"sc11\";i:5;s:4:\"sc12\";i:6;s:4:\"sc17\";i:7;s:4:\"sc18\";}', 'zx', '2021-06-08 21:09:53'),
(44, 1623185363, '19, 20', 7, 'Thor', 1, 'a:8:{i:0;s:4:\"sc11\";i:1;s:4:\"sc22\";i:2;s:4:\"sc77\";i:3;s:4:\"sc88\";i:4;s:4:\"sc11\";i:5;s:4:\"sc22\";i:6;s:4:\"sc77\";i:7;s:4:\"sc88\";}', '                                c', '2021-06-08 21:10:19'),
(45, 1623185363, '19, 20', 7, 'Thor', 1, 'a:5:{i:0;s:4:\"sc01\";i:1;s:4:\"sc02\";i:2;s:4:\"sc08\";i:3;s:4:\"sc11\";i:4;s:4:\"sc18\";}', 'cdcd', '2021-06-08 21:11:50'),
(46, 1623185363, '19, 20', 7, 'Thor', 1, 'a:5:{i:0;s:4:\"sc01\";i:1;s:4:\"sc02\";i:2;s:4:\"sc03\";i:3;s:4:\"sc16\";i:4;s:4:\"sc17\";}', 'sa', '2021-06-08 21:14:09'),
(47, 1623185363, '19, 20', 7, 'Thor', 1, 'a:5:{i:0;s:4:\"sc01\";i:1;s:4:\"sc08\";i:2;s:4:\"sc11\";i:3;s:4:\"sc12\";i:4;s:4:\"sc18\";}', '                            Place <em>some</em> <u>text</u> <strong>here</strong>\r\n                        ', '2021-06-08 21:14:50'),
(48, 1623185363, '19, 20', 7, 'Thor', 1, 'a:2:{i:0;s:4:\"sc11\";i:1;s:4:\"sc22\";}', '                                                                                                ggwp                                                        ', '2021-06-08 21:15:47'),
(49, 1623185363, '19, 20', 7, 'Thor', 1, 'a:5:{i:0;s:4:\"sc04\";i:1;s:4:\"sc06\";i:2;s:4:\"sc08\";i:3;s:4:\"sc15\";i:4;s:4:\"sc18\";}', '                                                                                                                                wqwqdf', '2021-06-08 21:19:59'),
(50, 1623185363, '19, 20', 7, 'Thor', 1, 'a:7:{i:0;s:4:\"sc01\";i:1;s:4:\"sc02\";i:2;s:4:\"sc05\";i:3;s:4:\"sc08\";i:4;s:4:\"sc11\";i:5;s:4:\"sc12\";i:6;s:4:\"sc14\";}', '                                gfdfds', '2021-06-08 21:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_log` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `noted` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `sub_case_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `task_id`, `case_id`, `sub_case_id`, `date`) VALUES
(19, 1, 1, 5, '2021-06-08 01:39:02'),
(20, 1, 1, 6, '2021-06-08 01:39:10'),
(21, 2, 2, 5, '2021-06-08 04:53:24'),
(22, 2, 2, 6, '2021-06-08 04:53:32'),
(23, 3, 3, 5, '2021-06-08 04:53:39'),
(24, 3, 3, 6, '2021-06-08 04:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `user_log` varchar(20) NOT NULL,
  `case` text NOT NULL,
  `sub_case` text NOT NULL,
  `value` int(1) NOT NULL,
  `notes` text NOT NULL,
  `submit_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_case`
--

CREATE TABLE `sub_case` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_case`
--

INSERT INTO `sub_case` (`id`, `name`) VALUES
(5, '                                <p>- Succes Rate &gt;= 90% is Normall</p><p>- Succes Rate &lt;= 90% Need Report and Checking   '),
(6, '<p>- Completed (Success) &gt; 0 is Normal </p><p>- Completed ( Success ) = 0 Need Report and Checking                          ');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `task_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `task_name`) VALUES
(1, 'Thor'),
(2, 'Thanos'),
(3, 'Spiderman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `name`, `email`, `gender`, `password`, `is_active`, `date`) VALUES
(6, 1, 'admin satu', 'admin1@gmail.com', 'Male', '$2y$10$rlwM2qpEt./t7pzENuc8TulNuVxFH6nlTwq/UUxm8Sk0zMmRy48q.', 1, '2021-04-22 18:22:27'),
(7, 2, 'member satu', 'member1@gmail.com', 'Female', '$2y$10$Dog/xKP4txU5ktbli7qxCetiJ4na0i7Q/a5WVs6AKzGpbRG4PWlDm', 1, '2021-05-03 06:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level_user` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level_user`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 2, 3),
(5, 1, 2),
(6, 1, 4),
(7, 1, 8),
(8, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `log_id` varchar(127) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task_id` int(3) NOT NULL,
  `shift` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `log_id`, `id_user`, `task_id`, `shift`, `date`) VALUES
(25, '1620175797', 7, 3, 3, '2021-05-05 00:49:57'),
(26, '1620176185', 7, 1, 1, '2021-05-05 00:56:25'),
(27, '1620189860', 7, 3, 3, '2021-05-05 04:44:20'),
(28, '1620713244', 7, 1, 1, '2021-05-11 06:07:24'),
(29, '1620718247', 7, 2, 1, '2021-05-11 07:30:47'),
(30, '1620720132', 7, 2, 2, '2021-05-11 08:02:12'),
(31, '1620723152', 7, 3, 3, '2021-05-11 08:52:32'),
(32, '1620739948', 7, 1, 1, '2021-05-11 13:32:28'),
(33, '1620741891', 7, 3, 2, '2021-05-11 14:04:51'),
(34, '1620791030', 7, 2, 2, '2021-05-12 03:43:50'),
(35, '1620835156', 7, 1, 1, '2021-05-12 15:59:16'),
(36, '1621091457', 7, 1, 1, '2021-05-15 15:10:57'),
(37, '1621093459', 7, 1, 2, '2021-05-15 15:44:19'),
(38, '1621261810', 7, 1, 1, '2021-05-17 14:30:10'),
(39, '1621267110', 7, 1, 1, '2021-05-17 15:58:30'),
(40, '1621321585', 7, 1, 1, '2021-05-18 07:06:25'),
(41, '1621322909', 7, 1, 1, '2021-05-18 07:28:29'),
(42, '1622227584', 7, 1, 1, '2021-05-28 18:46:24'),
(43, '1622447065', 7, 1, 1, '2021-05-31 07:44:25'),
(44, '1622447743', 7, 1, 2, '2021-05-31 07:55:43'),
(45, '1622688072', 7, 1, 1, '2021-06-03 02:41:12'),
(46, '1622821543', 7, 1, 1, '2021-06-04 15:45:43'),
(47, '1622821950', 7, 1, 1, '2021-06-04 15:52:30'),
(48, '1622822279', 7, 1, 1, '2021-06-04 15:57:59'),
(49, '1622825115', 7, 1, 1, '2021-06-04 16:45:15'),
(50, '1622832459', 7, 1, 1, '2021-06-04 18:47:39'),
(51, '1622832572', 7, 1, 1, '2021-06-04 18:49:32'),
(52, '1622832767', 7, 1, 1, '2021-06-04 18:52:47'),
(53, '1622833508', 7, 1, 1, '2021-06-04 19:05:08'),
(54, '1622833549', 7, 1, 1, '2021-06-04 19:05:49'),
(55, '1622886291', 7, 1, 1, '2021-06-05 09:44:51'),
(56, '1622886394', 7, 1, 1, '2021-06-05 09:46:34'),
(57, '1622886728', 7, 1, 1, '2021-06-05 09:52:08'),
(58, '1622890166', 7, 1, 1, '2021-06-05 10:49:26'),
(59, '1622891584', 7, 1, 1, '2021-06-05 11:13:04'),
(60, '1622891729', 7, 1, 1, '2021-06-05 11:15:29'),
(61, '1622892013', 7, 1, 1, '2021-06-05 11:20:13'),
(62, '1622892059', 7, 1, 1, '2021-06-05 11:20:59'),
(63, '1622892221', 7, 1, 1, '2021-06-05 11:23:41'),
(64, '1622893640', 7, 1, 1, '2021-06-05 11:47:20'),
(65, '1622893760', 7, 1, 1, '2021-06-05 11:49:20'),
(66, '1622893833', 7, 1, 1, '2021-06-05 11:50:33'),
(67, '1622961874', 7, 1, 1, '2021-06-06 06:44:34'),
(68, '1622962072', 7, 1, 1, '2021-06-06 06:47:52'),
(69, '1622965123', 7, 1, 1, '2021-06-06 07:38:43'),
(70, '1622980450', 7, 1, 1, '2021-06-06 11:54:10'),
(71, '1622981265', 7, 1, 1, '2021-06-06 12:07:45'),
(72, '1622981580', 7, 1, 1, '2021-06-06 12:13:00'),
(73, '1622983883', 7, 1, 1, '2021-06-06 12:51:23'),
(74, '1622984011', 7, 2, 2, '2021-06-06 12:53:31'),
(75, '1622984108', 7, 1, 2, '2021-06-06 12:55:08'),
(76, '1622984392', 7, 2, 1, '2021-06-06 12:59:52'),
(77, '1622984420', 7, 1, 1, '2021-06-06 13:00:20'),
(78, '1622984530', 7, 1, 2, '2021-06-06 13:02:10'),
(79, '1622984576', 7, 2, 1, '2021-06-06 13:02:56'),
(80, '1623009266', 7, 1, 1, '2021-06-06 19:54:26'),
(81, '1623010495', 7, 1, 1, '2021-06-06 20:14:55'),
(82, '1623081933', 7, 1, 1, '2021-06-07 16:05:33'),
(83, '1623088353', 7, 1, 1, '2021-06-07 17:52:33'),
(84, '1623091160', 7, 1, 1, '2021-06-07 18:39:20'),
(85, '1623094481', 7, 1, 1, '2021-06-07 19:34:41'),
(86, '1623095070', 7, 1, 1, '2021-06-07 19:44:30'),
(87, '1623095987', 7, 1, 1, '2021-06-07 19:59:47'),
(88, '1623096014', 7, 1, 3, '2021-06-07 20:00:14'),
(89, '1623097152', 7, 1, 2, '2021-06-07 20:19:12'),
(90, '1623097574', 7, 1, 2, '2021-06-07 20:26:14'),
(91, '1623102840', 7, 2, 2, '2021-06-07 21:54:00'),
(92, '1623102872', 7, 3, 3, '2021-06-07 21:54:32'),
(93, '1623104305', 7, 1, 1, '2021-06-07 22:18:25'),
(94, '1623153284', 7, 1, 1, '2021-06-08 11:54:44'),
(95, '1623171158', 7, 1, 1, '2021-06-08 16:52:38'),
(96, '1623171286', 7, 1, 1, '2021-06-08 16:54:46'),
(97, '1623171312', 7, 2, 2, '2021-06-08 16:55:12'),
(98, '1623185363', 7, 1, 1, '2021-06-08 20:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(2) NOT NULL,
  `menu` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(127) NOT NULL,
  `url` varchar(127) NOT NULL,
  `icon` varchar(127) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'nav-icon fas fa-tachometer-alt', 1),
(2, 2, 'Check List Monitoring', 'user/monitoring', 'nav-icon fas fa-th', 1),
(3, 2, 'Dashboard', 'user', 'nav-icon fas fa-tachometer-alt', 1),
(4, 1, 'Menu Management', 'admin/menu', 'nav-icon fas fa-bars', 1),
(7, 1, 'Task Management', 'admin/task', 'nav-icon fas fa-tasks', 1),
(8, 1, 'Case', 'admin/cases', 'nav-icon fas fa-file', 1),
(9, 1, 'Sub Case', 'admin/sub_cases', 'nav-icon fas fa-file', 1),
(11, 1, 'Job', 'admin/job', 'nav-icon fas fa-file', 1),
(12, 2, 'History Monitoring', 'user/history', 'nav-icon fas fa-th', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_history_job`
--
ALTER TABLE `dummy_history_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `sub_case_id` (`sub_case_id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_case`
--
ALTER TABLE `sub_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `log_id` (`log_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dummy_history_job`
--
ALTER TABLE `dummy_history_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_case`
--
ALTER TABLE `sub_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id_task`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `case` (`id`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`sub_case_id`) REFERENCES `sub_case` (`id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id_task`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
