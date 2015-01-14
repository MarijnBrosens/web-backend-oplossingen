-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 jan 2015 om 01:28
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `db_file_upload`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikels`
--

CREATE TABLE IF NOT EXISTS `artikels` (
`id` int(11) NOT NULL,
  `titel` text NOT NULL,
  `artikel` text NOT NULL,
  `kernwoorden` text NOT NULL,
  `datum` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `artikels`
--

INSERT INTO `artikels` (`id`, `titel`, `artikel`, `kernwoorden`, `datum`, `is_active`, `is_archived`) VALUES
(10, 'artikel1', 'art1                                                            ', 'art1 eerste artikel', '1991-09-24', 1, 0),
(11, 'artikel2', 'artikel2', 'artikel2', '1992-05-25', 1, 0),
(12, 'artikel3', 'Tekst van artikel 3           ', 'artikel 3 tekst', '1992-05-25', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `last_login_time` date NOT NULL,
  `profile_picture` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `salt`, `hashed_password`, `last_login_time`, `profile_picture`) VALUES
(20, 'eerste@test.be', '111692398453f20b088a85b6.58827306', '8c840f82852834cf8a85d74aff81ce9642780eee033246600132dd5ab97a48bbf12c866539507ab3bd081bcee4c94d939d08ae5bb46123b3dca9a3d642dc90d6', '2014-08-18', ''),
(22, 'tweede@test.be', '104802794253f20c094d2a82.17889503', 'd169bf65b0cad918d68c409e5f3cebce7d6b9bc004836bd80197f3beee2e72d81802afa7f5d2321cd9298129ded61436a401c025e55a9dd79ac1960088f1fe79', '2014-08-18', ''),
(24, 'derde@test.be', '7990697853f20cfcf1b3a9.27507369', '2725a0c972e93300f0d8c460cf9f451c8e2c5921dd04c24284f4ad9df95b95654af1ae9183d50f0ea87e86cd0dd0337fa5e31eb9caa545eb30b72faff692dd85', '2014-08-18', ''),
(29, 'vierdetest@test.be', '68313241353f214e7dac580.54834034', '4915cf5fe642b6c202fbc34e52eac9a94dc92c8f65c4f7b81c9d6d70d0c9b523c81acc3d5d2834f81f98376ab37bc74f8f76d1818b0f53c8ba05d0591012f87b', '2014-08-18', ''),
(31, 'zesde@test.be', '107708274053f2fb24ee95e9.33786887', '5b52ce0fc54f573c9278231e8510e68d71d53c5118dfa2d2444e72c00576ffd67a2668f590567a7ca2e7c48a2bbd8e7461b447247e3b403128e5a7ca0bf558c4', '2014-08-19', ''),
(32, 'zevende@test.be', '183321579153f2fc3a632621.77554125', '40deb262fa77c28bd79c5c7d0a7d84e7552177bd403e4dd1c06f3f953bec102d3fd3796b82b5997b76f32ff3970f0591478749838881d179a06ac728821b1762', '2014-08-19', ''),
(33, 'achtste@test.be', '21844637753f2fcbc14a336.90598185', '8e7d0072c252d8a18153d184258d2673acc59f15e38927af3659843423e02101843080d00da23fb95bb6f7abbb408aebc6992a5730d761f348c7fcd8cee5faf5', '2014-08-19', ''),
(34, 'test4@test.test', '33601204154b47d1860eb39.19608755', 'acbe34d300fa78fd3ba55b891d728a801b743d60599e5b12549116507aa589340aa7ebafbe5054922656f2f6515b89434e7ecd20474c9f3d296e4a25629a8796', '2015-01-13', ''),
(35, 'test@test.test', '209652554754b47d4be859c8.95157313', '573201a2b6e383dc1f222f9a08249b2b755102d1dff8a3f5c513635f8400fc053d3a8bb4804aaf73fdd9330f77b8290445f519b0ff53872d88a5513d597777df', '2015-01-13', ''),
(36, 'test2@test.test', '66962174254b59ae46f80f8.08931726', '30822edb424364475566c103a295751bd3bb9937d660c1e86270b4057e179f13efa8188cbaba3eb07bdcbf3571d68447e6726330bcf52703c03addd326a7e34b', '2015-01-13', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikels`
--
ALTER TABLE `artikels`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikels`
--
ALTER TABLE `artikels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
