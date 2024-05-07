-- Complete user
INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`, `avatar`) VALUES
(1, 'Test', '[\"ROLE_ADMIN\", \"ROLE_NEWSEUR\"]', '$2y$13$cK1a0OZOXGDqTnkDRaOiJeyp3HCwpl3XPUvyUV1cK1Gfy17p.uzby', 'test@test.fr', ''),
(2, 'Zekarant', '[\"ROLE_ADMIN\", \"ROLE_NEWSEUR\"]', '$2y$13$DCCsBwMea7c/fmXjh8HHquiibt7e8pSMl8K5wZfGzDqwtpmbRKoTS', 'test2@test.fr', '');

-- Complete animes
INSERT INTO `anime` (`id`, `title`, `image`, `synopsis`, `created_at`, `updated_at`, `is_favorite`) VALUES
(1, 'Assassination Classroom', 'https://media.senscritique.com/media/000010014381/1200/assassination_classroom.jpg', 'Assassination Classroom, de son nom original Ansatsu kyōshitsu (暗殺教室), est un manga shônen écrit et dessiné par Yûsei Matsui. Le manga a été pré-publié de juillet 2012 à mars 2016 dans le Weekly Shônen Jump, et a été compilé en un total de 21 tomes aux couvertures délirantes. Le manga a été adapté en anime dès 2015, pour deux saisons et un total de 47 épisodes. Il aura aussi eu deux OAV ainsi que deux films Live. En France, Assassination Classroom est édité par Kana.', '2022-10-02 22:57:52', NULL, 0),
(2, 'Code Geass : Lelouch of the Rebellion', 'https://www.mangasfan.fr/hebergeur/uploads/1644170790.jpeg', 'A l\'époque Edo, les samurai étaient respectés de tous, mais la venue des Amanto (aliens) a entraîné la déchéance des samurai avec l\'interdiction du port de l\'épée. Mais un jeune garçon du nom de Sataka Gintoki décide de vivre à sa manière en devenant un free-lancer (personne qui accepte des petits boulots pour rendre service). Accompagné de ses deux amis Kagura et Shinpachi, ils vivent et se battent en tant que hors-la-loi.', '2022-10-02 22:58:22', NULL, 1),
(3, 'Dragon Ball Super', 'https://thumb.canalplus.pro/http/unsafe/1280x720/filters:quality(80)/img-hapi.canalplus.pro:80/ServiceImage/ImageID/58608274', NULL, '2022-10-02 22:58:38', NULL, 0),
(4, 'Démon Slayer', 'https://www.cnet.com/a/img/resize/94f246061e4f6c49d00e1285dfbda9262145eaf7/hub/2021/05/03/bd37964d-fe5c-4574-9df3-1986e0bf5050/demon-slayer-mugen-train-1239731.jpg?auto=webp&fit=crop&height=675&width=1200', NULL, '2022-10-02 22:58:50', NULL, 0),
(5, 'Parasyte', 'https://topdata.news/wp-content/uploads/2021/02/10-Anime-You-Must-Watch-if-You-Love-Parasyte-en-anglais-kzWD1Kv5k-1.jpg', 'Parasite (ou Kiseiju, 寄生獣) est un manga que l\'on peut qualifier de vieux : il fut prépublié de 1988 à 1994 dans deux magazines de prépublication. Tout d\'abord le Morning Open Shukan puis dans le magazine Afternoon. Parasite a été écrit et dessiné par Hitoshi Iwaaki. Il possède un total de 10 tomes reliés, tous disponibles en France. Parasite a été adapté en anime en 2014, pour réunir 24 épisodes.', '2022-10-02 22:58:59', NULL, 0),
(6, 'Seven Deadly Sins', 'https://static.bandainamcoent.eu/high/seven-deadly-sins/seven-deadly-sins/00-page-setup/sds_game-thumbnail.jpg', 'The Seven Deadly Sins est un shōnen manga écrit et déssiné par Nakaba Suzuki et publié en 2012 par le très célèbre Weekly Shōnen Magazine. Le manga est toujours en cours d\'écriture et en ce qui concerne l\'animé, sa première diffusion remonte 5 Octobre 2014 et s\'est arrêté pour le moment au 29 Mars 2015 avec deux  films sortient tous deux en 2018 et 2019. Le manga est déjà vendu à plus de 10 millions d\'exemplaires et a été sacré en 2015, au même titre que le très célèbre En selle, Sakamichi, le prix du manga Kōdansha dans la catégorie shōnen.', '2022-10-02 22:59:15', NULL, 0);

-- Complete articles_anime
INSERT INTO `article_anime` (`id`, `anime_id`, `title`, `cover`, `created_at`, `updated_at`) VALUES
(1, 1, 'Koro-sensei', 'https://www.mangasfan.fr/hebergeur/uploads/1594756707.jpeg', '2022-10-03 21:41:59', NULL),
(2, 1, 'Nagisa Shiota', 'https://www.mangasfan.fr/hebergeur/uploads/1598811584.jpeg', '2022-10-03 21:42:13', NULL),
(3, 1, 'Gâkuho Asano', 'https://www.mangasfan.fr/hebergeur/uploads/1599163244.jpeg', '2022-10-03 21:42:27', NULL),
(4, 1, 'Irina Poufanovitch', 'https://www.mangasfan.fr/hebergeur/uploads/1599164161.jpeg', '2022-10-03 21:42:33', NULL);

-- Complete category table
INSERT INTO `category` (`id`, `name`, `slug`, `color`) VALUES
(1, 'Animes', 'animes', '#6b04d2'),
(2, 'Mangas', 'mangas', '#1701c1'),
(3, 'Évenement', 'evenement', '#df11b9'),
(4, 'Site', 'site', '#e7b913'),
(5, 'Divers', 'divers', '#5b8a15');

-- Complete images table
INSERT INTO `image` (`id`, `name`, `alt_text`, `filename`) VALUES
(1, 'Tsuki to Laika to Nosferatu - News', 'Image de présentation de Tsuki to Laika to Nosferatu', '1626806571-38856e4e-b345-4812-8955-9aae08764411.jpg'),
(2, 'Démon Slayer - News', 'Image de la nouvelle saison de Demon Slayer', '1650286932-5530d0ba-c013-4391-a008-63530f1c5b33.jpg'),
(3, 'Solo Leveling - News annonce anniv', 'Image de l\'affiche animé de Solo Leveling', '1656883720-21b6a3b5-72c5-4f7d-90da-fb838f5e4049.jpg');

-- Complete mangas table
INSERT INTO `manga` (`id`, `name`, `is_finish`, `created_at`, `updated_at`) VALUES
(1, 'Vinland Saga', 0, '2022-10-03 19:16:54', NULL),
(2, 'Dragon Ball Super', 0, '2022-10-03 19:17:10', NULL),
(3, 'Nanatsu No Taizai', 0, '2022-10-03 19:17:19', NULL),
(4, 'Code Geass', 0, '2022-10-03 19:17:25', NULL);

-- Complete news table
INSERT INTO `news` (`id`, `author_id`, `title`, `description`, `content`, `keywords`, `created_at`, `updated_at`, `slug`, `image`, `visibility`) VALUES
    (13, 2, 'Une version anime pour Solo Leveling !', 'Annoncé par Crunchyroll à l\'Anime Expo, le célèbre manga Solo Leveling sorti en 2021 en France va avoir le droit à son anime !', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:44:24', NULL, 'une-version-anime-pour-solo-leveling', '1656883720-c9496cada564e0ecff3f71d40ad759d20e8ab248.jpg', 1),
(14, 2, 'Une quatrième édition collector pour les tomes My Hero Academia !', 'Après le tome 7, 16 et 27, le tome 30 se voit offrir un coffret collector !', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:45:01', NULL, 'une-quatrieme-edition-collector-pour-les-tomes-my-hero-academia', '2211716-7ea4c82c8c5b023cbbb36eaebbd0699259efb50d.jpg', 1),
(15, 2, 'Une collaboration Jujutsu Kaisen x Uniqlo', 'Ce n\'est pas la première fois que cela arrive : Uniqlo réalise une collection UT à l\'image d\'un des mangas les plus populaires actuellement ! Après la collection des \"50 ans du Jump\", \"manga\" et d\'autres, vous pourrez retrouver des t-shirts Jujutsu Kaisen', '<p>CONTENU DE TEST</p>', 'contenu, de, test', '2023-08-17 21:45:38', NULL, 'une-collaboration-jujutsu-kaisen-x-uniqlo', 'jujutsu-kaisen-0-france-cinema-85782622a7e35064705ae46e616b91dd9ede26f0.webp', 1);

-- Complete new_category table
INSERT INTO `news_category` (`news_id`, `category_id`) VALUES
(13, 1),
(14, 2),
(15, 1),
(15, 3),
(15, 5);

-- Complete tome_mangas
INSERT INTO `tome_manga` (`id`, `manga_id`, `name`, `cover`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tome 26', 'https://cdn1.booknode.com/book_cover/4998/vinland_saga_tome_26-4998415-264-432.jpg', '2022-10-03 19:18:25', NULL),
(2, 1, 'Tome 9', 'https://images-na.ssl-images-amazon.com/images/I/71PJpd+UnzL.jpg', '2022-10-03 19:18:40', NULL),
(3, 2, 'Tome 17', 'https://www.glenat.com/sites/default/files/images/livres/couv/9782344053706-001-T.jpeg', '2022-10-03 19:18:51', NULL),
(4, 3, 'Tome 40', 'https://static.fnac-static.com/multimedia/Images/FR/NR/80/a9/bf/12560768/1507-1/tsp20220624082451/Seven-Deadly-Sins.jpg', '2022-10-03 19:19:02', NULL),
(5, 4, 'Tome 3', 'https://static.fnac-static.com/multimedia/images_produits/ZoomPE/8/7/2/9782759503278/tsp20130828210039/Code-Gea-Lelouch-of-the-Rebellion.jpg', '2022-10-03 19:19:13', NULL);
