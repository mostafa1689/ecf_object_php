-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 juin 2023 à 07:10
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nitrocol`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `titres` varchar(255) DEFAULT NULL,
  `emballages` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `titres`, `emballages`, `img`, `dates`, `prix`) VALUES
(1, 'Tarte', 'Sachets en plastique', 'https://www.lesfoodies.com/_recipeimage/170209/tartare-de-fraises-au-basilic.jpg', NULL, NULL),
(2, 'Confiture', 'Bocaux en verre :', 'https://cdn.api.groupe-pomona.fr/public/recipes/0000077/branch/ta/medias/tartare-de-saumon-a-l-avocat-oignons-et-citron_0000077-ta_main.png?l=690093', NULL, NULL),
(3, 'Omelette', 'Boîtes en carton', 'https://i0.wp.com/www.mesinspirationsculinaires.com/wp-content/uploads/2015/08/omelette-roulee10.jpg?fit=550%2C412&ssl=1', NULL, NULL),
(4, 'test', 're', 'reg', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
