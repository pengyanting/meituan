-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-03 12:09:53
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elem`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `phone` char(16) NOT NULL,
  `name` char(16) NOT NULL,
  `isUpdateName` tinyint(1) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `phone`, `name`, `isUpdateName`, `password`) VALUES
(1, '18035072396', 'aa', 0, ''),
(2, '18035072391', 'aa', 0, ''),
(3, '12345678900', 'aa', 0, ''),
(4, '11111111112', 'aa', 0, ''),
(5, '11111111113', 'aa', 0, ''),
(6, '11111111111', '46f4cb19610ab', 0, ''),
(7, '11111111114', 'dce8c72d1696d', 0, ''),
(8, '11111111115', 'asdasdaasd', 1, '1212eedd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
