-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 09:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arhongo_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 1,
  `logged_in` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `location`, `admin`, `logged_in`, `created_at`, `updated_at`) VALUES
(1, 'mahir', 'e10adc3949ba59abbe56e057f20f883e', 'mahir@gmail.com', '01815236521', 'Chittagong', 1, 0, '2019-11-25 05:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_name`
--

CREATE TABLE `brand_name` (
  `id` int(12) NOT NULL,
  `vendor_id` int(12) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_name`
--

INSERT INTO `brand_name` (`id`, `vendor_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rupali Cottons', '2019-11-14 06:46:59', NULL),
(2, 1, 'Pran', '2019-11-14 06:46:59', NULL),
(3, 1, 'Adidas', '2019-11-24 06:44:20', '2019-11-24 06:44:20'),
(4, 1, 'Arong', '2019-11-24 06:45:07', '2019-11-24 06:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) NOT NULL,
  `national_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `photo` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `holding_no` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `user_name`, `email`, `contact_no`, `national_id`, `password`, `photo`, `present_address`, `permanent_address`, `holding_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Azam Hossen', 'azam', 'azam@gmail.com', '01815236521', '111444555', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image1.png', 'Nasirabad Chittagong', 'Coxbazar Bangladesh', '111/222', 1, '2019-11-14 06:46:36', NULL),
(2, 'Mirza Galib', 'galib', 'galib@gmail.com', '01715236214', '555222333666', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image.png', 'Muradpur Chittagong', 'Dhaka Bangladesh', '85/83', 1, '2019-11-14 06:46:36', NULL),
(3, 'Jamal Khan', 'jamal', 'jamal@gmail.com', '01785232658', '33439990155', 'e10adc3949ba59abbe56e057f20f883e', 'Network-Profile.png', '3/11 Jamalkhan Chittagong', '33/1 Chawkbazar Chittagong', '34/41', 1, '2019-11-18 04:40:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `email_verification` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unite_price` float NOT NULL,
  `unit_x_quantity_price` float NOT NULL,
  `invoice_type` varchar(30) DEFAULT NULL,
  `to_delivery` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `product_quantity`, `product_unite_price`, `unit_x_quantity_price`, `invoice_type`, `to_delivery`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, 900, 1800, NULL, NULL, '2019-11-16 10:33:56', NULL),
(2, 2, 4, 1, 900, 900, NULL, NULL, '2019-11-16 11:13:14', NULL),
(3, 2, 1, 1, 50, 50, NULL, NULL, '2019-11-16 11:13:14', NULL),
(4, 2, 2, 3, 90, 270, NULL, NULL, '2019-11-16 11:13:14', NULL),
(5, 3, 1, 1, 50, 50, NULL, NULL, '2019-11-17 10:28:52', NULL),
(6, 3, 2, 1, 90, 90, NULL, NULL, '2019-11-17 10:28:52', NULL),
(7, 4, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:51:59', NULL),
(8, 4, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:51:59', NULL),
(9, 4, 4, 1, 900, 900, NULL, NULL, '2019-11-18 04:51:59', NULL),
(10, 4, 3, 1, 720, 720, NULL, NULL, '2019-11-18 04:51:59', NULL),
(11, 5, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:56:49', NULL),
(12, 5, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:56:50', NULL),
(13, 6, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:01:21', NULL),
(14, 7, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:08:46', NULL),
(15, 8, 2, 4, 90, 360, NULL, NULL, '2019-11-18 05:09:54', NULL),
(16, 8, 1, 4, 50, 200, NULL, NULL, '2019-11-18 05:09:54', NULL),
(17, 9, 2, 1, 90, 90, NULL, NULL, '2019-11-18 05:26:05', NULL),
(18, 9, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:26:05', NULL),
(19, 10, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `coupon` varchar(100) DEFAULT NULL,
  `order_type` int(11) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `delivery_location`, `total_cost`, `coupon`, `order_type`, `payment_method`, `transaction_id`, `customer_id`, `delivered`, `created_at`, `updated_at`) VALUES
(1, 'Uttara Dhaka', 1800, 'eeeiiii', NULL, 2, 'iiiieee', 1, 0, '2019-11-16 10:33:56', NULL),
(2, 'Nasirabad CTG', 1220, '555222', NULL, 2, '666333', 1, 0, '2019-11-16 11:13:14', NULL),
(3, 'Nasirabad Chittagong', 140, '33333', NULL, 2, 'ffffffe33333', 1, 0, '2019-11-17 10:28:52', NULL),
(4, '3/11 Jamalkhan Chittagong', 1760, '33AAA', NULL, 2, 'AAABBBCCC111', 3, 0, '2019-11-18 04:51:59', NULL),
(5, '3/11 Jamalkhan Chittagong', 140, '', NULL, 2, 'dd111', 3, 0, '2019-11-18 04:56:49', NULL),
(6, '3/11 Jamalkhan Chittagong', 1800, '', NULL, 1, '', 3, 0, '2019-11-18 05:01:21', NULL),
(7, '24/4 Bahaddarhat Chittagong\r\nPhone :  0181520343', 1800, 'ABCDEFG', NULL, 2, '6985412', 3, 0, '2019-11-18 05:08:46', NULL),
(8, '33/4 Oxygen Chittagong', 560, '147abc', NULL, 1, '', 3, 0, '2019-11-18 05:09:53', NULL),
(9, 'Nasirabad Chittagong\r\nPhone : 01815236521', 140, '', NULL, 1, '', 3, 0, '2019-11-18 05:26:04', NULL),
(10, '3/11 Jamalkhan Chittagong', 50, '', NULL, 1, '', 3, 0, '2019-11-18 05:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `display_price` float NOT NULL,
  `sell_unit` varchar(10) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `sc` tinyint(1) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type_id`, `category_id`, `subcategory_id`, `brand_id`, `vendor_id`, `product_name`, `product_description`, `display_price`, `sell_unit`, `product_quantity`, `discount`, `sc`, `currency`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, 1, 1, 'Sando', 'Sando shirt for summer', 50, 'piece', 0, 15, 1, 'BDT', '2019-11-16 07:38:35', '0000-00-00 00:00:00'),
(2, 1, 2, 1, 1, 1, 'Polo Sando', 'Casual Polo Sando for Summer', 90, 'Piece', 0, NULL, 1, 'BDT', '2019-11-07 08:14:46', '2019-11-05 01:07:11'),
(3, 1, 1, 2, 1, 1, 'Jeans', 'Just a casual jeans pant', 720, 'Piece', 0, NULL, 1, 'BDT', '2019-11-06 04:34:32', '2019-11-06 04:34:32'),
(4, 2, 3, 3, 2, 1, 'Shark', 'Shark Meat', 900, 'kg', 22, 10, 0, 'BDT', '2019-11-16 04:42:05', '2019-11-09 06:55:39'),
(5, 1, 1, 2, 1, 1, 'Half Pant', 'Just a regular half pant', 340, 'Piece', 0, NULL, 1, 'BDT', '2019-11-18 23:49:57', '2019-11-18 23:49:57'),
(6, 1, 2, 2, 1, 1, 'Another Sample Product', 'Description for sample product', 340, 'Piece', 0, NULL, 1, 'BDT', '2019-11-19 03:03:57', '2019-11-19 03:03:57'),
(7, 1, 1, 2, 1, 1, 'Sample Product', 'Description Sample', 120, 'Piece', 0, NULL, 1, 'BDT', '2019-11-19 07:05:10', '2019-11-19 07:05:10'),
(8, 1, 1, 4, 4, 1, 'Men\'s Blue Glenplaid Shirt and Pants Pajama Set', 'A great combination for at-home wear, this lightweight Club Room pajama set is a smart choice for any guy.\r\n\r\nClub Room men\'s pajamas\r\nShirt: spread collar, button-down front, chest pocket, buttoned cuffs, striped throughout\r\nPants: elastic waistband with snaps\r\nAll cotton\r\nMachine washable\r\nImported\r\nSavings Based On Offering Prices, Not Actual Sales\r\nWeb ID: 612382', 1500, '1', 0, NULL, 1, 'BDT', '2019-11-24 06:51:11', '2019-11-24 06:51:11'),
(9, 1, 1, 2, 3, 1, 'Test Product', 'ddddddddd', 2000, '1', 0, NULL, 1, 'BDT', '2019-11-24 23:08:01', '2019-11-24 23:08:01'),
(10, 1, 1, 3, 3, 1, 'Cargo Pant', 'Originally made for the military in the 1930s, cargo pants are rugged cotton pants with multiple large pockets traditionally used to hold field dressings and other equipment.', 800, '1', 0, NULL, 1, 'BDT', '2019-11-24 23:37:30', '2019-11-24 23:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `home_page` tinyint(1) NOT NULL DEFAULT 0,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `type_id`, `category_name`, `home_page`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pant', 1, NULL, '2019-11-14 06:45:02', NULL),
(2, 1, 'Torso', 0, NULL, '2019-11-14 06:45:02', NULL),
(3, 2, 'Meat & Fish', 0, NULL, '2019-11-14 06:45:02', NULL),
(5, 3, 'Gym Instrument', 0, 'features_sports.jpg', '2019-11-25 01:37:04', '2019-11-25 01:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `featured_image` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_url`, `featured_image`, `created_at`, `updated_at`) VALUES
(20, 1, 'img/product/041.jpg', 1, '2019-11-24 05:49:41', '2019-11-24 05:49:41'),
(21, 2, 'img/product/download.jpg', 1, '2019-11-24 05:52:04', '2019-11-24 05:52:04'),
(23, 6, 'img/product/p331.jpg', 1, '2019-11-24 05:54:36', '2019-11-24 05:54:36'),
(24, 4, 'img/product/s.jpg', 1, '2019-11-24 05:56:00', '2019-11-24 05:56:00'),
(25, 3, 'img/product/download_(1).jpg', 1, '2019-11-24 06:09:49', '2019-11-24 06:09:49'),
(26, 5, 'img/product/half-pant-500x500.jpg', 1, '2019-11-24 06:36:59', '2019-11-24 06:36:59'),
(27, 7, 'img/product/army_half_pant-550x550h.jpg', 1, '2019-11-24 06:37:53', '2019-11-24 06:37:53'),
(28, 8, 'img/product/images.jpg', 0, '2019-11-24 06:51:11', '2019-11-24 06:51:11'),
(29, 9, 'img/product/download_(1)1.jpg', 0, '2019-11-24 23:08:01', '2019-11-24 23:08:01'),
(30, 10, 'img/product/modern-trouser-19-6.jpg', 0, '2019-11-24 23:37:30', '2019-11-24 23:37:30'),
(31, 8, 'img/product/images1.jpg', 1, '2019-11-24 23:56:08', '2019-11-24 23:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sleeveless', '2019-11-14 06:44:29', NULL),
(2, 1, 'Jeans', '2019-11-14 06:44:29', NULL),
(3, 3, 'Imported', '2019-11-14 06:44:29', NULL),
(4, 1, 'pajama', '2019-11-24 11:01:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(12) NOT NULL,
  `type_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Clothings', '2019-11-14 06:44:00', NULL),
(2, 'Grocery', '2019-11-14 06:44:00', NULL),
(3, 'Fitness', '2019-11-25 01:32:14', '2019-11-25 01:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `size_color`
--

CREATE TABLE `size_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `qt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_color`
--

INSERT INTO `size_color` (`id`, `product_id`, `size`, `color`, `qt`, `created_at`, `updated_at`) VALUES
(1, 1, 'S', 'White', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'M', 'Red', 14, '2019-11-06 00:23:57', '0000-00-00 00:00:00'),
(3, 2, 'S', 'Black', 50, '2019-11-06 00:34:14', '0000-00-00 00:00:00'),
(4, 1, 'S', 'Grey', 2, '2019-11-06 00:39:54', '0000-00-00 00:00:00'),
(5, 3, '34', 'Blue', 4, '2019-11-06 04:35:55', '0000-00-00 00:00:00'),
(6, 3, '36', 'Grey', 5, '2019-11-06 04:36:18', '0000-00-00 00:00:00'),
(7, 6, 'L', 'Blue', 20, '2019-11-19 03:07:51', '2019-11-19 03:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `location` text NOT NULL,
  `email_verification` text NOT NULL,
  `nid` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `username`, `password`, `email`, `phone`, `location`, `email_verification`, `nid`, `active`, `created_at`, `updated_at`) VALUES
(1, 'shafiq123', '123456', 'shafiq123@gmail.com', '01752872223', 'Lakeview Abashik', 'verified', '9999000998888', 1, '2019-11-14 06:43:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_name`
--
ALTER TABLE `brand_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_color`
--
ALTER TABLE `size_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_name`
--
ALTER TABLE `brand_name`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size_color`
--
ALTER TABLE `size_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
