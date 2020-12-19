-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 26 Juin 2020 à 13:37
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tic2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `idPiece` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`idPiece`, `titre`) VALUES
(1, 'Le trésor'),
(2, 'Le péché du succès'),
(3, 'Le gradien'),
(4, 'Les soldats de la lune'),
(5, 'L''éternel retour');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `idsalle` varchar(2) NOT NULL DEFAULT '',
  `libelle` varchar(30) NOT NULL DEFAULT '',
  `adresse` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idsalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`idsalle`, `libelle`, `adresse`) VALUES
('EA', 'Espace Artisto', '3, Rue de Damas le Belvédère - Tunis'),
('EN', 'L''Etoile du Nord', '41, Avenue Farhat Hached - Tunis'),
('QA', 'Quatrième Art', '7, Avenue de Paris - Tunis'),
('TM', 'Théâtre Municipal', '2, Rue de Grèce - Tunis');

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

CREATE TABLE IF NOT EXISTS `spectacle` (
  `idpiece` int(11) NOT NULL DEFAULT '0',
  `datespectacle` date NOT NULL DEFAULT '0000-00-00',
  `idsalle` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`idpiece`,`datespectacle`),
  KEY `FkSalle` (`idsalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `spectacle`
--

INSERT INTO `spectacle` (`idpiece`, `datespectacle`, `idsalle`) VALUES
(2, '2016-05-15', 'QA'),
(2, '2020-06-27', 'QA'),
(3, '2016-05-23', 'QA'),
(1, '2016-05-15', 'TM'),
(1, '2020-06-26', 'TM'),
(5, '2016-05-24', 'TM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
