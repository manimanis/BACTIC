-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2013 at 05:55 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_8h_2013`
--

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `Numero` varchar(5) NOT NULL,
  `NomPrenom` varchar(50) NOT NULL,
  `DateNaiss` date NOT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`Numero`, `NomPrenom`, `DateNaiss`) VALUES
('4SI01', 'Eya Boughzela', '1990-05-20'),
('4SI02', 'Slim Hachfi', '1990-01-01'),
('4SI03', 'Yosri Mlika', '1990-07-25'),
('4SI04', 'Rakia Gazzeh', '1991-03-05'),
('4SI05', 'Majdi Soughir', '1989-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `code` varchar(4) NOT NULL,
  `libelle` varchar(60) NOT NULL,
  `coeff` double NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`code`, `libelle`, `coeff`) VALUES
('Algo', 'Algorithmique et Programmation', 3),
('BD', 'Bases de données', 1.5),
('TIC', 'Technologies de l''Information et de la Communication', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `NumEleve` varchar(5) NOT NULL,
  `CodeMatiere` varchar(4) NOT NULL,
  `DC` double NOT NULL,
  `DS` double NOT NULL,
  PRIMARY KEY (`NumEleve`,`CodeMatiere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`NumEleve`, `CodeMatiere`, `DC`, `DS`) VALUES
('4SI01', 'Algo', 15, 16),
('4SI01', 'BD', 20, 16),
('4SI01', 'TIC', 18, 17);
