-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 02:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `MaDH` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `Note` text NOT NULL,
  `DiaChi` text NOT NULL,
  `Total` int(11) NOT NULL,
  `SDT` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`MaDH`, `MaKH`, `Note`, `DiaChi`, `Total`, `SDT`, `createDate`) VALUES
(14, 1, 'cxxxx', 'ha dong', 48889776, 22, '2022-01-16 09:47:00'),
(15, 1, 'sss', 'ha dong', 139945404, 363101188, '2022-01-16 09:58:06'),
(16, 2, 'giao hàng nhanh lên nhé', 'Thái Nguyên', 129964268, 363101188, '2022-02-04 06:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `Producer`
--

CREATE TABLE `Producer` (
  `MaNSX` int(11) NOT NULL,
  `TenNSX` text NOT NULL,
  `DiaChi` text NOT NULL,
  `SDT` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Producer`
--

INSERT INTO `Producer` (`MaNSX`, `TenNSX`, `DiaChi`, `SDT`, `createDate`) VALUES
(1, 'Apple', 'USA', 22, '2021-12-16 04:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `MaSP` int(11) NOT NULL,
  `MaNSX` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSP` text NOT NULL,
  `ChiTiet` text NOT NULL,
  `Gia` int(11) NOT NULL,
  `Anh` text NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`MaSP`, `MaNSX`, `MaLoai`, `TenSP`, `ChiTiet`, `Gia`, `Anh`, `createDate`) VALUES
(2, 1, 1, 'Iphone 13', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 12222444, '[\"./assets/uploads/156576625261bedac155ca69.34515416.jpg\",\"./assets/uploads/182373950761bedac155d2f7.94880314.png\"]', '2022-01-16 14:55:11'),
(3, 1, 1, 'Iphone 14', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 23324234, '[\"./assets/uploads/212547811361bedae0ed3671.73008139.jpg\",\"./assets/uploads/174925386861bedae0ed3d06.50453306.jpg\"]', '2021-12-19 07:10:26'),
(4, 1, 1, 'Iphone 15', '<p>dasdsa</p>\r\n', 12222444, '[\"./assets/uploads/2021801300620674fa724959.70201528.JPG\",\"./assets/uploads/1804837028620674fa725103.65672682.JPG\"]', '2022-02-11 14:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `subOrders`
--

CREATE TABLE `subOrders` (
  `MaDHP` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` text NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subOrders`
--

INSERT INTO `subOrders` (`MaDHP`, `MaDH`, `MaSP`, `quantity`, `price`, `status`, `createDate`) VALUES
(3, 14, 2, 4, 12222444, '', '2022-01-16 09:47:00'),
(4, 15, 3, 6, 23324234, '', '2022-01-16 09:58:06'),
(5, 16, 2, 3, 12222444, '', '2022-02-04 06:57:17'),
(6, 16, 3, 4, 23324234, '', '2022-02-04 06:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` text NOT NULL DEFAULT 'true',
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `MaKH`, `MaNV`, `content`, `status`, `createDate`) VALUES
(6, 7, 0, 'aaa', 'no', '2022-02-13 03:34:39'),
(7, 7, 1, 'hello, what is up ??', 'yes', '2022-02-13 03:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `typeProducts`
--

CREATE TABLE `typeProducts` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` text NOT NULL,
  `createDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeProducts`
--

INSERT INTO `typeProducts` (`MaLoai`, `TenLoai`, `createDate`) VALUES
(1, 'IPhone', NULL),
(2, 'Laptop', NULL),
(3, 'Camera', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `sdt` int(10) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`, `role`, `DiaChi`, `sdt`, `createDate`, `info`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'Thái Nguyên', 123456789, '2021-12-16 03:44:50', NULL),
(2, 'abc', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 0, 'Hà Nội', 363101188, '2022-01-16 08:28:25', '{\"avatar\":\"./assets/uploads/131602674761e38fd8ea0618.62498244.jpg\",\"sex\":\"1\"}'),
(6, 'le haoa', 'admin3222@gmail.com', 'c84258e9c39059a89ab77d846ddab909', 0, 'Thái Nguyên', 23238232, '2022-02-05 01:48:02', '{\"avatar\":\"./assets/uploads/116733864361fdd7503bc957.68054675.jpg\",\"sex\":\"0\"}'),
(7, 'hihia', 'admin333@gmail.comw', '21232f297a57a5a743894a0e4a801fc3', 0, 'hai phong', 363101188, '2022-02-05 01:48:47', '{\"avatar\":\"\",\"sex\":\"0\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `fk_2e232a` (`MaKH`);

--
-- Indexes for table `Producer`
--
ALTER TABLE `Producer`
  ADD PRIMARY KEY (`MaNSX`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_345341` (`MaNSX`),
  ADD KEY `fk_34534441` (`MaLoai`);

--
-- Indexes for table `subOrders`
--
ALTER TABLE `subOrders`
  ADD PRIMARY KEY (`MaDHP`),
  ADD KEY `fl_332423sad` (`MaSP`),
  ADD KEY `fl_3324dd23sad` (`MaDH`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_2sdsd` (`MaKH`);

--
-- Indexes for table `typeProducts`
--
ALTER TABLE `typeProducts`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Producer`
--
ALTER TABLE `Producer`
  MODIFY `MaNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subOrders`
--
ALTER TABLE `subOrders`
  MODIFY `MaDHP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `typeProducts`
--
ALTER TABLE `typeProducts`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_2e232a` FOREIGN KEY (`MaKH`) REFERENCES `users` (`ID`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `fk_345341` FOREIGN KEY (`MaNSX`) REFERENCES `Producer` (`MaNSX`),
  ADD CONSTRAINT `fk_34534441` FOREIGN KEY (`MaLoai`) REFERENCES `typeProducts` (`MaLoai`);

--
-- Constraints for table `subOrders`
--
ALTER TABLE `subOrders`
  ADD CONSTRAINT `fl_332423sad` FOREIGN KEY (`MaSP`) REFERENCES `Product` (`MaSP`),
  ADD CONSTRAINT `fl_3324dd23sad` FOREIGN KEY (`MaDH`) REFERENCES `orders` (`MaDH`);

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `fk_2sdsd` FOREIGN KEY (`MaKH`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
