-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 06:33 AM
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
-- Database: `alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `pwd`) VALUES
(1, 'admin@123', 'admin'),
(2, 'admin2@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eid` int(11) NOT NULL,
  `eventname` varchar(20) NOT NULL,
  `dates` date NOT NULL,
  `timess` time NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `eventname`, `dates`, `timess`, `detail`) VALUES
(1, 'etinic day', '2024-11-29', '04:30:00', 'hgfhgfhgfh'),
(4, 'onam', '2024-08-27', '10:00:00', 'qwertyudfgh'),
(5, 'holi', '2025-08-26', '11:25:00', 'hooooliiii'),
(6, 'annual day', '2025-05-13', '09:16:00', 'adsdaaf agggahaha');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `position` enum('HOD','Guest Lecture','Lecture') NOT NULL,
  `department` enum('computer','commerce','social work','maths','media') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `email`, `position`, `department`) VALUES
(1, 'raju raj', 'raj@gmail.com', 'Lecture', 'social work'),
(9, 'vivek', 'vivek210@gmail.com', 'Guest Lecture', 'media'),
(10, 'murujan', 'pulligerr@gmail.com', 'Lecture', 'commerce'),
(11, 'puspa kumar', 'kumar@gmail.com', 'HOD', 'maths');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(11) NOT NULL,
  `companyname` varchar(20) NOT NULL,
  `applydate` date NOT NULL,
  `designation` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `companyname`, `applydate`, `designation`, `qualification`, `salary`, `contact`, `detail`) VALUES
(1, 'rgtght', '2024-11-22', 'fdfdbxd', 'jhjh', 'tdutdu', 'jyfuyfuy', 'iyiuyriyr'),
(2, 'rgtght', '2024-11-14', 'mnn', 'jhjh', 'ertt', 'hh', 'hkh'),
(4, 'wipro', '2025-06-04', 'project managers', 'bca,mca,bcom-com', '2-3lpa', 'wiprohriringmang@gma', 'the details of.....gggghh  ujunj'),
(5, 'ewsaq', '2024-11-29', 'hhjf', 'iiu,okk,ooj', 'retre', 'dhgdgfdf', 'qwerty uiopa sdf ghjkl zxcv');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `cpwd` varchar(10) NOT NULL,
  `desig` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `batch` enum('2000-2004','2004-2007','2007-2010','2010-2013') NOT NULL,
  `course` enum('BCA','BCOM','BSW','Maths') NOT NULL,
  `user` enum('alumini','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `fname`, `mname`, `lname`, `email`, `pwd`, `cpwd`, `desig`, `dob`, `gender`, `batch`, `course`, `user`) VALUES
(1, 'charles', 'joesph', 'sunny', 'charly@123', '123', '123', 'manager', '2003-08-15', 'male', '2004-2007', 'BCOM', 'alumini'),
(2, 'ajay', 'k', 'baby', 'ajay@gmail.com', '123', '123', 'software developer', '2000-09-14', 'male', '2004-2007', 'BCA', 'alumini'),
(3, 'Amith', '', 'Binoy', 'Amitbinoy@gmail.com', 'amit', 'amit', 'Finance Manager', '2023-03-06', 'male', '2004-2007', 'BCA', 'alumini'),
(12, 'arun', 'p', 'kumar', 'arun@gmail.com', '123', '123', 'mca', '2024-11-06', 'male', '2007-2010', 'BCA', 'alumini'),
(13, 'mariya', '', 'biju', 'mariyaa@gnail.com', 'mariyaa', 'mariyaa', 'dev', '2024-11-01', 'female', '2000-2004', 'BCA', 'alumini'),
(14, 'kreethy', 's', 'suresh', 'kreer@gmail.com', 'kree', 'kree', 'werty', '2024-04-16', 'female', '2007-2010', 'BSW', 'alumini'),
(15, 'ljljl', 'werty', 'dsd', 'add@gmail.com', '12345', '12345', 'asdfgh', '2024-06-06', 'female', '2004-2007', 'BSW', 'alumini'),
(16, 'deepa', '', 'george', 'deepa@gmail.com', '123', '123', 'professor', '2001-01-28', 'male', '2000-2004', 'BCOM', 'alumini');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
