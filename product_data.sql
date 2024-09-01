-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 08:09 PM
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
(6, 'light'),
(7, 'Phone');

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
  `rating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `brand_name`, `about`, `category`, `rating`) VALUES
(2, 'sweeper and funnel', '280', 'img_ecommerce02.jpg', 0, 'product', 0, 0),
(3, 'mini lamp', '156', 'img_ecommerce03.jpg', 1, 'product', 0, 0),
(4, 'product', '201', 'img_ecommerce37.jpg', 5, 'product', 0, 0),
(5, 'table', '399', 'img_ecommerce12.jpg', 6, 'product', 0, 0),
(6, 'sofas', '869', 'img_ecommerce13.jpg', 9, 'product', 0, 0),
(7, 'pilo', '745', 'img_ecommerce14.jpg', 4, 'product', 0, 0),
(8, 'storm jug', '199', 'img_ecommerce39.jpg', 10, 'product', 0, 0),
(9, 'storm small jug', '154', 'img_ecommerce38.jpg', 7, 'product', 0, 0),
(10, 'victo pedant lamp', '321', 'img_ecommerce40.jpg', 2, 'product', 0, 0),
(19, 'furniture', '741', 'img_ecommerce15.jpg', 2, '441', 3, 0),
(20, 'men', '200', 'gallery-04.jpg', 5, 'product', 1, 0),
(21, 'watch', '102', 'img_ecommerce17.jpg', 2, 'product', 0, 0),
(22, 'women', '100', 'product-04.jpg', 9, 'product', 2, 0),
(23, 'Classic Trench Coat', '300', 'product-04.jpg', 6, 'product', 2, 0),
(24, 'blue shrit', '302', 'product-03.jpg', 7, 'men choice', 1, 0),
(25, 'whit shirt', '520', 'product-01.jpg', 7, 'simple ', 2, 0),
(26, 'Arctander light', '201', 'img_ecommerce19.jpg', 10, 'table  light', 6, 0),
(27, 'classic watch', '199', 'img_ecommerce18.jpg', 7, 'one fram watch ', 5, 0),
(28, 'adidas shoes', '456', 'shoes.jpg', 2, 'this iconic shoes', 4, 0),
(29, 'Herschel supply', '799', 'product-02.jpg', 4, 'best combination ', 2, 0),
(34, 'Apple IOS 16', '703', 'apple 2.jpg', 11, 'Vibrant 6.1-inch Super Retina XDR display with OLED technology. Action mode for smooth, steady, handheld videos.', 7, 0),
(35, 'track shot adidas', '305', 'blue-3.jpg', 2, 'Nothing says sporty versatility like adidas track jackets. Bursting with proud 3-Stripes heritage, adidas track coats are the best in the world by a long shot.', 2, 0),
(36, 'tracksuits', '405', 'gray-4.jpg', 1, 'Gear up for track season with adidas track and field gear for Men and Women. See the latesty adizero track spikes and shoes on adidas.com today.', 2, 0),
(37, 'MASCOMODA Womens ', '210', 'red-2.jpg', 4, 'Lounge sets for women 2 piece,womens jogger set,two piece loungewear sets for women', 2, 0);

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
(4, 'HM'),
(5, 'LouisVuitton'),
(6, 'Zara'),
(7, 'uniqlo'),
(8, 'Levis'),
(9, 'chanel'),
(10, 'ralph lauren'),
(11, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `user_email` varchar(30) NOT NULL,
  `pr_name` varchar(30) DEFAULT NULL,
  `comment_box` text DEFAULT 'this productare give nice Exprince'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `rating`, `user_email`, `pr_name`, `comment_box`) VALUES
(1, 35, 3, 'ritik@gmail.com', 'track shot adidas', 'this productare give nice Exprince'),
(5, 36, 3, 'ritik@gmail.com', 'tracksuits', 'this productare give nice Exprince'),
(31, 35, 4, 'manoj@gmail.com', 'track shot adidas', 'i dont see this type of product'),
(33, 37, 4, 'ritik@gmail.com', 'MASCOMODA Womens ', 'nice product and comfortable'),
(35, 36, 4, 'manoj@gmail.com', 'tracksuits', 'awossem'),
(41, 37, 4, 'tarun@gmail.com', 'MASCOMODA Womens ', 'product real good'),
(42, 36, 4, 'tarun@gmail.com', 'tracksuits', ' i don\'t see this type product');

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
(9, 'img_ecommerce02.jpg', 'img_ecommerce02.jpg', 'img_ecommerce07.jpg'),
(10, 'img1', 'img2', 'img3'),
(34, 'apple 1.jpg', 'apple 3.jpg', 'apple 4.jpg'),
(35, 'blue-1.jpg', 'blue-2.jpg', 'blue-4.jpg'),
(36, 'gray-2.jpg', 'gray-1.jpg', 'gray-3.jpg'),
(37, 'red-1.jpg', 'red-3.jpg', 'red-4.jpg');

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
  ADD KEY `category` (`category`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `relative_img`
--
ALTER TABLE `relative_img`
  ADD KEY `id_img` (`id_img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`brand_name`) REFERENCES `product_brand` (`p_id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `relative_img`
--
ALTER TABLE `relative_img`
  ADD CONSTRAINT `relative_img_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
