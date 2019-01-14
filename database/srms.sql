-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:43 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_section` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`, `class_section`, `status`, `created_at`, `updated_at`) VALUES
(10, 'One', 'A', 1, '2018-10-03 17:00:36', '2018-10-03 17:00:36'),
(12, 'Two', 'A', 1, '2018-10-03 17:01:21', '2018-10-03 17:01:21'),
(13, 'Three', 'A', 1, '2018-10-03 17:01:40', '2018-10-03 17:01:40'),
(14, 'Four', 'A', 1, '2018-10-03 17:01:52', '2018-10-03 17:01:52'),
(15, 'Five', 'A', 1, '2018-10-03 17:02:06', '2018-10-03 17:02:06'),
(16, 'Six', 'A', 1, '2018-10-03 17:02:24', '2018-10-03 17:02:24'),
(17, 'Six', 'B', 1, '2018-10-03 17:02:40', '2018-10-03 17:02:40'),
(18, 'Seven', 'A', 1, '2018-10-03 17:02:54', '2018-10-03 17:02:54'),
(19, 'Eight', 'A', 1, '2018-10-03 17:03:06', '2018-10-03 17:03:06'),
(20, 'Nine', 'Science', 1, '2018-10-03 17:03:21', '2018-10-03 17:03:21'),
(21, 'Nine', 'Commerce', 1, '2018-10-03 17:03:58', '2018-10-03 17:03:58'),
(22, 'Nine', 'Manobik', 1, '2018-10-03 17:04:21', '2018-10-03 17:04:21'),
(23, 'Ten', 'Science', 1, '2018-10-03 17:04:37', '2018-10-03 17:04:37'),
(24, 'Ten', 'Commerce', 1, '2018-10-03 17:04:47', '2018-10-03 17:04:47'),
(25, 'Ten', 'Manobik', 1, '2018-10-03 17:04:54', '2018-10-03 17:04:54'),
(26, 'Alim', 'All', 1, '2018-10-08 04:32:31', '2018-10-08 04:32:31'),
(27, 'HSC', 'General', 1, '2018-10-10 07:26:49', '2018-10-10 07:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_setup`
--

CREATE TABLE `tbl_class_setup` (
  `class_setup_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) NOT NULL DEFAULT '0',
  `class_id` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_wise_result`
--

CREATE TABLE `tbl_class_wise_result` (
  `class_wise_result_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `final_marks` double(12,2) NOT NULL,
  `final_gpa` double(12,2) NOT NULL,
  `final_grade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `merit_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_class_wise_result`
--

INSERT INTO `tbl_class_wise_result` (`class_wise_result_id`, `student_id`, `class_id`, `exam_id`, `session_id`, `final_marks`, `final_gpa`, `final_grade`, `merit_list`, `position`, `created_at`, `updated_at`) VALUES
(157, 29, 23, 11, 1, 168.00, 4.50, 'A', '1', '1st', '2018-10-16 05:31:05', '2018-10-16 05:31:05'),
(158, 30, 24, 17, 2, 67.00, 3.50, 'A-', '1', '1st', '2018-10-16 05:34:51', '2018-10-16 05:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `exam_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `exam_name` varchar(255) NOT NULL DEFAULT '0',
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `class_id`, `exam_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(7, 10, '1st Terminal', 1, '2018-10-03 17:06:16', '2018-10-03 17:06:16'),
(8, 12, '2nd Terminal', 1, '2018-10-03 17:06:47', '2018-10-03 17:06:47'),
(9, 13, '1st Terminal', 1, '2018-10-03 17:07:09', '2018-10-03 17:07:09'),
(10, 20, '1st Terminal', 1, '2018-10-03 17:07:30', '2018-10-03 17:07:30'),
(11, 23, '1st Terminal', 1, '2018-10-03 17:07:58', '2018-10-03 17:07:58'),
(12, 19, '2nd Terminal', 1, '2018-10-03 17:08:15', '2018-10-03 17:08:15'),
(13, 16, '1st Terminal', 1, '2018-10-03 17:08:34', '2018-10-03 17:08:34'),
(14, 10, '2nd Terminal', 1, '2018-10-06 06:44:02', '2018-10-06 06:44:02'),
(15, 26, 'Test', 1, '2018-10-08 04:32:58', '2018-10-08 04:32:58'),
(16, 27, 'Final', 1, '2018-10-10 07:28:41', '2018-10-10 07:28:41'),
(17, 24, 'Final', 1, '2018-10-16 05:33:53', '2018-10-16 05:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Column 3` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_individual_result`
--

CREATE TABLE `tbl_individual_result` (
  `individual_result_id` int(11) UNSIGNED NOT NULL,
  `student_roll_number` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `class_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `exam_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_markantry`
--

CREATE TABLE `tbl_markantry` (
  `marks_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `written_marks` double(11,2) NOT NULL,
  `mcq_marks` double(10,2) DEFAULT NULL,
  `practical_marks` double(10,2) DEFAULT NULL,
  `total_marks` double(10,2) NOT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `gpa` double(10,2) DEFAULT NULL,
  `publication_status` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_markantry`
--

INSERT INTO `tbl_markantry` (`marks_id`, `student_id`, `class_id`, `exam_id`, `subject_id`, `session_id`, `written_marks`, `mcq_marks`, `practical_marks`, `total_marks`, `grade`, `gpa`, `publication_status`, `created_at`, `updated_at`) VALUES
(136, 29, 23, 11, 43, 1, 67.00, 23.00, 0.00, 90.00, 'A+', 5.00, 1, '2018-10-16 05:29:48', '2018-10-16 05:29:48'),
(137, 29, 23, 11, 44, 1, 78.00, 0.00, 0.00, 78.00, 'A', 4.00, 1, '2018-10-16 05:30:12', '2018-10-16 05:30:12'),
(138, 30, 24, 17, 42, 2, 67.00, 0.00, 0.00, 67.00, 'A-', 3.50, 1, '2018-10-16 05:34:32', '2018-10-16 05:34:32'),
(139, 30, 24, 17, 42, 3, 45.00, 0.00, 0.00, 45.00, 'C', 2.00, 1, '2018-10-16 05:38:17', '2018-10-16 05:38:17'),
(140, 30, 24, 17, 42, 1, 40.00, 0.00, 0.00, 40.00, 'C', 2.00, 1, '2018-10-16 05:45:44', '2018-10-16 05:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `session_id` int(11) UNSIGNED NOT NULL,
  `session_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_start_date` date NOT NULL,
  `session_end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`session_id`, `session_name`, `session_start_date`, `session_end_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, '2016', '2016-01-01', '2016-12-31', '2018-10-15 05:26:35', '2018-10-15 05:26:35', NULL, NULL, 1),
(2, '2017', '2017-01-01', '2017-12-31', '2018-10-15 05:30:16', '2018-10-15 05:30:16', NULL, NULL, 1),
(3, '2018', '2018-01-31', '2018-12-31', '2018-10-15 08:00:34', '2018-10-15 08:00:34', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `section_name` varchar(255) DEFAULT '0',
  `Student_full_name` varchar(255) NOT NULL,
  `student_roll_number` int(11) NOT NULL,
  `student_reg_number` int(11) NOT NULL,
  `student_type` varchar(255) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_dob` varchar(255) DEFAULT NULL,
  `publication_status` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `class_id`, `session_id`, `section_name`, `Student_full_name`, `student_roll_number`, `student_reg_number`, `student_type`, `student_email`, `student_gender`, `student_dob`, `publication_status`, `created_at`, `updated_at`) VALUES
(29, 23, 1, '20', 'Masud Parbhez', 1, 616176, 'Regular', 'masud.affb@gmail.com', 'Male', '1996-01-02', 1, '2018-10-16 05:21:31', '2018-10-16 05:21:31'),
(30, 24, 2, '20', 'Ahadul Islam', 1, 616176, 'Regular', 'pavel.affb@gmail.com', 'Male', '1995-01-02', 1, '2018-10-16 05:22:52', '2018-10-16 05:22:52'),
(31, 22, 3, '20', 'Saiful Islam', 1, 616176, 'Regular', 'saiful.affb@gmail.com', 'Male', '1994-02-03', 1, '2018-10-16 05:23:49', '2018-10-16 05:23:49'),
(32, 25, 2, '21', 'Azim Uddin', 3, 616176, 'Regular', 'azim@gmail.com', 'Male', '1996-03-04', 1, '2018-10-16 05:37:36', '2018-10-16 05:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `subjective` int(11) NOT NULL,
  `objective` int(11) NOT NULL,
  `practical` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `class_id`, `subject_name`, `subject_code`, `subjective`, `objective`, `practical`, `created_at`, `updated_at`) VALUES
(30, 26, 'Arabi', 101, 70, 30, 0, '2018-10-09 07:18:44', '2018-10-09 07:22:10'),
(31, 26, 'Hadith', 102, 70, 30, 0, '2018-10-09 07:20:55', '2018-10-09 07:20:55'),
(32, 26, 'Physics', 104, 50, 25, 25, '2018-10-09 07:21:29', '2018-10-09 07:21:29'),
(33, 26, 'Chemistry', 108, 50, 25, 25, '2018-10-09 07:21:52', '2018-10-09 07:21:52'),
(34, 10, 'Bangla', 101, 100, 0, 0, '2018-10-09 10:07:33', '2018-10-09 10:07:33'),
(35, 27, 'Bangla', 101, 100, 0, 0, '2018-10-10 07:29:32', '2018-10-10 07:29:32'),
(36, 27, 'Math', 102, 100, 0, 0, '2018-10-10 07:29:54', '2018-10-10 07:29:54'),
(37, 27, 'English', 104, 100, 0, 0, '2018-10-10 07:30:17', '2018-10-10 07:30:17'),
(38, 27, 'Physics', 223, 50, 25, 25, '2018-10-10 07:31:07', '2018-10-10 07:31:07'),
(39, 27, 'Chemistry', 224, 50, 25, 25, '2018-10-10 07:31:51', '2018-10-10 07:31:51'),
(40, 27, 'Biology', 245, 50, 25, 25, '2018-10-10 07:32:22', '2018-10-10 07:32:22'),
(41, 27, 'ICT', 270, 70, 30, 0, '2018-10-10 07:33:05', '2018-10-10 07:33:05'),
(42, 24, 'Bangla', 101, 70, 30, 0, '2018-10-16 05:27:03', '2018-10-16 05:27:03'),
(43, 23, 'Math', 102, 70, 30, 0, '2018-10-16 05:27:39', '2018-10-16 05:27:39'),
(44, 23, 'English', 104, 100, 0, 0, '2018-10-16 05:28:13', '2018-10-16 05:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_combination`
--

CREATE TABLE `tbl_subject_combination` (
  `subject_combination_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_combine_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_name`, `email`, `password`, `remember_token`, `address`, `contact`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, 'masud parbhez', 'masud', 'masud.affb@gmail.com', '$2y$10$9HdtdYXKqjLlLxZ4xenhcu3Y1qfRMq/MSgKP0Vmb0b5Ix.HT./xUq', 'KJJr3Ba1XaaDOWgO4yAouEJW0H8auIMyQacE8WxW', 'feni', '01778565179', 1, '2018-10-02 08:07:57', '2018-10-02 08:07:57', NULL, NULL),
(8, 'masud parbhez', 'parbhez', 'hello.affb@gmail.com', '$2y$10$HUWXRO5gmIelsKUWcGkseOaJvgBTpPNzLqkb48knrYPXm5RDZbxY2', 'KJJr3Ba1XaaDOWgO4yAouEJW0H8auIMyQacE8WxW', 'dhaka', '107578948', 1, '2018-10-02 08:10:00', '2018-10-02 08:10:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_class_setup`
--
ALTER TABLE `tbl_class_setup`
  ADD PRIMARY KEY (`class_setup_id`);

--
-- Indexes for table `tbl_class_wise_result`
--
ALTER TABLE `tbl_class_wise_result`
  ADD PRIMARY KEY (`class_wise_result_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_individual_result`
--
ALTER TABLE `tbl_individual_result`
  ADD PRIMARY KEY (`individual_result_id`);

--
-- Indexes for table `tbl_markantry`
--
ALTER TABLE `tbl_markantry`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `tbl_session_session_name_unique` (`session_name`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_subject_combination`
--
ALTER TABLE `tbl_subject_combination`
  ADD PRIMARY KEY (`subject_combination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_class_setup`
--
ALTER TABLE `tbl_class_setup`
  MODIFY `class_setup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_class_wise_result`
--
ALTER TABLE `tbl_class_wise_result`
  MODIFY `class_wise_result_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `exam_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_individual_result`
--
ALTER TABLE `tbl_individual_result`
  MODIFY `individual_result_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_markantry`
--
ALTER TABLE `tbl_markantry`
  MODIFY `marks_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `session_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_subject_combination`
--
ALTER TABLE `tbl_subject_combination`
  MODIFY `subject_combination_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
