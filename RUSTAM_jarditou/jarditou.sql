-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 juin 2021 à 09:10
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
-- Base de données : `jarditou`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Clé de la table catégorie',
  `cat_nom` varchar(200) NOT NULL COMMENT 'Nom de la catégorie',
  `cat_parent` int(10) UNSIGNED DEFAULT NULL COMMENT 'Catégorie parente',
  PRIMARY KEY (`cat_id`),
  KEY `fk_categories_cat_parent` (`cat_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_nom`, `cat_parent`) VALUES
(1, 'Outillage', NULL),
(2, 'Outillage manuel', 1),
(3, 'Outillage mécanique', 2),
(4, 'Plants et semis', NULL),
(5, 'Arbres et arbustes', NULL),
(6, 'Pots et accessoires', NULL),
(7, 'Mobilier de jardin', NULL),
(8, 'Matériaux', NULL),
(9, 'Tondeuses éléctriques', 3),
(10, 'Tondeuses à moteur thermique', 3),
(11, 'Débroussailleuses', 3),
(12, 'Sécateurs', 2),
(13, 'Brouettes', 2),
(14, 'Tomates', 4),
(15, 'Poireaux', 4),
(16, 'Salade', 4),
(17, 'Haricots', 4),
(18, 'Thuyas', 5),
(19, 'Oliviers', 5),
(20, 'Pommiers', 5),
(21, 'Pots de fleurs', 6),
(22, 'Soucoupes', 6),
(23, 'Supports', 6),
(24, 'Transats', 7),
(25, 'Parasols', 7),
(26, 'Tonnelles', 7),
(27, 'Barbecues', 7),
(28, 'Lames de terrasse', 8),
(29, 'Grillages', 8),
(30, 'Panneaux de clôture', 8);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Clé de la table produits',
  `pro_cat_id` int(10) UNSIGNED NOT NULL COMMENT 'Catégorie du produit',
  `pro_ref` varchar(10) NOT NULL COMMENT 'Référence produit',
  `pro_libelle` varchar(200) NOT NULL COMMENT 'Nom du produit',
  `pro_description` varchar(1000) DEFAULT NULL COMMENT 'Description du produit',
  `pro_prix` decimal(6,2) UNSIGNED NOT NULL COMMENT 'Prix ',
  `pro_stock` int(11) NOT NULL DEFAULT '0' COMMENT 'Nombre d''unités en stock',
  `pro_couleur` varchar(30) DEFAULT NULL COMMENT 'Couleur',
  `pro_photo` varchar(4) DEFAULT 'jpg' COMMENT 'Extension de la photo',
  `pro_d_ajout` date NOT NULL COMMENT 'Date d''ajout',
  `pro_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  `pro_bloque` tinyint(1) DEFAULT NULL COMMENT 'Bloquer le produit à la vente',
  PRIMARY KEY (`pro_id`),
  UNIQUE KEY `idx_pro_ref` (`pro_ref`),
  KEY `fk_produits_cat_id` (`pro_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`pro_id`, `pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`) VALUES
(7, 27, 'barb001', 'Aramis ', '', '110.00', 3, 'Brun', 'jpg', '2018-04-18', NULL, 0),
(8, 27, 'barb002', 'Athos', '', '249.99', 3, 'Noir', '', '2016-06-14', NULL, 0),
(11, 27, 'barb003', 'Clatronic', '', '135.90', 10, 'Chrome1', 'jpg', '2017-10-18', NULL, 0),
(12, 27, 'barb004', 'Camping', 'Phasellus auctor mattis justo, in semper urna congue eget. Nunc sit amet nunc sed dui fringilla scelerisque a eget sem. Aenean cursus eros vehicula arcu blandit, sit amet faucibus leo finibus. Duis pharetra felis eget viverra tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', '88.00', 5, 'Noir', 'jpg', '2018-08-20', NULL, 1),
(13, 13, 'brou001', 'Green', 'Fusce interdum ex justo, vel imperdiet erat volutpat non. Donec et maximus lacus. ', '49.00', 25, 'Verte', 'jpg', '2018-08-01', NULL, NULL),
(14, 13, 'brou002', 'Silver', '', '88.00', 0, 'Argent', 'png', '2018-08-09', NULL, 0),
(15, 13, 'brou003', 'Yellow', '', '54.49', 5, 'Jaune', 'png', '2018-08-12', NULL, 0),
(16, 2, 'GA410', 'Bï¿½che GA 410', '', '19.90', 5, 'Gris', 'png', '2018-08-13', NULL, 0),
(17, 2, 'beche002', 'Bï¿½che GA 388', '', '24.90', 1, 'Argent', 'png', '2018-03-15', NULL, 0),
(18, 2, 'scm0555', 'Scie ï¿½ main SCM0555', '', '31.19', 0, 'Bleue', 'png', '2018-08-19', NULL, 0),
(19, 2, 'scm559', 'Scie couteau', '', '14.90', 4, 'Bleu', 'png', '2018-04-13', NULL, 0),
(20, 2, 'h0662', 'Hache H062', '', '31.19', 0, 'Noir', 'png', '2018-08-12', NULL, 0),
(21, 11, 'DB0703', 'Titan', '', '599.99', 4, 'Bleue', 'png', '1999-08-26', NULL, 0),
(22, 11, 'DB0755', 'Attila', '', '499.99', 0, 'Bleue', 'jpg', '2018-05-16', NULL, 0),
(23, 28, 'LAM121', 'Aquitaine', '', '12.00', 1, 'Rouge', 'jpg', '2018-03-17', NULL, 0),
(24, 28, 'LAM233', 'Brown', 'Morbi porta ultricies nibh vel varius. Vestibulum nec rutrum ex, vel posuere nisi. Ut scelerisque sit amet ligula sed imperdiet. Morbi lacinia sapien in elementum iaculis. Vivamus a ultrices enim. ', '9.98', 500, 'Brun', 'jpg', '2018-03-17', NULL, NULL),
(25, 25, 'PRS-01C', 'Biarritz', 'Quisque fermentum, dui eu elementum sagittis, risus lorem placerat ipsum, vitae venenatis tellus sapien id nibh. Suspendisse et aliquet tellus, in suscipit magna.', '157.00', 5, 'Brun', 'jpg', '2018-08-19', NULL, NULL),
(26, 25, 'PRS-38A', 'Cannes', 'Curabitur sodales sem vitae ex commodo, in ullamcorper quam congue. Aliquam erat volutpat. Praesent mollis at velit eu molestie. Proin ac tellus a enim venenatis ultrices vitae sed libero. Vivamus at vulputate orci. Curabitur mattis ac turpis id tempus. Sed turpis enim, egestas ac arcu et, elementum luctus ante.', '299.40', 4, 'rOSE', 'jpg', '2018-08-12', NULL, NULL),
(27, 25, 'PRS-87F', 'Crotoy', 'Morbi porta ultricies nibh vel varius. Vestibulum nec rutrum ex, vel posuere nisi. Ut scelerisque sit amet ligula sed imperdiet. Morbi lacinia sapien in elementum iaculis.', '89.00', 21, 'Rouge', 'jpg', '2018-04-12', '2018-08-21 00:00:00', NULL),
(28, 21, 'POT_001', 'Agave', '. Vivamus a ultrices enim. Etiam at viverra justo. Cras consectetur justo euismod mi maximus, ac tincidunt leo suscipit. Quisque fermentum, dui eu elementum sagittis, risus lorem placerat ipsum, vitae venenatis tellus sapien id nibh.', '288.32', 11, 'Orange', 'jpg', '2017-11-12', NULL, NULL),
(29, 21, 'POT-002', 'Dark', 'Curabitur sodales sem vitae ex commodo, in ullamcorper quam congue. Aliquam erat volutpat. Praesent mollis at velit eu molestie.', '32.50', 45, 'Noir', 'jpg', '2018-08-19', NULL, NULL),
(30, 21, 'POT_003', 'Fuschia', 'Vel porta orci convallis. Duis sodales vehicula porta. Etiam sit amet scelerisque massa. ', '149.97', 0, 'Rose', 'jpg', '2018-03-04', NULL, NULL),
(31, 6, 'POT-381', 'Iris', 'Praesent nunc dui, porta at leo eget, iaculis ultrices quam. Mauris vulputate metus in nisl aliquam, et sollicitudin nisl mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '245.00', 10, 'Marron', 'jpg', '2017-04-16', NULL, NULL),
(32, 2, 'SEC-A', 'Bahco', 'In hac habitasse platea dictumst. Quisque at sagittis nunc.', '9.90', 280, 'Orange', 'jpg', '2018-08-14', NULL, NULL),
(33, 2, 'SEC-B', 'Red', 'Phasellus ac gravida lorem. Aliquam sed aliquam nisl. Etiam non ornare sapien. Aenean ut tellus non risus varius bibendum quis vel ligula.', '14.99', 16, 'Rouge', 'jpg', '2018-08-05', NULL, NULL),
(34, 10, 'ENH0335', 'Einhell', 'Suspendisse congue nibh sed dui commodo sollicitudin. Vestibulum augue eros, accumsan vel vulputate ut, gravida id libero. Nullam sodales urna id nulla porta vestibulum. Aliquam lectus lacus, tincidunt nec metus.', '335.00', 1, 'Rouge', 'jpg', '2018-05-17', NULL, NULL),
(35, 10, 'GRIZ_001', 'Grizzly', 'luctus aliquet enim. Phasellus quis velit quis tellus pharetra aliquam in at urna. Cras vitae turpis erat. Phasellus libero arcu, fringilla sit amet tempus blandit, congue eu nulla. Morbi id efficitur tellus.', '990.00', 1, 'Chrome', 'jpg', '2018-08-05', NULL, NULL),
(36, 9, 'HERO', 'Hero', NULL, '75.00', 7, 'Vert', 'jpg', '2018-08-13', NULL, NULL),
(37, 9, 'SL1280', 'SL 1280', 'Quisque nec nisi risus. Fusce eu est non velit mollis tristique a et magna. Proin sodales.', '120.50', 5, 'Vert', 'jpg', '2018-08-05', '2018-08-22 00:00:00', NULL),
(38, 10, '6cv', 'Red 6CV ', 'uis vehicula risus in nibh lobortis euismod. In hac habitasse platea dictumst. Quisque at sagittis nunc. Phasellus ac gravida lorem. Aliquam sed aliquam nisl. Etiam non ornare sapien.', '348.00', 2, 'Rouge', 'jpg', '2018-08-16', '2018-08-21 00:00:00', NULL),
(39, 10, 'TRIKE', 'Trike', 'Aenean ut tellus non risus varius bibendum quis vel ligula. ', '497.00', 1, 'Rouge', 'jpg', '2018-08-21', '2018-08-21 10:05:51', NULL),
(40, 16, 'abc0303', 'label', 'descriptoin', '100.00', 5, 'rouge', 'png', '2021-06-17', NULL, 0),
(41, 2, 'out111', 'master', 'les outils pour le jardin', '99.00', 3, 'vert', 'jpg', '2021-06-17', NULL, 0),
(42, 12, 'pelle777', 'tools', 'le pelle du jardin', '19.00', 10, 'noir', 'jpg', '2021-06-17', NULL, 0),
(43, 14, 'tomat007', 'red devil', 'delicious', '2.00', 20, 'rouge', 'jpg', '2021-06-17', NULL, 0),
(45, 14, 'tomat007_2', 'brother of red devil', 'delicious also', '3.00', 20, 'rouge', 'jpg', '2021-06-17', NULL, 0),
(57, 1, 'pelle1', 'label', '', '12.00', 8, 'bleu', 'jpg', '2021-06-18', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'admin'),
(2, 'Timur', '123');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_cat_parent` FOREIGN KEY (`cat_parent`) REFERENCES `categories` (`cat_id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_cat_id` FOREIGN KEY (`pro_cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
