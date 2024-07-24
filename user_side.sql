-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 12:07 PM
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
-- Database: `user_side`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_name_gojo`
--

CREATE TABLE `user_name_gojo` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_gojo`
--

INSERT INTO `user_name_gojo` (`id`, `name`, `image`, `price`) VALUES
(1, 'Iconic Rocking Horse', 'img_ecommerce27.jpg', '169'),
(2, 'sweeper and funnel', 'img_ecommerce02.jpg', '280'),
(3, 'Beoplay A1', 'img_ecommerce21.jpg', '199'),
(4, 'Langue Stack Chair', 'img_ecommerce28.jpg', '272'),
(5, 'Laundry Baskets', 'img_ecommerce30.jpg', '452');

-- --------------------------------------------------------

--
-- Table structure for table `user_name_megumi`
--

CREATE TABLE `user_name_megumi` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_megumi`
--

INSERT INTO `user_name_megumi` (`id`, `name`, `image`, `price`) VALUES
(1, 'Arctander Chair', 'img_ecommerce20.jpg', '250');

-- --------------------------------------------------------

--
-- Table structure for table `user_name_sukuna`
--

CREATE TABLE `user_name_sukuna` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_name_gojo`
--
ALTER TABLE `user_name_gojo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_megumi`
--
ALTER TABLE `user_name_megumi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_sukuna`
--
ALTER TABLE `user_name_sukuna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_name_gojo`
--
ALTER TABLE `user_name_gojo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_name_megumi`
--
ALTER TABLE `user_name_megumi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_name_sukuna`
--
ALTER TABLE `user_name_sukuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
