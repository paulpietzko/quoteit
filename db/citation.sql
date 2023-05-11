-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 11. Mai 2023 um 08:13
-- Server-Version: 5.7.36
-- PHP-Version: 8.1.0

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

DROP TABLE IF EXISTS `citation`;
CREATE TABLE IF NOT EXISTS `citation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text,
  `author` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `citation`
--

INSERT INTO `citation` (`id`, `quote`, `author`, `created`, `updated`) VALUES
(1, 'Die Wartezeit, die man bei Ärzten verbringt, würde in den meisten Fällen ausreichen, um selbst Medizin zu studieren.', 'Dieter Hallervorden', '2023-04-06 10:54:17', '2023-04-06 10:54:17'),
(2, 'Das Gewissen ist die Wunde, die nie heilt und an der keiner stirbt.', 'Friedrich Hebbel', '2023-04-06 10:54:17', '2023-04-06 10:54:17'),
(3, 'Ein Mann, der Viagra in der Tasche hat, der hat nicht unbedingt auch was im Kopf.', 'Paris Hilton', '2023-04-06 10:54:17', '2023-04-06 10:54:17'),
(4, 'Die Menschen sind nicht immer, was sie scheinen, aber selten etwas besseres.', 'Gotthold Ephraim Lessing', '2023-04-06 10:54:17', '2023-04-06 10:54:17'),
(5, 'Die Revolution ist die erfolgreiche Anstrengung, eine schlechte Regierung loszuwerden und eine schlechtere zu errichten.', 'Oscar Wilde', '2023-04-06 10:54:18', '2023-04-06 10:54:18'),
(6, 'Gebete ändern die Welt nicht. Aber Gebete ändern die Menschen. Und die Menschen verändern die Welt.', 'Albert Schweitzer', '2023-04-06 10:54:18', '2023-04-06 10:54:18'),
(7, 'Wer die Wahrheit hören will, den sollte man vorher fragen, ob er sie ertragen kann.', 'Ernst R. Hauschka', '2023-04-06 10:54:18', '2023-04-06 10:54:18'),
(8, 'Wir suchen die Wahrheit, finden wollen wir sie aber nur dort, wo es uns beliebt.', 'Marie von Ebner-Eschenbach', '2023-04-06 10:54:18', '2023-04-06 10:54:18'),
(9, 'Nicht den Tod sollte man fürchten, sondern dass man nie beginnen wird, zu leben.', 'Marcus Aurelius', '2023-04-06 10:54:18', '2023-04-06 10:54:18'),
(10, 'Man soll weder annehmen noch besitzen, was man nicht wirklich zum Leben braucht.', 'Mahatma Gandhi', '2023-04-06 10:54:18', '2023-04-06 10:54:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
