-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 11:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `packmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchmanagement`
--

CREATE TABLE `batchmanagement` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `u_scans` varchar(80) NOT NULL,
  `faults` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `batchmanagement`
--

INSERT INTO `batchmanagement` (`id`, `u_name`, `u_type`, `u_scans`, `faults`, `u_date`) VALUES
(1, 'Bottle', 'scan', 'scan', 'scan', '2024-09-04'),
(3, 'Mshippers', 'Very Good', 'scan', 'scan', '2024-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `u_stock` varchar(80) NOT NULL,
  `u_level` varchar(80) NOT NULL,
  `u_supplier` varchar(80) NOT NULL,
  `u_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `u_name`, `u_type`, `u_stock`, `u_level`, `u_supplier`, `u_date`) VALUES
(1, 'product', 'Not Good', '200', 'LEVEL ONE', '$u_distributor', '24-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `u_machine` varchar(80) NOT NULL,
  `u_amount` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `date`, `u_machine`, `u_amount`) VALUES
(1, '2024-09-07', 'tractor', '20000$'),
(2, '2024-09-24', 'tractor', '90');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `u_message` text NOT NULL,
  `u_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `u_message`, `u_date`) VALUES
(6, 'Hello user', '2024-09-14 00:00:00'),
(7, 'We have to do some work at ten ', '2024-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `u_supplier` varchar(80) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_productnumber` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id`, `u_supplier`, `u_name`, `u_productnumber`, `u_date`) VALUES
(2, '$u_distributor', 'Coca-cola', '101 - 1000', '2025-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `traceability`
--

CREATE TABLE `traceability` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_receiver` varchar(80) NOT NULL,
  `u_status` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `traceability`
--

INSERT INTO `traceability` (`id`, `u_name`, `u_receiver`, `u_status`, `u_date`) VALUES
(1, 'Mountain Dew', 'JP Morgan Chase', 'SUCCESSFULL', '2024-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'Manzi', 'manzi@gmail.com', '12345'),
(2, 'admin', 'admin@admin.admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_quality`
--

CREATE TABLE `user_quality` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_diagram` varchar(80) NOT NULL,
  `u_score` varchar(80) NOT NULL,
  `u_bottlenecks` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_quality`
--

INSERT INTO `user_quality` (`id`, `u_name`, `u_diagram`, `u_score`, `u_bottlenecks`) VALUES
(2, 'Coca-cola', '100', 'suihqwuiq', 'Capture.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchmanagement`
--
ALTER TABLE `batchmanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traceability`
--
ALTER TABLE `traceability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quality`
--
ALTER TABLE `user_quality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batchmanagement`
--
ALTER TABLE `batchmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `traceability`
--
ALTER TABLE `traceability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_quality`
--
ALTER TABLE `user_quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
