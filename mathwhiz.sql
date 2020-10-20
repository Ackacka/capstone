-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 03:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mathwhiz`
--
CREATE DATABASE IF NOT EXISTS `mathwhiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mathwhiz`;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessmentID` int(255) NOT NULL,
  `assessmentTypeID` int(10) NOT NULL,
  `userID` int(255) NOT NULL,
  `questionsCorrect` int(100) NOT NULL,
  `questionsWrong` int(100) NOT NULL,
  `totalScore` int(100) NOT NULL,
  `startDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `endDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `level` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessmentID`, `assessmentTypeID`, `userID`, `questionsCorrect`, `questionsWrong`, `totalScore`, `startDateTime`, `endDateTime`, `level`) VALUES
(140, 2, 52, 0, 0, 0, '2020-10-15 16:32:38', '2020-10-15 16:32:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessmenttype`
--

CREATE TABLE `assessmenttype` (
  `assessmentTypeID` int(10) NOT NULL,
  `assessmentTypeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessmenttype`
--

INSERT INTO `assessmenttype` (`assessmentTypeID`, `assessmentTypeName`) VALUES
(1, 'drill'),
(2, 'quiz'),
(3, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroomID` int(11) NOT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`classroomID`, `teacherID`, `studentID`) VALUES
(-1, NULL, 51),
(-1, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `drill`
--

CREATE TABLE `drill` (
  `assessmentID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(255) NOT NULL,
  `difficulty` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `question` varchar(125) NOT NULL,
  `answer` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `difficulty`, `category`, `question`, `answer`) VALUES
(1, '1', 'Addition', '1 + 1', '2'),
(2, '1', 'Addition', '1 + 2', '3'),
(3, '1', 'Addition', '2 + 1', '3'),
(4, '1', 'Addition', '2 + 2', '4'),
(5, '1', 'Addition', '2 + 3', '5'),
(6, '1', 'Addition', '3 + 2', '5'),
(7, '1', 'Addition', '3 + 3', '6'),
(8, '1', 'Addition', '3 + 4', '7'),
(9, '1', 'Addition', '4 + 3', '7'),
(10, '1', 'Addition', '4 + 4', '8'),
(11, '1', 'Addition', '4 + 5', '9'),
(12, '1', 'Addition', '5 + 5', '10'),
(13, '1', 'Addition', '5 + 6', '11'),
(14, '1', 'Addition', '6 + 6', '12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `assessmentID` int(255) NOT NULL,
  `passFail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`assessmentID`, `passFail`) VALUES
(140, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

CREATE TABLE `roletype` (
  `roleTypeID` int(10) NOT NULL,
  `roleTypeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletype`
--

INSERT INTO `roletype` (`roleTypeID`, `roleTypeName`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Admin'),
(4, 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `userID` int(255) NOT NULL,
  `level` int(15) NOT NULL,
  `classroomID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userID`, `level`, `classroomID`) VALUES
(51, 1, -1),
(52, 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `userID` int(255) NOT NULL,
  `classroomID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `assessmentID` int(255) NOT NULL,
  `passFail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleTypeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessmentID`),
  ADD KEY `fk_assessment_assessmentType` (`assessmentTypeID`),
  ADD KEY `fk_assessment_students` (`userID`);

--
-- Indexes for table `assessmenttype`
--
ALTER TABLE `assessmenttype`
  ADD PRIMARY KEY (`assessmentTypeID`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD KEY `fk_classroom_student` (`studentID`),
  ADD KEY `fk_classroom_teacher` (`teacherID`);

--
-- Indexes for table `drill`
--
ALTER TABLE `drill`
  ADD PRIMARY KEY (`assessmentID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`assessmentID`);

--
-- Indexes for table `roletype`
--
ALTER TABLE `roletype`
  ADD PRIMARY KEY (`roleTypeID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fk_teachers_classroom` (`classroomID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`assessmentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `uniqueUsername` (`username`),
  ADD KEY `fk_users_roleType` (`roleTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessmentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `roleTypeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `fk_assessment_assessmentType` FOREIGN KEY (`assessmentTypeID`) REFERENCES `assessmenttype` (`assessmentTypeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_assessment_students` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `fk_classroom_student` FOREIGN KEY (`studentID`) REFERENCES `students` (`userID`),
  ADD CONSTRAINT `fk_classroom_teacher` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`userID`);

--
-- Constraints for table `drill`
--
ALTER TABLE `drill`
  ADD CONSTRAINT `fk_drill_assessment` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessmentID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz_assessment` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessmentID`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_users` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_classroom` FOREIGN KEY (`classroomID`) REFERENCES `classrooms` (`classroomID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_teachers_users` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_test_assessment` FOREIGN KEY (`assessmentID`) REFERENCES `assessment` (`assessmentID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roleType` FOREIGN KEY (`roleTypeID`) REFERENCES `roletype` (`roleTypeID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
