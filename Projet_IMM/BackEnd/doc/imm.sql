-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 avr. 2021 à 20:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `imm`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

DROP TABLE IF EXISTS `aliment`;
CREATE TABLE IF NOT EXISTS `aliment` (
  `id_aliment` int(11) NOT NULL,
  `libelle_aliment` varchar(80) NOT NULL,
  PRIMARY KEY (`id_aliment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`id_aliment`, `libelle_aliment`) VALUES
(1, 'Blé dur précuit cuisiné, en sachet micro-ondable'),
(2, 'Dessert (aliment moyen)'),
(3, 'Pot-au-feu, préemballé'),
(4, 'Gratin ou cassolette de poisson et / ou fruits de mer,  préemballé, cru'),
(5, 'Couscous à la viande ou au poulet, préemballé, allégé'),
(6, 'Riz blanc, avec poulet, préemballé, cuit'),
(7, 'Nuggets de blé (sans soja), préemballé'),
(8, 'Pizza aux fruits de mer, préemballée'),
(9, 'Brochette de poisson'),
(10, 'Salade de thon et légumes, appertisée'),
(11, 'Salade composée avec viande ou poisson, appertisée'),
(12, 'Champignons à la grecque, appertisés'),
(13, 'Taboulé ou Salade de couscous, préemballé'),
(14, 'Crudité, sans assaisonnement (aliment moyen)'),
(15, 'Macédoine de légumes en salade, avec sauce, préemb'),
(16, 'Soupe aux lentilles, préemballée à réchauffer'),
(17, 'Soupe aux légumes variés, préemballée à réchauffer'),
(18, 'Soupe aux légumes variés, déshydratée reconstituée'),
(19, 'Carottes râpées, avec sauce, préemballées'),
(20, 'Taboulé ou Salade de couscous au poulet, préemball');

-- --------------------------------------------------------

--
-- Structure de la table `apport`
--

DROP TABLE IF EXISTS `apport`;
CREATE TABLE IF NOT EXISTS `apport` (
  `id_apport` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_apport` varchar(15) NOT NULL,
  PRIMARY KEY (`id_apport`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `apport`
--

INSERT INTO `apport` (`id_apport`, `libelle_apport`) VALUES
(1, 'Energie'),
(2, 'Protéines'),
(3, 'Glucides'),
(4, 'Lipides'),
(5, 'Sucres'),
(6, 'Alcool'),
(7, 'Sodium'),
(8, 'Eau');

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `login` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auth`
--

INSERT INTO `auth` (`login`, `password`) VALUES
('lucas.faby@etu.imt-lille-douai.fr', 'faby123'),
('salah.nourelayne@etu.imt-lille-douai.fr', 'nourelayne123');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

DROP TABLE IF EXISTS `composer`;
CREATE TABLE IF NOT EXISTS `composer` (
  `id_aliment` int(11) NOT NULL,
  `id_aliment_Composer` int(11) NOT NULL,
  `ratio` float NOT NULL,
  PRIMARY KEY (`id_aliment`,`id_aliment_Composer`),
  KEY `Composer_Aliment0_FK` (`id_aliment_Composer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_aliment` int(11) NOT NULL,
  `id_apport` int(11) NOT NULL,
  `ratio` float NOT NULL,
  PRIMARY KEY (`id_aliment`,`id_apport`),
  KEY `Contenir_Apport0_FK` (`id_apport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_aliment`, `id_apport`, `ratio`) VALUES
(1, 1, 791),
(1, 2, 5.29),
(1, 3, 29.5),
(1, 4, 4.84),
(1, 5, 2.21),
(1, 6, 0),
(1, 7, 463),
(1, 8, 57),
(2, 1, 0),
(2, 2, 4.61),
(2, 3, 36.6),
(2, 4, 12.9),
(2, 5, 23.7),
(2, 6, 0.081),
(2, 7, 153),
(2, 8, 45.4),
(3, 1, 326),
(3, 2, 10.9),
(3, 3, 3.2),
(3, 4, 2.02),
(3, 5, 1.5),
(3, 6, 0),
(3, 7, 70),
(3, 8, 82.9),
(4, 1, 441),
(4, 2, 6.7),
(4, 3, 8.39),
(4, 4, 8.39),
(4, 5, 5.1),
(4, 6, 2.48),
(4, 7, 223),
(4, 8, 78.4),
(5, 1, 382),
(5, 2, 5.9),
(5, 3, 11.5),
(5, 4, 1.9),
(5, 5, 2.1),
(5, 6, 0),
(5, 7, 300),
(5, 8, 72.9),
(6, 1, 737),
(6, 2, 4.44),
(6, 3, 31.5),
(6, 4, 3.19),
(6, 5, 3.48),
(6, 6, 0),
(6, 7, 312),
(6, 8, 0),
(7, 1, 1190),
(7, 2, 7.5),
(7, 3, 22.4),
(7, 4, 14.9),
(7, 5, 1.33),
(7, 6, 0),
(7, 7, 269),
(7, 8, 45.7),
(8, 1, 843),
(8, 2, 10.3),
(8, 3, 24.6),
(8, 4, 6.65),
(8, 5, 1.5),
(8, 6, 0),
(8, 7, 500),
(8, 8, 0),
(9, 1, 535),
(9, 2, 18),
(9, 3, 0.86),
(9, 4, 5.71),
(9, 5, 0.85),
(9, 6, 0),
(9, 7, 223),
(9, 8, 73.8),
(10, 1, 0),
(10, 2, 9.15),
(10, 3, 7.74),
(10, 4, 4.7),
(10, 5, 3.08),
(10, 6, 0),
(10, 7, 445),
(10, 8, 76.5),
(11, 1, 0),
(11, 2, 8.06),
(11, 3, 6.4),
(11, 4, 5.3),
(11, 5, 1.9),
(11, 6, 0),
(11, 7, 381),
(11, 8, 76.7),
(12, 1, 0),
(12, 2, 2.08),
(12, 3, 3.95),
(12, 4, 3.55),
(12, 5, 2.38),
(12, 6, 0),
(12, 7, 500),
(12, 8, 85.2),
(13, 1, 753),
(13, 2, 4.88),
(13, 3, 23.7),
(13, 4, 6.7),
(13, 5, 4.9),
(13, 6, 0),
(13, 7, 399),
(13, 8, 60.3),
(14, 1, 125),
(14, 2, 0.94),
(14, 3, 3.07),
(14, 4, 0.7),
(14, 5, 2.27),
(14, 6, 0),
(14, 7, 12.5),
(14, 8, 93.2),
(15, 1, 0),
(15, 2, 2.81),
(15, 3, 7),
(15, 4, 9.3),
(15, 5, 2.3),
(15, 6, 0),
(15, 7, 426),
(15, 8, 78.3),
(16, 1, 232),
(16, 2, 3.74),
(16, 3, 6.6),
(16, 4, 1.12),
(16, 5, 0.7),
(16, 6, 0),
(16, 7, 143),
(16, 8, 85.8),
(17, 1, 165),
(17, 2, 0.76),
(17, 3, 5.05),
(17, 4, 1.56),
(17, 5, 1.72),
(17, 6, 0),
(17, 7, 275),
(17, 8, 90.2),
(18, 1, 144),
(18, 2, 0.86),
(18, 3, 4.43),
(18, 4, 1.22),
(18, 5, 1.07),
(18, 6, 0),
(18, 7, 276),
(18, 8, 90.9),
(19, 1, 0),
(19, 2, 0.98),
(19, 3, 6.01),
(19, 4, 5),
(19, 5, 5.2),
(19, 6, 0),
(19, 7, 264),
(19, 8, 84.7),
(20, 1, 0),
(20, 2, 6.4),
(20, 3, 20.6),
(20, 4, 7.45),
(20, 5, 2.48),
(20, 6, 0),
(20, 7, 424),
(20, 8, 62.6);

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

DROP TABLE IF EXISTS `noter`;
CREATE TABLE IF NOT EXISTS `noter` (
  `login` varchar(40) CHARACTER SET latin1 NOT NULL,
  `id_aliment` int(11) NOT NULL,
  `quantite` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_aliment`,`login`),
  KEY `Noter_Utilisateur0_FK` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `noter`
--

INSERT INTO `noter` (`login`, `id_aliment`, `quantite`, `date`) VALUES
('lucas.faby@etu.imt-lille-douai.fr', 1, 0.5, '2021-03-10'),
('salah.nourelayne@etu.imt-lille-douai.fr', 2, 0.2, '2021-03-10'),
('lucas.faby@etu.imt-lille-douai.fr', 3, 0.4, '2021-03-11'),
('salah.nourelayne@etu.imt-lille-douai.fr', 4, 0.7, '2021-03-11'),
('lucas.faby@etu.imt-lille-douai.fr', 5, 0.8, '2021-03-12'),
('salah.nourelayne@etu.imt-lille-douai.fr', 6, 0.6, '2021-03-12'),
('lucas.faby@etu.imt-lille-douai.fr', 7, 0.5, '2021-03-13'),
('salah.nourelayne@etu.imt-lille-douai.fr', 8, 0.3, '2021-03-13'),
('lucas.faby@etu.imt-lille-douai.fr', 9, 0.2, '2021-03-14'),
('salah.nourelayne@etu.imt-lille-douai.fr', 10, 0.1, '2021-03-14'),
('lucas.faby@etu.imt-lille-douai.fr', 11, 0.1, '2021-03-15'),
('salah.nourelayne@etu.imt-lille-douai.fr', 12, 0.2, '2021-03-15'),
('lucas.faby@etu.imt-lille-douai.fr', 13, 0.4, '2021-03-16'),
('salah.nourelayne@etu.imt-lille-douai.fr', 14, 0.3, '2021-03-16'),
('lucas.faby@etu.imt-lille-douai.fr', 15, 0.1, '2021-03-17'),
('salah.nourelayne@etu.imt-lille-douai.fr', 16, 0.4, '2021-03-17'),
('lucas.faby@etu.imt-lille-douai.fr', 17, 0.4, '2021-03-18'),
('salah.nourelayne@etu.imt-lille-douai.fr', 18, 0.4, '2021-03-18'),
('lucas.faby@etu.imt-lille-douai.fr', 19, 0.3, '2021-03-19'),
('salah.nourelayne@etu.imt-lille-douai.fr', 20, 0.4, '2021-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(15) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(15) CHARACTER SET latin1 NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` char(1) CHARACTER SET latin1 NOT NULL,
  `niveau_pratique_sportive` varchar(10) CHARACTER SET latin1 NOT NULL,
  `besoin_energetique` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`, `age`, `sexe`, `niveau_pratique_sportive`, `besoin_energetique`) VALUES
('lucas.faby@etu.imt-lille-douai.fr', 'FABY', 'Lucas', 34, 'm', 'moyen', 1750),
('salah.nourelayne@etu.imt-lille-douai.fr', 'NOURELAYNE', 'Salah ', 21, 'm', 'haut', 2350);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `Composer_Aliment0_FK` FOREIGN KEY (`id_aliment`) REFERENCES `aliment` (`id_aliment`),
  ADD CONSTRAINT `Composer_Aliment_FK` FOREIGN KEY (`id_aliment`) REFERENCES `aliment` (`id_aliment`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `Contenir_Aliment_FK` FOREIGN KEY (`id_aliment`) REFERENCES `aliment` (`id_aliment`),
  ADD CONSTRAINT `Contenir_Apport0_FK` FOREIGN KEY (`id_apport`) REFERENCES `apport` (`id_apport`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
