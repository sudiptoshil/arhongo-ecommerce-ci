-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2019 at 03:36 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arhongo_ecommerce`
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
  `admin` tinyint(1) NOT NULL DEFAULT '1',
  `logged_in` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `photo` text,
  `present_address` text,
  `permanent_address` text,
  `holding_no` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `user_name`, `email`, `contact_no`, `national_id`, `password`, `photo`, `present_address`, `permanent_address`, `holding_no`, `status`, `created_at`, `updated_at`, `trash`) VALUES
(1, 'Azam Hossen', 'azam', 'azam@gmail.com', '01815236521', '111444555', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image1.png', 'Nasirabad Chittagong', 'Coxbazar Bangladesh', '111/222', 1, '2019-11-14 06:46:36', NULL, 0),
(2, 'Mirza Galib', 'galib', 'galib@gmail.com', '01715236214', '555222333666', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image.png', 'Muradpur Chittagong', 'Dhaka Bangladesh', '85/83', 1, '2019-11-14 06:46:36', NULL, 0),
(3, 'Jamal Khan', 'jamal', 'jamal@gmail.com', '01785232658', '33439990155', 'e10adc3949ba59abbe56e057f20f883e', 'Network-Profile.png', '3/11 Jamalkhan Chittagong', '33/1 Chawkbazar Chittagong', '34/41', 1, '2019-11-18 04:40:13', NULL, 0),
(4, 'cursor', 'cursor', 'cursor@gmail.com', '22', 'null', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'xyz', 'xyz 2', 'null', 1, '2019-11-27 11:10:32', NULL, 0);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `product_quantity`, `product_unite_price`, `unit_x_quantity_price`, `invoice_type`, `to_delivery`, `created_at`, `updated_at`, `trash`) VALUES
(1, 1, 4, 2, 900, 1800, NULL, NULL, '2019-11-16 10:33:56', NULL, 0),
(2, 2, 4, 1, 900, 900, NULL, NULL, '2019-11-16 11:13:14', NULL, 0),
(3, 2, 1, 1, 50, 50, NULL, NULL, '2019-11-16 11:13:14', NULL, 0),
(4, 2, 2, 3, 90, 270, NULL, NULL, '2019-11-16 11:13:14', NULL, 0),
(5, 3, 1, 1, 50, 50, NULL, NULL, '2019-11-17 10:28:52', NULL, 0),
(6, 3, 2, 1, 90, 90, NULL, NULL, '2019-11-17 10:28:52', NULL, 0),
(7, 4, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:51:59', NULL, 0),
(8, 4, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:51:59', NULL, 0),
(9, 4, 4, 1, 900, 900, NULL, NULL, '2019-11-18 04:51:59', NULL, 0),
(10, 4, 3, 1, 720, 720, NULL, NULL, '2019-11-18 04:51:59', NULL, 0),
(11, 5, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:56:49', NULL, 0),
(12, 5, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:56:50', NULL, 0),
(13, 6, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:01:21', NULL, 0),
(14, 7, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:08:46', NULL, 0),
(15, 8, 2, 4, 90, 360, NULL, NULL, '2019-11-18 05:09:54', NULL, 0),
(16, 8, 1, 4, 50, 200, NULL, NULL, '2019-11-18 05:09:54', NULL, 0),
(17, 9, 2, 1, 90, 90, NULL, NULL, '2019-11-18 05:26:05', NULL, 0),
(18, 9, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:26:05', NULL, 0),
(19, 10, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:35:11', NULL, 0),
(20, 11, 27, 1, 120, 120, NULL, NULL, '2019-11-27 06:04:55', NULL, 0),
(21, 11, 31, 1, 1500, 1500, NULL, NULL, '2019-11-27 06:04:55', NULL, 0),
(22, 12, 25, 2, 720, 1440, NULL, NULL, '2019-11-27 14:29:49', NULL, 0),
(23, 13, 25, 2, 720, 1440, NULL, NULL, '2019-11-27 14:41:57', NULL, 0),
(24, 13, 26, 2, 340, 680, NULL, NULL, '2019-11-27 14:41:57', NULL, 0),
(25, 14, 26, 2, 340, 680, NULL, NULL, '2019-11-27 14:44:22', NULL, 0),
(26, 14, 31, 2, 1500, 3000, NULL, NULL, '2019-11-27 14:44:22', NULL, 0),
(27, 14, 27, 2, 120, 240, NULL, NULL, '2019-11-27 14:44:22', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `order_type` int(11) DEFAULT NULL COMMENT '1=cash on delivery; 2 = Bkash',
  `coupon` varchar(100) DEFAULT NULL,
  `total_cost` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = pending; 2=accepted; 3=cancelled',
  `delivered` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `transaction_id`, `order_type`, `coupon`, `total_cost`, `payment_method`, `delivery_location`, `status`, `delivered`, `created_at`, `updated_at`, `date`, `trash`) VALUES
(1, 1, 'iiiieee', NULL, 'eeeiiii', 1800, 2, 'Uttara Dhaka', 2, 0, '2019-11-16 10:33:56', NULL, '0000-00-00', 0),
(2, 1, '666333', NULL, '555222', 1220, 2, 'Nasirabad CTG', 3, 0, '2019-11-16 11:13:14', NULL, '0000-00-00', 0),
(3, 1, 'ffffffe33333', NULL, '33333', 140, 2, 'Nasirabad Chittagong', 1, 0, '2019-11-17 10:28:52', NULL, '0000-00-00', 0),
(4, 3, 'AAABBBCCC111', NULL, '33AAA', 1760, 2, '3/11 Jamalkhan Chittagong', 1, 0, '2019-11-18 04:51:59', NULL, '0000-00-00', 0),
(5, 3, 'dd111', NULL, '', 140, 2, '3/11 Jamalkhan Chittagong', 1, 0, '2019-11-18 04:56:49', NULL, '0000-00-00', 0),
(6, 3, '', NULL, '', 1800, 1, '3/11 Jamalkhan Chittagong', 1, 0, '2019-11-18 05:01:21', NULL, '0000-00-00', 0),
(7, 3, '6985412', NULL, 'ABCDEFG', 1800, 2, '24/4 Bahaddarhat Chittagong\r\nPhone :  0181520343', 1, 0, '2019-11-18 05:08:46', NULL, '0000-00-00', 0),
(8, 3, '', NULL, '147abc', 560, 1, '33/4 Oxygen Chittagong', 1, 0, '2019-11-18 05:09:53', NULL, '0000-00-00', 0),
(9, 3, '', NULL, '', 140, 1, 'Nasirabad Chittagong\r\nPhone : 01815236521', 1, 0, '2019-11-18 05:26:04', NULL, '0000-00-00', 0),
(10, 3, '', NULL, '', 50, 1, '3/11 Jamalkhan Chittagong', 1, 0, '2019-11-18 05:35:11', NULL, '0000-00-00', 0),
(11, 1, '', NULL, '', 1620, 1, 'Nasirabad Chittagong', 1, 0, '2019-11-27 06:04:55', NULL, '0000-00-00', 0),
(12, 1, '', NULL, '', 1440, 1, 'Nasirabad Chittagong', 1, 0, '2019-11-27 14:29:49', NULL, '0000-00-00', 0),
(13, 1, '', NULL, '', 2120, 1, 'Nasirabad Chittagong', 1, 0, '2019-11-27 14:41:57', NULL, '0000-00-00', 0),
(14, 1, '', NULL, '', 3920, 1, 'Nasirabad Chittagong', 1, 0, '2019-11-27 14:44:22', NULL, '0000-00-00', 0);

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `home_page` tinyint(1) NOT NULL DEFAULT '0',
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `type_id`, `category_name`, `home_page`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pant', 1, 'cotton-formal-pant-500x500.jpg', '2019-11-14 06:45:02', '2019-11-26 05:34:35'),
(2, 1, 'Torso', 0, 'download.jpg', '2019-11-14 06:45:02', '2019-11-26 05:29:14'),
(3, 2, 'Meat & Fish', 0, 'fish_meat5.jpg', '2019-11-14 06:45:02', '2019-11-26 05:34:43'),
(5, 3, 'Gym Instrument', 0, 'dumbbell-set-5kg-black.jpg', '2019-11-25 01:37:04', '2019-11-27 09:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `featured_image` tinyint(1) NOT NULL DEFAULT '0',
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) NOT NULL,
  `content` text,
  `status` int(11) DEFAULT '1' COMMENT '1 = active; 0 = deactive',
  `trash` int(11) NOT NULL DEFAULT '0' COMMENT '1 = trash; 0 = not in trash',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_image`, `content`, `status`, `trash`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Slider One', 'ban01.png', 'Description for Slider One', 1, 0, 0, '2019-11-27 12:59:45', NULL),
(2, 'Slider Two', 'features_sports.jpg', 'Description for Slider Two', 1, 0, 0, '2019-11-27 13:00:06', NULL),
(3, 'Slider Three', 'slider_02.png', 'Description for Slider Three', 1, 0, 0, '2019-11-27 13:00:23', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
