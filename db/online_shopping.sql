-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 05:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `u_id` int(11) NOT NULL,
  `chk_item` int(11) NOT NULL,
  `chk_qty` int(11) NOT NULL,
  `chk_ref` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_cat` int(11) NOT NULL,
  `item_title` text NOT NULL,
  `item_description` text NOT NULL,
  `item_qyt` int(11) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` text NOT NULL,
  `item_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_cat`, `item_title`, `item_description`, `item_qyt`, `item_cost`, `item_price`, `item_image`, `item_discount`) VALUES
(17, 9, 'Watches Casio', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful watch. its purely made on metal.You can buy this watch by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of Metal</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 50, 500, 450, 'images/products/product3.jpg', 50),
(18, 9, 'watches suunto', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful watch. its purely made on metal.You can buy this watch by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of Metal</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 120, 680, 700, 'images/products/product4.jpg', 20),
(19, 9, 'watches citizen', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful watch. its purely made on metal.You can buy this watch by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of Metal</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 210, 670, 570, 'images/products/product2.jpg', 100),
(20, 10, 'T-Shirts', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful shirt. its purely made on cotton.You can buy this shirt by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of cotton</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 60, 320, 300, 'images/products/img_men1.jpg', 20),
(21, 10, 'T-Shirt Silk', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful shirt. its purely made on silk.You can buy this shirt by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of silk</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 90, 500, 450, 'images/products/img_men2.jpg', 50),
(22, 11, 'Trouser cotton', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful trouser. its purely made on cotton.You can buy this trouser by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of cottob</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 90, 670, 600, 'images/products/img_men3.jpg', 70),
(23, 11, 'Trouser silk', '				<div class=\"pp-desc-detail\">\r\n					<p>This is a very beautiful trouser. its purely made on silk.You can buy this trouser by click on the buy button.</p>\r\n					<ul>\r\n						<li>It is Beautiful</li>\r\n						<li>Made of silk</li>\r\n						<li>An orijinal and branded quality</li>\r\n						<li>Free Shipping overall the country</li>\r\n						<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n					</ul>\r\n				</div>', 40, 500, 400, 'images/products/img_men4.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `item_cat`
--

CREATE TABLE `item_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_cat`
--

INSERT INTO `item_cat` (`cat_id`, `cat_name`, `cat_slug`) VALUES
(9, 'Watches', 'Watches'),
(10, 'T-Shirts', 'T-Shirts'),
(11, 'Trousers', 'Trousers');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `u_id` int(11) NOT NULL,
  `chk_ref` varchar(100) NOT NULL,
  `chk_item` int(11) NOT NULL,
  `chk_qty` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `login_name` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `contact_number` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`u_id`,`chk_item`,`chk_ref`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_cat`
--
ALTER TABLE `item_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`u_id`,`chk_ref`,`chk_item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `item_cat`
--
ALTER TABLE `item_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
