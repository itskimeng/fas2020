-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:22 AM
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
  `status` int(11) NOT NULL COMMENT '0 = active,\r\n1 = inactive',
  `is_lock` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nta`
--

INSERT INTO `tbl_nta` (`id`, `nta_date`, `received_date`, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, `date_created`, `status`, `is_lock`) VALUES
(1, '2022-03-24 09:24:15', '2022-03-24 09:24:15', 'NTA-2022-001', '2022-03-001', 'D-20-0010452	', 'Manila Bay Funds (7603)', '1Q', 1000000, 11000, 967000, 3319, '2022-03-24 07:56:29', 0, 0),
(2, '2022-03-24 09:24:37', '2022-03-24 09:24:37', 'NTA-2022-002', '2022-03-002', 'D-20-0020216', 'ISO Audit (7603)', '1Q', 2000000, 10500, 1968500, 3319, '2022-03-24 07:58:36', 0, 1),
(3, '2022-03-24 07:59:51', '2022-03-24 07:59:51', 'NTA-2022-003', '2022-03-003', 'D-20-0020173', 'LGU Compliane Top Performer of MBCRPP (7603)', '1Q', 2000000, 19000, 1943000, 3319, '2022-03-24 07:59:51', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
