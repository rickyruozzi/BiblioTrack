-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 30, 2024 alle 08:27
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotrack`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `feedback_libri`
--

CREATE TABLE `feedback_libri` (
  `PK_Id_feedback` int(11) NOT NULL,
  `Voto` int(11) DEFAULT NULL,
  `Feedback` varchar(500) NOT NULL,
  `FK_Id_utente` int(11) NOT NULL,
  `FK_Id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `PK_Id_libro` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Autore` varchar(50) NOT NULL,
  `Casa_editrice` varchar(50) NOT NULL,
  `Anno_pubblicazione` int(255) DEFAULT NULL,
  `Collana` varchar(50) DEFAULT NULL,
  `Genere` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`PK_Id_libro`, `Titolo`, `Autore`, `Casa_editrice`, `Anno_pubblicazione`, `Collana`, `Genere`) VALUES
(1, 'Il mastino dei Baskerville', 'Arthur Conan Doyle', 'Feltrinelli', 1902, 'GrandiGialli', 'Giallo'),
(2, 'Il grande Gatsby', 'Francis Scott Fitzg', 'Feltrinelli', 1925, 'GrandiClassici', 'Tragedia'),
(3, 'La bibbia', '', 'Feltrinelli', 33, 'Religione', 'Teologia'),
(6, 'Delitto e castigo', 'Fëdor Dostoevskij ', 'Feltrinelli', 1866, 'Classici Russi', 'Narrativa psicologica'),
(10, 'Il visconte dimezzato', 'Italo Calvino', 'Mondadori', 1952, 'Libri Fantastici', 'commedia'),
(11, 'Il cavaliere inesistente', 'Italo Calvino', 'Mondadori', 1959, 'Libri Fantastici', 'commedia');

-- --------------------------------------------------------

--
-- Struttura della tabella `prestiti`
--

CREATE TABLE `prestiti` (
  `PK_Id_prestito` int(11) NOT NULL,
  `FK_Id_utente` int(11) NOT NULL,
  `FK_Id_libro` int(11) NOT NULL,
  `Scadenza_prestito` date NOT NULL,
  `inizio_prestito` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prestiti`
--

INSERT INTO `prestiti` (`PK_Id_prestito`, `FK_Id_utente`, `FK_Id_libro`, `Scadenza_prestito`, `inizio_prestito`) VALUES
(19, 1, 3, '2025-01-01', NULL),
(20, 1, 1, '0000-00-00', NULL),
(21, 1, 2, '0000-00-00', NULL),
(22, 1, 1, '2024-10-10', '2024-10-10'),
(25, 1, 3, '2024-01-01', '2023-01-01'),
(26, 1, 3, '2024-01-01', '2023-01-01'),
(27, 1, 11, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `superusers`
--

CREATE TABLE `superusers` (
  `password_superuser` varchar(250) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `superusers`
--

INSERT INTO `superusers` (`password_superuser`, `username`) VALUES
('$2y$10$uRZe2ti6QoBUoY0Ekc1CJOGYUxMzyH56SzYqdimul0wUH9HQVSNcC', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('admin', '$2y$10$9/Psjkv2jSwRS61rziHSXuLRik/7uMOZprWTGtjRMp73xJ9FzgnIW', 'admin@gmail.com'),
('angela', '$2y$10$4cn419TLs0O5aBP/PQ3I9OQXsxNvXkn0w.tKSYO6K48JTuuqW2j3a', 'angela.tirabassi2005@libero.it'),
('angelatirabassi', '$2y$10$u0YWKFV54kUrDTyrQymyT.hA4IbLI1GmFP5zHUTD0HT.x6oZUt6kC', 'angelatirabassi05@gmail.com'),
('ciao', '$2y$10$L.lxM9IuP6PZCVAbrmChTumoIpz7eedwEyfrl29dxdBrAVV5RN.7O', 'ciao@gmail.com'),
('MAtti04', '$2y$10$08F7sdGe8zoz/ROOAZMo6e/wmB.HywPyjXmuTUWjliUZ5zZd46rdi', 'scarpam204@gmail.com'),
('ometto', '$2y$10$byj31OEjhOw6ZgAwqDAM1.xYc/RpRDRsK3pVE1j/PKP9hKZs.2ZYC', 'iacopo.ferrari@einaudicorreggi'),
('roooooot', '$2y$10$Npqs3oOQlKMHtWe8hYUnkOuRxOUX0Jx2a5P/b./jRTXdaN8jcF2Vq', 'root@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `PK_Id_utente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `fk_user` varchar(11) DEFAULT NULL,
  `codice_fiscale` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`PK_Id_utente`, `Nome`, `Cognome`, `Telefono`, `fk_user`, `codice_fiscale`, `indirizzo`) VALUES
(1, 'Riccardo', 'Ruozzi', '3389813841', 'admin', NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `feedback_libri`
--
ALTER TABLE `feedback_libri`
  ADD PRIMARY KEY (`PK_Id_feedback`),
  ADD KEY `FK_Id_utente` (`FK_Id_utente`),
  ADD KEY `FK_Id_libro` (`FK_Id_libro`);

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`PK_Id_libro`);

--
-- Indici per le tabelle `prestiti`
--
ALTER TABLE `prestiti`
  ADD PRIMARY KEY (`PK_Id_prestito`),
  ADD KEY `FK_Id_utente` (`FK_Id_utente`),
  ADD KEY `FK_Id_libro` (`FK_Id_libro`);

--
-- Indici per le tabelle `superusers`
--
ALTER TABLE `superusers`
  ADD KEY `fk_superuser` (`username`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`PK_Id_utente`),
  ADD KEY `fk_su_username` (`fk_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `PK_Id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  MODIFY `PK_Id_prestito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `PK_Id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `feedback_libri`
--
ALTER TABLE `feedback_libri`
  ADD CONSTRAINT `feedback_libri_ibfk_1` FOREIGN KEY (`FK_Id_utente`) REFERENCES `utenti` (`PK_Id_utente`),
  ADD CONSTRAINT `feedback_libri_ibfk_2` FOREIGN KEY (`FK_Id_libro`) REFERENCES `libri` (`PK_Id_libro`);

--
-- Limiti per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  ADD CONSTRAINT `prestiti_ibfk_1` FOREIGN KEY (`FK_Id_utente`) REFERENCES `utenti` (`PK_Id_utente`),
  ADD CONSTRAINT `prestiti_ibfk_2` FOREIGN KEY (`FK_Id_libro`) REFERENCES `libri` (`PK_Id_libro`);

--
-- Limiti per la tabella `superusers`
--
ALTER TABLE `superusers`
  ADD CONSTRAINT `fk_superuser` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `fk_su_username` FOREIGN KEY (`fk_user`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
