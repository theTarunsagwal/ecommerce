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
(1, 'Tarun sagwal', 'tarunsagwal38@gmail.com', 'Tarun@123', 1, '2024-10-14 06:04:05');

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
  `roll` int(11) DEFAULT 2,
  `address` text DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `image`, `created_at`, `last_login`, `roll`, `address`, `gender`, `phone`) VALUES
(50, 'ritik', 'ritik@gmail.com', '159874', 'banner-02.jpg', '2024-08-17 07:47:15', '2024-09-07 08:04:35', 2, NULL, NULL, NULL),
(51, 'gaurav', 'gaurav@gmail.com', '125896', 'avatar-01.jpg', '2024-08-19 16:07:35', '2024-10-14 16:37:59', 2, NULL, NULL, NULL),
(52, 'manoj', 'manoj@gmail.com', '000000', 'banner-06.jpg', '2024-08-20 04:18:33', '2024-10-17 15:40:17', 2, '[{\"fname\":\"manoj\",\"lname\":\"tiwari\",\"address\":\"palla no 1 vedram colony\",\"address2\":\"Apartment 1\",\"city\":\"Mountain View\",\"state\":\"melbon\",\"zip_code\":\"96969\",\"country\":\"haryana\",\"phone\":\"989568200\"},{\"fname\":\"manoj\",\"lname\":\"tiwari\",\"address\":\"palla no 1 vedram colony\",\"address2\":\"Apartment 1\",\"city\":\"palla\",\"state\":\"fbd\",\"zip_code\":\"110012\",\"country\":\"england\",\"phone\":\"9891125996\"}]', NULL, NULL),
(53, 'tarun', 'tarun@gmail.com', '125478', 'face1.jpg', '2024-08-26 16:09:33', '2024-10-14 16:38:02', 2, NULL, 'Male', 2147483647),
(58, 'shail', 'shail@gmail.com', '1236985', 'product-11.jpg', '2024-08-28 07:30:54', '2024-10-14 16:37:54', 2, NULL, NULL, NULL),
(59, 'aman', 'megumi35guro@gmail.com', '123000', '01.jpg', '2024-09-01 16:58:15', '2024-10-14 16:18:31', 2, NULL, NULL, NULL),
(60, 'tarunsagwal', 'tarunsagwal38@gmail.com', '123698', 'face2.jpg', '2024-09-08 16:15:25', '2024-09-08 16:15:39', 2, NULL, NULL, NULL),
(61, 'uzair', 'arduwaan@gmail.com', '12304', '789.jpeg', '2024-10-14 05:59:13', '2024-10-14 05:59:25', 2, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
