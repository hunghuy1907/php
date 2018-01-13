-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2017 lúc 04:16 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `new_users`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_users`
--

CREATE TABLE `new_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hodem` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `new_users`
--

INSERT INTO `new_users` (`user_id`, `user_name`, `hodem`, `ten`, `user_email`, `user_password`) VALUES
(42, 'Tran Tuấn Bình', 'Tuấn ', 'Bình', 'trananh9a@gmail.com', 'z'),
(44, 'Tran Tuấn Hoàng', 'Tuấn ', 'Hoàng', 'trananh9a@gmail.com', '123456'),
(45, 'Tuấn Bình Hoàng', 'Bình', 'Hoàng', 'trananh9a@gmail.com', '55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `new_users`
--
ALTER TABLE `new_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `new_users`
--
ALTER TABLE `new_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
