-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2026 at 09:37 AM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u573967329_ecomdemoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_settings`
--

CREATE TABLE `all_settings` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Logo` varchar(300) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Links` text NOT NULL,
  `currency` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytics` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_settings`
--

INSERT INTO `all_settings` (`ID`, `Title`, `Logo`, `Email`, `Phone`, `Address`, `Description`, `Links`, `currency`, `google_analytics`) VALUES
(1, 'E-commerce', '1728803054_e8778ea13ec894e43181.png', 'info.fablead@gmail.com', '0123456788', 'NO. 342 - London Oxford Street.\r\n012 United Kingdom.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.', '{\"insta\":\"{\\\"status\\\":\\\"1\\\",\\\"link\\\":\\\"https:\\\\\\/\\\\\\/www.instagram.com\\\"}\",\"facebook\":\"{\\\"status\\\":\\\"1\\\",\\\"link\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\"}\",\"twitter\":\"{\\\"status\\\":\\\"1\\\",\\\"link\\\":\\\"https:\\\\\\/\\\\\\/www.twitter.com\\\"}\",\"checkout\":\"{\\\"status\\\":\\\"0\\\",\\\"link\\\":\\\"https:\\\\\\/\\\\\\/www.twitter.com\\\"}\"}', '€', 'UA-12345678-0');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `BannerID` int(11) NOT NULL,
  `BannerTitle` varchar(255) NOT NULL,
  `BannerPosition` varchar(255) NOT NULL,
  `BannerText` varchar(255) NOT NULL,
  `BannerImg` varchar(255) NOT NULL,
  `BannerUrl` varchar(255) NOT NULL,
  `BannerLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`BannerID`, `BannerTitle`, `BannerPosition`, `BannerText`, `BannerImg`, `BannerUrl`, `BannerLive`, `Created_at`, `Updated_at`) VALUES
(1, '', 'jgfjgj', '', '1702897486_863a2344c3e135685227.jpg', 'https://www.industrybuying.com/', 1, '0000-00-00 00:00:00', '2023-06-15 10:51:14'),
(2, '', 'rtfhrthrthrthrth', '', '1702898117_bfb8000c423ca023a68b.jpg', 'https://www.industrybuying.com/', 1, '0000-00-00 00:00:00', '2023-06-15 10:53:02'),
(3, '', 'rtfhrthrthrthrth', '', '1702899254_bbc4158f0b584dcec0b0.jpg', 'https://www.industrybuying.com/', 1, '0000-00-00 00:00:00', '2023-06-15 10:53:20'),
(4, '', 'Soluta molestias non', '', '1702898301_8a14c310626ae327b8d9.jpg', 'https://www.cogozyxyk.ws', 1, '0000-00-00 00:00:00', '2023-06-15 11:00:54'),
(7, '', '', '', '1687349956_cd6c920cfcfc47b77893.jpg', 'https://www.industrybuying.com/', 1, '0000-00-00 00:00:00', '2023-06-15 12:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `tags` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `image`, `description`, `category`, `tags`, `created_by`, `created_at`, `updated_at`) VALUES
(13, 'Man’s Fashion Winter Sale', '1686832226_369ad389b91811627a32.jpg', 'grtg vsdhadg agasgasgsahgha h hsdhsdjhdsjsd', 31, '[\"2\",\"3\"]', '6', '2023-12-11 15:20:13', '2023-06-15 17:51:38'),
(15, 'Women Fashion Festive', '1702986481_f48449f0481825b5e42c.jpg', 'fdjdfs dhdshsd sdhsd hsdgsdgsd gsdncxvsdhsdjhs', 23, '[\"1\"]', '6', '2023-12-03 15:20:06', '2023-06-15 18:00:50'),
(18, 'sport', '1701844292_c3b738dcb977ab889d8d.jpg', 'indian sport', 23, '[\"1\",\"2\"]', '6', '2023-12-03 15:20:17', '2023-12-06 12:01:32'),
(19, 'rthretr', '1702459538_b30e483c2c2d294b60bc.png', 'rthrthrhrt', 23, '[\"1\",\"2\"]', '6', '2023-10-16 15:20:22', '2023-12-13 14:55:38'),
(20, 'rthrth', '1702460922_44b9b4372e12a75e3190.png', 'What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.', 23, '[\"3\",\"4\"]', '6', '2023-12-13 15:18:42', '2023-12-13 15:18:42'),
(21, 'tyjtyj', '1702461436_58f816f94c754b16ce50.png', 'What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.', 35, '[\"2\",\"4\"]', '6', '2023-12-13 15:27:16', '2023-12-13 15:27:16'),
(22, 'y5y', '1702532270_6dc515904d0354f6464c.png', 'hrh', 32, '[\"2\",\"3\"]', '6', '2023-12-14 11:07:50', '2023-12-14 11:07:50'),
(24, '65yh56y6', '1702537175_e7bb67c8508b265b451a.png', 'yheryyg', 29, '[\"3\",\"4\"]', '6', '2023-12-14 12:29:35', '2023-12-14 12:29:35'),
(25, 'Who Will Inspire Your Capsule Wardrobe', '1702986609_80e50895bf34c71cef78.jpg', 'And like all personal choices, we each have our own reasons and rationales for committing to our lifestyle decisions. While some may prefer capsule wardrobes for their simplicity and ease, others might see owning less as a creative challenge. And although one might edit their closet simply to save money, another does so to reduce the harmful environmental and social costs of ownership. ', 31, '[\"2\"]', '6', '2023-12-14 12:43:32', '2023-12-14 12:43:32'),
(27, 'What To Ask For This Christmas 2023: 48 Stylish Gifts For Men', '1702986514_b6cf1adfa38759064ea9.jpg', 'he modern gentleman is not the final stage in Darwin’s evolutionary process. A true gentleman should always be looking to enrich himself further through experience, self-improvement and the enjoyment of quality, whilst keeping an eye on value. ', 31, '[\"1\",\"2\",\"3\",\"4\"]', '6', '2023-12-16 13:35:11', '2023-12-16 13:35:11'),
(28, 'Winter Fashion For Women To Look Wow', '1702967280_e4a539d5d385f9ca7e54.jpg', 'Winter fashion is a sure thing. Warmth and comfort come first, but fashion is not far away in winter clothing. And, when it comes to ladies, winter fashion for women is pretty. What to wear in winter? You might wonder what to wear in the colder months, but where do you start?', 23, '[\"2\",\"3\"]', '6', '2023-12-16 13:35:39', '2023-12-16 13:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `comments`, `name`, `email`, `created_at`) VALUES
(1, 21, 'Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.', 'gewgwh', 'fdgrbhfrgbh', '2023-12-13 11:14:50'),
(2, 19, 'yregrtretgeg', 'erfgerg', 'akshayfablead@gmail.com', '2023-12-13 11:28:56'),
(3, 21, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'sadfdfsdfdf', 'kiran.fablead@gmail.com', '2023-12-13 11:40:52'),
(4, 21, 'wefwefwe', 'efwefwef', 'akshayfablead@gmail.com', '2023-12-13 12:01:27'),
(5, 21, 'erfgerfgerg', 'erfgeafg', 'akshayfablead@gmail.com', '2023-12-13 12:06:54'),
(6, 21, 'test hello', 'Bhavik Modi', 'bhavik.fablead@gmail.com', '2023-12-14 04:31:52'),
(7, 20, 'rtrthrtrthfrthjh', 'tyhrtyh', 'rthgrtghrt@gmail.com', '2023-12-14 05:38:57'),
(8, 25, 'tyjtyjytj', 'akshay', 'akshayfablead@gmail.com', '2023-12-14 08:08:36'),
(9, 25, 'ergergeewefgawerfgwerfg', 'erhtekrukuerg', 'akshayfablead@gmail.com', '2023-12-15 06:43:37'),
(10, 25, 'ghjmfgtfvjk', 'rtfgjhntgntg', 'akshayfablead@gmail.com', '2023-12-16 08:03:22'),
(11, 13, 'rthrethrthrthrfthfteariwjhltlerjtngerl\r\ntjgdrlgjtlkghfiethertyerlyjrlyjhrtlyjrtyjrtyrjyrtjyrt;yjrtrrjt;rtjrtrtrtjorro\r\n', 'rtfhgrbfrth', 'kiran.fablead@gmail.com', '2023-12-16 08:04:14'),
(12, 21, 'test hellogftvbrrtgrtg', 'Bhavik Modi', 'bhavik.fablead@gmail.com', '2023-12-14 04:31:52'),
(13, 27, 'abc abc abc abc.', 'Sneh', 'fablead.sneh@gmail.com', '2024-11-29 07:42:59'),
(14, 22, 'jhyy uuybuhyy gug', 'Device', 'admin@gmail.com', '2024-11-29 07:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandID`, `BrandName`) VALUES
(1, 'Sony'),
(6, 'nokia'),
(7, 'Lg'),
(8, 'Samsung'),
(9, 'Nike'),
(11, 'TCL'),
(12, 'Asus'),
(13, 'Microsoft'),
(14, 'Versace'),
(15, 'Reymond'),
(16, 'Denim'),
(17, 'Noise'),
(18, 'Skechers'),
(19, 'Party Wear'),
(20, 'Acer'),
(21, 'Msi'),
(22, 'Dell'),
(23, 'Apple'),
(24, 'Nintendo'),
(25, 'Steam'),
(26, 'Cosmic Bytes'),
(27, 'Jbl'),
(28, 'Realme Techlife'),
(29, 'Spigen');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `variation_tbl_id` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `variation_tbl_id`, `product_color`, `product_size`, `product_price`, `coupon_code`, `created_date`) VALUES
(208, '75', 14, 1, '0', '0', NULL, '1299', NULL, '2023-12-27 10:29:28'),
(230, '55', 74, 1, '291', NULL, NULL, '1320', NULL, '2023-12-27 17:50:30'),
(232, '78', 73, 1, '289', NULL, NULL, '47500', NULL, '2023-12-28 10:23:32'),
(233, '78', 72, 1, '0', '0', NULL, '55480', NULL, '2023-12-28 10:23:38'),
(234, '79', 73, 1, '289', NULL, NULL, '47500', NULL, '2023-12-28 10:23:32'),
(235, '79', 72, 1, '0', '0', NULL, '55480', NULL, '2023-12-28 10:23:38'),
(257, '4', 83, 1, '312', NULL, NULL, '44990', NULL, '2024-09-11 18:23:41'),
(274, '84', 72, 1, '0', '0', NULL, '55480', NULL, '2024-09-18 17:23:55'),
(335, '95', 64, 3, NULL, NULL, NULL, '2400', NULL, '2024-11-21 17:24:05'),
(385, '78', 61, 1, '349', 'red', 'L', '150', NULL, '2024-11-22 17:49:31'),
(441, '95', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-25 10:52:28'),
(560, '96', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-26 17:50:37'),
(574, '85', 92, 1, '349', 'red', 'L', '1399', NULL, '2024-11-27 13:06:55'),
(592, '85', 14, 1, NULL, NULL, NULL, '1299', NULL, '2024-11-27 16:46:42'),
(594, '85', 61, 1, '349', 'red', 'L', '1299', NULL, '2024-11-27 16:51:17'),
(596, 'M2006C3MII', 64, 1, '0', '0', NULL, '2400', 'BH20', '2024-11-27 17:20:17'),
(621, '83', 43, 1, '340', NULL, NULL, '3000', NULL, '2024-11-28 14:33:34'),
(622, 'Jack\'s iPhone SE', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-28 14:34:35'),
(623, '85', 43, 1, '340', NULL, NULL, '3000', NULL, '2024-11-28 15:02:51'),
(625, 'Jack\'s iPhone 15 Pro Max', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-28 15:20:57'),
(626, '88', 43, 1, '340', NULL, NULL, '3000', NULL, '2024-11-28 15:23:57'),
(630, '97', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-28 17:14:35'),
(631, 'Jack\'s iPhone 14 Pro', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-29 10:21:17'),
(633, 'GM1901', 63, 1, '0', '0', NULL, '250', NULL, '2024-11-29 17:26:20'),
(636, '100', 92, 1, '420', NULL, NULL, '1299', 'BH20', '2024-11-29 17:54:27'),
(638, 'Nokia 8.1', 59, 6, '0', '0', NULL, '180', 'BH20', '2024-12-02 16:25:31'),
(639, '93', 94, 1, '0', '0', NULL, '3599', 'BH20', '2024-12-02 17:50:57'),
(644, '83', 75, 1, '0', '0', NULL, '849', NULL, '2025-07-28 13:19:13'),
(645, '83', 59, 1, '0', '0', NULL, '1299', NULL, '2025-07-28 13:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `ParentCategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `CategoryDesc` varchar(255) NOT NULL,
  `Catagoryimage` varchar(500) NOT NULL,
  `ProductLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `ParentCategoryID`, `CategoryName`, `CategoryDesc`, `Catagoryimage`, `ProductLive`, `Created_at`, `Updated_at`) VALUES
(23, 0, 'Toys', 'Toys For Kids', '1698992669_2f98093f910cd2eeaa49.jpg', 1, '0000-00-00 00:00:00', '2023-11-03 11:54:29'),
(29, 0, 'Watch', 'All Types of Watches', '1698991665_d01d983d79058d8b5d7d.jpg', 1, '0000-00-00 00:00:00', '2023-11-03 11:33:34'),
(31, 0, 'Clothings', 'All Clothes Available', '1698992738_fc462dfc7e7f8ce41c85.webp', 1, '0000-00-00 00:00:00', '2023-11-03 11:55:38'),
(32, 0, 'Shoes', 'All Types of Shoes', '1698992879_9f01075fadcdbc303477.webp', 1, '0000-00-00 00:00:00', '2023-11-03 11:57:59'),
(33, 0, 'Laptops', 'All Laptops Available', '1698993025_55ea645b58409d113133.jpg', 1, '0000-00-00 00:00:00', '2023-11-03 12:00:25'),
(34, 0, 'Smart Phones', 'All Smartphones', '1698993131_2f7743e2f85cf49bad7b.jpg', 1, '0000-00-00 00:00:00', '2023-11-03 12:02:11'),
(35, 0, 'Accessories', 'All Products for Accesories', '1698993304_cc910d6456e5c4d715fe.webp', 1, '0000-00-00 00:00:00', '2023-11-03 12:05:04'),
(36, 0, 'Sandal', 'sandal for easy and comfort walk...', '1701681674_cd810a2cb0376255ed0c.jpg', 1, '0000-00-00 00:00:00', '2023-12-04 14:51:14'),
(37, 0, 'Gaming Consoles', 'All Gaming Consoles', '1703659155_c29b3d8c81d675cfa91e.jpeg', 1, '0000-00-00 00:00:00', '2023-12-27 12:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `msg_type` int(11) NOT NULL,
  `read_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `order_id`, `sender_id`, `receiver_id`, `message`, `msg_type`, `read_status`, `created_at`) VALUES
(1, 31, 84, 6, 'hello', 1, 0, '2024-09-12 05:17:12'),
(2, 30, 84, 6, 'hello', 1, 0, '2024-09-12 05:17:12'),
(3, 31, 6, 84, 'hey', 1, 1, '2024-09-12 05:17:12'),
(21, 31, 84, 6, 'hello', 1, 0, '2024-09-12 11:28:57'),
(22, 31, 84, 6, '1726140580_b1562fcf6797d9341b3a.png', 2, 0, '2024-09-12 11:29:40'),
(23, 31, 84, 6, 'abcd', 1, 0, '2024-09-12 12:14:48'),
(24, 31, 84, 6, 'abcd', 1, 0, '2024-09-13 10:51:20'),
(25, 31, 84, 6, 'abcd', 1, 0, '2024-09-13 10:51:24'),
(26, 31, 84, 6, 'abcd', 1, 0, '2024-09-13 11:05:47'),
(27, 31, 84, 6, 'abcd', 1, 0, '2024-09-13 11:21:26'),
(28, 31, 84, 6, 'abcd', 1, 0, '2024-09-13 11:33:21'),
(29, 26, 84, 6, 'hhhhhh', 1, 0, '2024-09-13 11:42:00'),
(30, 26, 84, 6, 'hdhdhvzvz', 1, 0, '2024-09-13 11:42:15'),
(31, 25, 84, 6, 'gsgagagag', 1, 0, '2024-09-13 11:42:25'),
(32, 26, 84, 6, 'vfvtv', 1, 0, '2024-09-13 11:45:00'),
(33, 25, 84, 6, 'gg', 1, 0, '2024-09-13 12:04:20'),
(34, 31, 6, 84, 'abcd', 1, 0, '2024-09-13 11:33:21'),
(35, 1, 88, 6, '/data/user/0/com.ecommerce.ecommerce/cache/56aa921d-45c4-4889-9364-6db9a92dcd8a/1000000505.jpg', 1, 0, '2024-09-20 05:15:42'),
(36, 31, 84, 6, 'abcd', 1, 0, '2024-09-20 05:23:31'),
(37, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 10:24:26'),
(38, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 12:13:40'),
(39, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 12:13:51'),
(40, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 12:29:22'),
(41, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 12:29:37'),
(42, 31, 84, 6, 'abcd', 1, 0, '2024-09-23 12:29:44'),
(43, 31, 84, 6, 'abcd', 1, 0, '2024-09-24 09:07:27'),
(44, 48, 88, 6, 'fvfvf', 1, 0, '2024-09-24 09:34:52'),
(45, 31, 84, 6, 'abcd', 1, 0, '2024-09-24 09:40:07'),
(46, 48, 88, 6, 'rcrcr', 1, 0, '2024-09-24 10:31:24'),
(47, 48, 88, 6, 'dcdcdc', 1, 0, '2024-09-24 10:32:25'),
(48, 48, 88, 6, 'hiii', 1, 0, '2024-09-24 10:45:12'),
(49, 3, 88, 6, '/data/user/0/com.ecommerce.ecommerce/cache/11422df2-e320-4690-b4b4-96233984e31e/1000000507.jpg', 1, 0, '2024-09-25 04:48:44'),
(50, 3, 88, 6, '/data/user/0/com.ecommerce.ecommerce/cache/11422df2-e320-4690-b4b4-96233984e31e/1000000507.jpg', 1, 0, '2024-09-25 04:50:27'),
(51, 3, 88, 6, 'hello ', 1, 0, '2024-09-25 04:50:42'),
(52, 3, 88, 6, 'ghgy', 1, 0, '2024-09-25 04:51:08'),
(53, 3, 6, 88, 'hello', 1, 0, '2024-10-26 04:52:42'),
(54, 31, 6, 88, 'helloo', 1, 0, '2024-10-26 04:53:24'),
(55, 26, 6, 84, 'sgfdsgfdsg', 1, 0, '2024-10-26 04:59:53'),
(56, 31, 6, 84, 'hii', 1, 0, '2024-10-26 05:00:21'),
(57, 25, 6, 84, 'helloo', 1, 0, '2024-10-26 05:00:51'),
(58, 25, 84, 6, 'hiii', 1, 0, '2024-10-26 05:01:55'),
(59, 48, 6, 88, 'hello', 1, 0, '2024-10-26 05:04:14'),
(60, 48, 6, 88, 'hoooo', 1, 0, '2024-10-26 05:05:38'),
(61, 48, 6, 88, 'hii', 1, 0, '2024-10-26 05:06:40'),
(62, 48, 6, 88, 'helloo', 1, 0, '2024-10-26 05:08:38'),
(63, 25, 6, 84, 'helloo', 1, 0, '2024-10-26 05:09:30'),
(64, 26, 6, 84, 'helloo', 1, 0, '2024-10-26 05:10:17'),
(65, 25, 6, 84, 'helloo', 1, 0, '2024-10-26 05:12:09'),
(66, 48, 6, 84, 'hey', 1, 0, '2024-10-26 05:12:31'),
(67, 30, 6, 84, 'helloo', 1, 0, '2024-11-04 04:34:59'),
(68, 95, 93, 6, 'hello', 1, 0, '2024-11-18 12:30:13'),
(69, 95, 6, 93, 'hey', 1, 0, '2024-11-18 12:31:12'),
(70, 95, 6, 93, 'hi', 1, 0, '2024-11-18 12:32:52'),
(71, 95, 93, 6, 'hello', 1, 0, '2024-11-21 09:23:40'),
(72, 170, 93, 6, 'hi', 1, 0, '2024-11-27 05:22:11'),
(73, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/49c55d57-38df-4a95-8e98-4180f09aa371/1000498491.jpg', 1, 0, '2024-11-27 05:23:11'),
(74, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/49c55d57-38df-4a95-8e98-4180f09aa371/1000498491.jpg', 1, 0, '2024-11-27 05:23:53'),
(75, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/49c55d57-38df-4a95-8e98-4180f09aa371/1000498491.jpg', 1, 0, '2024-11-27 05:24:04'),
(76, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/22bfb0b6-8037-46f0-8ff2-43b7640c09ab/1000498491.jpg', 1, 0, '2024-11-27 05:33:38'),
(77, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/22bfb0b6-8037-46f0-8ff2-43b7640c09ab/1000498491.jpg', 1, 0, '2024-11-27 05:33:58'),
(78, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/22bfb0b6-8037-46f0-8ff2-43b7640c09ab/1000498491.jpg', 1, 0, '2024-11-27 05:34:10'),
(79, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/836c3662-700a-4512-bfa3-e2b55a3dc17d/1000496984.jpg', 1, 0, '2024-11-27 05:35:01'),
(80, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/836c3662-700a-4512-bfa3-e2b55a3dc17d/1000496984.jpg', 1, 0, '2024-11-27 05:35:06'),
(81, 170, 93, 6, 'hiii', 1, 0, '2024-11-27 05:36:08'),
(82, 170, 93, 6, 'hi', 1, 0, '2024-11-27 05:37:53'),
(83, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/568fc1a4-c512-4985-b612-c983d40dfb9b/1000498491.jpg', 1, 0, '2024-11-27 05:38:02'),
(84, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/568fc1a4-c512-4985-b612-c983d40dfb9b/1000498491.jpg', 1, 0, '2024-11-27 05:38:19'),
(85, 170, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/568fc1a4-c512-4985-b612-c983d40dfb9b/1000498491.jpg', 1, 0, '2024-11-27 05:38:28'),
(86, 174, 93, 6, '/data/user/0/com.ecommerce.ecommerce/cache/9b0df44d-1b05-4da0-95fd-124c856f640b/edited_image.png', 1, 0, '2024-11-27 06:21:21'),
(87, 174, 93, 6, 'hy', 1, 0, '2024-11-27 06:23:19'),
(88, 172, 93, 6, 'hello', 1, 0, '2024-11-27 06:28:04'),
(89, 175, 93, 6, 'hellooo', 1, 0, '2024-11-27 06:35:11'),
(90, 170, 6, 93, 'kaaa', 1, 0, '2024-11-27 06:37:27'),
(91, 174, 93, 6, 'jdjd', 1, 0, '2024-11-27 06:50:22'),
(92, 170, 93, 6, 'ka', 1, 0, '2024-11-27 08:00:28'),
(93, 170, 6, 93, 'dfkdjf', 1, 0, '2024-11-27 08:00:39'),
(94, 170, 93, 6, 'fufjf', 1, 0, '2024-11-27 08:00:44'),
(95, 170, 93, 6, 'fufjf', 1, 0, '2024-11-27 08:00:44'),
(96, 170, 93, 6, 'gggv', 1, 0, '2024-11-27 08:00:54'),
(97, 170, 6, 93, '123', 1, 0, '2024-11-27 08:01:22'),
(98, 170, 93, 6, 'tt', 1, 0, '2024-11-27 08:01:27'),
(99, 2, 93, 6, 'happy ', 1, 0, '2024-12-02 11:58:12'),
(100, 2, 93, 6, 'gbgvbgbgbgbb', 1, 0, '2024-12-02 12:22:00'),
(101, 95, 93, 6, 'hello', 1, 0, '2024-12-13 07:24:34'),
(102, 42, 104, 6, 'hii', 1, 0, '2024-12-19 07:47:42'),
(103, 43, 104, 6, 'hiiiiiiiiii', 1, 0, '2024-12-19 09:08:31'),
(104, 43, 104, 6, 'hhhhhhhhh', 1, 0, '2024-12-19 09:08:36'),
(105, 43, 104, 6, 'shhdhdhbdhhhhehe', 1, 0, '2024-12-19 09:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityID` int(11) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `CityLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityID`, `StateID`, `CityName`, `CityLive`, `Created_at`, `Updated_at`) VALUES
(1, 1, 'surat', 1, '2023-06-03 10:19:55', '2023-06-03 13:50:06'),
(2, 5, 'Waiuku', 1, '2023-06-03 10:20:08', '2023-06-03 13:50:26'),
(3, 2, 'Pokhara', 1, '2023-06-03 10:20:08', '2023-06-03 13:50:26'),
(6, 6, 'Johannesburg', 1, '0000-00-00 00:00:00', '2023-06-19 11:22:46'),
(7, 7, 'sydney', 1, '0000-00-00 00:00:00', '2023-06-19 12:23:47'),
(9, 11, 'Galles', 1, '0000-00-00 00:00:00', '2023-06-19 12:44:36'),
(10, 13, 'pune', 1, '0000-00-00 00:00:00', '2023-06-19 13:48:10'),
(11, 12, 'humb', 1, '0000-00-00 00:00:00', '2023-06-19 13:49:13'),
(12, 15, 'jaipur', 1, '0000-00-00 00:00:00', '2023-06-19 14:50:27'),
(13, 17, 'Sipchu', 1, '0000-00-00 00:00:00', '2023-09-29 10:28:53'),
(14, 17, 'Taga Dzong', 1, '0000-00-00 00:00:00', '2023-09-29 10:29:12'),
(15, 5, 'Devonport', 1, '0000-00-00 00:00:00', '2023-09-29 10:31:54'),
(16, 18, 'Port Nolloth', 1, '0000-00-00 00:00:00', '2023-09-29 10:35:18'),
(17, 19, 'Brighton', 1, '0000-00-00 00:00:00', '2023-09-29 10:37:22'),
(18, 20, 'Aylesbury Vale', 1, '0000-00-00 00:00:00', '2023-09-29 10:37:52'),
(19, 20, 'South Bucks', 1, '0000-00-00 00:00:00', '2023-09-29 10:38:09'),
(20, 1, 'vadodara', 1, '2023-06-03 10:19:55', '2023-06-03 13:50:06'),
(22, 21, 'penh', 1, '0000-00-00 00:00:00', '2023-12-04 16:09:33'),
(23, 21, 'toru', 1, '0000-00-00 00:00:00', '2023-12-05 15:38:57'),
(24, 22, ' kakinas', 1, '0000-00-00 00:00:00', '2024-11-12 13:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `CmsID` int(11) NOT NULL,
  `CmsTitle` varchar(255) NOT NULL,
  `CmsUrl` varchar(500) NOT NULL,
  `CmsContent` text NOT NULL,
  `IsChecked` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`CmsID`, `CmsTitle`, `CmsUrl`, `CmsContent`, `IsChecked`, `status`, `Created_at`) VALUES
(52, 'About Us', 'about_us', '<p>Ecom&nbsp; is an example of a company that nails its About Us page design while doing a great job at telling the world its story that tells the world their story. Their page shows how important it is for them to talk about their mission to help people start, run, and grow a business. The company prides itself in making ecommerce easier for everyone. Also, it paints a picture of the future for Shopify by mentioning that they’re building a 100-year company by investing in their people and the planet.</p>\n\n<p>&nbsp;</p>\n\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"https://ecomweb.fableadtechnolabs.com/admin/uploads/1689241052_775dee748a190d17fac6.jpg\" width=\"500\" height=\"500\"></p>\n', 0, 0, '2023-07-13 15:07:55'),
(65, 'FAQ', 'all_faqs', '<p>This is a faqs pages</p>\r\n', 1, 1, '2023-07-17 18:22:41'),
(69, 'Terms & Conditions', 'all_terms_conditions', '<p>Last updated: September 28, 2022</p>\r\n\r\n<p><strong>Vistaprint Canada Corporation &ndash; General Terms and Conditions</strong>&nbsp;Please read our Vistaprint General Terms of Use carefully. These General Terms of Use govern your access, use and orders placed at&nbsp;<a href=\"https://www.vistaprint.ca/\">www.vistaprint.ca</a>&nbsp;and its mobile sites (collectively, the &ldquo;Site&rdquo;) as well as the provision and sale of products and services by Cimpress plc and/or its affiliates (including but not limited to Vistaprint Canada Corporation) and/or its fulfillment providers, as the context may require (&quot;Cimpress&quot;, &ldquo;Vistaprint&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo;). By placing an order with Vistaprint Canada Corporation, you agree to be unconditionally bound by these General Terms of Use in the version valid at the time of ordering.</p>\r\n\r\n<p>Our Terms and Conditions shall also govern the use of and apply to each and every offer and agreement entered into between VistaPrint and a customer through any of its separate sites that are accessible through the tabs in the Site-header, insofar we have not explicitly deviated from the present Terms and Conditions.</p>\r\n\r\n<p>Additionally, we maintain other terms and policies that supplement these Terms and Conditions as set out below, including our&nbsp;<a href=\"https://www.vistaprint.ca/privacy-policy\">Privacy and Cookie Policy</a>, which describes how we collect, use and process your personal information, and our&nbsp;<a href=\"https://www.vistaprint.ca/gst-policy\">Canadian Sales Tax Policy</a>, which provides more information about the rate of sales tax that will apply to all orders placed on our Site.</p>\r\n\r\n<p>[Download the PDF version of this page]</p>\r\n\r\n<p><strong>Our Product-Specific Terms</strong>&nbsp;Please read our additional product-specific terms that shall apply to the products and services listed below (&quot;Product-Specific Terms&quot;). Where there is a difference between the Terms and Conditions and these Product-Specific Terms, the Product-Specific Terms shall take precedence.</p>\r\n\r\n<ul>\r\n	<li><strong>Classic Design Services</strong>&nbsp;are subject to our&nbsp;<a href=\"https://www.vistaprint.ca/design-creative-services-terms\">Design Services Terms of Use</a>.</li>\r\n	<li><strong>Websites</strong>&nbsp;(including the site builder, domain name registration and hosting) are subject to our terms of use as set out in the&nbsp;<a href=\"https://www.vistaprint.ca/websites-terms-and-conditions\">Websites Services Member Agreement</a>.</li>\r\n	<li><strong>Search Engine Listings Manager Services</strong>&nbsp;are subject to our terms of use as set out in the&nbsp;<a href=\"https://www.vistaprint.ca/online-search-service-member-agreement\">Online Search Service Member Agreement</a>.</li>\r\n	<li><strong>Postcard Mailing Services</strong>&nbsp;are subject to our&nbsp;<a href=\"https://www.vistaprint.ca/terms-of-use#\">Postcard Mailing Terms of Use</a>.</li>\r\n	<li><strong>Car Magnets</strong>&nbsp;are subject to our&nbsp;<a href=\"https://www.vistaprint.ca/car-door-magnets-terms\">Car Magnet Terms and Conditions</a>.</li>\r\n</ul>\r\n\r\n<p>With&nbsp;<a href=\"https://create.vista.com/\">VistaCreate</a>&nbsp;and&nbsp;<a href=\"https://99designs.com/\">99designs by Vista</a>, new graphic design services have been added to the Vista products. Although you will see these new Vista products featured on our Site, they are subject to their own terms. You agree to be bound by these separate terms when you sign up for a VistaCreate or 99designs by Vista account or otherwise make use of their products, services or tools as offered online and through their mobile apps.</p>\r\n\r\n<p><strong>Additional Terms</strong><br />\r\nAdditional terms may be presented on this Site in connection with a specific section, service or feature that will apply at the time you choose to access or use the corresponding section, service or feature, as set out below.</p>\r\n\r\n<ul>\r\n	<li><strong>ProAdvantage Program -</strong>&nbsp;Purchases of products and services on our Site for direct or indirect resale by customers who participate in either the free or premium ProAdvantage program (&ldquo;ProAdvantage Program&rdquo; or &ldquo;VistaPrint ProAdvantage&rdquo;) will additionally be subject to the terms and conditions of the&nbsp;<a href=\"https://www.vistaprint.ca/proadvantage-program-terms-and-conditions\">ProAdvantage Program Agreement</a>.</li>\r\n	<li><strong>VistaPrint usage rights for your Instagram photos -</strong>&nbsp;When you respond #YesVistaPrint to our request to feature your photo in our marketing, you grant us the usage rights to display your Instagram photo on our VistaPrint Instagram account and in any other content as further explained in our&nbsp;<a href=\"https://www.vistaprint.ca/terms-of-use#\">Permission to Use Image Agreement</a>.</li>\r\n</ul>\r\n', 0, 1, '2023-07-19 11:01:11'),
(80, 'Privacy Policy', 'privacy-policy', '<ul>\r\n	<li>\r\n	<p><strong>Last updated: November 29, 2024</strong></p>\r\n\r\n	<p><strong>Ecom &ndash; Privacy Policy</strong></p>\r\n\r\n	<p>Please read this Privacy Policy carefully. It explains how we collect, use, and protect your personal information when you visit and interact with the <strong>Ecom</strong> website (located at <a href=\"http://www.ecom.com\" rel=\"noopener\" target=\"_new\">www.ecom.com</a>) and its mobile sites (collectively, the &quot;Site&quot;). This policy applies to all users of the Site and services provided by <strong>Ecom</strong>, including its affiliates and fulfillment providers (collectively, &ldquo;Ecom&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo;). By accessing or using our Site, you agree to the collection, use, and disclosure of your information as described in this Privacy Policy.</p>\r\n\r\n	<p><strong>Information We Collect</strong></p>\r\n\r\n	<p>We collect information from you when you visit our Site, make a purchase, register an account, sign up for our newsletter, or interact with our services. The types of information we may collect include:</p>\r\n	</li>\r\n	<li><strong>Personal Information</strong>: This includes details such as your name, email address, phone number, billing address, shipping address, and payment information.</li>\r\n	<li><strong>Account Information</strong>: If you create an account with us, we may collect your account username, password, and other related details.</li>\r\n	<li><strong>Usage Data</strong>: We collect information about how you interact with the Site, such as your IP address, browser type, device information, and browsing behavior.</li>\r\n	<li><strong>Cookies and Tracking Technologies</strong>: We use cookies and similar technologies to improve your experience on our Site. For more details, please refer to our Cookie Policy.</li>\r\n</ul>\r\n\r\n<p><strong>How We Protect Your Information</strong></p>\r\n\r\n<p>We implement a variety of security measures to maintain the safety of your personal information. These measures include encryption, secure servers, and access controls to protect against unauthorized access, use, or disclosure of your personal data.</p>\r\n\r\n<p><strong>Sharing Your Information</strong></p>\r\n\r\n<p>We do not sell, trade, or rent your personal information to third parties. However, we may share your information with trusted third-party service providers who assist us in operating our Site, conducting business, or providing services to you, provided these parties agree to keep your information confidential. Additionally, we may disclose your information if required by law or to protect our rights.</p>\r\n\r\n<p><strong>Your Choices and Rights</strong></p>\r\n\r\n<p>You have the right to:</p>\r\n\r\n<ul data-hveid=\"CCQQAQ\" data-ved=\"2ahUKEwi1iqDHhf-JAxVnlK8BHdq3FnsQm_YKegQIJBAB\" jsaction=\"jZtoLb:SaHfyb\" jscontroller=\"M2ABbc\">\r\n	<li>\r\n	<p>&nbsp;</p>\r\n\r\n	<p>For further information on how to exercise your rights, please contact us at the details below.</p>\r\n\r\n	<p><strong>Third-Party Links</strong></p>\r\n\r\n	<p>Our Site may contain links to third-party websites. These websites have their own privacy policies, and we are not responsible for their content or practices. We encourage you to review the privacy policies of any third-party sites you visit.</p>\r\n\r\n	<p><strong>Children&rsquo;s Privacy</strong></p>\r\n\r\n	<p>Our Site is not intended for individuals under the age of 18. We do not knowingly collect personal information from children. If we become aware that we have inadvertently collected information from a child under 18, we will take steps to delete that information.</p>\r\n\r\n	<p><strong>Changes to This Privacy Policy</strong></p>\r\n\r\n	<p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and the date of the most recent update will be indicated at the top of the page. We encourage you to review this Privacy Policy periodically to stay informed about how we are protecting your information.</p>\r\n	</li>\r\n	<li>Opt out of receiving marketing communications by following the unsubscribe instructions in any email we send.</li>\r\n	<li>Restrict or object to certain processing of your personal information.</li>\r\n	<li>Access, update, or delete your personal information at any time.</li>\r\n	<li>\r\n	<p>&nbsp;</p>\r\n\r\n	<p><strong>How We Use Your Information</strong></p>\r\n\r\n	<p>We may use the information we collect for the following purposes:</p>\r\n	</li>\r\n	<li>To process your orders and deliver products or services you request.</li>\r\n	<li>To personalize your experience and improve customer service.</li>\r\n	<li>To send you marketing communications, newsletters, or promotional offers (with your consent).</li>\r\n	<li>To enhance the functionality and performance of the Site.</li>\r\n	<li>To comply with legal obligations or enforce our Terms and Conditions.</li>\r\n</ul>\r\n', 0, 1, '2024-11-28 18:08:41'),
(81, 'Return & Refund Policy', 'return-refund-policy', '<p><strong>Overview</strong></p>\r\n\r\n<p>At Ecom Fablead, we are committed to customer satisfaction. However, please review the following terms regarding returns and refunds.</p>\r\n\r\n<p><strong>Return Policy</strong></p>\r\n\r\n<p>If you are not entirely satisfied with your purchase, you may request a return within 30 days of receiving your order, subject to certain conditions. Please ensure that the item is unused, in its original packaging, and accompanied by the purchase receipt.</p>\r\n\r\n<p><strong>Refund Policy</strong></p>\r\n\r\n<p>Once we receive and inspect your returned item, we will notify you of the approval or rejection of your refund. If approved, the refund will be processed, and a credit will automatically be applied to your original payment method within 7-10 business days.</p>\r\n\r\n<p>&quot;Ecom Fablead appreciates your trust and aims to ensure a smooth transaction experience for every customer.&quot;</p>\r\n\r\n<p><small>- Ecom Fablead Team</small></p>\r\n', 0, 1, '2024-11-29 10:29:16'),
(84, 'gg', 'https://ecom-demo.fableadtech.com/admin/add_cms', '<p>/</p>\r\n', 0, 1, '2025-07-03 12:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `cms_faq`
--

CREATE TABLE `cms_faq` (
  `FaqID` int(11) NOT NULL,
  `CmsID` int(11) NOT NULL,
  `FaqQuestion` varchar(250) NOT NULL,
  `FaqAnswer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cms_faq`
--

INSERT INTO `cms_faq` (`FaqID`, `CmsID`, `FaqQuestion`, `FaqAnswer`) VALUES
(6, 65, '[\"what is your name?\",\"What is your city?\"]', '[\"Akshay\",\"Surat\"]'),
(7, 66, '[\"767\",\"67i676i8i668i\"]', '[\"6767i7i\",\"68i8i\"]'),
(8, 67, '[\"uyiyuiu\"]', '[\"uykuyky\"]'),
(9, 68, '[\"jhnghjn\",\"yhjnhjny\"]', '[\"ythjntyjhn\",\"yjhnyjhnjnjhn\"]'),
(10, 69, '[\"\"]', '[\"\"]'),
(11, 70, '[\"\"]', '[\"\"]'),
(12, 71, '[\"\"]', '[\"\"]'),
(13, 72, '[\"\"]', '[\"\"]'),
(14, 73, '[\"\"]', '[\"\"]'),
(15, 74, '[\"\"]', '[\"\"]'),
(16, 75, '[\"\"]', '[\"\"]'),
(17, 76, '[\"rfgvdrgdg\"]', '[\"vdrvdv\"]'),
(18, 77, '[\"\"]', '[\"\"]'),
(19, 78, '[\"\"]', '[\"\"]'),
(20, 79, '[\"\"]', '[\"\"]'),
(21, 80, '[\"\"]', '[\"\"]'),
(22, 81, '[\"\"]', '[\"\"]'),
(23, 82, '[\"\"]', '[\"\"]'),
(24, 83, '[\"\"]', '[\"\"]'),
(25, 84, '[\"\"]', '[\"\"]');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) NOT NULL,
  `CountryCode` int(11) NOT NULL,
  `CountryName` varchar(100) NOT NULL,
  `StateLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `CountryCode`, `CountryName`, `StateLive`, `Created_at`, `Updated_at`) VALUES
(1, 91, 'India', 1, '2023-06-03 10:17:47', '2023-06-03 13:48:37'),
(2, 91, 'Nepal', 1, '2023-06-03 10:17:47', '2023-06-03 13:48:37'),
(3, 95, 'Bhutan', 1, '2023-06-03 10:17:47', '2023-06-03 13:48:37'),
(4, 0, 'New zealand', 1, '0000-00-00 00:00:00', '2023-06-17 11:51:46'),
(5, 0, 'england', 1, '0000-00-00 00:00:00', '2023-06-17 11:55:50'),
(10, 0, 'south africa', 1, '0000-00-00 00:00:00', '2023-06-19 11:21:20'),
(16, 0, 'australia', 1, '0000-00-00 00:00:00', '2023-06-19 12:22:08'),
(17, 0, 'srilanka', 1, '0000-00-00 00:00:00', '2023-06-19 12:43:36'),
(18, 0, 'Germany', 1, '0000-00-00 00:00:00', '2023-06-19 13:45:27'),
(19, 0, 'maldives', 1, '0000-00-00 00:00:00', '2023-06-19 14:47:48'),
(20, 0, 'cambodia', 1, '0000-00-00 00:00:00', '2023-12-04 15:58:19'),
(21, 0, 'saudi arab', 1, '0000-00-00 00:00:00', '2024-11-12 13:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `CouponID` int(11) NOT NULL,
  `ProductCoupon` varchar(500) NOT NULL DEFAULT '' COMMENT '1-Catagory, 2- Product, 3-User',
  `CategoryID` varchar(500) DEFAULT NULL COMMENT 'foreign key from catagoriers table',
  `ProductID` varchar(500) DEFAULT NULL,
  `UserID` varchar(500) DEFAULT NULL,
  `CouponName` varchar(200) NOT NULL,
  `ProductSpecification` varchar(250) NOT NULL,
  `CouponCode` varchar(255) NOT NULL,
  `CouponType` varchar(255) NOT NULL DEFAULT '' COMMENT '1-Percentage, 2-Fixed',
  `CouponValue` float NOT NULL,
  `UserStatus` varchar(300) NOT NULL DEFAULT '' COMMENT '1-Active, 2-Inactive, 3-Expired',
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `CouponLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`CouponID`, `ProductCoupon`, `CategoryID`, `ProductID`, `UserID`, `CouponName`, `ProductSpecification`, `CouponCode`, `CouponType`, `CouponValue`, `UserStatus`, `StartDate`, `EndDate`, `CouponLive`, `Created_at`, `Updated_at`) VALUES
(41, '1', '23,29,31,32,33,34,35,36,37', '', '', 'BH20', 'BH20', 'BH20', '1', 20, '1', '2024-10-16 00:00:00', '2025-01-11 00:00:00', 1, '2024-10-21 16:14:17', '2024-10-21 16:14:17'),
(43, '2', '', '14', '', 'MB10', 'MB10', 'MB10', '2', 22, '1', '2024-10-15 00:00:00', '2024-11-29 00:00:00', 1, '2024-10-21 16:15:02', '2024-10-21 16:15:02'),
(45, '3', '', '', '83', 'UV40', 'UV40', 'UV40', '2', 40, '1', '2024-10-15 00:00:00', '2025-01-09 00:00:00', 1, '2024-10-21 16:15:02', '2024-10-21 16:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `email_smtp`
--

CREATE TABLE `email_smtp` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `protocol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_smtp`
--

INSERT INTO `email_smtp` (`id`, `host`, `username`, `email`, `password`, `port`, `protocol`) VALUES
(1, 'fableadtechnolabs.com', 'sneh', 'smtp@fableadtechnolabs.com', '#w8(_4@wdc0M', '465', 'ssl');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `EnquiriID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `RecipientID` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `EnquiriLive` tinyint(4) NOT NULL DEFAULT 0,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`EnquiriID`, `SenderID`, `RecipientID`, `ParentID`, `Fullname`, `Email`, `Mobile`, `Subject`, `Message`, `EnquiriLive`, `Created_at`, `Updated_at`) VALUES
(2, 0, 0, 0, 'hinal', 'hinalshah56@gmail.com', '9586849774', 'complaints', 'provide my product on time basees as my product lost full responsibilit is your company. this is good product itm al  jid shihe dnhfd.', 0, '0000-00-00 00:00:00', '2023-06-19 10:30:19'),
(3, 0, 0, 0, 'hinal', 'hinalshah56@gmail.com', '9586849774', 'complaints', 'gjhjds saasg asgasg as', 0, '0000-00-00 00:00:00', '2023-06-19 10:30:32'),
(6, 16, 6, 0, 'nishank', 'nishank@gmail.com', '9586849774', 'Contact detail', 'gdag ass gsagas gsagas gasg sagsag gsag as', 0, '0000-00-00 00:00:00', '2023-06-19 12:48:43'),
(8, 16, 6, 0, 'kiran', 'kiran@gmail.com', '9676885648', 'Contact detail', 'gsdgsd ggas', 0, '0000-00-00 00:00:00', '2023-06-19 13:08:59'),
(12, 0, 6, 0, 'mihir jadav', 'nishank.fablead@gmail.com', '8665445678', 'Contact detail', 'gas  gsa gasg ', 0, '0000-00-00 00:00:00', '2023-09-27 15:46:02'),
(53, 0, 6, 0, 'Saurav', 'test.sneh1702@gmail.com', '7676767676', 'Contact detail', '<!doctype html>\r\n     <html lang=\"en-US\">\r\n        <body>\r\n             <h2 style=\"text-decoration:unset; color:black!important;\">Contact details</h2>\r\n            <p><strong>Full Name: </strong>\"Saurav\"</p>\r\n             <p><strong>Email: </strong>\"test.', 0, '0000-00-00 00:00:00', '2024-11-15 15:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `FaqID` int(11) NOT NULL,
  `FaqQuestion` varchar(255) NOT NULL,
  `FaqAnswer` varchar(255) NOT NULL,
  `FaqLive` int(11) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`FaqID`, `FaqQuestion`, `FaqAnswer`, `FaqLive`, `Created_at`, `Updated_at`) VALUES
(1, 'HOW TO MANAGE ORDER?', 'follow order page instruction.', 1, '0000-00-00 00:00:00', '2023-06-14 13:23:00'),
(2, 'how to change password??\r\n', 'go to profile change page.', 1, '2023-06-14 13:35:08', '2023-06-14 13:35:08'),
(4, 'how to remove item from cart?', 'go to update cart option then remove your cart item.', 1, '2023-06-14 16:18:16', '2023-06-14 16:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `variation_table_id` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `variation_details` text DEFAULT NULL,
  `package_date` varchar(255) DEFAULT NULL,
  `exprice_date` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderItemID`, `OrderID`, `ProductID`, `Quantity`, `Price`, `variation_table_id`, `product_color`, `product_size`, `variation_details`, `package_date`, `exprice_date`, `Created_at`, `Updated_at`) VALUES
(73, 62, 63, 1, 250, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-05 11:51:11'),
(84, 74, 94, 1, 3599, '0', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-08 12:51:50'),
(85, 75, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-08 14:43:52'),
(86, 76, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-08 17:20:25'),
(91, 81, 58, 1, 450, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 10:23:20'),
(92, 82, 63, 1, 250, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 10:32:28'),
(93, 83, 59, 5, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 11:07:18'),
(94, 84, 59, 1, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 11:57:40'),
(95, 85, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 12:00:54'),
(96, 86, 61, 7, 350, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-12 12:09:54'),
(97, 87, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-13 10:00:44'),
(98, 88, 62, 1, 600, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-13 16:26:49'),
(99, 89, 62, 1, 600, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-13 16:27:14'),
(100, 90, 62, 1, 600, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-13 16:29:27'),
(101, 91, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-13 17:58:07'),
(104, 93, 58, 1, 420, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:23:40'),
(105, 94, 43, 3, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:29:35'),
(106, 95, 61, 5, 350, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:34:04'),
(107, 96, 63, 3, 250, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:39:34'),
(108, 97, 64, 4, 2400, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:42:33'),
(109, 98, 64, 2, 2400, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:53:03'),
(110, 98, 59, 2, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:53:03'),
(111, 99, 64, 2, 2400, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:53:34'),
(112, 99, 59, 2, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 13:53:34'),
(115, 101, 62, 1, 600, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 14:52:06'),
(117, 103, 43, 4, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:09:45'),
(118, 104, 79, 5, 4499, '299', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"1\",\"47\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"red\",\"8\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:10:34'),
(119, 105, 79, 5, 4499, '299', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"1\",\"47\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"red\",\"8\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:10:51'),
(120, 106, 43, 2, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:13:09'),
(121, 107, 14, 2, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:22:08'),
(122, 108, 79, 1, 4499, '299', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"1\",\"47\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"red\",\"8\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:33:34'),
(123, 108, 66, 1, 6500, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 15:33:34'),
(124, 109, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 16:07:49'),
(125, 109, 64, 3, 2400, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-15 16:07:49'),
(126, 110, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 12:01:17'),
(127, 111, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 12:02:01'),
(128, 112, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 12:05:07'),
(129, 113, 64, 2, 2400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 15:30:38'),
(130, 114, 64, 2, 2400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 15:45:29'),
(131, 115, 62, 1, 600, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 15:47:11'),
(132, 116, 63, 3, 250, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 15:57:18'),
(133, 117, 63, 3, 250, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 15:58:21'),
(134, 118, 58, 2, 420, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-18 16:51:45'),
(135, 119, 64, 1, 2400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:01:01'),
(136, 120, 64, 1, 2400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:02:18'),
(137, 121, 64, 1, 2400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:03:03'),
(138, 122, 63, 3, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:36:32'),
(139, 123, 63, 3, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:39:15'),
(140, 124, 63, 3, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 15:39:50'),
(141, 125, 73, 1, 47500, '289', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 17:51:28'),
(142, 125, 72, 1, 55480, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 17:51:28'),
(143, 125, 61, 1, 150, '349', 'red', 'L', NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 17:51:28'),
(144, 126, 63, 6, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 17:53:07'),
(145, 127, 63, 6, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 17:54:52'),
(146, 128, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:11:49'),
(147, 129, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:14:16'),
(148, 130, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:14:54'),
(149, 131, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:25:57'),
(150, 132, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:27:11'),
(151, 133, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:28:55'),
(152, 134, 63, 6, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:31:16'),
(153, 135, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:32:13'),
(154, 136, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:37:20'),
(155, 137, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:37:56'),
(156, 138, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:39:44'),
(157, 139, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 18:43:40'),
(158, 140, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-22 19:06:08'),
(159, 141, 63, 6, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 09:50:50'),
(160, 142, 43, 1, 3000, '340', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 09:54:26'),
(161, 143, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 09:55:17'),
(162, 144, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 09:57:00'),
(163, 145, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 09:57:12'),
(164, 146, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 10:07:51'),
(165, 147, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 11:42:13'),
(166, 148, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 11:46:47'),
(167, 149, 63, 3, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 13:48:00'),
(168, 150, 64, 2, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:19:22'),
(169, 150, 59, 1, 180, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:19:22'),
(170, 151, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:27:50'),
(171, 152, 61, 3, 150, '349', 'red', 'L', NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:33:40'),
(172, 153, 61, 3, 150, '349', 'red', 'L', NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:33:41'),
(173, 154, 66, 1, 6500, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:37:27'),
(174, 155, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:52:40'),
(175, 156, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:54:07'),
(176, 157, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:57:58'),
(177, 158, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 14:59:30'),
(178, 159, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 15:12:06'),
(179, 159, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 15:12:06'),
(180, 160, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 15:12:06'),
(181, 160, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-23 15:12:06'),
(182, 161, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-25 10:58:07'),
(183, 162, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-25 10:58:08'),
(184, 163, 93, 1, 76000, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-25 11:04:38'),
(185, 164, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-25 19:29:52'),
(186, 164, 61, 3, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-25 19:29:52'),
(187, 165, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 10:33:48'),
(188, 166, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 10:44:18'),
(189, 167, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:06:15'),
(190, 168, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:08:44'),
(191, 169, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:10:27'),
(192, 170, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:15:32'),
(193, 171, 63, 2, 250, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:15:56'),
(194, 171, 14, 1, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:15:56'),
(195, 172, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:18:21'),
(196, 173, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:35:17'),
(197, 173, 63, 2, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 11:35:17'),
(198, 174, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 12:32:12'),
(199, 175, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 12:32:14'),
(200, 176, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 13:51:58'),
(201, 176, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 13:51:58'),
(202, 177, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:24:18'),
(203, 178, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:25:55'),
(204, 179, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:25:56'),
(205, 180, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:27:33'),
(206, 181, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:29:05'),
(207, 182, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:29:06'),
(208, 183, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:42:32'),
(209, 184, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:47:19'),
(210, 185, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:48:47'),
(211, 186, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:50:05'),
(212, 187, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:54:36'),
(213, 188, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:55:32'),
(214, 189, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 15:56:35'),
(215, 190, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:01:26'),
(216, 191, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:04:10'),
(217, 191, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:04:10'),
(218, 192, 59, 1, 180, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:28:40'),
(219, 193, 59, 1, 180, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:28:40'),
(220, 194, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:32:18'),
(221, 195, 64, 2, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:36:52'),
(222, 196, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:43:13'),
(223, 197, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 16:43:14'),
(224, 198, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:04:09'),
(225, 199, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:04:11'),
(226, 200, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:07:31'),
(227, 201, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:07:32'),
(228, 202, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:39:31'),
(229, 203, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:41:36'),
(230, 204, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:44:21'),
(231, 204, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:44:21'),
(232, 205, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:44:22'),
(233, 205, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:44:22'),
(234, 206, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:53:59'),
(235, 207, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:55:13'),
(236, 208, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-26 17:56:56'),
(237, 209, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 10:17:40'),
(238, 210, 14, 1, 1299, '0', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 10:34:01'),
(239, 211, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 10:37:39'),
(240, 212, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 10:43:28'),
(241, 213, 14, 2, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 10:49:23'),
(242, 214, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 11:02:54'),
(243, 215, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 11:08:37'),
(244, 216, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 11:10:57'),
(245, 1, 63, 17, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 14:52:30'),
(246, 2, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:07:04'),
(247, 2, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:07:04'),
(248, 3, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:07:05'),
(249, 3, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:07:05'),
(250, 4, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(251, 4, 59, 2, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(252, 4, 62, 1, 299, '361', NULL, NULL, '{\"VariationTypeID\":[\"15\"],\"VariationVlueID\":[\"57\"],\"VariationTypeName\":[\"color\"],\"VariationName\":[\"Shining Silver\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(253, 4, 63, 1, 250, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(254, 4, 61, 1, 150, '349', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\",\"18\",\"21\",\"22\"],\"VariationVlueID\":[\"1\",\"11\",\"8\",\"39\",\"58\"],\"VariationTypeName\":[\"color\",\"size\",\"material\",\"storage\",\"Device\"],\"VariationName\":[\"red\",\"L\",\"Silk\",\"128gb\",\"Iphone 13\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(255, 4, 61, 1, 150, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(256, 4, 90, 1, 1765, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(257, 4, 95, 1, 85000, '428', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"21\",\"22\"],\"VariationVlueID\":[\"27\",\"40\",\"66\"],\"VariationTypeName\":[\"color\",\"storage\",\"Device\"],\"VariationName\":[\"Black\",\"256gb\",\"Iphone 15 pro max\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(258, 4, 89, 1, 57990, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(259, 4, 94, 1, 3599, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(260, 4, 88, 1, 22499, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 15:21:54'),
(261, 5, 63, 4, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 17:51:18'),
(262, 6, 64, 5, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:17:39'),
(263, 7, 64, 5, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:18:29'),
(264, 8, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:20:07'),
(265, 9, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:28:30'),
(266, 10, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:30:46'),
(267, 11, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:33:13'),
(268, 12, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:33:14'),
(269, 13, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:35:50'),
(270, 14, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:35:51'),
(271, 15, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:40:47'),
(272, 16, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:40:49'),
(273, 17, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:43:02'),
(274, 18, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-27 18:43:04'),
(275, 19, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:07:30'),
(276, 19, 64, 3, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:07:30'),
(277, 20, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:10:05'),
(278, 20, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:10:05'),
(279, 21, 61, 1, 150, '349', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:10:08'),
(280, 21, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 10:10:08'),
(281, 22, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 12:28:37'),
(282, 22, 59, 1, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 12:28:37'),
(283, 23, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 12:53:06'),
(284, 24, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 13:28:43'),
(285, 25, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 13:56:16'),
(286, 25, 59, 1, 180, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 13:56:16'),
(287, 25, 43, 1, 3000, '340', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 13:56:16'),
(288, 26, 64, 1, 2400, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 14:30:29'),
(289, 27, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 15:26:07'),
(290, 28, 63, 4, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-28 16:57:21'),
(291, 29, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 09:54:45'),
(292, 30, 59, 4, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:38:51'),
(293, 30, 61, 2, 150, '349', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\",\"18\",\"21\",\"22\"],\"VariationVlueID\":[\"1\",\"11\",\"8\",\"39\",\"58\"],\"VariationTypeName\":[\"color\",\"size\",\"material\",\"storage\",\"Device\"],\"VariationName\":[\"red\",\"L\",\"Silk\",\"128gb\",\"Iphone 13\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:38:51'),
(294, 31, 59, 3, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:42:49'),
(295, 31, 61, 2, 150, '349', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\",\"18\",\"21\",\"22\"],\"VariationVlueID\":[\"1\",\"11\",\"8\",\"39\",\"58\"],\"VariationTypeName\":[\"color\",\"size\",\"material\",\"storage\",\"Device\"],\"VariationName\":[\"red\",\"L\",\"Silk\",\"128gb\",\"Iphone 13\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:42:49'),
(296, 32, 59, 2, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:45:57'),
(297, 32, 61, 2, 150, '349', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\",\"18\",\"21\",\"22\"],\"VariationVlueID\":[\"1\",\"11\",\"8\",\"39\",\"58\"],\"VariationTypeName\":[\"color\",\"size\",\"material\",\"storage\",\"Device\"],\"VariationName\":[\"red\",\"L\",\"Silk\",\"128gb\",\"Iphone 13\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 13:45:57'),
(298, 33, 59, 1, 180, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 14:03:12'),
(299, 33, 61, 1, 150, '349', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\",\"18\",\"21\",\"22\"],\"VariationVlueID\":[\"1\",\"11\",\"8\",\"39\",\"58\"],\"VariationTypeName\":[\"color\",\"size\",\"material\",\"storage\",\"Device\"],\"VariationName\":[\"red\",\"L\",\"Silk\",\"128gb\",\"Iphone 13\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 14:03:12'),
(300, 34, 63, 1, 250, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-29 17:50:50'),
(301, 35, 94, 2, 3599, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-30 11:23:46'),
(302, 36, 94, 2, 3599, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-30 11:23:47'),
(303, 37, 65, 1, 5000, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-30 11:38:09'),
(304, 38, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-11-30 11:39:48'),
(305, 39, 43, 1, 3000, '340', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"16\"],\"VariationVlueID\":[\"15\",\"12\"],\"VariationTypeName\":[\"color\",\"size\"],\"VariationName\":[\"Green\",\"M\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-12-02 10:32:53'),
(306, 40, 95, 1, 85000, '428', NULL, NULL, '{\"VariationTypeID\":[\"15\",\"21\",\"22\"],\"VariationVlueID\":[\"27\",\"40\",\"66\"],\"VariationTypeName\":[\"color\",\"storage\",\"Device\"],\"VariationName\":[\"Black\",\"256gb\",\"Iphone 15 pro max\"]}', NULL, NULL, '0000-00-00 00:00:00', '2024-12-02 10:57:27'),
(307, 41, 61, 2, 350, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-12-02 16:12:25'),
(308, 42, 91, 1, 1699, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-12-19 13:17:12'),
(309, 42, 94, 1, 3599, '0', '0', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-12-19 13:17:12'),
(310, 43, 73, 1, 46580, '290', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-12-19 14:37:59'),
(311, 44, 73, 1, 46580, '290', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2024-12-19 14:38:00'),
(312, 45, 80, 1, 1399, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-02-18 12:32:47'),
(313, 46, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-02-18 12:37:28'),
(314, 47, 14, 1, 1299, '0', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-02-18 13:45:15'),
(315, 48, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-02-22 11:20:45'),
(316, 49, 14, 1, 1299, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-03-06 12:29:27'),
(317, 83, 14, 1, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-17 11:06:36'),
(318, 84, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-17 11:07:29'),
(319, 85, 14, 1, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-17 11:32:22'),
(320, 88, 59, 1, 200, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-18 12:12:49'),
(321, 89, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-18 12:16:16'),
(322, 90, 58, 1, 450, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-18 12:17:09'),
(323, 91, 61, 1, 400, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-18 12:18:14'),
(324, 92, 65, 1, 5000, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-06-18 12:21:13'),
(325, 93, 14, 1, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-07-02 12:51:00'),
(326, 94, 43, 1, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-07-02 12:52:40'),
(327, 95, 59, 1, 200, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-07-02 12:54:16'),
(328, 96, 66, 1, 7000, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-07-02 12:55:09'),
(329, 97, 73, 1, 52000, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2025-07-02 12:56:13'),
(330, 273, 82, 1, 26890, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-07-28 12:53:03'),
(331, 274, 58, 1, 420, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-07-28 12:55:34'),
(332, 275, 43, 1, 3000, '', NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '2025-07-28 12:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneno` bigint(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `company` varchar(20) DEFAULT NULL,
  `OrderDate` varchar(500) NOT NULL,
  `OrderNumber` int(11) DEFAULT NULL,
  `totalTax` decimal(11,0) NOT NULL DEFAULT 0,
  `totalShipingCost` decimal(11,0) NOT NULL DEFAULT 0,
  `totalDiscount` decimal(11,0) NOT NULL DEFAULT 0,
  `TotalAmount` float NOT NULL,
  `payment` varchar(100) NOT NULL,
  `OrderStatus` varchar(2555) NOT NULL DEFAULT '' COMMENT '1-Proof Approved, 2-Pending, 3-Order Processing, 4-File Review, 5-Waiting for file, 6-Art work completed,7-File ready for printing,8-CS alert,9-On Hold,10-Pre-Press,11-In production,12-Out of Production,13-Order Cancelled,14-Printing Done,15-Ready for pickup,16-Shipped,17-Picked Up,18-Proof Sent - Waiting for approval,19-Pending order cancelled',
  `exprice_date` varchar(255) DEFAULT NULL,
  `package_date` varchar(255) DEFAULT NULL,
  `invoice_pdf` varchar(255) DEFAULT NULL,
  `is_read` varchar(11) DEFAULT NULL,
  `prescription` text NOT NULL,
  `not_prescription` varchar(255) DEFAULT NULL,
  `referDis` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `fname`, `lname`, `email`, `phoneno`, `country`, `state`, `city`, `address1`, `address2`, `zipcode`, `company`, `OrderDate`, `OrderNumber`, `totalTax`, `totalShipingCost`, `totalDiscount`, `TotalAmount`, `payment`, `OrderStatus`, `exprice_date`, `package_date`, `invoice_pdf`, `is_read`, `prescription`, `not_prescription`, `referDis`, `Created_at`, `Updated_at`) VALUES
(1, 'Jack\'s iPhone 15 Pro', 'ram', 'mer', '', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '27-11-2024', 76791, 25, 100, 0, 4375, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_1.pdf', NULL, '', NULL, NULL, '2024-11-27 14:52:29', '2024-11-27 14:52:29'),
(2, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 29240, 40, 100, 0, 540, 'Cash On Delivery', 'Order Cancelled', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_2.pdf', NULL, '', NULL, NULL, '2024-11-27 15:07:02', '2024-11-27 15:07:02'),
(3, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 94748, 40, 100, 0, 540, 'Cash On Delivery', 'Completed', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_3.pdf', NULL, '', NULL, NULL, '2024-11-27 15:07:04', '2024-11-27 15:07:04'),
(4, NULL, 'Carolyn Wyatt', 'Elizabeth Macdonald', 'lutytavasi@mailinator.com', 9421212121, '16', '7', NULL, '48 Cowley Court', 'Et dicta quasi labore ad quod rerum ea dolore quam excepturi deleniti placeat', 395003, NULL, '27-11-2024', 99702, 17506, 0, 0, 192568, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2024-11-27 15:21:54', '2024-11-27 15:21:54'),
(5, 'Jack\'s iPhone 15 Pro', 'ram', 'mer', '', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '27-11-2024', 52164, 25, 100, 200, 925, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_5.pdf', NULL, '', NULL, NULL, '2024-11-27 17:51:17', '2024-11-27 17:51:17'),
(6, 'Jack\'s iPhone 15 Pro', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '27-11-2024', 68243, 1200, 0, 0, 13200, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_6.pdf', NULL, '', NULL, NULL, '2024-11-27 18:17:39', '2024-11-27 18:17:39'),
(7, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '27-11-2024', 50699, 1200, 0, 0, 13200, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_7.pdf', NULL, '', NULL, NULL, '2024-11-27 18:18:29', '2024-11-27 18:18:29'),
(8, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '27-11-2024', 28957, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_8.pdf', NULL, '', NULL, NULL, '2024-11-27 18:20:07', '2024-11-27 18:20:07'),
(9, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '27-11-2024', 62924, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_9.pdf', NULL, '', NULL, NULL, '2024-11-27 18:28:30', '2024-11-27 18:28:30'),
(10, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '27-11-2024', 39957, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_10.pdf', NULL, '', NULL, NULL, '2024-11-27 18:30:46', '2024-11-27 18:30:46'),
(11, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 89867, 25, 0, 0, 275, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_11.pdf', NULL, '', NULL, NULL, '2024-11-27 18:33:13', '2024-11-27 18:33:13'),
(12, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 25126, 25, 0, 0, 325, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_12.pdf', NULL, '', NULL, NULL, '2024-11-27 18:33:14', '2024-11-27 18:33:14'),
(13, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 37592, 25, 0, 0, 275, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_13.pdf', NULL, '', NULL, NULL, '2024-11-27 18:35:50', '2024-11-27 18:35:50'),
(14, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 65379, 25, 0, 0, 375, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_14.pdf', NULL, '', NULL, NULL, '2024-11-27 18:35:51', '2024-11-27 18:35:51'),
(15, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 63253, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_15.pdf', NULL, '', NULL, NULL, '2024-11-27 18:40:47', '2024-11-27 18:40:47'),
(16, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 88200, 240, 0, 0, 2740, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_16.pdf', NULL, '', NULL, NULL, '2024-11-27 18:40:49', '2024-11-27 18:40:49'),
(17, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 28483, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_17.pdf', NULL, '', NULL, NULL, '2024-11-27 18:43:02', '2024-11-27 18:43:02'),
(18, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '27-11-2024', 33435, 240, 0, 0, 2740, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_18.pdf', NULL, '', NULL, NULL, '2024-11-27 18:43:04', '2024-11-27 18:43:04'),
(19, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395009, NULL, '28-11-2024', 41029, 735, 0, 0, 8085, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_19.pdf', NULL, '', NULL, NULL, '2024-11-28 10:07:30', '2024-11-28 10:07:30'),
(20, '97', 'haresh ', 'mangukiya ', 'hk5556@gmail.com', 2147483647, '1', '1', '1', 'katargaam ', NULL, 395008, NULL, '28-11-2024', 23138, 255, 0, 0, 2805, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_20.pdf', NULL, '', NULL, NULL, '2024-11-28 10:10:05', '2024-11-28 10:10:05'),
(21, '97', 'haresh ', 'mangukiya ', 'hk5556@gmail.com', 2147483647, '1', '1', '1', 'katargaam ', NULL, 395008, NULL, '28-11-2024', 77315, 255, 0, 0, 2395, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_21.pdf', NULL, '', NULL, NULL, '2024-11-28 10:10:08', '2024-11-28 10:10:08'),
(22, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, '1', '1', NULL, 'Adajan , Surat', '', 394510, NULL, '28-11-2024', 91114, 148, 0, 0, 1626.9, 'Stripe', 'success', NULL, NULL, NULL, '0', '', NULL, NULL, '2024-11-28 12:28:37', '2024-11-28 12:28:37'),
(23, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, '1', '1', NULL, 'Adajan , Surat', '', 395008, NULL, '28-11-2024', 57139, 300, 0, 0, 3300, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2024-11-28 12:53:06', '2024-11-28 12:53:06'),
(24, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '28-11-2024', 35090, 240, 0, 0, 2640, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_24.pdf', NULL, '', NULL, NULL, '2024-11-28 13:28:43', '2024-11-28 13:28:43'),
(25, '100', 'jack', 'sardhara', 'jack.sardhara01@gmail.com', 2147483647, '1', '1', '1', 'katargaam ', NULL, 395008, NULL, '28-11-2024', 41887, 558, 100, 1116, 5122, 'Cash On Delivery', 'Completed', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_25.pdf', NULL, '', NULL, NULL, '2024-11-28 13:56:15', '2024-11-28 13:56:15'),
(26, 'Jack\'s iPhone SE', 'haresh', 'mangukiya', '', 685658970, '1', '1', '1', 'surat', NULL, 395004, NULL, '28-11-2024', 54903, 240, 0, 0, 2640, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_26.pdf', NULL, '', NULL, NULL, '2024-11-28 14:30:27', '2024-11-28 14:30:27'),
(27, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', '', 2147483647, '1', '1', '1', 'hjdfhjfdh', NULL, 395004, NULL, '28-11-2024', 81885, 25, 0, 50, 225, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_27.pdf', NULL, '', NULL, NULL, '2024-11-28 15:26:06', '2024-11-28 15:26:06'),
(28, 'Jack\'s iPhone 14 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'test surat', NULL, 395008, NULL, '28-11-2024', 75552, 100, 0, 0, 1100, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_28.pdf', NULL, '', NULL, NULL, '2024-11-28 16:57:21', '2024-11-28 16:57:21'),
(29, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2112212121, '1', '1', NULL, '319 Second Extension', '', 395008, NULL, '29-11-2024', 28099, 300, 0, 600, 2700, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2024-11-29 09:54:45', '2024-11-29 09:54:45'),
(30, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8511667908, '1', '1', NULL, '111 West Green Hague Drive', '', 395003, NULL, '29-11-2024', 61075, 122, 0, 204, 938.4, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2024-11-29 13:38:51', '2024-11-29 13:38:51'),
(31, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8987668777, '1', '1', NULL, '319 Second Extension', '', 394510, NULL, '29-11-2024', 40844, 84, 100, 168, 856, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '1', '', NULL, NULL, '2024-11-29 13:42:49', '2024-11-29 13:42:49'),
(32, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 1212121121, '1', '1', NULL, '54 Rocky Oak Lane', '', 394510, NULL, '29-11-2024', 89188, 66, 0, 132, 594, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '1', '', NULL, NULL, '2024-11-29 13:45:57', '2024-11-29 13:45:57'),
(33, NULL, 'Sneh', 'Chaudhary', 'test.sneh1702@gmail.com', 7668787878, '1', '1', NULL, '613 White Hague Street', '', 395003, NULL, '29-11-2024', 97931, 0, 100, 66, 364, 'Cash On Delivery', 'Order Processing', NULL, NULL, NULL, '1', '', NULL, NULL, '2024-11-29 14:03:12', '2024-11-29 14:03:12'),
(34, '100', 'jack', 'sardhara', 'jack.sardhara01@gmail.com', 2147483647, '1', '1', '1', 'katargaam ', NULL, 395008, NULL, '29-11-2024', 12499, 0, 100, 0, 350, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_34.pdf', NULL, '', NULL, NULL, '2024-11-29 17:50:49', '2024-11-29 17:50:49'),
(35, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '30-11-2024', 68597, 720, 0, 0, 7917.8, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_35.pdf', NULL, '', NULL, NULL, '2024-11-30 11:23:46', '2024-11-30 11:23:46'),
(36, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '30-11-2024', 83410, 0, 0, 0, 5858.4, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_36.pdf', NULL, '', NULL, NULL, '2024-11-30 11:23:47', '2024-11-30 11:23:47'),
(37, '10', 'gaurish', 'patel', 'gau@gmail.com', 77666, '1', '0', '1', 'fgfgf', 'fgfgf', 44456454, NULL, '30-11-2024', 31746, 12, 100, 0, 5112, 'PayPal', 'Shipped', NULL, NULL, NULL, NULL, '', NULL, NULL, '2024-11-30 11:38:09', '2024-11-30 11:38:09'),
(38, NULL, 'Sneh', NULL, 'fablead.sneh@gmail.com', 8511667908, '1', '1', '1', 'Adajan , Surat', 'fgfgf', 395003, NULL, '30-11-2024', 89751, 12, 100, 0, 3612, 'Stripe', 'Completed', NULL, NULL, NULL, NULL, '', NULL, NULL, '2024-11-30 11:39:48', '2024-11-30 11:39:48'),
(39, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-12-2024', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2024-12-02 10:32:53', '2024-12-02 10:32:53'),
(40, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', '1', '319 Second Extension', '', 395008, NULL, '02-12-2024', 70856, 0, 0, 17000, 68000, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2024-12-02 10:57:27', '2024-12-02 10:57:27'),
(41, '133', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '02-12-2024', 28660, 70, 0, 0, 770, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_41.pdf', NULL, '', NULL, NULL, '2024-12-02 16:12:25', '2024-12-02 16:12:25'),
(42, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-12-2024', 52482, 0, 0, 0, 5298, 'Cash On Delivery', 'Order Cancelled', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_42.pdf', NULL, '', NULL, NULL, '2024-12-19 13:17:11', '2024-12-19 13:17:11'),
(43, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-12-2024', 76335, 0, 0, 0, 46580, 'Cash On Delivery', 'Order Cancelled', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_43.pdf', NULL, '', NULL, NULL, '2024-12-19 14:37:58', '2024-12-19 14:37:58'),
(44, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-12-2024', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2024-12-19 14:37:59', '2024-12-19 14:37:59'),
(45, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-02-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 12:32:47', '2025-02-18 12:32:47'),
(46, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-02-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 12:37:28', '2025-02-18 12:37:28'),
(47, NULL, 'Emily Stevenson', 'Jin Mayo', 'vopelypeca@mailinator.com', 4878787876, '1', '1', '1', '72 Nobel Lane', 'Nulla eos magnam in dolorum eveniet sequi corrupti cupiditate enim magna aut qui proident voluptas', 394510, NULL, '18-02-2025', 75601, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 13:45:15', '2025-02-18 13:45:15'),
(48, NULL, 'Nissim Whitney', 'Zahir Price', 'byfupi@mailinator.com', 3587877887, '2', '2', '3', '31 Oak Lane', 'Sit in dolorem et expedita adipisicing ut amet numquam consequatur lorem', 0, NULL, '22-02-2025', 21629, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-22 11:20:45', '2025-02-22 11:20:45'),
(49, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, '1', '1', '1', 'Adajan , Surat', 'Earum provident deleniti voluptas est tempore assumenda praesentium sint ullam ut non assumenda nesciunt vo', 394510, NULL, '06-03-2025', 46347, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-03-06 12:29:27', '2025-03-06 12:29:27'),
(50, NULL, 'Emily Stevenson', 'Jin Mayo', 'vopelypeca@mailinator.com', 4878787876, '1', '1', '1', '72 Nobel Lane', 'Nulla eos magnam in dolorum eveniet sequi corrupti cupiditate enim magna aut qui proident voluptas', 394510, NULL, '17-06-2025', 75601, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-06-17 13:45:15', '2025-06-17 13:45:15'),
(51, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '17-07-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-06-17 12:37:28', '2025-06-17 12:37:28'),
(52, 'Jack\'s iPhone 14 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'test surat', NULL, 395008, NULL, '17-06-2025', 75552, 100, 0, 0, 1100, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_28.pdf', NULL, '', NULL, NULL, '2025-06-17 12:37:28', '2025-06-17 12:37:28'),
(53, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2112212121, '1', '1', NULL, '319 Second Extension', '', 395008, NULL, '17-06-2025', 28099, 300, 0, 600, 2700, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-06-17 12:37:28', '2025-06-17 12:37:28'),
(54, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8987668777, '1', '1', NULL, '319 Second Extension', '', 394510, NULL, '17-06-2025', 40844, 84, 100, 168, 856, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '1', '', NULL, NULL, '2025-06-17 12:37:28', '2025-06-17 12:37:28'),
(55, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '30-09-2024', 68597, 720, 0, 0, 7917.8, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_35.pdf', NULL, '', NULL, NULL, '2024-09-30 11:23:46', '2024-09-30 11:23:46'),
(56, 'Jack\'s iPhone 14 Pro', 'haresh', 'mangukiya', NULL, 2147483647, '1', '1', '1', 'test surat', NULL, 395008, NULL, '17-07-2025', 75552, 100, 0, 0, 1100, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_28.pdf', NULL, '', NULL, NULL, '2025-07-17 12:37:28', '2025-07-17 12:37:28'),
(57, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '17-07-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-07-17 12:37:28', '2025-07-17 12:37:28'),
(58, '93', 'ram', 'mer', 'rammer@gmail.com', 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '30-08-2025', 68597, 720, 0, 0, 7917.8, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_35.pdf', NULL, '', NULL, NULL, '2025-08-30 11:23:46', '2025-08-30 11:23:46'),
(59, '133', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '02-09-2025', 28660, 70, 0, 0, 770, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_41.pdf', NULL, '', NULL, NULL, '2025-09-02 16:12:25', '2025-09-02 16:12:25'),
(60, NULL, 'Emily Stevenson', 'Jin Mayo', 'vopelypeca@mailinator.com', 4878787876, '1', '1', '1', '72 Nobel Lane', 'Nulla eos magnam in dolorum eveniet sequi corrupti cupiditate enim magna aut qui proident voluptas', 394510, NULL, '17-10-2025', 75601, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-17 13:45:15', '2025-10-17 13:45:15'),
(61, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-10-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-10-02 10:32:53', '2025-10-02 10:32:53'),
(62, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-04-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-02 10:32:53', '2025-04-02 10:32:53'),
(63, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-04-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-02 10:32:53', '2025-04-02 10:32:53'),
(64, '133', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '02-04-2025', 28660, 70, 0, 0, 770, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_41.pdf', NULL, '', NULL, NULL, '2025-04-02 16:12:25', '2025-04-02 16:12:25'),
(65, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-05-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-05-19 14:37:59', '2025-05-19 14:37:59'),
(66, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-05-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-05-19 14:37:59', '2025-05-19 14:37:59'),
(67, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-05-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-05-19 14:37:59', '2025-05-19 14:37:59'),
(68, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-05-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-05-19 14:37:59', '2025-05-19 14:37:59'),
(69, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-04-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-02 10:32:53', '2025-05-02 10:32:53'),
(70, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-04-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-02 10:32:53', '2025-05-02 10:32:53'),
(71, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-04-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-02 10:32:53', '2025-05-02 10:32:53'),
(73, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-11-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-11-02 10:32:53', '2025-11-02 10:32:53'),
(74, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-11-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-11-02 10:32:53', '2025-11-02 10:32:53'),
(75, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '07-11-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-11-07 10:32:53', '2025-11-07 10:32:53'),
(76, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '09-08-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-08-09 10:32:53', '2025-08-09 10:32:53'),
(77, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-08-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-08-19 14:37:59', '2025-08-19 14:37:59'),
(78, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-12-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-12-02 10:32:53', '2025-12-02 10:32:53'),
(79, NULL, 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 8787878787, '1', '1', NULL, '52 South White Oak Avenue', '', 394510, NULL, '02-12-2025', 34180, 0, 0, 600, 2400, 'PayPal', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-12-02 10:32:53', '2025-12-02 10:32:53'),
(80, '104', 'hiren ', 'patel', 'hirenpatel2744@gmail.com', 2147483647, '1', '1', '1', 'adajan', NULL, 395018, NULL, '19-12-2025', 98991, 0, 0, 0, 46580, 'Cash On Delivery', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_44.pdf', NULL, '', NULL, NULL, '2025-12-19 14:37:59', '2025-12-19 14:37:59'),
(81, NULL, 'Emily Stevenson', 'Jin Mayo', 'vopelypeca@mailinator.com', 4878787876, '1', '1', '1', '72 Nobel Lane', 'Nulla eos magnam in dolorum eveniet sequi corrupti cupiditate enim magna aut qui proident voluptas', 394510, NULL, '17-12-2025', 75601, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-12-17 13:45:15', '2025-12-17 13:45:15'),
(82, '133', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '02-12-2025', 28660, 70, 0, 0, 770, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_41.pdf', NULL, '', NULL, NULL, '2025-12-02 16:12:25', '2025-12-02 16:12:25'),
(83, '8', 'lela', 'gaga', 'lela@gmail.cpm', 978889, '1', '1', '2', 'fdfdd', 'ddssdfs', 23232, NULL, '17-06-2025', 63893, 18, 100, 0, 1618, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 11:06:36', '2025-06-17 11:06:36'),
(84, '3', 'kajoldddd', 'patel', 'kajol@gmail.com', 0, '1', '1', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', 234444, NULL, '17-06-2025', 9716, 18, 100, 0, 3618, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 11:07:29', '2025-06-17 11:07:29'),
(85, '3', 'kajoldddd', 'patel', 'kajol@gmail.com', 8778666789, '1', '1', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', 234444, NULL, '17-06-2025', 55065, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 11:32:22', '2025-06-17 11:32:22'),
(86, '3', 'kajoldddd', 'patel', 'kajol@gmail.com', 0, '1', '1', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', 234444, NULL, '17-01-2025', 9716, 18, 100, 0, 3618, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-01-17 11:07:29', '2025-01-17 11:07:29'),
(87, '133', 'ram', 'mer', NULL, 2147483647, '1', '1', '1', 'katargam ', NULL, 395008, NULL, '02-01-2025', 28660, 70, 0, 0, 770, 'stripe', 'Pending', NULL, NULL, 'https://ecomweb.fableadtechnolabs.com/admin/public/invoice/invoice_41.pdf', NULL, '', NULL, NULL, '2025-01-02 16:12:25', '2025-01-02 16:12:25'),
(88, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '18-06-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-18 12:12:49', '2025-06-18 12:12:49'),
(89, '3', 'kajoldddd', 'patel', 'kajol@gmail.com', 8778666789, '1', '1', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', 234444, NULL, '18-06-2025', 17134, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-18 12:16:16', '2025-06-18 12:16:16'),
(90, NULL, 'Fudeh', NULL, 'fudeh@gmail.com', 9898989898, '1', '1', '1', 'Askon plaza, adajan gam, adajan', '', 394510, NULL, '18-06-2025', 43156, 0, 100, 0, 550, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-18 12:17:09', '2025-06-18 12:17:09'),
(91, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '18-06-2025', 53816, 0, 100, 0, 500, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-18 12:18:14', '2025-06-18 12:18:14'),
(92, '16', 'mayur', 'kk', 'mayur@gmail.com', 1236547908, '1', '1', '1', '77 surat', 'ramchockhsfvgedg', 554345, NULL, '18-06-2025', 55978, 0, 100, 0, 5100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-18 12:21:13', '2025-06-18 12:21:13'),
(93, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '19-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-19 12:51:00', '2025-07-19 12:51:00'),
(94, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '19-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-19 12:52:40', '2025-07-19 12:52:40'),
(95, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '19-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-19 12:54:16', '2025-07-19 12:54:16'),
(96, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '19-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-19 12:55:09', '2025-07-19 12:55:09'),
(97, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '19-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-19 12:56:13', '2025-07-19 12:56:13'),
(98, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '18-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-18 12:56:13', '2025-07-18 12:56:13'),
(99, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '18-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-18 12:55:09', '2025-07-18 12:55:09'),
(100, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '18-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-18 12:54:16', '2025-07-18 12:54:16'),
(101, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '18-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-18 12:52:40', '2025-07-18 12:52:40'),
(102, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '18-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-18 12:51:00', '2025-07-18 12:51:00'),
(103, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '06-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-06 12:51:00', '2025-07-06 12:51:00'),
(104, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '06-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-06 12:52:40', '2025-07-06 12:52:40'),
(105, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '06-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-06 12:54:16', '2025-07-06 12:54:16'),
(106, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '06-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-06 12:55:09', '2025-07-06 12:55:09'),
(107, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '06-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-06 12:56:13', '2025-07-06 12:56:13'),
(108, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '07-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-07 12:56:13', '2025-07-07 12:56:13'),
(109, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '07-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-07 12:55:09', '2025-07-07 12:55:09'),
(110, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '07-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-07 12:54:16', '2025-07-07 12:54:16'),
(111, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '07-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-07 12:52:40', '2025-07-07 12:52:40'),
(112, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '07-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-07 12:51:00', '2025-07-07 12:51:00'),
(113, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '08-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-08 12:51:00', '2025-07-08 12:51:00'),
(114, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '08-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-08 12:52:40', '2025-07-08 12:52:40'),
(115, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '08-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-08 12:54:16', '2025-07-08 12:54:16'),
(116, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '08-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-08 12:55:09', '2025-07-08 12:55:09'),
(117, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '08-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-08 12:56:13', '2025-07-08 12:56:13'),
(118, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '09-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-09 12:56:13', '2025-07-09 12:56:13'),
(119, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '09-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-09 12:55:09', '2025-07-09 12:55:09'),
(120, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '09-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-09 12:54:16', '2025-07-09 12:54:16'),
(121, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '09-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-09 12:52:40', '2025-07-09 12:52:40'),
(122, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '09-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-09 12:51:00', '2025-07-09 12:51:00'),
(123, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '10-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-10 12:51:00', '2025-07-10 12:51:00'),
(124, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '10-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-10 12:52:40', '2025-07-10 12:52:40'),
(125, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '10-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-10 12:54:16', '2025-07-10 12:54:16'),
(126, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '10-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-10 12:55:09', '2025-07-10 12:55:09'),
(127, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '10-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-10 12:56:13', '2025-07-10 12:56:13'),
(128, NULL, 'Raj', NULL, 'raj@gmail.com', 8778788778, '1', '1', '1', 'Ratna Chintamani Apartment, near J P Mission School, Mughal Sarai', '', 395001, NULL, '22-07-2025', 85738, 0, 100, 0, 52100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-22 12:56:13', '2025-07-22 12:56:13'),
(129, NULL, 'kashish Pant', NULL, 'Kashish@gmail.com', 9898989898, '1', '1', '1', '3rd Floor, Mothers Gift Hospital, Opposite Rishikesh Triveni Apartment, Nanpura', '', 395001, NULL, '22-07-2025', 86267, 0, 100, 0, 7100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-22 12:55:09', '2025-07-22 12:55:09'),
(130, NULL, 'Udeh', NULL, 'Udeh@gmail.com', 8778666789, '1', '1', '1', '	Annie Besant Rd, Near Gujarat Mitra Press, Sonifaliya, Chowk Bazar, Gopipura', '', 395001, NULL, '22-07-2025', 99778, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-22 12:54:16', '2025-07-22 12:54:16'),
(131, '33', 'Aruna', 'Fablead', 'email@gmail.com', 8457585865, '', '1', '1', '', '', 0, NULL, '22-07-2025', 14045, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-22 12:52:40', '2025-07-22 12:52:40'),
(132, '7', 'fexu', 'shah', 'fexu@gmail.com', 767866, '1', '2', '3', 'dfdd', 'fdfdf', 55555, NULL, '22-07-2025', 35235, 0, 100, 0, 1600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-22 12:51:00', '2025-07-22 12:51:00'),
(133, '16', 'mayur', 'kk', 'mayur@gmail.com', 1236547908, '1', '1', '1', '77 surat', 'ramchockhsfvgedg', 554345, NULL, '21-06-2025', 55978, 0, 100, 0, 5100, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-21 12:21:13', '2025-06-21 12:21:13'),
(134, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-06-2025', 53816, 0, 100, 0, 500, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-21 12:18:14', '2025-06-21 12:18:14'),
(135, NULL, 'Fudeh', NULL, 'fudeh@gmail.com', 9898989898, '1', '1', '1', 'Askon plaza, adajan gam, adajan', '', 394510, NULL, '21-06-2025', 43156, 0, 100, 0, 550, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-21 12:17:09', '2025-06-21 12:17:09'),
(136, '3', 'kajoldddd', 'patel', 'kajol@gmail.com', 8778666789, '1', '1', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', 234444, NULL, '21-06-2025', 17134, 0, 100, 0, 3600, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-21 12:16:16', '2025-06-21 12:16:16'),
(137, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-06-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-06-21 12:12:49', '2025-06-21 12:12:49'),
(138, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(139, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(140, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(141, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(142, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(143, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(144, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(145, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(146, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(147, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(148, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(149, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(150, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(151, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(152, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(153, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(154, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(155, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(156, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(157, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-04-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-04-21 12:12:49', '2025-04-21 12:12:49'),
(158, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-05-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-21 12:12:49', '2025-05-21 12:12:49'),
(159, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-05-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-21 12:12:49', '2025-05-21 12:12:49'),
(160, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-05-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-21 12:12:49', '2025-05-21 12:12:49'),
(161, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-05-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-05-21 12:12:49', '2025-05-21 12:12:49'),
(162, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(163, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(164, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(165, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(166, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49');
INSERT INTO `orders` (`OrderID`, `UserID`, `fname`, `lname`, `email`, `phoneno`, `country`, `state`, `city`, `address1`, `address2`, `zipcode`, `company`, `OrderDate`, `OrderNumber`, `totalTax`, `totalShipingCost`, `totalDiscount`, `TotalAmount`, `payment`, `OrderStatus`, `exprice_date`, `package_date`, `invoice_pdf`, `is_read`, `prescription`, `not_prescription`, `referDis`, `Created_at`, `Updated_at`) VALUES
(167, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(168, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(169, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(170, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(171, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(172, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(173, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(174, '4', 'mahesgqq', 'patil', 'mahesh@gmail.com', 788788, '1', '2', '3', 'fddfdf', 'dfdfdfdf', 5555566, NULL, '21-03-2025', 92164, 0, 100, 0, 300, 'Cash on Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-03-21 12:12:49', '2025-03-21 12:12:49'),
(175, NULL, 'Nissim Whitney', 'Zahir Price', 'byfupi@mailinator.com', 3587877887, '2', '2', '3', '31 Oak Lane', 'Sit in dolorem et expedita adipisicing ut amet numquam consequatur lorem', 0, NULL, '22-02-2025', 21629, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-22 11:20:45', '2025-02-22 11:20:45'),
(176, NULL, 'Emily Stevenson', 'Jin Mayo', 'vopelypeca@mailinator.com', 4878787876, '1', '1', '1', '72 Nobel Lane', 'Nulla eos magnam in dolorum eveniet sequi corrupti cupiditate enim magna aut qui proident voluptas', 394510, NULL, '18-02-2025', 75601, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 13:45:15', '2025-02-18 13:45:15'),
(177, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-02-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 12:37:28', '2025-02-18 12:37:28'),
(178, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-02-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-02-18 12:32:47', '2025-02-18 12:32:47'),
(179, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-08-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:32:47', '2025-08-18 12:32:47'),
(180, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(181, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(182, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-08-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:32:47', '2025-08-18 12:32:47'),
(183, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-08-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:32:47', '2025-08-18 12:32:47'),
(184, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(185, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(186, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-08-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:32:47', '2025-08-18 12:32:47'),
(187, NULL, 'Hedy Simon', 'Arthur Lester', 'vumi@mailinator.com', 7190909090, '1', '1', '1', '833 South Oak Extension', 'Aspernatur corporis nihil amet excepteur laboris odit et enim', 394510, NULL, '18-08-2025', 71125, 0, 0, 0, 1399, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:32:47', '2025-08-18 12:32:47'),
(188, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(189, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-08-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-08-18 12:37:28', '2025-08-18 12:37:28'),
(190, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(191, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(192, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(193, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(194, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(195, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(196, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(197, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(198, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(199, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(200, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(201, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(202, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(203, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(204, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(205, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(206, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(207, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(208, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(209, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(210, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(211, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(212, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(213, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(214, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(215, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(216, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-01-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-01-18 12:37:28', '2025-01-18 12:37:28'),
(217, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(218, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(219, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(220, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(221, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(222, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(223, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(224, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(225, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(226, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(227, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(228, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(229, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(230, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(231, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(232, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(233, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(234, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(235, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(236, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(237, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(238, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(239, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(240, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(241, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(242, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(243, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(244, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(245, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(246, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(247, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(248, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-09-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-09-18 12:37:28', '2025-09-18 12:37:28'),
(249, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(250, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(251, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(252, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(253, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(254, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(255, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(256, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-10-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-10-18 12:37:28', '2025-10-18 12:37:28'),
(257, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(258, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(259, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(260, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(261, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(262, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(263, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(264, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(265, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(266, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(267, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(268, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(269, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(270, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(271, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(272, NULL, 'Willow Garza', 'Boris Roberts', 'fotegonypy@mailinator.com', 8087878787, '1', '1', '1', '514 New Parkway', 'Voluptatibus quod expedita culpa quo temporibus sunt laudantium accusamus', 394510, NULL, '18-11-2025', 42374, 0, 0, 0, 1299, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-11-18 12:37:28', '2025-11-18 12:37:28'),
(273, NULL, 'RAJKUMAR', 'SINGH', 'rajking.singh10@gmail.com', 9824734531, '1', '1', '1', '79 , GM Villa', 'Jahangirpura , Surat', 335009, NULL, '28-07-2025', 91522, 0, 0, 0, 26890, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-07-28 12:53:03', '2025-07-28 12:53:03'),
(274, NULL, 'RAJKUMAR', 'SINGH', 'rajking.singh10@gmail.com', 8979789884, '1', '1', '1', '79 , GM Villa', 'Jahangirpura , Surat', 395009, NULL, '28-07-2025', 27754, 0, 100, 0, 520, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-07-28 12:55:34', '2025-07-28 12:55:34'),
(275, NULL, 'Harmeet', 'SINGH', 'harmeet@gmail.com', 9878978977, '1', '1', '1', 'sdsd asd sd', 'Jahangirpura , Surat', 395009, NULL, '28-07-2025', 45650, 0, 0, 0, 3000, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, '0', '', NULL, NULL, '2025-07-28 12:58:54', '2025-07-28 12:58:54'),
(276, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, 'India', 'Gujarat', 'surat', 'Adajan , Surat', NULL, 30024, NULL, '28-07-2025', 31314, 0, 0, 0, 5849, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-28 13:19:27', '2025-07-28 13:19:27'),
(277, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, 'India', 'Gujarat', 'surat', 'Adajan , Surat', NULL, 30024, NULL, '28-07-2025', 73085, 0, 0, 0, 5849, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-28 13:19:33', '2025-07-28 13:19:33'),
(278, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, 'India', 'Gujarat', 'surat', 'Adajan , Surat', NULL, 30024, NULL, '28-07-2025', 48807, 0, 0, 0, 5398, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-28 13:22:24', '2025-07-28 13:22:24'),
(279, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, 'India', 'Gujarat', 'surat', 'Adajan , Surat', NULL, 30024, NULL, '28-07-2025', 86948, 0, 0, 0, 5398, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-28 13:22:24', '2025-07-28 13:22:24'),
(280, '83', 'Sneh', 'Chaudhary', 'fablead.sneh@gmail.com', 2147483647, 'India', 'Gujarat', 'surat', 'Adajan , Surat', NULL, 30024, NULL, '28-07-2025', 71869, 0, 0, 0, 5398, 'Cash On Delivery', 'Pending', NULL, NULL, NULL, NULL, '', NULL, NULL, '2025-07-28 13:22:25', '2025-07-28 13:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_comment`
--

CREATE TABLE `order_comment` (
  `comment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_comment`
--

INSERT INTO `order_comment` (`comment_id`, `order_id`, `comments`, `dates`) VALUES
(1, 20, 'fuytfuyguyig', '2024-08-24 05:49:27'),
(2, 20, 'dcfcfcf', '2024-08-24 07:26:34'),
(3, 20, 'ddcf4ff', '2024-08-24 07:31:40'),
(4, 21, 'cdwccc', '2024-08-24 07:35:41'),
(5, 19, 'ccfvfvfv', '2024-08-24 08:52:19'),
(6, 22, 'hhghh ', '2024-09-10 11:19:48'),
(7, 25, 'TEGTG', '2024-09-11 06:44:13'),
(8, 31, 'lklk', '2024-09-12 05:02:09'),
(9, 56, 'on hold', '2024-10-26 05:17:27'),
(10, 77, '44', '2024-11-11 05:21:17'),
(11, 148, 'jhgyh', '2024-11-23 06:49:01'),
(12, 148, 'hgyug', '2024-11-23 06:53:38'),
(13, 148, 'jkkk', '2024-11-23 06:55:48'),
(14, 147, 'sadasd', '2024-11-23 07:26:28'),
(15, 148, 'dccc', '2024-11-23 07:49:41'),
(16, 147, 'enbnede', '2024-11-23 07:51:14'),
(17, 148, 'e2fd', '2024-11-25 09:32:09'),
(18, 141, 'dfrgrr', '2024-11-25 09:37:02'),
(19, 166, '555', '2024-11-26 05:18:21'),
(20, 166, '555', '2024-11-26 05:18:21'),
(21, 216, 'Order Delivered', '2024-11-27 08:02:51'),
(22, 3, 'compltd', '2024-11-27 09:40:56'),
(23, 33, 'aabc', '2024-11-29 12:13:57'),
(24, 25, 'completed', '2024-11-29 12:41:02'),
(25, 38, 'abc', '2024-11-30 06:45:18'),
(26, 37, 'abc', '2024-11-30 06:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `PageID` int(11) NOT NULL,
  `PageSlug` varchar(255) NOT NULL,
  `PageTitle` varchar(255) NOT NULL,
  `PageContent` text NOT NULL,
  `PageLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `Transation_id` text DEFAULT NULL,
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL COMMENT 'foreign key from usertable',
  `PaymentType` varchar(255) NOT NULL DEFAULT '' COMMENT '1-Credit card, 2-Paypal, 3-Bank transfer',
  `Amount` float NOT NULL,
  `PaymentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `PaymentStatus` varchar(500) NOT NULL DEFAULT '' COMMENT '1-Success, 2-Pending, 3-Failed',
  `PaymentKey` int(11) DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `Transation_id`, `OrderID`, `UserID`, `PaymentType`, `Amount`, `PaymentDate`, `PaymentStatus`, `PaymentKey`, `Created_at`, `Updated_at`) VALUES
(1, 'cod_67318b448c7ae', 77, 94, 'Cash On Delivery', 24758.9, '2024-11-11 04:42:44', 'Pending', NULL, '2024-11-11 10:12:44', '2024-11-11 10:12:44'),
(2, 'stri_6732e164c3cc1', 82, 94, 'Stripe', 875, '2024-11-12 05:02:28', 'Pending', NULL, '2024-11-12 10:32:28', '2024-11-12 10:32:28'),
(3, 'raz_6732e98ed89c9', 83, NULL, 'Razorpay', 820, '2024-11-12 05:37:18', 'Pending', NULL, '2024-11-12 11:07:18', '2024-11-12 11:07:18'),
(4, 'raz_6732f55c84918', 84, NULL, 'Razorpay', 208, '2024-11-12 06:27:40', 'Pending', NULL, '2024-11-12 11:57:40', '2024-11-12 11:57:40'),
(5, 'raz_6732f61e835ce', 85, NULL, 'Razorpay', 2710, '2024-11-12 06:30:54', 'Pending', NULL, '2024-11-12 12:00:54', '2024-11-12 12:00:54'),
(6, 'raz_6732f83acca2d', 86, NULL, 'Razorpay', 2215, '2024-11-12 06:39:54', 'Pending', NULL, '2024-11-12 12:09:54', '2024-11-12 12:09:54'),
(7, 'stri_673485f138383', 88, NULL, 'Stripe', 1140, '2024-11-13 10:56:49', 'Pending', NULL, '2024-11-13 16:26:49', '2024-11-13 16:26:49'),
(8, 'stri_6734860a149ce', 89, NULL, 'Stripe', 1140, '2024-11-13 10:57:14', 'Pending', NULL, '2024-11-13 16:27:14', '2024-11-13 16:27:14'),
(11, 'cod_6736fe04c486d', 93, NULL, 'Cash On Delivery', 388, '2024-11-15 07:53:40', 'Pending', NULL, '2024-11-15 13:23:40', '2024-11-15 13:23:40'),
(13, 'ch_3QLKVbH3z9jiRVAK0uyanIk4', 95, 93, 'PayPal', 1925, '2024-11-15 13:34:04', 'success', NULL, '2024-11-15 13:34:04', '2024-11-15 13:34:04'),
(14, 'raz_673701bec8229', 96, NULL, 'RazorPay', 685, '2024-11-15 08:09:34', 'Pending', NULL, '2024-11-15 13:39:34', '2024-11-15 13:39:34'),
(15, 'raz_67370271ea5af', 97, NULL, 'RazorPay', 8650, '2024-11-15 08:12:33', 'success', NULL, '2024-11-15 13:42:33', '2024-11-15 13:42:33'),
(19, 'stri_673712bec3c07', 101, NULL, 'Stripe', 640, '2024-11-15 09:22:06', 'Pending', NULL, '2024-11-15 14:52:06', '2024-11-15 14:52:06'),
(21, 'cod_673716e1c0f3f', 103, NULL, 'Cash On Delivery', 10810, '2024-11-15 09:39:45', 'Pending', NULL, '2024-11-15 15:09:45', '2024-11-15 15:09:45'),
(22, 'stri_673717129218c', 104, NULL, 'Stripe', 20345.5, '2024-11-15 09:40:34', 'Pending', NULL, '2024-11-15 15:10:34', '2024-11-15 15:10:34'),
(23, 'stri_6737172361bed', 105, NULL, 'Stripe', 20345.5, '2024-11-15 09:40:51', 'Pending', NULL, '2024-11-15 15:10:51', '2024-11-15 15:10:51'),
(24, 'stri_673717ada6775', 106, NULL, 'Stripe', 6000, '2024-11-15 09:43:09', 'Pending', NULL, '2024-11-15 15:13:09', '2024-11-15 15:13:09'),
(25, 'paypal_673719c8c8ca3', 107, NULL, 'PayPal', 2935.8, '2024-11-15 09:52:08', 'succeeded', NULL, '2024-11-15 15:22:08', '2024-11-15 15:22:08'),
(26, 'cod_67371c76c4c30', 108, NULL, 'Cash On Delivery', 9909.1, '2024-11-15 10:03:34', 'Pending', NULL, '2024-11-15 15:33:34', '2024-11-15 15:33:34'),
(27, 'raz_6737247de8ebc', 109, NULL, 'RazorPay', 9190, '2024-11-15 10:37:49', 'Pending', NULL, '2024-11-15 16:07:49', '2024-11-15 16:07:49'),
(28, 'cod_673adf354c8b1', 110, 83, 'Cash On Delivery', 3270, '2024-11-18 06:31:17', 'Pending', NULL, '2024-11-18 12:01:17', '2024-11-18 12:01:17'),
(29, 'cod_673adf610d431', 111, 83, 'Cash On Delivery', 3270, '2024-11-18 06:32:01', 'Pending', NULL, '2024-11-18 12:02:01', '2024-11-18 12:02:01'),
(30, 'cod_673ae01be42af', 112, NULL, 'Cash On Delivery', 1438.9, '2024-11-18 06:35:07', 'Pending', NULL, '2024-11-18 12:05:07', '2024-11-18 12:05:07'),
(31, 'ch_3QMRl2H3z9jiRVAK0W2BF7Ih', 113, 93, 'PayPal', 5280, '2024-11-18 15:30:38', 'success', NULL, '2024-11-18 15:30:38', '2024-11-18 15:30:38'),
(32, NULL, 114, 93, 'Cash On Delivery', 4680, '2024-11-18 15:45:29', 'success', NULL, '2024-11-18 15:45:29', '2024-11-18 15:45:29'),
(33, NULL, 115, 93, 'Cash On Delivery', 1140, '2024-11-18 15:47:11', 'success', NULL, '2024-11-18 15:47:11', '2024-11-18 15:47:11'),
(34, NULL, 116, 93, 'Cash On Delivery', 1225, '2024-11-18 15:57:18', 'success', NULL, '2024-11-18 15:57:18', '2024-11-18 15:57:18'),
(35, NULL, 117, 93, 'Cash On Delivery', 1225, '2024-11-18 15:58:21', 'success', NULL, '2024-11-18 15:58:21', '2024-11-18 15:58:21'),
(36, 'PAYID-M45SGAI10W573002V498804B', 118, 93, 'PayPal', 924, '2024-11-18 16:51:45', 'success', NULL, '2024-11-18 16:51:45', '2024-11-18 16:51:45'),
(37, NULL, 119, 93, 'Cash On Delivery', 2260, '2024-11-22 15:01:01', 'success', NULL, '2024-11-22 15:01:01', '2024-11-22 15:01:01'),
(38, NULL, 120, 93, 'Cash On Delivery', 1840.2, '2024-11-22 15:02:18', 'success', NULL, '2024-11-22 15:02:18', '2024-11-22 15:02:18'),
(39, NULL, 121, 93, 'Cash On Delivery', 2260, '2024-11-22 15:03:03', 'success', NULL, '2024-11-22 15:03:03', '2024-11-22 15:03:03'),
(40, NULL, 122, 93, 'Cash On Delivery', 725, '2024-11-22 15:36:32', 'success', NULL, '2024-11-22 15:36:32', '2024-11-22 15:36:32'),
(41, NULL, 123, 93, 'Cash On Delivery', 395, '2024-11-22 15:39:15', 'success', NULL, '2024-11-22 15:39:15', '2024-11-22 15:39:15'),
(42, NULL, 124, 93, 'Cash On Delivery', 725, '2024-11-22 15:39:50', 'success', NULL, '2024-11-22 15:39:50', '2024-11-22 15:39:50'),
(43, NULL, 125, 78, 'Cash On Delivery', 115606, '2024-11-22 17:51:28', 'success', NULL, '2024-11-22 17:51:28', '2024-11-22 17:51:28'),
(44, NULL, 126, 93, 'Cash On Delivery', 1145, '2024-11-22 17:53:07', 'success', NULL, '2024-11-22 17:53:07', '2024-11-22 17:53:07'),
(45, NULL, 127, 93, 'Cash On Delivery', 1145, '2024-11-22 17:54:52', 'success', NULL, '2024-11-22 17:54:52', '2024-11-22 17:54:52'),
(46, NULL, 128, 85, 'Cash On Delivery', 2308, '2024-11-22 18:11:49', 'success', NULL, '2024-11-22 18:11:49', '2024-11-22 18:11:49'),
(47, NULL, 129, 85, 'Cash On Delivery', 2308, '2024-11-22 18:14:16', 'success', NULL, '2024-11-22 18:14:16', '2024-11-22 18:14:16'),
(48, NULL, 130, 85, 'Cash On Delivery', 2308, '2024-11-22 18:14:54', 'success', NULL, '2024-11-22 18:14:54', '2024-11-22 18:14:54'),
(49, NULL, 131, 85, 'Cash On Delivery', 2788, '2024-11-22 18:25:57', 'success', NULL, '2024-11-22 18:25:57', '2024-11-22 18:25:57'),
(50, NULL, 132, 85, 'Cash On Delivery', 380, '2024-11-22 18:27:11', 'success', NULL, '2024-11-22 18:27:11', '2024-11-22 18:27:11'),
(51, NULL, 133, 85, 'Cash On Delivery', 380, '2024-11-22 18:28:55', 'success', NULL, '2024-11-22 18:28:55', '2024-11-22 18:28:55'),
(52, NULL, 134, 93, 'Cash On Delivery', 1145, '2024-11-22 18:31:16', 'success', NULL, '2024-11-22 18:31:16', '2024-11-22 18:31:16'),
(53, NULL, 135, 85, 'Cash On Delivery', 380, '2024-11-22 18:32:13', 'success', NULL, '2024-11-22 18:32:13', '2024-11-22 18:32:13'),
(54, NULL, 136, 85, 'Cash On Delivery', 380, '2024-11-22 18:37:20', 'success', NULL, '2024-11-22 18:37:20', '2024-11-22 18:37:20'),
(55, NULL, 137, 85, 'Cash On Delivery', 380, '2024-11-22 18:37:56', 'success', NULL, '2024-11-22 18:37:56', '2024-11-22 18:37:56'),
(56, NULL, 138, 85, 'Cash On Delivery', 2788, '2024-11-22 18:39:44', 'success', NULL, '2024-11-22 18:39:44', '2024-11-22 18:39:44'),
(57, NULL, 139, 85, 'Cash On Delivery', 2788, '2024-11-22 18:43:40', 'success', NULL, '2024-11-22 18:43:40', '2024-11-22 18:43:40'),
(58, NULL, 140, 85, 'Cash On Delivery', 2788, '2024-11-22 19:06:08', 'success', NULL, '2024-11-22 19:06:08', '2024-11-22 19:06:08'),
(59, NULL, 141, 93, 'Cash On Delivery', 1325, '2024-11-23 09:50:50', 'success', NULL, '2024-11-23 09:50:50', '2024-11-23 09:50:50'),
(60, NULL, 142, 85, 'Cash On Delivery', 3460, '2024-11-23 09:54:26', 'success', NULL, '2024-11-23 09:54:26', '2024-11-23 09:54:26'),
(61, NULL, 143, 85, 'Cash On Delivery', 2788, '2024-11-23 09:55:17', 'success', NULL, '2024-11-23 09:55:17', '2024-11-23 09:55:17'),
(62, NULL, 144, 85, 'Cash On Delivery', 2788, '2024-11-23 09:57:00', 'success', NULL, '2024-11-23 09:57:00', '2024-11-23 09:57:00'),
(63, NULL, 145, 85, 'Cash On Delivery', 2788, '2024-11-23 09:57:12', 'success', NULL, '2024-11-23 09:57:12', '2024-11-23 09:57:12'),
(64, NULL, 146, 93, 'Cash On Delivery', 325, '2024-11-23 10:07:51', 'success', NULL, '2024-11-23 10:07:51', '2024-11-23 10:07:51'),
(65, NULL, 147, 0, 'Cash On Delivery', 325, '2024-11-23 11:42:13', 'success', NULL, '2024-11-23 11:42:13', '2024-11-23 11:42:13'),
(66, NULL, 148, 93, 'Cash On Delivery', 2260, '2024-11-23 11:46:47', 'success', NULL, '2024-11-23 11:46:47', '2024-11-23 11:46:47'),
(67, NULL, 149, 96, 'Cash On Delivery', 725, '2024-11-23 13:48:00', 'success', NULL, '2024-11-23 13:48:00', '2024-11-23 13:48:00'),
(68, 'PAYID-M5AZOBQ363233378P6265900', 150, 96, 'paypal', 5338, '2024-11-23 14:19:22', 'success', NULL, '2024-11-23 14:19:22', '2024-11-23 14:19:22'),
(69, NULL, 151, 0, 'Cash On Delivery', 2260, '2024-11-23 14:27:50', 'success', NULL, '2024-11-23 14:27:50', '2024-11-23 14:27:50'),
(70, NULL, 152, 85, 'Cash On Delivery', 358, '2024-11-23 14:33:40', 'success', NULL, '2024-11-23 14:33:40', '2024-11-23 14:33:40'),
(71, NULL, 153, 85, 'Cash On Delivery', 358, '2024-11-23 14:33:41', 'success', NULL, '2024-11-23 14:33:41', '2024-11-23 14:33:41'),
(72, NULL, 154, 96, 'Cash On Delivery', 7250, '2024-11-23 14:37:27', 'success', NULL, '2024-11-23 14:37:27', '2024-11-23 14:37:27'),
(73, 'ch_3QOFY3H3z9jiRVAK10h3T069', 155, 85, 'stripe', 275, '2024-11-23 14:52:40', 'success', NULL, '2024-11-23 14:52:40', '2024-11-23 14:52:40'),
(74, 'ch_3QOFZSH3z9jiRVAK17kAIFCv', 156, 85, 'stripe', 275, '2024-11-23 14:54:07', 'success', NULL, '2024-11-23 14:54:07', '2024-11-23 14:54:07'),
(75, 'pay_POhG5RBazlh0ux', 157, 85, 'razorpay', 380, '2024-11-23 14:57:58', 'success', NULL, '2024-11-23 14:57:58', '2024-11-23 14:57:58'),
(76, 'pay_POhHkDiNuTJNqG', 158, 85, 'razorpay', 380, '2024-11-23 14:59:30', 'success', NULL, '2024-11-23 14:59:30', '2024-11-23 14:59:30'),
(77, 'ch_3QOFqrH3z9jiRVAK0KxNpdXl', 159, 96, 'stripe', 2915, '2024-11-23 15:12:06', 'success', NULL, '2024-11-23 15:12:06', '2024-11-23 15:12:06'),
(78, 'ch_3QOFqrH3z9jiRVAK0KxNpdXl', 160, 96, 'stripe', 3015, '2024-11-23 15:12:06', 'success', NULL, '2024-11-23 15:12:06', '2024-11-23 15:12:06'),
(79, 'ch_3QOuq9H3z9jiRVAK07d1qHCH', 161, 96, 'stripe', 2640, '2024-11-25 10:58:07', 'success', NULL, '2024-11-25 10:58:07', '2024-11-25 10:58:07'),
(80, 'ch_3QOuq9H3z9jiRVAK07d1qHCH', 162, 96, 'stripe', 2740, '2024-11-25 10:58:08', 'success', NULL, '2024-11-25 10:58:08', '2024-11-25 10:58:08'),
(81, 'cod_67440c6e7c319', 163, NULL, 'Cash On Delivery', 83600, '2024-11-25 05:34:38', 'Pending', NULL, '2024-11-25 11:04:38', '2024-11-25 11:04:38'),
(82, NULL, 164, 93, 'Cash On Delivery', 2535, '2024-11-25 19:29:52', 'success', NULL, '2024-11-25 19:29:52', '2024-11-25 19:29:52'),
(83, NULL, 165, 96, 'Cash On Delivery', 2160, '2024-11-26 10:33:48', 'success', NULL, '2024-11-26 10:33:48', '2024-11-26 10:33:48'),
(84, NULL, 166, 96, 'Cash On Delivery', 135, '2024-11-26 10:44:18', 'success', NULL, '2024-11-26 10:44:18', '2024-11-26 10:44:18'),
(85, NULL, 167, 96, 'Cash On Delivery', 225, '2024-11-26 11:06:15', 'success', NULL, '2024-11-26 11:06:15', '2024-11-26 11:06:15'),
(86, NULL, 168, 96, 'Cash On Delivery', 225, '2024-11-26 11:08:44', 'success', NULL, '2024-11-26 11:08:44', '2024-11-26 11:08:44'),
(87, NULL, 169, 96, 'Cash On Delivery', 225, '2024-11-26 11:10:27', 'success', NULL, '2024-11-26 11:10:27', '2024-11-26 11:10:27'),
(88, 'ch_3QPHaZH3z9jiRVAK1Ii1kQ06', 170, 93, 'stripe', 2640, '2024-11-26 11:15:32', 'success', NULL, '2024-11-26 11:15:32', '2024-11-26 11:15:32'),
(89, 'ch_3QPHaxH3z9jiRVAK0oeqqONf', 171, 83, 'stripe', 2200, '2024-11-26 11:15:56', 'success', NULL, '2024-11-26 11:15:56', '2024-11-26 11:15:56'),
(90, 'ch_3QPHdJH3z9jiRVAK1SFpkjiu', 172, 93, 'stripe', 2640, '2024-11-26 11:18:21', 'success', NULL, '2024-11-26 11:18:21', '2024-11-26 11:18:21'),
(91, 'ch_3QPHtgH3z9jiRVAK1FVRQLMI', 173, 0, 'stripe', 825, '2024-11-26 11:35:17', 'success', NULL, '2024-11-26 11:35:17', '2024-11-26 11:35:17'),
(92, 'ch_3QPImlH3z9jiRVAK0y23KXWc', 174, 93, 'stripe', 275, '2024-11-26 12:32:12', 'success', NULL, '2024-11-26 12:32:12', '2024-11-26 12:32:12'),
(93, 'ch_3QPImlH3z9jiRVAK0y23KXWc', 175, 93, 'stripe', 325, '2024-11-26 12:32:14', 'success', NULL, '2024-11-26 12:32:14', '2024-11-26 12:32:14'),
(94, NULL, 176, 0, 'Cash On Delivery', 2395, '2024-11-26 13:51:58', 'success', NULL, '2024-11-26 13:51:58', '2024-11-26 13:51:58'),
(95, NULL, 177, 0, 'Cash On Delivery', 235, '2024-11-26 15:24:18', 'success', NULL, '2024-11-26 15:24:18', '2024-11-26 15:24:18'),
(96, NULL, 178, 0, 'Cash On Delivery', 325, '2024-11-26 15:25:55', 'success', NULL, '2024-11-26 15:25:55', '2024-11-26 15:25:55'),
(97, NULL, 179, 0, 'Cash On Delivery', 325, '2024-11-26 15:25:56', 'success', NULL, '2024-11-26 15:25:56', '2024-11-26 15:25:56'),
(98, NULL, 180, 96, 'Cash On Delivery', 235, '2024-11-26 15:27:33', 'success', NULL, '2024-11-26 15:27:33', '2024-11-26 15:27:33'),
(99, 'ch_3QPLXwH3z9jiRVAK1B7ojM3g', 181, 96, 'stripe', 2640, '2024-11-26 15:29:05', 'success', NULL, '2024-11-26 15:29:05', '2024-11-26 15:29:05'),
(100, 'ch_3QPLXwH3z9jiRVAK1B7ojM3g', 182, 96, 'stripe', 2260, '2024-11-26 15:29:06', 'success', NULL, '2024-11-26 15:29:06', '2024-11-26 15:29:06'),
(101, NULL, 183, 96, 'Cash On Delivery', 325, '2024-11-26 15:42:32', 'success', NULL, '2024-11-26 15:42:32', '2024-11-26 15:42:32'),
(102, NULL, 184, 96, 'Cash On Delivery', 2260, '2024-11-26 15:47:19', 'success', NULL, '2024-11-26 15:47:19', '2024-11-26 15:47:19'),
(103, NULL, 185, 96, 'Cash On Delivery', 325, '2024-11-26 15:48:47', 'success', NULL, '2024-11-26 15:48:47', '2024-11-26 15:48:47'),
(104, NULL, 186, 96, 'Cash On Delivery', 325, '2024-11-26 15:50:05', 'success', NULL, '2024-11-26 15:50:05', '2024-11-26 15:50:05'),
(105, NULL, 187, 96, 'Cash On Delivery', 325, '2024-11-26 15:54:36', 'success', NULL, '2024-11-26 15:54:36', '2024-11-26 15:54:36'),
(106, NULL, 188, 96, 'Cash On Delivery', 2260, '2024-11-26 15:55:32', 'success', NULL, '2024-11-26 15:55:32', '2024-11-26 15:55:32'),
(107, NULL, 189, 96, 'Cash On Delivery', 325, '2024-11-26 15:56:35', 'success', NULL, '2024-11-26 15:56:35', '2024-11-26 15:56:35'),
(108, NULL, 190, 96, 'Cash On Delivery', 325, '2024-11-26 16:01:26', 'success', NULL, '2024-11-26 16:01:26', '2024-11-26 16:01:26'),
(109, NULL, 191, 96, 'Cash On Delivery', 2485, '2024-11-26 16:04:10', 'success', NULL, '2024-11-26 16:04:10', '2024-11-26 16:04:10'),
(110, NULL, 192, 96, 'Cash On Delivery', 262, '2024-11-26 16:28:40', 'success', NULL, '2024-11-26 16:28:40', '2024-11-26 16:28:40'),
(111, NULL, 193, 96, 'Cash On Delivery', 262, '2024-11-26 16:28:40', 'success', NULL, '2024-11-26 16:28:40', '2024-11-26 16:28:40'),
(112, NULL, 194, 96, 'Cash On Delivery', 2260, '2024-11-26 16:32:18', 'success', NULL, '2024-11-26 16:32:18', '2024-11-26 16:32:18'),
(113, NULL, 195, 96, 'Cash On Delivery', 4180, '2024-11-26 16:36:52', 'success', NULL, '2024-11-26 16:36:52', '2024-11-26 16:36:52'),
(114, 'ch_3QPMhgH3z9jiRVAK0ZAWj7CX', 196, 96, 'stripe', 275, '2024-11-26 16:43:13', 'success', NULL, '2024-11-26 16:43:13', '2024-11-26 16:43:13'),
(115, 'ch_3QPMhgH3z9jiRVAK0ZAWj7CX', 197, 96, 'stripe', 375, '2024-11-26 16:43:14', 'success', NULL, '2024-11-26 16:43:14', '2024-11-26 16:43:14'),
(116, 'ch_3QPN1xH3z9jiRVAK0oB0YUw4', 198, 96, 'stripe', 275, '2024-11-26 17:04:09', 'success', NULL, '2024-11-26 17:04:09', '2024-11-26 17:04:09'),
(117, 'ch_3QPN1xH3z9jiRVAK0oB0YUw4', 199, 96, 'stripe', 325, '2024-11-26 17:04:11', 'success', NULL, '2024-11-26 17:04:11', '2024-11-26 17:04:11'),
(118, 'ch_3QPN5CH3z9jiRVAK12a4FZT0', 200, 96, 'stripe', 275, '2024-11-26 17:07:31', 'success', NULL, '2024-11-26 17:07:31', '2024-11-26 17:07:31'),
(119, 'ch_3QPN5CH3z9jiRVAK12a4FZT0', 201, 96, 'stripe', 325, '2024-11-26 17:07:32', 'success', NULL, '2024-11-26 17:07:32', '2024-11-26 17:07:32'),
(120, NULL, 202, 96, 'Cash On Delivery', 2260, '2024-11-26 17:39:31', 'success', NULL, '2024-11-26 17:39:31', '2024-11-26 17:39:31'),
(121, 'ch_3QPNcCH3z9jiRVAK1iFpTgZx', 203, 96, 'stripe', 2640, '2024-11-26 17:41:36', 'success', NULL, '2024-11-26 17:41:36', '2024-11-26 17:41:36'),
(122, 'ch_3QPNeqH3z9jiRVAK10S9j9o5', 204, 96, 'stripe', 2915, '2024-11-26 17:44:21', 'success', NULL, '2024-11-26 17:44:21', '2024-11-26 17:44:21'),
(123, 'ch_3QPNeqH3z9jiRVAK10S9j9o5', 205, 96, 'stripe', 2485, '2024-11-26 17:44:22', 'success', NULL, '2024-11-26 17:44:22', '2024-11-26 17:44:22'),
(124, '098080', 206, 96, '1', 375, '2024-11-26 17:53:59', 'success', NULL, '2024-11-26 17:53:59', '2024-11-26 17:53:59'),
(125, '098080', 207, 96, '1', 375, '2024-11-26 17:55:13', 'success', NULL, '2024-11-26 17:55:13', '2024-11-26 17:55:13'),
(126, '098080', 208, 96, '1', 375, '2024-11-26 17:56:56', 'success', NULL, '2024-11-26 17:56:56', '2024-11-26 17:56:56'),
(127, NULL, 209, 0, 'Cash On Delivery', 2160, '2024-11-27 10:17:40', 'success', NULL, '2024-11-27 10:17:40', '2024-11-27 10:17:40'),
(128, 'cod_6746a8419ffae', 210, NULL, 'Cash On Delivery', 1428.9, '2024-11-27 05:04:01', 'Pending', NULL, '2024-11-27 10:34:01', '2024-11-27 10:34:01'),
(129, 'stri_6746a91b0ed05', 211, NULL, 'Stripe', 1454.88, '2024-11-27 05:07:39', 'success', NULL, '2024-11-27 10:37:39', '2024-11-27 10:37:39'),
(130, 'paypal_6746aa7899e83', 212, NULL, 'PayPal', 1195.08, '2024-11-27 05:13:28', 'success', NULL, '2024-11-27 10:43:28', '2024-11-27 10:43:28'),
(131, 'cod_6746abdb403c4', 213, NULL, 'Cash On Delivery', 2338.2, '2024-11-27 05:19:23', 'Pending', NULL, '2024-11-27 10:49:23', '2024-11-27 10:49:23'),
(132, 'cod_6746af064bc0d', 214, NULL, 'Cash On Delivery', 1428.9, '2024-11-27 05:32:54', 'Pending', NULL, '2024-11-27 11:02:54', '2024-11-27 11:02:54'),
(133, 'stri_6746b05dd15a3', 215, NULL, 'Stripe', 2700, '2024-11-27 05:38:37', 'success', NULL, '2024-11-27 11:08:37', '2024-11-27 11:08:37'),
(134, 'paypal_6746b0e96afae', 216, NULL, 'PayPal', 2700, '2024-11-27 05:40:57', 'success', NULL, '2024-11-27 11:10:57', '2024-11-27 11:10:57'),
(135, NULL, 1, 0, 'Cash On Delivery', 4375, '2024-11-27 14:52:30', 'success', NULL, '2024-11-27 14:52:30', '2024-11-27 14:52:30'),
(136, NULL, 2, 93, 'Cash On Delivery', 540, '2024-11-27 15:07:04', 'success', NULL, '2024-11-27 15:07:04', '2024-11-27 15:07:04'),
(137, NULL, 3, 93, 'Cash On Delivery', 540, '2024-11-27 15:07:05', 'success', NULL, '2024-11-27 15:07:05', '2024-11-27 15:07:05'),
(138, 'cod_6746ebba372f3', 4, NULL, 'Cash On Delivery', 192568, '2024-11-27 09:51:54', 'Pending', NULL, '2024-11-27 15:21:54', '2024-11-27 15:21:54'),
(139, NULL, 5, 0, 'Cash On Delivery', 925, '2024-11-27 17:51:18', 'success', NULL, '2024-11-27 17:51:18', '2024-11-27 17:51:18'),
(140, 'ch_3QPkecH3z9jiRVAK0rl8pnn3', 6, 0, 'stripe', 13200, '2024-11-27 18:17:39', 'success', NULL, '2024-11-27 18:17:39', '2024-11-27 18:17:39'),
(141, 'ch_3QPkfQH3z9jiRVAK0n0FX0V5', 7, 0, 'stripe', 13200, '2024-11-27 18:18:29', 'success', NULL, '2024-11-27 18:18:29', '2024-11-27 18:18:29'),
(142, 'ch_3QPkh0H3z9jiRVAK1yfLWCHF', 8, 0, 'stripe', 2640, '2024-11-27 18:20:07', 'success', NULL, '2024-11-27 18:20:07', '2024-11-27 18:20:07'),
(143, 'ch_3QPkp7H3z9jiRVAK06GQGDR8', 9, 0, 'stripe', 2640, '2024-11-27 18:28:30', 'success', NULL, '2024-11-27 18:28:30', '2024-11-27 18:28:30'),
(144, 'ch_3QPkrJH3z9jiRVAK1JENOf4l', 10, 0, 'stripe', 2640, '2024-11-27 18:30:46', 'success', NULL, '2024-11-27 18:30:46', '2024-11-27 18:30:46'),
(145, 'ch_3QPktgH3z9jiRVAK0MZcE4XT', 11, 93, 'stripe', 275, '2024-11-27 18:33:13', 'success', NULL, '2024-11-27 18:33:13', '2024-11-27 18:33:13'),
(146, 'ch_3QPktgH3z9jiRVAK0MZcE4XT', 12, 93, 'stripe', 325, '2024-11-27 18:33:14', 'success', NULL, '2024-11-27 18:33:14', '2024-11-27 18:33:14'),
(147, 'ch_3QPkwDH3z9jiRVAK1SK1SIqy', 13, 93, 'stripe', 275, '2024-11-27 18:35:50', 'success', NULL, '2024-11-27 18:35:50', '2024-11-27 18:35:50'),
(148, 'ch_3QPkwDH3z9jiRVAK1SK1SIqy', 14, 93, 'stripe', 375, '2024-11-27 18:35:51', 'success', NULL, '2024-11-27 18:35:51', '2024-11-27 18:35:51'),
(149, 'ch_3QPl10H3z9jiRVAK0aLRqZTA', 15, 93, 'stripe', 2640, '2024-11-27 18:40:47', 'success', NULL, '2024-11-27 18:40:47', '2024-11-27 18:40:47'),
(150, 'ch_3QPl10H3z9jiRVAK0aLRqZTA', 16, 93, 'stripe', 2740, '2024-11-27 18:40:49', 'success', NULL, '2024-11-27 18:40:49', '2024-11-27 18:40:49'),
(151, 'ch_3QPl3BH3z9jiRVAK04Log14T', 17, 93, 'stripe', 2640, '2024-11-27 18:43:02', 'success', NULL, '2024-11-27 18:43:02', '2024-11-27 18:43:02'),
(152, 'ch_3QPl3BH3z9jiRVAK04Log14T', 18, 93, 'stripe', 2740, '2024-11-27 18:43:04', 'success', NULL, '2024-11-27 18:43:04', '2024-11-27 18:43:04'),
(153, 'ch_3QPzTpH3z9jiRVAK04QTizDc', 19, 93, 'stripe', 8085, '2024-11-28 10:07:30', 'success', NULL, '2024-11-28 10:07:30', '2024-11-28 10:07:30'),
(154, 'ch_3QPzWKH3z9jiRVAK1vyzGmzp', 20, 97, 'stripe', 2805, '2024-11-28 10:10:05', 'success', NULL, '2024-11-28 10:10:05', '2024-11-28 10:10:05'),
(155, 'ch_3QPzWKH3z9jiRVAK1vyzGmzp', 21, 97, 'stripe', 2395, '2024-11-28 10:10:08', 'success', NULL, '2024-11-28 10:10:08', '2024-11-28 10:10:08'),
(156, 'stri_6748149db355e', 22, 83, 'Stripe', 1626.9, '2024-11-28 06:58:37', 'success', NULL, '2024-11-28 12:28:37', '2024-11-28 12:28:37'),
(157, 'cod_67481a5a89a2c', 23, 83, 'Cash On Delivery', 3300, '2024-11-28 07:23:06', 'Pending', NULL, '2024-11-28 12:53:06', '2024-11-28 12:53:06'),
(158, 'ch_3QQ2cYH3z9jiRVAK0ExkoN1T', 24, 0, 'stripe', 2640, '2024-11-28 13:28:43', 'success', NULL, '2024-11-28 13:28:43', '2024-11-28 13:28:43'),
(159, NULL, 25, 100, 'Cash On Delivery', 5122, '2024-11-28 13:56:16', 'success', NULL, '2024-11-28 13:56:16', '2024-11-28 13:56:16'),
(160, NULL, 26, 0, 'Cash On Delivery', 2640, '2024-11-28 14:30:29', 'success', NULL, '2024-11-28 14:30:29', '2024-11-28 14:30:29'),
(161, NULL, 27, 0, 'Cash On Delivery', 225, '2024-11-28 15:26:07', 'success', NULL, '2024-11-28 15:26:07', '2024-11-28 15:26:07'),
(162, 'ch_3QQ5sSH3z9jiRVAK1svVUSbs', 28, 0, 'stripe', 1100, '2024-11-28 16:57:21', 'success', NULL, '2024-11-28 16:57:21', '2024-11-28 16:57:21'),
(163, 'cod_6749420d72924', 29, NULL, 'Cash On Delivery', 2700, '2024-11-29 04:24:45', 'Pending', NULL, '2024-11-29 09:54:45', '2024-11-29 09:54:45'),
(164, 'cod_6749769367834', 30, NULL, 'Cash On Delivery', 918, '2024-11-29 08:08:51', 'Pending', NULL, '2024-11-29 13:38:51', '2024-11-29 13:38:51'),
(165, 'cod_674977818ea57', 31, NULL, 'Cash On Delivery', 766, '2024-11-29 08:12:49', 'Pending', NULL, '2024-11-29 13:42:49', '2024-11-29 13:42:49'),
(166, 'cod_6749783da8c28', 32, NULL, 'Cash On Delivery', 594, '2024-11-29 08:15:57', 'Pending', NULL, '2024-11-29 13:45:57', '2024-11-29 13:45:57'),
(167, 'cod_67497c489d5c2', 33, NULL, 'Cash On Delivery', 274, '2024-11-29 08:33:12', 'Pending', NULL, '2024-11-29 14:03:12', '2024-11-29 14:03:12'),
(168, NULL, 34, 100, 'Cash On Delivery', 350, '2024-11-29 17:50:50', 'success', NULL, '2024-11-29 17:50:50', '2024-11-29 17:50:50'),
(169, 'ch_3QQjcjH3z9jiRVAK1sPCN3hI', 35, 93, 'stripe', 7917.8, '2024-11-30 11:23:46', 'success', NULL, '2024-11-30 11:23:46', '2024-11-30 11:23:46'),
(170, 'ch_3QQjcjH3z9jiRVAK1sPCN3hI', 36, 93, 'stripe', 5858.4, '2024-11-30 11:23:47', 'success', NULL, '2024-11-30 11:23:47', '2024-11-30 11:23:47'),
(171, 'paypal_674d3f7d909ea', 39, NULL, 'PayPal', 2400, '2024-12-02 05:02:53', 'success', NULL, '2024-12-02 10:32:53', '2024-12-02 10:32:53'),
(172, 'paypal_674d453fec642', 40, NULL, 'PayPal', 68000, '2024-12-02 05:27:27', 'success', NULL, '2024-12-02 10:57:27', '2024-12-02 10:57:27'),
(173, 'ch_3QRX5AH3z9jiRVAK1Yjyqw4U', 41, 133, 'stripe', 770, '2024-12-02 16:12:25', 'success', NULL, '2024-12-02 16:12:25', '2024-12-02 16:12:25'),
(174, NULL, 42, 104, 'Cash On Delivery', 5298, '2024-12-19 13:17:12', 'success', NULL, '2024-12-19 13:17:12', '2024-12-19 13:17:12'),
(175, NULL, 43, 104, 'Cash On Delivery', 46580, '2024-12-19 14:37:59', 'success', NULL, '2024-12-19 14:37:59', '2024-12-19 14:37:59'),
(176, NULL, 44, 104, 'Cash On Delivery', 46580, '2024-12-19 14:38:00', 'success', NULL, '2024-12-19 14:38:00', '2024-12-19 14:38:00'),
(177, 'cod_67b43097cbff3', 45, NULL, 'Cash On Delivery', 1399, '2025-02-18 07:02:47', 'Pending', NULL, '2025-02-18 12:32:47', '2025-02-18 12:32:47'),
(178, 'cod_67b431b012956', 46, NULL, 'Cash On Delivery', 1299, '2025-02-18 07:07:28', 'Pending', NULL, '2025-02-18 12:37:28', '2025-02-18 12:37:28'),
(179, 'cod_67b44193bd541', 47, NULL, 'Cash On Delivery', 1299, '2025-02-18 08:15:15', 'Pending', NULL, '2025-02-18 13:45:15', '2025-02-18 13:45:15'),
(180, 'cod_67b965b5e3da9', 48, NULL, 'Cash On Delivery', 1299, '2025-02-22 05:50:45', 'Pending', NULL, '2025-02-22 11:20:45', '2025-02-22 11:20:45'),
(181, 'cod_67c947cf2050c', 49, 83, 'Cash On Delivery', 1299, '2025-03-06 06:59:27', 'Pending', NULL, '2025-03-06 12:29:27', '2025-03-06 12:29:27'),
(182, 'cod_688772af86c95', 273, NULL, 'Cash On Delivery', 26890, '2025-07-28 12:53:03', 'Pending', NULL, '2025-07-28 12:53:03', '2025-07-28 12:53:03'),
(183, 'cod_68877346c5e96', 274, NULL, 'Cash On Delivery', 430, '2025-07-28 12:55:34', 'Pending', NULL, '2025-07-28 12:55:34', '2025-07-28 12:55:34'),
(184, 'cod_6887740ea4dae', 275, NULL, 'Cash On Delivery', 3000, '2025-07-28 12:58:54', 'Pending', NULL, '2025-07-28 12:58:54', '2025-07-28 12:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_getway`
--

CREATE TABLE `payment_getway` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=COD,2=bank_transfer,3=paypal,4=strip,5=razorpay',
  `details` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=disabled,1=enabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_getway`
--

INSERT INTO `payment_getway` (`id`, `type`, `details`, `status`) VALUES
(1, 1, '[]', 1),
(2, 2, '{\"name\":\"asd\",\"bank_name\":\"BOB\",\"account_no\":\"asd\",\"IFSC_no\":\"asd\"}', 0),
(3, 3, '{\"clientID\":\"AbZA5q98qyHO-9d0i-Fr6sHCr4HH44mrS_O8mqfRvhU1V6ARqO-GJIZdhp5GB-cHyLGsRbjc7ihhR2E0\",\"secret_key\":\"EHSrDDfdIdr3EcX9vaF6fGh_CuiEjmzh9iNnrrcuNIuu7gNmkToTaRjfNlcVnjO5t_tZhysr5reNNf-R\",\"merchant_email\":\"jay.feblead@gamil.com\"}', 1),
(4, 4, '{\"public_key\":\"pk_test_51Mp3sVH3z9jiRVAKUVXj8vvJW5kM0zV6QXlxZeluYV00wTbxRhsTa9Qe5RCiHTVTEJDqtckmVE1GwLkDkNUeVkZZ004BvHvhbr\",\"secret_key\":\"sk_test_51Mp3sVH3z9jiRVAKpEBmLnv4ViybTFSivSCwsFCCPwNGqr8pWR9N4RgkREecSRKQ0ra3TPYgIGEYJg84ojKQShKy00Xb7XDIIy\"}', 1),
(5, 5, '{\"keyId\":\"rzp_test_9UrkTeo8gsGo77\",\"key_secret\":\"rOG3EgOvfgOTlRIPSvjuFn8T\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photoedit`
--

CREATE TABLE `photoedit` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `imgPath` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductSKU` varchar(200) DEFAULT NULL,
  `ProductType` varchar(500) DEFAULT '0' COMMENT '1-Simple, 2-Variable',
  `CategoryID` int(11) DEFAULT NULL,
  `SubCategoryID` int(11) NOT NULL,
  `VariationTypeID` int(11) DEFAULT NULL,
  `VariationID` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `TagID` varchar(255) DEFAULT NULL,
  `ShippingID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductPrice` bigint(20) DEFAULT 0,
  `Sale_ProductPrice` bigint(20) DEFAULT NULL,
  `ProductCartDesc` varchar(255) DEFAULT NULL,
  `ProductShortDesc` varchar(255) DEFAULT NULL,
  `ProductLongDesc` text DEFAULT NULL,
  `ProductImage` varchar(1000) DEFAULT NULL,
  `ProductStock` varchar(100) NOT NULL,
  `ProductLowStock` varchar(100) DEFAULT NULL,
  `Stock_Status` varchar(500) DEFAULT NULL COMMENT '1-In Stock, 2-Out Of Stock',
  `ProductLive` tinyint(4) NOT NULL DEFAULT 1,
  `product_weight` varchar(100) DEFAULT NULL,
  `product_dimensions` varchar(100) DEFAULT NULL,
  `product_quantity` varchar(1001) DEFAULT NULL,
  `price_product` varchar(100) DEFAULT NULL,
  `is_taxable` int(11) DEFAULT NULL,
  `tax_class_id` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `exprice_date` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductSKU`, `ProductType`, `CategoryID`, `SubCategoryID`, `VariationTypeID`, `VariationID`, `BrandID`, `TagID`, `ShippingID`, `ProductName`, `ProductPrice`, `Sale_ProductPrice`, `ProductCartDesc`, `ProductShortDesc`, `ProductLongDesc`, `ProductImage`, `ProductStock`, `ProductLowStock`, `Stock_Status`, `ProductLive`, `product_weight`, `product_dimensions`, `product_quantity`, `price_product`, `is_taxable`, `tax_class_id`, `slug`, `batch`, `package`, `exprice_date`, `Created_at`, `Updated_at`) VALUES
(14, 'toys collection', '1', 23, 71, NULL, NULL, NULL, NULL, 8, 'Soft animal toys', 1500, 1299, NULL, 'A stuffed toy is a toy doll with an outer fabric sewn from a textile and stuffed with flexible material. They are known by many names, such as plush toys, plushies, stuffed animals, and stuffies; in Britain and Australia, they may also be called soft toys', 'A stuffed toy is a toy doll with an outer fabric sewn from a textile and stuffed with flexible material. They are known by many names, such as plush toys, plushies, stuffed animals, and stuffies; in Britain and Australia, they may also be called soft toys or cuddly toys.', '[\"1725017187_d5bfffc444f6635630bd.jpg\",\"1725017187_7c6f74478183636842ed.jpg\"]', '-31', NULL, '1', 1, '2', '14.5', NULL, NULL, 1, NULL, 'Soft-animal-toys', NULL, NULL, NULL, '2023-11-08 15:37:29', '2023-11-08 15:37:29'),
(43, '34343322', '2', 32, 60, NULL, NULL, NULL, NULL, 9, 'new balance HIERRO Running Shoes For Men  (Black)', 3500, 3000, NULL, 'A complete package for extra turf ones. Very rugged quality. It quiet comfortable when it comes to heavy usage. You will be differentiated from a lot post wearing this pair , quiet eye catchy it is .\r\nFoam cushion is good, but I feel Sketchers are masters', 'A complete package for extra turf ones. Very rugged quality. It quiet comfortable when it comes to heavy usage. You will be differentiated from a lot post wearing this pair , quiet eye catchy it is .\r\nFoam cushion is good, but I feel Sketchers are masters in tha', '[\"1724926883_d5d035f0e79b418cc72f.jpeg\"]', '0', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 0, NULL, 'new-balance-HIERRO-Running-Shoes-For-Men--(Black)', NULL, NULL, NULL, '2023-11-28 12:29:05', '2023-11-28 12:29:05'),
(58, 'pen34567', '1', 35, 69, NULL, NULL, 1, NULL, 9, 'SanDisk Cruze Blade SDCZ50 64 GB Pen Drive  (Red, Black)', 450, 420, NULL, 'Backing up, transferring, sharing, and storing files is convenient with this SanDisk Blade 64GB pendrive. Easy to use Compact in design and with generous storage space, this flash drive lets you start storing and transferring files immediately.', 'Compact in design and with generous storage space, this flash drive lets you start storing and transferring files immediately.', '[\"1702892920_3020802ab47b4fbac5e3.jpg\",\"1702892920_c180c4389b37164f5fb7.jpg\"]', '50', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, NULL, 'SanDisk-Cruze-Blade-SDCZ50-64-GB-Pen-Drive--(Red,-Black)', NULL, NULL, NULL, '2023-12-18 15:18:40', '2023-12-18 15:18:40'),
(59, 'edu12345', '1', 23, 71, NULL, NULL, NULL, NULL, 9, 'wooples LCD Writing Tablet,Electronic Writing.Tablet Gift for Kids and Adults (Black)', 200, 180, NULL, 'Special Note: The screen is default locked in order to save power. Please unlock it before first usage. Great Gift for Kids - It is good for writing, spelling, and drawing practice. Multi-use: Suitable for designers, professionals, teachers, students, and', 'friendly ABS + Soft LCD Size: 8.5 inch Input voltage:3 V Frequency: 1HZ Battery: CR2020 button battery Package Included: 1 x LCD writing tablet 1 x writing stylus 1 x battery inside 1 x packing box Note:1.Normally one button clears everything but if it doesn\'t please change battery to clear. 2', '[\"1702894542_eebe7db863778babd0cc.jpg\",\"1702894542_8638ed9c204f965cb775.jpg\"]', '21', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 1, NULL, 'wooples-LCD-Writing-Tablet,Electronic-Writing.Tablet-Gift-for-Kids-and-Adults-(Black)', NULL, NULL, NULL, '2023-12-18 15:45:42', '2023-12-18 15:45:42'),
(61, 'remote123', '2', 23, 70, NULL, NULL, 22, NULL, 9, 'Famous Car Remote Control 3D Car with LED Lights, Chargeable  (Black)', 400, 350, NULL, 'With its delicate, smooth profile, the CADDLE and TOES Kidsâ€™ RC Toy Car is engineered for exceptional performance. So, your child can navigate through obstacles effortlessly as the remote controller empowers them with functions, such as forward, reverse', 'Whether your little one is racing on a straight track or navigating challenging landscapes, this car is a reliable choice. And, its remote control allows your little champ to execute high-speed manoeuvres and take on multi-scene climbing adventures without any hassles.', '[\"1702963211_0966f5f199c52538b3f7.jpg\"]', '0', NULL, '1', 1, '20', '30', NULL, NULL, 0, NULL, 'Famous-Car-Remote-Control-3D-Car-with-LED-Lights,-Chargeable--(Black)', NULL, NULL, NULL, '2023-12-19 10:50:11', '2023-12-19 10:50:11'),
(62, 'truck123', '2', 23, 70, NULL, NULL, 13, NULL, 9, 'Zenex store Monster truck toys car for kids 4 wheel Friction push to go speed monster truck', 700, 600, NULL, 'zing 360 degree stunt flipping design, a powerful 4-wheel drive and all-direction control, suitable for your kids or toy cars lover. Double sides running, forward, backward, turn left, turn right, 360 degree tumbling flipping. car just keeps on going no m', 'Amazing 360 degree stunt flipping design, a powerful 4-wheel drive and all-direction control, suitable for your kids or toy cars lover. Double sides running, forward, backward, turn left, turn right, 360 degree tumbling flipping. car just keeps on going no matter what it hits or how it lands, give you a different cool experience. High quality inflatable rubber wheels, anti-skid, shock resistant, strong grip. Each of the auto truck toys comes in a different vibrant color that will liven up any kidâ€™s room or toy box. your little one will absolutely love. This car boasts extraordinary grip. It is designed with an anti-collision head, being capable of driving stably in all terrains like beach, sand, grass or concrete road, etc', '[\"1702963343_e968eb8e46811534cdc8.jpg\"]', '58', NULL, '1', 1, '500gm', '150*419', NULL, NULL, 0, NULL, 'Zenex-store-Monster-truck-toys-car-for-kids-4-wheel-Friction-push-to-go-speed-monster-truck', NULL, NULL, NULL, '2023-12-19 10:52:23', '2023-12-19 10:52:23'),
(63, 'cactus1234', '1', 23, 72, NULL, NULL, NULL, NULL, 9, 'Dancing Cactus Repeats What You Say,Electronic Plush Toy with Lighting,Singing Cactus', 300, 250, NULL, 'Repeating cactus/Cactus plush toy can dance/dancing cactus mimicking toy, sing, Fun and lovely dancing cactus toy cactus plush toys, cactus dancing toy recording, With the singing and humorous dancing, children\'s attention will be aroused and joy will be ', 'Repeating cactus/Cactus plush toy can dance/dancing cactus mimicking toy, sing, Fun and lovely dancing cactus toy cactus plush toys, cactus dancing toy recording, With the singing and humorous dancing, children\'s attention will be aroused and joy will be brought to them! electronic cactus, cactus talking you said', '[\"1702963635_92ef878104dd20e58174.jpg\"]', '-7', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Dancing-Cactus-Repeats-What-You-Say,Electronic-Plush-Toy-with-Lighting,Singing-Cactus', NULL, NULL, NULL, '2023-12-19 10:57:15', '2023-12-19 10:57:15'),
(64, 'fst123', '1', 29, 51, NULL, NULL, NULL, NULL, 9, 'Minimalists Analog Watch - For Men 38024PP24', 2500, 2400, NULL, '\"Fastrack by Titan, was launched in 1998 and became an independent urban youth brand in 2005. Since then, it has carved a niche for itself with watches and sunglasses that are both fashionable and affordable. Fastrack extended its footprint into accessori', '\"Fastrack by Titan, was launched in 1998 and became an independent urban youth brand in 2005. Since then, it has carved a niche for itself with watches and sunglasses that are both fashionable and affordable. Fastrack extended its footprint into accessories in 2009 with a range of bags, belts and wallets. Through the years,', '[\"1702963885_b863f448d96609d8a602.jpg\"]', '0', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'Minimalists-Analog-Watch---For-Men-38024PP24', NULL, NULL, NULL, '2023-12-19 11:01:25', '2023-12-19 11:01:25'),
(65, 'beat1234', '1', 29, 52, NULL, NULL, NULL, NULL, 9, 'beatXP Marv Neo 1.85\'\' HD Display Bluetooth Calling Smart Watch, Health Tracking & IP68 Smartwatch  ', 5000, 4500, NULL, 'The beatXP Marv Neo smartwatch is packed with innovative features to make your life easy. With 560 nits peak brightness, you can clearly view the big screen even in broad daylight. The EzyPair technology of this smartwatch allows you to connect to Bluetoo', 'The beatXP Marv Neo smartwatch is packed with innovative features to make your life easy. With 560 nits peak brightness, you can clearly view the big screen even in broad daylight. The EzyPair technology of this smartwatch allows you to connect to Bluetooth instantly. With advanced health monitoring, you can check your vitals like heart rate, SpO2, and even your sleep. This smartwatch comes with more than 100 Sports Modes to keep track of your day-to-day activities.', '[\"1702964181_a90b31e456d45b2f1804.jpg\"]', '48', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'beatXP-Marv-Neo-1.85\'\'-HD-Display-Bluetooth-Calling-Smart-Watch,-Health-Tracking-&-IP68-Smartwatch--(Electric-Black-Strap,-Free-Size)', NULL, NULL, NULL, '2023-12-19 11:06:21', '2023-12-19 11:06:21'),
(66, 'shoke123', '1', 29, 51, NULL, NULL, NULL, NULL, 9, 'G-Shock ( GG-1000-1A5DR ) Analog-Digital Watch - For Men G661', 7000, 6500, NULL, 'To register this product online for warranty, the customer has to visit https://register.casio.in. Post login, please select the \'Online Store\' option and follow the steps for registration. Please refer to the aforementioned link for further details.', 'To register this product online for warranty, the customer has to visit https://register.casio.in. Post login, please select the \'Online Store\' option and follow the steps for registration. Please refer to the aforementioned link for further details.', '[\"1702965238_4b879fee1c9b1ac7ed61.jpg\"]', '48', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 2, 'G-Shock-(-GG-1000-1A5DR-)-Analog-Digital-Watch---For-Men-G661', NULL, NULL, NULL, '2023-12-19 11:23:58', '2023-12-19 11:23:58'),
(71, 'asus.ltd', '1', 33, 62, NULL, NULL, 12, '[\"5\"]', 8, 'Asus Tuf F15 15.6\" Gaming Edition', 70000, 68000, NULL, 'Processor: Intel Core i7-11800H Processor 2.3 GHz (24M Cache, up to 4.6 GHz, 8 Cores)\r\nPlay over 100 high-quality PC games, plus new and upcoming blockbusters on day one like Halo Infinite, Forza Horizon 5, and Age of Empires IV and one month of Game Pass', 'Processor: Intel Core i7-11800H Processor 2.3 GHz (24M Cache, up to 4.6 GHz, 8 Cores)\r\nPlay over 100 high-quality PC games, plus new and upcoming blockbusters on day one like Halo Infinite, Forza Horizon 5, and Age of Empires IV and one month of Game Pass-including EA Play.\r\nWith new games added all the time, thereâ€™s always something new to play. Age of Empires IV, Back 4 Blood, Battlefield V, Forza Horizon 5, Halo Infinite*, Knockout City, Microsoft Flight Simulator, Minecraft PC Bundle, Need for Speed Heat, Psychonauts2, The Sims 4, Titanfall 2, 12 Minutes\r\nMemory: 16GB SO-DIMM DDR4 3200MHz Upgradeble Up to 32GB using 2x SO-DIMM Slot. Storage: 512g PCIe 3.0 NVMe M.2 SSD\r\nDisplay: 15.6-inch ( 39.62 cm) FHD (1920 x 1080) 16:9 250nits, 144 Hz Refresh Rate, vIPS-level Anti-glare display, Contrast Ratio: 1000:1, with Adaptive-Sync\r\nGraphics: Dedicated NVIDIA GeForce RTX 3050 Ti 4GB GDDR6 VRAM with Up to 1585MHz at 60W (75W with Dynamic Boost)\r\nOperating System: Pre-installed Windows 11 Home with Lifetime Validity', '[\"1703658720_10a17406d1433c612e8d.png\",\"1703658720_573204fcd1dc3f8268bc.png\",\"1703658720_897d1c26e77c47d47ed1.png\",\"1703658720_104b059c6fa7102bdb15.png\"]', '4', NULL, '1', 1, '2', '15.6\"', NULL, NULL, 1, 4, 'Asus-Tuf-F15-15.6\"-Gaming-Edition', NULL, NULL, NULL, '2023-12-27 12:02:00', '2023-12-27 12:02:00'),
(72, 'sony.ltd', '1', 37, 74, NULL, NULL, 1, '[\"4\"]', 8, 'Sony Playstation 5 (8k 4320p resolution)', 60000, 55480, NULL, 'Maximize your play sessions with near instant load times for installed PS5 games.\r\nThe custom integration of the PS5 console\'s systems lets creators pull data from the SSD so quickly that they can design games in ways never before possible.\r\nImmerse yours', 'Maximize your play sessions with near instant load times for installed PS5 games.\r\nThe custom integration of the PS5 console\'s systems lets creators pull data from the SSD so quickly that they can design games in ways never before possible.\r\nImmerse yourself in worlds with a new level of realism as rays of light are individually simulated, creating true-to-life shadows and reflections in supported PS5 games.\r\nPlay your favorite PS5 games on your stunning 4K TV.\r\nEnjoy smooth and fluid high frame rate gameplay at up to 120fps for compatible games, with support for 120Hz output on 4K displays.\r\nWith an HDR TV, supported PS5 games display an unbelievably vibrant and lifelike range of colors.\r\nPS5 consoles support 8K Output, so you can play games on your 4320p resolution display.', '[\"1703659444_c99c80dcb11ddd15e518.webp\",\"1703659444_bf17e8116f74e3ac0acd.webp\",\"1703659444_da684b9c247c9af9e394.png\",\"1703659444_b0be43d59f12b62643f8.png\"]', '7', NULL, '1', 1, '1.5', '3.69\"', NULL, NULL, 1, 1, 'Sony-Playstation-5-(8k-4320p-resolution)', NULL, NULL, NULL, '2023-12-27 12:14:04', '2023-12-27 12:14:04'),
(73, 'microsoft.ltd', '2', 37, 75, NULL, NULL, 13, '[\"4\"]', 9, 'Xbox Series X (1tb , 4k 1440p resolution)', 52000, 47500, NULL, 'Introducing Xbox series X, the fastest, most powerful Xbox ever. Play thousands of titles from four generations of consolesâ€”all games look and play best on Xbox series X\r\nExperience next-gen speed and performance with the Xbox velocity architecture, pow', 'Introducing Xbox series X, the fastest, most powerful Xbox ever. Play thousands of titles from four generations of consolesâ€”all games look and play best on Xbox series X\r\nExperience next-gen speed and performance with the Xbox velocity architecture, powered by a custom SSD and integrated software\r\nPlay thousands of games from four generations of Xbox with backward compatibility, including optimized titles at launch\r\nXbox game Pass ultimate includes over 100 high-quality games, online multiplayer, and an EA play membership for one low monthly price (membership sold separately)\r\nXbox Smart delivery ensures you play the best available version of your game no matter which console you\'re playing on', '[\"1703660356_4395bd9636aad13f1bbf.png\",\"1703660356_1ffa15f9d12d7581fbe2.png\",\"1703660356_7abd6bdf480fd3931c57.webp\",\"1703660356_0fdcf96c2b50dfec5d47.png\"]', '43', NULL, '1', 1, '1.5', '3.69\"', NULL, NULL, 0, 0, 'Xbox-Series-X-(1tb-,-4k-1440p-resolution)', NULL, NULL, NULL, '2023-12-27 12:29:16', '2023-12-27 12:29:16'),
(74, 'versace.ltd', '2', 31, 56, NULL, NULL, 14, '[\"1\"]', 8, 'Barocco Print Silk Versace Shirt for Men', 1600, 1320, NULL, 'Boasting a pure silk construction, this short-sleeved shirt is distinguished by the house\'s signature Barocco print, making it quintessentially Versace.\r\nThe model is 1.85 m wearing size 48, The model is also styled with: Bianca Saunders Benz belted flare', 'Boasting a pure silk construction, this short-sleeved shirt is distinguished by the house\'s signature Barocco print, making it quintessentially Versace.\r\nThe model is 1.85 m wearing size 48, The model is also styled with: Bianca Saunders Benz belted flared trousers, Givenchy Marshmallow flatform slides, 100% Silk , Dry Clean only.', '[\"1703674171_03f8880897cefde931d5.png\",\"1703674171_146987fc7e0f4813c928.png\",\"1703674172_e30e3b7cd53b96d62c5b.png\",\"1703674172_0b689fa84c30b13a7902.png\"]', '52', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Barocco-Print-Silk-Versace-Shirt-for-Men', NULL, NULL, NULL, '2023-12-27 16:19:32', '2023-12-27 16:19:32'),
(75, 'jeans.ltd', '1', 31, 56, NULL, NULL, NULL, NULL, 8, 'Men Blue Carson Slim Fit Stone Wash Jeans', 900, 849, NULL, 'Jeans are a type of pants or trousers made from denim or dungaree cloth. Often the term \"jeans\" refers to a particular style of trousers, called \"blue jeans\", with copper-riveted pockets which were invented by Jacob W. Davis in 1871, and patented by Davis', 'Jeans are a type of pants or trousers made from denim or dungaree cloth. Often the term \"jeans\" refers to a particular style of trousers, called \"blue jeans\", with copper-riveted pockets which were invented by Jacob W. Davis in 1871, and patented by Davis and Levi Strauss on May 20, 1873. Prior to the patent, the term \"blue jeans\" had been long in use for various garments (including trousers, overalls, and coats), constructed from blue-colored denim. \"Jean\" also references a (historic) type of sturdy cloth commonly made with a cotton warp and wool weft (also known as \"Virginia cloth\"). Jean cloth can be entirely cotton as well, similar to denim. Originally designed for miners, modern jeans were popularized as casual wear by Marlon Brando and James Dean in their 1950s films, particularly The Wild One and Rebel Without a Cause, leading to the fabric becoming a symbol of rebellion among teenagers, especially members of the greaser subculture. From the 1960s onwards, jeans became common among various youth subcultures and subsequently young members of the general population. Nowadays, they are one of the most popular types of specialty trousers in Western culture. Historic brands include Levi\'s, Lee, and Wrangler.', '[\"1703675118_e98287e9813a4e98a1bb.png\",\"1703675118_5d1b5d14f68533210ffb.png\",\"1703675118_5870fb083932c5b622fe.png\"]', '10', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 1, 1, 'Men-Blue-Carson-Slim-Fit-Stone-Wash-Jeans', NULL, NULL, NULL, '2023-12-27 16:35:18', '2023-12-27 16:35:18'),
(76, 'jeans.ltd', '1', 31, 57, NULL, NULL, 16, '[\"6\"]', 8, 'Women\'s Wide Leg High Rise Full Length Jeans', 799, 689, NULL, 'Jeans are a type of pants or trousers made from denim or dungaree cloth. Often the term \"jeans\" refers to a particular style of trousers, called \"blue jeans\", with copper-riveted pockets which were invented by Jacob W. Davis in 1871, and patented by Davis', 'Jeans are a type of pants or trousers made from denim or dungaree cloth. Often the term \"jeans\" refers to a particular style of trousers, called \"blue jeans\", with copper-riveted pockets which were invented by Jacob W. Davis in 1871, and patented by Davis and Levi Strauss on May 20, 1873. Prior to the patent, the term \"blue jeans\" had been long in use for various garments (including trousers, overalls, and coats), constructed from blue-colored denim. \"Jean\" also references a (historic) type of sturdy cloth commonly made with a cotton warp and wool weft (also known as \"Virginia cloth\"). Jean cloth can be entirely cotton as well, similar to denim. Originally designed for miners, modern jeans were popularized as casual wear by Marlon Brando and James Dean in their 1950s films, particularly The Wild One and Rebel Without a Cause, leading to the fabric becoming a symbol of rebellion among teenagers, especially members of the greaser subculture. From the 1960s onwards, jeans became common among various youth subcultures and subsequently young members of the general population. Nowadays, they are one of the most popular types of specialty trousers in Western culture. Historic brands include Levi\'s, Lee, and Wrangler.', '[\"1703675922_4ab3cba64ac379b1245d.png\",\"1703675922_193ae7554c2f2bb6cdb6.png\",\"1703675922_810d4d97b4d77a33ac6e.png\",\"1703675922_93d70375b77c94e4eee7.png\"]', '15', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'Women\'s-Wide-Leg-High-Rise-Full-Length-Jeans', NULL, NULL, NULL, '2023-12-27 16:48:42', '2023-12-27 16:48:42'),
(77, 'reymond.ltd', '1', 31, 56, NULL, NULL, 15, '[\"1\"]', 8, 'Grey Trousers & White Shirts for Men', 1500, 1399, NULL, 'Louis Philippe is a purveyor of fine menâ€™s clothing that stands for timeless elegance, class and excellence. The brandâ€™s expertise lies in precision in craftsmanship and contemporary sensibilities to deliver the latest fashion in menswear. In the purs', 'Louis Philippe is a purveyor of fine menâ€™s clothing that stands for timeless elegance, class and excellence. The brandâ€™s expertise lies in precision in craftsmanship and contemporary sensibilities to deliver the latest fashion in menswear. In the pursuit of excellence, Louis Philippe sources its best fabrics from renowned mills across the world to craft high-end shirts and suits. The international menswear brand offers a collection of shirts, trousers, suits, blazers, footwear, accessories and timepieces.', '[\"1703676670_e0129d646e8bfb1428af.png\",\"1703676670_f3f8ba64d578193dbb55.png\",\"1703676670_fc6d67359f97777cdc06.png\",\"1703676670_df818935cd64566e2727.png\"]', '15', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'Grey-Trousers-&-White-Shirts-for-Men', NULL, NULL, NULL, '2023-12-27 17:01:10', '2023-12-27 17:01:10'),
(78, 'noise.ltd', '2', 29, 52, NULL, NULL, 17, NULL, 8, 'Noise Colorfit Ultra 3 AMOLED Smartwatch', 6000, 2599, NULL, '1.96â€ (4.9 cm) AMOLED display - See life unfold on a bigger canvas.\r\n7-day battery life (2 days with calling) - Become unstoppable with a watch that powers up completely after only 2 hours of charging.\r\nNoiseFit app - Track your activity and stay on top', '1.96â€ (4.9 cm) AMOLED display - See life unfold on a bigger canvas.\r\n7-day battery life (2 days with calling) - Become unstoppable with a watch that powers up completely after only 2 hours of charging.\r\nNoiseFit app - Track your activity and stay on top of your fitness goals with the NoiseFit app. Complete challenges, compete with friends and earn exclusive offers and rewards.\r\nEquipped with MEMS Microphone for calling clarity.\r\nFeatures to love: - Advanced Bluetooth calling powered by Tru SyncTM for crystal clear calling. - Functional crown for effortless navigation. - Always On Display for easy accessibility.\r\nWhatâ€™s in the box - smartwatch, charger, warranty card, user manual, toolkit for strap size adjustment (for Elite edition watches only)\r\nThe watch is not a replacement for a medical device. The readings can have error margins.', '[\"1703677399_bb8d6c767d831bd0231a.webp\",\"1703677399_a042702f1a2a5761d427.webp\",\"1703677399_2cf466aa8a298f3b8ae5.webp\",\"1703677399_f02e0834d041ffe53b5c.webp\"]', '10', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 0, NULL, 'Noise-Colorfit-Ultra-3-AMOLED-Smartwatch', NULL, NULL, NULL, '2023-12-27 17:13:19', '2023-12-27 17:13:19'),
(79, 'skechers.ltd', '2', 32, 60, NULL, NULL, 18, '[\"3\"]', 8, 'Arch fir d\'lux-key journey Unisex Shoes ', 6000, 4499, NULL, 'All-day comfort and support combine in Skechers Relaxed FitÂ®: Arch Fit D\'Lux. This slip-on features a Stretch FitÂ® engineered knit upper with a removable Arch FitÂ® insole and well-cushioned midsole.\r\n', 'All-day comfort and support combine in Skechers Relaxed FitÂ®: Arch Fit D\'Lux. This slip-on features a Stretch FitÂ® engineered knit upper with a removable Arch FitÂ® insole and well-cushioned midsole. Patented Skechers Arch FitÂ® insole system with podiatrist-certified arch support\r\nPodiatrist-designed shape developed with 20 years of data and 120,000 unweighted foot scans\r\nRemovable insole helps mold to your foot to reduce shock and increase weight dispersion\r\nStretch FitÂ® design for sock-like comfort\r\nRelaxed FitÂ® for a roomy comfort fit at toe and forefoot\r\nCrafted with 100% vegan materials', '[\"1703678625_01891dc80aac18e84d02.png\",\"1703678625_46ef08155fe54eac58a2.png\",\"1703678625_a563fd65842be7066da5.png\",\"1703678625_8d9d30044ed62190cbf8.png\"]', '100', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Arch-fir-d\'lux-key-journey-Unisex-Shoes-', NULL, NULL, NULL, '2023-12-27 17:33:45', '2023-12-27 17:33:45'),
(80, 'partywear.ltd', '2', 32, 59, NULL, NULL, 19, '[\"3\"]', 8, 'Amble Formal Partywear Shoes for men', 1600, 1399, NULL, 'Amble Shoes made of premium quality material, these shoes are extremely durable, light weight and comfortable for all age groups. This pair of shoes are perfect for all occasions and is a must-have in your shoe collection. Add this to your footwear collec', 'Amble Shoes made of premium quality material, these shoes are extremely durable, light weight and comfortable for all age groups. This pair of shoes are perfect for all occasions and is a must-have in your shoe collection. Add this to your footwear collection and get ready to look your best. Pair it up with your casual attires and flaunt your exclusive stylish side. Use shoe bags to prevent from stains and mildew. Pair it with jeans and t-shirt to look decent and cool.\r\nSpecial design provides all-round comfort for the feet.\r\nVery stylish and comfortable shoes.\r\nEnsuring durability and slip resistance.\r\nLightweight.', '[\"1703680018_3912177d4852bacd56f8.png\",\"1703680018_9573f2e56467c5ecbea9.png\",\"1703680018_57613cf93189a952dbb0.png\",\"1703680018_0fe2501a0305bbe7e83b.png\"]', '18', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Amble-Formal-Partywear-Shoes-for-men', NULL, NULL, NULL, '2023-12-27 17:56:58', '2023-12-27 17:56:58'),
(81, 'Laptop.ltd', '2', 33, 62, NULL, NULL, 21, '[\"5\"]', 8, 'MSI Titan GT77 Intel Core i9 13th Gen 13980HX ', 548990, 428990, NULL, 'MSI Titan GT77 is a Windows 11 laptop with a 17.30-inch display that has a resolution of 3840x2160 pixels. It is powered by a Core i9 processor. Graphics are powered by Nvidia GeForce RTX 3080 Ti.', 'MSI Titan GT77 is a Windows 11 laptop with a 17.30-inch display that has a resolution of 3840x2160 pixels. It is powered by a Core i9 processor. Graphics are powered by Nvidia GeForce RTX 3080 Ti.', '[\"1703740218_0488e0c9f17b675c9764.png\",\"1703740218_b3ed3a39cc8b0bd2cf9b.png\",\"1703740218_f6bb9c238187be4ff4dd.png\",\"1703740218_e662122f78be67a9a467.webp\"]', '15', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'MSI-Titan-GT77-Intel-Core-i9-13th-Gen-13980HX-', NULL, NULL, NULL, '2023-12-28 10:40:18', '2023-12-28 10:40:18'),
(82, 'Laptop.ltd', '2', 33, 63, NULL, NULL, 22, '[\"4\"]', 8, 'Dell Latitude E5470 14 Inches Laptop (Intel Core I5 6Th Gen/8Gb/256 Gb Sdd/Windows 10/Ms O', 30000, 26890, NULL, 'This Amazon Renewed product has been professionally inspected and tested by an Amazon qualified supplier. Box and accessories may be generic\r\nThe Latitude 14 5000 Series offers a fully-featured, premium mobile experience to meet the needs of any business-', 'This Amazon Renewed product has been professionally inspected and tested by an Amazon qualified supplier. Box and accessories may be generic\r\nThe Latitude 14 5000 Series offers a fully-featured, premium mobile experience to meet the needs of any business-class professional.\r\nIntel Core i5 (6th Gen) 6200u / 2.30 GHz with 8GB RAM and 256 GB SSD harddisk to provide you excellent performance. Preloaded with Windows 10 and MS Office 19 with lifetime license\r\nHigh quality wifi, bluetotth,webcam support and various connection options Memory Stick, Memory Stick PRO, SD Memory Card, SDHC Memory Card; Headphone/microphone combo jack Dock VGA HDMI 2 x USB 3.0 USB 2.0 LAN\r\nHard Disk Interface: Ata; Display Resolution Maximum: 1366x768; Resolution: 1366 X 768; Wireless Communication Technology: Wi-Fi', '[\"1703740786_c71c685098c9f66648c6.webp\",\"1703740786_7b54975f4ec0727c349b.webp\",\"1703740786_98fe8fd106edbad53e69.webp\",\"1703740786_c617e9414e7459ed0b1f.png\"]', '14', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Dell-Latitude-E5470-14-Inches-Laptop-(Intel-Core-I5-6Th-Gen/8Gb/256-Gb-Sdd/Windows-10/Ms-O', NULL, NULL, NULL, '2023-12-28 10:49:46', '2023-12-28 10:49:46'),
(83, 'acer.ltd', '2', 33, 63, NULL, NULL, 20, '[\"4\"]', 8, 'Acer Aspire 3 Thin and Light Laptop Intel Core i5 12th Generation', 65999, 44990, NULL, 'Powerful Productivity: 12th Generation Intel Core i5-1235U processor delivers unmatched speed and intelligence, from streaming to browsing to photo and video editing and more â€” experience the performance boost you need for your biggest breakthroughs. (1', 'Powerful Productivity: 12th Generation Intel Core i5-1235U processor delivers unmatched speed and intelligence, from streaming to browsing to photo and video editing and more â€” experience the performance boost you need for your biggest breakthroughs. (10 cores, 3.30 GHz speed, 12MB Intel Smart Cache);Internal Specifications: 8GB DDR4 memory; 512GB NVMe SSD to store your files and media\r\nPositively Productive : Be positively productive with Windows 11, featuring new animations, buttons, and toggles. Quickly organize open apps with Snap Layouts and enjoy seamless integration with Outlook and Calendar. Perfect for work, study, and play\r\nThe Display : The 1080p Full HD display is perfect for casual web browsing and watching movies or streaming, allowing for a sharp, detailed view of whatâ€™s in front of you. And with Acer BlueLightShield, lower the levels of blue light to lessen the negative effects of blue light exposure. 15.6\" FHD 1920 x 1080, high-brightness Acer ComfyViewTM LED-backlit TFT LCD\r\nElevated Design, Acer TNR Solution, Narrow Bezel, 1.78 Kg; Stay Connected : Stay connected to friends and family with a 720p HD webcam. Featuring Acer TNR (Temporal Noise Reduction) Solution for better video calling in low-light conditions and dual speakers with full, high-quality sound.\r\nSoftware Included: Microsoft Office 365; Form Factor: Netbook; Resolution: 1080p1280 X 720', '[\"1703741640_53fd7ceafa505bcec2a2.png\",\"1703741640_394522726f4e438ad812.png\",\"1703741640_499d8c7b8913f00f8391.png\",\"1703741640_67a5e4133ec4292048a7.png\"]', '20', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Acer-Aspire-3-Thin-and-Light-Laptop-Intel-Core-i5-12th-Generation', NULL, NULL, NULL, '2023-12-28 11:04:00', '2023-12-28 11:04:00'),
(84, 'samsung .ltd', '1', 34, 64, NULL, NULL, NULL, NULL, 8, 'Galaxy M53 5G Emerald Blue ( 6gb + 128gb )', 32000, 30990, NULL, '* Estimated against the usage profile of an average/typical user. Independently assessed by Strategy Analytics between 2021.12.08â€“12.20 in USA and UK with pre-release versions of SM-S901, SM-S906, SM-S908 under default setting using 5G Sub6 networks (NO', '* Estimated against the usage profile of an average/typical user. Independently assessed by Strategy Analytics between 2021.12.08â€“12.20 in USA and UK with pre-release versions of SM-S901, SM-S906, SM-S908 under default setting using 5G Sub6 networks (NOT tested under 5G mmWave network). Actual battery life varies by network environment, features and apps used, frequency of calls and messages, number of times charged, and many other factors.\r\nImages shown here are for representational purpose only, actual may vary. All features, specifications and prices are subject to change without prior notice. Model availability may vary from location to location.\r\nUser Available Memory : User memory is less than the total memory due to storage of the operating system and software used to operate the device features. Actual user memory will vary depending on the operator and may change after software upgrades are performed\r\n\r\nNetwork : The bandwidths supported by the device may vary depending on the region or service provider\r\nAll specifications and descriptions provided herein may be different from the actual specifications and descriptions for the product. Samsung reserves the right to make changes to this web page and the product described herein, at anytime, without obligation on Samsung to provide notification of such change. All functionality, features, specifications, GUI and other product information provided in this web page including, but not limited to, the benefits, design, pricing, components, performance, availability, and capabilities of the product are subject to change without notice or obligation. The contents within the screen are simulated images and are for demonstration purposes only.\r\nCreative visualization. Images shown here are for representational purpose only, actual may vary.\r\n* S Pen Pro and S Pen Fold Edition sold separately. Only use the Samsung S Pen Pro or the S Pen Fold Edition designed exclusively for Galaxy Z Fold3 5G. All other S Pens or stylus pens not designed for Galaxy Z Fold3 5G (including those by other manufacturers) may damage the screen.\r\n* Galaxy Z Fold3 5G and Z Filp3 5G is rated as IPX8. IPX8 is based on test conditions for submersion in up to 1.5 meters of freshwater for up to 30 minutes. Not advised for beach or pool use. Not dust resistant.\r\nImages shown here are for representational purpose only, actual may vary. All features, specifications and prices are subject to change without prior notice. Model availability may vary from location to location.\r\n*Measured diagonally, the screen size is 16.95cm (6.7\") in the full rectangle and 16.64cm (6.6\") with accounting for the rounded corners.\r\n5000 mAh (typical)*\r\n*Typical value tested under third-party laboratory condition. Typical value is the estimated average value considering the deviation in battery capacity among the battery samples tested under IEC 61960 standard. Rated (minimum) capacity is 4,860 mAh. Actual battery life may vary depending on network environment, usage patterns and other factors.', '[\"1703742660_d2037ff69dadcf7b0357.png\",\"1703742660_0efae7bb8b0e6b9dc64f.png\",\"1703742660_a29b7451098fb9ce587a.png\",\"1703742660_93cfb8d0e096e8523725.png\"]', '5', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 1, 3, 'Galaxy-M53-5G-Emerald-Blue-(-6gb-+-128gb-)', NULL, NULL, NULL, '2023-12-28 11:21:00', '2023-12-28 11:21:00'),
(85, 'apple.co', '2', 34, 65, NULL, NULL, 23, '[\"4\"]', 8, 'Apple iPhone 15 (Yellow)', 110000, 87900, NULL, 'Dynamic Island Comes To iphone 15\r\nDynamic Island bubbles up alerts and Live Activities â€” so you donâ€™t miss them while youâ€™re doing something else. You can see whoâ€™s calling, track your next ride, check your flight status and so much more.\r\nInnova', 'Dynamic Island Comes To iphone 15\r\nDynamic Island bubbles up alerts and Live Activities â€” so you donâ€™t miss them while youâ€™re doing something else. You can see whoâ€™s calling, track your next ride, check your flight status and so much more.\r\nInnovative Design\r\niphone 15 features a durable colour-infused glass and aluminium design. Itâ€™s splash, water and dust resistant. The Ceramic Shield front is tougher than any smartphone glass. And the 15.54 cm (6.1 in) Super Retina XDR display is up to 2x brighter in the sun compared to iPhone 14.\r\n48mp Main Camera With 2x Telephoto\r\nThe 48MP Main camera shoots in super-high resolution. So itâ€™s easier than ever to take standout photos with amazing detail. The 2x optical-quality Telephoto lets you frame the perfect close-up.\r\nNext-Generation Portraits\r\nCapture portraits with dramatically more detail and colour. Just tap to shift the focus between subjects even after you take the shot.\r\nPowerhouse A16 Bionic Chip\r\nThe superfast chip powers advanced features like computational photography, fluid Dynamic Island transitions and Voice Isolation for phone calls. And A16 Bionic is incredibly efficient to help deliver great all-day battery life.\r\nUSB-C Connectivity\r\nThe USB-C connector lets you charge your Mac or iPad with the same cable you use to charge iphone 15. You can even use iphone 15 to charge Apple Watch or AirPods.\r\nVital Safety Features\r\nWith Crash Detection, iPhone can detect a severe car crash and call for help if you canâ€™t.\r\nDesigned To Make A Difference\r\niPhone comes with privacy protections that help keep you in control of your data. Itâ€™s made from more recycled materials to minimise environmental impact. And it has built-in features that make iPhone more accessible to all.\r\nComes With Applecare Warranty\r\nEvery iPhone comes with a one-year limited warranty and up to 90 days of complimentary technical support.', '[\"1703743372_377d0278d0d717935ce3.png\",\"1703743372_c26092f3ccaa38efb74b.png\",\"1703743372_57535dffd8346ae63b38.webp\",\"1703743372_24d880f9bf7c129b2827.webp\"]', '20', NULL, '1', 1, NULL, NULL, NULL, NULL, 0, 0, 'Apple-iPhone-15-(Yellow)', NULL, NULL, NULL, '2023-12-28 11:32:52', '2023-12-28 11:32:52'),
(86, 'samsung .ltd', '1', 34, 65, NULL, NULL, 8, '[\"4\"]', 8, 'SAMSUNG Galaxy S23 Ultra 5G (12GB RAM, 512GB, Green)', 161999, 134999, NULL, 'Impressive Display\r\nWhether you\'re creating content, editing photos, or enjoying your favourite shows while on the move, the Samsung Galaxy S23 Ultra 5G smartphone boasts a 6.8-inch Edge Quad HD+ display that provides an immersive experience. Additionally', 'Impressive Display\r\nWhether you\'re creating content, editing photos, or enjoying your favourite shows while on the move, the Samsung Galaxy S23 Ultra 5G smartphone boasts a 6.8-inch Edge Quad HD+ display that provides an immersive experience. Additionally, its 120Hz refresh rate elevates the fluidity of the user interface, ensuring that every interaction with your smartphone feels smooth and responsive.\r\nSnappy Multitasking Experience\r\nYou can enjoy a smooth user experience and simultaneously toggle between multiple apps, thanks to this smartphone\'s Qualcomm Snapdragon 8 Gen 2 octa-core processor and ample 12GB RAM.\r\nPrecision Photography\r\nBuilt with a quad camera system, which encompasses a 12MP front camera, a 200MP wide rear camera, a 10MP telephoto rear camera, a 12MP ultra-wide rear camera, and a 10MP rear camera, this smartphone enables you to capture high-resolution photos with rich details. From delightful selfies with friends to capturing joyous family occasions, this phone empowers you to freeze every treasured moment in your life.\r\nLow-Light Photography\r\nWith the Samsung Galaxy\'s state-of-the-art camera sensor and fast processor, you can capture sharp photos and videos in challenging low-light conditions, effectively reducing noise. Additionally, the camera lens is optimised to minimise flare, ensuring that your shots remain clear and vibrant, whether it\'s daytime or nighttime.\r\nGenerous Storage Space\r\nThis 5G smartphone offers a generous internal storage capacity of 512GB, providing ample space for organising your apps, photos, videos, and essential documents.\r\nUninterrupted Power\r\nThe high-capacity 5000mAh lithium-ion battery of this device allows you to enjoy hours of entertainment, productivity, and communication on a single charge.\r\nEco-Friendly Design\r\nThis 6.8-inch smartphone is thoughtfully designed with sustainability in mind. Recycled glass and PET film are incorporated into its exterior, while the packaging is crafted from recycled paper, making this phone an eco-friendly choice.', '[\"1703743895_7aeaf1504d1f26097db4.webp\",\"1703743895_af48b90cec083b8b5706.webp\",\"1703743895_2710ae5686246dc090ee.webp\"]', '12', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 3, 'SAMSUNG-Galaxy-S23-Ultra-5G-(12GB-RAM,-512GB,-Green)', NULL, NULL, NULL, '2023-12-28 11:41:36', '2023-12-28 11:41:36'),
(87, 'apple.co', '1', 34, 64, NULL, NULL, 23, '[\"4\"]', 8, 'Apple iPhone SE 3rd Gen (128GB, Red)', 55000, 54490, NULL, 'Immersive Display Experience\r\nStep into a world of captivating visuals with the Apple iPhone SE 3rd Gen\'s 4.7-inch 1334x750 Retina IPS LCD. This display, enhanced with Dolby Vision and HDR10 support, delivers vibrant and eye-catching visuals that bring yo', 'Immersive Display Experience\r\nStep into a world of captivating visuals with the Apple iPhone SE 3rd Gen\'s 4.7-inch 1334x750 Retina IPS LCD. This display, enhanced with Dolby Vision and HDR10 support, delivers vibrant and eye-catching visuals that bring your content to life.\r\nEffortless Performance\r\nFuelled by the speedy Apple A15 Bionic chip, this smartphone offers seamless multitasking capabilities, effortlessly handling resource-intensive tasks without lag. So, you can juggle between a myriad of apps, right from gaming to streaming without any issues.\r\nClick High-Quality Snaps\r\nEquipped with a single-camera system comprising a 7MP front camera and a 12MP wide rear camera, this Apple device ensures crystal-clear photos. You can also fine-tune your visual style preferences, choosing between Warm and Cool tones and achieving consistent results with Photographic Styles.\r\n4k Video Recording\r\nElevate your home videos to professional quality with this iPhone\'s 4K recording capabilities. Whether you\'re recording your best friendâ€™s wedding or documenting your outdoor adventures, your memories are captured in stunning detail.\r\nAmple Storage Space\r\nWith a spacious 128GB storage capacity, the iPhone SE 3rd Gen offers plenty of room to store your media and important files. So, you can save all the precious photos and videos you capture and download your favourite apps on this phone.\r\nWireless Charging Convenience\r\nThanks to its Qi wireless charging technology, this iPhone simplifies the charging process, eliminating the need for cumbersome cables.\r\nSwift and Secure Unlocking\r\nTouch ID provides a swift, user-friendly, and secure method for unlocking your device and accessing apps with a simple fingerprint touch.\r\nResilient Design\r\nBoasting an IP67 rating, this phone stands up to dust and water, ensuring its functionality even when subjected to accidental spills or light rain.\r\nLightweight Durability\r\nConstructed from robust aluminium, this 4.7-inch iPhone combines a lightweight and premium design with long-lasting durability. Therefore, this phone can withstand the occasional bumps and knocks, making it an ideal companion wherever you go.', '[\"1703744148_24ab37a43ac0d9e4186b.webp\",\"1703744148_7b696ddfeef02bab96a2.webp\"]', '15', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 3, 'Apple-iPhone-SE-3rd-Gen-(128GB,-Red)', NULL, NULL, NULL, '2023-12-28 11:45:48', '2023-12-28 11:45:48'),
(88, 'nintendo', '1', 37, 74, NULL, NULL, 24, '[\"2\"]', 8, 'Nintendo Switch OLED Model Red and Neon Blue', 27999, 22499, NULL, 'Introducing the newest member of the Nintendo Switch family\r\nPlay at home on the TV or on the go with a vibrant 7-inch OLED screen with the Nintendo Switch â€“ OLED Model system. In addition to a new screen with vivid colors and sharp contrast, the Ninten', 'Introducing the newest member of the Nintendo Switch family\r\nPlay at home on the TV or on the go with a vibrant 7-inch OLED screen with the Nintendo Switch â€“ OLED Model system. In addition to a new screen with vivid colors and sharp contrast, the Nintendo Switch â€“ OLED Model includes a wide adjustable stand for more comfortable viewing angles, a dock with a wired LAN port for TV mode (LAN cable sold separately), 64GB of internal storage, and enhanced audio in Handheld and Tabletop modes using the systemâ€™s speakers.\r\nFEATURES:\r\n\r\n- 7-inch OLED screen - Enjoy vivid colors and crisp contrast with a screen that makes colors pop.\r\n- Wired LAN port - Use the dockâ€™s LAN port when playing in TV mode for a wired internet connection.\r\n- 64 GB internal storage - Save games to your system with 64 GB of internal storage.\r\n- Enhanced audio â€“ Enjoy enhanced sound from the systemâ€™s onboard speakers when playing in Handheld and Tabletop modes.\r\n- Wide adjustable stand â€“ Freely angle the systemâ€™s wide, adjustable stand for comfortable viewing in Tabletop mode.\r\n- Nintendo Switch â€“ OLED Model supports all Joy-Con controllers and Nintendo Switch software\r\n*There may be software where the game experience may differ due to the new capabilities of the system, such as the larger screen size.\r\nIncluded Contents:\r\n- Nintendo Switch OLED model console.\r\n- Nintendo Switch dock with LAN port.\r\n- One Joy-Con (L) controller and one Joy-Con (R) controller.\r\n- Two Joy-Con wrist strap accessories.\r\n- Joy-Con grip accessory.\r\n- Nintendo Switch AC adapter.\r\n- HDMI cable.', '[\"1703744435_de26a701fa0f2371a2d7.webp\",\"1703744435_d9324d8c12e5a4eb3743.png\",\"1703744435_44c91baa7cc537bd9d66.webp\",\"1703744435_6461e62e06b7c562c884.webp\"]', '5', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 2, 'Nintendo-Switch-OLED-Model-Red-and-Neon-Blue', NULL, NULL, NULL, '2023-12-28 11:50:35', '2023-12-28 11:50:35'),
(89, 'steamdec', '1', 37, 75, NULL, NULL, 25, NULL, 8, 'Steam Deck Wi-Fi 256GB Console, Black', 69990, 57990, NULL, 'Partnered with AMD to create Steam Deckâ€™s custom APU, optimized for handheld gaming. It is a Zen 2 + RDNA 2 powerhouse, delivering more than enough performance to run the latest AAA games in a very efficient power envelope.\r\nOnce youâ€™ve logged into St', 'Partnered with AMD to create Steam Deckâ€™s custom APU, optimized for handheld gaming. It is a Zen 2 + RDNA 2 powerhouse, delivering more than enough performance to run the latest AAA games in a very efficient power envelope.\r\nOnce youâ€™ve logged into Steam Deck, your entire Steam Library shows up, just like any other PC. Youâ€™ll also see the compatibility rating of each game, indicating the kind of experience you can expect when playing. You can dynamically filter any view in your library by compatibility rating if youâ€™re looking for specific sorts of experiences.\r\nThe Steam Deck was built for extended play sessionsâ€”whether youâ€™re using thumbsticks or trackpadsâ€”with full-size controls positioned perfectly within your reach. The rear of the device is sculpted to comfortably fit a wide range of hand sizes.', '[\"1703744694_7cb124a28c4d4cd8a7ae.png\",\"1703744694_35161b04f469ffa5bfcb.png\",\"1703744694_ffb756767daf8230286a.png\",\"1703744694_2d092e36943b938d982e.webp\"]', '5', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 1, NULL, 'Steam-Deck-Wi-Fi-256GB-Console,-Black', NULL, NULL, NULL, '2023-12-28 11:54:54', '2023-12-28 11:54:54'),
(90, 'Controller', '1', 35, 76, NULL, NULL, 26, '[\"2\"]', 8, 'Cosmic Byte C3070W Nebula 2.4G Wireless Gamepad for PC, Rubberized Texture (Camo Red) ', 2699, 1765, NULL, 'Lithium Polymer 600mAh battery for playing up to 12 hours in a row\r\nWireless 2.4GHz technology with a range of up to 8 meters\r\nNot all android phones are supported by controller. Android compatibility is not covered in warranty.\r\nUltra-precise eight-way D', 'Lithium Polymer 600mAh battery for playing up to 12 hours in a row\r\nWireless 2.4GHz technology with a range of up to 8 meters\r\nNot all android phones are supported by controller. Android compatibility is not covered in warranty.\r\nUltra-precise eight-way D Cross, 1 year warranty Customer Care: 1800 100 7225\r\nDongle should be directly in sight of controller\r\nTurbo Mode\r\nTake your gaming to the next level with the Nebulaâ€™s Turbo mode. The Turbo mode allows continuous rapid firing without having to hold the button. Generally, a turbo button will switch a button on and off really quickly.\r\nIntegrated Dual Mode\r\nExperience console-level performance with the Integrated Dual Mode: X-input and Direct-input which gives you a greater games compatibility. The Integrated Dual Mode will give you a realistic gaming experience.', '[\"1703745508_762191ed72c742997afd.png\",\"1703745508_df5e603f68ea7fb2d7c9.png\",\"1703745508_69c3f13563f97d1548be.png\",\"1703745508_f3759e3e39caeae28d2d.png\"]', '5', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'Cosmic-Byte-C3070W-Nebula-2.4G-Wireless-Gamepad-for-PC,-Rubberized-Texture-(Camo-Red)-', NULL, NULL, NULL, '2023-12-28 12:08:28', '2023-12-28 12:08:28'),
(91, 'realme', '1', 35, 67, NULL, NULL, 28, '[\"4\"]', 9, 'Realme TechLife Buds T100 (24 h Playback)', 2499, 1699, NULL, 'AI Environment Noise Cancellation for calls\r\nUpto 28 hrs of Total Playback | Fast charging - 10 min charge gives upto 120 min playback\r\n10mm Dynamic Bass Driver for Real HD Sound\r\nInstant Connection with Google Fast Pair | Intelligent Touch Controls\r\nreal', 'AI Environment Noise Cancellation for calls\r\nUpto 28 hrs of Total Playback | Fast charging - 10 min charge gives upto 120 min playback\r\n10mm Dynamic Bass Driver for Real HD Sound\r\nInstant Connection with Google Fast Pair | Intelligent Touch Controls\r\nrealme Link App connectivity\r\n10mm Dynamic Bass\r\nIndulge into rich sound tones, clear vocals and enhanced bass with realme TechLife Buds T100 as they come with a 10mm dynamic bass driver.\r\nAI ENC for Calls\r\nThe realme TechLife Buds T100 features AI ENC technology to eliminate background noise, so you can listen to music without being distracted by the surroundings.\r\n28 Hours Total Playback\r\nWhether you\'re watching your favourite shows, blazing through your playlist, or enjoying the outdoors, realme TechLife Buds T100 keeps you connected and comfortable all day long.\r\n88ms Super Low Latency\r\nWith the realme TechLife Buds T100 precise audio and visual synchronization, you can play games in a fun way and switch on the gaming mode that allows you to play games with super low latency.\r\nReal HD Sound\r\nThe realme TechLife Buds T100 provides \"Studio-Level\" sound. Experience Real HD sound on the realme Link App.\r\nrealme Link App\r\nWith realme Link, you\'ll be able to customize EQ settings, assign customized touch commands, and perform more tailored functions.\r\nGoogle Fast Pair\r\nWhen you connect your buds to your phone for the first time, Google Fast Pair automatically pairs them. Once paired open the case and your buds are ready to use.', '[\"1703745951_684a589affec4641d363.webp\",\"1703745951_6f5e44b0c815138bfec6.webp\",\"1703745951_ad28763846ba3a1cc03d.webp\"]', '3', NULL, '1', 1, NULL, NULL, NULL, NULL, 1, 1, 'Realme-TechLife-Buds-T100-(24-h-Playback)', NULL, NULL, NULL, '2023-12-28 12:15:51', '2023-12-28 12:15:51');
INSERT INTO `products` (`ProductID`, `ProductSKU`, `ProductType`, `CategoryID`, `SubCategoryID`, `VariationTypeID`, `VariationID`, `BrandID`, `TagID`, `ShippingID`, `ProductName`, `ProductPrice`, `Sale_ProductPrice`, `ProductCartDesc`, `ProductShortDesc`, `ProductLongDesc`, `ProductImage`, `ProductStock`, `ProductLowStock`, `Stock_Status`, `ProductLive`, `product_weight`, `product_dimensions`, `product_quantity`, `price_product`, `is_taxable`, `tax_class_id`, `slug`, `batch`, `package`, `exprice_date`, `Created_at`, `Updated_at`) VALUES
(92, 'spigen Cases', '2', 35, 66, NULL, NULL, 29, NULL, 8, 'Spigen Crystal Pack Back Cover Case with 2pc Tempered Glass Screen Guard (TPU, Glass | Crystal Clear', 3699, 1399, NULL, '[Components] Liquid Crystal Case + 2 Tempered Glass Screen Guards\r\n[Full Protection] 9H hardness glass to protect Galaxy from everyday scratches\r\n[Light Design] Durable anti-slip TPU keeps your phone lightweight and easy to install\r\n[Precise Fit] All conn', '[Components] Liquid Crystal Case + 2 Tempered Glass Screen Guards\r\n[Full Protection] 9H hardness glass to protect Galaxy from everyday scratches\r\n[Light Design] Durable anti-slip TPU keeps your phone lightweight and easy to install\r\n[Precise Fit] All connections and buttons are easy to reach and use\r\nThe name, Spigen, derives from the two German words, \"spiegel\" and \"gen\", meaning mirror and gene. Both were combined to reflect the ideology behind our values in creating solutions reflecting the needs of our valued customers.\r\nSince its launch in 2008, Spigen has earned recognition from producers in the industry, and is now one of the leading global providers for premier mobile accessories. With a solidified reputation and longstanding commitment to customers, Spigen continues to grow.', '[\"1703746920_0eb078996cd03d8367a8.png\",\"1703746920_990349da21cf4caf2f49.jpg\",\"1703746920_17382322ecb1d7eb4e0e.jpg\"]', '25', NULL, '1', 1, '20gm', '10*19', NULL, NULL, 0, NULL, 'Spigen-Crystal-Pack-Back-Cover-Case-with-2pc-Tempered-Glass-Screen-Guard-(TPU,-Glass-|-Crystal-Clear', NULL, NULL, NULL, '2023-12-28 12:32:00', '2023-12-28 12:32:00'),
(93, 'apple.co', '1', 34, 65, NULL, NULL, NULL, NULL, 9, 'Apple iPhone 16 (128GB, blue)', 77000, 76000, NULL, 'Immersive Display Experience Step into a world of captivating visuals with the Apple iPhone 16  6.1-inch 1334x750 Retina IPS LED. This display, enhanced with Dolby Vision and HDR10 support, delivers vibrant and eye-catching visuals that bring yo', 'Immersive Display Experience Step into a world of captivating visuals with the Apple iPhone 16  6.1-inch 1334x750 Retina IPS LED. This display, enhanced with Dolby Vision and HDR10 support, delivers vibrant and eye-catching visuals that bring your content to life. Effortless Performance Fuelled by the speedy Apple A18 Bionic chip, this smartphone offers seamless multitasking capabilities, effortlessly handling resource-intensive tasks without lag. So, you can juggle between a myriad of apps, right from gaming to streaming without any issues. Click High-Quality Snaps Equipped with a single-camera system comprising a 7MP front camera and a 12MP wide rear camera, this Apple device ensures crystal-clear photos. You can also fine-tune your visual style preferences, choosing between Warm and Cool tones and achieving consistent results with Photographic Styles. 4k Video Recording Elevate your home videos to professional quality with this iPhone\'s 4K recording capabilities. Whether you\'re recording your best friendâ€™s wedding or documenting your outdoor adventures, your memories are captured in stunning detail. Ample Storage Space With a spacious 128GB storage capacity, the iPhone SE 3rd Gen offers plenty of room to store your media and important files. So, you can save all the precious photos and videos you capture and download your favourite apps on this phone. Wireless Charging Convenience Thanks to its Qi wireless charging technology, this iPhone simplifies the charging process, eliminating the need for cumbersome cables. Swift and Secure Unlocking Touch ID provides a swift, user-friendly, and secure method for unlocking your device and accessing apps with a simple fingerprint touch. Resilient Design Boasting an IP67 rating, this phone stands up to dust and water, ensuring its functionality even when subjected to accidental spills or light rain. Lightweight Durability Constructed from robust aluminium, this  iPhone combines a lightweight and premium design with long-lasting durability. Therefore, this phone can withstand the occasional bumps and knocks, making it an ideal companion wherever you go.', '[\"1726033117_fbf2f8e0a3c3903bf94c.jpg\"]', '5', NULL, '1', 1, 'NA', 'NA', NULL, NULL, 0, NULL, 'Apple-iPhone-16-(128GB,-blue)', NULL, NULL, NULL, '2024-09-11 11:08:37', '2024-09-11 11:08:37'),
(94, '66FF', '1', 32, 60, NULL, NULL, 9, NULL, 9, 'Sandal', 5000, 3599, NULL, 'abc abc abc', 'NA', '[\"1731049006_27fb8047ee054c3e88f6.webp\"]', '16', NULL, '1', 1, '525', '49*120', NULL, NULL, 1, NULL, 'Sandal', NULL, NULL, NULL, '2024-11-08 12:26:46', '2024-11-08 12:26:46'),
(95, 'iphone', '2', 34, 64, NULL, NULL, 23, NULL, 9, 'Iphone 16', 92000, 85000, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', NULL, '[\"1732694817_9622475a601773153444.jpg\"]', '12', NULL, '1', 1, '218', '50*83', NULL, NULL, 0, NULL, 'Iphone-16', NULL, NULL, NULL, '2024-11-27 13:36:57', '2024-11-27 13:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `ProductID`, `UserID`, `rating`, `name`, `email`, `description`, `created_date`) VALUES
(32, 61, 84, 4, 'prit', 'pritfeblead@gmail.com', 'excellent', '2024-09-11 05:00:43'),
(35, 59, 85, 5, 'saurav', 'saurav.fablead@gmail.com', 'vvg', '2024-11-23 04:40:55'),
(37, 64, 83, 5, 'Sneh', 'fablead.sneh@gmail.com', 'Best Product', '2025-07-04 07:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `RoleSlug` varchar(100) NOT NULL,
  `RoleDesc` varchar(255) DEFAULT NULL,
  `RoleLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `SEOID` int(11) NOT NULL,
  `SEOTitle` varchar(255) NOT NULL,
  `SEODescription` text NOT NULL,
  `SEOKeywords` varchar(255) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`SEOID`, `SEOTitle`, `SEODescription`, `SEOKeywords`, `Created_at`, `Updated_at`) VALUES
(1, 'pendrive', 'this is pendrive description area. zoom', 'pen drive 32gb 64 gb zoomm111', '0000-00-00 00:00:00', '2023-06-16 17:18:55'),
(2, 'mouse', 'thsi is mouse description', 'optical laser high speed sensor', '0000-00-00 00:00:00', '2023-06-16 18:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `SettingID` int(11) NOT NULL,
  `SettingKey` int(11) NOT NULL,
  `SettingValue` int(11) NOT NULL,
  `FaqLive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_data`
--

CREATE TABLE `shipping_data` (
  `id` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `shipping_rate` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shipping_data`
--

INSERT INTO `shipping_data` (`id`, `shipping_name`, `amount`, `shipping_rate`, `created_at`, `updated_at`) VALUES
(1, 'demo', '1000', '20', '2024-09-30 13:14:38', '2024-10-22 06:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `MethodID` int(11) NOT NULL,
  `MethodName` varchar(255) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`MethodID`, `MethodName`, `Created_at`, `Updated_at`) VALUES
(8, 'Fast shipping', '2023-10-19 10:56:14', '2023-10-19 10:56:14'),
(9, 'Standard shipping', '2023-10-19 10:56:43', '2023-10-19 10:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rates`
--

CREATE TABLE `shipping_rates` (
  `RateID` int(11) NOT NULL,
  `MethodID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_rates`
--

INSERT INTO `shipping_rates` (`RateID`, `MethodID`, `Price`, `Created_at`, `Updated_at`) VALUES
(1, 9, 100, '2023-11-30 10:22:12', '2023-11-30 10:22:12'),
(4, 9, 100, '2023-11-30 11:16:00', '2023-11-30 11:16:00'),
(5, 8, 100, '2023-11-30 11:16:30', '2023-11-30 11:16:30'),
(8, 9, 600, '2023-11-30 12:46:11', '2023-11-30 12:46:11'),
(9, 9, 333, '2023-11-30 12:46:53', '2023-11-30 12:46:53'),
(10, 8, 300, '2023-12-04 16:14:43', '2023-12-04 16:14:43'),
(11, 8, 100, '2024-09-11 13:53:35', '2024-09-11 13:53:35'),
(12, 8, 10, '2024-09-12 18:03:05', '2024-09-12 18:03:05'),
(13, 9, 111, '2024-09-12 18:03:28', '2024-09-12 18:03:28'),
(14, 8, 20000, '2024-11-12 13:29:24', '2024-11-12 13:29:24'),
(15, 9, 500, '2024-11-27 15:16:18', '2024-11-27 15:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_zones`
--

CREATE TABLE `shipping_zones` (
  `ZoneID` int(11) NOT NULL,
  `RateID` int(11) NOT NULL,
  `ZoneName` varchar(255) NOT NULL,
  `is_check` int(11) NOT NULL DEFAULT 0,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_zones`
--

INSERT INTO `shipping_zones` (`ZoneID`, `RateID`, `ZoneName`, `is_check`, `Created_at`, `Updated_at`) VALUES
(1, 1, '[\"395010\",\"395009\"]', 1, '2023-11-30 10:22:12', '2023-11-30 10:22:12'),
(4, 4, '[\"394510\"]', 1, '2023-11-30 11:16:00', '2023-11-30 11:16:00'),
(5, 5, '[\"395008\"]', 1, '2023-11-30 11:16:30', '2023-11-30 11:16:30'),
(8, 8, '[\"395008\"]', 1, '2023-11-30 12:46:11', '2023-11-30 12:46:11'),
(9, 9, '[\"394160\"]', 1, '2023-11-30 12:46:53', '2023-11-30 12:46:53'),
(10, 10, '[\"560050\",\"560051\",\"560052\"]', 1, '2023-12-04 16:14:43', '2023-12-04 16:14:43'),
(11, 11, '[\"395003\"]', 1, '2024-09-11 13:53:35', '2024-09-11 13:53:35'),
(12, 12, '[\"335009\"]', 1, '2024-09-12 18:03:05', '2024-09-12 18:03:05'),
(13, 13, '[\"335009\"]', 1, '2024-09-12 18:03:28', '2024-09-12 18:03:28'),
(14, 14, '[\"442201\"]', 1, '2024-11-12 13:29:24', '2024-11-12 13:29:24'),
(15, 15, '[\"Test Zone\"]', 1, '2024-11-27 15:16:18', '2024-11-27 15:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `StateID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `StateName` varchar(255) NOT NULL,
  `StateLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`StateID`, `CountryID`, `StateName`, `StateLive`, `Created_at`, `Updated_at`) VALUES
(1, 1, 'Gujarat', 1, '2023-06-03 10:19:03', '2023-06-03 13:49:12'),
(2, 2, 'Lumbini', 1, '2023-06-03 10:19:22', '2023-06-03 13:49:32'),
(5, 4, 'Auckland', 1, '0000-00-00 00:00:00', '2023-06-19 10:50:29'),
(6, 10, 'Gauteng', 1, '0000-00-00 00:00:00', '2023-06-19 11:21:41'),
(7, 16, 'perth', 1, '0000-00-00 00:00:00', '2023-06-19 12:22:47'),
(9, 2, 'Pokhara', 1, '0000-00-00 00:00:00', '2023-06-19 12:38:09'),
(11, 17, 'colombod', 1, '0000-00-00 00:00:00', '2023-06-19 12:43:58'),
(12, 18, 'hubston1', 1, '0000-00-00 00:00:00', '2023-06-19 13:46:47'),
(13, 1, 'maharastra', 1, '0000-00-00 00:00:00', '2023-06-19 13:47:38'),
(15, 1, 'rajashthan', 1, '0000-00-00 00:00:00', '2023-06-19 14:49:44'),
(16, 3, 'Chukha', 1, '0000-00-00 00:00:00', '2023-09-29 10:27:01'),
(17, 3, 'Dagana', 1, '0000-00-00 00:00:00', '2023-09-29 10:27:18'),
(18, 10, 'Northern Cape', 1, '0000-00-00 00:00:00', '2023-09-29 10:34:06'),
(19, 5, 'Brighton and Hove', 1, '0000-00-00 00:00:00', '2023-09-29 10:36:23'),
(20, 5, 'Buckinghamshire', 1, '0000-00-00 00:00:00', '2023-09-29 10:36:53'),
(21, 20, 'Kandal', 1, '0000-00-00 00:00:00', '2023-12-04 16:02:12'),
(22, 21, 'Madinah', 1, '0000-00-00 00:00:00', '2024-11-12 13:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key from categories',
  `sub_category` varchar(200) NOT NULL,
  `sub_category_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_category_id`, `category_id`, `sub_category`, `sub_category_img`, `created_at`, `updated_at`) VALUES
(51, 29, 'Casual Watches', '1698991492_b84f552050f6a61014b7.png', '2023-11-03 06:04:52', '2023-11-03 06:04:52'),
(52, 29, 'Smart Watches', '1698991565_32d773c258fc0faf7b6b.png', '2023-11-03 06:06:05', '2023-11-03 06:06:05'),
(53, 29, 'Kids Watches', '1698992547_7c00f310291615bf39a0.webp', '2023-11-03 06:22:27', '2023-11-03 06:22:27'),
(54, 30, 'Soft Toys', '1698993674_af6e6db81ae39f17ee49.webp', '2023-11-03 06:41:14', '2023-11-03 06:41:14'),
(55, 30, 'Rc Toys', '1698993754_7558b9c6620c3c796c54.jpg', '2023-11-03 06:42:34', '2023-11-03 06:42:34'),
(56, 31, 'Clothes for Men', '1698993894_2aa4813d888da4547743.webp', '2023-11-03 06:44:54', '2023-11-03 06:44:54'),
(57, 31, 'Clothes for Women', '1698993979_4ceb82cbcdcb20b983b6.jpg', '2023-11-03 06:46:19', '2023-11-03 06:46:19'),
(58, 31, 'Clothes for Kids', '1698994097_c8f62357b5c45c32888a.webp', '2023-11-03 06:48:17', '2023-11-03 06:48:17'),
(59, 32, 'Formal Shoes', '1698994534_c87053c74069eff33bb2.webp', '2023-11-03 06:55:34', '2023-11-03 06:55:34'),
(60, 32, 'Sneakers', '1698995343_a3e969480996e41bb0df.webp', '2023-11-03 07:09:03', '2023-11-03 07:09:03'),
(61, 32, 'Sports Shoes', '1698995719_373ac6fdb0e7c8f8e11e.jpeg', '2023-11-03 07:15:19', '2023-11-03 07:15:19'),
(62, 33, 'Gaming Laptops', '1698995807_047eabee53794573a785.jpg', '2023-11-03 07:16:47', '2023-11-03 07:16:47'),
(63, 33, 'Regular Laptops', '1698996340_29318baf6d164abdd2bc.jpg', '2023-11-03 07:25:40', '2023-11-03 07:25:40'),
(64, 34, 'Budget Smartphones', '1698996532_fe53c0834c81a4027426.png', '2023-11-03 07:28:52', '2023-11-03 07:28:52'),
(65, 34, 'Flagship Smartphones', '1698996616_59aeb8c8e02508e36ddd.jpg', '2023-11-03 07:30:16', '2023-11-03 07:30:16'),
(66, 35, 'Mobile Case Cover', '1698996714_3da132b54175c4c96abf.jpg', '2023-11-03 07:31:54', '2023-11-03 07:31:54'),
(67, 35, 'Ear Buds', '1698996770_a59127f4b802caabf203.jpg', '2023-11-03 07:32:50', '2023-11-03 07:32:50'),
(68, 36, 'Reebokk', '1701682478_8cfb0c1c16d8e2ae85ff.jpg', '2023-12-04 09:34:38', '2023-12-04 09:34:38'),
(69, 35, 'Pendrive', '1702892533_4d9fcc978fa09a7b77b8.jpg', '2023-12-18 09:42:13', '2023-12-18 09:42:13'),
(70, 23, 'Remote Car', '18.jpg', '2023-12-18 10:09:47', '2023-12-18 10:09:47'),
(71, 23, 'Educational Toys', '18.jpg', '2023-12-18 10:11:27', '2023-12-18 10:11:27'),
(72, 23, 'musical toys', '18.jpg', '2023-12-19 05:25:07', '2023-12-19 05:25:07'),
(73, 36, 'man\'s sandal', '18.jpg', '2023-12-21 05:06:44', '2023-12-21 05:06:44'),
(74, 37, 'Playstations', '1703659186_e7913e2734d9635fa8ed.png', '2023-12-27 06:39:46', '2023-12-27 06:39:46'),
(75, 37, 'Xbox', '1703659599_1ec55eaa7ca38d83016c.png', '2023-12-27 06:46:39', '2023-12-27 06:46:39'),
(76, 23, 'Controllers', '1703745671_538a4b33076c8ac74460.webp', '2023-12-28 06:31:57', '2023-12-28 06:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `tagname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tagname`) VALUES
(1, 'Shirt'),
(2, 'Consoles'),
(3, 'Shoes'),
(4, 'best'),
(5, 'Gaming Laptops'),
(6, 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `TaxID` int(11) NOT NULL,
  `taxe_class_id` int(11) NOT NULL,
  `TaxName` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL DEFAULT '\\*',
  `State` varchar(255) NOT NULL DEFAULT '*',
  `City` varchar(255) NOT NULL DEFAULT '*',
  `Zip` varchar(255) NOT NULL DEFAULT '*',
  `TaxRate` varchar(255) NOT NULL,
  `Shipping` varchar(255) NOT NULL,
  `is_check` int(11) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`TaxID`, `taxe_class_id`, `TaxName`, `Country`, `State`, `City`, `Zip`, `TaxRate`, `Shipping`, `is_check`, `Created_at`) VALUES
(40, 0, 'SGST', '1', '1', '1', '395003', '12', 'Enable', 0, '2023-12-09 13:01:56'),
(43, 0, 'GST', '1', '1', '1', '395001', '18', 'Enable', 0, '2024-09-11 11:22:19'),
(44, 0, 'U-Tax', '*', '*', '*', '*', '10', 'Enable', 0, '2024-09-11 18:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `taxe_class`
--

CREATE TABLE `taxe_class` (
  `taxe_class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taxe_class`
--

INSERT INTO `taxe_class` (`taxe_class_id`, `class_name`, `status`) VALUES
(1, 'Standard', 1),
(2, 'Tax 12', 1),
(3, 'Tax 10', 1),
(4, 'Tax 6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templatcategories`
--

CREATE TABLE `templatcategories` (
  `CategoryID` int(11) NOT NULL,
  `ParentCategoryID` int(11) NOT NULL DEFAULT 0,
  `Name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `templatcategories`
--

INSERT INTO `templatcategories` (`CategoryID`, `ParentCategoryID`, `Name`, `created_at`) VALUES
(1, 0, 'education', '2023-07-07 09:49:49'),
(2, 0, 'music', '2023-07-07 09:50:17'),
(3, 0, 'friendship', '2023-07-07 09:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `templatcategoriesdata`
--

CREATE TABLE `templatcategoriesdata` (
  `id` int(11) NOT NULL,
  `templateID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `templateID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `templateTo` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`templateID`, `ProductID`, `UserID`, `type`, `name`, `height`, `width`, `unit`, `mime_type`, `image`, `data`, `session`, `templateTo`, `created_at`, `updated_at`) VALUES
(1, 32, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:06:33', NULL),
(2, NULL, NULL, 'gallary', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687352192_d097823538276d529128.jpg', '', NULL, '0', '2023-07-07 10:06:58', NULL),
(3, NULL, NULL, 'gallary', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:07:46', NULL),
(4, 32, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687350680_d989a7fb2793e1741214.jpg', '', NULL, '0', '2023-07-07 10:08:02', NULL),
(5, 32, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(6, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/templates/1688799280_97db00a066856ad24225.png', '', NULL, '0', '2023-07-08 06:54:40', NULL),
(7, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1688799830_d257575392d5d7a963f6.png', '', NULL, '0', '2023-07-08 07:03:50', NULL),
(8, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1688800353_fcedb713b755d470b1da.png', '', '64a90a56b366d', '0', '2023-07-08 07:12:33', NULL),
(11, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'jpg', 'admin/public/assets/templates/1688803998_a49bc52710847d1ba676.jpg', '', '64a90a56b366d', '0', '2023-07-08 08:13:18', NULL),
(12, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'jpg', 'admin/public/assets/templates/1688804004_29cc53b831893b3d8d86.jpg', '', '64a90a56b366d', '0', '2023-07-08 08:13:24', NULL),
(13, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1688804009_f6eb49676e2a4f5e4e3a.png', '', '64a90a56b366d', '0', '2023-07-08 08:13:29', NULL),
(14, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689152751_ae43d10a304be07190a9.png', '', NULL, '0', '2023-07-12 09:05:51', NULL),
(15, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689152767_4c57715e516f870d7741.png', '', '64ae6cef493e6', '0', '2023-07-12 09:06:07', NULL),
(16, 32, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(17, 75, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(18, 75, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(19, 75, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(20, 75, NULL, 'template', NULL, NULL, NULL, NULL, NULL, 'admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg', '', NULL, '0', '2023-07-07 10:08:18', NULL),
(21, 75, NULL, 'template', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1688800353_fcedb713b755d470b1da.png', '', '64a90a56b366d', '0', '2023-07-08 07:12:33', NULL),
(22, 75, NULL, 'template', NULL, NULL, NULL, NULL, 'jpg', 'admin/public/assets/templates/1688804004_29cc53b831893b3d8d86.jpg', '', '64a90a56b366d', '0', '2023-07-08 08:13:24', NULL),
(23, 32, NULL, 'template', NULL, NULL, NULL, NULL, 'jpg', 'admin/public/assets/templates/1688803998_a49bc52710847d1ba676.jpg', '', '64a90a56b366d', '0', '2023-07-08 08:13:18', NULL),
(24, 32, NULL, 'template', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689152767_4c57715e516f870d7741.png', '', '64ae6cef493e6', '0', '2023-07-12 09:06:07', NULL),
(25, 75, NULL, 'template', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689152767_4c57715e516f870d7741.png', '', '64ae6cef493e6', '0', '2023-07-12 09:06:07', NULL),
(26, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689856104_2db60ba2d42645f47c83.png', '', NULL, '0', '2023-07-20 12:28:24', NULL),
(27, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689856113_88ec601e21e743788256.png', '', '64b92868244e3', '0', '2023-07-20 12:28:33', NULL),
(28, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689867260_0297cfcdc28d49013080.png', '', NULL, '0', '2023-07-20 15:34:20', NULL),
(29, NULL, NULL, 'upload', NULL, NULL, NULL, NULL, 'png', 'admin/public/assets/templates/1689867265_812408a8813d07f12a10.png', '', '64b953fc7cecf', '0', '2023-07-20 15:34:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `TestimonialID` int(11) NOT NULL,
  `TestimonialContent` text NOT NULL,
  `TestimonialAuthor` varchar(255) NOT NULL,
  `TestimonialCompany` varchar(255) NOT NULL,
  `TestimonialPosition` varchar(255) NOT NULL,
  `TestimonialImage` varchar(255) NOT NULL,
  `TestimonialLive` tinyint(4) NOT NULL DEFAULT 1,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`TestimonialID`, `TestimonialContent`, `TestimonialAuthor`, `TestimonialCompany`, `TestimonialPosition`, `TestimonialImage`, `TestimonialLive`, `Created_at`, `Updated_at`) VALUES
(2, 'This product has completely transformed the way we operate. The customer service has been excellent, and we couldn’t be happier with the results!', 'John Doe', 'ABC Solutions', 'CEO', '1725968397_ce6bdd9af9c3eb88b38e.jpg', 1, '0000-00-00 00:00:00', '2024-09-10 17:09:57'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrMaker including versions of Lorem Ipsum', 'Jane Smith', 'Tech Innovations Inc', 'Project Manager', '1725968500_e08667d51f4314272dcc.png', 1, '0000-00-00 00:00:00', '2024-09-10 17:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserFirstName` varchar(100) NOT NULL,
  `UserLastName` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `UserGander` varchar(10) NOT NULL,
  `UserProfile` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `UserCity` varchar(255) DEFAULT NULL,
  `UserState` varchar(255) DEFAULT NULL,
  `UserZip` varchar(11) NOT NULL,
  `UserEmailVerified` int(11) DEFAULT NULL,
  `UserRegistrationDate` datetime DEFAULT current_timestamp(),
  `UserVerificationCode` varchar(100) DEFAULT NULL,
  `forgot_pass_key` varchar(255) DEFAULT NULL,
  `UserPhone` varchar(20) DEFAULT NULL,
  `UserCountry` varchar(255) DEFAULT NULL,
  `UserAddress` varchar(255) DEFAULT NULL,
  `UserAddress2` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserType`, `UserEmail`, `UserPassword`, `UserFirstName`, `UserLastName`, `DOB`, `UserGander`, `UserProfile`, `UserCity`, `UserState`, `UserZip`, `UserEmailVerified`, `UserRegistrationDate`, `UserVerificationCode`, `forgot_pass_key`, `UserPhone`, `UserCountry`, `UserAddress`, `UserAddress2`, `Created_at`, `Updated_at`) VALUES
(3, 2, 'kajol@gmail.com', '584da0a485f209242059e6de66aac904', 'kajoldddd', 'patel', '0000-00-00', '', 'default.jpg', '1', '1', '234444', 0, '2023-06-24 13:16:22', NULL, NULL, '8778666789', '1', 'hdhhdhfdggggggg', 'dfdfdfsdf', '0000-00-00 00:00:00', '2023-06-06 18:18:09'),
(4, 2, 'mahesh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mahesgqq', 'patil', '0000-00-00', '', 'default.jpg', '3', '2', '5555566', 0, '2023-06-24 13:16:31', NULL, NULL, '788788', '1', 'fddfdf', 'dfdfdfdf', '0000-00-00 00:00:00', '2023-06-06 18:21:15'),
(5, 2, 'akshayajudiya@123.com', 'e10adc3949ba59abbe56e057f20f883e', 'sdcfsdac', 'asefrfwef', '2023-06-06', '', 'default.jpg', '2', '1', 'rwerfwefwef', 0, '2023-06-22 13:16:37', NULL, NULL, '7990875454', '1', '3rew2rwrwr', 'wrfwfwfwf', '0000-00-00 00:00:00', '2023-06-07 10:03:03'),
(6, 1, 'admin@gmail.com', 'cc152b8e6fd3b249fd65e6758702f0a1', 'Admin', 'patel', '0000-00-00', '', '1729917263_3e7e0cdb84f54d84c99b.png', NULL, NULL, '', 0, '2023-06-20 13:16:44', NULL, NULL, '8778666789', NULL, NULL, NULL, '0000-00-00 00:00:00', '2023-06-06 18:18:09'),
(7, 2, 'fexu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'fexu', 'shah', '2000-03-31', '', '1686118990_e163fe6a014a95d7ddd9.jpg', '3', '2', '55555', 0, '2023-06-24 13:10:25', NULL, NULL, '767866', '1', 'dfdd', 'fdfdf', '0000-00-00 00:00:00', '2023-06-07 11:53:10'),
(8, 2, 'lela@gmail.cpm', 'e10adc3949ba59abbe56e057f20f883e', 'lela', 'gaga', '1998-12-03', '', '1686124563_581e5e658e0e0c27dcdc.jpg', '2', '1', '23232', 0, '2023-06-24 13:45:35', NULL, NULL, '0978889', '1', 'fdfdd', 'ddssdfs', '0000-00-00 00:00:00', '2023-06-07 12:00:54'),
(9, 2, 'asit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asit', 'asit', '2021-01-07', '', 'default.jpg', '1', '1', '3333', 0, '2023-06-24 13:45:40', NULL, NULL, '12355', '1', 'dddf', 'fdfdf', '0000-00-00 00:00:00', '2023-06-07 12:30:39'),
(10, 2, 'gau@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'gaurish', 'patel', '0000-00-00', '', '1686125349_1ca8f53a16d345835305.jpg', '1', '0', '44456454', 0, '2023-06-24 13:10:25', NULL, NULL, '77666', '1', 'fgfgf', 'fgfgf', '0000-00-00 00:00:00', '2023-06-07 13:39:09'),
(11, 2, 'piyu@gmail.com', '6074c6aa3488f3c2dddff2a7ca821aab', 'piyush', 'patel', '2014-01-12', '', '1686563279_6625f76c5d1eb5dabc39.jpg', '', '0', '', 0, '2023-06-24 13:10:25', NULL, NULL, '874755', '0', 'ddfd', 'dfdfdf', '0000-00-00 00:00:00', '2023-06-12 15:17:59'),
(12, 2, 'fuki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'fukii', 'shah', '2015-05-06', '', '1686563906_e20b2de01d0bfc23e750.jpg', '', '0', '', 0, '2023-06-24 13:10:25', NULL, NULL, '5544', '0', 'dcxx', 'dfd', '0000-00-00 00:00:00', '2023-06-12 15:28:26'),
(13, 2, 'ww@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'haresh', 'patel', '2023-06-06', '', '1686564259_500994774282d83e3329.jpg', '3', '2', '454334', 0, '2023-06-24 13:10:25', NULL, NULL, '333', '1', '55 surat gujarat', 'rgrrg', '0000-00-00 00:00:00', '2023-06-12 15:34:19'),
(16, 2, 'mayur@gmail.com', '202cb962ac59075b964b07152d234b70', 'mayur', 'kk', '1993-05-12', '', '1686748204_859212910a19d7ad5a23.jpg', '1', '1', '554345', 0, '2023-06-24 13:10:25', NULL, NULL, '1236547908', '1', '77 surat', 'ramchockhsfvgedg', '0000-00-00 00:00:00', '2023-06-14 18:38:33'),
(17, 2, 'ritesh005@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ritesh', 'deora', '1996-10-18', 'male', '1686982864_5a655c977be1870ee2af.jpg', '2', '1', '396456', 0, '2023-06-21 13:46:35', NULL, NULL, '8546453456', '1', 'gdgGa ', 'gfAjfhd gasg', '0000-00-00 00:00:00', '2023-06-17 11:51:04'),
(23, 2, 'trial12345@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'xyzgghtrr', 'abcderffgbdbd', '2023-06-22', 'male', '1687328179_86a17d6d6aa0779d0844.png', '1', '1', '5247204520', 0, '2023-06-24 13:10:25', NULL, NULL, '1234567890', '1', 'vsdfvsssrtgrg', 'sssrtgrtghrttrg', '0000-00-00 00:00:00', '2023-06-21 11:46:19'),
(25, 2, 'trial123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'xyz', 'abc', '2023-06-22', 'male', '1687328534_51e8d58955201e7083aa.png', '1', '1', '5247204520', NULL, '2023-06-19 13:47:26', NULL, NULL, '1234567890', '1', 'vsdfvsss', 'sss', '2023-06-21 11:52:14', '2023-06-21 11:52:14'),
(26, 2, 'trial12345678@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'xyz', '', '2023-06-22', 'male', '1687328563_6442cb6235d556698d51.png', '1', '1', '5247204520', NULL, '2023-06-21 13:47:32', NULL, NULL, '1234567890', '1', 'vsdfvsss', 'sss', '2023-06-21 11:52:43', '2023-06-21 11:52:43'),
(27, 2, 'example123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'fwefwefwef', '', '0000-00-00', 'male', 'default.jpg', NULL, NULL, '27432', NULL, '2023-06-20 13:47:36', NULL, NULL, '1234567890', '1', 'NA', 'NA', '2023-06-21 12:10:19', '2023-06-21 12:10:19'),
(28, 2, 'example12345@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'fwefwefwef', 'wfwefwefwef', '0000-00-00', 'male', 'default.jpg', '', '', '', NULL, '2023-06-23 13:47:40', NULL, NULL, '1234567890', '', '', '', '2023-06-21 12:10:56', '2023-06-21 12:10:56'),
(30, 2, 'arun@gmail.com', 'e55b38d2364ee37c17cb2b061f601e7f', 'arun', 'patel', '2000-03-07', '', '1687840668_6da5a3269c063408fe99.jpg', '', '', '', NULL, '2023-06-27 10:07:48', NULL, NULL, '1234567890', '', '', '', '2023-06-27 10:07:48', '2023-06-27 10:07:48'),
(31, 2, 'ajay@gmail.com', 'a08ee45ef214dc905e59bfcc4c263565', 'ajay', 'patel', '2000-09-01', '', '1688014009_4450363c155068b236c4.jpg', '1', '1', '394107', NULL, '2023-06-29 10:16:49', NULL, NULL, '1236547890', '1', 'hbfthbrthrth', 'rthrhrhty', '2023-06-29 10:16:49', '2023-06-29 10:16:49'),
(32, 2, 'Lampoon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Lam ', 'Poon', '0000-00-00', '', 'default.jpg', '', '', '', NULL, '2023-07-16 22:38:16', NULL, NULL, '647-655-5545', '5', '435 Tim Avenue East,  TIK', '', '2023-07-16 22:38:16', '2023-07-16 22:38:16'),
(33, 2, 'email@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Aruna', 'Fablead', '0000-00-00', 'female', 'default.jpg', '1', '1', '', NULL, '2023-09-15 17:32:10', NULL, NULL, '8457585865', NULL, NULL, NULL, '2023-09-15 17:32:10', '2023-09-15 17:32:10'),
(34, 2, 'gama@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'guru', 'ok', '0000-00-00', 'male', '1695820120_cbf45bf6462bc1550273.png', '1', '1', '', NULL, '2023-09-18 16:06:46', NULL, NULL, '45916951', NULL, 'dfdfddf', NULL, '2023-09-18 16:06:46', '2023-09-18 16:06:46'),
(35, 2, 'gama11@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'arun', 'fablead', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-09-18 16:36:33', NULL, NULL, '8457585865', NULL, NULL, NULL, '2023-09-18 16:36:33', '2023-09-18 16:36:33'),
(36, 2, 'ram@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jay', 'mer', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-09-27 11:09:28', NULL, NULL, '632542441', NULL, NULL, NULL, '2023-09-27 11:09:28', '2023-09-27 11:09:28'),
(38, 2, 'ramamar@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ram', 'Amar', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 13:10:08', NULL, NULL, '1234', NULL, NULL, NULL, '2023-10-04 13:10:08', '2023-10-04 13:10:08'),
(39, 2, 'jacktido@gmail.com', '202cb962ac59075b964b07152d234b70', 'JACK', 'TIDO', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 13:24:06', NULL, NULL, '12345', NULL, NULL, NULL, '2023-10-04 13:24:06', '2023-10-04 13:24:06'),
(40, 2, 'hk@gmail.com', '202cb962ac59075b964b07152d234b70', 'haresh', 'mangukiya', '0000-00-00', 'male', '1696407389_52c0f3d98f498e778e70.bin', '1', '1', '', NULL, '2023-10-04 13:26:32', NULL, NULL, '1234', NULL, 'King4,punagam,surat', NULL, '2023-10-04 13:26:32', '2023-10-04 13:26:32'),
(41, 2, 'heloo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'heloo', 'heloo', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 13:41:24', NULL, NULL, '632542441', NULL, NULL, NULL, '2023-10-04 13:41:24', '2023-10-04 13:41:24'),
(42, 2, 'jigo@gmail.com', '52d6399d1b82774367beae28317cce5b', 'jigo', 'paneriya', '0000-00-00', 'male', '1696410505_cebce6be34f4c9e039ab.bin', '1', '1', '', NULL, '2023-10-04 13:47:28', NULL, NULL, '123', NULL, 'surat', NULL, '2023-10-04 13:47:28', '2023-10-04 13:47:28'),
(43, 2, 'lolita@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lolita', 'patel', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 16:22:09', NULL, NULL, '8457585865', NULL, NULL, NULL, '2023-10-04 16:22:09', '2023-10-04 16:22:09'),
(44, 2, 'nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nikita', 'patel', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 16:26:45', NULL, NULL, '632542441', NULL, NULL, NULL, '2023-10-04 16:26:45', '2023-10-04 16:26:45'),
(45, 2, 'noti@gmail.com', '202cb962ac59075b964b07152d234b70', 'noti', 'tttt', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 16:28:35', NULL, NULL, '123', NULL, NULL, NULL, '2023-10-04 16:28:35', '2023-10-04 16:28:35'),
(46, 2, 'jaylo@gmail.com', '8cc946123dcf3c00c15de91c11db056f', 'jaylo', 'sar', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 16:38:56', NULL, NULL, '789', NULL, NULL, NULL, '2023-10-04 16:38:56', '2023-10-04 16:38:56'),
(48, 2, 'hero@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'hero', 'patel', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-04 16:59:39', NULL, NULL, '555555', NULL, NULL, NULL, '2023-10-04 16:59:39', '2023-10-04 16:59:39'),
(49, 2, 'jk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jaydip', 'prajapati', '0000-00-00', 'male', 'default.jpg', '1', '1', '', NULL, '2023-10-05 10:43:22', NULL, NULL, '123456789', NULL, 'rajkot,surat', NULL, '2023-10-05 10:43:22', '2023-10-05 10:43:22'),
(50, 2, 'baba@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Baba', 'Gori', '0000-00-00', 'male', 'default.jpg', '1', '1', '234444', 0, '2023-06-24 13:16:22', NULL, NULL, '98989898989898', '1', 'surat,gujarat', 'dfdfdfsdf', '0000-00-00 00:00:00', '2023-06-06 18:18:09'),
(51, 2, 'jay@gmail.com', '202cb962ac59075b964b07152d234b70', 'jay', 'sardhara', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-11 14:43:34', NULL, NULL, '7041648493', NULL, NULL, NULL, '2023-10-11 14:43:34', '2023-10-11 14:43:34'),
(52, 2, 'litehouseza@gmail.com', '22e4bc764fc535416e9b6b8bba3c792b', 'Litehouse ', 'SA', '1992-02-03', 'male', '1697017745_0679b5db75ce16bf36ba.jpg', '6', NULL, '7441', NULL, '2023-10-11 15:19:05', NULL, NULL, '0741606765', '10', 'Unit 2, ORO THREE, 5 Junction Road, Killarney Junction Cape Town 7441, South Africa', 'NA', '2023-10-11 15:19:05', '2023-10-11 15:19:05'),
(53, 2, 'kamo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'kamo', 'dan', '0000-00-00', 'male', '1697105542_db9389210f999c80d930.bin', '1', '1', '', NULL, '2023-10-12 15:41:37', NULL, NULL, '972472727', NULL, 'bxjxjxjxjvgvycgytfctcgytcftcrftfctcftfctfcttfcrtcffctcftfcyfyfvgygyfgyfvgyvgyvgygcgcycgygcyfcd', NULL, '2023-10-12 15:41:37', '2023-10-12 15:41:37'),
(54, 2, 'kaki@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'kaka', 'kaki', '0000-00-00', 'male', '1697106302_ea7c28608bdc7474f5a0.bin', '1', '1', '', NULL, '2023-10-12 15:45:43', NULL, NULL, '93938383838', NULL, 'hcyc', NULL, '2023-10-12 15:45:43', '2023-10-12 15:45:43'),
(55, 2, 'bapu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'bapu', 'bapu', '0000-00-00', 'male', '1697106040_6aae6c3d2249dda8cde8.bin', '1', '1', '', NULL, '2023-10-12 15:49:18', NULL, NULL, '12345678', NULL, 'yvucu', NULL, '2023-10-12 15:49:18', '2023-10-12 15:49:18'),
(56, 2, 'jhonpatel1803@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'kali', 'kli', '0000-00-00', 'male', '1697106307_f6ef34b90390993a6523.bin', '1', '1', '', NULL, '2023-10-12 15:54:15', NULL, 'W9jFOyEIh7ds0Lpi', 'xhdbdnb', NULL, 'fbdbfbfb', NULL, '2023-10-12 15:54:15', '2023-10-12 15:54:15'),
(57, 2, 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'test', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-12 15:57:20', NULL, NULL, '1234567', NULL, NULL, NULL, '2023-10-12 15:57:20', '2023-10-12 15:57:20'),
(58, 2, 'bhavik.fablead@gmail.com', 'ad88d103df9988c38b218d8f65a32103', 'bumba', 'patel', '1988-02-05', '', '1697702307_25ea7910c77ea2cf1efe.jpg', '1', '1', '395005', NULL, '2023-10-19 13:28:27', NULL, 'rp3sB4zV9PtjCgYU', '87898787773', '1', '77 sterling high rice residency surat east.', 'nr canal road surat', '2023-10-19 13:28:27', '2023-10-19 13:28:27'),
(59, 2, 'raviteja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ravi', 'teja', '1988-02-08', '', '1697702685_361f91989c543d8e786b.png', '1', '1', '395007', NULL, '2023-10-19 13:34:45', NULL, NULL, '8987878898', '1', '66 surat royal squre arcade ', 'nr bhesthan', '2023-10-19 13:34:45', '2023-10-19 13:34:45'),
(60, 2, 'hemis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hemis', 'panwala', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-19 15:45:00', NULL, NULL, '8457585833', NULL, NULL, NULL, '2023-10-19 15:45:00', '2023-10-19 15:45:00'),
(61, 2, 'kuku@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'kuku', 'panwala', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-19 15:55:57', NULL, NULL, '8457585833', NULL, NULL, NULL, '2023-10-19 15:55:57', '2023-10-19 15:55:57'),
(62, 2, 'nobita@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nobita', 'lobi', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-10-19 15:58:38', NULL, NULL, '8457585833', NULL, NULL, NULL, '2023-10-19 15:58:38', '2023-10-19 15:58:38'),
(63, 2, 'tommay@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tommy', 'patel', '1977-02-05', 'male', '1697871581_b96a15d4f21d7c24b608.png', '1', '1', '395001', NULL, '2023-10-21 12:29:41', NULL, NULL, '87854544788', '1', '44 surat east royal residency', 'nr anand mahal road surat', '2023-10-21 12:29:41', '2023-10-21 12:29:41'),
(64, 2, 'kiran.fablead@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nirav vvv', 'patel', '0000-00-00', 'male', '1698237702_e76a2e36c7dad73f07c7.bin', '1', '1', '', NULL, '2023-10-25 12:34:44', NULL, NULL, '32546652', NULL, 'katargam', NULL, '2023-10-25 12:34:44', '2023-10-25 12:34:44'),
(65, 2, 'testdebug@gmail.com', '202cb962ac59075b964b07152d234b70', 'debug1', 'Ramnu', '0000-00-00', 'female', '1698926408_e43ad07b2533006d9bcc.bin', '1', '1', '', NULL, '2023-10-31 13:34:13', NULL, NULL, '704164893', NULL, 'ramla mer', NULL, '2023-10-31 13:34:13', '2023-10-31 13:34:13'),
(66, 2, 'jignesh.fablead@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jignesh', 'paneriya', '1993-11-08', '', '1698831910_4480385f7347592d0595.webp', '1', '1', '395007', NULL, '2023-11-01 15:15:10', NULL, NULL, '89898989898', '1', '702- royal squre app, surat east zone. ', 'nr ramnager char rasta.', '2023-11-01 15:15:10', '2023-11-01 15:15:10'),
(67, 2, 'patel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jugnu', 'patel', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-11-04 13:54:14', NULL, 'CfQjBOLkvy92ng1s', '635337588', NULL, NULL, NULL, '2023-11-04 13:54:14', '2023-11-04 13:54:14'),
(68, 2, 'jay.fablead@gmail.com', '202cb962ac59075b964b07152d234b70', 'kaliya', 'utsad', '0000-00-00', 'male', '1699456044_27007919debc4d759645.bin', '1', '1', '', NULL, '2023-11-06 10:13:18', NULL, NULL, '7041645493', NULL, 'From Reti na Dhagla', NULL, '2023-11-06 10:13:18', '2023-11-06 10:13:18'),
(69, 2, 'bhavik.fablead2@gmail.com', 'ad88d103df9988c38b218d8f65a32103', 'Bhavik', 'Modi', '1999-02-12', 'male', '1699256820_ff5899f7b4b55ef1aaa5.jpg', '1', '1', '395010', NULL, '2023-11-06 13:17:00', NULL, NULL, '1234567890', '1', 'test', 'test', '2023-11-06 13:17:00', '2023-11-06 13:17:00'),
(70, 2, 'mangukiyahk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'haresh', 'mangukiya', '0000-00-00', 'male', '1699266161_1a1ca4ac3a66b7122f81.bin', '1', '1', '', NULL, '2023-11-06 15:51:37', NULL, NULL, '9724824359', NULL, 'Reti no dhaglo', NULL, '2023-11-06 15:51:37', '2023-11-06 15:51:37'),
(71, 2, 'vivekmer@gmail.com', '202cb962ac59075b964b07152d234b70', 'Vivek', 'Mer', '0000-00-00', 'male', '1699435941_82dc89cd3c11c92cae33.bin', '1', '1', '', NULL, '2023-11-08 13:15:51', NULL, NULL, '123546', NULL, 'Hometown', NULL, '2023-11-08 13:15:51', '2023-11-08 13:15:51'),
(72, 2, 'test1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'test', '1', '1995-12-12', 'male', 'default.jpg', '1', '1', '394160', NULL, '2023-11-20 17:22:27', NULL, NULL, '1234567890', '1', 'ghjgjgh', 'gjghjgj', '2023-11-20 17:22:27', '2023-11-20 17:22:27'),
(73, 2, 'akshayfablead@gmail.com', '202cb962ac59075b964b07152d234b70', 'Akshay', 'Ajudiya', '2000-10-15', '', 'default.jpg', '1', '1', '394107', NULL, '2023-11-22 17:44:23', NULL, NULL, '1000000000', '1', 'jmgrft', 'hrtfhrthrtjhf', '2023-11-22 17:44:23', '2023-11-22 17:44:23'),
(74, 2, 'akshay12345@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'akshay', 'ajudiya', '0000-00-00', 'male', 'default.jpg', '1', '1', '752742', NULL, '2023-11-28 12:37:25', NULL, NULL, '1234567890', '1', 'amroli ', 'NA', '2023-11-28 12:37:25', '2023-11-28 12:37:25'),
(75, 2, 'poptatlal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'popatlal', 'patrakar', '1980-04-04', '', '1701671935_f4d44748f77669e145d3.jpg', '10', '13', '358802', NULL, '2023-12-04 12:06:49', NULL, NULL, '332234433323', '1', '66 japabazar, surat main road', '', '2023-12-04 12:06:49', '2023-12-04 12:06:49'),
(76, 2, '123@gmail.com', '202cb962ac59075b964b07152d234b70', 'ram', 'amar', '0000-00-00', 'male', '1703222047_58e0174bca39896cf014.bin', '1', '1', '', NULL, '2023-12-06 13:11:37', NULL, NULL, '652697852', NULL, 'rtffff', NULL, '2023-12-06 13:11:37', '2023-12-06 13:11:37'),
(77, 2, 'harnish@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'harnish', 'patel', '2000-02-02', '', '1703654549_e322f2f7b9a7b89519db.jpg', '1', '1', '395009', NULL, '2023-12-27 10:52:29', NULL, NULL, '8985585454', '1', '67 Adajan main road star link soc.', '', '2023-12-27 10:52:29', '2023-12-27 10:52:29'),
(78, 2, 'jaysard23@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jay', 'sard', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2023-12-27 11:09:20', NULL, NULL, '7041648493', NULL, NULL, NULL, '2023-12-27 11:09:20', '2023-12-27 11:09:20'),
(79, 2, 'mihir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mihir', 'parmar', '1998-02-05', '', '1703743772_f6fa6899cef54d107053.png', '', '', '', NULL, '2023-12-28 11:39:32', NULL, NULL, '258445854', '', '', '', '2023-12-28 11:39:32', '2023-12-28 11:39:32'),
(80, 2, 'savrav.banga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'savrav', 'banga', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-03-04 11:51:21', NULL, NULL, '7145448493', NULL, NULL, NULL, '2024-03-04 11:51:21', '2024-03-04 11:51:21'),
(81, 2, 'pritbhavsar811@gmail.com', '55f1f0c5f4067a6b00eeb99da1873fbd', 'prit', 'bhavsar', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-08-21 10:25:15', NULL, NULL, '9537210665', NULL, NULL, NULL, '2024-08-21 10:25:15', '2024-08-21 10:25:15'),
(82, 2, 'live@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Test', 'Live', '0000-00-00', 'female', '1724217823_36967bcd4982fbbf1805.jpg', '1', '1', '', NULL, '2024-08-21 10:31:46', NULL, NULL, '6353751021', NULL, 'surat ', NULL, '2024-08-21 10:31:46', '2024-08-21 10:31:46'),
(83, 2, 'fablead.sneh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sneh', 'Chaudhary', '2024-09-05', 'male', '1751615762_0879b0715516fdf2e66c.jpg', '1', '1', '30024', NULL, '2024-09-02 12:25:39', NULL, '01gOzbthI5RK3Xln', '8511667908', '1', 'Adajan , Surat', 'NA', '2024-09-02 12:25:39', '2024-09-02 12:25:39'),
(84, 2, 'pritfeblead@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '  prit', 'bhavsar', '0000-00-00', 'male', '1726051468_b1ee59b5f0d1ea6455c1.jpg', '1', '1', '', NULL, '2024-09-09 10:34:43', NULL, NULL, '9537210665', NULL, '  dabholi ', NULL, '2024-09-09 10:34:43', '2024-09-09 10:34:43'),
(85, 2, 'saurav.fablead@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'saurav', 'patel', '0000-00-00', 'male', '1726136389_b1fc5a358dbbb4786ffd.jpg', '1', '1', '', NULL, '2024-09-12 14:57:46', NULL, 'YS9hDpAM8CENoIqx', '7016258640', NULL, 'surat ', NULL, '2024-09-12 14:57:46', '2024-09-12 14:57:46'),
(86, 2, 'bhaven@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bhaven', 'bhavsar', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-09-12 16:26:36', NULL, NULL, '9537210665', NULL, NULL, NULL, '2024-09-12 16:26:36', '2024-09-12 16:26:36'),
(87, 2, 'saurav1.fablead@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'saurav', 'chaudhari', '2000-08-14', 'male', '1726290315_bc6c3ce85a63d391c2f5.png', '1', '1', '394160', NULL, '2024-09-14 10:35:15', NULL, NULL, '1234567890', '1', 'sdsad', 'sdad', '2024-09-14 10:35:15', '2024-09-14 10:35:15'),
(88, 2, 'crmdevadmin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Willa', 'chuadhari', '2024-09-18', 'male', '1726661626_635bbc67c6b98c301025.png', '1', '1', '394160', NULL, '2024-09-18 17:43:46', NULL, NULL, '1234567890', '1', 'jkjkjkhjk', '', '2024-09-18 17:43:46', '2024-09-18 17:43:46'),
(89, 2, 'test111@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ddf', 'ffdds', '2024-09-20', 'male', '1726812149_419ffdb32a47e27ed15e.png', '1', '1', '394160', NULL, '2024-09-20 11:32:29', NULL, NULL, '1234567890', '1', 'sada', '', '2024-09-20 11:32:29', '2024-09-20 11:32:29'),
(90, 2, 'test.sneh1702@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Schy', 'bbb', '0000-00-00', 'male', 'default.jpg', '', '', '', NULL, '2024-10-09 18:32:00', NULL, 'Z76S4AWIl0oP52x9', '7676767676', '', '', '', '2024-10-09 18:32:00', '2024-10-09 18:32:00'),
(93, 2, 'rammer@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ram', 'mer', '0000-00-00', 'male', '1730801241_62d1d8746d720d27670a.jpg', '1', '1', '', NULL, '2024-11-05 14:58:11', NULL, NULL, '9537210665', NULL, 'katargam ', NULL, '2024-11-05 14:58:11', '2024-11-05 14:58:11'),
(94, 2, 'shubham.fablead@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Shubham', 'iygy', '2010-06-23', 'male', '1731299596_7b6b82d7d608de6a2283.png', '1', '1', '355009', NULL, '2024-11-11 10:03:16', NULL, NULL, '9874563215', '1', 'parvat patiya', '', '2024-11-11 10:03:16', '2024-11-11 10:03:16'),
(95, 2, 'new@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Ram', 'Mer', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-11-21 14:53:58', NULL, NULL, '6353375102', NULL, NULL, NULL, '2024-11-21 14:53:58', '2024-11-21 14:53:58'),
(96, 2, 'arun.fablead@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'arun', 'test', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-11-23 13:37:23', NULL, NULL, '1234567890', NULL, NULL, NULL, '2024-11-23 13:37:23', '2024-11-23 13:37:23'),
(97, 2, 'hk5556@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'haresh', 'mangukiya', '0000-00-00', 'male', '1732702151_219714afb85b443de34c.heic', '1', '1', '', NULL, '2024-11-27 13:11:29', NULL, NULL, '9724824359', NULL, 'katargaam', NULL, '2024-11-27 13:11:29', '2024-11-27 13:11:29'),
(98, 2, 'ggh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'hgghg', 'ghghg', '0000-00-00', 'male', 'default.jpg', '', '', '', NULL, '2024-11-28 11:55:19', NULL, NULL, '8787878787', '', '', '', '2024-11-28 11:55:19', '2024-11-28 11:55:19'),
(99, 2, 'yy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'hgghg', 'ghghg', '0000-00-00', 'male', 'default.jpg', '', '', '', NULL, '2024-11-28 12:19:24', NULL, NULL, '7878778787', '', '', '', '2024-11-28 12:19:24', '2024-11-28 12:19:24'),
(100, 2, 'jack.sardhara01@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'jack', 'sardhara', '0000-00-00', 'male', '1732882596_a249f229a8402691a92c.jpg', '1', '1', '', NULL, '2024-11-28 13:21:44', NULL, NULL, '7041649493', NULL, 'Katargaam', NULL, '2024-11-28 13:21:44', '2024-11-28 13:21:44'),
(101, 2, 'test123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'haresh', 'mangukiya', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-11-28 13:41:26', NULL, NULL, '9724824359', NULL, NULL, NULL, '2024-11-28 13:41:26', '2024-11-28 13:41:26'),
(102, 2, 'hiren.fablead@gmail.con', 'e333b7935156a8d29bb6cb07897c3a47', 'Hiren', 'Chandaliya', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-12-19 12:52:16', NULL, NULL, '9428618514', NULL, NULL, NULL, '2024-12-19 12:52:16', '2024-12-19 12:52:16'),
(103, 2, 'hiren.fablead@gmail.com', '87fbb0e3c75b9ea4a42a8fd183f36af3', 'hiren', 'patel', '0000-00-00', '', 'default.jpg', NULL, NULL, '', NULL, '2024-12-19 12:55:16', NULL, NULL, '9428618514', NULL, NULL, NULL, '2024-12-19 12:55:16', '2024-12-19 12:55:16'),
(104, 2, 'hirenpatel2744@gmail.com', 'e333b7935156a8d29bb6cb07897c3a47', 'hiren', 'patel', '0000-00-00', 'male', 'default.jpg', '1', '1', '', NULL, '2024-12-19 13:04:57', NULL, 'cTnB7Ff3u1A486P0', '9428618514', NULL, 'hiren', NULL, '2024-12-19 13:04:57', '2024-12-19 13:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_shipping_address`
--

CREATE TABLE `user_shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_shipping_address`
--

INSERT INTO `user_shipping_address` (`id`, `user_id`, `first_name`, `last_name`, `city`, `state`, `country`, `zipcode`, `address`, `number`, `Created_at`) VALUES
(83, '75', 'popatlal', 'patrakar', '10', '13', '1', '358802', '66 japabazar, surat mail road', 2147483647, '2023-12-04 06:36:49'),
(84, '76', 'ram', 'amar', '17', '19', '5', '395001', 'aavjo', 652697852, '2023-12-06 07:41:37'),
(85, '76', 'ggg', 'vuuygy', '17', '19', '5', '5555', 'gyuuyguyg', 55555, '2023-12-13 04:28:52'),
(86, '77', 'harnish', 'patel', '1', '1', '1', '395009', '67 Adajan main road star link soc.', 2147483647, '2023-12-27 05:22:29'),
(87, '78', 'jay', 'sard', '1', '1', '1', '395004', 'sardhara', 2147483647, '2023-12-27 05:39:20'),
(88, '78', 'bhavik', 'modi', '1', '1', '1', '395010', '123', 1234567890, '2023-12-27 08:08:06'),
(89, '79', 'mihir', 'parmar', '', '', '', '395009', '', 258445854, '2023-12-28 06:09:32'),
(91, '80', 'savrav', 'banga', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-03-04 06:21:21'),
(92, '81', 'prit', 'bhavsar', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-08-21 04:55:15'),
(93, '82', 'Test', 'Live', NULL, NULL, NULL, NULL, NULL, 635375102, '2024-08-21 05:01:46'),
(94, '82', 'test', 'live', '1', '1', '1', '395004', 'surat', 2147483647, '2024-08-21 05:04:04'),
(95, '82', 'prit', 'bhavsar', '1', '1', '1', '395004', 'dabholi ', 2147483647, '2024-08-21 05:58:21'),
(96, '83', 'Sneh', 'Chaudhary', 'surat', 'Gujarat', 'India', '30024', 'Adajan , Surat', 2147483647, '2024-09-02 06:55:39'),
(97, '84', 'prit', 'bhavsar', '1', '1', '1', '395003', 'Katargam ', 2147483647, '2024-09-09 05:04:43'),
(98, '83', 'Sneh', 'Chaudhary', 'surat', 'Gujarat', 'India', '30024', 'Adajan , Surat', 2147483647, '2024-09-10 05:49:45'),
(100, '84', 'jay', 'patel', '1', '1', '1', '395001', 'adajan', 2147483647, '2024-09-11 12:00:31'),
(102, '85', 'saurav ', 'chaudhari ', '1', '1', '1', '395003', 'surat', 1234567890, '2024-09-12 10:13:13'),
(103, '86', 'bhaven', 'bhavsar', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-09-12 10:56:36'),
(104, '87', 'saurav', 'chaudhari', '1', '1', '1', '394160', 'sdsad', 1234567890, '2024-09-14 05:05:15'),
(105, '88', 'Willa', 'chuadhari', '1', '1', '1', '394160', 'jkjkjkhjk', 1234567890, '2024-09-18 12:13:46'),
(106, '84', 'ram', 'mer', '1', '1', '1', '395002', 'mota varacha ', 2147483647, '2024-09-18 12:14:34'),
(107, '89', 'ddf', 'ffdds', '1', '1', '1', '394160', 'sada', 1234567890, '2024-09-20 06:02:29'),
(108, '90', 'Schy', 'bbb', '', '', '', '', '', 2147483647, '2024-10-09 13:02:00'),
(109, '91', 'Orla', 'Cobb', '', '', '4', '38', '63 East Second Road', 96, '2024-10-26 05:46:34'),
(110, '92', 'Beau', 'Weiss', '', '', '19', '81', '46 Hague Boulevard', 42, '2024-10-26 06:00:02'),
(111, '93', 'ram', 'mer', '1', '1', '1', '395008', 'katargam ', 2147483647, '2024-11-05 09:28:11'),
(112, '94', 'Shubham', 'Raut', '1', '1', '1', '355009', 'parvat patiya', 2147483647, '2024-11-11 04:33:16'),
(114, '95', 'hhs', 'shss', '1', '1', '1', '395004', 'dhhdhsh', 68686, '2024-11-21 10:33:56'),
(115, 'M2006C3MII', 'ram', 'mer', '1', '1', '1', '395008', 'katargam ', 2147483647, '2024-11-22 08:52:09'),
(116, '96', 'arun', 'test', '1', '1', '1', '395008', 'surat ', 1234567890, '2024-11-23 08:07:23'),
(117, 'null', 'ram', 'mer', '1', '1', '1', '395008', 'katargam ', 2147483647, '2024-11-26 06:10:50'),
(118, '93', 'jay', 'patel ', '1', '1', '1', '399004', 'dabholi ', 2147483647, '2024-11-26 06:34:24'),
(119, '93', 'haresh', 'mangukiya ', '1', '1', '1', '395004', 'ffggg', 963258523, '2024-11-26 06:38:30'),
(120, '93', 'gggg', 'gggg', '1', '1', '1', '395004', 'ffg', 55852699, '2024-11-26 06:40:59'),
(121, '93', 'hgggg', 'gggg', '1', '1', '1', '395004', 'ggghh', 9856699, '2024-11-26 06:43:26'),
(122, '93', 'ggggg', 'ggggg', '1', '1', '1', '395008', 'gggg', 5599885, '2024-11-26 06:44:06'),
(124, '97', 'haresh ', 'mangukiya ', '1', '1', '1', '395008', 'katargaam ', 2147483647, '2024-11-27 10:35:18'),
(125, 'M2006C3MII', 'haresh', 'mangukiya', '1', '1', '1', '39508', 'hdjdhd', 96375103, '2024-11-27 11:51:43'),
(126, 'Jack\'s iPhone 15 Pro', 'haresh', 'mangukiya', '1', '1', '1', '395004', 'hjdfhjfdh', 2147483647, '2024-11-27 12:23:07'),
(127, '98', 'hgghg', 'ghghg', '', '', '', '', '', 2147483647, '2024-11-28 06:25:19'),
(128, '99', 'hgghg', 'ghghg', '', '', '', '', '', 2147483647, '2024-11-28 06:49:24'),
(129, '100', 'jack', 'sardhara', '1', '1', '1', '395008', 'katargaam ', 2147483647, '2024-11-28 07:51:44'),
(130, '101', 'haresh', 'mangukiya', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-11-28 08:11:26'),
(131, 'Jack\'s iPhone SE', 'haresh', 'mangukiya', '1', '1', '1', '395004', 'surat', 685658970, '2024-11-28 09:00:08'),
(132, 'Jack\'s iPhone 14 Pro', 'haresh', 'mangukiya', '1', '1', '1', '395008', 'test surat', 2147483647, '2024-11-28 11:26:43'),
(133, '133', 'ram', 'mer', '1', '1', '1', '395008', 'katargam ', 2147483647, '2024-12-02 10:41:27'),
(134, '102', 'Hiren', 'Chandaliya', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-12-19 07:22:16'),
(135, '103', 'hiren', 'patel', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-12-19 07:25:16'),
(136, '104', 'hiren', 'patel', NULL, NULL, NULL, NULL, NULL, 2147483647, '2024-12-19 07:34:57'),
(137, '104', 'hiren ', 'patel', '1', '1', '1', '395018', 'adajan', 2147483647, '2024-12-19 07:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `VariationID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `VariationTypeID` int(11) DEFAULT NULL COMMENT 'it will delete',
  `VariationName` varchar(100) DEFAULT NULL COMMENT 'it will delete',
  `VariationPrice` float NOT NULL,
  `Sale_VariationPrice` text DEFAULT NULL,
  `VariationStock` float NOT NULL,
  `defaultProduct` int(11) NOT NULL DEFAULT 0,
  `ProductLive` tinyint(4) NOT NULL,
  `product_variation_image` varchar(255) DEFAULT NULL,
  `variation_is_taxable` int(11) DEFAULT NULL,
  `variation_tax_class_id` int(11) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`VariationID`, `ProductID`, `VariationTypeID`, `VariationName`, `VariationPrice`, `Sale_VariationPrice`, `VariationStock`, `defaultProduct`, `ProductLive`, `product_variation_image`, `variation_is_taxable`, `variation_tax_class_id`, `Created_at`, `Updated_at`) VALUES
(23, 9, NULL, NULL, 0, '', 0, 0, 1, '[]', NULL, NULL, '0000-00-00 00:00:00', '2023-11-06 11:52:37'),
(42, 14, NULL, NULL, 0, '', 0, 0, 1, '[]', NULL, NULL, '0000-00-00 00:00:00', '2023-11-08 15:37:29'),
(265, 58, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-18 15:18:40'),
(266, 59, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-18 15:45:42'),
(273, 63, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-19 10:57:15'),
(274, 64, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-19 11:01:25'),
(275, 65, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-19 11:06:21'),
(276, 66, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-19 11:23:58'),
(287, 71, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-27 12:02:00'),
(288, 72, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-27 12:14:04'),
(289, 73, NULL, NULL, 52000, '47500', 14, 1, 1, '[\"1703660356_86e878490041f0541f39.png\",\"1703660356_a6a863abf8a85ecb3585.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 12:29:16'),
(290, 73, NULL, NULL, 50000, '46580', 9, 0, 1, '[\"1703660356_71ad23d6690ba1fb2bb3.png\",\"1703660356_497de98627a58325abf3.webp\",\"1703660356_519a75b27fac7766b7c9.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 12:29:16'),
(291, 74, NULL, NULL, 1600, '1320', 15, 1, 1, '[\"1703674172_20ea13822907967030e2.png\",\"1703674172_09ddd82193e5a54dc29d.png\",\"1703674172_7519bd42a6ad9f400c24.png\",\"1703674172_c572e1667945e35818e2.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 16:19:32'),
(292, 74, NULL, NULL, 1800, '1469', 15, 0, 1, '[\"1703674172_5e2bfd79b90f7bb8b0af.png\",\"1703674172_de897be49fcf8a7be5f0.png\",\"1703674172_1b65b5ff895ccfa0a077.png\",\"1703674172_640b1ac8e1998632496a.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 16:19:32'),
(293, 74, NULL, NULL, 1500, '1289', 15, 0, 1, '[\"1703674172_8be0c2c3c7cda3eee26b.png\",\"1703674172_42d44b7d6c63f1605dfd.png\",\"1703674172_d9ed78aea763d048a53e.png\",\"1703674172_b750e5120d0b35199d87.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 16:19:32'),
(294, 75, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-27 16:35:18'),
(295, 76, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-27 16:48:42'),
(296, 77, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-27 17:01:10'),
(299, 79, NULL, NULL, 6000, '4499', 5, 0, 1, '[\"1703678625_19d42e2bd76f1f81a0ec.png\",\"1703678625_6e7bd1d804028c251263.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(300, 79, NULL, NULL, 6000, '4499', 5, 0, 1, '[\"1703678625_7320d5943d2b461206ee.png\",\"1703678625_e06bd6f1019accc03139.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(301, 79, NULL, NULL, 6000, '4899', 5, 0, 1, '[\"1703678625_bf54c591a7bf92c526dd.png\",\"1703678625_c620426369b284ffd563.png\",\"1703678625_b2fcfb949ed652ba6b5a.png\",\"1703678625_b3ff39683556d354baa1.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(302, 79, NULL, NULL, 6000, '4899', 5, 0, 1, '[\"1703678625_1788256cd7a15a3c8a6c.png\",\"1703678625_6f5793f55ce44f919a24.png\",\"1703678625_0a05ca047e94b6282851.png\",\"1703678625_551688f601d50852b2eb.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(303, 79, NULL, NULL, 6000, '4899', 5, 0, 1, '[\"1703678625_6633593ef4591c3eee19.png\",\"1703678625_93ad859ab4e7a3a61590.png\",\"1703678625_27086f6e80fc441e9816.png\",\"1703678625_a27ff0293f7f681de539.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(304, 79, NULL, NULL, 6000, '4499', 5, 0, 1, '[\"1703678625_8869d0b95b82b50efea9.png\",\"1703678625_7bde3da6146f4ff5ad19.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:33:45'),
(305, 80, NULL, NULL, 1600, '1399', 5, 0, 1, '[\"1703680018_516d1e47937c0933bd98.png\",\"1703680018_0d89e812af4b39d7f00d.png\",\"1703680018_ee5104b22158b1159c71.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:56:58'),
(306, 80, NULL, NULL, 1500, '1299', 5, 0, 1, '[\"1703680018_48bc3b47248d5e757c99.png\",\"1703680018_d9ce979ae6b02d133bd2.png\",\"1703680018_38545dead1ad7fc50088.png\",\"1703680018_76737effd6f237aa2648.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-27 17:56:58'),
(307, 81, NULL, NULL, 548990, '428990', 15, 0, 1, '[\"1703740218_2626419f9aefcf088772.png\",\"1703740218_1238bf9e25751be50847.png\",\"1703740218_464b271203db09a1c6b5.png\",\"1703740218_2763cdd0a222ff26a95b.webp\"]', 1, 4, '0000-00-00 00:00:00', '2023-12-28 10:40:18'),
(308, 81, NULL, NULL, 420000, '389990', 12, 0, 1, '[\"1703740218_c0eec7f1952b24a26fd9.png\",\"1703740218_3564e6ae53cff25efb38.png\",\"1703740218_e65793c9e9401a560a56.png\",\"1703740218_ff04caead213e2d9b447.webp\"]', 1, 4, '0000-00-00 00:00:00', '2023-12-28 10:40:18'),
(309, 82, NULL, NULL, 30000, '26890', 5, 0, 1, '[\"1703740786_64acd5804cc045f97363.webp\",\"1703740786_da2c738bcd1100302294.webp\",\"1703740786_a10d21e82667f88ef583.webp\",\"1703740786_ba443904b9e6163f1133.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 10:49:46'),
(310, 82, NULL, NULL, 30000, '28890', 5, 0, 1, '[\"1703740786_a6855b1057e0647dd321.webp\",\"1703740786_de6f1bf50a1dcdc4a2f9.webp\",\"1703740786_6f1beef72c3b5c3677ae.webp\",\"1703740786_4b395697122d06df6b7f.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 10:49:46'),
(311, 82, NULL, NULL, 30000, '25890', 5, 0, 1, '[\"1703740786_46fd603bd53a680c627c.webp\",\"1703740786_663477cddcd57369a31b.webp\",\"1703740786_3af7338811951bd1d5e3.webp\",\"1703740786_79cd449c77d8e4662897.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 10:49:46'),
(312, 83, NULL, NULL, 65999, '44990', 5, 0, 1, '[\"1703741640_682152878e24d8b92c58.png\",\"1703741640_2fd22b4a6944b6051799.png\",\"1703741640_41768e01266f7e6521ce.png\",\"1703741640_4f8744817a5939d1aca4.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 11:04:00'),
(313, 83, NULL, NULL, 65999, '45990', 5, 0, 1, '[\"1703741640_234297be0843a9d01cf6.png\",\"1703741640_91172ac6dfe22ee43b94.png\",\"1703741640_b57bc9084b63e3d2b9a1.png\",\"1703741640_2622c64d147f608c6157.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 11:04:00'),
(314, 83, NULL, NULL, 65999, '42990', 5, 0, 1, '[\"1703741640_dacfb9228d2ed44ffb52.png\",\"1703741640_37837ed755e15bb8fe16.png\",\"1703741640_6f96ea859ae14aa8d896.png\",\"1703741640_1f38810ab744a9ebc346.png\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 11:04:00'),
(315, 84, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:21:00'),
(316, 85, NULL, NULL, 110000, '87900', 13, 0, 1, '[\"1703743372_fa11c4df85c77a469466.png\",\"1703743372_9c947e99fb73241fda63.png\",\"1703743372_0d4db19c9334ae34215b.webp\",\"1703743372_ffbc69efd2f42c545a7e.webp\"]', 1, 1, '0000-00-00 00:00:00', '2023-12-28 11:32:52'),
(317, 85, NULL, NULL, 110000, '108990', 15, 0, 1, '[\"1703743372_38ec6cfc1cac09159821.png\",\"1703743372_f62b0d2d2fd5bc6980bd.png\",\"1703743372_38bce349af9b3913c97e.webp\",\"1703743372_28399b53467a08472bb1.webp\"]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:32:52'),
(318, 85, NULL, NULL, 110000, '77900', 15, 0, 1, '[\"1703743372_82ba987cf92dfc648eba.png\",\"1703743372_61d5dc40d418bd3a370c.png\",\"1703743372_29d31ab66a858d93ed5e.webp\",\"1703743372_62f8e215ae25429691dd.webp\"]', 1, 3, '0000-00-00 00:00:00', '2023-12-28 11:32:52'),
(319, 86, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:41:36'),
(320, 87, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:45:48'),
(321, 88, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:50:35'),
(322, 89, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 11:54:54'),
(323, 90, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 12:08:28'),
(324, 91, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2023-12-28 12:15:51'),
(340, 43, NULL, NULL, 3500, '3000', 63, 0, 1, '[\"1702968459_7724a4d879db4494e4bd.jpg\"]', 1, 3, '0000-00-00 00:00:00', '2024-08-29 15:51:23'),
(341, 93, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2024-09-11 11:08:37'),
(342, 94, NULL, NULL, 0, '', 0, 0, 1, '[]', 0, 0, '0000-00-00 00:00:00', '2024-11-08 12:26:46'),
(349, 61, NULL, NULL, 200, '150', 183, 0, 1, '[\"1731997817_50f92cc7a956b5e758af.png\"]', 0, 0, '0000-00-00 00:00:00', '2024-11-19 12:02:24'),
(361, 62, NULL, NULL, 300, '299', 10, 1, 1, '[\"1731997729_1c8dc35a158dfd7c3bf4.png\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-19 12:20:40'),
(362, 62, NULL, NULL, 600, '499', 15, 0, 1, '[\"1731998671_0d20a6f29c9b4012044a.jpg\",\"1731998671_b64d4b722db47553ee65.jpg\",\"1731998671_31bdce40dc0d45d1da14.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-19 12:20:40'),
(363, 62, NULL, NULL, 1000, '799', 5, 0, 1, '[\"1731998875_a34a33481b6a355b582c.jpg\",\"1731998875_a6ad98342fac0d146f5d.jpg\",\"1731998875_93048d1a1da524a20601.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-19 12:20:40'),
(419, 92, NULL, NULL, 3699, '1199', 15, 1, 1, '[\"1703746920_11bb676fe7d4f79fb668.png\",\"1703746920_62755eae8826d371a9bf.jpg\",\"1703746920_2ff95d42e927ceff9618.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(420, 92, NULL, NULL, 3699, '1299', 15, 0, 1, '[\"1703746920_000b65d01d47043f877f.png\",\"1703746920_e369d48b98f920d26d02.jpg\",\"1703746920_81cad856cbf121479920.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(421, 92, NULL, NULL, 3699, '1099', 15, 0, 1, '[\"1703746920_cd78905ef1e0241ed358.png\",\"1703746920_56cb0103de8795ff0976.jpg\",\"1703746920_c7bb4369049bc06e4c0e.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(422, 92, NULL, NULL, 3699, '1598', 15, 0, 1, '[\"1703746920_35600f4656bf2bcbcdc2.png\",\"1703746920_7c2114d54f4e8dec5d1d.jpg\",\"1703746920_712c45da34ac0e505a69.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(423, 92, NULL, NULL, 3699, '1800', 15, 0, 1, '[\"1703746920_634d726793b762a89d1e.png\",\"1703746920_a3df794476ec70a32739.jpg\",\"1703746920_52cd3d0971e56a4867fa.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(424, 92, NULL, NULL, 3699, '1699', 15, 0, 1, '[\"1703746920_0299a85c2eaff1c9ff27.png\",\"1703746920_b929180a913093da3f0f.jpg\",\"1703746920_3829706d5ed70e2af3a2.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(425, 92, NULL, NULL, 3699, '1399', 15, 0, 1, '[\"1703746920_6531a3debae3e141acba.png\",\"1703746920_75c4cab127d5677581a3.jpg\",\"1703746920_5a067099b0c9ef8e942e.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(426, 92, NULL, NULL, 3699, '1399', 15, 0, 1, '[\"1703746920_cdc8002131502d2b68e3.png\",\"1703746920_0818b50f391fb721336b.jpg\",\"1703746920_c17f58c1c093bfc36803.jpg\"]', 0, NULL, '0000-00-00 00:00:00', '2024-11-20 10:41:34'),
(427, 78, NULL, NULL, 6000, '2599', 5, 0, 1, '[\"1703677399_5943a3365602bdc36e20.webp\",\"1703677399_a2667e3648ca306b6479.webp\"]', 1, NULL, '0000-00-00 00:00:00', '2024-11-21 14:39:48'),
(428, 95, NULL, NULL, 92000, '85000', 12, 0, 1, '[\"1732694817_a7b0b9927c29fe6999e2.jpg\",\"1732694817_588cdeb2a6d2019ffc81.jpg\"]', 1, NULL, '0000-00-00 00:00:00', '2024-11-27 13:36:57'),
(429, 95, NULL, NULL, 89000, '79000', 12, 0, 1, '[\"1732694817_dac399814752838cadef.jpg\",\"1732694817_73f4cdf575dcef5494f3.jpg\"]', 1, NULL, '0000-00-00 00:00:00', '2024-11-27 13:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `VariationsDetails`
--

CREATE TABLE `VariationsDetails` (
  `VariationsDetailsID` int(11) NOT NULL,
  `VariationID` int(11) NOT NULL,
  `VariationVlueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `VariationsDetails`
--

INSERT INTO `VariationsDetails` (`VariationsDetailsID`, `VariationID`, `VariationVlueID`) VALUES
(1, 1, 26),
(2, 1, 0),
(3, 1, 0),
(4, 2, 27),
(5, 2, 0),
(6, 2, 0),
(7, 3, 2),
(8, 3, 11),
(9, 3, 8),
(10, 4, 0),
(11, 4, 0),
(12, 4, 0),
(13, 5, 1),
(14, 5, 11),
(15, 5, 8),
(16, 6, 2),
(17, 6, 12),
(18, 6, 8),
(19, 7, 1),
(20, 7, 11),
(21, 7, 8),
(22, 8, 2),
(23, 8, 12),
(24, 8, 8),
(25, 9, 1),
(26, 9, 11),
(27, 9, 8),
(28, 10, 1),
(29, 10, 0),
(30, 10, 8),
(31, 11, 0),
(32, 11, 0),
(33, 11, 0),
(34, 12, 0),
(35, 12, 0),
(36, 12, 0),
(37, 13, 26),
(38, 13, 11),
(39, 13, 8),
(40, 14, 27),
(41, 14, 12),
(42, 14, 8),
(43, 15, 27),
(44, 15, 13),
(45, 15, 8),
(46, 16, 26),
(47, 16, 12),
(48, 16, 8),
(49, 17, 26),
(50, 17, 13),
(51, 17, 8),
(52, 18, 27),
(53, 18, 11),
(54, 18, 8),
(55, 19, 15),
(56, 19, 12),
(57, 19, 0),
(58, 20, 1),
(59, 20, 11),
(60, 20, 8),
(61, 21, 27),
(62, 21, 0),
(63, 21, 0),
(64, 22, 26),
(65, 22, 0),
(66, 22, 0),
(67, 23, 0),
(68, 23, 0),
(69, 23, 0),
(70, 24, 0),
(71, 24, 0),
(72, 24, 0),
(73, 25, 2),
(74, 25, 12),
(75, 25, 8),
(76, 26, 15),
(77, 26, 13),
(78, 26, 8),
(79, 27, 1),
(80, 27, 11),
(81, 27, 8),
(82, 28, 26),
(83, 28, 11),
(84, 28, 8),
(85, 29, 27),
(86, 29, 12),
(87, 29, 8),
(88, 30, 27),
(89, 30, 13),
(90, 30, 8),
(91, 31, 26),
(92, 31, 12),
(93, 31, 8),
(94, 32, 26),
(95, 32, 13),
(96, 32, 8),
(97, 33, 27),
(98, 33, 11),
(99, 33, 9),
(100, 34, 2),
(101, 34, 13),
(102, 34, 8),
(103, 35, 1),
(104, 35, 11),
(105, 35, 8),
(106, 36, 26),
(107, 36, 12),
(108, 36, 0),
(109, 37, 26),
(110, 37, 13),
(111, 37, 0),
(112, 38, 27),
(113, 38, 11),
(114, 38, 0),
(115, 39, 27),
(116, 39, 12),
(117, 39, 0),
(118, 40, 27),
(119, 40, 13),
(120, 40, 0),
(121, 41, 26),
(122, 41, 11),
(123, 41, 0),
(124, 42, 0),
(125, 42, 0),
(126, 42, 0),
(127, 43, 0),
(128, 43, 0),
(129, 43, 0),
(130, 44, 0),
(131, 44, 0),
(132, 44, 0),
(133, 45, 24),
(134, 45, 12),
(135, 45, 0),
(136, 46, 26),
(137, 46, 13),
(138, 46, 0),
(139, 47, 1),
(140, 47, 11),
(141, 47, 8),
(142, 48, 0),
(143, 48, 0),
(144, 48, 0),
(145, 49, 15),
(146, 49, 11),
(147, 49, 9),
(148, 50, 1),
(149, 50, 12),
(150, 50, 0),
(151, 51, 1),
(152, 51, 13),
(153, 51, 0),
(154, 52, 2),
(155, 52, 11),
(156, 52, 0),
(157, 53, 2),
(158, 53, 12),
(159, 53, 0),
(160, 54, 2),
(161, 54, 13),
(162, 54, 0),
(163, 55, 1),
(164, 55, 11),
(165, 55, 8),
(166, 56, 1),
(167, 56, 12),
(168, 56, 9),
(169, 57, 1),
(170, 57, 12),
(171, 57, 0),
(172, 58, 1),
(173, 58, 12),
(174, 58, 0),
(175, 59, 1),
(176, 59, 12),
(177, 59, 0),
(178, 60, 1),
(179, 60, 12),
(180, 60, 0),
(181, 61, 1),
(182, 61, 12),
(183, 61, 0),
(184, 62, 1),
(185, 62, 11),
(186, 62, 0),
(187, 63, 1),
(188, 63, 13),
(189, 63, 0),
(190, 64, 1),
(191, 64, 12),
(192, 64, 0),
(193, 65, 1),
(194, 65, 11),
(195, 65, 0),
(196, 66, 1),
(197, 66, 13),
(198, 66, 0),
(199, 67, 1),
(200, 67, 12),
(201, 67, 0),
(202, 68, 1),
(203, 68, 11),
(204, 68, 0),
(205, 69, 1),
(206, 69, 13),
(207, 69, 0),
(208, 70, 1),
(209, 70, 12),
(210, 70, 0),
(211, 71, 1),
(212, 71, 11),
(213, 71, 0),
(214, 72, 1),
(215, 72, 13),
(216, 72, 0),
(217, 73, 2),
(218, 73, 12),
(219, 73, 0),
(220, 74, 26),
(221, 74, 12),
(222, 74, 0),
(223, 75, 26),
(224, 75, 13),
(225, 75, 0),
(226, 76, 27),
(227, 76, 11),
(228, 76, 0),
(229, 77, 27),
(230, 77, 12),
(231, 77, 0),
(232, 78, 27),
(233, 78, 13),
(234, 78, 0),
(235, 79, 26),
(236, 79, 11),
(237, 79, 0),
(238, 80, 26),
(239, 80, 12),
(240, 80, 0),
(241, 81, 26),
(242, 81, 13),
(243, 81, 0),
(244, 82, 27),
(245, 82, 11),
(246, 82, 0),
(247, 83, 27),
(248, 83, 12),
(249, 83, 0),
(250, 84, 27),
(251, 84, 13),
(252, 84, 0),
(253, 85, 26),
(254, 85, 11),
(255, 85, 0),
(256, 86, 26),
(257, 86, 12),
(258, 86, 0),
(259, 87, 26),
(260, 87, 13),
(261, 87, 0),
(262, 88, 27),
(263, 88, 11),
(264, 88, 0),
(265, 89, 27),
(266, 89, 12),
(267, 89, 0),
(268, 90, 27),
(269, 90, 13),
(270, 90, 0),
(271, 91, 26),
(272, 91, 11),
(273, 91, 0),
(274, 92, 0),
(275, 92, 0),
(276, 92, 0),
(277, 93, 1),
(278, 93, 11),
(279, 93, 8),
(280, 94, 0),
(281, 94, 0),
(282, 94, 0),
(283, 95, 0),
(284, 95, 0),
(285, 95, 0),
(286, 96, 15),
(287, 96, 11),
(288, 96, 8),
(289, 97, 1),
(290, 97, 11),
(291, 97, 0),
(292, 98, 24),
(293, 98, 12),
(294, 98, 0),
(295, 99, 26),
(296, 99, 12),
(297, 99, 0),
(298, 100, 2),
(299, 100, 12),
(300, 100, 0),
(301, 101, 24),
(302, 101, 13),
(303, 101, 0),
(304, 102, 26),
(305, 102, 12),
(306, 102, 0),
(307, 103, 25),
(308, 103, 12),
(309, 103, 0),
(310, 104, 2),
(311, 104, 13),
(312, 104, 8),
(313, 105, 15),
(314, 105, 11),
(315, 105, 8),
(316, 106, 1),
(317, 106, 11),
(318, 106, 0),
(319, 107, 0),
(320, 107, 0),
(321, 107, 0),
(322, 108, 0),
(323, 108, 0),
(324, 108, 0),
(325, 109, 0),
(326, 109, 0),
(327, 109, 0),
(328, 110, 25),
(329, 110, 13),
(330, 110, 0),
(331, 111, 24),
(332, 111, 12),
(333, 111, 8),
(334, 112, 1),
(335, 112, 11),
(336, 112, 8),
(337, 113, 2),
(338, 113, 11),
(339, 113, 0),
(340, 114, 0),
(341, 114, 0),
(342, 114, 0),
(343, 115, 1),
(344, 115, 12),
(345, 115, 8),
(346, 116, 1),
(347, 116, 11),
(348, 116, 8),
(349, 117, 1),
(350, 117, 12),
(351, 117, 8),
(352, 118, 1),
(353, 118, 11),
(354, 118, 8),
(355, 119, 0),
(356, 119, 0),
(357, 119, 0),
(358, 120, 1),
(359, 120, 12),
(360, 120, 8),
(361, 121, 1),
(362, 121, 11),
(363, 121, 0),
(364, 122, 1),
(365, 122, 12),
(366, 122, 0),
(367, 123, 2),
(368, 123, 11),
(369, 123, 0),
(370, 124, 1),
(371, 124, 12),
(372, 124, 0),
(373, 125, 2),
(374, 125, 11),
(375, 125, 0),
(376, 126, 15),
(377, 126, 13),
(378, 126, 0),
(379, 127, 24),
(380, 127, 11),
(381, 127, 0),
(382, 128, 15),
(383, 128, 13),
(384, 128, 0),
(385, 129, 24),
(386, 129, 11),
(387, 129, 0),
(388, 130, 15),
(389, 130, 13),
(390, 130, 0),
(391, 131, 24),
(392, 131, 11),
(393, 131, 0),
(394, 132, 15),
(395, 132, 13),
(396, 132, 0),
(397, 133, 24),
(398, 133, 11),
(399, 133, 0),
(400, 134, 0),
(401, 134, 0),
(402, 134, 0),
(403, 135, 0),
(404, 135, 0),
(405, 135, 0),
(406, 136, 15),
(407, 136, 12),
(408, 136, 0),
(409, 137, 2),
(410, 137, 12),
(411, 137, 0),
(412, 138, 1),
(413, 138, 13),
(414, 138, 0),
(415, 139, 24),
(416, 139, 13),
(417, 139, 9),
(418, 140, 15),
(419, 140, 12),
(420, 140, 8),
(421, 141, 24),
(422, 141, 12),
(423, 141, 8),
(424, 142, 2),
(425, 142, 12),
(426, 142, 0),
(427, 143, 24),
(428, 143, 12),
(429, 143, 8),
(430, 144, 2),
(431, 144, 12),
(432, 144, 0),
(433, 145, 1),
(434, 145, 12),
(435, 145, 0),
(436, 146, 1),
(437, 146, 11),
(438, 146, 0),
(439, 147, 2),
(440, 147, 12),
(441, 147, 0),
(442, 148, 15),
(443, 148, 11),
(444, 148, 0),
(445, 149, 2),
(446, 149, 13),
(447, 149, 0),
(448, 150, 2),
(449, 150, 13),
(450, 150, 0),
(451, 151, 15),
(452, 151, 11),
(453, 151, 0),
(454, 152, 2),
(455, 152, 13),
(456, 152, 0),
(457, 153, 0),
(458, 153, 0),
(459, 153, 0),
(460, 154, 2),
(461, 154, 11),
(462, 154, 8),
(463, 155, 25),
(464, 155, 11),
(465, 155, 0),
(466, 156, 2),
(467, 156, 11),
(468, 156, 8),
(469, 157, 25),
(470, 157, 11),
(471, 157, 0),
(472, 158, 0),
(473, 158, 0),
(474, 158, 0),
(475, 159, 0),
(476, 159, 0),
(477, 159, 0),
(478, 160, 24),
(479, 160, 12),
(480, 160, 9),
(481, 161, 15),
(482, 161, 11),
(483, 161, 8),
(484, 162, 24),
(485, 162, 12),
(486, 162, 9),
(487, 163, 15),
(488, 163, 11),
(489, 163, 0),
(490, 164, 24),
(491, 164, 12),
(492, 164, 0),
(493, 165, 15),
(494, 165, 11),
(495, 165, 9),
(496, 166, 24),
(497, 166, 12),
(498, 166, 8),
(499, 167, 1),
(500, 167, 11),
(501, 167, 8),
(502, 168, 24),
(503, 168, 12),
(504, 168, 8),
(505, 169, 1),
(506, 169, 11),
(507, 169, 8),
(508, 170, 24),
(509, 170, 12),
(510, 170, 8),
(511, 171, 1),
(512, 171, 11),
(513, 171, 8),
(514, 172, 24),
(515, 172, 12),
(516, 172, 0),
(517, 173, 15),
(518, 173, 11),
(519, 173, 9),
(520, 174, 27),
(521, 174, 0),
(522, 174, 0),
(523, 175, 26),
(524, 175, 0),
(525, 175, 0),
(526, 176, 26),
(527, 176, 12),
(528, 176, 9),
(529, 177, 26),
(530, 177, 13),
(531, 177, 0),
(532, 178, 27),
(533, 178, 11),
(534, 178, 0),
(535, 179, 27),
(536, 179, 12),
(537, 179, 0),
(538, 180, 27),
(539, 180, 13),
(540, 180, 0),
(541, 181, 26),
(542, 181, 11),
(543, 181, 0),
(544, 182, 26),
(545, 182, 0),
(546, 182, 9),
(547, 183, 26),
(548, 183, 0),
(549, 183, 0),
(550, 184, 27),
(551, 184, 0),
(552, 184, 0),
(553, 185, 27),
(554, 185, 0),
(555, 185, 0),
(556, 186, 27),
(557, 186, 0),
(558, 186, 0),
(559, 187, 26),
(560, 187, 0),
(561, 187, 0),
(562, 188, 26),
(563, 188, 12),
(564, 188, 0),
(565, 189, 26),
(566, 189, 13),
(567, 189, 0),
(568, 190, 27),
(569, 190, 11),
(570, 190, 0),
(571, 191, 27),
(572, 191, 12),
(573, 191, 0),
(574, 192, 27),
(575, 192, 13),
(576, 192, 0),
(577, 193, 26),
(578, 193, 11),
(579, 193, 0),
(580, 194, 26),
(581, 194, 12),
(582, 194, 8),
(583, 195, 26),
(584, 195, 13),
(585, 195, 0),
(586, 196, 27),
(587, 196, 11),
(588, 196, 0),
(589, 197, 27),
(590, 197, 12),
(591, 197, 0),
(592, 198, 27),
(593, 198, 13),
(594, 198, 0),
(595, 199, 26),
(596, 199, 11),
(597, 199, 0),
(598, 200, 26),
(599, 200, 12),
(600, 200, 8),
(601, 201, 26),
(602, 201, 13),
(603, 201, 9),
(604, 202, 27),
(605, 202, 11),
(606, 202, 0),
(607, 203, 27),
(608, 203, 12),
(609, 203, 0),
(610, 204, 27),
(611, 204, 13),
(612, 204, 0),
(613, 205, 26),
(614, 205, 11),
(615, 205, 0),
(616, 206, 26),
(617, 206, 12),
(618, 206, 8),
(619, 207, 26),
(620, 207, 13),
(621, 207, 0),
(622, 208, 27),
(623, 208, 11),
(624, 208, 0),
(625, 209, 27),
(626, 209, 12),
(627, 209, 0),
(628, 210, 27),
(629, 210, 13),
(630, 210, 0),
(631, 211, 26),
(632, 211, 11),
(633, 211, 0),
(634, 212, 26),
(635, 212, 12),
(636, 212, 0),
(637, 213, 26),
(638, 213, 13),
(639, 213, 0),
(640, 214, 27),
(641, 214, 11),
(642, 214, 0),
(643, 215, 27),
(644, 215, 12),
(645, 215, 0),
(646, 216, 27),
(647, 216, 13),
(648, 216, 0),
(649, 217, 26),
(650, 217, 11),
(651, 217, 0),
(652, 218, 26),
(653, 218, 12),
(654, 218, 8),
(655, 219, 26),
(656, 219, 13),
(657, 219, 0),
(658, 220, 27),
(659, 220, 11),
(660, 220, 0),
(661, 221, 27),
(662, 221, 12),
(663, 221, 0),
(664, 222, 27),
(665, 222, 13),
(666, 222, 0),
(667, 223, 26),
(668, 223, 11),
(669, 223, 0),
(670, 224, 27),
(671, 224, 0),
(672, 224, 0),
(673, 224, 39),
(674, 225, 26),
(675, 225, 0),
(676, 225, 0),
(677, 225, 40),
(678, 226, 27),
(679, 226, 0),
(680, 226, 0),
(681, 226, 0),
(682, 227, 26),
(683, 227, 0),
(684, 227, 0),
(685, 227, 0),
(686, 228, 2),
(687, 228, 0),
(688, 228, 0),
(689, 228, 39),
(690, 229, 1),
(691, 229, 0),
(692, 229, 0),
(693, 229, 40),
(694, 230, 26),
(695, 230, 12),
(696, 230, 0),
(697, 230, 0),
(698, 231, 26),
(699, 231, 13),
(700, 231, 0),
(701, 231, 0),
(702, 232, 27),
(703, 232, 11),
(704, 232, 0),
(705, 232, 0),
(706, 233, 27),
(707, 233, 12),
(708, 233, 0),
(709, 233, 0),
(710, 234, 27),
(711, 234, 13),
(712, 234, 0),
(713, 234, 0),
(714, 235, 26),
(715, 235, 11),
(716, 235, 0),
(717, 235, 0),
(718, 236, 26),
(719, 236, 12),
(720, 236, 8),
(721, 236, 0),
(722, 237, 26),
(723, 237, 13),
(724, 237, 0),
(725, 237, 0),
(726, 238, 27),
(727, 238, 11),
(728, 238, 0),
(729, 238, 0),
(730, 239, 27),
(731, 239, 12),
(732, 239, 0),
(733, 239, 0),
(734, 240, 27),
(735, 240, 13),
(736, 240, 0),
(737, 240, 0),
(738, 241, 26),
(739, 241, 11),
(740, 241, 0),
(741, 241, 0),
(742, 242, 26),
(743, 242, 12),
(744, 242, 0),
(745, 242, 0),
(746, 243, 26),
(747, 243, 13),
(748, 243, 0),
(749, 243, 0),
(750, 244, 27),
(751, 244, 11),
(752, 244, 0),
(753, 244, 0),
(754, 245, 27),
(755, 245, 12),
(756, 245, 0),
(757, 245, 0),
(758, 246, 27),
(759, 246, 13),
(760, 246, 0),
(761, 246, 0),
(762, 247, 26),
(763, 247, 11),
(764, 247, 0),
(765, 247, 0),
(766, 248, 2),
(767, 248, 0),
(768, 248, 0),
(769, 248, 39),
(770, 249, 1),
(771, 249, 0),
(772, 249, 0),
(773, 249, 40),
(774, 250, 2),
(775, 250, 0),
(776, 250, 0),
(777, 250, 39),
(778, 251, 1),
(779, 251, 0),
(780, 251, 0),
(781, 251, 40),
(782, 252, 1),
(783, 252, 0),
(784, 252, 0),
(785, 252, 39),
(786, 253, 26),
(787, 253, 12),
(788, 253, 9),
(789, 253, 0),
(790, 254, 26),
(791, 254, 13),
(792, 254, 8),
(793, 254, 0),
(794, 255, 27),
(795, 255, 11),
(796, 255, 0),
(797, 255, 0),
(798, 256, 27),
(799, 256, 12),
(800, 256, 0),
(801, 256, 0),
(802, 257, 27),
(803, 257, 13),
(804, 257, 0),
(805, 257, 0),
(806, 258, 26),
(807, 258, 11),
(808, 258, 0),
(809, 258, 0),
(810, 259, 26),
(811, 259, 12),
(812, 259, 9),
(813, 259, 0),
(814, 260, 26),
(815, 260, 13),
(816, 260, 8),
(817, 260, 0),
(818, 261, 27),
(819, 261, 11),
(820, 261, 0),
(821, 261, 0),
(822, 262, 27),
(823, 262, 12),
(824, 262, 8),
(825, 262, 0),
(826, 263, 27),
(827, 263, 13),
(828, 263, 0),
(829, 263, 0),
(830, 264, 26),
(831, 264, 11),
(832, 264, 0),
(833, 264, 0),
(834, 265, 0),
(835, 265, 0),
(836, 265, 0),
(837, 265, 0),
(838, 266, 0),
(839, 266, 0),
(840, 266, 0),
(841, 266, 0),
(842, 267, 27),
(843, 267, 12),
(844, 267, 0),
(845, 267, 0),
(846, 268, 1),
(847, 268, 11),
(848, 268, 0),
(849, 268, 0),
(850, 269, 1),
(851, 269, 12),
(852, 269, 0),
(853, 269, 0),
(854, 270, 27),
(855, 270, 11),
(856, 270, 0),
(857, 270, 0),
(858, 271, 0),
(859, 271, 0),
(860, 271, 0),
(861, 271, 0),
(862, 272, 0),
(863, 272, 0),
(864, 272, 0),
(865, 272, 0),
(866, 273, 0),
(867, 273, 0),
(868, 273, 0),
(869, 273, 0),
(870, 274, 0),
(871, 274, 0),
(872, 274, 0),
(873, 274, 0),
(874, 275, 0),
(875, 275, 0),
(876, 275, 0),
(877, 275, 0),
(878, 276, 0),
(879, 276, 0),
(880, 276, 0),
(881, 276, 0),
(882, 277, 15),
(883, 277, 12),
(884, 277, 0),
(885, 277, 0),
(886, 278, 1),
(887, 278, 12),
(888, 278, 0),
(889, 278, 0),
(890, 279, 15),
(891, 279, 13),
(892, 279, 0),
(893, 279, 0),
(894, 280, 0),
(895, 280, 0),
(896, 280, 0),
(897, 280, 0),
(898, 281, 0),
(899, 281, 0),
(900, 281, 0),
(901, 281, 0),
(902, 282, 27),
(903, 282, 0),
(904, 282, 0),
(905, 282, 40),
(906, 283, 25),
(907, 283, 0),
(908, 283, 0),
(909, 283, 39),
(910, 284, 27),
(911, 284, 0),
(912, 284, 0),
(913, 284, 40),
(914, 285, 25),
(915, 285, 0),
(916, 285, 0),
(917, 285, 39),
(918, 286, 0),
(919, 286, 0),
(920, 286, 0),
(921, 286, 0),
(922, 287, 0),
(923, 287, 0),
(924, 287, 0),
(925, 287, 0),
(926, 288, 0),
(927, 288, 0),
(928, 288, 0),
(929, 288, 0),
(930, 289, 41),
(931, 289, 0),
(932, 289, 0),
(933, 289, 0),
(934, 290, 27),
(935, 290, 0),
(936, 290, 0),
(937, 290, 0),
(938, 291, 26),
(939, 291, 12),
(940, 291, 8),
(941, 291, 0),
(942, 292, 26),
(943, 292, 13),
(944, 292, 8),
(945, 292, 0),
(946, 293, 26),
(947, 293, 11),
(948, 293, 8),
(949, 293, 0),
(950, 294, 0),
(951, 294, 0),
(952, 294, 0),
(953, 294, 0),
(954, 295, 0),
(955, 295, 0),
(956, 295, 0),
(957, 295, 0),
(958, 296, 0),
(959, 296, 0),
(960, 296, 0),
(961, 296, 0),
(962, 297, 27),
(963, 297, 0),
(964, 297, 45),
(965, 297, 0),
(966, 298, 27),
(967, 298, 0),
(968, 298, 44),
(969, 298, 0),
(970, 299, 1),
(971, 299, 47),
(972, 299, 0),
(973, 299, 0),
(974, 300, 1),
(975, 300, 48),
(976, 300, 0),
(977, 300, 0),
(978, 301, 27),
(979, 301, 47),
(980, 301, 0),
(981, 301, 0),
(982, 302, 27),
(983, 302, 48),
(984, 302, 0),
(985, 302, 0),
(986, 303, 27),
(987, 303, 49),
(988, 303, 0),
(989, 303, 0),
(990, 304, 1),
(991, 304, 46),
(992, 304, 0),
(993, 304, 0),
(994, 305, 51),
(995, 305, 0),
(996, 305, 0),
(997, 305, 0),
(998, 306, 27),
(999, 306, 0),
(1000, 306, 0),
(1001, 306, 0),
(1002, 307, 27),
(1003, 307, 0),
(1004, 307, 0),
(1005, 307, 53),
(1006, 308, 27),
(1007, 308, 0),
(1008, 308, 0),
(1009, 308, 52),
(1010, 309, 27),
(1011, 309, 0),
(1012, 309, 0),
(1013, 309, 52),
(1014, 310, 27),
(1015, 310, 0),
(1016, 310, 0),
(1017, 310, 53),
(1018, 311, 27),
(1019, 311, 0),
(1020, 311, 0),
(1021, 311, 40),
(1022, 312, 57),
(1023, 312, 0),
(1024, 312, 0),
(1025, 312, 55),
(1026, 313, 57),
(1027, 313, 0),
(1028, 313, 0),
(1029, 313, 56),
(1030, 314, 57),
(1031, 314, 0),
(1032, 314, 0),
(1033, 314, 54),
(1034, 315, 25),
(1035, 315, 0),
(1036, 315, 0),
(1037, 315, 39),
(1038, 316, 2),
(1039, 316, 0),
(1040, 316, 0),
(1041, 316, 40),
(1042, 317, 2),
(1043, 317, 0),
(1044, 317, 0),
(1045, 317, 52),
(1046, 318, 2),
(1047, 318, 0),
(1048, 318, 0),
(1049, 318, 39),
(1050, 319, 0),
(1051, 319, 0),
(1052, 319, 0),
(1053, 319, 0),
(1054, 320, 0),
(1055, 320, 0),
(1056, 320, 0),
(1057, 320, 0),
(1058, 321, 0),
(1059, 321, 0),
(1060, 321, 0),
(1061, 321, 0),
(1062, 322, 0),
(1063, 322, 0),
(1064, 322, 0),
(1065, 322, 0),
(1066, 323, 0),
(1067, 323, 0),
(1068, 323, 0),
(1069, 323, 0),
(1070, 324, 0),
(1071, 324, 0),
(1072, 324, 0),
(1073, 324, 0),
(1074, 325, 69),
(1075, 325, 0),
(1076, 325, 0),
(1077, 325, 0),
(1078, 325, 61),
(1079, 326, 69),
(1080, 326, 0),
(1081, 326, 0),
(1082, 326, 0),
(1083, 326, 62),
(1084, 327, 69),
(1085, 327, 0),
(1086, 327, 0),
(1087, 327, 0),
(1088, 327, 59),
(1089, 328, 69),
(1090, 328, 0),
(1091, 328, 0),
(1092, 328, 0),
(1093, 328, 63),
(1094, 329, 69),
(1095, 329, 0),
(1096, 329, 0),
(1097, 329, 0),
(1098, 329, 64),
(1099, 330, 69),
(1100, 330, 0),
(1101, 330, 0),
(1102, 330, 0),
(1103, 330, 60),
(1104, 331, 69),
(1105, 331, 0),
(1106, 331, 0),
(1107, 331, 0),
(1108, 331, 65),
(1109, 332, 69),
(1110, 332, 0),
(1111, 332, 0),
(1112, 332, 0),
(1113, 332, 66),
(1114, 333, 69),
(1115, 333, 0),
(1116, 333, 0),
(1117, 333, 0),
(1118, 333, 67),
(1119, 334, 69),
(1120, 334, 0),
(1121, 334, 0),
(1122, 334, 0),
(1123, 334, 68),
(1124, 335, 69),
(1125, 335, 0),
(1126, 335, 0),
(1127, 335, 0),
(1128, 335, 58),
(1129, 336, 15),
(1130, 336, 12),
(1131, 336, 0),
(1132, 336, 0),
(1133, 336, 0),
(1134, 337, 1),
(1135, 337, 12),
(1136, 337, 0),
(1137, 337, 0),
(1138, 337, 0),
(1139, 338, 15),
(1140, 338, 12),
(1141, 338, 0),
(1142, 338, 0),
(1143, 338, 0),
(1144, 339, 1),
(1145, 339, 12),
(1146, 339, 0),
(1147, 339, 0),
(1148, 339, 0),
(1149, 340, 15),
(1150, 340, 12),
(1151, 340, 0),
(1152, 340, 0),
(1153, 340, 0),
(1154, 341, 0),
(1155, 341, 0),
(1156, 341, 0),
(1157, 341, 0),
(1158, 341, 0),
(1159, 342, 0),
(1160, 342, 0),
(1161, 342, 0),
(1162, 342, 0),
(1163, 342, 0),
(1164, 343, 1),
(1165, 343, 11),
(1166, 343, 8),
(1167, 343, 39),
(1168, 343, 58),
(1169, 344, 57),
(1170, 344, 12),
(1171, 344, 8),
(1172, 344, 39),
(1173, 344, 58),
(1174, 345, 57),
(1175, 345, 12),
(1176, 345, 8),
(1177, 345, 39),
(1178, 345, 58),
(1179, 346, 57),
(1180, 346, 12),
(1181, 346, 8),
(1182, 346, 39),
(1183, 346, 58),
(1184, 347, 1),
(1185, 347, 11),
(1186, 347, 8),
(1187, 347, 39),
(1188, 347, 58),
(1189, 348, 1),
(1190, 348, 11),
(1191, 348, 8),
(1192, 348, 39),
(1193, 348, 58),
(1194, 349, 1),
(1195, 349, 11),
(1196, 349, 8),
(1197, 349, 39),
(1198, 349, 58),
(1199, 350, 57),
(1200, 350, 0),
(1201, 350, 0),
(1202, 350, 0),
(1203, 350, 0),
(1204, 351, 57),
(1205, 351, 0),
(1206, 351, 0),
(1207, 351, 0),
(1208, 351, 0),
(1209, 352, 57),
(1210, 352, 0),
(1211, 352, 0),
(1212, 352, 0),
(1213, 352, 0),
(1214, 353, 57),
(1215, 353, 0),
(1216, 353, 0),
(1217, 353, 0),
(1218, 353, 0),
(1219, 354, 1),
(1220, 354, 0),
(1221, 354, 0),
(1222, 354, 0),
(1223, 354, 0),
(1224, 355, 57),
(1225, 355, 0),
(1226, 355, 0),
(1227, 355, 0),
(1228, 355, 0),
(1229, 356, 1),
(1230, 356, 0),
(1231, 356, 0),
(1232, 356, 0),
(1233, 356, 0),
(1234, 357, 27),
(1235, 357, 0),
(1236, 357, 0),
(1237, 357, 0),
(1238, 357, 0),
(1239, 358, 57),
(1240, 358, 0),
(1241, 358, 0),
(1242, 358, 0),
(1243, 358, 0),
(1244, 359, 1),
(1245, 359, 0),
(1246, 359, 0),
(1247, 359, 0),
(1248, 359, 0),
(1249, 360, 27),
(1250, 360, 0),
(1251, 360, 0),
(1252, 360, 0),
(1253, 360, 0),
(1254, 361, 57),
(1255, 361, 0),
(1256, 361, 0),
(1257, 361, 0),
(1258, 361, 0),
(1259, 362, 1),
(1260, 362, 0),
(1261, 362, 0),
(1262, 362, 0),
(1263, 362, 0),
(1264, 363, 27),
(1265, 363, 0),
(1266, 363, 0),
(1267, 363, 0),
(1268, 363, 0),
(1269, 364, 69),
(1270, 364, 0),
(1271, 364, 0),
(1272, 364, 0),
(1273, 364, 61),
(1274, 365, 69),
(1275, 365, 0),
(1276, 365, 0),
(1277, 365, 0),
(1278, 365, 62),
(1279, 366, 69),
(1280, 366, 0),
(1281, 366, 0),
(1282, 366, 0),
(1283, 366, 59),
(1284, 367, 69),
(1285, 367, 0),
(1286, 367, 0),
(1287, 367, 0),
(1288, 367, 63),
(1289, 368, 69),
(1290, 368, 0),
(1291, 368, 0),
(1292, 368, 0),
(1293, 368, 64),
(1294, 369, 69),
(1295, 369, 0),
(1296, 369, 0),
(1297, 369, 0),
(1298, 369, 60),
(1299, 370, 69),
(1300, 370, 0),
(1301, 370, 0),
(1302, 370, 0),
(1303, 370, 65),
(1304, 371, 69),
(1305, 371, 0),
(1306, 371, 0),
(1307, 371, 0),
(1308, 371, 66),
(1309, 372, 69),
(1310, 372, 0),
(1311, 372, 0),
(1312, 372, 0),
(1313, 372, 67),
(1314, 373, 69),
(1315, 373, 0),
(1316, 373, 0),
(1317, 373, 0),
(1318, 373, 68),
(1319, 374, 69),
(1320, 374, 0),
(1321, 374, 0),
(1322, 374, 0),
(1323, 374, 58),
(1324, 375, 69),
(1325, 375, 0),
(1326, 375, 0),
(1327, 375, 0),
(1328, 375, 61),
(1329, 376, 1),
(1330, 376, 0),
(1331, 376, 0),
(1332, 376, 0),
(1333, 376, 62),
(1334, 377, 2),
(1335, 377, 0),
(1336, 377, 0),
(1337, 377, 0),
(1338, 377, 59),
(1339, 378, 24),
(1340, 378, 0),
(1341, 378, 0),
(1342, 378, 0),
(1343, 378, 63),
(1344, 379, 57),
(1345, 379, 0),
(1346, 379, 0),
(1347, 379, 0),
(1348, 379, 64),
(1349, 380, 69),
(1350, 380, 0),
(1351, 380, 0),
(1352, 380, 0),
(1353, 380, 60),
(1354, 381, 69),
(1355, 381, 0),
(1356, 381, 0),
(1357, 381, 0),
(1358, 381, 65),
(1359, 382, 69),
(1360, 382, 0),
(1361, 382, 0),
(1362, 382, 0),
(1363, 382, 66),
(1364, 383, 69),
(1365, 383, 0),
(1366, 383, 0),
(1367, 383, 0),
(1368, 383, 67),
(1369, 384, 69),
(1370, 384, 0),
(1371, 384, 0),
(1372, 384, 0),
(1373, 384, 68),
(1374, 385, 69),
(1375, 385, 0),
(1376, 385, 0),
(1377, 385, 0),
(1378, 385, 58),
(1379, 386, 69),
(1380, 386, 0),
(1381, 386, 0),
(1382, 386, 0),
(1383, 386, 61),
(1384, 387, 1),
(1385, 387, 0),
(1386, 387, 0),
(1387, 387, 0),
(1388, 387, 62),
(1389, 388, 2),
(1390, 388, 0),
(1391, 388, 0),
(1392, 388, 0),
(1393, 388, 59),
(1394, 389, 24),
(1395, 389, 0),
(1396, 389, 0),
(1397, 389, 0),
(1398, 389, 63),
(1399, 390, 57),
(1400, 390, 0),
(1401, 390, 0),
(1402, 390, 0),
(1403, 390, 64),
(1404, 391, 24),
(1405, 391, 0),
(1406, 391, 0),
(1407, 391, 0),
(1408, 391, 60),
(1409, 392, 69),
(1410, 392, 0),
(1411, 392, 0),
(1412, 392, 0),
(1413, 392, 65),
(1414, 393, 69),
(1415, 393, 0),
(1416, 393, 0),
(1417, 393, 0),
(1418, 393, 66),
(1419, 394, 69),
(1420, 394, 0),
(1421, 394, 0),
(1422, 394, 0),
(1423, 394, 67),
(1424, 395, 69),
(1425, 395, 0),
(1426, 395, 0),
(1427, 395, 0),
(1428, 395, 68),
(1429, 396, 69),
(1430, 396, 0),
(1431, 396, 0),
(1432, 396, 0),
(1433, 396, 58),
(1434, 397, 69),
(1435, 397, 0),
(1436, 397, 0),
(1437, 397, 0),
(1438, 397, 61),
(1439, 398, 1),
(1440, 398, 0),
(1441, 398, 0),
(1442, 398, 0),
(1443, 398, 62),
(1444, 399, 2),
(1445, 399, 0),
(1446, 399, 0),
(1447, 399, 0),
(1448, 399, 59),
(1449, 400, 24),
(1450, 400, 0),
(1451, 400, 0),
(1452, 400, 0),
(1453, 400, 63),
(1454, 401, 57),
(1455, 401, 0),
(1456, 401, 0),
(1457, 401, 0),
(1458, 401, 64),
(1459, 402, 24),
(1460, 402, 0),
(1461, 402, 0),
(1462, 402, 0),
(1463, 402, 60),
(1464, 403, 69),
(1465, 403, 0),
(1466, 403, 0),
(1467, 403, 0),
(1468, 403, 65),
(1469, 404, 69),
(1470, 404, 0),
(1471, 404, 0),
(1472, 404, 0),
(1473, 404, 66),
(1474, 405, 69),
(1475, 405, 0),
(1476, 405, 0),
(1477, 405, 0),
(1478, 405, 67),
(1479, 406, 69),
(1480, 406, 0),
(1481, 406, 0),
(1482, 406, 0),
(1483, 406, 68),
(1484, 407, 69),
(1485, 407, 0),
(1486, 407, 0),
(1487, 407, 0),
(1488, 407, 58),
(1489, 408, 69),
(1490, 408, 0),
(1491, 408, 0),
(1492, 408, 0),
(1493, 408, 61),
(1494, 409, 1),
(1495, 409, 0),
(1496, 409, 0),
(1497, 409, 0),
(1498, 409, 62),
(1499, 410, 2),
(1500, 410, 0),
(1501, 410, 0),
(1502, 410, 0),
(1503, 410, 59),
(1504, 411, 24),
(1505, 411, 0),
(1506, 411, 0),
(1507, 411, 0),
(1508, 411, 63),
(1509, 412, 57),
(1510, 412, 0),
(1511, 412, 0),
(1512, 412, 0),
(1513, 412, 64),
(1514, 413, 24),
(1515, 413, 0),
(1516, 413, 0),
(1517, 413, 0),
(1518, 413, 60),
(1519, 414, 69),
(1520, 414, 0),
(1521, 414, 0),
(1522, 414, 0),
(1523, 414, 65),
(1524, 415, 69),
(1525, 415, 0),
(1526, 415, 0),
(1527, 415, 0),
(1528, 415, 66),
(1529, 416, 69),
(1530, 416, 0),
(1531, 416, 0),
(1532, 416, 0),
(1533, 416, 67),
(1534, 417, 69),
(1535, 417, 0),
(1536, 417, 0),
(1537, 417, 0),
(1538, 417, 68),
(1539, 418, 69),
(1540, 418, 0),
(1541, 418, 0),
(1542, 418, 0),
(1543, 418, 58),
(1544, 419, 69),
(1545, 419, 0),
(1546, 419, 0),
(1547, 419, 0),
(1548, 419, 61),
(1549, 420, 1),
(1550, 420, 0),
(1551, 420, 0),
(1552, 420, 0),
(1553, 420, 62),
(1554, 421, 2),
(1555, 421, 0),
(1556, 421, 0),
(1557, 421, 0),
(1558, 421, 59),
(1559, 422, 24),
(1560, 422, 0),
(1561, 422, 0),
(1562, 422, 0),
(1563, 422, 63),
(1564, 423, 57),
(1565, 423, 0),
(1566, 423, 0),
(1567, 423, 0),
(1568, 423, 64),
(1569, 424, 24),
(1570, 424, 0),
(1571, 424, 0),
(1572, 424, 0),
(1573, 424, 60),
(1574, 425, 69),
(1575, 425, 0),
(1576, 425, 0),
(1577, 425, 0),
(1578, 425, 65),
(1579, 426, 69),
(1580, 426, 0),
(1581, 426, 0),
(1582, 426, 0),
(1583, 426, 66),
(1584, 427, 27),
(1585, 427, 0),
(1586, 427, 45),
(1587, 427, 0),
(1588, 427, 0),
(1589, 428, 27),
(1590, 428, 0),
(1591, 428, 0),
(1592, 428, 40),
(1593, 428, 66),
(1594, 429, 1),
(1595, 429, 0),
(1596, 429, 0),
(1597, 429, 39),
(1598, 429, 65);

-- --------------------------------------------------------

--
-- Table structure for table `variation_type`
--

CREATE TABLE `variation_type` (
  `VariationTypeID` int(11) NOT NULL,
  `VariationTypeName` varchar(100) NOT NULL COMMENT 'color,size,material'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variation_type`
--

INSERT INTO `variation_type` (`VariationTypeID`, `VariationTypeName`) VALUES
(15, 'color'),
(16, 'size'),
(18, 'material'),
(21, 'storage'),
(22, 'Device');

-- --------------------------------------------------------

--
-- Table structure for table `variation_value`
--

CREATE TABLE `variation_value` (
  `VariationID` int(11) NOT NULL,
  `VariationTypeID` int(11) NOT NULL,
  `VariationName` varchar(100) NOT NULL,
  `Variation_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variation_value`
--

INSERT INTO `variation_value` (`VariationID`, `VariationTypeID`, `VariationName`, `Variation_image`) VALUES
(1, 15, 'red', 'redicon.jpg'),
(2, 15, 'yellow', 'yellowicon.png'),
(8, 18, 'Silk', NULL),
(9, 18, 'Cotton', NULL),
(11, 16, 'L', NULL),
(12, 16, 'M', NULL),
(13, 16, 'XXL', NULL),
(15, 15, 'Green', 'green.jpg'),
(24, 15, 'pink', '1698731897_88d4062e7c63fea80de2.jpg'),
(25, 15, 'turquoise', '1698731817_b255c478e75ce716c0d2.jpg'),
(26, 15, 'Gold', '1698998336_b3cda23c9f1ebd788c39.webp'),
(27, 15, 'Black', '1698998657_0ca2c43a9cfcc88bff49.jpg'),
(39, 21, '128gb', ''),
(40, 21, '256gb', ''),
(41, 15, 'White', '1703660173_1e0feaf10479332b04f4.png'),
(42, 18, 'Velvet', ''),
(43, 18, 'stretchable', ''),
(44, 18, 'Stainless Steel', ''),
(45, 18, 'Silicon ', ''),
(46, 16, '7', ''),
(47, 16, '8', ''),
(48, 16, '9', ''),
(49, 16, '10', ''),
(50, 16, '11', ''),
(51, 15, 'Brown', '1703679176_d36e8ac13ab8115a7644.jpg'),
(52, 21, '512 Gb', ''),
(53, 21, '1 Tb', ''),
(54, 21, '8gb + 512gb', ''),
(55, 21, '8gb + 1tb', ''),
(56, 21, '16gb + 512gb', ''),
(57, 15, 'Shining Silver', '1703741400_be8cb7fe070930909d26.png'),
(58, 22, 'Iphone 13', ''),
(59, 22, 'Iphone 14', ''),
(60, 22, 'Iphone 15', ''),
(61, 22, 'Iphone 13 pro', ''),
(62, 22, 'Iphone 13 pro max', ''),
(63, 22, 'Iphone 14 pro', ''),
(64, 22, 'Iphone 14 pro max', ''),
(65, 22, 'Iphone 15 pro', ''),
(66, 22, 'Iphone 15 pro max', ''),
(67, 22, 'Samsung s23', ''),
(68, 22, 'Samsung s23 ultra', ''),
(69, 15, 'Transparent', '1703746496_e449e7f3a229e6703e5b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `ProductID` varchar(200) NOT NULL,
  `UserID` varchar(200) NOT NULL,
  `Status` int(11) DEFAULT 1 COMMENT '1-Wished , 0-Unwished'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `ProductID`, `UserID`, `Status`) VALUES
(1642, '43', '85', 1),
(1653, '80', '85', 1),
(1655, '62', '96', 1),
(1657, '90', '93', 1),
(1662, '86', '83', 1),
(1668, '43', '83', 1),
(1672, '63', '100', 1),
(1683, '61', '93', 1),
(1684, '61', '83', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_settings`
--
ALTER TABLE `all_settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`BannerID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `ParentCategoryID` (`ParentCategoryID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`CmsID`);

--
-- Indexes for table `cms_faq`
--
ALTER TABLE `cms_faq`
  ADD PRIMARY KEY (`FaqID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- Indexes for table `email_smtp`
--
ALTER TABLE `email_smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`EnquiriID`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`FaqID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OrderItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `order_comment`
--
ALTER TABLE `order_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`PageID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `payment_getway`
--
ALTER TABLE `payment_getway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`),
  ADD UNIQUE KEY `RoleSlug` (`RoleSlug`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`SEOID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`SettingID`);

--
-- Indexes for table `shipping_data`
--
ALTER TABLE `shipping_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`MethodID`);

--
-- Indexes for table `shipping_rates`
--
ALTER TABLE `shipping_rates`
  ADD PRIMARY KEY (`RateID`);

--
-- Indexes for table `shipping_zones`
--
ALTER TABLE `shipping_zones`
  ADD PRIMARY KEY (`ZoneID`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`TaxID`);

--
-- Indexes for table `taxe_class`
--
ALTER TABLE `taxe_class`
  ADD PRIMARY KEY (`taxe_class_id`);

--
-- Indexes for table `templatcategories`
--
ALTER TABLE `templatcategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `templatcategoriesdata`
--
ALTER TABLE `templatcategoriesdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`templateID`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`TestimonialID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`VariationID`);

--
-- Indexes for table `VariationsDetails`
--
ALTER TABLE `VariationsDetails`
  ADD PRIMARY KEY (`VariationsDetailsID`);

--
-- Indexes for table `variation_type`
--
ALTER TABLE `variation_type`
  ADD PRIMARY KEY (`VariationTypeID`);

--
-- Indexes for table `variation_value`
--
ALTER TABLE `variation_value`
  ADD PRIMARY KEY (`VariationID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_settings`
--
ALTER TABLE `all_settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `BannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=647;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `CmsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `cms_faq`
--
ALTER TABLE `cms_faq`
  MODIFY `FaqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `email_smtp`
--
ALTER TABLE `email_smtp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `EnquiriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `FaqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `order_comment`
--
ALTER TABLE `order_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `PageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `payment_getway`
--
ALTER TABLE `payment_getway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `SEOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `SettingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_data`
--
ALTER TABLE `shipping_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `MethodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping_rates`
--
ALTER TABLE `shipping_rates`
  MODIFY `RateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shipping_zones`
--
ALTER TABLE `shipping_zones`
  MODIFY `ZoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `TaxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `taxe_class`
--
ALTER TABLE `taxe_class`
  MODIFY `taxe_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `templatcategories`
--
ALTER TABLE `templatcategories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templatcategoriesdata`
--
ALTER TABLE `templatcategoriesdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `templateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `TestimonialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `VariationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT for table `VariationsDetails`
--
ALTER TABLE `VariationsDetails`
  MODIFY `VariationsDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1599;

--
-- AUTO_INCREMENT for table `variation_type`
--
ALTER TABLE `variation_type`
  MODIFY `VariationTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `variation_value`
--
ALTER TABLE `variation_value`
  MODIFY `VariationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1685;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
