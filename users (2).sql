-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 jan. 2024 à 15:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_perso`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `genre` tinyint(1) NOT NULL DEFAULT 1,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `genre`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 1, 'haddaoui', 'zakariazakaria', 'bruno@gmail.com', '$2y$10$COyHf6X./QhuofknEY8mYOLaEY4qRphTWBd.B.mdqZPhF0uFIJj7G'),
(2, 1, 'haddaoui', 'zakaria', 'zakaria@gmail.com', '$2y$10$GXDEZFZumng3FjUlUMINAe9pz39SU/QXnwWdY/GNccjUW6rCEWYJW'),
(3, 1, 'omer', 'atici', 'omer@gmail.com', '$2y$10$uMx6vldEEHpwGhZzeMIh4u8Ue2KOCcKQG8iT/CGwuxm8VugWOuPRC'),
(4, 1, 'haddaouihaddaoui', 'zakariazakaria', 'zakaria1@gmail.com', '$2y$10$jMso5orn05MfairxvtXzFeBJYowHAUojilTiRx/GbIcill.JeKBNK'),
(5, 1, 'haddaouihaddaoui', 'zakariazakaria', 'zakaria2@gmail.com', '$2y$10$zbJ/4I49ASVMVNqKry5rkuACIh1wty.oz0FinE5bHtg9GWuiSdizW'),
(6, 1, 'haddaouihaddaoui', 'zakariazakaria', 'zakaria3@gmail.com', '$2y$10$208vxAvxV70FYyDFXBPei.P8vbpj.4kMO0J6.7GZbR.R.g6R/2yqK'),
(7, 1, 'haddaoui', 'zakariazakaria', 'zakaria4@gmail.com', '$2y$10$kG9CoGOJ7sTYwO3OdEOOyObLyAqTjGG58CmNVmIXagKJtpbQL.v1m'),
(8, 1, 'haddaouihaddaoui', 'zakariazakaria', 'zakaria5@gmail.com', '$2y$10$AU6Pm2X33h6urydOjhu6BOOTWZG5Y/SHmS3Tqrq1FoMQXisV8iz42'),
(9, 1, 'haddaouihaddaoui', 'zakariazakaria', 'zakaria8@gmail.com', '$2y$10$lTJffVyXvBc0t0a9dAKQNO8hA2O8wK6ibHWNbnsswZjpJ8GV116K.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
