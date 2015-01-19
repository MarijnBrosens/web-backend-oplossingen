-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 19 jan 2015 om 22:39
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `db_opdracht-02-todo-uitgebreid`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_15_230813_createUsersTable', 1),
('2015_01_15_232353_createTodos', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
`id` int(10) unsigned NOT NULL,
  `userId` int(11) NOT NULL,
  `todoTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `todoDetails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isDone` tinyint(1) NOT NULL,
  `isArchived` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Gegevens worden geëxporteerd voor tabel `todos`
--

INSERT INTO `todos` (`id`, `userId`, `todoTitle`, `todoDetails`, `isDone`, `isArchived`, `created_at`, `updated_at`) VALUES
(1, 1, 'title1', 'details1', 0, 0, '0000-00-00 00:00:00', '2015-01-17 04:32:58'),
(2, 1, 'title2', 'details2', 0, 0, '0000-00-00 00:00:00', '2015-01-17 04:32:14'),
(3, 1, 'title3', 'details3', 1, 0, '0000-00-00 00:00:00', '2015-01-17 04:32:10'),
(4, 1, 'lalalal', 'sdfsdfsdfsdfsdf', 0, 1, '0000-00-00 00:00:00', '2015-01-17 04:36:03'),
(5, 1, 'sdfdfds', 'sdfsdfsdfs', 0, 1, '0000-00-00 00:00:00', '2015-01-17 04:37:08'),
(6, 1, 'lalala', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum elementum, est sit amet aliquet sollicitudin, metus nisi posuere tortor, a fringilla mi mauris placerat lectus. Sed ex arcu, auctor id metus at, commodo blandit nunc. Sed non dui in orci ', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 10, 'Lorum ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet fermentum felis. Curabitur varius nulla nec erat efficitur rutrum. Integer nec vulputate purus, quis dictum tellus. Nunc ultricies nibh et condimentum gravida. Sed id ligula qu', 0, 0, '0000-00-00 00:00:00', '2015-01-17 06:26:33'),
(8, 10, 'Another lorum ipsum', 'Etiam vitae accumsan arcu. Quisque ornare pulvinar congue. Phasellus ullamcorper ac urna eu bibendum. Vivamus sed efficitur ex, vitae rhoncus metus. Ut a sem faucibus, suscipit augue efficitur, tincidunt mauris. Praesent sollicitudin dui eu lectus sollici', 0, 0, '0000-00-00 00:00:00', '2015-01-17 06:26:31'),
(9, 10, 'Third Lorum ipsum', 'Nunc sit amet lacus rutrum, volutpat ante non, facilisis ante. Pellentesque blandit bibendum nisi nec rutrum. Sed turpis mi, dapibus a consequat sit amet, sodales et risus. Donec id est sit amet justo mollis imperdiet ut eget quam. In sed commodo purus. P', 0, 0, '0000-00-00 00:00:00', '2015-01-17 06:26:30'),
(12, 10, 'Small lorum', 'Cras vitae augue ac lorem dapibus congue eu in dolor. Donec pharetra purus quis finibus scelerisque. Quisque id ultricies metus. Vestibulum sit amet felis commodo, sagittis arcu in, dignissim quam. Vestibulum interdum viverra tincidunt. Sed commodo lorem ', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 10, 'Last one i think', 'Praesent a dui quis ligula pellentesque tempus ac eget tellus. Sed et mi malesuada, commodo ligula ut, ultricies arcu. Aliquam dapibus nisl orci, sed bibendum mauris laoreet id. Suspendisse consequat justo blandit ipsum mollis consectetur sit amet vel jus', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 10, 'This one is for a done test', 'test test test', 1, 0, '0000-00-00 00:00:00', '2015-01-17 19:41:49');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test@test.be', '$2y$10$MPfhrXNbijhi9hiPUhF1cOEJMMwHV2Ruf8I/rDNuWswX3KKr/.Upy', 'xEj2sKlztVIWmMhdS2SvVmeGnzDePXSBmLquV3BRqgBebtty7FKI9KIjjMNa', '0000-00-00 00:00:00', '2015-01-17 20:27:57'),
(10, 'test2@test.be', '$2y$10$I2MTJMuHQy/9lNzA2H5UouyjUKPBNWkW4vdNOWGkgNdzO6Q1iD/GS', 'K4YKcyIw7PNeKi48bihfVvuE3k3DdgcqB94w8bsinjgOBRKR7ufUl9it7vLS', '0000-00-00 00:00:00', '2015-01-17 20:29:49');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `todos`
--
ALTER TABLE `todos`
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
-- AUTO_INCREMENT voor een tabel `todos`
--
ALTER TABLE `todos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
