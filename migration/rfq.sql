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
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `id` int(11) NOT NULL,
  `rfq_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmo_id` int(11) DEFAULT NULL,
  `rfq_mode_id` int(11) NOT NULL,
  `rfq_date` date DEFAULT NULL,
  `quotation_date` date DEFAULT NULL,
  `warranty` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_validity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pr_received_date` date NOT NULL,
  `action_officer` int(11) DEFAULT NULL,
  `other_instructions` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `stat` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_awarded` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`id`, `rfq_no`, `purpose`, `pmo_id`, `rfq_mode_id`, `rfq_date`, `quotation_date`, `warranty`, `price_validity`, `pr_no`, `pr_received_date`, `action_officer`, `other_instructions`, `stat`, `is_awarded`) VALUES
(1, '2022-0001', 'LOREM IPSUM', NULL, 0, '2022-03-02', NULL, NULL, NULL, '2022-03-0001', '0000-00-00', NULL, NULL, '5', '1'),
(2, '2022-00002', 'w', NULL, 0, '2022-03-02', NULL, NULL, NULL, '2022-03-0003', '0000-00-00', NULL, NULL, '5', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rfq`
--
ALTER TABLE `rfq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
