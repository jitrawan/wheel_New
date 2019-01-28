-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2019 at 06:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `autonumber`
--

CREATE TABLE `autonumber` (
  `item_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `finance_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `quotation_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `invoice_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `year` int(4) UNSIGNED ZEROFILL NOT NULL,
  `month` int(2) UNSIGNED ZEROFILL NOT NULL,
  `day` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autonumber`
--

INSERT INTO `autonumber` (`item_number`, `finance_number`, `quotation_number`, `invoice_number`, `year`, `month`, `day`) VALUES
(0005, 0001, 0001, 0001, 2019, 01, 27);

-- --------------------------------------------------------

--
-- Table structure for table `backup_logs`
--

CREATE TABLE `backup_logs` (
  `backup_key` varchar(32) NOT NULL,
  `backup_file` varchar(256) NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_key` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `backup_logs`
--

INSERT INTO `backup_logs` (`backup_key`, `backup_file`, `backup_date`, `user_key`) VALUES
('68dcd2bc4c89bfdf39bb9e195b134944', '2018-12-16.bk.sql', '2018-12-16 10:02:57', 'd97530f6437e7ffa3a74afe46a953a15');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`) VALUES
(1, 'Apollo'),
(2, 'BF Goodrich'),
(3, 'Brigestone'),
(4, 'Continental'),
(5, 'Dunlop'),
(6, 'Goodyear'),
(7, 'Hankook'),
(8, 'Kumho'),
(9, 'Michelin'),
(10, 'Pirelli'),
(11, 'Toyo'),
(12, 'Yokohama');

-- --------------------------------------------------------

--
-- Table structure for table `cancelesd_reserve`
--

CREATE TABLE `cancelesd_reserve` (
  `canceles_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_create` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cancelesd_reserve`
--

INSERT INTO `cancelesd_reserve` (`canceles_key`, `reserve_code`, `user_create`, `date_create`) VALUES
('4e68858a40b7f4fd4d22fff557aec55b', 'CX46XQTV', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-20 00:34:08'),
('5538dac6790e07e08e64883858d980cb', 'CX46XQTV', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-22 09:55:59'),
('d7c7db26792e40156c303f1a23a0aadb', 'C3G9MBB', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-22 10:00:09'),
('eaed2fb4ad1177ca16852cd38b773337', 'C91F2NNO', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-22 09:59:49'),
('eea899fb00523ffb176c78d01f68ebf7', 'C91F2NNO', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-22 10:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `card_key` char(32) NOT NULL,
  `card_code` varchar(16) NOT NULL,
  `card_customer_name` varchar(64) NOT NULL,
  `card_customer_lastname` varchar(64) NOT NULL,
  `card_customer_address` text NOT NULL,
  `card_customer_phone` varchar(128) NOT NULL,
  `card_customer_email` varchar(128) NOT NULL,
  `card_note` text NOT NULL,
  `card_done_aprox` date NOT NULL,
  `user_key` varchar(32) NOT NULL,
  `card_status` varchar(32) NOT NULL,
  `card_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`card_key`, `card_code`, `card_customer_name`, `card_customer_lastname`, `card_customer_address`, `card_customer_phone`, `card_customer_email`, `card_note`, `card_done_aprox`, `user_key`, `card_status`, `card_insert`) VALUES
('269ed8e1ae6280700cb24d09ef4bc5b9', 'C5TECHMG', 'จิตวรรณ', 'ชุมไพร', '1231546', '02315885', '', '', '0000-00-00', '', '', '2018-12-23 01:41:28'),
('36c5245c6b1baa481b571937a1178962', 'C3G9M', 'จิตรวรรณ', 'ชุมไพร', '111', '0917099645', 'jitrawan.ch@gmail.com', '', '2018-12-27', 'd97530f6437e7ffa3a74afe46a953a15', '89da7d193f3c67e4310f50cbb5b36b90', '2018-12-23 01:28:25'),
('4d99d49c8e64ec2ae28b1d172b80dd21', 'C5TECHMG', 'จิตวรรณ', 'ชุมไพร', '1231546', '02315885', '', '', '0000-00-00', '', '', '2018-12-23 01:39:03'),
('70c0795afc119fff4bcd0324a4a5d0cd', 'CX6JCS9S', 'ddd', 'hhh', 'rrrr', '03125456468', 'jitrawan.ch@mail.com', '', '2018-12-05', 'd97530f6437e7ffa3a74afe46a953a15', '89da7d193f3c67e4310f50cbb5b36b90', '2018-12-23 01:25:01'),
('c3e8f1271e436ba52cff0be2caba0542', 'C7YAGW6N', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 09:22:13'),
('1761aed90bab1a1e0febc58fc3ed33ea', 'CJH8LPKR', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 09:23:08'),
('d898f2a7ccd1cf417a137f3bb26ff51b', 'CPXCLSHU', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 09:25:52'),
('13f8f003c4d584e1afb5f976a013b58c', 'CJZBZFCS', 'จิตรวรรณ', 'ุชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 09:48:05'),
('9a49e28639ddbfa759f006b5ef9d5deb', 'C1JZ2BB', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 09:51:53'),
('c86a98f1a6f1111fccaf8510f5708676', 'C724YJCO', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 11:32:44'),
('cb44fd899d224bcf50272424790f06c2', 'CCLY3FXM', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 11:34:27'),
('7466c48df5ef9e6003cc938c03a08416', 'C123WYNX', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 11:37:25'),
('425acf9089286ec8812106e251927a27', 'C0ZIWOBB', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 11:38:46'),
('249a34f21493d43fd938516bedd9c167', 'CWB8RNLZ', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 11:42:14'),
('b28b89eacf1cff46a0ba701234eb5b9d', 'CIBJMMF4', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 12:34:26'),
('e473fe32ec89aa8e39de920ba83ff566', 'CHIQC5AA', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 12:39:29'),
('afdd32eea8456e0afea67fd1035d54a1', 'C9GIRN4S', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 12:40:30'),
('44ed20702d3c530b6126d785220bb5b0', 'C75SMTBK', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 12:49:43'),
('1620abd31b11a5dcde4bef2340f9bd9c', 'CDIJIJ7G', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '0000-00-00', '', '', '2018-12-28 12:51:03'),
('3a43bff1576af6f025491a81c5f0ff58', 'CB8JRS', 'จิตรวรรณ', 'ชุมไพร', '', '0917099645', '', '', '2019-01-01', 'd97530f6437e7ffa3a74afe46a953a15', '89da7d193f3c67e4310f50cbb5b36b90', '2018-12-28 12:54:31'),
('80309f383f4df29fa78d7a6d8d2132e0', 'CGIIRGI4', 'dd', 'ddd', '', '0917099645', '', '', '0000-00-00', '', '', '2019-01-16 10:22:21'),
('1e50bcb43fa726862e5ff16de18d7d88', 'CXF6CT5L', 'ddd', 'jjjj', '', '0907099645', '', '', '0000-00-00', '', '', '2019-01-16 10:28:19'),
('f35b2cd0122c206c29300c80099ad27e', 'COVCQOVR', 'dddd', 'tttt', '', '0917099645', '', '', '2019-01-31', 'd97530f6437e7ffa3a74afe46a953a15', 'c382e352e2e620a3c60a2cc7c6a7fa35', '2019-01-16 11:19:31'),
('c7b2efcbba69334e850168bb2d240cce', 'C6PV4430', 'tttt', 'nnnn', '', '0917099645', '', '', '0000-00-00', '', '', '2019-01-17 03:37:25'),
('e74d9a7ceadd0345ca279e8586a34c18', 'CGK3BIW9', 'ddd', 'tttt', '', '0917099645', '', '', '0000-00-00', '', '', '2019-01-17 07:16:09'),
('6b75ab4f163a160bf706dd59351a3e39', 'C95UV1SK', 'กก', 'รรรร', '', '0917099645', '', '', '0000-00-00', '', '', '2019-01-17 08:06:33'),
('0b1f9c18eca478b7d8b5248dd134034a', 'CVVCZT1X', 'กก', 'ัััรรรร', '', '0917099645', '', '', '2019-01-25', 'd97530f6437e7ffa3a74afe46a953a15', 'c382e352e2e620a3c60a2cc7c6a7fa35', '2019-01-18 03:12:18'),
('4c95fc26ea495e95c30b6cd26b611c5a', 'CQ7E11O7', 'fddd', 'hhhh', '', '0915556685', '', '', '0000-00-00', '', '', '2019-01-22 06:36:17'),
('f3904411c127a366c04c1b1b6dc2b818', 'CGRCRB0S', 'กกก', 'สสสสสส', '', '855855224', '', '', '0000-00-00', '', '', '2019-01-22 06:50:58'),
('e5b284a99fd206f05edff77d1fcf620c', 'C8PL35A4', 'ดกดกหดกหด', 'ยยยย', '', '52505554426', '', '', '0000-00-00', '', '', '2019-01-22 06:53:55'),
('81635c4752139e96ae81489411691587', 'CNENRU2S', 'กดหดหกด', 'ดเดกเกดเ', '', '02250252552', '', '', '0000-00-00', '', '', '2019-01-22 06:56:06'),
('f3877dde3d9b0ea28310f8b867c615e0', 'CVIZYYLQ', 'ddd', 'eee', '', '0917099645', '', '', '0000-00-00', '', '', '2019-01-27 06:53:36'),
('e196e2f0abb1edc7c0a9cded4b306604', 'COCXQUWM', 'ggg', 'iiii', '', '09090909009', '', '', '0000-00-00', '', '', '2019-01-27 06:56:24'),
('8d858f553a01c0766a1a41c1d73a6857', 'CA7ZIFI4', 'ddd', 'ggg', '', '09188945', '', '', '0000-00-00', '', '', '2019-01-27 07:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `card_item`
--

CREATE TABLE `card_item` (
  `item_key` char(32) NOT NULL,
  `card_key` varchar(32) NOT NULL,
  `item_number` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_note` text NOT NULL,
  `item_price_aprox` float NOT NULL,
  `item_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reserve_key` char(32) NOT NULL,
  `reseve_item_key` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_item`
--

INSERT INTO `card_item` (`item_key`, `card_key`, `item_number`, `item_name`, `item_note`, `item_price_aprox`, `item_insert`, `reserve_key`, `reseve_item_key`, `item_amt`) VALUES
('024d75e03b15f0efccd9a5b9a8eac11f', '70c0795afc119fff4bcd0324a4a5d0cd', 18120002, 'คีบรอ์ด', 'กดไม่ติด', 500, '2018-12-23 01:25:53', '', '', 0),
('070ebc49288ab33d53bf9ee635e581cc', '36c5245c6b1baa481b571937a1178962', 18120004, 'คอม', 'เปิดไม่ติด', 20000, '2018-12-23 02:26:32', '', '', 0),
('2dac17f9272938c71754347abc36920d', '36c5245c6b1baa481b571937a1178962', 18120003, 'คอม', 'เปิดไม่ติด', 20000, '2018-12-23 02:08:18', '', '', 0),
('b283fcf33c02f02f53abcf9b58534054', '70c0795afc119fff4bcd0324a4a5d0cd', 18120001, 'คอม', 'เปิดไม่ติด', 20000, '2018-12-23 01:25:31', '', '', 0),
('d3ec3e0947a6078c08a8af978e6873bd', '36c5245c6b1baa481b571937a1178962', 18120005, 'คีบรอ์ด', 'เปิดไม่ติด', 20000, '2018-12-23 03:36:26', '', '', 0),
('2070c17e157f4b10b7ef6d54fc87745b', '9a49e28639ddbfa759f006b5ef9d5deb', 18120001, 'ยาง Continental มือ2 ขอบ19', 'แตก', 500, '2018-12-28 11:22:00', '5eef8cccd98683ba0fcbed56882bc750', 'P0002', 0),
('5d867656425c7445f20eb4c4ad584c09', '9a49e28639ddbfa759f006b5ef9d5deb', 18120002, 'ยาง Continental มือ2 ขอบ19', 'แตก', 500, '2018-12-28 11:23:31', '5eef8cccd98683ba0fcbed56882bc750', 'P0002', 0),
('e38271d7c8498d74b18fe31be08caa59', '9a49e28639ddbfa759f006b5ef9d5deb', 18120003, 'ยาง Continental มือ2 ขอบ19', 'แตก', 500, '2018-12-28 11:29:40', '5eef8cccd98683ba0fcbed56882bc750', 'P0002', 0),
('d52702f6c01fcf7fbfa0c706a9f5892c', 'c86a98f1a6f1111fccaf8510f5708676', 18120004, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 500, '2018-12-28 11:32:57', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('adf7150a00c25ee2b11a52b21cdb3fe7', 'cb44fd899d224bcf50272424790f06c2', 18120005, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 500, '2018-12-28 11:34:35', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('afeabfd99a26502c249c4bb8826e8727', '7466c48df5ef9e6003cc938c03a08416', 18120006, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 500, '2018-12-28 11:37:33', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('23bcbbdcc25f563ac5c8379c3db429c3', '425acf9089286ec8812106e251927a27', 18120007, 'ล้อแม๊ก มือ2 ขอบ15', 'มีรอย', 500, '2018-12-28 11:38:57', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('be1cc2cef925c700ee848e34a1e7f72d', '249a34f21493d43fd938516bedd9c167', 18120008, 'ล้อแม๊ก มือ2 ขอบ15', 'มีรอย', 500, '2018-12-28 11:42:27', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('dbcbb6fc9c628c9ea2c63d80851135b0', 'b28b89eacf1cff46a0ba701234eb5b9d', 18120009, 'ล้อแม๊ก มือ2 ขอบ15', 'มีรอย', 0, '2018-12-28 12:34:33', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('c0a92762cf1c4ac817b46d8b4c9790a6', 'b28b89eacf1cff46a0ba701234eb5b9d', 18120010, 'ล้อแม๊ก มือ2 ขอบ15', 'มีรอย', 0, '2018-12-28 12:37:46', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('7c93593dfadd695f9019f973d777ac36', 'b28b89eacf1cff46a0ba701234eb5b9d', 18120011, 'ล้อแม๊ก มือ2 ขอบ15', 'มีรอย', 0, '2018-12-28 12:39:03', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('c2633d4931740f6b8587dce16cb360fc', 'e473fe32ec89aa8e39de920ba83ff566', 18120012, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 500, '2018-12-28 12:39:38', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('60c2c2d3d8fdba1f4403f687297490a8', 'afdd32eea8456e0afea67fd1035d54a1', 18120013, 'ล้อแม๊ก มือ2 ขอบ15', 'แตก', 0, '2018-12-28 12:40:36', '5eef8cccd98683ba0fcbed56882bc750', 'P0001', 0),
('ce9193771f9be7a890935b805f1f9fce', '44ed20702d3c530b6126d785220bb5b0', 18120014, 'ยาง Apollo มือ1 ขอบ14', 'มีรอย', 0, '2018-12-28 12:49:51', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('fe2e04e6555cb98b4cfbdb8b53fedf4e', '1620abd31b11a5dcde4bef2340f9bd9c', 18120015, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 0, '2018-12-28 12:51:20', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('27e4583f41dcc77dece5be7212d830a8', '1620abd31b11a5dcde4bef2340f9bd9c', 18120016, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 0, '2018-12-28 12:53:21', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('f4e235eb07deaa86df6fae5d9ad69dd6', '3a43bff1576af6f025491a81c5f0ff58', 18120017, 'ยาง Apollo มือ1 ขอบ14', 'แตก', 0, '2018-12-28 12:54:38', '5eef8cccd98683ba0fcbed56882bc750', 'P0004', 0),
('ce8e05defe4ced41a98c57428dd6d4e9', '1e50bcb43fa726862e5ff16de18d7d88', 19010001, 'ยาง Continental มือ2 ขอบ19', 'test', 0, '2019-01-16 10:28:26', '5eef8cccd98683ba0fcbed56882bc750', 'P0002', 0),
('760eda25fa643643809cc097b4813d24', 'f35b2cd0122c206c29300c80099ad27e', 19010002, 'ยาง Continental มือ2 ขอบ19', 'test', 0, '2019-01-16 11:35:20', '5eef8cccd98683ba0fcbed56882bc750', 'P0002', 2),
('3daa6e4328e65f2e2f5648e008bac882', '0b1f9c18eca478b7d8b5248dd134034a', 19010003, 'ล้อแม๊ก มือ2 ขอบ15', 'แตก', 500, '2019-01-18 03:13:04', 'cff400f26e166cea0a1220fbdd26e9cb', 'P0001', 1),
('c5d92661e2017fca27450f0458b3d5a7', '4c95fc26ea495e95c30b6cd26b611c5a', 19010004, 'ยาง Continental มือ2 ขอบ19', 'เปิดไม่ติด', 200, '2019-01-22 06:49:03', '16c53ed54b87ae4709488fa65e9699d2', 'P0002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `card_status`
--

CREATE TABLE `card_status` (
  `cstatus_key` char(32) NOT NULL,
  `card_key` varchar(32) NOT NULL,
  `card_status` varchar(32) NOT NULL,
  `card_status_note` text NOT NULL,
  `user_key` varchar(32) NOT NULL,
  `cstatus_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_status`
--

INSERT INTO `card_status` (`cstatus_key`, `card_key`, `card_status`, `card_status_note`, `user_key`, `cstatus_insert`) VALUES
('1aa258162771611265fc205b2543a8a8', '70c0795afc119fff4bcd0324a4a5d0cd', '89da7d193f3c67e4310f50cbb5b36b90', '', 'd97530f6437e7ffa3a74afe46a953a15', '2018-12-23 01:26:11'),
('e652db533ed13a0a11a26bb20d6e81b3', '36c5245c6b1baa481b571937a1178962', '89da7d193f3c67e4310f50cbb5b36b90', '', 'd97530f6437e7ffa3a74afe46a953a15', '2018-12-23 09:41:41'),
('6e572d1bdc67414df71cd831365e7ce7', '3a43bff1576af6f025491a81c5f0ff58', '89da7d193f3c67e4310f50cbb5b36b90', '', 'd97530f6437e7ffa3a74afe46a953a15', '2018-12-30 08:15:28'),
('b440dfb345e9b3107dd3b9247b91fbdd', 'f35b2cd0122c206c29300c80099ad27e', 'c382e352e2e620a3c60a2cc7c6a7fa35', '', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-17 03:24:22'),
('c539a5c818622e6dc9de42e01eed2d11', '0b1f9c18eca478b7d8b5248dd134034a', 'c382e352e2e620a3c60a2cc7c6a7fa35', '', 'd97530f6437e7ffa3a74afe46a953a15', '2019-01-18 03:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `ctype_key` char(32) NOT NULL,
  `ctype_name` varchar(128) NOT NULL,
  `ctype_color` varchar(16) NOT NULL,
  `ctype_status` tinyint(1) NOT NULL,
  `ctype_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`ctype_key`, `ctype_name`, `ctype_color`, `ctype_status`, `ctype_insert`) VALUES
('2fdf411856947d19708cf4da19aa3af3', 'เปลี่ยนสินค้าชิ้นใหม่', '#ff6969', 1, '2016-04-25 06:50:59'),
('31c1891444b8e5734bee09165953bca1', 'ไม่สามารถซ่อมได้', '#9e9806', 0, '2016-04-25 06:49:41'),
('4973069504e1be2a5bdcf7162ade8a16', 'ซ่อม/เคลม เสร็จ', '#06d628', 1, '2016-04-25 06:49:21'),
('58dc6633d9c14d0189efd328fc119591', 'ส่งมอบสินค้าคืนลูกค้าเรียบร้อย', '#2958ff', 0, '2016-04-25 06:52:56'),
('89da7d193f3c67e4310f50cbb5b36b90', 'นำรายการซ่อม/เคลม เข้าระบบ', '#29ccff', 0, '2016-04-25 06:23:50'),
('a5eb0dd1c5065bb9fe0cb05d61f03f4a', 'ยกเลิกการซ่อม/เคลม', '#753709', 0, '2016-04-25 06:51:39'),
('b090c4112da52d40a08349b9000dab88', 'ตรวจสอบรายการซ่อม/เคลม', '#c9c9c9', 0, '2016-04-25 06:11:34'),
('b1f4d8a6d50a01b4211fd877f7ae464f', 'ดำเนินการซ่อม/เคลม', '#120eeb', 0, '2016-04-25 06:48:05'),
('c382e352e2e620a3c60a2cc7c6a7fa35', 'ส่งต่อการซ่อม/เคลม', '#d940ff', 1, '2016-04-25 06:48:42'),
('c9934ed002b3a365088862d85604b765', 'เปลี่ยนอะไหล่', '#9c9c9c', 0, '2016-04-25 06:51:16'),
('da144a84c0660c67f115eeefa93dc56f', 'ชำระเงิน', '#ff5c00', 0, '2016-04-25 06:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `changeproduct`
--

CREATE TABLE `changeproduct` (
  `change_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `change_Amt` int(11) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createDate` date NOT NULL,
  `createBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `changeproduct`
--

INSERT INTO `changeproduct` (`change_key`, `ProductID`, `reserve_key`, `change_Amt`, `remark`, `createDate`, `createBy`) VALUES
('ff17bfc4aab2ccb1749ccc66c9485753', 'P0002', '5eef8cccd98683ba0fcbed56882bc750', 1, 'test change product.', '2019-01-02', 'pat'),
('5e1f6deb0756562e90b20ca8f34e9b27', 'P0002', '5eef8cccd98683ba0fcbed56882bc750', 1, 'test change product.', '2019-01-02', 'pat'),
('82ef1b0e8689053802aa0c71e67e0397', 'P0004', '5eef8cccd98683ba0fcbed56882bc750', 2, 'test change product.', '2019-01-02', 'pat'),
('6ccfe365280832e34dc4d2bbad17bdef', 'P0004', '5eef8cccd98683ba0fcbed56882bc750', 2, 'test change product.', '2019-01-02', 'pat'),
('1856d3f3396a0647f08a1e266df1bbf6', 'P0004', '5eef8cccd98683ba0fcbed56882bc750', 2, 'test change product.', '2019-01-02', 'pat'),
('74246317a09e0b0bbc4ab13f930f9830', 'P0004', '5eef8cccd98683ba0fcbed56882bc750', 1, 'test change product.', '2019-01-02', 'pat'),
('4da03a01a647e33f71f2540fcdb4d2cf', 'P0001', 'cff400f26e166cea0a1220fbdd26e9cb', 1, 'แตก', '2019-01-18', 'pat');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dealer_id` int(10) NOT NULL,
  `dealer_code` varchar(5) NOT NULL,
  `dealer_name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `idline` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealer_id`, `dealer_code`, `dealer_name`, `mobile`, `address`, `idline`, `email`, `status`) VALUES
(1, 'D0001', 'intel thailand', '026546000', '87 อาคารเอ็มไทยทาวเวอร์ ชั้น 9 ออลซีซันส์เพลส, ถนนวิทยุ', '', 'applee@gmail.com', 1),
(2, 'D0002', 'บริษัท เอเอ็มดี ฟาร์อีส', '024655234', '467', 'noina56', 'noina56@gmail.com', 1),
(3, 'D0003', 'Samsung', ' 026959000', '3 Empire Tower 1 South Sathorn rd.', 'aotaotrm33', 'aotaot33@gmail.com', 1),
(4, 'D0004', 'บริษัท ซิลิคอนดาต้า จำกัด', '022192010', '18/1-2 พระราม6 ตัดใหม่ ซอย 4', 'nickyyo', 'nickyyo@gmail.com', 1),
(5, 'D0005', 'GIGABYTE Technology Co.,Ltd.', '029708485', '505/8 ซอย พหลโยธิน 48,', 'nonniiaa', 'teweesak@gmail.com', 1),
(6, 'D0006', 'Scanner Co.,Ltd. (Service)', '022506072', '555 เดอะพาลาเดียมเวิลด์ ชั้น 5 ห้อง IT25\r\nถนนราชปรารถ', 'jamemee654', 'jamemee@gmail.com', 1),
(32, 'D0007', 'Gosoft', '0941319671', 'สาทรซอย 5', 'filmmmm', 'jitrawan.ch@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_code` varchar(16) NOT NULL,
  `language_name` varchar(32) NOT NULL,
  `language_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_code`, `language_name`, `language_status`) VALUES
('en', 'English', 0),
('th', 'ภาษาไทย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `cases` varchar(64) NOT NULL,
  `menu` varchar(64) NOT NULL,
  `pages` varchar(128) NOT NULL,
  `case_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`cases`, `menu`, `pages`, `case_status`) VALUES
('setting', 'setting', 'settings/setting.php', 1),
('member', 'member', 'members/member.php', 1),
('cashier', 'cashier', 'cashier/cashier.php', 1),
('report', 'report', 'report/mainReport.php', 1),
('report_export', 'report', 'report/report_export.php', 1),
('report_movement', 'report', 'report/report_movement.php', 1),
('report_income', 'report', 'report/report_income.php', 1),
('report_income_detail', 'report', 'report/report_income_detail.php', 1),
('report_booking', 'report', 'report/report_booking.php', 1),
('report_logs', 'report', 'report/report_logs.php', 1),
('report_delivery', 'report', 'report/report_delivery.php', 1),
('report_delivery_detail', 'report', 'report/report_delivery_detail.php', 1),
('setting_users', 'setting', 'settings/setting_users.php', 1),
('setting_backup', 'setting', 'settings/setting_backup.php', 1),
('setting_unit', 'setting', 'settings/setting_unit.php', 0),
('setting_categories', 'setting', 'settings/setting_categories.php', 1),
('setting_member_group', 'setting', 'settings/setting_member_group.php', 1),
('setting_promotions', 'setting', 'settings/setting_promotions.php', 1),
('report_debt', 'report', 'report/report_debt.php', 1),
('report_creditor', 'report', 'report/report_creditor.php', 1),
('setting_info', 'setting', 'settings/setting_info.php', 1),
('setting_system', 'setting', 'settings/setting_system.php', 1),
('setting_user_access', 'setting', 'settings/setting_user_access.php', 1),
('administrator_access_list', 'setting', 'administrator/administrator_access_list.php', 1),
('administrator_cases', 'setting', 'administrator/administrator_cases.php', 1),
('administrator_menus', 'setting', 'administrator/administrator_menus.php', 1),
('administrator_modules', 'setting', 'administrator/administrator_modules.php', 1),
('administrator_helper', 'seting', 'administrator/administrator_helper.php', 1),
('cashier_member', 'cashier', 'cashier/cashier_member.php', 1),
('cashier_booking', 'cashier', 'cashier/cashier_booking.php', 1),
('product_detail', 'product', 'products/product_detail.php', 1),
('member_detail', 'member', 'members/member_detail.php', 1),
('new_member', 'member', 'members/new_member.php', 1),
('member_history', 'member', 'members/member_history.php', 1),
('setting_promotion_member', 'setting', 'settings/setting_promotion_member.php', 1),
('report_cancel', 'report', 'report/report_cancel.php', 1),
('card_all_status', 'card', 'card/card_all_status.php', 1),
('search', '', 'main/search.php', 1),
('card', 'card', 'card/card.php', 1),
('setting_card_status', 'setting', 'settings/setting_card_status.php', 1),
('card_create_detail', 'card_create', 'card/card_create_detail.php', 1),
('search_code', '', 'main/search.php', 1),
('card_create', 'card_create', 'card/main.php', 1),
('setting_products', 'setting', 'settings/setting_products_N.php', 1),
('setting_type', 'setting', 'settings/setting_type.php', 1),
('setting_brand', 'setting', 'settings/setting_brand.php', 1),
('setting_model', 'setting', 'settings/setting_model.php', 1),
('setting_shelf', 'setting', 'settings/setting_shelf.php', 1),
('productInshelf', 'card', 'card/productInshelf_N.php', 1),
('claim_info', 'card', 'card/claim_info.php', 1),
('saleProduct', 'setting', 'settings/sale_info.php', 1),
('receivestock', 'card', 'settings/receivestock.php', 1),
('receiveaddstock', 'card', 'settings/receiveaddstock.php', 1),
('list_receivestock', 'card', 'settings/list_receivestock.php', 1),
('view_receiveaddstock', 'card', 'settings/view_receiveaddstock.php', 1),
('listsaleProduct', 'settings', 'settings/listsaleProduct.php', 1),
('reportProduct', '', 'report/reportProduct.php', 1),
('reportPR', '', 'report/reportPR.php', 1),
('reportSale', '', 'report/reportSale.php', 1),
('reportClaim', '', 'report/reportClaim.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_key` varchar(16) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ipaddress` varchar(32) NOT NULL,
  `log_text` varchar(256) NOT NULL,
  `log_user` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_key`, `log_date`, `log_ipaddress`, `log_text`, `log_user`) VALUES
('a436695f8397759e', '2018-11-19 09:48:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('a725b5fecd99e202', '2018-11-19 09:52:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('114ee9d3d9d31437', '2018-11-19 09:54:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('159b263da3f1eb5b', '2018-11-19 09:54:19', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('d9b349b6b5e20712', '2018-11-19 10:09:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('e03891189208e5d9', '2018-11-19 12:16:26', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('eb70d193f1d85fc1', '2018-11-19 12:56:12', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('afc7a9f638e7faa7', '2018-11-19 16:04:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cbf407d1aaae0bb7', '2018-11-19 16:37:06', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('204f07308630111d', '2018-11-19 16:38:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cab748d63879ad77', '2018-11-20 12:53:09', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('83d858ec089fa212', '2018-11-20 15:58:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('f172f80add5dc5dc', '2018-11-20 16:20:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('fc45f86e2d1df46f', '2018-11-20 16:20:18', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('d925ce8da0969583', '2018-11-20 16:23:33', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('1abf8493a0d248dc', '2018-11-20 16:23:40', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('24b2d17826cbe1d8', '2018-11-20 16:23:44', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3c2c0ff76f873c1d', '2018-11-20 16:28:05', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('eb0d6a15bcc97c19', '2018-11-20 16:28:06', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3cb66c99df17fa2a', '2018-11-21 16:15:42', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2a10a29c40efff37', '2018-11-22 09:01:37', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('3b8d61b323acae5d', '2018-11-22 09:22:56', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('6e4c8cc4d7430109', '2018-11-23 07:33:30', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2616559d7d0dadde', '2018-11-24 08:21:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('32e675b29ef95743', '2018-11-24 08:21:28', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ce110a8cdcce7f6b', '2018-11-25 05:51:43', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9cbc4249d847f936', '2018-11-25 05:51:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('68a633db8a0d39df', '2018-11-25 05:52:08', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('1d8137f1b2b12451', '2018-11-25 05:52:29', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('cf541ef915cc9726', '2018-11-25 05:53:19', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3f3e8024120d9ed2', '2018-11-25 05:53:25', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('ff001fb2bc40736b', '2018-11-25 06:12:05', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('7d2afeb0565ec69a', '2018-11-25 06:12:09', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('e6adafb20ce0da37', '2018-11-26 14:16:23', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9ebaa6f6df160e51', '2018-11-27 10:19:35', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('342e98fca292e7dd', '2018-11-28 03:55:47', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8b2360b61da2b828', '2018-11-28 10:23:00', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b88631a0f1360037', '2018-11-29 14:04:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('82eb53007887d0f1', '2018-11-30 08:51:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ac6820437757fe98', '2018-11-30 12:12:14', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ae1c6a7f19fc9c6b', '2018-11-30 17:46:25', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c306238e8eac3d67', '2018-12-01 03:34:12', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ee568ccf2a89d1e4', '2018-12-01 16:10:39', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('50344d27e04db018', '2018-12-01 17:16:38', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('0734a1af6385324c', '2018-12-01 18:11:41', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a84666238fd5719d', '2018-12-03 08:29:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('bcb6128456d241c6', '2018-12-04 02:00:08', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('234d13c0d1088f7f', '2018-12-06 03:06:05', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('7cf700a5faa7bce6', '2018-12-06 04:23:59', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8931b5753da6731d', '2018-12-09 07:55:46', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('2128bcacc069f7fd', '2018-12-11 03:44:22', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b1bd08e55508b2f7', '2018-12-12 09:35:05', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('484e6b5c617b1abf', '2018-12-16 05:37:14', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('7ef1755f99ad96bd', '2018-12-19 03:17:20', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a436695f8397759e', '2018-11-19 09:48:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('a725b5fecd99e202', '2018-11-19 09:52:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('114ee9d3d9d31437', '2018-11-19 09:54:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('159b263da3f1eb5b', '2018-11-19 09:54:19', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('d9b349b6b5e20712', '2018-11-19 10:09:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('e03891189208e5d9', '2018-11-19 12:16:26', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('eb70d193f1d85fc1', '2018-11-19 12:56:12', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('afc7a9f638e7faa7', '2018-11-19 16:04:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cbf407d1aaae0bb7', '2018-11-19 16:37:06', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('204f07308630111d', '2018-11-19 16:38:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cab748d63879ad77', '2018-11-20 12:53:09', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('83d858ec089fa212', '2018-11-20 15:58:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('f172f80add5dc5dc', '2018-11-20 16:20:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('fc45f86e2d1df46f', '2018-11-20 16:20:18', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('d925ce8da0969583', '2018-11-20 16:23:33', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('1abf8493a0d248dc', '2018-11-20 16:23:40', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('24b2d17826cbe1d8', '2018-11-20 16:23:44', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3c2c0ff76f873c1d', '2018-11-20 16:28:05', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('eb0d6a15bcc97c19', '2018-11-20 16:28:06', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3cb66c99df17fa2a', '2018-11-21 16:15:42', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2a10a29c40efff37', '2018-11-22 09:01:37', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('3b8d61b323acae5d', '2018-11-22 09:22:56', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('6e4c8cc4d7430109', '2018-11-23 07:33:30', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2616559d7d0dadde', '2018-11-24 08:21:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('32e675b29ef95743', '2018-11-24 08:21:28', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ce110a8cdcce7f6b', '2018-11-25 05:51:43', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9cbc4249d847f936', '2018-11-25 05:51:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('68a633db8a0d39df', '2018-11-25 05:52:08', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('1d8137f1b2b12451', '2018-11-25 05:52:29', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('cf541ef915cc9726', '2018-11-25 05:53:19', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3f3e8024120d9ed2', '2018-11-25 05:53:25', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('ff001fb2bc40736b', '2018-11-25 06:12:05', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('7d2afeb0565ec69a', '2018-11-25 06:12:09', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('e6adafb20ce0da37', '2018-11-26 14:16:23', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9ebaa6f6df160e51', '2018-11-27 10:19:35', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('342e98fca292e7dd', '2018-11-28 03:55:47', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8b2360b61da2b828', '2018-11-28 10:23:00', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b88631a0f1360037', '2018-11-29 14:04:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('82eb53007887d0f1', '2018-11-30 08:51:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ac6820437757fe98', '2018-11-30 12:12:14', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ae1c6a7f19fc9c6b', '2018-11-30 17:46:25', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c306238e8eac3d67', '2018-12-01 03:34:12', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ee568ccf2a89d1e4', '2018-12-01 16:10:39', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('50344d27e04db018', '2018-12-01 17:16:38', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('0734a1af6385324c', '2018-12-01 18:11:41', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a84666238fd5719d', '2018-12-03 08:29:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('bcb6128456d241c6', '2018-12-04 02:00:08', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('234d13c0d1088f7f', '2018-12-06 03:06:05', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('7cf700a5faa7bce6', '2018-12-06 04:23:59', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8931b5753da6731d', '2018-12-09 07:55:46', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('6fbed419020ea86f', '2018-12-21 15:42:09', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('6fbed419020ea86f', '2018-12-21 15:42:09', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('e7633cd6a5a8e150', '2018-12-21 22:26:13', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('e7633cd6a5a8e150', '2018-12-21 22:26:13', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b277eae1c94eb68f', '2018-12-22 10:34:28', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b277eae1c94eb68f', '2018-12-22 10:34:28', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a436695f8397759e', '2018-11-19 09:48:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('a725b5fecd99e202', '2018-11-19 09:52:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('114ee9d3d9d31437', '2018-11-19 09:54:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('159b263da3f1eb5b', '2018-11-19 09:54:19', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('d9b349b6b5e20712', '2018-11-19 10:09:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('e03891189208e5d9', '2018-11-19 12:16:26', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('eb70d193f1d85fc1', '2018-11-19 12:56:12', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('afc7a9f638e7faa7', '2018-11-19 16:04:55', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cbf407d1aaae0bb7', '2018-11-19 16:37:06', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('204f07308630111d', '2018-11-19 16:38:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('cab748d63879ad77', '2018-11-20 12:53:09', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('83d858ec089fa212', '2018-11-20 15:58:49', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('f172f80add5dc5dc', '2018-11-20 16:20:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('fc45f86e2d1df46f', '2018-11-20 16:20:18', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('d925ce8da0969583', '2018-11-20 16:23:33', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('1abf8493a0d248dc', '2018-11-20 16:23:40', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('24b2d17826cbe1d8', '2018-11-20 16:23:44', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3c2c0ff76f873c1d', '2018-11-20 16:28:05', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('eb0d6a15bcc97c19', '2018-11-20 16:28:06', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3cb66c99df17fa2a', '2018-11-21 16:15:42', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2a10a29c40efff37', '2018-11-22 09:01:37', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('3b8d61b323acae5d', '2018-11-22 09:22:56', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('6e4c8cc4d7430109', '2018-11-23 07:33:30', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('2616559d7d0dadde', '2018-11-24 08:21:16', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('32e675b29ef95743', '2018-11-24 08:21:28', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ce110a8cdcce7f6b', '2018-11-25 05:51:43', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9cbc4249d847f936', '2018-11-25 05:51:57', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('68a633db8a0d39df', '2018-11-25 05:52:08', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('1d8137f1b2b12451', '2018-11-25 05:52:29', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('cf541ef915cc9726', '2018-11-25 05:53:19', '::1', 'pat ออกจากระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('3f3e8024120d9ed2', '2018-11-25 05:53:25', '::1', 'jitrawan.ch@gmail.com เข้าสู่ระบบ.', '1'),
('ff001fb2bc40736b', '2018-11-25 06:12:05', '::1', 'jitrawan.ch@gmail.com ออกจากระบบ.', '1'),
('7d2afeb0565ec69a', '2018-11-25 06:12:09', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('e6adafb20ce0da37', '2018-11-26 14:16:23', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('9ebaa6f6df160e51', '2018-11-27 10:19:35', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('342e98fca292e7dd', '2018-11-28 03:55:47', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8b2360b61da2b828', '2018-11-28 10:23:00', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b88631a0f1360037', '2018-11-29 14:04:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('82eb53007887d0f1', '2018-11-30 08:51:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ac6820437757fe98', '2018-11-30 12:12:14', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ae1c6a7f19fc9c6b', '2018-11-30 17:46:25', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c306238e8eac3d67', '2018-12-01 03:34:12', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('ee568ccf2a89d1e4', '2018-12-01 16:10:39', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('50344d27e04db018', '2018-12-01 17:16:38', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('0734a1af6385324c', '2018-12-01 18:11:41', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a84666238fd5719d', '2018-12-03 08:29:51', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('bcb6128456d241c6', '2018-12-04 02:00:08', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('234d13c0d1088f7f', '2018-12-06 03:06:05', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('7cf700a5faa7bce6', '2018-12-06 04:23:59', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8931b5753da6731d', '2018-12-09 07:55:46', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('91fb48fa3a45282a', '2018-12-24 03:35:01', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('91fb48fa3a45282a', '2018-12-24 03:35:01', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('91fb48fa3a45282a', '2018-12-24 03:35:01', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('152408f6071f900b', '2018-12-25 09:33:40', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('152408f6071f900b', '2018-12-25 09:33:40', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('152408f6071f900b', '2018-12-25 09:33:40', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('04cd968f4ed3c956', '2019-01-06 04:18:22', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('04cd968f4ed3c956', '2019-01-06 04:18:22', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('04cd968f4ed3c956', '2019-01-06 04:18:22', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c9570c503c3ed063', '2019-01-15 14:07:16', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c9570c503c3ed063', '2019-01-15 14:07:16', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('c9570c503c3ed063', '2019-01-15 14:07:16', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('bbd6e1e5f9b03621', '2019-01-22 02:13:27', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('4fd2cb5da48ee676', '2019-01-22 10:18:48', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('d40efb72b8d373d9', '2019-01-24 03:44:54', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('24e312c26e47463d', '2019-01-25 05:03:11', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('b826d7350653ae8d', '2019-01-25 10:06:59', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('f91dfbc4093c3596', '2019-01-26 06:23:06', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('a83fbf3daa983c25', '2019-01-26 07:14:38', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15'),
('8e23af9ea69917ac', '2019-01-26 11:32:49', '::1', 'pat เข้าสู่ระบบ.', 'd97530f6437e7ffa3a74afe46a953a15');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_key` char(32) NOT NULL,
  `menu_upkey` char(32) NOT NULL,
  `menu_icon` varchar(256) NOT NULL,
  `menu_name` varchar(128) NOT NULL,
  `menu_case` varchar(128) NOT NULL,
  `menu_link` varchar(256) NOT NULL,
  `menu_status` tinyint(1) NOT NULL,
  `menu_sorting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_key`, `menu_upkey`, `menu_icon`, `menu_name`, `menu_case`, `menu_link`, `menu_status`, `menu_sorting`) VALUES
('0a3c8aabc6cdbce67a157ba1701b3fa9', '0a3c8aabc6cdbce67a157ba1701b3fa9', '<i class=\"fa fa-pie-chart fa-fw\"></i>', 'LA_MN_REPORT', 'report', '?p=report', 1, 8),
('2309e0cdb2c541bf7cb8ef0dee7b7eba', '2309e0cdb2c541bf7cb8ef0dee7b7eba', '<i class=\"fa fa-gear  fa-fw\"></i>', 'LA_MN_SETTING', 'setting', '?p=setting', 1, 9),
('26f7e62109e2566eaec8b01fe8e3598d', '26f7e62109e2566eaec8b01fe8e3598d', '<i class=\"fa fa-edit fa-fw\"></i>', 'ส่งซ่อมสินค้า/เคลม', 'card_create', '?p=card_create', 1, 4),
('295744c466c17b46170f88b5c1b9104d', '295744c466c17b46170f88b5c1b9104d', '<i class=\"fa fa-list fa-fw\"></i>', 'รายการส่งซ่อม/เคลม<span class=', 'card', '?p=card', 1, 4),
('439c4113b058975e22f776669bb36bf0', 'ff7d5a554f4300b09f2de2e06d523be9', '<i class=\"fa flaticon-stack4 fa-fw\"></i>', 'LA_MN_PRODUCTS_DATA', 'product', '?p=product', 1, 31),
('8a5a77cae7237efcb89683f2ffc4d07b', '8a5a77cae7237efcb89683f2ffc4d07b', '<i class=\"fa fa-search fa-fw\"></i>', 'ค้นหาสินค้า', 'productInshelf', '?p=productInshelf', 1, 2),
('a16043256ea5ca0ea86995e2b69ec238', 'a16043256ea5ca0ea86995e2b69ec238', '<i class=\"fa fa-home fa-fw\"></i>', 'LA_MN_HOME', '', 'index.php', 1, 1),
('ac4415d32ef6b59c0a2949058c26d5a9', 'ac4415d32ef6b59c0a2949058c26d5a9', '<i class=\"fa fa-plus-square fa-fw\"></i>', 'รับสินค้า', 'list_receivestock', '?p=list_receivestock', 1, 4),
('c6c8729b45d1fec563f8453c16ff03b8', 'c6c8729b45d1fec563f8453c16ff03b8', '<i class=\"fa fa-lock fa-fw\"></i>', 'LA_MN_LOGOUT', 'logout', '../core/logout.core.php', 1, 10),
('f1344bc0fb9c5594fa0e3d3f37a56957', 'f1344bc0fb9c5594fa0e3d3f37a56957', '<i class=\"fa fa-users fa-fw\"></i>', 'LA_MN_MEMBERS', 'member', '?p=member', 0, 4),
('f30f2140d5a1a883cfdb26fc70384beb', 'f30f2140d5a1a883cfdb26fc70384beb', '<i class=\"fa fa-shopping-cart fa-fw\"></i>', 'ขายสินค้า', 'saleProduct', '?p=saleProduct', 1, 5),
('fa5a137931f4262492e5d17a8ce2ebdf', 'fa5a137931f4262492e5d17a8ce2ebdf', ' <i class=\"fa fa-desktop fa-fw\"></i>', 'เคลมสินค้า', 'claim_info', '?p=claim_info', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `ModelID` varchar(6) NOT NULL,
  `BrandID` varchar(5) NOT NULL,
  `ModelName` varchar(30) NOT NULL,
  `ModelStatus` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`ModelID`, `BrandID`, `ModelName`, `ModelStatus`) VALUES
('M0001', 'B0001', 'Michelin City Girb111', '1'),
('M0002', 'B0002', 'dunlop XX2', '1'),
('M0003', 'B0009', 'test', '1'),
('M0004', 'B0002', 'รุ่นtest', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(5) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `shelf_id` int(11) NOT NULL,
  `BrandID` varchar(5) NOT NULL,
  `ModelID` varchar(6) NOT NULL,
  `dealer_code` varchar(5) NOT NULL,
  `ProductDetail` varchar(4000) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PriceSale` double NOT NULL,
  `PriceBuy` double NOT NULL,
  `IsNew` char(1) NOT NULL,
  `IsRecommend` char(1) NOT NULL,
  `TypeID` varchar(5) NOT NULL,
  `ProductStatus` char(1) NOT NULL,
  `Warranty` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `shelf_id`, `BrandID`, `ModelID`, `dealer_code`, `ProductDetail`, `Quantity`, `PriceSale`, `PriceBuy`, `IsNew`, `IsRecommend`, `TypeID`, `ProductStatus`, `Warranty`) VALUES
('P0001', 'ยาง Michelin City Girb', 2, 'B0001', 'M0001', 'D0001', 'ขนาว XXX', 85, 3000, 2500, '1', '1', 'T0001', '0', '1'),
('P0002', 'ยาง Bridgestone XXXX', 1, 'B0005', 'M0005', 'D0001', 'ยางขนาดดด XXX', 5, 2200, 2000, '1', '0', 'T0001', '1', '-'),
('P0003', 'แม็ก1', 2, 'B0004', '<br />', 'D0003', 'test insert product', 20, 7000, 5000, '', '', 'T0002', '1', '1'),
('P0004', 'ยาง18\"', 2, 'B0001', 'M0001', 'D0002', 'test', 50, 6500, 6000, '', '', 'T0001', '1', '1'),
('P0005', 'test', 3, 'B0001', 'M0001', 'D0001', 'test', 5, 4000, 600, '', '', 'T0001', '1', '1'),
('P0006', 'test2', 4, 'B0001', 'M0001', '', 'test2', 5, 4000, 6000, '', '', 'T0001', '1', '1'),
('P0007', 'แม็ก1', 2, 'B0003', '', '', 'test', 60, 9000, 5000, '', '', 'T0001', '1', '1'),
('P0008', 'แม็ก1', 0, 'B0003', '', '', 'test', 90, 1000, 500, '', '', 'T0001', '1', '1'),
('P0009', 'test', 2, 'B0004', '', '', 'test', 30, 750, 700, '', '', 'T0002', '1', '1'),
('P0010', 'แม็ก1', 3, 'B0008', '', '', 'test', 50, 6000, 4600, '', '', 'T0002', '1', '1'),
('P0011', 'test', 3, 'B0006', '', '', 'test', 50, 9000, 4000, '', '', 'T0004', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `productdetailrubber`
--

CREATE TABLE `productdetailrubber` (
  `id` int(11) NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `series` int(11) NOT NULL,
  `diameter` int(11) NOT NULL,
  `brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productdetailrubber`
--

INSERT INTO `productdetailrubber` (`id`, `ProductID`, `width`, `series`, `diameter`, `brand`) VALUES
(4, 'P0002', 185, 45, 19, 4),
(28, 'P0003', 215, 40, 15, 5),
(29, 'P0004', 195, 50, 14, 1),
(30, 'P0006', 205, 40, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `productdetailwheel`
--

CREATE TABLE `productdetailwheel` (
  `id` int(11) NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `diameter` int(11) NOT NULL,
  `rim` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `holeSize` int(11) NOT NULL,
  `typeFormat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productdetailwheel`
--

INSERT INTO `productdetailwheel` (`id`, `ProductID`, `diameter`, `rim`, `holeSize`, `typeFormat`) VALUES
(6, 'P0001', 15, '7.5', 5, 'ก้านใหญ่'),
(14, 'P0005', 19, '9', 6, 'ก้านใหญ่'),
(17, 'P0007', 18, '8.5', 4, 'จาน');

-- --------------------------------------------------------

--
-- Table structure for table `product_n`
--

CREATE TABLE `product_n` (
  `ProductID` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shelf_id` int(11) NOT NULL,
  `dealer_code` varchar(5) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PriceSale` double NOT NULL,
  `PriceBuy` double NOT NULL,
  `ProductStatus` char(1) NOT NULL,
  `Warranty` varchar(200) NOT NULL,
  `hand` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_n`
--

INSERT INTO `product_n` (`ProductID`, `shelf_id`, `dealer_code`, `Quantity`, `PriceSale`, `PriceBuy`, `ProductStatus`, `Warranty`, `hand`, `TypeID`, `discount`) VALUES
('P0001', 1, 'D0007', 26, 35000, 20000, '1', '30', 2, 1, 5),
('P0002', 1, 'D0001', 19, 12000, 10000, '1', '30', 2, 2, 10),
('P0003', 2, 'D0001', 152, 10000, 10000, '1', '30', 2, 2, 5),
('P0004', 2, 'D0002', 19, 20000, 15000, '1', '30', 1, 2, 2),
('P0005', 1, 'D0003', 57, 5000, 5600, '1', '', 1, 1, 0),
('P0006', 1, 'D0005', 31, 2500, 2000, '1', '', 1, 2, 2),
('P0007', 1, 'D0006', 62, 6500, 5000, '1', '', 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reprint_reserve`
--

CREATE TABLE `reprint_reserve` (
  `reprintReserveKey` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createDate` datetime NOT NULL,
  `createBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reprint_reserve`
--

INSERT INTO `reprint_reserve` (`reprintReserveKey`, `reserve_key`, `remark`, `createDate`, `createBy`) VALUES
('', '0', '', '2019-01-22 16:52:54', ''),
('382967531fcddb2256631ebb0f7cc9ad', '23a6d54e9e7cffa8256f85a630bcae68', '', '2019-01-22 17:02:22', 'd97530f6437e7ffa3a74afe46a953a15'),
('635977cc0487db193087a6397dd027bc', '16', '', '2019-01-22 17:01:14', 'd97530f6437e7ffa3a74afe46a953a15'),
('9a4c2d8152b4d448368a02264b36e8b1', '23a6d54e9e7cffa8256f85a630bcae68', '', '2019-01-22 17:02:04', 'd97530f6437e7ffa3a74afe46a953a15');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserveId` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `reserveDate` date NOT NULL,
  `create_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `tax_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserveId`, `reserveDate`, `create_by`, `discount`, `tax_total`) VALUES
('25611', '2018-11-24', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_detail`
--

CREATE TABLE `reserve_detail` (
  `id` int(11) NOT NULL,
  `reserveId` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `detail_discount` int(11) NOT NULL,
  `detail_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_info`
--

CREATE TABLE `reserve_info` (
  `reserve_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `empolyee` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_tax` int(11) NOT NULL,
  `reserve_total` int(11) NOT NULL,
  `reserve_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserve_info`
--

INSERT INTO `reserve_info` (`reserve_key`, `reserve_code`, `empolyee`, `reserve_tax`, `reserve_total`, `reserve_status`, `create_date`, `remark`) VALUES
('16c53ed54b87ae4709488fa65e9699d2', 'CX46XQTV', 'd97530f6437e7ffa3a74afe46a953a15', 4172, 59600, 'S', '2019-01-18 16:52:10', ''),
('23a6d54e9e7cffa8256f85a630bcae68', 'CIUYTQW', 'd97530f6437e7ffa3a74afe46a953a15', 756, 10800, 'S', '2019-01-22 16:33:58', ''),
('2ff6276734edaa8a9cc03ae5fa36189d', 'C91F2NNO', 'd97530f6437e7ffa3a74afe46a953a15', 8435, 120500, 'C', '2019-01-22 09:57:17', ''),
('356106a76ab2d5dd0fcf7c46c330517d', 'CL6O83P', 'd97530f6437e7ffa3a74afe46a953a15', 2328, 33250, 'S', '2019-01-22 16:33:51', ''),
('4d53266c9ced72da0739503f8bda47c0', 'C9UIHSGS', 'd97530f6437e7ffa3a74afe46a953a15', 0, 0, 'P', '2019-01-22 14:34:59', ''),
('615f80e5cd95876e5863c6febb244277', 'C3G9MBB', 'd97530f6437e7ffa3a74afe46a953a15', 756, 10800, 'S', '2019-01-22 09:57:50', ''),
('79344d4499dafc3296379802db3b0a9e', 'C884PC2', 'd97530f6437e7ffa3a74afe46a953a15', 3780, 54000, 'S', '2019-01-22 09:58:42', ''),
('aa8458ed630f7ca2ab5e8f0b5938a05d', 'CB64RMRQ', 'd97530f6437e7ffa3a74afe46a953a15', 13276, 189650, 'S', '2019-01-26 22:12:56', ''),
('c05dcc3b2fffb4f1ff32d777cf0f69f4', 'CQ55HBMW', 'd97530f6437e7ffa3a74afe46a953a15', 2744, 39200, 'S', '2019-01-22 10:06:28', ''),
('de060f4a839857f0a8d8191b20ba5fef', 'C8F1XII3', 'd97530f6437e7ffa3a74afe46a953a15', 2328, 33250, 'S', '2019-01-22 11:56:51', ''),
('fa04eaf5f49be6bdbb43088ac2e50d02', 'C31YQZTT', 'd97530f6437e7ffa3a74afe46a953a15', 0, 0, 'N', '2019-01-27 14:08:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_item`
--

CREATE TABLE `reserve_item` (
  `item_key` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_discount` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `item_amt` int(11) NOT NULL,
  `create_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserve_item`
--

INSERT INTO `reserve_item` (`item_key`, `reserve_key`, `ProductID`, `item_discount`, `item_price`, `item_total`, `item_amt`, `create_Date`) VALUES
('18fe815d13f1eafb2d0bca727944cc55', 'aa8458ed630f7ca2ab5e8f0b5938a05d', 'P0004', 400, 20000, 58800, 3, '2019-01-26'),
('2ffc4abab438914f5d9871afd704a2c6', 'aa8458ed630f7ca2ab5e8f0b5938a05d', 'P0003', 500, 10000, 9500, 1, '2019-01-26'),
('39f521c11aac1e75b1b46d91faab54c9', '16c53ed54b87ae4709488fa65e9699d2', 'P0002', 1200, 12000, 21600, 2, '2019-01-18'),
('3fc270ba4c1aca10fd13a083a70dddc6', '615f80e5cd95876e5863c6febb244277', 'P0002', 1200, 12000, 10800, 1, '2019-01-22'),
('40fe0ff65d5a6f85c5a8aa5e591a6f22', '2ff6276734edaa8a9cc03ae5fa36189d', 'P0001', 1750, 35000, 66500, 2, '2019-01-22'),
('6adb2570d79a1d85a2e79c986cbda436', 'aa8458ed630f7ca2ab5e8f0b5938a05d', 'P0001', 1750, 35000, 99750, 3, '2019-01-26'),
('75caacf9dc49ed2a25c57ce03c508435', 'aa8458ed630f7ca2ab5e8f0b5938a05d', 'P0002', 1200, 12000, 21600, 2, '2019-01-26'),
('95128d6eb11e53ac684f1e19ea186fa1', '79344d4499dafc3296379802db3b0a9e', 'P0002', 1200, 12000, 54000, 5, '2019-01-22'),
('a1ff1faf3792862216c0b32c96b55aed', '356106a76ab2d5dd0fcf7c46c330517d', 'P0001', 1750, 35000, 33250, 1, '2019-01-22'),
('a7c1a90044e0f525186f1c8a53f687c4', 'de060f4a839857f0a8d8191b20ba5fef', 'P0001', 1750, 35000, 33250, 1, '2019-01-22'),
('b75f87cdf07933f08b74d2fc48df7149', '23a6d54e9e7cffa8256f85a630bcae68', 'P0002', 1200, 12000, 10800, 1, '2019-01-22'),
('ca35b56ae29ff84bca4789ac4573ba5c', '16c53ed54b87ae4709488fa65e9699d2', 'P0003', 500, 10000, 38000, 4, '2019-01-18'),
('d1c8d4fc55d4c06e2a28f1ca96845ba6', '2ff6276734edaa8a9cc03ae5fa36189d', 'P0002', 1200, 12000, 54000, 5, '2019-01-22'),
('d9e12a38f2eeb0cd031832da1a18a6e4', 'c05dcc3b2fffb4f1ff32d777cf0f69f4', 'P0004', 400, 20000, 39200, 2, '2019-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` int(11) NOT NULL,
  `shelf_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shelf_color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shelf_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `shelf_detail`, `shelf_color`, `shelf_status`) VALUES
(1, 'shelf A ชั้น 2', '#ebb2e8', '1'),
(2, 'shelf A ชั้น 1', '#fc9f49', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock_tb_receive_master`
--

CREATE TABLE `stock_tb_receive_master` (
  `rid` int(11) NOT NULL,
  `po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datedo` date NOT NULL,
  `datereceive` date NOT NULL,
  `iduser` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_tb_receive_master`
--

INSERT INTO `stock_tb_receive_master` (`rid`, `po`, `datedo`, `datereceive`, `iduser`) VALUES
(1, 'P001', '2018-12-16', '2018-12-16', 'pat'),
(2, 'P002', '2018-12-16', '2018-12-16', 'pat'),
(3, 'P003', '2018-12-16', '2018-12-16', 'pat'),
(4, 'P004', '2018-12-16', '2018-12-16', 'pat'),
(5, 'P005', '2018-12-16', '2018-12-16', 'pat'),
(6, 'P006', '2018-12-17', '2018-12-17', 'pat'),
(7, 'P007', '2018-12-17', '2018-12-17', 'pat'),
(8, 'P008', '2018-12-17', '2018-12-17', 'pat'),
(9, 'CLRB9T1', '2019-01-02', '2019-01-02', 'pat'),
(10, 'CGD9ZZ3D', '2019-01-02', '2019-01-02', 'พัชรวี   ส'),
(11, 'CRF3AFN', '2019-01-02', '2019-01-02', 'พัชรวี   สีดอก'),
(12, 'C8MD0VVL', '2019-01-15', '2019-01-15', 'พัชรวี   สีดอก'),
(13, 'CE6ROJC', '2019-01-15', '2019-01-15', 'พัชรวี   สีดอก'),
(14, 'C7RTZ3XQ', '2019-01-16', '2019-01-16', 'พัชรวี   สีดอก'),
(15, 'C8B3EO46', '2019-01-16', '2019-01-16', 'พัชรวี   สีดอก');

-- --------------------------------------------------------

--
-- Table structure for table `stock_tb_receive_master_sub`
--

CREATE TABLE `stock_tb_receive_master_sub` (
  `no` int(11) NOT NULL,
  `po` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ProductID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_tb_receive_master_sub`
--

INSERT INTO `stock_tb_receive_master_sub` (`no`, `po`, `ProductID`, `total`) VALUES
(20, 'P006', 'P0004', 13),
(19, 'P005', 'P0002', 13),
(18, 'P005', 'P0001', 6),
(21, 'P006', 'P0003', 2),
(22, 'P001', 'P0001', 2),
(23, 'P008', 'P0001', 2),
(30, 'CRF3AFN', 'P0001', 10),
(34, 'C7RTZ3XQ', 'P0001', 5),
(33, 'CE6ROJC', 'P0002', 4),
(39, 'C8B3EO46', 'P0002', 10),
(40, 'C8B3EO46', 'P0001', 20),
(41, 'P007', 'P0005', 2),
(42, 'P007', 'P0006', 10),
(43, 'P004', 'P0001', 2),
(44, 'P004', 'P0002', 2),
(45, 'P004', 'P0003', 2),
(46, 'CRF3AFN', 'P0002', 2),
(47, 'CRF3AFN', 'P0003', 4),
(48, 'CRF3AFN', 'P0004', 4),
(49, 'CLRB9T1', 'P0005', 5),
(50, 'CLRB9T1', 'P0006', 6),
(51, 'CLRB9T1', 'P0007', 7),
(52, 'CLRB9T1', 'P0002', 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_font_size`
--

CREATE TABLE `system_font_size` (
  `font_key` char(32) NOT NULL,
  `font_name` varchar(128) NOT NULL,
  `font_size_text` text NOT NULL,
  `font_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_font_size`
--

INSERT INTO `system_font_size` (`font_key`, `font_name`, `font_size_text`, `font_status`) VALUES
('6c3ca25445248c1dff79d51ad9fa4082', '14px', 'font-size:14px;', 1),
('74af75636b4e933684d63b617c97f398', '24px', 'font-size:24px;', 1),
('bffeb9ae0d04ffc7affc3701f9858932', '22px', 'font-size:22px;', 1),
('dd7e28065e654467be0f9c16f3bd987d', '16px', 'font-size:16px;', 1),
('e215155479796a0bdcad2326ffca09c7', '18px', 'font-size:18px;', 1),
('ff9ec5b758824e67edcf5ecc7e635f6f', '20px', 'font-size:20px;', 1),
('6c3ca25445248c1dff79d51ad9fa4082', '14px', 'font-size:14px;', 1),
('74af75636b4e933684d63b617c97f398', '24px', 'font-size:24px;', 1),
('bffeb9ae0d04ffc7affc3701f9858932', '22px', 'font-size:22px;', 1),
('dd7e28065e654467be0f9c16f3bd987d', '16px', 'font-size:16px;', 1),
('e215155479796a0bdcad2326ffca09c7', '18px', 'font-size:18px;', 1),
('ff9ec5b758824e67edcf5ecc7e635f6f', '20px', 'font-size:20px;', 1),
('6c3ca25445248c1dff79d51ad9fa4082', '14px', 'font-size:14px;', 1),
('74af75636b4e933684d63b617c97f398', '24px', 'font-size:24px;', 1),
('bffeb9ae0d04ffc7affc3701f9858932', '22px', 'font-size:22px;', 1),
('dd7e28065e654467be0f9c16f3bd987d', '16px', 'font-size:16px;', 1),
('e215155479796a0bdcad2326ffca09c7', '18px', 'font-size:18px;', 1),
('ff9ec5b758824e67edcf5ecc7e635f6f', '20px', 'font-size:20px;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `site_key` char(32) NOT NULL,
  `site_logo` varchar(256) NOT NULL,
  `site_favicon` varchar(256) NOT NULL,
  `time_zone` varchar(128) NOT NULL,
  `year_type` varchar(16) NOT NULL,
  `year_format` varchar(32) NOT NULL,
  `booking_logo_en` varchar(128) NOT NULL,
  `booking_title_en` varchar(128) NOT NULL,
  `booking_note1_en` text NOT NULL,
  `booking_note2_en` text NOT NULL,
  `booking_logo_th` varchar(128) NOT NULL,
  `booking_title_th` varchar(128) NOT NULL,
  `booking_note1_th` text NOT NULL,
  `booking_note2_th` text NOT NULL,
  `reciept_logo_en` varchar(128) NOT NULL,
  `reciept_title_en` varchar(128) NOT NULL,
  `reciept_note1_en` text NOT NULL,
  `reciept_note2_en` text NOT NULL,
  `reciept_logo_th` varchar(128) NOT NULL,
  `reciept_title_th` varchar(128) NOT NULL,
  `reciept_note1_th` text NOT NULL,
  `reciept_note2_th` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`site_key`, `site_logo`, `site_favicon`, `time_zone`, `year_type`, `year_format`, `booking_logo_en`, `booking_title_en`, `booking_note1_en`, `booking_note2_en`, `booking_logo_th`, `booking_title_th`, `booking_note1_th`, `booking_note2_th`, `reciept_logo_en`, `reciept_title_en`, `reciept_note1_en`, `reciept_note2_en`, `reciept_logo_th`, `reciept_title_th`, `reciept_note1_th`, `reciept_note2_th`) VALUES
('8f411b77c389d5de467af8f2c0e91cda', 'logo.png', 'icon.png', 'Asia/Bangkok', 'BE', '3', 'logo.png', 'Booking Slip', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบจองห้องพัก', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '', 'logo.png', 'Reciept', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบเสร็จรับเงิน', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', ''),
('8f411b77c389d5de467af8f2c0e91cda', 'logo.png', 'icon.png', 'Asia/Bangkok', 'BE', '3', 'logo.png', 'Booking Slip', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบจองห้องพัก', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '', 'logo.png', 'Reciept', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบเสร็จรับเงิน', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', ''),
('8f411b77c389d5de467af8f2c0e91cda', 'logo.png', 'icon.png', 'Asia/Bangkok', 'BE', '3', 'logo.png', 'Booking Slip', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบจองห้องพัก', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '', 'logo.png', 'Reciept', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบเสร็จรับเงิน', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` varchar(5) NOT NULL,
  `TypeName` varchar(30) NOT NULL,
  `TypeStatus` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `TypeName`, `TypeStatus`) VALUES
('T0001', 'ยางมือ1', '1'),
('T0002', 'ยางมือ2', '1'),
('T0003', 'ล้อแม็กมือ1', '1'),
('T0004', 'ล้อแม็กมือ2', '1'),
('T0005', 'ล้อเปลี่ยนtest', '1'),
('T0006', 'ล้อแม็กเปลี่ยน', '1'),
('T0007', 'ประเภทสินค้า', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_key` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_photo` varchar(128) NOT NULL DEFAULT 'noimg.jpg',
  `user_class` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=user,2=admin,3=super admin',
  `bed_view` varchar(64) NOT NULL DEFAULT 'box_view',
  `user_language` varchar(8) NOT NULL DEFAULT 'th',
  `system_font_size` varchar(32) NOT NULL DEFAULT 'dd7e28065e654467be0f9c16f3bd987d',
  `email` varchar(128) NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_key`, `name`, `lastname`, `username`, `password`, `user_photo`, `user_class`, `bed_view`, `user_language`, `system_font_size`, `email`, `user_status`) VALUES
('1', 'jitrawan', 'chumpai', 'jitrawan.ch@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 2, 'box_view', 'th', 'dd7e28065e654467be0f9c16f3bd987d', 'jitrawan.ch@gmail.com', 1),
('d97530f6437e7ffa3a74afe46a953a15', 'พัชรวี', 'สีดอก', 'pat', '8e3a8d3e644e608d25ec40162988a137', 'noimg.jpg', 3, 'box_view', 'th', '74af75636b4e933684d63b617c97f398', 'applee@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `viewtables`
--

CREATE TABLE `viewtables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `viewtables`
--

INSERT INTO `viewtables` (`id`, `name`, `age`, `gender`, `action`) VALUES
(1, '[{\"amt\":\"1\",\"pid\":\"P0001\"},{\"amt\":\"1\",\"pid\":\"P0002\"},{\"amt\":\"1\",\"pid\":\"P0003\"},{\"amt\":\"1\",\"pid\":\"P0001\"}]', '', '', ''),
(2, '[{\"amt\":\"1\",\"pid\":\"P0001\"},{\"amt\":\"1\",\"pid\":\"P0002\"},{\"amt\":\"1\",\"pid\":\"P0003\"},{\"amt\":\"1\",\"pid\":\"P0001\"}]', '', '', ''),
(3, '[{\"amt\":\"1\",\"pid\":\"P0001\"},{\"amt\":\"1\",\"pid\":\"P0002\"},{\"amt\":\"1\",\"pid\":\"P0003\"},{\"amt\":\"1\",\"pid\":\"P0001\"}]', '', '', ''),
(4, 'Array', '', '', ''),
(5, '[\"[{\"amt\":\"1\",\"pid\":\"P0001\"},{\"amt\":\"1\",\"pid\":\"P0002\"},{\"amt\":\"1\",\"pid\":\"P0003\"},{\"amt\":\"1\",\"pid\":\"P0001\"}]\"]', '', '', ''),
(6, 'Array', '', '', ''),
(7, '[{\"amt\":\"1\"', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autonumber`
--
ALTER TABLE `autonumber`
  ADD PRIMARY KEY (`finance_number`);

--
-- Indexes for table `backup_logs`
--
ALTER TABLE `backup_logs`
  ADD PRIMARY KEY (`backup_key`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `cancelesd_reserve`
--
ALTER TABLE `cancelesd_reserve`
  ADD PRIMARY KEY (`canceles_key`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_code`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`cases`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_key`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`ModelID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `clothes_ibfk_1` (`BrandID`),
  ADD KEY `clothes_ibfk_2` (`TypeID`);

--
-- Indexes for table `productdetailrubber`
--
ALTER TABLE `productdetailrubber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetailwheel`
--
ALTER TABLE `productdetailwheel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_n`
--
ALTER TABLE `product_n`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `reprint_reserve`
--
ALTER TABLE `reprint_reserve`
  ADD PRIMARY KEY (`reprintReserveKey`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserveId`);

--
-- Indexes for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_info`
--
ALTER TABLE `reserve_info`
  ADD PRIMARY KEY (`reserve_key`);

--
-- Indexes for table `reserve_item`
--
ALTER TABLE `reserve_item`
  ADD PRIMARY KEY (`item_key`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`);

--
-- Indexes for table `stock_tb_receive_master`
--
ALTER TABLE `stock_tb_receive_master`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `stock_tb_receive_master_sub`
--
ALTER TABLE `stock_tb_receive_master_sub`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `viewtables`
--
ALTER TABLE `viewtables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `dealer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `productdetailrubber`
--
ALTER TABLE `productdetailrubber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `productdetailwheel`
--
ALTER TABLE `productdetailwheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_tb_receive_master`
--
ALTER TABLE `stock_tb_receive_master`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stock_tb_receive_master_sub`
--
ALTER TABLE `stock_tb_receive_master_sub`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `viewtables`
--
ALTER TABLE `viewtables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
