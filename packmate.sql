-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 12:41 AM
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
(1, ' 2000000', 'scan', 'scan', 'scan', '2024-09-04'),
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
(2, 'Pepsi', 'Conditional', '200', 'LEVEL FOUR', 'Fablab', '24-11-06'),
(3, 'Cocoa', 'Moderate', '241', 'LEVEL FOUR', 'Bowler Ltd', '24-11-06'),
(4, 'Coconut Water', 'Very Good', '162', 'LEVEL THREE', 'West India Company', '24-11-06'),
(5, 'Apple Juice', 'Very Good', '293', 'LEVEL FOUR', 'Gastro', '24-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `u_label` int(11) NOT NULL,
  `u_fault` varchar(80) NOT NULL,
  `u_correct` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `u_name`, `u_type`, `u_label`, `u_fault`, `u_correct`, `u_date`) VALUES
(2, 'Heineken', 'Alcoholic', 200, '1278', '6127', '2024-10-13'),
(3, 'Lassi', 'Non-alcoholic', 20, '1278', '6127', '2024-11-06'),
(4, 'Starbucks Frappuccino', 'Non-alcoholic', 301, '1278', '629', '2024-11-06'),
(5, 'V8 Juice', 'Non-alcoholic', 76, '1278', '1982', '2024-11-06');

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
(3, '2024-11-20', 'tractor', '20000$'),
(5, '2024-11-20', 'Primus', '90000 $');

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
  `u_equipment` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `status` varchar(80) NOT NULL,
  `u_technician` varchar(80) NOT NULL,
  `u_notes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id`, `u_equipment`, `u_type`, `s_date`, `e_date`, `status`, `u_technician`, `u_notes`) VALUES
(1, 'sealing machine', 'Very Bad', '2024-11-25', '2024-12-21', 'pending', 'Mahamad ', 'We were able to finish the task ahead of us before due date '),
(3, 'billing machine', 'Very Good', '2024-11-14', '2024-11-01', 'pending', 'Muhamadou', 'We were able to finish the task ahead of us before due date');

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
(2, 'Minute Maid', 'Capital One', 'PENDING', '2024-11-06'),
(3, '7UP', 'Blackstone', 'SUCCESSFULL', '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

References for registration page 
<?php
require 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $password = $_POST['u_password'];
    $job = $_POST['u_type'];

    $sql = mysqli_query($con, "INSERT INTO `users` VALUES('', '$name', '$email', '$password', '$job')");

    if ($sql) {
        echo "<script>alert('Registered Successfully | Please Head to the Login')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>





CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO-INCREMENT,
  `u_name` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL,
  `u_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`, `u_type`) VALUES
(1, 'Manzi', 'manzidav@gmail.com', '12345', 'service manager'),
(2, 'admin', 'admin@admin.admin', 'admin', 'administrator'),
(3, 'fadoul', 'fadoul@gmail.com', '12345', 'batch manager'),
(4, 'Ganza', 'ganzaatauca@gmail.com', '12345', 'quality control manager'),
(5, 'Abdoul', 'abdoul@gmail.com', '12345', 'Inventory manager'),
(6, 'Gerald', 'geraldatauca@gmail.com', '12345', 'maintenance manager'),
(7, 'Davis', 'davisatauca@gmail.com', '12345', 'Traceability manager');

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
(2, 'Coca-cola', '100', 'suihqwuiq', 'Capture.JPG'),
(3, 'AriZona Iced Tea', '89', '100', 'vlcsnap-2022-02-25-13h54m50s893.png');

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
-- Indexes for table `labels`
--
ALTER TABLE `labels`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `traceability`
--
ALTER TABLE `traceability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_quality`
--
ALTER TABLE `user_quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
