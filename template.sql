-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 01:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--
CREATE DATABASE IF NOT EXISTS `template` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `template`;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--
-- Creation: Oct 12, 2020 at 11:16 PM
-- Last update: Oct 12, 2020 at 11:16 PM
--

DROP TABLE IF EXISTS `assessment`;
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

-- --------------------------------------------------------

--
-- Table structure for table `assessmenttype`
--
-- Creation: Oct 10, 2020 at 04:51 PM
--

DROP TABLE IF EXISTS `assessmenttype`;
CREATE TABLE `assessmenttype` (
  `assessmentTypeID` int(10) NOT NULL,
  `assessmentTypeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--
-- Creation: Oct 10, 2020 at 03:51 PM
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `classroomID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drill`
--
-- Creation: Oct 12, 2020 at 11:08 PM
--

DROP TABLE IF EXISTS `drill`;
CREATE TABLE `drill` (
  `assessmentID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--
-- Creation: Oct 10, 2020 at 04:54 PM
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `questionID` int(255) NOT NULL,
  `difficulty` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `question` varchar(125) NOT NULL,
  `answer` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--
-- Creation: Oct 12, 2020 at 11:12 PM
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `assessmentID` int(255) NOT NULL,
  `passFail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--
-- Creation: Oct 10, 2020 at 02:46 AM
--

DROP TABLE IF EXISTS `roletype`;
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
-- Creation: Oct 10, 2020 at 04:57 PM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `userID` int(255) NOT NULL,
  `level` int(15) NOT NULL,
  `classroomID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--
-- Creation: Oct 10, 2020 at 04:56 PM
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `userID` int(255) NOT NULL,
  `classroomID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--
-- Creation: Oct 12, 2020 at 11:10 PM
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `assessmentID` int(255) NOT NULL,
  `passFail` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Oct 10, 2020 at 04:56 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleTypeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `username`, `password`, `roleTypeID`) VALUES
(22, 'Nate', 'Luginbill', 'nluginbill', '$2y$10$iTdax16m8IkpW9.Ujl1hMeGtk8am0afdjAVg.zbQx6smDWsdHG6PC', 3);

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
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroomID`),
  ADD KEY `fk_classroom_teachers` (`userID`);

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
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fk_students_classroom` (`classroomID`);

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
  MODIFY `assessmentID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classroomID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `roleTypeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `fk_assessment_assessmentType` FOREIGN KEY (`assessmentTypeID`) REFERENCES `assessmenttype` (`assessmentTypeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_assessment_students` FOREIGN KEY (`userID`) REFERENCES `students` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `fk_classroom_teachers` FOREIGN KEY (`userID`) REFERENCES `teachers` (`userID`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_students_classroom` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_students_users` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_classroom` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`) ON DELETE CASCADE,
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
