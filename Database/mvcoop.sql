-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 10:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Yan', 'yancoder', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(9, 'Oppo'),
(10, 'Huawei'),
(11, 'Apple'),
(12, 'Samsung'),
(14, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `method`, `image`, `stock`, `status`) VALUES
(55, 3, '8c9d0bbk2ooa4037fv3ce24mq7', 'Máy Giặt1', '20000', 1, '', '40d4f066ea.jpg', 2, 1),
(75, 3, 'im0f7b4jfl9k16roj8v358dktb', 'Máy Giặt1', '200000', 1, '', '40d4f066ea.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(3, 'Mobile Phones'),
(4, 'Desktop'),
(5, 'Laptop'),
(6, 'Accessories'),
(7, 'Software'),
(8, 'Sports &amp; Fitness'),
(9, 'Footwear'),
(10, 'Jewellery'),
(11, 'Clothing'),
(12, 'Home Decor &amp; Kitchen'),
(13, 'Beauty &amp; Healthcare'),
(14, 'Toys, Kids &amp; Babies'),
(18, '234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(8, 4, 3, 'Máy Giặt1', '20000', '40d4f066ea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fullname`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(4, 'admin@admin.vn', 'admin@admin.vn', '', '', 'admin@admin.vn', 'admin@admin.vn', 'admin@admin.vn', '922ae43d5d92cec5650e4a07e9717c3e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_paid`
--

CREATE TABLE `tbl_history_paid` (
  `id` int(11) NOT NULL,
  `trans_code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_history_paid`
--

INSERT INTO `tbl_history_paid` (`id`, `trans_code`, `amount`, `customer_id`, `productId`, `productName`, `quantity`, `type`, `status`) VALUES
(13, '14005433', '22000000', '4', 3, 'Máy Giặt1', '1', 'vnpay', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `order_code`, `productName`, `customer_id`, `quantity`, `price`, `method`, `image`, `date_order`, `status`) VALUES
(23, 3, '5941', 'Máy Giặt1', 4, 1, '20000', '', '40d4f066ea.jpg', '2023-05-04 01:32:38', 0),
(24, 3, '2516', 'Máy Giặt1', 4, 1, '20000', '', '40d4f066ea.jpg', '2023-05-04 03:21:50', 0),
(25, 32, '7524', 'asdjkahsdjkas.com', 4, 1, '500000', '', '0e7ebea65a.jpg', '2023-05-05 17:15:30', 0),
(26, 32, '6667', 'asdjkahsdjkas.com', 4, 1, '500000', '', '0e7ebea65a.jpg', '2023-05-05 17:15:47', 0),
(27, 3, '9056', 'Máy Giặt1', 4, 1, '20000', '', '40d4f066ea.jpg', '2023-05-05 17:28:15', 0),
(28, 3, '2927', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:37:44', 0),
(29, 3, '3121', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:38:15', 0),
(30, 3, '6058', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:39:03', 0),
(31, 3, '7882', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:41:03', 0),
(32, 3, '4834', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:46:26', 0),
(33, 3, '5379', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:47:27', 0),
(34, 3, '1922', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:49:31', 0),
(35, 3, '9934', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:50:09', 0),
(36, 3, '3789', 'Máy Giặt1', 4, 1, '20000', 'cash', '40d4f066ea.jpg', '2023-05-05 17:51:28', 0),
(37, 3, '4537', 'Máy Giặt1', 4, 1, '200000', '', '40d4f066ea.jpg', '2023-05-05 18:08:43', 0),
(38, 3, '7264', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:24:22', 0),
(39, 3, '6408', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:31:39', 0),
(40, 3, '1793', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:54:47', 0),
(41, 3, '5652', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:12', 0),
(42, 3, '7596', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:13', 0),
(43, 3, '1270', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:14', 0),
(44, 3, '1651', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:14', 0),
(45, 3, '4869', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:14', 0),
(46, 3, '2221', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:14', 0),
(47, 3, '4396', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:20', 0),
(48, 3, '1089', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:56:20', 0),
(49, 3, '1327', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:59:26', 0),
(50, 3, '1357', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 18:59:47', 0),
(51, 3, '451', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:25', 0),
(52, 3, '5244', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:26', 0),
(53, 3, '5244', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:41', 0),
(54, 3, '7681', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:42', 0),
(55, 3, '93', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:43', 0),
(56, 3, '7229', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:56', 0),
(57, 3, '4991', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:57', 0),
(58, 3, '8941', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:57', 0),
(59, 3, '9545', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:00:58', 0),
(60, 3, '1567', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:01:28', 0),
(61, 3, '8010', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:01:29', 0),
(62, 3, '7182', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:01:29', 0),
(63, 3, '1056', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:03:06', 0),
(64, 3, '2240', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:03:22', 0),
(65, 3, '3674', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:03:29', 0),
(66, 3, '8176', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:04:08', 0),
(67, 3, '4757', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:05:37', 0),
(68, 3, '6686', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:05:39', 0),
(69, 3, '9790', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:09:43', 0),
(70, 3, '2236', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:09:45', 0),
(71, 3, '5145', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:09:52', 0),
(72, 3, '3402', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:10:24', 0),
(73, 3, '3634', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:11:45', 0),
(74, 3, '4588', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:11:52', 0),
(75, 3, '1715', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:11:53', 0),
(76, 3, '1782', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:11:53', 0),
(77, 3, '5081', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:11:54', 0),
(78, 3, '8486', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:28', 0),
(79, 3, '3881', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:28', 0),
(80, 3, '2750', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:52', 0),
(81, 3, '7702', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:53', 0),
(82, 3, '3985', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:53', 0),
(83, 3, '2125', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:53', 0),
(84, 3, '1546', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:55', 0),
(85, 3, '5410', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:55', 0),
(86, 3, '3418', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:12:55', 0),
(87, 3, '5043', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:13:09', 0),
(88, 3, '7991', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:13:13', 0),
(89, 3, '782', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:13:13', 0),
(90, 3, '7015', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:13:14', 0),
(91, 3, '9534', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:14:13', 0),
(92, 3, '7598', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:14:29', 0),
(93, 3, '7332', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:14:37', 0),
(94, 3, '4868', 'Máy Giặt1', 4, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:14:59', 0),
(95, 3, '1745', 'Máy Giặt1', 0, 1, '200000', 'vnpay', '40d4f066ea.jpg', '2023-05-05 19:15:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_placed`
--

CREATE TABLE `tbl_placed` (
  `id_placed` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_placed`
--

INSERT INTO `tbl_placed` (`id_placed`, `order_code`, `status`, `customer_id`, `date_created`) VALUES
(2, '2516', 2, 4, '2023-05-04 03:21:50'),
(3, '7524', 0, 4, '2023-05-05 17:15:30'),
(4, '6667', 0, 4, '2023-05-05 17:15:47'),
(5, '3488', 0, 4, '2023-05-05 17:20:06'),
(6, '400', 0, 4, '2023-05-05 17:22:03'),
(7, '9822', 0, 4, '2023-05-05 17:24:50'),
(8, '1399', 0, 4, '2023-05-05 17:24:54'),
(9, '9056', 0, 4, '2023-05-05 17:28:15'),
(10, '2927', 0, 4, '2023-05-05 17:37:44'),
(11, '3111', 0, 4, '2023-05-05 17:37:56'),
(12, '3121', 0, 4, '2023-05-05 17:38:15'),
(13, '2050', 0, 4, '2023-05-05 17:38:18'),
(14, '6058', 0, 4, '2023-05-05 17:39:03'),
(15, '6788', 0, 4, '2023-05-05 17:39:22'),
(16, '7882', 0, 4, '2023-05-05 17:41:03'),
(17, '1895', 0, 4, '2023-05-05 17:41:07'),
(18, '8956', 0, 0, '2023-05-05 17:43:44'),
(19, '7304', 0, 0, '2023-05-05 17:43:44'),
(20, '3180', 0, 0, '2023-05-05 17:43:44'),
(21, '3281', 0, 0, '2023-05-05 17:43:44'),
(22, '4390', 0, 0, '2023-05-05 17:43:44'),
(23, '5304', 0, 0, '2023-05-05 17:43:44'),
(24, '885', 0, 0, '2023-05-05 17:43:45'),
(25, '8045', 0, 0, '2023-05-05 17:43:45'),
(26, '8918', 0, 0, '2023-05-05 17:43:45'),
(27, '4358', 0, 0, '2023-05-05 17:43:45'),
(28, '8868', 0, 0, '2023-05-05 17:43:45'),
(29, '7572', 0, 0, '2023-05-05 17:43:46'),
(30, '5434', 0, 0, '2023-05-05 17:43:46'),
(31, '9733', 0, 0, '2023-05-05 17:43:46'),
(32, '7978', 0, 0, '2023-05-05 17:43:46'),
(33, '9892', 0, 0, '2023-05-05 17:43:46'),
(34, '7221', 0, 0, '2023-05-05 17:43:46'),
(35, '4223', 0, 0, '2023-05-05 17:43:47'),
(36, '4770', 0, 0, '2023-05-05 17:43:47'),
(37, '2140', 0, 0, '2023-05-05 17:43:47'),
(38, '7187', 0, 0, '2023-05-05 17:43:47'),
(39, '4516', 0, 0, '2023-05-05 17:43:47'),
(40, '7325', 0, 0, '2023-05-05 17:43:47'),
(41, '7076', 0, 0, '2023-05-05 17:43:48'),
(42, '5610', 0, 0, '2023-05-05 17:43:48'),
(43, '221', 0, 0, '2023-05-05 17:43:48'),
(44, '8906', 0, 0, '2023-05-05 17:43:48'),
(45, '5252', 0, 0, '2023-05-05 17:43:48'),
(46, '7648', 0, 0, '2023-05-05 17:43:49'),
(47, '690', 0, 0, '2023-05-05 17:43:49'),
(48, '2292', 0, 0, '2023-05-05 17:43:49'),
(49, '5018', 0, 0, '2023-05-05 17:43:49'),
(50, '6228', 0, 0, '2023-05-05 17:43:49'),
(51, '1508', 0, 0, '2023-05-05 17:43:49'),
(52, '7505', 0, 0, '2023-05-05 17:44:23'),
(53, '5013', 0, 0, '2023-05-05 17:44:23'),
(54, '1544', 0, 0, '2023-05-05 17:44:23'),
(55, '5272', 0, 0, '2023-05-05 17:44:23'),
(56, '7647', 0, 0, '2023-05-05 17:44:24'),
(57, '787', 0, 0, '2023-05-05 17:44:24'),
(58, '9260', 0, 0, '2023-05-05 17:44:24'),
(59, '8705', 0, 0, '2023-05-05 17:44:24'),
(60, '1608', 0, 0, '2023-05-05 17:44:24'),
(61, '8178', 0, 0, '2023-05-05 17:44:24'),
(62, '7105', 0, 0, '2023-05-05 17:44:24'),
(63, '4813', 0, 0, '2023-05-05 17:44:24'),
(64, '6570', 0, 0, '2023-05-05 17:44:24'),
(65, '26', 0, 0, '2023-05-05 17:44:25'),
(66, '2423', 0, 0, '2023-05-05 17:44:25'),
(67, '2577', 0, 0, '2023-05-05 17:44:25'),
(68, '6950', 0, 0, '2023-05-05 17:44:25'),
(69, '6786', 0, 0, '2023-05-05 17:44:25'),
(70, '4358', 0, 0, '2023-05-05 17:44:25'),
(71, '1255', 0, 0, '2023-05-05 17:44:25'),
(72, '4042', 0, 0, '2023-05-05 17:44:26'),
(73, '7796', 0, 0, '2023-05-05 17:44:26'),
(74, '9590', 0, 0, '2023-05-05 17:44:26'),
(75, '370', 0, 0, '2023-05-05 17:44:26'),
(76, '1322', 0, 0, '2023-05-05 17:44:27'),
(77, '9276', 0, 0, '2023-05-05 17:44:27'),
(78, '1485', 0, 0, '2023-05-05 17:44:27'),
(79, '4604', 0, 0, '2023-05-05 17:44:27'),
(80, '4076', 0, 0, '2023-05-05 17:44:27'),
(81, '3374', 0, 0, '2023-05-05 17:44:27'),
(82, '4872', 0, 0, '2023-05-05 17:44:27'),
(83, '5678', 0, 0, '2023-05-05 17:44:27'),
(84, '5473', 0, 0, '2023-05-05 17:44:27'),
(85, '2979', 0, 0, '2023-05-05 17:44:27'),
(86, '2100', 0, 0, '2023-05-05 17:44:28'),
(87, '7366', 0, 0, '2023-05-05 17:44:28'),
(88, '5734', 0, 0, '2023-05-05 17:44:28'),
(89, '5566', 0, 0, '2023-05-05 17:44:28'),
(90, '2629', 0, 0, '2023-05-05 17:44:28'),
(91, '1430', 0, 0, '2023-05-05 17:44:28'),
(92, '6126', 0, 0, '2023-05-05 17:44:33'),
(93, '1541', 0, 0, '2023-05-05 17:44:33'),
(94, '1742', 0, 0, '2023-05-05 17:44:33'),
(95, '4425', 0, 0, '2023-05-05 17:44:33'),
(96, '5423', 0, 0, '2023-05-05 17:44:33'),
(97, '3589', 0, 0, '2023-05-05 17:44:34'),
(98, '4060', 0, 0, '2023-05-05 17:44:34'),
(99, '8193', 0, 0, '2023-05-05 17:44:34'),
(100, '6333', 0, 0, '2023-05-05 17:44:34'),
(101, '9650', 0, 0, '2023-05-05 17:44:34'),
(102, '1452', 0, 0, '2023-05-05 17:44:34'),
(103, '5548', 0, 0, '2023-05-05 17:44:34'),
(104, '5326', 0, 0, '2023-05-05 17:44:34'),
(105, '9186', 0, 0, '2023-05-05 17:44:34'),
(106, '4993', 0, 0, '2023-05-05 17:44:34'),
(107, '296', 0, 0, '2023-05-05 17:44:35'),
(108, '615', 0, 0, '2023-05-05 17:44:35'),
(109, '4087', 0, 0, '2023-05-05 17:44:35'),
(110, '1730', 0, 0, '2023-05-05 17:44:35'),
(111, '7639', 0, 0, '2023-05-05 17:44:35'),
(112, '1553', 0, 0, '2023-05-05 17:44:47'),
(113, '4834', 0, 4, '2023-05-05 17:46:26'),
(114, '5379', 0, 4, '2023-05-05 17:47:27'),
(115, '1922', 0, 4, '2023-05-05 17:49:31'),
(116, '5674', 0, 4, '2023-05-05 17:49:31'),
(117, '2540', 0, 4, '2023-05-05 17:49:32'),
(118, '8901', 0, 4, '2023-05-05 17:49:32'),
(119, '4276', 0, 4, '2023-05-05 17:49:32'),
(120, '3941', 0, 4, '2023-05-05 17:49:32'),
(121, '7229', 0, 4, '2023-05-05 17:49:32'),
(122, '6321', 0, 4, '2023-05-05 17:49:32'),
(123, '6826', 0, 4, '2023-05-05 17:49:32'),
(124, '2728', 0, 4, '2023-05-05 17:49:32'),
(125, '7350', 0, 4, '2023-05-05 17:49:32'),
(126, '8076', 0, 4, '2023-05-05 17:49:32'),
(127, '1580', 0, 4, '2023-05-05 17:49:33'),
(128, '8293', 0, 4, '2023-05-05 17:49:33'),
(129, '6051', 0, 4, '2023-05-05 17:49:33'),
(130, '4661', 0, 4, '2023-05-05 17:49:33'),
(131, '9960', 0, 4, '2023-05-05 17:49:33'),
(132, '9559', 0, 4, '2023-05-05 17:49:33'),
(133, '856', 0, 4, '2023-05-05 17:49:33'),
(134, '5610', 0, 4, '2023-05-05 17:49:34'),
(135, '1178', 0, 4, '2023-05-05 17:49:35'),
(136, '754', 0, 4, '2023-05-05 17:49:35'),
(137, '8319', 0, 4, '2023-05-05 17:49:35'),
(138, '6232', 0, 4, '2023-05-05 17:49:35'),
(139, '3090', 0, 4, '2023-05-05 17:49:35'),
(140, '6284', 0, 4, '2023-05-05 17:49:35'),
(141, '3789', 0, 4, '2023-05-05 17:49:35'),
(142, '2299', 0, 4, '2023-05-05 17:49:35'),
(143, '5488', 0, 4, '2023-05-05 17:49:35'),
(144, '5485', 0, 4, '2023-05-05 17:49:35'),
(145, '5637', 0, 4, '2023-05-05 17:49:36'),
(146, '7410', 0, 4, '2023-05-05 17:49:36'),
(147, '2060', 0, 4, '2023-05-05 17:49:36'),
(148, '1021', 0, 4, '2023-05-05 17:49:36'),
(149, '6353', 0, 4, '2023-05-05 17:49:36'),
(150, '6895', 0, 4, '2023-05-05 17:49:36'),
(151, '7065', 0, 4, '2023-05-05 17:49:36'),
(152, '5295', 0, 4, '2023-05-05 17:49:36'),
(153, '5482', 0, 4, '2023-05-05 17:49:36'),
(154, '4248', 0, 4, '2023-05-05 17:49:41'),
(155, '7545', 0, 4, '2023-05-05 17:49:41'),
(156, '2780', 0, 4, '2023-05-05 17:49:42'),
(157, '8960', 0, 4, '2023-05-05 17:49:42'),
(158, '810', 0, 4, '2023-05-05 17:49:42'),
(159, '3928', 0, 4, '2023-05-05 17:49:42'),
(160, '2230', 0, 4, '2023-05-05 17:49:42'),
(161, '2453', 0, 4, '2023-05-05 17:49:42'),
(162, '6013', 0, 4, '2023-05-05 17:49:42'),
(163, '2480', 0, 4, '2023-05-05 17:49:42'),
(164, '6312', 0, 4, '2023-05-05 17:49:42'),
(165, '289', 0, 4, '2023-05-05 17:49:42'),
(166, '6373', 0, 4, '2023-05-05 17:49:43'),
(167, '2885', 0, 4, '2023-05-05 17:49:43'),
(168, '2665', 0, 4, '2023-05-05 17:49:43'),
(169, '7803', 0, 4, '2023-05-05 17:49:43'),
(170, '3558', 0, 4, '2023-05-05 17:49:43'),
(171, '5288', 0, 4, '2023-05-05 17:49:43'),
(172, '310', 0, 4, '2023-05-05 17:49:43'),
(173, '2962', 0, 4, '2023-05-05 17:49:43'),
(174, '9934', 0, 4, '2023-05-05 17:50:09'),
(175, '3789', 0, 4, '2023-05-05 17:51:28'),
(176, '7724', 0, 4, '2023-05-05 17:59:29'),
(177, '5764', 0, 4, '2023-05-05 18:07:33'),
(178, '4537', 0, 4, '2023-05-05 18:08:43'),
(179, '1745', 0, 4, '2023-05-05 18:20:19'),
(180, '8961', 0, 4, '2023-05-05 18:20:32'),
(181, '7264', 0, 4, '2023-05-05 18:24:22'),
(182, '2707', 0, 4, '2023-05-05 18:24:55'),
(183, '8832', 0, 4, '2023-05-05 18:26:05'),
(184, '6671', 0, 4, '2023-05-05 18:26:05'),
(185, '372', 0, 4, '2023-05-05 18:26:05'),
(186, '8805', 0, 4, '2023-05-05 18:26:58'),
(187, '3674', 0, 0, '2023-05-05 18:29:33'),
(188, '6408', 0, 4, '2023-05-05 18:31:39'),
(189, '4401', 0, 4, '2023-05-05 18:33:44'),
(190, '7947', 0, 4, '2023-05-05 18:33:44'),
(191, '277', 0, 4, '2023-05-05 18:33:45'),
(192, '9021', 0, 4, '2023-05-05 18:52:01'),
(193, '1062', 0, 4, '2023-05-05 18:52:01'),
(194, '4217', 0, 4, '2023-05-05 18:53:10'),
(195, '945', 0, 4, '2023-05-05 18:53:11'),
(196, '6268', 0, 4, '2023-05-05 18:53:22'),
(197, '1768', 0, 4, '2023-05-05 18:53:22'),
(198, '9097', 0, 4, '2023-05-05 18:53:38'),
(199, '3629', 0, 4, '2023-05-05 18:53:38'),
(200, '7855', 0, 4, '2023-05-05 18:53:40'),
(201, '6497', 0, 4, '2023-05-05 18:53:40'),
(202, '5771', 0, 4, '2023-05-05 18:53:48'),
(203, '3302', 0, 4, '2023-05-05 18:53:48'),
(204, '7603', 0, 4, '2023-05-05 18:54:03'),
(205, '8623', 0, 4, '2023-05-05 18:54:03'),
(206, '1793', 0, 4, '2023-05-05 18:54:47'),
(207, '3320', 0, 4, '2023-05-05 18:54:47'),
(208, '5652', 0, 4, '2023-05-05 18:56:12'),
(209, '1145', 0, 4, '2023-05-05 18:56:12'),
(210, '7596', 0, 4, '2023-05-05 18:56:13'),
(211, '1282', 0, 4, '2023-05-05 18:56:13'),
(212, '1270', 0, 4, '2023-05-05 18:56:14'),
(213, '9465', 0, 4, '2023-05-05 18:56:14'),
(214, '1651', 0, 4, '2023-05-05 18:56:14'),
(215, '419', 0, 4, '2023-05-05 18:56:14'),
(216, '4869', 0, 4, '2023-05-05 18:56:14'),
(217, '1393', 0, 4, '2023-05-05 18:56:14'),
(218, '2221', 0, 4, '2023-05-05 18:56:14'),
(219, '8949', 0, 4, '2023-05-05 18:56:14'),
(220, '4396', 0, 4, '2023-05-05 18:56:20'),
(221, '8566', 0, 4, '2023-05-05 18:56:20'),
(222, '1089', 0, 4, '2023-05-05 18:56:20'),
(223, '6626', 0, 4, '2023-05-05 18:56:20'),
(224, '1327', 0, 4, '2023-05-05 18:59:26'),
(225, '5095', 0, 4, '2023-05-05 18:59:26'),
(226, '1357', 0, 4, '2023-05-05 18:59:47'),
(227, '8755', 0, 4, '2023-05-05 18:59:47'),
(228, '451', 0, 4, '2023-05-05 19:00:25'),
(229, '3277', 0, 4, '2023-05-05 19:00:25'),
(230, '5244', 0, 4, '2023-05-05 19:00:26'),
(231, '5923', 0, 4, '2023-05-05 19:00:26'),
(232, '5244', 0, 4, '2023-05-05 19:00:41'),
(233, '9045', 0, 4, '2023-05-05 19:00:41'),
(234, '7681', 0, 4, '2023-05-05 19:00:42'),
(235, '864', 0, 4, '2023-05-05 19:00:42'),
(236, '93', 0, 4, '2023-05-05 19:00:43'),
(237, '9570', 0, 4, '2023-05-05 19:00:43'),
(238, '7229', 0, 4, '2023-05-05 19:00:56'),
(239, '8105', 0, 4, '2023-05-05 19:00:56'),
(240, '4991', 0, 4, '2023-05-05 19:00:57'),
(241, '6141', 0, 4, '2023-05-05 19:00:57'),
(242, '8941', 0, 4, '2023-05-05 19:00:57'),
(243, '1368', 0, 4, '2023-05-05 19:00:57'),
(244, '9545', 0, 4, '2023-05-05 19:00:58'),
(245, '8009', 0, 4, '2023-05-05 19:00:58'),
(246, '1567', 0, 4, '2023-05-05 19:01:28'),
(247, '6301', 0, 4, '2023-05-05 19:01:28'),
(248, '8010', 0, 4, '2023-05-05 19:01:29'),
(249, '8647', 0, 4, '2023-05-05 19:01:29'),
(250, '7182', 0, 4, '2023-05-05 19:01:29'),
(251, '1982', 0, 4, '2023-05-05 19:01:29'),
(252, '1056', 0, 4, '2023-05-05 19:03:06'),
(253, '830', 0, 4, '2023-05-05 19:03:06'),
(254, '2240', 0, 4, '2023-05-05 19:03:22'),
(255, '1064', 0, 4, '2023-05-05 19:03:22'),
(256, '3674', 0, 4, '2023-05-05 19:03:29'),
(257, '2183', 0, 4, '2023-05-05 19:03:29'),
(258, '8176', 0, 4, '2023-05-05 19:04:08'),
(259, '6036', 0, 4, '2023-05-05 19:04:08'),
(260, '4757', 0, 4, '2023-05-05 19:05:37'),
(261, '2404', 0, 4, '2023-05-05 19:05:37'),
(262, '6686', 0, 4, '2023-05-05 19:05:39'),
(263, '975', 0, 4, '2023-05-05 19:05:39'),
(264, '9790', 0, 4, '2023-05-05 19:09:43'),
(265, '6299', 0, 4, '2023-05-05 19:09:43'),
(266, '2236', 0, 4, '2023-05-05 19:09:45'),
(267, '3561', 0, 4, '2023-05-05 19:09:45'),
(268, '5145', 0, 4, '2023-05-05 19:09:52'),
(269, '4307', 0, 4, '2023-05-05 19:09:52'),
(270, '3402', 0, 4, '2023-05-05 19:10:24'),
(271, '8861', 0, 4, '2023-05-05 19:10:24'),
(272, '3634', 0, 4, '2023-05-05 19:11:45'),
(273, '5140', 0, 4, '2023-05-05 19:11:45'),
(274, '4588', 0, 4, '2023-05-05 19:11:52'),
(275, '8031', 0, 4, '2023-05-05 19:11:52'),
(276, '1715', 0, 4, '2023-05-05 19:11:53'),
(277, '9315', 0, 4, '2023-05-05 19:11:53'),
(278, '1782', 0, 4, '2023-05-05 19:11:53'),
(279, '1320', 0, 4, '2023-05-05 19:11:53'),
(280, '5081', 0, 4, '2023-05-05 19:11:54'),
(281, '5357', 0, 4, '2023-05-05 19:11:54'),
(282, '8486', 0, 4, '2023-05-05 19:12:28'),
(283, '9620', 0, 4, '2023-05-05 19:12:28'),
(284, '3881', 0, 4, '2023-05-05 19:12:28'),
(285, '9826', 0, 4, '2023-05-05 19:12:28'),
(286, '2750', 0, 4, '2023-05-05 19:12:52'),
(287, '223', 0, 4, '2023-05-05 19:12:52'),
(288, '7702', 0, 4, '2023-05-05 19:12:53'),
(289, '3111', 0, 4, '2023-05-05 19:12:53'),
(290, '3985', 0, 4, '2023-05-05 19:12:53'),
(291, '7916', 0, 4, '2023-05-05 19:12:53'),
(292, '2125', 0, 4, '2023-05-05 19:12:53'),
(293, '2863', 0, 4, '2023-05-05 19:12:53'),
(294, '1546', 0, 4, '2023-05-05 19:12:55'),
(295, '2152', 0, 4, '2023-05-05 19:12:55'),
(296, '5410', 0, 4, '2023-05-05 19:12:55'),
(297, '130', 0, 4, '2023-05-05 19:12:55'),
(298, '3418', 0, 4, '2023-05-05 19:12:55'),
(299, '2197', 0, 4, '2023-05-05 19:12:55'),
(300, '5043', 0, 4, '2023-05-05 19:13:09'),
(301, '2314', 0, 4, '2023-05-05 19:13:09'),
(302, '7991', 0, 4, '2023-05-05 19:13:13'),
(303, '9662', 0, 4, '2023-05-05 19:13:13'),
(304, '782', 0, 4, '2023-05-05 19:13:13'),
(305, '9492', 0, 4, '2023-05-05 19:13:13'),
(306, '7015', 0, 4, '2023-05-05 19:13:14'),
(307, '854', 0, 4, '2023-05-05 19:13:14'),
(308, '9534', 0, 4, '2023-05-05 19:14:13'),
(309, '1868', 0, 4, '2023-05-05 19:14:13'),
(310, '7598', 0, 4, '2023-05-05 19:14:29'),
(311, '7332', 0, 4, '2023-05-05 19:14:37'),
(312, '4868', 0, 4, '2023-05-05 19:14:59'),
(313, '1745', 0, 0, '2023-05-05 19:15:28'),
(314, '5227', 0, 0, '2023-05-05 19:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productQuantity` int(55) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productQuantity`, `catId`, `brandId`, `description`, `type`, `price`, `image`) VALUES
(3, 'Máy Giặt1', 2, 8, 10, '<p>123v1231</p>', 1, '200000', '40d4f066ea.jpg'),
(4, '243424', 0, 13, 12, '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst.</p>\n<div>&nbsp;</div>', 1, '111', '13341f9d5a.jpg'),
(5, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '111', '025279f78a.jpg'),
(6, 'asdjkahsdjkas.com', 655, 18, 14, '<p>123c23</p>', 1, '500000', 'd38915e24b.jpg'),
(7, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', 'd38915e24b.jpg'),
(8, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', 'd38915e24b.jpg'),
(9, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4e3f037979.jpg'),
(10, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4e3f037979.jpg'),
(11, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4e3f037979.jpg'),
(12, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4e3f037979.jpg'),
(13, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '70359d3b80.jpg'),
(14, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '70359d3b80.jpg'),
(15, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '70359d3b80.jpg'),
(16, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '70359d3b80.jpg'),
(17, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '70359d3b80.jpg'),
(18, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '874a28ef0f.jpg'),
(19, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '874a28ef0f.jpg'),
(20, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '874a28ef0f.jpg'),
(21, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '874a28ef0f.jpg'),
(22, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '874a28ef0f.jpg'),
(23, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4af3ec65ba.jpg'),
(24, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4af3ec65ba.jpg'),
(25, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4af3ec65ba.jpg'),
(26, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '4af3ec65ba.jpg'),
(27, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '1a5db9126b.jpg'),
(28, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '1a5db9126b.jpg'),
(29, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '1a5db9126b.jpg'),
(30, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '1a5db9126b.jpg'),
(31, 'asdjkahsdjkas.com', 0, 18, 14, '<p>123c23</p>', 1, '500000', '1a5db9126b.jpg'),
(32, 'asdjkahsdjkas.com', 22, 18, 14, '<p>123c23</p>', 1, '500000', '0e7ebea65a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `slideId` int(11) NOT NULL,
  `slideTitle` varchar(255) NOT NULL,
  `shortDescription` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`slideId`, `slideTitle`, `shortDescription`, `description`, `image`) VALUES
(10, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '4f6425004a.jpg'),
(11, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '74b7de2ba9.jpg'),
(12, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '1015e4188d.jpg'),
(13, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '1015e4188d.jpg'),
(14, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '13c2b01fc3.jpg'),
(15, 'SMART WATCH', 'FLAT 75% OFF', 'AT $99 ONLY FOR TODAY', '13c2b01fc3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slogan`
--

CREATE TABLE `tbl_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slogan`
--

INSERT INTO `tbl_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Oregon', 'Oregon - Multipurpose eCommerce Bootstrap 5 Template', '5d990e9ead.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(2, 4, 3, 'Máy Giặt1', '1111', '40d4f066ea.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history_paid`
--
ALTER TABLE `tbl_history_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_placed`
--
ALTER TABLE `tbl_placed`
  ADD PRIMARY KEY (`id_placed`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`slideId`);

--
-- Indexes for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_history_paid`
--
ALTER TABLE `tbl_history_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_placed`
--
ALTER TABLE `tbl_placed`
  MODIFY `id_placed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `slideId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_slogan`
--
ALTER TABLE `tbl_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
