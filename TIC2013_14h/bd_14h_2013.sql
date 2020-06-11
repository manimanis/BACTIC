-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 26 Mai 2013 à 17:12
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_14h_2013`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ncin` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `tel` varchar(8) NOT NULL,
  PRIMARY KEY (`ncin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ncin`, `nom`, `prenom`, `tel`) VALUES
('02222222', 'NAMLA', 'Mohamed Ali', '20789654'),
('04444444', 'Idoudi', 'Anouar', '97465241'),
('11111111', 'Saïd', 'Islem', '52634178'),
('13333333', 'Idoudi', 'Oussema', '41857496');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `ref` varchar(5) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `prix_heure` int(11) NOT NULL,
  `disponible` char(1) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`ref`, `libelle`, `prix_heure`, `disponible`) VALUES
('JSK01', 'Jet-Ski', 25, 'O'),
('PCH01', 'Parachute', 15, 'N'),
('PED01', 'Pédalo individuel', 10, 'N'),
('PED02', 'Pédalo double', 18, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `ncin_client` varchar(8) NOT NULL,
  `ref_equipement` varchar(5) NOT NULL,
  `date_loc` datetime NOT NULL,
  `date_ret` datetime NOT NULL,
  PRIMARY KEY (`ncin_client`,`ref_equipement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`ncin_client`, `ref_equipement`, `date_loc`, `date_ret`) VALUES
('11111111', 'JSK01', '2013-05-26 16:45:06', '2013-05-26 17:45:06'),
('11111111', 'PED02', '2013-05-26 16:52:14', '2013-05-26 21:52:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
