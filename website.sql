-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2023 at 03:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_user`, `fullname`, `email`, `username`, `password`, `role`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'admin', '123', 1),
(13, 'phamdong', NULL, 'Dh52001330@student.stu.edu.vn', '$2y$10$YpyLXa.lZ9kJGmpRzO1lLezEMFGMSeXeaUzhv6bwlRvuLeMD2urJ6', 0),
(4, 'Tran Phat', NULL, 'trantanphat@gmail.com', '$2y$10$uGCkOJlcPUewNb8ztjgb3eWvUiePLTxxmWLgzOimLGzfGboPjd2M.', 0),
(12, 'tien', NULL, 'tien@gmail.com', '$2y$10$jVdq5y3bLf85qFspaiO5zejwS1GyI.IrVPMhLf9R/i9r0X7xyku9i', 0),
(11, 'phat1', NULL, 'phat1@gmail.com', '$2y$10$vILaAsmdp8Z9uQLIhQ4u7uEtaRpIA.3PjZoGnq7fvMsEgOh11PfTu', 1),
(10, 'tanphat', NULL, 'tranphat@gmail.com', '$2y$10$kHmU08TcyVxqAWm/pOKfMeOvG8sYDvFI9XYXimgaR3FmlatS07jN2', 0),
(14, 'trantanphat', NULL, 'dh52003792@student.stu.edu.vn', '$2y$10$THq1JT3ibBbLP4W6h1mmpegAeGZ1Io3ddTcObAO.77VBPmqrdQh5u', 0),
(15, 'toan', NULL, '123@gmail.com', '$2y$10$oFHcbSP1nNCYsE/SpibAm.pDxeMMbLsCvB2Fgj2jDjINma1AVIvtK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `namecategory` varchar(100) NOT NULL,
  `serial` int(11) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `namecategory`, `serial`) VALUES
(52, 'Iphone', 1),
(53, 'Samsung', 2),
(54, 'Oppo', 3),
(55, 'Vivo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `nameproduct` varchar(250) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `priceproduct` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text NOT NULL,
  `summary` tinytext NOT NULL,
  `picture` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `LK_1` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `nameproduct`, `productcode`, `priceproduct`, `quantity`, `content`, `summary`, `picture`, `status`, `id_category`) VALUES
(131, 'Iphone', '1', '2000000', 11, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1702990636_iphon14.png', 1, 52),
(132, 'Vivo', '2', '3000000', 22, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1702990730_vivo-y22.png', 1, 55);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `LK_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
