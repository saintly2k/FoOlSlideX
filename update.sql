-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Jul 2022 um 01:45
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mangareaderx`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `display`
--

CREATE TABLE `display` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `displayed` tinyint(1) NOT NULL DEFAULT 1,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `display`
--

INSERT INTO `display` (`id`, `order`, `item`, `text`, `icon`, `displayed`, `hidden`, `created`) VALUES
(1, 1, 'releases', '', 'th-list', 1, 0, '2022-07-08 01:39:51'),
(2, 2, 'titles', '', 'book', 1, 0, '2022-07-08 01:39:51'),
(3, 3, 'bookmarks', '', 'bookmark', 1, 0, '2022-07-08 01:39:51'),
(4, 4, 'groups', '', 'user', 1, 0, '2022-07-08 01:39:51'),
(5, 5, 'about', '', 'question-sign', 1, 0, '2022-07-08 01:39:51'),
(6, 6, 'blog', '', 'font', 1, 1, '2022-07-08 01:39:51'),
(7, 7, 'news', '', 'bullhorn', 0, 1, '2022-07-08 01:39:51');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- Tabellenstruktur für Tabelle `statics`
--

CREATE TABLE `statics` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `statics`
--

INSERT INTO `statics` (`id`, `name`, `title`, `public`, `created`) VALUES
(1, 'about', 'About', 1, '2022-07-08 17:17:57');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `statics`
--
ALTER TABLE `statics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- AUTO_INCREMENT für Tabelle `display`
--
ALTER TABLE `display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/* ADDING THE GROUPS TO THE DB */

ALTER TABLE `chapters` ADD `group1` INT NOT NULL DEFAULT '0' AFTER `user`;
ALTER TABLE `chapters` ADD `group2` INT NOT NULL DEFAULT '0' AFTER `group1`;
ALTER TABLE `chapters` ADD `group3` INT NOT NULL DEFAULT '0' AFTER `group3`;

/* ADD BLOG AND NEWS BOOLEAN TO DB */

ALTER TABLE `config` ADD `blog` BOOLEAN NOT NULL DEFAULT FALSE AFTER `start`;
ALTER TABLE `config` ADD `news` BOOLEAN NOT NULL DEFAULT FALSE AFTER `blog`;
