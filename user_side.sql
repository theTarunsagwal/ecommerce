-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:22 PM
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
-- Database: `user_side`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_name_50`
--

CREATE TABLE `user_name_50` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_51`
--

CREATE TABLE `user_name_51` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_52`
--

CREATE TABLE `user_name_52` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_52`
--

INSERT INTO `user_name_52` (`id`, `name`, `image`, `price`, `qty`, `pr_id`) VALUES
(3, 'tracksuits', 'gray-4.jpg', '405', 1, 36),
(4, 'track shot adidas', 'blue-3.jpg', '305', 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `user_name_53`
--

CREATE TABLE `user_name_53` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_58`
--

CREATE TABLE `user_name_58` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_59`
--

CREATE TABLE `user_name_59` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_60`
--

CREATE TABLE `user_name_60` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `pr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_61`
--

CREATE TABLE `user_name_61` (
  `id` int(11) NOT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_name_50`
--
ALTER TABLE `user_name_50`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_51`
--
ALTER TABLE `user_name_51`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_52`
--
ALTER TABLE `user_name_52`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_53`
--
ALTER TABLE `user_name_53`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_58`
--
ALTER TABLE `user_name_58`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_59`
--
ALTER TABLE `user_name_59`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_60`
--
ALTER TABLE `user_name_60`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_61`
--
ALTER TABLE `user_name_61`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_name_50`
--
ALTER TABLE `user_name_50`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_name_51`
--
ALTER TABLE `user_name_51`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_52`
--
ALTER TABLE `user_name_52`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_name_53`
--
ALTER TABLE `user_name_53`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_name_58`
--
ALTER TABLE `user_name_58`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_59`
--
ALTER TABLE `user_name_59`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_60`
--
ALTER TABLE `user_name_60`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_name_61`
--
ALTER TABLE `user_name_61`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
