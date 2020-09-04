-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 09:22 PM
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
(95, 17, 8, 13, 3000, '2020-08-31', 1, 1, '2020-08-31 17:32:47'),
(96, 18, 7, 14, 2800, '2020-08-31', 1, 1, '2020-08-31 17:32:47'),
(97, 19, 5, 14, 3200, '2020-08-31', 1, 1, '2020-08-31 17:32:47'),
(98, 20, 8, 14, 3500, '2020-08-31', 1, 1, '2020-08-31 17:32:47'),
(99, 21, 7, 17, 1800, '2020-08-31', 1, 1, '2020-08-31 17:32:47'),
(100, 22, 7, 15, 5500, '2020-08-31', 1, 1, '2020-08-31 17:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `result_student_id` int(11) NOT NULL,
  `result_student_class_section_id` int(11) NOT NULL,
  `result_total_marks` float NOT NULL,
  `result_obtained_marks` float NOT NULL,
  `result_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `result_student_class_id` int(11) NOT NULL,
  `result_course_id` int(11) NOT NULL,
  `result_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `result_student_id`, `result_student_class_section_id`, `result_total_marks`, `result_obtained_marks`, `result_is_active`, `created`, `result_student_class_id`, `result_course_id`, `result_date`) VALUES
(11, 22, 15, 0, 0, 1, '2020-09-01 17:35:12', 7, 0, NULL),
(12, 21, 17, 0, 0, 1, '2020-09-01 17:35:12', 7, 0, NULL),
(13, 20, 14, 0, 0, 1, '2020-09-01 17:35:12', 8, 0, NULL),
(14, 19, 14, 0, 0, 1, '2020-09-01 17:35:12', 5, 0, NULL),
(15, 18, 14, 0, 0, 1, '2020-09-01 17:35:12', 7, 0, NULL),
(16, 17, 13, 0, 0, 1, '2020-09-01 17:35:12', 8, 0, NULL),
(17, 21, 16, 0, 0, 1, '2020-09-02 00:00:12', 7, 0, '2020-09-01'),
(18, 22, 16, 0, 0, 1, '2020-09-02 00:00:44', 7, 0, '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `salary_teacher_id` int(11) NOT NULL,
  `salary_teacher_amount` float NOT NULL,
  `salary_paid_date` date DEFAULT NULL,
  `salary_is_paid` tinyint(1) NOT NULL COMMENT '1=Paid, 0=Unpaid',
  `salary_is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `salary_teacher_id`, `salary_teacher_amount`, `salary_paid_date`, `salary_is_paid`, `salary_is_active`, `created`) VALUES
(34, 7, 25000, NULL, 0, 1, '2020-08-31 17:47:12'),
(35, 6, 35000, '2020-08-31', 1, 1, '2020-08-31 17:47:12'),
(36, 5, 32000, NULL, 0, 1, '2020-08-31 17:47:12'),
(37, 4, 25000, NULL, 0, 1, '2020-08-31 17:47:12'),
(38, 2, 22000, NULL, 0, 1, '2020-08-31 17:47:12'),
(39, 3, 24000, NULL, 0, 1, '2020-08-31 17:47:12');

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
(17, '35', 'test', '0300-0000000', 'admin@admin', '2132 H block', 'father name ', '00000-0000000-0', 'CountyLines2-1980x2140.png', 8, 13, 12000, 3000, 1, '2020-08-21 22:51:44'),
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
(2, 'T005', 'Sir Zameer', '35468-9465465-4', 'tevaneg486@ioxmail.net', '0351-4564456', 22000, '132 X B Cantt', 'Blue_Simple_Class_Schedule.png', 1, '2020-08-19 00:00:00'),
(3, 'A006', 'Sir Khurram', '53545-5466457-7', 'ar@bhatti.com', '0351-3245646', 24000, '4326466 AADS QWED ', 'download.png', 1, '2020-08-19 00:00:00'),
(4, 'T004', 'Sir Amanat', '00000-0000000-0', 'admin@admin', '0300-0000000', 25000, '0000', 'CountyLines2-1980x21401.png', 1, '2020-08-27 21:23:27'),
(5, 'T003', 'Rose', '00000-0000000-0', 'test@test', '0300-0000000', 32000, 'TEST', 'vice-principal2.jpg', 1, '2020-08-27 21:49:10'),
(6, 'T002', 'Alexa', '00000-0000000-0', 'Email@email.com', '0300-0000000', 35000, 'address', 'teacher-incharge.jpg', 1, '2020-08-28 16:30:19'),
(7, 'T001', 'Julia', '00000-0000000-0', 'Email@email.com', '0300-0000000', 25000, 'Address', 'teacher1.jpg', 1, '2020-08-28 16:31:18');

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

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
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
