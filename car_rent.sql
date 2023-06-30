-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2023 at 10:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `logdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `address`, `contact`, `lastname`, `logdate`) VALUES
(88, 'Johnmark', 'Purok Bakawan, Bgy. Sicsican, PPC, Palawan', '09274142991', 'Benedicto', '2023-06-20 23:40:22'),
(89, 'James', 'Diamond HOA, Purok bakawan', '09453456789', 'Curry', '2023-06-21 00:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(255) NOT NULL,
  `rent_id` int(255) NOT NULL,
  `mode_payment` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `rent_id`, `mode_payment`, `balance`) VALUES
(1, 1, 'PAID', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(255) NOT NULL,
  `vehicle_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `rent_start` datetime NOT NULL,
  `rent_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `vehicle_id`, `customer_id`, `rent_start`, `rent_end`) VALUES
(1, 14, 88, '2023-06-20 17:58:33', '2023-06-20 17:58:33'),
(28, 89, 16, '2023-06-21 00:00:00', '2023-06-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirements_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `requirement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `vehicle_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_model`, `vehicle_type`, `color`, `plate`, `vehicle_status`) VALUES
(14, 'TOYOTA', 'SUV', 'white', '12345', 'Available'),
(16, 'TOYOTA', 'AUV', 'Black', '123654', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `test2` (`rent_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `test` (`customer_id`),
  ADD KEY `text` (`vehicle_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirements_id`),
  ADD KEY `requirements_ibfk_1` (`customer_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirements_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
