-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 06:07 AM
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
-- Table structure for table `pmo`
--

CREATE TABLE `pmo` (
  `id` int(11) NOT NULL,
  `pmo_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pmo_contact_person` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pmo`
--

INSERT INTO `pmo` (`id`, `pmo_title`, `pmo_contact_person`, `designation`) VALUES
(1, 'ORD', 'Noel R. Bartolabac, CESO V', 'Assistant Regional Director'),
(7, 'LGMED-MBRTG', 'Don Ayer A. Abrazaldo', 'Chief, LGMED'),
(9, 'LGCDD-PDMU', 'Jay-ar T. Beltran', 'OIC - Chief, LGCDD '),
(10, 'FAD', 'Dr. Carina S. Cruz', 'Chief, FAD'),
(17, 'LGCDD', 'Jay-ar T. Beltran', 'OIC - Chief, LGCDD '),
(18, 'LGMED', 'Don Ayer A. Abrazaldo', 'Chief, LGMED'),
(19, 'BATANGAS', 'Abigail N. Andres', 'Provincial Director'),
(20, 'CAVITE', 'Lionel L. Dalope', 'Provincial Director'),
(21, 'LAGUNA', 'John M. Cerezo', 'Provincial Director'),
(22, 'QUEZON', 'Darrell I. Dizon', 'Provincial Director'),
(23, 'RIZAL', 'Allan V. Benitez', 'Provincial Director'),
(24, 'LUCENA', 'Danilo T. Nobleza', 'Provincial Director'),
(112, 'ALL', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pmo`
--
ALTER TABLE `pmo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pmo`
--
ALTER TABLE `pmo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
