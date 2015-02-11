-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 03 Avril 2009 à 17:39
-- Version du serveur: 5.1.30
-- Version de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `acx`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

CREATE TABLE IF NOT EXISTS `annuaire` (
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `Avatar` binary(1) NOT NULL,
  `statut` int(10) DEFAULT NULL,
  `adresse` varchar(128) DEFAULT NULL,
  `codepostal` int(6) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `karting` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `mdp` (`mdp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annuaire`
--

INSERT INTO `annuaire` (`login`, `mdp`, `nom`, `prenom`, `email`, `Avatar`, `statut`, `adresse`, `codepostal`, `ville`, `telephone`, `datedenaissance`, `karting`) VALUES
('Ghislain', '30f6508881e0f0ce26e49047c929e3', 'Grange', 'Ghislain', 'ghigrange@free.fr', '\0', 2, '45 rue d''Angiviller', 78000, 'Versailles', '0650833813', '0000-00-00', 0),
('JR', '5a9cf67e86ca9737d77fe30e613f70', 'Beaudoin', 'JeanRemi', 'carvallofrancois@gmail.com', '\0', 0, '21 Bd du LycÃ©e', 92170, 'Vanves', '0147360706', '1987-02-07', 0),
('Vallo', '18a5f11ec0975c4e40e3d294449a44', 'Carvallo', '', '', '\0', 0, '', 0, '', '', '0000-00-00', 0),
('', 'da39a3ee5e6b4b0d3255bfef956018', '', '', '', '\0', 0, '', 0, '', '', '0000-00-00', 0);
