-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 août 2023 à 21:46
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mfsymfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animes`
--

DROP TABLE IF EXISTS `animes`;
CREATE TABLE IF NOT EXISTS `animes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_anime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis_anime` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `coup_coeur` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `animes`
--

INSERT INTO `animes` (`id`, `title_anime`, `image_anime`, `synopsis_anime`, `created_at`, `updated_at`, `coup_coeur`) VALUES
(1, 'Assassination Classroom', 'https://media.senscritique.com/media/000010014381/1200/assassination_classroom.jpg', 'Assassination Classroom, de son nom original Ansatsu kyōshitsu (暗殺教室), est un manga shônen écrit et dessiné par Yûsei Matsui. Le manga a été pré-publié de juillet 2012 à mars 2016 dans le Weekly Shônen Jump, et a été compilé en un total de 21 tomes aux couvertures délirantes. Le manga a été adapté en anime dès 2015, pour deux saisons et un total de 47 épisodes. Il aura aussi eu deux OAV ainsi que deux films Live. En France, Assassination Classroom est édité par Kana.', '2022-10-02 22:57:52', NULL, NULL),
(2, 'Code Geass : Lelouch of the Rebellion', 'https://www.mangasfan.fr/hebergeur/uploads/1644170790.jpeg', 'A l\'époque Edo, les samurai étaient respectés de tous, mais la venue des Amanto (aliens) a entraîné la déchéance des samurai avec l\'interdiction du port de l\'épée. Mais un jeune garçon du nom de Sataka Gintoki décide de vivre à sa manière en devenant un free-lancer (personne qui accepte des petits boulots pour rendre service). Accompagné de ses deux amis Kagura et Shinpachi, ils vivent et se battent en tant que hors-la-loi.', '2022-10-02 22:58:22', NULL, 1),
(3, 'Dragon Ball Super', 'https://thumb.canalplus.pro/http/unsafe/1280x720/filters:quality(80)/img-hapi.canalplus.pro:80/ServiceImage/ImageID/58608274', NULL, '2022-10-02 22:58:38', NULL, NULL),
(4, 'Démon Slayer', 'https://www.cnet.com/a/img/resize/94f246061e4f6c49d00e1285dfbda9262145eaf7/hub/2021/05/03/bd37964d-fe5c-4574-9df3-1986e0bf5050/demon-slayer-mugen-train-1239731.jpg?auto=webp&fit=crop&height=675&width=1200', NULL, '2022-10-02 22:58:50', NULL, NULL),
(5, 'Parasyte', 'https://topdata.news/wp-content/uploads/2021/02/10-Anime-You-Must-Watch-if-You-Love-Parasyte-en-anglais-kzWD1Kv5k-1.jpg', 'Parasite (ou Kiseiju, 寄生獣) est un manga que l\'on peut qualifier de vieux : il fut prépublié de 1988 à 1994 dans deux magazines de prépublication. Tout d\'abord le Morning Open Shukan puis dans le magazine Afternoon. Parasite a été écrit et dessiné par Hitoshi Iwaaki. Il possède un total de 10 tomes reliés, tous disponibles en France. Parasite a été adapté en anime en 2014, pour réunir 24 épisodes.', '2022-10-02 22:58:59', NULL, NULL),
(6, 'Seven Deadly Sins', 'https://static.bandainamcoent.eu/high/seven-deadly-sins/seven-deadly-sins/00-page-setup/sds_game-thumbnail.jpg', 'The Seven Deadly Sins est un shōnen manga écrit et déssiné par Nakaba Suzuki et publié en 2012 par le très célèbre Weekly Shōnen Magazine. Le manga est toujours en cours d\'écriture et en ce qui concerne l\'animé, sa première diffusion remonte 5 Octobre 2014 et s\'est arrêté pour le moment au 29 Mars 2015 avec deux  films sortient tous deux en 2018 et 2019. Le manga est déjà vendu à plus de 10 millions d\'exemplaires et a été sacré en 2015, au même titre que le très célèbre En selle, Sakamichi, le prix du manga Kōdansha dans la catégorie shōnen.', '2022-10-02 22:59:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articles_anime`
--

DROP TABLE IF EXISTS `articles_anime`;
CREATE TABLE IF NOT EXISTS `articles_anime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_anime_id` int NOT NULL,
  `title_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FBE671B62990521C` (`id_anime_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles_anime`
--

INSERT INTO `articles_anime` (`id`, `id_anime_id`, `title_article`, `cover_article`, `created_at`, `updated_at`) VALUES
(1, 1, 'Koro-sensei', 'https://www.mangasfan.fr/hebergeur/uploads/1594756707.jpeg', '2022-10-03 21:41:59', NULL),
(2, 1, 'Nagisa Shiota', 'https://www.mangasfan.fr/hebergeur/uploads/1598811584.jpeg', '2022-10-03 21:42:13', NULL),
(3, 1, 'Gâkuho Asano', 'https://www.mangasfan.fr/hebergeur/uploads/1599163244.jpeg', '2022-10-03 21:42:27', NULL),
(4, 1, 'Irina Poufanovitch', 'https://www.mangasfan.fr/hebergeur/uploads/1599164161.jpeg', '2022-10-03 21:42:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `color`) VALUES
(1, 'Animes', 'animes', '#6b04d2'),
(2, 'Mangas', 'mangas', '#1701c1'),
(3, 'Évenement', 'evenement', '#df11b9'),
(4, 'Site', 'site', '#e7b913'),
(5, 'Divers', 'divers', '#5b8a15');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `news_id` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962AB5A459A0` (`news_id`),
  KEY `IDX_5F9E962AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230817211754', '2023-08-17 21:19:10', 3708),
('DoctrineMigrations\\Version20230817212702', '2023-08-17 21:27:14', 2311);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `alt_text`, `filename`) VALUES
(1, 'Tsuki to Laika to Nosferatu - News', 'Image de présentation de Tsuki to Laika to Nosferatu', '1626806571-38856e4e-b345-4812-8955-9aae08764411.jpg'),
(2, 'Démon Slayer - News', 'Image de la nouvelle saison de Demon Slayer', '1650286932-5530d0ba-c013-4391-a008-63530f1c5b33.jpg'),
(3, 'Solo Leveling - News annonce anniv', 'Image de l\'affiche animé de Solo Leveling', '1656883720-21b6a3b5-72c5-4f7d-90da-fb838f5e4049.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_manga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish_manga` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `name_manga`, `finish_manga`, `created_at`, `updated_at`) VALUES
(1, 'Vinland Saga', 0, '2022-10-03 19:16:54', NULL),
(2, 'Dragon Ball Super', 0, '2022-10-03 19:17:10', NULL),
(3, 'Nanatsu No Taizai', 0, '2022-10-03 19:17:19', NULL),
(4, 'Code Geass', 0, '2022-10-03 19:17:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int DEFAULT NULL,
  `title_news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_news` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_news` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1DD39950F675F31B` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `author_id`, `title_news`, `description_news`, `content_news`, `keywords_news`, `created_at`, `updated_at`, `slug`, `image`, `visibility`) VALUES
(13, 2, 'Une version anime pour Solo Leveling !', 'Annoncé par Crunchyroll à l\'Anime Expo, le célèbre manga Solo Leveling sorti en 2021 en France va avoir le droit à son anime !', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:44:24', NULL, 'une-version-anime-pour-solo-leveling', '1656883720-c9496cada564e0ecff3f71d40ad759d20e8ab248.jpg', 1),
(14, 2, 'Une quatrième édition collector pour les tomes My Hero Academia !', 'Après le tome 7, 16 et 27, le tome 30 se voit offrir un coffret collector !', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:45:01', NULL, 'une-quatrieme-edition-collector-pour-les-tomes-my-hero-academia', '2211716-7ea4c82c8c5b023cbbb36eaebbd0699259efb50d.jpg', 1),
(15, 2, 'Une collaboration Jujutsu Kaisen x Uniqlo', 'Ce n\'est pas la première fois que cela arrive : Uniqlo réalise une collection UT à l\'image d\'un des mangas les plus populaires actuellement ! Après la collection des \"50 ans du Jump\", \"manga\" et d\'autres, vous pourrez retrouver des t-shirts Jujutsu Kaisen', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:45:38', NULL, 'une-collaboration-jujutsu-kaisen-x-uniqlo', 'jujutsu-kaisen-0-france-cinema-85782622a7e35064705ae46e616b91dd9ede26f0.webp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `news_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`news_id`,`category_id`),
  KEY `IDX_4F72BA90B5A459A0` (`news_id`),
  KEY `IDX_4F72BA9012469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news_category`
--

INSERT INTO `news_category` (`news_id`, `category_id`) VALUES
(13, 1),
(14, 2),
(15, 1),
(15, 3),
(15, 5);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tome_mangas`
--

DROP TABLE IF EXISTS `tome_mangas`;
CREATE TABLE IF NOT EXISTS `tome_mangas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_manga_id` int NOT NULL,
  `name_tome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_tome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D699FB9E50A088F4` (`id_manga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tome_mangas`
--

INSERT INTO `tome_mangas` (`id`, `id_manga_id`, `name_tome`, `cover_tome`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tome 26', 'https://cdn1.booknode.com/book_cover/4998/vinland_saga_tome_26-4998415-264-432.jpg', '2022-10-03 19:18:25', NULL),
(2, 1, 'Tome 9', 'https://images-na.ssl-images-amazon.com/images/I/71PJpd+UnzL.jpg', '2022-10-03 19:18:40', NULL),
(3, 2, 'Tome 17', 'https://www.glenat.com/sites/default/files/images/livres/couv/9782344053706-001-T.jpeg', '2022-10-03 19:18:51', NULL),
(4, 3, 'Tome 40', 'https://static.fnac-static.com/multimedia/Images/FR/NR/80/a9/bf/12560768/1507-1/tsp20220624082451/Seven-Deadly-Sins.jpg', '2022-10-03 19:19:02', NULL),
(5, 4, 'Tome 3', 'https://static.fnac-static.com/multimedia/images_produits/ZoomPE/8/7/2/9782759503278/tsp20130828210039/Code-Gea-Lelouch-of-the-Rebellion.jpg', '2022-10-03 19:19:13', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'Test', '[\"ROLE_ADMIN\", \"ROLE_NEWSEUR\"]', 'test'),
(2, 'Zekarant', '[\"ROLE_ADMIN\", \"ROLE_NEWSEUR\"]', '$2y$13$DCCsBwMea7c/fmXjh8HHquiibt7e8pSMl8K5wZfGzDqwtpmbRKoTS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles_anime`
--
ALTER TABLE `articles_anime`
  ADD CONSTRAINT `FK_FBE671B62990521C` FOREIGN KEY (`id_anime_id`) REFERENCES `animes` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5F9E962AB5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD39950F675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `news_category`
--
ALTER TABLE `news_category`
  ADD CONSTRAINT `FK_4F72BA9012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4F72BA90B5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tome_mangas`
--
ALTER TABLE `tome_mangas`
  ADD CONSTRAINT `FK_D699FB9E50A088F4` FOREIGN KEY (`id_manga_id`) REFERENCES `mangas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
