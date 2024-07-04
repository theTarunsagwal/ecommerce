-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 04:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Tarun sagwal', 'tarunsagwal38@gmail.com', 'Tarun@123');

-- --------------------------------------------------------

--
-- Table structure for table `contect`
--

CREATE TABLE `contect` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `decor_art`
--

CREATE TABLE `decor_art` (
  `id` int(11) NOT NULL,
  `decor_name` varchar(30) NOT NULL,
  `decor_price` varchar(30) NOT NULL,
  `decor_img` varchar(600) NOT NULL,
  `decor_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decor_art`
--

INSERT INTO `decor_art` (`id`, `decor_name`, `decor_price`, `decor_img`, `decor_about`) VALUES
(3, 'decor art', '200', 'img_ecommerce05.jpg', 'art'),
(4, 'decor', '200', 'img_ecommerce16.jpg', 'art'),
(5, 'Arctander Chair', '250', 'img_ecommerce20.jpg', 'lighiting'),
(6, 'Beoplay A1', '199', 'img_ecommerce21.jpg', 'lighting'),
(7, 'hanging egg chair', '159', 'img_ecommerce23.jpg', 'lighting'),
(8, 'Hubert pendant lamp', '199', 'img_ecommerce25.jpg', 'lighting'),
(9, 'Iconic Rocking Horse', '169', 'img_ecommerce27.jpg', 'chairs'),
(10, 'Langue Stack Chair', '259', 'img_ecommerce28.jpg', 'chairs'),
(11, 'Laundry Baskets', '45', 'img_ecommerce30.jpg', 'chairs'),
(12, 'mini table lamp', '89', 'img_ecommerce32.jpg', 'chairs');

-- --------------------------------------------------------

--
-- Table structure for table `dining_room`
--

CREATE TABLE `dining_room` (
  `id` int(11) NOT NULL,
  `dining_name` varchar(30) NOT NULL,
  `dining_price` varchar(30) NOT NULL,
  `dining_image` varchar(600) NOT NULL,
  `dining_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dining_room`
--

INSERT INTO `dining_room` (`id`, `dining_name`, `dining_price`, `dining_image`, `dining_about`) VALUES
(3, 'dining room', '5200', 'img_ecommerce06.jpg', 'nan'),
(4, 'living room', '250', 'img_ecommerce08.jpg', 'nan'),
(5, 'headboard', '2000', 'img_ecommerce07.jpg', 'nan'),
(6, 'chairs', '3000', 'img_ecommerce15.jpg', 'chair\r\n'),
(7, 'clock', '150', 'img_ecommerce17.jpg', 'nan'),
(8, 'hand clock', '140', 'img_ecommerce18.jpg', 'nan');

-- --------------------------------------------------------

--
-- Table structure for table `new_product`
--

CREATE TABLE `new_product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `img` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_product`
--

INSERT INTO `new_product` (`id`, `name`, `price`, `img`) VALUES
(1, 'sweeper and funnel', '280', 'img_ecommerce02.jpg'),
(2, 'mini table lamp', '89', 'img_ecommerce03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`) VALUES
(1, 'tarun', 'tarunsagwal@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `id` int(11) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(600) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wood`
--

INSERT INTO `wood` (`id`, `image_name`, `price`, `image`, `about`) VALUES
(3, 'bar furniture', '200', 'img_ecommerce04.jpg', 'furniture'),
(4, 'table', '99', 'img_ecommerce12.jpg', 'furniture'),
(5, 'sofa', '199', 'img_ecommerce13.jpg', 'furniture'),
(6, 'pilo', '299', 'img_ecommerce14.jpg', 'furniture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `contect`
--
ALTER TABLE `contect`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `decor_art`
--
ALTER TABLE `decor_art`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dining_room`
--
ALTER TABLE `dining_room`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_product`
--
ALTER TABLE `new_product`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `wood`
--
ALTER TABLE `wood`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contect`
--
ALTER TABLE `contect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `decor_art`
--
ALTER TABLE `decor_art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dining_room`
--
ALTER TABLE `dining_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_product`
--
ALTER TABLE `new_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
