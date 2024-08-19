-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 06:38 PM
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
(1, 'Tarun sagwal', 'tarunsagwal38@gmail.com', 'Tarun@123', 1, '2024-08-17 07:02:16');

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
(29, 'megumi', 'megumi35guro@gmail.com', '123456', 'face2.jpg', '2024-08-05 16:36:44', '2024-08-19 15:14:09', 2),
(30, 'sukuna', 'sukuna11@gmail.com', '1236980', 'face.jpg', '2024-07-31 16:36:44', '2024-08-11 03:03:11', 2),
(37, 'Shahid', 'sahhid@gmail.com', '123045', 'img_ecommerce07.jpg', '2024-08-05 16:36:44', '2024-08-05 16:36:44', 2),
(41, 'gojo', 'gojo@gmail.com', '1236987', 'face1.jpg', '2024-06-19 16:36:44', '2024-08-30 03:01:56', 2),
(43, 'sahil', 'sahil@gmail.com', '147856', 'img_ecommerce06.jpg', '2024-07-26 16:48:36', '2024-08-11 03:03:33', 2),
(44, 'sourav', 'sourav@gmail.com', '1236547', '01.jpg', '2024-03-20 02:50:00', '2024-08-11 03:02:31', 2),
(45, 'souravjha', 'souravjha@gmail.com', '10230', '01.jpg', '2024-08-11 03:18:07', '2024-08-11 03:18:07', 2),
(50, 'ritik', 'ritik@gmail.com', '159874', 'banner-02.jpg', '2024-08-17 07:47:15', '2024-08-19 15:14:56', 2),
(51, 'gaurav', 'gaurav@gmail.com', '125896', 'avatar-01.jpg', '2024-08-19 16:07:35', '2024-08-19 16:07:50', 2);

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
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`) USING BTREE;

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `fk_roll` FOREIGN KEY (`roll`) REFERENCES `department` (`dep_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
