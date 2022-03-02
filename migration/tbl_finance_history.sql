-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:01 PM
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
-- Table structure for table `tbl_finance_history`
--

CREATE TABLE `tbl_finance_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `ob_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_finance_history`
--

INSERT INTO `tbl_finance_history` (`id`, `user_id`, `menu_id`, `ob_id`, `dv_id`, `pay_id`, `action`, `message`, `date_created`) VALUES
(23, 3174, 1, 62, 0, 0, 'save', 'Created New Obligation Amounting ₱250000', '2022-03-02 18:23:25'),
(25, 3174, 1, 62, 0, 0, 'update', 'Updated  Amount 250000', '2022-03-02 18:27:15'),
(26, 3174, 1, 62, 0, 0, 'submit', 'Obligation  Submitted', '2022-03-02 18:28:18'),
(27, 3319, 1, 62, 0, 0, 'receive', 'Obligation  Received', '2022-03-02 18:28:50'),
(28, 3319, 1, 62, 0, 0, 'updated', 'Obligation SR-100-10-70 Updated', '2022-03-02 18:29:27'),
(29, 3319, 1, 62, 0, 0, 'obligate', 'SR-100-10-70 Obligated', '2022-03-02 18:29:44'),
(30, 3319, 1, 62, 0, 0, 'release', 'Obligation SR-100-10-70 Released Amounting P250000', '2022-03-02 18:31:55'),
(33, 3319, 2, 62, 10, 0, 'received_dv', 'Obligation Serial Number: SR-100-10-70 has been received amounting 250000', '2022-03-02 18:42:13'),
(34, 3319, 1, 62, 10, 0, 'update_disbursement', 'Successfully Disbursed 1 amounting 249995', '2022-03-02 18:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_finance_history`
--
ALTER TABLE `tbl_finance_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_finance_history`
--
ALTER TABLE `tbl_finance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
