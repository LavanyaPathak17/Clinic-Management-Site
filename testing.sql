-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2024 at 05:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Test_Admin', 'test@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `apt_details`
--

CREATE TABLE `apt_details` (
  `ID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `ack_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apt_details`
--

INSERT INTO `apt_details` (`ID`, `name`, `email`, `mobile_no`, `category`, `doctor`, `date`, `time`, `ack_no`) VALUES
(3, 'Ananya Pathak', 'test@gmail.com', '111111111', 'GY', 'Ms. Smitha', '2024-07-21', '11:00', '6698c3d775d55'),
(5, 'Prema Pathak', 'test@gmail.com', '222222222', 'GY', 'Ms. Smitha', '2024-07-20', '11:00', '6698c4ce84cd6'),
(6, 'fjdkcnxk', 'test@gmail.com', '333333333', 'OD', 'Mr. Taylor', '2024-07-18', '14:00', '6698c87ef1dca');

-- --------------------------------------------------------

--
-- Table structure for table `banner_tbl`
--

CREATE TABLE `banner_tbl` (
  `id` int NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner_tbl`
--

INSERT INTO `banner_tbl` (`id`, `heading`, `content`, `image`) VALUES
(12, 'We are introducing telehealth solutions for patients', 'Experience top-notch telehealth solutions, connecting patients with expert doctors online for seamless, immediate, and personalized healthcare from home', 'homeimg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `navigation_tbl`
--

CREATE TABLE `navigation_tbl` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation_tbl`
--

INSERT INTO `navigation_tbl` (`id`, `name`, `link`) VALUES
(6, 'Home', 'http://localhost:3000/task1.php#'),
(7, 'ABOUT', 'http://localhost:3000/task1.php#firstsec'),
(8, 'Login', '#'),
(9, 'Register', '#');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `verification_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_verified` int NOT NULL DEFAULT '0',
  `resettoken` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
('Lavanya Pathak', 'lava24', 'lavanyapathak22.set@modyuniversity.ac.in', '$2y$10$wBno6y3RpnTx5Y/9VCllJ.GZctJM8LXjkvR4IOhaK3cz.oQ49wZxi', '9a70dfda9250a7d367b6a77159cb2a86', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apt_details`
--
ALTER TABLE `apt_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `banner_tbl`
--
ALTER TABLE `banner_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_tbl`
--
ALTER TABLE `navigation_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apt_details`
--
ALTER TABLE `apt_details`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner_tbl`
--
ALTER TABLE `banner_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `navigation_tbl`
--
ALTER TABLE `navigation_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
