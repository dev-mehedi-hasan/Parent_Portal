-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 03:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_id` int(11) NOT NULL,
  `academic_id` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_id`, `academic_id`, `user_type`, `name`, `email`, `password`, `mobile_no`, `address`, `date_of_birth`, `image`) VALUES
(1, 'Sakhawat-1100', 'admin', 'Sakhawat Hossen', 'sakhawat@diu.edu.bd', '1234', '01797867581', '224/7,Panthapath,Dhanmondi-1207', '1980-07-10', 'ljhgh/agsgsa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `Attendance_id` int(11) NOT NULL,
  `Enrolled_course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `behavioural_assesments`
--

CREATE TABLE `behavioural_assesments` (
  `Behavioural_assesment_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `Semester_id` int(11) NOT NULL,
  `class_performance` varchar(100) DEFAULT NULL,
  `manner` varchar(100) DEFAULT NULL,
  `class_attendance` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `behavioural_assesments`
--

INSERT INTO `behavioural_assesments` (`Behavioural_assesment_id`, `Student_id`, `Teacher_id`, `Semester_id`, `class_performance`, `manner`, `class_attendance`, `comment`, `date`) VALUES
(1, 1, 1, 1, 'Very Good', 'Polite', 80, 'He has done great.', '2019-09-18 02:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `Chat_id` int(11) NOT NULL,
  `Sender_id` int(11) NOT NULL,
  `Receiver_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`Chat_id`, `Sender_id`, `Receiver_id`, `message`, `time`) VALUES
(1, 1, 2, 'hello', '2019-07-16 19:36:00'),
(2, 2, 1, 'How are you?', '2019-07-19 16:36:55'),
(3, 2, 1, 'I am fine.', '2019-07-22 15:57:11'),
(4, 4, 1, 'Hi,Are you there?', '2019-07-23 08:41:28'),
(5, 4, 3, 'Hi', '2019-07-23 08:42:46'),
(7, 3, 4, 'Hello', '2019-07-23 08:43:45'),
(8, 1, 2, 'u there?', '2019-07-23 16:38:41'),
(9, 2, 1, 'Yes,I am here.', '2019-07-23 17:39:10'),
(10, 1, 2, 'Actually I have needed of a help.', '2019-07-23 17:40:03'),
(12, 1, 4, 'hello teacher', '2019-07-24 09:33:40'),
(13, 1, 2, 'When will u get free', '2019-07-24 09:38:01'),
(14, 2, 1, 'hi', '2019-09-16 18:29:38'),
(15, 2, 1, 'hello', '2019-09-17 11:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `Chat_user_id` int(11) NOT NULL,
  `Parent_id` int(11) DEFAULT NULL,
  `Teacher_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`Chat_user_id`, `Parent_id`, `Teacher_id`, `user_type`) VALUES
(1, 1, NULL, 'parent'),
(2, NULL, 1, 'teacher'),
(3, 2, NULL, 'parent'),
(7, NULL, 2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `class_diaries`
--

CREATE TABLE `class_diaries` (
  `Class_diary_id` int(11) NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `teacher_comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_diaries`
--

INSERT INTO `class_diaries` (`Class_diary_id`, `Teacher_id`, `Student_id`, `teacher_comment`, `date`) VALUES
(1, 1, 1, 'Mehedi Hasan has missed the class of today.', '2019-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_id` int(11) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_credit` int(11) NOT NULL,
  `credit_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_id`, `Department_id`, `course_code`, `course_name`, `course_credit`, `credit_hour`) VALUES
(1, 1, 'SE224', '	Database Systems Lab', 1, 10),
(2, 1, 'SE223', 'Database Systems', 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `faculty` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_id`, `department_name`, `faculty`) VALUES
(1, 'Software Engineering', 'FSIT'),
(2, 'Computer Science Engineering', 'FSIT'),
(3, 'Electrical & Electronic Engineering', 'FSIT');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `Enrolled_course_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Section_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`Enrolled_course_id`, `Student_id`, `Section_id`, `Course_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 3, 1, 2),
(4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `live_results`
--

CREATE TABLE `live_results` (
  `Live_result_id` int(11) NOT NULL,
  `Enrolled_course_id` int(11) NOT NULL,
  `quiz_1` double NOT NULL,
  `quiz_2` double NOT NULL,
  `quiz_3` double NOT NULL,
  `mid_term_result` double NOT NULL,
  `assignment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `Notice_id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`Notice_id`, `Admin_id`, `Department_id`, `title`, `description`, `file_name`, `file_url`, `date`) VALUES
(1, 1, 1, 'Mid Term Schedule', 'Final Version of Exam Schedule', NULL, NULL, '2019-07-13'),
(5, 1, 3, 'Updated Notice for Korea Trip', 'There is a good opportunity for 10-12 DIU EEE students to go to Korea Tech for three weeks starting Dec 24th, 2019 (after semester final exams) to learn about energy management and renewable energy.', 'diu_notice(1).docx', 'notice/diu_notice(1).docx', '2019-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `Parent_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_email` varchar(50) NOT NULL,
  `parent_password` varchar(32) NOT NULL,
  `parent_mobile_no` varchar(16) NOT NULL,
  `parent_address` text NOT NULL,
  `parent_profession` varchar(30) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `parent_date_of_birth` date NOT NULL,
  `parent_image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`Parent_id`, `Student_id`, `user_type`, `parent_name`, `parent_email`, `parent_password`, `parent_mobile_no`, `parent_address`, `parent_profession`, `relation`, `parent_date_of_birth`, `parent_image`) VALUES
(1, 1, 'parent', 'Meherun Nahar', 'meherun694@diu.edu.bd', '1234', '01725393726', 'Thanapara,Ghatail-1980,Tangail', 'Service Holder', 'Mother', '1971-01-07', '/images/parent/picture/meherunnahar.jpg'),
(2, 2, 'parent', 'Abdul Jalil', 'jalil@diu.edu.bd', '1234', '01718622207', 'Ghordour,Lauhajong,Munshigonj', 'Business', 'Father', '1969-07-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_ledgers`
--

CREATE TABLE `payment_ledgers` (
  `Payment_ledger_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Semester_id` int(11) NOT NULL,
  `total_credits` int(11) NOT NULL,
  `total_payable` double NOT NULL,
  `total_paid` double NOT NULL,
  `waiver` varchar(254) DEFAULT NULL,
  `total_due` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_ledgers`
--

INSERT INTO `payment_ledgers` (`Payment_ledger_id`, `Student_id`, `Semester_id`, `total_credits`, `total_payable`, `total_paid`, `waiver`, `total_due`) VALUES
(1, 1, 1, 7, 28000, 14000, '0%', 14000),
(2, 2, 1, 7, 30000, 20000, NULL, 10000),
(3, 2, 1, 7, 30000, 20000, NULL, 10000),
(4, 2, 1, 7, 30000, 20000, NULL, 10000),
(5, 2, 1, 7, 30000, 20000, NULL, 10000),
(6, 2, 1, 7, 30000, 20000, NULL, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Result_id` int(11) NOT NULL,
  `Enrolled_course_id` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `GPA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Result_id`, `Enrolled_course_id`, `grade`, `GPA`) VALUES
(1, 1, 'A', 3.5),
(2, 2, 'A-', 3.75),
(3, 2, 'A', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `Section_id` int(11) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `Semester_id` int(11) NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `level_term` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`Section_id`, `Department_id`, `Semester_id`, `Teacher_id`, `level_term`, `name`, `capacity`) VALUES
(1, 1, 1, 2, 'Level-1:Term-1', 'A', 40),
(2, 1, 2, 2, 'Level-1:Term-2', 'A', 40),
(3, 2, 1, 2, 'Level-3:Term-1', 'B', 35);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `Semester_id` int(11) NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`Semester_id`, `semester_name`, `start_date`, `end_date`) VALUES
(1, 'Summer-2019', '2019-04-16', '2019-08-30'),
(2, 'Fall-2019', '2019-09-20', '2019-12-24'),
(3, 'Fall-2019', '2019-09-10', '2019-12-24'),
(4, 'Spring-2020', '2019-09-16', '2019-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(11) NOT NULL,
  `student_academic_id` varchar(100) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(32) NOT NULL,
  `student_mobile_no` varchar(15) NOT NULL,
  `student_present_address` text NOT NULL,
  `student_permanent_address` text NOT NULL,
  `student_date_of_birth` date NOT NULL,
  `student_image` varchar(253) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `student_academic_id`, `Department_id`, `student_name`, `student_email`, `student_password`, `student_mobile_no`, `student_present_address`, `student_permanent_address`, `student_date_of_birth`, `student_image`) VALUES
(1, '142-35-694', 1, 'Mehedi Hasan', 'mehedi694@diu.edu.bd', '1234', '01792095970', '727/2,West Kazipara,Mirpur-1216,Dhaka', 'Thanapara,Ghatail-1980,Tangail', '1994-01-11', 'images/student/picture/mehedi.jpg'),
(3, '152-35-1197', 1, 'Abu Sufian Al Sami', 'sufian35-1197@diu.edu.bd', '1234', '01689857471', 'East Rajabazar,Tejgaon', 'Kadamtoli,Ghatail-1980,Tangail', '1996-09-11', 'images/student/picture15232273_763261623825848_5624563984629836274_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Teacher_id` int(11) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_password` varchar(32) NOT NULL,
  `teacher_designation` varchar(100) NOT NULL,
  `teacher_mobile_no` varchar(16) NOT NULL,
  `teacher_address` text NOT NULL,
  `teacher_date_of_birth` date NOT NULL,
  `teacher_image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Teacher_id`, `Department_id`, `user_type`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_designation`, `teacher_mobile_no`, `teacher_address`, `teacher_date_of_birth`, `teacher_image`) VALUES
(1, 1, 'teacher', 'Mr. Md. Anwar Hossen', 'anwar.swe@diu.edu.bd', '1234', 'Lecturer', '01677893342', '333/3,Lake Circus,Dhanmondi-1207', '2019-09-03', '/images/teacher/picture/Mr. Md. Anwar Hossen.png'),
(2, 1, 'Teacher', 'Mr.Robertson', 'robertson@diu.edu.bd', '1234', 'Associate Professor', '+44-3444-223', '35,Block-D,Gulshan-1', '1988-03-18', '/images/teacher/picture/shohelsir.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `academic_id` (`academic_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`Attendance_id`),
  ADD KEY `Enrolled_course_id` (`Enrolled_course_id`);

--
-- Indexes for table `behavioural_assesments`
--
ALTER TABLE `behavioural_assesments`
  ADD PRIMARY KEY (`Behavioural_assesment_id`),
  ADD KEY `Semester_id` (`Semester_id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Teacher_id` (`Teacher_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`Chat_id`),
  ADD KEY `Sender_id` (`Sender_id`),
  ADD KEY `Receiver_id` (`Receiver_id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`Chat_user_id`),
  ADD KEY `Teacher_id` (`Teacher_id`),
  ADD KEY `Parent_id` (`Parent_id`);

--
-- Indexes for table `class_diaries`
--
ALTER TABLE `class_diaries`
  ADD PRIMARY KEY (`Class_diary_id`),
  ADD KEY `Teacher_id` (`Teacher_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`Enrolled_course_id`),
  ADD KEY `Section_id` (`Section_id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Course_id` (`Course_id`);

--
-- Indexes for table `live_results`
--
ALTER TABLE `live_results`
  ADD PRIMARY KEY (`Live_result_id`),
  ADD KEY `Enrolled_course_id` (`Enrolled_course_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`Notice_id`),
  ADD KEY `Admin_id` (`Admin_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`Parent_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `payment_ledgers`
--
ALTER TABLE `payment_ledgers`
  ADD PRIMARY KEY (`Payment_ledger_id`),
  ADD KEY `Semester_id` (`Semester_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Result_id`),
  ADD KEY `Enrolled_course_id` (`Enrolled_course_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`Section_id`),
  ADD KEY `Semester_id` (`Semester_id`),
  ADD KEY `Teacher_id` (`Teacher_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`Semester_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`),
  ADD UNIQUE KEY `academic_id` (`student_academic_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `Attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `behavioural_assesments`
--
ALTER TABLE `behavioural_assesments`
  MODIFY `Behavioural_assesment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `Chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `Chat_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_diaries`
--
ALTER TABLE `class_diaries`
  MODIFY `Class_diary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `Enrolled_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `live_results`
--
ALTER TABLE `live_results`
  MODIFY `Live_result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `Notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `Parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_ledgers`
--
ALTER TABLE `payment_ledgers`
  MODIFY `Payment_ledger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `Section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `Semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`Enrolled_course_id`) REFERENCES `enrolled_courses` (`Enrolled_course_id`);

--
-- Constraints for table `behavioural_assesments`
--
ALTER TABLE `behavioural_assesments`
  ADD CONSTRAINT `behavioural_assesments_ibfk_1` FOREIGN KEY (`Semester_id`) REFERENCES `semesters` (`Semester_id`),
  ADD CONSTRAINT `behavioural_assesments_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Student_id`),
  ADD CONSTRAINT `behavioural_assesments_ibfk_3` FOREIGN KEY (`Teacher_id`) REFERENCES `teachers` (`Teacher_id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`Sender_id`) REFERENCES `chat_users` (`Chat_user_id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`Receiver_id`) REFERENCES `chat_users` (`Chat_user_id`);

--
-- Constraints for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD CONSTRAINT `chat_users_ibfk_1` FOREIGN KEY (`Teacher_id`) REFERENCES `teachers` (`Teacher_id`),
  ADD CONSTRAINT `chat_users_ibfk_2` FOREIGN KEY (`Parent_id`) REFERENCES `parents` (`Parent_id`);

--
-- Constraints for table `class_diaries`
--
ALTER TABLE `class_diaries`
  ADD CONSTRAINT `class_diaries_ibfk_1` FOREIGN KEY (`Teacher_id`) REFERENCES `teachers` (`Teacher_id`),
  ADD CONSTRAINT `class_diaries_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Student_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `departments` (`Department_id`);

--
-- Constraints for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD CONSTRAINT `enrolled_courses_ibfk_1` FOREIGN KEY (`Section_id`) REFERENCES `sections` (`Section_id`),
  ADD CONSTRAINT `enrolled_courses_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Student_id`),
  ADD CONSTRAINT `enrolled_courses_ibfk_3` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`);

--
-- Constraints for table `live_results`
--
ALTER TABLE `live_results`
  ADD CONSTRAINT `live_results_ibfk_1` FOREIGN KEY (`Enrolled_course_id`) REFERENCES `enrolled_courses` (`Enrolled_course_id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admins` (`Admin_id`),
  ADD CONSTRAINT `notices_ibfk_2` FOREIGN KEY (`Department_id`) REFERENCES `departments` (`Department_id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `departments` (`Department_id`),
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`Semester_id`) REFERENCES `semesters` (`Semester_id`),
  ADD CONSTRAINT `sections_ibfk_3` FOREIGN KEY (`Teacher_id`) REFERENCES `teachers` (`Teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
