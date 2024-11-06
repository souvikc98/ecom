-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:08 AM
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
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` varchar(125) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `buyer_address` text DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(125) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `user_id`, `order_id`, `buyer_name`, `buyer_address`, `landmark`, `pin`, `phone`, `email`, `created_at`) VALUES
(1, 1, 'ECOM637288', 'souvik chowdhury', 'Museum Colony Flat no 9, Papung apartment', 'kolkata', 123456, '1243422345', 'test@gmail.com', '2024-11-04 15:49:50'),
(2, NULL, 'ECOM410847', 'Raito Enterprise', NULL, NULL, NULL, '9182736466', NULL, '2024-11-05 08:15:08'),
(3, NULL, 'ECOM753424', 'Test', NULL, NULL, NULL, '7689405786', NULL, '2024-11-05 08:26:52'),
(4, 1, 'ECOM774341', 'wrew', 'wrwerrhfg4344', 'kolkata', 890987, '8016029249', 'souvik@max.com', '2024-11-05 10:28:34'),
(5, NULL, 'ECOM354208', 'jhkj', NULL, NULL, NULL, '8780980980', NULL, '2024-11-05 10:31:37'),
(6, NULL, 'ECOM266223', 'utrjuytfjyg', NULL, NULL, NULL, '9887654636', NULL, '2024-11-05 10:33:06'),
(8, NULL, 'ECOM447235', 'Abcd', NULL, NULL, NULL, '1234567876', NULL, '2024-11-05 13:37:30'),
(10, NULL, 'ECOM880989', 'tret', NULL, NULL, NULL, '5666878778', NULL, '2024-11-06 07:07:42'),
(11, NULL, 'ECOM629036', 'wrew', NULL, NULL, NULL, '1234567890', NULL, '2024-11-06 08:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Vegetable', '2024-11-04', '2024-11-04 15:41:00', 0),
(2, 'Fruit', '2024-11-04', '2024-11-04 15:41:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` varchar(125) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_total_price` decimal(15,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = online, 2 = store',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `order_id`, `p_id`, `p_qty`, `p_total_price`, `status`, `created_at`) VALUES
(1, 1, 'ECOM637288', 7, 2, '70.00', 1, '2024-11-04 15:49:50'),
(2, 1, 'ECOM637288', 10, 4, '360.00', 1, '2024-11-04 15:49:50'),
(3, 1, 'ECOM637288', 3, 5, '250.00', 1, '2024-11-04 15:49:50'),
(4, NULL, 'ECOM410847', 14, 12, '600.00', 2, '2024-11-05 08:15:07'),
(5, NULL, 'ECOM410847', 8, 15, '330.00', 2, '2024-11-05 08:15:07'),
(6, NULL, 'ECOM410847', 3, 7, '350.00', 2, '2024-11-05 08:15:08'),
(7, NULL, 'ECOM753424', 16, 14, '1050.00', 2, '2024-11-05 08:26:52'),
(8, NULL, 'ECOM753424', 15, 8, '120.00', 2, '2024-11-05 08:26:52'),
(9, NULL, 'ECOM753424', 13, 17, '680.00', 2, '2024-11-05 08:26:52'),
(10, 1, 'ECOM774341', 1, 2, '260.00', 1, '2024-11-05 10:28:34'),
(11, 1, 'ECOM774341', 13, 1, '40.00', 1, '2024-11-05 10:28:34'),
(12, NULL, 'ECOM354208', 14, 8, '400.00', 2, '2024-11-05 10:31:37'),
(13, NULL, 'ECOM266223', 7, 3, '105.00', 2, '2024-11-05 10:33:06'),
(14, NULL, 'ECOM266223', 3, 6, '300.00', 2, '2024-11-05 10:33:06'),
(15, NULL, 'ECOM266223', 1, 9, '1170.00', 2, '2024-11-05 10:33:06'),
(19, NULL, 'ECOM447235', 15, 1, '15.00', 2, '2024-11-05 13:37:30'),
(20, NULL, 'ECOM447235', 10, 2, '180.00', 2, '2024-11-05 13:37:30'),
(25, NULL, 'ECOM880989', 14, 12, '600.00', 2, '2024-11-06 07:07:42'),
(26, NULL, 'ECOM880989', 12, 4, '540.00', 2, '2024-11-06 07:07:42'),
(27, NULL, 'ECOM880989', 3, 12, '600.00', 2, '2024-11-06 07:07:42'),
(28, NULL, 'ECOM629036', 13, 1, '40.00', 2, '2024-11-06 08:31:53'),
(29, NULL, 'ECOM629036', 7, 2, '70.00', 2, '2024-11-06 08:31:53'),
(30, NULL, 'ECOM629036', 4, 3, '120.00', 2, '2024-11-06 08:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `weight` varchar(125) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_name`, `description`, `product_image`, `quantity`, `weight`, `price`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 2, 'Apple', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'apple.jpeg', 188, 'kg', '130.00', '2024-11-04 15:07:48', '0000-00-00 00:00:00', 0),
(2, 2, 'Avocado', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'avocado.jpeg', 150, 'kg', '85.00', '2024-11-04 15:08:28', '0000-00-00 00:00:00', 0),
(3, 2, 'Banana', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'banana.jpeg', 119, 'dozen', '50.00', '2024-11-04 15:09:16', '0000-00-00 00:00:00', 0),
(4, 1, 'Bringle', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'bringle.jpeg', 246, 'kg', '40.00', '2024-11-04 15:09:57', '0000-00-00 00:00:00', 0),
(5, 1, 'Brocoli', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'brocoli.jpeg', 125, 'kg', '30.00', '2024-11-04 15:11:23', '0000-00-00 00:00:00', 0),
(6, 1, 'Cauliflower', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'fulkophi.jpeg', 88, 'kg', '45.00', '2024-11-04 15:12:23', '0000-00-00 00:00:00', 0),
(7, 1, 'Tomato', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'images.jpeg', 29, 'kg', '35.00', '2024-11-04 15:13:00', '2024-11-05 10:57:48', 0),
(8, 1, 'Pumpkin', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'kumro.jpeg', 10, 'kg', '22.00', '2024-11-04 15:14:16', '0000-00-00 00:00:00', 0),
(9, 1, 'Ladies Finger', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'ladies_finger.jpeg', 60, 'kg', '15.00', '2024-11-04 15:15:19', '0000-00-00 00:00:00', 0),
(10, 2, 'Lichi', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'lichi.jpeg', 157, 'kg', '90.00', '2024-11-04 15:16:04', '0000-00-00 00:00:00', 0),
(11, 2, 'Mango', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'Mango.jpeg', 147, 'kg', '150.00', '2024-11-04 15:16:45', '0000-00-00 00:00:00', 0),
(12, 2, 'Orange', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'orange.jpeg', 70, 'kg', '135.00', '2024-11-04 15:17:29', '0000-00-00 00:00:00', 0),
(13, 1, 'Cabbage', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'patta_gobi.jpeg', 220, 'kg', '40.00', '2024-11-04 15:18:23', '0000-00-00 00:00:00', 0),
(14, 2, 'Strawbery', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'strawbery.jpeg', 78, 'kg', '50.00', '2024-11-04 15:19:22', '0000-00-00 00:00:00', 0),
(15, 1, 'Uche', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'uche.jpeg', 18, 'kg', '15.00', '2024-11-04 15:20:30', '0000-00-00 00:00:00', 0),
(16, 2, 'Watermalon', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 'watermalon.jpeg', 136, 'kg', '75.00', '2024-11-04 15:21:18', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `phone`, `email`, `password`, `created_at`) VALUES
(1, 'Admin', '1234567890', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', '2024-11-02 12:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pos_admin`
--

CREATE TABLE `tbl_pos_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pos_admin`
--

INSERT INTO `tbl_pos_admin` (`id`, `name`, `phone`, `email`, `password`, `created_at`) VALUES
(1, 'Store Admin', '1234567890', 'storeadmin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', '2024-11-04 16:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Souvik CHowdhury', 'souvik@gmail.com', '8016029249', 'b99f24bcd96a40cad31a956e2bd4cda4', '2024-11-04 18:45:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pos_admin`
--
ALTER TABLE `tbl_pos_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pos_admin`
--
ALTER TABLE `tbl_pos_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
