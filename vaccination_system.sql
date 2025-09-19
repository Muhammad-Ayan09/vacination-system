-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 02:10 AM
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
-- Database: `vaccination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'asset/imgs/karthik-raja-john-wick.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `v_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `p_id`, `h_id`, `date`, `time`, `v_id`, `status`) VALUES
(12, 4, 10, '2025-08-31', '10-11', 1, 'pending'),
(13, 4, 11, '2025-09-12', '10-11', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`) VALUES
(1, 'karachi'),
(2, 'punjab'),
(3, 'peshawar'),
(4, 'balochistan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `p_id`, `message`, `status`) VALUES
(2, 4, 'i like the hospital', 'show'),
(3, 2, 'i like the hospital service', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(15) NOT NULL,
  `cid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`id`, `name`, `contact`, `cid`, `email`, `password`, `image`, `address`, `status`) VALUES
(10, 'Jinnah Hospital', 12345678, 1, 'jinnahhospital@gmail.com', '1234', 'asset/imgs/hospital images/jinnah hospital.jpeg', 'Anwar-e-Ibrahim/Malir15/Karachi', 'activate'),
(11, 'Agha khan', 12345678, 2, 'aghakhan@gmail.com', '1234', 'asset/imgs/hospital images/agha khan hospital.jpeg', 'Anwar-e-Ibrahim/Malir14/Karachi', 'activate'),
(12, 'liaquat national', 1234567, 1, 'liaquatnational@gmail.com', '1234', 'asset/imgs/hospital images/liaquat national.jpeg', 'Anwar-e-Ibrahim/Malir16/Karachi', 'activate'),
(13, 'Indus hospital', 1234674, 3, 'indushospital@gmail.com', '1234', 'asset/imgs/hospital images/indus hospital.jpeg', 'Anwar-e-Ibrahim/Malir11.1/Karachi', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `cid` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id`, `name`, `contact`, `email`, `password`, `cid`, `address`, `gender`, `image`, `status`) VALUES
(1, 'ali', 123456789, 'ali@gmail.com', '1234', 2, 'street 54', 'male', 'asset/imgs/patient images/ice.webp', 'activate'),
(2, 'ayan', 123456789, 'ayan@gmail.com', '1234', 1, 'street 34 karachi', '', 'assets/patient images/.ice plate.jpg', 'activate'),
(3, 'ayan', 1234556, 'ayan@gmail.com', '1234', 4, 'street 88 punjab', 'male', 'asset/imgs/patient images/', 'deactivate'),
(4, 'rayan', 123456789, 'rayan@gmail.com', '1234', 1, 'kdjkdkkas', 'male', 'assets/patient images/.skull.jfif', 'activate'),
(5, 'syed muhammad rayan', 0, 'rayan@gmail.com', '1234', 0, '', '', '', 'activate'),
(6, 'saad', 123456789, 'saad@gmail.com', '1234', 1, 'street 76 karachi', 'male', 'asset/imgs/patient images/ice.webp', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `result` varchar(50) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `p_id`, `h_id`, `date`, `result`) VALUES
(5, 4, 10, '', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`id`, `name`, `status`) VALUES
(1, 'sinovac', 'available'),
(2, 'sinopharm', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
