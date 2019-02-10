-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 10 fév. 2019 à 11:46
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `le_potager_de_roger`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type`) VALUES
(1, 'Fruits'),
(2, 'Légumes'),
(3, 'Produits Laitiers'),
(4, 'Boissons'),
(5, 'Céréales'),
(6, 'Champignons');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `url_photo` varchar(5) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `url_photo`, `commentaire`, `date_creation`, `id_user`) VALUES
(1, 'toto', 'Je donne des fraises et des carottes', '2019-02-04', 1),
(2, 'xx', 'Bonjour, je donne des morilles, du blé et des coings', '2019-02-01', 2),
(3, 'xx', 'Je donne des pommes', '2019-02-02', 3),
(4, 'xx', 'Je souhaite donner des navets', '2019-01-17', 4),
(5, 'xx', 'Je fais don de mon surplus de Cerises', '2019-02-10', 5),
(6, 'xx', 'Je donne des poires', '2019-02-08', 6),
(7, 'xx', 'Je donnes des choux', '2019-02-09', 7),
(8, 'xx', 'Je donnes des petits pois et des champignons de paris', '2019-02-10', 8),
(9, 'xx', 'Je donne des prunes', '2019-01-31', 9),
(10, 'xx', 'J\'offre des trompettes de la mort, j\'en ai trop', '2019-02-10', 10),
(11, 'xx', 'Je donne du comté', '2019-02-06', 11),
(12, 'xx', 'Je donne des pommes de mon jardin,je recherche des champignons', '2019-02-06', 12),
(13, 'xx', 'Je donne des pommes de terre', '2019-02-02', 13),
(14, 'xx', 'Je donne les tomates de mon jardin', '2019-02-06', 14),
(15, 'xx', 'Je donne de l\'avoine et je cherche des pommes de terre', '2019-02-08', 15),
(16, 'xx', 'Je fais don de salades', '2019-02-09', 16),
(17, 'xx', 'Je donne des carottes', '2019-02-04', 17),
(18, 'xx', 'Je fais don des abricots de mon jardin', '2019-02-10', 18),
(19, 'xx', 'Je donne des artichauds', '2019-02-03', 19),
(20, 'xx', 'Je donne du beurre', '2019-02-09', 20),
(21, 'xx', 'j\'offre les noix de mon jardin', '2019-02-04', 21),
(22, 'xx', 'Je fais don de navets', '2019-02-07', 22),
(23, 'xx', 'Je donne des mirabelles et je cherche du choux', '2019-02-09', 23),
(24, 'xx', 'Je donne du jus de pommes de mon jardin', '2019-01-25', 24),
(25, 'xx', 'Je donne de l\'huile de noix de mon jardin', '2019-01-22', 25),
(26, 'xx', 'J\'offre des framboises', '2019-02-01', 26),
(27, 'xx', 'Je fais don des tomates de notre jardin', '2019-02-10', 27),
(28, 'xx', 'Je donne du blé', '2019-01-13', 28),
(29, 'xx', 'J\'offre des champignons', '2019-01-25', 29),
(30, 'xx', 'Je fais don de pommes de terre', '2019-01-29', 30),
(31, 'xx', 'Je donne des oignons', '2019-02-02', 31),
(32, 'xx', 'Je donne du jus de carottes de mon potager', '2019-01-08', 32),
(33, 'xx', 'Je donne de l\'avoine et je recherche des fruits', '2019-01-12', 33),
(34, 'xx', 'Je fais don des courgettes de mon potager, je recherche des pommes de terre', '2019-02-01', 34),
(35, 'xx', 'Je donne des cerises', '2019-02-07', 35);

-- --------------------------------------------------------

--
-- Structure de la table `offres_categories`
--

CREATE TABLE `offres_categories` (
  `id_offre` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offres_categories`
--

INSERT INTO `offres_categories` (`id_offre`, `id_categorie`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 5),
(2, 6),
(3, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(8, 6),
(9, 1),
(10, 6),
(11, 3),
(12, 1),
(13, 2),
(14, 2),
(15, 5),
(16, 2),
(17, 2),
(18, 1),
(19, 2),
(20, 3),
(21, 1),
(22, 2),
(23, 1),
(24, 4),
(25, 5),
(26, 1),
(27, 2),
(28, 5),
(29, 6),
(30, 2),
(31, 2),
(32, 4),
(33, 5),
(34, 2),
(35, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` smallint(6) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `adresse`, `code_postal`, `commune`, `statut`, `latitude`, `longitude`) VALUES
(1, 'ahadach', 'youness', '10 du Praley', 70, 'Haute-Saône', NULL, 47.611218, 6.170411),
(2, 'Thorez', 'Yohann', '5 rue du Praley', 70, 'H-S', NULL, 47.620706, 6.119174),
(3, 'Doe', 'John', '10 rue de Vesoul', 70, 'H-S', NULL, 47.583636, 6.040764),
(4, 'Dupont', 'Louis', '4 rue de Vesoul', 70, 'H-S', NULL, 47.600457, 6.318684),
(5, 'Dupont', 'Marie', '16 rue du Troc', 70, 'HS', NULL, 47.548343, 6.287785),
(6, 'Proviste', 'Alain', '20 rue du stade', 70, 'HS', NULL, 47.509862, 6.197491),
(7, 'Mathieu', 'Marie', '34 place du troc', 70, 'HS', NULL, 47.682113, 6.168652),
(8, 'Dupont', 'Isabelle', '45 rue de Vesoul', 70, 'HS', NULL, 47.708687, 6.078014),
(9, 'Dumont', 'Herve', '12 faubourg Tarragnoz', 70, 'HS', NULL, 47.6526, 6.057243),
(10, 'Bouton', 'Adrien', '40 rue du troc', 70, 'HS', NULL, 47.542561, 6.034927),
(11, 'Michelle', 'Eva', '33 place du fruit', 70, 'HS', NULL, 47.457658, 6.139469),
(12, 'Dujardin', 'Alphonse', '3 rue du pré', 70, 'HS', NULL, 47.500585, 6.172771),
(13, 'Dupré', 'Louis', '45 rue du jardin', 70, 'HS', NULL, 47.530497, 6.273365),
(14, 'Lapelouse', 'Vincent', '34 place du troc', 70, 'HS', NULL, 47.592817, 6.190281),
(15, 'Dufour', 'Arthur', '76 place du troc', 70, 'hs', NULL, 47.680807, 6.263924),
(16, 'robin', 'Louise', '44 place du stade', 70, 'HS', NULL, 47.643267, 6.151142),
(17, 'Avan', 'Luc', '2 faubourg rivotte', 70, 'hs', NULL, 47.683962, 6.323147),
(18, 'Lavalle', 'Marc', '10 rue du Praley', 70, 'HS', NULL, 47.628461, 6.034756),
(19, 'Avant', 'Michael', '90 rue du Praley', 70, 'hs', NULL, 47.637021, 6.167965),
(20, 'Persil', 'Luc', '3 rue du troc', 70, 'hs', NULL, 47.543245, 6.250019),
(21, 'Pelouse', 'Arnaud', '49 place du jardin', 70, 'hs', NULL, 47.483882, 6.228046),
(22, 'Damien', 'Damien', '30 place du jardin', 70, 'HS', NULL, 47.646274, 6.155605),
(23, 'Anice', 'Christian', '3 faubourg rivotte', 70, 'HS', NULL, 47.620825, 6.195774),
(24, 'Michelin', 'Benoit', '9 place du jardin', 70, 'HS', NULL, 47.673791, 6.337223),
(25, 'Mouche', 'violette', '4 place du praley', 70, 'HS', NULL, 47.734094, 6.307697),
(26, 'Bolognaise', 'Adrien', '3 avenue du pré', 70, 'hs', NULL, 47.688585, 6.112347),
(27, 'Michele', 'Marise', '4 place du pré', 70, 'hs', NULL, 47.678877, 5.941715),
(28, 'Mie', 'Coralie', '4 rue de la chance', 70, 'hs', NULL, 47.645118, 5.935879),
(29, 'Martin', 'Martin', '98 avenue de la pelouse', 70, 'hs', NULL, 47.612725, 5.87923),
(30, 'Malou', 'Eddy', '7 avenue d\'europe', 70, 'hs', NULL, 47.633088, 5.968838),
(31, 'Tintin', 'Chloe', '44 rue du troc', 70, 'hs', NULL, 47.540464, 5.844898),
(32, 'Bond', 'James', '19 place du jardin', 70, 'hs', NULL, 47.584944, 5.974674),
(33, 'Bois', 'Lucas', '92 rue de paris', 70, 'HS', NULL, 47.56294, 6.028919),
(34, 'Amali', 'Martine', '45 rue de paris', 70, 'hs', NULL, 47.506151, 6.084881),
(35, 'Lebon', 'Christophe', '20 place de paris', 70, 'hs', NULL, 47.694131, 6.210537);

-- --------------------------------------------------------

--
-- Structure de la table `users_offres`
--

CREATE TABLE `users_offres` (
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_offres`
--

INSERT INTO `users_offres` (`id_offre`, `id_user`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`),
  ADD UNIQUE KEY `offres_AK` (`id_user`);

--
-- Index pour la table `offres_categories`
--
ALTER TABLE `offres_categories`
  ADD PRIMARY KEY (`id_offre`,`id_categorie`),
  ADD KEY `offres_categories_categories0_FK` (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users_offres`
--
ALTER TABLE `users_offres`
  ADD PRIMARY KEY (`id_offre`,`id_user`),
  ADD KEY `users_offres_users0_FK` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offres_categories`
--
ALTER TABLE `offres_categories`
  ADD CONSTRAINT `offres_categories_categories0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `offres_categories_offres_FK` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`);

--
-- Contraintes pour la table `users_offres`
--
ALTER TABLE `users_offres`
  ADD CONSTRAINT `users_offres_offres_FK` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`),
  ADD CONSTRAINT `users_offres_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
