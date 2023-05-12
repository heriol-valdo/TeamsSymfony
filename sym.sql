-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 déc. 2022 à 19:44
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sym`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221215155858', '2022-12-15 16:59:21', 3017);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `portrait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `team_id`, `name`, `lastname`, `birthday`, `portrait`, `number`) VALUES
(1, 1, 'firstname0', 'lastname0', '2000-01-01', 'img0.jpg', 6),
(2, 2, 'firstname1', 'lastname1', '2000-01-01', 'img1.jpg', 5),
(3, 3, 'firstname2', 'lastname2', '2000-01-01', 'img2.jpg', 4),
(4, 4, 'firstname3', 'lastname3', '2000-01-01', 'img3.jpg', 7),
(5, 1, 'firstname4', 'lastname4', '2000-01-01', 'img4.jpg', 8),
(6, 1, 'firstname5', 'lastname5', '2000-01-01', 'img5.jpg', 6),
(7, 1, 'firstname6', 'lastname6', '2000-01-01', 'img6.jpg', 4),
(8, 3, 'firstname7', 'lastname7', '2000-01-01', 'img7.jpg', 11),
(9, 2, 'firstname8', 'lastname8', '2000-01-01', 'img8.jpg', 11),
(10, 5, 'firstname9', 'lastname9', '2000-01-01', 'img9.jpg', 8),
(11, 5, 'firstname10', 'lastname10', '2000-01-01', 'img10.jpg', 1),
(12, 2, 'firstname11', 'lastname11', '2000-01-01', 'img11.jpg', 5),
(13, 4, 'firstname12', 'lastname12', '2000-01-01', 'img12.jpg', 6),
(14, 1, 'firstname13', 'lastname13', '2000-01-01', 'img13.jpg', 8),
(15, 3, 'firstname14', 'lastname14', '2000-01-01', 'img14.jpg', 1),
(16, 2, 'firstname15', 'lastname15', '2000-01-01', 'img15.jpg', 8),
(17, 4, 'firstname16', 'lastname16', '2000-01-01', 'img16.jpg', 8),
(18, 4, 'firstname17', 'lastname17', '2000-01-01', 'img17.jpg', 2),
(19, 4, 'firstname18', 'lastname18', '2000-01-01', 'img18.jpg', 10),
(20, 2, 'firstname19', 'lastname19', '2000-01-01', 'img19.jpg', 7),
(21, 4, 'firstname20', 'lastname20', '2000-01-01', 'img20.jpg', 11),
(22, 1, 'firstname21', 'lastname21', '2000-01-01', 'img21.jpg', 1),
(23, 4, 'firstname22', 'lastname22', '2000-01-01', 'img22.jpg', 9),
(24, 1, 'firstname23', 'lastname23', '2000-01-01', 'img23.jpg', 6),
(25, 4, 'firstname24', 'lastname24', '2000-01-01', 'img24.jpg', 1),
(26, 3, 'firstname25', 'lastname25', '2000-01-01', 'img25.jpg', 9),
(27, 3, 'firstname26', 'lastname26', '2000-01-01', 'img26.jpg', 4),
(28, 5, 'firstname27', 'lastname27', '2000-01-01', 'img27.jpg', 4),
(29, 1, 'firstname28', 'lastname28', '2000-01-01', 'img28.jpg', 6),
(30, 2, 'firstname29', 'lastname29', '2000-01-01', 'img29.jpg', 4),
(31, 3, 'firstname30', 'lastname30', '2000-01-01', 'img30.jpg', 10),
(32, 4, 'firstname31', 'lastname31', '2000-01-01', 'img31.jpg', 5),
(33, 5, 'firstname32', 'lastname32', '2000-01-01', 'img32.jpg', 8),
(34, 2, 'firstname33', 'lastname33', '2000-01-01', 'img33.jpg', 5),
(35, 2, 'firstname34', 'lastname34', '2000-01-01', 'img34.jpg', 4),
(36, 5, 'firstname35', 'lastname35', '2000-01-01', 'img35.jpg', 2),
(37, 5, 'firstname36', 'lastname36', '2000-01-01', 'img36.jpg', 7),
(38, 5, 'firstname37', 'lastname37', '2000-01-01', 'img37.jpg', 6),
(39, 1, 'firstname38', 'lastname38', '2000-01-01', 'img38.jpg', 10),
(40, 1, 'firstname39', 'lastname39', '2000-01-01', 'img39.jpg', 5),
(41, 5, 'firstname40', 'lastname40', '2000-01-01', 'img40.jpg', 8),
(42, 1, 'firstname41', 'lastname41', '2000-01-01', 'img41.jpg', 1),
(43, 2, 'firstname42', 'lastname42', '2000-01-01', 'img42.jpg', 4),
(44, 1, 'firstname43', 'lastname43', '2000-01-01', 'img43.jpg', 5),
(45, 5, 'firstname44', 'lastname44', '2000-01-01', 'img44.jpg', 4),
(46, 1, 'firstname45', 'lastname45', '2000-01-01', 'img45.jpg', 4),
(47, 5, 'firstname46', 'lastname46', '2000-01-01', 'img46.jpg', 11),
(48, 2, 'firstname47', 'lastname47', '2000-01-01', 'img47.jpg', 2),
(49, 1, 'firstname48', 'lastname48', '2000-01-01', 'img48.jpg', 5),
(50, 2, 'firstname49', 'lastname49', '2000-01-01', 'img49.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `name`) VALUES
(1, 'team0'),
(2, 'team1'),
(3, 'team2'),
(4, 'team3'),
(5, 'team4');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_98197A65296CD8AE` (`team_id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_98197A65296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
