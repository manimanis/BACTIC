-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Lun 01 Juin 2020 à 20:13
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_2015`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE IF NOT EXISTS `avion` (
  `IdAvion` varchar(4) NOT NULL,
  `Marque` varchar(20) NOT NULL,
  `NbrPlace` int(11) NOT NULL,
  PRIMARY KEY (`IdAvion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avion`
--

INSERT INTO `avion` (`IdAvion`, `Marque`, `NbrPlace`) VALUES
('AB12', 'Airbus 2012', 120),
('BO13', 'Boeing 2013', 180),
('CN10', 'Concorde 2010', 220);

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE IF NOT EXISTS `pilote` (
  `Matricule` varchar(4) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Genre` varchar(1) NOT NULL,
  `Email` varchar(96) NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pilote`
--

INSERT INTO `pilote` (`Matricule`, `Nom`, `Prenom`, `Genre`, `Email`) VALUES
('BL68', 'Bellili', 'Lamine', 'H', 'bellili@laposte.net'),
('CN70', 'Chawachi', 'Noura', 'F', 'noura@gmail.com'),
('KY75', 'Kefi', 'Youssra', 'F', 'kefiyoussra@yahoo.fr'),
('MM68', 'MANI', 'Mohamed', 'H', 'hafedhjarraya@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `IdAvion` varchar(4) NOT NULL,
  `DateDep` datetime NOT NULL,
  `Duree` int(11) NOT NULL,
  `RefDep` int(11) NOT NULL,
  `RefDest` int(11) NOT NULL,
  `MatPilote` varchar(4) NOT NULL,
  PRIMARY KEY (`IdAvion`,`DateDep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`IdAvion`, `DateDep`, `Duree`, `RefDep`, `RefDest`, `MatPilote`) VALUES
('AB12', '2015-01-12 13:40:00', 75, 1, 5, 'BL68'),
('AB12', '2015-01-15 15:45:00', 125, 5, 1, 'BL68'),
('BO13', '2015-02-09 17:20:00', 80, 1, 5, 'BL68'),
('CN10', '2015-02-24 11:30:00', 65, 6, 3, 'CN70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
