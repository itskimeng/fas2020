-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:21 AM
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
-- Table structure for table `tbl_dv_entries`
--

CREATE TABLE `tbl_dv_entries` (
  `id` int(11) NOT NULL,
  `obligation_id` int(11) NOT NULL,
  `dv_number` varchar(255) NOT NULL,
  `tax` int(11) NOT NULL,
  `gsis` int(11) NOT NULL,
  `pagibig` int(11) NOT NULL,
  `philhealth` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_received` datetime NOT NULL,
  `date_process` datetime NOT NULL,
  `date_released` datetime NOT NULL,
  `date_created` datetime NOT NULL COMMENT 'creation of this data',
  `dv_date` datetime DEFAULT NULL,
  `lock_na` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dv_entries`
--

INSERT INTO `tbl_dv_entries` (`id`, `obligation_id`, `dv_number`, `tax`, `gsis`, `pagibig`, `philhealth`, `other`, `total`, `net_amount`, `remarks`, `status`, `date_received`, `date_process`, `date_released`, `date_created`, `dv_date`, `lock_na`) VALUES
(1, 2, 'DV-LAGUNA-001', 100, 100, 100, 100, 100, 500, 19500, '19.5k for LAGUNA', 'Disbursed', '2022-03-24 09:25:40', '2022-03-24 09:26:36', '2022-03-24 09:26:36', '2022-03-24 09:25:40', '0000-00-00 00:00:00', 0),
(2, 1, 'DV-CAVITE-001', 200, 200, 200, 200, 200, 1000, 19000, '19k for CAVITE', 'Disbursed', '2022-03-24 09:27:30', '2022-03-24 09:28:14', '2022-03-24 09:28:14', '2022-03-24 09:27:30', '0000-00-00 00:00:00', 0),
(3, 3, 'DV-2022-01', 100, 100, 100, 100, 100, 500, 2000, '500 tax', 'Disbursed', '2022-03-24 10:41:55', '2022-03-24 10:43:51', '2022-03-24 10:43:51', '2022-03-24 10:41:55', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dv_entries`
--
ALTER TABLE `tbl_dv_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dv_entries`
--
ALTER TABLE `tbl_dv_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
