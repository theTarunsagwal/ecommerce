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
-- Database: `user_side`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_name_gaurav`
--

CREATE TABLE `user_name_gaurav` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_manoj`
--

CREATE TABLE `user_name_manoj` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_manoj`
--

INSERT INTO `user_name_manoj` (`id`, `name`, `image`, `price`) VALUES
(1, 'tracksuits', 'gray-4.jpg', '405');

-- --------------------------------------------------------

--
-- Table structure for table `user_name_ritik`
--

CREATE TABLE `user_name_ritik` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_ritik`
--

INSERT INTO `user_name_ritik` (`id`, `name`, `image`, `price`) VALUES
(2, 'MASCOMODA Womens ', 'red-2.jpg', '210');

-- --------------------------------------------------------

--
-- Table structure for table `user_name_tarun`
--

CREATE TABLE `user_name_tarun` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_tarun`
--

INSERT INTO `user_name_tarun` (`id`, `name`, `image`, `price`) VALUES
(1, 'MASCOMODA Womens ', 'red-2.jpg', '210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_name_gaurav`
--
ALTER TABLE `user_name_gaurav`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_manoj`
--
ALTER TABLE `user_name_manoj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_ritik`
--
ALTER TABLE `user_name_ritik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_tarun`
--
ALTER TABLE `user_name_tarun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_name_gaurav`
--
ALTER TABLE `user_name_gaurav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_manoj`
--
ALTER TABLE `user_name_manoj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_name_ritik`
--
ALTER TABLE `user_name_ritik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_name_tarun`
--
ALTER TABLE `user_name_tarun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
