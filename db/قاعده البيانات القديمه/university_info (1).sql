-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 مارس 2024 الساعة 20:21
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
-- بنية الجدول `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Mobile`, `Position`, `Admin_ID`) VALUES
(4, 'موسى', 'بارقي', 'mosacyber@gmail.com', '$2y$10$nOynG/m.6abQOBSkYQcMUOV9n5YGzzB46uQz8H5spbhIVNkGVHE8W', 559718489, 'admin', 1),
(43, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(46, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(123, 'موسى', 'بارقي', 'mosacgyber@gmail.com', '$2y$10$AiMpVRS7/choqUnTakOuHOfThIk8pC8jCLJyl/ofNeX44mrV7MQE6', 559718489, 'admin', 1),
(433, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(456, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(461, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(545, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(567, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(879, 'موسى', 'بارقي', 'mosacgyber@gmail.com', '$2y$10$AiMpVRS7/choqUnTakOuHOfThIk8pC8jCLJyl/ofNeX44mrV7MQE6', 559718489, 'admin', 1),
(1245, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(3455, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(4565, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(123456789, 'موسى', 'بارقي', 'mosacgyber@gmail.com', '$2y$10$AiMpVRS7/choqUnTakOuHOfThIk8pC8jCLJyl/ofNeX44mrV7MQE6', 559718489, 'admin', 1),
(421002995, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(421002998, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1),
(421002999, 'موسى', 'بارقي', 'mosacgyber@gmail.com', 't', 559718489, 'admin', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(50) NOT NULL,
  `Admin_Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`Admin_ID`, `First_Name`, `Last_Name`, `Admin_Email`, `Admin_Password`, `Admin_Mobile`) VALUES
(1, 'موسى', 'بارقي', 'mosa@gmail.com', 'm', 559718489);

-- --------------------------------------------------------

--
-- بنية الجدول `colleges`
--

CREATE TABLE `colleges` (
  `College_Code` varchar(10) NOT NULL,
  `College_Name` varchar(50) NOT NULL,
  `Contact_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `Department_Code` varchar(10) NOT NULL,
  `Department_Name` varchar(50) NOT NULL,
  `Department_Head` varchar(50) NOT NULL,
  `College_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `faculty_member_subjects`
--

CREATE TABLE `faculty_member_subjects` (
  `Faculty_ID` int(11) NOT NULL,
  `Semster_Number` int(11) NOT NULL,
  `Subject_Code` varchar(10) NOT NULL,
  `Account _ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `grades`
--

CREATE TABLE `grades` (
  `Grade_ID` int(11) NOT NULL,
  `Semster_Number` int(11) NOT NULL,
  `Total_Grade` double NOT NULL,
  `Predicted_Grade` double NOT NULL,
  `Report_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `greaaaaad`
--

CREATE TABLE `greaaaaad` (
  `frist_name` varchar(255) NOT NULL,
  `dqh` varchar(255) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `copy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `greaaaaad`
--

INSERT INTO `greaaaaad` (`frist_name`, `dqh`, `coupon`, `copy`) VALUES
('h', 'h', '45', 't'),
('h', 'f', '88', 'u'),
('yt', 'tyu', '111', 'gf'),
('e', 'e', '66', 'ft');

-- --------------------------------------------------------

--
-- بنية الجدول `k`
--

CREATE TABLE `k` (
  `kid` int(2) NOT NULL,
  `kname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `k`
--

INSERT INTO `k` (`kid`, `kname`) VALUES
(6, 'كليه العلوم'),
(7, 'كلية الحاسبات وتقنيه المعلومات');

-- --------------------------------------------------------

--
-- بنية الجدول `programs`
--

CREATE TABLE `programs` (
  `Program_Code` varchar(10) NOT NULL,
  `Program_Name` varchar(50) NOT NULL,
  `Credit_Hours` int(11) NOT NULL,
  `duration_years` int(11) NOT NULL,
  `department_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `q`
--

CREATE TABLE `q` (
  `qid` int(4) NOT NULL,
  `qname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `q`
--

INSERT INTO `q` (`qid`, `qname`) VALUES
(701, 'برنامج علوم الحاسب'),
(702, 'برنامج تقنية المعلومات'),
(703, 'برنامج هندسه الحاسب');

-- --------------------------------------------------------

--
-- بنية الجدول `reports`
--

CREATE TABLE `reports` (
  `Report_Code` varchar(30) NOT NULL,
  `Report_Title` varchar(100) NOT NULL,
  `Color_Assessment` varchar(20) NOT NULL,
  `Grade_Feedback` varchar(255) NOT NULL,
  `Grade_ID` int(11) NOT NULL,
  `Semster_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `Student_ID` int(11) NOT NULL,
  `School_GPA` double NOT NULL,
  `Aptitude_Test` int(11) NOT NULL,
  `Academic_Achievement` int(11) NOT NULL,
  `School_Type` varchar(50) NOT NULL,
  `Account _ID` int(11) NOT NULL,
  `Program_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `student_coursework`
--

CREATE TABLE `student_coursework` (
  `Student_ID` int(11) NOT NULL,
  `Semster_Number` int(11) NOT NULL,
  `Subject_Code` varchar(10) NOT NULL,
  `classwork_ID` int(11) NOT NULL,
  `classwork_Name` varchar(50) NOT NULL,
  `classwork_Type` varchar(25) NOT NULL,
  `classwork_Grade` int(11) NOT NULL,
  `Faculty_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `subjects`
--

CREATE TABLE `subjects` (
  `Subject_Code` varchar(10) NOT NULL,
  `Subject_Name` varchar(50) NOT NULL,
  `Credit_Hours` int(11) NOT NULL,
  `Program_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `t`
--

CREATE TABLE `t` (
  `tid` int(6) NOT NULL,
  `tname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `t`
--

INSERT INTO `t` (`tid`, `tname`) VALUES
(60101, 'كيمياء'),
(70102, 'علوم الحاسب'),
(70201, 'تقنية المعلومات');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_Code`);

--
-- Indexes for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD PRIMARY KEY (`Faculty_ID`,`Semster_Number`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`Grade_ID`,`Semster_Number`);

--
-- Indexes for table `k`
--
ALTER TABLE `k`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`Program_Code`);

--
-- Indexes for table `q`
--
ALTER TABLE `q`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Report_Code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_coursework`
--
ALTER TABLE `student_coursework`
  ADD PRIMARY KEY (`Student_ID`,`Semster_Number`,`Subject_Code`,`classwork_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_Code`);

--
-- Indexes for table `t`
--
ALTER TABLE `t`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `Grade_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `ADMID` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- قيود الجداول `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `Dep_college` FOREIGN KEY (`College_Code`) REFERENCES `colleges` (`College_Code`);

--
-- قيود الجداول `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD CONSTRAINT `Faculty_Account` FOREIGN KEY (`Faculty_ID`) REFERENCES `accounts` (`Account_ID`);

--
-- قيود الجداول `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `Grade_report` FOREIGN KEY (`Report_Code`) REFERENCES `reports` (`Report_Code`);

--
-- قيود الجداول `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `Program_Dep` FOREIGN KEY (`department_Code`) REFERENCES `departments` (`Department_Code`);

--
-- قيود الجداول `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `report_Grade` FOREIGN KEY (`Grade_ID`) REFERENCES `grades` (`Grade_ID`);

--
-- قيود الجداول `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_Account` FOREIGN KEY (`Account _ID`) REFERENCES `accounts` (`Account_ID`);

--
-- قيود الجداول `student_coursework`
--
ALTER TABLE `student_coursework`
  ADD CONSTRAINT `coursework_Faculty` FOREIGN KEY (`Faculty_ID`) REFERENCES `faculty_member_subjects` (`Faculty_ID`),
  ADD CONSTRAINT `coursework_Student` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`),
  ADD CONSTRAINT `coursework_Subject` FOREIGN KEY (`Subject_Code`) REFERENCES `subjects` (`Subject_Code`);

--
-- قيود الجداول `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_Program` FOREIGN KEY (`Program_Code`) REFERENCES `programs` (`Program_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
