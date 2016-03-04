-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2015 at 09:12 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `registrated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `registrated`) VALUES
(1, 'Yosin', 'Hasan', 'yosinhasan@gmail.com', '96e79218965eb72c92a549dd5a330112', '0000-00-00', '2015-09-02'),
(33, 'hello', 'Yosin', 'fdsf@dfsf.ru', 'bbd004ad5c18567e2621e7d122775787', '2015-09-17', '0000-00-00'),
(35, 'yoser', 'Maksim', 'sad@saa.con', 'd79fe262b06d663b4383824a868bede9', '2015-09-17', '0000-00-00'),
(36, 'yosinDev', 'yosinDev', 'yosinhasan2@gmail.com', 'ee1535e02353ffb9a17307b43d96f920', '2015-09-23', '0000-00-00'),
(37, 'Yosi', 'Hasa', 'yosdan@gmail.com', '2b7a1b0865d994f024f029923d09c6eb', '2015-09-16', '2015-09-03'),
(38, 'newuser', 'newuser', 'newuser@newuser.ru', '5f9a0c8d9b18204e19f5b47b7e749f14', '2015-06-08', '2015-09-03'),
(39, 'Yosin', 'Maksim', 'yosinh2asan@gmail.com', '88e39c6f957ab3de4085d943dfaf99ea', '2015-09-14', '2015-09-03'),
(40, 'Yosin', 'Maksim', 'yos22@sdf.ru', '64c0e6e0ec9f2ed77ecc95d7bfc08a23', '2015-09-16', '2015-09-03'),
(41, 'NewNew', 'NewNew', 'yosinhasNewan@gmail.com', '2ea60ef1d22014cd9f6ae9d5f159407f', '2015-09-15', '2015-09-03'),
(42, 'sdfdsfd', 'sdfdsfd', 'yosinhasdfdsfdsan@gmail.com', '82a93ad966b1cc2b7bbba4b33582f3ec', '2015-09-01', '2015-09-03'),
(43, 'yosinhasdfdsfdsan@gmail.c', 'yosinhasdfdsfdsan@gmail.c', 'gdgfdn@gmail.com', '81f906f711f38b5b4c0854e17aa18781', '2015-09-18', '2015-09-03'),
(44, 'newUser', 'newUser', 'new@mail.ru', 'a88c0ffe1aa828e6367a6fd56ccdc04a', '2012-12-12', '2015-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `user_img`
--

CREATE TABLE IF NOT EXISTS `user_img` (
`id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_img`
--

INSERT INTO `user_img` (`id`, `img`, `userId`, `status`) VALUES
(1, '55e7790abe09e.jpg', 1, 1),
(2, '55e77a2703b3e.jpg', 36, 1),
(3, '55e77a9b41cfd.jpg', 37, 1),
(4, '55e80bb0eefd2.jpg', 38, 1),
(5, '55e826fc9d085.jpg', 39, 1),
(6, '55e833fb4cd72.jpg', 41, 1),
(7, '55e834872dec7.jpg', 43, 1),
(8, '55e88d715fae5.jpg', 44, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_img`
--
ALTER TABLE `user_img`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user_img`
--
ALTER TABLE `user_img`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
