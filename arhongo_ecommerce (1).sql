-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 04:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
(4, 1, 'Arong', '2019-11-24 06:45:07', '2019-11-24 06:45:07'),
(5, 1, 'Samsung', '2019-12-07 08:57:38', '2019-12-07 08:57:38');

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
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `user_name`, `email`, `contact_no`, `national_id`, `password`, `photo`, `present_address`, `permanent_address`, `status`, `created_at`, `updated_at`, `trash`) VALUES
(1, 'Azam Hossen', 'azam', 'azam@gmail.com', '01815236521', '111444555', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image1.png', 'Nasirabad Chittagong', 'Coxbazar Bangladesh', 1, '2019-11-14 06:46:36', NULL, 0),
(2, 'Mirza Galib', 'galib', 'galib@gmail.com', '01715236214', '555222333666', 'e10adc3949ba59abbe56e057f20f883e', 'Swimming-Pool-Ball-PNG-Image.png', 'Muradpur Chittagong', 'Dhaka Bangladesh', 1, '2019-11-14 06:46:36', NULL, 0),
(3, 'Jamal Khan', 'jamal', 'jamal@gmail.com', '01785232658', '33439990155', 'e10adc3949ba59abbe56e057f20f883e', 'Network-Profile.png', '3/11 Jamalkhan Chittagong', '33/1 Chawkbazar Chittagong', 1, '2019-11-18 04:40:13', NULL, 0),
(4, 'cursor', 'cursor', 'cursor@gmail.com', '22', 'null', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'xyz', 'xyz 2', 1, '2019-11-27 11:10:32', NULL, 0),
(5, 'Dr. Kamal Khan', 'kamal', 'kamal@gmail.com', '01815236521', '111555999', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chittagong', 'Chittagong', 1, '2019-12-01 04:37:21', NULL, 0);

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
  `to_delivery` tinyint(1) DEFAULT NULL COMMENT 'delivery status	',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `product_quantity`, `product_unite_price`, `unit_x_quantity_price`, `invoice_type`, `to_delivery`, `created_at`, `date`, `status`, `updated_at`, `trash`) VALUES
(1, 1, 4, 2, 900, 1800, NULL, NULL, '2019-11-16 10:33:56', '0000-00-00', 1, NULL, 0),
(2, 2, 4, 1, 900, 900, NULL, NULL, '2019-11-16 11:13:14', '0000-00-00', 1, NULL, 0),
(3, 2, 1, 1, 50, 50, NULL, NULL, '2019-11-16 11:13:14', '0000-00-00', 1, NULL, 0),
(4, 2, 2, 3, 90, 270, NULL, NULL, '2019-11-16 11:13:14', '0000-00-00', 1, NULL, 0),
(5, 3, 1, 1, 50, 50, NULL, NULL, '2019-11-17 10:28:52', '0000-00-00', 1, NULL, 0),
(6, 3, 2, 1, 90, 90, NULL, NULL, '2019-11-17 10:28:52', '0000-00-00', 1, NULL, 0),
(7, 4, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:51:59', '0000-00-00', 1, NULL, 0),
(8, 4, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:51:59', '0000-00-00', 1, NULL, 0),
(9, 4, 4, 1, 900, 900, NULL, NULL, '2019-11-18 04:51:59', '0000-00-00', 1, NULL, 0),
(10, 4, 3, 1, 720, 720, NULL, NULL, '2019-11-18 04:51:59', '0000-00-00', 1, NULL, 0),
(11, 5, 1, 1, 50, 50, NULL, NULL, '2019-11-18 04:56:49', '0000-00-00', 1, NULL, 0),
(12, 5, 2, 1, 90, 90, NULL, NULL, '2019-11-18 04:56:50', '0000-00-00', 1, NULL, 0),
(13, 6, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:01:21', '0000-00-00', 1, NULL, 0),
(14, 7, 4, 2, 900, 1800, NULL, NULL, '2019-11-18 05:08:46', '0000-00-00', 1, NULL, 0),
(15, 8, 2, 4, 90, 360, NULL, NULL, '2019-11-18 05:09:54', '0000-00-00', 1, NULL, 0),
(16, 8, 1, 4, 50, 200, NULL, NULL, '2019-11-18 05:09:54', '0000-00-00', 1, NULL, 0),
(17, 9, 2, 1, 90, 90, NULL, NULL, '2019-11-18 05:26:05', '0000-00-00', 1, NULL, 0),
(18, 9, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:26:05', '0000-00-00', 1, NULL, 0),
(19, 10, 1, 1, 50, 50, NULL, NULL, '2019-11-18 05:35:11', '0000-00-00', 1, NULL, 0),
(20, 11, 5, 1, 340, 340, NULL, NULL, '2019-12-02 05:50:04', '0000-00-00', 1, NULL, 0),
(21, 11, 7, 1, 120, 120, NULL, NULL, '2019-12-02 05:50:04', '0000-00-00', 1, NULL, 0),
(22, 11, 9, 1, 2000, 2000, NULL, NULL, '2019-12-02 05:50:04', '0000-00-00', 1, NULL, 0),
(23, 12, 3, 2, 720, 1440, NULL, NULL, '2019-12-07 10:41:16', '0000-00-00', 1, NULL, 0),
(24, 12, 7, 2, 120, 240, NULL, NULL, '2019-12-07 10:41:16', '0000-00-00', 1, NULL, 0),
(25, 13, 7, 1, 120, 120, NULL, NULL, '2019-12-07 11:11:11', '0000-00-00', 1, NULL, 0),
(26, 13, 8, 2, 1500, 3000, NULL, NULL, '2019-12-07 11:11:11', '0000-00-00', 1, NULL, 0),
(27, 14, 5, 3, 340, 1020, NULL, NULL, '2019-12-07 17:49:13', '0000-00-00', 1, NULL, 0),
(28, 14, 3, 3, 720, 2160, NULL, NULL, '2019-12-07 17:49:13', '0000-00-00', 1, NULL, 0),
(29, 15, 7, 1, 120, 120, NULL, NULL, '2019-12-07 11:52:44', '0000-00-00', 1, NULL, 0),
(30, 15, 5, 1, 340, 340, NULL, NULL, '2019-12-07 11:52:44', '0000-00-00', 1, NULL, 0),
(31, 15, 8, 1, 1500, 1500, NULL, NULL, '2019-12-07 11:52:44', '0000-00-00', 1, NULL, 0),
(32, 15, 3, 1, 720, 720, NULL, NULL, '2019-12-07 11:52:44', '0000-00-00', 1, NULL, 0);

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
(11, 4, '', NULL, '', 2460, 1, 'xyz', 1, 0, '2019-12-02 05:50:04', NULL, '0000-00-00', 0),
(12, 1, '', NULL, '', 1680, 1, 'Nasirabad Chittagong', 1, 0, '2019-12-07 10:41:16', NULL, '0000-00-00', 0),
(13, 1, '', NULL, '', 3120, 1, 'Nasirabad Chittagong', 1, 0, '2019-12-07 11:11:11', NULL, '0000-00-00', 0),
(14, 1, 'qqq111', NULL, '', 3180, 2, 'Nasirabad Chittagong', 1, 0, '2019-12-07 11:49:13', NULL, '0000-00-00', 0),
(15, 1, '', NULL, '', 2680, 1, 'Nasirabad Chittagong', 1, 0, '2019-12-07 17:52:44', NULL, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `display_price` float NOT NULL,
  `sell_unit` varchar(10) NOT NULL DEFAULT '0',
  `product_quantity` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) DEFAULT '0',
  `sc` tinyint(1) NOT NULL DEFAULT '0',
  `currency` varchar(10) NOT NULL,
  `sell_status` int(1) NOT NULL DEFAULT '1' COMMENT '1=sellable,2=sold',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `img` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type_id`, `category_id`, `subcategory_id`, `brand_id`, `vendor_id`, `product_name`, `product_description`, `display_price`, `sell_unit`, `product_quantity`, `discount`, `sc`, `currency`, `sell_status`, `status`, `img`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, 1, 1, 'Sando', 'Sando shirt for summer', 50, 'piece', 0, 15, 1, 'BDT', 1, 1, '', '2019-11-16 07:38:35', '0000-00-00 00:00:00'),
(2, 1, 2, 1, 1, 1, 'Polo Sando', 'Casual Polo Sando for Summer', 90, 'Piece', 0, 25, 1, 'BDT', 1, 1, '', '2019-12-04 09:37:43', '2019-11-05 01:07:11'),
(3, 1, 1, 2, 1, 1, 'Jeans', 'Just a casual jeans pant', 720, 'Piece', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-06 04:34:32', '2019-11-06 04:34:32'),
(4, 2, 3, 3, 2, 1, 'Shark', 'Shark Meat', 900, 'kg', 22, 10, 0, 'BDT', 1, 1, '', '2019-11-16 04:42:05', '2019-11-09 06:55:39'),
(5, 1, 1, 2, 1, 1, 'Half Pant', 'Just a regular half pant', 340, 'Piece', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-18 23:49:57', '2019-11-18 23:49:57'),
(6, 1, 2, 2, 1, 1, 'Another Sample Product', 'Description for sample product', 340, 'Piece', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-19 03:03:57', '2019-11-19 03:03:57'),
(7, 1, 1, 2, 1, 1, 'Sample Product', 'Description Sample', 120, 'Piece', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-19 07:05:10', '2019-11-19 07:05:10'),
(8, 1, 1, 4, 4, 1, 'Men\'s Blue Glenplaid Shirt and Pants Pajama Set', 'A great combination for at-home wear, this lightweight Club Room pajama set is a smart choice for any guy.\r\n\r\nClub Room men\'s pajamas\r\nShirt: spread collar, button-down front, chest pocket, buttoned cuffs, striped throughout\r\nPants: elastic waistband with snaps\r\nAll cotton\r\nMachine washable\r\nImported\r\nSavings Based On Offering Prices, Not Actual Sales\r\nWeb ID: 612382', 1500, '1', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-24 06:51:11', '2019-11-24 06:51:11'),
(9, 1, 1, 2, 3, 1, 'Test Product', 'ddddddddd', 2000, '1', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-24 23:08:01', '2019-11-24 23:08:01'),
(10, 1, 1, 3, 3, 1, 'Cargo Pant', 'Originally made for the military in the 1930s, cargo pants are rugged cotton pants with multiple large pockets traditionally used to hold field dressings and other equipment.', 800, '1', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-24 23:37:30', '2019-11-24 23:37:30'),
(11, 1, 1, 2, 3, 1, 'Skinny Jeans Pants', '\r\n    Imported\r\n    Soft material to wear which make your boy feel comfortable and snug\r\n    Skinny fit casual style with simple clean cutting to show your boy\'s charming\r\n    Unique design with bright colors can keep your boy\'s fashion\r\n    A nice gift to make your boy happy or surprise and increase self-confidence\r\n    Good looking and suitable for boy\'s ages between 5-16 years old\r\n', 2000, '1', 0, NULL, 1, 'BDT', 1, 1, '', '2019-11-30 09:28:29', '2019-11-30 09:28:29'),
(12, 0, 10, 0, 4, 1, 'Red Aloha Men Shirt', 'Beautiful Hawaiian Shirt made of 100% Cotton. Available in sizes S-3XL. Hawaiian Shirt Aloha Shirt in Red Hibiscus\r\nCountry of Origin:  USA or Imported', 1600, '1', 0, 12, 0, 'BDT', 1, 1, '', '2019-12-04 06:10:57', '2019-12-04 06:10:57'),
(13, 0, 16, 0, 5, 1, 'Samsung J6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', 20000, '1', 0, 0, 0, 'BDT', 1, 1, '', '2019-12-07 09:01:25', '2019-12-07 09:01:25'),
(14, 0, 19, 0, 2, 1, 'Walton', 'ddd', 10000, 'pcs', 1000, 0, 0, 'BDT', 1, 1, '', '2019-12-22 17:31:42', '2019-12-22 17:31:42'),
(15, 0, 20, 0, 5, 1, 'Walton Mobile', 'jjjjj', 1200, 'pcs', 5, 10, 0, 'BDT', 1, 1, 'icons8-purchase-order-64.png', '2019-12-23 18:05:25', '2019-12-23 17:45:39'),
(16, 0, 20, 0, 5, 1, 'Walton Mobile pro', 'hhhh', 10000, 'pcs', 77, 0, 0, 'BDT', 1, 1, '041.jpg', '2019-12-23 18:08:38', '2019-12-23 18:08:38'),
(17, 0, 19, 0, 5, 1, 'Walton Mobile 3', 'hhhh', 1200, 'pcs', 8, 0, 0, 'BDT', 1, 1, 'army_half_pant-550x550h1.jpg', '2019-12-23 18:14:35', '2019-12-23 18:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `root_id` int(11) DEFAULT '0',
  `category_link` text NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `category_name` varchar(20) NOT NULL,
  `home_page` tinyint(1) NOT NULL DEFAULT '0',
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `root_id`, `category_link`, `type_id`, `category_name`, `home_page`, `category_image`, `created_at`, `updated_at`, `trash`, `status`) VALUES
(1, 0, 'promotional_product', 1, 'Dress', 1, 'cotton-formal-pant-500x500.jpg', '2019-11-14 06:45:02', '2019-12-05 11:58:43', 0, 1),
(2, 0, '', 1, 'Torso', 0, 'download.jpg', '2019-11-14 06:45:02', '2019-11-26 05:29:14', 0, 1),
(3, 0, '', 2, 'Meat & Fish', 0, 'fish_meat5.jpg', '2019-11-14 06:45:02', '2019-11-26 05:34:43', 0, 1),
(5, 0, '', 3, 'Gym Instrument', 0, 'features_sports.jpg', '2019-11-25 01:37:04', '2019-12-05 11:58:55', 0, 1),
(6, 5, '', NULL, 'Cardio Machines', 0, 'cardio1.jpg', '2019-12-03 04:54:29', '2019-12-03 04:54:29', 0, 1),
(7, 1, '', NULL, 'Men', 0, 'cotton-formal-pant-500x5001.jpg', '2019-12-03 05:59:54', '2019-12-03 05:59:54', 0, 1),
(8, 1, '', NULL, 'Kids', 0, 'kids_pant.jpg', '2019-12-03 06:01:22', '2019-12-03 06:03:52', 0, 1),
(9, 7, '', NULL, 'Shirt', 0, '41TxNIo3cQL.jpg', '2019-12-03 06:59:35', '2019-12-03 06:59:35', 0, 1),
(10, 9, '', NULL, 'Aloha Shirt', 0, '81rFAPY2XBL__UX679_.jpg', '2019-12-03 09:49:27', '2019-12-03 09:49:27', 0, 1),
(11, 9, '', NULL, 'Army Combat Shirt', 0, 'rBVaWFzoogCAZwAtAAWwdvmH_zU286.jpg', '2019-12-03 09:50:06', '2019-12-03 09:50:06', 0, 1),
(12, 7, '', NULL, 'Pant', 0, 'download_(1).jpg', '2019-12-03 09:50:57', '2019-12-03 09:50:57', 0, 1),
(13, 8, '', NULL, 'Shirt', 0, 'LCJMMO-Summer-Boys-Shirt-Cartoon-Print-Kids-Shirts-Fashion-Cotton-Soft-Short-Sleeve-Baby-Boy-Shirt.jpg', '2019-12-03 10:45:58', '2019-12-03 10:45:58', 0, 1),
(14, 0, '', NULL, 'Electronics', 1, 'Festive-season-Amazing-deals-Gadgets-Electronics.jpg', '2019-12-05 09:54:49', '2019-12-05 11:42:49', 0, 1),
(15, 0, '', NULL, 'Pet', 0, 'KittenAndChick_jpg_560x0_q80_crop-smart.jpg', '2019-12-07 08:06:26', '2019-12-07 08:06:26', 0, 1),
(16, 14, '', NULL, 'Mobile', 0, 'Realme_3i_cover_ndtv_1563458539417.jpg', '2019-12-07 08:57:08', '2019-12-07 08:57:08', 0, 1),
(17, 5, '', NULL, 'Cardio Machines 5', 0, 'cardio1.jpg', '2019-12-03 04:54:29', '2019-12-03 04:54:29', 0, 1),
(18, 0, 'electronics', NULL, 'Electronics', 0, '79336323_2669287633130470_8261243046939590656_n.jpg', '2019-12-22 17:29:09', '2019-12-22 17:29:09', 0, 1),
(19, 18, 'tv_all', NULL, 'TV', 0, '79336323_2669287633130470_8261243046939590656_n1.jpg', '2019-12-22 17:29:34', '2019-12-22 17:29:34', 0, 1),
(20, 18, 'tv_all', NULL, 'Mobile', 0, '79336323_2669287633130470_8261243046939590656_n1.jpg', '2019-12-22 17:29:34', '2019-12-22 17:29:34', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `featured_image` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_url`, `featured_image`, `status`, `created_at`, `updated_at`) VALUES
(21, 2, 'img/product/download.jpg', 1, 1, '2019-11-24 05:52:04', '2019-11-24 05:52:04'),
(23, 6, 'img/product/p331.jpg', 1, 1, '2019-11-24 05:54:36', '2019-11-24 05:54:36'),
(24, 4, 'img/product/s.jpg', 1, 1, '2019-11-24 05:56:00', '2019-11-24 05:56:00'),
(25, 3, 'img/product/download_(1).jpg', 1, 1, '2019-11-24 06:09:49', '2019-11-24 06:09:49'),
(26, 5, 'img/product/half-pant-500x500.jpg', 1, 1, '2019-11-24 06:36:59', '2019-11-24 06:36:59'),
(27, 7, 'img/product/army_half_pant-550x550h.jpg', 1, 1, '2019-11-24 06:37:53', '2019-11-24 06:37:53'),
(28, 8, 'img/product/images.jpg', 0, 1, '2019-11-24 06:51:11', '2019-11-24 06:51:11'),
(29, 9, 'img/product/download_(1)1.jpg', 0, 1, '2019-11-24 23:08:01', '2019-11-24 23:08:01'),
(30, 10, 'img/product/modern-trouser-19-6.jpg', 0, 1, '2019-11-24 23:37:30', '2019-11-24 23:37:30'),
(31, 8, 'img/product/images1.jpg', 1, 1, '2019-11-24 23:56:08', '2019-11-24 23:56:08'),
(32, 11, 'img/product/81nFLEYl3KL__UY606_.jpg', 0, 1, '2019-11-30 09:28:29', '2019-11-30 09:28:29'),
(33, 12, 'img/product/82918c64-d1fa-4c88-91c5-37f2a89635ee_1_4422844e6127903be2c46a455bd6b99a1.jpeg', 1, 1, '2019-12-04 06:10:57', '2019-12-04 06:10:57'),
(34, 13, 'img/product/samsung-galaxy-j6-j600-1.jpg', 1, 1, '2019-12-07 09:01:25', '2019-12-07 09:01:25'),
(35, 14, 'img/product/order.png', 1, 1, '2019-12-22 17:31:42', '2019-12-22 17:31:42'),
(36, 15, 'img/product/icons8-purchase-order-64.png', 1, 1, '2019-12-23 17:45:39', '2019-12-23 17:45:39'),
(37, 16, 'img/product/041.jpg', 1, 1, '2019-12-23 18:08:38', '2019-12-23 18:08:38'),
(38, 17, 'img/product/army_half_pant-550x550h1.jpg', 1, 1, '2019-12-23 18:14:35', '2019-12-23 18:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `sub_cat_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`id`, `category_id`, `subcategory_name`, `sub_cat_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sleeveless', '04.jpg', '2019-11-14 06:44:29', NULL),
(2, 1, 'Jeans', 'download_(1).jpg', '2019-11-14 06:44:29', NULL),
(3, 3, 'Imported', 's2.jpg', '2019-11-14 06:44:29', NULL),
(4, 1, 'pajama', 'cotton-formal-pant-500x500.jpg', '2019-11-24 11:01:51', NULL),
(5, 1, 'Sub Category One', 'download_(2).jpg', '2019-11-28 12:55:09', NULL);

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
(1, 'Slider One', '1619404728_big.jpg', 'Description for slider one', 1, 0, 0, '2019-11-28 12:06:05', NULL),
(2, 'Slider Two', '56472486_big.jpg', 'Description for slider two', 1, 0, 0, '2019-11-28 12:07:06', NULL),
(3, 'Slider Three', '1943768047_big.jpg', 'Description for slider three', 1, 0, 0, '2019-11-28 12:07:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `customer_id`, `pid`, `rating`, `text`, `date_time`) VALUES
(17, 66, 15, 4, 'vg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `reg_id` int(11) NOT NULL,
  `utype` int(1) NOT NULL DEFAULT '3' COMMENT '1=admin,2=reseller,3=user',
  `status` int(11) NOT NULL DEFAULT '1',
  `trash` int(11) NOT NULL DEFAULT '0',
  `mobile_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) NOT NULL,
  `password` text,
  `pass_hash` text NOT NULL,
  `ref_id` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `address` text NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`reg_id`, `utype`, `status`, `trash`, `mobile_no`, `email`, `f_name`, `l_name`, `password`, `pass_hash`, `ref_id`, `date_time`, `address`, `profile_image`) VALUES
(8, 1, 1, 0, '01837021749', '', 'Md Al Amin', '', 'fd4f2e3cf8335db7c051ac346029a64322e5860684d1d5e81fa175a2e919d5a9fcbe94e767bbdfb4c74ada1c2db5448fd8ee353effd5f9e0384cc9ea7aea5982Z2Cy9JP3Z2ZtoEJYdX89qU/mDnv+sjx3sm4y3XI+O7o=', '', '0', '0000-00-00 00:00:00', '', ''),
(9, 2, 1, 0, '01837021748', '', 'md harun', '', 'f346c48d0cbb5dd5dcb8d37d90955fb32fa198c2ca990904e0374b69628f20b18b86dfaaeef89c7267a0c35f7670a94f0585e9897e7481f3d3252e6857af5929fu8n1VplNU6veKPqAFL5jvirFjHQUfXkd+bkxNDZWYg=', '', '8', '2019-12-26 08:22:14', '', '');

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
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`reg_id`);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
