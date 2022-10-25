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
-- Database: `museoinformaticatest`
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

--
-- Dump dei dati per la tabella `computer`
--

INSERT INTO `computer` (`Id_catalogo`, `Identificativo`, `Nome_modello`, `anno`, `CPU`, `velocita_HZ`, `RAM`, `Hard_disk`, `sistema_operativo`, `note`, `URL`, `tag`) VALUES
(2, 'Comp43534', 'asus', '2000', 'rizen5', '4', '8 GB', ' 1 TB', ' android', 'ji', NULL, 'ji'),
(4, 'Comp989', 'intel4004', '1999', 'I9', '4', '5GB', '1TB', 'windows ', NULL, NULL, 'intel,computer,windows,i9'),
(14, 'Compkkjk', 'olivetti1', '1985', 'snapdragon', '1', '50mb', '500gb', 'linux', 'esposto,non funzionante', '', 'computer,linux,olivetti'),
(15, 'Comp9819', 'intel4004', '1999', 'I9', '4', '5GB', '1TB', 'windows ', '', '', 'intel,computer,windows,i9'),
(16, 'Comp324432', 'asus', '2000', 'I7', '2,78', '5 TB ', '1GB', 'linux', NULL, 'ahahah', NULL),
(22, 'Comp452', 'asus', '2000', 'I7', '2,78', '5 gb', '1GB', 'macOS', '', '', '');

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

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`Id_catalogo`, `Identificativo`, `titolo`, `autori`, `casa_editrice`, `anno_pubblicazione`, `numero_pagine`, `ISBN`, `note`, `URL`, `tag`) VALUES
(1, 'li898', 'la divina commedia', 'Dante Alighieri', 'loaker', '0', '456', 'IS88888htht', 'comune,molte copie disponibili', 'www.dante.it', 'dante,libro,comune'),
(2, 'li655656', 'l\'odissea', 'omero ', 'hoepli', '0', '369', 'OOOOO11Q888II', 'rovinato ', NULL, 'libro,omero');

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
-- Dump dei dati per la tabella `periferica`
--

INSERT INTO `periferica` (`Id_catalogo`, `Identificativo`, `nome_modello`, `tipologia`, `note`, `URL`, `tag`) VALUES
(1, 'perif9899', 'logitech atm ', 'mouse ', 'funzionate ', 'www.logitech.it ', 'funzionante,periferica,mouse '),
(2, 'perif4565', 'arm 3 ', 'tastiera meccanica ', NULL, 'www.arm.com', 'tastiera,perfiferica'),
(12, 'Peri348P', '', 'smartphone', 'rotto', 'ahahah', 'j');

-- --------------------------------------------------------

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
-- Dump dei dati per la tabella `rivista`
--

INSERT INTO `rivista` (`Id_catalogo`, `Identificativo`, `titolo`, `numero_rivista`, `anno`, `casa_editrice`, `note`, `URL`, `tag`) VALUES
(1, 'rivi655656', 'l\'informatico', '5456', '1952', 'loaker', 'molte copie a disposizione ', NULL, 'rivista,comune'),
(2, 'rivi2332', 'l\'odissea', '87678l587', '1999', 'hoepli', '4555', 'www.l\'odissea.it', 'rivista,l\'odissea'),
(4, 'rivi1111Prova', 'oggi', '148562366', '1986', 'cairo', 'rotto', 'ww.samsung.vom', 'rivista,oggi,rotto');

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
-- Dump dei dati per la tabella `software`
--

INSERT INTO `software` (`Id_catalogo`, `Identificativo`, `titolo`, `sistema_operativo`, `tipo_software`, `supporto`, `note`, `URL`, `tag`) VALUES
(1, 'soft32324', 'mariocart 1', 'windows ', 'gioco ', 'floppy', NULL, NULL, 'gioco,mariokart,software'),
(2, 'soft7667', 'emule ', 'linux', 'emulatore', 'CD ', 'non funzionante ', 'www.emule.it ', NULL);

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
