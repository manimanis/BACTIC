-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Lun 15 Juin 2020 à 11:36
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tic2009_08h`
--

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `CIN` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `note` double NOT NULL,
  PRIMARY KEY (`CIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`CIN`, `nom`, `prenom`, `note`) VALUES
(1234567, 'Azzouz', 'Mohamed', 12),
(1234568, 'Tounsi', 'Hounaida', 8),
(1234569, 'Gafsi', 'Sourour', 16),
(2035508, 'MANI', 'Mohamed', 12),
(2035509, 'MANI', 'Mohamed Anis', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
