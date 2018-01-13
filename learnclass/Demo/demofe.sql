-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2018 lúc 12:46 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demofe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangday`
--

CREATE TABLE `giangday` (
  `giangvienID` int(11) NOT NULL,
  `monhocID` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL DEFAULT '2017-03-03'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangday`
--

INSERT INTO `giangday` (`giangvienID`, `monhocID`, `ngaybatdau`) VALUES
(1, 2306, '2017-06-07'),
(2, 2306, '2017-08-31'),
(4, 2306, '2017-06-07');

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
-- Cấu trúc bảng cho bảng `hoivien`
--

CREATE TABLE `hoivien` (
  `ma` int(11) NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoivien`
--

INSERT INTO `hoivien` (`ma`, `ten`) VALUES
(2, 'Trần Vân'),
(3, 'Trần V??n'),
(123, 'Trần Xu??n'),
(455, 'Trần Minh');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `keya` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Name`, `email`, `Birthday`, `keya`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', '1/1/1996', 1),
(15, 'tuananh_uetz', 'f3abb86bd34cf4d52698f14c0da1dc60', 'trấn hoàng vận', 'trananzh9a@gmail.com', '12/21/1999', 0),
(25, '15021405', 'f3abb86bd34cf4d52698f14c0da1dc60', 'trần vân xuẩn', 'tzrananh9a@gmail.com', '11/2/1998', 1),
(29, '1502140511', '698d51a19d8a121ce581499d7b701668', 'Hoàng Văn Vấn', 'trananh19a@gmail.com', '1/1/1996', 0),
(35, '15021405vvvvv', '4786f3282f04de5b5c7317c490c6d922', 'Trần Anh Hoàng', 'trananh9a@gmail.com', '11/2/1998', 0),
(37, '15021405xc', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 'Trấn Hoàng Vận', 'trananh9xxxa@gmail.com', '21/12/1999', 0),
(38, '15021405vb', '4786f3282f04de5b5c7317c490c6d922', 'Trần Vân', 'trananh9a@gmail.com', '21/12/1999', 0),
(39, '15021405sdsdsd', '25ed1bcb423b0b7200f485fc5ff71c8e', 'Vương Minh', 'trananh9a@gmail.com', '21/12/1999', 0),
(41, '15021405ccccc', '9df62e693988eb4e1e1444ece0578579', 'Tran Tuan Anh', 'trananh9ccca@gmail.com', '11/1/1996', 0),
(42, '15021405ccccc', '9df62e693988eb4e1e1444ece0578579', 'Tran Tuan Anh', 'trananh9ccca@gmail.com', '11/1/1996', 0),
(45, '15021405ccccx', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 'Tran Tuan Anh', 'trananh9a@gmail.com', '12/21/1999', 1),
(46, '15021405z', '7f6ffaa6bb0b408017b62254211691b5', 'Tran Tuan Anh', 'trananh9a@gmail.com', '1996/11/1', 0),
(47, '15021405z', '7f6ffaa6bb0b408017b62254211691b5', 'Tran Tuan Anh', 'trananh9a@gmail.com', '1996/11/1', 0),
(48, '15021405zxzx', 'f3abb86bd34cf4d52698f14c0da1dc60', 'Tran Tuan Anh', 'trananh9a@gmail.com', '3/1/1990', 0);

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
-- Chỉ mục cho bảng `hoivien`
--
ALTER TABLE `hoivien`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`monhocID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
