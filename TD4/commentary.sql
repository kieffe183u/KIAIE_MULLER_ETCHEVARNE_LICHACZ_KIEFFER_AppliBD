-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 24 mars 2021 à 15:28
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamepedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE `commentary` (
  `id` int NOT NULL,
  `titre` varchar(500) NOT NULL,
  `contenu` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `game_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `titre`, `contenu`, `date`, `created_at`, `updated_at`, `email`, `game_id`) VALUES
(1, 'Bien', 'Bonjour, j\'ai grandement apprécié ce jeu: je le recommande.', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'mateokieffer@wanadoo.fr', 12342),
(2, 'Nul !', 'Assez mauvais, je me suis ennuyé.', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'mateokieffer@wanadoo.fr', 12342),
(3, 'Moyen, à voir', 'Très moyen.', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'mateokieffer@wanadoo.fr', 12342),
(4, 'C\'est génial', 'C\'est le meilleur jeu auquel j\'ai joué de toute ma vie', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'fabricemougenot@caramail.com', 12342),
(5, 'Passez votre chemin', 'Passez votre chemin, ne jouez pas à ce jeu, c\'est catastrophique', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'fabricemougenot@caramail.com', 12342),
(6, 'Franchement nul', 'C\'est trop nul !! N\'y jouez pas', '2021-03-24', '2021-03-24 00:00:00', '2021-03-24 00:00:00', 'fabricemougenot@caramail.com', 12342);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKey_email` (`email`),
  ADD KEY `FK_gameID` (`game_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `FK_gameID` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `foreignKey_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
