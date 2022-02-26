-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Feb 2022 um 22:51
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
-- Datenbank: `saintslide`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `url` varchar(23) NOT NULL,
  `uploaded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `raw` text DEFAULT NULL,
  `official` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_bookmarks`
--

CREATE TABLE `project_bookmarks` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_comments`
--

CREATE TABLE `project_comments` (
  `id` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `content` text NOT NULL,
  `written` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_reading`
--

CREATE TABLE `project_reading` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `manga` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
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
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `banned_reason` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_forgot`
--

CREATE TABLE `user_forgot` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_tokens`
--

CREATE TABLE `user_tokens` (
  `token` text NOT NULL,
  `user` varchar(250) NOT NULL,
  `from` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_verification`
--

CREATE TABLE `user_verification` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_bookmarks`
--
ALTER TABLE `project_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_comments`
--
ALTER TABLE `project_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project_reading`
--
ALTER TABLE `project_reading`
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
-- AUTO_INCREMENT für Tabelle `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_bookmarks`
--
ALTER TABLE `project_bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_comments`
--
ALTER TABLE `project_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `project_reading`
--
ALTER TABLE `project_reading`
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
