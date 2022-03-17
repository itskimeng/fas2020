-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 04:27 AM
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
-- Table structure for table `tbl_dv_entries`
--

CREATE TABLE `tbl_dv_entries` (
  `id` int(11) NOT NULL,
  `obligation_id` int(11) NOT NULL,
  `dv_number` varchar(255) NOT NULL,
  `tax` int(11) NOT NULL,
  `gsis` int(11) NOT NULL,
  `pagibig` int(11) NOT NULL,
  `philhealth` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_received` datetime NOT NULL,
  `date_process` datetime NOT NULL,
  `date_released` datetime NOT NULL,
  `date_created` datetime NOT NULL COMMENT 'creation of this data',
  `dv_date` datetime DEFAULT NULL,
  `lock_na` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dv_entries`
--
ALTER TABLE `tbl_dv_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dv_entries`
--
ALTER TABLE `tbl_dv_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
