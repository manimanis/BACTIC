-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Mai 2017 à 05:50
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_tic_2017`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `code` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `prixbase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`code`, `libelle`, `prixbase`) VALUES
(36, 'Luth du Hedi Jouini', 525),
(45, 'Manuscrit d''AboulKacem Echebbi', 8520),
(120, 'Les gants du gardien Attouga', 453),
(212, 'Voiture 202 Bh', 25470);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`cin`, `nom`, `prenom`, `tel`) VALUES
('07619475', 'Mani', 'Mohamed Anis', '22333444'),
('11907824', 'Ben Ahmed', 'Slim', '12345678');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `cin` varchar(8) NOT NULL,
  `code` int(11) NOT NULL,
  `prixpropose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`cin`, `code`, `prixpropose`) VALUES
('07619475', 36, 530),
('07619475', 120, 600),
('11907824', 36, 530);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`cin`,`code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
