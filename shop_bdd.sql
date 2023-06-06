-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 juin 2023 à 20:06
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_number` varchar(10) NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `user_id`, `product_id`, `created`) VALUES
(30, '20230606FF', 1, 12, '2023-06-06 19:28:14'),
(31, '20230606FF', 1, 16, '2023-06-06 19:28:14');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_prod` int NOT NULL AUTO_INCREMENT,
  `title_prod` varchar(100) DEFAULT NULL,
  `desc_prod` text,
  `prix_prod` varchar(100) DEFAULT NULL,
  `img_prod` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `title_prod`, `desc_prod`, `prix_prod`, `img_prod`) VALUES
(5, 'PS5', 'console de jeux Sony', '549.99', '2023-06-06 19_23_01-Console Sony PS5 PlayStation 5 - Standard edition - Cdiscount Jeux vidéo.png'),
(7, 'SWITCH', 'Console de jeux Nintendo', '299.99', '2023-06-06 19_23_33-Console Nintendo Switch avec un Joy-Con rouge néon et un Joy-Con bleu néon - Cdi'),
(12, 'SWITCH OLED', 'Une nouvelle venue va bient&ocirc;t rejoindre la gamme Nintendo Switch : la Nintendo Switch (mod&egrave;le OLED) poss&egrave;de des dimensions proches de celles de la Nintendo Switch mais dispose d&rsquo;un &eacute;cran OLED plus grand aux couleurs intenses et aux contrastes &eacute;lev&eacute;s. Elle dispose aussi d&rsquo;un large support ajustable pour le jeu en mode sur table, d&rsquo;une nouvelle station d&rsquo;accueil avec port Ethernet pour un jeu en ligne stable, de 64 Go de m&eacute;moire interne et de haut-parleurs int&eacute;gr&eacute;s proposant un audio am&eacute;lior&eacute; pour les modes nomades (portable et sur table). Tout comme la Nintendo Switch, la Nintendo Switch (mod&egrave;le OLED) permet de jouer sur un t&eacute;l&eacute;viseur et de partager les manettes Joy-Con d&eacute;tachables pour s&rsquo;amuser en multijoueur.', '329.99', '2023-06-06 19_08_31-Nintendo Switch (modèle OLED) avec station d’accueil et manettes Joy-Con blanche'),
(13, 'DIABLO IV', 'LES ENFERS SE D&Eacute;CHA&Icirc;NENT&hellip;\r\n\r\nLilith, la fille du Seigneur de la Haine M&eacute;phisto, est de retour. Le mal se r&eacute;pand et Sanctuaire est d&eacute;sormais menac&eacute; par des hordes de fanatiques venus c&eacute;l&eacute;brer son retour. Rares sont celles et ceux ayant le courage de se dresser sur leur chemin&hellip;', '69.99', '2023-06-06 19_19_34-Diablo IV PS5 - Jeux vidéo - Achat & prix _ fnac.png'),
(14, 'XBOX SERIE X', '&bull;Disque SSD 1To - Profitez d&rsquo;un espace de stockage important pour tous vos jeux avec le disque SSD de 1 To pour des chargements rapides et des reprises de jeux instantan&eacute;es', '549.99', '2023-06-06 19_24_05-Pack Console Xbox Series X + Forza Horizon 5 Premium Edition - 1000 Go - Cdiscou'),
(15, 'Hogwarts Legacy', 'jeux xbox serie x', '69.99', 'hogwarts.png'),
(16, 'The Legend of Zelda Tears Of The Kingdom', 'Jeux nintendo', '69.99', 'The-Legend-of-Zelda-Tears-Of-The-Kingdom-Nintendo-Switch.jpg'),
(17, 'Mario Kart 8 Deluxe', 'jeux nintendo switch', '49.99', 'Mario-Kart-8-Deluxe-Nintendo-Switch.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nomPren_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `pass_user` varchar(250) DEFAULT NULL,
  `tel_user` varchar(10) DEFAULT NULL,
  `adress_user` text,
  `login_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nomPren_user`, `email_user`, `pass_user`, `tel_user`, `adress_user`, `login_user`) VALUES
(1, 'Cedric Kervahut', 'c.kervahut@gmail.com', '$2y$10$a/mg3PDxGiIyBo5kDZB6X.j7pMyWt2ubRVS9dvmABrneeOwMpLQua', '0666940189', '2 avenue de Montpensier, 60500, Chantilly', 'Murdrix'),
(2, 'Admin', 'admin@gameshop.fr', '$2y$10$a/mg3PDxGiIyBo5kDZB6X.j7pMyWt2ubRVS9dvmABrneeOwMpLQua', '0666940189', NULL, 'admin'),
(3, 'Jeanne Serge', 'test@gmail.com', '$2y$10$GnKTuVMTiSdDkBRFAlMgu.DR1D4KizisYphr5MExyMiQrvor9Au/K', '0123456789', 'test', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id_prod`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
