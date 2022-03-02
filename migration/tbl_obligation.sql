-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 10:23 AM
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
-- Table structure for table `tbl_obligation`
--

CREATE TABLE `tbl_obligation` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT '1=burs\r\n2=ors',
  `is_dfunds` tinyint(1) NOT NULL DEFAULT 0,
  `serial_no` varchar(250) NOT NULL,
  `po_id` varchar(11) NOT NULL COMMENT 'purchase order',
  `supplier` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `purpose` mediumtext NOT NULL,
  `amount` float NOT NULL,
  `remarks` mediumtext NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Draft',
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `submitted_by` int(11) NOT NULL,
  `date_received` datetime DEFAULT NULL,
  `received_by` int(11) NOT NULL,
  `date_obligated` datetime DEFAULT NULL,
  `obligated_by` int(11) NOT NULL,
  `date_returned` datetime DEFAULT NULL,
  `returned_by` int(11) NOT NULL,
  `returned_reason` mediumtext NOT NULL,
  `date_released` datetime DEFAULT NULL,
  `released_by` int(11) NOT NULL,
  `designation` int(11) NOT NULL COMMENT '0 = budget,\r\n1 = accounting,\r\n2 = cash',
  `is_submitted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_obligation`
--
ALTER TABLE `tbl_obligation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_obligation`
--
ALTER TABLE `tbl_obligation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
