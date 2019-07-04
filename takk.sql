-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 09:37
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
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `communaute`
--

INSERT INTO `communaute` (`id`, `nom`, `description`, `ville`, `motcle`, `admin`) VALUES
(1, 'zfqdq', 'dqzdqzd', 'qzdqzdq', 'qzdqzdqz', 0),
(2, 'qzdzq', 'dqzdqzd', 'qdqzd', 'qzdqz', 0),
(3, 'menuisier', 'ddqzdqzdqz', 'Marseille', 'menuiserie', 0),
(4, 'plombier du dimanche', 'ddqzdqzdqz', 'Tourcoing', 'plomberie', 0),
(5, 'voiturier', 'qzdqzdqzd', 'Tourcoing', 'voiture', 0),
(6, 'aeqze', 'zqzqeq', 'Dunkerque', 'tuyaux', 0),
(7, 'aaazaz', 'dsd', 'qzdqz', 'dqzd', 0),
(8, 'aaazaz', 'dsd', 'qzdqz', 'dqzd', 0),
(9, 'ddddede', 'ffrf', 'Lille', 'maison', 3),
(10, 'qdesfse', 'sefsefs', 'Lyon', 'fesf efsef efesf', 3),
(11, 'qdesxx', 'sefsefsxx', 'Calais', 'dqzd maison dzdqz', 3);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pwd` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `nom` varchar(255) DEFAULT 'gungor',
  `prenom` varchar(255) NOT NULL DEFAULT 'salih',
  `dateNaiss` date DEFAULT NULL,
  `ville` varchar(255) NOT NULL DEFAULT 'Tourcoing',
  `adresse` varchar(255) DEFAULT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pwd`, `mail`, `nom`, `prenom`, `dateNaiss`, `ville`, `adresse`, `pays`, `tel`) VALUES
(3, 'ba2274b478832a0c9f22c8d557c3f71c', 'gungor.salih@outlook.fr', 'Gungor', 'Salih', '1997-08-20', 'Tourcoing', 'France', '137 Rue Colbert 59200 Tourcoing', '0610877589');

-- --------------------------------------------------------

--
-- Structure de la table `membre_communaute`
--

DROP TABLE IF EXISTS `membre_communaute`;
CREATE TABLE IF NOT EXISTS `membre_communaute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(7) NOT NULL,
  `communaute_id` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre_communaute`
--

INSERT INTO `membre_communaute` (`id`, `membre_id`, `communaute_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6);

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
