-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 04:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `vmodel` varchar(50) NOT NULL,
  `vnumber` varchar(20) NOT NULL,
  `scapacity` int(10) NOT NULL,
  `rpday` int(20) NOT NULL,
  `agencymail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`vmodel`, `vnumber`, `scapacity`, `rpday`, `agencymail`) VALUES
('23232', '121', 2, 343, 'ujwal'),
('23232', '122', 2, 343, 'ujwal'),
('23232', '123', 2, 343, 'ujwal');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `vnumber` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `days` int(5) NOT NULL,
  `dfrom` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `email`) VALUES
('$2y$10$y9GXg.KyXFmKS9/CEuOGBu7rh/3KGvJUu4I8W2UOGVoYQOjg7Coyy', 'kujwal147@gmail.com'),
('$2y$10$axZj3SGtj5IEriEHWCGdMO3xSlnFyOnsAVKU68ifkZrGztZfxUY3W', 'ujwal'),
('$2y$10$NtKRXvTzPI.VkEnG2tZ6dOgjT4oSCEBDefNgqOl4DRKiqH//K34va', 'ujwal'),
('$2y$10$UL09iTpSTpuLda5PvACvZeHtaGS9NfTut65HID5rrWWJlTkoFBBoq', 'ujwal'),
('$2y$10$Kz/kUG1q5cXqXUSPupale.HwIWT7s44keg.6.bi1OeEU4Sm0Vtqhu', 'ujwal'),
('$2y$10$UuC7sD5DiDRay63wXJatoONwwq3iSYOX1ss2jidtCGJ8.mdL/uyTe', 'ujwal'),
('$2y$10$cmNfD5J1m5sho60.K7qJ6ucb74NORjpwkDpD6c.ZImVNlsvMMO3eW', 'kujwal147@gmail.com'),
('$2y$10$QYAX2kAEGFpItPf4uKPgjelg/RDbUqnxxwLwCFAvXb41inHfgpX96', 'ujwal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `slno` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `agency` tinyint(1) NOT NULL,
  `gstno` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`slno`, `username`, `email`, `phone`, `pass`, `agency`, `gstno`) VALUES
(1, 'asdfd', 'safddas', 0, 'A', 127, 2323232),
(2, 'asdfd', 'qwreqw', 0, '$2y$10$2k.04Yg8OLxCVvrhD9/zd.zpDScIMTZ4AQbWMZiGhrOwl5CqB/MfC', 0, NULL),
(3, 'ujwal', 'kujwal147@gmail.com', 923023, '$2y$10$WI3TkWOiRtK2f1fs1dX.aeaMldji2Y7qRdZHe1gszHFLoamMg/0Ay', 0, 0),
(4, 'ujwal', 'ujwal', 9304500, '$2y$10$KH9kIbm6jUGSwkqszzZlZ.stLkdyHmDvUrvckyY.Jrj5An5UGdUIW', 1, 23232323);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `vnumber` (`vnumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
