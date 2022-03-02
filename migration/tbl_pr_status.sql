-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 09:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fascalab_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr_status`
--

CREATE TABLE `tbl_pr_status` (
  `ID` int(11) NOT NULL,
  `REMARKS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pr_status`
--

INSERT INTO `tbl_pr_status` (`ID`, `REMARKS`) VALUES
(0, 'DRAFT'),
(1, 'SUBMITTED TO BUDGET'),
(2, 'RECEIVED BY BUDGET'),
(3, 'SUBMITTED TO GSS'),
(4, 'RECEIVED BY GSS '),
(5, 'WITH RFQ'),
(6, 'POSTED IN PHILGEPS'),
(7, 'AWARDED'),
(8, 'OBLIGATED'),
(9, 'DELIVERED BY SUPPLIER'),
(10, 'RECEIVED BY END USER'),
(11, 'DISBURSED'),
(12, 'MADE_PAYMENT TO SUPPLIER ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pr_status`
--
ALTER TABLE `tbl_pr_status`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pr_status`
--
ALTER TABLE `tbl_pr_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
