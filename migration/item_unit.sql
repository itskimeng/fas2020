-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 08:59 AM
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
-- Table structure for table `item_unit`
--

CREATE TABLE `item_unit` (
  `id` int(11) NOT NULL,
  `item_unit_title` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_unit`
--

INSERT INTO `item_unit` (`id`, `item_unit_title`) VALUES
(1, 'piece'),
(2, 'box'),
(3, 'ream'),
(4, 'lot'),
(5, 'unit'),
(6, 'crtg'),
(7, 'pack'),
(8, 'tube'),
(9, 'roll'),
(10, 'can'),
(11, 'bottle'),
(12, 'set'),
(13, 'jar'),
(14, 'bundle'),
(15, 'pad'),
(16, 'book'),
(17, 'pouch'),
(18, 'dozen'),
(19, 'pair'),
(20, 'gallon'),
(21, 'cart'),
(22, 'pax'),
(23, 'liters'),
(24, 'meters');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_unit`
--
ALTER TABLE `item_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_unit`
--
ALTER TABLE `item_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
