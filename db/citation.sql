-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 01. Jun 2023 um 11:14
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `citation`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `citation`
--

CREATE TABLE `citation` (
  `id` int(11) NOT NULL,
  `quote` text DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp(),
  `hits` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `citation`
--

INSERT INTO `citation` (`id`, `quote`, `first_name`, `last_name`, `created`, `updated`, `hits`) VALUES
(1, 'Die Wartezeit, die man bei Ärzten verbringt, würde in den meisten Fällen ausreichen, um selbst Medizin zu studieren.', 'Dieter', 'Hallervorden', '2023-04-06 10:54:17', '2023-04-06 10:54:17', 8),
(2, 'Das Gewissen ist die Wunde, die nie heilt und an der keiner stirbt.', 'Friedrich', 'Hebbel', '2023-04-06 10:54:17', '2023-04-06 10:54:17', 4),
(3, 'Ein Mann, der Viagra in der Tasche hat, der hat nicht unbedingt auch was im Kopf.', 'Paris', 'Hilton', '2023-04-06 10:54:17', '2023-04-06 10:54:17', 7),
(4, 'Die Menschen sind nicht immer, was sie scheinen, aber selten etwas besseres.', 'Gotthold', 'Lessing', '2023-04-06 10:54:17', '2023-04-06 10:54:17', 1),
(5, 'Die Revolution ist die erfolgreiche Anstrengung, eine schlechte Regierung loszuwerden und eine schlechtere zu errichten.', 'Oscar', 'Wilde', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 11),
(6, 'Gebete ändern die Welt nicht. Aber Gebete ändern die Menschen. Und die Menschen verändern die Welt.', 'Albert', 'Schweitzer', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 8),
(7, 'Wer die Wahrheit hören will, den sollte man vorher fragen, ob er sie ertragen kann.', 'Ernst', 'Hauschka', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 7),
(8, 'Wir suchen die Wahrheit, finden wollen wir sie aber nur dort, wo es uns beliebt.', 'Marie', 'Ebner-Eschenbach', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 7),
(9, 'Nicht den Tod sollte man fürchten, sondern dass man nie beginnen wird, zu leben.', 'Marcus', 'Aurelius', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 4),
(10, 'Man soll weder annehmen noch besitzen, was man nicht wirklich zum Leben braucht.', 'Mahatma', 'Gandhi', '2023-04-06 10:54:18', '2023-04-06 10:54:18', 7);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `citation`
--
ALTER TABLE `citation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `citation`
--
ALTER TABLE `citation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
