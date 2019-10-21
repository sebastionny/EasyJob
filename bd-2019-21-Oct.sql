-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 06:39 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `easyjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepte`
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
-- Table structure for table `compte`
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
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`idCompte`, `nom`, `prenom`, `motDePasse`, `courriel`, `active`, `estEmploye`) VALUES
(3021, 'Romero', 'Katherine', '123', 're@taller.com', 1, 0),
(81568, 'Don', 'Chin', '123', 'me@mail.com', 1, 0),
(40738, 'em3', 'em3', '123', 'tallernait@gmail.com', 1, 1),
(66682, 'resto', 'resto', '123', 're@mail.com', 1, 0),
(23136, 'Picasso 22', 'Pablo', '123', 'em2@mail.com', 1, 1),
(59110, 'em1', 'em1', '123', 'em1@mail.com', 1, 1),
(36560, 'Mendez', 'Sebastian', '123', 'q@mail.com', 1, 1),
(4356, 'res', 'res', '123', 'res@mail.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `jour` varchar(10) NOT NULL,
  `heureDebut` int(2) NOT NULL,
  `heureFin` int(2) NOT NULL,
  `idEmploye` int(40) NOT NULL,
  `idDispo` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disponibilite`
--

INSERT INTO `disponibilite` (`jour`, `heureDebut`, `heureFin`, `idEmploye`, `idDispo`) VALUES
('jeudi', 2, 24, 14360, 1159),
('mardi', 0, 24, 10239, 48294),
('lundi', 0, 24, 10239, 91952),
('mardi', 0, 24, 14360, 77845),
('lundi', 4, 24, 14360, 68368),
('mercredi', 0, 24, 50154, 98004),
('mardi', 0, 24, 50154, 44067),
('lundi', 0, 24, 50154, 63839),
('lundi', 0, 24, 75349, 56794),
('vendredi', 6, 24, 14360, 27250),
('mercredi', 3, 24, 14360, 81838),
('dimanche', 0, 24, 50154, 98780),
('mercredi', 2, 24, 75349, 28096),
('dimanche', 0, 24, 75349, 69514),
('samedi', 4, 20, 14360, 97022),
('dimanche', 0, 24, 14360, 517),
('dimanche', 0, 24, 10239, 31605);

-- --------------------------------------------------------

--
-- Stand-in structure for view `empdispo`
-- (See below for the actual view)
--
CREATE TABLE `empdispo` (
`idEmploye` int(40)
,`sexe` varchar(1)
,`fonction` varchar(50)
,`experience` int(2)
,`ville` varchar(10)
,`jour` varchar(10)
,`heureDebut` int(2)
,`heureFin` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(40) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `experience` int(2) NOT NULL,
  `qualite` varchar(600) NOT NULL,
  `nomRef` varchar(50) NOT NULL,
  `telRef` varchar(15) NOT NULL,
  `idCompte` int(40) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `province` varchar(10) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `codePostal` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`idEmploye`, `sexe`, `dateNaissance`, `photo`, `tel`, `fonction`, `experience`, `qualite`, `nomRef`, `telRef`, `idCompte`, `adresse`, `province`, `ville`, `codePostal`) VALUES
(10239, 'h', '2019-10-01', 'img/profil/10239.png', '536 0200', 'Serveur(se)', 2, 'Sebasitna TIene Hambre  Experience mois Experience  Information de Mois : ', 'ffff', '456456', 36560, '8810 8e av', 'quebec', 'montreal', 'h1q-2y1'),
(14360, 'h', '1987-03-02', 'img/profil/14360.jpg', '438 828 4554', 'Serveur(se)', 2, 'Cuisinier Experience  Information de Mois : mois em1 Experience  Information de Mois : ', 'Amparo Garzon', '234 567 8909', 59110, '8810 8av', 'quebec', 'montreal', 'hhhgf'),
(75349, 'h', '1979-02-07', 'img/profil/75349.png', '2222333444', 'Cuisinier', 2, 'ee Experience  Information de Mois : anne Experience  Information de Mois : mois Experience  Information de Mois : ', 'Mon Reference1111', '1234354', 23136, 'ddfg dfgdf ', 'quebec', 'montreal', 'werwer'),
(50154, 'f', '2019-10-05', './img/profil/50154.jpg', '88098', 'Cuisinier', 3, 'Inform Experience  Information de Mois : ', '999999', 'qqqqqq', 40738, 'erere', 'ontario', 'longueil', 'uiyuty');

-- --------------------------------------------------------

--
-- Table structure for table `employeur`
--

CREATE TABLE `employeur` (
  `idEmployeur` int(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `idCompte` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeur`
--

INSERT INTO `employeur` (`idEmployeur`, `photo`, `tel`, `idCompte`) VALUES
(49379, 'img/profilResto/49379.png', '4444', 66682),
(97802, '', '', 4356),
(77116, 'img/profilResto/77116.png', '2222222', 81568),
(62399, '', '', 3021);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
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
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`idRest`, `nomRest`, `adresseRest`, `telRest`, `descRest`, `idEmployeur`, `provinceRest`, `villeRest`, `codePostalRest`) VALUES
(1, 'tacos', '34', '45465457', 'bon', 1, 'quebec', 'montreal', 'h4t6t6'),
(71940, 'Sushi', '', '', '', 51404, '', '', ''),
(94523, 'res Restau', '', '', '', 97802, 'quebec', 'laval', ''),
(30444, 'Fruits de mer', '8890 10e av.', '22', 'Description du restaurant Fruits de mer', 49379, 'quebec', 'longueil', '123 546'),
(37322, 'Riz Cantonesse', '3300 Rue vide', '444444545', 'sdfgsdfgsdfg\r\nsdfg\r\nsdfg\r\nsd\r\nfgsdfg', 77116, 'quebec', 'laval', '6666'),
(54003, 'Resto Arroz Frito', '8880', '123456', 'dsfgsdfg\r\nsd\r\nfg\r\nsdfg', 62399, 'quebec', 'longueil', 'h1h1h1h');

-- --------------------------------------------------------

--
-- Table structure for table `service`
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
  `idEmployeur` int(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`idService`, `typeService`, `date`, `heureDebut`, `heureFin`, `sexe`, `remuneration`, `description`, `experience`, `active`, `idEmployeur`) VALUES
(456, 'Cuisinier', '2019-10-14', 22, 23, 'h', 15, 'sdfsdf', 5, 1, 49379),
(66997, 'Cuisinier', '2019-10-14', 22, 23, 'h', 15, 'Cest la description du service', 3, 1, 77116),
(47895, 'Serveur(se)', '2019-09-20', 18, 24, 'h', 12, '', 1, 1, 49379),
(95683, 'Serveur(se)', '2019-09-20', 15, 16, 'h', 19, '', 2, 1, 49379),
(34968, 'Serveur(se)', '2019-09-20', 9, 24, 'h', 18, '', 1, 1, 49379),
(44871, 'Serveur(se)', '2019-09-20', 18, 24, 'h', 12, '', 1, 1, 49379),
(5963, 'Serveur(se)', '2019-09-20', 18, 24, 'h', 12, '', 1, 1, 49379),
(40950, 'Serveur(se)', '2019-09-20', 18, 24, 'h', 12, '', 1, 1, 49379);

-- --------------------------------------------------------

--
-- Structure for view `empdispo`
--
DROP TABLE IF EXISTS `empdispo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empdispo`  AS  select `employe`.`idEmploye` AS `idEmploye`,`employe`.`sexe` AS `sexe`,`employe`.`fonction` AS `fonction`,`employe`.`experience` AS `experience`,`employe`.`ville` AS `ville`,`disponibilite`.`jour` AS `jour`,`disponibilite`.`heureDebut` AS `heureDebut`,`disponibilite`.`heureFin` AS `heureFin` from (`employe` join `disponibilite`) where (`employe`.`idEmploye` = `disponibilite`.`idEmploye`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepte`
--
ALTER TABLE `accepte`
  ADD PRIMARY KEY (`idEmploye`,`idService`),
  ADD KEY `fk_accepte_idService` (`idService`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Indexes for table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`idDispo`),
  ADD KEY `fk_employe_dispo` (`idEmploye`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `fk_compte_Emp` (`idCompte`);

--
-- Indexes for table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`idEmployeur`),
  ADD KEY `fk_employeur_compte` (`idCompte`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`idRest`),
  ADD KEY `fk_rest_Emp` (`idEmployeur`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `fk_service_idEmp` (`idEmployeur`);
