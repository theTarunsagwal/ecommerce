-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 06:58 PM
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
-- Table structure for table `user_name_sahil`
--

CREATE TABLE `user_name_sahil` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_name_shahid`
--

CREATE TABLE `user_name_shahid` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name_shahid`
--

INSERT INTO `user_name_shahid` (`id`, `name`, `image`, `price`) VALUES
(1, 'Langue Stack Chair', 'img_ecommerce28.jpg', '272');

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
-- Indexes for table `user_name_sahil`
--
ALTER TABLE `user_name_sahil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_name_shahid`
--
ALTER TABLE `user_name_shahid`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_megumi`
--
ALTER TABLE `user_name_megumi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_name_sahil`
--
ALTER TABLE `user_name_sahil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_name_shahid`
--
ALTER TABLE `user_name_shahid`
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
