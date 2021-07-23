-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 10:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user-verification`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `areastate` varchar(2) NOT NULL,
  `zipcode` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `address`, `address2`, `city`, `areastate`, `zipcode`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', 0),
(2, 'adminbryan', 'tieubryan1@gmail.com', '63807f82b48db5d467d524d8cf30d685', 'Bryan Tieu', '5819 Sawmill Bend Ln', 'Apt 7162', 'Sugar Land', 'TX', 77479),
(14, 'Sarah1234', 'sarahG@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', ' Sarah Goodwill', '2412 Bellaire Blvd', 'Apt. 1232', 'Houston', 'TX', 77072);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
