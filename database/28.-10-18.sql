-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table srms.tbl_class
CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `class_section` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_class: ~5 rows (approximately)
DELETE FROM `tbl_class`;
/*!40000 ALTER TABLE `tbl_class` DISABLE KEYS */;
INSERT INTO `tbl_class` (`class_id`, `class_name`, `class_section`, `created_at`, `updated_at`) VALUES
	(1, 'One', 'A', '2018-09-29 14:17:02', '2018-09-29 14:17:02'),
	(2, 'Two', 'B', '2018-09-29 14:21:39', '2018-09-29 14:21:39'),
	(3, 'Three', 'C', '2018-09-29 14:22:55', '2018-09-30 14:26:19'),
	(4, 'Four', 'D', '2018-09-29 14:23:15', '2018-09-30 14:26:11'),
	(5, 'Five', 'E', '2018-09-29 14:23:48', '2018-09-30 14:26:14');
/*!40000 ALTER TABLE `tbl_class` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_exam
CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `exam_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) unsigned NOT NULL DEFAULT '0',
  `exam_name` varchar(255) NOT NULL DEFAULT '0',
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_exam: ~3 rows (approximately)
DELETE FROM `tbl_exam`;
/*!40000 ALTER TABLE `tbl_exam` DISABLE KEYS */;
INSERT INTO `tbl_exam` (`exam_id`, `class_id`, `exam_name`, `publication_status`, `created_at`, `updated_at`) VALUES
	(1, 1, '1st Terminal', 0, '2018-09-29 16:08:56', '2018-09-30 00:29:48'),
	(2, 4, '2nd Terminal', 1, '2018-09-29 16:09:43', '2018-09-30 14:26:52'),
	(3, 2, '3rd Terminal', 1, '2018-09-29 23:55:52', '2018-09-30 14:27:00');
/*!40000 ALTER TABLE `tbl_exam` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_individual_result
CREATE TABLE IF NOT EXISTS `tbl_individual_result` (
  `individual_result_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_roll_number` int(11) unsigned NOT NULL DEFAULT '0',
  `class_id` int(11) unsigned NOT NULL DEFAULT '0',
  `exam_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`individual_result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_individual_result: ~0 rows (approximately)
DELETE FROM `tbl_individual_result`;
/*!40000 ALTER TABLE `tbl_individual_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_individual_result` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_result
CREATE TABLE IF NOT EXISTS `tbl_result` (
  `result_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) unsigned NOT NULL DEFAULT '0',
  `exam_id` int(11) unsigned NOT NULL DEFAULT '0',
  `student_id` int(11) unsigned NOT NULL DEFAULT '0',
  `subject_id` int(11) unsigned DEFAULT '0',
  `written_marks` double(11,2) unsigned NOT NULL DEFAULT '0.00',
  `mcq_marks` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `practical_marks` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `total_marks` double(10,2) unsigned DEFAULT '0.00',
  `grade` varchar(50) DEFAULT '0',
  `gpa` double(10,2) DEFAULT '0.00',
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_result: ~1 rows (approximately)
DELETE FROM `tbl_result`;
/*!40000 ALTER TABLE `tbl_result` DISABLE KEYS */;
INSERT INTO `tbl_result` (`result_id`, `class_id`, `exam_id`, `student_id`, `subject_id`, `written_marks`, `mcq_marks`, `practical_marks`, `total_marks`, `grade`, `gpa`, `publication_status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 4, 0, 8.00, 8.00, 8.00, 0.00, '0', 0.00, 0, '2018-09-30 17:30:02', '2018-09-30 17:30:02'),
	(2, 2, 2, 6, 0, 45.00, 23.00, 21.00, 89.00, 'A+', 5.00, 0, '2018-09-30 23:02:09', '2018-09-30 23:02:09');
/*!40000 ALTER TABLE `tbl_result` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_student
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Student_full_name` varchar(255) NOT NULL,
  `student_roll_number` int(11) NOT NULL,
  `student_reg_number` int(11) NOT NULL,
  `student_session` varchar(255) NOT NULL,
  `student_type` varchar(255) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_gender` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `section_name` varchar(255) DEFAULT '0',
  `student_dob` varchar(255) DEFAULT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_student: ~4 rows (approximately)
DELETE FROM `tbl_student`;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` (`student_id`, `Student_full_name`, `student_roll_number`, `student_reg_number`, `student_session`, `student_type`, `student_email`, `student_gender`, `class_id`, `section_name`, `student_dob`, `publication_status`, `created_at`, `updated_at`) VALUES
	(4, 'Masud Parbhez', 1, 123, '2013-2014', 'regular', 'masud.affb@gmail.com', 'male', '1', '1', '1996-01-01', 1, '2018-09-30 14:28:08', '2018-09-30 14:28:08'),
	(5, 'Ahadul Islam', 2, 616176, '2013-14', 'regular', 'pavel.affb@gmail.com', 'male', '2', '2', '1997-09-01', 1, '2018-09-30 14:28:50', '2018-09-30 14:28:50'),
	(6, 'Saiful Islam', 3, 23654, '2010-11', 'regular', 'saiful.affb@gmail.com', 'male', '3', '3', '1997-09-30', 1, '2018-09-30 14:29:31', '2018-09-30 14:29:31'),
	(7, 'Pavel', 5, 1425, '2010-12', 'regular', 'pavel@gmail.com', 'male', '5', '4', '1997-20-12', 0, '2018-09-30 18:46:47', '2018-09-30 18:48:08');
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_subject
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL DEFAULT '0',
  `subject_code` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_subject: ~6 rows (approximately)
DELETE FROM `tbl_subject`;
/*!40000 ALTER TABLE `tbl_subject` DISABLE KEYS */;
INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `subject_code`, `created_at`, `updated_at`) VALUES
	(1, 'Bangla', 101, '2018-09-30 00:50:08', '2018-09-30 00:50:08'),
	(2, 'Bangla 2nd', 102, '2018-09-30 00:50:39', '2018-09-30 00:50:39'),
	(3, 'English 1st', 102, '2018-09-30 00:50:53', '2018-09-30 00:50:53'),
	(4, 'English 2nd', 103, '2018-09-30 00:51:04', '2018-09-30 00:51:04'),
	(5, 'Math', 105, '2018-09-30 00:51:21', '2018-09-30 00:51:21'),
	(6, 'Physics', 108, '2018-09-30 00:51:35', '2018-09-30 00:51:35'),
	(7, 'Chemistry', 109, '2018-09-30 00:51:46', '2018-09-30 00:52:09');
/*!40000 ALTER TABLE `tbl_subject` ENABLE KEYS */;

-- Dumping structure for table srms.tbl_subject_combination
CREATE TABLE IF NOT EXISTS `tbl_subject_combination` (
  `subject_combination_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) unsigned NOT NULL DEFAULT '0',
  `subject_id` int(11) unsigned NOT NULL DEFAULT '0',
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_combination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table srms.tbl_subject_combination: ~4 rows (approximately)
DELETE FROM `tbl_subject_combination`;
/*!40000 ALTER TABLE `tbl_subject_combination` DISABLE KEYS */;
INSERT INTO `tbl_subject_combination` (`subject_combination_id`, `class_id`, `subject_id`, `publication_status`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, '2018-09-30 01:35:12', '2018-09-30 09:43:50'),
	(2, 4, 5, 1, '2018-09-30 01:37:10', '2018-09-30 09:43:54'),
	(3, 6, 2, 1, '2018-09-30 01:37:31', '2018-09-30 09:43:57'),
	(4, 3, 5, 0, '2018-09-30 01:37:41', '2018-09-30 09:43:59');
/*!40000 ALTER TABLE `tbl_subject_combination` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
