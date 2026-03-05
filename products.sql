-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2026 at 09:19 AM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.5.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `brand_id`, `price`, `stock`, `description`, `image`, `created_at`) VALUES
(1, 'Iphone 16', 1, 1, 24990000.00, 50, 'Camera AI 108MP, màn hình OLED 120Hz, pin 5000mAh.', 'phone_xpro.jpg', '2026-03-02 12:19:42'),
(2, 'Laptop UltraBook Z5', 2, 2, 32500000.00, 30, 'Core i7 thế hệ mới, RAM 16GB, SSD 1TB, siêu mỏng nhẹ 1.2kg.', 'laptop_z5.jpg', '2026-03-02 12:19:42'),
(3, 'Samsung Galaxy Watch8', 3, 3, 5990000.00, 75, 'Theo dõi sức khỏe, đo nhịp tim, chống nước IP68.', 'watch_s8.jpg', '2026-03-02 12:19:42'),
(4, ' Tai nghe Bluetooth chụp tai Sony WH-1000XM4 ', 4, 4, 3490000.00, 120, 'Chống ồn chủ động ANC, pin 30 giờ sử dụng.', 'earbuds_pro.jpg', '2026-03-02 12:19:42'),
(5, ' Loa Bluetooth Sony ULT Field 1 ', 4, 5, 1290000.00, 90, 'Âm thanh sống động, Bluetooth 5.3, chống nước nhẹ.', 'speaker_mini.jpg', '2026-03-02 12:19:42'),
(6, 'Logitech G102', 5, 6, 890000.00, 150, 'DPI 16000, LED RGB 16 triệu màu, thiết kế công thái học.', 'mouse_rgb.jpg', '2026-03-02 12:19:42'),
(7, 'Logitech G PRO Mechanical Gaming Keyboard', 5, 6, 1590000.00, 80, 'Switch Blue, LED RGB, khung kim loại chắc chắn.', 'keyboard_rgb.jpg', '2026-03-02 12:19:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
