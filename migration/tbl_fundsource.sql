-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 10:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `tbl_fundsource`
--

CREATE TABLE `tbl_fundsource` (
  `id` int(11) NOT NULL,
  `source` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `ppa` varchar(250) NOT NULL,
  `legal_basis` mediumtext NOT NULL,
  `particulars` mediumtext NOT NULL,
  `total_allotment_amount` float NOT NULL,
  `total_allotment_obligated` float NOT NULL,
  `total_balance` float NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fundsource`
--
ALTER TABLE `tbl_fundsource`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fundsource`
--
ALTER TABLE `tbl_fundsource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
