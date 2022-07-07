-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Jul 2022 um 01:46
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
-- Tabellenstruktur für Tabelle `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `slug` text NOT NULL,
  `volume` int(11) DEFAULT NULL,
  `chapter` varchar(11) NOT NULL DEFAULT '0',
  `title` text DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'strip',
  `user` int(11) NOT NULL,
  `group1` int(11) NOT NULL,
  `group2` int(11) DEFAULT NULL,
  `group3` int(11) DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `config`
--

CREATE TABLE `config` (
  `title` varchar(50) NOT NULL DEFAULT 'MangaReader',
  `slogan` varchar(100) NOT NULL DEFAULT 'Read Manga online for free with no ads!',
  `logo` varchar(100) NOT NULL DEFAULT 'assets/img/logo.png',
  `cookie` varchar(50) NOT NULL DEFAULT 'mangareader',
  `url` varchar(100) NOT NULL DEFAULT 'http://localhost/mangareaderx/',
  `theme` int(1) NOT NULL DEFAULT 1,
  `start` int(4) NOT NULL DEFAULT 2020,
  `blog` tinyint(1) NOT NULL DEFAULT 0,
  `news` tinyint(1) NOT NULL DEFAULT 0,
  `lang` varchar(2) NOT NULL DEFAULT 'en',
  `disqus` varchar(100) NOT NULL DEFAULT 'mangapanzer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` text NOT NULL,
  `short` varchar(10) NOT NULL,
  `image` text DEFAULT 'https://cdn.henai.eu/assets/images/fsx-group.jpg',
  `about` text DEFAULT NULL,
  `founded` datetime DEFAULT current_timestamp(),
  `website` varchar(100) DEFAULT NULL,
  `irc` varchar(100) DEFAULT NULL,
  `mangadex` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `invites`
--

CREATE TABLE `invites` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `used` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE `sessions` (
  `user-id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `cover` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `author` text DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `released` varchar(20) DEFAULT NULL,
  `raw-status` int(11) NOT NULL,
  `scan-status` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `raw-url` text DEFAULT NULL,
  `licensed` varchar(50) DEFAULT NULL,
  `official-url` text DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `theme` int(11) NOT NULL DEFAULT 3,
  `level` int(11) NOT NULL DEFAULT 3,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `display`
--
ALTER TABLE `display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `invites`
--
ALTER TABLE `invites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
