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
-- Table structure for table `tbl_object_codes`
--

CREATE TABLE `tbl_object_codes` (
  `id` int(11) NOT NULL,
  `code` mediumtext NOT NULL,
  `uacs` mediumtext NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_object_codes`
--

INSERT INTO `tbl_object_codes` (`id`, `code`, `uacs`, `date_created`) VALUES
(5, 'Basic Salary - Civilian', '5-01-01-010-01', '2022-03-17 08:23:11'),
(6, 'PERA - Civilian', '5-01-02-010-01', '2022-03-17 08:23:20'),
(7, 'Representation Allowance (RA)', '5-01-02-020-00', '2022-03-17 08:23:27'),
(8, 'Transportation Allowance (TA)', '5-01-02-030-01', '2022-03-17 08:23:41'),
(9, 'Clothing/Uniform Allowance - Civilian', '5-01-02-040-01', '2022-03-17 08:25:41'),
(10, 'Bonus - Civilian', '5-01-02-140-01', '2022-03-17 08:25:52'),
(11, 'Cash Gift - Civilian', '5-01-02-150-01', '2022-03-17 08:57:58'),
(12, 'Productivity Enhancement Incentive - Civilian', '5-01-02-990-12', '2022-03-17 08:58:09'),
(13, 'Mid-Year Bonus - Civilian', '5-01-02-160-01', '2022-03-17 08:58:23'),
(14, 'Pag-IBIG - Civilian', '5-01-03-020-01', '2022-03-17 08:58:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_object_codes`
--
ALTER TABLE `tbl_object_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_object_codes`
--
ALTER TABLE `tbl_object_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
