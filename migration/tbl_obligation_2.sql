-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:18 AM
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
-- Dumping data for table `tbl_obligation`
--

INSERT INTO `tbl_obligation` (`id`, `type`, `is_dfunds`, `serial_no`, `po_id`, `supplier`, `address`, `purpose`, `amount`, `remarks`, `status`, `date_created`, `created_by`, `date_updated`, `updated_by`, `date_submitted`, `submitted_by`, `date_received`, `received_by`, `date_obligated`, `obligated_by`, `date_returned`, `returned_by`, `returned_reason`, `date_released`, `released_by`, `designation`, `is_submitted`) VALUES
(1, 'burs', 0, 'SR-100-10-1', '', '11', '108-A Kaingin Road, Balintawak, Quezon City', '1000', 1000, '', 'Released', '2022-03-17 11:17:46', 3174, NULL, 0, '2022-03-17 11:18:30', 3174, '2022-03-17 11:19:08', 3319, '2022-03-17 11:19:16', 3319, NULL, 0, '', '2022-03-17 11:19:22', 3319, 1, 1),
(2, 'burs', 1, 'SR-100-2022-001', '', '3', 'Batangas', '2000', 2000, '', 'Released for PO', '2022-03-17 11:18:22', 3174, NULL, 0, '2022-03-17 11:18:24', 3174, '2022-03-17 11:19:29', 3319, '2022-03-17 11:45:52', 3319, NULL, 0, '', NULL, 0, 0, 1),
(3, 'ors', 1, 'SR-100-2022-002', '', '3', 'Batangas', '5000', 5000, '', 'Released', '2022-03-17 11:46:55', 3319, NULL, 0, '2022-03-17 11:47:03', 3319, '2022-03-17 11:47:03', 3319, '2022-03-17 11:47:04', 3319, NULL, 0, '', '2022-03-17 11:47:06', 3319, 1, 1),
(4, 'burs', 1, 'SR-100-10-1000', '', '3', 'Batangas', '', 1000, '', 'Released', '2022-03-17 13:58:16', 3319, NULL, 0, '2022-03-17 01:58:17', 3319, '2022-03-17 01:58:17', 3319, '2022-03-17 01:58:18', 3319, NULL, 0, '', '2022-03-17 01:58:20', 3319, 1, 1),
(5, 'ors', 1, '001', '', '2', 'Laguna', '5k Laguna', 5000, '', 'Released', '2022-03-17 14:08:28', 3319, NULL, 0, '2022-03-17 02:08:39', 3319, '2022-03-17 02:08:39', 3319, '2022-03-17 02:08:41', 3319, NULL, 0, '', '2022-03-17 02:08:49', 3319, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
