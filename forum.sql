-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 jan. 2020 à 10:51
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nomcat`, `id_utilisateur`) VALUES
(3, 'Recrutement', 4),
(2, 'CommunautÃ©', 4),
(1, 'Annonces officielles', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_utilisateur`, `id_thread`, `datemessage`, `message`) VALUES
(1, 4, 2, '2019-12-18 14:57:41', 'l,dm'),
(2, 4, 2, '2019-12-18 15:03:48', 'lzejdnzlzeqnd'),
(3, 4, 2, '2019-12-18 15:05:50', 'mkjnml'),
(4, 4, 2, '2019-12-18 15:06:31', 'yo salut tout le monde !! ca gaz?! quoi de neuf?'),
(5, 3, 4, '2019-12-20 11:01:00', 'salut'),
(6, 3, 5, '2020-01-07 11:48:17', 'Salut'),
(7, 3, 6, '2020-01-07 14:22:28', '* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n* Ajout de dijzeojeodjzekdnkzenkdfznefeknfezlkf\r\n\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l\r\n- Supression de elmvjsdojfso,lmd,l'),
(8, 3, 6, '2020-01-07 15:32:25', 'SaluteÃ ojfpzoemfn'),
(9, 3, 8, '2020-01-07 15:49:26', 'dmÃ¹lkqf,ml'),
(10, 4, 5, '2020-01-14 09:52:34', 'Test'),
(11, 4, 5, '2020-01-14 10:26:55', 'ezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnhezhfiohejfiezhjfiehifheisfhidshndcisdhne fizheficzehfncziehcfnziehnczieinnh'),
(12, 5, 5, '2020-01-14 11:47:42', 'Salut, je suis nul Ã  TFT.');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `threads`
--

INSERT INTO `threads` (`id`, `nomthread`, `id_utilisateur`, `id_topic`, `datethread`) VALUES
(1, 'Yo test 1', 4, 20, '2019-12-18 11:59:15'),
(2, 'j,,gn', 4, 18, '2019-12-18 12:02:11'),
(3, 'khilk', 3, 18, '2019-12-19 15:30:04'),
(4, 'Salut', 3, 1, '2019-12-20 11:00:51'),
(5, 'Salut', 4, 17, '2020-01-06 10:44:13'),
(6, 'Patch 0.1', 3, 22, '2020-01-07 14:21:39'),
(7, 'Test2', 3, 17, '2020-01-07 14:44:27'),
(8, 'Patch 0.2', 3, 22, '2020-01-07 15:48:22'),
(9, 'Patch 0.3', 3, 22, '2020-01-07 15:49:21');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `nomtopic`, `datecreation`, `id_utilisateur`, `id_categorie`, `visibilite`) VALUES
(2, 'Test', '2019-12-17 16:22:00', 4, 2, 1),
(22, 'Notes de patch', '2020-01-06 16:33:49', 4, 1, 1),
(6, 'Salut je test', '2019-12-17 16:28:07', 4, 3, 1),
(17, 'Je test encore', '2019-12-18 11:32:51', 4, 2, 1),
(16, 'Coucou', '2019-12-18 11:25:51', 4, 2, 1),
(18, 'Test 3', '2019-12-18 11:35:43', 4, 2, 1),
(19, 'ckljdslkcvn', '2019-12-18 11:36:51', 4, 2, 1),
(21, 'Annoncements', '2020-01-06 16:32:57', 4, 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `password`, `rank`, `dateinscription`, `avatar`) VALUES
(3, 'admin', 'admin', 'admin', '$2y$12$QwvjCr.oR0QPCPsMWIBdquHIGZt7gpAtn5gYkyFVwIleHybpUD3WS', 1, '2019-12-16 13:47:04', 'img/profile3.jpg'),
(4, 'nico', 'nico', 'nico', '$2y$12$OLSlAyiFTtOo.VOkuAJBA.K/BG6uJSpL8zS7JfP5RX6IattXIE6I.', 1, '2019-12-17 14:57:11', 'img/profile4.jpg'),
(5, 'pol', 'Paul', 'Lepoulpe', '$2y$12$tkHrQ1tV7sLRnJrQsCdHou9lYbf2tuOVf9Dic4FMNMoxQhfWZyvry', 3, '2020-01-06 12:28:05', 'img/default.png'),
(6, 'serge', 'Serge', 'Juani', '$2y$12$WYb.b.iHGOrdSwhW3sxRWOm381z/eg1Jy3b7RlpdLQQibU1rtdn2W', 3, '2020-01-06 12:28:29', 'img/default.png'),
(7, 'momo', 'momo', 'momo', '$2y$12$bKyYX7gBNzG9R2X9gW4.IeGkXCRLUj/2/dPjHw5wa96PUnsJceZP6', 3, '2020-01-06 12:28:46', 'img/default.png'),
(8, 'thierry', 'thierry', 'escobar', '$2y$12$2dcwwxlFOtLddDRI9URJl.sb16o.1UpRF8.XkYErSw3Vg7gXMl7Mm', 3, '2020-01-06 12:29:03', 'img/default.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id`, `id_message`, `id_utilisateur`, `valeur`) VALUES
(53, 11, 4, 1),
(57, 10, 4, -1),
(55, 6, 4, 1),
(58, 6, 5, 1),
(59, 10, 5, -1),
(60, 11, 5, -1),
(61, 12, 5, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
