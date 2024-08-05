-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 06:57 PM
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
-- Table structure for table `art_item`
--

CREATE TABLE `art_item` (
  `art_id` int(11) NOT NULL,
  `art_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_item`
--

INSERT INTO `art_item` (`art_id`, `art_name`) VALUES
(1, 'art'),
(2, 'shoses');

-- --------------------------------------------------------

--
-- Table structure for table `contect`
--

CREATE TABLE `contect` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contect`
--

INSERT INTO `contect` (`id`, `name`, `email`, `message`) VALUES
(1, 'tarun', 'tarunsagwal38@gmail.com', 'hii'),
(2, 'tarun', 'tarunsagwal38@gmail.com', 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `decor_art`
--

CREATE TABLE `decor_art` (
  `id` int(11) NOT NULL,
  `decor_name` varchar(30) NOT NULL,
  `decor_price` varchar(30) NOT NULL,
  `decor_img` varchar(600) NOT NULL,
  `decor_about` text NOT NULL,
  `decor_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decor_art`
--

INSERT INTO `decor_art` (`id`, `decor_name`, `decor_price`, `decor_img`, `decor_about`, `decor_item`) VALUES
(3, 'decor art', '320', 'img_ecommerce05.jpg', 'art', 1),
(4, 'decor', '200', 'img_ecommerce16.jpg', 'art', 2),
(5, 'Arctander Chair', '250', 'img_ecommerce20.jpg', 'lighiting', NULL),
(6, 'Beoplay A1', '199', 'img_ecommerce21.jpg', 'lighting', NULL),
(7, 'hanging egg chair', '159', 'img_ecommerce23.jpg', 'lighting', NULL),
(8, 'Hubert pendant lamp', '199', 'img_ecommerce25.jpg', 'lighting', NULL),
(9, 'Iconic Rocking Horse', '169', 'img_ecommerce27.jpg', 'chairs', NULL),
(10, 'Langue Stack Chair', '272', 'img_ecommerce28.jpg', 'chairs', NULL),
(11, 'Laundry Baskets', '452', 'img_ecommerce30.jpg', 'chairs', NULL),
(12, 'mini table lamp', '890', 'img_ecommerce32.jpg', 'chairs', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dining_products`
--

CREATE TABLE `dining_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dining_products`
--

INSERT INTO `dining_products` (`product_id`, `product_name`) VALUES
(3, 'cloth'),
(8, 'table');

-- --------------------------------------------------------

--
-- Table structure for table `dining_room`
--

CREATE TABLE `dining_room` (
  `id` int(11) NOT NULL,
  `dining_name` varchar(30) NOT NULL,
  `dining_price` varchar(30) NOT NULL,
  `dining_image` varchar(600) NOT NULL,
  `dining_about` text NOT NULL,
  `dining_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dining_room`
--

INSERT INTO `dining_room` (`id`, `dining_name`, `dining_price`, `dining_image`, `dining_about`, `dining_product`) VALUES
(3, 'dining room', '5200', 'img_ecommerce06.jpg', 'nan', 3),
(4, 'living room', '541', 'img_ecommerce08.jpg', 'nan', 3),
(5, 'headboard', '2000', 'img_ecommerce07.jpg', 'nan', 8),
(6, 'sofa', '3000', 'img_ecommerce15.jpg', 'chair\r\n', 8),
(7, 'clock', '155', 'img_ecommerce17.jpg', 'nan', 8),
(8, 'hand clock', '140', 'img_ecommerce18.jpg', 'nan', 8);

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
(2, 'mini lamp', '156', 'img_ecommerce03.jpg'),
(3, 'product', '201', 'img_ecommerce37.jpg'),
(4, 'table', '399', 'img_ecommerce12.jpg'),
(5, 'sofas', '869', 'img_ecommerce13.jpg'),
(6, 'pilo', '745', 'img_ecommerce14.jpg'),
(7, 'storm jug', '199', 'img_ecommerce39.jpg'),
(8, 'storm small jug', '154', 'img_ecommerce38.jpg'),
(9, 'victo pedant lamp', '321', 'img_ecommerce40.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `image`, `created_at`, `last_login`) VALUES
(1, 'tarun', 'tarunsagwal@gmail.com', '12345', NULL, '2024-08-05 16:36:44', '2024-08-05 16:36:44'),
(29, 'megumi', 'megumi35guro@gmail.com', '123456', 'face2.jpg', '2024-08-05 16:36:44', '2024-08-05 16:49:57'),
(30, 'sukuna', 'sukuna11@gmail.com', '1236980', 'face.jpg', '2024-08-05 16:36:44', '2024-08-05 16:36:44'),
(37, 'Shahid', 'sahhid@gmail.com', '123045', 'img_ecommerce07.jpg', '2024-08-05 16:36:44', '2024-08-05 16:36:44'),
(41, 'gojo', 'gojo@gmail.com', '1236987', 'face1.jpg', '2024-08-05 16:36:44', '2024-08-05 16:36:44'),
(43, 'sahil', 'sahil@gmail.com', '147856', 'img_ecommerce06.jpg', '2024-08-05 16:48:36', '2024-08-05 16:49:19');

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
(3, 'bar furniture', '500', 'img_ecommerce04.jpg', 'furniture'),
(7, 'bar furnitures', '337', 'img_ecommerce36.jpg', 'Furniture');

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
-- Indexes for table `art_item`
--
ALTER TABLE `art_item`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `contect`
--
ALTER TABLE `contect`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `decor_art`
--
ALTER TABLE `decor_art`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `decor_item` (`decor_item`);

--
-- Indexes for table `dining_products`
--
ALTER TABLE `dining_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `dining_room`
--
ALTER TABLE `dining_room`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_dining_product` (`dining_product`);

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
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `decor_art`
--
ALTER TABLE `decor_art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dining_room`
--
ALTER TABLE `dining_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_product`
--
ALTER TABLE `new_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `decor_art`
--
ALTER TABLE `decor_art`
  ADD CONSTRAINT `decor_item` FOREIGN KEY (`decor_item`) REFERENCES `art_item` (`art_id`);

--
-- Constraints for table `dining_room`
--
ALTER TABLE `dining_room`
  ADD CONSTRAINT `fk_dining_product` FOREIGN KEY (`dining_product`) REFERENCES `dining_products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
