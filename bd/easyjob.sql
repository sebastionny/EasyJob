-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 21 Septembre 2019 à 10:28
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easyjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepte`
--

CREATE TABLE `accepte` (
  `fait` int(1) NOT NULL,
  `etoile` int(1) NOT NULL,
  `commentaire` varchar(10000) NOT NULL,
  `idEmploye` int(40) NOT NULL,
  `idService` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idCompte` int(40) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motDePasse` varchar(40) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `estEmploye` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `nom`, `prenom`, `motDePasse`, `courriel`, `active`, `estEmploye`) VALUES
(1, 'elbarchaoui', 'meryem', 'mery84', 'mery84@gmail.com', 1, 0),
(2, 'ousliman', 'ismail', 'ismail70', 'ismail70@gmail.com', 1, 1),
(7698, 'elbarchaoui', 'meryem', 'mery84', 'mery85@gmail.com', 1, 0),
(3828, 'ffffe', 'fewefeww', 'qqq', 'ffew@hth', 1, 0),
(7262, 'qqqqqqqqqqq', 'qqqqqqqqqqqqq', 'ffffff', 'qqqqqqqqq@ffffff', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `jour` varchar(10) NOT NULL,
  `heureDebut` int(2) NOT NULL,
  `heureFin` int(2) NOT NULL,
  `idEmploye` int(40) NOT NULL,
  `idDispo` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(40) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `experience` int(2) NOT NULL,
  `qualite` varchar(60) NOT NULL,
  `nomRef` varchar(50) NOT NULL,
  `telRef` varchar(15) NOT NULL,
  `idCompte` int(40) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `codePostal` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

CREATE TABLE `employeur` (
  `idEmployeur` int(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `idCompte` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `idRest` int(40) NOT NULL,
  `nomRest` varchar(40) NOT NULL,
  `adresseRest` varchar(100) NOT NULL,
  `telRest` varchar(15) NOT NULL,
  `descRest` varchar(100) NOT NULL,
  `idEmployeur` int(40) NOT NULL,
  `provinceRest` varchar(10) NOT NULL,
  `villeRest` varchar(10) NOT NULL,
  `codePostalRest` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(40) NOT NULL,
  `typeService` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `heureDebut` int(2) NOT NULL,
  `heureFin` int(2) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `remuneration` double NOT NULL,
  `description` varchar(100) NOT NULL,
  `experience` int(2) NOT NULL,
  `active` int(1) NOT NULL,
  `idEmployeur` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accepte`
--
ALTER TABLE `accepte`
  ADD PRIMARY KEY (`idEmploye`,`idService`),
  ADD KEY `fk_accepte_idService` (`idService`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`idDispo`),
  ADD KEY `fk_employe_dispo` (`idEmploye`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `fk_compte_Emp` (`idCompte`);

--
-- Index pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`idEmployeur`),
  ADD KEY `fk_employeur_compte` (`idCompte`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`idRest`),
  ADD KEY `fk_rest_Emp` (`idEmployeur`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `fk_service_idEmp` (`idEmployeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
