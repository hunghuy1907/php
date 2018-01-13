-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2017 lúc 04:17 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demoadmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `URLS` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `URLS`, `Name`, `Birthday`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@sinhvienit.net', 'http://sinhvienit.net', 'V? Thanh Lai', '29/09/1990', 1),
(2, '15021405', 'a152e841783914146e4bcd4f39100686', 'trananh9a@gmail.com', 'http://hoclichsuvn.hol.es/HDSD.html', 'TRAN TUAN ANH', '1/1/1996', 0),
(3, 'tuananh_uet', 'e10adc3949ba59abbe56e057f20f883e', '15021405@vnu.edu.vn', '', 'TRAN TUAN ANH', '4/5/1666', 0),
(4, 'adminggt', 'c20ad4d76fe97759aa27a0c99bff6710', 'trah9a@gmail.com', 'fx', 'TRAN TUAN ANH', '13/1/1998', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
