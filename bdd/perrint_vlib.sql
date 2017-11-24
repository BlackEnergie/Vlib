-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Novembre 2017 à 15:38
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `perrint_vlib`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `CODEACCES` varchar(8) NOT NULL,
  `CODESECRET` int(4) NOT NULL,
  `CODEA` varchar(10) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `DATEDEB_ABON` date DEFAULT NULL,
  `DATEFINABON` date DEFAULT NULL,
  `CREDITTEMPS` decimal(10,2) DEFAULT NULL,
  `MONTANTADEBITER` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`CODEACCES`, `CODESECRET`, `CODEA`, `NOM`, `PRENOM`, `DATEDEB_ABON`, `DATEFINABON`, `CREDITTEMPS`, `MONTANTADEBITER`) VALUES
('root', 1234, 'AAA', 'root', 'root', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `CODEA` varchar(10) NOT NULL,
  `LIBELLEA` varchar(10) DEFAULT NULL,
  `DUREEA` int(3) DEFAULT NULL,
  `MONTANTA` decimal(10,2) DEFAULT NULL,
  `CREDITTEMPSBASE` decimal(10,2) DEFAULT NULL,
  `TARIFHORAIRE` decimal(3,2) DEFAULT NULL,
  `CAUTION` decimal(3,2) DEFAULT NULL,
  `TYPEA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `abonnement`
--

INSERT INTO `abonnement` (`CODEA`, `LIBELLEA`, `DUREEA`, `MONTANTA`, `CREDITTEMPSBASE`, `TARIFHORAIRE`, `CAUTION`, `TYPEA`) VALUES
('AAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etat_plot`
--

CREATE TABLE `etat_plot` (
  `HEURE` time NOT NULL,
  `DATEM` date NOT NULL,
  `NUMS` varchar(5) NOT NULL,
  `NUM` varchar(10) NOT NULL,
  `ETATP` varchar(15) DEFAULT NULL,
  `DUREEINTERV` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etat_station`
--

CREATE TABLE `etat_station` (
  `HEURE` time NOT NULL,
  `DATEM` date NOT NULL,
  `NUMS` varchar(5) NOT NULL,
  `ETATS` varchar(15) DEFAULT NULL,
  `DUREEINTERV` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etat_velo`
--

CREATE TABLE `etat_velo` (
  `HEURE` time NOT NULL,
  `DATEM` date NOT NULL,
  `NUMV` varchar(10) NOT NULL,
  `ETATV` varchar(15) DEFAULT NULL,
  `DUREEINTERV` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `CODEACCES` varchar(8) NOT NULL,
  `CODESECRET` int(4) NOT NULL,
  `NUMV` varchar(10) NOT NULL,
  `HEURE` time NOT NULL,
  `DATEM` date NOT NULL,
  `TEMPSLOC` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `plot`
--

CREATE TABLE `plot` (
  `NUMS` varchar(5) NOT NULL,
  `NUM` varchar(10) NOT NULL,
  `NUMV` varchar(10) DEFAULT NULL,
  `ETAT` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `plot`
--

INSERT INTO `plot` (`NUMS`, `NUM`, `NUMV`, `ETAT`) VALUES
('12', '12A', '10', 'ES');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `CODEACCES` varchar(8) NOT NULL,
  `CODESECRET` int(4) NOT NULL,
  `CODEA` varchar(10) NOT NULL,
  `NOM` char(32) NOT NULL,
  `PRENOM` char(32) NOT NULL,
  `DATEEMBAUCHE` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`CODEACCES`, `CODESECRET`, `CODEA`, `NOM`, `PRENOM`, `DATEEMBAUCHE`) VALUES
('resp', 1234, 'AAA', 'responsable', 'responsable', '2017-11-01');

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

CREATE TABLE `station` (
  `NUMS` varchar(5) NOT NULL,
  `ETATS` varchar(15) DEFAULT NULL,
  `NOMS` varchar(50) DEFAULT NULL,
  `SITUATIONS` varchar(15) DEFAULT NULL,
  `CAPACITES` int(2) DEFAULT NULL,
  `NUMBORNE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`NUMS`, `ETATS`, `NOMS`, `SITUATIONS`, `CAPACITES`, `NUMBORNE`) VALUES
('1', 'ES', 'Meriadeck', NULL, 33, NULL),
('104', 'ES', 'Grosse Cloche', NULL, 17, NULL),
('107', 'EM', 'St Nicolas', NULL, 17, NULL),
('108', NULL, 'Bergonie', NULL, 15, NULL),
('110', NULL, 'Forum', NULL, 41, NULL),
('112', NULL, 'Arts et Metiers', NULL, 39, NULL),
('114', NULL, 'Compostelle', NULL, 27, NULL),
('117', NULL, 'Doyen Brus', NULL, 19, NULL),
('12', NULL, 'Grand Lebrun', NULL, 15, NULL),
('125', NULL, 'Conservatoire', NULL, 18, NULL),
('131', NULL, 'Nansouty', NULL, 16, NULL),
('138', NULL, 'Barbey', NULL, 18, NULL),
('14', NULL, 'Dubreil/Turenne', NULL, 14, NULL),
('142', NULL, 'Bourranville', NULL, 19, NULL),
('145', NULL, 'Berges du Lac', NULL, 17, NULL),
('150', NULL, 'Feydeau', NULL, 19, NULL),
('151', NULL, 'Dravemont', NULL, 20, NULL),
('155', NULL, 'Village 6 IUT', NULL, 24, NULL),
('159', NULL, 'Camping international', NULL, 24, NULL),
('16', NULL, 'Galin', NULL, 18, NULL),
('160', NULL, 'Eglise St Aubin', NULL, 10, NULL),
('168', NULL, 'Mairie de Blanquefort', NULL, 20, NULL),
('172', NULL, 'La Cité du Vin', NULL, 20, NULL),
('173', NULL, 'Rue Achard', NULL, 19, NULL),
('2', NULL, 'St Bruno', NULL, 20, NULL),
('20', NULL, 'Grands Hommes', NULL, 31, NULL),
('21', NULL, 'Puy Paulin', NULL, 15, NULL),
('23', NULL, 'Republique', NULL, 20, NULL),
('32', NULL, 'Parc Bordelais', NULL, 16, NULL),
('37', NULL, 'Jardin Public', NULL, 29, NULL),
('39', NULL, 'Quinconces', NULL, 39, NULL),
('40', NULL, 'Grand Theatre', NULL, 19, NULL),
('42', NULL, 'Camille Julian', NULL, 18, NULL),
('55', NULL, 'Camille Godard', NULL, 16, NULL),
('57', NULL, 'Eglise St Louis', NULL, 16, NULL),
('60', NULL, 'Allees de Chartres', NULL, 20, NULL),
('63', NULL, 'François Mitterand', NULL, 17, NULL),
('64', NULL, 'La Benauge', NULL, 18, NULL),
('66', NULL, 'Gare d\'Orleans', NULL, 20, NULL),
('67', NULL, 'Allee de Serr - Abadie', NULL, 16, NULL),
('69', NULL, 'Cours Le Rouzic', NULL, 12, NULL),
('7', NULL, 'Palais de Justice', NULL, 16, NULL),
('78', NULL, 'Bougnard', NULL, 16, NULL),
('80', NULL, 'Gare Alouette', NULL, 17, NULL),
('90', NULL, 'Fontaine D\'Arlac', NULL, 18, NULL),
('97', NULL, 'Claveau', NULL, 20, NULL),
('98', NULL, 'Bassin a flot', NULL, 16, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

CREATE TABLE `velo` (
  `NUMV` varchar(10) NOT NULL,
  `NUMS` varchar(5) DEFAULT NULL,
  `NUM` varchar(10) DEFAULT NULL,
  `ETATV` varchar(15) DEFAULT NULL,
  `DMEC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `velo`
--

INSERT INTO `velo` (`NUMV`, `NUMS`, `NUM`, `ETATV`, `DMEC`) VALUES
('10', '12', '12A', 'ES', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`CODEACCES`,`CODESECRET`),
  ADD KEY `I_FK_ABONNE_ABONNEMENT` (`CODEA`);

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`CODEA`);

--
-- Index pour la table `etat_plot`
--
ALTER TABLE `etat_plot`
  ADD PRIMARY KEY (`HEURE`,`DATEM`,`NUMS`,`NUM`),
  ADD KEY `I_FK_ETAT_PLOT_PLOT` (`NUMS`,`NUM`);

--
-- Index pour la table `etat_station`
--
ALTER TABLE `etat_station`
  ADD PRIMARY KEY (`HEURE`,`DATEM`,`NUMS`),
  ADD KEY `I_FK_ETAT_STATION_STATION` (`NUMS`);

--
-- Index pour la table `etat_velo`
--
ALTER TABLE `etat_velo`
  ADD PRIMARY KEY (`HEURE`,`DATEM`,`NUMV`),
  ADD KEY `I_FK_ETAT_VELO_VELO` (`NUMV`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`CODEACCES`,`CODESECRET`,`NUMV`,`HEURE`,`DATEM`),
  ADD KEY `I_FK_LOUER_ABONNE` (`CODEACCES`,`CODESECRET`),
  ADD KEY `I_FK_LOUER_VELO` (`NUMV`);

--
-- Index pour la table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`NUMS`,`NUM`),
  ADD UNIQUE KEY `I_FK_PLOT_VELO` (`NUMV`),
  ADD KEY `I_FK_PLOT_STATION` (`NUMS`);

--
-- Index pour la table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`NUMS`);

--
-- Index pour la table `velo`
--
ALTER TABLE `velo`
  ADD PRIMARY KEY (`NUMV`),
  ADD UNIQUE KEY `I_FK_VELO_PLOT` (`NUMS`,`NUM`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD CONSTRAINT `FK_ABONNE_ABONNEMENT` FOREIGN KEY (`CODEA`) REFERENCES `abonnement` (`CODEA`);

--
-- Contraintes pour la table `etat_plot`
--
ALTER TABLE `etat_plot`
  ADD CONSTRAINT `FK_ETAT_PLOT_PLOT` FOREIGN KEY (`NUMS`,`NUM`) REFERENCES `plot` (`NUMS`, `NUM`);

--
-- Contraintes pour la table `etat_station`
--
ALTER TABLE `etat_station`
  ADD CONSTRAINT `FK_ETAT_STATION_STATION` FOREIGN KEY (`NUMS`) REFERENCES `station` (`NUMS`);

--
-- Contraintes pour la table `etat_velo`
--
ALTER TABLE `etat_velo`
  ADD CONSTRAINT `FK_ETAT_VELO_VELO` FOREIGN KEY (`NUMV`) REFERENCES `velo` (`NUMV`);

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `FK_LOUER_ABONNE` FOREIGN KEY (`CODEACCES`,`CODESECRET`) REFERENCES `abonne` (`CODEACCES`, `CODESECRET`),
  ADD CONSTRAINT `FK_LOUER_VELO` FOREIGN KEY (`NUMV`) REFERENCES `velo` (`NUMV`);

--
-- Contraintes pour la table `plot`
--
ALTER TABLE `plot`
  ADD CONSTRAINT `FK_PLOT_STATION` FOREIGN KEY (`NUMS`) REFERENCES `station` (`NUMS`),
  ADD CONSTRAINT `FK_PLOT_VELO` FOREIGN KEY (`NUMV`) REFERENCES `velo` (`NUMV`);

--
-- Contraintes pour la table `velo`
--
ALTER TABLE `velo`
  ADD CONSTRAINT `FK_VELO_PLOT` FOREIGN KEY (`NUMS`,`NUM`) REFERENCES `plot` (`NUMS`, `NUM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
