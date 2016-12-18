-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016 �?12 ??18 ??16:20
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `pintu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `D` int(10) NOT NULL,
  `S` int(10) NOT NULL,
  `H` int(10) NOT NULL,
  `p` double DEFAULT NULL,
  `u` double DEFAULT NULL,
  `EOQ` int(11) DEFAULT NULL,
  `EPQ` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`id`, `name`, `D`, `S`, `H`, `p`, `u`, `EOQ`, `EPQ`) VALUES
(1, 'Stars', 10000, 54, 50, NULL, NULL, 147, NULL),
(2, 'Your name', 5200, 60, 51, NULL, NULL, 111, NULL),
(3, 'Sun flowers', 13800, 75, 50, NULL, NULL, 197, NULL),
(4, 'Moonlight', 12000, 77, 50, 0.8, 0.52, NULL, 325),
(5, 'Maplestory', 5000, 48, 40, 0.85, 0.4, NULL, 160),
(6, 'Subway', 9500, 66, 55, 0.88, 0.55, NULL, 247);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
