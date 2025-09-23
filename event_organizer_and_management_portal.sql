-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2025 at 10:52 AM
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
-- Database: `event_organizer_and_management_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `Booking_Id` varchar(15) NOT NULL,
  `Booking_Date` date NOT NULL,
  `Event_ID` varchar(50) NOT NULL,
  `Customer_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`Booking_Id`, `Booking_Date`, `Event_ID`, `Customer_ID`) VALUES
('B002', '2025-02-15', 'E002', 'C002');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `Customer_ID` varchar(50) NOT NULL,
  `Customer_User_Name` varchar(50) NOT NULL,
  `Customer_Full_Name` varchar(50) NOT NULL,
  `Customer_Email_Address` varchar(50) NOT NULL,
  `Customer_Gender` varchar(50) NOT NULL,
  `Customer_Contact_No` varchar(50) NOT NULL,
  `Customer_password` varchar(50) NOT NULL,
  `Users_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`Customer_ID`, `Customer_User_Name`, `Customer_Full_Name`, `Customer_Email_Address`, `Customer_Gender`, `Customer_Contact_No`, `Customer_password`, `Users_ID`) VALUES
('C002', 'sohanar', 'Sohana Rahman', 'sohana.rahman@email.com', 'Female', '01730000002', 'sohana456', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `Event_ID` varchar(50) NOT NULL,
  `Event_type` varchar(50) NOT NULL,
  `Event_Status` varchar(50) NOT NULL,
  `Event_Price` double NOT NULL,
  `Manager_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`Event_ID`, `Event_type`, `Event_Status`, `Event_Price`, `Manager_ID`) VALUES
('E001', 'Wedding', 'active', 34000, 'M001'),
('E002', 'Birthday', 'Active', 35000, 'M001'),
('E003', 'Convocation', 'Inactive', 40000, 'M001'),
('E004', 'Reunion', 'Active', 60000, 'M001'),
('E005', 'Corporate Event', 'Inctive', 55000, 'M001'),
('E006', 'Award Ceremony', 'Active', 52000, 'M001'),
('E007', 'Religious event', 'inactive', 34000, 'M001');

-- --------------------------------------------------------

--
-- Table structure for table `manager_table`
--

CREATE TABLE `manager_table` (
  `Manager_ID` varchar(50) NOT NULL,
  `Manager_User_Name` varchar(50) NOT NULL,
  `Manager_Full_Name` varchar(50) NOT NULL,
  `Manager_Email_Address` varchar(50) NOT NULL,
  `Manager_Gender` varchar(50) NOT NULL,
  `Manager_Contact_No` varchar(50) NOT NULL,
  `Manager_Password` varchar(50) NOT NULL,
  `Users_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_table`
--

INSERT INTO `manager_table` (`Manager_ID`, `Manager_User_Name`, `Manager_Full_Name`, `Manager_Email_Address`, `Manager_Gender`, `Manager_Contact_No`, `Manager_Password`, `Users_ID`) VALUES
('M001', 'alicer', 'Alice Rahman', 'alice.rahman@email.com', 'Female', '01710000001', 'pass123', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_table`
--

CREATE TABLE `service_provider_table` (
  `Service_Provider_ID` varchar(50) NOT NULL,
  `Service_Provider_User_Name` varchar(50) NOT NULL,
  `Service_Provider_Full_Name` varchar(50) NOT NULL,
  `Service_Provider_Gender` varchar(50) NOT NULL,
  `Service_Provider_Email_Address` varchar(50) NOT NULL,
  `Service_Provider_Contact_No` varchar(50) NOT NULL,
  `Service_Provider_Password` varchar(50) NOT NULL,
  `Manager_ID` varchar(50) NOT NULL,
  `Users_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider_table`
--

INSERT INTO `service_provider_table` (`Service_Provider_ID`, `Service_Provider_User_Name`, `Service_Provider_Full_Name`, `Service_Provider_Gender`, `Service_Provider_Email_Address`, `Service_Provider_Contact_No`, `Service_Provider_Password`, `Manager_ID`, `Users_ID`) VALUES
('SP001', 'kamalu', 'Kamal Uddin', 'Male', 'kamal.uddin@email.com', '01720000003', 'kamal123', 'M001', ''),
('SP002', 'rinas', 'Rina Sultana', 'Female', 'rina.sultana@email.com', '01720000001', 'rina456', 'M001', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_table`
--

CREATE TABLE `service_table` (
  `Service_ID` varchar(15) NOT NULL,
  `Serivce_type` varchar(15) NOT NULL,
  `Service_Provider_ID` varchar(50) NOT NULL,
  `Service_Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_table`
--

INSERT INTO `service_table` (`Service_ID`, `Serivce_type`, `Service_Provider_ID`, `Service_Price`) VALUES
('S001', 'Decoration', 'SP001', 0),
('S002', 'Lighting Setup', 'SP002', 0),
('S003', 'Photography', 'SP001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `Users_ID` varchar(50) NOT NULL,
  `Users_Name` varchar(50) NOT NULL,
  `Users_Full_Name` varchar(50) NOT NULL,
  `Users_Email_Address` varchar(50) NOT NULL,
  `Users_Gender` varchar(50) NOT NULL,
  `Users_Contact_No` varchar(50) NOT NULL,
  `Users_Password` varchar(50) NOT NULL,
  `Users_Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`Users_ID`, `Users_Name`, `Users_Full_Name`, `Users_Email_Address`, `Users_Gender`, `Users_Contact_No`, `Users_Password`, `Users_Role`) VALUES
('1', 'nabil@12', 'Nabil khan', 'nabilkhan@gmail.com', 'male', '01762876478', '1111', '1'),
('2', 'maria@13', 'Maria ', 'maria@gmail.com', 'female', '01762876479', '2222', '2'),
('3', 'maliha@14', 'Maliha', 'maliha@gmail.com', 'female', '01762876480', '3333', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`Booking_Id`),
  ADD KEY `FK_Booking_Event` (`Event_ID`),
  ADD KEY `FK_Booking_Customer` (`Customer_ID`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD KEY `FK_Customer_Users` (`Users_ID`);

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `FK_Event_Manager` (`Manager_ID`);

--
-- Indexes for table `manager_table`
--
ALTER TABLE `manager_table`
  ADD PRIMARY KEY (`Manager_ID`),
  ADD KEY `FK_Manager_Users` (`Users_ID`);

--
-- Indexes for table `service_provider_table`
--
ALTER TABLE `service_provider_table`
  ADD PRIMARY KEY (`Service_Provider_ID`),
  ADD KEY `FK_ServiceProvider_Manager` (`Manager_ID`),
  ADD KEY `FK_ServiceProvider_Users` (`Users_ID`);

--
-- Indexes for table `service_table`
--
ALTER TABLE `service_table`
  ADD PRIMARY KEY (`Service_ID`) USING BTREE,
  ADD KEY `FK_Service_ServiceProvider` (`Service_Provider_ID`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`Users_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD CONSTRAINT `FK_Booking_Customer` FOREIGN KEY (`Customer_ID`) REFERENCES `customer_table` (`Customer_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Booking_Event` FOREIGN KEY (`Event_ID`) REFERENCES `event_table` (`Event_ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD CONSTRAINT `FK_Customer_Users` FOREIGN KEY (`Users_ID`) REFERENCES `users_table` (`Users_ID`) ON DELETE CASCADE;

--
-- Constraints for table `event_table`
--
ALTER TABLE `event_table`
  ADD CONSTRAINT `FK_Event_Manager` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_table` (`Manager_ID`) ON DELETE CASCADE;

--
-- Constraints for table `manager_table`
--
ALTER TABLE `manager_table`
  ADD CONSTRAINT `FK_Manager_Users` FOREIGN KEY (`Users_ID`) REFERENCES `users_table` (`Users_ID`) ON DELETE CASCADE;

--
-- Constraints for table `service_provider_table`
--
ALTER TABLE `service_provider_table`
  ADD CONSTRAINT `FK_ServiceProvider_Manager` FOREIGN KEY (`Manager_ID`) REFERENCES `manager_table` (`Manager_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ServiceProvider_Users` FOREIGN KEY (`Users_ID`) REFERENCES `users_table` (`Users_ID`) ON DELETE CASCADE;

--
-- Constraints for table `service_table`
--
ALTER TABLE `service_table`
  ADD CONSTRAINT `FK_Service_ServiceProvider` FOREIGN KEY (`Service_Provider_ID`) REFERENCES `service_provider_table` (`Service_Provider_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
