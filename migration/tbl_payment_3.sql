-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:22 AM
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
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `dv_no` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `lddap` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `lddap_date` datetime NOT NULL,
  `link` varchar(250) NOT NULL,
  `disbursed_amount` float NOT NULL,
  `balance` float NOT NULL,
  `fundsource_amount` float NOT NULL,
  `is_dfunds` tinyint(1) NOT NULL DEFAULT 0,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `account_no`, `dv_no`, `status`, `date_created`, `lddap`, `remarks`, `lddap_date`, `link`, `disbursed_amount`, `balance`, `fundsource_amount`, `is_dfunds`, `province`) VALUES
(1, '', 0, 'Delivered to Bank', '2022-03-24 12:00:00', 'LDDAP-LAGUNA-001', 'FUNDS DOWNLOADED 1 for LAGUNA', '2022-03-24 12:00:00', 'https://drive.google.com/file/d/0BzQqXS1_Qb_OUWZSZjZxOF8teG8/view?usp=sharing&resourcekey=0-QNfYbDt6Rnj_ChJGE9RHrw', 0, 10000, 10000, 1, '2'),
(2, '', 0, 'Delivered to Bank', '2022-03-24 12:00:00', 'LDDAP-LAGUNA-001', 'LDDAP LAGUNA 9500', '2022-03-24 12:00:00', 'https://drive.google.com/file/d/0BzQqXS1_Qb_OUWZSZjZxOF8teG8/view?usp=sharing&resourcekey=0-QNfYbDt6Rnj_ChJGE9RHrw', 0, 9500, 9500, 1, '2'),
(3, '', 0, 'Delivered to Bank', '2022-03-24 12:00:00', 'LDDAP-RO', 'RO', '2022-03-24 12:00:00', 'https://drive.google.com/file/d/0BzQqXS1_Qb_OUWZSZjZxOF8teG8/view?usp=sharing&resourcekey=0-QNfYbDt6Rnj_ChJGE9RHrw', 0, 1000, 1000, 0, '11'),
(4, '', 0, 'Delivered to Bank', '2022-03-25 12:00:00', 'LDDAP-2022-CA-001', '19k for Cavite', '2022-03-25 12:00:00', 'https://drive.google.com/file/d/0BzQqXS1_Qb_OUWZSZjZxOF8teG8/view?usp=sharing&resourcekey=0-QNfYbDt6Rnj_ChJGE9RHrw', 0, 19000, 19000, 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
