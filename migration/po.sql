-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:46 AM
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
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rfq_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `po_date` date DEFAULT NULL,
  `noa_date` date DEFAULT NULL,
  `ntp_date` date DEFAULT NULL,
  `po_amount` double NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_no`, `rfq_no`, `po_date`, `noa_date`, `ntp_date`, `po_amount`, `remarks`) VALUES
(1, '2022-03-0001', '2022-0001', '2022-03-10', '2022-03-10', '2022-03-10', 1000, NULL),
(2, '2022-03-00002', '2022-00002', '2022-03-30', '2022-03-30', '2022-03-30', 400, NULL),
(3, '2022-03-0003', '2022-0003', '2022-03-02', '2022-02-08', '2022-03-01', 150, NULL),
(4, '2022-03-0004', '2022-0004', '2022-02-18', '2022-02-24', '2022-02-14', 850, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_no` (`po_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
