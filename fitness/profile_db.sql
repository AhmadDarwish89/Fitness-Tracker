-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Apr 2023 um 16:26
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `profile_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gesundheitsinfos`
--

CREATE TABLE `gesundheitsinfos` (
  `aktivitaet_ID` int(11) NOT NULL,
  `Koerpergroeße` float DEFAULT NULL,
  `Gewicht` float DEFAULT NULL,
  `Lebensalter` int(11) DEFAULT NULL,
  `Aktivitaet` varchar(50) DEFAULT NULL,
  `Dauer` int(11) DEFAULT NULL,
  `Mitarbeiter_ID` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `BMI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `gesundheitsinfos`
--

INSERT INTO `gesundheitsinfos` (`aktivitaet_ID`, `Koerpergroeße`, `Gewicht`, `Lebensalter`, `Aktivitaet`, `Dauer`, `Mitarbeiter_ID`, `datum`, `BMI`) VALUES
(1, 176, 76, 34, 'Fahrrad fahren', 60, 10, '2023-03-31', '25,5'),
(2, 176, 74, 34, 'Fitnissport', 90, 10, '2023-04-22', '24,4'),
(3, 176, 72, 34, 'Jogging', 40, 10, '2023-04-30', '23,3'),
(4, 176, 70, 34, 'sport', 30, 10, '2023-04-28', '22,2'),
(91, 172, 50, 33, 'Fahrrad fahren', 77, 11, '2023-05-27', '16.9'),
(92, 177, 90, 33, 'sport', 33, 11, '2023-05-28', '28.73'),
(93, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(94, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(95, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(96, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(97, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(98, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(99, 177, 77, 44, 'Fahrrad fahren', 44, 10, '2023-03-30', '24.58'),
(103, 177, 78, 34, 'Fahrrad fahren', 60, 11, '2023-05-31', '24.9');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`) VALUES
(6, 'John', 'Bates', 'email@email.com', 'uploads/1662232332user.jpg', '$2y$10$PUh/h0Exbs1GY/6o5CsbauwyImZPwVJ6AH0aLTDOlJzncIJVWi386', 'Male', '2022-09-03 21:12:12'),
(7, 'Mary', 'Bates', 'mary@email.com', 'uploads/1662232388alicia-keys.jpg', '$2y$10$Q7c1b7rYlQ2nc9Jw.RWDAeL69f7zMy5y9UYx4wNUj7OSS64yT0KBm', 'Female', '2022-09-03 21:13:08'),
(9, 'Jane', 'Doe', 'jane@email.com', 'uploads/1662233918pexels-photo-3756774.jpeg', '$2y$10$DhrdIIPD7hgJDvJAjNeFieLQU2M05yEPES2lJbJhARUU./ATsRzwW', 'Female', '2022-09-03 21:38:38'),
(10, 'ahmad', 'Darwish', 'ahmaddarwish@gmail.com', 'uploads/1681826018pexels-simon-robben-614810.jpg', '$2y$10$g6NvV0mKlVGpHpcT0DlZAOG.oDjzXLB4pVMmHd7rum3TWzLkds412', 'Male', '2023-04-20 16:13:04'),
(11, 'alexander', 'ginter', 'ag2018@gmail.com', 'uploads/1681911851pexels-simon-robben-614810.jpg', '$2y$10$dtrMUF1tainJaOyoPePf5eZFpPYtbDkE1.fQlbgynKwcTXwkROhzy', 'Male', '2023-04-19 15:44:11');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `gesundheitsinfos`
--
ALTER TABLE `gesundheitsinfos`
  ADD PRIMARY KEY (`aktivitaet_ID`),
  ADD KEY `Mitarbeiter_ID` (`Mitarbeiter_ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `gesundheitsinfos`
--
ALTER TABLE `gesundheitsinfos`
  MODIFY `aktivitaet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `gesundheitsinfos`
--
ALTER TABLE `gesundheitsinfos`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`Mitarbeiter_ID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `gesundheitsinfos_ibfk_1` FOREIGN KEY (`Mitarbeiter_ID`) REFERENCES `mitarbeiter` (`Mitarbeiter_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
