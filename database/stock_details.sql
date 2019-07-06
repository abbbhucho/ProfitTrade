-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 01:00 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profit_trade`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fulfilled` tinyint(4) NOT NULL,
  `nse_or_bse` tinyint(4) DEFAULT 0,
  `stock_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_price` double(21,10) DEFAULT NULL,
  `buy_quantity` int(11) DEFAULT NULL,
  `buy_gross_total` double(21,10) DEFAULT NULL,
  `buy_stt_total` double(21,10) DEFAULT NULL,
  `buy_sd_total` double(21,10) DEFAULT NULL,
  `buy_b_total` double(21,10) DEFAULT NULL,
  `buy_gst_total` double(21,10) DEFAULT NULL,
  `buy_tc_total` double(21,10) DEFAULT NULL,
  `buy_net_total` double(21,10) DEFAULT NULL,
  `sell_price` double(21,10) DEFAULT NULL,
  `sell_quantity` int(11) DEFAULT NULL,
  `sell_gross_total` double(21,10) DEFAULT NULL,
  `sell_stt_total` double(21,10) DEFAULT NULL,
  `sell_sd_total` double(21,10) DEFAULT NULL,
  `sell_b_total` double(21,10) DEFAULT NULL,
  `sell_gst_total` double(21,10) DEFAULT NULL,
  `sell_tc_total` double(21,10) DEFAULT NULL,
  `sell_net_total` double(21,10) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `user_id`, `fulfilled`, `nse_or_bse`, `stock_name`, `buy_price`, `buy_quantity`, `buy_gross_total`, `buy_stt_total`, `buy_sd_total`, `buy_b_total`, `buy_gst_total`, `buy_tc_total`, `buy_net_total`, `sell_price`, `sell_quantity`, `sell_gross_total`, `sell_stt_total`, `sell_sd_total`, `sell_b_total`, `sell_gst_total`, `sell_tc_total`, `sell_net_total`, `duration`, `created_at`, `updated_at`) VALUES
(27, 1, 0, 0, 'velit', 5905.2030000000, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 226.5995314000, 2669981, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1973-05-22 10:17:29', '2010-05-04 00:31:26'),
(28, 8, 0, 0, 'libero', 44681.4957130410, 5333181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.0000000000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-07-02 20:36:13', '1981-03-30 06:17:26'),
(29, 3, 0, 0, 'sapiente', 321.1300000000, 7698065, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3029434.4804490000, 342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1998-04-21 17:13:20', '2008-06-07 22:16:28'),
(32, 3, 0, 0, 'accusamus', 286369.3575139300, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.0417000000, 157601861, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2001-03-23 17:41:46', '2003-10-25 12:02:12'),
(35, 1, 0, 0, 'nostrum', 52406.5647135970, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.6810606000, 35062, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-03-03 05:59:19', '2019-06-04 16:35:37'),
(36, 7, 0, 0, 'iste', 1.8970000000, 30994, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 242140578.8416000000, 356264078, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-01-07 01:45:29', '1995-04-11 19:52:14'),
(37, 9, 0, 0, 'repellendus', 0.0000000000, 25330265, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 11441655, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1978-04-20 21:15:37', '2010-07-16 21:41:59'),
(38, 3, 0, 0, 'fuga', 6405.7934067000, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 5377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1997-02-28 16:50:10', '1997-03-08 17:02:18'),
(42, 2, 0, 0, 'mollitia', 96404.6046200000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.4752400000, 5875303, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-11-19 02:30:04', '2013-11-17 10:54:09'),
(44, 7, 0, 0, 'laboriosam', 209480671.4000000000, 1834, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 532619859.6580400000, 7598, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-12-06 02:19:38', '1995-06-20 02:09:01'),
(45, 8, 0, 0, 'dolorem', 3371.0000000000, 345, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 487160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1977-01-10 07:30:37', '2006-04-08 02:26:49'),
(47, 9, 0, 0, 'earum', 4993458.3900000000, 3682976, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31595.0000000000, 316639, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-09-13 03:21:06', '2006-12-27 19:44:11'),
(48, 4, 1, 0, 'pim', 4.0000000000, 5, 20.0000000000, 0.0006700000, 0.0004000000, 0.0008000000, 0.0150030000, 0.0000067000, 20.0168797000, 2.0000000000, 3, 6.0000000000, 0.0002010000, 0.0001200000, 0.0040000000, 0.0726030000, 0.0000020100, 6.0769260100, NULL, '1972-10-26 00:25:34', '2019-07-02 03:11:46'),
(49, 5, 0, 0, 'et', 17265043.3800000000, 64377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5186.3528400000, 673, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-04-01 01:45:58', '1993-07-18 03:59:52'),
(50, 6, 0, 0, 'id', 7787.7001900000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 1936281, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1982-06-30 10:02:11', '2004-07-03 05:37:52'),
(51, 1, 0, 0, 'consequatur', 752983.0000000000, 302780, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83.1300000000, 2640774, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1982-11-26 09:02:07', '2003-04-14 00:28:04'),
(52, 2, 0, 0, 'rerum', 3060065.4631475000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 478431.0000000000, 17212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1986-01-31 04:26:15', '2007-01-25 22:59:22'),
(53, 6, 0, 0, 'enim', 6.3333240000, 27798, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 126026498.0396300000, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1984-06-11 18:40:12', '1970-09-23 16:36:00'),
(54, 0, 0, 0, 'consequuntur', 3131377.0000000000, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 221741.1100000000, 491478663, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1988-07-18 18:43:50', '2013-01-20 20:04:04'),
(55, 8, 0, 0, 'aut', 883344.4614700000, 4360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22133.0792653500, 188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-06-16 03:50:49', '2009-09-05 02:09:04'),
(56, 1, 0, 0, 'reiciendis', 57781.1830000000, 836, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7797306.5847938000, 2689487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1974-05-13 02:32:09', '1971-08-28 08:27:31'),
(57, 3, 0, 0, 'beatae', 5928.4329000000, 26587, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16.8111870000, 2647, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1989-09-22 20:37:56', '2010-05-03 07:26:39'),
(58, 3, 0, 0, 'consectetur', 4.2019340000, 129475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 837398203.3000000000, 128331277, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1987-07-23 14:08:33', '2002-09-03 02:47:33'),
(59, 0, 0, 0, 'asperiores', 673.6324191900, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.2000000000, 604, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2001-04-18 13:43:58', '2011-07-04 05:41:44'),
(61, 6, 0, 0, 'voluptatum', 30533739.5026990000, 108860645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13877.7330000000, 27140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-07-22 12:10:59', '1996-08-28 20:41:11'),
(62, 5, 0, 0, 'voluptas', 20100.2720000000, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79.8103423390, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1988-10-13 10:59:57', '2017-10-08 15:02:23'),
(63, 2, 0, 0, 'quaerat', 40250394.6355390000, 59683, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2301.4787280000, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1975-10-20 10:26:39', '1970-07-04 21:06:17'),
(64, 6, 0, 0, 'pariatur', 142830.8682610000, 730312, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 223.1741000000, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1974-01-02 12:30:53', '2006-07-13 04:40:16'),
(65, 3, 0, 0, 'ea', 0.0000000000, 316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.5474000000, 265280, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1978-10-15 09:19:23', '2015-10-19 20:43:20'),
(67, 4, 0, 0, 'SONY', 1000.0000000000, 100, 100000.0000000000, 3.3500000000, 2.0000000000, 0.2000000000, 3.6006030000, 0.0335000000, 100009.1841030000, 1000.0000000000, 80, 80000.0000000000, 2.6800000000, 1.6000000000, 2.0000000000, 36.0006030000, 0.0268000000, 80042.3074030000, NULL, '1986-09-20 19:46:00', '2019-07-04 10:36:28'),
(68, 4, 0, 0, 'official', 2.0000000000, 2, 4.0000000000, 0.0001340000, 0.0000800000, 0.0004000000, 0.0078030000, 0.0000013400, 4.0084183400, 1.0000000000, 1, 1.0000000000, 0.0000335000, 0.0000200000, 0.0020000000, 0.0366030000, 0.0000003350, 1.0386568350, NULL, '1976-01-21 20:34:14', '2019-07-04 20:22:41'),
(69, 6, 0, 0, 'quo', 186477.7000000000, 250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1798.1492348100, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-05-27 20:39:24', '1970-06-22 02:01:50'),
(70, 9, 0, 0, 'inventore', 379954222.0000000000, 7172774, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30.1069080000, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1988-12-14 17:28:52', '1970-05-24 06:09:24'),
(71, 4, 0, 0, 'TCS', 10.0000000000, 20, 200.0000000000, 0.0067000000, 0.0040000000, 0.0020000000, 0.0366030000, 0.0000670000, 200.0493700000, 12.0000000000, 18, 216.0000000000, 0.0072360000, 0.0043200000, 0.0240000000, 0.4326030000, 0.0000723600, 216.4682313600, NULL, '2015-05-07 17:11:48', '2019-07-02 03:48:07'),
(72, 7, 0, 0, 'atque', 102.0100000000, 1955, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3286.2067000000, 33741811, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000-06-22 00:00:43', '2005-09-07 12:20:06'),
(73, 4, 1, 0, 'myee', 3.0000000000, 4, 12.0000000000, 0.0004020000, 0.0002400000, 0.0006000000, 0.0114030000, 0.0000040200, 12.0126490200, 2.0000000000, 3, 6.0000000000, 0.0002010000, 0.0001200000, 0.0040000000, 0.0726030000, 0.0000020100, 6.0769260100, NULL, '1980-10-14 16:00:21', '2019-07-02 03:17:21'),
(74, 2, 0, 0, 'enim', 383253.1000000000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 817.9687576450, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-12 03:55:59', '2000-01-25 05:38:51'),
(75, 8, 0, 0, 'necessitatibus', 74.3796826000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2317920.0000000000, 7257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-02-21 08:34:45', '1980-01-26 18:12:13'),
(76, 4, 0, 0, 'quo', 22282201.2170000000, 76504336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 493853.8000000000, 15293, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1996-09-18 09:42:58', '1977-04-03 04:29:37'),
(77, 4, 0, 0, 'VENIAM', 50.0000000000, 100, 5000.0000000000, 0.1675000000, 0.1000000000, 0.0100000000, 0.1806030000, 0.0016750000, 5000.4597780000, 50.0000000000, 80, 4000.0000000000, 0.1340000000, 0.0800000000, 0.1000000000, 1.8006030000, 0.0013400000, 4002.1159430000, NULL, '2012-09-11 07:08:28', '2019-07-04 20:20:50'),
(79, 2, 0, 0, 'et', 210242.0000000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 946, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-05-20 11:35:46', '1986-09-25 14:42:24'),
(80, 6, 0, 0, 'dolorum', 1659.5550300000, 26886, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 8280, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1983-04-05 00:23:00', '1979-10-11 00:12:21'),
(81, 6, 0, 0, 'magni', 69873.2809776700, 347287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.1077609170, 23551, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-10-23 04:00:35', '1995-11-02 15:19:59'),
(82, 5, 0, 0, 'et', 5008.9887200000, 659406, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1014.5250960000, 699462, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-10-24 09:51:34', '1989-07-25 12:32:51'),
(84, 4, 0, 0, 'sint', 264.0000000000, 14592, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23853.0930000000, 59408443, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-01-22 05:37:01', '2003-03-26 15:17:27'),
(85, 3, 0, 0, 'mollitia', 14447.4542400000, 29645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83782.2400618000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-12-17 04:17:29', '1980-10-11 01:20:16'),
(86, 3, 0, 0, 'voluptas', 72.8545887000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5083.4118700000, 785903732, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-12-29 11:48:08', '1983-12-27 10:52:59'),
(87, 1, 0, 0, 'consequatur', 315856086.8690000000, 18437, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5.0859000000, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2008-03-05 21:44:07', '1991-06-21 19:07:40'),
(88, 1, 0, 0, 'dolor', 551729.5994858300, 467223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11.2814871000, 365397, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1972-03-12 04:50:35', '1981-07-13 22:56:00'),
(89, 3, 0, 0, 'molestias', 2.5700000000, 3037, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 709728.9697600000, 159, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-25 18:34:08', '2001-08-22 12:34:43'),
(90, 4, 0, 0, 'ut', 5.0664000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 444, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2005-05-18 08:07:31', '2018-05-03 10:16:45'),
(91, 3, 0, 0, 'eligendi', 52990161.7784600000, 8293, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 84775589, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1992-06-03 00:56:35', '1972-04-01 12:47:29'),
(93, 9, 0, 0, 'fuga', 1165.8333457000, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-01-25 18:15:58', '1973-07-22 00:31:05'),
(94, 6, 0, 0, 'mollitia', 0.0000000000, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 286.8666346000, 30334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1998-05-07 23:43:40', '2010-08-19 10:55:57'),
(95, 1, 1, 0, 'ducimus', 519.0887407390, 6573661, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 2655184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-05-22 13:26:42', '1980-07-30 13:21:49'),
(96, 3, 0, 0, 'et', 351096391.9029600000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3325.7985800000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-02-19 17:19:48', '2004-02-17 23:09:28'),
(97, 9, 0, 0, 'unde', 67.4741000000, 169450920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2158.9748736000, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1985-09-16 05:04:19', '2016-08-18 06:11:57'),
(98, 8, 0, 0, 'delectus', 1.0000000000, 952320, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 222.7000000000, 6328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:30:05', '2016-06-10 16:14:00'),
(99, 7, 0, 0, 'amet', 41958482.1376050000, 22202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 795.7602267000, 531, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-03-25 13:36:55', '1974-06-30 07:12:45'),
(100, 8, 0, 0, 'reiciendis', 0.9180000000, 230, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2810044.8031043000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1983-01-05 01:30:09', '1982-12-07 23:51:37'),
(101, 7, 0, 0, 'inventore', 3773.5903763000, 167252896, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.9483000000, 16556, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1976-04-15 07:59:49', '1995-05-04 17:41:07'),
(102, 1, 0, 0, 'est', 0.0000000000, 2262, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64569.7137000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-05 10:47:59', '1981-03-22 05:25:39'),
(103, 6, 0, 0, 'in', 44479566.7124480000, 358827006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54.4360000000, 284, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-08-24 13:46:50', '1983-01-06 03:32:43'),
(104, 4, 0, 0, 'natus', 143.3400000000, 2105153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 135.4717559000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1988-03-20 20:29:57', '2006-03-05 11:37:48'),
(105, 7, 0, 0, 'aut', 9396.8367730600, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3.6317800000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1997-11-08 10:48:53', '1985-08-15 09:45:13'),
(106, 7, 0, 0, 'vel', 2464837.3505589000, 1995338, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5.7346714500, 1842, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-02-10 16:25:02', '1991-12-26 07:05:37'),
(107, 2, 0, 0, 'autem', 0.0000000000, 128753829, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-08-10 17:00:15', '1980-06-25 01:18:36'),
(108, 2, 0, 0, 'nihil', 8647819.5208866000, 2600775, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1542.3000000000, 9073, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1996-01-31 20:20:09', '1994-08-21 05:29:55'),
(109, 9, 0, 0, 'adipisci', 10453.2359810000, 16125628, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 76246525.4000000000, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2008-10-12 11:07:56', '1981-12-21 04:06:27'),
(110, 8, 0, 0, 'aut', 9820.6650000000, 589, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26655116.9474000000, 448, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1990-05-15 22:30:14', '1996-07-26 11:30:59'),
(111, 0, 0, 0, 'ut', 56.0000000000, 299595287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 909.2696000000, 488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1994-04-20 17:49:17', '1999-11-14 15:22:40'),
(112, 4, 0, 0, 'Mun', 100.0000000000, 20, 2000.0000000000, 0.0670000000, 0.0400000000, 0.0200000000, 0.3606030000, 0.0006700000, 2000.4882730000, 80.0000000000, 15, 1200.0000000000, 0.0402000000, 0.0240000000, 0.1600000000, 2.8806030000, 0.0004020000, 1203.1052050000, NULL, '1995-01-25 06:00:50', '2019-07-02 03:46:19'),
(113, 1, 0, 0, 'temporibus', 375528322.9946000000, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 824571, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2004-05-23 09:01:46', '2011-06-01 05:52:29'),
(114, 2, 0, 0, 'sit', 70.7518700000, 120767501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35408946.6109170000, 426481778, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-07-21 05:03:44', '1996-06-14 16:46:27'),
(115, 2, 0, 0, 'omnis', 29801.6740000000, 660162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 105151384.8967300000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2006-11-05 11:58:52', '1992-11-06 01:35:53'),
(116, 9, 0, 0, 'aperiam', 0.0000000000, 668, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 401.7070000000, 1689038, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-10-15 23:04:19', '2008-09-09 03:47:00'),
(117, 0, 0, 0, 'sit', 0.7064361000, 409733135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16723324.8000560000, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1997-02-10 13:36:54', '1996-10-20 03:03:09'),
(118, 3, 0, 0, 'porro', 4.6258000000, 10521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8795991.9000000000, 50569912, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1984-03-04 02:13:08', '2010-12-25 23:03:39'),
(120, 2, 0, 0, 'ad', 2990.7067800000, 1420466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5.9699700000, 266159335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-05-02 12:39:26', '1993-07-09 12:52:36'),
(121, 6, 0, 0, 'pariatur', 40453794.4039000000, 35445, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4953.3000000000, 989, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1992-03-30 11:32:18', '1980-09-13 18:06:27'),
(122, 9, 0, 0, 'rerum', 0.0000000000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0000000000, 369169170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1992-09-29 07:13:39', '1970-01-30 07:29:29'),
(123, 6, 0, 0, 'nobis', 12962158.0000000000, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26958671.4887000000, 570481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1983-02-17 05:23:41', '2005-10-22 16:23:37'),
(124, 7, 0, 0, 'consequatur', 59534449.3251330000, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1255.2000000000, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1987-10-16 02:21:02', '1988-10-15 13:07:53'),
(125, 1, 0, 0, 'consequatur', 4729.0000000000, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23884.5000000000, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2008-08-11 22:14:57', '2011-05-19 07:25:50'),
(126, 7, 0, 0, 'nihil', 58900.3209852020, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.3234014000, 2245766, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1986-02-23 05:54:28', '2000-04-18 18:59:19'),
(132, 4, 1, 1, 'Epam', 110.0000000000, 120, 13200.0000000000, 0.4422000000, 0.2640000000, 0.0220000000, 0.3966030000, 0.0044220000, 13201.1292250000, 110.0000000000, 110, 12100.0000000000, 0.4053500000, 0.2420000000, 0.2200000000, 3.9606030000, 0.0040535000, 12104.8320065000, NULL, '2019-07-04 11:57:50', '2019-07-04 11:57:50'),
(133, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:31:22', '2019-07-04 20:31:22'),
(134, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:43:35', '2019-07-04 20:43:35'),
(135, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:48:35', '2019-07-04 20:48:35'),
(136, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:48:57', '2019-07-04 20:48:57'),
(137, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:49:45', '2019-07-04 20:49:45'),
(138, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:50:34', '2019-07-04 20:50:34'),
(139, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:51:01', '2019-07-04 20:51:01'),
(140, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:51:36', '2019-07-04 20:51:36'),
(141, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 20:51:57', '2019-07-04 20:51:57'),
(142, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 120, 132030.0000000000, 4.4230050000, 2.6406000000, 0.2200500000, 3.9615030000, 0.0442300500, 132041.2893880500, 1200.0000000000, 110, 132000.0000000000, 4.4220000000, 2.6400000000, 2.4000000000, 43.2006030000, 0.0442200000, 132052.7068230000, NULL, '2019-07-04 21:02:56', '2019-07-04 21:02:56'),
(143, 4, 0, 1, 'ProfitTATA', 1100.2500000000, 10, 11002.5000000000, 0.3685837500, 0.2200500000, 0.2200500000, 3.9615030000, 0.0036858375, 11013.7488438375, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 21:02:56', '2019-07-04 21:02:56'),
(144, 4, 1, 0, 'ProfitTATA', 1100.2500000000, 110, 121027.5000000000, 4.0544212500, 2.4205500000, 0.2200500000, 3.9615030000, 0.0405442125, 121038.1970684625, 1200.0000000000, 100, 120000.0000000000, 4.0200000000, 2.4000000000, 2.4000000000, 43.2006030000, 0.0402000000, 120052.0608030000, NULL, '2019-07-04 21:06:34', '2019-07-04 21:06:34'),
(145, 4, 1, 1, 'ProfitTATA', 1100.2500000000, 110, 121027.5000000000, 4.0544212500, 2.4205500000, 0.2200500000, 3.9615030000, 0.0405442125, 121038.1970684625, 1200.0000000000, 100, 120000.0000000000, 4.0200000000, 2.4000000000, 2.4000000000, 43.2006030000, 0.0402000000, 120052.0608030000, NULL, '2019-07-04 21:07:15', '2019-07-04 21:07:15'),
(146, 4, 0, 1, 'ProfitTATA', 1100.2500000000, 10, 11002.5000000000, 0.3685837500, 0.2200500000, 0.2200500000, 3.9615030000, 0.0036858375, 11013.1602100875, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 21:07:15', '2019-07-04 21:07:15'),
(147, 4, 1, 0, 'ICAREQWE', 10.3400000000, 11, 113.7400000000, 0.0038102900, 0.0022748000, 0.0020680000, 0.0378270000, 0.0000381029, 113.7860181929, 11.0000000000, 10, 110.0000000000, 0.0036850000, 0.0022000000, 0.0220000000, 0.3966030000, 0.0000368500, 110.4245248500, NULL, '2019-07-05 00:18:28', '2019-07-05 00:18:28'),
(148, 4, 1, 0, 'VENIAM231', 11.0000000000, 11, 121.0000000000, 0.0040535000, 0.0024200000, 0.0022000000, 0.0402030000, 0.0000405350, 121.0489170350, 9.0000000000, 9, 81.0000000000, 0.0027135000, 0.0016200000, 0.0180000000, 0.3246030000, 0.0000271350, 81.3469636350, NULL, '2019-07-05 00:31:48', '2019-07-05 00:31:48'),
(149, 4, 1, 0, 'VENIAM231', 11.0000000000, 11, 121.0000000000, 0.0040535000, 0.0024200000, 0.0022000000, 0.0402030000, 0.0000405350, 121.0489170350, 9.0000000000, 9, 81.0000000000, 0.0027135000, 0.0016200000, 0.0180000000, 0.3246030000, 0.0000271350, 81.3469636350, NULL, '2019-07-05 00:34:03', '2019-07-05 00:34:03'),
(150, 4, 0, 0, 'VENIAM231', 11.0000000000, 2, 22.0000000000, 0.0007370000, 0.0004400000, 0.0022000000, 0.0402030000, 0.0000073700, 22.0488838700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-05 00:34:03', '2019-07-05 00:34:03'),
(151, 4, 1, 0, 'VENIAM231', 11.0000000000, 11, 121.0000000000, 0.0040535000, 0.0024200000, 0.0022000000, 0.0402030000, 0.0000405350, 121.0489170350, 9.0000000000, 9, 81.0000000000, 0.0027135000, 0.0016200000, 0.0180000000, 0.3246030000, 0.0000271350, 81.3469636350, NULL, '2019-07-05 00:34:09', '2019-07-05 00:34:09'),
(152, 4, 0, 0, 'VENIAM231', 11.0000000000, 2, 22.0000000000, 0.0007370000, 0.0004400000, 0.0022000000, 0.0402030000, 0.0000073700, 22.0488838700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-05 00:34:09', '2019-07-05 00:34:09'),
(153, 4, 1, 0, 'VENIAM231', 11.0000000000, 11, 121.0000000000, 0.0040535000, 0.0024200000, 0.0022000000, 0.0402030000, 0.0000405350, 121.0489170350, 9.0000000000, 9, 81.0000000000, 0.0027135000, 0.0016200000, 0.0180000000, 0.3246030000, 0.0000271350, 81.3469636350, NULL, '2019-07-05 00:36:25', '2019-07-05 00:36:25'),
(154, 4, 0, 0, 'VENIAM231', 11.0000000000, 2, 22.0000000000, 0.0007370000, 0.0004400000, 0.0022000000, 0.0402030000, 0.0000073700, 22.0488838700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-05 00:36:25', '2019-07-05 00:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;