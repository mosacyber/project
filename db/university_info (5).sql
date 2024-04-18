-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 أبريل 2024 الساعة 02:20
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_info`
--

-- --------------------------------------------------------

--
-- بنية الجدول `academic_advisor`
--

CREATE TABLE `academic_advisor` (
  `Academic_Advisor_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `academic_advisor`
--

INSERT INTO `academic_advisor` (`Academic_Advisor_ID`, `From_To`) VALUES
(123456, '2024-04-15'),
(233334, '2024-03-30');

-- --------------------------------------------------------

--
-- بنية الجدول `academic_advisor_for_student`
--

CREATE TABLE `academic_advisor_for_student` (
  `Academic_Advisor_ID` int(6) NOT NULL,
  `student_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `academic_advisor_for_student`
--

INSERT INTO `academic_advisor_for_student` (`Academic_Advisor_ID`, `student_id`) VALUES
(233334, 421002998);

-- --------------------------------------------------------

--
-- بنية الجدول `academic_record`
--

CREATE TABLE `academic_record` (
  `student_id` int(9) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `Semster_Number` int(3) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `academic_record`
--

INSERT INTO `academic_record` (`student_id`, `subject_code`, `Semster_Number`, `grade`) VALUES
(421002998, '1', 451, 66),
(421002998, '2', 461, 78),
(431002997, '1', 451, 99),
(431002997, '2', 461, 83),
(431002997, '3', 441, 5);

-- --------------------------------------------------------

--
-- بنية الجدول `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(9) NOT NULL COMMENT 'This ID is the same for each actor in real systems, such as student ID and faculty member ID.',
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Position` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Mobile`, `Position`) VALUES
(123456, 'موسى', 'بارقي', 'mosacyber@gmail.com', '$2y$10$JnK.CezNBRBxT8yIsYg7U.GeW2/Ja7EmY5IW6JyIiy9fKLjeSD./2', 559718489, 4),
(233334, 'موسى', 'بارقي', 'mosa@gmail.com', '123', 1234567890, 8),
(421002998, 'طالب ', 'جديد', 'mosa@gmail.com', '123', 1234567890, 1),
(431002997, 'f', 'ffffff', 'mosacyber@gmail.com', '$2y$10$T4m.sXR9WjwyPHKZYFV8q.U02hqb6ObO03diRIzv/alfD7HOAii1e', 559718489, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(2) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Admin_Email` varchar(30) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL,
  `Admin_Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `colleges`
--

CREATE TABLE `colleges` (
  `College_ID` int(2) NOT NULL,
  `College_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `colleges`
--

INSERT INTO `colleges` (`College_ID`, `College_Name`) VALUES
(4, 'كلية الشريعه'),
(5, 'كلية العلوم'),
(6, 'كلية الطب'),
(7, 'كلية الحاسبات وتقنية المعلومات');

-- --------------------------------------------------------

--
-- بنية الجدول `college_dean`
--

CREATE TABLE `college_dean` (
  `College_Dean_ID` int(6) NOT NULL,
  `From_To` date NOT NULL,
  `College_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `coursework`
--

CREATE TABLE `coursework` (
  `coursework_id` int(2) NOT NULL,
  `coursework_type_ID` int(2) NOT NULL,
  `coursework_grade` int(2) NOT NULL,
  `subject_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `coursework`
--

INSERT INTO `coursework` (`coursework_id`, `coursework_type_ID`, `coursework_grade`, `subject_code`) VALUES
(1, 1, 20, '1');

-- --------------------------------------------------------

--
-- بنية الجدول `coursework_type`
--

CREATE TABLE `coursework_type` (
  `coursework_type_id` int(2) NOT NULL,
  `coursework_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `coursework_type`
--

INSERT INTO `coursework_type` (`coursework_type_id`, `coursework_type_name`) VALUES
(1, 'mid 1');

-- --------------------------------------------------------

--
-- بنية الجدول `current_semester`
--

CREATE TABLE `current_semester` (
  `student_id` int(9) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `Faculty_member_ID` int(6) NOT NULL,
  `Semester_Number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `current_semester`
--

INSERT INTO `current_semester` (`student_id`, `subject_code`, `Faculty_member_ID`, `Semester_Number`) VALUES
(421002998, '1', 233334, 451),
(421002998, '2', 233334, 461),
(431002997, '1', 233334, 451),
(431002997, '2', 233334, 461),
(431002997, '3', 233334, 451);

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `Department_ID` int(4) NOT NULL,
  `Department_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `departments`
--

INSERT INTO `departments` (`Department_ID`, `Department_Name`) VALUES
(701, 'قسم تقنية المعلومات'),
(702, 'قسم علوم الحاسب');

-- --------------------------------------------------------

--
-- بنية الجدول `faculty_member`
--

CREATE TABLE `faculty_member` (
  `Faculty_member_ID` int(6) NOT NULL,
  `Major` varchar(25) NOT NULL,
  `Academic_Rank` varchar(25) NOT NULL,
  `Department_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `faculty_member`
--

INSERT INTO `faculty_member` (`Faculty_member_ID`, `Major`, `Academic_Rank`, `Department_ID`) VALUES
(123456, 'تقنيه المعلومات', 'استاذ مساعد', 701),
(233334, 'تقنيه المعلومات', 'استاذ', 701);

-- --------------------------------------------------------

--
-- بنية الجدول `grades`
--

CREATE TABLE `grades` (
  `student_ID` int(9) NOT NULL,
  `coursework_id` int(2) NOT NULL,
  `coursework_Mark` int(3) NOT NULL,
  `subject_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `grades`
--

INSERT INTO `grades` (`student_ID`, `coursework_id`, `coursework_Mark`, `subject_code`) VALUES
(431002997, 1, 15, '1');

-- --------------------------------------------------------

--
-- بنية الجدول `position`
--

CREATE TABLE `position` (
  `position_id` int(2) NOT NULL,
  `position_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'student'),
(2, 'Dean_of_the_College'),
(3, 'Program_Coordinator'),
(4, 'Academic_Advisor'),
(6, 'Vice_President'),
(7, 'President'),
(8, 'Faculty_Member');

-- --------------------------------------------------------

--
-- بنية الجدول `programs`
--

CREATE TABLE `programs` (
  `Program_ID` int(6) NOT NULL,
  `Program_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `programs`
--

INSERT INTO `programs` (`Program_ID`, `Program_Name`) VALUES
(50101, 'برنامج الكيمياء البكالوريوس'),
(70101, 'برنامج تقنية المعلومات البكالوريوس'),
(70201, 'برنامج علوم الحاسب البكالوريوس');

-- --------------------------------------------------------

--
-- بنية الجدول `program_coordinator`
--

CREATE TABLE `program_coordinator` (
  `Program_Coordinator_ID` int(6) NOT NULL,
  `From_To` date NOT NULL,
  `Program_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `school_type`
--

CREATE TABLE `school_type` (
  `School_type_id` int(2) NOT NULL,
  `School_type_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `school_type`
--

INSERT INTO `school_type` (`School_type_id`, `School_type_name`) VALUES
(1, 'حكومي');

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `student_id` int(9) NOT NULL,
  `School_type_id` int(2) NOT NULL,
  `school_percentage` int(3) NOT NULL,
  `aptitude_test` int(3) NOT NULL,
  `acadmic_achievement` int(3) NOT NULL,
  `Program_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`student_id`, `School_type_id`, `school_percentage`, `aptitude_test`, `acadmic_achievement`, `Program_ID`) VALUES
(421002998, 1, 77, 88, 99, 70101),
(431002997, 1, 77, 5, 4, 70101);

-- --------------------------------------------------------

--
-- بنية الجدول `student_gpa`
--

CREATE TABLE `student_gpa` (
  `student_ID` int(9) NOT NULL,
  `Semster_Number` int(3) NOT NULL,
  `GPA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `student_gpa`
--

INSERT INTO `student_gpa` (`student_ID`, `Semster_Number`, `GPA`) VALUES
(431002997, 451, 4.98);

-- --------------------------------------------------------

--
-- بنية الجدول `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(6) NOT NULL,
  `Program_ID` int(6) NOT NULL,
  `subject_name` varchar(70) NOT NULL,
  `credit_hours` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subjects`
--

INSERT INTO `subjects` (`subject_code`, `Program_ID`, `subject_name`, `credit_hours`) VALUES
('1', 70101, 'هندسه البرمجيات', 3),
('2', 70101, 'احصاء', 7),
('3', 70101, 'كمياء', 5);

-- --------------------------------------------------------

--
-- بنية الجدول `university_president`
--

CREATE TABLE `university_president` (
  `President_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `vice_president`
--

CREATE TABLE `vice_president` (
  `Vice_President_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_advisor`
--
ALTER TABLE `academic_advisor`
  ADD PRIMARY KEY (`Academic_Advisor_ID`),
  ADD KEY `Academic_Advisor_ID` (`Academic_Advisor_ID`);

--
-- Indexes for table `academic_advisor_for_student`
--
ALTER TABLE `academic_advisor_for_student`
  ADD PRIMARY KEY (`Academic_Advisor_ID`,`student_id`) USING BTREE,
  ADD KEY `Academic_Advisor_ID` (`Academic_Advisor_ID`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `academic_record`
--
ALTER TABLE `academic_record`
  ADD PRIMARY KEY (`student_id`,`subject_code`,`Semster_Number`) USING BTREE,
  ADD KEY `presubject_subject` (`subject_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `account_position` (`Position`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`College_ID`);

--
-- Indexes for table `college_dean`
--
ALTER TABLE `college_dean`
  ADD PRIMARY KEY (`College_Dean_ID`),
  ADD KEY `Dean_college` (`College_ID`),
  ADD KEY `College_Dean_ID` (`College_Dean_ID`);

--
-- Indexes for table `coursework`
--
ALTER TABLE `coursework`
  ADD PRIMARY KEY (`coursework_id`,`subject_code`) USING BTREE,
  ADD KEY `coursework_subject` (`subject_code`),
  ADD KEY `coursework_type1` (`coursework_type_ID`);

--
-- Indexes for table `coursework_type`
--
ALTER TABLE `coursework_type`
  ADD PRIMARY KEY (`coursework_type_id`);

--
-- Indexes for table `current_semester`
--
ALTER TABLE `current_semester`
  ADD PRIMARY KEY (`student_id`,`subject_code`,`Semester_Number`),
  ADD KEY `CRsemester_Subject` (`subject_code`),
  ADD KEY `CRsemester_Faculty` (`Faculty_member_ID`),
  ADD KEY `student_id` (`subject_code`,`Faculty_member_ID`,`student_id`) USING BTREE;

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_ID`) USING BTREE;

--
-- Indexes for table `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD PRIMARY KEY (`Faculty_member_ID`) USING BTREE,
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`student_ID`,`coursework_id`,`subject_code`),
  ADD KEY `grades_coursework2` (`coursework_id`),
  ADD KEY `student_ID` (`student_ID`,`coursework_id`,`subject_code`) USING BTREE,
  ADD KEY `grades_subjects` (`subject_code`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`Program_ID`) USING BTREE;

--
-- Indexes for table `program_coordinator`
--
ALTER TABLE `program_coordinator`
  ADD PRIMARY KEY (`Program_Coordinator_ID`),
  ADD KEY `Program_Coordinator_ID` (`Program_Coordinator_ID`),
  ADD KEY `ProgramCR_program` (`Program_ID`);

--
-- Indexes for table `school_type`
--
ALTER TABLE `school_type`
  ADD PRIMARY KEY (`School_type_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_type` (`School_type_id`),
  ADD KEY `student_program` (`Program_ID`);

--
-- Indexes for table `student_gpa`
--
ALTER TABLE `student_gpa`
  ADD PRIMARY KEY (`student_ID`,`Semster_Number`) USING BTREE,
  ADD KEY `student_ID` (`student_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`,`Program_ID`),
  ADD KEY `subject_Program` (`Program_ID`);

--
-- Indexes for table `university_president`
--
ALTER TABLE `university_president`
  ADD PRIMARY KEY (`President_ID`),
  ADD KEY `President_ID` (`President_ID`);

--
-- Indexes for table `vice_president`
--
ALTER TABLE `vice_president`
  ADD PRIMARY KEY (`Vice_President_ID`),
  ADD KEY `Vice_President_ID` (`Vice_President_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `College_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coursework`
--
ALTER TABLE `coursework`
  MODIFY `coursework_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursework_type`
--
ALTER TABLE `coursework_type`
  MODIFY `coursework_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_type`
--
ALTER TABLE `school_type`
  MODIFY `School_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `academic_advisor`
--
ALTER TABLE `academic_advisor`
  ADD CONSTRAINT `Academic_Faculty1` FOREIGN KEY (`Academic_Advisor_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);

--
-- قيود الجداول `academic_advisor_for_student`
--
ALTER TABLE `academic_advisor_for_student`
  ADD CONSTRAINT `Academic_Faculty` FOREIGN KEY (`Academic_Advisor_ID`) REFERENCES `academic_advisor` (`Academic_Advisor_ID`),
  ADD CONSTRAINT `Academic_Students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- قيود الجداول `academic_record`
--
ALTER TABLE `academic_record`
  ADD CONSTRAINT `presubject_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `presubject_subject` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- قيود الجداول `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `account_position` FOREIGN KEY (`Position`) REFERENCES `position` (`position_id`);

--
-- قيود الجداول `college_dean`
--
ALTER TABLE `college_dean`
  ADD CONSTRAINT `Dean_Faculty` FOREIGN KEY (`College_Dean_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `Dean_college` FOREIGN KEY (`College_ID`) REFERENCES `colleges` (`College_ID`);

--
-- قيود الجداول `coursework`
--
ALTER TABLE `coursework`
  ADD CONSTRAINT `Coursework_type` FOREIGN KEY (`coursework_type_ID`) REFERENCES `coursework_type` (`coursework_type_id`),
  ADD CONSTRAINT `coursework_type1` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- قيود الجداول `current_semester`
--
ALTER TABLE `current_semester`
  ADD CONSTRAINT `CRsemester_Faculty` FOREIGN KEY (`Faculty_member_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `CRsemester_Student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `CRsemester_Subject` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- قيود الجداول `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD CONSTRAINT `Faculty_Departments` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`),
  ADD CONSTRAINT `Faculty_account` FOREIGN KEY (`Faculty_member_ID`) REFERENCES `accounts` (`Account_ID`);

--
-- قيود الجداول `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_coursework2` FOREIGN KEY (`coursework_id`) REFERENCES `coursework` (`coursework_id`),
  ADD CONSTRAINT `grades_student2` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `grades_subjects` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- قيود الجداول `program_coordinator`
--
ALTER TABLE `program_coordinator`
  ADD CONSTRAINT `ProgramCR_Faculty` FOREIGN KEY (`Program_Coordinator_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `ProgramCR_program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`);

--
-- قيود الجداول `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_account` FOREIGN KEY (`student_id`) REFERENCES `accounts` (`Account_ID`),
  ADD CONSTRAINT `student_program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`),
  ADD CONSTRAINT `student_type` FOREIGN KEY (`School_type_id`) REFERENCES `school_type` (`School_type_id`);

--
-- قيود الجداول `student_gpa`
--
ALTER TABLE `student_gpa`
  ADD CONSTRAINT `student` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_id`);

--
-- قيود الجداول `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_Program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`);

--
-- قيود الجداول `university_president`
--
ALTER TABLE `university_president`
  ADD CONSTRAINT `President_Faculty` FOREIGN KEY (`President_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);

--
-- قيود الجداول `vice_president`
--
ALTER TABLE `vice_president`
  ADD CONSTRAINT `vicePresident_Faculty` FOREIGN KEY (`Vice_President_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
