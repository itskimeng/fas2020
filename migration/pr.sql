-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:41 AM
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
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `id` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `pmo` varchar(255) NOT NULL,
  `username` varchar(55) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `canceled` varchar(55) DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `type` int(11) NOT NULL,
  `pr_date` date NOT NULL,
  `target_date` date NOT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `submitted_by` varchar(55) DEFAULT NULL,
  `submitted_date_gss` datetime DEFAULT NULL,
  `submitted_by_gss` varchar(255) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `received_by` varchar(55) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `stat` int(11) NOT NULL,
  `sq` int(11) NOT NULL,
  `aoq` int(11) NOT NULL,
  `po` int(11) NOT NULL,
  `budget_availability_status` varchar(100) NOT NULL,
  `availability_code` varchar(100) NOT NULL,
  `date_certify` date NOT NULL,
  `submitted_date_budget` varchar(100) NOT NULL,
  `is_urgent` char(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `pr_no`, `pmo`, `username`, `purpose`, `canceled`, `canceled_date`, `type`, `pr_date`, `target_date`, `submitted_date`, `submitted_by`, `submitted_date_gss`, `submitted_by_gss`, `received_date`, `received_by`, `date_added`, `stat`, `sq`, `aoq`, `po`, `budget_availability_status`, `availability_code`, `date_certify`, `submitted_date_budget`, `is_urgent`) VALUES
(1249, '2022-01-0001', '10', NULL, 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR STATISTICIAN I POSITION ', NULL, NULL, 1, '2022-01-04', '2022-01-13', '2022-01-05 00:00:00', 'masacluti', '2022-02-11 09:20:00', 'cmfiscal', '2022-01-04 23:21:26', '', '2022-01-04 01:06:27', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-01-05', ''),
(1251, '2022-01-0002', '10', NULL, 'Change oil  and diesoline of the service vehicle for the month of December 2021 ', NULL, NULL, 3, '2022-01-03', '2022-01-28', '2022-02-11 00:00:00', 'cmfiscal', NULL, NULL, NULL, NULL, '2022-01-20 06:39:32', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-11', ''),
(1253, '2022-01-0004', '10', NULL, 'Meals for the conduct of DILG IV-A Management Review for FY 2021', NULL, NULL, 2, '2022-01-24', '2022-02-10', '2022-02-02 00:00:00', 'mmmonteiro', NULL, NULL, '2022-02-07 21:06:25', 'cmfiscal', '2022-01-24 01:10:04', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-02', ''),
(1254, '2022-01-0005', '17', NULL, 'Printing of Annual Report FY 2022 ', NULL, NULL, 4, '2022-01-24', '2022-01-31', '2022-02-02 15:00:00', 'jamonteiro', '2022-02-02 16:00:08', 'jamonteiro', '2022-02-02 20:50:20', 'masacluti', '2022-01-24 03:03:46', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-02', ''),
(1258, '2022-02-0006', '17', NULL, 'For the Conduct of Orientation on RA 11313 or the Safe Spaces Act for LGUs', NULL, NULL, 5, '2022-02-02', '2022-02-02', '2022-02-02 15:00:00', 'jamonteiro', '2022-02-02 15:50:24', 'jamonteiro', '2022-02-02 23:45:11', 'cmfiscal', '2022-02-02 07:18:25', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-02', ''),
(1260, '2022-02-0007', '10', NULL, 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR VACANT POSITIONS', NULL, NULL, 1, '2022-02-03', '2022-02-09', '2022-02-03 00:00:00', 'caporras', '2022-02-04 14:39:13', 'caporras', NULL, NULL, '2022-02-03 04:23:29', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-03', ''),
(1262, '2022-02-0009', '17', NULL, 'Regional GFPS Quarterly Meeting', NULL, NULL, 1, '2022-02-03', '2022-02-03', '2022-02-11 00:00:00', 'cmfiscal', NULL, NULL, NULL, NULL, '2022-02-03 04:30:03', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-11', ''),
(1263, '2022-02-0008', '', NULL, 'Courier Fee: Tokens for 2021 CFLGA Regional Validators', NULL, NULL, 6, '2022-02-04', '2022-02-04', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-04 04:55:03', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1264, '2022-02-0009', '10', NULL, 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR VACANT POSITIONS', NULL, NULL, 1, '2022-02-07', '2022-02-14', '2022-02-11 00:00:00', 'cmfiscal', NULL, NULL, NULL, NULL, '2022-02-07 02:50:02', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-11', '1'),
(1265, '2022-02-0009', '10', NULL, 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR VACANT POSITIONS', NULL, NULL, 1, '2022-02-07', '2022-02-14', '2022-02-11 00:00:00', 'cmfiscal', NULL, NULL, NULL, NULL, '2022-02-07 02:50:06', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-11', '1'),
(1266, '2022-02-00011', '10', NULL, 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR VACANT POSITIONS', NULL, NULL, 1, '2022-02-07', '2022-02-14', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-07 02:53:49', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1267, '2022-02-00012', '10', NULL, 'Web Hosting', NULL, NULL, 3, '2022-02-07', '2022-02-07', '2022-02-14 00:00:00', 'cmfiscal', '2022-02-14 14:20:00', 'cmfiscal', '2022-02-13 22:24:38', 'cmfiscal', '2022-02-07 23:44:05', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-14', ''),
(1268, '2022-02-00013', '10', NULL, 'Supplies to be used in the Regional Office.', NULL, NULL, 6, '2022-02-04', '2022-02-04', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 17:16:31', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1269, '2022-02-00014', '10', NULL, 'Supplies in the Regional Office', NULL, NULL, 6, '2022-01-28', '2022-01-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 02:30:34', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1270, '2022-02-00015', '10', NULL, 'Laundry service of beddings and blankets used by RD and ARD.', NULL, NULL, 6, '2022-02-02', '2022-02-02', NULL, NULL, '2022-02-14 14:21:00', 'cmfiscal', NULL, '', '2022-02-08 04:38:53', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1271, '2022-02-00016', '10', NULL, 'Laundry service of rags in the Regional Office.', NULL, NULL, 6, '2022-01-13', '2022-01-13', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 05:03:13', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1272, '2022-02-00017', '10', NULL, 'Repair service for the vehicular service (Isuzu Crosswind SAB4999) in the Regional Office.', NULL, NULL, 6, '2022-01-28', '2022-01-28', NULL, NULL, '2022-02-09 10:17:49', 'cmfiscal', NULL, NULL, '2022-02-08 05:54:57', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1273, '2022-02-00018', '18', NULL, 'Regional Orientation on the Establishment, Strengthening and Monitoring the Functionality of Local Council for the Protection of Children at all Levels using the New Assessment Tools Pursuant to DILG MC 2021-039 \r\nFebruary 23,2022', NULL, NULL, 1, '2022-02-14', '2022-02-14', NULL, NULL, '2022-02-16 17:11:00', 'cmfiscal', NULL, '', '2022-02-14 05:56:42', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1274, '2022-02-00019', '10', NULL, 'Change oil of Toyota Innova SLC963', NULL, NULL, 3, '2022-02-14', '2022-02-14', NULL, NULL, '2022-02-16 16:30:52', 'masacluti', NULL, NULL, '2022-02-14 08:52:22', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1275, '2022-02-00020', '17', NULL, 'PROCUREMENT OF IEC MATERIALS WITH LAYOUT AND AVP IN COMMUNICATING THE MANDANAS-GARCIA RULING TOWARDS PARTICIPATIVE REFORMS', NULL, NULL, 5, '2022-02-15', '2022-06-30', NULL, NULL, '2022-02-16 16:30:46', 'masacluti', NULL, NULL, '2022-02-15 01:10:22', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1276, '2022-02-00021', '10', NULL, 'Procurement of Supplies and Furniture and Fixtures to be used in the Regional Office', NULL, NULL, 0, '2022-02-15', '2022-02-21', NULL, NULL, '2022-02-15 15:45:00', 'masacluti', NULL, '', '2022-02-15 23:24:10', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1277, '2022-02-00022', '18', NULL, 'For the conduct of Training-Seminar on Radio Operations', NULL, NULL, 1, '2022-02-15', '2022-03-04', NULL, NULL, '2022-02-16 16:30:37', 'masacluti', NULL, NULL, '2022-02-15 09:12:48', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1278, '2022-02-00023', '18', NULL, 'Soft Launching of the Drug Abuse Treatment and Rehabilitation Center', NULL, NULL, 4, '2022-02-16', '2022-03-07', NULL, NULL, '2022-02-16 15:16:30', 'jmhernandez', NULL, NULL, '2022-02-16 07:00:51', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1279, '2022-02-00024', '18', NULL, 'Soft Launching of the Drug Abuse Treatment and Rehabilitation Center', NULL, NULL, 4, '2022-02-16', '2022-02-07', NULL, NULL, '2022-02-16 15:16:24', 'jmhernandez', NULL, NULL, '2022-02-16 07:04:05', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1280, '2022-02-00025', '18', NULL, 'Soft Launching of the Drug Abuse Treatment and Rehabilitation Center', NULL, NULL, 0, '2022-02-16', '2022-02-07', NULL, NULL, '2022-02-16 16:30:32', 'masacluti', NULL, NULL, '2022-03-02 17:32:00', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1282, '2022-02-00026', '18', '3190', 'Soft Launching of the Drug Abuse Treatment and Rehabilitation Center', NULL, NULL, 5, '2022-02-16', '2022-03-08', NULL, NULL, '2022-02-16 16:30:28', 'masacluti', NULL, NULL, '2022-02-16 08:05:14', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1283, '2022-02-00027', '18', '2908', 'Soft Launching of the Drug Abuse Treatment and Rehabilitation Center', NULL, NULL, 5, '2022-02-16', '2022-03-07', NULL, NULL, '2022-02-16 16:30:24', 'masacluti', NULL, NULL, '2022-02-16 08:20:49', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1284, '2022-02-00028', '', '3202', 'Meals for the conduct of CASABWATCH REGIONAL SUPPORT AND CATALYST GROUP (RSCG) 1ST QUARTER MEETING CUM SOLID WASTE MANAGEMENT CORE TEAM MEETING IN SUPPORT TO THE IMPLEMENTATION OF SOLID WASTE MANAGEMENT IN THE REGIONAL OFFICE', NULL, NULL, 2, '2022-02-18', '2022-02-28', NULL, NULL, '2022-02-18 09:46:05', 'ajfulgencio', NULL, NULL, '2022-02-18 01:45:02', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1285, '2022-02-00029', '', '3202', 'Supplies for the CASABWATCH REGIONAL SUPPORT AND CATALYST GROUP (RSCG) 1ST QUARTER MEETING CUM SOLID WASTE MANAGEMENT CORE TEAM MEETING IN SUPPORT TO THE IMPLEMENTATION OF SOLID WASTE MANAGEMENT IN THE REGIONAL OFFICE', NULL, NULL, 4, '2022-02-18', '2022-03-10', NULL, NULL, '2022-02-18 09:54:09', 'ajfulgencio', NULL, NULL, '2022-02-18 01:53:59', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1286, '2022-02-00030', '', '3202', 'Supplies for the conduct of CASABWATCH REGIONAL SUPPORT AND CATALYST GROUP (RSCG) 1ST QUARTER MEETING CUM SOLID WASTE MANAGEMENT CORE TEAM MEETING IN SUPPORT TO THE IMPLEMENTATION OF SOLID WASTE MANAGEMENT IN THE REGIONAL OFFICE', NULL, NULL, 0, '2022-02-18', '2022-03-10', NULL, NULL, '2022-02-18 10:01:37', 'ajfulgencio', NULL, NULL, '2022-02-18 18:00:49', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1287, '2022-02-00030', '', '3202', 'Supplies for the conduct of CASABWATCH REGIONAL SUPPORT AND CATALYST GROUP (RSCG) 1ST QUARTER MEETING CUM SOLID WASTE MANAGEMENT CORE TEAM MEETING IN SUPPORT TO THE IMPLEMENTATION OF SOLID WASTE MANAGEMENT IN THE REGIONAL OFFICE', NULL, NULL, 0, '2022-02-18', '2022-03-10', NULL, NULL, '2022-02-18 10:01:37', 'ajfulgencio', NULL, NULL, '2022-02-18 18:00:49', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1288, '2022-02-00030', '', '3202', 'Supplies for the conduct of CASABWATCH REGIONAL SUPPORT AND CATALYST GROUP (RSCG) 1ST QUARTER MEETING CUM SOLID WASTE MANAGEMENT CORE TEAM MEETING IN SUPPORT TO THE IMPLEMENTATION OF SOLID WASTE MANAGEMENT IN THE REGIONAL OFFICE', NULL, NULL, 0, '2022-02-18', '2022-03-10', NULL, NULL, '2022-02-18 10:01:37', 'ajfulgencio', NULL, NULL, '2022-02-18 18:00:49', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1289, '2022-02-00033', '10', '2710', 'CONDUCT OF PRE-QUALIFYING EXAMINATION', NULL, NULL, 6, '2022-02-18', '2022-02-18', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-18 05:58:37', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1290, '2022-02-00034', '10', '2710', 'HUMAN RESOURCE MERIT PROMOTION AND SELECTION BOARD MEETING CUM ASSESSMENT FOR VACANT LGOO II POSITIONS', NULL, NULL, 1, '2022-02-18', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-18 06:02:40', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1291, '2022-02-00035', '17', '2664', 'Meals for the Online Training on Gender and Development Planning and Budgeting for Cities and Municipalities, scheduled on March 8-9, 2022', NULL, NULL, 2, '2022-02-21', '2022-03-08', NULL, NULL, '2022-02-21 16:14:00', 'rmtoledo', NULL, NULL, '2022-02-22 00:16:32', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1292, '2022-02-00036', '17', '2664', 'Meals for the Online Training on Gender and Development Planning and Budgeting for Cities and Municipalities, scheduled on March 8-9, 2022.', NULL, NULL, 1, '2022-02-21', '2022-03-08', NULL, NULL, '2022-02-21 16:24:34', 'rmtoledo', NULL, NULL, '2022-02-21 08:22:57', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1293, '2022-02-00037', '10', '3174', 'FOR TESTING', NULL, NULL, 1, '2022-02-21', '2022-02-21', NULL, NULL, '2022-02-21 16:56:00', 'masacluti', NULL, '', '2022-02-21 08:56:43', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1294, '2022-02-00038', '10', '3306', 'Provision of Internet Connection for the OPCEN, Records and GSS from March to December 2022', NULL, NULL, 4, '2022-02-22', '2022-02-22', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 01:21:16', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1295, '2022-02-00039', '10', '3174', 'for testing', NULL, NULL, 1, '2022-02-22', '2022-02-22', NULL, NULL, '2022-02-22 15:49:00', 'masacluti', NULL, '', '2022-02-22 07:49:31', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1296, '2022-02-00040', '17', '2664', 'For the Online Training on Gender and Development Planning and Budgeting for Cities and Municipalities', NULL, NULL, 4, '2022-02-23', '2022-03-07', NULL, NULL, '2022-03-01 08:09:00', 'masacluti', NULL, '', '2022-02-23 05:06:05', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1297, '2022-02-00041', '18', '3190', 'SOFT LAUNCHING OF THE DRUG ABUSE TREATMENT AND REHABILITATION CENTER IN BARANGAY OSORIO, TRECE MARTIRES CITY, CAVITE FUNDED BY JAPAN INTERNATIONAL COOPERATION AGENCY (JICA)', NULL, NULL, 4, '2022-02-23', '2022-03-08', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-23 06:56:20', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1298, '2022-02-00042', '18', '3190', 'SOFT LAUNCHING OF THE DRUG ABUSE TREATMENT AND REHABILITATION CENTER IN BARANGAY OSORIO, TRECE MARTIRES CITY, CAVITE FUNDED BY JAPAN INTERNATIONAL COOPERATION AGENCY (JICA)', NULL, NULL, 4, '2022-02-23', '2022-03-08', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-23 07:21:12', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1299, '2022-01-0007', '10', NULL, 'Meals for the Conduct  of Orientation on RA 11313 or the Safe Spaces Act for LGUs (February 16, 2022)', NULL, NULL, 1, '2022-02-03', '2022-02-09', '2022-02-03 00:00:00', 'caporras', '2022-02-04 14:39:13', 'caporras', NULL, NULL, '2022-02-03 04:23:29', 0, 0, 0, 0, 'Submitted', '', '0000-00-00', '2022-02-03', ''),
(1300, '2022-02-00044', '10', '3359', 'Change oil and diesoline of the service vehicle for the month of January 2022', NULL, NULL, 5, '2022-01-03', '2022-01-03', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-24 19:25:24', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1301, '2022-02-00045', '18', '3369', 'Meals for the CLRG Quarterly Coordination Meeting\r\n\r\nBatch 1 Cavite\r\nMeals: Breakfast, AM Snack, Lunch & PM Snack\r\n650 * 14 Pax * 4 Meetings\r\nMarch 21, 2022 | June 16, 2022 | September 15, 2022 |December 15, 2022\r\n\r\nBatch 2 Rizal\r\nMeals: Breakfast, AM Sna', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, '2022-02-28 08:02:54', 'qborero', NULL, NULL, '2022-02-28 00:01:21', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1302, '2022-02-00046', '18', '3369', 'Meals for the 1st Quarter RGAF Coordination Meeting', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:10:21', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1303, '2022-02-00047', '18', '3369', 'Meals for the 2nd Quarter RGAF Coordination Meeting', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:13:13', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1304, '2022-02-00048', '18', '3369', 'Meals for the 1st Quarter RGAF Coordination Meeting', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:21:47', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1305, '2022-02-00049', '18', '3369', 'Meals for the 3rd Quarter RGAF Coordination Meeting', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:25:14', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1306, '2022-02-00050', '18', '3369', 'Meals for the 4th Quarter RGAF Coordination Meeting', NULL, NULL, 1, '2022-02-28', '2022-02-28', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 04:27:13', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1307, '2022-03-00051', '17', '2695', 'PROCUREMENT OF ZOOM ACCOUNT  TO SUPPORT LGRC ONLINE ACTIVITIES', NULL, NULL, 5, '2022-03-01', '2022-03-09', NULL, NULL, '2022-03-01 15:10:50', 'jamonteiro', NULL, NULL, '2022-03-01 07:10:38', 0, 0, 0, 0, '', '', '0000-00-00', '', '1'),
(1308, '2022-03-00052', '10', '3359', 'Supplies to be used in the Regional Office', NULL, NULL, 6, '2022-02-23', '2022-02-24', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-01 07:25:37', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1309, '2022-03-00053', '18', '3190', 'Meals for 2022 RDC-RPOC Meeting', NULL, NULL, 1, '2022-03-01', '2022-03-10', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-01 07:27:34', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1310, '2022-03-00054', '18', '3369', 'Conduct of CSIS 2022 National Briefing', NULL, NULL, 0, '2022-03-02', '2022-03-09', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-02 19:32:45', 0, 0, 0, 0, '', '', '0000-00-00', '', ''),
(1311, '2022-03-00055', '18', '3369', 'Conduct of CSIS 2022 National Briefing', NULL, NULL, 1, '2022-03-02', '2022-03-14', '2022-03-03 00:00:00', 'masacluti', '2022-03-03 08:39:00', 'masacluti', NULL, '', '2022-03-02 03:34:06', 1, 0, 0, 0, 'Submitted', '', '0000-00-00', '', ''),
(1312, '2022-03-00056', '18', '3369', 'Conduct of LRI Training', NULL, NULL, 2, '2022-03-02', '2022-03-23', '2022-03-03 00:00:00', 'masacluti', '2022-03-03 08:39:00', 'masacluti', NULL, '', '2022-03-02 03:36:54', 1, 0, 0, 0, 'Submitted', '', '0000-00-00', '', ''),
(1313, '2022-03-00057', '18', '3369', 'Conduct of LRI Training', NULL, NULL, 2, '2022-03-02', '2022-03-24', '2022-03-03 00:00:00', 'masacluti', '2022-03-03 08:39:00', 'masacluti', NULL, '', '2022-03-02 03:38:40', 1, 0, 0, 0, 'Submitted', '', '0000-00-00', '', ''),
(1314, '2022-03-00058', '10', '3174', 'For the cable subscription of RD and ARD television', NULL, NULL, 5, '2022-02-24', '2022-02-24', '2022-03-03 00:00:00', 'masacluti', '2022-03-03 08:39:00', 'masacluti', NULL, '', '2022-03-02 21:20:34', 1, 0, 0, 0, 'Submitted', '', '0000-00-00', '', ''),
(1315, '2022-03-00059', '10', '3359', 'For the repair of the comfort room at the Regional Office (Third Floor)', NULL, NULL, 6, '2022-03-01', '2022-03-02', '2022-03-02 00:00:00', 'masacluti', '2022-03-02 21:44:00', 'masacluti', NULL, '', '2022-03-02 06:46:39', 7, 0, 0, 0, 'Submitted', '2022030001', '0000-00-00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1316;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
