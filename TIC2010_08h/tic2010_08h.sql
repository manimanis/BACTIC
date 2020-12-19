-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 19 Juin 2020 à 19:07
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tic2010_08h`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `numcompte` varchar(20) NOT NULL,
  `motpasse` varchar(8) NOT NULL,
  `nomprenom` varchar(35) NOT NULL,
  `solde` decimal(10,3) NOT NULL,
  PRIMARY KEY (`numcompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`numcompte`, `motpasse`, `nomprenom`, `solde`) VALUES
('00000000000000000001', '1111111', 'Afef Nouir', '1500.000'),
('00000000000000000002', '22222222', 'Amir Darouich', '2199.814'),
('00000000000000000003', '33333333', 'Sami Maghaoui', '-101.000'),
('00000000000000000004', '44444444', 'Asma Ismail', '100.500');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `idtrans` int(11) NOT NULL AUTO_INCREMENT,
  `numcompte` varchar(20) NOT NULL,
  `datetrans` varchar(10) NOT NULL,
  `libelletrans` varchar(40) NOT NULL,
  `monttrans` decimal(10,3) NOT NULL,
  PRIMARY KEY (`idtrans`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`idtrans`, `numcompte`, `datetrans`, `libelletrans`, `monttrans`) VALUES
(3, '00000000000000000002', '2020-06-19', 'Retrait Guichet', '500.986');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
