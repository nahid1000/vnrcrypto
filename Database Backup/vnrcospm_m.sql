-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2019 at 05:03 AM
-- Server version: 10.1.41-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnrcospm_m`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `session`) VALUES
(1, 'admin', 'earnmyself2@gmail.com', '$2y$12$A5SmMITnQc0EVk3URZCjHuvj6HZAbh2/7Ku.Y.uC7gRXFvtz6XIli', 'be5c196de1b784d3626f4dc2b269eb13');

-- --------------------------------------------------------

--
-- Table structure for table `miners`
--

CREATE TABLE `miners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profit` decimal(16,8) NOT NULL,
  `credited` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miners`
--

INSERT INTO `miners` (`id`, `name`, `profit`, `credited`) VALUES
(1, '4', '0.00004500', '2019-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `txid` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `value` decimal(16,8) NOT NULL,
  `deposit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fin` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `txid`, `status`, `value`, `deposit_date`, `fin`) VALUES
(1, 'sohel2013', 'CPDF4HGQ8EYTVHX1RDYKY2NYCZ', '0', '0.03000000', '2019-06-23 08:04:04', 'no'),
(2, 'sohel2013', 'CPDF4GLILUUPRLEKPLHHQTL0PK', '0', '0.03000000', '2019-06-23 08:06:04', 'no'),
(3, 'sohel2013', 'CPDF1NDMSRFAJW87JB77JGJLXT', '0', '0.00450000', '2019-06-23 14:49:04', 'no'),
(4, 'sohel2013', 'CPDF1TSPBVMB41SM66IDOXFVZ5', '100', '0.00186500', '2019-06-23 15:04:04', 'yes'),
(5, '', '24b360d99568186a3dd4590d72a94a11e9199fe534e3321b4635b375d17a50bc', '2', '0.00000000', '2019-06-25 16:58:04', 'no'),
(6, 'sohel2013', 'CPDF5X0ZYHDDJRORUUNQC4OEIK', '100', '0.00272200', '2019-06-25 19:25:04', 'yes'),
(7, '', '376a21ec2f26664aac2d76266d3eb6ef34ffd582b28017260478781185b24312', '2', '0.00000000', '2019-07-02 12:36:04', 'no'),
(8, 'deloar1989', 'CPDG5DQFLWM9LGZW8DZJ1E9HHZ', '0', '0.03000000', '2019-07-24 10:40:04', 'no'),
(9, 'aron1357', 'CPDH7EKFHIYDDU4PSBPNP8ZAOE', '0', '0.03000000', '2019-08-13 16:56:04', 'no'),
(10, 'hsmomo78', 'CPDI0KBIEVV30SFCTUYOC7JSLH', '0', '0.00080000', '2019-09-01 19:40:50', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `value` decimal(16,8) NOT NULL,
  `profit` decimal(16,8) DEFAULT NULL,
  `end` date NOT NULL,
  `author` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'pending',
  `buy_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `value`, `profit`, `end`, `author`, `status`, `buy_date`) VALUES
(1, 'VNR PRO', '0.00450000', '0.00004500', '2020-06-24', '4', 'active', '2019-06-25 19:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `plans_setting`
--

CREATE TABLE `plans_setting` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_percent` float NOT NULL DEFAULT '1',
  `plan_profit` decimal(16,8) NOT NULL DEFAULT '10.00000000',
  `plan_duration` int(11) NOT NULL DEFAULT '30',
  `plan_price` decimal(16,8) NOT NULL DEFAULT '100.00000000',
  `plan_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans_setting`
--

INSERT INTO `plans_setting` (`id`, `plan_name`, `plan_percent`, `plan_profit`, `plan_duration`, `plan_price`, `plan_image`) VALUES
(11, 'VNR PRO', 1, '0.00004500', 365, '0.00450000', 'gpu2.png'),
(12, 'VNR FLEXY', 1, '0.00009000', 365, '0.00900000', 'gpu2.png'),
(13, 'VNR TURBO', 1, '0.00045000', 365, '0.04500000', '615Uqj6Z1TL._SX425_.jpg'),
(15, 'VNR BOOM', 1, '0.00090000', 365, '0.09000000', 'gpu3.png');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `id` int(11) NOT NULL,
  `withdrawals` float NOT NULL,
  `lottery` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `who_refer` varchar(256) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `username`, `who_refer`, `created_date`) VALUES
(2, 'sazzad', 'sohel2013', '2019-06-23 12:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `home_subtitle` text NOT NULL,
  `home_join` text NOT NULL,
  `home_invest` text NOT NULL,
  `home_about_short` text NOT NULL,
  `home_plans_description` text NOT NULL,
  `free_miner` int(11) NOT NULL DEFAULT '0',
  `recaptcha_public` varchar(255) NOT NULL,
  `recaptcha_secret` varchar(255) NOT NULL,
  `cp_merchant` varchar(255) NOT NULL,
  `cp_secret` varchar(255) NOT NULL,
  `cp_debug_email` varchar(255) NOT NULL,
  `free_miner_profit` decimal(16,8) NOT NULL DEFAULT '1.00000000',
  `free_miner_end` int(11) NOT NULL DEFAULT '10',
  `referral_com` int(11) NOT NULL,
  `min_payout` decimal(16,8) NOT NULL DEFAULT '100.00000000',
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `about_text` text NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_secure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `logo`, `currency`, `home_subtitle`, `home_join`, `home_invest`, `home_about_short`, `home_plans_description`, `free_miner`, `recaptcha_public`, `recaptcha_secret`, `cp_merchant`, `cp_secret`, `cp_debug_email`, `free_miner_profit`, `free_miner_end`, `referral_com`, `min_payout`, `facebook`, `instagram`, `twitter`, `street`, `email`, `telephone`, `about_text`, `smtp_host`, `smtp_user`, `smtp_password`, `smtp_port`, `smtp_secure`) VALUES
(1, 'VNRCRYPTO MINER', 'VNRCRYPTO MINER is a cloud-based crypto miner', 'PicsArt_06-22-05.24.50.png', 'Bitcoin', 'VNRCRYPTO MINER makes mining Cryptocurrency accessible to everyone.', 'Start mining today! Your mining rigs are already set up and running. As soon as your payment is received, you can start mining and receive your first coins.', 'vnrcrypto is a cloud mining service which are best providers of computational power for mining bitcoin, and other cryptocurrencies.', 'vnrcrypto is a cloud mining service created by specialists from Bitcoins in 2018. In a short time, vnrcrypto became one of the largest providers of computational power for mining bitcoin,  and other cryptocurrencies.\r\n', 'We are heavily investing in the best available hardware to stay at the edge of technology. For you, it is the easiest way of mining: no need to assemble rigs or to have hot, loud miners in your home.\r\n', 0, '6LeyKaoUAAAAAKcLTRIU-cy55aWtjQY5A1QRTk5E', '6LeyKaoUAAAAAK6fMXH_z9_AxJFLS4BHbqy1sCah', '3089f16275c9ef22547d181250dce545', 'vnrcrypto88894094', 'support@vnrcrypto.com', '1.00000000', 10, 10, '20.00000000', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'vnrcrypto.com', 'contact@vnrcrypto.com', '090090090', 'VNRcrypto is a cloud mining service created by specialists from Bitcoins in 2018. In a short time, vnrcrypto became one of the largest providers of computational power for mining bitcoin,  and other cryptocurrencies', 'server126.web-hosting.com', 'support@vnrcrypto.com', 'vnr@123', '465', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `supported_coins`
--

CREATE TABLE `supported_coins` (
  `id` int(11) NOT NULL,
  `coin_full` varchar(255) NOT NULL,
  `coin_short` varchar(255) NOT NULL,
  `coin_icon` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supported_coins`
--

INSERT INTO `supported_coins` (`id`, `coin_full`, `coin_short`, `coin_icon`, `active`) VALUES
(1, 'Bitcoin', 'BTC', 'btc.png', 0),
(2, 'Litecoin', 'LTC', 'ltc.png', 0),
(3, 'Bitcoin Cash', 'BCH', 'bch.png', 0),
(4, 'Bytecoin', 'BCN', 'bcn.png', 0),
(5, 'Bean Cash', 'BITB', 'bitb.png', 0),
(6, 'BlackCoin', 'BLK', 'blk.png', 0),
(7, 'Bitcoin SV', 'BSV', 'bsv.png', 0),
(8, 'Bitcoin Adult', 'BTAD', 'btad.png', 0),
(9, 'Bitcoin Gold', 'BTG', 'btg.png', 0),
(10, 'BitTorrent', 'BTT', 'btt.png', 0),
(11, 'Dash', 'DASH', 'dash.png', 0),
(12, 'Decred', 'DCR', 'dcr.png', 0),
(13, 'DigiByte', 'DGB', 'dgb.png', 0),
(14, 'Dogecoin', 'DOGE', 'doge.png', 1),
(15, 'Ether Classic', 'ETC', 'etc.png', 0),
(16, 'Ethereum', 'ETH', 'eth.png', 0),
(17, 'Electroneum', 'ETN', 'etn.png', 0),
(18, 'Komod', 'KMD', 'kmd.png', 0),
(19, 'LISK', 'LSK', 'lsk.png', 0),
(20, 'NEO', 'NEO', 'neo.png', 0),
(21, 'NXT', 'NXT', 'nxt.png', 0),
(22, 'Omni', 'OMNI', 'omni.png', 0),
(23, 'PinkCoin', 'PINK', 'pink.png', 0),
(24, 'PIVX', 'PIVX', 'pivx.png', 0),
(25, 'PotCoin', 'POT', 'pot.png', 0),
(26, 'PeerCoin', 'PPC', 'ppc.png', 0),
(27, 'TRON', 'TRX', 'trx.png', 0),
(28, 'Tether', 'USDT', 'usdt.png', 0),
(29, 'Waves', 'WAVES', 'waves.png', 0),
(30, 'Vertcoin', 'VTC', 'vtc.png', 0),
(31, 'NEM', 'XEM', 'xem.png', 0),
(32, 'Monero', 'XMR', 'xmr.png', 0),
(33, 'Verge', 'XVG', 'xvg.png', 0),
(34, 'Zcash', 'ZEC', 'zec.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_answers`
--

CREATE TABLE `ticket_answers` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_user_id` int(11) NOT NULL,
  `ticket_message` text NOT NULL,
  `ticket_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticket_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `balance` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `total_deposit` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `earnings` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `experience` int(11) NOT NULL DEFAULT '0',
  `referral_id` varchar(256) NOT NULL,
  `payment_address` varchar(256) NOT NULL DEFAULT 'Junior',
  `logged_in` varchar(256) DEFAULT 'No',
  `sessionid` varchar(256) DEFAULT NULL,
  `register_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip`, `username`, `email`, `password`, `balance`, `total_deposit`, `earnings`, `experience`, `referral_id`, `payment_address`, `logged_in`, `sessionid`, `register_date`) VALUES
(1, '::1', 'testuser', 'testuser@gmail.com', '$2y$12$8z1/Asrr21LZ9Lesfot.gOTgNHUd88.8dahh7hlyTbH3H/zqR3snW', '0.00000000', '0.00000000', '0.00000000', 0, 'testuser', 'Junior', 'Yes', '', '2019-03-28 08:40:46'),
(2, '49.35.40.107', 'digitaltechzone', 'freetech.host@gmail.com', '$2y$12$7CtX5Zgvy13hlbs55Tk2teVEyLqWgTpkPw/e7Gs1W1kOl/meEqK8W', '0.00000000', '0.00000000', '0.00000000', 0, 'digitaltechzone', 'No Address', 'No', NULL, '2019-06-22 14:07:47'),
(3, '123.136.117.227', 'tnvr12', 'jobsmy65@gmail.com', '$2y$12$QaMNtZ0gEpOy82mH0Tx/K.Q7Cv3Oj5GQIk9PJg3Inbb.yzq8JmQQO', '0.00000000', '0.00000000', '0.00000000', 0, 'tnvr12', 'No Address', 'No', NULL, '2019-06-22 15:33:49'),
(4, '14.192.208.187', 'sohel2013', 'sohelofficial09@gmail.com', '$2y$12$A.Yr9OzuaKSIs5dCghk4.eHdCRCWiQzxouTCE1tvsGClCow0O7ogO', '0.00314700', '0.00458700', '0.00000000', 0, 'sohel2013', 'sohelofficial09@gmail.com', 'No', '', '2019-06-23 07:57:01'),
(5, '38.132.116.179', 'sazzad', 'sazzadjewel2@gmail.com', '$2y$12$OZcg4wE4lLX1BNB/nOAdIuJMrr3SHQOHIl3TcAd6dAEkJ2nDwwwey', '0.00000000', '0.00000000', '0.00000000', 0, 'sazzad', '3GBL4PqZ2KKVEvSrJGbRCbs7vTC1uqtxhu', 'No', '', '2019-06-23 12:36:29'),
(6, '103.25.249.233', 'ashik mahmud', 'ashikrocky90@gmail.com', '$2y$12$906wQn2GKxcLPZquZ5lgq.UGSYNXXzSXO6zOJjeg2YJIdFiEglwQq', '0.00000000', '0.00000000', '0.00000000', 0, 'ashik mahmud', '3AuJXvtjfnoqkSWb1ZKEco7e1LJP1iLorY', 'No', '', '2019-06-23 14:48:20'),
(7, '43.224.112.10', 'apurbo', 'apurbo1212@gmai.com', '$2y$12$17up5DmN8Gcq1pDjYELPduuRpyOaEHSnEbu/SPs9CF2DVLun6KidK', '0.00000000', '0.00000000', '0.00000000', 0, 'apurbo', 'No Address', 'No', NULL, '2019-06-24 19:54:50'),
(8, '106.203.62.116', 'nima', 'dmncrptbcks@gmail.com', '$2y$12$oDI6b4/ahNd1NvybTJsDaeTDsms5zLLdEp9spO6h27TzL/KDkJoTy', '0.00000000', '0.00000000', '0.00000000', 0, 'nima', 'No Address', 'No', NULL, '2019-07-12 16:58:19'),
(9, '103.83.128.196', 'deloar1989', 'deloarksd@gmail.com', '$2y$12$ar7d1SP6.HLBciC6YjrCe.PfFGO8UBLuwh0qf05RmFibWzDwJhsaW', '0.00000000', '0.00000000', '0.00000000', 0, 'deloar1989', '36xF54Hf6X1o53qtPL4g5NfSwrzUCNNyMZ', 'No', '', '2019-07-24 10:29:49'),
(10, '103.220.205.18', 'nusratjetu', 'nusratjetu@gmail.com', '$2y$12$nNAPaGVUqaYmp0l342GCI.g.MqE44wDwKSX2.SRwrfoZNyS8GwMfi', '0.00000000', '0.00000000', '0.00000000', 0, 'nusratjetu', 'No Address', 'No', NULL, '2019-07-30 08:36:22'),
(11, '105.112.98.149', 'felix', 'admin@bit-profit.ltd', '$2y$12$UeJrp37UtZOZ0qzG16t7ieJP490UCIIC958StLBCNun1limod1fey', '0.00000000', '0.00000000', '0.00000000', 0, 'felix', 'No Address', 'No', NULL, '2019-08-01 16:23:45'),
(12, '119.30.39.232', 'akondo012', 'shahinakando012@gmail.com', '$2y$12$mlvIK4hrlcVANU1eBwAy5uGohLcKt1/9O1UJKU8cG2eKKDmAKXLoK', '0.00000000', '0.00000000', '0.00000000', 0, 'akondo012', '1PppJCRRtvknZEAVw7gCSbzKxYmqXLaLWX', 'No', '', '2019-08-07 15:22:14'),
(13, '188.53.205.93', 'aron1357', 'cokkabd@gmail.com', '$2y$12$ExEVeBWE7A0ofaW/fdl9WuvcHnXUHEfim11DD0Ono73BZnDRhWtPi', '0.00000000', '0.00000000', '0.00000000', 0, 'aron1357', 'Yfkydtkstkstosktdylcylflydyd', 'No', '', '2019-08-13 16:42:58'),
(14, '103.228.3.118', 'shov', 'incometk9070@gmail.com', '$2y$12$T4K/phXWDo7uE6NjTR.MzeuDIVR9MWRU8SZYjUPtqKeMrZnePeOJ2', '0.00000000', '0.00000000', '0.00000000', 0, 'shov', 'No Address', 'No', NULL, '2019-08-17 11:39:51'),
(15, '103.217.177.205', 'volkovy', 'volkovy375@gmail.com', '$2y$12$DXbKgKcYvtmUjNvP5pgU/.xL81eaA9jJ1/ODrQxCmHyuyAcccAEku', '0.00000000', '0.00000000', '0.00000000', 0, 'volkovy', 'No Address', 'No', NULL, '2019-08-24 21:31:56'),
(16, '115.164.184.20', 'nahid', 'nahdidit1000@gmail.com', '$2y$12$Va01a8mQdyhXbFcIJMLefuSGPOpDcb4cWLbPW/8xYTdQYjPl6toCK', '0.00000000', '0.00000000', '0.00000000', 0, 'nahid', 'No Address', 'No', NULL, '2019-08-28 17:07:20'),
(17, '103.113.196.153', 'sams', 'samimsadman1@gmail.com', '$2y$12$SQ.JqMa4NLCbatY9Z3FLqO1CctEo5BhjAp0oVH.1bcJfZPdX.Kpuy', '0.00000000', '0.00000000', '0.00000000', 0, 'sams', 'No Address', 'No', '', '2019-09-01 13:23:57'),
(18, '113.210.69.140', 'hsmomo78', 'hsmomo78@gmail.com', '$2y$12$KTXJYuvStcf34wLdQrBa9O0y/masKYplr4RSqGzDTfR5ChBV3eBzO', '0.00000000', '0.00000000', '0.00000000', 0, 'hsmomo78', 'No Address', 'No', '', '2019-09-01 17:28:18'),
(19, '113.210.176.71', 'mdzamansh', 'mdzamansh@gmail.com', '$2y$12$5d.Mf8o6Q9DdLRgXe3sCv.g6xB8wblOU66eoaC5BhHu.pQze13Ssi', '0.00000000', '0.00000000', '0.00000000', 0, 'mdzamansh', '15j7JUnF3B2UHbtXxnsNry8i9SroT429hd', 'No', '', '2019-09-01 19:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` decimal(16,8) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miners`
--
ALTER TABLE `miners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans_setting`
--
ALTER TABLE `plans_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supported_coins`
--
ALTER TABLE `supported_coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_answers`
--
ALTER TABLE `ticket_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `miners`
--
ALTER TABLE `miners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans_setting`
--
ALTER TABLE `plans_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supported_coins`
--
ALTER TABLE `supported_coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_answers`
--
ALTER TABLE `ticket_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
