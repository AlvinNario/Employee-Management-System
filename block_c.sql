-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 06:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `block_c`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emp_id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Alvin Nario', 'alvinnario', 'alvinnario@gmail.com', '10212002');

-- --------------------------------------------------------

--
-- Table structure for table `atlog`
--

CREATE TABLE `atlog` (
  `atlog_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `atlog_date` date DEFAULT NULL,
  `am_in` time DEFAULT NULL,
  `am_out` time DEFAULT NULL,
  `pm_in` time DEFAULT NULL,
  `pm_out` time DEFAULT NULL,
  `am_late` int(11) DEFAULT NULL,
  `am_undertime` int(11) DEFAULT NULL,
  `pm_late` int(11) DEFAULT NULL,
  `pm_undertime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atlog`
--

INSERT INTO `atlog` (`atlog_id`, `emp_id`, `atlog_date`, `am_in`, `am_out`, `pm_in`, `pm_out`, `am_late`, `am_undertime`, `pm_late`, `pm_undertime`) VALUES
(83, 210, '2023-12-10', '05:35:00', '05:35:00', '05:35:00', '05:35:00', 0, 1, 0, 1),
(84, 121, '2023-12-10', '05:39:00', '05:39:00', '05:39:00', '05:39:00', 0, 1, 0, 1),
(85, 0, '2023-12-10', '06:23:00', '06:23:00', '06:23:00', '06:23:00', 0, 1, 0, 1),
(86, 210, '2023-12-11', '08:11:00', '08:11:00', '08:11:00', '08:11:00', 1, 1, 0, 1),
(87, 100, '2023-12-11', '08:44:00', '08:44:00', '08:44:00', '08:44:00', 1, 1, 0, 1),
(88, 503, '2023-12-17', '10:51:00', '11:29:00', '11:29:00', '11:29:00', 1, 1, 0, 0),
(89, 503, '2023-12-17', '11:29:00', '11:29:00', '11:29:00', '11:29:00', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `status`) VALUES
(0, 'CHEM', 'active'),
(2101, 'IT', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `shift_time` varchar(50) NOT NULL,
  `department_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `image`, `first_name`, `last_name`, `username`, `email`, `password`, `mobile`, `dob`, `status`, `gender`, `shift_time`, `department_name`) VALUES
(210, 'dp.png', 'Rachelle Anne', 'Manilla', 'rachellemanila', 'rachellemanila@gmail.com', 'riii', '09112531712', '2023-12-17', 'Active', 'Female', '08:00:00-11:45:00 AM 12:30:00-04:00:00 PM', 'IT'),
(312391, 'Screenshot 2023-03-07 175441.png', 'Johua', 'Nario', 'alvin', 'alvinnario07@gmail.com', 'alvin', '09774246291', '2002-10-21', 'Active', 'Male', '08:00:00-11:45:00 AM 12:30:00-04:00:00 PM', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `login_records`
--

CREATE TABLE `login_records` (
  `login_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `login_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_records`
--

INSERT INTO `login_records` (`login_id`, `first_name`, `last_name`, `email`, `gender`, `mobile`, `login_time`) VALUES
(13, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '07:40:22'),
(14, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '08:13:30'),
(16, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '10:50:26'),
(17, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '11:26:17'),
(18, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '11:29:25'),
(19, '', '', 'johncarlomolleda@gmail.com', 'Female', '', '13:14:02'),
(20, '', '', 'johncarlomolleda@gmail.com', 'Female', '', '13:25:48'),
(21, '', '', 'johncarlomolleda@gmail.com', 'Female', '', '13:27:29'),
(22, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09091422156', '13:29:31'),
(23, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09091422156', '15:01:41'),
(24, '', '', 'alvin@gmail.com', 'Male', '', '16:22:24'),
(25, '', '', 'alvin@gmail.com', 'Male', '', '16:23:10'),
(26, '', '', 'alvin@gmail.com', 'Male', '', '16:23:17'),
(27, '', '', 'alvin@gmail.com', 'Male', '', '16:23:31'),
(28, 'Rachelle Anne', 'Manilla', 'rachellemanila@gmail.com', 'Female', '09112531712', '16:27:45'),
(29, '', '', '', 'Male', '', '16:41:47'),
(30, 'Alvin', 'Nario', 'alvinnario07@gmail.com', 'Male', '09091422156', '16:46:28'),
(31, 'John Carlo', 'Molleda', 'johncarlomolleda@gmail.com', 'Male', '09112531712', '16:54:29'),
(32, 'Alvin', 'Nario', 'alvinnario56@gmail.com', 'Male', '09774246291', '16:57:25'),
(33, 'Alvin', 'nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '17:00:35'),
(34, 'alvin', 'nario', 'alvinnario07@gmail.com', 'Female', '09112531712', '17:05:35'),
(35, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '17:27:53'),
(36, 'John Carlo', 'Molleda', 'johncarlomolleda@gmail.com', 'Male', '09112531712', '17:36:26'),
(37, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '18:25:48'),
(38, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '18:26:22'),
(39, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '18:26:55'),
(40, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '18:27:21'),
(41, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '18:28:22'),
(42, 'lavin', 'njas', 'alvinnario07@gmail.com', 'Male', '09774246291', '07:21:56'),
(43, 'Johua', 'Nario', 'alvinnario07@gmail.com', 'Male', '09774246291', '10:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `am_start` time NOT NULL,
  `am_end` time NOT NULL,
  `pm_start` time NOT NULL,
  `pm_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `am_start`, `am_end`, `pm_start`, `pm_end`) VALUES
(4, '08:00:00', '11:45:00', '12:30:00', '04:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `atlog`
--
ALTER TABLE `atlog`
  ADD PRIMARY KEY (`atlog_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `login_records`
--
ALTER TABLE `login_records`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atlog`
--
ALTER TABLE `atlog`
  MODIFY `atlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312392;

--
-- AUTO_INCREMENT for table `login_records`
--
ALTER TABLE `login_records`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
