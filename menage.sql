-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 juil. 2021 à 11:11
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `menage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotisations`
--

DROP TABLE IF EXISTS `cotisations`;
CREATE TABLE IF NOT EXISTS `cotisations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_chef` int(11) NOT NULL,
  `mois` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_paiement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cotisations`
--

INSERT INTO `cotisations` (`id`, `id_chef`, `mois`, `annee`, `montant`, `date_de_paiement`, `created_at`, `updated_at`) VALUES
(1, 1, 'Juillet', '2021', '25000', '2021-07-22', '2021-07-22 10:33:58', '2021-07-22 10:33:58'),
(2, 1, 'Aout', '2021', '3000', '2021-07-23', '2021-07-22 10:35:39', '2021-07-22 10:35:39'),
(3, 2, 'Aout', '2021', '55000', '2021-07-22', '2021-07-22 10:44:01', '2021-07-22 10:44:01');

-- --------------------------------------------------------

--
-- Structure de la table `descendents`
--

DROP TABLE IF EXISTS `descendents`;
CREATE TABLE IF NOT EXISTS `descendents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ChefM_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Noms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenoms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sexe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `descendents`
--

INSERT INTO `descendents` (`id`, `ChefM_id`, `Noms`, `Prenoms`, `Type`, `Sexe`, `DateN`, `statut`, `created_at`, `updated_at`) VALUES
(1, '1', 'RAFETRARIVO', 'Fehizoro', 'enfant', 'homme', '2003-07-22', 'majeur', '2021-07-22 11:05:02', '2021-07-22 11:05:43');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menages`
--

DROP TABLE IF EXISTS `menages`;
CREATE TABLE IF NOT EXISTS `menages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Noms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenoms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sexe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateN` date NOT NULL,
  `Origine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menages`
--

INSERT INTO `menages` (`id`, `Noms`, `Prenoms`, `Sexe`, `DateN`, `Origine`, `Fonction`, `created_at`, `updated_at`) VALUES
(1, 'RANDRIAMAMPANDRY', 'Rainilaiarivo', 'homme', '1989-05-03', 'Avaradoha', 'Poète', '2021-07-22 10:01:55', '2021-07-22 10:01:55'),
(2, 'RAJAONARIVO NARY', 'Safidy Mahafaly', 'homme', '1997-05-08', 'Ambohimangakely', 'Fonctionnaire', '2021-07-22 10:43:12', '2021-07-22 10:43:12');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2019_08_19_000000_create_failed_jobs_table', 1),
(48, '2021_02_04_091957_laratrust_setup_tables', 1),
(49, '2021_06_24_065015_creation_table_chef_menage', 1),
(50, '2021_06_29_052332_create_tables_descendents', 1),
(51, '2021_07_07_141343_create_notifications_table', 1),
(52, '2021_07_22_094627_creation_table_cotisation', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descendent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pas_encore_vue',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `descendent_id`, `etat`, `created_at`, `updated_at`) VALUES
(1, '1', 'vue', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-07-22 09:32:56', '2021-07-22 09:32:56');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(2, 'blogwriter', 'Blogwriter', 'Blogwriter', '2021-07-22 09:32:56', '2021-07-22 09:32:56'),
(3, 'user', 'User', 'User', '2021-07-22 09:32:56', '2021-07-22 09:32:56');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zaiomeny', 'zaiomenyfanampimahafaly@gmail.com', NULL, '$2y$10$SAtvc42l8qfPxUx.DZmlW.l2BdgaTpMU.BMdovQmowUM9R6TJFjji', NULL, '2021-07-22 09:33:36', '2021-07-22 09:33:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
