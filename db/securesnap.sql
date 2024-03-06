-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 05:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securesnap`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `AttendanceID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `AttendanceDateTime` datetime NOT NULL,
  `Status` enum('present','late','absent') NOT NULL,
  `Picture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `StudentID`, `CourseID`, `AttendanceDateTime`, `Status`, `Picture`) VALUES
(1, 56042025, 2, '2024-03-06 01:30:11', 'present', NULL),
(2, 56042025, 2, '2024-03-06 01:39:43', 'late', NULL),
(3, 40412025, 2, '2024-03-06 17:28:37', 'present', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendancepin`
--

CREATE TABLE `attendancepin` (
  `CourseID` int(11) NOT NULL,
  `CurrentPin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendancepin`
--

INSERT INTO `attendancepin` (`CourseID`, `CurrentPin`) VALUES
(2, NULL),
(5, NULL),
(6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseCode` varchar(20) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `FacultyID` int(11) DEFAULT NULL,
  `FacultyInternID` int(11) DEFAULT NULL,
  `CourseDescription` text DEFAULT NULL,
  `Cohort` varchar(1) NOT NULL COMMENT 'Alphabet (e.g., A, B, C)',
  `Semester` varchar(9) NOT NULL COMMENT 'Academic year format (e.g., 2023/2024)',
  `AcademicYear` int(11) NOT NULL,
  `ClassDays` varchar(50) DEFAULT NULL COMMENT 'Comma-separated list of class days (e.g., Mon,Wed,Fri)',
  `ClassTimes` varchar(50) DEFAULT NULL COMMENT 'Comma-separated list of class times (e.g., 09:00-10:30,14:00-15:30)',
  `isAttendanceActive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseCode`, `CourseName`, `FacultyID`, `FacultyInternID`, `CourseDescription`, `Cohort`, `Semester`, `AcademicYear`, `ClassDays`, `ClassTimes`, `isAttendanceActive`) VALUES
(2, 'CS330', 'Hardware and Systems Fundamentals', 4, NULL, NULL, 'A', 'Spring', 2024, 'Tuesday, Thursday', '12:30 - 15:30', 0),
(5, 'CS 331', 'Web Technologies', 4, NULL, NULL, 'A', 'Spring', 2024, 'Monday,Wednesday,Friday', '13:15 - 14:45,13:15 - 14:45,12:15 - 13:45', 0),
(6, 'CS 412', 'Algorithm Design and Analysis', 4, NULL, NULL, 'A', 'Spring', 2024, 'Monday,Tuesday,Thursday', '08:00 - 09:30,13:15 - 14:45,13:15 - 14:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'CSIS - Computer Science and Information Systems'),
(2, 'HSS - Humanities and Social Sciences'),
(3, 'BUSA - Business Administration'),
(4, 'ENGR - Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `DepartmentID`) VALUES
(3, 1),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `facultyinterns`
--

CREATE TABLE `facultyinterns` (
  `FacultyInternID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `MajorID` int(11) NOT NULL,
  `MajorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`MajorID`, `MajorName`) VALUES
(1, 'Computer Science'),
(2, 'Business Administration'),
(3, 'Management and Information Systems'),
(4, 'Computer Engineering'),
(5, 'Mechanical Engineering'),
(6, 'Electrical and Electronics Engineering'),
(7, 'Mechatronics Engineering'),
(8, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourses`
--

CREATE TABLE `studentcourses` (
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcourses`
--

INSERT INTO `studentcourses` (`StudentID`, `CourseID`) VALUES
(40412025, 2),
(56042025, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `Major` int(11) NOT NULL,
  `YearGroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `Major`, `YearGroup`) VALUES
(40412025, 3, 2025),
(56042025, 1, 2025),
(80322025, 1, 2025),
(90902024, 4, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `UserType` enum('student','faculty','faculty_intern','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `UserType`) VALUES
(1, 'Elikem Gale-Zoyiku', 'elikem.gale-zoyiku@ashesi.edu.gh', 'EATprof@2002', 'admin'),
(3, 'Elikem Gale-Zoyiku', 'egalezoyiku@gmail.com', '$2y$10$cVs2Nq9.gPUeGZGQxtHDcutXjq.aC7sNHQoi.myKBSYLe.8DsxR.u', 'faculty'),
(4, 'Elikem Faculty', 'abc@elikem.info', '$2y$10$cKDyLZQ8Nexg9TKFt7vzHuUf1qR/hmAZYrJDuDCLoWrd9myNAGqjW', 'faculty'),
(40412025, 'Emmanuel Soumahoro', 'emmanuel@example.com', '$2y$10$CuYQG1WECTRQ8wsTh/OJOOmF81aFrEMZtdIKGFS7FdJb6TbuKEh9i', 'student'),
(56042025, 'Elikem Asudo Tsatsu Gale-Zoyiku', 'elikem@example.com', '$2y$10$FqVT.Rz1.X..7dVWnXvIS.62m6anoH6eyJgU8n0l4SSwV7eMjd8b2', 'student'),
(80322025, 'Cajetan Songwae', 'cajetan@example.com', '$2y$10$MfpRfbQsE5V67OQ8M7r1gOIXorWXTyz5wRhJGejvv1Dbkuzea7yxK', 'student'),
(90902024, 'Sirius Black', 'sirius@example.com', '$2y$10$XpboBo2o0iJvCaWIe6KO2eHhVG94YqT.loZUgBTvlyX5pFY1ZyMam', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `attendancepin`
--
ALTER TABLE `attendancepin`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `FacultyID` (`FacultyID`),
  ADD KEY `FacultyInternID` (`FacultyInternID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `facultyinterns`
--
ALTER TABLE `facultyinterns`
  ADD PRIMARY KEY (`FacultyInternID`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`MajorID`);

--
-- Indexes for table `studentcourses`
--
ALTER TABLE `studentcourses`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Major` (`Major`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `AttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `MajorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90902025;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `attendancepin`
--
ALTER TABLE `attendancepin`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`FacultyID`) REFERENCES `faculty` (`FacultyID`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`FacultyInternID`) REFERENCES `facultyinterns` (`FacultyInternID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `departments` (`DepartmentID`);

--
-- Constraints for table `studentcourses`
--
ALTER TABLE `studentcourses`
  ADD CONSTRAINT `studentcourses_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`),
  ADD CONSTRAINT `studentcourses_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Major`) REFERENCES `majors` (`MajorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
