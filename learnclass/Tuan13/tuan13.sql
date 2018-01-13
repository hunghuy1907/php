-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2017 lúc 03:02 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuan13`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nguoidungID` int(11) NOT NULL,
  `tenNguoiDung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nguoidungID`, `tenNguoiDung`) VALUES
(101, 'tuananh97'),
(102, 'trananh97'),
(103, 'tranku97'),
(104, 'trananhku97');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidungvaitro`
--

CREATE TABLE `nguoidungvaitro` (
  `nguoidungID` int(11) NOT NULL,
  `VaitroID` int(11) NOT NULL,
  `NgayCap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidungvaitro`
--

INSERT INTO `nguoidungvaitro` (`nguoidungID`, `VaitroID`, `NgayCap`) VALUES
(101, 0, '2017-01-01'),
(102, 1, '2017-01-01'),
(103, 1, '2017-01-01'),
(104, 1, '2017-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `vaitroID` int(11) NOT NULL,
  `tenVaiTro` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`vaitroID`, `tenVaiTro`) VALUES
(0, 'admin'),
(1, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nguoidungID`);

--
-- Chỉ mục cho bảng `nguoidungvaitro`
--
ALTER TABLE `nguoidungvaitro`
  ADD PRIMARY KEY (`nguoidungID`,`VaitroID`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`vaitroID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
