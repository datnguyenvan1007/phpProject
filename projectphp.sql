-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 29, 2022 lúc 02:29 PM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(66, 'Giày Ananas', 1),
(67, 'Giày Adidas', 1),
(68, 'Giày Nike', 1),
(69, 'Giày Vans', 1),
(70, 'Giày nữ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(20) COLLATE utf8_bin NOT NULL,
  `colorCode` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `color`, `colorCode`, `status`, `created_date`) VALUES
(4, 'Đen', '#000000', 1, '2022-05-10 11:42:26'),
(5, 'Đỏ', '#ff0505', 1, '2022-05-10 11:42:26'),
(8, 'Trắng', '#ffffff', 1, '2022-05-26 08:20:29'),
(9, 'Vàng', '#ffff00', 1, '2022-05-26 08:22:42'),
(10, 'Nâu', '#a52a2a', 1, '2022-05-26 08:24:08'),
(11, 'Hồng', '#ffc0cb', 1, '2022-06-29 21:27:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `category_id`, `description`) VALUES
(12, 'VINTAS MISTER NE ', '../../images/Giày Ananas 01.jpg', '650000', 66, ''),
(13, 'URBAS RETROSPECTIVE ', '../../images/Giày Ananas 02.jpeg', '750000', 66, ''),
(15, 'VINTAS AUNTER ', '../../images/Giày Ananas 07.jpeg', '750000', 66, ''),
(16, 'VINTAS AUN', '../../images/Giày Ananas 09.jpeg', '850000', 66, ''),
(17, 'Predator 20.3 Tf', '../../images/Giày Adidas 01.jpg', '570000', 67, ''),
(18, 'Nike Air Max Excee', '../../images/Giày Nike 01.jpg', '2000000', 68, ''),
(21, 'Vans Vault', '../../images/Giày Vans 06.jpg', '26000000', 69, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_saleorder`
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
-- Đang đổ dữ liệu cho bảng `product_saleorder`
--

INSERT INTO `product_saleorder` (`saleorder_id`, `product_id`, `quantity`, `color_id`, `size_id`, `status`) VALUES
(3, 13, 3, 8, 12, 2),
(4, 12, 3, 4, 7, 2),
(5, 16, 3, 9, 12, 2),
(6, 12, 1, 4, 7, 2),
(7, 12, 1, 4, 7, 2),
(8, 16, 4, 9, 12, 2),
(9, 12, 2, 4, 7, 2),
(10, 18, 16, 8, 7, 0),
(11, 16, 3, 9, 12, 2),
(12, 12, 1, 4, 7, 2),
(13, 16, 1, 9, 12, 0),
(14, 18, 3, 8, 7, 2),
(15, 12, 7, 4, 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saleorder`
--

CREATE TABLE `saleorder` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `saleorder`
--

INSERT INTO `saleorder` (`id`, `created_date`, `user_id`) VALUES
(3, '2022-05-26 21:21:32', 6),
(4, '2022-05-26 21:30:32', 6),
(5, '2022-05-26 22:05:49', 6),
(6, '2022-05-27 16:39:08', 7),
(7, '2022-05-27 16:55:55', 6),
(8, '2022-06-26 19:32:06', 6),
(9, '2022-06-26 19:37:03', 6),
(10, '2022-06-27 21:24:20', 6),
(11, '2022-06-27 21:42:50', 6),
(12, '2022-06-27 21:44:36', 6),
(13, '2022-06-27 21:55:15', 6),
(14, '2022-06-29 21:10:32', 6),
(15, '2022-06-29 21:20:48', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `size`, `status`, `created_date`) VALUES
(7, '37', 1, '2022-05-10 11:42:59'),
(11, '38', 1, '2022-05-10 11:42:59'),
(12, '39', 1, '2022-05-10 11:42:59'),
(17, '40', 1, '2022-05-26 08:24:56'),
(18, '41', 1, '2022-05-26 08:24:58'),
(19, '42', 1, '2022-05-26 08:25:00'),
(20, '43', 1, '2022-05-26 08:25:02'),
(21, '44', 1, '2022-05-26 08:25:03'),
(22, 'S', 1, '2022-06-29 21:27:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_color`
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
-- Đang đổ dữ liệu cho bảng `size_color`
--

INSERT INTO `size_color` (`product_id`, `size_id`, `color_id`, `status`, `quantity`, `created_date`, `updated_date`) VALUES
(12, 7, 4, 1, 7, '2022-05-26 09:55:14', '0000-00-00 00:00:00'),
(12, 7, 5, 1, 20, '2022-05-26 09:56:21', '0000-00-00 00:00:00'),
(12, 11, 4, 1, 5, '2022-05-26 09:56:50', '0000-00-00 00:00:00'),
(12, 12, 8, 1, 7, '2022-05-26 09:56:58', '0000-00-00 00:00:00'),
(12, 17, 10, 1, 5, '2022-05-26 13:39:23', '0000-00-00 00:00:00'),
(12, 22, 11, 1, 50, '2022-06-29 21:28:32', '0000-00-00 00:00:00'),
(13, 12, 8, 1, 10, '2022-05-26 10:00:56', '0000-00-00 00:00:00'),
(13, 12, 9, 1, 10, '2022-05-26 10:01:15', '0000-00-00 00:00:00'),
(15, 11, 5, 1, 16, '2022-05-26 10:02:34', '0000-00-00 00:00:00'),
(16, 12, 9, 1, 50, '2022-05-26 10:03:12', '0000-00-00 00:00:00'),
(17, 11, 8, 1, 10, '2022-05-26 10:32:25', '0000-00-00 00:00:00'),
(18, 7, 8, 1, 7, '2022-05-27 15:55:22', '0000-00-00 00:00:00'),
(21, 17, 4, 1, 20, '2022-06-29 11:10:10', '0000-00-00 00:00:00'),
(21, 17, 5, 1, 50, '2022-06-29 11:08:07', '0000-00-00 00:00:00'),
(21, 17, 8, 1, 50, '2022-06-29 11:08:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `password`, `phone`, `address`, `email`, `role`, `created_date`, `status`) VALUES
(2, 'Nguyễn Văn Đạt', 'admin', '0333627741', 'thái bình', 'admin@gmail.com', 'nhanVien', '2022-05-10 11:43:35', 1),
(6, 'Nguyễn Văn Đạt', '1234', '0333627741', 'Thái Bình', 'd@gmail.com', 'khachHang', '2022-05-25 22:34:45', 1),
(7, 'daoduong', '1234', '1818', 'bac ninh', 'daoduong@gmail.com', 'khachHang', '2022-05-27 16:33:40', 1),
(8, 'Ngô Quốc Đại', 'adm', '12345678', 'Bắc Giang', 'daibd@gmail.com', 'khachHang', '2022-06-29 21:22:44', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_saleorder`
--
ALTER TABLE `product_saleorder`
  ADD PRIMARY KEY (`saleorder_id`,`product_id`),
  ADD KEY `fk_product_saleorder` (`product_id`),
  ADD KEY `fk_size_saleorder` (`size_id`),
  ADD KEY `fk_color_saleorder` (`color_id`);

--
-- Chỉ mục cho bảng `saleorder`
--
ALTER TABLE `saleorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size_color`
--
ALTER TABLE `size_color`
  ADD PRIMARY KEY (`product_id`,`size_id`,`color_id`),
  ADD KEY `fk_size` (`size_id`),
  ADD KEY `fk_color` (`color_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `saleorder`
--
ALTER TABLE `saleorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product_saleorder`
--
ALTER TABLE `product_saleorder`
  ADD CONSTRAINT `fk_product_saleorder` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_saleorder` FOREIGN KEY (`saleorder_id`) REFERENCES `saleorder` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `saleorder`
--
ALTER TABLE `saleorder`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `size_color`
--
ALTER TABLE `size_color`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
