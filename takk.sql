-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 mai 2019 à 18:04
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `takk`
--

-- --------------------------------------------------------

--
-- Structure de la table `communaute`
--

DROP TABLE IF EXISTS `communaute`;
CREATE TABLE IF NOT EXISTS `communaute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `motcle` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `communaute`
--

INSERT INTO `communaute` (`id`, `nom`, `description`, `ville`, `motcle`) VALUES
(1, 'zfqdq', 'dqzdqzd', 'qzdqzdq', 'qzdqzdqz'),
(2, 'qzdzq', 'dqzdqzd', 'qdqzd', 'qzdqz'),
(3, 'menuisier', 'ddqzdqzdqz', 'Marseille', 'menuiserie'),
(4, 'plombier du dimanche', 'ddqzdqzdqz', 'Tourcoing', 'plomberie'),
(5, 'voiturier', 'qzdqzdqzd', 'Tourcoing', 'voiture'),
(6, 'aeqze', 'zqzqeq', 'Dunkerque', 'tuyaux'),
(7, 'aaazaz', 'dsd', 'qzdqz', 'dqzd'),
(8, 'aaazaz', 'dsd', 'qzdqz', 'dqzd'),
(9, 'ddddede', 'ffrf', 'Lille', 'maison'),
(10, 'qdesfse', 'sefsefs', 'Lyon', 'fesf efsef efesf'),
(11, 'qdesxx', 'sefsefsxx', 'Calais', 'dqzd maison dzdqz');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` text COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `adresse`, `ville`, `pays`, `mail`, `mdp`, `tel`, `description`) VALUES
(1, 'testnom', 'testprenom', '81 rue test', 'Lille', 'France', 'test@gmail.com', 'testmdp', '0658475698', 'Bonjour, je suis un etudiant de efficom et je test le site.');

-- --------------------------------------------------------

--
-- Structure de la table `poste_message`
--

DROP TABLE IF EXISTS `poste_message`;
CREATE TABLE IF NOT EXISTS `poste_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `poste_message`
--

INSERT INTO `poste_message` (`id`, `message`, `created_at`, `id_user`) VALUES
(1, 'Bonjour, je recherche un velo', '2019-03-05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, 'testnom', 'testprenom', 'testemail@gmail.com'),
(3, 'Durand', 'Bernard', 'durand.bernard@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
