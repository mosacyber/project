-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 09:56 PM
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
-- Table structure for table `academic_advisor`
--

CREATE TABLE `academic_advisor` (
  `Academic_Advisor_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_advisor`
--

INSERT INTO `academic_advisor` (`Academic_Advisor_ID`, `From_To`) VALUES
(123456, '2023-02-17'),
(230041, '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `academic_advisor_for_student`
--

CREATE TABLE `academic_advisor_for_student` (
  `Academic_Advisor_ID` int(6) NOT NULL,
  `student_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_advisor_for_student`
--

INSERT INTO `academic_advisor_for_student` (`Academic_Advisor_ID`, `student_id`) VALUES
(123456, 381003212),
(123456, 381003233),
(230041, 421002999),
(230041, 421004034);

-- --------------------------------------------------------

--
-- Table structure for table `academic_record`
--

CREATE TABLE `academic_record` (
  `student_id` int(9) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `Semster_Number` int(3) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_record`
--

INSERT INTO `academic_record` (`student_id`, `subject_code`, `Semster_Number`, `grade`) VALUES
(381003212, 'CIT203', 451, 88),
(381003212, 'CIT234', 451, 88),
(381003212, 'CSC101', 451, 85),
(381003212, 'CSC201', 451, 86),
(381003233, 'CIT234', 451, 81),
(381003233, 'CIT453', 451, 82),
(381003233, 'CSC331', 451, 78),
(421002999, 'CIT203', 451, 88),
(421002999, 'CIT453', 451, 90),
(421004034, 'CSC101', 451, 99),
(421004034, 'CSC201', 451, 95),
(421004034, 'CSC220', 451, 98),
(421004034, 'CSC301', 451, 92);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(9) NOT NULL COMMENT 'This ID is the same for each actor in real systems, such as student ID and faculty member ID.',
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Position` int(2) NOT NULL,
  `Status_ID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Mobile`, `Position`, `Status_ID`) VALUES
(1, 'موسى', 'بارقي', 'mosacyber@gmail.com', '$2y$10$zbBnbGfBoPEypYDM0oPmbuv8K9B3q4WukvcPF3YUxYBc5PyexN0OG', 559718489, 8, 1),
(123123, 'موسى', 'بارقي', 'mosacyber@gmail.com', '$2y$10$.4HkxXV5twl6F5Cp.29oSeZHX0aHxMe62qc8QYWTOKe9ULLVX9Ra6', 559718489, 4, 1),
(123456, 'عمر', 'العسيري', '123456@ut.edu.sa', '$2y$10$JnK.CezNBRBxT8yIsYg7U.GeW2/Ja7EmY5IW6JyIiy9fKLjeSD./2', 559718489, 4, 1),
(200342, 'عبدالله', 'الذيابي', '200342@ut.edu.sa', '$2y$10$C4MUpxHF0H7o6aTgV89Zh.L10uSgBjgGWC32JW1uKEkSnk9sMf/XG', 599992232, 6, 1),
(211091, 'محمد', 'العتيبي', '211091@ut.edu.sa', '$2y$10$5fO.SicuFAgjtOgOzCS3huBxX.cYjAzjoMXVAGMDmbosyfQvmfz0G', 531111232, 7, 1),
(222512, 'يوسف', 'الفيفي', '222512@ut.edu.sa', '$2y$10$LkY/gEdPW.j9wwWUiRjHo.JpZTaYPwW6DdKRByoDVXn/lUuVV2pFW', 531892232, 3, 1),
(230041, 'عوض', 'محمد', '230041@ut.edu.sa', '$2y$10$ldfEbYIVubB5JP2RbqBruOyoND/cHd1LLNhzJhovR.u8JU6gAsVgq', 555711232, 4, 1),
(233331, 'عبدالله', 'المالكي', '233331@ut.edu.sa', '$2y$10$aj0ZOJ7QIwXOLVgUYjLMbO/zrHJPyDU6ewMi1neZQN3XyOd933L9O', 599012232, 7, 1),
(266001, 'مشعل', 'العنزي', '266001@ut.edu.sa', '$2y$10$L2YdpW67NeWs073.4KA.GOBu/Z4Sl/PAiHEZBJcPe2JhtRiG6ilY.', 509341232, 5, 1),
(268841, 'ماجد', 'ابوركبة', '268841@ut.edu.sa', '$2y$10$DmjcqlBDzj.YiKTMqvcFkuXNH9stfZjEe6GZVZ/CM7uQGkMFKyJTy', 555711232, 2, 1),
(381003212, 'سلطان', 'العواجي', '381003212@stu.ut.edu.sa', '$2y$10$PiJdwSr2m5ntqcwoENRgz./Q09P3Kjqv3rOQft/SezOcq3DEM.Gay', 556712232, 1, 1),
(381003233, 'عصام', 'العتيبي', '381003233@stu.ut.edu.sa', '$2y$10$uj62MVU7CXQypaNS7O7RHejpK7CTbhqievI3CeM3/KSKDIsd1TOfu', 556111132, 1, 1),
(421002999, 'موسى', 'بارقي', '421002999@stu.ut.edu.sa', '$2y$10$oEqF17irn1MI5c1dU8VbxetMlZLKwXPHvwHFYpggeBDFi6AtXHhyS', 556122232, 1, 1),
(421004034, 'صالح', 'العنزي', '421004034@stu.ut.edu.sa', '$2y$10$C8tef1GzO9b.nIYnizlzjez5x73ZhWnmODUVbB6D.Hf.dnTsg7Kka', 556177732, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(2) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `From_To`) VALUES
(1, '2024-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `College_ID` int(2) NOT NULL,
  `College_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`College_ID`, `College_Name`) VALUES
(4, 'كلية الشريعه'),
(5, 'كلية العلوم'),
(6, 'كلية الطب'),
(7, 'كلية الحاسبات وتقنية المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `college_dean`
--

CREATE TABLE `college_dean` (
  `College_Dean_ID` int(6) NOT NULL,
  `From_To` date NOT NULL,
  `College_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_dean`
--

INSERT INTO `college_dean` (`College_Dean_ID`, `From_To`, `College_ID`) VALUES
(268841, '2019-04-03', 7);

-- --------------------------------------------------------

--
-- Table structure for table `coursework`
--

CREATE TABLE `coursework` (
  `coursework_id` int(2) NOT NULL,
  `coursework_type_ID` int(2) NOT NULL,
  `coursework_grade` int(2) NOT NULL,
  `subject_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursework`
--

INSERT INTO `coursework` (`coursework_id`, `coursework_type_ID`, `coursework_grade`, `subject_code`) VALUES
(1, 4, 3, 'CIS340'),
(1, 1, 20, 'CIT203'),
(1, 1, 20, 'CIT234'),
(1, 1, 20, 'CIT453'),
(1, 1, 15, 'CSC101'),
(1, 1, 15, 'CSC201'),
(2, 1, 10, 'CIS340'),
(2, 2, 20, 'CIT203'),
(2, 2, 20, 'CIT234'),
(2, 2, 20, 'CIT453'),
(2, 2, 15, 'CSC101'),
(2, 2, 15, 'CSC201'),
(3, 10, 5, 'CIS340'),
(3, 4, 10, 'CIT203'),
(3, 4, 5, 'CIT234'),
(3, 6, 5, 'CIT453'),
(3, 4, 5, 'CSC101'),
(3, 4, 10, 'CSC201'),
(4, 5, 3, 'CIS340'),
(4, 5, 10, 'CIT203'),
(4, 5, 5, 'CIT234'),
(4, 7, 5, 'CIT453'),
(4, 5, 5, 'CSC101'),
(4, 5, 10, 'CSC201'),
(5, 2, 10, 'CIS340'),
(5, 3, 40, 'CIT203'),
(5, 8, 10, 'CIT234'),
(5, 4, 10, 'CIT453'),
(5, 4, 10, 'CSC101'),
(5, 8, 20, 'CSC201'),
(6, 8, 15, 'CIS340'),
(6, 3, 40, 'CIT234'),
(6, 3, 40, 'CIT453'),
(6, 8, 20, 'CSC101'),
(6, 3, 30, 'CSC201'),
(7, 11, 4, 'CIS340'),
(7, 3, 30, 'CSC101'),
(8, 9, 10, 'CIS340'),
(9, 3, 40, 'CIS340');

-- --------------------------------------------------------

--
-- Table structure for table `coursework_type`
--

CREATE TABLE `coursework_type` (
  `coursework_type_id` int(2) NOT NULL,
  `coursework_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursework_type`
--

INSERT INTO `coursework_type` (`coursework_type_id`, `coursework_type_name`) VALUES
(1, 'اختبار الدور الاول'),
(2, 'اختبار الدور الثاني'),
(3, 'الاختبار النهائي'),
(4, 'اختبار قصير 1'),
(5, 'اختبار قصير 2'),
(6, 'الواجب الاول'),
(7, 'الواجب الثاني'),
(8, 'المشروع'),
(9, 'الاختبار العملي'),
(10, 'اختبار قصير عملي'),
(11, 'اختبار قصير 3');

-- --------------------------------------------------------

--
-- Table structure for table `current_semester`
--

CREATE TABLE `current_semester` (
  `student_id` int(9) NOT NULL,
  `subject_code` varchar(6) NOT NULL,
  `Faculty_member_ID` int(6) NOT NULL,
  `Semester_Number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_semester`
--

INSERT INTO `current_semester` (`student_id`, `subject_code`, `Faculty_member_ID`, `Semester_Number`) VALUES
(381003233, 'CIS340', 123456, 452),
(381003233, 'CIT203', 123456, 452),
(421002999, 'CIT234', 123456, 452),
(421004034, 'CIT234', 123456, 452),
(381003212, 'CIT453', 211091, 452),
(421002999, 'CSC101', 211091, 452),
(421004034, 'CIT203', 222512, 452),
(421004034, 'CIT453', 222512, 452),
(381003212, 'CSC331', 230041, 452),
(381003233, 'CIT234', 230041, 452),
(421002999, 'CIS340', 230041, 452),
(421004034, 'CIS340', 230041, 452),
(381003233, 'CSC101', 233331, 452),
(421002999, 'CSC201', 233331, 452);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_ID` int(4) NOT NULL,
  `Department_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_ID`, `Department_Name`) VALUES
(701, 'قسم تقنية المعلومات'),
(702, 'قسم علوم الحاسب');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member`
--

CREATE TABLE `faculty_member` (
  `Faculty_member_ID` int(6) NOT NULL,
  `Major` varchar(25) NOT NULL,
  `Academic_Rank` varchar(25) NOT NULL,
  `Department_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_member`
--

INSERT INTO `faculty_member` (`Faculty_member_ID`, `Major`, `Academic_Rank`, `Department_ID`) VALUES
(123456, 'تقنية المعلومات', 'استاذ مساعد', 701),
(200342, 'تقنية المعلومات', 'استاذ مساعد', 701),
(211091, 'تقنية المعلومات', 'استاذ', 701),
(222512, 'تقنية المعلومات', 'استاذ مساعد', 701),
(230041, 'علوم الحاسب', 'استاذ مشارك', 701),
(233331, 'تقنية المعلومات', 'استاذ مساعد', 702),
(266001, 'علوم الحاسب', 'استاذ مشارك', 702),
(268841, 'تقنية المعلومات', 'استاذ مشارك', 701);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `student_ID` int(9) NOT NULL,
  `coursework_id` int(2) NOT NULL,
  `coursework_Mark` int(3) NOT NULL,
  `Subject_Code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`student_ID`, `coursework_id`, `coursework_Mark`, `Subject_Code`) VALUES
(381003233, 1, 2, 'CIS340'),
(381003233, 1, 20, 'CIT203'),
(381003233, 1, 13, 'CIT234'),
(381003233, 1, 14, 'CSC201'),
(381003233, 2, 14, 'CIT203'),
(381003233, 2, 14, 'CIT234'),
(381003233, 2, 15, 'CSC201'),
(381003233, 3, 7, 'CIT203'),
(381003233, 3, 3, 'CIT234'),
(381003233, 3, 10, 'CSC201'),
(381003233, 4, 6, 'CIT203'),
(381003233, 4, 4, 'CIT234'),
(381003233, 4, 10, 'CSC201'),
(381003233, 5, 31, 'CIT203'),
(381003233, 5, 7, 'CIT234'),
(381003233, 5, 20, 'CSC201'),
(381003233, 6, 28, 'CIT234'),
(381003233, 6, 30, 'CSC201'),
(421002999, 1, 3, 'CIS340'),
(421002999, 1, 12, 'CSC201'),
(421002999, 2, 4, 'CIS340'),
(421002999, 2, 11, 'CSC201'),
(421002999, 3, 3, 'CIS340'),
(421002999, 3, 8, 'CSC201'),
(421002999, 4, 9, 'CSC201'),
(421002999, 5, 18, 'CSC201'),
(421002999, 6, 21, 'CSC201'),
(421004034, 1, 3, 'CIS340'),
(421004034, 1, 18, 'CIT234'),
(421004034, 2, 9, 'CIS340'),
(421004034, 2, 19, 'CIT234'),
(421004034, 3, 5, 'CIS340'),
(421004034, 3, 5, 'CIT234'),
(421004034, 4, 3, 'CIS340'),
(421004034, 4, 4, 'CIT234'),
(421004034, 5, 8, 'CIS340'),
(421004034, 5, 10, 'CIT234'),
(421004034, 6, 15, 'CIS340'),
(421004034, 6, 38, 'CIT234'),
(421004034, 7, 3, 'CIS340'),
(421004034, 8, 8, 'CIS340'),
(421004034, 9, 32, 'CIS340');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(2) NOT NULL,
  `position_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'طالب'),
(2, 'عميد الكلية'),
(3, 'منسق البرنامج'),
(4, 'المرشد الاكاديمي'),
(5, 'وكيل الطلاب للشؤون التعليمية'),
(6, 'مدير الجامعة'),
(7, 'عضو هيئة التدريس'),
(8, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `Student_ID` int(9) NOT NULL,
  `Prediction_grade_ID` int(1) NOT NULL,
  `Semster_Number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prediction`
--

INSERT INTO `prediction` (`Student_ID`, `Prediction_grade_ID`, `Semster_Number`) VALUES
(421004034, 1, 452),
(381003212, 2, 452);

-- --------------------------------------------------------

--
-- Table structure for table `prediction_grade_type`
--

CREATE TABLE `prediction_grade_type` (
  `Prediction_grade_ID` int(1) NOT NULL,
  `Prediction_grade_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prediction_grade_type`
--

INSERT INTO `prediction_grade_type` (`Prediction_grade_ID`, `Prediction_grade_type`) VALUES
(1, 'ممتاز'),
(2, 'جيد جدأ'),
(3, 'جيد'),
(4, 'مقبول'),
(5, 'ضعيف');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `Program_ID` int(6) NOT NULL,
  `Program_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`Program_ID`, `Program_Name`) VALUES
(50101, 'الكيمياء البكالوريوس'),
(70101, 'تقنية المعلومات البكالوريوس'),
(70201, 'علوم الحاسب البكالوريوس');

-- --------------------------------------------------------

--
-- Table structure for table `program_coordinator`
--

CREATE TABLE `program_coordinator` (
  `Program_Coordinator_ID` int(6) NOT NULL,
  `From_To` date NOT NULL,
  `Program_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_coordinator`
--

INSERT INTO `program_coordinator` (`Program_Coordinator_ID`, `From_To`, `Program_ID`) VALUES
(222512, '2022-06-30', 70101);

-- --------------------------------------------------------

--
-- Table structure for table `school_type`
--

CREATE TABLE `school_type` (
  `School_type_id` int(2) NOT NULL,
  `School_type_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_type`
--

INSERT INTO `school_type` (`School_type_id`, `School_type_name`) VALUES
(1, 'حكومية'),
(2, 'أهلية');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_ID` int(1) NOT NULL,
  `Status_Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_ID`, `Status_Name`) VALUES
(0, 'Inactive'),
(1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `students`
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
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `School_type_id`, `school_percentage`, `aptitude_test`, `acadmic_achievement`, `Program_ID`) VALUES
(381003212, 2, 88, 80, 90, 70101),
(381003233, 2, 92, 78, 82, 70201),
(421002999, 1, 89, 89, 90, 70101),
(421004034, 1, 98, 87, 85, 70101);

-- --------------------------------------------------------

--
-- Table structure for table `student_gpa`
--

CREATE TABLE `student_gpa` (
  `student_ID` int(9) NOT NULL,
  `Semster_Number` int(3) NOT NULL,
  `GPA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_gpa`
--

INSERT INTO `student_gpa` (`student_ID`, `Semster_Number`, `GPA`) VALUES
(381003212, 451, 4.25),
(381003233, 451, 3.9),
(421002999, 451, 4.3),
(421004034, 451, 4.85);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(6) NOT NULL,
  `Program_ID` int(6) NOT NULL,
  `subject_name` varchar(70) NOT NULL,
  `credit_hours` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `Program_ID`, `subject_name`, `credit_hours`) VALUES
('CIS340', 70101, 'نظم قواعد البيانات', 3),
('CIT203', 70101, 'تكامل وعمارة الأنظمة', 3),
('CIT234', 70101, 'نظم تشغيل', 3),
('CIT453', 70101, 'أنظمة الوسائط المتعددة', 3),
('CSC101', 70201, 'برمجة 1', 4),
('CSC201', 70201, 'برمجة 2', 4),
('CSC220', 70201, 'البرمجة المرئية', 3),
('CSC301', 70201, 'تراكيب البيانات والخوارزميات', 3),
('CSC331', 70201, 'الذكاء الاصطناعي', 3);

-- --------------------------------------------------------

--
-- Table structure for table `university_president`
--

CREATE TABLE `university_president` (
  `President_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_president`
--

INSERT INTO `university_president` (`President_ID`, `From_To`) VALUES
(200342, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `vice_president`
--

CREATE TABLE `vice_president` (
  `Vice_President_ID` int(6) NOT NULL,
  `From_To` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vice_president`
--

INSERT INTO `vice_president` (`Vice_President_ID`, `From_To`) VALUES
(266001, '2023-09-28');

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
  ADD KEY `account_position` (`Position`),
  ADD KEY `Status_ID` (`Status_ID`);

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
  ADD PRIMARY KEY (`student_ID`,`coursework_id`,`Subject_Code`),
  ADD KEY `student_ID` (`student_ID`,`coursework_id`,`Subject_Code`),
  ADD KEY `Grade_coursework` (`coursework_id`),
  ADD KEY `Grade_subject` (`Subject_Code`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`Student_ID`,`Semster_Number`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Prediction_grade_ID` (`Prediction_grade_ID`);

--
-- Indexes for table `prediction_grade_type`
--
ALTER TABLE `prediction_grade_type`
  ADD PRIMARY KEY (`Prediction_grade_ID`);

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_ID`);

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
  MODIFY `coursework_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coursework_type`
--
ALTER TABLE `coursework_type`
  MODIFY `coursework_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `school_type`
--
ALTER TABLE `school_type`
  MODIFY `School_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_advisor`
--
ALTER TABLE `academic_advisor`
  ADD CONSTRAINT `Academic_Faculty1` FOREIGN KEY (`Academic_Advisor_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);

--
-- Constraints for table `academic_advisor_for_student`
--
ALTER TABLE `academic_advisor_for_student`
  ADD CONSTRAINT `Academic_Faculty` FOREIGN KEY (`Academic_Advisor_ID`) REFERENCES `academic_advisor` (`Academic_Advisor_ID`),
  ADD CONSTRAINT `Academic_Students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `academic_record`
--
ALTER TABLE `academic_record`
  ADD CONSTRAINT `presubject_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `presubject_subject` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `account_position` FOREIGN KEY (`Position`) REFERENCES `position` (`position_id`),
  ADD CONSTRAINT `account_status` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`);

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `ADMIN_Account` FOREIGN KEY (`Admin_ID`) REFERENCES `accounts` (`Account_ID`);

--
-- Constraints for table `college_dean`
--
ALTER TABLE `college_dean`
  ADD CONSTRAINT `Dean_Faculty` FOREIGN KEY (`College_Dean_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `Dean_college` FOREIGN KEY (`College_ID`) REFERENCES `colleges` (`College_ID`);

--
-- Constraints for table `coursework`
--
ALTER TABLE `coursework`
  ADD CONSTRAINT `Coursework_type` FOREIGN KEY (`coursework_type_ID`) REFERENCES `coursework_type` (`coursework_type_id`),
  ADD CONSTRAINT `coursework_type1` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- Constraints for table `current_semester`
--
ALTER TABLE `current_semester`
  ADD CONSTRAINT `CRsemester_Faculty` FOREIGN KEY (`Faculty_member_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `CRsemester_Student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `CRsemester_Subject` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);

--
-- Constraints for table `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD CONSTRAINT `Faculty_Departments` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`),
  ADD CONSTRAINT `Faculty_account` FOREIGN KEY (`Faculty_member_ID`) REFERENCES `accounts` (`Account_ID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `Grade_coursework` FOREIGN KEY (`coursework_id`) REFERENCES `coursework` (`coursework_id`),
  ADD CONSTRAINT `Grade_student` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `Grade_subject` FOREIGN KEY (`Subject_Code`) REFERENCES `subjects` (`subject_code`);

--
-- Constraints for table `prediction`
--
ALTER TABLE `prediction`
  ADD CONSTRAINT `Prediction_Student` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `Prediction_grade` FOREIGN KEY (`Prediction_grade_ID`) REFERENCES `prediction_grade_type` (`Prediction_grade_ID`);

--
-- Constraints for table `program_coordinator`
--
ALTER TABLE `program_coordinator`
  ADD CONSTRAINT `ProgramCR_Faculty` FOREIGN KEY (`Program_Coordinator_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`),
  ADD CONSTRAINT `ProgramCR_program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_account` FOREIGN KEY (`student_id`) REFERENCES `accounts` (`Account_ID`),
  ADD CONSTRAINT `student_program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`),
  ADD CONSTRAINT `student_type` FOREIGN KEY (`School_type_id`) REFERENCES `school_type` (`School_type_id`);

--
-- Constraints for table `student_gpa`
--
ALTER TABLE `student_gpa`
  ADD CONSTRAINT `student` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_Program` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`Program_ID`);

--
-- Constraints for table `university_president`
--
ALTER TABLE `university_president`
  ADD CONSTRAINT `President_Faculty` FOREIGN KEY (`President_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);

--
-- Constraints for table `vice_president`
--
ALTER TABLE `vice_president`
  ADD CONSTRAINT `vicePresident_Faculty` FOREIGN KEY (`Vice_President_ID`) REFERENCES `faculty_member` (`Faculty_member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
