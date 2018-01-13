-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2018 lúc 04:26 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giangday`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `magiangvien` int(11) NOT NULL,
  `tengiangvien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`magiangvien`, `tengiangvien`) VALUES
(101, 'Nguyễn Việt Anh'),
(102, 'Nguyễn Việt Hà'),
(103, 'Trần Tuấn Anh'),
(104, 'Trần Anh'),
(105, 'Trần Tuấn'),
(106, 'Trần Tuấn Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien_monhoc`
--

CREATE TABLE `giangvien_monhoc` (
  `magiangvien` int(11) NOT NULL,
  `mamonhoc` int(11) NOT NULL,
  `ngaybatdau` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien_monhoc`
--

INSERT INTO `giangvien_monhoc` (`magiangvien`, `mamonhoc`, `ngaybatdau`) VALUES
(101, 1, '2018-01-03 00:00:00'),
(101, 2, '2018-01-03 00:00:00'),
(101, 3, '2018-01-03 00:00:00'),
(101, 4, '2018-01-18 00:00:00'),
(102, 1, '2018-01-01 00:00:00'),
(103, 1, '2018-01-03 00:00:00'),
(103, 5, '2018-01-26 00:00:00'),
(104, 5, '2018-01-17 00:00:00'),
(105, 1, '2018-01-02 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamonhoc` int(11) NOT NULL,
  `tenmonhoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamonhoc`, `tenmonhoc`) VALUES
(1, 'Phát triển Web'),
(2, 'Phát triển Di động'),
(3, 'XSTK'),
(4, 'CNPM'),
(5, 'CSDL');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magiangvien`);

--
-- Chỉ mục cho bảng `giangvien_monhoc`
--
ALTER TABLE `giangvien_monhoc`
  ADD PRIMARY KEY (`magiangvien`,`mamonhoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamonhoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
