-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 10:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foolslidex`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `url` varchar(25) NOT NULL,
  `title` varchar(100) NOT NULL,
  `chapter` int(4) NOT NULL,
  `images` varchar(10000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `manga`, `url`, `title`, `chapter`, `images`, `date`) VALUES
(4, 3, 'fmS7O-FDVn0-arCAV-ObMSE', 'Creating your first Manga!', 1, 'FoOlSlideX Manga/chapter 1/', '2021-11-09 20:22:23'),
(5, 3, 'ju10x-Z1jKr-gDveX-HLBG4', 'Adding a Chapter to a Manga!', 2, 'FoOlSlideX Manga/chapter 2/', '2021-11-09 20:52:53'),
(6, 3, 'BNGHC-9AMs9-83IYY-KPquo', 'Setting up FoOlSlideX for the first time!', 0, 'FoOlSlideX Manga/chapter 0/', '2021-11-09 21:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `mangas`
--

CREATE TABLE `mangas` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `cover` varchar(25) NOT NULL,
  `alternates` varchar(2500) DEFAULT NULL,
  `scanlating` int(1) NOT NULL DEFAULT 1,
  `url` varchar(25) NOT NULL,
  `description` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mangas`
--

INSERT INTO `mangas` (`id`, `title`, `cover`, `alternates`, `scanlating`, `url`, `description`) VALUES
(3, 'Official FoOlSlideX Manga', 'Yx7Ob1J9n30lx6t.jpg', 'FoOlSlideX Installation Guide in Chibi-Format', 1, '7G9DA-yPEAo-QU0hx-Geb7H', 'The official FoOlSlideX Manga! Guides you through setting-up this site :D<br>\r\nEdited by $aintly2k :P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mangas`
--
ALTER TABLE `mangas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
