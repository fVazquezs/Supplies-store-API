-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 03:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplies`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'arroz'),
(3, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `notes` varchar(200) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `notes`, `date`, `status`) VALUES
(5, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(6, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(7, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(8, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(9, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(10, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(11, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(12, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(13, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(14, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(15, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(16, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(17, 2, 'I\'ll get it by the end of the week', '2019-05-11', 1),
(18, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(19, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(20, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(21, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(22, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(23, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(24, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(25, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(26, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(27, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(29, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(30, 2, 'I\'ll get it by the end of the week', '2019-05-12', 1),
(31, 2, 'I\'ll get it by the end of the week', '2019-05-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`productId`, `orderId`, `quantity`) VALUES
(1, 29, 2),
(1, 30, 2),
(1, 31, 1),
(2, 19, 2),
(2, 20, 2),
(2, 21, 2),
(2, 29, 4),
(2, 30, 4),
(2, 31, 4),
(3, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(150) COLLATE utf8_bin NOT NULL,
  `imgPath` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `imgPath`) VALUES
(1, 'Pencil', 'just a pencil', ''),
(2, 'Pen', 'best pen in the world', ''),
(3, 'borracha', 'faber castel', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `departmentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `departmentId`) VALUES
(2, 'Fernando vazquez', 'fernando@vazquez.com', '', 1),
(4, 'Fernando vaz', 'fernando@vaz.com', '', 1),
(5, 'Fernando', 'fernando@vaz.com', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`productId`,`orderId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentId` (`departmentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `productorder_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
