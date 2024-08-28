-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 10:43 AM
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
-- Database: `wishlist_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_50`
--

CREATE TABLE `wish_name_50` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_50`
--

INSERT INTO `wish_name_50` (`id`, `name`, `product_img`, `price`) VALUES
(24, 'blue shrit', 'product-03.jpg', 302),
(25, 'whit shirt', 'product-01.jpg', 520),
(28, 'adidas shoes', 'shoes.jpg', 456),
(29, 'Herschel supply', 'product-02.jpg', 799),
(37, 'MASCOMODA Womens ', 'red-2.jpg', 210);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_51`
--

CREATE TABLE `wish_name_51` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_51`
--

INSERT INTO `wish_name_51` (`id`, `name`, `product_img`, `price`) VALUES
(23, 'Classic Trench Coat', 'product-04.jpg', 300),
(29, 'Herschel supply', 'product-02.jpg', 799);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_52`
--

CREATE TABLE `wish_name_52` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_52`
--

INSERT INTO `wish_name_52` (`id`, `name`, `product_img`, `price`) VALUES
(28, 'adidas shoes', 'shoes.jpg', 456),
(23, 'Classic Trench Coat', 'product-04.jpg', 300),
(29, 'Herschel supply', 'product-02.jpg', 799),
(36, 'tracksuits', 'gray-4.jpg', 405);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_53`
--

CREATE TABLE `wish_name_53` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_53`
--

INSERT INTO `wish_name_53` (`id`, `name`, `product_img`, `price`) VALUES
(35, 'track shot adidas', 'blue-3.jpg', 305);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_58`
--

CREATE TABLE `wish_name_58` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wish_name_50`
--
ALTER TABLE `wish_name_50`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `wish_name_51`
--
ALTER TABLE `wish_name_51`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wish_name_52`
--
ALTER TABLE `wish_name_52`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wish_name_53`
--
ALTER TABLE `wish_name_53`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wish_name_58`
--
ALTER TABLE `wish_name_58`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
