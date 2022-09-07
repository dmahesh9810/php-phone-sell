-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 03:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `old_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `addlist`
--

CREATE TABLE `addlist` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(255) NOT NULL,
  `ram` int(20) NOT NULL,
  `price` int(50) NOT NULL,
  `fcamera` int(20) NOT NULL,
  `bcamera` int(20) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `locations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addlist`
--

INSERT INTO `addlist` (`id`, `brand`, `model`, `ram`, `price`, `fcamera`, `bcamera`, `image1`, `image2`, `image3`, `discription`, `mobile`, `locations`) VALUES
(13, 'samsung', 'galaxy', 6, 100000, 48, 108, 'gsmarena_001.jpg', '', '', 'asd', 773132973, 'asda'),
(14, 'samsung', 'M02', 2, 50000, 48, 108, '81AQybT5k6L._SX679_.jpg', '', '', 'asd', 773132973, 'asdasd'),
(15, 'samsung', 'note', 6, 65000, 28, 48, 'gsmarena_001.jpg', 'images.jpg', '', 'qwe', 773132333, 'qwe'),
(16, 'samsung', 'M02', 4, 70000, 48, 108, 'images.jpg', 'istockphoto-1299655452-612x612.jpg', 'istockphoto-1303546534-612x612.jpg', 'asd', 773132333, 'asd'),
(17, 'samsung', 'M02', 8, 20000, 25, 48, 'istockphoto-1299655452-612x612.jpg', 'istockphoto-1303546534-612x612.jpg', '', 'asdas', 773132973, 'asdasd'),
(18, 'redmi', 'galaxy', 8, 150000, 48, 108, 'istockphoto-1299655452-612x612.jpg', 'istockphoto-1303546534-612x612.jpg', '', 'asd', 773132333, 'asdsada'),
(19, 'samsung', 'note', 2, 300000, 48, 48, 'Samsung-Galaxy-Z-Fold-4-Flip-4-Available-For-Pre-Orders-Here’s-How-To-Pre-Book-For-How-Much.jpg', '', '', 'asdasd', 773132333, 'asdasd'),
(20, 'samsung', 'M02', 4, 100000, 20, 60, 'samsung-galaxy-s20-1.jpg', '', '', 'asdasd', 773132333, 'asdasd'),
(21, 'iphone', 'pro', 4, 50000, 28, 48, '81AQybT5k6L._SX679_.jpg', '154302-phones-review-iphone-12-pro-review-product-shots-image3-wd487ybwpf.jpg', 'apple-iphone-12-pro-max-1 (1).jpg', 'asdasd', 773132333, 'asdasd'),
(22, 'iphone', 'max', 4, 100000, 12, 12, '154302-phones-review-iphone-12-pro-review-product-shots-image3-wd487ybwpf.jpg', 'apple-iphone-12-pro-max-1 (1).jpg', 'apple-iphone-12-pro-max-1.jpg', 'asdasd', 773132973, 'asdasd'),
(23, 'iphone', 'pro', 8, 50000, 12, 8, 'apple-iphone-12-pro-max-1 (1).jpg', 'apple-iphone-12-pro-max-1.jpg', 'apple-iphone-12-r1.jpg', 'asdasdasd', 773132666, 'asdasd'),
(24, 'iphone', 'max', 6, 600000, 12, 12, '154302-phones-review-iphone-12-pro-review-product-shots-image3-wd487ybwpf.jpg', 'apple-iphone-12-pro-max-1.jpg', 'apple-iphone-12-r1.jpg', 'asdasd', 773132333, 'asdasd'),
(25, 'iphone', 'pro', 6, 600000, 12, 12, 'iphone_14_pro_lgd.jpg', 'new-iphone-features-all-screen-design-99917162.jpg', '', 'asd', 773132333, 'asd'),
(26, 'iphone', 'max', 6, 600005, 12, 12, '154302-phones-review-iphone-12-pro-review-product-shots-image3-wd487ybwpf.jpg', 'D8y25iVP.jpg', 'iphone_14_pro_lgd.jpg', 'asdasd', 773132333, 'asdasdasd'),
(27, 'redmi', 'note', 6, 15666, 15, 112, 'photo-1560677519-9e47f8731d07.jpg', 'xiaomi-redmi-note-8-1.jpg', 'xiaomi-redmi-note-8-cosmic-purple.jpg', 'asdsa', 773132333, 'asdasd'),
(28, 'redmi', 'note', 6, 66650, 12, 28, 'redmi-note-8-dual-sim-128gb-lte-4g-alb-moonlight-4gb-ram_10061651_2_1572959544.jpg', 'redmi-note-8-dual-sim-128gb-lte-4g-alb-moonlight-4gb-ram_10061651_4_1572959554.jpg', '', 'asdad', 773132333, 'asdasd'),
(29, 'redmi', 'note', 8, 62222, 12, 12, 'redmi-note-8-dual-sim-128gb-lte-4g-alb-moonlight-4gb-ram_10061651_2_1572959544.jpg', 'redmi-note-8-dual-sim-128gb-lte-4g-alb-moonlight-4gb-ram_10061651_4_1572959554.jpg', '', 'asd', 773132333, 'asd'),
(30, 'redmi', 'note', 6, 250000, 23, 34, 'pms_1632455266.1579315.jpg', 'xiaomi-redmi-note-8-1.jpg', 'xiaomi-redmi-note-8-cosmic-purple.jpg', 'asdasd', 773132333, 'asdasd'),
(31, 'samsung', 'M02', 4, 15500, 42, 108, 'photo-1583574333311-3a86605c76b2.jpg', 'photo-1610945264803-c22b62d2a7b3.jpg', 'photo-1610945265064-0e34e5519bbf.jpg', 'asdas', 773132333, 'asdasdad');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `frist_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `frist_name`, `last_name`, `email`, `mobile`, `password`, `role`) VALUES
(8, 'Mahesh', 'Dissanayaka', 'mahesh@gmail.com', 773132973, '202cb962ac59075b964b07152d234b70', 'user'),
(9, 'mahesh', 'dissanayaka', 'mahesh06@gmail.com', 773132973, '202cb962ac59075b964b07152d234b70', 'user'),
(10, 'kavi ashenya', 'herath', 'kavi@gmail.com', 773132666, '202cb962ac59075b964b07152d234b70', 'user'),
(11, 'Maheshcfgdg', 'Dissanayaka', 'mahesh123@gmail.com', 773132973, '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addlist`
--
ALTER TABLE `addlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addlist`
--
ALTER TABLE `addlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
