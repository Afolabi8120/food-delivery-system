-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2024 at 01:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblassign_delivery`
--

CREATE TABLE `tblassign_delivery` (
  `id` int NOT NULL,
  `dispatch_id` int NOT NULL,
  `invoiceno` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblassign_delivery`
--

INSERT INTO `tblassign_delivery` (`id`, `dispatch_id`, `invoiceno`, `status`, `created_at`) VALUES
(3, 2, '20240408S7261712', 1, '2024-04-09 10:21:19'),
(4, 2, '20240408G9846021712', 1, '2024-04-10 00:00:49'),
(5, 2, '20240410W2651712', 1, '2024-04-10 00:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `id` int NOT NULL,
  `invoiceno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`id`, `invoiceno`, `user_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(59, '20240408S7261712', 1, 5, 'onion pizza', 1, 3000.00),
(60, '20240408G9846021712', 1, 9, 'small pizza', 2, 2300.00),
(61, '20240408G9846021712', 1, 7, 'doughnut', 3, 600.00),
(62, '20240410W2651712', 2, 4, 'jollof rice', 3, 2000.00),
(63, '20240410W2651712', 2, 10, 'full plate of rice', 2, 3700.00);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `cat_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`cat_id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'snacks', '2023-11-10 15:38:29', '2024-04-06 08:44:42'),
(2, 'soft drinks', '2023-11-10 15:39:19', '2024-04-06 08:45:02'),
(4, 'wine', '2023-11-16 14:16:26', '2024-04-06 08:45:05'),
(5, 'local dish', '2023-11-16 14:16:26', '2024-04-06 08:45:16'),
(6, 'foreign dish', '2023-11-16 14:16:26', '2024-04-06 08:45:22'),
(7, 'desserts', '2023-11-16 14:16:26', '2024-04-06 08:45:33'),
(8, 'meats', '2023-11-16 14:16:26', '2024-04-06 08:45:44'),
(9, 'soup', '2023-11-16 14:16:26', '2024-04-06 08:45:48'),
(10, 'water', '2023-11-16 14:16:26', '2024-04-06 08:45:54'),
(11, 'yoghurt', '2023-11-16 14:16:26', '2024-04-10 01:24:17'),
(12, 'candy', '2023-11-16 14:16:26', '2024-04-10 01:24:22'),
(13, 'coffee', '2023-11-16 14:16:26', '2024-04-10 01:24:27'),
(14, 'tea', '2023-11-16 14:16:26', '2024-04-10 01:24:31'),
(15, 'cocktail', '2023-11-16 14:16:26', '2024-04-10 01:24:37'),
(16, 'smooties', '2023-11-16 14:16:26', '2024-04-10 01:24:46'),
(17, 'swallow', '2023-11-16 14:16:26', '2024-04-10 01:24:52'),
(18, 'bbq', '2023-11-16 14:16:26', '2024-04-10 01:24:58'),
(19, 'soup', '2023-11-16 14:16:26', '2024-04-10 01:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `id` bigint NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `chat_code` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`id`, `fullname`, `email`, `phone`, `picture`, `gender`, `address`, `password`, `status`, `chat_code`, `created_at`) VALUES
(1, 'albert faith segun', 'afolabi8120@gmail.com', '08090949669', 'IMG-2024-04-09_181FB01C.jpg', 'Male', '5, Ayinke Agbetoba Street, Lagos State', '$2y$10$k6elktcy7qzQSAjVWA1gL.Po6I7tab8WA5kOrJJIpcaVV3fy4BfqK', 1, 'AFOLABI81', '2024-04-06 10:23:35'),
(2, 'omole deborah oluwaseun', 'deb@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$wzInVIXfsqru.0UMsxMP0OPpwZ./.fSdYvAH.nfz.NACYEgdSMfay', 1, '4EB572279', '2024-04-10 00:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbldispatch`
--

CREATE TABLE `tbldispatch` (
  `id` bigint NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tbldispatch`
--

INSERT INTO `tbldispatch` (`id`, `fullname`, `email`, `phone`, `password`, `picture`, `address`, `status`, `created_at`) VALUES
(2, 'afolabi temidayo timothy', 'afolabi8120@gmail.com', '08090949660', '$2y$10$9uJZiL1lxDiYFDq2G2vuY.JmeULhxrVDZO/X5FGlfsGN08TwJRWQ2', 'IMG-2024-04-10_242F4D72.jpg', '5, Ayinke Agbetoba Street, Lagos State', 1, '2024-04-08 22:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `expense_id` int NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`expense_id`, `title`, `description`, `created_date`, `updated_date`) VALUES
(1, 'samsung tv', '&lt;p&gt;paid for a samsung tv we bought for &lt;b&gt;100000 chai&lt;/b&gt;&lt;/p&gt;', '2023-11-14 16:05:45', '2023-11-14 16:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int NOT NULL,
  `invoiceno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_swedish_ci,
  `total` decimal(20,2) NOT NULL,
  `paytype` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `payment_status` int NOT NULL,
  `delivery_status` int NOT NULL DEFAULT '0',
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `invoiceno`, `name`, `email`, `phone`, `address`, `total`, `paytype`, `payment_status`, `delivery_status`, `date_paid`) VALUES
(35, '20240408S7261712', 'afolabi temidayo timothy', 'afolabi8120@gmail.com', '08090949669', '5, Ayinke Agbetoba Street, Lagos State', 3000.00, 'card', 1, 1, '2024-04-08 09:29:13'),
(36, '20240408G9846021712', 'omole deborah oluwaseun', 'deb@gmail.com', '08090949669', 'N/A', 6400.00, 'card', 1, 1, '2024-04-08 12:16:18'),
(37, '20240410W2651712', 'omole deborah oluwaseun', 'deb@gmail.com', '08090949669', 'N/A', 13400.00, 'card', 1, 1, '2024-04-10 00:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` int NOT NULL,
  `product_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `category_id` int NOT NULL,
  `old_price` decimal(20,2) NOT NULL,
  `new_price` decimal(20,2) NOT NULL,
  `quantity` int NOT NULL,
  `unit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `reorder_level` int NOT NULL,
  `status` int NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `product_code`, `product_name`, `category_id`, `old_price`, `new_price`, `quantity`, `unit`, `product_image`, `reorder_level`, `status`, `description`, `created_date`, `updated_date`) VALUES
(4, 'L83640', 'jollof rice', 5, 2500.00, 2000.00, 85, 'piece', 'PRO202404064932B56A.png', 10, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-11 23:28:27', '2024-04-10 00:47:14'),
(5, 'G046238', 'onion pizza', 1, 4000.00, 3000.00, 19, 'piece', 'PRO20240406520D656D.jpg', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-11 23:54:09', '2024-04-08 09:29:11'),
(6, 'X859630', 'choco milk', 7, 3000.00, 2800.00, 20, 'unit', 'PRO2024040658E2BEC5.png', 10, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-12 11:34:56', '2024-04-06 12:57:10'),
(7, 'N315', 'doughnut', 1, 700.00, 600.00, 27, 'piece', 'PRO2024040657F038BC.png', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 16:07:41', '2024-04-08 12:16:18'),
(8, 'C2934', 'mashed ice cream', 7, 3000.00, 2000.00, 22, 'piece', 'PRO2024040655035B1C.png', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 16:14:04', '2024-04-06 13:19:11'),
(9, 'D89753', 'small pizza', 1, 2500.00, 2300.00, 8, 'piece', 'PRO20240406541B90B9.jpg', 4, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 16:15:33', '2024-04-08 12:16:17'),
(10, 'P1402', 'full plate of rice', 5, 4000.00, 3700.00, 18, 'piece', 'PRO20240406533F4934.png', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 16:16:36', '2024-04-10 00:47:15'),
(11, 'T80519', 'fine coffee', 15, 1000.00, 700.00, 10, 'piece', 'PRO2024040652F10436.png', 4, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 16:18:04', '2024-04-06 12:57:10'),
(12, 'X26840', 'broke man noodle', 5, 2000.00, 1600.00, 14, 'pack', 'PRO2024040651B7498A.png', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-16 17:14:38', '2024-04-08 09:29:00'),
(13, 'L3564', 'sapa sandwich', 1, 1200.00, 1000.00, 20, 'piece', 'PRO2024040650CF9721.png', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2023-11-17 16:12:27', '2024-04-06 12:57:10'),
(14, 'B9650', 'sapa spaghetti', 6, 1800.00, 1500.00, 50, 'piece', 'PRO2024040659CAEFA7.jpg', 5, 1, '&lt;p&gt;&lt;b&gt;Lorem&lt;/b&gt; ipsum dolor &lt;i&gt;sit amet consectetur adipisicing elit&lt;/i&gt;. &lt;/p&gt;&lt;p&gt;&lt;b&gt;Perferendis&lt;/b&gt; iusto beatae fugit mollitia provident incidunt eius impedit, molestiae ad vitae quaerat fugiat nisi non dolor vero quos fuga harum atque.&lt;br&gt;&lt;/p&gt;', '2024-02-06 00:00:07', '2024-04-06 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE `tblsettings` (
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `address` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `motto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`name`, `phone`, `email`, `address`, `motto`) VALUES
('yakoyo foods', '08090949669', 'afolabi8120@gmail.com', 'Lagos State', 'lower prices always');

-- --------------------------------------------------------

--
-- Table structure for table `tblstockadjustment`
--

CREATE TABLE `tblstockadjustment` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `action` int NOT NULL,
  `reasons` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `adjusted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tblstockadjustment`
--

INSERT INTO `tblstockadjustment` (`id`, `product_id`, `quantity`, `action`, `reasons`, `adjusted_date`) VALUES
(1, 4, 20, 1, 'The stock should be 28', '2023-11-15 21:31:04'),
(2, 4, 3, 2, 'The stock should be 25', '2023-11-15 21:32:41'),
(3, 6, 10, 1, 'Just testing it out', '2023-11-18 14:10:29'),
(4, 4, 100, 1, 'Added 100 new stock', '2023-11-19 15:13:51'),
(5, 5, 10, 1, 'added 10 new stock', '2023-12-20 09:33:07'),
(6, 6, 10, 2, '11', '2023-12-29 14:41:26'),
(7, 6, 11, 1, 's', '2023-12-29 14:41:51'),
(8, 5, 10, 1, 'kkkkkkkkkkkkkkkkkkkk', '2024-01-19 18:29:45'),
(9, 4, 2, 1, 'Chai', '2024-04-06 09:11:06'),
(10, 4, 88, 2, 'test', '2024-04-08 23:30:46'),
(11, 4, 88, 1, 'test', '2024-04-08 23:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrack`
--

CREATE TABLE `tbltrack` (
  `id` int NOT NULL,
  `invoiceno` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `delivery_status` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tbltrack`
--

INSERT INTO `tbltrack` (`id`, `invoiceno`, `delivery_status`, `date`) VALUES
(1, '20240408S7261712', 0, '2024-04-09 10:29:10'),
(2, '20240408S7261712', 2, '2024-04-09 10:39:16'),
(3, '20240408S7261712', 3, '2024-04-09 10:49:18'),
(4, '20240408S7261712', 1, '2024-04-09 11:04:09'),
(5, '20240408G9846021712', 0, '2024-04-10 00:00:41'),
(7, '20240408G9846021712', 2, '2024-04-10 00:02:57'),
(8, '20240408S7261712', 2, '2024-04-10 00:10:05'),
(9, '20240408S7261712', 3, '2024-04-10 00:11:33'),
(10, '20240408S7261712', 1, '2024-04-10 00:11:41'),
(11, '20240408G9846021712', 3, '2024-04-10 00:11:55'),
(12, '20240408G9846021712', 1, '2024-04-10 00:12:29'),
(13, '20240410W2651712', 0, '2024-04-10 00:47:17'),
(14, '20240410W2651712', 2, '2024-04-10 01:04:36'),
(15, '20240410W2651712', 3, '2024-04-10 01:04:59'),
(16, '20240410W2651712', 1, '2024-04-10 01:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `usertype` enum('a','u') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `fullname`, `email`, `phone`, `password`, `usertype`, `created_date`, `updated_date`) VALUES
(1, 'afolabi', 'afolabi temidayo timothy', 'afolabi8120@gmail.com', '08090949669', '$2y$10$AWQsdjqR556PvKb8G4dMAuLJsIzIqTxvsPqUKyoFeL2V.JWkXZ0sG', 'a', '2023-11-10 16:48:17', '2023-11-14 16:59:43'),
(2, 'albert', 'albert faith segun', 'albert@gmail.com', '08090949660', '$2y$10$4bbjXyDog423rZu.p7UB9u19g6lem8eRK2.8FNCSDzTteD2A4Pjgq', 'u', '2023-11-10 16:48:45', '2023-11-10 17:20:34'),
(3, 'elonx', 'elon musk', 'elon.musk@spacex.com', '14470917282', '$2y$10$7.rD7G0L.tq8DKkSYEsYwuUvUvqQzAQvVwtMeJSilApxDxA4oCT4.', 'u', '2023-11-10 17:22:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblassign_delivery`
--
ALTER TABLE `tblassign_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbldispatch`
--
ALTER TABLE `tbldispatch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblstockadjustment`
--
ALTER TABLE `tblstockadjustment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltrack`
--
ALTER TABLE `tbltrack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblassign_delivery`
--
ALTER TABLE `tblassign_delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldispatch`
--
ALTER TABLE `tbldispatch`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `expense_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblstockadjustment`
--
ALTER TABLE `tblstockadjustment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbltrack`
--
ALTER TABLE `tbltrack`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
