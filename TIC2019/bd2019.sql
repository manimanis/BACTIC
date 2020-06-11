-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 01 juin 2019 à 15:47
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd2019`
--

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `IdParticipant` int(11) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Mdp` varchar(6) NOT NULL,
  `Genre` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`IdParticipant`, `Mail`, `Mdp`, `Genre`) VALUES
(1, 'aaa@aaa.aa', 'azeRT1', 'M'),
(2, 'bbb@aaa.aa', 'azeRT2', 'F'),
(3, 'bbb@cccc.aa', 'azeRT2', 'M'),
(4, 'cccc@kkkkk.ddd', 'azeRT1', 'F'),
(5, 'aaab@aaab.aa', 'azeRT1', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `NumQ` int(11) NOT NULL,
  `NumS` int(11) NOT NULL,
  `Contenu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`NumQ`, `NumS`, `Contenu`) VALUES
(1, 1, 'Les informations partagées sur les réseaux sociaux sont fiables'),
(1, 2, 'Les jeux vidéos contribuent au développement de la pensée logique'),
(2, 1, 'L\'usage des réseaux sociaux par les enfants doit être sous contrôle parental'),
(3, 1, 'Les réseaux sociaux deviennent une nécessité pour les citoyens');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `NumQ` int(11) NOT NULL,
  `NumS` int(11) NOT NULL,
  `IdParticipant` int(11) NOT NULL,
  `Rep` enum('O','N','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`NumQ`, `NumS`, `IdParticipant`, `Rep`) VALUES
(1, 1, 1, 'O'),
(2, 1, 1, 'O'),
(3, 1, 1, 'O'),
(1, 1, 2, 'N'),
(2, 1, 2, 'N'),
(3, 1, 2, 'O'),
(1, 1, 3, 'S'),
(2, 1, 3, 'S'),
(3, 1, 3, 'N'),
(1, 1, 4, 'O'),
(2, 1, 4, 'O'),
(3, 1, 4, 'O'),
(1, 1, 5, 'N'),
(2, 1, 5, 'N'),
(3, 1, 5, 'N');

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `NumS` int(11) NOT NULL,
  `Theme` varchar(50) NOT NULL,
  `DateDebut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sondage`
--

INSERT INTO `sondage` (`NumS`, `Theme`, `DateDebut`) VALUES
(1, 'Les réseaux sociaux', '2019-05-01'),
(2, 'Les jeux vidéos', '2019-06-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`IdParticipant`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`NumQ`,`NumS`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`NumS`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `IdParticipant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `NumS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
