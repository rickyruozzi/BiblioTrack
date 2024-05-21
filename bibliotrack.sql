-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 21, 2024 alle 08:56
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
  `ID_feedback` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `voto` int(11) DEFAULT NULL,
  `feedback` varchar(250) DEFAULT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  `id_libro` int(11) DEFAULT NULL
) ;

--
-- Dump dei dati per la tabella `feedback_libri`
--

INSERT INTO `feedback_libri` (`ID_feedback`, `username`, `voto`, `feedback`, `titolo`, `id_libro`) VALUES
(3, 'admin', 9, 'bellissimo giallo, vorrei rile', 'I dieci piccoli indiani ', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `PK_Id_libro` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Autore` varchar(50) NOT NULL,
  `Casa_editrice` varchar(50) NOT NULL,
  `Anno_pubblicazione` int(4) DEFAULT NULL,
  `Collana` varchar(50) DEFAULT NULL,
  `Genere` varchar(50) DEFAULT NULL,
  `stato` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`PK_Id_libro`, `Titolo`, `Autore`, `Casa_editrice`, `Anno_pubblicazione`, `Collana`, `Genere`, `stato`) VALUES
(1, 'Il mastino dei Baskerville', 'Arthur Conan Doyle', 'Feltrinelli', 1902, 'GrandiGialli', 'Giallo', 0),
(3, 'La bibbia', '', 'Feltrinelli', 0, 'Religione', 'Teologia', 1),
(4, 'La bella addormentata nel bosco', 'Gianbattista Basile', 'Giunti', 1922, 'Bambini', 'Fiaba', 0),
(5, 'I 10 piccoli indiani', 'Agatha Christie', 'Giunti', 1939, 'Grandi classici', 'Gialli', 0),
(6, 'Sei personaggi in cerca di autore', 'Luigi Pirandello', 'Gli Adelphi', 1921, 'Classici italiani', 'Commedia teatrale', 0),
(7, 'Il grande Gatsby', 'Francis Scott Fitzgerald', 'Mondadori', 1925, 'I Meridiani', 'Romanzo', 0),
(8, '1984', 'George Orwell', 'Mondadori', 1949, 'Oscar Moderni', 'Romanzo distopico', 0),
(9, 'Orgoglio e pregiudizio', 'Jane Austen', 'Garzanti', 1813, 'I grandi libri', 'Romanzo', 0),
(10, 'Harry Potter e la pietra filosofale', 'Joanne Rowling', 'Salani', 1997, 'Harry Potter', 'Fantasy', 0),
(11, 'La ragazza di Bube', 'Carlo Cassola', 'Einaudi', 1960, 'Einaudi tascabili', 'Romanzo', 0),
(12, 'To Kill a Mockingbird', 'Harper Lee', 'Mondadori', 1960, 'Oscar Moderni', 'Romanzo', 0),
(13, 'Il signore degli anelli', 'John Ronald Reuel Tolkien', 'Bompiani', 1954, 'Tascabili Bompiani', 'Fantasy', 0),
(14, 'Piccole donne', 'Louisa May Alcott', 'Mondadori', 1868, 'Oscar Moderni', 'Romanzo', 0),
(15, 'Cime tempestose', 'Emily Brontë', 'Mondadori', 1846, 'Mondadori', 'Romanzo', 0),
(16, 'Cent\'anni di solitudine', 'Gabriel García Márquez', 'Mondadori', 1967, 'I Meridiani', 'Romanzo', 0),
(17, 'Guerra e pace', 'Lev Nikolaevič Tolstoj', 'Einaudi', 1869, 'Einaudi tascabili', 'Romanzo storico', 0),
(18, 'La colpa è delle stelle', 'John Green', 'Mondadori', 2012, 'Oscar Moderni', 'Romanzo per ragazzi', 0),
(19, 'Anna Karenina', 'Lev Nikolaevič Tolstoj', 'Mondadori', 1877, 'I grandi libri', 'Romanzo', 0),
(20, 'La storia infinita', 'Michael Ende', 'Mondadori', 1979, 'Oscar Moderni', 'Fantasy', 0),
(21, 'Lo Hobbit', 'John Ronald Reuel Tolkien', 'Bompiani', 1937, 'Oscar Draghi', 'Fantasy', 0),
(22, 'I miserabili', 'Victor Hugo', 'Mondadori', 1862, 'I grandi libri', 'Romanzo', 0),
(23, 'La fattoria degli animali', 'George Orwell', 'Mondadori', 1945, 'Oscar Moderni', 'Romanzo satirico', 0),
(24, 'Il codice da Vinci', 'Dan Brown', 'Mondadori', 2003, 'Oscar Moderni', 'Romanzo thriller', 0),
(25, 'Harry Potter e il prigioniero di Azkaban', 'Joanne Rowling', 'Salani', 1999, 'Harry Potter', 'Fantasy', 0),
(26, 'Le cronache di Narnia: Il leone, la strega e l\'armadio', 'Clive Staples Lewis', 'Mondadori', 1950, 'Oscar Moderni', 'Fantasy', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `prestiti`
--

CREATE TABLE `prestiti` (
  `PK_Id_prestito` int(11) NOT NULL,
  `FK_Id_utente` int(11) NOT NULL,
  `FK_Id_libro` int(11) NOT NULL,
  `Scadenza_prestito` date NOT NULL,
  `Inizio_prestito` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prestiti`
--

INSERT INTO `prestiti` (`PK_Id_prestito`, `FK_Id_utente`, `FK_Id_libro`, `Scadenza_prestito`, `Inizio_prestito`) VALUES
(4, 4, 6, '2024-04-24', '2024-05-24'),
(5, 3, 4, '2024-04-24', '2024-05-24'),
(7, 3, 11, '2024-07-11', '2024-05-11'),
(8, 3, 11, '2024-07-11', '2024-05-11'),
(9, 3, 11, '2024-07-11', '2024-05-11'),
(11, 3, 11, '2024-07-11', '2024-05-11'),
(12, 3, 8, '2024-07-17', '2024-05-17'),
(13, 3, 8, '2024-07-17', '2024-05-17'),
(14, 3, 8, '2024-07-17', '2024-05-17'),
(15, 3, 8, '2024-07-17', '2024-05-17'),
(16, 3, 8, '2024-07-17', '2024-05-17'),
(20, 3, 4, '2024-07-17', '2024-05-17'),
(21, 3, 16, '2024-07-17', '2024-05-17'),
(29, 3, 4, '2024-07-20', '2024-05-20'),
(32, 3, 4, '2024-07-20', '2024-05-20'),
(56, 3, 3, '2024-07-20', '2024-05-20'),
(57, 3, 3, '2024-07-20', '2024-05-20');

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
('angelatirabassi', '$2y$10$u0YWKFV54kUrDTyrQymyT.hA4IbLI1GmFP5zHUTD0HT.x6oZUt6kC', 'angelatirabassi05@gmail.com'),
('f', '$2y$10$70RZSR77qH/Mr5ugsYElf.GFsq9RU0kRJzWVHg58ZGqNUFJiqKbaG', 'f@gmail.com'),
('martinob', '$2y$10$g0OuvnS.RoKydFxUdNBFNun22cCC9hVGq5QIwWU6PT7WtP29i6Jhq', 'martin.boa@gmail.com'),
('MAtti04', '$2y$10$08F7sdGe8zoz/ROOAZMo6e/wmB.HywPyjXmuTUWjliUZ5zZd46rdi', 'scarpam204@gmail.com'),
('ometto', '$2y$10$byj31OEjhOw6ZgAwqDAM1.xYc/RpRDRsK3pVE1j/PKP9hKZs.2ZYC', 'iacopo.ferrari@einaudicorreggi');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `PK_Id_utente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `FK_User` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`PK_Id_utente`, `Nome`, `Cognome`, `Mail`, `Telefono`, `FK_User`) VALUES
(3, 'Riccardo', 'Ruozzi', 'ruozziriccardo4@gmail.com', '3389813841', 'admin'),
(4, 'Erika', 'Boccadoro', 'erika.bocca@gmail.com', '3667425670', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `feedback_libri`
--
ALTER TABLE `feedback_libri`
  ADD PRIMARY KEY (`ID_feedback`),
  ADD KEY `username` (`username`),
  ADD KEY `id_libro` (`id_libro`);

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
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`PK_Id_utente`),
  ADD KEY `Fk_Utenti` (`FK_User`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `feedback_libri`
--
ALTER TABLE `feedback_libri`
  MODIFY `ID_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `PK_Id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  MODIFY `PK_Id_prestito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `PK_Id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `feedback_libri`
--
ALTER TABLE `feedback_libri`
  ADD CONSTRAINT `feedback_libri_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `feedback_libri_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libri` (`PK_Id_libro`);

--
-- Limiti per la tabella `prestiti`
--
ALTER TABLE `prestiti`
  ADD CONSTRAINT `prestiti_ibfk_1` FOREIGN KEY (`FK_Id_utente`) REFERENCES `utenti` (`PK_Id_utente`),
  ADD CONSTRAINT `prestiti_ibfk_2` FOREIGN KEY (`FK_Id_libro`) REFERENCES `libri` (`PK_Id_libro`);

--
-- Limiti per la tabella `utenti`
--
ALTER TABLE `utenti`
  ADD CONSTRAINT `Fk_Utenti` FOREIGN KEY (`FK_User`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
