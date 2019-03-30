-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2019 at 09:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `hashs`
--

CREATE TABLE `hashs` (
  `id` int(11) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `sid` varchar(1000) NOT NULL,
  `uploadtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duplicate` int(12) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashs`
--

INSERT INTO `hashs` (`id`, `filename`, `uid`, `hash`, `sid`, `uploadtime`, `duplicate`) VALUES
(2, 'paper-dashboard-master.zip', 9, 'a10909c2cdcaf5adb7e6b092a4faba558b62bd96', '1iOnckisPLHWXT4ediUSfkAweM4o2xYKC', '2019-03-30 20:31:02', 0),
(5, 'paper-dashboard-master.zip', 9, 'a10909c2cdcaf5adb7e6b092a4faba558b62bd96', '1iOnckisPLHWXT4ediUSfkAweM4o2xYKC', '2019-03-30 20:35:09', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hashs`
--
ALTER TABLE `hashs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hashs`
--
ALTER TABLE `hashs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
