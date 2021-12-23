-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2021 at 03:55 PM
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
  `Note` int(11) NOT NULL,
  `DiaChi` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `SDT` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 1, 1, 'Iphone 13', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 12222444, '[\"./assets/uploads/156576625261bedac155ca69.34515416.jpg\",\"./assets/uploads/182373950761bedac155d2f7.94880314.png\"]', '2021-12-19 07:09:56'),
(3, 1, 1, 'Iphone 14', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 23324234, '[\"./assets/uploads/212547811361bedae0ed3671.73008139.jpg\",\"./assets/uploads/174925386861bedae0ed3d06.50453306.jpg\"]', '2021-12-19 07:10:26');

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

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'true',
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'Thái Nguyên', 123456789, '2021-12-16 03:44:50', NULL);

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
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producer`
--
ALTER TABLE `Producer`
  MODIFY `MaNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typeProducts`
--
ALTER TABLE `typeProducts`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
