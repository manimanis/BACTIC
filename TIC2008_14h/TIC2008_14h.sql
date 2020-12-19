-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Juin 2020 à 07:37
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TIC2008_14h`
--

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE `exercices` (
  `num` varchar(32) NOT NULL,
  `enonce` text NOT NULL,
  `solution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `exercices`
--

INSERT INTO `exercices` (`num`, `enonce`, `solution`) VALUES
('ex1', 'Ecrire un programme en pascal qui permet d''afficher les valeurs du tableau suivant :\r\n\r\n<table border="1">\r\n<tr>\r\n<td>0.0</td>\r\n<td>-55.36</td>\r\n<td>3.14</td>\r\n<td>60</td>\r\n<td>10-9</td>\r\n<td>1.23</td>\r\n<td>-38.0</td>\r\n<td>5.6</td>\r\n<td>106</td>\r\n</tr>\r\n</table>', 'program prog03;\r\nbegin\r\n  Writeln(0.0);\r\n  Writeln(-55.36);\r\n  Writeln(3.14);\r\n  Writeln(60E-9);\r\n  Writeln(1.23);\r\n  Writeln(-38.0);\r\n  Writeln(5.6E6);\r\n  Readln;\r\nend.'),
('ex2', 'Déclarer les tableaux suivants en Pascal :\n\n<table class="normal">\n    <tbody>\n      <tr>\n        <td class="center borderless">te</td>\n<td class="center border" width="9%">8</td>\n<td class="center border" width="9%">79</td>\n<td class="center border" width="9%">52</td>\n<td class="center border" width="9%">36</td>\n<td class="center border" width="9%">55</td>\n<td class="center border" width="9%">27</td>\n<td class="center border" width="9%">63</td>\n<td class="center border" width="9%">31</td>\n<td class="center border" width="9%">9</td>\n<td class="center border" width="9%">91</td>\n\n      </tr>\n      <tr>\n        <td>&nbsp;</td>\n        <td class="center small borderless">1</td>\n<td class="center small borderless">2</td>\n<td class="center small borderless">3</td>\n<td class="center small borderless">4</td>\n<td class="center small borderless">5</td>\n<td class="center small borderless">6</td>\n<td class="center small borderless">7</td>\n<td class="center small borderless">8</td>\n<td class="center small borderless">9</td>\n<td class="center small borderless">10</td>\n\n      </tr>\n    </tbody>\n  </table>\n', 'type\r\n  tab_e = array [1..10] of integer;\r\n  tab_r = array [-3..3] of real;\r\n  tab_b = array [''A''..''Z''] of boolean;\r\n  jours= (Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche);\r\n  tab_c = array [Lundi..Dimanche] of string;\r\nvar \r\n  te : tab_e;\r\n  tr : tab_r;\r\n  tb : tab_b;\r\n  tc : tab_c;'),
('ex3', 'Ecrire un programme qui calcule et affiche la valeur absolue d''un entier donné sans utiliser la fonction prédéfinie abs.', '{ Instruction à traduire }\r\nsi a < 0 alors\r\n  a ⟵ -a\r\nfin si'),
('ex4', '<p>Un élève est admis s''il obtient une moyenne supèrieure ou égale à 10, il est refusé s''il obtient une moyenne infèrieure à 9, sinon il est contrôle.</p>\r\n\r\n<p>Ecrire un programme qui affiche l''appréciation d''un ''élève selon sa moyenne.</p>', '{Algorithmique}\r\nsi moy >= 10 alors\r\n  Ecrire("Admis")\r\nsinon si moy >= 9 alors\r\n  Ecrire("Contrôle")\r\nsinon\r\n  Ecrire("Refusé")\r\nfin si');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
