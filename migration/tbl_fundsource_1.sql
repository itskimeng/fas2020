-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:01 AM
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
-- Dumping data for table `tbl_fundsource`
--

INSERT INTO `tbl_fundsource` (`id`, `source`, `name`, `ppa`, `legal_basis`, `particulars`, `total_allotment_amount`, `total_allotment_obligated`, `total_balance`, `status`, `created_by`, `date_created`, `is_lock`) VALUES
(1, 'PS', 'GENERAL FUND- NEW GENERAL APPROPRIATIONS - SPECIFIC BUDGETS OF NATIONAL GOVERNMENT AGENCIES', '310100100001000 - Supervision and Development of Local Government', 'RA 11639 REGULAR 2022 CURRENT', 'Regular Agency Budget', 0, 0, 0, '', 0, '2022-03-17 09:27:00', 0),
(2, 'PS', 'GENERAL FUND- NEW GENERAL APPROPRIATIONS - SPECIFIC BUDGETS OF NATIONAL GOVERNMENT AGENCIES', '310100100001000 - Supervision and Development of Local Government', 'RA 11639 REGULAR 2022 CURRENT', 'Regular Agency Budget', 252116000, 0, 252116000, '', 3320, '2022-03-17 10:54:45', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
