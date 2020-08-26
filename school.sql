-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 01:56 PM
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
  `fees_submitted_date` date NOT NULL,
  `fees_student_id` int(11) NOT NULL,
  `fees_is_submitted` bit(1) NOT NULL,
  `fees_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `fees_student_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_sheets`
--

INSERT INTO `fee_sheets` (`fees_id`, `fees_submitted_date`, `fees_student_id`, `fees_is_submitted`, `fees_is_active`, `created`, `fees_student_class_id`) VALUES
(1, '2020-08-22', 18, b'1', 1, '2020-08-22 18:25:44', 0);

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
  `student_name` varchar(50) NOT NULL,
  `student_contact` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_father_name` varchar(50) NOT NULL,
  `student_father_cnic` varchar(50) NOT NULL,
  `student_image` text NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `student_section_id` int(11) NOT NULL,
  `student_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_contact`, `student_email`, `student_address`, `student_father_name`, `student_father_cnic`, `student_image`, `student_class_id`, `student_section_id`, `student_is_active`, `created`) VALUES
(17, 'test', '0300-0000000', 'admin@admin', '2132 H block', 'father name ', '00000-0000000-0', 'Home-Tilerbytrade18.jpg', 7, 13, 1, '2020-08-21 22:51:44'),
(18, 'Hello', '0300-0000000', 'tevaneg486@ioxmail.net', 'H # test, Block Test, Updated.', 'Father Of Updated', '00000-0000000-0', 'Capture_d%u2019écran_2020-06-21_à_07_20_59_(2)9.png', 7, 14, 1, '2020-08-21 22:52:35'),
(19, 'Hello', '0300-0000000', 'test@test', '2132 H block', 'father name ', '00000-0000000-0', 'Capture_d%u2019écran_2020-06-21_à_07_20_59_(2)12.png', 5, 14, 1, '2020-08-21 22:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_cnic` varchar(50) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_contact` varchar(50) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_image` text NOT NULL,
  `teacher_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_cnic`, `teacher_email`, `teacher_contact`, `teacher_address`, `teacher_image`, `teacher_is_active`, `created`) VALUES
(2, 'Hello', '35468-9465465-4', 'tevaneg486@ioxmail.net', '0351-4564456', '132 X B Cantt', 'img_0669.jpg', 1, '2020-08-19 00:00:00'),
(3, 'test', '53545-5466457-7', 'ar@bhatti.com', '0351-3245646', '4326466 AADS QWED ', 'download.png', 1, '2020-08-19 00:00:00');

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
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

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
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
