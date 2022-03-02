-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:24 PM
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
(56, '', 0, 'SR-2022-001', '1', '10', 'UG22-23 Star Centrum Bldg. #317 Gil Puyat Ave. Makati City', 'PO-2020-009', 100000, '', 'Released', '2022-03-02 12:48:32', 3319, NULL, 0, '2022-03-02 12:48:37', 3319, '2022-03-02 12:48:37', 3319, '2022-03-02 12:48:38', 3319, NULL, 0, '', '2022-03-02 12:48:39', 3319, 1, 1),
(57, 'ors', 1, 'SR-2022-002', '', '3', 'Batangas', 'Downloaded Funds', 5000, '', 'Released', '2022-03-02 12:52:18', 3319, NULL, 0, '2022-03-02 12:52:19', 3319, '2022-03-02 12:52:19', 3319, '2022-03-02 12:52:20', 3319, NULL, 0, '', '2022-03-02 12:52:24', 3319, 1, 1),
(58, 'burs', 0, 'SR-2022-003', '2', '11', '108-A Kaingin Road, Balintawak, Quezon City', 'Entry 3', 250000, '', 'Released', '2022-03-02 13:12:25', 3319, NULL, 0, '2022-03-02 01:12:30', 3319, '2022-03-02 01:12:30', 3319, '2022-03-02 01:12:31', 3319, NULL, 0, '', '2022-03-02 01:12:32', 3319, 1, 1),
(59, 'ors', 0, 'SR-100-10-69', '2', '11', '108-A Kaingin Road, Balintawak, Quezon City', 'Aaaa', 250000, '', 'Released', '2022-03-02 14:26:25', 3319, NULL, 0, '2022-03-02 02:28:07', 3319, '2022-03-02 02:28:07', 3319, '2022-03-02 03:15:50', 3319, NULL, 0, '', '2022-03-02 03:16:14', 3319, 1, 1),
(60, 'ors', 1, 'SR-100-10-69', '', '2', 'Laguna', 'a', 100, '', 'Released', '2022-03-02 15:17:12', 3319, NULL, 0, '2022-03-02 03:17:29', 3319, '2022-03-02 03:17:29', 3319, '2022-03-02 03:18:39', 3319, NULL, 0, '', '2022-03-02 03:19:34', 3319, 1, 1),
(61, '', 0, 'SR-100-10-1', '1', '10', 'UG22-23 Star Centrum Bldg. #317 Gil Puyat Ave. Makati City', '', 100000, '', 'Released', '2022-03-02 17:58:44', 3319, NULL, 0, '2022-03-02 05:58:46', 3319, '2022-03-02 05:58:46', 3319, '2022-03-02 05:58:48', 3319, NULL, 0, '', '2022-03-02 05:58:49', 3319, 0, 1),
(62, 'burs', 0, 'SR-100-10-70', '2', '11', '108-A Kaingin Road, Balintawak, Quezon City', 'Kim', 250000, '', 'Released', '2022-03-02 18:23:25', 3174, NULL, 0, '2022-03-02 06:28:18', 3174, '2022-03-02 06:29:27', 3319, '2022-03-02 06:29:44', 3319, NULL, 0, '', '2022-03-02 06:31:55', 3319, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
