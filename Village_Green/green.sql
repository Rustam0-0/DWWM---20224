-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 mai 2021 à 14:57
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
-- Base de données : `green`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `client_nom` varchar(50) NOT NULL,
  `client_prenom` varchar(50) NOT NULL,
  `client_adress` varchar(200) NOT NULL,
  `client_ad_comp` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `client_ad_livraison` varchar(200) NOT NULL,
  `client_ad_factur` varchar(200) NOT NULL,
  `client_code_postal` varchar(5) NOT NULL,
  `client_ville` varchar(50) NOT NULL,
  `client_pays` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_mot_de pas` varchar(50) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `com_client_id` int NOT NULL,
  `com_prod_id` int NOT NULL,
  `com_date` date NOT NULL,
  `com_date_pay` date NOT NULL,
  `com_date_env` date NOT NULL,
  `com_date_recu` date NOT NULL,
  `com_status` varchar(20) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `com_client_id` (`com_client_id`),
  KEY `com_prod_id` (`com_prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_com`
--

DROP TABLE IF EXISTS `ligne_com`;
CREATE TABLE IF NOT EXISTS `ligne_com` (
  `lin_id` int NOT NULL AUTO_INCREMENT,
  `lin_com_id` int NOT NULL,
  `lin_prod_id` int NOT NULL,
  `lin_quantite` int NOT NULL,
  PRIMARY KEY (`lin_id`),
  KEY `lin_com_id` (`lin_com_id`),
  KEY `lin_prod_id` (`lin_prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_ref` varchar(7) NOT NULL,
  `prod_designation` varchar(50) NOT NULL,
  `prod_prix` decimal(7,2) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`com_client_id`) REFERENCES `clients` (`client_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`com_prod_id`) REFERENCES `produits` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `ligne_com`
--
ALTER TABLE `ligne_com`
  ADD CONSTRAINT `ligne_com_ibfk_1` FOREIGN KEY (`lin_com_id`) REFERENCES `commandes` (`com_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ligne_com_ibfk_2` FOREIGN KEY (`lin_prod_id`) REFERENCES `produits` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
