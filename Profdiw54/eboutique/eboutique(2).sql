-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 fév. 2020 à 08:12
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` double(7,2) NOT NULL,
  `stock` int(4) NOT NULL,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `sexe`, `photo`, `prix`, `stock`) VALUES
(3, '101', 'Tshirt', 'Tshirt blanc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae sem justo. Etiam vestibulum molestie nulla, ut auctor mi pulvinar vel. Praesent sit amet dignissim velit, iaculis egestas ligula. In ornare felis non tempus semper. Etiam eleifend ut eros id mattis. Quisque rutrum tortor a dolor feugiat sollicitudin. In scelerisque, libero nec tristique condimentum, metus magna pretium tellus, vitae scelerisque ex lacus vel arcu. Fusce et lacus diam. Nullam a aliquet massa, sed maximus felis.', 'Blanc', 'M', 'm', '101-301-tshirt_blanc.jpg', 10.00, 50),
(4, '102', 'Tshirt', 'Tshirt rouge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae sem justo. Etiam vestibulum molestie nulla, ut auctor mi pulvinar vel. Praesent sit amet dignissim velit, iaculis egestas ligula. In ornare felis non tempus semper. Etiam eleifend ut eros id mattis. Quisque rutrum tortor a dolor feugiat sollicitudin. In scelerisque, libero nec tristique condimentum, metus magna pretium tellus, vitae scelerisque ex lacus vel arcu. Fusce et lacus diam. Nullam a aliquet massa, sed maximus felis.', 'Rouge', 'M', 'm', '102-303-tshirt_rouge.jpg', 10.00, 50),
(5, '103', 'Tshirt', 'Tshirt bleu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae sem justo. Etiam vestibulum molestie nulla, ut auctor mi pulvinar vel. Praesent sit amet dignissim velit, iaculis egestas ligula. In ornare felis non tempus semper. Etiam eleifend ut eros id mattis. Quisque rutrum tortor a dolor feugiat sollicitudin. In scelerisque, libero nec tristique condimentum, metus magna pretium tellus, vitae scelerisque ex lacus vel arcu. Fusce et lacus diam. Nullam a aliquet massa, sed maximus felis.', 'Bleu', 'L', 'm', '103-302-tshirt_bleu.jpg', 10.00, 50),
(6, '104', 'Tshirt', 'Tshirt noir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae sem justo. Etiam vestibulum molestie nulla, ut auctor mi pulvinar vel. Praesent sit amet dignissim velit, iaculis egestas ligula. In ornare felis non tempus semper. Etiam eleifend ut eros id mattis. Quisque rutrum tortor a dolor feugiat sollicitudin. In scelerisque, libero nec tristique condimentum, metus magna pretium tellus, vitae scelerisque ex lacus vel arcu. Fusce et lacus diam. Nullam a aliquet massa, sed maximus felis.', 'Noir', 'L', 'm', '104-305-tshirt_noir.jpg', 10.00, 50),
(7, '200', 'Chemise', 'Chemise bleue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Bleu', 'S', 'm', '200-101-chemise_bleue.jpg', 35.00, 50),
(8, '201', 'Chemise', 'Chemise blanche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Blanc', 'M', 'm', '201-102-chemise_blanche.jpg', 35.00, 50),
(9, '202', 'Chemise', 'Chemise rose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Rose', 'M', 'm', '202-103-chemise_rose.jpg', 35.00, 50),
(10, '203', 'Chemise', 'Chemise noire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Noir', 'M', 'm', '203-104-chemise_noire.jpg', 35.00, 50),
(11, '204', 'Chemise', 'Chemise noire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Gris', 'L', 'm', '204-105-chemise_grise.jpg', 35.00, 50),
(12, '300', 'Chaussettes', 'Chaussettes bleues', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Bleu', 'M', 'm', '300-403-chaussettes_bleues.jpg', 7.00, 50),
(13, '301', 'Chaussettes', 'Chaussettes jaunes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Jaune', 'M', 'm', '301-404-chaussettes_jaunes.jpg', 7.00, 50),
(14, '302', 'Chaussettes', 'Chaussettes noires', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Noir', 'M', 'm', '302-405-chaussettes_noires.jpg', 7.00, 50),
(15, '303', 'Chaussettes', 'Chaussettes grises', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Gris', 'M', 'm', '303-402-chaussettes_grises.jpg', 7.00, 50),
(16, '400', 'Polo', 'Polo blanc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Blanc', 'M', 'm', '400-701-polo_blanc.jpg', 42.00, 50),
(17, '401', 'Polo', 'Polo bleu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Bleu', 'M', 'm', '401-703-polo_bleu.jpg', 42.00, 50),
(18, '402', 'Polo', 'Polo rose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Rose', 'M', 'm', '402-706-polo_rose.jpg', 42.00, 50),
(19, '403', 'Polo', 'Polo gris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Gris', 'M', 'm', '403-702-polo_gris.jpg', 42.00, 50),
(20, '404', 'Polo', 'Polo noir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Noir', 'M', 'm', '404-705-polo_noir.jpg', 42.00, 50),
(21, '500', 'Pantalon', 'Pantalon noir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Noir', 'M', 'm', '500-202-pantalon_noir.jpg', 56.00, 50),
(22, '501', 'Pantalon', 'Pantalon blanc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Blanc', 'M', 'm', '501-201-pantalon_blanc.jpg', 56.00, 50),
(23, '502', 'Pantalon', 'Pantalon beige', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Beige', 'M', 'm', '502-205-pantalon_beige.jpg', 56.00, 50),
(24, '503', 'Pantalon', 'Pantalon gris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Gris', 'M', 'm', '503-204-pantalon_gris.jpg', 56.00, 50),
(25, '304', 'Chaussettes', 'Chaussettes blanches', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a rutrum lacus. Etiam ipsum nulla, mollis vitae enim sit amet, elementum efficitur dui. Donec ac facilisis felis. Integer eget tortor quis sapien viverra aliquet. Nulla quis neque nisl. Donec id velit vitae neque pretium pharetra. Nulla lobortis quam eros, eget sodales mi tincidunt ac. Donec rutrum velit a purus tincidunt, ut consectetur dolor placerat. Sed quis augue cursus, facilisis leo vel, feugiat eros. Cras euismod aliquet nulla non vehicula. Morbi posuere sagittis dui in sollicitudin. Mauris eget leo et justo congue interdum ac mattis risus. Pellentesque ac congue quam. Maecenas porttitor rutrum tempus.', 'Blanc', 'M', 'm', '304-401-chaussettes_blanc.jpg', 7.00, 50);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  `montant` double(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL DEFAULT 'en cours de traitement',
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

DROP TABLE IF EXISTS `details_commande`;
CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(5) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) NOT NULL,
  `id_article` int(5) DEFAULT NULL,
  `quantite` int(4) NOT NULL,
  `prix` double(7,2) NOT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `id_article` (`id_article`),
  KEY `id_commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `adresse` text NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(2, 'admin', '$2y$10$mkzpd8tABpoUAwpnTvwYveaey1/tERbxk18ivaL0.K9vGRdPnlvb6', 'Quittard', 'Mathieu', 'admin@mail.fr', 'm', 'Paris', '75000', 'Rue du tertre', 2),
(3, 'test', '$2y$10$owmyhmUfOQJ3g7/dPYb8O.NXvFEsoMGNcF3U2rr6tf4YH5IJxcNoq', 'Quittard', 'Mathieu', 'test@mail.fr', 'm', 'Paris', '75000', 'Rue du tertre', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
