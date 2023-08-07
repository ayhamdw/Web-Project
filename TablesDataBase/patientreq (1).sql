-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 10:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientreq`
--

CREATE TABLE `patientreq` (
  `number_reg` text NOT NULL,
  `blood_type` text NOT NULL,
  `number_of_unit` text NOT NULL,
  `number_id` text NOT NULL,
  `accept_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientreq`
--

INSERT INTO `patientreq` (`number_reg`, `blood_type`, `number_of_unit`, `number_id`, `accept_status`) VALUES
('#3', 'B-', '7', '406778889', 'رفض'),
('#2', 'O-', '1', '407111555', 'رفض'),
('#4', 'O+', '1', '408222555', '-'),
('#1', 'b+', '2', '408222602', 'قبول');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patientreq`
--
ALTER TABLE `patientreq`
  ADD PRIMARY KEY (`number_id`(20));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
