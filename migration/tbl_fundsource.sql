-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:24 PM
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
(3, 'SR2019-10-2281', 'General Fund-New General Appropriations-Specific Budgets of National Government Agencies 13', '310100200034001', 'RA 11260 Regular 2020 Continuing', 'wqe', 550000, 0, 550000, '', 3174, '2022-02-07 11:33:23', 0),
(4, 'SR2019-10-2282', 'General Fund-New General Appropriations-Specific Budgets', '310100200034005', 'RA 11260 Regular 2019 Continuing', '', 1150000, 160000, 990000, '', 3174, '2022-02-08 08:28:38', 0),
(5, 'SR2019-10-2289', 'General Fund - Continuing  Appropriations - Bayanihan Recover as One Act', '3101002000345004', 'RA 11260 Regular 2019 Continuing', '', 1000000, 0, 1000000, '', 3174, '2022-02-08 08:32:44', 0),
(6, 'SR2019-10-2287', 'General Fund-New General Appropriations-Specific Budgets of National Government Agencies 12', '310100200034009', 'RA 11260 Regular 2019 Continuing', '', 200000, 0, 200000, '', 3174, '2022-02-08 10:08:26', 0),
(21, 'SR2019-10-2280', 'ads', '410100200034001', '123123', 'qweqe', 120000, 0, 120000, '', 3320, '2022-02-23 08:03:18', 1),
(26, 'SR2019-10-5280', 'asdasd', '310100200034001', 'RA 11260 Regular 2019 Continuing', 'qweqwe', 153, 0, 153, '', 3320, '2022-02-23 09:23:09', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
