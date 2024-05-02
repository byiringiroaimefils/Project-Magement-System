-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 11:16 AM
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
-- Database: `saint_anne`
--

-- --------------------------------------------------------

--
-- Table structure for table `stockin_product`
--

CREATE TABLE `stockin_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_date` date DEFAULT NULL,
  `product_Quantity` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `total_price` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockin_product`
--

INSERT INTO `stockin_product` (`product_id`, `product_name`, `product_date`, `product_Quantity`, `price`, `total_price`) VALUES
(1, 'Sweet Patatos', '2024-04-25', '20kg', '200', '4000FRW'),
(5, '    Rice', '2024-05-02', '25psc', '20000', '500,000 FRW'),
(6, '  Beans', '2024-05-02', '100kg', '50000', '50000 Frw'),
(7, '  Vegetables', '2024-05-02', '50 pc', '500', '25,000 Frw'),
(9, ' Maize', '2024-05-02', '20 pc', '15000', '35,000 Frw'),
(10, '  C0ins', '2024-05-02', '20kg', '5000', '100,000Frw');

-- --------------------------------------------------------

--
-- Table structure for table `stockout_product`
--

CREATE TABLE `stockout_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_date` date DEFAULT NULL,
  `product_Quantity` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockout_product`
--

INSERT INTO `stockout_product` (`product_id`, `product_name`, `product_date`, `product_Quantity`) VALUES
(1, 'Maize', '2024-05-01', '2Kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confPassword` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `confPassword`) VALUES
(1, 'filsprimu', '9088', '9088'),
(2, 'Byiringiro Aime Fils ', '9088', '9088'),
(3, 'John Doe', 'filsprimu', 'filsprimu'),
(4, 'victawalker@gmail.com', '8877', '8877'),
(5, 'victawalker@gmail.com', '8877', '8877'),
(6, 'habaguhirwaramazan@gmail.com', 'fils', 'fils'),
(7, 'kellyjoy223@gmil.com', '222', '222'),
(8, 'Benimana Obed', '9088', '9088');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stockin_product`
--
ALTER TABLE `stockin_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stockout_product`
--
ALTER TABLE `stockout_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stockin_product`
--
ALTER TABLE `stockin_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stockout_product`
--
ALTER TABLE `stockout_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
