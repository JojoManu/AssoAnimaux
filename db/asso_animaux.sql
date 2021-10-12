-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 oct. 2021 à 20:38
-- Version du serveur : 5.7.23
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `asso_animaux`
--
CREATE DATABASE IF NOT EXISTS `asso_animaux` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asso_animaux`;

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `nom`, `description`, `age`, `dateAjout`) VALUES
(1, 'gÃ©rard', 'gentil', 3, '2021-10-12 00:00:17'),
(2, 'test1', 'a', 2, '2021-10-12 00:19:30'),
(3, '[value-1]', '[value-2]', 2, '2021-10-12 00:20:57'),
(4, 'yessss', '[value-2]', 5, '2021-10-12 00:21:24'),
(5, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(6, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(7, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(8, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(9, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(10, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(11, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(12, '[value-1]', '[value-2]', 2, '2021-10-12 00:21:24'),
(13, 'pÃ©pÃ©a', 'aaa', 6, '2021-10-12 21:46:48');

-- --------------------------------------------------------

--
-- Structure de la table `demandeclient`
--

DROP TABLE IF EXISTS `demandeclient`;
CREATE TABLE IF NOT EXISTS `demandeclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `dateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandeclient`
--

INSERT INTO `demandeclient` (`id`, `id_animal`, `contact`, `text`, `dateAjout`) VALUES
(1, 1, 'test@mail.com', 'je voudrais réserver', '2021-10-12 01:32:24'),
(2, 4, 'user@mail.com', 'aaa', '2021-10-12 03:45:38'),
(3, 13, 'user@mail.com', 'aaaaaa', '2021-10-12 22:14:46');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0 = user et 1 = admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'test', 'test@mail.com', '$2y$10$Pe1.uZ89PSmp.AO.HJ.MZucOqC0JU2C6c2hpmUydeGIWCuqi/qaUe', '2021-10-11 23:58:40', 1),
(2, 'utilisateurClassique', 'user@mail.com', '$2y$10$5dBMSt3tn1EWstIrygQFAOtUrRB37auGIOnxkNvu0vKwFpfpymJDS', '2021-10-12 02:09:01', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
