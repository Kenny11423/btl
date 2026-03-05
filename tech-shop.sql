-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2026 at 09:31 AM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Samsung'),
(4, 'Sony'),
(5, 'Xiaomi'),
(6, 'Logitech');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`) VALUES
(1, 'Điện Thoại', 'Các dòng smartphone và phụ kiện điện thoại'),
(2, 'Laptop', 'Máy tính xách tay phục vụ học tập và làm việc'),
(3, 'Đồng Hồ Thông Minh', 'Thiết bị đeo tay theo dõi sức khỏe'),
(4, 'Âm Thanh', 'Tai nghe, loa và thiết bị âm thanh'),
(5, 'Phụ Kiện Máy Tính', 'Chuột, bàn phím và phụ kiện gaming');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Trí tuệ nhân tạo thay đổi ngành IT', 'AI đang thay đổi cách các doanh nghiệp phát triển phần mềm. Các công cụ như ChatGPT, Copilot giúp lập trình viên tăng năng suất và tối ưu quy trình làm việc.', 'ai.jpg', '2026-03-05 00:33:50'),
(2, 'Xu hướng phát triển Web 2026', 'Các framework như React, Vue và Laravel tiếp tục phát triển mạnh mẽ. Bên cạnh đó, kiến trúc Microservices và Serverless đang trở thành xu hướng chủ đạo.', 'web2026.jpg', '2026-03-05 00:33:50'),
(3, 'Bảo mật thông tin trong thời đại số', 'An ninh mạng trở thành vấn đề quan trọng khi dữ liệu người dùng ngày càng có giá trị. Doanh nghiệp cần đầu tư vào mã hóa, xác thực hai lớp và kiểm thử bảo mật.', 'security.jpg', '2026-03-05 00:33:50'),
(4, 'Cloud Computing bùng nổ', 'Amazon AWS, Google Cloud và Microsoft Azure đang dẫn đầu thị trường điện toán đám mây. Doanh nghiệp chuyển dần từ server vật lý sang cloud để tối ưu chi phí.', 'cloud.jpg', '2026-03-05 00:33:50'),
(5, 'Sự phát triển của Blockchain', 'Blockchain không chỉ dùng trong tiền điện tử mà còn ứng dụng trong quản lý chuỗi cung ứng, hợp đồng thông minh và bảo mật dữ liệu.', 'blockchain.jpg', '2026-03-05 00:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Chờ xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `payment_id`, `total`, `created_at`, `status`) VALUES
(1, 8, 1, 890000.00, '2026-03-05 01:29:22', 'Chờ xử lý'),
(2, 8, 2, 1290000.00, '2026-03-05 01:29:39', 'Chờ xử lý'),
(3, 7, 2, 24990000.00, '2026-03-05 01:54:32', 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_name`, `price`, `quantity`) VALUES
(1, 1, NULL, 890000.00, 1),
(2, 2, NULL, 1290000.00, 1),
(3, 3, NULL, 24990000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_id` int(11) NOT NULL,
  `method_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_id`, `method_name`) VALUES
(1, 'Thanh toán khi nhận hàng (COD)'),
(2, 'Chuyển khoản ngân hàng'),
(3, 'Ví điện tử Momo');

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

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `phone`, `address`, `role`, `created_at`) VALUES
(6, 'Admin System', 'admin@gmail.com', '$2y$12$m6wYmKctD297hiOvEqBYP.VQc/h9XDklUIoqnYKiI.odZ895hfQLm', NULL, NULL, 'admin', '2026-02-28 10:05:24'),
(7, 'Nguyen Van A', 'user@gmail.com', '$2y$12$3N3g/eAPyA0rDYAkb3dJX.NZO/6I634Mur3g0JqSLdhzNsiTcz6cK', NULL, NULL, 'customer', '2026-02-28 10:05:24'),
(8, 'tran long vu', 'vu@gmail.com', '$2y$12$3N3g/eAPyA0rDYAkb3dJX.NZO/6I634Mur3g0JqSLdhzNsiTcz6cK', '123456789', 'ha noi', 'customer', '2026-03-02 12:05:40'),
(9, 'acx', 'baoson2405@gmail.com', '$2y$12$39URW79tO.6F3Scz9yVkXuBFu63ByNYKQuTDDl1NtU1BOPF1E3zbe', NULL, NULL, 'customer', '2026-03-03 09:45:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_payment` (`payment_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `fk_orderdetails_order` (`order_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment_methods` (`payment_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetails_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
