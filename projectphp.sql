-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2022 at 02:01 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_date`) VALUES
(66, 'Giày Ananas', '2022-05-25 22:44:15'),
(67, 'Giày Adidas', '2022-05-25 22:44:26'),
(68, 'Giày Nike', '2022-05-25 22:44:30'),
(69, 'Giày Vans', '2022-05-25 22:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(20) COLLATE utf8_bin NOT NULL,
  `colorCode` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `colorCode`, `status`, `created_date`) VALUES
(4, 'Đen', '#000000', 0, '2022-05-10 11:42:26'),
(5, 'Đỏ', '#ff0505', 1, '2022-05-10 11:42:26'),
(8, 'Trắng', '#ffffff', 1, '2022-05-26 08:20:29'),
(9, 'Vàng', '#ffff00', 1, '2022-05-26 08:22:42'),
(10, 'Nâu', '#a52a2a', 1, '2022-05-26 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `image` varchar(200) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `category_id`, `description`) VALUES
(12, 'VINTAS MISTER NE ', '../../images/Giày Ananas 01.jpg', '650000', 66, ''),
(13, 'URBAS RETROSPECTIVE ', '../../images/Giày Ananas 02.jpeg', '750000', 66, ''),
(15, 'VINTAS AUNTER ', '../../images/Giày Ananas 07.jpeg', '750000', 66, ''),
(16, 'VINTAS AUN', '../../images/Giày Ananas 09.jpeg', '850000', 66, ''),
(17, 'Predator 20.3 Tf', '../../images/Giày Adidas 01.jpg', '570000', 67, ''),
(18, 'Nike Air Max Excee', '../../images/Giày Nike 01.jpg', '2000000', 68, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_saleorder`
--

CREATE TABLE `product_saleorder` (
  `saleorder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_saleorder`
--

INSERT INTO `product_saleorder` (`saleorder_id`, `product_id`, `quantity`, `color_id`, `size_id`, `status`) VALUES
(3, 13, 3, 8, 12, 2),
(4, 12, 3, 4, 7, 2),
(5, 16, 3, 9, 12, 2),
(6, 12, 1, 4, 7, 1),
(7, 12, 1, 4, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saleorder`
--

CREATE TABLE `saleorder` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `saleorder`
--

INSERT INTO `saleorder` (`id`, `created_date`, `user_id`) VALUES
(3, '2022-05-26 21:21:32', 6),
(4, '2022-05-26 21:30:32', 6),
(5, '2022-05-26 22:05:49', 6),
(6, '2022-05-27 16:39:08', 7),
(7, '2022-05-27 16:55:55', 6);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `status`, `created_date`) VALUES
(7, '37', 1, '2022-05-10 11:42:59'),
(11, '38', 1, '2022-05-10 11:42:59'),
(12, '39', 1, '2022-05-10 11:42:59'),
(17, '40', 1, '2022-05-26 08:24:56'),
(18, '41', 1, '2022-05-26 08:24:58'),
(19, '42', 1, '2022-05-26 08:25:00'),
(20, '43', 1, '2022-05-26 08:25:02'),
(21, '44', 1, '2022-05-26 08:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `size_color`
--

CREATE TABLE `size_color` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `size_color`
--

INSERT INTO `size_color` (`product_id`, `size_id`, `color_id`, `status`, `quantity`, `created_date`, `updated_date`) VALUES
(12, 7, 4, 1, 10, '2022-05-26 09:55:14', '0000-00-00 00:00:00'),
(12, 7, 5, 1, 20, '2022-05-26 09:56:21', '0000-00-00 00:00:00'),
(12, 11, 4, 1, 5, '2022-05-26 09:56:50', '0000-00-00 00:00:00'),
(12, 12, 8, 1, 7, '2022-05-26 09:56:58', '0000-00-00 00:00:00'),
(12, 17, 10, 1, 5, '2022-05-26 13:39:23', '0000-00-00 00:00:00'),
(13, 12, 8, 1, 10, '2022-05-26 10:00:56', '0000-00-00 00:00:00'),
(13, 12, 9, 1, 10, '2022-05-26 10:01:15', '0000-00-00 00:00:00'),
(15, 11, 5, 1, 16, '2022-05-26 10:02:34', '0000-00-00 00:00:00'),
(16, 12, 9, 1, 17, '2022-05-26 10:03:12', '0000-00-00 00:00:00'),
(17, 11, 8, 1, 10, '2022-05-26 10:32:25', '0000-00-00 00:00:00'),
(18, 7, 8, 1, 10, '2022-05-27 15:55:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `password`, `phone`, `address`, `email`, `role`, `created_date`) VALUES
(2, 'Nguyễn Văn Đạt', '1234', 333627741, 'thái bình', 'dnguyenvan344@gmail.com', 'nhanVien', '2022-05-10 11:43:35'),
(6, 'Nguyễn Văn Đạt', '1234', 333627741, 'Thái Bình', 'd@gmail.com', 'khachHang', '2022-05-25 22:34:45'),
(7, 'daoduong', '1234', 1818, 'bac ninh', 'daoduong@gmail.com', 'khachHang', '2022-05-27 16:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `product_saleorder`
--
ALTER TABLE `product_saleorder`
  ADD PRIMARY KEY (`saleorder_id`,`product_id`),
  ADD KEY `fk_product_saleorder` (`product_id`),
  ADD KEY `fk_size_saleorder` (`size_id`),
  ADD KEY `fk_color_saleorder` (`color_id`);

--
-- Indexes for table `saleorder`
--
ALTER TABLE `saleorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_color`
--
ALTER TABLE `size_color`
  ADD PRIMARY KEY (`product_id`,`size_id`,`color_id`),
  ADD KEY `fk_size` (`size_id`),
  ADD KEY `fk_color` (`color_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `saleorder`
--
ALTER TABLE `saleorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_saleorder`
--
ALTER TABLE `product_saleorder`
  ADD CONSTRAINT `fk_product_saleorder` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_saleorder` FOREIGN KEY (`saleorder_id`) REFERENCES `saleorder` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `saleorder`
--
ALTER TABLE `saleorder`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `size_color`
--
ALTER TABLE `size_color`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
