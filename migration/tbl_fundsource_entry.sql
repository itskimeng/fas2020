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
-- Table structure for table `tbl_fundsource_entry`
--

CREATE TABLE `tbl_fundsource_entry` (
  `id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `expense_class` varchar(250) NOT NULL,
  `uacs` varchar(250) NOT NULL,
  `expense_group` varchar(250) NOT NULL,
  `allotment_amount` float NOT NULL,
  `obligated_amount` float NOT NULL,
  `balance` float NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fundsource_entry`
--

INSERT INTO `tbl_fundsource_entry` (`id`, `source_id`, `expense_class`, `uacs`, `expense_group`, `allotment_amount`, `obligated_amount`, `balance`, `is_lock`) VALUES
(5, 0, 'mooe', '5-02-01-010-00', 'Capacitating LGUs on Resettlement Governance', 250000, 0, 250000, 0),
(15, 3, 'fe', 'UACS-112', 'Group 2', 200000, 0, 200000, 0),
(16, 3, 'mooe', 'UACS-113', 'Group 3', 300000, 0, 300000, 0),
(32, 4, 'co', 'UACS-117', 'Group 117', 500000, 40000, 460000, 0),
(33, 4, 'ps', 'UACS-118', 'Group 118', 100000, 100000, 0, 0),
(34, 4, 'mooe', 'UACS-119', 'Group 119', 450000, 20000, 430000, 0),
(35, 5, 'mooe', 'UACS-201', 'Group 201', 1000000, 50000, 950000, 0),
(38, 6, 'ps', 'UACS-111', 'Group 111', 100000, 100000, 0, 0),
(39, 6, 'mooe', 'UACS-112', 'Group 112', 100000, 100000, 0, 0),
(42, 3, 'ps', 'UACS-112', 'Group 2', 200000, 100000, 100000, 0),
(47, 4, 'mooe', 'UACS-117', 'Group 117', 500000, 40000, 460000, 0),
(205, 21, 'co', 'UACS-111', 'Group 3', 120000, 26080, 93920, 1),
(214, 26, 'ps', 'UACS-111', 'Group 3', 120, 120, 0, 0),
(215, 26, 'mooe', 'UACS-222', 'Group 4', 33, 33, 0, 0),
(216, 21, 'co', 'UACS-111', 'Group 3', 120000, 51567, 68433, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fundsource_entry`
--
ALTER TABLE `tbl_fundsource_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fundsource_entry`
--
ALTER TABLE `tbl_fundsource_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
