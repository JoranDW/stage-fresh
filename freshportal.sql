-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 mei 2024 om 17:09
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshportal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
--

CREATE TABLE `taken` (
  `id` int(11) NOT NULL,
  `titel` varchar(20) NOT NULL,
  `beschrijving` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gemaakt_door` varchar(20) NOT NULL,
  `prioriteit` varchar(10) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `taken`
--

INSERT INTO `taken` (`id`, `titel`, `beschrijving`, `status`, `gemaakt_door`, `prioriteit`, `deadline`) VALUES
(1, 'css', 'css updaten op form', 'mee bezig', '', 'hoog', '2024-05-27'),
(2, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(3, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(4, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(5, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(6, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(7, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(8, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(9, 'test', 'test', 'test', '', 'test', '0000-00-00'),
(13, 'justin', 'baas maken ', 'hoog', '', 'hoog', '2024-05-27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `email` varchar(89) NOT NULL,
  `wachtwoord` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`) VALUES
(1, 'Joran', 'Doelwijt', 'joran', '$2y$10$7G2Gbb2MkBGbKzmc0zlqpON6NsvYlhrq.62OKipR0JLPk5hAduB8u'),
(2, 'test', 'test', 'jantje@hallo', '$2y$10$Gd5ps6RbevEwTTtTrTlhJOOcGzV/LXqA1.r1rXesSQzer7.VLZKbC');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `taken`
--
ALTER TABLE `taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
