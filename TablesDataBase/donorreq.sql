-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 10:57 PM
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
-- Table structure for table `donorreq`
--

CREATE TABLE `donorreq` (
  `number_reg` int(20) NOT NULL,
  `blood_type` text NOT NULL,
  `number_of_unit` text NOT NULL,
  `phone_number` text NOT NULL,
  `accept_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorreq`
--

INSERT INTO `donorreq` (`number_reg`, `blood_type`, `number_of_unit`, `phone_number`, `accept_status`) VALUES
(2, 'O+', '3', '+97059365131', 'قبول'),
(1, 'b+', '1', '+970593651317', '-'),
(3, 'O-', '1', '0988765', 'رفض');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donorreq`
--
ALTER TABLE `donorreq`
  ADD PRIMARY KEY (`phone_number`(20));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
