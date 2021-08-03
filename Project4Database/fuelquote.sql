-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 06:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
-- Table structure for table `fuelquote`
--

CREATE TABLE `fuelquote` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `areastate` varchar(2) NOT NULL,
  `gallons` int(9) NOT NULL,
  `suggestedprice` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  `daydate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuelquote`
--

INSERT INTO `fuelquote` (`id`, `address`, `areastate`, `gallons`, `suggestedprice`, `totalprice`, `daydate`) VALUES
(2, '5819 Sawmill Bend Ln, Sugar Land TX, 77479', 'TX', 1200, '1.71', '2052', '08/02/2021'),
(2, '5819 Sawmill Bend Ln, Sugar Land TX, 77479', 'TX', 1001, '1.695', '1696.695', '08/17/2021'),
(19, 'Admin Lane, New York NY, 10019', 'NY', 1001, '1.74', '1741.74', '08/01/2021'),
(19, 'Admin Lane, New York NY, 10019', 'NY', 1231, '1.725', '2123.475', '08/17/2021'),
(2, '5819 Sawmill Bend Ln, Sugar Land TX, 77479', 'TX', 1200, '1.695', '2034', '08/01/2021'),
(20, '2412 Bellaire Blvd, Houston OK, 77072', 'OK', 1200, '1.74', '2088', '08/01/2021');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
