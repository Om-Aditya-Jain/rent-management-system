-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2023 at 08:26 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20515101_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry_form_details`
--

CREATE TABLE `entry_form_details` (
  `id` int(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `property_id` int(20) NOT NULL,
  `property_name` varchar(20) NOT NULL,
  `flat_no` int(20) NOT NULL,
  `no_of_members` int(20) NOT NULL,
  `electricity_rate` double NOT NULL,
  `water_rate` double NOT NULL,
  `rent` double NOT NULL,
  `previous_meter_reading` int(100) NOT NULL,
  `current_meter_reading` int(100) NOT NULL,
  `waste` double NOT NULL,
  `miscellaneous` double NOT NULL,
  `duedate` date NOT NULL,
  `status` int(20) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_form_details`
--

INSERT INTO `entry_form_details` (`id`, `month`, `property_id`, `property_name`, `flat_no`, `no_of_members`, `electricity_rate`, `water_rate`, `rent`, `previous_meter_reading`, `current_meter_reading`, `waste`, `miscellaneous`, `duedate`, `status`, `timestamp`) VALUES
(1, '2022-12', 1, 'Shri Ganpati Bhawan', 1, 3, 1, 1, 10778, 437, 438, 0, 0, '2022-12-15', 1, '2023-04-28'),
(2, '2023-01', 1, 'Shri Ganpati Bhawan', 1, 3, 9, 6, 4500, 513, 568, 0, 0, '2023-01-20', 1, '2023-04-28'),
(3, '2022-12', 1, 'Shri%20Ganpati%20Bha', 2, 2, 1, 1, 3484, 71, 72, 0, 0, '2022-12-15', 1, '2023-04-28'),
(4, '2022-12', 1, 'Shri%20Ganpati%20Bha', 5, 4, 1, 1, 12072, 60, 61, 0, 0, '2022-12-15', 1, '2023-04-28'),
(5, '2022-12', 1, 'Shri%20Ganpati%20Bha', 6, 1, 1, 1, 11059, 0, 1, 0, 0, '2022-12-15', 1, '2023-04-28'),
(6, '2022-12', 1, 'Shri%20Ganpati%20Bha', 7, 3, 1, 1, 7471, 133, 134, 0, 0, '2022-12-15', 1, '2023-04-28'),
(7, '2022-12', 1, 'Shri%20Ganpati%20Bha', 8, 1, 1, 1, 5027, 347, 348, 0, 0, '2022-12-15', 1, '2023-04-28'),
(8, '2022-12', 1, 'Shri%20Ganpati%20Bha', 9, 3, 1, 1, 4712, 2811, 2812, 0, 0, '2022-12-15', 1, '2023-04-28'),
(9, '2022-12', 1, 'Shri%20Ganpati%20Bha', 10, 3, 1, 1, 7088, 537, 538, 0, 0, '2022-12-15', 1, '2023-04-28'),
(10, '2022-12', 1, 'Shri%20Ganpati%20Bha', 12, 2, 1, 1, 3675, 1588, 1589, 0, 0, '0022-12-15', 1, '2023-04-28'),
(11, '2022-12', 1, 'Shri%20Ganpati%20Bha', 13, 3, 1, 1, 7792, 1889, 1890, 0, 0, '2022-12-15', 1, '2023-04-28'),
(12, '2022-12', 1, 'Shri%20Ganpati%20Bha', 16, 4, 1, 1, 11383, 2081, 2082, 0, 0, '2022-12-15', 1, '2023-04-28'),
(13, '2022-12', 1, 'Shri%20Ganpati%20Bha', 17, 3, 1, 1, 6399, 8137, 8138, 0, 0, '2022-12-15', 1, '2023-04-28'),
(14, '2022-12', 1, 'Shri%20Ganpati%20Bha', 19, 4, 1, 1, 22678, 638, 639, 0, 0, '2022-12-15', 1, '2023-04-28'),
(15, '2022-12', 1, 'Shri%20Ganpati%20Bha', 20, 3, 1, 1, 19178, 558, 559, 0, 0, '2022-12-15', 1, '2023-04-28'),
(16, '2022-12', 1, 'Shri%20Ganpati%20Bha', 21, 3, 1, 1, 3839, 765, 766, 0, 0, '2022-12-15', 1, '2023-04-28'),
(17, '2022-12', 1, 'Shri%20Ganpati%20Bha', 23, 1, 1, 1, 3332, 303, 304, 0, 0, '2022-12-15', 1, '2023-04-28'),
(18, '2022-12', 1, 'Shri%20Ganpati%20Bha', 24, 4, 1, 1, 23604, 758, 759, 0, 0, '2022-12-15', 1, '2023-04-28'),
(19, '2022-12', 1, 'Shri%20Ganpati%20Bha', 27, 1, 1, 1, 7092, 627, 628, 0, 0, '2022-12-15', 1, '2023-04-28'),
(23, '2022-12', 1, 'Shri%20Ganpati%20Bha', 31, 2, 1, 1, 3231, 165, 166, 0, 0, '2022-12-15', 1, '2023-04-28'),
(24, '2022-12', 1, 'Shri%20Ganpati%20Bha', 32, 2, 1, 1, 3489, 311, 312, 0, 0, '2022-12-15', 1, '2023-04-28'),
(25, '2022-12', 1, 'Shri%20Ganpati%20Bha', 30, 3, 1, 1, 8756, 0, 1, 0, 0, '2022-12-15', 1, '2023-04-28'),
(26, '2022-12', 1, 'Shri%20Ganpati%20Bha', 29, 2, 1, 1, 3882, 0, 1, 0, 0, '2022-12-15', 1, '2023-04-28'),
(27, '2022-12', 1, 'Shri%20Ganpati%20Bha', 28, 2, 1, 1, 3728, 0, 1, 0, 0, '2023-01-26', 1, '2023-04-28'),
(28, '2023-01', 1, 'Shri Ganpati Bhawan', 2, 2, 9, 6, 3300, 72, 80, 0, 0, '2023-01-20', 1, '2023-04-28'),
(29, '2023-01', 1, 'Shri Ganpati Bhawan', 5, 4, 9, 6, 3400, 61, 120, 0, 0, '2023-01-20', 1, '2023-04-28'),
(31, '2023-01', 1, 'Shri Ganpati Bhawan', 7, 3, 9, 6, 3300, 134, 143, 0, 0, '2023-01-20', 1, '2023-04-28'),
(32, '2023-01', 1, 'Shri Ganpati Bhawan', 8, 1, 9, 6, 4700, 348, 381, 0, 0, '2023-01-20', 1, '2023-04-28'),
(33, '2023-01', 1, 'Shri Ganpati Bhawan', 9, 3, 9, 6, 4600, 2812, 2841, 0, 0, '2023-01-20', 1, '2023-04-28'),
(34, '2023-01', 1, 'Shri Ganpati Bhawan', 10, 3, 9, 6, 3300, 538, 584, 0, 0, '2023-01-15', 1, '2023-04-28'),
(35, '2023-01', 1, 'Shri Ganpati Bhawan', 12, 2, 9, 6, 3400, 1589, 1622, 0, 0, '2023-01-20', 1, '2023-04-28'),
(36, '2023-01', 1, 'Shri Ganpati Bhawan', 13, 3, 9, 6, 3400, 1890, 1974, 0, 0, '2023-01-20', 1, '2023-04-28'),
(37, '2023-01', 1, 'Shri Ganpati Bhawan', 16, 4, 9, 6, 4600, 2082, 2132, 0, 0, '2023-01-20', 1, '2023-04-28'),
(38, '2023-01', 1, 'Shri Ganpati Bhawan', 17, 3, 9, 6, 3300, 138, 148, 0, 0, '2023-01-20', 1, '2023-04-28'),
(39, '2023-01', 1, 'Shri Ganpati Bhawan', 19, 4, 9, 6, 3200, 639, 690, 0, 0, '2023-01-20', 1, '2023-04-28'),
(40, '2023-01', 1, 'Shri Ganpati Bhawan', 20, 3, 9, 6, 3200, 559, 587, 0, 0, '2023-01-20', 1, '2023-04-28'),
(42, '2023-01', 1, 'Shri Ganpati Bhawan', 23, 1, 9, 6, 3200, 304, 312, 0, 0, '2023-01-25', 1, '2023-04-28'),
(43, '2023-01', 1, 'Shri Ganpati Bhawan', 24, 4, 9, 6, 3300, 759, 810, 0, 0, '2023-01-25', 1, '2023-04-28'),
(44, '2023-01', 1, 'Shri Ganpati Bhawan', 26, 2, 9, 6, 3100, 81, 91, 0, 0, '2023-01-27', 1, '2023-04-28'),
(45, '2023-01', 1, 'Shri Ganpati Bhawan', 27, 1, 9, 6, 3100, 628, 634, 0, 0, '2023-01-25', 1, '2023-04-28'),
(47, '2023-01', 1, 'Shri Ganpati Bhawan', 29, 2, 9, 6, 3200, 0, 58, 0, 0, '2023-01-25', 1, '2023-04-28'),
(48, '2023-01', 1, 'Shri Ganpati Bhawan', 30, 3, 9, 6, 3100, 570, 595, 0, 0, '2023-01-25', 1, '2023-04-28'),
(50, '2023-01', 1, 'Shri Ganpati Bhawan', 32, 2, 9, 6, 3200, 312, 326, 0, 0, '2023-01-25', 1, '2023-04-28'),
(51, '2023-01', 1, 'Shri%20Ganpati%20Bha', 6, 1, 9, 6, 3400, 0, 9, 0, 0, '2023-01-20', 1, '2023-04-28'),
(53, '2023-01', 1, 'Shri%20Ganpati%20Bha', 21, 2, 9, 6, 3300, 766, 857, 0, 0, '2023-01-25', 1, '2023-04-28'),
(54, '2023-01', 1, 'Shri%20Ganpati%20Bha', 28, 2, 9.5, 6, 3200, 0, 30, 0, 0, '2023-02-23', 1, '2023-04-28'),
(55, '2023-01', 1, 'Shri%20Ganpati%20Bha', 31, 2, 9, 6, 3150, 166, 208, 0, 0, '2023-01-25', 1, '2023-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `head` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `sno` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `property_id` int(10) NOT NULL,
  `flat_no` int(10) NOT NULL,
  `month` varchar(100) NOT NULL,
  `tenant_name` varchar(500) NOT NULL,
  `electricity_units` double NOT NULL,
  `timestamp` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sno`, `invoice`, `property_id`, `flat_no`, `month`, `tenant_name`, `electricity_units`, `timestamp`) VALUES
(1, '2022-12/1', 1, 1, '2022-12', 'Mishra', 1, '2022-12-12'),
(2, '2023-01/1', 1, 1, '2023-01', 'Mishra', 55, '2023-01-15'),
(3, '2022-12/2', 1, 2, '2022-12', 'Dhurve', 1, '2022-12-12'),
(4, '2022-12/5', 1, 5, '2022-12', 'L. Singh', 1, '2022-12-12'),
(5, '2022-12/32', 1, 32, '2022-12', 'Bhanu', 1, '2022-12-12'),
(6, '2022-12/31', 1, 31, '2022-12', 'Singh', 1, '2022-12-12'),
(7, '2022-12/30', 1, 30, '2022-12', 'Sapna', 1, '2022-12-12'),
(8, '2022-12/29', 1, 29, '2022-12', 'Shrivastav', 1, '2022-12-12'),
(9, '2022-12/28', 1, 28, '2022-12', 'Mahto', 1, '2023-01-15'),
(10, '2022-12/27', 1, 27, '2022-12', 'Singh', 1, '2022-12-12'),
(11, '2022-12/24', 1, 24, '2022-12', 'Shrivastav', 1, '2022-12-12'),
(12, '2022-12/23', 1, 23, '2022-12', 'Marko', 1, '2022-12-12'),
(13, '2022-12/21', 1, 21, '2022-12', 'Deepak', 1, '2022-12-12'),
(14, '2022-12/20', 1, 20, '2022-12', 'J. Singh', 1, '2022-12-12'),
(15, '2022-12/19', 1, 19, '2022-12', 'Rajput', 1, '2022-12-12'),
(16, '2022-12/17', 1, 17, '2022-12', 'K Singh', 1, '2022-12-12'),
(17, '2022-12/16', 1, 16, '2022-12', 'Doctor', 1, '2022-12-12'),
(18, '2022-12/13', 1, 13, '2022-12', 'D. Singh', 1, '2022-12-12'),
(19, '2022-12/12', 1, 12, '2022-12', 'Pramila', 1, '2022-12-12'),
(20, '2022-12/10', 1, 10, '2022-12', 'Prajapati', 1, '2022-12-12'),
(21, '2022-12/9', 1, 9, '2022-12', 'Brijesh', 1, '2022-12-12'),
(22, '2022-12/8', 1, 8, '2022-12', 'Vishal', 1, '2022-12-12'),
(23, '2022-12/7', 1, 7, '2022-12', 'lala', 1, '2022-12-12'),
(24, '2022-12/6', 1, 6, '2022-12', 'Jaiswal', 1, '2022-12-12'),
(25, '2023-01/2', 1, 2, '2023-01', 'Dhurve', 8, '2023-01-15'),
(26, '2023-01/5', 1, 5, '2023-01', 'L. Singh', 59, '2023-01-15'),
(28, '2023-01/6', 1, 6, '2023-01', 'Jaiswal', 9, '2023-01-15'),
(29, '2023-01/7', 1, 7, '2023-01', 'lala', 9, '2023-01-08'),
(30, '2023-01/8', 1, 8, '2023-01', 'Vishal', 33, '2023-01-15'),
(31, '2023-01/9', 1, 9, '2023-01', 'Brijesh', 29, '2023-01-15'),
(32, '2023-01/10', 1, 10, '2023-01', 'Prajapati', 46, '2023-01-15'),
(33, '2023-01/12', 1, 12, '2023-01', 'Pramila', 33, '2023-01-15'),
(34, '2023-01/13', 1, 13, '2023-01', 'D. Singh', 84, '2023-01-15'),
(35, '2023-01/16', 1, 16, '2023-01', 'Doctor', 50, '2023-01-15'),
(36, '2023-01/17', 1, 17, '2023-01', 'K Singh', 10, '2023-01-15'),
(37, '2023-01/19', 1, 19, '2023-01', 'Rajput', 51, '2022-12-28'),
(38, '2023-01/20', 1, 20, '2023-01', 'J. Singh', 28, '2023-01-15'),
(41, '2023-01/21', 1, 21, '2023-01', 'Deepak', 91, '2023-01-15'),
(42, '2023-01/23', 1, 23, '2023-01', 'Marko', 8, '2023-01-15'),
(43, '2023-01/24', 1, 24, '2023-01', 'Shrivastav', 51, '2023-01-15'),
(44, '2023-01/26', 1, 26, '2023-01', 'Rajan', 10, '2023-01-15'),
(45, '2023-01/27', 1, 27, '2023-01', 'Singh', 6, '2023-01-15'),
(47, '2023-01/28', 1, 28, '2023-01', 'Mahto', 30, '2023-02-17'),
(48, '2023-01/29', 1, 29, '2023-01', 'Shrivastav', 58, '2023-01-15'),
(49, '2023-01/30', 1, 30, '2023-01', 'Sapna', 25, '2023-01-15'),
(51, '2023-01/31', 1, 31, '2023-01', 'Singh', 42, '2023-01-15'),
(52, '2023-01/32', 1, 32, '2023-01', 'Bhanu', 14, '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE `invoice_status` (
  `sno` int(11) NOT NULL,
  `property_id` int(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `date` varchar(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`sno`, `property_id`, `month`, `date`, `timestamp`) VALUES
(1, 1, '2022-12', '2023-04-28', '2023-04-28 06:02:05'),
(2, 1, '2023-01', '2023-04-28', '2023-04-28 06:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_amount`
--

CREATE TABLE `outstanding_amount` (
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `flat_no` int(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `total` double NOT NULL,
  `amount_received` double NOT NULL,
  `outstanding_amount` double NOT NULL,
  `status` double NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outstanding_amount`
--

INSERT INTO `outstanding_amount` (`id`, `property_id`, `flat_no`, `month`, `total`, `amount_received`, `outstanding_amount`, `status`, `time_stamp`) VALUES
(1, 1, 1, '2022-12', 10782, 0, 10782, 1, '2023-04-28 10:25:33'),
(2, 1, 1, '2023-01', 15939, 10782, 5157, 1, '2023-04-28 10:25:33'),
(3, 1, 2, '2022-12', 3487, 0, 3487, 1, '2023-04-28 06:11:42'),
(4, 1, 5, '2022-12', 12077, 0, 12077, 1, '2023-04-28 06:12:59'),
(5, 1, 32, '2022-12', 3492, 0, 3492, 1, '2023-04-28 06:51:57'),
(6, 1, 31, '2022-12', 3234, 0, 3234, 1, '2023-04-28 06:52:57'),
(8, 1, 30, '2022-12', 8760, 0, 8760, 1, '2023-04-28 06:56:14'),
(11, 1, 29, '2022-12', 3885, 0, 3885, 1, '2023-04-28 07:00:08'),
(12, 1, 28, '2022-12', 3731, 0, 3731, 1, '2023-04-28 07:01:41'),
(13, 1, 27, '2022-12', 7094, 0, 7094, 1, '2023-04-28 07:02:48'),
(14, 1, 24, '2022-12', 23609, 0, 23609, 1, '2023-04-28 07:04:57'),
(15, 1, 23, '2022-12', 3334, 0, 3334, 1, '2023-04-28 07:05:30'),
(16, 1, 21, '2022-12', 3843, 0, 3843, 1, '2023-04-28 07:06:42'),
(17, 1, 20, '2022-12', 19182, 0, 19182, 1, '2023-04-28 07:07:17'),
(18, 1, 19, '2022-12', 22683, 0, 22683, 1, '2023-04-28 07:07:54'),
(19, 1, 17, '2022-12', 6403, 0, 6403, 1, '2023-04-28 07:09:51'),
(20, 1, 16, '2022-12', 11388, 0, 11388, 1, '2023-04-28 07:10:37'),
(21, 1, 13, '2022-12', 7796, 0, 7796, 1, '2023-04-28 07:12:26'),
(22, 1, 12, '2022-12', 3678, 0, 3678, 1, '2023-04-28 07:13:04'),
(23, 1, 10, '2022-12', 7092, 0, 7092, 1, '2023-04-28 07:14:32'),
(24, 1, 9, '2022-12', 4716, 0, 4716, 1, '2023-04-28 07:15:08'),
(25, 1, 8, '2022-12', 5029, 0, 5029, 1, '2023-04-28 07:16:01'),
(26, 1, 7, '2022-12', 7475, 0, 7475, 1, '2023-04-28 07:17:05'),
(27, 1, 6, '2022-12', 11061, 0, 11061, 1, '2023-04-28 07:17:56'),
(28, 1, 2, '2023-01', 6967, 3487, 3480, 1, '2023-04-29 08:14:34'),
(29, 1, 5, '2023-01', 16224, 4000, 12224, 1, '2023-04-29 08:14:34'),
(31, 1, 6, '2023-01', 14596, 0, 14596, 1, '2023-04-28 07:53:16'),
(32, 1, 7, '2023-01', 11018, 7500, 3518, 1, '2023-04-28 07:53:43'),
(33, 1, 8, '2023-01', 10080, 5029, 5051, 1, '2023-04-29 08:14:34'),
(34, 1, 9, '2023-01', 9739, 4716, 5023, 1, '2023-04-29 08:14:34'),
(35, 1, 10, '2023-01', 10968, 0, 10968, 1, '2023-04-29 08:14:34'),
(36, 1, 12, '2023-01', 7483, 4000, 3483, 1, '2023-04-29 08:14:34'),
(37, 1, 13, '2023-01', 12114, 0, 12114, 1, '2023-04-28 07:58:14'),
(38, 1, 16, '2023-01', 16654, 11500, 5154, 1, '2023-04-29 08:14:34'),
(39, 1, 17, '2023-01', 9955, 5000, 4955, 1, '2023-04-28 07:59:52'),
(40, 1, 19, '2023-01', 26558, 15000, 11558, 1, '2023-04-29 08:14:34'),
(41, 1, 20, '2023-01', 22796, 0, 22796, 1, '2023-04-28 08:01:06'),
(44, 1, 21, '2023-01', 8070, 0, 8070, 1, '2023-04-28 08:05:10'),
(45, 1, 23, '2023-01', 6660, 3334, 3326, 1, '2023-04-29 08:14:34'),
(46, 1, 24, '2023-01', 27584, 0, 27584, 1, '2023-04-28 08:06:47'),
(47, 1, 26, '2023-01', 3298, 3000, 298, 1, '2023-04-28 08:08:30'),
(48, 1, 27, '2023-01', 10302, 5000, 5302, 1, '2023-04-28 08:09:13'),
(50, 1, 28, '2023-01', 7330, 3731, 3599, 1, '2023-04-29 08:14:34'),
(51, 1, 29, '2023-01', 7715, 3885, 3830, 1, '2023-04-29 08:14:34'),
(52, 1, 30, '2023-01', 12247, 5000, 7247, 1, '2023-04-28 08:13:58'),
(54, 1, 31, '2023-01', 6870, 3000, 3870, 1, '2023-04-29 08:14:34'),
(55, 1, 32, '2023-01', 6926, 3500, 3426, 1, '2023-04-28 08:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `flat_no` int(200) NOT NULL,
  `pay_mode` varchar(100) NOT NULL,
  `payment_date` varchar(100) CHARACTER SET latin1 NOT NULL,
  `month` varchar(11) NOT NULL,
  `amount` double NOT NULL,
  `reference_id` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `payment_receiver` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `property_id`, `flat_no`, `pay_mode`, `payment_date`, `month`, `amount`, `reference_id`, `description`, `payment_receiver`, `status`, `time_stamp`) VALUES
(1, 1, 1, 'offline', '2022-12-23', '2022-12', 10782, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:03:56'),
(2, 1, 2, 'offline', '2022-12-14', '2022-12', 3487, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:12:49'),
(3, 1, 5, 'offline', '2022-12-23', '2022-12', 4000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:13:40'),
(4, 1, 32, 'offline', '2023-01-03', '2023-01', 3500, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:52:48'),
(5, 1, 31, 'offline', '2022-12-27', '2022-12', 3000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:54:10'),
(6, 1, 30, 'offline', '2023-01-10', '2023-01', 5000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 06:56:51'),
(7, 1, 29, 'paytm', '2022-12-27', '2022-12', 3885, 'VIVEK', 'First entry of online payment', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:01:17'),
(8, 1, 28, 'Select Payment Mode', '2323-02-07', '2323-02', 3731, 'VIVEK', 'First entry of online payment', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:02:30'),
(9, 1, 27, 'offline', '2023-01-10', '2023-01', 5000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:03:30'),
(10, 1, 23, 'phonepe', '2022-12-30', '2022-12', 3334, 'VIVEK', 'First entry of online payment', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:06:16'),
(11, 1, 19, 'offline', '2022-12-28', '2022-12', 15000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:09:35'),
(12, 1, 17, 'phonepe', '2023-01-03', '2023-01', 5000, 'VIVEK', 'First entry of online payment', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:10:22'),
(13, 1, 16, 'offline', '2022-12-13', '2022-12', 6500, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:11:32'),
(14, 1, 16, 'offline', '2023-01-07', '2023-01', 5000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:12:02'),
(15, 1, 12, 'offline', '2022-12-30', '2022-12', 4000, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:14:12'),
(16, 1, 9, 'offline', '2022-12-27', '2022-12', 4716, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:15:49'),
(17, 1, 8, 'phonepe', '2022-12-27', '2022-12', 5029, 'VIVEK', 'First entry of online payment', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:16:55'),
(18, 1, 7, 'offline', '2023-01-07', '2023-01', 7500, NULL, 'First entry of offline payment', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:17:45'),
(19, 1, 2, 'phonepe', '2023-01-25', '2023-01', 3480, 'VIVEK', 'Paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:47:50'),
(20, 1, 5, 'offline', '2023-01-20', '2023-01', 12224, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:49:25'),
(21, 1, 8, 'phonepe', '2023-02-07', '2023-02', 5051, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:55:38'),
(22, 1, 9, 'phonepe', '2023-02-07', '2023-02', 5023, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:56:30'),
(23, 1, 10, 'phonepe', '2023-01-28', '2023-01', 11000, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 07:57:20'),
(24, 1, 12, 'offline', '2023-02-27', '2023-02', 3500, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:58:04'),
(25, 1, 16, 'offline', '2023-01-27', '2023-01', 5154, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 07:59:37'),
(26, 1, 21, 'offline', '2023-02-06', '2023-02', 8000, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 08:05:42'),
(27, 1, 23, 'phonepe', '2023-02-04', '2023-02', 3326, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:06:33'),
(28, 1, 26, 'offline', '2023-01-10', '2023-01', 3000, NULL, 'paid old', 'Mr. Ram Kripal Shah', 1, '2023-04-28 08:08:22'),
(29, 1, 26, 'phonepe', '2023-02-11', '2023-02', 3500, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:09:03'),
(30, 1, 27, 'offline', '2023-02-02', '2023-02', 2000, NULL, 'nagad doubt', 'Mr. Ram Kripal Shah', 1, '2023-04-28 08:09:59'),
(31, 1, 28, 'phonepe', '2023-02-07', '2023-02', 3731, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:12:01'),
(32, 1, 28, 'paytm', '2023-03-04', '2023-03', 3599, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:12:55'),
(33, 1, 29, 'paytm', '2023-02-07', '2023-02', 3830, 'VIVEK', 'paid', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:13:48'),
(34, 1, 30, 'offline', '2023-02-11', '2023-02', 4000, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 08:14:37'),
(35, 1, 31, 'offline', '2023-02-10', '2023-02', 3500, NULL, 'paid', 'Mr. Ram Kripal Shah', 1, '2023-04-28 08:19:12'),
(36, 1, 32, 'phonepe', '2023-02-09', '2023-02', 3400, 'VIVEK', '', 'Mr. Vivek Kumar Shah', 1, '2023-04-28 08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(200) NOT NULL,
  `property_address` varchar(1000) NOT NULL,
  `flats` int(100) NOT NULL,
  `active` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `property_address`, `flats`, `active`) VALUES
(1, 'Shri Ganpati Bhawan', 'Bypass Road Bilaunji Waidhan', 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `tenant_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `flat_name` varchar(1000) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhaar_no` int(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `members` int(10) NOT NULL,
  `no_of_male` int(50) NOT NULL,
  `no_of_female` int(50) NOT NULL,
  `no_of_children_below_5` int(50) NOT NULL,
  `rent` int(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(20) NOT NULL,
  `property_id` int(30) NOT NULL,
  `flat_no` int(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `polic_station` varchar(200) NOT NULL,
  `two_wheeler` varchar(500) NOT NULL,
  `four_wheeler` varchar(500) NOT NULL,
  `tenant_occupation` varchar(500) NOT NULL,
  `tenant_occupation_address` varchar(2000) NOT NULL,
  `occupation_contact` varchar(50) NOT NULL,
  `granter1_name` varchar(250) NOT NULL,
  `granter1_contact` varchar(50) NOT NULL,
  `granter1_address` varchar(2000) NOT NULL,
  `granter1_district` varchar(100) NOT NULL,
  `granter1_state` varchar(100) NOT NULL,
  `granter1_police_station` varchar(100) NOT NULL,
  `granter1_email` varchar(100) NOT NULL,
  `granter2_name` varchar(100) NOT NULL,
  `granter2_contact` varchar(100) NOT NULL,
  `granter2_address` varchar(1000) NOT NULL,
  `granter2_district` varchar(100) NOT NULL,
  `granter2_state` varchar(100) NOT NULL,
  `granter2_police_station` varchar(100) NOT NULL,
  `granter2_email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `joining_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tenant_name`, `father_name`, `flat_name`, `gender`, `email`, `aadhaar_no`, `contact`, `members`, `no_of_male`, `no_of_female`, `no_of_children_below_5`, `rent`, `dob`, `age`, `property_id`, `flat_no`, `address`, `district`, `state`, `polic_station`, `two_wheeler`, `four_wheeler`, `tenant_occupation`, `tenant_occupation_address`, `occupation_contact`, `granter1_name`, `granter1_contact`, `granter1_address`, `granter1_district`, `granter1_state`, `granter1_police_station`, `granter1_email`, `granter2_name`, `granter2_contact`, `granter2_address`, `granter2_district`, `granter2_state`, `granter2_police_station`, `granter2_email`, `status`, `joining_date`) VALUES
(1, 'Mishra', '', 'I-1', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(2, 'Dhurve', '', 'I-2', '', '', 0, '', 2, 1, 1, 0, 0, '0000-00-00', 0, 1, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(3, 'L. Singh', '', 'I-5', '', '', 0, '', 4, 2, 1, 1, 0, '0000-00-00', 0, 1, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(4, 'Jaiswal', '', 'I-6', '', '', 0, '', 1, 1, 1, 0, 0, '0000-00-00', 0, 1, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(5, 'lala', '', 'I-7', '', '', 0, '', 3, 0, 0, 0, 0, '0000-00-00', 0, 1, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(6, 'Vishal', '', 'I-8', '', '', 0, '', 1, 0, 0, 0, 0, '0000-00-00', 0, 1, 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(7, 'Brijesh', '', 'B-1', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(8, 'Prajapati', '', 'B-2', '', '', 0, '9407137191', 3, 0, 0, 0, 0, '0000-00-00', 0, 1, 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(9, 'Pramila', '', 'B-3', '', '', 0, '', 2, 0, 0, 0, 0, '0000-00-00', 0, 1, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(10, 'Pramila', '', 'B-4', '', '', 0, '', 2, 1, 1, 1, 0, '0000-00-00', 0, 1, 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(11, 'D. Singh', '', 'B-5', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(12, 'Doctor', '', 'B-8', '', '', 0, '', 4, 0, 0, 0, 0, '0000-00-00', 0, 1, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(13, 'K Singh', '', 'V-1', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 17, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(14, 'Rajput', '', 'V-3', '', '', 0, '', 4, 2, 1, 1, 0, '0000-00-00', 0, 1, 19, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(15, 'J. Singh', '', 'V-4', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 20, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(16, 'Deepak', '', 'V-5', '', '', 0, '', 2, 1, 1, 1, 0, '0000-00-00', 0, 1, 21, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(17, 'Marko', '', 'V-7', '', '', 0, '', 1, 1, 0, 0, 0, '0000-00-00', 0, 1, 23, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(18, 'Shrivastav', '', 'V-8', '', '', 0, '', 4, 1, 1, 2, 0, '0000-00-00', 0, 1, 24, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(19, 'Singh', '', 'M-3', '', '', 0, '', 1, 1, 1, 0, 0, '0000-00-00', 0, 1, 27, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(20, 'Mahto', '', 'M-4', '', '', 0, '', 2, 1, 1, 0, 0, '0000-00-00', 0, 1, 28, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(21, 'Shrivastav', '', 'M-5', '', '', 0, '', 2, 1, 0, 0, 0, '0000-00-00', 0, 1, 29, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(22, 'Sapna', '', 'M-6', '', '', 0, '', 3, 1, 1, 1, 0, '0000-00-00', 0, 1, 30, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(23, 'Singh', '', 'M-7', '', '', 0, '', 2, 1, 1, 0, 0, '0000-00-00', 0, 1, 31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(24, 'Bhanu', '', 'M-8', '', '', 0, '', 2, 1, 1, 0, 0, '0000-00-00', 0, 1, 32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00'),
(25, 'Rajan', '', 'M-2', '', '', 0, '', 2, 0, 0, 0, 0, '0000-00-00', 0, 1, 26, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_relatives`
--

CREATE TABLE `tenant_relatives` (
  `sno` int(11) NOT NULL,
  `tenant_id` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `father_name` varchar(300) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `aadhar` int(20) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_relatives`
--

INSERT INTO `tenant_relatives` (`sno`, `tenant_id`, `name`, `father_name`, `age`, `gender`, `relation`, `mobile_no`, `aadhar`, `active`) VALUES
(1, 1, '', '', 0, '', '', 0, 0, 1),
(2, 1, '', '', 0, '', '', 0, 0, 1),
(3, 1, '', '', 0, '', '', 0, 0, 1),
(4, 1, '', '', 0, '', '', 0, 0, 1),
(5, 1, '', '', 0, '', '', 0, 0, 1),
(6, 2, '', '', 0, '', '', 0, 0, 1),
(7, 2, '', '', 0, '', '', 0, 0, 1),
(8, 2, '', '', 0, '', '', 0, 0, 1),
(9, 2, '', '', 0, '', '', 0, 0, 1),
(10, 3, '', '', 0, '', '', 0, 0, 1),
(11, 3, '', '', 0, '', '', 0, 0, 1),
(12, 3, '', '', 0, '', '', 0, 0, 1),
(13, 3, '', '', 0, '', '', 0, 0, 1),
(14, 3, '', '', 0, '', '', 0, 0, 1),
(15, 3, '', '', 0, '', '', 0, 0, 1),
(16, 4, '', '', 0, '', '', 0, 0, 1),
(17, 4, '', '', 0, '', '', 0, 0, 1),
(18, 4, '', '', 0, '', '', 0, 0, 1),
(19, 5, '', '', 0, '', '', 0, 0, 1),
(20, 5, '', '', 0, '', '', 0, 0, 1),
(21, 5, '', '', 0, '', '', 0, 0, 1),
(22, 5, '', '', 0, '', '', 0, 0, 1),
(23, 5, '', '', 0, '', '', 0, 0, 1),
(24, 6, '', '', 0, '', '', 0, 0, 1),
(25, 6, '', '', 0, '', '', 0, 0, 1),
(26, 6, '', '', 0, '', '', 0, 0, 1),
(27, 7, '', '', 0, '', '', 0, 0, 1),
(28, 7, '', '', 0, '', '', 0, 0, 1),
(29, 7, '', '', 0, '', '', 0, 0, 1),
(30, 7, '', '', 0, '', '', 0, 0, 1),
(31, 8, '', '', 0, '', '', 0, 0, 1),
(32, 8, '', '', 0, '', '', 0, 0, 1),
(33, 8, '', '', 0, '', '', 0, 0, 1),
(34, 8, '', '', 0, '', '', 0, 0, 1),
(35, 8, '', '', 0, '', '', 0, 0, 1),
(36, 9, '', '', 0, '', '', 0, 0, 0),
(37, 9, '', '', 0, '', '', 0, 0, 0),
(38, 9, '', '', 0, '', '', 0, 0, 0),
(39, 9, '', '', 0, '', '', 0, 0, 0),
(40, 10, '', '', 0, '', '', 0, 0, 1),
(41, 10, '', '', 0, '', '', 0, 0, 1),
(42, 10, '', '', 0, '', '', 0, 0, 1),
(43, 10, '', '', 0, '', '', 0, 0, 1),
(44, 10, '', '', 0, '', '', 0, 0, 1),
(45, 11, '', '', 0, '', '', 0, 0, 1),
(46, 11, '', '', 0, '', '', 0, 0, 1),
(47, 11, '', '', 0, '', '', 0, 0, 1),
(48, 11, '', '', 0, '', '', 0, 0, 1),
(49, 11, '', '', 0, '', '', 0, 0, 1),
(50, 12, '', '', 0, '', '', 0, 0, 1),
(51, 12, '', '', 0, '', '', 0, 0, 1),
(52, 12, '', '', 0, '', '', 0, 0, 1),
(53, 12, '', '', 0, '', '', 0, 0, 1),
(54, 12, '', '', 0, '', '', 0, 0, 1),
(55, 13, '', '', 0, '', '', 0, 0, 1),
(56, 13, '', '', 0, '', '', 0, 0, 1),
(57, 13, '', '', 0, '', '', 0, 0, 1),
(58, 13, '', '', 0, '', '', 0, 0, 1),
(59, 13, '', '', 0, '', '', 0, 0, 1),
(60, 14, '', '', 0, '', '', 0, 0, 1),
(61, 14, '', '', 0, '', '', 0, 0, 1),
(62, 14, '', '', 0, '', '', 0, 0, 1),
(63, 14, '', '', 0, '', '', 0, 0, 1),
(64, 14, '', '', 0, '', '', 0, 0, 1),
(65, 14, '', '', 0, '', '', 0, 0, 1),
(66, 15, '', '', 0, '', '', 0, 0, 1),
(67, 15, '', '', 0, '', '', 0, 0, 1),
(68, 15, '', '', 0, '', '', 0, 0, 1),
(69, 15, '', '', 0, '', '', 0, 0, 1),
(70, 15, '', '', 0, '', '', 0, 0, 1),
(71, 16, '', '', 0, '', '', 0, 0, 1),
(72, 16, '', '', 0, '', '', 0, 0, 1),
(73, 16, '', '', 0, '', '', 0, 0, 1),
(74, 16, '', '', 0, '', '', 0, 0, 1),
(75, 16, '', '', 0, '', '', 0, 0, 1),
(76, 17, '', '', 0, '', '', 0, 0, 1),
(77, 17, '', '', 0, '', '', 0, 0, 1),
(78, 17, '', '', 0, '', '', 0, 0, 1),
(79, 18, '', '', 0, '', '', 0, 0, 1),
(80, 18, '', '', 0, '', '', 0, 0, 1),
(81, 18, '', '', 0, '', '', 0, 0, 1),
(82, 18, '', '', 0, '', '', 0, 0, 1),
(83, 18, '', '', 0, '', '', 0, 0, 1),
(84, 18, '', '', 0, '', '', 0, 0, 1),
(85, 19, '', '', 0, '', '', 0, 0, 1),
(86, 19, '', '', 0, '', '', 0, 0, 1),
(87, 19, '', '', 0, '', '', 0, 0, 1),
(88, 20, '', '', 0, '', '', 0, 0, 1),
(89, 20, '', '', 0, '', '', 0, 0, 1),
(90, 20, '', '', 0, '', '', 0, 0, 1),
(91, 21, '', '', 0, '', '', 0, 0, 1),
(92, 21, '', '', 0, '', '', 0, 0, 1),
(93, 21, '', '', 0, '', '', 0, 0, 1),
(94, 21, '', '', 0, '', '', 0, 0, 1),
(95, 22, '', '', 0, '', '', 0, 0, 1),
(96, 22, '', '', 0, '', '', 0, 0, 1),
(97, 22, '', '', 0, '', '', 0, 0, 1),
(98, 22, '', '', 0, '', '', 0, 0, 1),
(99, 22, '', '', 0, '', '', 0, 0, 1),
(100, 23, '', '', 0, '', '', 0, 0, 1),
(101, 23, '', '', 0, '', '', 0, 0, 1),
(102, 23, '', '', 0, '', '', 0, 0, 1),
(103, 23, '', '', 0, '', '', 0, 0, 1),
(104, 24, '', '', 0, '', '', 0, 0, 1),
(105, 24, '', '', 0, '', '', 0, 0, 1),
(106, 24, '', '', 0, '', '', 0, 0, 1),
(107, 24, '', '', 0, '', '', 0, 0, 1),
(108, 24, '', '', 0, '', '', 0, 0, 1),
(109, 25, '', '', 0, '', '', 0, 0, 1),
(110, 25, '', '', 0, '', '', 0, 0, 1),
(111, 25, '', '', 0, '', '', 0, 0, 1),
(112, 25, '', '', 0, '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(2, '', '', '', 1),
(5, 'Indra Kumar Shah', 'indra', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_name_entry`
--

CREATE TABLE `user_name_entry` (
  `id` int(11) NOT NULL,
  `user_name` mediumtext CHARACTER SET latin1 NOT NULL,
  `status` int(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_name_entry`
--
ALTER TABLE `user_name_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_name_entry`
--
ALTER TABLE `user_name_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
