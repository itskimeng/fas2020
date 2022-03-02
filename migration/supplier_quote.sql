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
-- Table structure for table `supplier_quote`
--

CREATE TABLE `supplier_quote` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT 0,
  `rfq_no` varchar(20) NOT NULL,
  `rfq_item_id` int(11) NOT NULL DEFAULT 0,
  `ppu` int(50) NOT NULL DEFAULT 0 COMMENT 'price per unit\r\n',
  `remarks` text NOT NULL,
  `is_winner` char(20) NOT NULL COMMENT '1=winner'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_quote`
--

INSERT INTO `supplier_quote` (`id`, `supplier_id`, `rfq_no`, `rfq_item_id`, `ppu`, `remarks`, `is_winner`) VALUES
(1, 920, '2022-0001', 951, 250, '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier_quote`
--
ALTER TABLE `supplier_quote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier_quote`
--
ALTER TABLE `supplier_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
