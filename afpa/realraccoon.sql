-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 avr. 2023 à 11:20
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `realraccoon`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibilite_id` bigint UNSIGNED NOT NULL,
  `etat_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'non publié', NULL, NULL, NULL),
(2, 'publié', NULL, NULL, NULL),
(3, 'archivé', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibilite_id` bigint UNSIGNED NOT NULL,
  `etat_id` bigint UNSIGNED NOT NULL,
  `template_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `slug`, `resume`, `contenu`, `created_at`, `updated_at`, `deleted_at`, `visibilite_id`, `etat_id`, `template_id`) VALUES
(1, 'qsdqsqsdeeeeeeeee', 'qsdqsqsdeeeeeeeee', 'dqsdqsdeee', '<p>qsdqsdazeazeazzzzzzzzzzzzzz</p>', '2023-04-10 07:40:10', '2023-04-10 07:40:41', '2023-04-10 07:40:41', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `positionnement` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `evenement_id` bigint UNSIGNED NOT NULL,
  `type_media_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `titre`, `chemin`, `positionnement`, `created_at`, `updated_at`, `deleted_at`, `evenement_id`, `type_media_id`) VALUES
(1, 'image', '/storage/imagesEvenement/Weu6RFKivia84aSqrGZ4AeU2uDadkeHsyUUK6Qdi.png', 2, '2023-04-10 07:40:11', '2023-04-10 07:40:35', '2023-04-10 07:40:35', 1, 2),
(2, 'image', 'nYqeHIRKboM', 1, '2023-04-10 07:40:11', '2023-04-10 07:40:35', '2023-04-10 07:40:35', 1, 1),
(3, 'image', 'https://www.youtube.com/embed/nYqeHIRKboM', 1, '2023-04-10 07:40:25', '2023-04-10 07:40:35', '2023-04-10 07:40:35', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `meteos`
--

CREATE TABLE `meteos` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibilite_id` bigint UNSIGNED NOT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_02_065252_create_etats_table', 1),
(3, '2023_04_03_065144_create_visibilites_table', 1),
(4, '2023_04_04_163304_create_meteos_table', 1),
(5, '2023_04_06_065403_create_articles_table', 1),
(6, '2023_04_06_065522_create_reglements_table', 1),
(7, '2023_04_06_065823_create_note_de_services_table', 1),
(8, '2023_04_06_070000_create_templates_table', 1),
(9, '2023_04_06_070001create_type_medias_table', 1),
(10, '2023_04_06_070013_create_evenements_table', 1),
(11, '2023_04_06_070014_create_medias_table', 1),
(12, '2023_04_06_070706_create_utilisateurs_table', 1),
(13, '2023_04_06_071336_create_roles_table', 1),
(14, '2023_04_06_071430_create_permissions_table', 1),
(15, '2023_04_06_071525_create_permission_role_table', 1),
(16, '2023_04_06_071631_create_role_utilisateur_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `note_de_services`
--

CREATE TABLE `note_de_services` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` blob NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibilite_id` bigint UNSIGNED NOT NULL,
  `etat_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `nom`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superAdmin', 'admin/mainAdmin', NULL, NULL, NULL),
(2, 'Admin evenement  ', 'admin/evenement', NULL, NULL, NULL),
(3, 'Admin Meteo', 'admin/meteo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`id`, `created_at`, `updated_at`, `deleted_at`, `permission_id`, `role_id`) VALUES
(1, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

CREATE TABLE `reglements` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibilite_id` bigint UNSIGNED NOT NULL,
  `etat_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, NULL),
(2, 'Admin Evenement', NULL, NULL, NULL),
(3, 'Admin Meteo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_utilisateur`
--

CREATE TABLE `role_utilisateur` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `utilisateur_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_utilisateur`
--

INSERT INTO `role_utilisateur` (`id`, `created_at`, `updated_at`, `deleted_at`, `role_id`, `utilisateur_id`) VALUES
(1, NULL, NULL, NULL, 1, 1),
(2, NULL, NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `templates`
--

CREATE TABLE `templates` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `templates`
--

INSERT INTO `templates` (`id`, `nom`, `preview`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Image / Vidéo', '/storage/imagesEvenement/preview 1.png', NULL, NULL, NULL),
(2, 'Video / Image', '/storage/imagesEvenement/preview 2.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_medias`
--

CREATE TABLE `type_medias` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_medias`
--

INSERT INTO `type_medias` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'video', NULL, NULL, NULL),
(2, 'image', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'OneTrueKing', 'velwitch@gmail.com', NULL, '$2y$10$3Naz0mFxFFqocS07Nr7pqeqLS2YVdvwlP01zCFAIgoSS1cGRz2qV6', NULL, '2023-04-10 07:23:49', '2023-04-10 07:23:49'),
(2, 'guest', 'phil.pynson@gmail.com', NULL, '$2y$10$.G37ChHfRdZsXYKTOXMBWeRQTUSnB4k8TrZTsGwte4DPrpxukj5VG', NULL, '2023-04-10 07:43:10', '2023-04-10 07:43:10'),
(3, 'Admin', 'velwitch7@gmail.com', NULL, '$2y$10$qmXtdHMcLpTjfgEbIkn3h.Cf70Iw61gI.9RxTi7LO9aDxivSkRMba', NULL, '2023-04-10 08:22:19', '2023-04-10 08:22:19');

-- --------------------------------------------------------

--
-- Structure de la table `visibilites`
--

CREATE TABLE `visibilites` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visibilites`
--

INSERT INTO `visibilites` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'confidentiel', NULL, NULL, NULL),
(2, 'protégé', NULL, NULL, NULL),
(3, 'visible', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_visibilite_id_foreign` (`visibilite_id`),
  ADD KEY `articles_etat_id_foreign` (`etat_id`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenements_visibilite_id_foreign` (`visibilite_id`),
  ADD KEY `evenements_etat_id_foreign` (`etat_id`),
  ADD KEY `evenements_template_id_foreign` (`template_id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medias_evenement_id_foreign` (`evenement_id`),
  ADD KEY `medias_type_media_id_foreign` (`type_media_id`);

--
-- Index pour la table `meteos`
--
ALTER TABLE `meteos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meteos_visibilite_id_foreign` (`visibilite_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note_de_services`
--
ALTER TABLE `note_de_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_de_services_visibilite_id_foreign` (`visibilite_id`),
  ADD KEY `note_de_services_etat_id_foreign` (`etat_id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reglements_visibilite_id_foreign` (`visibilite_id`),
  ADD KEY `reglements_etat_id_foreign` (`etat_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_utilisateur_role_id_foreign` (`role_id`),
  ADD KEY `role_utilisateur_utilisateur_id_foreign` (`utilisateur_id`);

--
-- Index pour la table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_medias`
--
ALTER TABLE `type_medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visibilites`
--
ALTER TABLE `visibilites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `meteos`
--
ALTER TABLE `meteos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `note_de_services`
--
ALTER TABLE `note_de_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_medias`
--
ALTER TABLE `type_medias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `visibilites`
--
ALTER TABLE `visibilites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_visibilite_id_foreign` FOREIGN KEY (`visibilite_id`) REFERENCES `visibilites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evenements_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evenements_visibilite_id_foreign` FOREIGN KEY (`visibilite_id`) REFERENCES `visibilites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medias_type_media_id_foreign` FOREIGN KEY (`type_media_id`) REFERENCES `type_medias` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `meteos`
--
ALTER TABLE `meteos`
  ADD CONSTRAINT `meteos_visibilite_id_foreign` FOREIGN KEY (`visibilite_id`) REFERENCES `visibilites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note_de_services`
--
ALTER TABLE `note_de_services`
  ADD CONSTRAINT `note_de_services_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `note_de_services_visibilite_id_foreign` FOREIGN KEY (`visibilite_id`) REFERENCES `visibilites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD CONSTRAINT `reglements_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reglements_visibilite_id_foreign` FOREIGN KEY (`visibilite_id`) REFERENCES `visibilites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD CONSTRAINT `role_utilisateur_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_utilisateur_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
