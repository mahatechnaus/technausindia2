-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 09:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ydsmmkqnmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acc_type` enum('Current','Savings') NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `micr_code` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `user_id`, `bank_name`, `account_number`, `acc_type`, `account_name`, `ifsc_code`, `micr_code`, `swift_code`, `url`) VALUES
(1, 1, 'HDFC', '342534534', 'Savings', 'test', 'test', 'test', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `buyer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `code` int(11) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `cin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`buyer_id`, `user_id`, `company_name`, `address`, `gst`, `code`, `buyer_name`, `pan`, `cin`) VALUES
(1, 1, 'test', 'test add', 'test', 1, 'test', 'test', 'test'),
(2, 1, 'B Jayalakshmi', 'No: 141,( 3/67),Dr Ambetkar salai ,Puducherry.', '', 1, 'B Jayalakshmi', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `client` varchar(100) NOT NULL,
  `project` varchar(255) NOT NULL,
  `workorder` varchar(191) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `discount` varchar(3) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `user_id`, `invoice_number`, `type`, `client`, `project`, `workorder`, `gst`, `discount`, `date`) VALUES
(1, 1, '1', 'Proforma Invoice', '1', 'quotation', '1', '0', '0', '2023-10-12'),
(2, 1, '11', 'Quotation', '1', 'quotation', '1', '0', '10', '2023-10-13'),
(3, 1, '12', 'Invoice', '2', '', '', '0', '2', '2023-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `gst_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gst` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `user_id`, `image`) VALUES
(1, 1, 'Blue Rounded Rectangle Accounting Logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(11) NOT NULL,
  `smtp` varchar(5) NOT NULL,
  `hostname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `message_from` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `smtp`, `hostname`, `username`, `password`, `message_from`, `subject`) VALUES
(1, '465', 'host', 'username', 'password', 'Technaus Renewable', 'Recover Password');

-- --------------------------------------------------------

--
-- Table structure for table `other_data`
--

CREATE TABLE `other_data` (
  `id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `product` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `rate` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_data`
--

INSERT INTO `other_data` (`id`, `data_id`, `product`, `qty`, `desc`, `rate`) VALUES
(1, 1, 'Solar Panel', '1', 'test', '50000'),
(2, 2, 'Solar Panel', '2', '', '50000'),
(3, 2, 'Solar Panel', '2', '', '50000'),
(4, 3, 'Solar Panel', '1', '', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `permanent_details`
--

CREATE TABLE `permanent_details` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(11) NOT NULL,
  `ph_number` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `whatsapp` varchar(14) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `cin` varchar(26) NOT NULL,
  `statecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permanent_details`
--

INSERT INTO `permanent_details` (`company_id`, `user_id`, `company_name`, `user_name`, `designation`, `address`, `pincode`, `ph_number`, `email`, `website`, `whatsapp`, `gst`, `pan_number`, `cin`, `statecode`) VALUES
(1, 1, 'Technaus Solar Renewable Pvt Ltd.', 'Balachandar', 'Supervisor', '#27, Puducherry - Tindivanam Main Road, V.I.P Nagar, Pattanur', 605006, '7418650503', 'solar@technaus.co.in', 'www.technaus.co.in', '', '', ' ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `sac` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `user_id`, `product_description`, `sac`, `rate`) VALUES
(1, 1, 'Solar Panel', 'PV001', 50000),
(2, 1, 'Solar Panel', 'PV002', 54000);

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `sign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`sign_id`, `user_id`, `image`) VALUES
(3, 1, 'technausSealRound.png');

-- --------------------------------------------------------

--
-- Table structure for table `statecode`
--

CREATE TABLE `statecode` (
  `state_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statecode`
--

INSERT INTO `statecode` (`state_id`, `user_id`, `name`, `code`) VALUES
(1, 1, 'Puducherrry', 101),
(2, 1, 'CHENNAI', 102);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `company`, `type`, `email`, `password`, `pass`) VALUES
(1, 'Technaus', 'Solar', 'Technaus Renewable', 'Service', 'solar@technaus.co.in', '0192023a7bbd73250516f069df18b500', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`gst_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanent_details`
--
ALTER TABLE `permanent_details`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`sign_id`);

--
-- Indexes for table `statecode`
--
ALTER TABLE `statecode`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permanent_details`
--
ALTER TABLE `permanent_details`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `sign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statecode`
--
ALTER TABLE `statecode`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
