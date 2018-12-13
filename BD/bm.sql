-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 déc. 2018 à 10:06
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bm`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`message_id`, `message`, `user_id`) VALUES
(29, 'la', 1),
(28, 'la', 1),
(27, 'la', 1),
(26, 'samp', 1),
(25, 'je spam', 1),
(24, 'je spam', 1),
(23, 'allo', 1),
(22, '', 1),
(21, '', 1),
(20, '', 1),
(17, 'J\'écris', 1),
(16, 'Chat réinitialisé', 1),
(30, 'la', 1),
(31, 'la', 1),
(32, 'la', 1),
(33, 'la', 1),
(34, 'la', 1),
(35, 'la', 1),
(36, 'la', 1),
(37, 'la', 1),
(38, 'la', 1),
(39, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'Fabien', '$2y$10$wOYnQaTmM2vw1EyDwKMKvOxvXMthw13RgkuzBcStkXm18yqvVsxGe'),
(2, 'Leo', '$2y$10$QFGAmdRjb4UOO.GvT3.lhelxiFZ5mDTGlVawexTFEAV6Ztplrdepu'),
(3, 'Romain', '$2y$10$mNqdrJhULZg/ox4bTTamxeYySHDvLVrqtMUaCD5SOohLuuA35KDKi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
