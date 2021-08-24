-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 05:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--
CREATE DATABASE IF NOT EXISTS `university` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `university`;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `num` int(5) UNSIGNED NOT NULL,
  `date` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sender` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `reciver` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `subject` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `lev` int(4) UNSIGNED NOT NULL,
  `address` varchar(150) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`num`, `date`, `sender`, `reciver`, `subject`, `lev`, `address`) VALUES
(14023, '۱۳۹۸/۰۹/۱۳', 'علیرضا', 'علی', 'سلام', 4, '../file/عکس۱۵۲۰.jpg'),
(14757, '۱۳۹۸/۰۹/۱۱', 'محمد', 'علیرضا', 'اسناد', 2, '../file/Hydrangeas.jpg'),
(45681, '۱۳۹۸/۰۹/۲۶', 'علیرضا', 'علی', 'خدانگهدار', 3, '../file/Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `userid` int(8) UNSIGNED NOT NULL,
  `pass` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `userid`, `pass`, `id`) VALUES
('reza', 75016285, '1234', 20968055),
('hasan', 85016285, '1234', 20968053),
('ali', 95015285, '1234', 20958051),
('reza', 95016285, '1234', 20968051);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
