-- phpMyAdmin SQL Dump
-- version 2.11.10
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Feb 23, 2019, 04:45 PM
-- 伺服器版本: 5.1.73
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `demoDB`
--

-- --------------------------------------------------------

--
-- 資料表格式： `member_test`
--

CREATE TABLE IF NOT EXISTS `member_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `usertype` varchar(3) CHARACTER SET utf8 NOT NULL DEFAULT 'n' COMMENT 'n(normaluser) a(admin)',
  `email` text CHARACTER SET utf8 NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- 列出以下資料庫的數據： `member_test`
--

INSERT INTO `member_test` (`id`, `username`, `password`, `usertype`, `email`, `create_time`) VALUES
(17, '123456a', '1234567890a', 'n', '516516151dfasaaaaaaaaaaaaaaaaaa', '2019-02-23 15:30:09'),
(44, '00000000', '123456789', 'n', '0000000000000000000', '2019-02-23 16:24:21'),
(16, 'owner20021321321', '1234567890', 'a', '11111111111111111111', '2019-02-23 14:41:05'),
(19, 'qweqweqweqwe', 'asdasdasdasd', 'n', 'ddddddddddd', '2019-02-23 16:02:28'),
(21, 'wwwww', 'wwwwwwwwww', 'n', 'wwwwwwwwww', '2019-02-23 16:02:38'),
(22, 'sam960505', '0123456789', 'n', '1234567890', '2019-02-23 16:02:39'),
(23, 'ElvisChiu', 'qwerty', 'a', '123456789@gmail.com', '2019-02-23 16:02:41'),
(24, 'qwertyu', '1234567891', 'n', 'asd@gmail.com', '2019-02-23 16:02:41'),
(25, 'owner01', '1234567890', 'n', 'aaa2019@gmail.com', '2019-02-23 16:02:41'),
(26, 'dian00', '1234567890', 'n', 'a@test.com', '2019-02-23 16:02:45'),
(27, '1234567899', '1234567899', 'n', 'qwerty@gmail.com', '2019-02-23 16:02:54'),
(28, 'n877313', 'm781394222', 'n', 'boostrap@gmail.com', '2019-02-23 16:02:54'),
(29, 'sssss', 'ssssssssss', 'n', 'ssssssssss', '2019-02-23 16:03:00'),
(31, 'qazwsx', '1234567890', 'n', 'abc@cba.com', '2019-02-23 16:03:10'),
(33, 'rrrrrrrrrr', 'rrrrrrrrrr', 'n', 'rrrrrrrrrr@gmail.com', '2019-02-23 16:03:33'),
(34, 'sars12349', '12345678901', '', 'sars12349@yahoo.com.tw', '2019-02-23 16:03:37'),
(35, 'james01', '1234567890', 'a', 'james@gmail.com', '2019-02-23 16:03:53'),
(36, 'qqqqq', '1234567890', 'n', 'qqqqqqqqqqqqqqqqqqqqqq', '2019-02-23 16:04:24'),
(38, '987654321', '1234567899', 'n', ' dfbgbasgag', '2019-02-23 16:05:20'),
(39, 'qwertyui', '1234567891', 'n', '1234@gmail.com', '2019-02-23 16:05:21'),
(43, 'admin', '123456789', 'a', '111111111111111122222222222222', '2019-02-23 16:20:33');
