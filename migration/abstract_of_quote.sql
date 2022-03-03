-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:47 AM
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
-- Table structure for table `abstract_of_quote`
--

CREATE TABLE `abstract_of_quote` (
  `id` int(11) NOT NULL,
  `abstract_no` varchar(100) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT 0,
  `rfq_id` int(11) NOT NULL DEFAULT 0,
  `warranty` varchar(50) DEFAULT '0',
  `price_validity` varchar(50) DEFAULT '0',
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abstract_of_quote`
--

INSERT INTO `abstract_of_quote` (`id`, `abstract_no`, `supplier_id`, `rfq_id`, `warranty`, `price_validity`, `date_created`) VALUES
(1, '2022-0001', 683, 1, '', '', '2022-03-02'),
(2, '2022-0002', 603, 2, '', '', '2022-03-03'),
(3, '2022-0003', 16, 3, '', '', '2022-03-03'),
(4, '2022-0004', 414, 4, '', '', '2022-03-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstract_of_quote`
--
ALTER TABLE `abstract_of_quote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abstract_of_quote`
--
ALTER TABLE `abstract_of_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
