-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2024 alle 15:28
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
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `PK_Id_libro` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Autore` varchar(50) NOT NULL,
  `Casa_editrice` varchar(50) NOT NULL,
  `Anno_pubblicazione` int(4) DEFAULT NULL,
  `Collana` varchar(50) DEFAULT NULL,
  `Genere` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`PK_Id_libro`, `Titolo`, `Autore`, `Casa_editrice`, `Anno_pubblicazione`, `Collana`, `Genere`) VALUES
(1, 'Il mastino dei Baskerville', 'Arthur Conan Doyle', 'Feltrinelli', 1902, 'GrandiGialli', 'Giallo'),
(3, 'La bibbia', '', 'Feltrinelli', 0, 'Religione', 'Teologia'),
(4, 'La bella addormentata nel bosco', 'Gianbattista Basile', 'Giunti', 1922, 'Bambini', 'Fiaba'),
(5, 'I 10 piccoli indiani', 'Agatha Christie', 'Giunti', 1939, 'Grandi classici', 'Gialli'),
(6, 'Sei personaggi in cerca di autore', 'Luigi Pirandello', 'Gli Adelphi', 1921, 'Classici italiani', 'Commedia teatrale'),
(7, 'Il grande Gatsby', 'Francis Scott Fitzgerald', 'Mondadori', 1925, 'I Meridiani', 'Romanzo'),
(8, '1984', 'George Orwell', 'Mondadori', 1949, 'Oscar Moderni', 'Romanzo distopico'),
(9, 'Orgoglio e pregiudizio', 'Jane Austen', 'Garzanti', 1813, 'I grandi libri', 'Romanzo'),
(10, 'Harry Potter e la pietra filosofale', 'Joanne Rowling', 'Salani', 1997, 'Harry Potter', 'Fantasy'),
(11, 'La ragazza di Bube', 'Carlo Cassola', 'Einaudi', 1960, 'Einaudi tascabili', 'Romanzo'),
(12, 'To Kill a Mockingbird', 'Harper Lee', 'Mondadori', 1960, 'Oscar Moderni', 'Romanzo'),
(13, 'Il signore degli anelli', 'John Ronald Reuel Tolkien', 'Bompiani', 1954, 'Tascabili Bompiani', 'Fantasy'),
(14, 'Piccole donne', 'Louisa May Alcott', 'Mondadori', 1868, 'Oscar Moderni', 'Romanzo'),
(15, 'Cime tempestose', 'Emily Brontë', 'Mondadori', 1846, 'Mondadori', 'Romanzo'),
(16, 'Cent\'anni di solitudine', 'Gabriel García Márquez', 'Mondadori', 1967, 'I Meridiani', 'Romanzo'),
(17, 'Guerra e pace', 'Lev Nikolaevič Tolstoj', 'Einaudi', 1869, 'Einaudi tascabili', 'Romanzo storico'),
(18, 'La colpa è delle stelle', 'John Green', 'Mondadori', 2012, 'Oscar Moderni', 'Romanzo per ragazzi'),
(19, 'Anna Karenina', 'Lev Nikolaevič Tolstoj', 'Mondadori', 1877, 'I grandi libri', 'Romanzo'),
(20, 'La storia infinita', 'Michael Ende', 'Mondadori', 1979, 'Oscar Moderni', 'Fantasy'),
(21, 'Lo Hobbit', 'John Ronald Reuel Tolkien', 'Bompiani', 1937, 'Oscar Draghi', 'Fantasy'),
(22, 'I miserabili', 'Victor Hugo', 'Mondadori', 1862, 'I grandi libri', 'Romanzo'),
(23, 'La fattoria degli animali', 'George Orwell', 'Mondadori', 1945, 'Oscar Moderni', 'Romanzo satirico'),
(24, 'Il codice da Vinci', 'Dan Brown', 'Mondadori', 2003, 'Oscar Moderni', 'Romanzo thriller'),
(25, 'Harry Potter e il prigioniero di Azkaban', 'Joanne Rowling', 'Salani', 1999, 'Harry Potter', 'Fantasy'),
(26, 'Le cronache di Narnia: Il leone, la strega e l\'armadio', 'Clive Staples Lewis', 'Mondadori', 1950, 'Oscar Moderni', 'Fantasy');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`PK_Id_libro`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `PK_Id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
