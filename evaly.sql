-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 02:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaly`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmethod` varchar(255) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `quantity`, `price`, `user_id`, `address`, `pmethod`, `status`, `created_at`, `updated_at`) VALUES
(33, 1, 2, 850, 2, 'DTI', 'Cash on Deliver', 'pending', '2023-01-15 10:33:21', '2023-01-17 10:59:50'),
(34, 11, 1, 320, 2, 'DTI', 'Cash on Deliver', 'pending', '2023-01-15 10:33:21', '2023-01-17 10:59:50'),
(35, 14, 1, 250, 2, 'DTI', 'Cash on Deliver', 'completed', '2023-01-15 10:33:21', '2023-01-17 13:19:30'),
(36, 3, 1, 1200, 2, 'Hazaribagh', 'Cash on Deliver', 'cancled', '2023-01-17 12:35:59', '2023-01-17 13:19:22'),
(37, 11, 1, 320, 2, 'Hazaribagh', 'Cash on Deliver', 'shifted', '2023-01-17 12:35:59', '2023-01-17 13:19:19'),
(38, 4, 1, 300, 2, 'Hazaribagh', 'Cash on Deliver', 'shifted', '2023-01-17 12:35:59', '2023-01-17 13:19:13'),
(39, 14, 1, 250, 2, 'Hazaribagh', 'Cash on Deliver', 'shifted', '2023-01-17 12:35:59', '2023-01-17 13:19:16'),
(40, 5, 2, 750, 2, 'Hazaribagh', 'Cash on Deliver', 'completed', '2023-01-17 12:35:59', '2023-01-17 13:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rprice` int(11) NOT NULL,
  `dprice` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `rprice`, `dprice`, `description`, `img`, `created_at`) VALUES
(1, 'Menz Jacket (Black)', 1500, 850, '<p>This is the best product in the <strong>world</strong>!</p><p>please don\'t miss it</p>', 'January012023112455am63b15f779830c1721.jpg', '2023-01-01 10:24:55'),
(2, 'Hudi form Men (Black)', 1800, 1250, '<p>Best hudi <strong>ever!</strong></p><p><i>Pleasd</i> dont\'s miss it!</p>', 'January012023112745am63b1602191f636471.jpg', '2023-01-01 10:27:45'),
(3, 'Menz Watch (Golden)', 2000, 1200, '<p>Best watch ever!</p><p>please don\'t miss it!</p>', 'January012023113002am63b160aa449079562.jpg', '2023-01-01 10:30:02'),
(4, 'T-shirt for men', 600, 300, '<p>Best t-Shert ever</p>', 'January012023113325am63b16175f0eac5113.png', '2023-01-01 10:33:25'),
(5, 'Shirt For Men (Golden)', 800, 750, '<p>Best Shirt</p>', 'January012023113559am63b1620fafb142292.jpg', '2023-01-01 10:35:59'),
(6, 'Best Shoes for Men', 2000, 1500, '<p>Dekhenn nai!</p>', 'gIyfhd63ba9463e0dc41802674349110107January082023Sunday.jpg', '2023-01-01 10:38:52'),
(7, 'Menz Pant (Navy Blue)', 1400, 950, '<p>Pant!</p>', 'January012023114043am63b1632b230906801.jpg', '2023-01-01 10:40:43'),
(8, 'sando genji', 200, 150, '<p>sando genji</p>', 'January012023114252am63b163acd18be9239.jpg', '2023-01-01 10:42:52'),
(9, 'Plastic Chiruni', 200, 150, '<p>chiruni</p>', 'January012023114452am63b16424b4b3a1795.jpg', '2023-01-01 10:44:52'),
(10, 'Jumbo Jersey', 750, 480, '<p>Jumbo Jersey</p><p>the best jersey in <strong>Bangladesh!</strong></p>', 'January032023122609pm63b410d18d2d19216.jpg', '2023-01-03 11:26:09'),
(11, 'Hand glovs', 550, 320, '<p>Akij Hand <strong>gloves!</strong></p><p>The best <i>hand gloves</i> in the world!</p>', 'January032023122949pm63b411addcfef2729.jpg', '2023-01-03 11:29:49'),
(14, 'Menz Socks', 300, 250, '<p>Menz Socks</p><ul><li>The best socks</li></ul>', 'January032023123515pm63b412f327b745994.jpg', '2023-01-03 11:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` char(20) NOT NULL DEFAULT 'user',
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`, `img`, `created_at`) VALUES
(1, 'Ali Haydar', 'haydar@dti.ac', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'December272022120302pm63aad0e6c300b3749.jpg', '2022-12-13 09:50:21'),
(2, 'Asif Abir', 'asif@dti.ac', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'December272022120154pm63aad0a25591f4754.jpg', '2022-12-13 09:53:15'),
(3, 'Mohsin', 'mohsin@dti.ac', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '2022-12-13 10:58:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
