-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Juin 2020 à 20:36
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tic2010_14h`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `classe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`cin`, `nom`, `prenom`, `classe`) VALUES
('01111111', 'Alaya', 'Ibtissem', '4SI1'),
('03333333', 'Barhoumi', 'Mohamed', '3SC2'),
('04444444', 'Dhouibi', 'Malek', '2TI'),
('05555555', 'Nouir', 'Afef', '3SC1');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `cin` varchar(8) NOT NULL,
  `numlivre` varchar(5) NOT NULL,
  `dateemprunt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`cin`, `numlivre`, `dateemprunt`) VALUES
('03333333', 'B0132', '2020-06-23'),
('03333333', 'M0145', '2020-06-22'),
('03333333', 'W0225', '2020-06-20');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `numlivre` varchar(5) NOT NULL,
  `typelivre` varchar(25) NOT NULL,
  `titrelivre` varchar(35) NOT NULL,
  `nbrexemplairesdisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`numlivre`, `typelivre`, `titrelivre`, `nbrexemplairesdisp`) VALUES
('A0001', 'Algorithmique', 'Les structures de contrôles', 15),
('A0002', 'Algorithmique', 'Algorithme par l_exemple', 5),
('B0132', 'Base de données', 'Access 2007', 22),
('M0145', 'Multimédia', 'Flash MX', 9),
('W0225', 'Développement Web', 'JavaScript pour débutant', 19);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`cin`,`numlivre`,`dateemprunt`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`numlivre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
