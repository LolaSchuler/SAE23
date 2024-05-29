-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 29 Mai 2024 à 15:42
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sae23`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administration`
--

CREATE TABLE IF NOT EXISTS `Administration` (
  `login_admin` varchar(20) NOT NULL,
  `MotPasse_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Administration`
--

INSERT INTO `Administration` (`login_admin`, `MotPasse_admin`) VALUES
('admin_CTL', 'systemctl');

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE IF NOT EXISTS `Batiment` (
  `ID_bat` varchar(1) NOT NULL,
  `nom` varchar(14) NOT NULL,
  `login_gest` varchar(20) NOT NULL,
  `MotPasse_gest` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Batiment`
--

INSERT INTO `Batiment` (`ID_bat`, `nom`, `login_gest`, `MotPasse_gest`) VALUES
('B', 'info/gim', 'daran', 'passdaran'),
('E', 'R&T', 'brulin', 'passbrulin');

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE IF NOT EXISTS `Capteur` (
  `Nom_capt` varchar(10) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Unite` varchar(3) NOT NULL,
  `Nom_salle` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Mesure`
--

CREATE TABLE IF NOT EXISTS `Mesure` (
`ID_mes` int(10) NOT NULL,
  `date` date NOT NULL,
  `horaire` time NOT NULL,
  `valeur` int(5) NOT NULL,
  `Nom_capt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE IF NOT EXISTS `Salle` (
  `Nom_salle` varchar(4) NOT NULL,
  `Type` varchar(5) NOT NULL,
  `CapaciteAccueil` int(2) NOT NULL,
  `ID_bat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Administration`
--
ALTER TABLE `Administration`
 ADD PRIMARY KEY (`login_admin`);

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
 ADD PRIMARY KEY (`ID_bat`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
 ADD PRIMARY KEY (`Nom_capt`), ADD KEY `Nom_salle` (`Nom_salle`);

--
-- Index pour la table `Mesure`
--
ALTER TABLE `Mesure`
 ADD PRIMARY KEY (`ID_mes`), ADD KEY `Nom_capt` (`Nom_capt`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
 ADD PRIMARY KEY (`Nom_salle`), ADD KEY `ID_bat` (`ID_bat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Mesure`
--
ALTER TABLE `Mesure`
MODIFY `ID_mes` int(10) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Capteur`
--
ALTER TABLE `Capteur`
ADD CONSTRAINT `fk_nom_salle` FOREIGN KEY (`Nom_salle`) REFERENCES `Salle` (`Nom_salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Mesure`
--
ALTER TABLE `Mesure`
ADD CONSTRAINT `fk_nom_capt` FOREIGN KEY (`Nom_capt`) REFERENCES `Capteur` (`Nom_capt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Salle`
--
ALTER TABLE `Salle`
ADD CONSTRAINT `fk_ID_bat` FOREIGN KEY (`ID_bat`) REFERENCES `Batiment` (`ID_bat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
