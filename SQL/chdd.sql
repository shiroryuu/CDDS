-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2019 at 03:40 PM
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
  `duplicate` int(12) DEFAULT '0',
  `fsize` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashs`
--

INSERT INTO `hashs` (`id`, `filename`, `uid`, `hash`, `sid`, `uploadtime`, `duplicate`, `fsize`) VALUES
(253, 'plupload-3.1.2.zip', 8, '044953ee37485f223c1659023f8d59964743f7ca', '1BooZ-uvl-Q91c9OleefBWJ4eyRtf8ON0', '2019-04-17 13:36:03', 0, 407686),
(254, 'Park.pdf', 8, 'b0962511f413bcd2db976da68f07d7c7c7b5ed20', '1Dz_pQ9hy2f9LF77_7ZrpCPX3fVkEsG8H', '2019-04-17 13:36:06', 0, 60711),
(255, 'TCS_application.pdf', 8, '5cef7de51cff8311aa1da053e9966a0a18bc13e6', '1xJxSW3-vl8exhYlMdjSNrdrHrhZAcqyl', '2019-04-17 13:36:08', 0, 30669),
(256, 'test124', 8, '5cef7de51cff8311aa1da053e9966a0a18bc13e6', '1CaSWPJva7tf_OHorMbk7Uz1uVFXDObZNclb41CXIr1A', '2019-04-17 13:38:09', 0, 30669),
(257, 'conference-template-a4.docx', 8, 'a69553f1aa40a62261993c0f8e0d51bddd21c120', '1bKcTJ7zpfRl8GCGvdR8HX-3mJ2tj_EMc', '2019-04-17 13:38:11', 0, 21195),
(258, 'conference-template-a4.docx', 8, 'fb599cca38a8eb8c2629efae6a9902fee2979ebc', '1b4543X2F1HDJe3-W4zE8MQKZIag0ShSw', '2019-04-17 13:38:13', 0, 30552),
(259, '6.pdf', 8, 'a9127160613690cc7b144d2769ba13509ffec7bf', '1GJErsRh4IxoDJaz3nFAYmviDJcABwjLE', '2019-04-17 13:38:16', 0, 149463),
(260, '2.pdf', 8, '25d16596aabbdd6cdaa9b2e0fc8d0d07e391ecc6', '1no11MYcTF6i2aiJCp7-dRdszurXM-Vyc', '2019-04-17 13:38:18', 0, 137147),
(261, '1T00717.pdf', 8, '69b9d3a54aa523aa2074a840d2cb476beed1a80a', '1_LLzs8PhHo6EdHp9D49vOX9rhGvk9-Zr', '2019-04-17 13:38:25', 0, 8754194),
(262, 'fypbasepaper2018.pdf', 8, 'a71887a1abbca4a6c06cba539a1ac3a254d2e908', '1rTst_ssv6T4QPHN0YUwyDnjKBMBOD-p8', '2019-04-17 13:38:28', 0, 272320),
(263, 'TEST file', 8, '50690d5ffbb1beba1e705f6d6cd6906c65f5cac0', '1TulxfNj6Ugq5nWk0eugGKChtdzyyyEnxD_ygqu0H3lo', '2019-04-17 13:38:30', 0, 21),
(264, 'test folder file', 8, '86a3186f3e167490a5ee9c60580551f6e42e85af', '17lVqar7-U3oqBu_Flv-iqe5ky0roL_g9rZtzSRm5L38', '2019-04-17 13:38:32', 0, 13),
(265, 'TCS_application.pdf', 8, '5cef7de51cff8311aa1da053e9966a0a18bc13e6', '1xJxSW3-vl8exhYlMdjSNrdrHrhZAcqyl', '2019-04-17 13:38:34', 255, 30669),
(266, 'How to get started with Drive', 8, '91cc4ed8bc354284d7a000dd99fd026927985b0a', '0Bwis2aUkcZZoc3RhcnRlcl9maWxl', '2019-04-17 13:38:39', 0, 3017667);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(64) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(8, 'Test123', 'test@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Free');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hashs`
--
ALTER TABLE `hashs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hashs`
--
ALTER TABLE `hashs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
