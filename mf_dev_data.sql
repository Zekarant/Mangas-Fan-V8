-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 jan. 2023 à 23:09
-- Version du serveur : 8.0.27
-- Version de PHP : 8.1.10

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

--
-- Déchargement des données de la table `animes`
--

INSERT INTO `animes` (`id`, `title_anime`, `image_anime`, `synopsis_anime`, `created_at`, `updated_at`, `coup_coeur`) VALUES
    (1, 'Assassination Classroom', 'https://www.urban-fusions.fr/wp-content/uploads/2021/04/assassination-classroom-fin-anime-manga.jpg', 'Assassination Classroom, de son nom original Ansatsu kyōshitsu (暗殺教室), est un manga shônen écrit et dessiné par Yûsei Matsui. Le manga a été pré-publié de juillet 2012 à mars 2016 dans le Weekly Shônen Jump, et a été compilé en un total de 21 tomes aux couvertures délirantes. Le manga a été adapté en anime dès 2015, pour deux saisons et un total de 47 épisodes. Il aura aussi eu deux OAV ainsi que deux films Live. En France, Assassination Classroom est édité par Kana.', '2022-10-02 22:57:52', NULL, NULL),
    (2, 'Code Geass : Lelouch of the Rebellion', 'https://www.mangasfan.fr/hebergeur/uploads/1644170790.jpeg', 'A l\'époque Edo, les samurai étaient respectés de tous, mais la venue des Amanto (aliens) a entraîné la déchéance des samurai avec l\'interdiction du port de l\'épée. Mais un jeune garçon du nom de Sataka Gintoki décide de vivre à sa manière en devenant un free-lancer (personne qui accepte des petits boulots pour rendre service). Accompagné de ses deux amis Kagura et Shinpachi, ils vivent et se battent en tant que hors-la-loi.', '2022-10-02 22:58:22', NULL, 1),
(3, 'Dragon Ball Super', 'https://thumb.canalplus.pro/http/unsafe/1280x720/filters:quality(80)/img-hapi.canalplus.pro:80/ServiceImage/ImageID/58608274', NULL, '2022-10-02 22:58:38', NULL, NULL),
(4, 'Démon Slayer', 'https://www.netcost-security.fr/wp-content/uploads/2021/08/1628657465_Nouveau-trailer-pour-le-jeu-Demon-Slayer-Kimetsu-no-758x426.jpg', NULL, '2022-10-02 22:58:50', NULL, NULL),
(5, 'Parasyte', 'https://topdata.news/wp-content/uploads/2021/02/10-Anime-You-Must-Watch-if-You-Love-Parasyte-en-anglais-kzWD1Kv5k-1.jpg', 'Parasite (ou Kiseiju, 寄生獣) est un manga que l\'on peut qualifier de vieux : il fut prépublié de 1988 à 1994 dans deux magazines de prépublication. Tout d\'abord le Morning Open Shukan puis dans le magazine Afternoon. Parasite a été écrit et dessiné par Hitoshi Iwaaki. Il possède un total de 10 tomes reliés, tous disponibles en France. Parasite a été adapté en anime en 2014, pour réunir 24 épisodes.', '2022-10-02 22:58:59', NULL, NULL),
(6, 'Seven Deadly Sins', 'https://static.bandainamcoent.eu/high/seven-deadly-sins/seven-deadly-sins/00-page-setup/sds_game-thumbnail.jpg', 'The Seven Deadly Sins est un shōnen manga écrit et déssiné par Nakaba Suzuki et publié en 2012 par le très célèbre Weekly Shōnen Magazine. Le manga est toujours en cours d\'écriture et en ce qui concerne l\'animé, sa première diffusion remonte 5 Octobre 2014 et s\'est arrêté pour le moment au 29 Mars 2015 avec deux  films sortient tous deux en 2018 et 2019. Le manga est déjà vendu à plus de 10 millions d\'exemplaires et a été sacré en 2015, au même titre que le très célèbre En selle, Sakamichi, le prix du manga Kōdansha dans la catégorie shōnen.', '2022-10-02 22:59:15', NULL, NULL);

--
-- Déchargement des données de la table `articles_anime`
--

INSERT INTO `articles_anime` (`id`, `id_anime_id`, `title_article`, `cover_article`, `created_at`, `updated_at`) VALUES
(1, 1, 'Koro-sensei', 'https://www.mangasfan.fr/hebergeur/uploads/1594756707.jpeg', '2022-10-03 21:41:59', NULL),
(2, 1, 'Nagisa Shiota', 'https://www.mangasfan.fr/hebergeur/uploads/1598811584.jpeg', '2022-10-03 21:42:13', NULL),
(3, 1, 'Gâkuho Asano', 'https://www.mangasfan.fr/hebergeur/uploads/1599163244.jpeg', '2022-10-03 21:42:27', NULL),
(4, 1, 'Irina Poufanovitch', 'https://www.mangasfan.fr/hebergeur/uploads/1599164161.jpeg', '2022-10-03 21:42:33', NULL);

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `color`) VALUES
(1, 'Animes', 'animes', '#310fb8'),
(2, 'Mangas', 'mangas', '#13b451'),
(3, 'Site', 'site', '#141bdb'),
(4, 'Évenementiel', 'evenementiel', '#11ac7d');

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `name_manga`, `finish_manga`, `created_at`, `updated_at`) VALUES
(1, 'Vinland Saga', 0, '2022-10-03 19:16:54', NULL),
(2, 'Dragon Ball Super', 0, '2022-10-03 19:17:10', NULL),
(3, 'Nanatsu No Taizai', 0, '2022-10-03 19:17:19', NULL),
(4, 'Code Geass', 0, '2022-10-03 19:17:25', NULL);

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 20:10:09', '2022-11-09 20:10:09', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 20:10:29', '2022-11-09 20:10:29', NULL),
(3, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 21:33:57', '2022-11-09 21:33:57', NULL),
(4, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 21:34:19', '2022-11-09 21:34:19', NULL),
(5, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 21:34:34', '2022-11-09 21:34:34', NULL),
(6, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:46:\\\"Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\\":4:{s:57:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0transport\\\";N;s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0subject\\\";s:0:\\\"\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0options\\\";O:56:\\\"Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\\":1:{s:65:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Bridge\\\\Discord\\\\DiscordOptions\\0options\\\";a:2:{s:8:\\\"username\\\";s:10:\\\"connor bot\\\";s:6:\\\"embeds\\\";a:1:{i:0;a:5:{s:5:\\\"color\\\";i:2021216;s:5:\\\"title\\\";s:15:\\\"New song added!\\\";s:9:\\\"thumbnail\\\";a:1:{s:3:\\\"url\\\";s:64:\\\"https://i.scdn.co/image/ab67616d0000b2735eb27502aa5cb1b4c9db426b\\\";}s:6:\\\"fields\\\";a:3:{i:0;a:3:{s:4:\\\"name\\\";s:5:\\\"Track\\\";s:5:\\\"value\\\";s:70:\\\"[Common Ground](https://open.spotify.com/track/36TYfGWUhIRlVjM8TxGUK6)\\\";s:6:\\\"inline\\\";b:1;}i:1;a:3:{s:4:\\\"name\\\";s:6:\\\"Artist\\\";s:5:\\\"value\\\";s:15:\\\"Alasdair Fraser\\\";s:6:\\\"inline\\\";b:1;}i:2;a:3:{s:4:\\\"name\\\";s:5:\\\"Album\\\";s:5:\\\"value\\\";s:10:\\\"Dawn Dance\\\";s:6:\\\"inline\\\";b:1;}}s:6:\\\"footer\\\";a:2:{s:4:\\\"text\\\";s:9:\\\"Added ...\\\";s:8:\\\"icon_url\\\";s:127:\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/200px-Spotify_logo_without_text.svg.png\\\";}}}}}s:60:\\\"\\0Symfony\\\\Component\\\\Notifier\\\\Message\\\\ChatMessage\\0notification\\\";N;}}', '[]', 'default', '2022-11-09 21:35:37', '2022-11-09 21:35:37', NULL);

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `image_id`, `title_news`, `description_news`, `content_news`, `keywords_news`, `created_at`, `updated_at`, `slug`) VALUES
(1, NULL, 'Une version anime pour Solo Leveling !', 'Annoncé par Crunchyroll à l\'Anime Expo, le célèbre manga Solo Leveling sorti en 2021 en France va avoir le droit à son anime !', '<div>Hey,<br>Bonjour à tous, je suis le reste des news, je fonctionne bien, non ?</div>', NULL, '2022-09-30 19:49:17', '2023-01-04 12:14:40', 'test-des-news-symfony'),
(2, NULL, 'La nouvelle saison de Demon Slayer s\'offre un trailer !', 'Étant incontestablement l\'un des animes les plus suivis, les fans attendent avec impatience la suite de Demon Slayer en format anime. A cette occasion, un nouveau trailer a été publié !', '<div>fdgdgfd</div>', NULL, '2022-09-30 20:17:19', '2022-11-13 17:08:13', 'test-deuxieme-news'),
(32, NULL, 'Dernier test pour voir si tout est bon', 'Est-ce que c\'est bon pour tout l\'monde ?', '<div>Parfait</div>', NULL, '2022-11-13 17:07:42', NULL, 'dernier-test-pour-voir-si-tout-est-bon');

--
-- Déchargement des données de la table `news_category`
--

INSERT INTO `news_category` (`news_id`, `category_id`) VALUES
    (1, 1),
    (1, 2),
    (1, 4);

--
-- Déchargement des données de la table `tome_mangas`
--

INSERT INTO `tome_mangas` (`id`, `name_tome`, `cover_tome`, `id_manga_id`, `created_at`, `updated_at`) VALUES
    (1, 'Tome 26', 'https://cdn1.booknode.com/book_cover/4998/vinland_saga_tome_26-4998415-264-432.jpg', 1, '2022-10-03 19:18:25', NULL),
    (2, 'Tome 9', 'https://images-na.ssl-images-amazon.com/images/I/71PJpd+UnzL.jpg', 1, '2022-10-03 19:18:40', NULL),
    (3, 'Tome 17', 'https://www.glenat.com/sites/default/files/images/livres/couv/9782344053706-001-T.jpeg', 2, '2022-10-03 19:18:51', NULL),
    (4, 'Tome 40', 'https://static.fnac-static.com/multimedia/Images/FR/NR/80/a9/bf/12560768/1507-1/tsp20220624082451/Seven-Deadly-Sins.jpg', 3, '2022-10-03 19:19:02', NULL),
    (5, 'Tome 3', 'https://static.fnac-static.com/multimedia/images_produits/ZoomPE/8/7/2/9782759503278/tsp20130828210039/Code-Gea-Lelouch-of-the-Rebellion.jpg', 4, '2022-10-03 19:19:13', NULL);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
    (1, 'Test', 'null', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
