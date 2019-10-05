-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 05 oct. 2019 à 01:25
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `nom`, `prenom`, `motDePasse`, `courriel`, `active`, `estEmploye`) VALUES
(40738, 'em3', 'em3', '123', 'em3@mail.com', 1, 1),
(66682, 'resto', 'resto', '123', 're@mail.com', 1, 0),
(23136, 'em2', 'em2', '123', 'em2@mail.com', 1, 1),
(59110, 'em1', 'em1', '123', 'em1@mail.com', 1, 1),
(36560, 'Mendez', 'Sebastian', '123', 'q@mail.com', 1, 1),
(3430, 'qq', 'qq', '123', 'qq@taller.com', 1, 1),
(80647, 'em', 'em', '123', 'em@mail.com', 1, 1),
(4356, 'res', 'res', '123', 'res@mail.com', 1, 0);

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

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`jour`, `heureDebut`, `heureFin`, `idEmploye`, `idDispo`) VALUES
('mardi', 0, 24, 14360, 69539),
('lundi', 0, 24, 14360, 81802),
('mardi', 0, 24, 10239, 9377),
('lundi', 0, 24, 10239, 45233),
('mercredi', 6, 18, 14360, 21464),
('jeudi', 22, 24, 14360, 80727),
('vendredi', 22, 24, 14360, 13421),
('dimache', 0, 24, 14360, 86092);

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

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `sexe`, `dateNaissance`, `photo`, `tel`, `fonction`, `experience`, `qualite`, `nomRef`, `telRef`, `idCompte`, `adresse`, `province`, `ville`, `codePostal`) VALUES
(222, '', '2019-10-01', '', '', '', 0, '', '', '', 4356, '', '', 'laval', ''),
(10239, 'h', '2019-10-01', 'img/profil/10239.png', '536 0200', 'Plongeur', 0, 'Sebasitna TIene Hambre  Experience mois', 'ffff', '456456', 36560, '8810 8e av', 'quebec', 'montreal', 'h1q-2y1'),
(14360, 'h', '1987-03-02', 'img/profil/14360.jpg', '438 828 4554', 'Cuisinier', 5, 'Cuisinier Experience  Information de Mois : mois', 'Amparo Garzon', '234 567 8909', 59110, '8810 8av', 'ontario', 'laval', 'hhhgf'),
(75349, '', '2019-10-05', '', '', '', 0, '', '', '', 23136, '', '', '', ''),
(50154, '', '2019-10-05', '', '', '', 0, '', '', '', 40738, '', '', '', '');

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

--
-- Déchargement des données de la table `employeur`
--

INSERT INTO `employeur` (`idEmployeur`, `photo`, `tel`, `idCompte`) VALUES
(49379, '', '', 66682),
(97802, '', '', 4356);

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

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`idRest`, `nomRest`, `adresseRest`, `telRest`, `descRest`, `idEmployeur`, `provinceRest`, `villeRest`, `codePostalRest`) VALUES
(1, 'tacos', '34', '45465457', 'bon', 1, 'quebec', 'montreal', 'h4t6t6'),
(71940, 'Sushi', '', '', '', 51404, '', '', ''),
(94523, 'res Restau', '', '', '', 97802, 'quebec', 'laval', ''),
(30444, 'Resto', '', '', '', 49379, '', '', '');

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
-- Index pour les tables déchargées
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
