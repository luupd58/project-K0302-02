-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2017 at 06:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Số 3, Duy Tân', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `advertise_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertise_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertise_link` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `username`, `password`, `address`, `birthday`, `phonenumber`, `sex`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tên user số 1', 'custo1', '12345', 'Địa chỉ số 1', NULL, '1123123123', NULL, 'userso11@gmail.com', NULL, NULL, NULL),
(2, 'Tên user số 1', 'custo2', '12345', 'Địa chỉ số 1', NULL, '11231231', NULL, 'userso12@gmail.com', NULL, NULL, NULL),
(3, 'Tên user số 1', 'custo3', '12345', 'Địa chỉ số 1', NULL, '11231231', NULL, 'userso13@gmail.com', NULL, NULL, NULL),
(4, 'Tên user số 1', 'custo4', '12345', 'Địa chỉ số 1', NULL, '14234234', NULL, 'userso14@gmail.com', NULL, NULL, NULL),
(5, 'Tên user số 1', 'custo5', '12345', 'Địa chỉ số 1', NULL, '1234234', NULL, 'userso15@gmail.com', NULL, NULL, NULL),
(6, 'Tên user số 1', 'custo6', '12345', 'Địa chỉ số 1', NULL, '123121', NULL, 'userso16@gmail.com', NULL, NULL, NULL),
(7, 'Tên user số 1', 'custo7', '12345', 'Địa chỉ số 1', NULL, '112312', NULL, 'userso17@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_resets_table', 1),
(63, '2017_04_03_080707_create_advertises_table', 1),
(64, '2017_04_03_080722_create_customers_table', 1),
(65, '2017_04_03_080741_create_product_types_table', 1),
(66, '2017_04_03_080752_create_products_table', 1),
(67, '2017_04_03_080818_create_promotions_table', 1),
(68, '2017_04_03_080831_create_orders_table', 1),
(69, '2017_04_04_145814_create_slides_table', 1),
(70, '2017_04_06_202752_create_address_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `order_detail` text COLLATE utf8mb4_unicode_ci,
  `total_cost` int(11) NOT NULL,
  `date_buy` datetime NOT NULL,
  `date_transfer` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name_customer` text COLLATE utf8mb4_unicode_ci,
  `phonenumber` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_card` tinyint(4) NOT NULL DEFAULT '0',
  `card` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_detail`, `total_cost`, `date_buy`, `date_transfer`, `status`, `name_customer`, `phonenumber`, `address`, `is_card`, `card`, `created_at`, `updated_at`) VALUES
(1, 1, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 1, 'Tên user số 1', '1123123123', 'Địa chỉ số 1', 0, '111111111', NULL, '2017-04-08 16:16:25'),
(2, 3, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 0, 'Tên user số 1', '11231231', 'Địa chỉ số 1', 1, '111111111', NULL, '2017-04-08 16:16:25'),
(3, 2, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 1, 'Tên user số 1', '11231231', 'Địa chỉ số 1', 1, '111111111', NULL, '2017-04-08 16:16:25'),
(4, 1, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 0, 'Tên user số 1', '1123123123', 'Địa chỉ số 1', 1, '111111111', NULL, '2017-04-08 16:16:25'),
(5, 1, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 1, 'Tên user số 1', '1123123123', 'Địa chỉ số 1', 0, '111111111', NULL, '2017-04-08 16:16:25'),
(6, 5, 'trường order_detail', 10000, '2017-04-24 11:00:00', NULL, 0, 'Tên user số 1', '1234234', 'Địa chỉ số 1', 1, '111111111', NULL, '2017-04-08 16:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `product_type_id` int(10) UNSIGNED NOT NULL,
  `like` int(11) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `total_buy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `image`, `description`, `quantity`, `product_type_id`, `like`, `dislike`, `total_buy`, `created_at`, `updated_at`) VALUES
(1, 'Bánh kem 12', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 12, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Bánh kem 13', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 13, 1, NULL, NULL, NULL, NULL, NULL),
(3, 'Bánh kem 14', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 14, 2, NULL, NULL, NULL, NULL, NULL),
(4, 'Bánh kem 15', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 15, 2, NULL, NULL, NULL, NULL, NULL),
(5, 'Bánh kem 16', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 16, 2, NULL, NULL, NULL, NULL, NULL),
(6, 'Bánh kem 17', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 17, 3, NULL, NULL, NULL, NULL, NULL),
(7, 'Bánh kem 18', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 18, 3, NULL, NULL, NULL, NULL, NULL),
(8, 'Bánh kem 19', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 19, 4, NULL, NULL, NULL, NULL, NULL),
(9, 'Bánh kem 20', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 11, 4, NULL, NULL, NULL, NULL, NULL),
(10, 'Bánh kem 21', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 11, 4, NULL, NULL, NULL, NULL, NULL),
(11, 'Bánh kem 22', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 11, 4, NULL, NULL, NULL, NULL, NULL),
(12, 'Bánh kem 23', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 11, 4, NULL, NULL, NULL, NULL, NULL),
(13, 'Bánh kem 24', 1000, 'customer/images/products/banh-kem-01.jpg', NULL, 11, 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh kem số 1', NULL, NULL),
(2, 'Bánh kem số 2', NULL, NULL),
(3, 'Bánh kem số 3', NULL, NULL),
(4, 'Bánh kem số 4', NULL, NULL),
(5, 'Bánh kem số 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_type_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `product_id`, `product_type_id`, `promotion_name`, `percent`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'số 1', 15, '2017-04-20', '2017-04-24', NULL, NULL),
(2, 3, 2, 'Số 2', 15, '2017-04-20', '2017-04-24', NULL, NULL),
(3, 1, 3, 'Số 3', 15, '2017-04-20', '2017-04-24', NULL, NULL),
(4, 5, 4, 'Số 4', 15, '2017-04-20', '2017-04-24', NULL, NULL),
(5, 7, 5, 'Số 5', 15, '2017-04-20', '2017-04-24', NULL, NULL),
(6, NULL, 1, 'cái gì đấy', 12, '2017-04-22', '2017-04-30', '2017-04-08 16:12:16', '2017-04-08 16:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_slider` text COLLATE utf8mb4_unicode_ci,
  `image_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name_slider`, `image_slider`, `created_at`, `updated_at`) VALUES
(1, 'slide số 1', 'customer/images/slider/slider-01.jpg', NULL, NULL),
(2, 'slide số 2', 'customer/images/slider/slider-01.jpg', NULL, NULL),
(3, 'slide số 3', 'customer/images/slider/slider-01.jpg', NULL, NULL),
(4, 'slide số 4', 'customer/images/slider/slider-01.jpg', NULL, NULL),
(5, 'slide số 5', 'customer/images/slider/slider-01.jpg', NULL, NULL),
(6, 'slide số 6', 'customer/images/slider/slider-01.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `username`, `password`, `level`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tên user số 1', 'user1', '12345', 1, 'userso1@gmail.com', NULL, NULL, NULL),
(2, 'Tên user số 2', 'user2', '12345', 1, 'userso2@gmail.com', NULL, NULL, NULL),
(3, 'Tên user số 3', 'user3', '12345', 1, 'userso3@gmail.com', NULL, NULL, NULL),
(4, 'Tên user số 4', 'user4', '12345', 1, 'userso4@gmail.com', NULL, NULL, NULL),
(5, 'Tên user số 5', 'user5', '12345', 1, 'userso5@gmail.com', NULL, NULL, NULL),
(6, 'Tên user số 6', 'user6', '12345', 1, 'userso6@gmail.com', NULL, NULL, NULL),
(7, 'Tên user số 7', 'user7', '12345', 1, 'userso7@gmail.com', NULL, NULL, NULL),
(8, 'Tên user số 8', 'user8', '12345', 1, 'userso8@gmail.com', NULL, NULL, NULL),
(9, 'Tên user số 9', 'user9', '12345', 1, 'userso9@gmail.com', NULL, NULL, NULL),
(10, 'Tên user số 0', 'admin', '12345', 0, 'admin@gmail.com', NULL, NULL, NULL),
(11, 'Tên Thật', 'admin1', '$2y$10$psaM9ARdd59PJcppirZQ6.gpnevk9fCGdkYmqZiIPPsBTabXGvs.6', 0, '123123@gmail.com', 'MYDFLpnpJlpQtp0kS6nCG3ak7nxWz2AoLrRKVW8HFfo0i9JlaJtUYmQPOhIX', '2017-04-08 16:07:13', '2017-04-08 16:07:13'),
(12, 'Anh Hoàng Óc Chó', 'user100', '$2y$10$ZkjbbjGAmU8pKBQgdX5KEuFGatJE8obxFgF1jgRYulRaoiZBQLjT.', 1, '12312@gmail.com', NULL, '2017-04-08 16:18:14', '2017-04-08 16:18:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `advertises` ADD FULLTEXT KEY `advertise_name` (`advertise_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_username_unique` (`username`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);
ALTER TABLE `customers` ADD FULLTEXT KEY `customer_name` (`customer_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);
ALTER TABLE `orders` ADD FULLTEXT KEY `name_customer` (`name_customer`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_name` (`product_name`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product_types` ADD FULLTEXT KEY `product_type_name` (`product_type_name`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_product_id_foreign` (`product_id`),
  ADD KEY `promotions_product_type_id_foreign` (`product_type_id`);
ALTER TABLE `promotions` ADD FULLTEXT KEY `promotion_name` (`promotion_name`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `promotions_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
