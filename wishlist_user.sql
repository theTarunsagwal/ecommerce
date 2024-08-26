-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 07:49 PM
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
-- Table structure for table `wish_name_gaurav`
--

CREATE TABLE `wish_name_gaurav` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_gaurav`
--

INSERT INTO `wish_name_gaurav` (`id`, `name`, `product_img`, `price`) VALUES
(23, 'Classic Trench Coat', 'product-04.jpg', 300),
(29, 'Herschel supply', 'product-02.jpg', 799);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_manoj`
--

CREATE TABLE `wish_name_manoj` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_manoj`
--

INSERT INTO `wish_name_manoj` (`id`, `name`, `product_img`, `price`) VALUES
(28, 'adidas shoes', 'shoes.jpg', 456),
(23, 'Classic Trench Coat', 'product-04.jpg', 300),
(29, 'Herschel supply', 'product-02.jpg', 799),
(36, 'tracksuits', 'gray-4.jpg', 405);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_ritik`
--

CREATE TABLE `wish_name_ritik` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_ritik`
--

INSERT INTO `wish_name_ritik` (`id`, `name`, `product_img`, `price`) VALUES
(24, 'blue shrit', 'product-03.jpg', 302),
(25, 'whit shirt', 'product-01.jpg', 520),
(28, 'adidas shoes', 'shoes.jpg', 456),
(29, 'Herschel supply', 'product-02.jpg', 799),
(37, 'MASCOMODA Womens ', 'red-2.jpg', 210);

-- --------------------------------------------------------

--
-- Table structure for table `wish_name_tarun`
--

CREATE TABLE `wish_name_tarun` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `product_img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish_name_tarun`
--

INSERT INTO `wish_name_tarun` (`id`, `name`, `product_img`, `price`) VALUES
(35, 'track shot adidas', 'blue-3.jpg', 305);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wish_name_gaurav`
--
ALTER TABLE `wish_name_gaurav`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wish_name_manoj`
--
ALTER TABLE `wish_name_manoj`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wish_name_ritik`
--
ALTER TABLE `wish_name_ritik`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `wish_name_tarun`
--
ALTER TABLE `wish_name_tarun`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
