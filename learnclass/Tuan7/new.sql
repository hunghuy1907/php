-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 03, 2017 lúc 01:49 SA
-- Phiên bản máy phục vụ: 5.7.15-log
-- Phiên bản PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoivien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaithuong`
--

CREATE TABLE `giaithuong` (
  `maGT` int(11) NOT NULL,
  `tenGT` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaithuong`
--

INSERT INTO `giaithuong` (`maGT`, `tenGT`) VALUES
(101, 'Hoi vien tot'),
(102, 'Hoi vien xuat sac'),
(103, 'Hoi vien uu tu'),
(104, 'Hoi vien kinh te gioi'),
(105, 'Hoi vien giup do');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoivien`
--

CREATE TABLE `hoivien` (
  `maHV` int(11) NOT NULL,
  `tenhv` varchar(50) NOT NULL,
  `ngayvao` date NOT NULL,
  `noicongtac` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `passwords` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoivien`
--

INSERT INTO `hoivien` (`maHV`, `tenhv`, `ngayvao`, `noicongtac`, `username`, `passwords`) VALUES
(1, '', '0000-00-00', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b'),
(1001, 'Tran Anh', '2015-10-20', 'Ha Noi', 'trananh', '123456'),
(1002, 'Tran Binh', '2015-10-20', 'Ha Noi', '', NULL),
(1003, 'Tran Duong', '2015-10-20', 'Ha Noi', '', NULL),
(1004, 'Tran Cuong', '2015-10-20', 'Ha Noi', '', NULL),
(1005, 'Tran Giap', '2015-10-20', 'Ha Noi', '', NULL),
(1006, 'Tran Hau', '2015-10-20', 'Ha Noi', '', NULL),
(1007, 'Tran Tai Em', '2015-10-20', 'Ha Noi', '', NULL),
(1008, 'Tran Kien', '2015-10-20', 'Ha Noi', '', NULL),
(1009, 'Tran Minh', '2015-10-20', 'Ha Noi', '', NULL),
(1010, 'Tran Ngoc', '2015-10-20', 'Ha Noi', '', NULL),
(1011, 'Tran Xuan', '2015-10-20', 'Ha Noi', '', NULL),
(1012, 'Tran Z', '2015-10-20', 'Ha Noi', '', NULL),
(1013, 'Trần Y', '2015-10-20', 'Hà Nội', '', NULL),
(1223, '', '0000-00-00', 'hn', 'vuminh', 'e10adc3949ba59abbe56e057f20f883e'),
(11111, '', '0000-00-00', 'hn', 'vuminh111', 'e10adc3949ba59abbe56e057f20f883e'),
(11111111, 'Tran anh', '2012-01-01', 'hn', 'abcdef', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoivien_giaithuong`
--

CREATE TABLE `hoivien_giaithuong` (
  `maHV` int(11) NOT NULL,
  `maGT` int(11) NOT NULL,
  `ngaynhan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoivien_giaithuong`
--

INSERT INTO `hoivien_giaithuong` (`maHV`, `maGT`, `ngaynhan`) VALUES
(1001, 101, '2016-10-20'),
(1001, 104, '2016-10-20'),
(1001, 105, '2016-10-20'),
(1002, 101, '2016-10-20'),
(1003, 102, '2016-10-20'),
(1004, 102, '2016-10-20'),
(1005, 103, '2016-10-20'),
(1006, 103, '2016-10-20'),
(1007, 103, '2016-10-20'),
(1008, 103, '2016-10-20'),
(1009, 101, '2016-10-20'),
(1010, 103, '2016-10-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giaithuong`
--
ALTER TABLE `giaithuong`
  ADD PRIMARY KEY (`maGT`);

--
-- Chỉ mục cho bảng `hoivien`
--
ALTER TABLE `hoivien`
  ADD PRIMARY KEY (`maHV`);

--
-- Chỉ mục cho bảng `hoivien_giaithuong`
--
ALTER TABLE `hoivien_giaithuong`
  ADD PRIMARY KEY (`maHV`,`maGT`),
  ADD KEY `giaithuong_ibfk` (`maGT`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoivien_giaithuong`
--
ALTER TABLE `hoivien_giaithuong`
  ADD CONSTRAINT `giaithuong_ibfk` FOREIGN KEY (`maGT`) REFERENCES `giaithuong` (`maGT`),
  ADD CONSTRAINT `hoivien_ibfk` FOREIGN KEY (`maHV`) REFERENCES `hoivien` (`maHV`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
