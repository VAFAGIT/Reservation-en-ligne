-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 mars 2022 à 14:21
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wafaair`
--

-- --------------------------------------------------------

--
-- Structure de la table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `fro_m` varchar(200) NOT NULL,
  `city_to` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `arrive_time` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `seats_number` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `flights`
--

INSERT INTO `flights` (`id`, `fro_m`, `city_to`, `date_time`, `arrive_time`, `price`, `seats_number`, `status`) VALUES
(9, 'NICE', 'marrakech', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 436, 35, 1),
(10, 'tanger', 'laayoun', '2021-05-26 20:13:00', '2021-05-26 23:17:00', 567, 36, 1),
(13, 'safi', 'eljadida', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3450, 66, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_flight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_user`, `id_flight`) VALUES
(36, 88, 13),
(38, 88, 10),
(41, 88, 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`) VALUES
(53, 'rrr', 'rrr', '$2y$12$St9q3bHROrZTJc8.7LwFPOs/1KaKvO8G.D96m4krzuAaApRPoXOqG', 'user'),
(83, 'uuu', 'uuu', '$2y$12$ZVjJLjE3AcMQfenDUTGBYeph0XBCBnoOp8m6QqjwEgZmevrSdRz4K', 'user'),
(84, 'mmm', 'mmm', '$2y$12$dmEcgKzTRyGyYFBc6G3QFO0OH2lIjaYbzfn0eGVv1W0oTKhQFSDny', 'user'),
(86, 'wafae', 'waf', 'J123', 'admin'),
(87, 'lou', 'main', '$2y$12$WvnDlJkwyKtMrSTx1J2J3.CEFTgG9QW59ea6thCT7.dAW6z1m7AUK', 'admin'),
(88, 'manalsd', 'manal', '$2y$12$W0M8oBqewd.2n1eGsGYg9evZrThnpRBnNfSiuGR7KxaxewE0H/dky', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_flight` (`id_flight`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_value` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_flight`) REFERENCES `flights` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
