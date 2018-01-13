-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 17, 2017 lúc 01:37 SA
-- Phiên bản máy phục vụ: 5.7.15-log
-- Phiên bản PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuan12`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangday`
--

CREATE TABLE `giangday` (
  `giangvienID` int(11) NOT NULL,
  `monhocID` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangday`
--

INSERT INTO `giangday` (`giangvienID`, `monhocID`, `ngaybatdau`) VALUES
(1, 2306, '0001-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `giangvienID` int(11) NOT NULL,
  `tengiangvien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`giangvienID`, `tengiangvien`) VALUES
(1, 'Nguyễn Việt Anh'),
(2, 'Lê Đình Thanh'),
(3, 'Đặng thanh Hải'),
(4, 'Lê Phê Đô'),
(5, 'Đỗ Đức Đông'),
(6, 'Nguyễn Nam Hải');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `monhocID` int(11) NOT NULL,
  `tenmonhoc` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`monhocID`, `tenmonhoc`) VALUES
(2306, 'Xác suất thống kê'),
(3306, 'Lập trình web');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangday`
--
ALTER TABLE `giangday`
  ADD PRIMARY KEY (`giangvienID`,`monhocID`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`giangvienID`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`monhocID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
