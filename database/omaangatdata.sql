-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 02:20 PM
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
-- Database: `omaangatdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `totalamt` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `status` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_id`, `customer_id`, `product_id`, `quantity`, `price`, `totalamt`, `status`, `date_added`, `DATETIME_LOG`) VALUES
(46, 'CART-0000003', 'user-0000011', 'product-0000004', 1, 60.0000, 60.0000, '1', '2023-12-30', '2023-12-30 02:02:30'),
(47, 'CART-0000004', 'user-0000011', 'product-0000002', 1, 12.0000, 12.0000, '0', '2023-12-30', '2023-12-30 20:28:59'),
(48, 'CART-0000005', 'user-0000011', 'product-0000002', 1, 12.0000, 12.0000, '0', '2023-12-30', '2023-12-30 21:43:22'),
(49, 'CART-0000006', 'user-0000011', 'product-0000003', 1, 3.0000, 3.0000, '0', '2023-12-30', '2023-12-30 21:45:28'),
(50, 'CART-0000007', 'user-0000011', 'product-0000004', 1, 60.0000, 60.0000, '0', '2023-12-30', '2023-12-30 21:52:07'),
(51, 'CART-0000008', 'user-0000011', 'product-0000003', 9, 3.0000, 27.0000, '0', '2023-12-30', '2023-12-30 21:58:51'),
(52, 'CART-0000009', 'user-0000011', 'product-0000002', 1, 12.0000, 12.0000, '1', '2023-12-31', '2023-12-31 13:25:51'),
(53, 'CART-0000010', 'user-0000011', 'product-0000002', 1, 12.0000, 12.0000, '1', '2023-12-31', '2023-12-31 13:27:14'),
(54, 'CART-0000011', 'user-0000011', 'product-0000002', 1, 12.0000, 12.0000, '0', '2023-12-31', '2023-12-31 20:48:18'),
(55, 'CART-0000012', 'user-0000024', 'product-0000002', 1, 12.0000, 12.0000, '0', '2024-01-01', '2024-01-01 20:58:31'),
(56, 'CART-0000013', 'user-0000025', 'product-0000001', 1, 200.0000, 200.0000, '0', '2024-01-02', '2024-01-02 08:38:39'),
(57, 'CART-0000014', 'user-0000025', 'product-0000001', 1, 200.0000, 200.0000, '0', '2024-01-02', '2024-01-02 08:38:41'),
(58, 'CART-0000015', 'user-0000025', 'product-0000001', 1, 200.0000, 200.0000, '0', '2024-01-02', '2024-01-02 08:38:47'),
(59, 'CART-0000016', 'user-0000011', 'product-0000015', 1, 25.0000, 25.0000, '0', '2024-01-04', '2024-01-04 12:40:58'),
(60, 'CART-0000017', 'user-0000011', 'product-0000025', 1, 290.0000, 290.0000, '0', '2024-01-04', '2024-01-04 14:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `categoryname` varchar(300) NOT NULL,
  `date_added` date NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `categoryname`, `date_added`, `datetime`) VALUES
(1, 'C-0000001', 'Vegetables', '2023-12-11', '2023-12-11 21:42:01'),
(2, 'C-0000002', 'Fruits', '2023-12-11', '2023-12-11 21:42:58'),
(3, 'C-0000003', 'Grains', '2023-12-11', '2023-12-11 21:43:26'),
(4, 'C-0000004', 'Dairies & Eggs', '2023-12-11', '2023-12-11 21:44:16'),
(5, 'C-0000005', 'Fats & Oils', '2023-12-11', '2023-12-11 21:44:44'),
(6, 'C-0000006', 'Processed Goods', '2023-12-11', '2023-12-11 21:45:18'),
(7, 'C-0000007', 'Dried Fish', '2023-12-11', '2023-12-11 21:45:45'),
(8, 'C-0000008', 'Root Crops', '2023-12-14', '2023-12-14 02:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(99) NOT NULL,
  `message` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `sendto` varchar(100) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `type` varchar(100) NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp(),
  `productID` text NOT NULL,
  `notif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `message`, `image_path`, `sendto`, `status`, `type`, `DATETIME_LOG`, `productID`, `notif`) VALUES
(74, 'user-0000011', 'Hello', NULL, 'user-0000002', 1, '', '2024-01-05 02:10:21', '', 0),
(75, 'user-0000011', 'Hi', NULL, 'user-0000002', 1, '', '2024-01-05 02:13:03', '', 0),
(76, 'user-0000002', 'hi', '', 'user-0000001', 1, 'ADMIN', '2024-01-05 02:14:32', '', 0),
(77, 'user-0000002', 'hi', '', 'user-0000001', 1, 'ADMIN', '2024-01-05 02:14:34', '', 0),
(78, 'user-0000002', 'hi', '', 'user-0000001', 1, 'ADMIN', '2024-01-05 02:14:35', '', 0),
(79, 'user-0000002', 'hi', '', 'user-0000001', 1, 'ADMIN', '2024-01-05 02:14:35', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `harvestsched`
--

CREATE TABLE `harvestsched` (
  `id` bigint(20) NOT NULL,
  `harvest_id` varchar(100) NOT NULL,
  `seller_id` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(14,2) NOT NULL DEFAULT 0.00,
  `unit` varchar(20) NOT NULL,
  `start_datetime` date NOT NULL,
  `end_datetime` date NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harvestsched`
--

INSERT INTO `harvestsched` (`id`, `harvest_id`, `seller_id`, `title`, `description`, `quantity`, `price`, `unit`, `start_datetime`, `end_datetime`, `date_added`, `DATETIME_LOG`) VALUES
(12, 'harv-0000001', 'user-0000003', 'Harvesting Sitaw', 'Sample', 123, 20.00, 'Kg', '2024-01-18', '2024-01-20', '2024-01-02', '2024-01-02 08:06:06'),
(15, 'harv-0000003', 'user-0000003', 'Harvesting Calabasa', 'Sample', 20, 20.00, 'Kg', '2024-01-04', '2024-01-27', '2024-01-02', '2024-01-02 08:04:13'),
(16, 'harv-0000004', 'user-0000003', 'Harvesting Mani', 'sample', 130, 20.00, 'Kg', '2024-01-05', '2024-02-03', '2024-01-02', '2024-01-02 08:03:35'),
(17, 'harv-0000005', 'user-0000025', 'itlog', 'soon to harvest', 10, 299.00, 'Tray', '2024-01-05', '2024-01-25', '2024-01-02', '2024-01-02 14:03:58'),
(18, 'harv-0000006', 'user-0000027', 'Talong Harvest', 'talong 2 sacks  ', 2, 25.00, 'Kg', '2024-01-06', '2024-01-18', '2024-01-02', '2024-01-02 20:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `shipfee` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `totalamt` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `orderstatus` varchar(100) NOT NULL,
  `deliverystat` varchar(100) NOT NULL,
  `paymenttype` varchar(100) NOT NULL,
  `paymentstat` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `date_shipped` date NOT NULL,
  `date_received` date NOT NULL,
  `date_completed` date NOT NULL,
  `rated` tinyint(4) NOT NULL DEFAULT 0,
  `DATETIME_LOG` datetime DEFAULT current_timestamp(),
  `orderstatus2` text NOT NULL,
  `courier` text NOT NULL,
  `trackingnumber` text NOT NULL,
  `notif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `product_id`, `cart_id`, `quantity`, `price`, `shipfee`, `totalamt`, `orderstatus`, `deliverystat`, `paymenttype`, `paymentstat`, `date_added`, `date_shipped`, `date_received`, `date_completed`, `rated`, `DATETIME_LOG`, `orderstatus2`, `courier`, `trackingnumber`, `notif`) VALUES
(24, 'OR-0000002', 'user-0000011', 'product-0000018', '', 1, 30.0000, 0.0000, 30.0000, 'PENDING', 'PENDING', 'CASH', 'PENDING', '2023-12-30', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-30 19:05:21', '', '', '', 0),
(25, 'OR-0000003', 'user-0000011', 'product-0000004', '', 9, 60.0000, 0.0000, 540.0000, 'COMPLETED', 'COMPLETED', 'CASH', 'PAID', '2023-12-30', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-30 21:59:37', ',2023-12-31 07:42:11,2023-12-31 07:42:31,2023-12-31 07:42:37', 'JandT EXPRESS', '11233444494444', 0),
(26, 'OR-0000004', 'user-0000011', 'product-0000002', 'CART-0000010', 20, 12.0000, 0.0000, 240.0000, 'TOSHIP', 'PENDING', 'CASH', 'PENDING', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 13:27:37', '2023-12-31 01:27:37,2024-01-03 06:23:04', '', '', 0),
(28, 'OR-0000006', 'user-0000011', 'product-0000004', '', 1, 60.0000, 0.0000, 60.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 19:50:50', '', '', '', 0),
(29, 'OR-0000007', 'user-0000011', 'product-0000004', '', 1, 60.0000, 0.0000, 60.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 19:56:47', '', '', '', 0),
(30, 'OR-0000008', 'user-0000011', 'product-0000004', '', 4, 60.0000, 0.0000, 240.0000, 'COMPLETED', 'COMPLETED', 'GCASH', 'PAID', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 19:57:23', ',2023-12-31 07:59:08,2023-12-31 07:59:25,2023-12-31 07:59:36', 'Meet-up (Discuss on message)', 'Salvacion', 0),
(31, 'OR-0000009', 'user-0000011', 'product-0000004', '', 1, 60.0000, 0.0000, 60.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 20:02:18', '', '', '', 0),
(32, 'OR-0000010', 'user-0000011', 'product-0000003', '', 1, 3.0000, 0.0000, 3.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 20:05:50', '', '', '', 0),
(34, 'OR-0000012', 'user-0000011', 'product-0000004', '', 1, 60.0000, 0.0000, 60.0000, 'TOPAY', 'PENDING', 'GCASH', 'PAID', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 20:21:58', '', '', '', 0),
(35, 'OR-0000013', 'user-0000011', 'product-0000006', '', 4, 56.0000, 0.0000, 224.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2023-12-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2023-12-31 22:40:44', '', '', '', 0),
(36, 'OR-0000014', 'user-0000011', 'product-0000002', '', 1, 12.0000, 0.0000, 12.0000, 'TOSHIP', 'PENDING', 'CASH', 'PENDING', '2024-01-04', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-04 01:59:12', ',2024-01-04 02:02:54', '', '', 0),
(38, 'OR-0000015', 'user-0000011', 'product-0000006', '', 1, 56.0000, 0.0000, 56.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 10:49:13', '2024-01-07 10:49:13', '', '', 0),
(39, 'OR-0000016', 'user-0000011', 'product-0000006', '', 1, 56.0000, 0.0000, 56.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 11:20:02', '2024-01-07 11:20:02', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `payment_id` varchar(150) NOT NULL,
  `paymenttype` varchar(100) NOT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `reservation_id` varchar(100) DEFAULT NULL,
  `amount` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `refnumber` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `imagename` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `paymenttype`, `order_id`, `reservation_id`, `amount`, `refnumber`, `image`, `imagename`, `status`, `date_added`, `DATETIME_LOG`) VALUES
(43, 'PAY-0000001', 'GCASH', NULL, 'RES-0000001', 55.0000, '09994998884884', 'OmaangatImages/payments/PAY-00000011704597299_download.png', 'PAY-00000011704597299_download.png', 'FORAPPROVAL', '2024-01-07', '2024-01-07 11:14:57'),
(44, 'PAY-0000002', 'GCASH', 'OR-0000016', NULL, 56.0000, '223456789876543', 'OmaangatImages/payments/PAY-00000021704597604_download.png', 'PAY-00000021704597604_download.png', 'FORAPPROVAL', '2024-01-07', '2024-01-07 11:20:02'),
(45, 'PAY-0000003', 'CASH', NULL, 'RES-0000002', 220.0000, '', '', '', 'PENDING', '2024-01-07', '2024-01-07 17:16:33'),
(46, 'PAY-0000004', 'CASH', NULL, 'RES-0000003', 55.0000, '', '', '', 'PENDING', '2024-01-07', '2024-01-07 21:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `paymethod`
--

CREATE TABLE `paymethod` (
  `id` bigint(20) NOT NULL,
  `paymeth_id` varchar(100) NOT NULL,
  `seller_id` varchar(100) NOT NULL,
  `bankholdername` varchar(500) NOT NULL,
  `banknumber` text NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`id`, `paymeth_id`, `seller_id`, `bankholdername`, `banknumber`, `date_added`, `DATETIME_LOG`) VALUES
(0, 'paymeth-0000002', 'user-0000003', 'Ann Joyce Loterte', '09767789876', '2023-12-29', '2023-12-29 21:14:42'),
(0, 'paymeth-0000003', 'user-0000003', 'Ann Joyce Loterte', '09206543456', '2023-12-31', '2023-12-31 19:19:46'),
(0, 'paymeth-0000004', 'user-0000025', 'ynah', '09120225970', '2024-01-02', '2024-01-02 14:01:38'),
(0, 'paymeth-0000005', 'user-0000028', 'Tina Monreal', '09852152990', '2024-01-04', '2024-01-04 05:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `paymethod_image`
--

CREATE TABLE `paymethod_image` (
  `id` bigint(20) NOT NULL,
  `paymeth_id` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `imagename` varchar(300) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymethod_image`
--

INSERT INTO `paymethod_image` (`id`, `paymeth_id`, `image`, `imagename`, `date_added`, `DATETIME_LOG`) VALUES
(2, 'paymeth-0000002', 'OmaangatImages/Paymethod/paymeth-0000002_1703855682_download.png', 'paymeth-0000002_1703855682_download.png', '2023-12-29', '2023-12-29 21:14:42'),
(7, 'paymeth-0000003', 'OmaangatImages/Paymethod/paymeth-00000031704021586_download.png', 'paymeth-00000031704021586_download.png', '2023-12-31', '2023-12-31 19:19:46'),
(8, 'paymeth-0000004', 'OmaangatImages/Paymethod/paymeth-00000041704175298_1704012610_download.png', 'paymeth-00000041704175298_1704012610_download.png', '2024-01-02', '2024-01-02 14:01:38'),
(9, 'paymeth-0000005', 'OmaangatImages/Paymethod/paymeth-00000051704315681_download.png', 'paymeth-00000051704315681_download.png', '2024-01-04', '2024-01-04 05:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `post_id` varchar(150) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `posttitle` varchar(300) NOT NULL,
  `postdescription` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `imagename` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_id`, `user_id`, `posttitle`, `postdescription`, `image`, `imagename`, `date_added`, `DATETIME_LOG`) VALUES
(14, 'post-0000005', 'user-0000011', 'Looking for Fresh Buko', '10-20 kls near Daraga, Albay', 'Omaangatimages/posts/post-00000051702861464_download.jpg', 'post-00000051702861464_download.jpg', '2023-12-18', '2023-12-18 09:04:21'),
(15, 'post-0000006', 'user-0000025', 'Dried Mango', 'Sold per pack. 50 pesos only. You can call me or message me at 09898976789. Daraga Area only. Thank You!', 'Omaangatimages/posts/post-00000061704168703_product-00000081702490841_Processed 1 (2).png', 'post-00000061704168703_product-00000081702490841_Processed 1 (2).png', '2024-01-02', '2024-01-02 12:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `id` bigint(20) NOT NULL,
  `post_id` varchar(150) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `comment` text NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`id`, `post_id`, `user_id`, `comment`, `date_added`, `DATETIME_LOG`) VALUES
(59, 'post-0000005', 'user-0000011', '', '2024-01-07', '2024-01-07 14:57:31'),
(60, 'post-0000005', 'user-0000011', '', '2024-01-07', '2024-01-07 15:01:34'),
(61, 'post-0000005', 'user-0000011', '', '2024-01-07', '2024-01-07 15:02:00'),
(62, 'post-0000005', 'user-0000011', '', '2024-01-07', '2024-01-07 15:02:30'),
(63, 'post-0000005', 'user-0000011', 'ok', '2024-01-07', '2024-01-07 15:10:17'),
(64, 'post-0000005', 'user-0000011', 'Meron po kami', '2024-01-07', '2024-01-07 15:22:34'),
(65, 'post-0000005', 'user-0000011', 'Meron po kami', '2024-01-07', '2024-01-07 15:25:16'),
(66, 'post-0000005', 'user-0000011', 'ok', '2024-01-07', '2024-01-07 15:33:21'),
(67, 'post-0000006', 'user-0000011', 'Pabili po, nagmessage po ako sainyo. ', '2024-01-07', '2024-01-07 16:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `seller_id` varchar(100) NOT NULL,
  `productname` varchar(500) NOT NULL,
  `productdesc` text NOT NULL,
  `price` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `availat` date NOT NULL,
  `availuntil` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `seller_id`, `productname`, `productdesc`, `price`, `quantity`, `unit`, `availat`, `availuntil`, `DATETIME_LOG`) VALUES
(30, 'product-0000001', 'user-0000002', 'Medium Eggs', 'Fresh from the farm', 200.0000, 1000, 'Tray', '2023-12-29', '2024-01-24', '2023-12-14 01:52:39'),
(31, 'product-0000002', 'user-0000002', 'Itlog Maalat', 'Sold per piece\nBuy 12 free 1', 12.0000, 970, 'piece', '2023-12-29', '2024-02-15', '2023-12-14 01:56:25'),
(32, 'product-0000003', 'user-0000002', 'Itlog Pugo', 'Minimum of 12 pcs per order', 3.0000, 669, 'piece', '2023-12-29', '2024-01-04', '2023-12-14 01:58:14'),
(33, 'product-0000004', 'user-0000003', 'Glutinous Rice/Malagkit/Pulutan', 'Grown in Fresh environment', 55.0000, 146, 'Kg', '2024-01-20', '2024-02-22', '2023-12-14 02:00:57'),
(35, 'product-0000006', 'user-0000003', 'Jasmin Rice', 'Minimum of 5 Kilos per order\n(Sold per kilos)', 56.0000, 494, 'Kg', '2023-12-14', '2024-01-23', '2023-12-14 02:03:33'),
(36, 'product-0000007', 'user-0000004', 'Banana Chips', 'Crispier than ever. Sold per packs. Minimum of 2 packs per order', 25.0000, 670, '', '2023-12-14', '2024-01-22', '2023-12-14 02:06:09'),
(37, 'product-0000008', 'user-0000004', 'Dried Mangoes', 'Sold per packs\nMinimum of 2 packs', 89.0000, 1000, '', '2023-12-14', '0000-00-00', '2023-12-14 02:07:19'),
(38, 'product-0000009', 'user-0000004', 'Cocoa Powder', 'Sold per kilo', 50.0000, 1000, '', '2023-12-14', '0000-00-00', '2023-12-14 02:08:52'),
(39, 'product-0000010', 'user-0000004', 'Cocoa Chocolate Bars', 'Sold per packs\nMinimum of 2 packs', 45.0000, 89, '', '2023-12-14', '0000-00-00', '2023-12-14 02:10:01'),
(40, 'product-0000011', 'user-0000005', 'Vegetable Oils', 'Sold per liter\n', 180.0000, 650, '', '2023-12-14', '0000-00-00', '2023-12-14 02:12:30'),
(41, 'product-0000012', 'user-0000005', 'Coconut Oil', 'Sold per Liter', 185.0000, 180, '', '2023-12-14', '0000-00-00', '2023-12-14 02:15:08'),
(42, 'product-0000013', 'user-0000005', 'Olive Oil', 'Sold per Liter', 210.0000, 1000, '', '2023-12-14', '0000-00-00', '2023-12-14 02:16:25'),
(43, 'product-0000014', 'user-0000006', 'Monggo', 'Sold Per Kilo\nMinimum of 1 kilo per order', 90.0000, 190, 'Kg', '2023-12-14', '2024-02-22', '2023-12-14 02:21:26'),
(44, 'product-0000015', 'user-0000006', 'Langka (Hilaw)', 'Sold per Kilo ', 25.0000, 34, 'Kg', '2023-12-14', '2023-12-29', '2023-12-14 02:23:50'),
(45, 'product-0000016', 'user-0000006', 'Okra', 'Minimum of 2 Kilos', 60.0000, 70, '', '2023-12-14', '0000-00-00', '2023-12-14 02:36:56'),
(46, 'product-0000017', 'user-0000006', 'Kalabasa', 'Sold per Kilo\nMinimum of 2 Kilos', 20.0000, 90, '', '2023-12-14', '0000-00-00', '2023-12-14 02:38:41'),
(47, 'product-0000018', 'user-0000007', 'Latundan', 'Sold Per Kilo', 30.0000, 149, '', '2023-12-14', '0000-00-00', '2023-12-14 03:04:03'),
(48, 'product-0000019', 'user-0000007', 'Cacao', 'Sold per Kilo', 30.0000, 20, '', '2023-12-14', '0000-00-00', '2023-12-14 03:07:21'),
(49, 'product-0000020', 'user-0000007', 'Corn/Mais', 'Sold per Kilo\nMinimum of 2-3 Kilos', 30.0000, 133, '', '2023-12-14', '0000-00-00', '2023-12-14 03:09:20'),
(50, 'product-0000021', 'user-0000002', 'Itlog ng Native na manok', 'Fresh from the farm', 200.0000, 1000, 'Tray', '2023-12-29', '2024-01-05', '2023-12-23 16:54:36'),
(51, 'product-0000022', 'user-0000003', 'Jasmine Rice', 'sample', 55.0000, 1000, 'Kg', '2023-12-28', '2024-02-02', '2023-12-28 09:43:29'),
(53, 'product-0000024', 'user-0000002', 'Itlog Maalat', 'Sample', 9.0000, 222, 'piece', '2023-12-29', '2024-02-09', '2023-12-28 14:06:36'),
(66, 'product-0000025', 'user-0000025', 'Itlog', 'per tray', 290.0000, 10, 'Tray', '2024-01-06', '2024-01-16', '2024-01-02 14:02:56'),
(67, 'product-0000026', 'user-0000026', 'Chiken Itlog', 'Organic and White Egg\nJumbo Size (Double yolk)', 240.0000, 10, 'Tray', '2024-01-03', '2024-01-06', '2024-01-02 15:22:12'),
(68, 'product-0000027', 'user-0000027', 'Talong', 'per kilo ', 40.0000, 50, 'Kg', '2024-01-02', '2024-01-17', '2024-01-02 19:58:36'),
(69, 'product-0000028', 'user-0000027', 'Sitaw', 'per tali ', 30.0000, 100, 'piece', '2024-01-02', '2024-01-25', '2024-01-02 20:00:24'),
(70, 'product-0000029', 'user-0000027', 'Okra', 'Per kilo', 20.0000, 100, 'Kg', '2024-01-02', '2024-01-11', '2024-01-02 20:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `product_id`, `category_id`, `DATETIME_LOG`) VALUES
(73, 'product-0000018', 'C-0000002', '2023-12-14 03:04:15'),
(74, 'product-0000019', 'C-0000002', '2023-12-14 03:07:21'),
(75, 'product-0000020', 'C-0000002', '2023-12-14 03:09:20'),
(102, 'product-0000001', 'C-0000004', '2023-12-28 16:27:11'),
(103, 'product-0000002', 'C-0000004', '2023-12-28 16:38:52'),
(104, 'product-0000003', 'C-0000004', '2023-12-28 16:39:28'),
(105, 'product-0000021', 'C-0000004', '2023-12-28 16:39:57'),
(106, 'product-0000024', 'C-0000004', '2023-12-28 16:40:18'),
(108, 'product-0000006', 'C-0000003', '2023-12-28 16:41:42'),
(110, 'product-0000022', 'C-0000003', '2023-12-28 16:44:03'),
(111, 'product-0000014', 'C-0000001', '2023-12-31 14:30:34'),
(112, 'product-0000015', 'C-0000001', '2023-12-31 14:31:55'),
(113, 'product-0000025', 'C-0000004', '2024-01-02 14:02:56'),
(114, 'product-0000026', 'C-0000004', '2024-01-02 15:22:12'),
(115, 'product-0000027', 'C-0000001', '2024-01-02 19:58:36'),
(116, 'product-0000028', 'C-0000001', '2024-01-02 20:00:24'),
(117, 'product-0000029', 'C-0000001', '2024-01-02 20:01:15'),
(125, 'product-0000004', 'C-0000003', '2024-01-07 10:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `imagename` varchar(300) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`id`, `product_id`, `image`, `imagename`, `date_added`, `DATETIME_LOG`) VALUES
(77, 'product-0000001', 'OmaangatImages/Products/product-00000011702489961_egg 1 (3).png', 'product-00000011702489961_egg 1 (3).png', '2023-12-14', '2023-12-14 01:52:41'),
(78, 'product-0000001', 'OmaangatImages/Products/product-00000011702489961_egg 1 (2).png', 'product-00000011702489961_egg 1 (2).png', '2023-12-14', '2023-12-14 01:52:41'),
(79, 'product-0000001', 'OmaangatImages/Products/product-00000011702489961_egg 1.png', 'product-00000011702489961_egg 1.png', '2023-12-14', '2023-12-14 01:52:41'),
(80, 'product-0000002', 'OmaangatImages/Products/product-00000021702490188_egg 4 (3).png', 'product-00000021702490188_egg 4 (3).png', '2023-12-14', '2023-12-14 01:56:28'),
(81, 'product-0000002', 'OmaangatImages/Products/product-00000021702490188_egg 4.png', 'product-00000021702490188_egg 4.png', '2023-12-14', '2023-12-14 01:56:28'),
(82, 'product-0000002', 'OmaangatImages/Products/product-00000021702490188_egg 4 (2).png', 'product-00000021702490188_egg 4 (2).png', '2023-12-14', '2023-12-14 01:56:28'),
(83, 'product-0000003', 'OmaangatImages/Products/product-00000031702490296_egg 2 (2).png', 'product-00000031702490296_egg 2 (2).png', '2023-12-14', '2023-12-14 01:58:16'),
(84, 'product-0000003', 'OmaangatImages/Products/product-00000031702490296_egg 2 (3).png', 'product-00000031702490296_egg 2 (3).png', '2023-12-14', '2023-12-14 01:58:16'),
(85, 'product-0000003', 'OmaangatImages/Products/product-00000031702490296_egg 2 (4).png', 'product-00000031702490296_egg 2 (4).png', '2023-12-14', '2023-12-14 01:58:16'),
(86, 'product-0000004', 'OmaangatImages/Products/product-00000041702490459_rice 3 (2).png', 'product-00000041702490459_rice 3 (2).png', '2023-12-14', '2023-12-14 02:00:59'),
(87, 'product-0000004', 'OmaangatImages/Products/product-00000041702490459_rice 3 (3).png', 'product-00000041702490459_rice 3 (3).png', '2023-12-14', '2023-12-14 02:00:59'),
(90, 'product-0000006', 'OmaangatImages/Products/product-00000061702490615_rice 1.png', 'product-00000061702490615_rice 1.png', '2023-12-14', '2023-12-14 02:03:35'),
(91, 'product-0000006', 'OmaangatImages/Products/product-00000061702490615_rice 2 (3).png', 'product-00000061702490615_rice 2 (3).png', '2023-12-14', '2023-12-14 02:03:35'),
(92, 'product-0000006', 'OmaangatImages/Products/product-00000061702490615_rice 2.png', 'product-00000061702490615_rice 2.png', '2023-12-14', '2023-12-14 02:03:35'),
(93, 'product-0000007', 'OmaangatImages/Products/product-00000071702490771_Processed 2 (2).png', 'product-00000071702490771_Processed 2 (2).png', '2023-12-14', '2023-12-14 02:06:11'),
(94, 'product-0000007', 'OmaangatImages/Products/product-00000071702490771_Processed 2 (3).png', 'product-00000071702490771_Processed 2 (3).png', '2023-12-14', '2023-12-14 02:06:11'),
(95, 'product-0000007', 'OmaangatImages/Products/product-00000071702490771_Processed 2.png', 'product-00000071702490771_Processed 2.png', '2023-12-14', '2023-12-14 02:06:11'),
(96, 'product-0000008', 'OmaangatImages/Products/product-00000081702490841_Processed 1.png', 'product-00000081702490841_Processed 1.png', '2023-12-14', '2023-12-14 02:07:21'),
(97, 'product-0000008', 'OmaangatImages/Products/product-00000081702490841_Processed 1 (3).png', 'product-00000081702490841_Processed 1 (3).png', '2023-12-14', '2023-12-14 02:07:21'),
(98, 'product-0000008', 'OmaangatImages/Products/product-00000081702490841_Processed 1 (2).png', 'product-00000081702490841_Processed 1 (2).png', '2023-12-14', '2023-12-14 02:07:21'),
(99, 'product-0000009', 'OmaangatImages/Products/product-00000091702490934_Processed 3 (2).png', 'product-00000091702490934_Processed 3 (2).png', '2023-12-14', '2023-12-14 02:08:54'),
(100, 'product-0000009', 'OmaangatImages/Products/product-00000091702490934_Processed 3 (3).png', 'product-00000091702490934_Processed 3 (3).png', '2023-12-14', '2023-12-14 02:08:54'),
(101, 'product-0000010', 'OmaangatImages/Products/product-00000101702491004_Processed 3.png', 'product-00000101702491004_Processed 3.png', '2023-12-14', '2023-12-14 02:10:04'),
(102, 'product-0000010', 'OmaangatImages/Products/product-00000101702491004_Processed 3 (5).png', 'product-00000101702491004_Processed 3 (5).png', '2023-12-14', '2023-12-14 02:10:04'),
(103, 'product-0000010', 'OmaangatImages/Products/product-00000101702491004_Processed 3 (4).png', 'product-00000101702491004_Processed 3 (4).png', '2023-12-14', '2023-12-14 02:10:04'),
(104, 'product-0000011', 'OmaangatImages/Products/product-00000111702491152_FO 3 (2).png', 'product-00000111702491152_FO 3 (2).png', '2023-12-14', '2023-12-14 02:12:32'),
(105, 'product-0000011', 'OmaangatImages/Products/product-00000111702491152_FO 3 (3).png', 'product-00000111702491152_FO 3 (3).png', '2023-12-14', '2023-12-14 02:12:32'),
(106, 'product-0000011', 'OmaangatImages/Products/product-00000111702491152_FO 3 (4).png', 'product-00000111702491152_FO 3 (4).png', '2023-12-14', '2023-12-14 02:12:32'),
(107, 'product-0000011', 'OmaangatImages/Products/product-00000111702491152_FO 3.png', 'product-00000111702491152_FO 3.png', '2023-12-14', '2023-12-14 02:12:32'),
(108, 'product-0000012', 'OmaangatImages/Products/product-00000121702491311_FO 1 (2).png', 'product-00000121702491311_FO 1 (2).png', '2023-12-14', '2023-12-14 02:15:11'),
(109, 'product-0000012', 'OmaangatImages/Products/product-00000121702491311_FO 1 (3).png', 'product-00000121702491311_FO 1 (3).png', '2023-12-14', '2023-12-14 02:15:11'),
(110, 'product-0000012', 'OmaangatImages/Products/product-00000121702491311_FO 1.png', 'product-00000121702491311_FO 1.png', '2023-12-14', '2023-12-14 02:15:11'),
(111, 'product-0000013', 'OmaangatImages/Products/product-00000131702491387_FO 2 (3).png', 'product-00000131702491387_FO 2 (3).png', '2023-12-14', '2023-12-14 02:16:27'),
(112, 'product-0000013', 'OmaangatImages/Products/product-00000131702491387_FO 2 (4).png', 'product-00000131702491387_FO 2 (4).png', '2023-12-14', '2023-12-14 02:16:27'),
(113, 'product-0000013', 'OmaangatImages/Products/product-00000131702491387_FO 2.png', 'product-00000131702491387_FO 2.png', '2023-12-14', '2023-12-14 02:16:27'),
(114, 'product-0000014', 'OmaangatImages/Products/product-00000141702491688_veggie 4 (2).png', 'product-00000141702491688_veggie 4 (2).png', '2023-12-14', '2023-12-14 02:21:28'),
(115, 'product-0000014', 'OmaangatImages/Products/product-00000141702491688_veggie 4 (3).png', 'product-00000141702491688_veggie 4 (3).png', '2023-12-14', '2023-12-14 02:21:28'),
(116, 'product-0000014', 'OmaangatImages/Products/product-00000141702491688_veggie 4.png', 'product-00000141702491688_veggie 4.png', '2023-12-14', '2023-12-14 02:21:28'),
(117, 'product-0000015', 'OmaangatImages/Products/product-00000151702491832_veggie 3.png', 'product-00000151702491832_veggie 3.png', '2023-12-14', '2023-12-14 02:23:52'),
(118, 'product-0000015', 'OmaangatImages/Products/product-00000151702491832_veggie 3 (2).png', 'product-00000151702491832_veggie 3 (2).png', '2023-12-14', '2023-12-14 02:23:52'),
(119, 'product-0000016', 'OmaangatImages/Products/product-00000161702492618_veggie 1 (3).png', 'product-00000161702492618_veggie 1 (3).png', '2023-12-14', '2023-12-14 02:36:58'),
(120, 'product-0000016', 'OmaangatImages/Products/product-00000161702492618_veggie 1 (2).png', 'product-00000161702492618_veggie 1 (2).png', '2023-12-14', '2023-12-14 02:36:58'),
(121, 'product-0000016', 'OmaangatImages/Products/product-00000161702492618_veggie 1.png', 'product-00000161702492618_veggie 1.png', '2023-12-14', '2023-12-14 02:36:58'),
(122, 'product-0000016', 'OmaangatImages/Products/product-00000161702492618_veggie 1 (4).png', 'product-00000161702492618_veggie 1 (4).png', '2023-12-14', '2023-12-14 02:36:58'),
(123, 'product-0000017', 'OmaangatImages/Products/product-00000171702492723_veggie 2 (2).png', 'product-00000171702492723_veggie 2 (2).png', '2023-12-14', '2023-12-14 02:38:43'),
(124, 'product-0000017', 'OmaangatImages/Products/product-00000171702492723_veggie 2 (3).png', 'product-00000171702492723_veggie 2 (3).png', '2023-12-14', '2023-12-14 02:38:43'),
(125, 'product-0000017', 'OmaangatImages/Products/product-00000171702492723_veggie 2.png', 'product-00000171702492723_veggie 2.png', '2023-12-14', '2023-12-14 02:38:43'),
(126, 'product-0000018', 'OmaangatImages/Products/product-00000181702494245_fruit 5 (2).png', 'product-00000181702494245_fruit 5 (2).png', '2023-12-14', '2023-12-14 03:04:05'),
(127, 'product-0000018', 'OmaangatImages/Products/product-00000181702494245_fruit 5 (4).png', 'product-00000181702494245_fruit 5 (4).png', '2023-12-14', '2023-12-14 03:04:05'),
(128, 'product-0000018', 'OmaangatImages/Products/product-00000181702494245_fruit 5.png', 'product-00000181702494245_fruit 5.png', '2023-12-14', '2023-12-14 03:04:05'),
(129, 'product-0000019', 'OmaangatImages/Products/product-00000191702494443_fruit 1 (2).png', 'product-00000191702494443_fruit 1 (2).png', '2023-12-14', '2023-12-14 03:07:23'),
(130, 'product-0000019', 'OmaangatImages/Products/product-00000191702494443_fruit 1 (3).png', 'product-00000191702494443_fruit 1 (3).png', '2023-12-14', '2023-12-14 03:07:23'),
(131, 'product-0000020', 'OmaangatImages/Products/product-00000201702494562_fruit 2 (2).png', 'product-00000201702494562_fruit 2 (2).png', '2023-12-14', '2023-12-14 03:09:22'),
(132, 'product-0000020', 'OmaangatImages/Products/product-00000201702494562_fruit 2.png', 'product-00000201702494562_fruit 2.png', '2023-12-14', '2023-12-14 03:09:22'),
(133, 'product-0000021', 'OmaangatImages/Products/product-00000211703321678_egg 3.png', 'product-00000211703321678_egg 3.png', '2023-12-23', '2023-12-23 16:54:38'),
(134, 'product-0000022', 'OmaangatImages/Products/product-00000221703753046_rice 1 (3).png', 'product-00000221703753046_rice 1 (3).png', '2023-12-28', '2023-12-28 09:43:31'),
(137, 'product-0000024', 'OmaangatImages/Products/product-00000241703743598_egg 4 (2).png', 'product-00000241703743598_egg 4 (2).png', '2023-12-28', '2023-12-28 14:06:38'),
(150, 'product-0000025', 'OmaangatImages/Products/product-00000251704175378_product-00000011702489961_egg 1 (3).png', 'product-00000251704175378_product-00000011702489961_egg 1 (3).png', '2024-01-02', '2024-01-02 14:02:58'),
(151, 'product-0000026', 'OmaangatImages/Products/product-00000261704180134_411647698_1518593135662251_3298441588247372703_n.jpg', 'product-00000261704180134_411647698_1518593135662251_3298441588247372703_n.jpg', '2024-01-02', '2024-01-02 15:22:14'),
(152, 'product-0000026', 'OmaangatImages/Products/product-00000261704180134_412085988_1103563247336117_30604732799650064_n.jpg', 'product-00000261704180134_412085988_1103563247336117_30604732799650064_n.jpg', '2024-01-02', '2024-01-02 15:22:14'),
(153, 'product-0000026', 'OmaangatImages/Products/product-00000261704180134_411682095_351912764258985_2689335500703644881_n.jpg', 'product-00000261704180134_411682095_351912764258985_2689335500703644881_n.jpg', '2024-01-02', '2024-01-02 15:22:14'),
(154, 'product-0000027', 'OmaangatImages/Products/product-00000271704196718_talong.jpg', 'product-00000271704196718_talong.jpg', '2024-01-02', '2024-01-02 19:58:38'),
(155, 'product-0000028', 'OmaangatImages/Products/product-00000281704196826_sitaw.jpg', 'product-00000281704196826_sitaw.jpg', '2024-01-02', '2024-01-02 20:00:26'),
(156, 'product-0000029', 'OmaangatImages/Products/product-00000291704196878_okra.jpg', 'product-00000291704196878_okra.jpg', '2024-01-02', '2024-01-02 20:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `product_id` varchar(150) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `user_id`, `product_id`, `rate`, `comment`, `date_added`, `DATETIME_LOG`) VALUES
(4, 'user-0000011', 'product-0000018', 1, 'bxb', '2023-12-30', '2023-12-30 01:36:01'),
(5, 'user-0000011', 'product-0000003', 5, 'sample', '2023-12-30', '2023-12-30 01:49:58'),
(6, 'user-0000011', 'product-0000003', 5, 'xxxx', '2023-12-30', '2023-12-30 01:50:05'),
(7, 'user-0000011', 'product-0000018', 5, 'matamis', '2024-01-04', '2024-01-04 14:24:00'),
(8, 'user-0000011', 'product-0000003', 5, 'MASARAP', '2024-01-04', '2024-01-04 14:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(20) NOT NULL,
  `reservation_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `shipfee` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `totalamt` decimal(14,4) NOT NULL DEFAULT 0.0000,
  `orderstatus` varchar(100) NOT NULL,
  `deliverystat` varchar(100) NOT NULL,
  `paymenttype` varchar(100) NOT NULL,
  `paymentstat` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `date_shipped` date NOT NULL,
  `date_received` date NOT NULL,
  `date_completed` date NOT NULL,
  `rated` tinyint(4) NOT NULL DEFAULT 0,
  `DATETIME_LOG` datetime DEFAULT current_timestamp(),
  `orderstatus2` text NOT NULL,
  `courier` text NOT NULL,
  `trackingnumber` text NOT NULL,
  `notif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_id`, `customer_id`, `product_id`, `cart_id`, `quantity`, `price`, `shipfee`, `totalamt`, `orderstatus`, `deliverystat`, `paymenttype`, `paymentstat`, `date_added`, `date_shipped`, `date_received`, `date_completed`, `rated`, `DATETIME_LOG`, `orderstatus2`, `courier`, `trackingnumber`, `notif`) VALUES
(4, 'OR-0000004', 'user-0000011', 'product-0000004', '', 4, 55.0000, 0.0000, 220.0000, 'TOSHIP', 'PENDING', 'CASH', 'PENDING', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 10:38:33', ',2024-01-07 10:44:54', '', '', 0),
(5, 'RES-0000001', 'user-0000011', 'product-0000004', '', 1, 55.0000, 0.0000, 55.0000, 'TOPAY', 'PENDING', 'GCASH', 'FORAPPROVAL', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 11:14:57', '2024-01-07 11:14:57', '', '', 0),
(6, 'RES-0000002', 'user-0000011', 'product-0000004', '', 4, 55.0000, 0.0000, 220.0000, 'TODELIVER', 'TODELIVER', 'CASH', 'PENDING', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 17:16:33', ',2024-01-07 05:32:36,2024-01-07 05:33:05', 'PICK-UP', '1212, Salvacion, Salvacion, Pilar, 4714, Sorsogon', 0),
(7, 'RES-0000003', 'user-0000011', 'product-0000004', '', 1, 55.0000, 0.0000, 55.0000, 'TOSHIP', 'PENDING', 'CASH', 'PENDING', '2024-01-07', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2024-01-07 21:09:20', ',2024-01-07 09:18:20', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp(),
  `code` text NOT NULL,
  `last_activity_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `user_id`, `username`, `password`, `usertype`, `firstname`, `middlename`, `lastname`, `status`, `date_added`, `DATETIME_LOG`, `code`, `last_activity_time`) VALUES
(64, 'user-0000001', 'OmaangatAdmin', '$2y$10$qnQZ1QxwNZ3nxAqG0eYth.MBfW3YI89NpY0TN..PWkKZzQxYDUI8e', 'ADMIN', 'Oma-Angat', 'Agri', 'Market', 'APPROVED', '2023-12-13', '2023-12-13 10:56:32', '365791d6086a3f', '2024-01-05 01:53:39'),
(67, 'user-0000002', 'AlaDairies', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Greys', 'Rolan', 'Ala', 'APPROVED', '2023-12-13', '2024-01-04 20:18:51', '', '2024-01-05 02:20:22'),
(68, 'user-0000003', 'LotertePalay', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Nel', 'Llomera', 'Loterte', 'APPROVED', '2023-12-13', '2023-12-13 14:21:18', '', '2024-01-07 21:19:22'),
(69, 'user-0000004', 'AguilarGoods', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Ynah', 'Segubiense', 'Aguilar', 'APPROVED', '2023-12-13', '2023-12-13 14:25:55', '', '2024-01-04 16:06:00'),
(70, 'user-0000005', 'BorbeOils', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Beverlygrace', 'Garcera', 'Borbe', 'APPROVED', '2023-12-13', '2023-12-13 14:28:18', '', '2024-01-04 16:06:00'),
(71, 'user-0000006', 'IbarraVeges', '38083c7ee9121e17401883566a148aa5c2e2d55dc53bc4a94a026517dbff3c6b', 'SELLER', 'Ibarra', 'Cons', 'Crisostomo', 'APPROVED', '2023-12-13', '2023-12-13 14:31:20', '', '2024-01-04 16:06:00'),
(72, 'user-0000007', 'ClaraFruitasan', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Maria', 'Clara', 'Berdin', 'APPROVED', '2023-12-13', '2023-12-13 14:35:12', '', '2024-01-04 16:06:00'),
(73, 'user-0000008', 'CruzTuyuan', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Juan', 'Dela', 'Cruz', 'APPROVED', '2023-12-13', '2023-12-13 14:37:06', '', '2024-01-04 16:06:00'),
(74, 'user-0000009', 'AkapaVeges', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Crispin', 'Basilio', 'Sisa', 'APPROVED', '2023-12-13', '2023-12-13 14:38:33', '', '2024-01-04 16:06:00'),
(76, 'user-0000011', 'joyce', '$2y$10$5w6PlHD8uBv3BAjnpwTDqO32JH1zk2mL0x97wgfThM2p55ll.bYw2', 'CUSTOMER', 'Joyce', 'Llamera', 'Loterte', 'APPROVED', '2023-12-15', '2023-12-15 02:24:45', '3657b486da5e6d', '2024-01-07 21:06:06'),
(77, 'user-0000012', 'Kkerropiii', '$2y$10$zmmVUnK6YT449.4HDmmtMOWbqKb2ZMq6u5UyeBT6dLxvbHlT5OZF.', 'CUSTOMER', 'Juan', 'Dela', 'Cruz', 'APPROVED', '2023-12-17', '2023-12-17 14:35:14', '3657e96a258a8b', '2024-01-04 16:06:00'),
(93, 'user-0000023', 'mikelorenzo', '$2y$10$Ng0X8VrrSlvn8vj/iiiMg.XdIDcTHuNCujigKhRbfE2nel9Eb0aw.', 'CUSTOMER', 'Mike', 'Sala', 'Lorejo', 'APPROVED', '2024-01-01', '2024-01-01 20:33:35', '36592b11fd17ea', '2024-01-04 16:06:00'),
(95, 'user-0000024', 'annjoyce', '$2y$10$BRFI9bth6GoXAmhNmyUNQu5Uc1Q6gsL.wLxgypJDDfShjXmStcv5m', 'CUSTOMER', 'Ann Joyce', 'Llamera', 'Loterte', 'APPROVED', '2024-01-01', '2024-01-01 20:52:56', '36592b5a8356ae', '2024-01-04 16:06:00'),
(96, 'user-0000025', 'me_ynah', '$2y$10$7c0qM2EG1B0r11WgixI/DuLCm47oQh.tqIDK3WKr..LcarCijoXMq', 'CUSTOMER', 'Gerryminah', 'Segubiense', 'Aguilar', 'APPROVED', '2024-01-02', '2024-01-02 08:24:21', '3659357b53b9c3', '2024-01-04 16:06:00'),
(97, 'user-0000026', 'vin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'SELLER', 'arvin', 'redillas', 'payson', 'APPROVED', '2024-01-02', '2024-01-02 15:17:54', '', '2024-01-04 16:06:00'),
(98, 'user-0000027', 'vanessa', '599162efb8a3db53afdd759ce2cbc8b32417d79dcb399ce261cabb2c9cc2ac4f', 'SELLER', 'vanessa', 'sandrino', 'maravilla', 'APPROVED', '2024-01-02', '2024-01-02 16:01:30', '', '2024-01-04 16:06:00'),
(100, 'user-0000028', 'NangTina', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'SELLER', 'Tina', 'Dela', 'Monreal', 'APPROVED', '2024-01-04', '2024-01-04 04:00:12', '', '2024-01-04 16:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(500) NOT NULL,
  `housenum` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `subdivision` varchar(150) NOT NULL,
  `barangay` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `zipnum` int(11) NOT NULL,
  `province` varchar(150) NOT NULL,
  `longitude` varchar(150) NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `image` varchar(500) NOT NULL,
  `imagename` varchar(500) NOT NULL,
  `profileimage` varchar(500) NOT NULL,
  `profileimagename` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `DATETIME_LOG` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `contactnum`, `email`, `address`, `housenum`, `street`, `subdivision`, `barangay`, `city`, `zipnum`, `province`, `longitude`, `latitude`, `image`, `imagename`, `profileimage`, `profileimagename`, `date_added`, `DATETIME_LOG`) VALUES
(61, 'user-0000001', '+63 920-999-9019', 'omaangatagrimarket@gmail.com', ', Bgy. 24 - Rizal Street, Legazpi City, 4500, Albay', '', '', '', 'Bgy. 24 - Rizal Street', 'Legazpi City', 4500, 'Albay', '123.7437995', '13.1390621', '', '', '', '', '2023-12-13', '2023-12-13 10:56:32'),
(64, 'user-0000002', '+63 989-908-8909', 'marygracerolan.ala@bicol-u.edu.ph', '12, None, None, San Roque, Legazpi City, 4500, Albay', '12', 'None', 'None', 'San Roque', 'Legazpi City', 4500, 'Albay', '123.7552644', '13.1570551', 'user-00000021702448293_403411465_880108440523950_4264575778187205943_n.png', 'user-00000021702448293_403411465_880108440523950_4264575778187205943_n.png', 'user-00000021702448293_Dairies.svg', 'user-00000021702448293_Dairies.svg', '2023-12-13', '2023-12-13 14:18:07'),
(65, 'user-0000003', '+63 977-787-7787', 'annjoycelotertepersonal@gmail.com', '1, 1, 0, Sipi, Daraga, 4501, Albay', '1', '1', '0', 'Sipi', 'Daraga', 4501, 'Albay', '123.7085729', '13.1474483', 'user-00000031702448480_403411465_880108440523950_4264575778187205943_n.png', 'user-00000031702448480_403411465_880108440523950_4264575778187205943_n.png', 'user-00000031702448480_grains.svg', 'user-00000031702448480_grains.svg', '2023-12-13', '2023-12-13 14:21:18'),
(66, 'user-0000004', '+63 900-988-8899', 'gerryminahsegubiense.aguilar@bicol-u.edu.ph', '34, 1, 0, San Jose, Libon, 4507, Albay', '34', '1', '0', 'San Jose', 'Libon', 4507, 'Albay', '123.3710571', '13.2606549', 'user-00000041702448758_403411465_880108440523950_4264575778187205943_n.png', 'user-00000041702448758_403411465_880108440523950_4264575778187205943_n.png', 'user-00000041702448758_Proccessed.svg', 'user-00000041702448758_Proccessed.svg', '2023-12-13', '2023-12-13 14:25:55'),
(67, 'user-0000005', '+63 988-898-8899', 'beverlygracegarcera.borbe@bicol-u.edu.ph', '23, 2, 0, Cuyaoyao, Pioduran, 4516, Albay', '23', '2', '0', 'Cuyaoyao', 'Pioduran', 4516, 'Albay', '123.4635768', '13.0993943', 'user-00000051702448900_403411465_880108440523950_4264575778187205943_n.png', 'user-00000051702448900_403411465_880108440523950_4264575778187205943_n.png', 'user-00000051702448900_Fats.svg', 'user-00000051702448900_Fats.svg', '2023-12-13', '2023-12-13 14:28:18'),
(68, 'user-0000006', '+63 900-999-999_', 'annjoycellamera.loterte@bicol-u.edu.ph', '1, P7, 0, Binitayan, Daraga, 4501, Albay', '1', 'P7', '0', 'Binitayan', 'Daraga', 4501, 'Albay', '123.6965543', '13.097314', 'user-00000061702449082_403411465_880108440523950_4264575778187205943_n.png', 'user-00000061702449082_403411465_880108440523950_4264575778187205943_n.png', 'user-00000061702449082_Veges.svg', 'user-00000061702449082_Veges.svg', '2023-12-13', '2023-12-13 14:31:20'),
(69, 'user-0000007', '+63 990-099-9999', 'omaangatagrimarket2023@gmail.com', '43, P1, 0, Kimantong, Daraga, 4501, Albay', '43', 'P1', '0', 'Kimantong', 'Daraga', 4501, 'Albay', '123.7056643', '13.1425535', 'user-00000071702449314_403411465_880108440523950_4264575778187205943_n.png', 'user-00000071702449314_403411465_880108440523950_4264575778187205943_n.png', 'user-00000071702449314_Fruits.svg', 'user-00000071702449314_Fruits.svg', '2023-12-13', '2023-12-13 14:35:12'),
(70, 'user-0000008', '+63 988-876-6676', 'juanjd@gmail.com', '4, P7, 0, Sagpon, Daraga, 4501, Albay', '4', 'P7', '0', 'Sagpon', 'Daraga', 4501, 'Albay', '123.7196388', '13.1454808', 'user-00000081702449428_403411465_880108440523950_4264575778187205943_n.png', 'user-00000081702449428_403411465_880108440523950_4264575778187205943_n.png', 'user-00000081702449428_dried.svg', 'user-00000081702449428_dried.svg', '2023-12-13', '2023-12-13 14:37:06'),
(71, 'user-0000009', '+63 900-099-9999', 'sisajuna@gmail.com', '9, 8, 0, Kimantong, Daraga, 4501, Albay', '9', '8', '0', 'Kimantong', 'Daraga', 4501, 'Albay', '123.7056643', '13.1425535', 'user-00000091702449515_403411465_880108440523950_4264575778187205943_n.png', 'user-00000091702449515_403411465_880108440523950_4264575778187205943_n.png', 'user-00000091702449515_Veges.svg', 'user-00000091702449515_Veges.svg', '2023-12-13', '2023-12-13 14:38:33'),
(73, 'user-0000011', '+63 938-521-6348', 'annjoycellamera.loterte@bicol-u.edu.ph', '1, purok 7, 0, Binitayan, Daraga, 4501, Albay', '1', 'purok 7', '0', 'Binitayan', 'Daraga', 4501, 'Albay', '123.7166382', '13.1548361', '', '', '', '', '2023-12-15', '2023-12-15 02:24:45'),
(90, 'user-0000023', '+63 998-438-4894', 'omaangatph@gmail.com', '212, P1, Luklukan Norte, Jose Panganiban, 4606, Camarines Norte', '212', 'P1', '', 'Luklukan Norte', 'Jose Panganiban', 4606, 'Camarines Norte', '122.6983711', '14.3040711', '', '', '', '', '2024-01-01', '2024-01-01 20:33:35'),
(92, 'user-0000024', '+63 988-667-9900', 'annjoycellamera.loterte@bicol-u.edu.ph', '214, P1, San Rafael, Pilar, 4714, Sorsogon', '214', 'P1', '', 'San Rafael', 'Pilar', 4714, 'Sorsogon', '123.6846987', '12.9348973', '', '', '', '', '2024-01-01', '2024-01-01 20:52:56'),
(93, 'user-0000025', '+63 912-022-5970', 'gerryminah04aguilar@gmail.com', '#7680, Del Rosario, District 5, Zone VII, Libon, 4507, Albay', '#7680', 'Del Rosario', 'District 5', 'Zone VII', 'Libon', 4507, 'Albay', '123.4313452', '13.3106655', '', '', '', '', '2024-01-02', '2024-01-02 08:24:21'),
(94, 'user-0000026', '+63 926-282-6335', 'arvinnn07@gmail.com', 'Betts, Betts, Libon, 4570, Albay', '', 'Betts', '', 'Betts', 'Libon', 4570, 'Albay', '123.3710571', '13.2606549', 'user-00000261704179877_411923476_3161373884169886_6973667231377360669_n.jpg', 'user-00000261704179877_411923476_3161373884169886_6973667231377360669_n.jpg', 'user-00000261704179877_vin-dp.png', 'user-00000261704179877_vin-dp.png', '2024-01-02', '2024-01-02 15:17:54'),
(95, 'user-0000027', '+63 929-194-4381', 'vanessamaravilla07@gmail.com', 'linao, liano, Libon, 4506, Albay', '', 'linao', '', 'liano', 'Libon', 4506, 'Albay', '123.4411559', '13.2528412', 'user-00000271704182492_411626867_965883541593195_7441358002028901618_n.jpg', 'user-00000271704182492_411626867_965883541593195_7441358002028901618_n.jpg', 'user-00000271704182492_van.png', 'user-00000271704182492_van.png', '2024-01-02', '2024-01-02 16:01:30'),
(97, 'user-0000028', '+63 988-839-9938', '', '1212, Salvacion, Salvacion, Pilar, 4714, Sorsogon', '1212', 'Salvacion', '', 'Salvacion', 'Pilar', 4714, 'Sorsogon', '123.6846987', '12.9348973', 'user-00000281704312014_download.jpg', 'user-00000281704312014_download.jpg', '', '', '2024-01-04', '2024-01-04 04:00:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`cart_id`),
  ADD UNIQUE KEY `cart_id_UNIQUE` (`cart_id`),
  ADD KEY `FKCartUserid_idx` (`customer_id`),
  ADD KEY `FKCartProductid_idx` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`,`category_id`),
  ADD UNIQUE KEY `categoryid_UNIQUE` (`category_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKChatUserID_idx` (`user_id`);

--
-- Indexes for table `harvestsched`
--
ALTER TABLE `harvestsched`
  ADD PRIMARY KEY (`id`,`harvest_id`),
  ADD UNIQUE KEY `harvestID_UNIQUE` (`harvest_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`order_id`),
  ADD UNIQUE KEY `orderID_UNIQUE` (`order_id`),
  ADD KEY `FKOrderUserID_idx` (`customer_id`),
  ADD KEY `FKOrderProductID_idx` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`,`payment_id`),
  ADD UNIQUE KEY `paymentID_UNIQUE` (`payment_id`),
  ADD KEY `FKPaymentOrderID_idx` (`order_id`),
  ADD KEY `FKPaymentResID` (`reservation_id`);

--
-- Indexes for table `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`id`,`paymeth_id`),
  ADD UNIQUE KEY `paymethID_UNIQUE` (`paymeth_id`),
  ADD KEY `FKSellerUserID_pay` (`seller_id`);

--
-- Indexes for table `paymethod_image`
--
ALTER TABLE `paymethod_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKPaymethod_idx` (`paymeth_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD UNIQUE KEY `post_id_UNIQUE` (`post_id`),
  ADD KEY `FKPostUserid_idx` (`user_id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKPostDetPostID_idx` (`post_id`),
  ADD KEY `FKPostUserid_idx` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`product_id`),
  ADD UNIQUE KEY `productID_UNIQUE` (`product_id`),
  ADD KEY `FKSellerUserID_idx` (`seller_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCategoryID_idx` (`category_id`),
  ADD KEY `FKProductID2_idx` (`product_id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKProductID3_idx` (`product_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUserID2_idx` (`user_id`),
  ADD KEY `FKProductID_idx` (`product_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`,`reservation_id`),
  ADD UNIQUE KEY `reserveID_UNIQUE` (`reservation_id`),
  ADD KEY `FKOrdercustID_idx` (`customer_id`),
  ADD KEY `FKOrderProdID_idx` (`product_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD UNIQUE KEY `orderID_UNIQUE` (`order_id`),
  ADD KEY `FKTrackingOrderID_idx` (`order_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD UNIQUE KEY `userID_UNIQUE` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID_UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `harvestsched`
--
ALTER TABLE `harvestsched`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `paymethod_image`
--
ALTER TABLE `paymethod_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FKCartProductID` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKCartUserID` FOREIGN KEY (`customer_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harvestsched`
--
ALTER TABLE `harvestsched`
  ADD CONSTRAINT `harvestsched_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users_table` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FKOrderProductID` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKOrderUserID` FOREIGN KEY (`customer_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FKPaymentOrderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKPaymentResID` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymethod`
--
ALTER TABLE `paymethod`
  ADD CONSTRAINT `FKSellerUserID_pay` FOREIGN KEY (`seller_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymethod_image`
--
ALTER TABLE `paymethod_image`
  ADD CONSTRAINT `FKPaymethod_idx` FOREIGN KEY (`paymeth_id`) REFERENCES `paymethod` (`paymeth_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FKPostUserID` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_details`
--
ALTER TABLE `post_details`
  ADD CONSTRAINT `FKPostDetPostID` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `FKPostDetUserID` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FKSellerUserID` FOREIGN KEY (`seller_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_category`
--
ALTER TABLE `products_category`
  ADD CONSTRAINT `FKCategoryID` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKProductID2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `FKProductID3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FKProductID` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKUserID2` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FKOrderProdID` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKOrdercustID` FOREIGN KEY (`customer_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `FKOrderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `FKUserID` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
