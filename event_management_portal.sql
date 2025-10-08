-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Oct 03, 2025 at 05:54 PM
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
-- Database: `event_management_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`booking_id`, `customer_id`, `event_id`, `booking_date`) VALUES
(1, 1, 3, '2025-09-27'),
(3, 1, 1, '0000-00-00'),
(4, 1, 2, '0000-00-00'),
(5, 1, 2, '0000-00-00'),
(6, 1, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_full_name` varchar(100) NOT NULL,
  `customer_gender` varchar(50) NOT NULL,
  `customer_contact_no` varchar(20) NOT NULL,
  `customer_email_address` varchar(50) NOT NULL,
  `payment_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `user_id`, `customer_username`, `customer_password`, `customer_full_name`, `customer_gender`, `customer_contact_no`, `customer_email_address`, `payment_history`) VALUES
(1, 3, 'customer', '3333', 'customer', 'male', '01873904874', 'customer@gmail.com', NULL),
(4, 3, 'nabil', '1234', 'hasibulnabil', 'male', '0187202002', 'has@email.com', NULL);

--
-- Triggers `customer_table`
--
DELIMITER $$
CREATE TRIGGER `after_customer_insert` AFTER INSERT ON `customer_table` FOR EACH ROW BEGIN
    INSERT INTO users_table (username, password, role, email)
    VALUES (
        NEW.customer_username,
        NEW.customer_password,
        3, 
        NEW.customer_email_address
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `event_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_status` varchar(50) NOT NULL,
  `event_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`event_id`, `manager_id`, `event_type`, `event_status`, `event_price`) VALUES
(1, 1, 'wedding', 'Active', 34500.00),
(2, 1, 'wedding', 'Inactive', 50000.00),
(3, 1, 'Birthday', 'Active', 17000.00),
(4, 1, 'festival', 'Active', 30000.00);

-- --------------------------------------------------------

--
-- Table structure for table `manager_table`
--

CREATE TABLE `manager_table` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_user_name` varchar(50) NOT NULL,
  `manager_password` varchar(50) NOT NULL,
  `manager_full_name` varchar(100) NOT NULL,
  `manager_email` varchar(50) NOT NULL,
  `manager_gender` varchar(50) NOT NULL,
  `manager_contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_table`
--

INSERT INTO `manager_table` (`manager_id`, `user_id`, `manager_user_name`, `manager_password`, `manager_full_name`, `manager_email`, `manager_gender`, `manager_contact_no`) VALUES
(1, 1, 'manager', '1111', 'manager', 'manager@gmail.com', 'male', '01827642676');

--
-- Triggers `manager_table`
--
DELIMITER $$
CREATE TRIGGER `after_manager_insert` AFTER INSERT ON `manager_table` FOR EACH ROW BEGIN
    INSERT INTO users_table (username, password, role, email)
    VALUES (
        NEW.manager_user_name,
        NEW.manager_password,
        1, 
        NEW.manager_email
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_table`
--

CREATE TABLE `service_provider_table` (
  `service_provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `service_provider_username` varchar(100) NOT NULL,
  `service_provider_name` varchar(100) NOT NULL,
  `service_provider_email` varchar(50) NOT NULL,
  `service_provider_password` varchar(50) NOT NULL,
  `service_provider_gender` varchar(50) NOT NULL,
  `service_provider_contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider_table`
--

INSERT INTO `service_provider_table` (`service_provider_id`, `user_id`, `manager_id`, `service_provider_username`, `service_provider_name`, `service_provider_email`, `service_provider_password`, `service_provider_gender`, `service_provider_contact_no`) VALUES
(1, 2, 1, 'nabil', 'Hasibul Nabil', 'nabil@gmail.com', '3434', 'Male', '01456783945');

--
-- Triggers `service_provider_table`
--
DELIMITER $$
CREATE TRIGGER `after_service_provider_insert` AFTER INSERT ON `service_provider_table` FOR EACH ROW BEGIN
    INSERT INTO users_table (username, password, role, email)
    VALUES (
        NEW.service_provider_username,
        NEW.service_provider_password,
        2, 
        NEW.service_provider_email
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `service_table`
--

CREATE TABLE `service_table` (
  `service_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `service_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'manager', 'manager@gmail.com', '1111', 1),
(2, 'serviceProvider', 'serviceProvider@gmail.com', '2222', 2),
(3, 'customer', 'customer@gmail.com', '3333', 3),
(4, 'nabil', 'has@email.com', '1234', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_event_manager` (`manager_id`);

--
-- Indexes for table `manager_table`
--
ALTER TABLE `manager_table`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `manager_ibfk_1` (`user_id`);

--
-- Indexes for table `service_provider_table`
--
ALTER TABLE `service_provider_table`
  ADD PRIMARY KEY (`service_provider_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_serviceprovider_manager` (`manager_id`);

--
-- Indexes for table `service_table`
--
ALTER TABLE `service_table`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager_table`
--
ALTER TABLE `manager_table`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_provider_table`
--
ALTER TABLE `service_provider_table`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_table`
--
ALTER TABLE `service_table`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD CONSTRAINT `booking_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_table` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_table_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event_table` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD CONSTRAINT `customer_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_table`
--
ALTER TABLE `event_table`
  ADD CONSTRAINT `event_table_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager_table` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_manager` FOREIGN KEY (`manager_id`) REFERENCES `manager_table` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager_table`
--
ALTER TABLE `manager_table`
  ADD CONSTRAINT `manager_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider_table`
--
ALTER TABLE `service_provider_table`
  ADD CONSTRAINT `fk_serviceprovider_manager` FOREIGN KEY (`manager_id`) REFERENCES `manager_table` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_provider_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_table`
--
ALTER TABLE `service_table`
  ADD CONSTRAINT `service_table_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider_table` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
