-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 juin 2020 à 07:17
-- Version du serveur :  10.4.11-MariaDB
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
-- Base de données : `librairie_et_livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `isbn` bigint(13) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annéePublication` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`isbn`, `titre`, `annéePublication`) VALUES
(1234567890123, 'Hunter x Hunter - 1', 2000),
(9780340509111, 'The Dark Half', 1989),
(9782811206918, 'Ravens - 1 - AubeMort', 1999),
(9782845994058, 'king of Bandit Jing - 5', 2001),
(9782845994249, 'King of Bandit Jing - 6', 2001),
(9782894354308, 'Luna - 1 - La cité maudite', 2009);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurdemandes`
--

CREATE TABLE `utilisateurdemandes` (
  `id` int(9) NOT NULL,
  `utilisateur_id` int(9) NOT NULL,
  `livre_isbn` bigint(13) NOT NULL,
  `date_demande` date NOT NULL,
  `date_location` date NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurdemandes`
--

INSERT INTO `utilisateurdemandes` (`id`, `utilisateur_id`, `livre_isbn`, `date_demande`, `date_location`, `details`) VALUES
(42, 2, 1234567890123, '2020-05-27', '2020-05-30', '3 semaine'),
(43, 1, 1234567890123, '2020-05-27', '2020-09-15', '1 semaine'),
(48, 2, 1234567890123, '2020-05-28', '2020-06-06', ''),
(50, 1, 1234567890123, '2020-05-31', '2020-06-04', 'essai1.1'),
(51, 1, 1234567890123, '2020-05-31', '2020-06-04', 'essai1.1'),
(52, 1, 1234567890123, '2020-05-31', '2020-06-04', 'essai1.1'),
(59, 1, 1234567890123, '2020-05-31', '2020-06-04', '2 semaines'),
(62, 1, 9782845994058, '2020-05-31', '2020-06-04', 'REUSSI'),
(63, 1, 9782845994058, '2020-05-31', '2020-05-20', 'réussi');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(9) NOT NULL,
  `genre` char(1) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `téléphone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `genre`, `prénom`, `nom`, `téléphone`, `email`, `identifiant`, `mot_de_passe`) VALUES
(1, 'm', 'Alexis', 'Archambault', '524-456-6789', 'alexis@archambault.com', 'AlexisA', 'ArchambaultA'),
(2, 'm', 'André', 'Pilon', '524-687-4364', 'Andre@Pilon.com', 'AndreP', 'PilonA'),
(3, '', 'admin', 'admin', '', '', 'Admin', 'AdminMDP'),
(4, 'f', 'Anabelle', 'Laroche', '514-765-2466', 'Anabelle@laroche.com', 'anabanana', 'ananas');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`isbn`);

--
-- Index pour la table `utilisateurdemandes`
--
ALTER TABLE `utilisateurdemandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `livre_isbn` (`livre_isbn`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurdemandes`
--
ALTER TABLE `utilisateurdemandes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateurdemandes`
--
ALTER TABLE `utilisateurdemandes`
  ADD CONSTRAINT `utilisateurdemandes_ibfk_1` FOREIGN KEY (`livre_isbn`) REFERENCES `livres` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateurdemandes_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
