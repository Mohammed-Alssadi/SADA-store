-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 07:47 PM
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
(1, 'Laptops', 'img\\categories\\Laptops.png', 1),
(2, 'Smartphones', 'img\\products\\product-10.png', 1),
(3, 'Accessories', 'img\\product-2.png', 1),
(4, 'Headphones', 'img\\products\\product-banner-2.jpg', 1),
(5, 'Digital Camera', 'img\\products\\product-7.png', 1),
(6, 'Camera', 'img\\product-4.png', 1);

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
(2, 'Dell XPS 13', 'Lightweight laptop with Intel Core i7 processor and premium build quality', 130, 40, 7, 'available', 'product-7.png', 'product-7.png', 'product-7.png', 4, '2025-12-25 21:48:34');

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
(2, 'mo_alssdi', 'mo lassadi', 'muhamadalssadi@gmail.com', '$2y$10$0CBeqamnJIO34hvIVrfA6u4zgs73JtZDXA44iHnHvmmyLmFgqQKo.', 'Yemen', '1767560361_mohammed2.jpg', 0, 2, '2026-01-04 20:59:43'),
(3, '38370028918', 'lassadi', 'muhamadalssadi@gmail.com', '$2y$10$3ygsRZklOqvc7duDq7rJvernMKnh.byRvLvKTQFyloeJfTSNK4uCy', 'Saudi Arabia', '1767560510_لقطة شاشة 2025-10-15 190005.png', 0, 2, '2026-01-04 21:03:14'),
(4, 'mo_alssdi', 'mo lassadi', 'muhamadalssadi@gmail.com', '$2y$10$38uphFkuM5vLbs5WfEp19OkWrJhGtCTFrWHrcTQg7.GrlFenscrma', 'Yemen', '1767810344_avatar-01.jpg', 0, 2, '2026-01-07 18:32:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roll`
--
ALTER TABLE `roll`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
