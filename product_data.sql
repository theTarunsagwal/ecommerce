-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 08:14 PM
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
-- Database: `product_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(0, 'other'),
(1, 'men'),
(2, 'women'),
(3, 'furniture'),
(4, 'shoes'),
(5, 'watch'),
(6, 'light');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `img` varchar(600) NOT NULL,
  `brand_name` int(11) DEFAULT 0,
  `about` varchar(225) DEFAULT 'product',
  `category` int(11) DEFAULT 0,
  `wish` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `brand_name`, `about`, `category`, `wish`) VALUES
(2, 'sweeper and funnel', '280', 'img_ecommerce02.jpg', 0, 'product', 0, 2),
(3, 'mini lamp', '156', 'img_ecommerce03.jpg', 1, 'product', 0, NULL),
(4, 'product', '201', 'img_ecommerce37.jpg', 5, 'product', 0, NULL),
(5, 'table', '399', 'img_ecommerce12.jpg', 6, 'product', 0, NULL),
(6, 'sofas', '869', 'img_ecommerce13.jpg', 9, 'product', 0, NULL),
(7, 'pilo', '745', 'img_ecommerce14.jpg', 4, 'product', 0, NULL),
(8, 'storm jug', '199', 'img_ecommerce39.jpg', 10, 'product', 0, NULL),
(9, 'storm small jug', '154', 'img_ecommerce38.jpg', 7, 'product', 0, NULL),
(10, 'victo pedant lamp', '321', 'img_ecommerce40.jpg', 2, 'product', 0, NULL),
(19, 'furniture', '741', 'img_ecommerce15.jpg', 2, '441', 3, NULL),
(20, 'men', '200', 'gallery-04.jpg', 5, 'product', 1, NULL),
(21, 'watch', '102', 'img_ecommerce17.jpg', 2, 'product', 0, NULL),
(22, 'women', '100', 'product-04.jpg', 9, 'product', 2, NULL),
(23, 'Classic Trench Coat', '300', 'product-04.jpg', 6, 'product', 2, NULL),
(24, 'blue shrit', '302', 'product-03.jpg', 7, 'men choice', 1, NULL),
(25, 'whit shirt', '520', 'product-01.jpg', 7, 'simple ', 2, NULL),
(26, 'Arctander light', '201', 'img_ecommerce19.jpg', 10, 'table  light', 6, NULL),
(27, 'classic watch', '199', 'img_ecommerce18.jpg', 7, 'one fram watch ', 5, NULL),
(28, 'adidas shoes', '456', 'shoes.jpg', 2, 'this iconic shoes', 4, NULL),
(29, 'Herschel supply', '799', 'product-02.jpg', 4, 'best combination ', 2, NULL);

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
-- Table structure for table `relative_img`
--

CREATE TABLE `relative_img` (
  `id_img` int(11) DEFAULT NULL,
  `img1` varchar(225) DEFAULT NULL,
  `img2` varchar(225) DEFAULT NULL,
  `img3` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relative_img`
--

INSERT INTO `relative_img` (`id_img`, `img1`, `img2`, `img3`) VALUES
(9, 'img_ecommerce02.jpg', 'img_ecommerce02.jpg', 'img_ecommerce07.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wish_product`
--

CREATE TABLE `wish_product` (
  `wish_id` int(11) NOT NULL,
  `wish_product` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_product`
--

INSERT INTO `wish_product` (`wish_id`, `wish_product`) VALUES
(2, 'sweeper and funnel'),
(23, 'Classic Trench Coat'),
(29, 'Herschel supply');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `product_brand` (`brand_name`),
  ADD KEY `category` (`category`),
  ADD KEY `fk_wish` (`wish`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `relative_img`
--
ALTER TABLE `relative_img`
  ADD KEY `id_img` (`id_img`);

--
-- Indexes for table `wish_product`
--
ALTER TABLE `wish_product`
  ADD PRIMARY KEY (`wish_id`),
  ADD UNIQUE KEY `wish_id` (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_wish` FOREIGN KEY (`wish`) REFERENCES `wish_product` (`wish_id`),
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`brand_name`) REFERENCES `product_brand` (`p_id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `relative_img`
--
ALTER TABLE `relative_img`
  ADD CONSTRAINT `relative_img_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
