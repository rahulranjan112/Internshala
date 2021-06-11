-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 11, 2021 at 09:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `MobileNo` int(11) NOT NULL,
  `Preference` tinyint(1) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Address`, `MobileNo`, `Preference`, `User_ID`) VALUES
(14, 'Customer 1', 'Faridabad', 99833312, 0, 37),
(15, 'Customer 2', 'Bangalore', 2147483647, 1, 39),
(16, 'Customer 3', 'Delhi', 2147483647, 0, 40),
(17, 'Cust1', 'cust1', 999, 0, 41);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `ID` int(11) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Cost` decimal(10,0) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `ImageLocation` varchar(100) NOT NULL,
  `ItemAvailable` tinyint(1) NOT NULL,
  `IsVegetarian` tinyint(1) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`ID`, `Item`, `Description`, `Cost`, `Restaurant_ID`, `ImageLocation`, `ItemAvailable`, `IsVegetarian`, `Course`) VALUES
(14, 'MenuItem 1', 'MenuItem 1', '200', 6, 'MenuItem 1', 1, 1, 'Main'),
(15, 'MenuItem 2', 'MenuItem 2', '250', 6, 'MenuItem 2', 1, 1, 'Main'),
(16, 'MenuItem 3', 'MenuItem 3', '450', 6, 'MenuItem 3', 1, 1, 'Snacks'),
(17, 'Bread', 'Bread', '50', 7, 'Bread', 1, 1, 'Main'),
(18, 'Ice Cream', 'Ice Cream', '150', 7, 'Ice Cream', 1, 1, 'Dessert'),
(19, 'Sandwich', 'Sandwich', '140', 7, 'Sandwich', 1, 0, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `customer_id`, `restaurant_id`, `total_amount`, `status`) VALUES
(17, '2021-06-10', 14, 6, 650, 0),
(18, '2021-06-10', 15, 7, 900, 0),
(19, '2021-06-10', 16, 7, 340, 0),
(20, '2021-06-10', 16, 6, 450, 0),
(21, '2021-06-11', NULL, 7, 150, 0),
(22, '2021-06-11', 17, 7, 140, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `quantity` decimal(19,3) NOT NULL,
  `price` decimal(19,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menuitem_id`, `quantity`, `price`) VALUES
(17, 17, 14, '1.000', '200.000'),
(18, 17, 16, '1.000', '450.000'),
(19, 18, 15, '1.000', '250.000'),
(20, 18, 16, '1.000', '450.000'),
(21, 18, 17, '1.000', '50.000'),
(22, 18, 18, '1.000', '150.000'),
(23, 19, 17, '1.000', '50.000'),
(24, 19, 18, '1.000', '150.000'),
(25, 19, 19, '1.000', '140.000'),
(26, 20, 14, '1.000', '200.000'),
(27, 20, 15, '1.000', '250.000'),
(28, 21, 18, '1.000', '150.000'),
(29, 22, 19, '1.000', '140.000');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `MobileNo` int(11) NOT NULL,
  `Opening_Time` time NOT NULL,
  `Closing_time` time NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`ID`, `Name`, `Address`, `MobileNo`, `Opening_Time`, `Closing_time`, `User_ID`) VALUES
(6, 'ABC Company', '24', 2147483647, '09:00:00', '23:00:00', 36),
(7, 'Restaurant 2', 'Restaurant 2', 2147483647, '09:00:00', '23:00:00', 38);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `IsCustomer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `Password`, `IsCustomer`) VALUES
(36, 'abc@abc.com', '900150983cd24fb0d6963f7d28e17f72', 0),
(37, 'c1@gmail.com', 'a9f7e97965d6cf799a529102a973b8b9', 1),
(38, 'r2@gmail.com', 'd279186428a75016b17e4df5ea43d080', 0),
(39, 'c2@gmail.com', '9ab62b5ef34a985438bfdf7ee0102229', 1),
(40, 'c3@gmail.com', '0a3d72134fb3d6c024db4c510bc1605b', 1),
(41, 'cust1@gmail.com', '1f07921f4416f182a32c483ccac2b0e6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_User` (`User_ID`) USING BTREE;

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Restaurant` (`Restaurant_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`),
  ADD KEY `fk_restaurant_id` (`restaurant_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_item_id` (`menuitem_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_User` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `FK_Restaurant` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`ID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`menuitem_id`) REFERENCES `menuitems` (`ID`),
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `FK_User` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
