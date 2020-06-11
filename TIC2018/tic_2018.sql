-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Mai 2018 à 13:08
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tic_2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `DateEval` date NOT NULL,
  `IdHotel` int(11) NOT NULL,
  `NoteAccueil` int(11) NOT NULL,
  `NoteRest` int(11) NOT NULL,
  `NoteExtra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`DateEval`, `IdHotel`, `NoteAccueil`, `NoteRest`, `NoteExtra`) VALUES
('2017-05-22', 10, 3, 1, 0),
('2017-06-15', 20, 3, 2, 2),
('2017-06-15', 30, 2, 1, 2),
('2018-02-20', 10, 2, 1, 1),
('2018-04-13', 30, 2, 2, 7),
('2018-05-21', 10, 2, 1, 0),
('2018-05-21', 20, 3, 3, 1),
('2018-05-21', 30, 3, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `IdHotel` int(11) NOT NULL,
  `NomHotel` varchar(50) NOT NULL,
  `TelHotel` varchar(8) NOT NULL,
  `VilleHotel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hotel`
--

INSERT INTO `hotel` (`IdHotel`, `NomHotel`, `TelHotel`, `VilleHotel`) VALUES
(10, '5 Stars', '76333444', 'Tozeur'),
(20, 'Globe', '78111111', 'Tabarka'),
(30, 'The Sun', '73888888', 'Monastir');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`DateEval`,`IdHotel`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`IdHotel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
