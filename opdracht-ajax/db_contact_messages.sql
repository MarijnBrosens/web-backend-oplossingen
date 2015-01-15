-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 15 jan 2015 om 06:39
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `db_contact_messages`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact_messages`
--

CREATE TABLE IF NOT EXISTS `contact_messages` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `time_sent` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `message`, `time_sent`) VALUES
(1, 'marijnbrosens16@gmail.com', 'sdfsdf sd fs', '2015-01-15 06:22:25');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact_messages`
--
ALTER TABLE `contact_messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact_messages`
--
ALTER TABLE `contact_messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
