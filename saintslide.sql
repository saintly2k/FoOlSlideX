-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2022 at 12:32 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saintslide`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `theme` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `public_profile` int(11) NOT NULL,
  `public_watchlist` int(11) NOT NULL,
  `read_announce` int(11) NOT NULL,
  `forum_signature` varchar(500) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `banned_reason` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `username`, `password`, `email`, `image`, `theme`, `lang`, `public_profile`, `public_watchlist`, `read_announce`, `forum_signature`, `banned`, `banned_reason`, `created`) VALUES
(1, 0, 'saintly', '$2y$10$Pi8CtNrFXOUmQzwN4TIvSuyzDM6bdX9pwr/aJf0kBSu6oGo0P948u', 'ninefreaks@yandex.com', 'http://localhost/assets/img/default.jpeg', 4, 'en', 1, 1, 0, NULL, 0, NULL, '2022-02-26 00:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_forgot`
--

CREATE TABLE `user_forgot` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `token` text NOT NULL,
  `user` varchar(250) NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`token`, `user`, `from`) VALUES
('6f2f5b8d19f67c314880f9374d6c0ec7', 'saintly', '2022-02-26 00:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
