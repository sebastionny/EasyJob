-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 sep. 2019 à 00:47
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepte`
--

DROP TABLE IF EXISTS `accepte`;
CREATE TABLE IF NOT EXISTS `accepte` (
  `fait` int(1) NOT NULL,
  `etoile` int(1) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `idEmploye` varchar(10) NOT NULL,
  `idService` varchar(20) NOT NULL,
  PRIMARY KEY (`idEmploye`,`idService`),
  KEY `fk_accepte_idService` (`idService`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motPasse` varchar(15) NOT NULL,
  `couriel` varchar(20) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
CREATE TABLE IF NOT EXISTS `disponibilite` (
  `idDispo` varchar(10) NOT NULL,
  `jour` varchar(10) NOT NULL,
  `deHeure` int(2) NOT NULL,
  `aHeure` int(2) NOT NULL,
  `idEmploye` varchar(10) NOT NULL,
  PRIMARY KEY (`idDispo`),
  KEY `fk_disponibilite_idEmploye` (`idEmploye`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` varchar(10) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `dateNais` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `experience` int(2) NOT NULL,
  `qualite` varchar(60) NOT NULL,
  `nomRef` varchar(50) NOT NULL,
  `telRef` varchar(15) NOT NULL,
  `idCompte` varchar(10) NOT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `fk_compte_Emp` (`idCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

DROP TABLE IF EXISTS `employeur`;
CREATE TABLE IF NOT EXISTS `employeur` (
  `idEmployeur` varchar(10) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `idCompte` varchar(10) NOT NULL,
  PRIMARY KEY (`idEmployeur`),
  KEY `fk_employeur_compte` (`idCompte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `idRestaurant` varchar(10) NOT NULL,
  `nomRestaurant` varchar(20) NOT NULL,
  `adrRestaurant` varchar(50) NOT NULL,
  `telRestaurant` varchar(15) NOT NULL,
  `descRestaurant` varchar(100) NOT NULL,
  `idEmployeur` varchar(10) NOT NULL,
  PRIMARY KEY (`idRestaurant`),
  KEY `fk_rest_Emp` (`idEmployeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idService` varchar(20) NOT NULL,
  `typeService` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `heureDebut` int(2) NOT NULL,
  `heureFin` int(2) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `renumHeure` double NOT NULL,
  `description` varchar(100) NOT NULL,
  `experience` int(2) NOT NULL,
  `active` int(1) NOT NULL,
  `idRestaurant` varchar(10) NOT NULL,
  `idEmployeur` varchar(10) NOT NULL,
  PRIMARY KEY (`idService`),
  KEY `fk_service_idEmp` (`idEmployeur`),
  KEY `fk_service_idRes` (`idRestaurant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
