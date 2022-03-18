-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:17 AM
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
-- Table structure for table `tbl_nta`
--

CREATE TABLE `tbl_nta` (
  `id` int(11) NOT NULL,
  `nta_date` datetime DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `nta_number` varchar(255) NOT NULL,
  `saro_number` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `particular` longtext NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `obligated` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = active,\r\n1 = inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nta`
--

INSERT INTO `tbl_nta` (`id`, `nta_date`, `received_date`, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, `date_created`, `status`) VALUES
(1, '2022-03-17 11:25:45', '2022-03-17 11:25:45', 'NTA-2022-001', 'SARO-2022-001', 'AN-2020-001', 'Manila Bay Funds (7603)', '1Q', 1000000, 6600, 993400, 3319, '2022-03-17 11:25:45', 0),
(2, '2022-03-17 11:26:22', '2022-03-17 11:26:22', 'NTA-2022-002', 'SARO-2022-002', 'AN-2020-002', 'ISO Audit (7603)', '1Q', 2000000, 3058, 1996942, 3319, '2022-03-17 11:26:22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_nta`
--
ALTER TABLE `tbl_nta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nta`
--
ALTER TABLE `tbl_nta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
