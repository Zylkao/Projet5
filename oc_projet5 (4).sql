-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 jan. 2019 à 13:03
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
-- Base de données :  `oc_projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `gamelist`
--

DROP TABLE IF EXISTS `gamelist`;
CREATE TABLE IF NOT EXISTS `gamelist` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) NOT NULL,
  `game_image` varchar(255) NOT NULL,
  `game_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gamelist`
--

INSERT INTO `gamelist` (`game_id`, `game_name`, `game_image`, `game_type`) VALUES
(1, 'test', 'test', ''),
(2, 'test2', 'lalafell_by_woodneck-d88medo.png', NULL),
(3, 'test3', 'test2.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `main_menu`
--

DROP TABLE IF EXISTS `main_menu`;
CREATE TABLE IF NOT EXISTS `main_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `item_description` text COLLATE latin1_general_ci NOT NULL,
  `last_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `main_menu`
--

INSERT INTO `main_menu` (`id`, `item_name`, `item_description`, `last_date`) VALUES
(1, 'Qui Suis-Je?', 'Salut , moi c\'est ChiiKuBi aka ChiiKu\r\n\r\nJ\'ai 30 bananes , je suis de BOURGOGNE, mon but en tant que STREAMER GAMEUR et de faire partager un maximum cette passion.\r\nJe suis fan de RPG, JRPG, INDIEGAMES, RETROGAMING et plus encore.\r\nJ\'aime beaucoup tout ce qui touche au JAPON la culture, la musique etc...\r\n\r\nHobbies: Jeux Vidéos, Music, Cinéma, Internet\r\nSupport: PC , Switch', '2018-12-30'),
(2, 'Setup', 'PROC : Intel Core i7-7700 K (4.9 ghz)<br />CM : MSI Z270 Gaming Pro Carbon<br />CG:Nvidia Geforce GTX 1050 TI<br />SSD:Crucial 255 GO<br />HDD: 2x 1TO<br />RAM: Crucial Corsaire 4X4 DDR4<br />HEADSET: KLIM Puma - Micro Casque Gamer - Son 7.1', '2018-12-30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date_user_creation` datetime NOT NULL,
  `steam_id` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `battle_tag` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `switch_id` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `psn_id` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `xbox_id` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `pseudo`, `email`, `password`, `role`, `date_user_creation`, `steam_id`, `battle_tag`, `switch_id`, `psn_id`, `xbox_id`) VALUES
(1, 'Zylkao', 'rfrancois1993@gmail.com', 'rfcss1397', 'Admin', '2018-12-06 00:00:00', '', '', '', '', ''),
(2, 'Zylkao', 'rfrancois1993@gmail.com', '064d8450e2a61c7eb213cfd5417f6e58f3600241', 'Admin', '2018-12-22 09:35:43', 'demigoth95', 'zyl#2258', '', 'FHDemigoth', ''),
(3, 'test1', 'test@test.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'User', '2018-12-22 09:37:59', '', '', '', '', ''),
(4, 'test3', 'test3@test.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'User', '2019-01-02 17:45:41', NULL, NULL, NULL, NULL, NULL),
(5, 'test4', 'test4@test.test', '1ff2b3704aede04eecb51e50ca698efd50a1379b', 'User', '2019-01-02 17:45:57', NULL, NULL, NULL, NULL, NULL),
(6, 'test5', 'test5@test.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'User', '2019-01-02 17:46:27', NULL, NULL, NULL, NULL, NULL),
(7, 'test6', 'test6@test.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'User', '2019-01-02 17:46:45', NULL, NULL, NULL, NULL, NULL),
(8, 'test7', 'test@test.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'User', '2019-01-02 17:47:03', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
