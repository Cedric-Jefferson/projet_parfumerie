-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 fév. 2020 à 04:25
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parfurmerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) NOT NULL AUTO_INCREMENT,
  `num_client` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `nom_client` varchar(20) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_comm` int(10) NOT NULL AUTO_INCREMENT,
  `num_commande` int(10) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_comm`),
  KEY `id_prod_fkey` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `complementprix`
--

DROP TABLE IF EXISTS `complementprix`;
CREATE TABLE IF NOT EXISTS `complementprix` (
  `id_comPrix` int(11) NOT NULL AUTO_INCREMENT,
  `fraisService` float NOT NULL,
  `fraisLivraison` float NOT NULL,
  `promo` float NOT NULL,
  `accompte` float NOT NULL,
  `num_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_comPrix`),
  KEY `num_comm_fkey` (`num_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

DROP TABLE IF EXISTS `devise`;
CREATE TABLE IF NOT EXISTS `devise` (
  `id_devise` int(10) NOT NULL AUTO_INCREMENT,
  `devise1` varchar(20) NOT NULL,
  `devise2` varchar(20) NOT NULL,
  `conversion1vers2` float NOT NULL,
  `conversion2vers1` float NOT NULL,
  PRIMARY KEY (`id_devise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `num_facture` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(20) NOT NULL,
  `url` varchar(20) NOT NULL,
  `supplier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE IF NOT EXISTS `prix` (
  `id_prix` int(10) NOT NULL AUTO_INCREMENT,
  `prixAchat` float NOT NULL,
  `prixVente` float NOT NULL,
  `saving` float NOT NULL,
  `num_produit` int(10) NOT NULL,
  PRIMARY KEY (`id_prix`),
  KEY `num_prod_fkey` (`num_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(10) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `volume` int(10) NOT NULL,
  `id_fournisseur` int(10) NOT NULL,
  `description` text NOT NULL,
  `qtestock` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_fournisseur_fkey` (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usr` varchar(50) NOT NULL,
  `prenom_usr` varchar(50) NOT NULL,
  `num_adherent` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_usr_forum` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_usr`, `nom_usr`, `prenom_usr`, `num_adherent`, `password`, `date_de_naissance`, `email`, `id_usr_forum`, `id_session`) VALUES
(17, 'Lagrange', 'FrÃ©deric', 678171, '', '2019-06-18', 'fred@gmail.com', 183091, 561984),
(7, 'testeur', 'azer', 456789, 'azer', '2019-06-28', 'testeur@azer.com', 456789, 456789),
(12, 'eric', 'chris', 114336, 'chris', '2019-06-07', 'eric@chris.fr', 158984, 33329);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `id_prod_fkey` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `complementprix`
--
ALTER TABLE `complementprix`
  ADD CONSTRAINT `num_comm_fkey` FOREIGN KEY (`num_commande`) REFERENCES `commande` (`id_comm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prix`
--
ALTER TABLE `prix`
  ADD CONSTRAINT `num_prod_fkey` FOREIGN KEY (`num_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `id_fournisseur_fkey` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
