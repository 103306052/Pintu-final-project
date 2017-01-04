-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-01-04 15:23:11
-- 伺服器版本: 10.1.10-MariaDB
-- PHP 版本： 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pintu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `product_id` int(11) NOT NULL,
  `inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`product_id`, `inventory`) VALUES
(1, 10),
(2, 73),
(3, 50),
(4, 25),
(5, 100),
(6, 135);

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `R` float NOT NULL,
  `F` float NOT NULL,
  `M` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `R`, `F`, `M`) VALUES
(1, '謝宜庭', 'alice@gmail.com', '0911223344', 6, 0.4, 2500),
(2, '張益菕', 'nick@gmail.com', '0922334455', 0.3, 5, 50000),
(3, '黃晨浩', 'thpss@gmail.com', '0933445566', 5, 0.01, 15000),
(4, '鄭俊彥', 'quadratic@gmail.com', '0944556677', 1.4, 1, 4650),
(5, '林昱青', 'lisa@gmail.com', '0955667788', 10, 0.001, 1000),
(6, '歐易靈', 'annie@gmail.com', '0966778899', 0.03, 1.7, 68000),
(7, '謝怡宣', 'janet@gmail.com', '0977889911', 4.2, 0.005, 8000),
(8, '莊涵雯', 'sally@gmail.com', '0988991122', 6.1, 1.63, 27000),
(9, '洪翊慈', 'karen@gmail.com', '0999112233', 2.1, 0.65, 7550),
(10, '黃禹瑄', 'patty@gmail.com', '0999223344', 0.08, 1.4, 62000),
(11, '李璟蓉', 'gina@gmail.com', '0999334455', 15, 0.0003, 1500),
(12, '許柏鈞', 'tom@gmail.com', '0999445566', 5.1, 2.8, 9350),
(13, '柯凱程', 'anton@gmail.com', '0999556677', 0.08, 1.78, 285000),
(14, '曾穎蕎', 'erica@gmail.com', '0999667788', 4.02, 0.0008, 46800),
(15, '林威辰', 'way@gmail.com', '0999778899', 2.9, 0.7, 4900),
(16, '王謙', 'chance@gmail.com', '0999889911', 4.64, 0.002, 20000),
(17, '何旻恂', 'minshin@gmail.com', '0919547392', 5, 3, 40000),
(18, '王譽臻', 'wang@gmail.com', '0933333333', 2.5, 3.8, 2450),
(19, '何姵欣', 'betty@gmail.com', '0911111111', 6.1, 0.04, 53200);

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `D` int(10) NOT NULL,
  `S` int(10) NOT NULL,
  `H` int(10) NOT NULL,
  `p` double DEFAULT NULL,
  `u` double DEFAULT NULL,
  `EOQ` int(11) DEFAULT NULL,
  `EPQ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `products_id` int(10) NOT NULL,
  `products_name` varchar(25) CHARACTER SET latin1 NOT NULL,
  `products_distributed_Q` int(10) NOT NULL,
  `products_Q` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `shop`
--

INSERT INTO `shop` (`id`, `name`, `products_id`, `products_name`, `products_distributed_Q`, `products_Q`) VALUES
(1, '師大', 1, 'Stars', 59, 112),
(2, '信義', 1, 'Stars', 59, 61);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
