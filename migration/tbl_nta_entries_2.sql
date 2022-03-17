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
-- Table structure for table `tbl_nta_entries`
--

CREATE TABLE `tbl_nta_entries` (
  `id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL,
  `ors_id` int(11) NOT NULL,
  `nta_id` int(11) NOT NULL,
  `disbursed_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nta_entries`
--

INSERT INTO `tbl_nta_entries` (`id`, `dv_id`, `ors_id`, `nta_id`, `disbursed_amount`, `status`, `date_created`) VALUES
(1, 1, 3, 1, 2000, 0, '2022-03-17 11:48:16'),
(2, 1, 3, 2, 2500, 0, '2022-03-17 11:48:16'),
(3, 2, 1, 1, 600, 0, '2022-03-17 11:49:18'),
(4, 2, 1, 2, 58, 0, '2022-03-17 11:49:18'),
(5, 4, 5, 1, 4000, 0, '2022-03-17 14:09:58'),
(6, 4, 5, 2, 500, 0, '2022-03-17 14:09:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
