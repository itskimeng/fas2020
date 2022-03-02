-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 09:58 AM
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
-- Table structure for table `rfq_items`
--

CREATE TABLE `rfq_items` (
  `id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `app_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `abc` double DEFAULT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfq_items`
--

INSERT INTO `rfq_items` (`id`, `rfq_id`, `pr_no`, `app_id`, `description`, `qty`, `unit_id`, `abc`, `total_amount`) VALUES
(1, 0, '2022-03-0001', 951, 'LOREM IPSUM', 1, 0, 300, 300),
(2, 2, '2022-03-0003', 951, '', 2, 0, 300, 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rfq_items`
--
ALTER TABLE `rfq_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rfq_items`
--
ALTER TABLE `rfq_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
