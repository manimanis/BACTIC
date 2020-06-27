-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Juin 2020 à 14:19
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TIC2012_08h`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `num` varchar(4) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `niveau` varchar(1) NOT NULL,
  `candidat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`num`, `nom`, `prenom`, `genre`, `niveau`, `candidat`) VALUES
('1111', 'MANI', 'Mohamed Anis', 'G', '7', 'N'),
('2222', 'MANI', 'Samia', 'F', '7', 'N'),
('3333', 'Latiri', 'Youssef', 'G', '8', 'N'),
('8000', 'Abbasi', 'Sihem', 'F', '8', 'O'),
('8001', 'Ben Abdallah', 'Kacem', 'G', '8', 'O'),
('9000', 'Dridi', 'Brahim', 'G', '9', 'O'),
('9001', 'Troudi', 'Meryem', 'F', '9', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `nume` varchar(4) NOT NULL,
  `numc` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`nume`, `numc`) VALUES
('1111', '8000'),
('1111', '9000'),
('2222', '9001'),
('2222', '8001'),
('3333', '9001'),
('3333', '9000');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
