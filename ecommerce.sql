-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 09:48 AM
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
  `password` varchar(30) NOT NULL,
  `department` int(11) DEFAULT 1,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `department`, `last_login`) VALUES
(1, 'Tarun sagwal', 'tarunsagwal38@gmail.com', 'Tarun@123', 1, '2024-08-12 03:45:04');

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
  `brand_name` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decor_art`
--

INSERT INTO `decor_art` (`id`, `decor_name`, `decor_price`, `decor_img`, `decor_about`, `brand_name`) VALUES
(3, 'decor art', '320', 'img_ecommerce05.jpg', 'art', 0),
(4, 'decor', '200', 'img_ecommerce16.jpg', 'art', 0),
(5, 'Arctander Chair', '250', 'img_ecommerce20.jpg', 'lighiting', 0),
(6, 'Beoplay A1', '199', 'img_ecommerce21.jpg', 'lighting', 0),
(7, 'hanging egg chair', '159', 'img_ecommerce23.jpg', 'lighting', 0),
(8, 'Hubert pendant lamp', '199', 'img_ecommerce25.jpg', 'lighting', 0),
(9, 'Iconic Rocking Horse', '169', 'img_ecommerce27.jpg', 'chairs', 0),
(10, 'Langue Stack Chair', '272', 'img_ecommerce28.jpg', 'chairs', 0),
(11, 'Laundry Baskets', '452', 'img_ecommerce30.jpg', 'chairs', 0),
(12, 'mini table lamp', '890', 'img_ecommerce32.jpg', 'chairs', 0),
(22, 'test', '200', 'banner-05.jpg', 'test the product', 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'manger');

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
  `brand_names` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dining_room`
--

INSERT INTO `dining_room` (`id`, `dining_name`, `dining_price`, `dining_image`, `dining_about`, `brand_names`) VALUES
(3, 'dining room', '5200', 'img_ecommerce06.jpg', 'nan', 0),
(4, 'living room', '541', 'img_ecommerce08.jpg', 'nan', 0),
(5, 'headboard', '2000', 'img_ecommerce07.jpg', 'nan', 0),
(6, 'sofa', '3000', 'img_ecommerce15.jpg', 'chair\r\n', 0),
(7, 'clock', '155', 'img_ecommerce17.jpg', 'nan', 0),
(8, 'hand clock', '140', 'img_ecommerce18.jpg', 'nan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_product`
--

CREATE TABLE `new_product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `img` varchar(600) NOT NULL,
  `brand_name_n` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_product`
--

INSERT INTO `new_product` (`id`, `name`, `price`, `img`, `brand_name_n`) VALUES
(1, 'sweeper and funnel', '280', 'img_ecommerce02.jpg', 0),
(2, 'mini lamp', '156', 'img_ecommerce03.jpg', 0),
(3, 'product', '201', 'img_ecommerce37.jpg', 0),
(4, 'table', '399', 'img_ecommerce12.jpg', 0),
(5, 'sofas', '869', 'img_ecommerce13.jpg', 0),
(6, 'pilo', '745', 'img_ecommerce14.jpg', 0),
(7, 'storm jug', '199', 'img_ecommerce39.jpg', 0),
(8, 'storm small jug', '154', 'img_ecommerce38.jpg', 0),
(9, 'victo pedant lamp', '321', 'img_ecommerce40.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`p_id`, `p_name`) VALUES
(0, 'brand'),
(1, 'nike'),
(2, 'Adidas'),
(3, 'Gucci'),
(4, 'H&M'),
(5, 'Louis Vuitton'),
(6, 'Zara'),
(7, 'uniqlo'),
(8, 'Levis'),
(9, 'chanel'),
(10, 'ralph lauren');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `img_id` int(11) DEFAULT NULL,
  `img1` text DEFAULT NULL,
  `img2` text DEFAULT NULL,
  `img3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `roll` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `image`, `created_at`, `last_login`, `roll`) VALUES
(1, 'tarun', 'tarunsagwal@gmail.com', '12345', NULL, '2024-07-09 16:36:44', '2024-08-01 03:01:27', 2),
(29, 'megumi', 'megumi35guro@gmail.com', '123456', 'face2.jpg', '2024-08-05 16:36:44', '2024-08-10 14:06:42', 2),
(30, 'sukuna', 'sukuna11@gmail.com', '1236980', 'face.jpg', '2024-07-31 16:36:44', '2024-08-11 03:03:11', 2),
(37, 'Shahid', 'sahhid@gmail.com', '123045', 'img_ecommerce07.jpg', '2024-08-05 16:36:44', '2024-08-05 16:36:44', 2),
(41, 'gojo', 'gojo@gmail.com', '1236987', 'face1.jpg', '2024-06-19 16:36:44', '2024-08-30 03:01:56', 2),
(43, 'sahil', 'sahil@gmail.com', '147856', 'img_ecommerce06.jpg', '2024-07-26 16:48:36', '2024-08-11 03:03:33', 2),
(44, 'sourav', 'sourav@gmail.com', '1236547', '01.jpg', '2024-03-20 02:50:00', '2024-08-11 03:02:31', 2),
(45, 'souravjha', 'souravjha@gmail.com', '10230', '01.jpg', '2024-08-11 03:18:07', '2024-08-11 03:18:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `id` int(11) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(600) NOT NULL,
  `about` text NOT NULL,
  `brand_names_w` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wood`
--

INSERT INTO `wood` (`id`, `image_name`, `price`, `image`, `about`, `brand_names_w`) VALUES
(3, 'bar furniture', '500', 'img_ecommerce04.jpg', 'furniture', 0),
(7, 'bar furnitures', '337', 'img_ecommerce36.jpg', 'Furniture', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `fk_department` (`department`);

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
  ADD KEY `fk_brand_name` (`brand_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`) USING BTREE;

--
-- Indexes for table `dining_room`
--
ALTER TABLE `dining_room`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_brand_names` (`brand_names`);

--
-- Indexes for table `new_product`
--
ALTER TABLE `new_product`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_brand_name_n` (`brand_name_n`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_roll` (`roll`);

--
-- Indexes for table `wood`
--
ALTER TABLE `wood`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_brand_names_w` (`brand_names_w`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `decor_art`
--
ALTER TABLE `decor_art`
  ADD CONSTRAINT `fk_brand_name` FOREIGN KEY (`brand_name`) REFERENCES `product_brand` (`p_id`);

--
-- Constraints for table `dining_room`
--
ALTER TABLE `dining_room`
  ADD CONSTRAINT `fk_brand_names` FOREIGN KEY (`brand_names`) REFERENCES `product_brand` (`p_id`);

--
-- Constraints for table `new_product`
--
ALTER TABLE `new_product`
  ADD CONSTRAINT `fk_brand_name_n` FOREIGN KEY (`brand_name_n`) REFERENCES `product_brand` (`p_id`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `fk_roll` FOREIGN KEY (`roll`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `wood`
--
ALTER TABLE `wood`
  ADD CONSTRAINT `fk_brand_names_w` FOREIGN KEY (`brand_names_w`) REFERENCES `product_brand` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
