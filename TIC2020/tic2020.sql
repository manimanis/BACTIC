-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Mer 24 Juin 2020 à 18:30
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tic2020`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `tel` varchar(8) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `motpass` varchar(6) NOT NULL,
  PRIMARY KEY (`tel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`tel`, `nom`, `prenom`, `adresse`, `motpass`) VALUES
('20000000', 'MANI', 'Mohamed', 'Une adresse', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idpizza` varchar(3) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `datecmd` datetime NOT NULL,
  `qtecmd` int(11) NOT NULL,
  PRIMARY KEY (`idpizza`,`tel`,`datecmd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idpizza`, `tel`, `datecmd`, `qtecmd`) VALUES
('Fmr', '20000000', '2020-06-24 18:29:28', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `idpizza` varchar(3) NOT NULL,
  `nompizza` varchar(30) NOT NULL,
  `details` varchar(200) NOT NULL,
  `prix` decimal(6,3) NOT NULL,
  PRIMARY KEY (`idpizza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pizza`
--

INSERT INTO `pizza` (`idpizza`, `nompizza`, `details`, `prix`) VALUES
('Fmr', 'Fruits de mer', 'Tomate, Mozzarella, Fruits de mer', '18.500'),
('Mgh', 'Margherita', 'Tomate, Mozzarella, Basilic', '8.000'),
('Nap', 'Napolitaine', 'Tomate, Mozzarella, Thon, Anchois', '12.000'),
('Nep', 'Neptune', 'Tomate, Mozzarella, Thon', '10.500'),
('Roy', 'Royale', 'Tomate, Mozzarella, Jambon, Champignons', '14.500');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
