-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Juin 2020 à 16:38
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `tic2012_14h`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `numcom` int(11) NOT NULL,
  `contenu` varchar(150) CHARACTER SET latin1 NOT NULL,
  `datecom` datetime NOT NULL,
  `pseudo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `numsujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`numcom`, `contenu`, `datecom`, `pseudo`, `numsujet`) VALUES
(2, '', '2012-05-26 08:13:25', 'bahmed', 2),
(3, 'Un commentaire sur la récursivité', '2012-05-26 08:15:53', 'bahmed', 2),
(6, 'Un commentaire sur les enregistrements et les fichiers', '2020-06-10 16:31:16', 'bahmed', 1),
(7, 'Un commentaire sur la récursivité', '2020-06-10 16:32:10', 'bahmed', 2);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(20) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `nom`, `prenom`, `email`) VALUES
('Alia123', 'Sahbani', 'Alia', 'Sahbani.Alia@edunet.tn'),
('Bahmed', 'Bahri', 'Imed', 'bahri.Imed@gmail.com'),
('Besgabt', 'Gabtni', 'Besma', 'Besma.gabtni@gmail.com'),
('Hamrounif', 'Hamrouni', 'Fethi', 'Hamrouni@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `numsujet` int(11) NOT NULL,
  `theme` varchar(40) CHARACTER SET latin1 NOT NULL,
  `datesujet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`numsujet`, `theme`, `datesujet`) VALUES
(1, 'Les enregistrements et les fichiers', '2011-10-05'),
(2, 'La récursivité', '2011-11-11'),
(3, 'Les algorithmes de tri', '2012-01-15'),
(4, 'Les algorithmes arithmétiques', '2012-03-02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`numcom`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`numsujet`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `numcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;