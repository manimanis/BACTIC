-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Juin 2020 à 07:16
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TIC2010_11h`
--

-- --------------------------------------------------------

--
-- Structure de la table `assure`
--

CREATE TABLE `assure` (
  `matricule` varchar(10) NOT NULL,
  `ncin` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `etatcivil` varchar(1) NOT NULL,
  `nbrenfant` int(11) NOT NULL,
  `typeassurance` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `assure`
--

INSERT INTO `assure` (`matricule`, `ncin`, `nom`, `prenom`, `etatcivil`, `nbrenfant`, `typeassurance`) VALUES
('2222222222', '13333333', 'MANI', 'Mohamed Anis', 'M', 1, 'Médecin de famille'),
('3333333333', '01234567', 'HAMDI', 'Mohamed', 'C', 0, 'Santé publique');

-- --------------------------------------------------------

--
-- Structure de la table `soin`
--

CREATE TABLE `soin` (
  `matricule` varchar(10) NOT NULL,
  `datesoin` date NOT NULL,
  `montantsoin` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soin`
--

INSERT INTO `soin` (`matricule`, `datesoin`, `montantsoin`) VALUES
('2222222222', '2020-06-23', '50.000'),
('2222222222', '2020-06-24', '10.000');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `assure`
--
ALTER TABLE `assure`
  ADD PRIMARY KEY (`matricule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
