-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 juin 2023 à 07:09
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
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produits` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `descriptions` text,
  `img` varchar(255) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `avis` text,
  `prix` float DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produits`, `titre`, `descriptions`, `img`, `dates`, `avis`, `prix`, `id_categories`) VALUES
(1, 'Tartare avocat et saumon', 'Coupez les avocats en deux, retirez le noyau et detaillez la chair en des. Arrosez avec  cuillere a soupe de jus de citron, salez, poivrez et melangez.', 'https://cdn.api.groupe-pomona.fr/public/recipes/0000077/branch/ta/medias/tartare-de-saumon-a-l-avocat-oignons-et-citron_0000077-ta_main.png?l=690093', NULL, NULL, NULL, NULL),
(2, 'Omelette roulee aux herbes et tomates', 'Rincez la tomate puis coupez-la en des. Lavez et ciselez le persil. Pelez et emincez loignon. Dans un saladier, fouettez les œufs en omelette avec un peu de sel et de poivre.', 'https://i0.wp.com/www.mesinspirationsculinaires.com/wp-content/uploads/2015/08/omelette-roulee10.jpg?fit=550%2C412&ssl=1', NULL, NULL, NULL, NULL),
(3, 'Verrine a la confiture de lait', 'Detendez la confiture de lait a la fourchette et incorporez délicatement les 2 tiers de la chantilly.', 'https://www.assiettesgourmandes.fr/wp-content/uploads/2012/12/confiture-lait-1.jpg', NULL, NULL, NULL, NULL),
(4, 'Croque-monsieur a l ail', 'Coupez les tranches de jambon blanc en 4. Coupez les tranches de fromage en 2', 'https://capipiou.files.wordpress.com/2021/04/croque-monsieur-au-caviar-daubergine-a-lail-des-ours-et-au-poulet.jpg', NULL, NULL, NULL, NULL),
(5, 'tarte', 'Pate de tarte aux fraises', 'https://www.lesfoodies.com/_recipeimage/170209/tartare-de-fraises-au-basilic.jpg', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produits`),
  ADD KEY `produits_ibfk_1` (`id_categories`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
