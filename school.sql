-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 08:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_description` text NOT NULL,
  `class_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_description`, `class_is_active`, `created`) VALUES
(4, 'Class 1', 'Class 1 ', 1, '2020-08-21 22:49:51'),
(5, 'Class 2', 'Class 2', 1, '2020-08-21 22:49:59'),
(6, 'Class 3', 'Class 3', 1, '2020-08-21 22:50:06'),
(7, 'Class 4', 'Class 4', 1, '2020-08-21 22:50:12'),
(8, 'Class 5', 'Class 5', 1, '2020-08-21 22:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_level` int(11) NOT NULL,
  `course_publisher_name` varchar(255) NOT NULL,
  `course_medium` varchar(50) NOT NULL,
  `course_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_level`, `course_publisher_name`, `course_medium`, `course_is_active`, `created`) VALUES
(2, 'test', 4, 'Unkown', 'English', 1, '2020-08-19 00:00:00'),
(3, 'test', 2, 'Unkown', 'English', 1, '2020-08-20 00:00:00'),
(4, 'Hello', 2, 'Unkown', 'English', 1, '2020-08-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_sheets`
--

CREATE TABLE `fee_sheets` (
  `fees_id` int(11) NOT NULL,
  `fees_student_id` int(11) NOT NULL,
  `fees_student_class_id` int(11) NOT NULL,
  `fees_student_class_section_id` int(11) NOT NULL,
  `fees_submitted_amount` float NOT NULL,
  `fees_submitted_date` date DEFAULT NULL,
  `fees_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `fees_is_submitted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_sheets`
--

INSERT INTO `fee_sheets` (`fees_id`, `fees_student_id`, `fees_student_class_id`, `fees_student_class_section_id`, `fees_submitted_amount`, `fees_submitted_date`, `fees_is_active`, `fees_is_submitted`, `created`) VALUES
(71, 17, 8, 13, 3000, '2020-08-27', 1, 1, '2020-08-27 17:55:27'),
(72, 18, 7, 14, 2800, '2020-08-27', 1, 1, '2020-08-27 17:55:27'),
(73, 19, 5, 14, 3200, NULL, 0, 0, '2020-08-27 17:55:27'),
(74, 20, 8, 14, 3500, NULL, 0, 0, '2020-08-27 17:55:27'),
(75, 18, 6, 15, 500, '2020-08-27', 1, 1, '2020-08-27 17:55:53'),
(76, 17, 8, 13, 3000, NULL, 0, 0, '2020-08-27 18:12:44'),
(77, 18, 7, 14, 2800, NULL, 0, 0, '2020-08-27 18:12:44'),
(78, 19, 5, 14, 3200, NULL, 0, 0, '2020-08-27 18:12:44'),
(79, 20, 8, 14, 3500, NULL, 1, 0, '2020-08-27 18:12:44'),
(80, 17, 8, 13, 3000, NULL, 0, 0, '2020-08-27 18:14:37'),
(81, 18, 7, 14, 2800, NULL, 0, 0, '2020-08-27 18:14:37'),
(82, 19, 5, 14, 3200, NULL, 0, 0, '2020-08-27 18:14:37'),
(83, 20, 8, 14, 3500, NULL, 0, 0, '2020-08-27 18:14:37'),
(84, 17, 8, 13, 3000, NULL, 0, 0, '2020-08-27 18:25:46'),
(85, 18, 7, 14, 2800, NULL, 0, 0, '2020-08-27 18:25:46'),
(86, 19, 5, 14, 3200, NULL, 0, 0, '2020-08-27 18:25:46'),
(87, 20, 8, 14, 3500, NULL, 0, 0, '2020-08-27 18:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_description` text NOT NULL,
  `section_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_description`, `section_is_active`, `created`) VALUES
(12, 'Red', 'Red', 1, '2020-08-21 22:50:46'),
(13, 'Green', 'Green', 1, '2020-08-21 22:50:53'),
(14, 'Yellow', 'Yellow', 1, '2020-08-21 22:50:59'),
(15, 'A', 'A', 1, '2020-08-21 22:51:04'),
(16, 'B', 'B', 1, '2020-08-21 22:51:08'),
(17, 'C', 'C', 1, '2020-08-21 22:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_identification` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_father_name` varchar(50) NOT NULL,
  `student_father_cnic` varchar(50) NOT NULL,
  `student_image` text NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `student_section_id` int(11) NOT NULL,
  `student_admission_fee` float NOT NULL,
  `student_tuition_fee` float NOT NULL,
  `student_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_identification`, `student_name`, `student_contact`, `student_email`, `student_address`, `student_father_name`, `student_father_cnic`, `student_image`, `student_class_id`, `student_section_id`, `student_admission_fee`, `student_tuition_fee`, `student_is_active`, `created`) VALUES
(17, '25', 'test', '0300-0000000', 'admin@admin', '2132 H block', 'father name ', '00000-0000000-0', 'Blue_Simple_Class_Schedule.jpg', 8, 13, 12000, 3000, 1, '2020-08-21 22:51:44'),
(18, '32', 'World', '0300-0000000', 'tevaneg486@ioxmail.net', 'H # test, Block Test, Updated.', 'Father Of Updated', '00000-0000000-0', 'gaming-wallpapers-93.jpg', 7, 14, 14000, 2800, 1, '2020-08-21 22:52:35'),
(19, '27', 'Hello', '0300-0000000', 'test@test', '2132 H block', 'father name ', '00000-0000000-0', 'gaming-wallpapers-94.jpg', 5, 14, 11000, 3200, 1, '2020-08-21 22:53:04'),
(20, '28', 'Ali', '0300-4521245', 'ali@yahoo.com', 'H # 123, Shalimar Road, Lahore', 'Father name', '35125-5054605-6', 'gaming-wallpapers-92.jpg', 8, 14, 15000, 3500, 1, '2020-08-26 23:01:57'),
(21, '29', 'Hassan', '0300-0000000', 'hassan@hassan.com', 'H#1, St#2, Block A, City.', 'Father', '00000-0000000-0', 'Blue_Simple_Class_Schedule1.png', 7, 17, 5500, 1800, 1, '2020-08-27 19:46:37'),
(22, '30', 'asd', '0300-0000000', 'admin@admin', '0000', '000', '00000-0000000-0', 'Blue_Simple_Class_Schedule3.png', 7, 15, 500, 5500, 1, '2020-08-27 19:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_identification` varchar(50) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_cnic` varchar(50) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_contact` varchar(50) NOT NULL,
  `teacher_salary` float NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_image` text NOT NULL,
  `teacher_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_identification`, `teacher_name`, `teacher_cnic`, `teacher_email`, `teacher_contact`, `teacher_salary`, `teacher_address`, `teacher_image`, `teacher_is_active`, `created`) VALUES
(2, '25', 'Hello', '35468-9465465-4', 'tevaneg486@ioxmail.net', '0351-4564456', 0, '132 X B Cantt', 'Blue_Simple_Class_Schedule.png', 1, '2020-08-19 00:00:00'),
(3, '27', 'test', '53545-5466457-7', 'ar@bhatti.com', '0351-3245646', 0, '4326466 AADS QWED ', 'download.png', 1, '2020-08-19 00:00:00'),
(4, '26', 'asd', '00000-0000000-0', 'admin@admin', '0300-0000000', 0, '0000', 'Blue_Simple_Class_Schedule1.png', 1, '2020-08-27 21:23:27'),
(5, '28', 'Test', '00000-0000000-0', 'test@test', '0300-0000000', 80000, 'TEST', 'Blue_Simple_Class_Schedule2.png', 1, '2020-08-27 21:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `fee_sheets`
--
ALTER TABLE `fee_sheets`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_identification` (`student_identification`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_identification` (`teacher_identification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_sheets`
--
ALTER TABLE `fee_sheets`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
