-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 05:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regis`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `cart_qty`, `cart_stock_id`, `user_id`, `cart_uniqid`) VALUES
(19, 15, 2, 28, 0, 'charieignacio3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_expiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`exp_id`, `exp_itemName`, `exp_itemPrice`, `exp_itemQty`, `exp_expiredDate`) VALUES
(17, 'Chicken', 234, 10, '2022-05-30'),
(22, 'Straw', 20, 21, '2022-05-02'),
(24, 'Flour', 30, 10, '2022-05-11'),
(25, 'Egg', 4, 2, '2022-05-12'),
(26, 'MilkTea', 50, 2, '2022-05-25'),
(27, 'Butter', 35, 1, '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` double NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_grams` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`, `item_code`, `item_brand`, `item_grams`) VALUES
(8, 'Egg', 4, 1, '111', 'Joy', '30'),
(10, 'Straw', 20, 3, '67', 'Market', '50'),
(11, 'Cream', 30, 1, '9', 'Sun', '12'),
(12, 'Coffee', 50, 1, '11', 'Nescafe', '30'),
(13, 'Flour', 30, 1, '9', 'Tinder', '10'),
(15, 'Sugar', 66, 1, '90', 'Rabbit', '40'),
(16, 'Milk', 70, 2, '789', 'Cowhead', '10'),
(17, 'MilkTea', 50, 2, '430', 'Milkcow', '10'),
(18, 'Butter', 35, 1, '001', 'Dairycream', '20');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Goods'),
(2, 'Drinks'),
(3, 'Utensils');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `generic_name` varchar(35) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `gram` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `brand`, `gram`, `type`, `qty`, `price`, `date_sold`) VALUES
(12, '9', 'Cream', 'Sun', '12', 'Goods', 20, 30, '2022-05-16 11:02:44'),
(13, '11', 'Coffee', 'Nescafe', '30', 'Goods', 5, 50, '2022-05-16 11:03:01'),
(14, '11', 'Coffee', 'Nescafe', '30', 'Goods', 5, 50, '2022-05-16 12:00:17'),
(15, '111', 'Egg', 'Joy', '30', 'Goods', 4, 4, '2022-05-16 12:02:26'),
(16, '11', 'Coffee', 'Nescafe', '30', 'Goods', 12, 50, '2022-05-25 06:44:41'),
(17, '001', 'Butter', 'Dairycream', '20', 'Goods', 3, 35, '2022-05-25 06:44:41'),
(18, '9', 'Cream', 'Sun', '12', 'Goods', 1, 30, '2022-06-02 14:18:09'),
(19, '001', 'Butter', 'Dairycream', '20', 'Goods', 10, 35, '2022-06-02 14:18:09'),
(20, '430', 'MilkTea', 'Milkcow', '10', 'Drinks', 3, 50, '2022-06-02 14:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_expiry` date NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_manufactured` date NOT NULL,
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_expiry`, `stock_added`, `stock_manufactured`, `stock_purchased`) VALUES
(19, 11, 2, '2022-09-29', '2022-05-25 12:16:47', '2022-02-16', '2022-04-06'),
(24, 8, 8, '2022-06-30', '2022-05-16 12:02:15', '2022-03-09', '2022-05-04'),
(25, 12, 8, '2022-05-14', '2022-05-25 06:43:34', '2022-02-02', '2022-05-05'),
(26, 14, 20, '2022-07-21', '2022-05-10 17:04:20', '2021-12-27', '2022-05-11'),
(28, 15, 20, '2022-06-11', '2022-06-30 15:52:36', '2021-12-27', '2022-05-01'),
(30, 16, 19, '2022-08-05', '2022-05-12 09:24:23', '2022-02-08', '2022-05-12'),
(32, 17, 7, '2022-06-11', '2022-06-02 14:30:46', '2022-02-06', '2022-05-25'),
(34, 18, 11, '2022-06-01', '2022-06-02 14:17:59', '2022-05-01', '2022-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_email`, `user_pass`, `code`) VALUES
(12, 'Vince', 'vincerwin1@gmail.com', 'd1d73d7bd6b463d7c31f6ae54b56f2dd', 'b69f46f63f65610498b0acbef38f3d38'),
(13, 'Lowela', 'lowelaarevalo02@gmail.com', '07326643e8b5159bb3e999c3a72bf266', '4b884714fc54dc34282c12527ba873a8'),
(17, 'Charie', '201911380@gordoncollege.edu.ph', '65079b006e85a7e798abecb99e47c154', '07b9fda79415d97307dec22be24592fc'),
(23, 'Leng', 'charieignacio3@gmail.com', '986ad406285ab7bea715cf43f57af65f', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
