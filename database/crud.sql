-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(11) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pcategory` varchar(255) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`id`, `pimage`, `pname`, `pcategory`, `pprice`, `createdat`) VALUES
(6, 'na2.avif', 'stelth classic3', 'Sports Watch', 7000.00, '2025-09-10 14:28:30'),
(9, 'bs1.jpg', 'Modern Chronograph', 'Sports Watch', 3299.00, '2025-09-15 09:24:35'),
(10, 'na1.avif', 'Luxury Automatic', 'Dress Watch', 4199.00, '2025-09-15 09:25:10'),
(11, 'na3.avif', 'Professional Diver', 'Diving Watch', 5499.00, '2025-09-15 09:25:29'),
(12, 'fp2.avif', 'Classic Chronograph', 'Dress Watch', 10099.00, '2025-10-03 05:23:09'),
(13, 'ps1.jpg', 'Sport Diver', 'Diving Watch', 3999.00, '2025-09-15 09:26:05'),
(14, 'fp3.avif', 'Elegant Automatic3', 'Dress Watch', 9999.00, '2025-09-21 15:53:29'),
(15, 'bs2.jpg', 'Classic Automatic', 'Dress Watch', 2999.00, '2025-09-15 09:26:36'),
(16, 'fp1.avif', 'Sport Chronograph', 'Sports Watch', 3799.00, '2025-09-15 09:26:55'),
(17, 'bs3.jpg', 'Luxury Diver-m', 'Diving Watch', 4299.00, '2025-09-24 13:06:13'),
(20, 'featured-product1.avif', 'Classic Heritage', 'Dress Watch', 2499.00, '2025-09-30 14:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `product_name`, `price`, `address`, `mobile`, `order_date`) VALUES
(1, 'test', 'Classic Heritage', 2499.00, 'ADEBEUHBDHUIHUA', '6382825422', '2025-09-24 19:30:18'),
(2, 'viswa', 'Sport Chronograph', 3799.00, 'aodnjadnjadnjanasaasasas', '6382825422', '2025-09-24 19:32:23'),
(3, 'viswa', 'Elegant Automatic3', 9999.00, 'paris corner', '6382825422', '2025-09-24 19:52:46'),
(4, 'Puratchi', 'stelth classic3', 7000.00, '2/520 lake avenue road,bank colony', '8245285122', '2025-09-25 19:41:56'),
(5, 'Ramakrishnan', 'Luxury Diver-m', 4299.00, 'ram@gmail.com', '1234123412', '2025-09-30 19:26:05'),
(6, 'nb ', 'Luxury Diver-m', 4299.00, '123 lake ajjohuou', '8248500502', '2025-10-10 18:32:27'),
(7, 'test user', 'Luxury Diver-m', 4299.00, 'Chennai', '1234123412', '2025-10-22 19:52:25'),
(8, 'SAV VVD', 'Luxury Diver-m', 4299.00, 'd xbhdghv', '1234123412', '2025-10-22 19:54:06'),
(9, 'test', 'Luxury Diver-m', 4299.00, 'tested', '5554554555', '2025-10-23 12:38:36'),
(10, 'viswa', 'Classic Heritage', 2499.00, 'bihar', '7894561355', '2025-10-23 12:46:35'),
(11, 'Puratchi', 'Luxury Diver-m', 4299.00, 'chennai', '8248556625', '2025-10-23 12:48:35'),
(12, 'nb ', 'Luxury Diver-m', 4299.00, 'bjsbjf', '4564564561', '2025-10-23 12:59:20'),
(13, 'viswa', 'Elegant Automatic3', 9999.00, 'paris', '7897894561', '2025-10-23 13:00:56'),
(14, 'arsad', 'Classic Automatic', 2999.00, 'p[ark ', '1234567895', '2025-10-23 17:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `fullname`, `email`, `message`) VALUES
(46, 'test', 'test@gmail.com', 'test'),
(49, 'test', 'ruyn@gmail.com', 'SF d DC'),
(50, 'nb ', 'viswa@gmail.com', 'dc '),
(51, 'viswa', 'ruyn@gmail.com', 'waiting for the upcoming series'),
(52, ' juawdesfkjiojknc', 'aorewmlksd@gmail.com', 'erlngf slkerwalk snd uawh hawuihsf asiudfh asdfh asdiuf asdfiuh asdfhu sdhfij asduifh sludfjsa difu'),
(53, 'nithis', 'nithis@gmail.com', 'hi im nithis'),
(54, 'Testing', 'rlrwcerm@gmail.com', 'mxmglskd sdfjkjsdlf sdfojalkdf wfjdfkllkdf sdfkljlkdf asdlkjfd'),
(55, 'viswa', 'puratchi1541@gmail.com', 'yfyyyy'),
(56, 'viswa', 'puratchi1541@gmail.com', 'jkjhgg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@luxtime.com', '0192023a7bbd73250516f069df18b500', 'superadmin'),
(2, 'John Doe', 'john@example.com', '6ad14ba9986e3615423dfca256d04e3f', 'user'),
(3, 'Jane Smith', 'jane@example.com', '6ad14ba9986e3615423dfca256d04e3f', 'user'),
(4, 'Alex Brown', 'alex@example.com', '6ad14ba9986e3615423dfca256d04e3f', 'user'),
(5, 'test', 'Puratchi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(7, 'viswa', 'viswa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(8, 'Puratchi', 'puratchi1541@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(9, 'puratchi', 'mm@gmail.com', 'b7bc2a2f5bb6d521e64c8974c143e9a0', 'admin'),
(10, 'Prabha', 'prabha@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user'),
(11, 'jk', 'jk@gmail.com', '7b66c99af372c2d744c6011a47ce22bb', 'admin'),
(12, 'jd', 'jd@gmail.com', 'd964173dc44da83eeafa3aebbee9a1a0', 'user'),
(13, 'tester', 'tester@gmail.com', 'ebaa5e41bfc12f9f329cfcbc66639f68', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
