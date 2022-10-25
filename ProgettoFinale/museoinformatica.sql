-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 03, 2022 alle 09:00
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museoinformatica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `computer`
--

CREATE TABLE `computer` (
  `Id_catalogo` int(11) NOT NULL,
  `Identificativo` varchar(20) NOT NULL,
  `Nome_modello` varchar(25) NOT NULL,
  `anno` varchar(4) NOT NULL,
  `CPU` varchar(15) NOT NULL,
  `velocita_HZ` varchar(6) NOT NULL,
  `RAM` varchar(15) NOT NULL,
  `Hard_disk` varchar(10) DEFAULT NULL,
  `sistema_operativo` varchar(15) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `Id_catalogo` int(11) NOT NULL,
  `Identificativo` varchar(20) NOT NULL,
  `titolo` varchar(20) NOT NULL,
  `autori` varchar(75) NOT NULL,
  `casa_editrice` varchar(20) NOT NULL,
  `anno_pubblicazione` varchar(4) NOT NULL,
  `numero_pagine` varchar(5) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `note` text DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `periferica`
--

CREATE TABLE `periferica` (
  `Id_catalogo` int(11) NOT NULL,
  `Identificativo` varchar(20) NOT NULL,
  `nome_modello` varchar(25) NOT NULL,
  `tipologia` varchar(20) NOT NULL,
  `note` text DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Struttura della tabella `rivista`
--

CREATE TABLE `rivista` (
  `Id_catalogo` int(11) NOT NULL,
  `Identificativo` varchar(20) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `numero_rivista` text NOT NULL,
  `anno` varchar(4) NOT NULL,
  `casa_editrice` varchar(20) NOT NULL,
  `note` text DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- --------------------------------------------------------

--
-- Struttura della tabella `software`
--

CREATE TABLE `software` (
  `Id_catalogo` int(11) NOT NULL,
  `Identificativo` varchar(20) NOT NULL,
  `titolo` varchar(25) NOT NULL,
  `sistema_operativo` varchar(25) NOT NULL,
  `tipo_software` varchar(25) NOT NULL,
  `supporto` varchar(25) NOT NULL,
  `note` text DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`Id_catalogo`),
  ADD UNIQUE KEY `Identificativo` (`Identificativo`);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`Id_catalogo`),
  ADD UNIQUE KEY `Identificativo` (`Identificativo`);

--
-- Indici per le tabelle `periferica`
--
ALTER TABLE `periferica`
  ADD PRIMARY KEY (`Id_catalogo`),
  ADD UNIQUE KEY `Identificativo` (`Identificativo`);

--
-- Indici per le tabelle `rivista`
--
ALTER TABLE `rivista`
  ADD PRIMARY KEY (`Id_catalogo`),
  ADD UNIQUE KEY `Identificativo` (`Identificativo`);

--
-- Indici per le tabelle `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`Id_catalogo`),
  ADD UNIQUE KEY `Identificativo` (`Identificativo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `computer`
--
ALTER TABLE `computer`
  MODIFY `Id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `periferica`
--
ALTER TABLE `periferica`
  MODIFY `Id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `rivista`
--
ALTER TABLE `rivista`
  MODIFY `Id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `software`
--
ALTER TABLE `software`
  MODIFY `Id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
