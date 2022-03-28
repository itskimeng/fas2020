-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:21 AM
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
-- Table structure for table `tbl_nta_entries`
--

CREATE TABLE `tbl_nta_entries` (
  `id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL,
  `ors_id` int(11) NOT NULL,
  `nta_id` int(11) NOT NULL,
  `disbursed_amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Processing,\r\nReceived - Cash',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nta_entries`
--

INSERT INTO `tbl_nta_entries` (`id`, `dv_id`, `ors_id`, `nta_id`, `disbursed_amount`, `status`, `date_created`) VALUES
(3, 1, 2, 1, 10000, 'Received - Cash', '2022-03-24 09:26:36'),
(4, 1, 2, 2, 9500, 'Received - Cash', '2022-03-24 09:26:36'),
(6, 2, 1, 3, 19000, 'Received - Cash', '2022-03-24 09:28:14'),
(9, 3, 3, 1, 1000, 'Received - Cash', '2022-03-24 10:43:51'),
(10, 3, 3, 2, 1000, '', '2022-03-24 10:43:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_nta_entries`
--
ALTER TABLE `tbl_nta_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nta_entries`
--
ALTER TABLE `tbl_nta_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
