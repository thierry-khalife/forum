-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 déc. 2019 à 09:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomcat` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nomcat`, `id_utilisateur`) VALUES
(1, 'Alollila', 3),
(2, 'League of Legends', 4),
(3, 'Rocket League', 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `datemessage` datetime NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_utilisateur`, `id_thread`, `datemessage`, `message`) VALUES
(1, 4, 2, '2019-12-18 14:57:41', 'l,dm'),
(2, 4, 2, '2019-12-18 15:03:48', 'lzejdnzlzeqnd'),
(3, 4, 2, '2019-12-18 15:05:50', 'mkjnml'),
(4, 4, 2, '2019-12-18 15:06:31', 'yo salut tout le monde !! ca gaz?! quoi de neuf?');

-- --------------------------------------------------------

--
-- Structure de la table `threads`
--

DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomthread` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `datethread` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `threads`
--

INSERT INTO `threads` (`id`, `nomthread`, `id_utilisateur`, `id_topic`, `datethread`) VALUES
(1, 'Yo test 1', 4, 20, '2019-12-18 11:59:15'),
(2, 'j,,gn', 4, 18, '2019-12-18 12:02:11');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomtopic` varchar(255) NOT NULL,
  `datecreation` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `visibilite` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `nomtopic`, `datecreation`, `id_utilisateur`, `id_categorie`, `visibilite`) VALUES
(1, 'Salut', '2019-12-17 15:19:41', 3, 1, 1),
(2, 'Test', '2019-12-17 16:22:00', 4, 2, 1),
(5, 'opcdmcl,', '2019-12-17 16:25:13', 4, 1, 1),
(6, 'Salut je test', '2019-12-17 16:28:07', 4, 3, 1),
(17, 'Je test encore', '2019-12-18 11:32:51', 4, 2, 1),
(16, 'Coucou', '2019-12-18 11:25:51', 4, 2, 1),
(18, 'Test 3', '2019-12-18 11:35:43', 4, 2, 1),
(19, 'ckljdslkcvn', '2019-12-18 11:36:51', 4, 2, 1),
(20, 'Test 1', '2019-12-18 11:37:11', 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `dateinscription` datetime NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `password`, `rank`, `dateinscription`, `avatar`) VALUES
(3, 'admin', 'admin', 'admin', '$2y$12$QwvjCr.oR0QPCPsMWIBdquHIGZt7gpAtn5gYkyFVwIleHybpUD3WS', 1, '2019-12-16 13:47:04', 'img/profile3.jpg'),
(4, 'nico', 'nico', 'nico', '$2y$12$OLSlAyiFTtOo.VOkuAJBA.K/BG6uJSpL8zS7JfP5RX6IattXIE6I.', 1, '2019-12-17 14:57:11', 'img/profile4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_message` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
