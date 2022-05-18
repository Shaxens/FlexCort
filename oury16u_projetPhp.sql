-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  devbdd.iutmetz.univ-lorraine.fr
-- Généré le :  Jeu 19 Mai 2022 à 00:00
-- Version du serveur :  10.3.34-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oury16u_projetPhp`
--

-- --------------------------------------------------------

--
-- Structure de la table `FORFAIT`
--

CREATE TABLE IF NOT EXISTS `FORFAIT` (
  `IdForfait` int(11) NOT NULL,
  `NomForfait` varchar(50) NOT NULL,
  `DescriptionForfait` varchar(250) NOT NULL,
  `DureeForfait` int(11) NOT NULL,
  `Prix` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `FORFAIT`
--

INSERT INTO `FORFAIT` (`IdForfait`, `NomForfait`, `DescriptionForfait`, `DureeForfait`, `Prix`) VALUES
(1, 'Decouverte', 'Venez decouvrir les sensations que nous pouvons vous offrir (Disponible une seule fois)', 1, 200),
(2, 'Ouverture d''esprit', 'Venez vous ouvrir Ã  l''autre grace a ce forfait fait sur mesure pour les plus ouvert d''entre vous', 2, 650),
(3, 'Tunning Party', 'Profitez d''un instant particulier avec un/e de nos Escorte lors d''un rassemblement de Tunning Ã  Tourcoing', 3, 1200);

-- --------------------------------------------------------

--
-- Structure de la table `MODELE`
--

CREATE TABLE IF NOT EXISTS `MODELE` (
  `IdModele` int(11) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `DateNaissance` date NOT NULL,
  `DescriptionModele` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `MODELE`
--

INSERT INTO `MODELE` (`IdModele`, `Pseudo`, `DateNaissance`, `DescriptionModele`) VALUES
(1, 'Black Window', '1992-03-03', 'Elle est la soeur cachÃ©e (et mÃªme trÃ¨s bien cachÃ©e) de Scarlette Johanson.'),
(2, 'Princesse Peach', '1999-05-09', 'AprÃ¨s avoir Ã©tÃ© capturÃ©e par Bowser elle a Ã©tÃ© rÃ©duite Ã  l''esclavage, libÃ©rez-la !'),
(3, 'Microman', '1998-09-30', 'Si vous aimez les prises de soumission et les voltiges, choisissez Microman !'),
(4, 'Random GoodGuy', '2000-08-10', 'Pas sÃ»r(e?) de son orientation sexuelle, iel est comparable Ã  un camÃ©lÃ©on qui change de peau.'),
(5, 'Spartatouze', '1990-10-13', 'AprÃ¨s avoir survÃ©cu Ã  la bataille des Thermopyles il a dÃ©cidÃ© de se reconvertir, et pas en boulanger.'),
(6, 'Robin Daiboite', '1998-09-11', 'Amoureux en secret de Batman, il vous donnera tout l''amour qui lui Ã©tait destinÃ©.'),
(7, 'Rocco & Siffredi', '1992-03-07', 'Si vous aimez les licornes, vous pouvez en avoir deux pour le prix d''une.');

-- --------------------------------------------------------

--
-- Structure de la table `RESERVATION`
--

CREATE TABLE IF NOT EXISTS `RESERVATION` (
  `IdReservation` int(11) NOT NULL,
  `MailUtilisateur` varchar(200) NOT NULL,
  `IdModele` int(11) NOT NULL,
  `IdForfait` int(11) NOT NULL,
  `PrixReservation` int(11) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE IF NOT EXISTS `UTILISATEUR` (
  `Mail` varchar(90) NOT NULL,
  `Mdp` varchar(20) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `EstAdmin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`Mail`, `Mdp`, `Nom`, `Prenom`, `EstAdmin`) VALUES
('admin@gmail.com', 'admin', 'Admin', 'Istrateur', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `FORFAIT`
--
ALTER TABLE `FORFAIT`
  ADD PRIMARY KEY (`IdForfait`);

--
-- Index pour la table `MODELE`
--
ALTER TABLE `MODELE`
  ADD PRIMARY KEY (`IdModele`);

--
-- Index pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`IdReservation`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`Mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `FORFAIT`
--
ALTER TABLE `FORFAIT`
  MODIFY `IdForfait` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `MODELE`
--
ALTER TABLE `MODELE`
  MODIFY `IdModele` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
