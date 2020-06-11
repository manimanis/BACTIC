-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 23 Mai 2013 à 18:49
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_10h_2013`
--

-- --------------------------------------------------------

--
-- Structure de la table `choix_offre`
--

DROP TABLE IF EXISTS `choix_offre`;
CREATE TABLE IF NOT EXISTS `choix_offre` (
  `ncindemandeur` varchar(8) NOT NULL,
  `ref_offre` int(11) NOT NULL,
  `date_choix` datetime NOT NULL,
  PRIMARY KEY (`ncindemandeur`,`ref_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `choix_offre`
--

INSERT INTO `choix_offre` (`ncindemandeur`, `ref_offre`, `date_choix`) VALUES
('01234567', 1, '2013-05-23 18:34:40');

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

DROP TABLE IF EXISTS `demandeur`;
CREATE TABLE IF NOT EXISTS `demandeur` (
  `ncin` varchar(8) NOT NULL,
  `nom_prenom` varchar(40) NOT NULL,
  `domaine` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`ncin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeur`
--

INSERT INTO `demandeur` (`ncin`, `nom_prenom`, `domaine`, `ville`) VALUES
('01234567', 'Demandeur 1', 'Mécanicien', 'Zaghouan'),
('12345678', 'Demandeur 2', 'Electricien', 'Jendouba'),
('17865423', 'Demandeur 4', 'Infirmier', 'Libye'),
('18765432', 'Demandeur 3', 'Ingénieur', 'Douz');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_entreprise` varchar(50) NOT NULL,
  `domaine_offre` varchar(40) NOT NULL,
  `nombre_poste` int(11) NOT NULL,
  `ville_entreprise` varchar(30) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`ref`, `libelle_entreprise`, `domaine_offre`, `nombre_poste`, `ville_entreprise`) VALUES
(1, 'Entreprise A', 'Mécanicien', 5, 'Zaghouan'),
(2, 'Entreprise B', 'Electricien', 4, 'Tataouine'),
(3, 'Entreprise C', 'Infirmier', 4, 'Manouba'),
(4, 'Entreprise D', 'Mécanicien', 6, 'Douz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
