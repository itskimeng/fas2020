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
-- Table structure for table `tbl_obentries`
--

CREATE TABLE `tbl_obentries` (
  `id` int(11) NOT NULL,
  `ob_id` int(11) NOT NULL,
  `fund_source` varchar(100) NOT NULL,
  `uacs` varchar(100) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obentries`
--

INSERT INTO `tbl_obentries` (`id`, `ob_id`, `fund_source`, `uacs`, `amount`) VALUES
(25, 6, '4', '32', 300),
(26, 6, '3', '16', 300),
(27, 6, '5', '35', 400),
(31, 7, '3', '15', 1000),
(34, 2, '2', '2', 1000),
(35, 2, '2', '3', 1000),
(42, 3, '1', '1', 2500),
(43, 3, '2', '3', 2500),
(50, 4, '1', '1', 500),
(51, 4, '2', '3', 500),
(58, 5, '2', '1', 2500),
(59, 5, '2', '3', 2500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_obentries`
--
ALTER TABLE `tbl_obentries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ob_id` (`ob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_obentries`
--
ALTER TABLE `tbl_obentries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
