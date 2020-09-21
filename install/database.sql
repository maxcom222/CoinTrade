-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 03:05 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradex`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendingbalance` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD Admin', 'admin@web.com', 'admin', '$2y$10$7AyPH7hCzfC6S9yKArpVg.BRXykOo3Yai2oMCPxv9TNvDBc7rRCiK', 'FQZMHFSkFwBzjrh1kM7xhGlSNfQOupAJCXgQIYxGhexCdYBPXYyrWsr0OzvB', NULL, '2017-12-31 13:55:57'),
(2, 'MD Pial', 'pial@web.com', 'pial', '$2y$10$HSfWwAkowoDwj27A7d5AduhQ.GnER72sOvpuGKxjorjFfvRP9ubSu', 'UH9jdLNiUPSh2CSpyYrZO2KunNttbIrh9riXV6WP6TC6qTCuAZYmFbwDxA2U', NULL, '2017-12-31 13:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(10) UNSIGNED NOT NULL,
  `coinid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `coinid`, `name`, `symbol`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ethereum', 'Ethereum', 'ETH', '941.225', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(2, 'ripple', 'Ripple', 'XRP', '1.15283', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(3, 'bitcoin-cash', 'Bitcoin Cash', 'BCH', '1362.08', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(4, 'litecoin', 'Litecoin', 'LTC', '234.221', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(5, 'cardano', 'Cardano', 'ADA', '0.40752', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(6, 'stellar', 'Stellar', 'XLM', '0.458701', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(7, 'neo', 'NEO', 'NEO', '124.467', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(8, 'eos', 'EOS', 'EOS', '10.1517', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(9, 'iota', 'IOTA', 'MIOTA', '2.08278', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(10, 'dash', 'Dash', 'DASH', '687.091', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(11, 'nem', 'NEM', 'XEM', '0.577457', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(12, 'monero', 'Monero', 'XMR', '280.06', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(13, 'lisk', 'Lisk', 'LSK', '30.1993', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(14, 'ethereum-classic', 'Ethereum Classic', 'ETC', '34.4861', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(15, 'tron', 'TRON', 'TRX', '0.0467903', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(16, 'vechain', 'VeChain', 'VEN', '5.31768', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(17, 'qtum', 'Qtum', 'QTUM', '33.1852', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(18, 'tether', 'Tether', 'USDT', '1.00423', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(19, 'bitcoin-gold', 'Bitcoin Gold', 'BTG', '130.527', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(20, 'icon', 'ICON', 'ICX', '4.50396', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(21, 'omisego', 'OmiseGO', 'OMG', '15.7965', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(22, 'zcash', 'Zcash', 'ZEC', '482.994', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(23, 'raiblocks', 'Nano', 'XRB', '8.91578', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(24, 'steem', 'Steem', 'STEEM', '4.51359', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(25, 'binance-coin', 'Binance Coin', 'BNB', '10.7461', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(26, 'bytecoin-bcn', 'Bytecoin', 'BCN', '0.00557051', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(27, 'populous', 'Populous', 'PPT', '26.0737', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(28, 'stratis', 'Stratis', 'STRAT', '9.50313', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(29, 'verge', 'Verge', 'XVG', '0.0585141', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(30, 'dogecoin', 'Dogecoin', 'DOGE', '0.00760829', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(31, 'siacoin', 'Siacoin', 'SC', '0.0260746', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(32, 'rchain', 'RChain', 'RHOC', '2.26459', '2018-02-15 00:36:57', '2018-02-15 00:36:57'),
(33, 'status', 'Status', 'SNT', '0.23121', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(34, 'bitshares', 'BitShares', 'BTS', '0.272958', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(35, 'maker', 'Maker', 'MKR', '1142.45', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(36, 'waves', 'Waves', 'WAVES', '6.87396', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(37, 'veritaseum', 'Veritaseum', 'VERI', '313.869', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(38, 'aeternity', 'Aeternity', 'AE', '2.64639', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(39, 'walton', 'Waltonchain', 'WTC', '24.641', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(40, 'augur', 'Augur', 'REP', '53.6646', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(41, 'hshare', 'Hshare', 'HSR', '13.5877', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(42, 'komodo', 'Komodo', 'KMD', '5.44851', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(43, 'decred', 'Decred', 'DCR', '83.0015', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(44, 'revain', 'Revain', 'R', '2.96304', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(45, 'zclassic', 'ZClassic', 'ZCL', '164.773', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(46, '0x', '0x', 'ZRX', '1.06573', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(47, 'kucoin-shares', 'KuCoin Shares', 'KCS', '5.74951', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(48, 'ardor', 'Ardor', 'ARDR', '0.520549', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(49, 'ucash', 'U.CASH', 'UCASH', '0.059398', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(50, 'ark', 'Ark', 'ARK', '4.89259', '2018-02-15 00:36:58', '2018-02-15 00:36:58'),
(51, 'revain', 'Revain', 'R', '2.70345', '2018-02-15 00:36:58', '2018-02-15 00:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `coinwallets`
--

CREATE TABLE `coinwallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `coin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trxid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcam` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(2) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docms`
--

CREATE TABLE `docms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'exchange@thebitcell.com', 'Hello {{name}} ,\r\n\r\n{{message}}', 'http:///fjklsdjflkjsdlf/sjkfahjksdafllsad{{message}}', '2017-12-22 23:30:51', '2018-02-15 05:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ques` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `ques`, `ans`, `created_at`, `updated_at`) VALUES
(15, 'Mauris nec sapien ut venenatis facilisis?', '<font color=\"#292d4e\"><span style=\"font-size: 16px;\">Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.</span></font>', '2018-01-24 18:27:14', '2018-02-17 01:00:56'),
(16, 'Mauris nec sapien ut orci venenatis facilisis?', 'Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.', '2018-01-24 18:30:52', '2018-01-24 18:30:52'),
(17, 'Mauris nec sapien ut orci venenatis facilisis?', 'Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.', '2018-01-24 18:31:04', '2018-01-24 18:31:04'),
(18, 'Mauris nec sapien ut orci venenatis facilisis?', 'Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.', '2018-01-24 18:31:15', '2018-01-24 18:31:15'),
(19, 'Mauris nec sapien ut orci venenatis facilisis?', 'Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.', '2018-01-24 18:31:24', '2018-01-24 18:31:24'),
(20, 'Mauris nec sapien ut orci venenatis facilisis?', 'Integer mollis dui vehicula egestas faucibus. Vivamus condimentum maximus urna, vel faucibus diam accumsan eget. Cras consequat libero ligula, eget maximus lectus tincidunt.', '2018-01-24 18:31:33', '2018-01-24 18:31:33'),
(21, 'Mauris nec sapien ut venenatis facilisis?', '<font color=\"#292d4e\"><span style=\"font-size: 16px;\">Integer mollis dui \r\nvehicula egestas faucibus. Vivamus condimentum maximus urna, vel \r\nfaucibus diam accumsan eget. Cras consequat libero ligula, eget maximus \r\nlectus tincidunt</span></font>', '2018-02-17 01:01:59', '2018-02-17 01:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `gateimg`, `minamo`, `maxamo`, `chargefx`, `chargepc`, `rate`, `val1`, `val2`, `val3`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '5a7096056c84c.png', '5', '10000', '0.5', '2.5', '74', 'rexrifat636@gmail.com', NULL, NULL, 'USD', 1, NULL, '2018-01-31 19:06:26'),
(2, 'Perfect Money', '5a70960f7c1c7.png', '20', '20000', '2', '1', '80', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', NULL, 'USD', 1, NULL, '2018-01-31 18:58:06'),
(3, 'BlockChain', '5a70961c5783f.png', '10', '20000', '1', '0.5', '81', 'YOUR API KEY FROM BLOCKCHAIN.INFO', 'YOUR XPUB FROM BLOCKCHAIN.INFO', NULL, 'BTC', 1, NULL, '2018-01-31 20:09:59'),
(4, 'Stripe', '5a70962b480dc.jpg', '10', '50000', '3', '3', '85', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, 'USD', 1, NULL, '2018-01-30 21:58:35'),
(5, 'Skrill', '5a70963c08257.jpg', '10', '50000', '3', '3', '85', 'merchant@skrill', 'TheSoftKing', NULL, 'USD', 1, NULL, '2018-02-01 17:44:38'),
(6, 'Coingate', '5a709647b797a.jpg', '10', '50000', '3', '3', '85', '1257', '8wbQIWcXyRu1AHiJqtEhTY', 'Hr7LqFM83aJsZgbIVkoUW2Q4cGvlB05n', 'USD', 1, NULL, '2018-02-13 07:36:19'),
(7, 'Coin Payment', '5a709659027e1.jpg', '0', '0', '0', '0', '78', 'db1d9f12444e65c921604e289a281c56', NULL, NULL, 'BTC', 1, NULL, '2018-01-30 21:59:21'),
(8, 'Block IO', '5a70966f55b80.jpg', '0', '0', '0', '0', '78', '947f-f0ba-ab2f-610c', '09876softk', NULL, 'BTC', 1, '2018-01-27 18:00:00', '2018-02-01 17:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Website',
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sub Title',
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '336699',
  `cur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `cursym` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$',
  `reg` int(11) NOT NULL DEFAULT '1',
  `emailver` int(11) NOT NULL DEFAULT '1',
  `smsver` int(11) NOT NULL DEFAULT '1',
  `decimal` int(11) NOT NULL DEFAULT '2',
  `emailnotf` int(11) NOT NULL DEFAULT '1',
  `smsnotf` int(11) NOT NULL DEFAULT '1',
  `startdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concrg` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refcom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `title`, `subtitle`, `color`, `cur`, `cursym`, `reg`, `emailver`, `smsver`, `decimal`, `emailnotf`, `smsnotf`, `startdate`, `concrg`, `refcom`, `created_at`, `updated_at`) VALUES
(1, 'CoinTrade', 'Exchange - Coin', '009933', 'BITCOIN', 'BTC', 1, 1, 1, 6, 0, 0, '2017-12-29', '3.5', '2', '2017-12-19 06:19:47', '2018-02-17 04:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `interfs`
--

CREATE TABLE `interfs` (
  `id` int(10) UNSIGNED NOT NULL,
  `abdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sthead` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ftcon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interfs`
--

INSERT INTO `interfs` (`id`, `abdesc`, `stdesc`, `sthead`, `ftcon`, `created_at`, `updated_at`) VALUES
(1, 'Working with Bitwallet is as easy as 1.2.3... Open Free Bitwallet account, get Free wallet, Buy or Deposit your Bitcoins and start real time trading and converting Bitcoins to 15 or more Digital assets inside Bitwallet&nbsp;Exchange Portal. Bitwallet&nbsp;Exchange is almost 20 times more faster than other wallets and exchanges in comparison. Lowest possible exchange rates, Ultra fast currency conversion and Ultra fast sending and receiving Bitcoins. Withdraw or sell your Digital assets against USD and withdraw in any bank account world-wide with $0.00 sending fees. .', 'Bitwallet&nbsp; being launched on January 01, 2018 will start Buying, Selling, Sending, Receiving and Converting Bitcoins to Fiat currency. Before end of January 2018, BitCell planning to add more than 15 Crypto Currencies trading on it\'s portal. BitCell will operate Bitcoins, Litecoin, Ether, Ripple, Dodge, Litecoin, Bitcoin Cash, Bitcoin Gold and many more currencies.', 'Servicec We DO', 'CoinTrade @ All Rights Reserved', '2017-12-19 06:26:14', '2018-02-17 04:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_11_000000_create_generals_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_12_11_061115_create_admins_table', 1),
(5, '2017_12_11_061116_create_admin_password_resets_table', 1),
(6, '2017_12_11_124235_create_etemplates_table', 1),
(7, '2017_12_12_065651_create_gateways_table', 1),
(8, '2017_12_13_110540_create_deposits_table', 1),
(9, '2017_12_14_111540_create_withdraws_table', 1),
(10, '2017_12_17_070938_create_sliders_table', 1),
(11, '2017_12_17_105510_create_services_table', 1),
(12, '2017_12_17_113709_create_stats_table', 1),
(13, '2017_12_17_115511_create_testms_table', 1),
(14, '2017_12_17_122527_create_payms_table', 1),
(15, '2017_12_19_120842_create_interfs_table', 2),
(16, '2017_12_23_092753_create_docms_table', 3),
(17, '2017_12_23_105910_create_mgateways_table', 4),
(18, '2017_12_23_110848_create_mdeposits_table', 5),
(19, '2017_12_24_064840_create_wmethods_table', 6),
(20, '2017_12_24_140800_create_addresses_table', 7),
(21, '2017_12_25_055249_create_transactions_table', 8),
(22, '2017_12_26_130945_create_converts_table', 9),
(23, '2017_12_27_061544_create_translogs_table', 10),
(24, '2017_12_28_051611_create_products_table', 11),
(25, '2017_12_28_155147_create_returnlogs_table', 12),
(26, '2017_12_28_174133_create_solds_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `small`, `large`, `created_at`, `updated_at`) VALUES
(1, 'credit-card', 'Buy Bitcoins using Credit Card', 'CREDIT CARD ACCEPTED', '2017-12-28 15:37:17', '2018-02-17 00:42:20'),
(2, 'university', 'Convert and transfer to any bank', 'FREE BANK TRANSFER', '2017-12-28 15:37:58', '2017-12-31 04:09:08'),
(3, 'money', 'Online Transaction Online Transaction Online', 'Online Transaction', '2018-02-17 00:42:42', '2018-02-17 00:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `small`, `large`, `created_at`, `updated_at`) VALUES
(1, '5a455e5e7fdee.jpg', 'Banner Image', 'CRYPTO CURRENCY EXCHANGE', '2017-12-26 23:27:04', '2018-02-15 09:13:27'),
(2, '5a455e81ac886.jpg', 'FREE', 'BITCOIN WALLET', '2017-12-28 15:13:37', '2017-12-31 04:21:27'),
(3, '5a48212b829cd.jpg', 'FAUCET TABLET', 'Earn Free Money with Faucet Wallet', '2017-12-31 04:25:33', '2017-12-31 04:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testms`
--

CREATE TABLE `testms` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testms`
--

INSERT INTO `testms` (`id`, `photo`, `name`, `company`, `star`, `comment`, `created_at`, `updated_at`) VALUES
(1, '5a87d27441f5c.jpg', 'Jhon DOe', 'BityTTA', '3', 'Haka jkah adhjhsaddhasjk sajfhdddsahfkh', '2018-02-17 00:57:56', '2018-02-17 00:57:56'),
(2, '5a87d29807d38.jpg', 'Jahyal JAa', 'Hanfrto', '5', 'Takjadjf TYdasjdfh safd sdfhjk', '2018-02-17 00:58:32', '2018-02-17 00:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `time` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmations` int(11) NOT NULL,
  `txid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translogs`
--

CREATE TABLE `translogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `trxid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tauth` int(11) NOT NULL,
  `tfver` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `emailv` int(11) DEFAULT NULL,
  `smsv` int(11) DEFAULT NULL,
  `vsent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secretcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docv` int(11) DEFAULT NULL,
  `refid` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wdid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinwallets`
--
ALTER TABLE `coinwallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docms`
--
ALTER TABLE `docms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interfs`
--
ALTER TABLE `interfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testms`
--
ALTER TABLE `testms`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `translogs`
--
ALTER TABLE `translogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coinwallets`
--
ALTER TABLE `coinwallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docms`
--
ALTER TABLE `docms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testms`
--
ALTER TABLE `testms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translogs`
--
ALTER TABLE `translogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
