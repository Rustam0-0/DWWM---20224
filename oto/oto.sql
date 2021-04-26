-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 avr. 2021 à 08:22
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oto`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `part_ou_prof` varchar(20) NOT NULL,
  `client_nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `client_prenom` varchar(30) NOT NULL,
  `person_contact` varchar(50) NOT NULL,
  `client_adress` varchar(200) NOT NULL,
  `client_num_tel` varchar(10) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_nom` (`client_nom`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `part_ou_prof`, `client_nom`, `client_prenom`, `person_contact`, `client_adress`, `client_num_tel`, `client_email`) VALUES
(1, 'part', 'John', 'White', '', '145 rue de Paris, Amiens', ' 102030405', 'white@mail.com'),
(24, 'part', 'Carine', 'Brown', '', 'avenue du Lille', '    076963', 'carine@mail.com'),
(27, 'part', 'Lena', 'Black', '', 'Bordeaux', '   0769633', 'lena@mail.fr'),
(28, 'prof', 'AFPA', '', 'Mr Dupont', 'rue Poulanville', ' 030405060', 'afpa@gmail.com'),
(29, 'part', 'Jeremy', 'Green', '', 'London', ' 090007151', 'green@mail.gb'),
(30, 'prof', 'AUCHAN', '', 'Pierre', 'Dury Amiens', '911', 'auchan@mail.fr'),
(31, 'part', 'Marion', 'Cotillard', '', 'Paris', '0707070707', 'marion@mail.fr'),
(33, 'prof', 'LIDL', '', 'Otto-fon-Bismarc', 'Berlin', '0300601127', 'lidl@mail.fr'),
(47, 'part', '', 'Erika', '', '', ' ', 'erika@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `command_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `piece_id` int NOT NULL,
  `service_id` int NOT NULL,
  `date_ajout` date NOT NULL,
  `date_livraison` date NOT NULL,
  `date_paiement_premier` date NOT NULL,
  `date_paiement_final` date NOT NULL,
  PRIMARY KEY (`command_id`),
  KEY `client_id` (`client_id`,`prod_id`,`service_id`,`piece_id`),
  KEY `prod_id` (`prod_id`),
  KEY `piece_id` (`piece_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commerciaux`
--

DROP TABLE IF EXISTS `commerciaux`;
CREATE TABLE IF NOT EXISTS `commerciaux` (
  `commerc_id` int NOT NULL AUTO_INCREMENT,
  `commerc_nom` varchar(50) NOT NULL,
  `client_id` int NOT NULL,
  PRIMARY KEY (`commerc_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commandes`
--

DROP TABLE IF EXISTS `ligne_commandes`;
CREATE TABLE IF NOT EXISTS `ligne_commandes` (
  `linge_command_id` int NOT NULL AUTO_INCREMENT,
  `command_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `piece_id` int NOT NULL,
  `service_id` int NOT NULL,
  `quantite` int NOT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`linge_command_id`),
  KEY `command_id` (`command_id`),
  KEY `prod_id` (`prod_id`),
  KEY `piece_id` (`piece_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nos_services`
--

DROP TABLE IF EXISTS `nos_services`;
CREATE TABLE IF NOT EXISTS `nos_services` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service_nom` varchar(50) NOT NULL,
  `service_prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock_pieces`
--

DROP TABLE IF EXISTS `stock_pieces`;
CREATE TABLE IF NOT EXISTS `stock_pieces` (
  `piece_id` int NOT NULL,
  `piece_nom` varchar(50) NOT NULL,
  `piece_description` varchar(200) NOT NULL,
  `piece_prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`piece_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock_vehicules`
--

DROP TABLE IF EXISTS `stock_vehicules`;
CREATE TABLE IF NOT EXISTS `stock_vehicules` (
  `prod_id` int NOT NULL,
  `prod_nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `part_ou_utilitaire` tinyint(1) NOT NULL,
  `neuf_ou_occasion` tinyint(1) NOT NULL,
  `date_fabrication` date NOT NULL,
  `kilometrage` int NOT NULL,
  `prod_prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `prix` (`prod_prix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `stock_vehicules` (`prod_id`),
  ADD CONSTRAINT `commandes_ibfk_3` FOREIGN KEY (`piece_id`) REFERENCES `stock_pieces` (`piece_id`),
  ADD CONSTRAINT `commandes_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `nos_services` (`service_id`);

--
-- Contraintes pour la table `commerciaux`
--
ALTER TABLE `commerciaux`
  ADD CONSTRAINT `commerciaux_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD CONSTRAINT `ligne_commandes_ibfk_1` FOREIGN KEY (`command_id`) REFERENCES `commandes` (`command_id`),
  ADD CONSTRAINT `ligne_commandes_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `commandes` (`prod_id`),
  ADD CONSTRAINT `ligne_commandes_ibfk_3` FOREIGN KEY (`piece_id`) REFERENCES `commandes` (`piece_id`),
  ADD CONSTRAINT `ligne_commandes_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `commandes` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
