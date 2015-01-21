-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Janvier 2015 à 18:49
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `id_adresse`, `rue`, `num_voie`, `ville`, `code_postal`, `num_batiment`) VALUES
(1, 1, '5', 5, 'a', 1, 1);

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
-- Structure de la table `pcuser`
--

CREATE TABLE IF NOT EXISTS `pcuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_AEFA2DA692FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_AEFA2DA6A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pcuser`
--

INSERT INTO `pcuser` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'user', 'user', 'user', 'user', 1, 'm2ucguk2gi884s8w4ko8gos0wgg0wco', 'rLjwkHT2BEUsivZYG0PybdenbvEAPZnT5ZIbYpkNO89QsgpqvNxSPdMNEVX57hGjw1MIKlWkwzz564P8v+zxPw==', '2015-01-21 18:23:52', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(2, 'admin', 'admin', 'admin', 'admin', 1, 'hta7c5o2mugocwk0sowgw4kgg8ko4c8', 'BuImURgYkICb+2qrZ6PlrM/d+mhQd5jvzHxuZiMV/ixs65pTlB5EtkkGac8eJtCKCH/VDoF7snk5lA7g1or3Jw==', '2015-01-21 18:34:05', 0, 0, NULL, NULL, NULL, 'a:3:{i:0;s:14:"ADMINISTRATEUR";i:1;s:13:"AMINISTRATEUR";i:2;s:10:"ROLE_ADMIN";}', 0, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `id_produit`, `nom_produit`, `type_produit`, `dispo_produit`) VALUES
(1, 1, 'S', 'S', 1);

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
