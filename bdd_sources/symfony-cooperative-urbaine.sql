-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Janvier 2015 à 18:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony-cooperative-urbaine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_adresse` int(11) NOT NULL,
  `rue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_voie` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `num_batiment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `consomacteur`
--

CREATE TABLE IF NOT EXISTS `consomacteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consomacteur` int(11) NOT NULL,
  `jours_livraison` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `maraicher`
--

CREATE TABLE IF NOT EXISTS `maraicher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_maraicher` int(11) NOT NULL,
  `adresseExploitation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_303E159DDA322DC` (`adresseExploitation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `maraicher_production`
--

CREATE TABLE IF NOT EXISTS `maraicher_production` (
  `maraicher_id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL,
  PRIMARY KEY (`maraicher_id`,`production_id`),
  KEY `IDX_1A60AF517D6FCEE4` (`maraicher_id`),
  KEY `IDX_1A60AF51ECC6147F` (`production_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL,
  `nom_membre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_membre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_membre` int(11) NOT NULL,
  `commentaire_personnel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_production` int(11) NOT NULL,
  `produits` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `production_max` int(11) NOT NULL,
  `cout_produit` int(11) NOT NULL,
  `ccommande_min` int(11) NOT NULL,
  `commande_max` int(11) NOT NULL,
  `ddate_debut` int(11) NOT NULL,
  `ddate_fin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dispo_produit` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `maraicher`
--
ALTER TABLE `maraicher`
  ADD CONSTRAINT `FK_303E159DDA322DC` FOREIGN KEY (`adresseExploitation_id`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour la table `maraicher_production`
--
ALTER TABLE `maraicher_production`
  ADD CONSTRAINT `FK_1A60AF51ECC6147F` FOREIGN KEY (`production_id`) REFERENCES `production` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1A60AF517D6FCEE4` FOREIGN KEY (`maraicher_id`) REFERENCES `maraicher` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
