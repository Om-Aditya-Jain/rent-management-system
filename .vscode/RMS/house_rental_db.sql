-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 01:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental_db`
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
  `electricity_rate` int(50) NOT NULL,
  `water_rate` int(50) NOT NULL,
  `rent` int(50) NOT NULL,
  `previous_meter_reading` int(100) NOT NULL,
  `current_meter_reading` int(100) NOT NULL,
  `waste` int(50) NOT NULL,
  `miscellaneous` int(50) NOT NULL,
  `duedate` date NOT NULL,
  `status` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_form_details`
--

INSERT INTO `entry_form_details` (`id`, `month`, `property_id`, `property_name`, `flat_no`, `no_of_members`, `electricity_rate`, `water_rate`, `rent`, `previous_meter_reading`, `current_meter_reading`, `waste`, `miscellaneous`, `duedate`, `status`, `timestamp`) VALUES
(1, '2023-03', 1, 'P1', 2, 4, 100, 150, 5000, 5, 10, 2000, 100, '2023-03-31', 1, '2023-03-22 07:51:20'),
(2, '2023-04', 1, 'P1', 2, 4, 200, 250, 5000, 0, 20, 100, 500, '2023-04-29', 1, '2023-03-17 09:05:39'),
(3, '2023-02', 1, 'P1', 2, 4, 100, 150, 5000, 0, 5, 2000, 100, '2023-03-31', 0, '2023-03-17 09:05:39'),
(4, '2023-05', 1, 'P1', 2, 4, 100, 50, 5000, 0, 30, 1000, 100, '2023-03-24', 1, '2023-03-17 09:05:39');

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

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `date`, `receiver`, `head`, `amount`, `time_stamp`) VALUES
(1, '2023-03-19', 'Dr. Indra Kumar Shah', 'Maintenance', 1200, '2023-03-18 10:40:18'),
(2, '2023-03-19', 'Sirs Father', 'Other', 1300, '2023-03-18 10:44:19');

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
  `electricity_units` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sno`, `invoice`, `property_id`, `flat_no`, `month`, `tenant_name`, `electricity_units`, `timestamp`) VALUES
(1, '2023-03/2', 1, 2, '2023-03', 'Rachael', 5, '2023-03-22 11:54:47');

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
(8, 1, '2023-03', '2023-03-22', '2023-03-22 11:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_amount`
--

CREATE TABLE `outstanding_amount` (
  `id` int(11) NOT NULL,
  `property_id` int(200) NOT NULL,
  `flat_no` int(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `amount_received` int(11) NOT NULL,
  `outstanding_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outstanding_amount`
--

INSERT INTO `outstanding_amount` (`id`, `property_id`, `flat_no`, `month`, `total`, `amount_received`, `outstanding_amount`, `status`, `time_stamp`) VALUES
(1, 1, 2, '2023-03', 8200, 8200, 0, 1, '2023-03-22 11:13:07'),
(2, 1, 2, '2023-04', 10600, 1200, 9400, 1, '2023-03-22 11:13:07'),
(3, 1, 2, '2023-05', 18700, 5000, 13700, 1, '2023-03-22 11:13:07');

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
(1, 1, 2, 'gpay', '2023-03-19', '2023-03', 2000, 'fetuityuertwereryt', 'fyjhuhiuryt', 'Dr. Indra Kumar Shah', 1, '2023-03-20 10:43:24'),
(2, 1, 2, 'gpay', '2023-03-19', '2023-04', 1200, '1233456qwerrr', 'jyfjydytfigo;uiyutrstdyfygu', 'Sirs Father', 1, '2023-03-20 10:43:34'),
(3, 1, 2, 'offline', '2023-03-25', '2023-03', 4200, NULL, 'nfnfkherighbfwhj bbghotihjoefkwejbfk', 'Dr. Indra Kumar Shah', 1, '2023-03-22 09:48:53'),
(4, 1, 2, 'offline', '2023-03-18', '2023-05', 5000, NULL, 'fsfefyytjyh', 'Dr. Indra Kumar Shah', 1, '2023-03-20 10:43:51'),
(5, 1, 2, 'offline', '2023-03-20', '2023-03', 2000, NULL, 'rw', 'Dr. Indra Kumar Shah', 1, '2023-03-22 09:48:58');

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
(1, 'P1', 'Vijay Nagar, Indore', 8, 1),
(2, 'P2', 'Dwarkapuri, Indore', 10, 1),
(3, 'P3', 'Sudama Nagar, Indore', 5, 1),
(4, 'ejprjhypie', 'nioerjt', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `tenant_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
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
  `two_wheeler` int(50) NOT NULL,
  `four_wheeler` int(50) NOT NULL,
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

INSERT INTO `tenants` (`id`, `tenant_name`, `father_name`, `gender`, `email`, `aadhaar_no`, `contact`, `members`, `no_of_male`, `no_of_female`, `no_of_children_below_5`, `rent`, `dob`, `age`, `property_id`, `flat_no`, `address`, `district`, `state`, `polic_station`, `two_wheeler`, `four_wheeler`, `tenant_occupation`, `tenant_occupation_address`, `occupation_contact`, `granter1_name`, `granter1_contact`, `granter1_address`, `granter1_district`, `granter1_state`, `granter1_police_station`, `granter1_email`, `granter2_name`, `granter2_contact`, `granter2_address`, `granter2_district`, `granter2_state`, `granter2_police_station`, `granter2_email`, `status`, `joining_date`) VALUES
(1, 'Douglas', 'William', '', 'Mogusu@gmail.com', 12345, '85421658', 3, 0, 0, 0, 10000, '2023-03-08', 0, 1, 1, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2022-07-01'),
(2, 'Rachael', 'Pata nahi', '', 'wangeci@gmail.com', 54321, '4851256', 4, 0, 0, 0, 15000, '2023-03-08', 0, 1, 2, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-08-01'),
(3, 'zeph', 'NoBody', '', 'wanyama@gmail.com', 99999, '8956214', 2, 0, 0, 0, 20000, '2023-03-08', 0, 1, 3, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-09-01'),
(4, 'maureen', 'AnyBody', '', 'cherotich@gmail.com', 88888, '8456215', 1, 0, 0, 0, 5000, '2023-03-08', 0, 2, 1, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-10-01'),
(5, 'james', 'SomeBody', '', 'james@gmail.com', 78523, '8512469', 2, 0, 0, 0, 25000, '2023-03-08', 0, 2, 2, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2022-09-01'),
(6, 'DANIEL', 'RehneDo', '', 'daniel@gmail.com', 32587, '85745264', 3, 0, 0, 0, 30000, '2023-03-08', 0, 2, 3, '', '', '', '', 0, 0, '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2022-07-07'),
(19, 'Sneha', 'Sanu Mathew', 'female', '0808io201048.ies@ipsacademy.org', 2147483647, '7489625561', 0, 0, 0, 0, 0, '2001-05-16', 0, 1, 1, 'A 34/303 Treasure Fantasy', 'Indore', 'Madhya Pradesh', 'Rajendra Nagar', 1, 1, 'Student ', 'IES IPS Academy Indore Madhya Pradesh', '0', 'Lydia Thomas ', '8767887654', 'A 99/209 Vasant Vihar', 'Indore', 'Madhya Pradesh', 'Rangwasa', 'etgothno@gmail.com', 'Rachel Johnson', '9877876545', 'A 99/209 Hiranandani Estate ', 'Indore', 'Madhya Pradesh', 'Not sure', 'edf@gmail.com', 1, '2023-03-17'),
(24, 'Om Aditya Jain', 'Mr. Dinesh Jain', 'male', 'omadityajain@gmail.com', 2147483647, '9754854756', 4, 2, 1, 0, 1000000, '2002-10-21', 21, 1, 4, 'Dwarkapuri', 'Indore', 'Madhya Pradesh', 'Dwarkapuri', 2, 3, 'Student', 'IES IPS ACADEMY INDORE', '9876873345', 'Mr. Yash Parmar', '123456789', 'Rajendra Nagar', 'Indore', 'MP', 'Rajendra Nagar', 'yash@gmail.com', 'Mr. Sharansh Nayak', '987654321', 'Rajendra Nagar', 'Indore', 'MP', 'Rajendra Nagar', 'sharansh@gmail.com', 1, '2023-03-19'),
(32, 'gjgjgjgj', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 1, 5, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(33, 'tytytytyty', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 1, 5, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(34, 'lieurjioejr', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 1, 5, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(35, 'lieurjioejr', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 1, 5, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00'),
(36, 'kljjrliajewpr', '', '', '', 0, '', 0, 0, 0, 0, 0, '0000-00-00', 0, 1, 5, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00');

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
(1, 24, 'Mr. Dinesh Jain', '', 40, 'male', 'father', 2147483647, 2147483647, 1),
(2, 24, 'Mrs. Deepti Jain', '', 40, 'female', 'mother', 2147483647, 2147483647, 1),
(3, 24, 'Ms. Palak Jain', '', 18, 'female', 'others', 2147483647, 2147483647, 1),
(5, 32, 'ghsgdgdgd', '', 0, '', '', 0, 0, 1),
(6, 32, 'gfhfjdkdfjf', '', 0, '', '', 0, 0, 1),
(7, 33, 'kdfjklsadjfalasd', '', 0, '', '', 0, 0, 1),
(8, 33, 'krjttert', '', 0, '', '', 0, 0, 1),
(9, 36, 'kjkjdjflaskd', 'kjhdhflklnasdjf', 76, 'male', 'father', 2147483647, 4454, 1),
(10, 36, 'dhfoasdfl', 'klfjglfdjgl', 78, 'female', 'father', 9856, 485904, 1);

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
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'Om', 'Om', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'Nisha', 'Nisha', '827ccb0eea8a706c4c34a16891f84e7b', 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry_form_details`
--
ALTER TABLE `entry_form_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outstanding_amount`
--
ALTER TABLE `outstanding_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tenant_relatives`
--
ALTER TABLE `tenant_relatives`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
