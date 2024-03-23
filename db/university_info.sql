-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 09:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account _ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(50) NOT NULL,
  `Admin_Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `College_Code` varchar(10) NOT NULL,
  `College_Name` varchar(50) NOT NULL,
  `Contact_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_Code` varchar(10) NOT NULL,
  `Department_Name` varchar(50) NOT NULL,
  `Department_Head` varchar(50) NOT NULL,
  `College_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member_subjects`
--

CREATE TABLE `faculty_member_subjects` (
  `Faculty_ID` int(11) NOT NULL,
  `Semster_Number` int(11) NOT NULL,
  `Subject_Code` varchar(10) NOT NULL,
  `Account _ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
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
-- Table structure for table `programs`
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
-- Table structure for table `reports`
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
-- Table structure for table `students`
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
-- Table structure for table `student_coursework`
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subject_Code` varchar(10) NOT NULL,
  `Subject_Name` varchar(50) NOT NULL,
  `Credit_Hours` int(11) NOT NULL,
  `Program_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account _ID`),
  ADD KEY `ADMID` (`Admin_ID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`College_Code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_Code`),
  ADD KEY `Dep_college` (`College_Code`);

--
-- Indexes for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD PRIMARY KEY (`Faculty_ID`,`Semster_Number`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`Grade_ID`,`Semster_Number`),
  ADD KEY `Grade_report` (`Report_Code`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`Program_Code`),
  ADD KEY `Program_Dep` (`department_Code`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Report_Code`),
  ADD KEY `report_Grade` (`Grade_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `student_Account` (`Account _ID`);

--
-- Indexes for table `student_coursework`
--
ALTER TABLE `student_coursework`
  ADD PRIMARY KEY (`Student_ID`,`Semster_Number`,`Subject_Code`,`classwork_ID`),
  ADD KEY `coursework_Subject` (`Subject_Code`),
  ADD KEY `coursework_Faculty` (`Faculty_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subject_Code`),
  ADD KEY `subject_Program` (`Program_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Account _ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `ADMID` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `Dep_college` FOREIGN KEY (`College_Code`) REFERENCES `colleges` (`College_Code`);

--
-- Constraints for table `faculty_member_subjects`
--
ALTER TABLE `faculty_member_subjects`
  ADD CONSTRAINT `Faculty_Account` FOREIGN KEY (`Faculty_ID`) REFERENCES `accounts` (`Account _ID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `Grade_report` FOREIGN KEY (`Report_Code`) REFERENCES `reports` (`Report_Code`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `Program_Dep` FOREIGN KEY (`department_Code`) REFERENCES `departments` (`Department_Code`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `report_Grade` FOREIGN KEY (`Grade_ID`) REFERENCES `grades` (`Grade_ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_Account` FOREIGN KEY (`Account _ID`) REFERENCES `accounts` (`Account _ID`);

--
-- Constraints for table `student_coursework`
--
ALTER TABLE `student_coursework`
  ADD CONSTRAINT `coursework_Faculty` FOREIGN KEY (`Faculty_ID`) REFERENCES `faculty_member_subjects` (`Faculty_ID`),
  ADD CONSTRAINT `coursework_Student` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`),
  ADD CONSTRAINT `coursework_Subject` FOREIGN KEY (`Subject_Code`) REFERENCES `subjects` (`Subject_Code`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_Program` FOREIGN KEY (`Program_Code`) REFERENCES `programs` (`Program_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
