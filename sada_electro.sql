-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 06:31 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sada_electro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(20, 12, 23, 1, '2026-01-18 17:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_img` varchar(500) NOT NULL,
  `category_status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`, `category_status`) VALUES
(2, 'Smartphones', '1768662514_Smartphone X9 Pro.jpeg', 1),
(3, 'Accessories', '1768681451_Bags & Accessories.jpg', 1),
(4, 'Headphones', 'product-banner-2.jpg', 1),
(7, 'Jewelry', 'cat_696beada41b8f5.20550605.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text NOT NULL,
  `rating` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`, `rating`, `created_at`) VALUES
(1, 2, 12, 'افضل منتج', 3, '2026-01-12 17:01:37'),
(2, 2, 12, 'هل في تخفيضات', 4, '2026-01-12 17:02:51'),
(7, 18, 12, 'good products', 3, '2026-01-17 06:38:18'),
(8, 23, 12, 'gooood', 2, '2026-01-17 20:29:25'),
(9, 23, 15, 'مليح', 5, '2026-01-17 22:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `product_status` enum('available','unavailable') NOT NULL DEFAULT 'available',
  `image1` varchar(600) NOT NULL,
  `image2` varchar(600) DEFAULT NULL,
  `image3` varchar(600) DEFAULT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `discount`, `quantity`, `product_status`, `image1`, `image2`, `image3`, `category_id`, `created_at`) VALUES
(2, 'Dell XPS 13', 'Lightweight laptop with Intel Core i7 processor and premium build quality', 130, 40, 7, 'available', 'product-7.png', 'product-7.png', 'product-7.png', 4, '2025-12-25 21:48:34'),
(18, 'LG', '', 130, 30, 30, 'available', 'product_69629a978f9658.78388183.png', 'product_69629a978fa6a9.95060646.png', 'product_69629a978fb203.88223574.png', 2, '2026-01-10 18:29:43'),
(19, 'Matte Liquid Lipstick Set', '', 20, 12, 40, 'available', 'product_696be021de18e6.79339175.webp', 'product_696be021de2a06.34220262.webp', 'product_696be021de3684.28890473.jpg', 4, '2026-01-17 19:16:49'),
(20, 'Wireless Bluetooth Earbuds', '', 120, 2, 20, 'available', 'product_696be0ac54fb76.58295172.jpg', 'product_696be0ac550e52.62165704.jpg', 'product_696be0ac5519e0.03568858.jpg', 4, '2026-01-17 19:19:08'),
(21, 'Elegant Silver Necklace', 'Add a touch of sophistication to any outfit with this Elegant Silver Necklace. Crafted from high-quality sterling silver, it features a sleek and timeless design that effortlessly complements both casual and formal looks. Lightweight and comfortable to wear, this necklace is perfect for daily use or special occasions. Its polished finish adds a subtle shine, making it a must-have accessory for anyone who appreciates classic elegance.', 1200, 40, 10, 'available', 'product_696beb681b2721.44848964.webp', NULL, NULL, 7, '2026-01-17 20:04:56'),
(22, 'Leather Bracelet Set', 'Elevate your style with this versatile Leather Bracelet Set. Made from premium quality leather, each bracelet features unique textures and designs that blend rugged charm with modern elegance. Perfect for layering or wearing individually, this set adds a stylish finishing touch to any casual or semi-formal outfit. Durable, comfortable, and effortlessly fashionable, it’s an ideal accessory for both men and women who appreciate timeless style', 3000, 12, 19, 'available', 'product_696bebb33b8a46.31076049.webp', 'product_696bebb33b9973.59335330.webp', 'product_696bebb33ba3d1.74317501.jpg', 7, '2026-01-17 20:06:11'),
(23, 'Travel Backpack 35L', 'Designed for adventure and everyday use, the Travel Backpack 35L combines style, comfort, and functionality. Made from durable, water-resistant materials, it features multiple compartments to keep your belongings organized and easily accessible. Padded shoulder straps and a breathable back panel ensure maximum comfort during long trips, while its sleek design makes it perfect for both travel and daily commuting. Whether for work, school, or weekend getaways, this backpack is a reliable companion for all your journeys', 300, 10, 20, 'available', 'product_696bf090d88452.89149541.jpg', 'product_696bf090d89e70.31817165.webp', 'product_696bf090d8afd8.43862212.jpg', 3, '2026-01-17 20:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `roll`
--

CREATE TABLE `roll` (
  `id` int NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roll`
--

INSERT INTO `roll` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `roll_id` int NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `country`, `profile_image`, `status`, `roll_id`, `created_at`) VALUES
(12, 'mohammed', 'mo lassadi', 'muhamadalssadi@gmail.com', '$2y$10$MH3uOmTS5dR6pWIS3O3kzeZoomn8RQL3B.5IVTyQpvgS5JiOOBjfe', 'Yemen', 'user_1768756943.jpg', 1, 1, '2026-01-10 16:05:28'),
(15, 'alssadi774', 'ali salah', '25164483@su.edu.ye', '$2y$10$qxP4Pb/49KM4lNYSZw70AuIpj7iaT6wawGy215VvCVdoyWb0lXk.y', 'Egypt', '1768601740_banner-02.jpg', 0, 2, '2026-01-16 22:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`),
  ADD UNIQUE KEY `user_product` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK category` (`category_id`);

--
-- Indexes for table `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role` (`roll_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roll`
--
ALTER TABLE `roll`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`roll_id`) REFERENCES `roll` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
