-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 11:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gira_ict`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `created_at`) VALUES
(1, 1, '2024-09-28 09:01:40'),
(2, 4, '2024-09-30 05:10:59'),
(4, 5, '2024-09-30 08:59:59'),
(5, 7, '2024-09-30 09:31:41'),
(6, 8, '2024-09-30 09:39:28'),
(7, 9, '2024-09-30 09:40:59'),
(8, 10, '2024-09-30 09:47:45'),
(9, 11, '2024-09-30 14:06:59'),
(10, 12, '2024-10-01 08:26:19'),
(11, 13, '2024-10-14 14:18:33'),
(12, 14, '2024-11-13 16:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `cart_id`, `product_id`, `quantity`) VALUES
(71, 11, 12, 1),
(105, 12, 34, 1),
(106, 12, 60, 1),
(107, 10, 36, 1),
(108, 10, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `created_at`) VALUES
(8, 'Laptops', 'Gamming Pc\'s', '2024-09-20 13:25:17'),
(11, 'Cameras', 'Camera category', '2024-09-24 13:21:31'),
(13, 'Phones', 'Mobile phones', '2024-09-24 13:22:21'),
(14, 'Screens', 'Monitor screens', '2024-09-25 10:19:45'),
(15, 'Pc Stands', 'Computer and tablet stands', '2024-09-25 10:20:16'),
(16, 'Televisions', 'Small and large size television screens', '2024-09-25 10:20:45'),
(17, 'Head Phones', 'Head phone for music and other sounds', '2024-09-25 10:21:14'),
(18, 'Speakers', 'speakers for sounds', '2024-09-25 10:21:57'),
(19, 'Home utils', 'Home utils for daily basis', '2024-09-25 10:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `message_id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `names`, `email`, `subject`, `message`) VALUES
(1, 'Mugisha Clement', 'clement23@gmail.com', 'Suppport', 'I can\'t receive my email confirmation code?'),
(2, 'Kameura Hetty', 'hetty@gmail.com', 'Suppport', 'I can\'t receive my email confirmation code?');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feed_id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feed_id`, `names`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'sam name', 'loic@gmail.com', 'Unspecified', 'Lorem ipum good job', '2024-11-15'),
(2, 'Loic', 'loic@gmail.com', 'None', 'lorem', '2024-11-15'),
(5, 'Mucyo Jules', 'jule@gmail.com', 'None', 'We’re here to help! Whether you have questions about courses, technical support, or partnership opportunities, feel free to reach out..', '2024-11-15'),
(7, 'Samuel', 'samniz.350@gmail.com', 'None', 'This web is great', '2024-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `flutter_wave_payment`
--

CREATE TABLE `flutter_wave_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `anonymus_order` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT 'flutter_wave',
  `amount` float NOT NULL,
  `payment_status` enum('completed','pending') DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','shipped','delivered','cancelled') DEFAULT 'pending',
  `canceled` varchar(100) NOT NULL DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `status`, `canceled`, `created_at`) VALUES
(18, 14, 1.00, 'pending', 'false', '2024-11-14 11:30:55'),
(19, 14, 1.00, 'pending', 'false', '2024-11-14 11:31:09'),
(20, 14, 1.00, 'pending', 'false', '2024-11-14 11:31:50'),
(21, 14, 1.00, 'pending', 'false', '2024-11-14 11:31:55'),
(22, 14, 1.00, 'pending', 'false', '2024-11-14 11:32:13'),
(23, 14, 1.00, 'pending', 'true', '2024-11-14 11:32:50'),
(24, 12, 1.00, 'pending', 'false', '2024-11-14 11:34:24'),
(25, 14, 1.00, 'pending', 'false', '2024-11-14 11:36:48'),
(26, 12, 1.00, 'pending', 'false', '2024-11-14 11:42:42'),
(27, 12, 1.00, 'pending', 'false', '2024-11-14 11:43:30'),
(28, 12, 1.00, 'delivered', 'false', '2024-11-14 12:01:23'),
(29, 14, 1.00, 'pending', 'false', '2024-11-15 04:11:27'),
(30, 14, 1.00, 'pending', 'false', '2024-11-18 10:06:24'),
(31, 1, 1.00, 'delivered', 'false', '2024-11-19 13:30:27'),
(32, 14, 1.00, 'pending', 'false', '2024-11-19 14:46:20'),
(34, 14, 1.00, 'pending', 'false', '2024-11-23 23:18:58'),
(35, 14, 1.00, 'pending', 'false', '2024-11-23 23:27:59'),
(36, 14, 1.00, 'pending', 'false', '2024-11-23 23:31:18'),
(37, 14, 1.00, 'pending', 'false', '2024-11-23 23:31:40'),
(38, 14, 1.00, 'pending', 'false', '2024-11-23 23:33:18'),
(39, 14, 1.00, 'pending', 'false', '2024-11-23 23:35:13'),
(40, 14, 1.00, 'pending', 'false', '2024-11-23 23:41:32'),
(41, 14, 1.00, 'pending', 'false', '2024-11-23 23:42:21'),
(42, 14, 1.00, 'pending', 'false', '2024-11-23 23:42:59'),
(43, 14, 1.00, 'pending', 'false', '2024-11-23 23:43:46'),
(44, 14, 1.00, 'pending', 'false', '2024-11-23 23:46:28'),
(45, 14, 1.00, 'pending', 'false', '2024-11-23 23:50:10'),
(46, 14, 1.00, 'pending', 'false', '2024-11-23 23:54:47'),
(47, 14, 1.00, 'pending', 'false', '2024-11-23 23:54:47'),
(48, 14, 1.00, 'delivered', 'false', '2024-11-28 07:34:48'),
(49, 12, 1.00, 'pending', 'false', '2024-12-02 09:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(6, 23, NULL, 1, 890000.00),
(7, 24, 20, 1, 509000.00),
(8, 25, 21, 1, 780000.00),
(9, 26, NULL, 1, 890000.00),
(11, 28, 23, 3, 63000.00),
(12, 29, 60, 1, 150000.00),
(14, 31, 44, 5, 900000.00),
(15, 32, 60, 1, 150000.00),
(31, 45, NULL, 1, 78000.00),
(32, 45, NULL, 1, 315.00),
(34, 46, NULL, 1, 890000.00),
(35, 46, 34, 1, 89000.00),
(36, 47, NULL, 1, 890000.00),
(37, 47, 34, 1, 89000.00),
(38, 48, NULL, 1, 890000.00),
(39, 48, 34, 1, 89000.00),
(40, 49, 36, 1, 12000.00),
(41, 49, 37, 1, 35666.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','completed','failed') DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `anonymus_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_method`, `amount`, `payment_status`, `payment_date`, `anonymus_order`) VALUES
(70, 28, ' PDO', 63000.00, 'completed', '2024-11-25 10:01:01', NULL),
(75, 31, ' PDO', 900000.00, 'completed', '2024-11-25 10:07:24', NULL),
(85, NULL, ' PDO', 509000.00, 'completed', '2024-11-25 10:49:46', 11),
(99, NULL, ' PDO', 19000.00, 'completed', '2024-12-02 09:33:48', 4),
(100, NULL, ' PDO', 509000.00, 'completed', '2024-12-02 09:33:51', 12),
(101, NULL, ' PDO', 670000.00, 'completed', '2024-12-06 08:08:13', 2),
(102, NULL, ' PDO', 150000.00, 'completed', '2024-12-06 08:31:09', 14),
(103, NULL, ' PDO', 150000.00, 'completed', '2024-12-06 08:31:12', 13),
(104, 48, ' PDO', 89000.00, 'completed', '2024-12-06 08:31:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `in_stock` varchar(50) NOT NULL DEFAULT 'false',
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(100) NOT NULL DEFAULT 3,
  `product_brand` varchar(200) NOT NULL DEFAULT 'Unspecified',
  `product_description` text DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `color` varchar(200) NOT NULL DEFAULT 'Unspecified',
  `product_material` varchar(255) NOT NULL DEFAULT 'Unspecified',
  `country_of_origin` varchar(200) NOT NULL DEFAULT 'Unspecified',
  `condition` varchar(200) NOT NULL DEFAULT 'Unspecified',
  `size` varchar(255) NOT NULL DEFAULT 'Unspecified',
  `included_materials` varchar(255) NOT NULL DEFAULT 'Unspecified',
  `image_url` varchar(255) DEFAULT NULL,
  `product_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `stock_id`, `in_stock`, `product_name`, `product_quantity`, `product_brand`, `product_description`, `price`, `color`, `product_material`, `country_of_origin`, `condition`, `size`, `included_materials`, `image_url`, `product_created_at`) VALUES
(12, 8, 2, 'false', 'Jonas Mccarty', 0, 'Unspecified', 'Laboriosam id rerum', 195.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'screen.jpg', '2024-09-21 20:42:42'),
(20, 8, 6, 'false', 'Fay Page', 0, 'Unspecified', 'Quidem eligendi nost', 509000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', '3f800fd6-16cf-4741-8b52-3eb17e7b55b0.jpg', '2024-09-25 10:28:54'),
(21, 8, 7, 'false', 'Catherine Serrano', 0, 'Unspecified', 'Incididunt debitis r', 780000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'MacBook Air 13 (2018-2019) Skins - Custom _ Body + Keyboard Surround.jpg', '2024-09-25 10:32:49'),
(22, 8, 9, 'false', 'Rhea Harris', 0, 'Unspecified', 'Inventore aliqua Mi', 45000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Top 10 Best Laptops for Photo Editing.jpg', '2024-09-25 10:34:20'),
(23, 8, 10, 'false', 'Griffin Anderson', 0, 'Unspecified', 'Sunt corrupti cupi', 63000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Best Laptop For Travelers 2019 - How to Choose the Best Travel Laptop.jpg', '2024-09-25 10:35:09'),
(24, 8, 2, 'false', 'Kerry Reilly', 0, 'Unspecified', 'Accusantium dolor qu', 687000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Lenovo 15_6_ High Performance Laptop Giveaway • Steamy Kitchen Recipes Giveaways.jpg', '0000-00-00 00:00:00'),
(25, 8, 11, 'false', 'Stuw2w2art Day', 0, 'Unspecified', 'Veritatis enim tempo', 980000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'samsung.jpg', '2024-09-25 10:40:13'),
(26, 8, 7, 'false', 'Lane Reed', 0, 'Unspecified', 'Incidunt eos velit ', 500000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'MacBook Pro 16 (2021, M1) skins - Custom _ Bottom.jpg', '2024-09-25 10:44:40'),
(27, 8, 7, 'false', 'Brady Keller', 0, 'Unspecified', 'Aliquam velit quis o', 690000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'MacBook Air 13 Skins (Late 2010-2018) - Custom _ Accent.jpg', '2024-09-25 10:45:10'),
(28, 8, 8, 'false', 'Zeph Rhodes', 0, 'Unspecified', 'Ducimus quibusdam n', 1200000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'azus.jpg', '2024-09-25 10:46:20'),
(29, 15, 5, 'false', 'Sybill Oliver', 0, 'Unspecified', 'Ut sunt hic duis mol', 25000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'YOSHINE Adjustable La.jpg', '2024-09-25 10:47:35'),
(30, 15, 5, 'false', 'Kareem Jacobson', 0, 'Unspecified', 'Est vero rerum unde ', 19000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'weyg.jpg', '2024-09-25 10:57:51'),
(31, 15, 5, 'false', 'Debra Pope', 0, 'Unspecified', 'Aliquip et praesenti', 18000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Amazon_com_ Laptop Stand, Lamicall Laptop Riser….jpg', '2024-09-25 10:58:37'),
(34, 17, 7, 'false', 'Apple AirPods', 0, 'Unspecified', 'Apple AirPods Max Wireless Over-Ear Headphones', 89000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Apple AirPods Max Wireless Over-Ear Headphones.jpg', '2024-10-03 09:46:55'),
(36, 17, 5, 'true', 'JBL Tune 750BTNC', 2, 'Unspecified', 'JBL Tune 750BTNC Over-ear wireless Bluetooth noise-canceling headphones - Black.jpg', 12000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'JBL Tune 750BTNC Over-ear wireless Bluetooth noise-canceling headphones - Black.jpg', '2024-10-03 09:49:49'),
(37, 17, 8, 'true', 'Beat solo', 2, 'Unspecified', 'Black Azus Beat Solo', 35666.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Black Headphones 2 - Beats Solo 3.jpg', '2024-10-03 09:51:38'),
(38, 13, 7, 'false', 'iPhone 15 Pro', 0, 'Unspecified', 'Apple Iphone 15 Black Smartphone', 1290000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Apple Iphone 15 Black Smartphone PNG.jpg', '2024-10-03 09:53:18'),
(42, 13, 11, 'true', 'SAMSUNG Galaxy S24 Ultra ', 3, 'Unspecified', 'SAMSUNG Galaxy S24 Ultra Cell Phone, 256GB AI Smartphone, Unlocked Android, 200MP, 100x Zoom Cameras, Long Battery Life, S Pen, US Version, 2024, Titanium Black', 780000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'SAMSUNG Galaxy S24 Ultra Cell Phone, 256GB AI Smartphone, Unlocked Android, 200MP, 100x Zoom Cameras, Long Battery Life, S Pen, US Version, 2024, Titanium Black.jpg', '2024-10-03 10:05:39'),
(43, 13, 11, 'true', ' Samsung Galaxy S20', 3, 'Unspecified', 'Leaks Reveals The Design of the Samsung Galaxy S20 Ultra and Ultra 5G ', 670000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Leaks Reveal the Design of the Samsung Galaxy S20 Ultra and Ultra 5G _ Digital Trends.jpg', '2024-10-03 10:07:57'),
(44, 13, 11, 'false', 'Samsung Galaxy S24 Ultra', 0, 'Unspecified', 'Render of Samsung Galaxy S24 Ultra, closer to the real smartphone_ - Phonemantra', 900000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Render of Samsung Galaxy S24 Ultra, closer to the real smartphone_ - Phonemantra.jpg', '2024-10-03 10:10:17'),
(46, 14, 3, 'true', 'DELL Ultra HD 5K Monitor', 3, 'Unspecified', 'DELL Ultra HD 5K Monitor UP2715K 27-Inch Screen LED-Lit Monitor', 340000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'DELL Ultra HD 5K Monitor UP2715K 27-Inch Screen LED-Lit Monitor, Black.jpg', '2024-10-03 10:12:47'),
(47, 14, 3, 'true', 'Dell Dual Monitor', 3, 'Unspecified', 'Dell Dual Monitor Arm DM-04-2 ', 650000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Dual Monitor Arm DM-04-2 - White.jpg', '2024-10-03 10:13:44'),
(48, 14, 11, 'true', 'Samsung NEC CRV43', 3, 'Unspecified', 'NEC CRV43_ 43-inches of curve on sale \r\n', 2400000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'NEC CRV43_ 43-inches of curve on sale July.jpg', '2024-10-03 10:14:35'),
(50, 14, 6, 'true', ' HP 27_ IPS LED FHD FreeSync Monitor', 3, 'Unspecified', 'Best Buy_ HP 27_ IPS LED FHD FreeSync Monitor (HDMI, VGA) Blizzard White 27FWA\r\n', 340000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Best Buy_ HP 27_ IPS LED FHD FreeSync Monitor (HDMI, VGA) Blizzard White 27FWA.jpg', '2024-10-03 10:18:20'),
(51, 16, 10, 'true', 'LG 86_ Class QNED85T Series 4K LED', 3, 'Unspecified', 'LG 86_ Class QNED85T Series 4K LED in Black - Smart TV', 670000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'LG 86_ Class QNED85T Series 4K LED in Black - Smart TV _ Nebraska Furniture Mart.jpg', '2024-10-03 10:19:39'),
(52, 16, 5, 'true', 'Sony Z Series 4K', 3, 'Unspecified', '\r\nSony Z Series 4K HDR Ultra HD TVs _ WERD\r\n', 890000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Sony Z Series 4K HDR Ultra HD TVs _ WERD.jpg', '2024-10-03 10:21:34'),
(54, 16, 10, 'true', 'LG TV 55EG910 Curved OLED', 3, 'Unspecified', 'LG TV 55EG910 Curved OLED 140cm - Téléviseur OLED \r\n', 870000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'LG TV 55EG910 Curved OLED 140cm - Téléviseur OLED Cdiscount.jpg', '2024-10-03 10:24:35'),
(55, 16, 5, 'true', 'eAirtec 102 cms (40 inches) HD', 3, 'Unspecified', 'eAirtec 102 cms (40 inches) HD Ready Smart LED TV 40DJSM (Black) (2020 Model)\r\n', 450000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'eAirtec 102 cms (40 inches) HD Ready Smart LED TV 40DJSM (Black) (2020 Model) Best Electronic___.jpg', '2024-10-03 10:43:59'),
(57, 13, 5, 'true', ' Aluminum Cell Phone Stand', 3, 'Unspecified', 'OMOTON Upgraded Aluminum Cell Phone Stand, C1 Durable Cellphone Dock with Protective Pads, Smart Stand Designed for iPhone 15, 14_13_12_11 Pro Max XR XS, iPad Mini, Android Phones', 23000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'OMOTON Upgraded Aluminum Cell Phone Stand, C1 Durable Cellphone Dock with Protective Pads, Smart Stand Designed for iPhone 15, 14_13_12_11 Pro Max XR XS, iPad Mini, Android Phones,Rose Gold.jpg', '2024-10-03 10:46:59'),
(59, 19, 11, 'true', 'Germaine Caldwell', 3, 'Unspecified', 'Samsung Large Fridge', 900000.00, 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', 'Unspecified', '5 Over-the-Top Refrigerators to Spice Up Your Kitchen.jpg', '2024-10-03 10:55:38'),
(60, 8, 6, 'true', 'Nextbook Flexx', 1, 'Nextbook', 'Nextbook Flexx 9 8.9-Inch 32 GB Intel Quad Core 2-in-1 Tablet With Detachable', 150000.00, '#000000', 'Plastic', 'Germany', 'used', '', 'Power cable', 'a1409.jpg', '2024-11-14 13:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signed_out_order`
--

CREATE TABLE `signed_out_order` (
  `signed_out_order_id` int(11) NOT NULL,
  `user_names` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city_legion` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `product_ordered` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(200) NOT NULL,
  `payment_status` enum('pending','completed','failed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signed_out_order`
--

INSERT INTO `signed_out_order` (`signed_out_order_id`, `user_names`, `user_phone`, `user_email`, `country`, `city_legion`, `home_address`, `product_ordered`, `quantity`, `price`, `order_date`, `payment_method`, `payment_status`) VALUES
(2, 'Mudisha Kenny', '0798874111', 'kenny@gmail.com', 'rwanda', 'kicukiro', 'Kigali, Kicukiro, Kajagari', 51, 1, 671000, '2024-11-01', 'COD', 'completed'),
(4, 'Mugisha Loic', '0789891232', 'loic@gmail.com', 'rwanda', 'kicukiro', 'Kigali, Nyarugenge, Kabusunzu', 30, 1, 20000, '2024-11-04', 'COD', 'completed'),
(9, 'John Mugisha', '0789891232', 'mugisha@gmail.com', 'rwanda', 'nyarugenge', 'Kigali, Nyarugenge, Kimisagara', 21, 1, 781000, '2024-11-15', 'COD', 'pending'),
(10, 'Karekezi Alan', '0789891232', 'alan@gmail.com', 'rwanda', 'nyarugenge', 'Kigali, Nyarugenge, Kimisagara', 21, 1, 781000, '2024-11-15', 'COD', 'pending'),
(11, 'Mum Lve', '0788566422', 'mumlve@gmail.com', 'rwanda', 'nyarugenge', 'Kigali, Nyakabanda', 20, 1, 510000, '2024-11-15', 'COD', 'completed'),
(12, 'Mum Lve', '0788566422', 'mumlve@gmail.com', 'rwanda', 'nyarugenge', 'Kigali, Nyakabanda', 20, 1, 510000, '2024-11-15', 'COD', 'completed'),
(13, 'Gasana Larry', '0788788762', 'larry@gmail.com', 'rwanda', 'kicukiro', 'Kicukiro, Mukajagari', 60, 1, 151000, '2024-11-28', 'COD', 'completed'),
(14, 'KUGISHA Samuel', '0788788762', 'samuel@gmail.com', 'rwanda', 'kicukiro', 'Kicukiro, Mukajagari', 60, 1, 151000, '2024-11-28', 'COD', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_name`, `date_created`) VALUES
(2, 'Lenovo', '2024-09-21'),
(3, 'Dell', '2024-09-21'),
(5, 'Tech Neon', '2024-09-24'),
(6, 'Hp', '2024-09-25'),
(7, 'Apple', '2024-09-25'),
(8, 'Azus', '2024-09-25'),
(9, 'Acer', '2024-09-25'),
(10, 'LG', '2024-09-25'),
(11, 'Samsung', '2024-09-25'),
(12, 'Sony', '2024-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(200) NOT NULL,
  `city_legion` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `address`, `country`, `city_legion`, `phone`, `role`, `created_at`) VALUES
(1, 'Jacob Nichole', 'xekovehu@gmial.com', '$2y$10$121wqWcXkE5zuLQBmARGsu5wFoJmBzlkuQPOgd1blaNVh2QdjW4aK', NULL, '', '', NULL, 'admin', '2024-09-19 14:24:57'),
(2, 'Nerea Glenna', 'naxez@gmail.com', '$2y$10$yoeu1WsEWFECZBdxsgAbkOyNG8qmcqV5Y4ovq/r1CPEymo..vL9ye', NULL, '', '', NULL, 'admin', '2024-09-19 14:26:37'),
(3, 'di confi', 'confi@nini.con', '$2y$10$k5JHMWtK4HVLy5HYu/wooO1TMvw3BEu5b2djUATW/W9BcVJbSUl22', NULL, '', '', NULL, 'admin', '2024-09-19 15:37:58'),
(4, 'Peter Pett', 'peter@gmail.com', '$2y$10$EFaGWnw9e7Ie7nDcdFq8I.Hn22nuL74NTtPFAzqBdUINcqK/b/l3G', NULL, '', '', NULL, 'customer', '2024-09-30 05:10:22'),
(5, 'Jean Claude NTIRANTA', 'nclause022@gmail.com', '$2y$10$8q4W7oC919c9Pv/oSBL6aO6AQvOJOYgyvHZtK9GGgGUVwxo0HcB5i', NULL, '', '', NULL, 'customer', '2024-09-30 08:37:42'),
(6, 'Brendan Hewitt Sara Callahan', 'pukeryz@mailinator.com', '$2y$10$GYSUsrNbA4HAu3IXcm6aOe5vGJZ6.M.3MUt.pRTdHIPN3T9WRoPXW', NULL, '', '', NULL, 'customer', '2024-09-30 09:07:21'),
(7, 'Jin Young Thor Hughes', 'wovesus@mailinator.com', '$2y$10$euesrihZgngM8g2ooQEKX.fr.OXcMOo7YwHWcBOF8jx8Tj8zcsW2G', NULL, '', '', NULL, 'customer', '2024-09-30 09:07:51'),
(8, 'Shelley Hampton Cody Hartman', 'sipifuba@mailinator.com', '$2y$10$3K6a2ieP//7ZUUHgeBlE3eKluV4HSR3QR6uNBi7BCUyi6gHcknMgK', NULL, '', '', NULL, 'customer', '2024-09-30 09:39:08'),
(9, 'Justine Bean Quinlan Witt', 'kafyqybi@mailinator.com', '$2y$10$PVSsnMSFxiIKK2qpwh8/DuAOeWAeaw3nRvKB8GxHnm9JzPKfoEagu', NULL, '', '', NULL, 'customer', '2024-09-30 09:40:37'),
(10, 'Silas Norris Brody Whitley', 'jobifahiqy@mailinator.com', '$2y$10$lhBhZmXoVIydouN5MAZQPOW1aQ70j5TEFS3zUrQDwnEsqA/HrVvYO', NULL, '', '', NULL, 'customer', '2024-09-30 09:47:26'),
(11, 'Steel Cohen Willa Vargas', 'dighe@mailinator.com', '$2y$10$6pE5Wnnw.XPluLNUWZ8skerg8p4.3yHzTg7KteNzt9rzu5DPTJuD2', NULL, '', '', NULL, 'customer', '2024-09-30 14:06:28'),
(12, 'uwamariya Mariette', 'marietteuwamariya378@gmail.com', '$2y$10$Efq/3CRwL.dYaZPD/fulAukjPZhMKC6KfIYQ.JUxVoCsO6FZcLiN2', 'Kigali, Gastyata', 'Rwanda', 'Nyarugenge', '0788988765', 'customer', '2024-10-01 08:25:20'),
(13, 'Sam Digne', 'sam@gmail.com', '$2y$10$DVfJAAjJwu4Yz9f0CMOn0eHeyP4AMjdVV/QTjFZByKOkX3vfGs4G6', NULL, '', '', NULL, 'customer', '2024-10-14 14:17:23'),
(14, 'Kelly Mugisha', 'kelly@gmail.com', '$2y$10$2UNkfitncMnFo.7Oy3cpm.qFYmmuhRoHf20WGkL469ll4XoRmcLEe', 'Kigali, Nyarugenge, Kabusunzu', 'rwanda', 'Nyarugende', '0789891232', 'customer', '2024-11-13 15:51:55'),
(15, 'Jackson MURINZI', 'murinzijackson@gmail.com', '$2y$10$yDJtSYI/9zI9zcl./2szhugqReniJGxSHCDSJNlbyiXJHeWorBMeW', NULL, '', '', NULL, 'admin', '2024-11-25 13:56:24'),
(16, 'Heu Heh', 'gwy@dd.cm', '$2y$10$aD1yHi5nZuY0bFjpZmp20.tddTFE.hEHSnkb4zrIJASf37lVX8u0q', NULL, '', '', NULL, 'customer', '2024-11-29 09:16:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `cart_items_ibfk_2` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flutter_wave_payment`
--
ALTER TABLE `flutter_wave_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `anonymus_order` (`anonymus_order`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_items_ibfk_1` (`order_id`),
  ADD KEY `order_items_ibfk_2` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_anonymus_order` (`anonymus_order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_stock` (`stock_id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `signed_out_order`
--
ALTER TABLE `signed_out_order`
  ADD PRIMARY KEY (`signed_out_order_id`),
  ADD KEY `product_ordered` (`product_ordered`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `flutter_wave_payment`
--
ALTER TABLE `flutter_wave_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signed_out_order`
--
ALTER TABLE `signed_out_order`
  MODIFY `signed_out_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flutter_wave_payment`
--
ALTER TABLE `flutter_wave_payment`
  ADD CONSTRAINT `flutter_wave_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `flutter_wave_payment_ibfk_2` FOREIGN KEY (`anonymus_order`) REFERENCES `signed_out_order` (`signed_out_order_id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_anonymus_order` FOREIGN KEY (`anonymus_order`) REFERENCES `signed_out_order` (`signed_out_order_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_stock` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `signed_out_order`
--
ALTER TABLE `signed_out_order`
  ADD CONSTRAINT `signed_out_order_ibfk_1` FOREIGN KEY (`product_ordered`) REFERENCES `products` (`product_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
