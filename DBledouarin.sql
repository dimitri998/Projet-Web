-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 12 Février 2014 à 21:00
-- Version du serveur: 5.5.35
-- Version de PHP: 5.4.26-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `DBledouarin`
--

-- --------------------------------------------------------

--
-- Structure de la table `Activite`
--

CREATE TABLE IF NOT EXISTS `Activite` (
  `nom` varchar(10) NOT NULL,
  `ID` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Activite`
--

INSERT INTO `Activite` (`nom`, `ID`) VALUES
('Anglais', 0),
('Cafe', 1),
('Java', 2),
('PHP', 3),
('Python', 4),
('Repos', 5);

-- --------------------------------------------------------

--
-- Structure de la table `faire_activite`
--

CREATE TABLE IF NOT EXISTS `faire_activite` (
  `login` varchar(20) NOT NULL,
  `ID_activite` int(10) NOT NULL,
  `jour` date NOT NULL,
  `heure` int(2) NOT NULL,
  PRIMARY KEY (`login`,`jour`,`heure`),
  KEY `ID_activite` (`ID_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faire_activite`
--

INSERT INTO `faire_activite` (`login`, `ID_activite`, `jour`, `heure`) VALUES
('ledouarin', 0, '2014-02-10', 19),
('ledouarin', 1, '2014-02-13', 16),
('ledouarin', 2, '2014-02-04', 8),
('ledouarin', 4, '2014-02-03', 8),
('ledouarin', 4, '2014-02-11', 8),
('ledouarin', 5, '2014-02-12', 17),
('ledouarin', 5, '2014-02-13', 13);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `password`) VALUES
('ledouarin', '7d4cc05b54e0944491e7bbd24e0b86b6'),
('letort', 'b8445a52ee257b1daf12e555f07d18f5');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `faire_activite`
--
ALTER TABLE `faire_activite`
  ADD CONSTRAINT `faire_activite_ibfk_3` FOREIGN KEY (`ID_activite`) REFERENCES `Activite` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faire_activite_ibfk_2` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
