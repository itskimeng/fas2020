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
-- Table structure for table `tbl_fundsource_entry`
--

CREATE TABLE `tbl_fundsource_entry` (
  `id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `expense_class` varchar(250) NOT NULL,
  `uacs` int(11) NOT NULL,
  `allotment_amount` float NOT NULL,
  `obligated_amount` float NOT NULL,
  `balance` float NOT NULL,
  `is_lock` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fundsource_entry`
--

INSERT INTO `tbl_fundsource_entry` (`id`, `source_id`, `expense_class`, `uacs`, `allotment_amount`, `obligated_amount`, `balance`, `is_lock`) VALUES
(1, 2, 'ps', 5, 205861000, 25000, 205836000, 0),
(2, 2, 'ps', 6, 7824000, 20000, 7804000, 0),
(3, 2, 'ps', 7, 9660000, 5000, 9655000, 0),
(4, 2, 'ps', 8, 9660000, 0, 9660000, 0),
(5, 2, 'ps', 9, 1956000, 0, 1956000, 0),
(6, 2, 'ps', 10, 17155000, 0, 17155000, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
